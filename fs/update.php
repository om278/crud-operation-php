<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    
<?php
include "config1.php";


if (isset($_POST['submit'])) {

    $uid = $_POST['uid'];
    $first_name = $_POST['fname'];

    $email = $_POST['email'];


    $mob =  $_POST['mob'];

    $uadd =  $_POST['uadd'];
    
    $gender =  $_POST['gender'];


    $password = $_POST['pwd'];

$sql = "UPDATE user_tbl SET fname='".$first_name."', email='".$email."', mob='".$mob."', uadd='".$uadd."', gender='".$gender."', pwd='".$password."' WHERE uid=".$uid;
if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/fs/");
}
}
$uid = $_GET['uid'];
// sql to delete a record
$sql = "select * from `user_tbl` where uid=".$uid;
$result = mysqli_query($conn, $sql) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

?>
  <h2>User ID: <?php echo $row['uid'];?></h2>
<form class="form-inline" action="" method="post">
<input type="hidden" class="form-control" id="fname" name="uid"   value="<?php echo $row['uid'];?>">
<div class="form-group">
    <label class="sr-only" for="text">Name:</label>
    <input type="text" class="form-control" id="name" name="fname" value="<?php echo $row['fname'];?>">
  </div>
  <div class="form-group">
    <label class="sr-only" for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>">
  </div>
  <div class="form-group">
    <label class="sr-only" for="text">Mob:</label>
    <input type="text" class="form-control" id="mob"  name="mob" value="<?php echo $row['mob'];?>">
  </div>
  <div class="form-group">
    <label class="sr-only" for="text">Address:</label>
    <input type="text" class="form-control" id="add"  name="uadd" value="<?php echo $row['uadd'];?>">
  </div>
  <div class="col-md-6">
<div class="form-group">
<label class="label" for="gen">Gender</label>
			<select style="color: gray; font-size: 14px;" id="gen" class="form__input form-control" name="gender" value="<?php echo $row['gender'];?>" required>
				<option value="" selected="">Select</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Others">Others</option>
			</select>
			<div class="mb-2 text-danger form__input-error-message"></div> 
		</div>
	</div>
  <div class="form-group">
    <label class="sr-only" for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $row['pwd'];?>">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-light" name="submit">Submit</button>
</form>





</body>
</html>