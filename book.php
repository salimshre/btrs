<?php
session_start();
if(!isset($_SESSION['passenger_id'])){
    header("Location: login.html");
    exit();
}

$conn = mysqli_connect('localhost','root','','btrs');


if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

$passenger = $_SESSION['passenger_id'];
$schedule  = $_GET['Schedule_id'];
$seat      = $_GET['Seat_number'];

// Security: validate seat number
$busSeatsSql = "SELECT bus.total_seats FROM schedule
JOIN bus ON schedule.bus_id = bus.bus_id
WHERE schedule.schedule_id = $schedule";
$seatResult = mysqli_query($conn, $busSeatsSql);
$seatRow = mysqli_fetch_assoc($seatResult);
$total_seats = $seatRow['total_seats'];
if($seat < 1 || $seat > $total_seats){
    exit("Invalid seat number!");
}

$checkPassenger = "SELECT passenger_id FROM Passenger WHERE passenger_id = $passenger";
$pResult = mysqli_query($conn, $checkPassenger);
if(mysqli_num_rows($pResult) == 0){
    echo "Passenger not found!";
    exit();
}

$checkSchedule = "SELECT schedule_id FROM Schedule WHERE schedule_id = $schedule";
$sResult = mysqli_query($conn, $checkSchedule);
if(mysqli_num_rows($sResult) == 0){
    echo "Schedule not found!";
    exit();
}

$check = "SELECT * FROM Ticket 
          WHERE Schedule_id=$schedule 
          AND Seat_number=$seat 
          AND status='book'";
$result = mysqli_query($conn, $check);
if(mysqli_num_rows($result) > 0){
    echo "Seat already booked! Choose another seat.";
    exit();
}

$sql = "INSERT INTO Ticket
(passenger_id, Schedule_id, Seat_number, booking_date, status)
VALUES ($passenger, $schedule, $seat, CURDATE(), 'book')";
mysqli_query($conn, $sql);

echo "Ticket booked successfully! <a href='booking.php'> Book another </a> ";
?>
