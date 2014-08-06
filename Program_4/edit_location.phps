<?php
/* Toan Nguyen
The edit page list all information that user want to edit" */
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9") or die ("Unable to connect");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342") or die ("No database is selected");
if (isset($_POST['update'])) {
	if (isset($_POST["approved"])) {
			foreach($_POST["approved"] as $app)
			{
				
				$result = mysqli_query($DBConnect,"SELECT markers.id, markers.Name, markers.address, markers.lat, markers.lng, markers.type FROM markers WHERE id = '$app'");
				
			}
			while ($row = mysqli_fetch_array($result)) {
					?>
					<form action="edit_ac.php" method="POST">
						Name: <input name="name" type="text" value="<?php echo( htmlspecialchars( $row['Name'] ) ); ?>" /><br>
						Address: <input name="add" type="text" value="<?php echo( htmlspecialchars( $row['address'] ) ); ?>" /><br>
						latitude: <input name="lat" type="text" value="<?php echo( htmlspecialchars( $row['lat'] ) ); ?>" /><br>
						longitude: <input name="lng" type="text" value="<?php echo( htmlspecialchars( $row['lng'] ) ); ?>" /><br>
						Type: <input name="type" type="text" value="<?php echo( htmlspecialchars( $row['type'] ) ); ?>" /><br>
						<input type="hidden" name="up" value="<?php echo( htmlspecialchars($app)); ?>"> 
						<input type="submit" value="Update">	
					</form>
					
					
					<?php
			}
	}
	else { echo "please choose one of the location to edit"; }
}

?>
<html><head><title> Edit Project </title> </head>

</html>
