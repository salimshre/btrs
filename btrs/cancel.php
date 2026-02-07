<?php
session_start();
if(!isset($_SESSION['passenger_id'])){
    header("Location: login.html");
    exit();
}

$conn = mysqli_connect('localhost','root','','btrs');
if(!$conn){
    die("connection failed");
}

$ticket = $_GET['ticket_id'];
$passenger = $_SESSION['passenger_id'];

/* Check ticket belongs to this user */
$check = "SELECT * FROM ticket 
          WHERE ticket_id = $ticket 
          AND passenger_id = $passenger";

$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) == 0){
    echo "This ticket does not belong to you or doesn't exist!";
    exit();
}

/* Cancel only their own ticket */
$del = "UPDATE ticket SET status='cancel' WHERE ticket_id = $ticket";
mysqli_query($conn, $del);

echo "Ticket cancelled successfully!";
?>
