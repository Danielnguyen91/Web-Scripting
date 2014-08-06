<!DOCTYPE html >
<!-- Toan Nguyen
   Main file which display all the icon in the map and do the operation -->
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    //<![CDATA[

    
     var customIcons = {
	 Shopping: {
		icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png',
		shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		},
	 MuseumGalleries: {
		icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
		shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		},
	 Parks: {
		icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
		shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		}
	};
    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(48.746342, -122.481966),
        zoom: 12,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;


	
      // Change this depending on the name of your PHP file
      downloadUrl("genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address + '</br>' + 'Coordinate' + point + '</br>' + type;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
	    shadow: icon.shadow 
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>
function show() { 
	document.getElementById('addinfo').style.display = 'block';
	document.getElementById('deleteinfo').style.display = 'none'; 
	document.getElementById('updateinfo').style.display = 'none';}
function show1() { 
	document.getElementById('deleteinfo').style.display = 'block';
	document.getElementById('addinfo').style.display = 'none';
	document.getElementById('updateinfo').style.display = 'none';
	 }
function show2() {
	document.getElementById('updateinfo').style.display = 'block';
	document.getElementById('deleteinfo').style.display = 'none';
	document.getElementById('addinfo').style.display = 'none';
}
  </script>
<style>
p.pos_fixed
{
position:absolute;
left:650px;
top:1px;
}
</style>
<style>
p.pos_fixed2
{
position:absolute;
left:650px;
top:50px;
}
</style>
  </head>

  <body onload="load()">
    <div id="map" style="width: 600px; height: 400px"></div>

	<form action="program4.php" method="POST">
		<br>
		 <P class="pos_fixed">Choose the operation you want to do 
		 <input type="radio" name="do" value="add" onclick="show();">ADD location
		 <input type="radio" name="do" value="delete"onclick="show1();">DELETE location
		 <input type="radio" name="do" value="update" onclick="show2();">UPDATE location </br>
		  
		 <div id="addinfo" style="display:none;">
		<P class="pos_fixed2">
  		  Name</br></br><input type="text" name="name" > </br><br>
		  Address</br></br><input type="text" name="address"></br></br>
		  Latitude</br></br><input type="text" name="lat"></br></br>
		  Longitude</br></br><input type="text" name="lng"></br></br>
		  Type</br></br><input type="text" name="type"></br></br>
		  <input type="submit" name="Add" value="Add location"> 
		</P>
		</div>
		<div id="deleteinfo" style="display:none;">
		<P class="pos_fixed2">
		  <?php
			echo "Choose one of the location you want to delete"; echo "<br/>";
			$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9");
			if (!$DBConnect)
			die("<p>The database server is not available.</p>");
			$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
			$result = mysqli_query($DBConnect,"SELECT markers.Name, markers.address, markers.lat, markers.lng, markers.type FROM markers");
			while ($row = mysqli_fetch_array($result)) {
			$Name = $row{'Name'};
			echo "<input type='checkbox' value='$Name' name='approved[]' />";
			echo "<b>Name: </b>" ;
			echo $row{'Name'}; 
			echo "<b>&nbsp Address:</b> " ;
			echo $row{'address'}; 
			echo "<b>&nbsp latitude:</b> " ;
			echo $row{'lat'}; 
			echo " <b>&nbsp longitude:</b> " ;
			echo $row{'lng'}; 
			echo " <b>&nbsp type:</b> " ;
			echo $row{'type'}; echo "<br/> " ; }
			mysqli_close($DBConnect);
			?>
			</br>
			<input type="submit" name="delete" value="Delete location"> 
		</p>
		</div>
		</P>
		</form>
		<div id="updateinfo" style="display:none;">
		<form action="edit_location.php" method="POST">
		<P class="pos_fixed2">
			
		  <?php
			echo "Choose one of the location you want to edit"; echo "<br/>";
			$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9");
			if (!$DBConnect)
			die("<p>The database server is not available.</p>");
			$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
			$result = mysqli_query($DBConnect,"SELECT markers.id, markers.Name, markers.address, markers.lat, markers.lng, markers.type FROM markers");
			while ($row = mysqli_fetch_array($result)) {
			$id = $row{'id'};
			echo "<input type='checkbox' value='$id' name='approved[]' />";
			echo "<b>Name: </b>" ;
			echo $row{'Name'}; 
			echo "<b>&nbsp Address:</b> " ;
			echo $row{'address'}; 
			echo "<b>&nbsp latitude:</b> " ;
			echo $row{'lat'}; 
			echo " <b>&nbsp longitude:</b> " ;
			echo $row{'lng'}; 
			echo " <b>&nbsp type:</b> " ;
			echo $row{'type'}; echo "<br/> " ; }
			mysqli_close($DBConnect);
			?>
			</br>
			<input type="submit" name="update" value="update location"> 
			
		</p>
			
		</div>
		</form>
		

 </body>
</html>
<?php
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9");
if (!$DBConnect)
die("<p>The database server is not available.</p>");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
if (!$DBSelect)
die("<p>The database is not available.</p>");
if (isset($_POST['Add'])) {
	$name = $_POST['name'];
	$add = $_POST['address'];
	$lat = $_POST['lat'];
	$lgn = $_POST['lng'];
	$type = $_POST['type'];
	mysqli_query($DBConnect,"INSERT INTO markers (name, address, lat, lng, type) VALUES ('$name', '$add', '$lat', '$lgn', '$type');");
	mysqli_close($DBConnect);
	echo "<meta http-equiv='Refresh' content='0; URL=confirmpage.php'>";
}

if (isset($_POST['delete'])) {
		if (isset($_POST["approved"]))
		 {
			foreach($_POST["approved"] as $app)
			{
				$results = mysqli_query($DBConnect,"DELETE FROM markers WHERE name = '$app'") or die (mysql_error());
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL="program4.php">';
				
			}
		}
		else
		{ echo "please choose one the location to delete"; }
}
?>
