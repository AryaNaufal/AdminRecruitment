<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config.php';

if (isset($_POST['Edit'])) {

  $id = $_POST['id'];
  $username = $_SESSION['name'];
  $Tanggal = $_POST['tanggal'];
  $Nama = $_POST['nama'];
  $Telp = $_POST['noTelp'];
  $Tipe = $_POST['tipe'];
  $Kategori = $_POST['category'];
  $Posisi = $_POST['posisi'];
  $Chanel = $_POST['chanel'];
  $Edukasi = $_POST['education'];
  $Institusi = $_POST['institution'];
  $Major = $_POST['major'];
  $Ipk = $_POST['ipk'];
  $Kelulusan = $_POST['kelulusan'];
  $Pengalaman = $_POST['experience'];
  $Status = $_POST['status'];
  $Remark = $_POST['remark'];

  $dir = "../cv";
  $file_name = basename($_FILES['files']['name']);
  $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $file_size = $_FILES['files']['size'];
  $upload_file = $_FILES['files']['tmp_name'];
  $new_name = $file_name;

  $Lolos = 'CV in';
  $TidakLolos = 'Drop';

  if ($file_size < 1000000 and ($file_type == 'pdf' or $file_type == 'docx')) {
    move_uploaded_file($upload_file, $dir . '/' . $new_name);
    mysqli_query($conn, "UPDATE cv SET file_cv='$new_name' where id='$id'");
  }

  $query = "UPDATE cv SET tanggal='$Tanggal', 
  nama='$Nama',  
  telp='$Telp', 
  type='$Tipe', 
  kategori='$Kategori', 
  posisi='$Posisi', 
  chanel='$Chanel', 
  edukasi='$Edukasi', 
  institusi='$Institusi',
  jurusan='$Major',
  ipk='$Ipk',
  kelulusan='$Kelulusan',
  status='$Status',
  pengalaman='$Pengalaman',
  remarks='$Remark' where id='$id'";

  mysqli_query($conn, $query);

  $waktu = date("Y-m-d H:i:s");
  if (!empty($new_name)) {
    mysqli_query($conn, "INSERT INTO history (id, nama, histori, data, waktu, status) VALUES ('$id','$username', 'Mengupload', '$Nama', '$waktu', '$Status')");
  } elseif (isset($Status)) {
    mysqli_query($conn, "INSERT INTO history (id, nama, histori, data, waktu, status) VALUES ('$id','$username', 'Mengedit', '$Nama', '$waktu', '$Status')");
  }


  header("location: ../HomePage.php");
}
