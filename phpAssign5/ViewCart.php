<!DOCTYPE html>

<html>
    <head>
   
    </head>
	
    <body>        
<?php
require('master.php');
?>
			<div class="main">
<h1 class="bigFont">SHOPPING CART CONTENTS:</h1>
<br />

<table width="90%" align="center">
	<tr>
		<th width="15%">&nbsp;</th>
		<th width="25%">Logo Design</th>
		<th width="25%">Design Name</th>
		<th width="5%">Qty</th>
		<th width="15%">Unit Price</th>
		<th width="15%">Total Price</th>
	</tr>
<?php
$user = "cpsc";
$pass = "Dominican2012";
$host = "cpscserv";
$dbname = "Tshirts";
$total=0;

echo "<td><td/>";
$db = new PDO("odbc:Driver={SQL Server Native Client 10.0};Server={$host};Database={$dbname};Uid={$user};Pwd={$pass}", 
                         $user, $pass);

 


foreach( $_items as $id => $val){
echo "<tr>";
$result = $db->query("SELECT Categories.categoryname, Categories.CategoryID, LogoDesigns.logodesignid, imagefilename, Logodesignname, logodesigndescription, unitprice, LogoDesigns.quantityonhand,LogoDesigns.discontinued FROM Categories  INNER JOIN LogoDesigns on  LogoDesigns.CategoryID =  Categories.CategoryID WHERE LogoDesigns.logodesignid = '$id'");
foreach($result as $row) {  
$class =$row['categoryname'] ;
	 $name =$row['imagefilename'] ;
	 $id =$row['logodesignid'] ;

   echo "<td>" . '<a href="ProductCloseup.php?designid='.$id.'&category='.$class.'"><img src="http://domin.dom.edu/faculty/mpolk/coveryourbacklogoimages/thumbs/'.$name.'"/>'. "</td>";
	echo "<td>". $row['Logodesignname']. "<td/>";
		echo "<td>". $val. "<td/>";
				echo "<td>". $row['unitprice']. "<td/>";
			echo "<td>".$val * $row['unitprice']. "<td/>";
		$total +=$val * $row['unitprice'];
	//echo "id: $id, qty: $val <br />";
}
}
echo "<td> Grand Total: ".$total. "<td/>";
 echo "</td></tr></table><br/>";
$db = NULL
?>
		</div>
    </body>
</html>