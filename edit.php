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
       <form class="" action="edit_manager.php" method="post">
         <h3>Modifica Stanza numero: <?php echo $row['room_number'] ?></h3>
         <label> Numero Stanza</label>
         <input type="text" name="room_number" placeholder="<?php echo $row['room_number']?>" value="<?php echo $row['room_number']?>">
         <label>Piano</label>
         <input type="text" name="floor" placeholder="<?php echo $row['floor']?>" value="<?php echo $row['floor']?>">
         <label>Numero Letti</label>
         <input type="text" name="beds" placeholder="<?php echo $row['beds']?>" value="<?php echo $row['beds']?>">
         <button type="submit" name="salva" class="btn btn-primary">Salva</button>

       </form>

<?php
     } elseif($result) {
       echo "Non ci sono risultati";
     } else {
       echo "Si è verificato un errore";
     }
     ?>

<?php include "footer.php" ?>
