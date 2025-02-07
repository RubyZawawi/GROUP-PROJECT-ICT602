<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
    <h2>Edit Hospital</h2>
    <form method="POST">
    <table>
        <?php
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM HOSPITAL WHERE HOSPITAL_ID = '$id'");
            while ($row = $result->fetch_assoc()) {
        ?>
        <tr><th>Hospital Name: </th><td><input type="text" name="name" value="<?php echo $row['hospital_name'];?>" class="ip" required></td></tr>
        <tr><th>Latitude: </th><td><input type="text" name="lat" value="<?php echo $row['latitude'];?>" class="ip" required></textarea></td></tr>
        <tr><th>Longitude: </th><td><input type="text" name="long" value="<?php echo $row['longitude'];?>" class="ip" required></td></tr>
        <tr><th>Distance (km): </th><td><input type="text" name="distance" value="<?php echo $row['distance'];?>" class="ip" required></td></tr>
        <tr><th colspan=2><input type="submit" name="submit" class="btn" value="Edit Hospital"></th></tr>
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
    $stmt = $conn->prepare("UPDATE hospital SET hospital_name = ?, latitude = ?, longitude = ?, distance = ? WHERE HOSPITAL_ID = '$id'");
    $stmt->bind_param("ssss", $_POST['name'], $_POST['lat'], $_POST['long'], $_POST['distance']);
    $stmt->execute();
    echo "<script>alert('Hospital edited successfully!'); window.location='admin.php';</script>";
}
?>
