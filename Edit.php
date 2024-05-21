<?php 
include('con.php');

//fetch data
$id = $_GET['editId']; 
$sql = "SELECT * FROM `userprofile` WHERE id=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
// print_r($row); //array
$name = $row['name']; 
$email = $row['email'];
$img = $row['image'];

//image change code
if(isset($_FILES['editUserimage']) && $_FILES['editUserimage']['error'] === UPLOAD_ERR_OK){
    $img = $_FILES['editUserimage'];
    $imgname = $img['name'];
    $imgtemp = $img['tmp_name'];
    $upload_img = 'images/'.$imgname;
    move_uploaded_file($imgtemp, $upload_img);

    $sql = "UPDATE `tables` SET image='$upload_img' WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die(mysqli_error($con));
    }
    $img = $upload_img;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Users Profile</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    img{
        width: 100px;
    }
</style>
<body>
    <div class="container m-5 p-5">
        <form method="post" action="function.php?editId=<?php echo $id ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" placeholder="Enter your id" name="editUserid" value="<?php echo $id ?>" readonly>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="editUsername" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="editUseremail" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label>Profile</label>
                 <input type="file" id="imageInput" name="editUserimage" class="form-control" onchange="chnageImage()" value="">

                 <div class="my-3">
                 <?php if($img != ''): ?>
                    <img id="prevImage" src="<?php echo $img; ?>" >
                <?php endif; ?>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submitEditForm">Submit</button>
        </form>
    </div>
</body>
</html>

<script type="text/javascript">
    function chnageImage(){
        var input = document.getElementById('imageInput');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('prevImage').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
    }
</script>
