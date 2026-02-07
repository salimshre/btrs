<?php
session_start();
/* admin protection later
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.html");
    exit();
}
*/

$conn = mysqli_connect('localhost','root','','btrs');

if(!$conn){
    die("Connection failed");
}


if(){



	$sql = "INSERT INTO bus(bus_number,total_seats)
	VALUES(23,40);"
}



?>

<!DOCTYPE html>
<header>
    <title>Add Bus</title>
</header>
<body>

<h2>Add New Bus</h2>

<form method="GET">
    Bus Number:
    <input type="text" name="bus_number" required><br><br>

    Total Seats:
    <input type="number" name="total_seats" required><br><br>

    <button type="submit" name="add_bus">Add Bus</button>
</form>

</body>
</html>