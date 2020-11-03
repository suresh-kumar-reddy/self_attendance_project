<?php
	include "database.php";
	session_start();
  $present=1;

	  $rno=$_SESSION["RNO"];

	$s="UPDATE temp_attendance,hclass SET
	temp_attendance.HID = hclass.HID,
	temp_attendance.TNAME = hclass.TNAME,
	temp_attendance.CLA = hclass.CLA,
	temp_attendance.CSEM = hclass.CSEM,
	temp_attendance.SEC = hclass.SEC,
	temp_attendance.SUB = hclass.SUB,
	temp_attendance.DATE = hclass.DATE,
	temp_attendance.FROM_TIME = hclass.FROM_TIME,
	temp_attendance.TO_TIME = hclass.TO_TIME where hclass.HID={$_GET["id"]} AND temp_attendance.RNO='".$rno."' and temp_attendance.HID=0";

	$db->query($s);

	$s="UPDATE temp_attendance,hclass SET
	temp_attendance.HID = hclass.HID,
	temp_attendance.TNAME = hclass.TNAME,
	temp_attendance.CLA = hclass.CLA,
	temp_attendance.CSEM = hclass.CSEM,
	temp_attendance.SEC = hclass.SEC,
	temp_attendance.SUB = hclass.SUB,
	temp_attendance.DATE = hclass.DATE,
	temp_attendance.FROM_TIME = hclass.FROM_TIME,
	temp_attendance.TO_TIME = hclass.TO_TIME where hclass.HID={$_GET["id"]} AND temp_attendance.HID=''";

	$db->query($s);


	$name=$_SESSION["NAME"];




  $s1="update temp_attendance set PRESENT='$present' where HID={$_GET["id"]} and RNO='".$rno."'";

  $db->query($s1);

  echo "<script>window.open('student_home.php?mes=Present..','_self');</script>";

?>
