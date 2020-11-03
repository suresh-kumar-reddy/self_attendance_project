<?php

$sqll="insert into final_attendance select * from temp_attendance where HID={$_GET["id"]}";
$db->query($sqll);
$sql2="insert into duplicate_hclass select * from hclass where HID={$_GET["id"]}";
$db->query($sql2);

$s="delete from hclass where HID={$_GET["id"]}";
$db->query($s);

$s1="delete from temp_attendance where HID={$_GET["id"]}";
$db->query($s1);

?>
