<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fs</title>
</head>
<style>
 
  .rs{
    text-decoration:none;
  }
</style>
<body>

<?php
include "config1.php";

if (isset($_POST['submit'])) {

    $first_name = $_POST['fname'];

    $email = $_POST['email'];

    $mob =  $_POST['mob'];

    $uadd =  $_POST['uadd'];
    
    $gender =  $_POST['gender'];

    $password = $_POST['pwd'];


$sql = "INSERT INTO `user_tbl`(`fname`, `email`, `mob`, `uadd`, `gender`, `pwd`) 

VALUES ('$first_name','$email','$mob','$uadd','$gender','$password')";

$result = $conn->query($sql);

if ($result == TRUE) {

echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    }



  } 

?>
<div class="container">
<h3 class="mt-0 pb-4 text-center" id="title4">Personal Details</h3>
<form class="form-inline" action="" method="post">
<div class="form-group">
    <label class="sr-only" for="text">Name:</label>
    <input type="text" placeholder="Enter Your Full Name" class="form-control" id="name" name="fname">
  </div><br>
  <div class="form-group">
    <label class="sr-only" for="email">Email address:</label>
    <input type="email" placeholder="Enter Your Email" class="form-control" id="email" name="email">
  </div><br>
  <div class="form-group">
    <label class="sr-only" for="text">Mob:</label>
    <input type="text" placeholder=" Enter Your Mobile Number" class="form-control" id="mob"  name="mob">
  </div><br>
  <div class="form-group">
    <label class="sr-only" for="text">Address:</label>
    <input type="text" placeholder="Enter Your Address" class="form-control" id="add"  name="uadd">
  </div><br>
  <div class="col-md-6">
<div class="form-group">
<label class="label" for="gen">Gender</label>
			<select style="color: gray; font-size: 14px;" id="gen" class="form__input form-control" name="gender" required>
				<option value="" selected="">Select</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Others">Others</option>
			</select>
			<div class="mb-2 text-danger form__input-error-message"></div> 
		</div>
	</div><br>
  <div class="form-group">
    <label class="sr-only" for="pwd">Password:</label>
    <input type="password" placeholder="Enter Password" class="form-control" id="pwd" name="pwd">
  </div>


  <br><br>

 <center> <button type="submit" style="color" class="btn btn-info" name="submit">Submit</button></center>
  <a class="rs" href="login.php">User login</a><br>
  <a class="rs" href="admin.php">Admin</a><br><br><br>
</form>
</div>


</body>
</html>