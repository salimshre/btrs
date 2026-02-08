<?php
session_start();
$conn = mysqli_connect('localhost','root','','btrs');
if(!$conn){
    die("no connection");
}

$phone = $_GET['phone'];
$pass  = $_GET['password'];

$sql = "SELECT passenger_id 
        FROM passenger 
        WHERE phone = '$phone' 
        AND password = '$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){

    $row = mysqli_fetch_assoc($result);   // get passenger row
    $_SESSION['passenger_id'] = $row['passenger_id'];  // store ID

    header('location: booking.php');

} else {
    echo "Login failed!";
}
?>
