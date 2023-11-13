<?php
include 'navbar.php';
include 'connect.php';
$username = $_GET['username'];
$sql = "DELETE FROM user WHERE username = '$username'";
$result = $con->query($sql);
if (!$result) {
  echo "<script>alert('Error:ไม่สามารถลบข้อมูลได้');history.back();</script>";
} else {
  header('location:user.php');
}
