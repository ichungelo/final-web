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
  <title>Knotext | <?= $userData['username'] ?></title>
</head>

<body class="d-flex flex-column min-vh-100 private-background">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark private-style-navbar fixed-top">
    <a class="navbar-brand " href="./index.php">
      <?= $userData['username'] ?>
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
    <br><br><br>
  <div class="container d-flex justify-content-center">
    <div class="col-lg-8">
      <div class="card mt-1 mb-3">
        <h4 class="card-title text-center my-2"><?= $userData['username'] ?></h4>
        <div class="card-body">
          <div class="text-center">
            <div class="row my-2">
              <div class="col-md-4 my-2">
                <img class="private-style-avatar" src="https://avatars.dicebear.com/api/initials/<?= $userData['first_name'] ?>-<?= $userData['last_name'] ?>.svg" alt="">
              </div>
              <div class="col-md-8 my-2">
                <div class="col-md-12">
                  <div class=""><?= $userData['first_name'] ?> <?= $userData['last_name'] ?></div>
                  <div><?= $userData['email'] ?></div>
                </div>
                <div class="col-md-12">
                <?php
                if ($_SESSION['userId'] === $userData['user_id']) {
                  echo "";
                } else {
                  $idUser = $_SESSION['userId'];
                  $idFollow = $userData['user_id'];
                  $checkFollowQuery = "SELECT * FROM `follows` WHERE user_id = '$idUser' AND follow_user_id = '$idFollow'";
                  $checkFollowHandler = mysqli_query($connection, $checkFollowQuery) or die(mysqli_error($connection));
                ?>
                  <a href="follow.php?id=<?= $userData['user_id'] ?>" class="btn <?= mysqli_num_rows($checkFollowHandler) > 0 ? "btn-danger" : "btn-success" ?> btn-sm btn-block" rows="4">
                    <?= mysqli_num_rows($checkFollowHandler) > 0 ? "Unfollow" : "Follow" ?>
                  </a>
                <?php
                }
                ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-md-4 text-center">
              <a href="followers.php?id=<?= $userData['user_id'] ?>" class="text-dark">
                <h6>followers</h6>
                <p><?= mysqli_num_rows($getFollowersByUsernameHandler) ?></p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="following.php?id=<?= $userData['user_id'] ?>" class="text-dark">
                <h6>following</h6>
                <p><?= mysqli_num_rows($getFollowingByUsernameHandler) ?></p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <h6>Posts</h6>
              <p><?= mysqli_num_rows($getPostByUsernameHandler) ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
      while ($post = mysqli_fetch_assoc($getPostByUsernameHandler)) {
      ?>
        <div class="card my-1">
          <div class="card-body row">
            <div class="col-4 text-center">
              <img class="private-style-avatar" src="https://avatars.dicebear.com/api/initials/<?= $userData['first_name'] ?>-<?= $userData['last_name'] ?>.svg" alt="">
            </div>
            <div class="col-8">
              <h5 class="card-title"><?= $userData['username'] ?></h5>
              <div class="badge badge-pill badge-secondary"><?= date('D, d M Y', strtotime($post['created_at'].' UTC' )) ?></div>
                <div class="badge badge-pill badge-secondary"><?= date('h:i A', strtotime($post['created_at'].' UTC')) ?></div>
              <p class="card-text"><?= htmlspecialchars($post['post']) ?></p>
              <?php if ($post['created_at'] !== $post['updated_at']) {?> 
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