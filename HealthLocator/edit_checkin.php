<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Check In</title>
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
    <h2>Edit Check In</h2>
    <form method="POST">
    <table>
        <?php
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM checkin WHERE CHECKIN_ID = '$id'");
            while ($row = $result->fetch_assoc()) {
        ?>
        <tr><th>Name: </th><td><input type="text" name="name" value="<?php echo $row['name'];?>" class="ip" required></td></tr>
        <tr><th>Email: </th><td><input type="email" name="email" value="<?php echo $row['email'];?>" class="ip" required></td></tr>
        <tr><th>Phone Number: </th><td><input type="text" class="ip" name="phone" value="<?php echo $row['phone'];?>"></td></tr>
        <tr><th>Age: </th><td><input type="text" class="ip" name="age" value="<?php echo $row['age'];?>"></td></tr>
        <tr><th>Gender: </th><td><input type="text" class="ip" name="gender" value="<?php echo $row['gender'];?>"></td></tr>
        <tr><th>Location: </th><td><input type="text" class="ip" name="location" value="<?php echo $row['location'];?>"></td></tr>
        <tr><th colspan=2><input type="submit" name="submit" class="btn" value="Edit Check In"></th></tr>
        <?php
        }}
        ?>
    </table>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("UPDATE CHECKIN SET NAME = ?, EMAIL = ?, PHONE = ?, AGE = ?, GENDER = ?, LOCATION = ? WHERE Checkin_ID = '$id'");
    $stmt->bind_param("ssssss", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['age'], $_POST['gender'], $_POST['location']);
    $stmt->execute();
    echo "<script>alert('Check in edited successfully!'); window.location='admin.php';</script>";
}
?>
