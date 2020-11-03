<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Staff</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
				<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />
	</head>

	<body>
			<?php include"navbar.php";?>

			<div id="section" style="margin-left:10px;">

				<?php include"sidebar.php";?>
				<div class="content1">

						<h3 > Add Staff Details</h3>
						<br>
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into staff(TNAME,TPASS,QUAL,SAL,PNO,MAIL,PADDR) values('{$_POST["sname"]}','{$_POST["tpass"]}','{$_POST["qual"]}','{$_POST["sal"]}','{$_POST["pno"]}','{$_POST["mail"]}','{$_POST["add"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}

						}

					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>Staff Name</label><br>
					     <input type="text" name="sname" required class="input" pattern="[a-zA-Z]{3,}" title="Enter only Alphabets">
					     <br><br>
					     <label>Password</label><br>
					     <input type="password" name="tpass" required class="input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					   	 <br><br>
					     <label>Qualification</label><br>
					     <input type="text" name="qual" required class="input" pattern="[a-zA-Z]{3,}" title="Enter only Alphabets">
					     <br><br>
					     <label>Salary</label><br>
					     <input type="text" name="sal" required class="input" pattern="[0-9]{3,7}" title="Enter only Digits">
					     <br>
					     <label>Phone number</label><br>
					     <input type="text" name="pno" required class="input" pattern="[0-9]{10}" title="Enter only 10Digits">
					     <br>
					     <label>Mail</label><br>
					     <input type="text" name="mail" required class="input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email address.">
					     <br>
					     <label>Address</label><br>
					     <input type="text" name="add" required class="input">
					     <br>
						 <label>Gender</label><br><br>
					     <input type="radio" name="gender" value ="Male" required=""> Male
						 <input type="radio" name="gender" value="Female"> Female<br>

					     <button type="submit" class="btn" name="submit">Add Staff Details</button>
					</form>


				</div>


			</div>

				<?php include"footer.php";?>
	</body>
</html>
