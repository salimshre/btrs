<?php
$conn = mysqli_connect('localhost','root','','btrs');


if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT schedule.schedule_id, route.source, route.destination, schedule.travel_date, schedule.departure_time, bus.bus_number, bus.total_seats
FROM schedule
JOIN bus ON schedule.bus_id = bus.bus_id
JOIN route ON schedule.route_id = route.route_id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    echo "
    <div style='margin:10px;padding:10px;border:1px solid black'>
        {$row['source']} → {$row['destination']} |
        {$row['travel_date']} {$row['departure_time']} |
        Bus: {$row['bus_number']}
        
        <a href='seat_layout.php?schedule_id={$row['schedule_id']}'>
            <button>Book</button>
        </a>
    </div>
    ";
}
?>