<?php
// if passenger session is not then will regirect to login.
session_start();
if(!isset($_SESSION['passenger_id'])){
    header("Location: login.html");
    exit();
}


$conn = mysqli_connect('localhost','root','','btrs');
if (!$conn){
    die("connection failed");
}

$passenger = $_SESSION['passenger_id'];
$schedule_id = $_GET['schedule_id'];


$sql = "SELECT seat_number FROM ticket
        WHERE schedule_id = $schedule_id AND status = 'book'";

$result = mysqli_query($conn, $sql);

$booked = [];

while($row = mysqli_fetch_assoc($result)){
    $booked[] = $row['seat_number'];
}
?>

<h2> select seat </h2>


<?php
$total_seats = 40;

for($seat = 1; $seat <= $total_seats; $seat++){ 

    if(in_array($seat, $booked)){ // in_array(value, array) //in_array(5, [2,5,7,12])
        echo "<button disabled style='background:red;color:white;margin:5px'>
              Seat $seat (Booked)
              </button>";
    }else{
        echo "<a href='book.php?Schedule_id=$schedule_id&Seat_number=$seat'>
      <button style='background:green;color:white;margin:5px'>
      Seat $seat (Free)
      </button>
      </a>";

    }

    if($seat % 4 == 0) echo "<br>"; // new row like bus seats
}

?>
