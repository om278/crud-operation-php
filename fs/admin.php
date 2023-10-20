<?php
session_start();




require 'config.php';

if (isset($_POST['login']) && !empty($_POST['email']) 
&& !empty($_POST['pwd']))
{
	
	$email = $_POST['email'];
	$password = $_POST['pwd'];


	$query = "SELECT * FROM adminlogin WHERE email ='$email' AND pwd ='$password'";

	$data = mysqli_query($con, $query);

	$total = mysqli_num_rows($data);

	
	if($total  == 1)
	{

		$_SESSION['email'] = $email;


		header("location:/fs/admin1.php");
	}
	else{
		{
	
			$errorMessage2 = "Invalid Username or password!!";
			header("Location: login.php?loginError=$errorMessage2");
		}
		
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<style>
 
  .rs{
    text-decoration:none;
  }
</style>
<body>
<span id="error1"> 
										<?php if (isset($_GET['loginError'])): ?>
											<div class="alert">
												<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
												<h5 style="margin-top: 1; color:black;" ><?php echo $_GET['loginError']; ?></h5>
											</div>
										<?php endif ?>
									</span>
                                    <div class="container">
<form action="" class="signup-form" method="Post">
  <div class="mb-3">
  <h3 class="mt-0 pb-4 text-center" id="title4">Admin Login</h3>
  <a href="index.php"class="rs">Back</a><br><br>
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email"  name="email">
   
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
 
 <center> <button type="submit"  class="btn btn-primary" id="login" name="login">Login</button></center>
</form>
                                        </div>
</body>

</html>

