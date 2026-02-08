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


if(isset($_GET['add_schedule'])){

	$bus_id = $_GET['bus_id'];
	$route_id = $_GET['route_id'];

	$check ="SELECT bus_number, total_seats FROM bus WHERE bus_number='$bus_number' AND total_seats = $total_seats";
	$res = mysqli_query($conn, $check);

	if(mysqli_num_rows($res) > 0){
        echo "Bus already exists!";
    } else {
        $sql = "INSERT INTO bus(bus_number, total_seats)
                VALUES('$bus_number', $total_seats)";
        mysqli_query($conn, $sql);
        echo "Bus added successfully!";
    }
}

?>


<!DOCTYPE html>
<header>
    <title>Add schedule</title>
</header>
<body>

<h2>Add New schedule</h2>

<form method="GET">
    bus id:
    <input type="number" name="bus_id" required><br><br>

    route id:
    <input type="number" name="route_id" required><br><br>

    departure_time:
    <input type="text" name="route_id" required><br><br>

    travel_date:
    <input type="text" name="travel_date" required><br><br>


    <button type="submit" name="add_schedule">Add schedule</button>
</form>

</body>
</html>