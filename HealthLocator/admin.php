<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthLocator Admin</title>
    <style>
        body {background: #dddddd; font-family: Arial, sans-serif; padding: 20px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { background-color: #f4f4f4; border: 1px solid #ddd; padding: 10px; text-align: left; }
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

        <h3>Checkin</h3>
        <table>
            <tr><th>NO</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Age</th><th>Gender</th><th>Location</th><th>Action</th></tr>
            <?php
            $result = $conn->query("SELECT * FROM CHECKIN");
            $num = 0;
            while ($row = $result->fetch_assoc()) {
                $num ++;
                ?><tr>
                    <td><?php echo $num;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td>
                        <a href="edit_checkin.php?id=<?php echo $row['checkin_id'];?>" class='btn' style='background: green;'>Edit</a>
                        <a href="delete_checkin.php?id=<?php echo $row['checkin_id'];?>" class='btn' style='background: red;'>Delete</a>
                    </td>
                </tr><?php
            }
            ?>
        </table>

        <h3>Hospitals</h3>
        <a href="add_hospital.php" class="btn">Add Hospital</a>
        <table>
            <tr><th>NO</th><th>Name</th><th>Latitude</th><th>Longitude</th><th>Distance</th><th>Action</th></tr>
            <?php
            $result = $conn->query("SELECT * FROM HOSPITAL ORDER BY DISTANCE");
            $num = 0;
            while ($row = $result->fetch_assoc()) {
                $num ++;
                ?><tr>
                    <td><?php echo $num;?></td>
                    <td><?php echo $row['hospital_name'];?></td>
                    <td><?php echo $row['latitude'];?></td>
                    <td><?php echo $row['longitude'];?></td>
                    <td><?php echo $row['distance'];?></td>
                    <td>
                        <a href="edit_hospital.php?id=<?php echo $row['hospital_id'];?>" class='btn' style='background: green;'>Edit</a>
                        <a href="delete_hospital.php?id=<?php echo $row['hospital_id'];?>" class='btn' style='background: red;'>Delete</a>
                    </td>
                </tr><?php
            }
            ?>
        </table>

        <h3>Users</h3>
        <a href="add_user.php" class="btn">Add User</a>
        <table>
            <tr><th>NO</th><th>Name</th><th>Password</th><th>Action</th></tr>
            <?php
            $result = $conn->query("SELECT * FROM USER");
            $num = 0;
            while ($row = $result->fetch_assoc()) {
                $num ++;
                ?><tr>
                    <td><?php echo $num;?></td>
                    <td><?php echo $row['fullname'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['userid'];?>" class='btn' style='background: green;'>Edit</a>
                        <a href="delete_user.php?id=<?php echo $row['userid'];?>" class='btn' style='background: red;'>Delete</a>
                    </td>
                </tr><?php
            }
            ?>
        </table>
    </div>
</body>
</html>