<?php
	include"database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />

	</head>
	<body class="back">

		<?php include"navbar.php";?>

		<div class="login" style="margin-left:10px;">
			<h1 class="heading">Student Login</h1>
			<div class="log">
				<?php
					if(isset($_POST["login"]))
					{
						$sql="select * from student where RNO='{$_POST["rno"]}' and PHO='{$_POST["phone"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["RNO"]=$ro["RNO"];
							$_SESSION["NAME"]=$ro["NAME"];
							echo "<script>window.open('student_home.php','_self');</script>";
						}
						else
						{
							echo "<div class='error'>Invalid Username Or Password</div>";
						}
					}



				?>

				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>Register Number</label><br>
					<input type="text" name="rno" required class="input"  placeholder="In CAPITALS(ex. 16MCAR0094)"><br><br>
					<label>Phone Number</label><br>
					<input type="text" name="phone" required class="input"  placeholder="10 digit phone number">
					<a href="s_forgot_pass.php">Forgot password?</a><br>
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>



	<?php include("footer.php"); ?>
			<script src="js/jquery.js"></script>
		         <script>
		        $(document).ready(function(){
		        	$(".error").fadeTo(1000, 100).slideUp(1000, function(){
		        			$(".error").slideUp(1000);
		        	});

		        	$(".success").fadeTo(1000, 100).slideUp(1000, function(){
		        			$(".success").slideUp(1000);
		        	});
		        });
			</script>

	</body>
</html>
