<?php
session_start();
include('config.php');
if (isset($_POST['follow'])) {
  $idUser = $_SESSION['userId'];
  $idFollow = $_POST['followId'];
  $checkFollowQuery = "SELECT * FROM `follows` WHERE user_id = '$idUser' AND follow_user_id = '$idFollow'";
  $checkFollowHandler = mysqli_query($connection, $checkFollowQuery)or die(mysqli_error($connection));
  if (mysqli_num_rows($checkFollowHandler) > 0) {
    $unfollowQuery = "DELETE FROM follows WHERE user_id = '$idUser' AND follow_user_id = '$idFollow'";
    $unfollowHandler = mysqli_query($connection, $unfollowQuery)or die(mysqli_error($connection));
    if ($unfollowHandler) {
      echo "
        <script>
          alert('Unfollow Success')
          window.location.href = 'profile.php';
        </script>";
    } else {
      echo "
        <script>
          alert('Failed to unfollow')
        </script>";
    }
  } else {
    $followQuery = "INSERT INTO follows (user_id, follow_user_id ) VALUES ('$idUser', '$idFollow')";
    $followHandler = mysqli_query($connection, $followQuery) or die(mysqli_error($connection));
    if ($followHandler) {
      echo "
        <script>
          alert('Follow Success')
          window.location.href = 'profile.php';
        </script>";
    } else {
      echo "
        <script>
          alert('Failed to follow')
        </script>";
    }
  }
}
?>
