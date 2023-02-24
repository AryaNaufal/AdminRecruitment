<?php
include '../config.php';
$user = $_POST['username'];
$mail = $_POST['mails'];
$pass = $_POST['password'];
$hash = password_hash($pass, PASSWORD_DEFAULT);
$row = mysqli_query($conn, "SELECT * FROM user WHERE mail = '$mail'");
$rows = mysqli_fetch_array($row);

if (!empty($mail) && !empty($pass)) {
  # code...
  if ($rows['mail'] == $mail) {
    # code...
    echo "<script>alert('User sudah ada'); window.location.href= '../index.php';</script>";
  } else {
    mysqli_query($conn, "INSERT INTO user (username, mail, password) VALUES ('$user', '$mail', '$hash')");
    header("location: ../login.php");
  }
}
