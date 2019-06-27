<?php
include "db_config.php";
include "functions.php";

// $connessione = db_conn();
if ($connessione && $connessione->connect_error) {
  echo('connection failed'.$success->connect_error);
  exit();
  // code...
}
$id_stanza = $_GET['id'];
$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $connessione->query($sql);
include "header.php";
?>
ID: <?php echo $id_stanza ?>
<?php
if($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  ?>
Floor: <?php echo $row['floor'] ?>
Room Number: <?php echo $row['room_number'] ?>
Beds: <?php echo $row['beds'] ?>

<?php
} elseif($result) {
  echo "Non ci sono risultati";
} else {
  echo "Si è verificato un errore";
}
?>


<?php include "footer.php" ?>
