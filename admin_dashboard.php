<?php
session_start();

/*if(!isset($_SESSION['admin'])){
	header("location: admin_login.html");
	exit();
}
*/
?>

<h2> admin panel </h2>

<a href="add_bus.php">Add Bus</a><br><br>
<a href="add_route.php">Add Route</a><br><br>
<a href="add_schedule.php">Add Schedule</a><br><br>
<a href="alluser_view_booking.php">view all user booking</a><br><br>

<a href="logout.php">Logout</a><br><br>


