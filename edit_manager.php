<?php
include "db_config.php";
include "functions.php";

// $connessione = db_conn();
if ($connessione && $connessione->connect_error) {
  echo('connection failed'.$success->connect_error);
  exit();
  // code...
} else {
  // code...

$id = intval($_POST['id']);
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);
$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id";
$result = $conn->query($sql);
include "header.php";
}

?>


<?php include "footer.php" ?>
