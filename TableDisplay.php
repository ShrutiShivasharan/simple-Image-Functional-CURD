<?php 
include('con.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Functional Image Curds</title>
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
		<button type="button" class="btn btn-primary mb-5"><a href="add.php" class="text-light">Add</a></button>

		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		       <th scope="col">Email</th>
		      <th scope="col">Profile</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sql = "SELECT * FROM `userprofile`";
		  		$result = mysqli_query($con,$sql);
		  		if($result){
		  			$index=1;
		  			while ($row = mysqli_fetch_assoc($result)) {
		  				$id = $row['id'];
		  				$name = $row['name'];
		  				$email = $row['email'];
		  				$img = $row['image'];

		  				echo '
		  					<tr>
								<th scope="row">'.$index.'</th>
								<td>'.$name.'</td>
								<td>'.$email.'</td>
								<td><img src='.$img.'></td>
								<td><button type="button" class="btn btn-warning"><a href="Edit.php?editId='.$id.'" class="text-dark">Edit</a></button></td>
								<td><button type="button" class="btn btn-danger"><a href="function.php?deleteId='.$id.'"; class="text-light">Delete</a></button></td>
						 	</tr>
		  				';
		  				$index++;
		  			}
		  		}
			?>
		  </tbody>
		</table>
</div>
</body>
</html>