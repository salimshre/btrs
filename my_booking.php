<?php
session_start();
if(!isset($_SESSION['passenger_id'])){
    header("Location: login.html");
    exit();
}

$conn = mysqli_connect("localhost","root","","btrs");

$passenger = $_SESSION['passenger_id'];

$sql = "SELECT ticket_id, seat_number, booking_date, status
        FROM ticket
        WHERE passenger_id = $passenger";

$result = mysqli_query($conn, $sql);

echo "<h2>My Bookings</h2>";

while($row = mysqli_fetch_assoc($result)){
    echo "Ticket ID: ".$row['ticket_id'].
         " | Seat: ".$row['seat_number'].
         " | Date: ".$row['booking_date'].
         " | Status: ".$row['status'];

    if($row['status'] == 'book'){
        echo " <a href='cancel.php?ticket_id=".$row['ticket_id']."'>Cancel</a>";
    }

    echo "<br>";
}
?>
