<?php
include("config.php");
// REGISTER
if (isset($_POST["register"])) {
  $email = $_POST['email'];
  $firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];
  $username = $_POST['username'];
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $password2 = mysqli_real_escape_string($connection, $_POST['password2']);

  $usernameCheckQuery = "SELECT username FROM users WHERE username = '$username'";
  $usernameCheckHandler = mysqli_query($connection, $usernameCheckQuery);
  if ($password !== $password2) {
    echo "<script>
    alert(`Password doesn't match`)
    </script>";
  } elseif (mysqli_fetch_assoc($usernameCheckHandler)) {
    echo "<script>
    alert('Username is already taken')
    </script>";
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
