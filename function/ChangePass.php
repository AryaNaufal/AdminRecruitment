<?php
include '../config.php';
$mail = mysqli_real_escape_string($conn, $_POST['mails']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$passChange = $_POST['passwordChange'];
$hash = password_hash($passChange, PASSWORD_DEFAULT);


if (!empty($mail) && !empty($pass) && !empty($passChange)) {
  # code...
  $sql = mysqli_query($conn, "SELECT * FROM user WHERE mail = '$mail'");
  if (mysqli_num_rows($sql) > 0) {
    # code...
    $row = mysqli_fetch_assoc($sql);
    $enc_pass = $row['password'];
    $user_pass = password_verify($pass, $enc_pass);

    if ($user_pass) {
      mysqli_query($conn, "UPDATE user SET password = '$hash' WHERE mail = '$mail'");
      header("location: ../input.php");
    } else {
      echo "<script>alert('Password salah!'); window.location.href = '../input.php';</script>";
    }
  } else {
    echo "<script>alert('Email tidak ditemukan!'); window.location.href = '../view/ChangePass.php';</script>";
  }
} else {
  echo "<script>alert('All input fields are required!'); window.location.href = '../view/ChangePass.php';</script>";
}
