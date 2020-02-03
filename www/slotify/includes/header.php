<?php
  include('includes/config.php');
  include('includes/classes/Artist.php');
  include('includes/classes/Album.php');

  //Temp Logout
  // session_destroy();

  if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header('Location: register.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Slotify Player</title>
  <script src="https://kit.fontawesome.com/8f9a3ae12e.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

  <main>

    <?php include("includes/nav.php"); ?>