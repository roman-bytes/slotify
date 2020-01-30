<?php
  ob_start();
  session_start();

  $timezone = date_default_timezone_set("America/Detroit");

  $con = mysqli_connect("mysql", "docker", "docker", "docker");

  if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
  }
?>