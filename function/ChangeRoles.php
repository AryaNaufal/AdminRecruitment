<?php
include '../config.php';


$id = $_POST['id'];
$tes = $_POST['tes'];
$tes2 = $_POST['tes2'];
$tes3 = $_POST['tes3'];
// if (isset($tes)) {
//   mysqli_query($conn, "UPDATE user SET role_name = '$tes' WHERE id=$id");
//   header('location: view/Roles.php');
// }

if (isset($tes)) {
  mysqli_query($conn, "UPDATE user SET role_id = 'ADM_00$id', role_name = '$tes' WHERE id=$id");
  header('location: ../view/Roles.php');
} else if (isset($tes2)) {
  mysqli_query($conn, "UPDATE user SET role_id = 'RA_00$id', role_name = '$tes2' WHERE id=$id");
  header('location: ../view/Roles.php');
} else if (isset($tes3)) {
  mysqli_query($conn, "UPDATE user SET role_id = 'RO_00$id', role_name = '$tes3' WHERE id=$id");
  header('location: ../view/Roles.php');
}
