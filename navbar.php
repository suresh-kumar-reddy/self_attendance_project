<div class="navbar">

			<ul class="list">
				<font size="+2"><b style="color:white;float:left;line-height:50px;margin-left:510px;font-family:times new roman;">
				 Student Self Attendance</b></font>
			<?php
				if(isset($_SESSION["AID"]))
				{
					echo'

						<li><a href="admin_home.php">Home</a></li>
				<li><a href="change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["TID"]))
				{
					echo'

						<li><a href="view_class.php">Home</a></li>
				<li><a href="teacher_change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["RNO"])){
					echo'

					<li><a href="student_home.php">Home</a></li>
				<li><a href="student_change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>';
				}				else{
									echo'

									<li><a href="index.php">Admin Login</a></li>
								<li><a href="teacher_login.php">Faculty Login</a></li>
								<li><a href="student_login.php">Student</a></li>';
								}

			?>

			</ul>
		</div>
