<?php
session_start();
if(!isset($_SESSION['passenger_id'])){
    header("Location: login.html");
    exit();
}


$conn = mysqli_connect("localhost","root","","btrs");
$id = $_SESSION['passenger_id'];
$sql = "SELECT name FROM passenger WHERE passenger_id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$name = $row['name'];

?>


<!DOCTYPE html>
<html>
	<header>
		<title> btrs</title>
	</header>
	<body>
		<h2>Welcome <?php echo $name; ?> 👋</h2>

		
	<h1>bus ticket reservation system</h1>



	<form action="seat_layout.php" method="GET">
   
    <a href="schedule_list.php">View Available Trips</a>
    <br><br>

</form>


<br><br>

	<a href='my_booking.php'> my booking </a><br><br>




	<button><a href='logout.php'>Logout</a></button>
	<body>
</html>
