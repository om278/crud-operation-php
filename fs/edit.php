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
  

if(isset($_POST['update']))
 {
     // variables for input data
    
    
     $first_name = $_POST['fname'];

     $email = $_POST['email'];
 
     $mob =  $_POST['mob'];
 
     $uadd =  $_POST['uadd'];
     
     $gender =  $_POST['gender'];
 
     $password = $_POST['pwd'];

     $sql = "UPDATE user_tbl SET fname='".$first_name."', email='".$email."', mob='".$mob."', uadd='".$uadd."', gender='".$gender."', pwd='".$password."' WHERE uid=".$uid;
     if ($con->query($sql) === TRUE) {
         header("Location: http://localhost/fs/welcome.php");
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

<?php
                                        if(isset($_SESSION['status']) && $_SESSION!='')
                                        {
                                            ?>
                                            <div class="alert alert-warning alert-dismissible fade-show" role="alert">
                                                <?php echo $_SESSION['status']; ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>

                                        <?php
                                        unset($_SESSION['status']);

                                        }

                                        ?>
                                        <div class="container">
                                         <form class="forms-sample" method="post" enctype="multipart/form-data">

                                                                <div class="col-md-12">
											
                                                                <div class="form-group">
                                                                <h3 class="mt-0 pb-4 text-center" id="title4">Edit Details</h3>
                                                                        <label  class="label" for="exampleInputName1">Name</label>
                                                                        <input  type="text" id="fullname"  name="fname" value= "<?php echo $fname ?>" class="form__input form-control" required="required" >
                                                                        <div class="mb-2 text-danger form__input-error-message"></div></div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName1"> Email</label>
                                                                        <input type="text" name="email"  value="<?php echo $email ?>" class="form-control" required="true" readonly>
                                                                    </div></div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="label"  for="exampleInputName1"> Number</label>
                                                                        <input  id="telnam1"  type="text" name="mob"   value="<?php echo  $mob ?>" class="form__input form-control" required>
                                                                        <div class="mb-2 text-danger form__input-error-message">

                                                                        </div></div></div>
                                                                          <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label  class="label" for="exampleInputName1">Address:</label>
                                                                        <input id="fullname"  type="text" name="uadd" value="<?php echo $uadd ?>" class="form__input form-control" required>
                                                                        <div class="mb-2 text-danger form__input-error-message"></div></div> 


                                                                    <div class="form-group">
                                                                        <label for="exampleInputName1">Gender</label>
                                                                        <select name="gender" value="<?php echo $gender ?>" class="form-control" required="true">
                                                                            <option value="<?php echo $gender ?>"> <?php echo $gender ?></option>
                                                                            
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                     <label for="pwd">Password:</label>
              
                                                                     <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?php echo  $password ?>">
                                                                     </div><br><br>




                                                                    <center><button type="submit"  value="Update" class="btn btn-primary mr-2" name="update">UPDATE</button></center>
                                                                    <a href="welcome.php" class="rs">Back</a>

                                                                </form>  </div>
                                                                <?php

error_reporting(0);

require 'config.php';

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

?> 

</body>
</html>