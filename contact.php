<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student Performance Analysis</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include"navbar.php";?>
		<img src="img/b.jpg" width="100%">
		
		<div class="login">
			<h1 class="heading">Contact Us</h1>
			<div class="cont">
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					SVIST(Sir Vishveshwaraiah Institute of Science & Technology)<BR>
					Angallu, Madanapalle,<BR>
                                        Chittoor District,
                                        Andhra Pradesh-517325<BR>
					Mail - admin@svist.in<br>Phone: 08571-280888
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