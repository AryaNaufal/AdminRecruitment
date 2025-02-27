<?php
session_start();
include "header.php";
include "config.php";

if (!isset($_SESSION['name'])) {
  # code...
  header("location: index.php");
}

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwad 5</title>
  <link rel="stylesheet" href="style.css">

  <style>
    @media only screen and (max-width: 768px) {
      .wrapper {
        margin: 0 !important;
      }

      .tables {
        padding: 0 10px !important;
      }

      #example_info {
        font-size: 15px;
      }

      #example_paginate {
        padding-top: 20px;
      }
    }
  </style>
</head>

<body class="bg-light">
  <!-- Container -->
  <div class="app">
    <div class="layout">
      <aside class="aside">
        <nav>
          <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 240px; height: 100vh;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <a href="HomePage.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 fw-bolder homes">Recruitment Admin</span>
              </a>
              <i class="close fas fa-xmark mb-2"></i>
            </div>

            <hr>
            <?php
            if ($_SESSION['role'] == 'Administrator') {
              echo '<ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <button class="nav-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                <i class="fas fa-user"></i>
                My-Administrator 
              </button>
              <div class="collapse ms-2" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="view/Roles.php" class="nav-link text-white text-decoration-none rounded">Role</a></li>
                  <li><a href="view/Users.php" class="nav-link text-white text-decoration-none rounded">user</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a href="view/Inputs.php" class="nav-link text-white">
                <i class="fas fa-keyboard"></i>
                Input CV
              </a>
            </li>
            <li class="nav-item">
              <button class="nav-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#report-collapse">
                <i class="fas fa-file"></i>
                Laporan 
              </button>
              <div class="collapse ms-2" id="report-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="view/Report1.php" class="nav-link text-white text-decoration-none rounded">Laporan 1</a></li>
                  <li><a href="view/Report2.php" class="nav-link text-white text-decoration-none rounded">Laporan 2</a></li>
                </ul>
              </div>
            </li>
          </ul>';
            } elseif($_SESSION['role'] == 'Recruitment Officer' || $_SESSION['role'] == 'Recruitment Admin'){
              echo '<ul class="nav nav-pills flex-column mb-auto">
              <li>
                <a href="view/Inputs.php" class="nav-link text-white">
                  <i class="fas fa-keyboard"></i>
                  Input CV
                </a>
              </li>
              <li class="nav-item">
              <button class="nav-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#report-collapse">
                <i class="fas fa-file"></i>
                Laporan 
              </button>
              <div class="collapse ms-2" id="report-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="view/Report1.php" class="nav-link text-white text-decoration-none rounded">Laporan 1</a></li>
                  <li><a href="view/Report2.php" class="nav-link text-white text-decoration-none rounded">Laporan 2</a></li>
                </ul>
              </div>
            </li>
            </ul>';
            }
            ?>

          </div>
        </nav>
      </aside>


      <!-- Main Content -->
      <main class="content overflow-scroll" style="height: 100vh;">
        <header style="display: flex; background-color: #0d6efd; justify-content: space-between; align-items: center; height: 60px; padding-right: 20px;">
          <i class="menu fas fa-bars m-5 text-white"></i>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-cog me-3"></i>
              <strong><?php echo $_SESSION['name'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="view/ChangePass.php">Change Password</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="function/Destroy.php">Sign out</a></li>
            </ul>
          </div>
        </header>
        <div class="mt-5">
          <div class="wrapper mx-5">
            <div class="form-search my-5 p-5 bg-white rounded-3 shadow-sm">
              <form action="" method="GET">
                <div class="mb-3 row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama : </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="nama" name="nama">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="Posisi" class="col-sm-2 col-form-label">Posisi : </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="Posisi" name="posisi">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="Lulus" class="col-sm-2 col-form-label">Kelulusan : </label>
                  <div class="col-sm-4">
                    <select class="form-select shadow-none" aria-label="Default select example" id="Lulus" name="kelulusan">
                      <option selected></option>
                      <option value="Lolos">Lolos</option>
                      <option value="Tidak Lolos">Tidak Lolos</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="Status" class="col-sm-2 col-form-label">Status : </label>
                  <div class="col-sm-4">
                    <select class="form-select shadow-none" aria-label="Default select example" id="Status" name="status">
                      <option selected></option>
                      <option value="CV in">CV in</option>
                      <option value="Candidate">Candidate</option>
                      <option value="In Progress">In Progress</option>
                      <option value="Interview">Interview</option>
                      <option value="Test1">Test 1</option>
                      <option value="Technical Interview">Technical Interview</option>
                      <option value="Interview by Client">Interview by Client</option>
                      <option value="Final Interview">Final Interview</option>
                      <option value="Blind CV">Blind CV</option>
                      <option value="Employee">Employee</option>
                      <option value="Pending">Pending</option>
                      <option value="Drop by Candidate">Drop by Candidate</option>
                      <option value="Drop by Klimaks">Drop by Klimaks</option>
                      <option value="Drop">Drop</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="tipe" class="col-sm-2 col-form-label">Type : </label>
                  <div class="col-sm-4">
                    <select class="form-select shadow-none" aria-label="Default select example" id="tipe" name="type">
                      <option selected></option>
                      <option value="IT">IT</option>
                      <option value="Non IT">Non IT</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="Periode" class="col-sm-2 col-form-label">Periode : </label>
                  <div class="col-sm-4">
                    <div class="mb-3 row">
                      <label for="From" class="col-sm-2 col-form-label">From:</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control shadow-none" id="From" name="from">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="To" class="col-sm-2 col-form-label">To:</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control shadow-none" id="To" name="to">
                        <button type="submit" class="btn btn-success mt-5 float-end" name="submit">Cari Kandidat</button>

                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <!-- Tabel data -->
            <div class="tables mb-3 p-5 bg-white rounded-3 shadow-sm">
              <div class="table-responsive mb-3 row">

                <table id="example" class="table table-responsive-sm table-striped" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Telp</th>
                      <th>Tipe</th>
                      <th>Position</th>
                      <th>Job Portal</th>
                      <th>Education</th>
                      <th>Institution</th>
                      <th>Major</th>
                      <th>Ipk</th>
                      <th>pengalaman(Month)</th>
                      <th>Kelulusan</th>
                      <th>Status</th>
                      <th>Info/Edit/Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($_GET['submit'])) {

                      $Nama = $_GET['nama'];
                      $Posisi = $_GET['posisi'];
                      $Lulus = $_GET['kelulusan'];
                      $Status = $_GET['status'];
                      // $Telp = $_GET['telp'];
                      $Tipe = $_GET['type'];

                      $date1 = date("Y-m-d", strtotime($_GET['from']));
                      $date2 = date("Y-m-d", strtotime($_GET['to']));


                      if ($Nama and $Posisi) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND posisi LIKE '$Posisi'");
                      } elseif ($Nama and $Lulus) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND kelulusan LIKE '$Lulus'");
                      } elseif ($Nama and $Status) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND status LIKE '$Status'");
                      } elseif ($Nama and $Tipe) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND type LIKE '$Tipe'");
                      } elseif ($Nama) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%'");
                      } elseif ($Posisi and $Lulus) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '%$Posisi%' AND kelulusan LIKE '$Lulus'");
                      } elseif ($Posisi and $Status) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '%$Posisi%' AND status LIKE '$Status'");
                      } elseif ($Posisi and $Lulus and $Tipe) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '%$Posisi%' AND kelulusan LIKE '$Lulus' AND type LIKE '$Tipe'");
                      } elseif ($Posisi and $Lulus and $Status and $Tipe) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '%$Posisi%' AND kelulusan LIKE '$Lulus' AND status LIKE '$Status' AND type LIKE '$Tipe'");
                      } elseif ($Posisi and $Tipe) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '%$Posisi%' AND type LIKE '$Tipe'");
                      } elseif ($Posisi) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '%$Posisi%'");
                      } elseif ($Lulus and $Status) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE kelulusan LIKE '$Lulus' AND status LIKE '$Status'");
                      } elseif ($Lulus and $Tipe) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE kelulusan LIKE '$Lulus' AND type LIKE '$Tipe'");
                      } elseif ($Lulus and $Tipe and $Status) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE kelulusan LIKE '$Lulus' AND type LIKE '$Tipe' AND status LIKE '$Status");
                      } elseif ($Lulus) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE kelulusan LIKE '$Lulus'");
                      } elseif ($Status and $Tipe) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE status LIKE '$Status' AND type LIKE '$Tipe'");
                      } elseif ($Status) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE status LIKE '$Status'");
                      } elseif ($Tipe) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE type LIKE '$Tipe'");
                      } elseif ($date1 and $date2) {
                        $sql = mysqli_query($conn, "SELECT * FROM cv WHERE tanggal BETWEEN '$date1' AND '$date2' ORDER BY tanggal ASC");
                      }
                    } else {
                      $sql = mysqli_query($conn, "SELECT * FROM cv ORDER BY tanggal ASC");
                    }

                    while ($user_data = mysqli_fetch_array($sql)) {
                      echo "<tr>";
                      echo "<td>" . date("d-M-Y", strtotime($user_data['tanggal'])) . "</td>";
                      echo "<td>" . $user_data['nama'] . "</td>";
                      echo "<td>" . $user_data['telp'] . "</td>";
                      echo "<td>" . $user_data['type'] . "</td>";
                      echo "<td>" . $user_data['posisi'] . "</td>";
                      echo "<td>" . $user_data['chanel'] . "</td>";
                      echo "<td>" . $user_data['edukasi'] . "</td>";
                      echo "<td>" . $user_data['institusi'] . "</td>";
                      echo "<td>" . $user_data['jurusan'] . "</td>";
                      echo "<td class='text-center'>" . $user_data['ipk'] . "</td>";
                      echo "<td class='text-center'>" . $user_data['pengalaman'] . "</td>";
                      echo "<td>" . $user_data['kelulusan'] . "</td>";
                      echo "<td>" . $user_data['status'] . "</td>";
                      echo "<td class='text-center'>";
                      echo "<a href='view/Info.php?id=$user_data[id]' class='fas fa-info-circle ingfo' style='text-decoration:none; color:#428bca;'></a>";
                      echo "<a href='view/Edit.php?id=$user_data[id]' class='fas fa-edit ms-2' style='text-decoration:none; color:#5cb85c;'></a>"; ?>
                      <a <?php echo "href='function/Delete.php?id=$user_data[id] '" ?> onclick="return confirm('Are you sure?')" class='fas fa-trash del' style='text-decoration:none; color:#d9534f;'></a>
                    <?php
                      echo "</td>";
                      echo "</tr>";
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- DataTable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="public/DataTables-1/js/jquery.dataTables.min.js"></script>
  <script src="public/DataTables-1/js/dataTables.bootstrap5.min.js"></script>

  <script src="js/index.js"></script>


  <script>
    $(".menu").on('click', function() {
      $(".aside").addClass('active');
    })

    $(".close").on('click', function() {
      $(".aside").removeClass('active');
    })
  </script>
</body>

</html>