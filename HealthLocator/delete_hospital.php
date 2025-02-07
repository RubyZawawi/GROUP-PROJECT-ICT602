<?php
include 'connect.php';
$id = $_GET['id'];
$conn->query("DELETE FROM hospital WHERE hospital_id='$id'");
echo "<script>alert('Hospital deleted successfully!'); window.location='admin.php';</script>";
?>
