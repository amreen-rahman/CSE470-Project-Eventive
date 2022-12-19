<?php 

include 'model/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['managerusername'])) {
    header("Location: amanagerwelcome.php");
}

if (isset($_POST['submit'])) {
	$managermail = $_POST['managermail'];
	$managerpassword = $_POST['managerpassword'];

	$sql = "SELECT * FROM manager WHERE managermail='$managermail' AND managerpassword='$managerpassword'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['managerusername'] = $row['managerusername'];
		header("Location: amanagerwelcome.php");
	} else {
		echo "<script>alert('Woops! Manager Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="email.css">

	<title>Manager Login Form </title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Manager Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="managermail" value="<?php echo $managermail; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="managerpassword" value="<?php echo $_POST['managerpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="amanager_register.php">Register Here</a>.</p>
            <p class="login-register-text">Get Back <a href="email.php">Get Back</a></p>
		</form>
	</div>
</body>
</html>