<?php 

session_start();

if (!isset($_SESSION['managerusername'])) {
    header("Location: amanagerindex.php");
}
$temp = $_SESSION['managerusername'];

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM manager WHERE managerusername = '$managerusername'");
    header('location:amanagerwelcome.php');
 };
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
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
        <?php echo "<h1>Welcome " . $_SESSION['managerusername'] . "</h1>"; ?>
        <div>
            <table>
                <h2>Dashboard</h2>                
                <tr>
                    <th>Your ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            
                <?php

                include 'model/config.php';

                $sql = "SELECT * FROM manager WHERE managerusername='$temp'";
                $result = mysqli_query($conn, $sql);

                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['managerusername']."</td><td>".$row['managermail']."</td></tr>";
                }
                ?>
            </table>
            <div>
            </div>
            <div>
                </table>
                <a href="amanager_page.php">Add New Center</a>
                <td>
                    <a href="amanagerwelcome.php?delete={$rows['managerusername']}" class="btn"> <i class="fas fa-trash"></i><a href="amanagerindex.php"> Delete </a></a>
                </td>
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
            
            <a href="amanagerlogout.php">Logout</a>
        </div>
    </div>
</body>
</html>