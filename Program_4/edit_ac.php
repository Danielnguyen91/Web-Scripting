<?php
/* Toan Nguyen
The edit page to edit information about the marker */
$Name = $_POST['name'];
$add = $_POST['add'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];
$app = $_POST['up'];
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9") or die ("Unable to connect");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342") or die ("No database is selected");
if ($_POST)
{
	$update = mysqli_query($DBConnect,"UPDATE markers SET name = '$Name' WHERE id = '$app'");
	$update = mysqli_query($DBConnect,"UPDATE markers SET address = '$add'  WHERE id='$app'"); 
	$update = mysqli_query($DBConnect,"UPDATE markers SET lat = '$lat' WHERE id= '$app'");
	$update = mysqli_query($DBConnect,"UPDATE markers SET lng = '$lng' WHERE id= '$app'");
	$update = mysqli_query($DBConnect,"UPDATE markers SET type = '$type' WHERE id= '$app'");
	
}
mysqli_close($DBConnect);
echo "Your operation is success, Redirect to Google map page in 3...2...1"; 
echo "<meta http-equiv='Refresh' content='3; URL=program4.php'>";
?>
<html><head><title> Edit Project </title> </head>

</html>
