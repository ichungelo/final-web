<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: index.php');
}
include("./handler.php");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="/assets/images/ichun.png">
  <title>Knotext | <?= $_SESSION['username'] ?></title>
</head>

<body class="d-flex flex-column min-vh-100 private-background">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark private-style-navbar fixed-top">
    <a class="navbar-brand " href="./index.php">
      <?= $_SESSION['username'] ?>
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link private-shadow-text" href="./feeds.php">Feeds <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./search.php">Search</a>
        </li>
      </ul>
      <a class="btn btn-outline-light my-2 my-sm-0 shadow-text" href="./logout.php">Logout</a>
    </div>
  </nav>
  <!-- FEEDS -->
  <div class="container d-flex justify-content-center private-margin-nav">
    <div class="col-lg-8">
      <?php
      while ($feed = mysqli_fetch_assoc($getAllFeedPostHandler)) {
      ?>
          <div class="card my-1">
            <div class="card-body row">
              <div class="col-4 text-center">
                <img class="private-style-avatar" src="https://avatars.dicebear.com/api/initials/<?= $feed['first_name'] ?>-<?= $feed['last_name'] ?>.svg" alt="">
              </div>
              <div class="col-8">
                <a class="text-dark" href="users.php?username=<?= $feed['username'] ?>">
                  <h5 class="card-title"><?= $feed['username'] ?></h5>
                </a>
                <div class="badge badge-pill badge-secondary"><?= date('D, d M Y', strtotime($feed['created_at'].' UTC' )) ?></div>
                <div class="badge badge-pill badge-secondary"><?= date('h:i A', strtotime($feed['created_at'].' UTC')) ?></div>
                <p class="card-text"><?= htmlspecialchars($feed['post']) ?></p>
                <?php if ($feed['created_at'] !== $feed['updated_at']) {?> 
              <div class="text-right">
                <span class="badge badge-pill badge-secondary">updated</span>
              </div> 
              <?php
              }
              ?>
              </div>
            </div>
          </div>
      <?php
      }
      ?>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
<footer class="mt-auto bg-light text-center">
  Copyright &#169 Ichungelo inc 2021, All rights reserved
</footer>

</html>