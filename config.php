<?php
$connection = mysqli_connect("localhost", "root", "", "social_media");

if(mysqli_connect_errno()) {
  echo `Failed to connect database` . mysqli_connect_error();
};
?>