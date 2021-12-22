<?php
include("config.php");
// REGISTER
if (isset($_POST['register'])) {
  $email = $_POST['email'];
  $firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];
  $username = $_POST['username'];
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $password2 = mysqli_real_escape_string($connection, $_POST['password2']);

  $usernameCheckQuery = "SELECT username FROM users WHERE username = '$username'";
  $usernameCheckHandler = mysqli_query($connection, $usernameCheckQuery);
  if ($password !== $password2) {
    $registerErrorPassword = true;
  } elseif (mysqli_fetch_assoc($usernameCheckHandler)) {
    $registerErrorUsername = true;
  } else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $registerQuery = "INSERT INTO users (email, first_name, last_name, username, password) VALUES ('$email', '$firstName', '$lastName', '$username', '$password')";

    $registerHandler = mysqli_query($connection, $registerQuery) or die(mysqli_error($connection));
    if ($registerHandler) {
      echo "
    <script>
      alert('Register Success')
      window.location.href = 'index.php';
    </script>";
    } else {
      echo "
    <script>
      alert('Failed to Register')
    </script>";
    }
  }
}

// LOGIN
if (isset($_POST['login'])) {
  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  $usernameCheckQuery = "SELECT * FROM users WHERE username = '$username'";
  $usernameCheckHandler = mysqli_query($connection, $usernameCheckQuery);

  if (mysqli_num_rows($usernameCheckHandler) === 1) {
    $result = mysqli_fetch_assoc($usernameCheckHandler);
    if (password_verify($password, $result['password'])) {
      $usernameCheckQuery = "SELECT * FROM users WHERE username = '$username'";
      $usernameCheckHandler = mysqli_query($connection, $usernameCheckQuery);
      $user = mysqli_fetch_assoc($usernameCheckHandler);
      $_SESSION['userId'] = $user['user_id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['firstName'] = $user['first_name'];
      $_SESSION['lastName'] = $user['last_name'];
      $_SESSION['loggedIn'] = true;

      header('Location: feeds.php');
      exit;
    } else {
      $loginErrorPassword = true;
    }
  } else {
    $loginErrorUsername = true;
  }
}

// POST BY ID
if (isset($_POST['send'])) {
  $content = $_POST['content'];
  $userId = $_SESSION['userId'];

  $postContentQuery = "INSERT INTO posts (user_id, post) VALUES ('$userId', '$content')";
  $postContentHandler = mysqli_query($connection, $postContentQuery) or die(mysqli_error($connection));
}

// GET SEARCHED USER DATA
if (isset($_POST['search'])) {
  $searchStatus = true;
  $searchText = $_POST['searchText'];
  $getSearchedUserDataQuery = "SELECT * FROM users WHERE ( username LIKE '%$searchText%' OR first_name LIKE '%$searchText%' OR last_name LIKE '%$searchText%')";
  $getSearchedUserDataHandler = mysqli_query($connection, $getSearchedUserDataQuery)or die(mysqli_error($connection));
}

// GET ALL POST BY ID
if (isset($_SESSION['loggedIn'])) {
  $userId = $_SESSION['userId'];
  $getPostByIdQuery = "SELECT * FROM posts WHERE user_id = '$userId' ORDER BY created_at DESC";
  $getPostByIdHandler = mysqli_query($connection, $getPostByIdQuery) or die(mysqli_error($connection));
}

// GET USER BY USERNAME
if (isset($_GET['username'])) {
  $username = $_GET['username'];
  $getUserByUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
  $getUserByUsernameHandler = mysqli_query($connection, $getUserByUsernameQuery)or die(mysqli_error($connection));
  $userData = mysqli_fetch_assoc($getUserByUsernameHandler);
  $userId = $userData['user_id'];
  $getPostByUsernameQuery = "SELECT * FROM posts WHERE user_id = '$userId' ORDER BY created_at DESC";
  $getPostByUsernameHandler = mysqli_query($connection, $getPostByUsernameQuery) or die(mysqli_error($connection));
  $getFollowingByUsernameQuery = "SELECT * FROM follows WHERE user_id = '$userId'";
  $getFollowingByUsernameHandler = mysqli_query($connection, $getFollowingByUsernameQuery) or die(mysqli_error($connection));
  $getFollowersByUsernameQuery = "SELECT * FROM follows WHERE follow_user_id = '$userId'";
  $getFollowersByUsernameHandler = mysqli_query($connection, $getFollowersByUsernameQuery) or die(mysqli_error($connection));
}

// GET FOLLOWING
if (isset($_SESSION['loggedIn'])) {
  $userId = $_SESSION['userId'];
  $getFollowingByIdQuery = "SELECT * FROM follows WHERE user_id = '$userId'";
  $getFollowingByIdHandler = mysqli_query($connection, $getFollowingByIdQuery) or die(mysqli_error($connection));
}

// GET FOLLOWERS
if (isset($_SESSION['loggedIn'])) {
  $userId = $_SESSION['userId'];
  $getFollowersByIdQuery = "SELECT * FROM follows WHERE follow_user_id = '$userId'";
  $getFollowersByIdHandler = mysqli_query($connection, $getFollowersByIdQuery) or die(mysqli_error($connection));
}