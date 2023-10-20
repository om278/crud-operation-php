<?php require 'config.php';

session_start();
$Email = $_SESSION['email'];

if($Email==true){

}else{
  header("location:/fs/admin.php");
}

if(isset($Email)){

    $mb = $Email;
  
    $info =  "SELECT * FROM adminlogin WHERE email = '$mb'";
    
    $result = mysqli_query($con, $info);
  
    $row = mysqli_fetch_array($result);

  $uid = $row["aid"];
  $fname = $row["aname"];
  $email = $row["email"];
  

  
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
<div class="container">
<center>  <h1>Welcome, <br> Your Login Was successfully complated</h1></center>
    <div class="student-profile py-4">
  <div class="container">
    <a href="#" class="menu">Home </a>
    <a href= "alogout.php" class="rs">Logout</a>
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            
            <h3>Name:<?php echo $fname ?></h3>
          </div>
          <div class="card-body"> <!--   PRN  (Permanent Registration Number) -->
          <p class="mb-0"><strong class="pr-1"> ID :</strong><?php echo $uid ?></p>
          <p class="mb-0"><strong class="pr-2"> Email :</strong><?php echo $email ?></p>                          
          </div></div>
        </div><br><br>

       
    
    <?php



$query = "SELECT * FROM user_tbl";
echo "<b> <center> User Data</center> <br>";

if ($result = $con->query($query)) {
echo '<div class="container">';
echo '<table class="table table-striped">';

echo '<thead><tr><th>UID</th><th>Fname</th><th>Email</th><th>mob</th><th>uadd</th><th>gender</th><th>pwd</th> <th>Action</th>  </tr></thead>';
echo '<tbody>';
while ($row = $result->fetch_assoc()) {
$uid = $row["uid"];
$fname = $row["fname"];
$email = $row["email"];

$mob =  $row['mob'];

$uadd =  $row['uadd'];

$gender =  $row['gender'];

$password = $row["pwd"];


echo '<tr>';
echo '<td>'.$uid.'</td>';
echo '<td>'.$fname.'</td>';
echo '<td>'.$email.'</td>';
echo  '<td>'.$mob.'</td>';
echo  '<td>'.$uadd.'</td>';
echo  '<td>'.$gender.'</td>';
echo  '<td>'.$password.'</td>';

echo  '<td><a href="update1.php?uid='.$uid.'" class="btn-primary">edit</a> <a href="delete.php?uid='.$uid.'" class="btn-danger">delete</a></td>';
echo '</tr>';

}
echo '</tbody>';
echo '</table>';
echo '</div>';

/*free result set*/
$result->free();
}


$con->close();
?>
</body>
</html>
