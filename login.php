<?php
session_start();

$conn = mysqli_connect('localhost','root','','btrs');


if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

$phone = $_GET['phone'];
$pass  = $_GET['password'];

$sql = "SELECT passenger_id 
        FROM passenger 
        WHERE phone = '$phone' 
        AND password = '$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['passenger_id'] = $row['passenger_id'];
    header('location: booking.php');
} else {
    echo "Login failed!";
}
?>
