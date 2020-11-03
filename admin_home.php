<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Homepage</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />

	</head>
	<body>

		<?php include"navbar.php";?>

			<div id="section" style="margin-left:0px">

				<?php include"sidebar.php";?><br>

				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>

				</div>

			</div>

		<?php include"footer.php";?>
	</body>
</html>
