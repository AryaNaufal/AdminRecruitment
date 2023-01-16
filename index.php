<?php
include_once "header.php";
include "config.php";



// $IT = array("Information System", "Information Technology", "System Computer", "Design");
// $Mipa = array("IPA");

// $tes = 'Design';

// function A($IT){
//   foreach ($IT as $val) {
//     # code...
//     echo $val."";
//   }
// }


// if ($tes == A($IT)) {
//   # code...
//   print_r($IT);
// }



// $array = array("size", "color", "gold");

// $allvalues = array('tes', 'tes', 'tes');

// function arrayIsNotEmpty($arr) {
//   if(!is_array($arr)) {
//   return;
//   }
//   return count($arr) != 0;
//   }

// $cars = array("Toyota","Suzuki","BMW");
// $months = array();
// echo arrayIsNotEmpty($cars) ? "array tidak kosong" : "array kosong";
// echo arrayIsNotEmpty($months) ? "array tidak kosong" : "array kosong";

// if(array_sum($allvalues) == count($allvalues)) {
//     echo 'all true';
// } else {
//     echo 'some false';
// }
?>
<html>

<body class="bg-light">
  <!-- Navigasi Bar -->
  <nav class="navbar bg-dark px-5 sticky-top">
    <div class="container-fluid">
      <img width="250" src="https://kwad5.com/wp-content/uploads/2019/09/cropped-logo-1.png" class="img-fluid" alt="">
    </div>
  </nav>
  <!-- <button id="cari" class="btn btn-danger" onclick="carii()"></button>
  <a href="function/tes.php" class="btn btn-success"></a> -->

  <!-- Cari Pelamar -->
  <div class="container form-search my-5 p-5 bg-white rounded-3 shadow-sm">
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
        <label for="Status" class="col-sm-2 col-form-label">Status : </label>
        <div class="col-sm-4">
          <select class="form-select shadow-none" aria-label="Default select example" id="Status" name="status">
            <option selected></option>
            <option value="Lolos">Lolos</option>
            <option value="Tidak Lolos">Tidak Lolos</option>
          </select>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="Ipk" class="col-sm-2 col-form-label">IPK : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="Ipk" name="ipk">
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
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="NoTelp" class="col-sm-2 col-form-label">No Telp : </label>

        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="NoTelp" name="noTelp" placeholder="Example: 0851 To 851">
          <p class="form-text"></p>
          <button type="submit" class="btn btn-success mt-3 float-end" name="submit">Cari Kandidat</button>
        </div>
      </div>
    </form>
  </div>

  <div class="container my-5 p-5 bg-white rounded-3 shadow-sm">
    <!-- Tabel data -->
    <div class="table-responsive mb-3 row">
      <!-- Tabah Kandidat -->
      <div class="col-sm-12">
        <a href="Add.php" class="btn btn-primary my-3 float-end">Tambah Kandidat</a>
      </div>

      <table id="example" class="table table-responsive-sm table-striped" style="width:100%;">
        <thead>
          <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Telp</th>
            <th>Position</th>
            <th>Job Portal</th>
            <th>Education</th>
            <th>Institution</th>
            <th>Major</th>
            <th>Ipk</th>
            <th>pengalaman</th>
            <th>Kelulusan</th>
            <th>Info/Edit/Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['submit'])) {

            $Nama = $_GET['nama'];
            $Posisi = $_GET['posisi'];
            $Status = $_GET['status'];
            $Ipk = $_GET['ipk'];
            $Telp = $_GET['noTelp'];

            $date1 = date("Y-m-d", strtotime($_GET['from']));
            $date2 = date("Y-m-d", strtotime($_GET['to']));

            if ($Nama and $Posisi) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND posisi LIKE '$Posisi'");
            } elseif ($Nama and $Status) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND kelulusan LIKE '$Status'");
            } elseif ($Nama) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%'");
            } elseif ($Posisi) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '$Posisi'");
            } elseif ($Status) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE kelulusan LIKE '$Status'");
            } elseif ($Ipk) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE ipk LIKE '$Ipk'");
            } elseif ($Telp) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE telp LIKE '$Telp'");
            } elseif ($date1 and $date2) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE tanggal BETWEEN '$date1' AND '$date2'");
            }
          } else {
            $sql = mysqli_query($conn, "SELECT * FROM cv");
          }

          while ($user_data = mysqli_fetch_array($sql)) {
            echo "<tr>";
            echo "<td>" . $user_data['tanggal'] . "</td>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['telp'] . "</td>";
            // echo "<td>" . $user_data['kategori'] . "</td>";
            echo "<td>" . $user_data['posisi'] . "</td>";
            echo "<td>" . $user_data['chanel'] . "</td>";
            echo "<td>" . $user_data['edukasi'] . "</td>";
            echo "<td>" . $user_data['institusi'] . "</td>";
            echo "<td>" . $user_data['jurusan'] . "</td>";
            echo "<td class='text-center'>" . $user_data['ipk'] . "</td>";
            echo "<td class='text-center'>" . $user_data['pengalaman'] . "</td>";
            echo "<td>" . $user_data['kelulusan'] . "</td>";
            echo "<td class='text-center'>";
            echo "<a href='Info.php?id=$user_data[id]' class='fas fa-info-circle ingfo' style='text-decoration:none; color:#428bca;'></a>";
            echo "<a href='Edit.php?id=$user_data[id]' class='fas fa-edit ms-2' style='text-decoration:none; color:#5cb85c;'></a>"; ?>
            <a <?php echo "href='function/delete.php?id=$user_data[id] '" ?> onclick="return confirm('Are you sure?')" class='fas fa-trash del' style='text-decoration:none; color:#d9534f;'></a>
          <?php
            echo "</td>";
            echo "</tr>";
          }

          ?>

        </tbody>
      </table>
    </div>
  </div>

  <!-- DataTable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/index.js"></script>


</body>

</html>