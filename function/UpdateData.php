<?php

if (isset($_POST['Edit'])) {

  $id = $_POST['id'];
  $Tanggal = $_POST['tanggal'];
  $Nama = $_POST['nama'];
  $Telp = $_POST['noTelp'];
  $Kategori = $_POST['category'];
  $Posisi = $_POST['posisi'];
  $Chanel = $_POST['chanel'];
  $Edukasi = $_POST['education'];
  $Institusi = $_POST['institution'];
  $Major = $_POST['major'];
  $Ipk = $_POST['ipk'];
  $Kelulusan = $_POST['kelulusan'];
  $Pengalaman = $_POST['experience'];

  include '../config.php';


  $query = "UPDATE cv SET tanggal='$Tanggal', 
  nama='$Nama',  
  telp='$Telp', 
  kategori='$Kategori', 
  posisi='$Posisi', 
  chanel='$Chanel', 
  edukasi='$Edukasi', 
  institusi='$Institusi',
  jurusan='$Major',
  ipk='$Ipk',
  kelulusan='$Kelulusan',
  pengalaman='$Pengalaman' where id='$id'";


  mysqli_query($conn, $query);

  header("location: ../index.php");
}
