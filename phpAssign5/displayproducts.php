<!DOCTYPE html>

<html>
    <head>
    </head>
	<script type="text/javascript">
function goHome() {
	window.location="index.php";
}
	</script>
    <body>        
<?php
require('master.php');
?>
			<div class="main">			
<input type="button" value="View other designs" onclick="goHome()" class="rightButton" />

<br />
<span class="blueFont" style="margin-left:30px;">View <span style="font-style:italic;"><?php echo $_GET['category'];?></span> designs from our inventory:</span>
<br /><br /><br />

<table width="90%" align="center">
	<tr>
		<th width="10%">&nbsp;</th>
		<th width="30%">Logo Design</th>
		<th width="45%">Description</th>
		<th width="15%" align="right">Unit Price</th>
	</tr>
	<tr style="height:20px;"></tr>	
	<tr style='height:110px;'>
<?php
$class=$_GET["category"];
$sign = "=";
if($class == "all")
{
$sign = "!=";
}

$user = "cpsc";
$pass = "Dominican2012";
$host = "cpscserv";
$dbname = "Tshirts";

$db = new PDO("odbc:Driver={SQL Server Native Client 10.0};Server={$host};Database={$dbname};Uid={$user};Pwd={$pass}", 
                         $user, $pass);
$result = $db->query("SELECT Categories.CategoryID, LogoDesigns.logodesignid, imagefilename, Logodesignname, logodesigndescription, unitprice FROM Categories  INNER JOIN LogoDesigns on  LogoDesigns.CategoryID =  Categories.CategoryID WHERE Categories.CategoryName $sign '$class'");

    foreach($result as $row) {   
	 $name =$row['imagefilename'] ;
	 $id =$row['logodesignid'] ;

   echo "<td>" . '<a href="ProductCloseup.php?designid='.$id.'&category='.$class.'"><img src="http://domin.dom.edu/faculty/mpolk/coveryourbacklogoimages/thumbs/'.$name.'"/>'. "</td>";
  echo "<td align='center' class='blueFont'>". $row['Logodesignname']. "</td>";
  echo "<td style='font-style:italic;' class='blueFont'>". $row['logodesigndescription'] . "</td>";
  echo "<td align='right' class='blueFont'>" . $row['unitprice'] . "</td>";
  echo "</tr>";
    echo "</tr>";
    }
$db = NULL;
?>
	</div>
    </body>
</html>