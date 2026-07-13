<?php
$conn = mysqli_connect("sql301.infinityfree.com", "if0_42399722", "ebAupTZ7WdjlWwI", "if0_42399722_btrs");

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT passenger.name, passenger.phone, bus.bus_number, bus.total_seats, route.source, route.destination, route.distance, ticket.seat_number, ticket.booking_date, ticket.status, schedule.departure_time, schedule.travel_date FROM schedule
JOIN bus ON schedule.bus_id = bus.bus_id
JOIN route ON schedule.route_id = route.route_id
JOIN ticket ON  schedule.schedule_id = ticket.schedule_id
JOIN passenger ON ticket.passenger_id = passenger.passenger_id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    echo "
    <ul style='border:1px solid black; padding:10px; margin:8px; list-style:none'>
        <li><b>Passenger:</b> {$row['name']}</li>
        <li><b>Phone:</b> {$row['phone']}</li>
        <li><b>Bus:</b> {$row['bus_number']} (Seats: {$row['total_seats']})</li>
        <li><b>Route:</b> {$row['source']} → {$row['destination']} ({$row['distance']} km)</li>
        <li><b>Date:</b> {$row['travel_date']}</li>
        <li><b>Time:</b> {$row['departure_time']}</li>
        <li><b>Seat:</b> {$row['seat_number']}</li>
        <li><b>Status:</b> {$row['status']}</li>
    </ul>
    ";
}
?>
