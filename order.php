<?php
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$cardname=$_POST['cardname'];
$cardnumber=$_POST['cardnumber'];
$expmonth=$_POST['expmonth'];
$expyear=$_POST['expyear'];
$cvv=$_POST['cvv'];


$conn=new mysqli('localhost','root','','billing');
if($conn->connect_error) {
	die('connection failed: '-$conn->connect_error);
}
else {
	$stmt=$conn ->prepare("insert into billingorder(firstname,email,address,city,state,zip,cardname,cardnumber,expmonth,expyear,cvv)values(?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssisiiii",$firstname,$email,$address,$city,$state,$zip,$cardname,$cardnumber,$expmonth,$expyear,$cvv);
	$stmt->execute();
	echo "order has been placed successfully";
	$stmt->close();
	$conn->close();
}

?>