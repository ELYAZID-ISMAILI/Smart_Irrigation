<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);
global $str;
$dbname='/home/pi/projet_PFA/temp_hum.db'; 
$mytable ="info";
$data=array();
if(!class_exists('SQLite3'))
  die("SQLite 3 NOT supported.");

$base=new SQLite3($dbname); 
$res=$base->query('SELECT date_time,temp_c,humidity,q_courant,Debit from info');
while ($row = $res->fetchArray()) {
    //$jsonArray[] = $row;
	array_push($data,$row);
}
echo json_encode($data)
//echo json_encode($out);
?>

