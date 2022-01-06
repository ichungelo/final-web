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
        <li class="nav-item">
          <a class="nav-link" href="./feeds.php">Feeds</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link private-shadow-text" href="./profile.php">Profile <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./search.php">Search</a>
        </li>
      </ul>
      <a class="btn btn-outline-light my-2 my-sm-0 shadow-text" href="./logout.php">Logout</a>
    </div>
  </nav>
  <!-- PROFILE -->
  <div class="container d-flex justify-content-center private-margin-nav">
    <div class="col-lg-8">
    <?php
      if (isset($updateErrorUsername)) {
      ?>
        <div class="alert alert-danger" role="alert">
          Username already used.
        </div>
      <?php
      }
      ?>
      <div class="card my-1">
        <h4 class="card-title text-center my-3">Settings</h4>
        <div class="container">
          <form class="row px-5 py-2" method="POST">
            <h5 class="col-12">Edit Profile</h5>
            <div class="form-group col-12">
              <label for="email">Edit your email address</label>
              <input type="email" class="form-control form-control-sm" name="email" aria-describedby="emailHelp" placeholder="Enter your new email..." value="<?= $_SESSION['email'] ?>" required>
            </div>
            <div class="form-group col-6">
              <label for="first-name">Edit your first name</label>
              <input type="text" class="form-control form-control-sm" name="first-name" placeholder="Enter your new first name..." value="<?= $_SESSION['firstName'] ?>" required>
            </div>
            <div class="form-group col-6">
              <label for="last-name">Edit your last name</label>
              <input type="text" class="form-control form-control-sm" name="last-name" placeholder="Enter your new last name..." value="<?= $_SESSION['lastName'] ?>" required>
            </div>
            <div class="form-group col-12">
              <label for="username">Edit your username</label>
              <input type="text" class="form-control form-control-sm" name="username" minlength="8" value="<?= $_SESSION['username'] ?>" placeholder="Enter your new username..." required>
            </div>
            <button type="submit" class="btn btn-warning mx-3" name="profileUpdate" onclick="return confirm('Are you sure you want to update your profile?')">Edit Profile</button>
          </form>
          <div class="row px-5 py-2">
            <h5 class="col-12">Account</h5>
            <p class="col-8">Delete account</p>
            <a class="col-4 btn btn-sm btn-danger mb-3" href="account-delete.php" onclick="return confirm('Are you sure you want to delete your account?')">delete account</a>
          </div>
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