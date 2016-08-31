<!DOCTYPE html>

<html>
    <head>
    </head>	
    <body>    
	<?php
require('master.php');

?>
<div class="main">
<br />

<a href="DisplayProducts.php?category=<?php echo $_GET["category"];?>" class="marginLeft"><-- Go back to the <?php echo $_GET["category"];?> designs list</a>
<br /><br />
<form class="centered" action="ProductCloseup.php?designid=<?php echo $_GET["designid"];?>&category=<?php echo $_GET["category"];?>" method="post">

<table style="border-left:10px solid #800000;width:90%;margin:auto;">
	<tr style="border-collapse:collapse;">
		<th colspan="2">Design Price and Information</th>
	</tr>

	<tr height="20px"></tr>

	<tr>
			<?php

$cat=$_GET["category"];
 $did = $_GET["designid"]; 
$user = "cpsc";
$pass = "Dominican2012";
$host = "cpscserv";
$dbname = "Tshirts";

$db = new PDO("odbc:Driver={SQL Server Native Client 10.0};Server={$host};Database={$dbname};Uid={$user};Pwd={$pass}", 
                         $user, $pass);
$result = $db->query("SELECT Categories.categoryname,Categories.CategoryID, LogoDesigns.logodesignid, imagefilename, Logodesignname, logodesigndescription, unitprice, LogoDesigns.quantityonhand,LogoDesigns.discontinued FROM Categories  INNER JOIN LogoDesigns on  LogoDesigns.CategoryID =  Categories.CategoryID WHERE LogoDesigns.logodesignid = '$did'");

    foreach($result as $row) {   
	 $name =$row['imagefilename'] ;
	 $id =$row['CategoryID'] ;
$cat= $row["categoryname"];

   echo '<td style="padding:5px;width:50%;">' . '<img src="http://domin.dom.edu/faculty/mpolk/coveryourbacklogoimages/'.$cat.'/'.$name.'"/>'. "</td>";

  echo "<td ID='TableCell' style='padding:5px;width:50%;'>". $row['Logodesignname']. '&nbsp;&nbsp'. $row['unitprice'] .'<br/><br/>'.$row['logodesigndescription'].'<br/><br/>';
  if($row["discontinued"] ==1)
  {
   echo '<span class="redFont">This Item has been discontinued! </span>';  
  }
  else
  {
 echo "<span>QTY:</span><input id='QTY' name='QTY' class='marginLeft' style='width:60px;' />";
 echo "<input type='submit' class='marginLeft' name='AddToCart' value='Add to Cart'/><br/>";
  if($row["quantityonhand"] < 6)
  {
  echo '<span class="redFont">Only '.$row["quantityonhand"].' Left </span>';  
  }
  }
  	if($_POST["QTY"]!=null)
	{
	$num = (int)$_POST["QTY"];
	if ($num >0) 
	{	
 	 echo '<span class="redFont">Your Item Has been Added to your cart! </span><br/><br/>';  

	session_start();
		$_items[ $row['logodesignid'] ] = $_POST["QTY"];
$_SESSION['newItem']= 	$_items; 

	$sValue = $_items[ "1" ];

	echo( $sValue );
	echo '<a href="DisplayProducts.php?category='.$_GET["category"].'"class="marginLeft">Back to '.$_GET["category"].'designs display..</a>';
} else {
	 echo '<span class="redFont">Enter a valid Number </span>';  
}

	 }
    echo "</td></tr></table><br/>";
	echo "</td>";
 echo "<span class='marginLeft'>".$did." </span>";

    }


$db = NULL;
?>
</form>


	</div>

    </body>
</html>