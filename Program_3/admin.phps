<?php
/* Toan Nguyen 
Admin Page to do some operation like add more student, project
Edit student, project and display information about student, project */
$admin = $_POST['group1'];
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9");
if (!$DBConnect)
	die("<p>The database server is not available.</p>");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
if (!$DBSelect)
	die("<p>The database is not available.</p>");
$count = 0;
switch($admin) {
	case "Add_st":
		$destination_url = "add_st.php";
		header("Location:$destination_url");
		exit(); 
	break;
	case "Approve":
		$destination_url = "adapprove.php";
		header("Location:$destination_url");
		exit(); 
	break;
	case "Edit_st":
		$destination_url = "Edit_st.php";
		header("Location:$destination_url");
		exit(); 
	break;
	case "Add_pro":
		$destination_url = "add_pro.php";
		header("Location:$destination_url");
		exit(); 

	break;
	case "Edit_pro":
		$destination_url = "Edit_pro.php";
		header("Location:$destination_url");
		exit(); 
	break;
	case "display_st":
	$result = mysqli_query($DBConnect,"SELECT student.first_name, student.last_name, project.Name FROM student LEFT JOIN project ON student.Wnum=project.Wnum
	WHERE student.verified = 1");
	while ($row = mysqli_fetch_array($result)) {
	$count = $count + 1;
	echo "$count) ";echo "<b>Name: </b>" ;echo $row{'first_name'}; echo " " ;echo $row{'last_name'}; echo ", " ; echo "<b>Project: </b>" ;echo $row{'Name'};echo "<br>";
	}
	echo "<br>";
	echo "<br>";
		break;
	break;
	case "display_pro":
	$result = mysqli_query($DBConnect,"SELECT project.Name, student.first_name, student.last_name, project.URL, project.photo FROM project
	 LEFT JOIN student on project.Wnum = student.Wnum");
	while ($row = mysqli_fetch_array($result)) {
	$count = $count + 1;
	echo "$count) ";
	echo "<b>Project Name: </b>" ;echo $row{'Name'}; echo ", "; echo "<b>URL: </b>" ;echo $row{'URL'}; echo ", "; echo "<b>Photo</b>" ; 
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

?>

<html><head> Admin Log in Page </title> </head>
<body> 
<form action="admin.php" method="POST">
<p>As an admin, choose one of operation below</p>
<input type="radio" name="group1" value="Add_st">Enter new students<br>
<input type="radio" name="group1" value="Approve">Approve student request<br>
<input type="radio" name="group1" value="Edit_st">Edit student information<br>
<input type="radio" name="group1" value="Add_pro">Enter new projects<br>
<input type="radio" name="group1" value="Edit_pro">Edit project information<br>
<input type="radio" name="group1" value="display_st">Display information about student<br>
<input type="radio" name="group1" value="display_pro">Display information about project<br>
</br>
<input type="submit" value="submit">
<input type="reset" value="reset">
</form>
</body>
</html>

