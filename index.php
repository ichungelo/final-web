<?php
// include("./config.php")

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
        <form class="form-inline my-2 my-lg-0 mr-0 col-12 justify-content-sm-center">
          <input class="form-control my-1 mr-sm-2" type="text" placeholder="Username">
          <input class="form-control my-1 mr-sm-2" type="password" placeholder="Password">
          <button class="btn btn-outline-light my-2 my-sm-0 shadow-text" type="submit">Login</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- HOMEPAGE -->
  <div class="container-fluid my-3 row">
    <!-- HOMETEXT -->
    <div class="col-lg-8">
      <p>Welcome To</p>
      <h1>Knotext</h1>
    </div>
    <!-- REGISTER -->
    <div class="col-lg-4">
      <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
          <p class="card-text">Don't have an account?</p>
          <h4 class="card-title text-center">Register</h4>
          <form class="row" method="POST">
            <div class="form-group col-12">
              <label for="email">Email address</label>
              <input type="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group col-md-6">
              <label for="first-name">First name</label>
              <input type="text" class="form-control form-control-sm" id="first-name">
            </div>
            <div class="form-group col-md-6">
              <label for="last-name">Last name</label>
              <input type="text" class="form-control form-control-sm" id="last-name">
            </div>
            <div class="form-group col-12">
              <label for="username">Username</label>
              <input type="text" class="form-control form-control-sm" id="username">
            </div>
            <div class="form-group col-12">
              <label for="password">Password</label>
              <input type="password" class="form-control form-control-sm" id="password">
            </div>
            <button type="submit" class="btn btn-primary mx-3 btn-block">Submit</button>
          </form>
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
<footer class="mt-auto bg-light text-center">
  Copyright &#169 Ichungelo inc 2021, All rights reserved
</footer>

</html>