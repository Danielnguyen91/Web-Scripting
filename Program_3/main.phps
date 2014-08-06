<?php>
/* Toan Nguyen 
	log in page to divide three type of user (student, new-student, and admin) */
$username = $_POST['id'];
$password = $_POST['password'];
if ($_POST) {
	if (strcmp($username, "admin") == 0 && strcmp($password, "bozo") == 0) {
		$destination_url = "admin.php";
		header("Location:$destination_url");
		exit(); 
	}
	$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_reader","JzmTV9NWZ");
	if (!$DBConnect)
	die("<p>The database server is not available.</p>");
	$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
	if (!$DBSelect)
	die("<p>The database is not available.</p>");
	$result = mysqli_query($DBConnect,"SELECT student.Wnum, student.Wpass, student.verified FROM student");
	while ($row = mysqli_fetch_array($result)) {
		if( strcmp( $username, $row{'Wnum'})== 0 && strcmp( $password, $row{'Wpass'})== 0 && $row{'verified'}== 1){
			mysqli_close($DBConnect);				
			$destination_url = "student.php";
			header("Location:$destination_url");
			exit();
		}
			
	}
	mysqli_close($DBConnect);
	$destination_url = "new_student.php";
	header("Location:$destination_url");
	exit();
}
?>


<html><head> The project log in page </title> </head>
<body> 
<form action="main.php" method="POST">
<p>Enter the W number and password to log in(if you are admin log in with admin password) otherwise log in with student password:</p>
<p>W student number</p><input type="text" name="id">
<p>Enter the password</p><input type="password" name="password">
<br/>
<input type="submit" value="submit">
<input type="reset" value="reset">
</form>
</body>
</html>

