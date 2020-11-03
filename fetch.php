<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["CLASS"]))
{
 $query = "
 SELECT * FROM mark 
 WHERE CLASS = '".$_POST["CLASS"]."' 
 ORDER BY id ASC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'SUB1'   => $row["SUB1"],
   'MARK1'  => floatval($row["MARK1"])
  );
 }
 echo json_encode($output);
}

?>