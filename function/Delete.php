<?php
include '../config.php';
$id_user = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM cv WHERE id = '$id_user'");
header("location:../index.php");