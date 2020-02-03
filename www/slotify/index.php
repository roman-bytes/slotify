<?php include("includes/header.php"); ?>

    <div class="app-content">
      <h1>You might also like</h1>

      <div class="grid-view">
        <?php 
          $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY rand() LIMIT 10");

          while($row = mysqli_fetch_array($albumQuery)) {
            echo "<div class='grid-item'>
            <a href='album.php?id=" . $row['id'] . "'>
              <img src='" . $row['artworkPath'] . "' />
              <div class='info'>" . $row['title'] . "</div>
            </a>
            </div>";
          }
        ?>
      </div>
    </div>

<?php include("includes/footer.php"); ?>