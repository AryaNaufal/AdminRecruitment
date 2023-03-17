<?php
include "../config.php";
$user = $_POST['username'];
$mail = $_POST['mails'];
$pass = $_POST['password'];
$id = mysqli_insert_id($conn);
$hash = password_hash($pass, PASSWORD_DEFAULT);


if (!empty($mail) && !empty($pass)) {
  # code...
  $row = mysqli_query($conn, "SELECT * FROM user WHERE email = '$mail'");
  $rows = mysqli_fetch_array($row);
  if ($rows['email'] == $mail) {
    # code...
    echo "<script>alert('User sudah ada'); window.location.href= '../index.php';</script>";
  } else {
    mysqli_query($conn, "INSERT INTO user (nama, email, password, role_id, role_name) VALUES ('$user', '$mail', '$hash')");
    mysqli_query($conn, "UPDATE user SET role_id = 'RO_00$id', role_name = 'Recruitment Admin' WHERE id=$id");

    header("location: ../index.php");
  }
}
