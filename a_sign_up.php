<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student Performance Analysis System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include"navbar.php";?>
		<img src="img/b.jpg" width="100%">
		
		<div class="login">
			<h1 class="heading">Admin Login</h1>
			<div class="log">
			<?php
				if(isset($_POST["login"]))
				{
					$sql="select * from admin where ANAME='{$_POST["aname"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						echo "<div class='error'>user exists</div>";
						
					}
					else
					{
	 						$sq="insert into admin(ANAME,APASS) values('{$_POST["aname"]}','{$_POST["apass"]}')";
						
						$_SESSION["AID"]=$ro["AID"];
						$_SESSION["ANAME"]=$ro["ANAME"];
						echo "<script>window.open('index.php','_self');</script>";
					}
					
				}
				if(isset($_GET["mes"]))
				{
					echo "<div class='error'>{$_GET["mes"]}</div>";
				}
				
			?>
		
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>Secret Code to Create an Admin</label><br>
					<input type="text" name="code" required class="input" pattern="code"><br><br>
					
					<label>User Name</label><br>
					<input type="text" name="aname" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="apass" required class="input"><br>
					<button type="submit" class="btn" name="login" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">Login Here</button>
					<br>
					<br>
					<p>Already an Admin? <a href="index.php">Login</a></p>
				</form>
			</div>
		</div>
		<div class="footer">
			<footer><p>Sir Vishveshwaraiah Institute of Science & Technology
 </p></footer>
		</div>
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