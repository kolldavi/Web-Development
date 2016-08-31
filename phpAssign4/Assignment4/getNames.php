<?php

$user = "cpsc";
$pass = "*****";
$host = "cpscserv";

$dbname = "boats";
$db = new PDO("odbc:Driver={SQL Server Native Client 10.0};Server={$host};Database={$dbname};Uid={$user};Pwd={$pass}", 
                         $user, $pass);

 $result = $db->query('SELECT DISTINCT Class FROM boats');
echo '<div style="position:absolute;">';
echo '<select id="Class"><option value="all">ALL</option>';
    foreach($result as $row) {
      echo '<option value="' . $row['Class'] . '">' . $row['Class'] . "</option>";
    }
echo "</select>";
echo '</div>';
$result = $db->query('SELECT DISTINCT Year FROM boats');
echo '<div style="position:absolute; margin-left:190px;">';
echo '<select id="Year"><option value="all">ALL</option>';
    foreach($result as $row) {
      echo '<option value="' . $row['Year'] . '">' . $row['Year'] . "</option>";
    }
echo "</select>";
echo '</div>';
$result = $db->query('SELECT DISTINCT Make FROM boats');
		echo	'<div style="position:absolute; margin-left:290px;">';
echo '<select id="Make"><option value="all">ALL</option>';
    foreach($result as $row) {
      echo '<option value="' . $row['Make'] . '">' . $row['Make'] . "</option>";
    }
echo "</select>";
echo '</div>';
$result = $db->query('SELECT DISTINCT Usedornew FROM boats');
echo '<div style="position:absolute; margin-left:430px;">';
echo '<select id="Usedornew"><option value="all">ALL</option>';
    foreach($result as $row) {
      echo '<option value="' . $row['Usedornew'] . '">' . $row['Usedornew'] . "</option>";
    }
echo "</select>";

echo '</div>';


$db = NULL

?>
