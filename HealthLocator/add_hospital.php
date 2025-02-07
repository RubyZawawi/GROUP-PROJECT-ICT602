<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hospital</title>
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
    <h2>Add Hospital</h2>
    <form method="POST">
    <table>
        <tr><th>Hospital Name: </th><td><input type="text" name="name" class="ip" required></td></tr>
        <tr><th>Latitude: </th><td><input type="text" name="lat" class="ip" required></textarea></td></tr>
        <tr><th>Longitude: </th><td><input type="text" name="long" class="ip" required></td></tr>
        <tr><th>Distance (km): </th><td><input type="text" name="distance" class="ip" required></td></tr>
        <tr><th colspan=2><input type="submit" name="submit" class="btn" value="Add Hospital"></th></tr>
        </table>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO hospital (hospital_name, latitude, longitude, distance) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['name'], $_POST['lat'], $_POST['long'], $_POST['distance']);
    $stmt->execute();
    echo "<script>alert('Hospital added successfully!'); window.location='admin.php';</script>";
}
?>
