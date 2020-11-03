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
		<title>View Staff</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
				<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />
	</head>

	<body>
			<?php include"navbar.php";?>

				<div id="section" style="margin-left:10px;">
					<?php include"sidebar.php";?><br><br><br>

					<div class="content1">

						<h3 > Enter Staff name</h3><br>
						<form id="frm" autocomplete="off">
							<input type="text" id="txt" class="input" pattern="[a-zA-Z]{3,}" title="Enter only Alphabets">
						</form>
						<br>
						<div id="box"></div>

					</div>
				</div>


			<?php include"footer.php";?>

			<script>
				$(document).ready(function(){
					$("#txt").keyup(function(){
						var txt=$("#txt").val();
						if(txt!="")
						{
							$.post("search.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}

					});



				});
			</script>
	</body>
</html>
