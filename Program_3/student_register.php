<?php
/* Toan Nguyen
student register form that allow student to register */
function check_w($wid) {
	if( strlen($wid) < 9){
			return 'Please enter enough w number';
		}
	if (!preg_match("/^W\d+/", $wid, $matches)) { return 'Please return a valid W number';}
		return '';
	}
function check_phone($phone) {
	if (!preg_match("/^[\(]?(\d{0,3})[\)]?[\s]?[\-]?(\d{3})[\s]?[\-]?(\d{4})[\s]?[x]?(\d*)$/",$phone , $matches))
	{
		return 'please return a valid phone number';
	}
	return '';
}
function check_email($email){
	if(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,3}/", $email, $matches)) return 'please return right email';	
	return '';
}
function check_track($Track) {
	if ( $Track != 1 && $Track != 2 && $Track != 3) {
		 return 'Please enter a valid track number( 1, 2, or 3)';
	}
	else{
		return '';	
	}		
}
	

if ($_POST) {	
$wid = $_POST['id'];
$pass = $_POST['password'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$Track = $_POST['Track'];


$check_id_message = check_w($wid);
$check_track_message = check_track($Track);
$check_email_message = check_email($email);
$check_phone_message = check_phone($phone);

if ( $check_id_message == '' && $check_track_message == '' && $check_email_message == '' &&  $check_phone_message == '') {
$DBConnect = @mysqli_connect("db.cs.wwu.edu","nguyen82_writer","Vz8f3vbk9");
if (!$DBConnect)
die("<p>The database server is not available.</p>");
$DBSelect = @mysqli_select_db($DBConnect, "nguyen82_CS342");
if (!$DBSelect)
die("<p>The database is not available.</p>");
$sql = mysqli_query($DBConnect,"INSERT INTO student (Wnum, Wpass, last_name, first_name, P_number, email, track, verified) 
VALUES ('$wid','$pass','$lname','$fname','$phone','$email','$Track','0')");
mysqli_close($DBConnect);
echo "Your operation is success, you have to wait for admin to approve your request Redirect to log in page in 3...2...1"; 
	echo "<meta http-equiv='Refresh' content='5; URL=main.php'>";
}

}
?>


<html><head>Register Form</title> </head>
<body> 
<?php		
		if ( $check_id_message != '' ) {
			print "<p>ID: $check_id_message</p>";
		}
		if ( $check_email_message != '' ) {
			print "<p>Email: $check_email_message</p>";
		}
		if ( $check_phone_message != '' ) {
			print "<p>Phone: $check_phone_message</p>";
		}
		if ( $check_track_message != '' ) {
			print "<p>Track: $check_track_message</p>";
		}
?>
<form action="student_register.php" method="POST">
<p>Enter all information below to register as a valid student</p>
<p>W student number</p><input type="text" name="id" maxlength ="9">
<p>Enter the password</p><input type="password" name="password">
<p>Last Name</p><input type="text" name="lname">
<p>First Name</p><input type="text" name="fname">
<p>Phone Number</p><input type="text" name="phone">
<p>E mail</p><input type="text" name="email">
<p> Track </p><input type="text" name="Track"> </p>
<input type = "submit" name="submit">
<input type = "reset" name="reset">
<br/>
</form>
</body>
</html>

