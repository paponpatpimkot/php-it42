<?php
$con = mysqli_connect("localhost", "root", "", "phpit42");
if (!$con) {
  die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}
