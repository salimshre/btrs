<?php
$conn = mysqli_connect("sql301.infinityfree.com", "if0_42399722", "ebAupTZ7WdjlWwI", "if0_42399722_btrs");

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully!";
}
?>