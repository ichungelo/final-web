<?php
$connection = mysqli_connect("localhost", "root", "", "howlers");

if(mysqli_connect_errno()) {
  echo `Failed to connect database`.mysqli_connect_error();
};
?>