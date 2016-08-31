<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="site.css" rel="stylesheet" type="text/css" />
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Boats</title>
<script type="text/javascript">
function getXMLHttp() {
	var xmlHttp;
	try {
		//Firefox, Opera 8.0+, Safari
		xmlHttp = new XMLHttpRequest();
	}
	catch(e) {
		//Internet Explorer
		try {
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e) {
			try {
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e) {
				alert("Your browser does not support AJAX!");
				return false;
			}
		}
	}
	return xmlHttp;
}



 function getdbclassinfo() {
   xmlHttpReqObj = getXMLHttp();
   xmlHttpReqObj.onreadystatechange = function(){
   	if(xmlHttpReqObj.readyState == 4) {
			if(xmlHttpReqObj.status != 200)
				document.getElementById("lists").innerHTML = "OH NO -- PROBLEM!";
			else	
			document.getElementById("lists").innerHTML = xmlHttpReqObj.responseText;
			}	
		}
   xmlHttpReqObj.open("GET", "getNames.php", true);
    xmlHttpReqObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttpReqObj.send();
	delete XMLHttpRequestObject;
	XMLHttpRequestObject = null;	
}

function showBoats() {
	var Class = document.getElementById("Class").options[document.getElementById("Class").selectedIndex].text;
	var Year = document.getElementById("Year").options[document.getElementById("Year").selectedIndex].text;
	var Make = document.getElementById("Make").options[document.getElementById("Make").selectedIndex].text;
	var UsedOrNew = document.getElementById("Usedornew").options[document.getElementById("Usedornew").selectedIndex].text;
	
	xmlHttpReqObj = getXMLHttp();
	xmlHttpReqObj.onreadystatechange = function() {
		if(xmlHttpReqObj.readyState == 4) {
			if(xmlHttpReqObj.status != 200)
				document.getElementById("resultDiv").innerHTML = "OH NO -- PROBLEM!";
			else	
			document.getElementById("resultDiv").innerHTML = xmlHttpReqObj.responseText;
				
		}
	}
	xmlHttpReqObj.open("GET", "getInfo.php?Class="+Class+"&Year="+Year+"&Make="+Make+"&UsedOrNew="+UsedOrNew, true);
	xmlHttpReqObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttpReqObj.send();
}
</script>


</head>

<body>
	<div class="header">***** FLOAT YOUR BOATS ***** FLOAT YOUR BOATS ***** FLOAT YOUR BOATS *****</div>

		<div class="page">	
			<div class="left">
				<div class="largeHeader">FLOAT YOUR BOATS</div>
				<br />
				<div class="infotxt">	
					Float Your Boats with the widest selection of boat ads with over 1000 new and used boat listings to search. Float Your Boats attracts an audience of more than 3 hundred boating enthusiasts each month who perform in excess of 1 million searches for new and used boats, aluminum fishing boats, cruisers, pontoons, deck boats, bass boats, bow riders, cigarette boats, and cruisers.
					<br />
					Take a look -- you just might find the boat for you!
				</div>
				<br /><br /><br />
				
				<div style="position:absolute;">
					Select a boat
					<br />
					<span class="bold">Class:</span>
					<br />		
				</div>					
				<div style="position:absolute; margin-left:190px;">
					Select a
					<br />
					<span class="bold">Year:</span>
					<br />
					</div>
					
				<div style="position:absolute; margin-left:290px;">
					Select a boat
					<br />
					<span class="bold">Make:</span>
					<br />
					</div>
					<div style="position:absolute; margin-left:430px;">
					Select
					<br />
					<span class="bold">Used/New:</span>
					<br />
					</div>
				
					<br />	<br />	
<div id="lists" >
<script type="text/javascript">
getdbclassinfo();
</script>
</div>
<input type="button" class="button" onclick="showBoats()" value="Show me matching boats!" />
</div>
		
			<img class="right" src="animation.gif" />			
			<div id="resultDiv" style="padding-top:500px;padding-bottom:50px;"></div>			
			<div style="padding-top:0px;">
				<span class="italic bold" style="margin-left:250px;">Here are a few boat review sites we thought might be useful to fellow good old boaters:</span>
				<br /><br />				
				<div style="margin-left:250px;width:290px;position:absolute;">
					<span class="bold">BLUEWATER BOATS</span>
					<br />
					<a href="http://bluewaterboats.org" target="_blank">http://bluewaterboats.org</a>
					<br />
					A collaborative resource of sailboat reviews for our cruising community.
				</div>			
				<div style="margin-left:600px;">
					<span class="bold">BOATING.COM</span>
					<br />
					Boat Reviews at
					<br />
					<a href="http://www.boating.com/research/manufactures" target="_blank">http://www.boating.com/research/manufactures</a>
					<br />
					Online source for boat reviews and other get research tools.
				</div>		
				
				<div style="margin-left:250px;width:290px;margin-top:30px;position:absolute;">
					<span class="bold">Boat Trader Online</span>
					<br />
					<a href="http://www.boattraderonline.com" target="_blank">http://www.boattraderonline.com</a>
					<br />
					Offers a cool price checker and boat search tool.
				</div>
				
				<div style="width:410px;margin-top:30px;margin-left:600px;">
					<span class="bold">BoatUS Value Check</span>
					<br />
					<a href="http://www.boatus.com/buyer/valueform.asp/i" target="_blank">http://www.boatus.com/buyer/valueform.asp/i></a>
					<br />
					Offers up-to-date sales data, general guidance on buying and selling, and some not commonly known model-specific details.
				</div>				
				<div style="width:100%;text-align:center;padding:50px 0 50px;">&copy; 2012 David Koller</div>				
			</div>				
		</div>

</body>
</html>