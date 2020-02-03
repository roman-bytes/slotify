<?php include("includes/header.php"); 

  if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
  $album = mysqli_fetch_array($albumQuery);

  $album = new Album($con, $albumId);
  $artist = $album->getArtist();


?>
<div class="app-content">

</div>

<?php include("includes/footer.php"); ?>