<?php
session_start();
include('config.php');
if (isset($_POST['delete'])) {
  $id = $_POST['postId'];
  $checkPostByIdQuery = "SELECT * FROM posts WHERE post_id = '$id'";
  $checkPostByIdHandler = mysqli_query($connection, $checkPostByIdQuery) or die(mysqli_error($connection));
  if (mysqli_num_rows($checkPostByIdHandler) > 0) {
    $deletePostByIdQuery = "DELETE FROM posts WHERE post_id ='$id'";
    $deletePostByIdHandler = mysqli_query($connection, $deletePostByIdQuery) or die(mysqli_error($connection));
    if ($deletePostByIdHandler) {
      echo "
      <script>
        alert('Post Successfully Deleted')
        window.location.href = 'profile.php';
      </script>";
    } else {
      echo "
      <script>
        alert('Failed to Delete Post')
      </script>";
    }
  }

  
}
