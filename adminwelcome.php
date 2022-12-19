<?php 

session_start();

if (!isset($_SESSION['adminusername'])) {
    header("Location: adminindex.php");
}
$temp = $_SESSION['adminusername'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: black; font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color: white; color: red;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div>

    </div>
    <div class="banner">
        <?php echo "<h1>Welcome " . $_SESSION['adminusername'] . "</h1>"; ?>
        <div>
            <table>
                <h2>Dashboard</h2>                
                <tr>
                    <th>Your unique ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            
                <?php

                include 'model/config.php';

                $sql = "SELECT * FROM admin WHERE adminusername='$temp'";
                $result = mysqli_query($conn, $sql);

                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['adminusername']."</td><td>".$row['adminemail']."</td></tr>";
                }
                ?>
            </table>
            <div>
            <h2>Users</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <?php

                include 'model/config.php';

                $sql = "SELECT * FROM users;";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['email']."</td></tr>";
                    
                }
                
                ?>
            </table>
            </div>
            <div>
                <br><br>
                <h2>Remove a user (Admin Only)</h2>
                <table>
                    <form method="post">
                    <tr><td></td><td>User's unique ID:</td></tr>
                    <tr><td></td><td><input type="number" name="uid"></td></tr>
                    <tr><td></td><td><input type="submit" value="Delete!!!" name = "delete"></td></tr>
                </table>
                <br><br>

                <?php
                include 'model/config.php';

                if (isset($_POST["delete"])) {
                    $uid = $_POST["uid"];
                    $sql = "DELETE FROM users WHERE id='$uid'";
                    $run = mysqli_query($conn,$sql);
                    if ($run){
                        echo "<h1>User Deleted!</h1>";
                        exit();
                    } else{
                        echo "Error";
                        exit();
                    }
                }
                ?>
                </table>
                <a href="admin_page.php">Admin_center control</a>
            <a href="admin_update.php">Admin_center update</a>
        <div>
            <style>
                a:link, a:visited {
                background-color: white;
                color: black;
                border: 2px solid white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                }
                a:hover, a:active {
                background-color: red;
                color: white;
                }
            </style>
            
            <a href="adminlogout.php">Logout</a>
        </div>
    </div>
</body>
</html>