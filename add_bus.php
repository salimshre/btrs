<?php
session_start();
/* admin protection later
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.html");
    exit();
}
*/

$conn = mysqli_connect("sql301.infinityfree.com", "if0_42399722", "ebAupTZ7WdjlWwI", "if0_42399722_btrs");

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['add_bus'])){

    $bus_number = $_GET['bus_number'];
    $total_seats = $_GET['total_seats'];

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