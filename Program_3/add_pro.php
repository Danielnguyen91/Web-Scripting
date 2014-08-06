<?php
/* Toan Nguyen
 Admin page to add more project into database */
 $proj = $_POST['project'];
 $lname = $_POST['lname'];
 $fname = $_POST['fname'];
 $company = $_POST['company'];
 $super = $_POST['supervisor'];
 $URL = $_POST['URL'];
 $Date = $_POST['Date'];
 $Image = $_POST['Image'];
 $Wnum;
 $DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9");
 $DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
 function get_Wnum($lname, $fname, &$Wnum,$DBConnect) {
		if(strcmp($lname, '')== 0 && strcmp($fname, '')== 0){
			$Wnum = '';
			return '';
		}
		else{
			$result = mysqli_query($DBConnect,"SELECT student.first_name, student.last_name, student.Wnum FROM student");
			while ($row = mysqli_fetch_array($result)) {
				if(strcmp($lname, $row{'last_name'})== 0 && strcmp($fname, $row{'first_name'})== 0){
					$Wnum = $row{'Wnum'};
					return '';
				}			   
			}
			return 'Please enter a valid student name.';	
		}
}
if ( $_POST ) {
		$error_message_name = get_Wnum($lname, $fname, $Wnum, $DBConnect);

		//Jump if no errors.
		if ( $error_message_name == '' ) {
			mysqli_query($DBConnect,"INSERT INTO project (Name, company_name, supervisor_name, URL, Date_complete, photo, Wnum)
	 VALUES ('$proj', '$company', '$super', '$URL', '$Date', '$Image','$Wnum')") or die("Could not insert into database");	
			echo "the new project is added to databse"; echo "</br>";	
			}
	}
//mysqli_close($DBConnect);

?>
<html><head>Add Project Page</title> </head>
<body> 
<form action="add_pro.php" method="POST">
<p>Admin add project by filling all the information below</p>
<p>Project Name</p><input type="text" name="project">
<p> Last Name of student (optional) </p><input type="text" name="lname">
<p> First Name of student (optional) </p><input type="text" name="fname">
<p>Company Name</p><input type="text" name="company">
<p>Supervisor's Name</p><input type="text" name="supervisor">
<p>URL (optional)</p><input type="text" name="URL">
<p>Date of completion (optional)</p><input type="text" name="Date">
<p>Image (optional)</p><input type="text" name="Image">
</p>
<input type = "submit" name="submit">
<input type = "reset" name="reset">
<br/>
</form>
</body>
</html>
