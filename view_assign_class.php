<?php
	include"database.php";

	$sql="SELECT * FROM hclass WHERE HID LIKE '{$_POST["s"]}%' ";
	$res=$db->query($sql);
		echo "<table border='1px' class='table'>
				<tr>
					<th>S.No</th>
					<th>Prof</th>
					<th>Class</th>
					<th>Semester</th>
					<th>Section</th>
					<th>Subject</th>
					<th>Date</th>
					<th>From</th>
					<th>To</th>

					<th>Delete</th>

				</tr>
				";
	if($res->num_rows>0)

	{
		$i=0;
		while($row=$res->fetch_assoc())
		{
			$i++;
			echo "<tr>
				<td>{$i}</td>
				<td>{$row["TNAME"]}</td>
				<td>{$row["CLA"]}</td>
				<td>{$row["CSEM"]}</td>

				<td>{$row["SEC"]}</td>
				<td>{$row["SUB"]}</td>
				<td>{$row["DATE"]}</td>
				<td>{$row["FROM_TIME"]}</td>
				<td>{$row["TO_TIME"]}</td>

				<td><a href='hclass.php?id={$row["HID"]}' class='btnr'>Delete</a></td>

				</tr>
			";
		}
				echo "</table>";
	}

	else
	{
		echo "<p>No Record Found</p>";
	}

?>
