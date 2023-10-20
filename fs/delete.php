
<?php
include "config1.php";


$uid = $_GET['uid'];
// sql to delete a record
$sql = "DELETE FROM user_tbl WHERE uid=".$uid;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: http://localhost/fs/");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


?>