
<?php
/* Toan Nguyen 
student page to display information about student and project */
$information = $_POST['group'];
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_reader","JzmTV9NWZ");
if (!$DBConnect)
	die("<p>The database server is not available.</p>");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
if (!$DBSelect)
	die("<p>The database is not available.</p>");
$count = 0;
switch($information) {
	case "student":
	$result = mysqli_query($DBConnect,"SELECT student.first_name, student.last_name, project.Name FROM student LEFT JOIN project ON student.Wnum=project.Wnum
	WHERE student.verified = 1");
	while ($row = mysqli_fetch_array($result)) {
	$count = $count + 1; echo "$count) ";
	echo "<b>Student Name: </b>" ;echo $row{'first_name'}; echo " " ;echo $row{'last_name'}; echo ", " ; echo "<b>Project: </b>" ;echo $row{'Name'};echo "<br>";
	}
	echo "<br>";
	echo "<br>";
		break;
	case "project":
	$result = mysqli_query($DBConnect,"SELECT project.Name, student.first_name, student.last_name, project.URL, project.photo FROM project
	 LEFT JOIN student on project.Wnum = student.Wnum");
	while ($row = mysqli_fetch_array($result)) {
	$count = $count + 1;
	echo "$count) "; echo "<b>Project Name: </b>" ;echo $row{'Name'}; echo ", "; echo "<b>URL: </b>" ;echo $row{'URL'}; echo ", "; echo "<b>Photo</b>" ;
	if (!empty($row{'photo'})) {
	echo "<td>";?> <img src="<?php echo $row['photo']; ?>" height = "150" width="150"> <?php echo "</td>";
 	 }
	echo ", ";echo "<b>Student Name: </b>" ; echo $row{'first_name'}; echo " "; echo $row{'last_name'};
	echo "<br>";
	 }
	echo "<br>";
	echo "<br>";
		break;

}
mysqli_close($DBConnect);

?>

<html>
<head><title> The Student page information </title> </head>
<body> 
<form action="student.php" method="POST">
<p>Choose the information you want to look up</p>
<input type="radio" name="group" value="student">Student information<br>
<input type="radio" name="group" value="project">project information<br>
<br/>
<input type="submit" value="submit">
<input type="reset" value="reset">
</form>
</body>
</html>

