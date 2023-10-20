<?php require 'config.php';

session_start();
$Email = $_SESSION['email'];

if($Email==true){

}else{
  header("location:/fs/login.php");
}

if(isset($Email)){

    $mb = $Email;
  
    $info =  "SELECT * FROM user_tbl WHERE email = '$mb'";
    
    $result = mysqli_query($con, $info);
  
    $row = mysqli_fetch_array($result);

  $uid = $row["uid"];
  $fname = $row["fname"];
  $email = $row["email"];
  
  $mob =  $row['mob'];
  
  $uadd =  $row['uadd'];
  
  $gender =  $row['gender'];
  
  $password = $row["pwd"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>

<style>
 
  .rs{
    text-decoration:none;
  }
</style>
<body>
   <center><h1>Welcome, <br> Your Login Was Successful complate</h1></center> 
    <div class="student-profile py-4">
  <div class="container">
    <a href="#" class="menu">Home </a>

    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            
            <h3>Name:<?php echo $fname ?></h3>
          </div>
          <div class="card-body"> <!--   PRN  (Permanent Registration Number) -->
          <p class="mb-0"><strong class="pr-1"> ID :</strong><?php echo $uid ?></p>
          <p class="mb-0"><strong class="pr-2"> Email :</strong><?php echo $email ?></p>   
          <p class="mb-0"><strong class="pr-1"> Number :</strong><?php echo $mob ?></p>  
          <p class="mb-0"><strong class="pr-1"> Gender :</strong><?php echo $gender ?></p>    
          <p class="mb-0"><strong class="pr-1"> Address :</strong><?php echo $uadd ?></p>                            
          </div>
        </div>
    
    <a href="edit.php"class="rs">Edit</a><br>
    <a href="acdlt.php"class="rs">Delete Account</a><br>
    <a href= "logout.php" class="rs">Logout</a>
</body>
</html>

