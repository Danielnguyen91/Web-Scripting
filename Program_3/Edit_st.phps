<?php
/* Toan Nguyen
Delete or Edit specific information about student */
echo "Choose one of two operation to edit information about student"; echo "<br/>";
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9") or die ("Unable to connect");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342") or die ("No database is selected");
if ($_POST) {
	if($_POST["action"] == "Delete"){
			if (isset($_POST["approved"])) {
			foreach($_POST["approved"] as $app)
			{
				$results = mysqli_query($DBConnect,"DELETE FROM student WHERE Wnum = '$app'") or die (mysql_error());
			}
			
			echo "Your operation is success, Redirect to Edit student page in 3...2...1"; 
			echo "<meta http-equiv='Refresh' content='3; URL=Edit_st.php'>";
		} 
		else echo "you must choose one of items to do this operation";
		}
		else{	
			if (isset($_POST["approved"])) {
			foreach($_POST["approved"] as $app)
			{
				$result = mysqli_query($DBConnect,"SELECT student.Wnum, student.last_name,student.first_name,student.P_number,student.email,student.track,project.Name FROM student LEFT JOIN project ON student.Wnum=project.Wnum WHERE  student.Wnum = '$app'");

		        	while ($row = mysqli_fetch_array($result)) {
					
					?>
					<html> <body>
					<form action="edit_studentform.php" method="POST">
						Wnumber: <input name="Wid" type="text" value="<?php echo (htmlspecialchars($row['Wnum'])); ?>"/><br>
						Last Name: <input name="Lname" type="text" value="<?php echo( htmlspecialchars( $row['last_name'] ) ); ?>" /><br>
						First Name: <input name="Fname" type="text" value="<?php echo( htmlspecialchars( $row['first_name'] ) ); ?>" /><br>
						Phone Number:<input name="Phone" type="text" value="<?php echo( htmlspecialchars( $row['P_number'] ) ); ?>" /><br>
						Email: <input name="Email" type="text" value="<?php echo( htmlspecialchars( $row['email'] ) ); ?>" /><br>
						Track: <input name="Track" type="text" value="<?php echo( htmlspecialchars( $row['track'] ) ); ?>" /><br>
						Project: <input name="project" type="text" value="<?php echo( htmlspecialchars( $row['Name'] ) ); ?>" /><br> 
							<input type="submit" value="Update">	
						
					</form> </body></html>
				
					<?php	
					}
				}
			  
			} 
		else echo "you must choose one of items to do this operation";
		}
	}
 
 else {
	echo "<Form name ='formpending' Method ='Post' ACTION ='Edit_st.php'>";
		$result = mysqli_query($DBConnect,"SELECT student.first_name, student.last_name, student.Wnum FROM student WHERE student.verified = 1");
		while ($row = mysqli_fetch_array($result)) {
			$wnum = $row{'Wnum'};
			echo "<input type='checkbox' value='$wnum' name='approved[]' />"; echo $row{'first_name'}; echo " " ;echo $row{'last_name'}; echo "<br/> " ; 
		}
		echo "<P> <input type='radio' name='action' value='Delete'> Delete";
		echo "<input type='radio' name='action' value='Edit'> Edit<br><br>";
		echo "<Input type = 'Submit' Name = 'approvePending' Value = 'Submit'> </FORM>";
		
}
?>
<html><head><title> Delete and Edits information about student </title> </head>



</html>
