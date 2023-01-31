<?php
date_default_timezone_set('Asia/Jakarta');
include '../config.php';

if (isset($_POST['Edit'])) {

  $id = $_POST['id'];
  $histori = $_POST['histori'];
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

  $dir = "../cv";
  $file_name = basename($_FILES['files']['name']);
  $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $file_size = $_FILES['files']['size'];
  $upload_file = $_FILES['files']['tmp_name'];
  $new_name = $file_name;

  $Lolos = 'CV In';
  $TidakLolos = 'Drop';

  if ($file_size < 1000000 and ($file_type == 'pdf' OR $file_type == 'docx')) {
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
  pengalaman='$Pengalaman' where id='$id'";

  // $query = "UPDATE cv SET tanggal='$Tanggal', 
  // nama='$Nama',  
  // telp='$Telp', 
  // kategori='$Kategori', 
  // posisi='$Posisi', 
  // chanel='$Chanel', 
  // edukasi='$Edukasi', 
  // institusi='$Institusi',
  // jurusan='$Major',
  // ipk='$Ipk',
  // kelulusan='$Kelulusan',
  // status='$Status',
  // pengalaman='$Pengalaman' where id='$id'";

  // mysqli_query($conn, "UPDATE cv SET kelulusan='Lolos', status='$Lolos' where id='$id'");
  // mysqli_query($conn, "UPDATE cv SET kelulusan='Tidak Lolos', status='$TidakLolos' where id='$id'");  

  // if ($Kelulusan == 'Lolos') {
  //   mysqli_query($conn, "UPDATE cv SET kelulusan='$Kelulusan', status='CV in' where id='$id'");
  // } elseif ($Kelulusan == 'Tidak Lolos') {
  //   mysqli_query($conn, "UPDATE cv SET kelulusan='$Kelulusan', status='Drop' where id='$id'");
  // }

  mysqli_query($conn, $query);

  $waktu = date("Y-m-d H:i:s");
  if($histori != null && $histori != "") {
    mysqli_query($conn, "INSERT INTO history (id, nama, histori, data, waktu) VALUES ('$id','$histori', 'Mengedit', '$Nama', '$waktu')");
  }

  header("location: ../index.php");
}