<?php
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$message=$_POST['message'];


$conn=new mysqli('localhost','root','','contact');
if($conn->connect_error) {
	die('connection failed: '-$conn->connect_error);
}
else {
	$stmt=$conn ->prepare("insert into contactus(firstname,email,message)values(?,?,?)");
	$stmt->bind_param("sss",$firstname,$email,$message);
	$stmt->execute();
	echo "success";
	$stmt->close();
	$conn->close();
}

?>