<html>
    <head>  
        <title>Cover Your Back T-Shirts</title>
        <link href="site.css" rel="stylesheet" type="text/css" />
    </head>
	
    <body>        
	<?php
	session_start();
	if($_items == null)
	{
   $_items = array();
   echo sizeof($_items);
   $_items =$_SESSION['newItem'];
	echo "views = ". $_SESSION['newItem']; 
	echo sizeof($_items);
}


	?>
		<div class="page">
			<div class="header">
				<div class="title">
					<h1>
						COVER YOUR BACK T-SHIRT DESIGNS
					</h1>
				</div>
				
				<div class="clear hideSkiplink">
					<div class="menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="soontocome.php">About</a></li>
							<li><a href="soontocome.php">Contact Us</a></li>							
							<li><a href="ViewCart.php"><img src="shoppingcart.png" />&nbsp;&nbsp;&nbsp; ViewCart (<?php echo sizeof($_items);?>)</a></li>
						</ul>
					</div>
				</div>

		</div>
    </body>
</html>