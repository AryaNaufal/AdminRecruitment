<?php
session_start();
include '../config.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
$row = mysqli_fetch_array($sql);

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString;
}

$random = generateRandomString();

if ($id == $row['id']) {
  # code...
  echo '<script>alert("'. $random .'"); window.location.href = "../view/Roles.php";</script>';
  mysqli_query($conn, "UPDATE user SET password = '". password_hash($random, PASSWORD_DEFAULT) ."' WHERE id = '$id'");
}



