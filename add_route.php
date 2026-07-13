<?php
session_start();
/* admin protection later
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.html");
    exit();
}
*/

$conn = mysqli_connect('localhost','root','','btrs');


if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['add_route'])){

    $source = $_GET['source'];
    $destination= $_GET['destination'];
    $distance= $_GET['distance'];

    $check ="SELECT source, destination, distance FROM route WHERE source='$source' AND destination = '$destination' AND distance='$distance'";
    $res = mysqli_query($conn, $check);

    if(mysqli_num_rows($res) > 0){
        echo "route already exist!";
    } else {
        $sql = "INSERT INTO route(source, destination, distance)
                VALUES('$source', '$destination','$distance')";
        mysqli_query($conn, $sql);
        echo "route added success!";
    }
}
?>
<!DOCTYPE html>
<header>
    <title>Add Route</title>
</header>
<body>
<h2>Add New Route</h2>
<form method="GET">
    Source:
    <input type="text" name="source" required><br><br>
    destination:
    <input type="text" name="destination" required><br><br>
    distance:
    <input type="text" name="distance" required><br><br>
    <button type="submit" name="add_route">Add Route</button>
</form>
</body>
</html>