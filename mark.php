<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	if(isset($_GET["rno"]))
	{
		$sql="select * from student where RNO='{$_GET["rno"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$class=$rows["SCLASS"];
			$regno=$_GET["rno"];
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Marks</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
	
			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
					
					<h3>Add Marks</h3><br>
					<?php

					
						if(isset($_POST["submit"]))
						{
								$mark1=$_POST['mark1'];
								$mark2=$_POST['mark2'];
								$mark3=$_POST['mark3'];
								$mark4=$_POST['mark4'];
								$mark5=$_POST['mark5'];
								$total=$mark1+$mark2+$mark3+$mark4+$mark5;
								$avg=$total/500*100;
								if ($avg < 40 ) {
									$grade="d";

									# code...
								}
								elseif ($avg < 55) {
									# code...
									$grade="c";
								}
								elseif ($avg < 65) {
									# code...
									$grade="b";
								}
								elseif ($avg < 80) {
									# code...
									$grade="a";
								}
								else
								{
									$grade="a+";
								}
								
								if ( $mark1 < 40 OR $mark2 < 40 OR $mark3 < 40 OR $mark4 < 40 OR $mark5 < 40 )
								{

									$status="fail";
								}	
								else
								{
									$status="pass";
								}

								if ($status=="fail")
								{
									$reason=$_POST['reason'];
										
									if ( $reason=="")
									{
										echo "Student failed. Please try again and fill the reason.";
										exit();
									}
								}
								else
								{
									$reason="";
								}
							$sq="insert into mark(REGNO,SUB1,SUB2,SUB3,SUB4,SUB5,MARK1,MARK2,MARK3,MARK4,MARK5,CLASS,TOTAL,AVG,GRADE,STATUS,REASON) values ('{$_POST["regno"]}','{$_POST["sub1"]}','{$_POST["sub2"]}','{$_POST["sub3"]}','{$_POST["sub4"]}','{$_POST["sub5"]}','{$_POST["mark1"]}','{$_POST["mark2"]}','{$_POST["mark3"]}','{$_POST["mark4"]}','{$_POST["mark5"]}','{$_POST["class"]}','$total','$avg','$grade','$status','$reason')";
							    
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
							
						}
					
					
					
					?>
					
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
							<label> Register No</label><br>
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input3" name="regno" readonly><br><br>
							
							<label>Class</label><br>
							<input type="text" style="background:#b1b1b1;"  value="<?php echo $class ?>" class="input3" name="class" readonly><br><br>
							
				
						</div>
						<div class="rbox">
							
						<label>Subject</label><br>
							<select name="sub1" required class="input3">
						
								<?php 

									 $s="SELECT * FROM sub where CLASS='$class'";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
													
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input3" name="mark1"  id="mark" type="mark" required pattern="[0-9].{0,1}" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" />
							    
							    <span id="error" style="color: Red; display: none">* Marks (0 - 100)</span>
							    <script type="text/javascript">
							        var specialKeys = new Array();
							        specialKeys.push(8); //Backspace
							        function IsNumeric(e) {
							            var keyCode = e.which ? e.which : e.keyCode
							            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
							            document.getElementById("error").style.display = ret ? "none" : "inline";
							            return ret;
							        }
							    </script>
							<br><br>

                           
							<label>Subject</label><br>
							<select name="sub2" required class="input3">
						
								<?php 

									 $s="SELECT * FROM sub where CLASS='$class'";
									$re=$db->query($s);

										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input3" name="mark2"  id="mark" type="mark" required pattern="[0-9].{0,1}" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" />
							    
							    <span id="error" style="color: Red; display: none">* Marks (0 - 100)</span>
							    <script type="text/javascript">
							        var specialKeys = new Array();
							        specialKeys.push(8); //Backspace
							        function IsNumeric(e) {
							            var keyCode = e.which ? e.which : e.keyCode
							            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
							            document.getElementById("error").style.display = ret ? "none" : "inline";
							            return ret;
							        }
							    </script><br><br>
						    	
							<label>Subject</label><br>
							<select name="sub3" required class="input3">
						
								<?php 

									 $s="SELECT * FROM sub where CLASS='$class'";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input3" name="mark3"  id="mark" type="mark" required pattern="[0-9].{0,1}" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" />
							    
							    <span id="error" style="color: Red; display: none">* Marks (0 - 100)</span>
							    <script type="text/javascript">
							        var specialKeys = new Array();
							        specialKeys.push(8); //Backspace
							        function IsNumeric(e) {
							            var keyCode = e.which ? e.which : e.keyCode
							            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
							            document.getElementById("error").style.display = ret ? "none" : "inline";
							            return ret;
							        }
							    </script>
							<br><br>
								
						<label>Subject</label><br>
							<select name="sub4" required class="input3">
						
								<?php 

									 $s="SELECT * FROM sub where CLASS='$class'";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input3" name="mark4"  id="mark" type="mark" required pattern="[0-9].{0,1}" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" />
							    
							    <span id="error" style="color: Red; display: none">* Marks (0 - 100)</span>
							    <script type="text/javascript">
							        var specialKeys = new Array();
							        specialKeys.push(8); //Backspace
							        function IsNumeric(e) {
							            var keyCode = e.which ? e.which : e.keyCode
							            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
							            document.getElementById("error").style.display = ret ? "none" : "inline";
							            return ret;
							        }
							    </script>
					    <br><br>				
						<label>Subject</label><br>
							<select name="sub5" required class="input3">
						
								<?php 

									 $s="SELECT * FROM sub where CLASS='$class'";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input3" name="mark5"  id="mark" type="mark" required pattern="[0-9].{0,1}" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" />
							    
							    <span id="error" style="color: Red; display: none">* Marks (0 - 100)</span>
							    <script type="text/javascript">
							        var specialKeys = new Array();
							        specialKeys.push(8); //Backspace
							        function IsNumeric(e) {
							            var keyCode = e.which ? e.which : e.keyCode
							            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
							            document.getElementById("error").style.display = ret ? "none" : "inline";
							            return ret;
							        }
							    </script>
							<br><br>
							<br><br>
							<label >Reason to fail(if failed only):</label><br>
							<input class="input3" name="reason"  id="mark" type="mark">
							<br><br>
							
							<button type="submit" style="float:right;" class="btn" name="submit"> Add Mark Details</button>
					</form>							
						</div>
						
				</div>
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>