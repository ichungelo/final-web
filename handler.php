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