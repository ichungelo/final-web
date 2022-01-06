<?php
include("config.php");

//LOCAL TIME SET
date_default_timezone_set('Asia/Jakarta');

// REGISTER
if (isset($_POST['register'])) {
  $randomGenerator = random_bytes(16);

  $userId = bin2hex($randomGenerator);
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
    $registerQuery = "INSERT INTO users (user_id, email, first_name, last_name, username, password) VALUES ('$userId', '$email', '$firstName', '$lastName', '$username', '$password')";

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
  $usernameCheckHandler = mysqli_query($connection, $usernameCheckQuery) or die(mysqli_error($connection));

  if (mysqli_num_rows($usernameCheckHandler) === 1) {
    $result = mysqli_fetch_assoc($usernameCheckHandler);
    if (password_verify($password, $result['password'])) {
      $usernameCheckQuery = "SELECT user_id, email, first_name, last_name, username FROM users WHERE username = '$username'";
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
  if ($_SESSION['loggedIn']) {
    $randomGenerator = random_bytes(16);

    $postId = bin2hex($randomGenerator);
    $content = $_POST['content'];
    $userId = $_SESSION['userId'];

    $postContentQuery = "INSERT INTO posts (user_id, post, post_id) VALUES ('$userId', '$content', '$postId')";
    $postContentHandler = mysqli_query($connection, $postContentQuery) or die(mysqli_error($connection));
  } else {
    echo "<script>
            alert(`Please login first`)
            window.location.href = 'index.php'
          </script>";
  }
}

// GET SEARCHED USER DATA
if (isset($_POST['search'])) {
  $searchStatus = true;
  $searchText = $_POST['searchText'];
  $getSearchedUserDataQuery = "SELECT user_id, email, first_name, last_name, username FROM users WHERE ( username LIKE '%$searchText%' OR first_name LIKE '%$searchText%' OR last_name LIKE '%$searchText%')";
  $getSearchedUserDataHandler = mysqli_query($connection, $getSearchedUserDataQuery) or die(mysqli_error($connection));
}

if (isset($_SESSION['loggedIn'])) {
  $userId = $_SESSION['userId'];

  // GET ALL POST BY ID
  $getPostByIdQuery = "SELECT * FROM posts WHERE user_id = '$userId' ORDER BY created_at DESC";
  $getPostByIdHandler = mysqli_query($connection, $getPostByIdQuery) or die(mysqli_error($connection));

  // GET FOLLOWING NUMBER
  $getFollowingByIdQuery = "SELECT * FROM follows WHERE user_id = '$userId'";
  $getFollowingByIdHandler = mysqli_query($connection, $getFollowingByIdQuery) or die(mysqli_error($connection));

  // GET FOLLOWERS NUMBERS
  $getFollowersByIdQuery = "SELECT * FROM follows WHERE follow_user_id = '$userId'";
  $getFollowersByIdHandler = mysqli_query($connection, $getFollowersByIdQuery) or die(mysqli_error($connection));

  // GET FEED POST
  $getAllFeedPostQuery = "SELECT posts.post_id, posts.post, posts.created_at,posts.updated_at, posts.user_id, users.first_name, users.last_name, users.username FROM posts JOIN follows ON posts.user_id = follows.follow_user_id JOIN users ON posts.user_id = users.user_id WHERE follows.user_id = '$userId' ORDER BY created_at DESC";
  $getAllFeedPostHandler = mysqli_query($connection, $getAllFeedPostQuery) or die(mysqli_error($connection));
}

// GET USER DATA BY USERNAME
if (isset($_GET['username'])) {
  $username = $_GET['username'];
  $getUserByUsernameQuery = "SELECT user_id, email, first_name, last_name, username FROM users WHERE username = '$username'";
  $getUserByUsernameHandler = mysqli_query($connection, $getUserByUsernameQuery) or die(mysqli_error($connection));
  $userData = mysqli_fetch_assoc($getUserByUsernameHandler);
  $userId = $userData['user_id'];

  // GET POST NUMBERS
  $getPostByUsernameQuery = "SELECT * FROM posts WHERE user_id = '$userId' ORDER BY created_at DESC";
  $getPostByUsernameHandler = mysqli_query($connection, $getPostByUsernameQuery) or die(mysqli_error($connection));

  // GET FOLLOWING NUMBERS
  $getFollowingByUsernameQuery = "SELECT * FROM follows WHERE user_id = '$userId'";
  $getFollowingByUsernameHandler = mysqli_query($connection, $getFollowingByUsernameQuery) or die(mysqli_error($connection));

  // GET FOLLOWERS NUMBERS
  $getFollowersByUsernameQuery = "SELECT * FROM follows WHERE follow_user_id = '$userId'";
  $getFollowersByUsernameHandler = mysqli_query($connection, $getFollowersByUsernameQuery) or die(mysqli_error($connection));
}

if (isset($_GET['username'])) {
  $username = $_GET['username'];

  $getIdFromUsersQuery = "SELECT user_id, email, first_name, last_name, username FROM users WHERE username = '$username'";
  $getIdFromUsersHandler = mysqli_query($connection, $getIdFromUsersQuery) or die(mysqli_error($connection));
  $getUsers = mysqli_fetch_assoc($getIdFromUsersHandler);
  $userId = $getUsers['user_id'];

  //GET FOLLOWING USERS LIST
  $getFollowingUserQuery = "SELECT users.user_id, users.first_name, users.last_name, users.username FROM follows JOIN users ON follows.follow_user_id = users.user_id WHERE follows.user_id = '$userId'";
  $getFollowingUserHandler = mysqli_query($connection, $getFollowingUserQuery) or die(mysqli_error($connection));

  //GET FOLLOWERS USERS LIST
  $getFollowersUserQuery = "SELECT users.user_id, users.first_name, users.last_name, users.username FROM follows JOIN users ON follows.user_id = users.user_id WHERE follows.follow_user_id = '$userId'";
  $getFollowersUserHandler = mysqli_query($connection, $getFollowersUserQuery) or die(mysqli_error($connection));
}

if (isset($_POST['edit'])) {
  $postId = $_POST['postId'];
  $getPostByPostIdQuery = "SELECT * FROM posts WHERE post_id = '$postId'";
  $getPostByPostIdHandler = mysqli_query($connection, $getPostByPostIdQuery) or die(mysqli_error($connection));
  $editPost = mysqli_fetch_assoc($getPostByPostIdHandler);
}

// UPDATE POST
if (isset($_POST['postupdate'])) {
  $postId = $_POST['post_id'];
  $postUpdate = $_POST['post'];
  $updatePostQuery = "UPDATE posts SET post = '$postUpdate' WHERE post_id = '$postId'";
  $updatePostHandler = mysqli_query($connection, $updatePostQuery) or die(mysqli_error($connection));
  if ($updatePostHandler) {
    echo "
    <script>
      alert('Post successfully updated')
      window.location.href = 'profile.php';
    </script>";
  } else {
    echo "
    <script>
      alert('Failed to update post')
    </script>";
  }
}

// UPDATE PROFILE
if (isset($_POST['profileUpdate'])) {
  $userId = $_SESSION['userId'];
  $email = $_POST['email'];
  $firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];
  $username = $_POST['username'];

  $updateProfileQuery = "UPDATE 
  users
    SET 
      email = '$email',
      first_name = '$firstName',
      last_name = '$lastName',
      username = '$username'
    WHERE
      user_id = '$userId'";
  $updateProfileHandler = mysqli_query($connection, $updateProfileQuery) or die(mysqli_error($connection));
  if ($updateProfileHandler) {
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    echo "
    <script>
      alert('Profile successfully updated')
      window.location.href = 'profile.php';
    </script>";
  } else {
    echo "
    <script>
      alert('Failed to update profile')
    </script>";
  }
}

// DELETE ACCOUNT 
if (isset($_POST['accountDelete'])) {
  $deletedUserId = $_SESSION['userId'];
  $deletedPassword = $_POST['accountDeletePassword'];
  $checkAccountByIdQuery = "SELECT * FROM users WHERE user_id = '$deletedUserId'";
  $checkAccountByIdHandler = mysqli_query($connection, $checkAccountByIdQuery) or die(mysqli_error($connection));
  if (mysqli_num_rows($checkAccountByIdHandler) > 0) {
    $result = mysqli_fetch_assoc($checkAccountByIdHandler);
    if (password_verify($deletedPassword, $result['password'])) {
      $deleteAccountByIdQuery = "DELETE FROM users WHERE user_id ='$deletedUserId'";
      $deleteAccountByIdHandler = mysqli_query($connection, $deleteAccountByIdQuery) or die(mysqli_error($connection));
      if ($deleteAccountByIdHandler) {
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
        echo "
        <script>
          alert('Account Successfully Deleted')
          window.location.href = 'index.php';
        </script>";
      } else {
        echo "
        <script>
          alert('Failed to Delete account')
        </script>";
      }
    }
  }
}
