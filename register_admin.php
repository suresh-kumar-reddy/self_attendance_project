<?php include('server.php') ?>

<!DOCTYPE>
<html>
<head>
<style>

<title> Welcome to Student Performance Analysis</title>
#body{
  width: 100%;
  height: auto;
}
#outer
{
}#form{
	height: 380px;
	width: 240px;
	opacity: 0.8;
  margin-top:100px;
}
.a{
	height: 40px;
	width: 240px;
border-radius: 10px;
	margin-top: 20px;
	margin-left: 20px;
}
.b{
	height: 40px;
	width: 240px;
border-radius: 10px;
	margin-top: 20px;
	margin-left: 20px;
	}		h1{
			color: white;
			text-align: left;

		}

		.Student {
  			overflow: hidden;
  			background-color: transparent;
		}

    	.Student a {
  			float: right;
  			display: block;
  			color: white;
  			text-align:left;
  			padding: 14px 16px;
  			text-decoration: none;
  			font-size: 17px;
  			
		}


		.Student a.active {
    		background-color: transparent;
    		color: white;
    	}
		.Student a:hover {
  			background-color: gray;
  			color: white;
		}
		d1
		{
			opacity: 1.0;
			
		}
		.Students {
  			overflow: hidden;
  			background-color: transparent;
		}

    	.Students a {
  			float: left;
  			display: block;
  			color: white;
  			text-align:left;
  			padding: 14px 16px;
  			text-decoration: none;
  			font-size: 17px;
  			margin-left: 500px;

		}


		.Students a.active {
    		background-color: transparent;
    		color: white;
    	}
		.Students a:hover {
  			background-color: gray;
  			color: white;
        * {
  margin: 0px;
  padding: 0px;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: gray;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
		}
		 
</style>
</head>

<body bgcolor=black link=white text=white  leftmargin=0% topmargin=0%>
	<br>
<br> 
	<h1>Student Performance Analysis</h1>
	<hr>
	<div class="Student" >
  	<a class="active" href="index.php">| HOME |</a>
	</div>
  <hr>

<br>
<h1 style="
  			margin-left: 50px;"> ADMIN REGISTER </h1>
  <div class="a">
  <form method="post" action="register_admin.php">
    <?php include('errors.php'); ?>
      <input class="a" type="text" name="code" placeholder="code" pattern="code" title="You must enter code in order to create user" /><br>
    
      <input class="a" type="text" name="username" placeholder="User name"/><br>
      <input class="a" type="password" name="password_1" title="Password" placeholder="Password" /><br>
      <input class="a" type="password" name="password_2" placeholder="Confirm Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /><br>
      <button type="submit" class="b" name="reg_user">Register</button> 
    <p class="a" style="" color="white">
      Already a member? <a href="index.php">Sign in</a>
    </p>
  </form>
  </div>   
</body>
</html>
