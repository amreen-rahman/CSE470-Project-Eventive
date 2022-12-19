<?php 

include 'model/config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['managerusername'])) {
    header("Location: amanagerindex.php");
}

if (isset($_POST['submit'])) {
	$managerusername = $_POST['managerusername'];
	$managermail = $_POST['managermail'];
	$managerpassword = md5($_POST['managerpassword']);
	$cpassword = md5($_POST['cpassword']);

	if ($managerpassword == $cpassword) {
		$sql = "SELECT * FROM manager WHERE managermail='$managermail'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO manager (managerusername, managermail, managerpassword)
					VALUES ('$managerusername', '$managermail', '$managerpassword')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Manager Registration Completed.')</script>";
				$managerusername = "";
				$managermail = "";
				$_POST['managerpassword'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something went wrongt.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password is incorrect.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="email.css">

	<title>Manager Register Form </title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="managerusername" value="<?php echo $managerusername; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="managermail" value="<?php echo $managermail; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="managerpassword" value="<?php echo $_POST['managerpassword']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Already have an account? <a href="amanagerindex.php">Login Here</a>.</p>
            <p class="login-register-text">Get Back <a href="email.php">Get Back</a>.</p>
		</form>
	</div>
</body>
</html>