<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
  header('Location: profile.php');
}
include('./handler.php');
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
  <title>Knotext</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark private-style-navbar">
    <a class="navbar-brand " href="./index.php">
      <img src="./assets/images/ichun.png" alt="logo">
      Knotext
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link private-shadow-text" href="./index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about.php">About</a>
        </li>
      </ul>
      <div>
        <form class="form-inline justify-content-sm-center" method="POST">
          <input class="form-control my-1 mr-sm-2" type="text" name="loginUsername" placeholder="Username" required>
          <input class="form-control my-1 mr-sm-2" type="password" name="loginPassword" placeholder="Password" required>
          <button class="btn btn-warning my-2 my-sm-0 shadow-text" name="login">Login</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- ERROR LOGIN -->
  <div>
    <?php
    if (isset($loginErrorPassword)) {
    ?>
      <div class="alert alert-danger m-2" role="alert">
        Incorrect password
      </div>
    <?php
    }
    ?>
    <?php
    if (isset($loginErrorUsername)) {
    ?>
      <div class="alert alert-danger m-2" role="alert">
        Invalid username
      </div>
    <?php
    }
    ?>
  </div>
  <!-- HOMEPAGE -->
  <div class="container-fluid px-0">
    <div class="row no-gutters">
      <!-- HOMETEXT -->
      <div class="col-lg-7">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./assets/images/slides1.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <p class="private-shadow-text">Welcome to</p>
                <h1 class="private-shadow-text">Knotext</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img src="./assets/images/slides2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <p class="private-style-carousel-text p-1">Knotext is a simple textbased social media, inspired by twitter but much simpler. build for compleeting final submission project at mini bootcamp with studybox.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="./assets/images/slides3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <p class="private-style-carousel-text p-1">Feel free to use this page and copy this repo with <a class="btn btn-warning btn-sm" href="https://github.com/ichungelo/final-web.git" target="_blank">Click this Button</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- REGISTER -->
      <div class="col-lg-5" style="background-color: white;">
        <div class="container">
          <?php
          ?>
          <div class="card-body">
            <p class="card-text">Don't have an account?</p>
            <h4 class="card-title text-center">Register</h4>
            <?php
            if (isset($registerErrorPassword)) {
            ?>
              <div class="alert alert-danger" role="alert">
                Password doesn't match
              </div>
            <?php
            }
            ?>
            <?php
            if (isset($registerErrorUsername)) {
            ?>
              <div class="alert alert-danger" role="alert">
                Username is already taken
              </div>
            <?php
            }
            ?>
            <form class="row" method="POST">
              <div class="form-group col-12">
                <label for="email">Email address</label>
                <input type="email" class="form-control form-control-sm" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group col-md-6">
                <label for="first-name">First name</label>
                <input type="text" class="form-control form-control-sm" name="first-name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="last-name">Last name</label>
                <input type="text" class="form-control form-control-sm" name="last-name" required>
              </div>
              <div class="form-group col-12">
                <label for="username">Username</label>
                <input type="text" class="form-control form-control-sm" name="username" minlength="8" required>
              </div>
              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-sm" name="password" minlength="8" required>
              </div>
              <div class="form-group col-md-6">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control form-control-sm" name="password2" minlength="8" required>
              </div>
              <button type="submit" class="btn btn-warning mx-3 btn-block" name="register">Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END OF NAVBAR -->
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
<footer class=" bg-light text-center">
  Copyright &#169 Ichungelo inc 2021, All rights reserved
</footer>

</html>