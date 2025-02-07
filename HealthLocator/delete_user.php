<?php
include 'connect.php';
$id = $_GET['id'];
$conn->query("DELETE FROM user WHERE userid='$id'");
echo "<script>alert('User deleted successfully!'); window.location='admin.php';</script>";
?>
