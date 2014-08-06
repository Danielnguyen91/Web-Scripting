<?php
/* Toan Nguyen
Delete or Edit specific information about student */
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9") or die ("Unable to connect");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342") or die ("No database is selected");
if ($_POST) {
	if($_POST["action"] == "Delete"){
			if (isset($_POST["approved"])) {
			foreach($_POST["approved"] as $app)
			{
				$results = mysqli_query($DBConnect,"DELETE FROM project WHERE Name = '$app'") or die (mysql_error());
			}
			echo "Your operation is success, Redirect to Edit student page in 3...2...1"; 
			echo "<meta http-equiv='Refresh' content='3; URL=Edit_pro.php'>";
		} 
		else echo "you must choose one of items to do this operation";
		}
		else
		{
			if (isset($_POST["approved"])) {
			foreach($_POST["approved"] as $app)
			{
				//$result = mysqli_query($DBConnect,"SELECT * FROM project WHERE  Name = '$app'");
				$result = mysqli_query($DBConnect,"SELECT project.Wnum, student.last_name,student.first_name,project.company_name,
				project.supervisor_name,project.URL, project.Date_complete, project.photo, project.Name FROM project LEFT JOIN student ON project.Wnum=student.Wnum WHERE  project.Name = '$app'");
				if (!$result) {
    printf("Error: %s\n", mysqli_error($DBConnect));
    exit();
}
				while ($row = mysqli_fetch_array($result)) {
					?>
					<form action="edit_projectform.php" method="POST">
						Name: <input name="name" type="text" value="<?php echo( htmlspecialchars( $row['Name'] ) ); ?>" /><br>
						Student W Number: <input name="Wnum" type="text" value="<?php echo( htmlspecialchars( $row['Wnum'] ) ); ?>" /><br>
						Last Name: <input name="Lname" type="text" value="<?php echo( htmlspecialchars( $row['last_name'] ) ); ?>" /><br>
						First Name: <input name="Fname" type="text" value="<?php echo( htmlspecialchars( $row['first_name'] ) ); ?>" /><br>
						Company: <input name="c_name" type="text" value="<?php echo( htmlspecialchars( $row['company_name'] ) ); ?>" /><br>
						Supervisor:<input name="s_name" type="text" value="<?php echo( htmlspecialchars( $row['supervisor_name'] ) ); ?>" /><br>
						URL: <input name="URL" type="text" value="<?php echo( htmlspecialchars( $row['URL'] ) ); ?>" /><br>
						Date compleated: <input name="Date" type="text" value="<?php echo( htmlspecialchars( $row['Date_complete'] ) ); ?>" /><br>
						Photo: <input name="Photo" type="text" value="<?php echo( htmlspecialchars( $row['photo'] ) ); ?>" /><br>
						<input type="submit" value="Update">	
					</form>
					
					
					<?php
				}
			}
			} 
			else echo "you must choose one of items to do this operation";
		}
	}

else {
	echo "<Form name ='formpending' Method ='Post' ACTION ='Edit_pro.php'>";
		$result = mysqli_query($DBConnect,"SELECT project.Name, project.URL, project.photo, student.first_name, student.last_name FROM project LEFT JOIN student ON project.Wnum=student.Wnum");
		echo "Choose one of radio button and check box to do the edit or delete project!!";
		echo "</br>";
		while ($row = mysqli_fetch_array($result)) {
			$Name = $row{'Name'};
			echo "<input type='checkbox' value='$Name' name='approved[]' />";
			echo "<b>Project: </b>" ;
			echo $row{'Name'}; 
			echo "<b>&nbsp URL:</b> " ;
			echo $row{'URL'}; 
			echo "<b>&nbsp Photo:</b> " ;
			if (!empty($row{'photo'})) {
			echo "<td>";?> <img src="<?php echo $row['photo']; ?>" height = "150" width="150"> <?php echo "</td>";
 			 } 
			echo " <b>&nbsp Student:</b> " ;
			echo $row{'first_name'}; echo " " ;
			echo $row{'last_name'}; echo "<br/> " ; 
		}
		echo "<P> <input type='radio' name='action' value='Delete'> Delete";
		echo "<input type='radio' name='action' value='Edit'> Edit<br><br>";
		echo "<Input type = 'Submit' Name = 'approvePending' Value = 'Submit'> </FORM>";
	

}
?>
<html>
	<head>
		<title>Edit projects information</title>		
	</head>
</html>
