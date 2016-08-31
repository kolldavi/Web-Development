<!DOCTYPE html>

<html>
    <head>  
    </head>
	<script type="text/javascript">

function getAll() {
	window.location="displayproducts.php?category=all";
}

function getSelected() {
	window.location="displayproducts.php?category=" + document.getElementById("Selection").options[document.getElementById("Selection").selectedIndex].text;
}
	</script>
    <body>        
<?php

require('master.php');
?>

<div class="main">
<br />
<table border="3" width="100%" class="">
	<tr>
		<td style="width:20%;padding:10px;">
			<img src="backtshirt3.png" />
			<br /><br />
			<span class="blueFont">Search facility here</span>
			<br />
			<input type="text" />
			<br /><br />
			<input type="button" value="Search Site" />
		</td>		
		<td style="width:80%;padding:10px;">


			<span class="blueFont">Choose a category:
		<?php

$user = "cpsc";
$pass = "****";
$host = "cpscserv";
$dbname = "Tshirts";
$db = new PDO("odbc:Driver={SQL Server Native Client 10.0};Server={$host};Database={$dbname};Uid={$user};Pwd={$pass}", 
                         $user, $pass);

 $result = $db->query('SELECT DISTINCT categoryname FROM Categories');
echo '<select id="Selection" onchange="getSelected()">
<option>Make a selection...</option>';
    foreach($result as $row) {
      echo '<option value="' . $row['categoryname'] . '">' . $row['categoryname'] . "</option>";
    }
echo "</select>";
$db = NULL

?>

			
	<input type="button" value="... or View All" onclick="getAll()"/>
			<br /><br /><br />
			<h1>Welcome to Cover Your Back T-shirt Designs!</h1>
			<p>Founded in 2001, Cover Your Back T-shirt Designs has been the leading source for creative and innovative designs, meticulously crafted for quality T-shirt transfer. Cover Your Back T-shirt Designs offers a collection of quality graphic designs, ranging from simple dual-color outlines to full color photographic images. Our designs are organized into popular categories, including computer-related designs, nature designs, and graphic arts, super-hero photographs and comic art, popular space images and themes, and several genre examples. And the best news of all is that we cover the copyright issue for our designs.</p>
			<p>In addition, Cover Your Back T-shirt Designs promises prompt delivery and notifications once your order is confirmed. We also provide an order tracking and order history feature for our loyal customers.</p>
			<p>We are always interested in your feedback. So please do not hesitate to contact us if you have any questions about our designs.</p></span>
		</td>
	</tr>
</table>

<br /><br />

<div class="footer">
	&copy; 2012 This is not an actual commercial site. Just a class project!
</div>
			
			</div>
		</div>
    </body>
</html>