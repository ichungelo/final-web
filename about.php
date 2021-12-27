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

<body class="d-flex flex-column min-vh-100 private-background">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark private-style-navbar">
    <a class="navbar-brand text-sm" href="./index.php">
      <img src="./assets/images/ichun.png" alt="logo">
      Knotext
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link private-shadow-text" href="./about.php">About <span class="sr-only">(current)</span></a>
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
  <!-- ABOUTPAGE -->
  <div class="container text-center mt-5 ">
    <h2 class="col-12">Contact Me</h2>
    <div class="row justify-content-sm-center">
      <div class="mt-5 col-md-4">
        <h4>Phone</h4>
        <a href="tel:+628998740995" class="btn btn-outline-primary btn-lg">+62899 8740 995</a>
      </div>
      <div class="mt-5 col-md-4">
        <h4>Mail</h4>
        <a href="mailto:krisna.s.362@gmail.com" class="btn btn-outline-primary btn-lg">krisna.s.362@gmail.com</a>
      </div>
    </div>
    <div class="mt-5">
      <h2>Catch me on social media</h2>
      <div class="mt-">
        <a href="https://web.facebook.com/ichungelo/" target="_blank"><img class="private-style-icon" src="/assets/images/tabler-icon-brand-facebook.png" alt="facebook-icon"></a>
        <a href="https://twitter.com/ichungelo" target="_blank"><img class="private-style-icon" src="/assets/images/tabler-icon-brand-twitter.png" alt="twitter-icon"></a>
        <a href="https://www.instagram.com/ichungelo/" target="_blank"><img class="private-style-icon" src="/assets/images/tabler-icon-brand-instagram.png" alt="instagram-icon"></a>
        <a href="https://www.linkedin.com/in/krisna-satriadi-544aa9111/" target="_blank"><img class="private-style-icon" src="/assets/images/tabler-icon-brand-linkedin.png" alt="linkedin-icon"></a>
        <a href="https://github.com/ichungelo" target="_blank"><img class="private-style-icon" src="/assets/images/tabler-icon-brand-github.png" alt="github-icon"></a>
        <a href="https://api.whatsapp.com/send?phone=628998740995&text=Hi" target="_blank"><img class="private-style-icon" src="/assets/images/tabler-icon-brand-whatsapp.png" alt="wa-icon"></a>
      </div>
    </div>
  </div>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
<footer class="mt-auto bg-light text-center">
  Copyright &#169 Ichungelo inc 2021, All rights reserved
</footer>

</html>