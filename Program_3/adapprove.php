<?php
/* Toan Nguyen
Approve page allow admin to approve new-student register request */
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
$result = mysqli_query($DBConnect,"SELECT student.first_name, student.last_name, student.Wnum FROM student WHERE student.verified = 0");

	if ($_POST) {	
		if (isset($_POST["approved"])) {
		foreach($_POST["approved"] as $app)
		{
			$results = mysqli_query($DBConnect,"UPDATE student SET verified= '1' WHERE Wnum = '$app'") or die (mysql_error());
		}
		$destination_url = "confirmpage.php";
		header("Location:$destination_url");
		exit();	
		} 
		else echo "you must choose one of student to approve";
	}
	else{
		echo "<Form name ='formpending' Method ='Post' ACTION ='adapprove.php'>";
		while ($row = mysqli_fetch_array($result)) {
			$wnum = $row{'Wnum'};
			echo "<input type='checkbox' value='$wnum' name='approved[]' />";echo $row{'Wnum'}; echo " "; echo $row{'first_name'}; echo " " ;echo $row{'last_name'}; echo "<br/> " ; 
		}
		echo "<P><Input type = 'Submit' Name = 'approvePending' Value = 'Submit'> </FORM>";
	}
?>
<html>
<head>
	<title>Approval Page</title>
	<P> click the student you want to approve </p>
</head>

</html>
