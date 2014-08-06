<?php
/* Toan Nguyen
 the action of edit information about student */
  $eid = $_POST['Wid'];
  $elast = $_POST['Lname'];
  $efirst = $_POST['Fname'];
  $ephone = $_POST['Phone'];
  $e_email = $_POST['Email'];
  $etrack = $_POST['Track']; 
  $eproject = $_POST['project'];
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9") or die ("Unable to connect");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342") or die ("No database is selected");
if ($_POST)
 	{
		
		$update = mysqli_query($DBConnect,"UPDATE student SET Wnum = '$eid' WHERE last_name= '$elast' AND first_name='$efirst'");
		$update = mysqli_query($DBConnect,"UPDATE student SET last_name = '$elast' WHERE Wnum= '$eid'");
		$update = mysqli_query($DBConnect,"UPDATE student SET first_name = '$efirst' WHERE Wnum= '$eid'");
		$update = mysqli_query($DBConnect,"UPDATE student SET email = '$e_email' WHERE Wnum= '$eid'");
		$update = mysqli_query($DBConnect,"UPDATE student SET P_number = '$ephone' WHERE Wnum= '$eid'");
		$update = mysqli_query($DBConnect,"UPDATE student SET track = '$etrack' WHERE Wnum= '$eid'");
		$update = mysqli_query($DBConnect,"UPDATE project SET Wnum = '$eid' WHERE Name= '$eproject'");

		
	}
mysqli_close($DBConnect);
echo "Your operation is success, Redirect to Edit student page in 3...2...1"; 
echo "<meta http-equiv='Refresh' content='3; URL=Edit_st.php'>";
?>
<html><head><title> Edit student </title> </head>

</html>
