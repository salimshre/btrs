<?php
session_start();

$conn = mysqli_connect('localhost','root','','btrs');


if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_GET['username'];
$password = $_GET['password'];

$sql = "SELECT username, password FROM admin WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    $_SESSION['admin'] = $username;
    header("location: admin_dashboard.php");
} else {
    echo "admin login failed";
}
?>