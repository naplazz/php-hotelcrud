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
<?php
     if($result && $result->num_rows > 0) {
       $row = $result->fetch_assoc();
       ?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Room Number: <?php echo $row['room_number'] ?></h5>
    <p class="card-text">ID: <?php echo $id_stanza ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Floor: <?php echo $row['floor'] ?></li>
    <li class="list-group-item">Beds: <?php echo $row['beds'] ?></li>
    <li class="list-group-item">Created: <?php echo $row['created_at'] ?></li> </li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
<?php
     } elseif($result) {
       echo "Non ci sono risultati";
     } else {
       echo "Si è verificato un errore";
     }
     ?>

<?php include "footer.php" ?>
