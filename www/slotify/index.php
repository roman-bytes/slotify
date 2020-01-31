<?php
  include('includes/config.php');

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

    <div class="navigation">
      <a href="index.php" class="logo">
        <i class="fas fa-dragon"></i>
      </a>

      <div class="group">
        <div class="nav-item">
          <a href="search.php" class="nav-item-link">Search<i class="fas fa-search"></i></a>
        </div>
      </div>

      <div class="group">
        <div class="nav-item">
          <a href="browse.php" class="nav-item-link">Browse</a>
        </div>
        <div class="nav-item">
          <a href="music.php" class="nav-item-link">Your Music</a>
        </div>
        <div class="nav-item">
          <a href="profile.php" class="nav-item-link">Jacob Roman</a>
        </div>
      </div>
    </div>

    <div class="app-content">

    </div>

    <div id="nowPlayingBarContainer">
      <div class="now-playing-bar">
        <div class="now-playing">
          <div class="content">
            <span class="album-link">
              <img src="http://blog.iso50.com/wp-content/uploads/2013/12/Awake-Cover-612.jpg">
            </span>
            <div class="track-info">
              <div class="track-song">
                <span>Happy Birthday</span>
              </div>
              <div class="track-artist">
                <span>Jacob Roman</span>
              </div>
            </div>
          </div>
        </div>
        <div class="player-controls">
          <div class="content player">
            <div class="buttons">
              <button class="shuffle" type="button" title="Shuffle button"><i class="fas fa-random"></i></button>
              <button class="prev" type="button" title="Previous button"><i class="fas fa-step-backward"></i></button>
              <button class="play" type="button" title="Play / Pause button"><i class="far fa-play-circle"></i></button>
              <button class="pause" type="button" title="Play / Pause button"><i class="fas fa-pause"></i></button>
              <button class="next" type="button" title="Next button"><i class="fas fa-step-forward"></i></button>
              <button class="repeat" type="button" title="Repeat button"><i class="fas fa-sync-alt"></i></button>
            </div>
  
            <div class="playback-bar">
              <span class="progress-time current">0:00</span>
              <div class="progress-bar">
                <div class="progress-bar-background">
                  <div class="progress"></div>
                </div>
              </div>
              <span class="progress-time remaining">0:00</span>
            </div>
          </div>
        </div>
        <div class="volume-controls">
          <div class="volume-bar">
            <button class="volume" type="button" title="Volume button">
              <i class="fas fa-volume-up"></i>
            </button>
            <button class="mute" type="button" title="Mute button">
              <i class="fas fa-volume-mute"></i>
            </button>
            <div class="progress-bar">
                <div class="progress-bar-background">
                  <div class="progress"></div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>

</body>
</html>