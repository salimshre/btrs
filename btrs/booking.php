<?php
session_start();
if(!isset($_SESSION['passenger_id'])){
    header("Location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html>
	<header>
		<title> btrs</title>
	</header>
	<body>
	<h1>bus ticket reservation system</h1>



	<form action="seat_layout.php" method="GET">
   

    Schedule ID:
    <input type="number" name="schedule_id" required>
    <br><br>

    <button type="submit">View Seats</button>
</form>


<br><br>

	<a href='my_booking.php'> my booking </a><br><br>



	<button><a href='logout.php'>Logout</a></button>
	<body>
</html>
