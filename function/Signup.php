<?php
include "../config.php";
$user = $_POST['username'];
$mail = $_POST['mails'];
$pass = $_POST['password'];
$hash = password_hash($pass, PASSWORD_DEFAULT);

if (!empty($mail) && !empty($pass)) {
  # code...
  $row = mysqli_query($conn, "SELECT * FROM user WHERE email = '$mail'");
  $rows = mysqli_fetch_array($row);
  if ($rows['email'] == $mail) {
    echo "<script>alert('User sudah ada'); window.location.href= '../index.php';</script>";
  } else {
    $sql_role_name  = mysqli_query($conn, "SELECT role_name FROM user WHERE role_name = 'Administrator'");
    $result_row_name = mysqli_fetch_array($sql_role_name);
    if ($result_row_name['role_name'] <= 0) {
      $role = mysqli_query($conn, "SELECT role_name FROM user where role_");
      mysqli_query($conn, "INSERT INTO user (role_id, role_name, nama, email, password) VALUES ('', '', '$user', '$mail', '$hash')");
      $id = mysqli_insert_id($conn);
      mysqli_query($conn, "UPDATE user SET role_id = 'ADM_00$id', role_name = 'Administrator' WHERE id=last_insert_id();");
      header("location: ../index.php");
    } elseif ($result_row_name['role_name'] >= 0) {
      $role = mysqli_query($conn, "SELECT role_name FROM user where role_");
      mysqli_query($conn, "INSERT INTO user (role_id, role_name, nama, email, password) VALUES ('', '', '$user', '$mail', '$hash')");
      $id = mysqli_insert_id($conn);
      mysqli_query($conn, "UPDATE user SET role_id = 'RO_00$id', role_name = 'Recruitment Admin' WHERE id=last_insert_id();");
      header("location: ../index.php");
    }
  }
}
