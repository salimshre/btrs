<?php
$conn = mysqli_connect("localhost","root","","btrs");


$vResult = "SELECT passenger.passenger_id, ticket.seat_number, ticket.booking_date, ticket.status
FROM ticket
JOIN passenger ON ticket.passenger_id = passenger.passenger_id";

$result = mysqli_query($conn, $vResult);

while($r = mysqli_fetch_assoc($result)){
    echo "Passenger: ".$r['passenger_id'].
         " Seat: ".$r['seat_number'].
         " Date: ".$r['booking_date'].
         " Status: ".$r['status']."<br>";
}


?>