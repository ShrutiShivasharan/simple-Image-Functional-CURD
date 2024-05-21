<?php 
include('con.php');

//add 
if(isset($_POST['submitAddForm'])){
	$name = $_POST['addUsername'];
	$email = $_POST['addUseremail'];
	$img = $_FILES['addUserimage'];
	// echo $name;
	// echo $email;
	// print_r($img);
	$img_name =$img['name'];
	$img_path = $img['tmp_name'];
	$img_seprate = explode('.', $img_name);
	$img_extension = strtolower($img_seprate[1]);
	$extension = array('jpg','png','jpeg');
	if(in_array($img_extension, $extension)){
		$upload_img = 'images/'.$img_name;
		move_uploaded_file($img_path, $upload_img);
		$sql = "INSERT INTO `userprofile`(`name`, `email`, `image`) VALUES ('$name','$email','$upload_img')";
		$result = mysqli_query($con,$sql);
		if($result){
			header('location:TableDisplay.php');
		}else{
			echo "error!While adding user";
		}
	}
}

// edit
if(isset($_POST['submitEditForm'])){
  $id = $_GET['editId'];
  $name = $_POST['editUsername'];
  $email = $_POST['editUseremail'];
  //check image upload
  if($_FILES['editUserimage']['size'] > 0){
	  	$img = $_FILES['editUserimage'];
	    $imgname = $img['name'];
	    $imgtemp = $img['tmp_name'];
	    $upload_img = 'images/'.$imgname;
	    move_uploaded_file($imgtemp, $upload_img);

	    $sql = "UPDATE `userprofile` SET `name`='$name',`email`='$email',`image`='$upload_img' WHERE id=$id";
    }else{
        $sql = "UPDATE `userprofile` SET `name`='$name',`email`='$email' WHERE id=$id";	
    }

	$result = mysqli_query($con,$sql);
	if($result){
		header('location:TableDisplay.php');
	}else{
		echo "error!While adding user";
	}
}

//delet
if(isset($_GET['deleteId'])){
	$id = $_GET['deleteId'];
	// echo $id;
	$sql = "DELETE FROM `userprofile` WHERE id=$id";
	$result = mysqli_query($con,$sql);
	if($result){
		header('location:TableDisplay.php');
	}else{
		echo "error!While adding user";
	}
}


?>