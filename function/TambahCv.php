<?php
if (isset($_POST['Submit'])) {
  include "../config.php";

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
  $Pengalaman = $_POST['experience'];


  // $sql = "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman')";
  $Lolos = "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')";
  $Tidak = "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Tidak Lolos')";


  $IT = array("Information System", "Information Technology", "System Computer", "Design");
  $Industri = array("Accounting", "Management", "Psychology");
  $Elektro = array("Information System", "Information Technology", "System Computer", "Design");
  $Mipa = array("IPA");



  if ($Ipk >= 2.8 and $Major == "Information System") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  } elseif ($Ipk >= 2.8 and $Major == "Information Technology") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  } elseif ($Ipk >= 2.8 and $Major == "System Computer") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  } elseif ($Ipk >= 2.8 and $Major == "Design") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  } elseif ($Ipk >= 2.8 and $Major == "Teknik Industri") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  } elseif ($Ipk >= 2.8 and $Major == "Teknik Elektro") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  } elseif ($Ipk >= 2.8 and $Major == "Information System") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  } elseif ($Major == "IPA") {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
  }
  
  
  elseif ($Ipk >= 2.8 || $Ipk <= 3.3) {
    if ($Edukasi == "Sarjana1" and $Pengalaman >= 6) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
    } elseif ($Edukasi == "Sarjana2" and $Pengalaman >= 6) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Lolos')");
    } elseif ($Edukasi == "Diploma3" and $Pengalaman <= 6) {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Tidak Lolos')");
    } else {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Tidak Lolos')");
    }
  }
  
  else {
    mysqli_query($conn, "INSERT INTO cv (tanggal, nama, telp, kategori, posisi, chanel, edukasi, institusi,	jurusan, ipk, pengalaman, kelulusan) VALUES ('$Tanggal', '$Nama', '$Telp', '$Kategori', '$Posisi', '$Chanel', '$Edukasi', '$Institusi', '$Major', '$Ipk', '$Pengalaman', 'Tidak Lolos')");
  }


  header("location: ../index.php");
}
