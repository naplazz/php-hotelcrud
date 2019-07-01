<?php
include "db_config.php";
include "functions.php";

// $connessione = db_conn();
if ($connessione && $connessione->connect_error) {
  echo('connection failed'.$success->connect_error);
  exit();
  // code...
}
$sql = "SELECT * FROM stanze";
$result = $connessione->query($sql);
include "header.php";
?>
<div class="container">

  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>

        <th class="text-center">Room Number</th>
        <th class="text-center">Floor</th>
        <th class="text-center">Beds</th>
        <th class="text-right">Created At</th>
        <th class="text-right">Updated At</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id'] ?></td>
              <td class="text-center"><?php echo $row['room_number'] ?></td>
              <td class="text-center"><?php echo $row['floor'] ?></td>
              <td class="text-center"><?php echo $row['beds'] ?></td>
              <td class="text-right"><?php echo $row['created_at'] ?></td>
              <td class="text-right"><?php echo $row['updated_at'] ?></td>
              <td class="text-right">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?php echo $row['id']?>" type="button" class="btn btn-secondary">Show</a>
                  <a href="edit.php?id=<?php echo $row['id']?>" type="button" class="btn btn-secondary">Edit</a>
                  <a type="button" class="btn btn-secondary">Delete</a>
                </div>


              </td>
            </tr>



      <?php
          }
        } elseif($result) {
          echo "Non ci sono risultati";
        } else {
          echo "Si è verificato un errore";
        }
       ?>

    </tbody>

  </table>

  </div>
<?php include "footer.php"; ?>
