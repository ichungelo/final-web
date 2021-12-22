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

<body class="d-flex flex-column min-vh-100">
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
        <li class="nav-item">
          <a class="nav-link" href="./feeds.php">Feeds</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link private-shadow-text" href="./profile.php">Profile <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <a class="btn btn-outline-light my-2 my-sm-0 shadow-text" href="./logout.php">Logout</a>
    </div>
  </nav>
  <!-- PROFILE -->
  <div class="container">
    <br><br><br>
    <div class="row">
      <div class="card col-lg-6">
        <h4 class="card-title text-center my-2"><?= $_SESSION['username'] ?></h4>
        <div class="card-body">
          <div class="text-center">
            <div class="row my-2">
              <div class="col-md-4 my-2">
                <img class="private-style-avatar" src="https://avatars.dicebear.com/api/initials/<?= $_SESSION['firstName'] ?>-<?= $_SESSION['lastName'] ?>.svg" alt="">
              </div>
              <div class="col-md-8 my-2">
                <div class=""><?= $_SESSION['firstName'] ?></div>
                <div class=""><?= $_SESSION['lastName'] ?></div>
                <br>
                <div><?= $_SESSION['email'] ?></div>
              </div>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-md-4 text-center">
              <h6>followers</h6>
              <p>12</p>
            </div>
            <div class="col-md-4 text-center">
              <h6>following</h6>
              <p>12</p>
            </div>
            <div class="col-md-4 text-center">
              <h6>Posts</h6>
              <p>12</p>
            </div>
          </div>
        </div>
      </div>
      <div class="card col-lg-6">
        <h4 class="card-title text-center my-2">Create new post</h4>
        <div class="card-body">
          <form method="POST">
            <div class="form-row">
              <div class="behind-nav form-group col-12">
                <textarea class="form-control" name="body" rows="6"></textarea>
              </div>
              <button type="submit" class="btn btn-warning ml-auto btn-block" name="send">POST</button>
            </div>
          </form>
        </div>
      </div>
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