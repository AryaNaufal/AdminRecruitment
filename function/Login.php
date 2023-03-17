<?php
session_start();
include '../config.php';
// $user = mysqli_real_escape_string($conn, $_POST['username']);
$mail = mysqli_real_escape_string($conn, $_POST['mails']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($mail) && !empty($pass)) {
  $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '$mail'");

  if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $enc_pass = $row['password'];
    $user_pass = password_verify($pass, $enc_pass);

    // if ($user_pass === $enc_pass) {

    //   $_SESSION['unique_id'] = $row['unique_id'];
    //   echo "success";
    // } 
    if ($user_pass) {
      $_SESSION['name'] = $row['nama'];
      if ($row['role_name'] == 'Administrator' OR $row['role_name'] == 'Recruitment Admin' OR $row['role_name'] == 'Recruitment Officer') {
        $_SESSION['role'] = $row['role_name'];
        header('location: ../HomePage.php');
      }
    }
    else {
      echo "<script>alert('User/Pass salah!'); window.location.href = '../index.php';</script>";
    }
  } else {
    echo "<script>alert('All input fields are required!'); window.location.href = '../index.php';</script>";
  }
} else {
  echo "<script>alert('All input fields are required!'); window.location.href = '../index.php';</script>";
}
