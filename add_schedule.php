<?php
session_start();

$conn = mysqli_connect('localhost','root','','btrs');
if(!$conn){
    die("Connection failed");
}

$busRes = mysqli_query($conn, 'SELECT bus_id, bus_number FROM bus');
$routeRes = mysqli_query($conn, 'SELECT route_id, source, destination FROM route');


if(isset($_GET['add_schedule'])){


    $bus_id = $_GET['bus_id'];
    $route_id = $_GET['route_id'];
    $departure_time = $_GET['departure_time'];
    $travel_date = $_GET['travel_date'];

    
    $check = "SELECT * FROM schedule 
              WHERE bus_id=$bus_id 
              AND route_id=$route_id 
              AND travel_date='$travel_date' 
              AND departure_time='$departure_time'";
    $res = mysqli_query($conn, $check);

    if(mysqli_num_rows($res) > 0){
        echo "Schedule already exists!";
    } else {
        $sql = "INSERT INTO schedule(bus_id, route_id, departure_time, travel_date)
                VALUES ($bus_id, $route_id, '$departure_time', '$travel_date')";
        if(mysqli_query($conn, $sql)){
            echo "Schedule added successfully!";
        } else {
            echo "Error adding schedule";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Schedule</title>
</head>
<body>

<h2>Add New Schedule</h2>

<form method="GET">
    Bus:
    <select name="bus_id" required>
        <option value="" disabled selected>select bus</option>
        <?php while($row = mysqli_fetch_assoc($busRes)){?>
            <option value="<?php echo $row['bus_id']; ?>">
                <?php echo $row['bus_number']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    Route:
    <select name="route_id" required="">
        <option value="" disabled selected>select route</option>
        <?php while($rRow = mysqli_fetch_assoc($routeRes)){?>
            <option value="<?php echo $rRow['route_id']; ?>">
                <?php echo $rRow['source']; ?> → <?php echo $rRow['destination']; ?>
            </option>
        <?php } ?>
        
    </select>
    <br><br>

    Departure Time:
    <input type="time" name="departure_time" required><br><br>

    Travel Date:
    <input type="date" name="travel_date" required><br><br>

    <button type="submit" name="add_schedule">Add Schedule</button>
</form>

</body>
</html>