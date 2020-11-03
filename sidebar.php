<div class="sidebar"><br>
<h3 class="text">Dashboard</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["AID"]))
	{
		echo'
			<li class="li"><a href="add_class.php"> Semester</a></li>
			<li class="li"><a href="add_sub.php"> Subject</a></li>

			<li class="li"><a href="add_staff.php"> Add Staff</a></li>

			<li class="li"><a href="view_staff.php">View Staff</a></li>
			<li class="li"><a href="handle_class.php"> Assign Class</a></li>

			<li class="li"><a href="add_stud.php"> Add Student</a></li>
			<li class="li"><a href="studentS.php"target="_blank"> View Students</a></li>
			<li class="li"><a href="view_student.php"target="_blank"> View Student</a></li>
			<li class="li"><a href="view_failures.php"> View Failures</a></li>
			<li class="li"><a href="view_distinctions.php"> View Distinctions</a></li>
			<li class="li"><a href="view_marks_admin.php"> View Result</a></li>
			<li class="li"><a href="results.php"target="_blank">Results Section wise</a></li>
			<li class="li"><a href="bar.php"target="_blank">Reports on average marks of all</a></li>
			<li class="li"><a href="reports.php"target="_blank"> Average marks based on Semester </a></li>

			<li class="li"><a href="logout.php">Logout</a></li>

		';


	}
	elseif(isset($_SESSION["TID"])){
			echo'
				<li class="li"><a href="view_class.php"> Take Attendance</a></li>

				<li class="li"><a href="t_view_attendace.php"> View Attendance</a></li>

				<li class="li"><a href="report.php"> View Time Table</a></li>

				<li class="li"><a href="feedback_form.php"> Feedback</a></li>

				<li class="li"><a href="teacher_home.php"> View Profile</a></li>

			';
	}

	elseif(isset($_SESSION["RNO"])){
			echo'
				<li class="li"><a href="student_home.php"> View My Class</a></li>

				<li class="li"><a href="view_attendace.php"> View Attendance</a></li>
				<li class="li"><a href="report.php"> View Time Table</a></li>

				<li class="li"><a href="report.php"> View Results</a></li>

				<li class="li"><a href="feedback_form.php"> Feedback</a></li>

				<li class="li"><a href="report.php"> View Profile</a></li>

			';
	}


?>


</ul>

</div>
