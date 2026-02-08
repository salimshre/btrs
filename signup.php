<?php
$conn = mysqli_connect("localhost","root","","btrs");
if(!$conn){
    die("Connection failed");
}

$name = $_GET['name'];
$phone = $_GET['phone'];
$password = $_GET['password'];

/* prevent duplicate phone */
$check = "SELECT * FROM passenger WHERE phone='$phone'";
$res = mysqli_query($conn,$check);

if(mysqli_num_rows($res) > 0){
    echo "Phone already registered!";
    exit();
}

$sql = "INSERT INTO passenger(name, phone, password)
        VALUES('$name','$phone','$password')";

if(mysqli_query($conn,$sql)){
    echo "Signup successful! <a href='login.html'>Login now</a>";
}else{
    echo "Signup failed";
}
?>
