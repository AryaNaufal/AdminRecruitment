<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['Submit'])) {
  include "../config.php";

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
  $Pengalaman = $_POST['experience'];
  $Lolos = 'CV In';
  $TidakLolos = 'Drop';


  /* Kriteria D3 */
  if (($Tipe == "IT" &&  $Edukasi == "Diploma 3") and ($Major == "Information Technology" || $Major == "Teknik Industri" || $Major == "Teknik Elektro" || $Major == "MIPA") and $Ipk >= 3.1 and $Pengalaman >= 12) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos', '$Lolos', '', '')");
  } elseif (($Tipe == "Non IT" &&  $Edukasi == "Diploma 3")  and $Ipk >= 3.1 and $Pengalaman >= 12) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos', '$Lolos', '', '')");
  }

  /* Kriteria SMA, SMK, D1, D2 */ elseif (($Edukasi == "SMA" || $Edukasi == "SMK" || $Edukasi == "Diploma 1" || $Edukasi == "Diploma 2") and $Pengalaman >= 12) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos', '$Lolos', '', '')");
  }

  /* Kriteria D4, S1, S2, S3 */ elseif (($Tipe == "IT" && ($Edukasi == "Diploma 4" || $Edukasi == "Sarjana 1" || $Edukasi == "Sarjana 2" || $Edukasi == "Sarjana 3")) and ($Major == "Information Technology" || $Major == "Teknik Industri" || $Major == "Teknik Elektro" || $Major == "MIPA") and $Ipk >= 2.8 and $Pengalaman >= 6) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos', '$Lolos', '', '')");
  } elseif (($Tipe == "IT" && ($Edukasi == "Diploma 4" || $Edukasi == "Sarjana 1" || $Edukasi == "Sarjana 2" || $Edukasi == "Sarjana 3")) and ($Major == "Information Technology" || $Major == "Teknik Industri" || $Major == "Teknik Elektro" || $Major == "MIPA") and $Ipk >= 3.3 and $Pengalaman <= 5) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos', '$Lolos', '', '')");
  } elseif (($Tipe == "Non IT" && ($Edukasi == "Diploma 4" || $Edukasi == "Sarjana 1" || $Edukasi == "Sarjana 2" || $Edukasi == "Sarjana 3")) and $Ipk >= 2.8 and $Pengalaman >= 6) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos', '$Lolos', '', '')");
  } elseif (($Tipe == "Non IT" && ($Edukasi == "Diploma 4" || $Edukasi == "Sarjana 1" || $Edukasi == "Sarjana 2" || $Edukasi == "Sarjana 3")) and $Ipk >= 3.3 and $Pengalaman <= 5) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos', '$Lolos', '', '')");
  } else {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, type, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan, status, file_cv, remarks) VALUES ('$Tanggal', '$Nama', '$Telp', '$Tipe', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Tidak Lolos', '$TidakLolos', '', '')");
  }

  $waktu = date("Y-m-d H:i:s");
  $id = mysqli_insert_id($conn);
  $stats = mysqli_query($conn, "SELECT status FROM cv WHERE id = '$id'");
  mysqli_query($conn, "INSERT INTO history (id, nama, histori, data, waktu, status) VALUES ('$id','$username', 'Menambah', '$Nama', '$waktu', '$stats')");


  header("location: ../HomePage.php");
}
