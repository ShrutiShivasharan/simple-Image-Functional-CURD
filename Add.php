<?php 
include('con.php');
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
<body>
    <div class="container m-5 p-5">
        <form method="post" action="function.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="addUsername">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="addUseremail">
            </div>
            <div class="form-group">
                <label>Profile</label>
                 <input type="file" name="addUserimage" class="form-control"> 
            </div>
            
            <button type="submit" class="btn btn-primary" name="submitAddForm">Submit</button>
        </form>
    </div>
</body>
</html>

