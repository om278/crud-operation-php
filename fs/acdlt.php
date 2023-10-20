
<?php
include "config1.php";


session_start();
$Email = $_SESSION['email'];

if(isset($Email)){
$mb = $Email;
// sql to delete a record
$sql = "DELETE FROM user_tbl WHERE email = '$mb'";
}
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
    header("Location: http://localhost/fs/");
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();


?>