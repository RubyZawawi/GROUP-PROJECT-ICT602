<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {background: #dddddd; font-family: Arial, sans-serif; padding: 20px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { background-color: #f4f4f4; border: 1px solid #ddd; padding: 10px; text-align: left; }
        th {width: 200px;}
        .ip {width: 300px;}
        .container { width: 80%; margin: auto; }
        .btn { text-decoration: none; padding: 8px 12px; background: green; color: white; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div style="background: #89faff; padding: 1rem; height: 80px;">
        <img src="ic_health_locator_logo.png" alt="logo" width="70" height="70" style="padding-left: 1rem; float: left;">
        <h2 >HealthLocator Admin</h2>
        <a href="login.php" style="float: right; padding-right: 1rem;">Logout</a>
        </div>
    <h2>Add User</h2>
    <form method="POST">
    <table>
        <tr><th>Full Name: </th><td><input type="text" name="name" class="ip" required></td></tr>
        <tr><th>Password: </th><td><input type="password" name="password" class="ip" required></td></tr>
        <tr><th>Confirm Password: </th><td><input type="password" class="ip" name="cpassword"></td></tr>
        <tr><th colspan=2><input type="submit" name="submit" class="btn" value="Add User"></th></tr>
    </table>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    if($_POST['password'] == $_POST['cpassword']){
        $stmt = $conn->prepare("INSERT INTO USER (fullname,password) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST['name'], $_POST['password']);
        $stmt->execute();
        echo "<script>alert('User added successfully!'); window.location='admin.php';</script>";
    }else{
        echo "<script>alert('Password and confirm password are different!');</script>";
    }
}
?>
