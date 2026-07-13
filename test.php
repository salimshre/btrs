<?php
$conn = mysqli_connect('localhost','root','','btrs');


if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully!";
}
?>