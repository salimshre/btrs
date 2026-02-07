<?php
session_start();

$conn = mysqli_connect('localhost','root','','btrs');
if(!$conn){
    die("no connection");
}

$id = $_GET['passenger_id'];
$pass  = $_GET['password'];

$sql = "SELECT passenger_id FROM passenger 
        WHERE passenger_id = $id 
        AND password = '$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
	$_SESSION['passenger_id'] = $id;
    header('location: booking.php');
} else {
	echo "Login failed!";
}

?>
