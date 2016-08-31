<?php
$class=$_GET["Class"];
$year=$_GET["Year"];
$make=$_GET["Make"];
$newUsed=$_GET["UsedOrNew"];

$command1 = "=";
$command2 = "=";
$command3 = "=";
$command4 = "=";

if($class =="ALL")
{
$command1 ="!=";
}
if($year == "ALL")
{
$command2  = "!=";
$year = 0;
}
if($make =="ALL")
{
$command3 ="!=";
}
if($newUsed =="ALL")
{
$command4 ="!=";
}

$user = "cpsc";
$pass = "Dominican2012";
$host = "cpscserv";
$dbname = "boats";

$db = new PDO("odbc:Driver={SQL Server Native Client 10.0};Server={$host};Database={$dbname};Uid={$user};Pwd={$pass}", 
                         $user, $pass);

$result = $db->query("SELECT * FROM boats WHERE class $command1 '".$class."' AND Make $command3 '".$make."' AND UsedOrNew $command4 '".$newUsed."'  AND year $command2  ".$year);

echo "<table border='1'>
<tr>
<th>Class</th>
<th>Price</th>
<th>UsedOrNew</th>
<th>Make</th>
<th>Length</th>
<th>Year</th>
</tr>";
    foreach($result as $row) {
     echo "<tr>";
  echo "<td>" . $row['Class'] . "</td>";
  echo "<td>" . '$ '. $row['Price'].'0'. "</td>";
  echo "<td>" . $row['UsedOrNew'] . "</td>";
  echo "<td>" . $row['Make'] . "</td>";
  echo "<td>" . $row['Length'] . "</td>";
   echo "<td>" . $row['Year'] . "</td>";
  echo "</tr>";
    }

$db = NULL;
?>
