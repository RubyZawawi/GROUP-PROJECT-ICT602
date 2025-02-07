<?php
include 'connect.php';
$id = $_GET['id'];
$conn->query("DELETE FROM CHECKIN WHERE checkin_id='$id'");
echo "<script>alert('Check in deleted successfully!'); window.location='admin.php';</script>";
?>
