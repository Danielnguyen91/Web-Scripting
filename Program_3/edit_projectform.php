<?php
/* Toan Nguyen
The edit page to edit information about the project */
$project = $_POST['name'];
$eid = $_POST['Wnum'];
$last= $_POST['Lname'];
$company = $_POST['c_name'];
$supervisor = $_POST['s_name'];
$URL = $_POST['URL'];
$Completed_Date = $_POST['Date'];
$Image = $_POST['Photo'];
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9") or die ("Unable to connect");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342") or die ("No database is selected");
if ($_POST)
{
	$update = mysqli_query($DBConnect,"UPDATE project SET Name = '$project' WHERE Wnum= '$eid'");
	$update = mysqli_query($DBConnect,"UPDATE project SET project.Wnum = '$eid'  WHERE Name='$project'"); 
	$update = mysqli_query($DBConnect,"UPDATE project SET company_name = '$company' WHERE Name= '$project'");
	$update = mysqli_query($DBConnect,"UPDATE project SET supervisor_name = '$supervisor' WHERE Name= '$project'");
	$update = mysqli_query($DBConnect,"UPDATE project SET URL = '$URL' WHERE Name= '$project'");
	$update = mysqli_query($DBConnect,"UPDATE project SET Date_complete = '$Completed_Date' WHERE Name= '$project'");
	$update = mysqli_query($DBConnect,"UPDATE project SET photo = '$Image' WHERE Name='$project'");
}
mysqli_close($DBConnect);
echo "Your operation is success, Redirect to Edit student page in 3...2...1"; 
echo "<meta http-equiv='Refresh' content='3; URL=Edit_pro.php'>";
?>
<html><head><title> Edit Project </title> </head>

</html>
