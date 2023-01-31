<?php
include_once "header.php";
include "config.php";
?>
<html>

<body class="bg-light">
  <!-- Navigasi Bar -->
  <nav class="navbar bg-dark px-5 sticky-top">
    <div class="container-fluid">
      <img width="250" src="https://kwad5.com/wp-content/uploads/2019/09/cropped-logo-1.png" class="img-fluid" alt="">
    </div>
  </nav>

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
        <label for="tipe" class="col-sm-2 col-form-label">Type : </label>
        <div class="col-sm-4">
          <select class="form-select shadow-none" aria-label="Default select example" id="tipe" name="tipe">
            <option selected></option>
            <option value="IT">IT</option>
            <option value="Non IT">Non IT</option>
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
          <input type="text" class="form-control shadow-none" id="NoTelp" name="noTelp">
          <p class="form-text"></p>
          <button type="submit" class="btn btn-success mt-3 float-end" name="submit">Cari Kandidat</button>
        </div>
      </div>
    </form>
  </div>

  <div class="container mb-3 py-3 bg-white rounded-3 shadow-sm">
    <!-- Tabel data -->
    <div class="table-responsive mb-3 row">
      <!-- Tabah Kandidat -->
      <div class="col-sm-12">
        <a href="view/Add.php" class="btn btn-primary my-3 float-end">Tambah Kandidat</a>
        <a href="http://localhost/adminrekrut/" class="btn btn-light my-3 mx-3 float-end"><i class="fas fa-redo"></i></a>
        <a href="view/Histori.php" class="btn btn-light my-3 float-end"><i class="fas fa-history"></i></a>

      </div>

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
            $Status = $_GET['status'];
            $Ipk = $_GET['ipk'];
            $Telp = $_GET['noTelp'];
            $Tipe = $_GET['tipe'];

            $date1 = date("Y-m-d", strtotime($_GET['from']));
            $date2 = date("Y-m-d", strtotime($_GET['to']));

            if ($Nama and $Posisi) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND posisi LIKE '$Posisi'");
            } elseif ($Nama and $Status) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND kelulusan LIKE '$Status'");
            } elseif ($Nama and $Ipk) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND ipk LIKE '$Ipk'");
            } elseif ($Nama and $Telp) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%' AND telp LIKE '$Telp'");
            } elseif ($Nama) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '%$Nama%'");
            } elseif ($Posisi) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE posisi LIKE '%$Posisi%'");
            } elseif ($Status and $Tipe) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE kelulusan LIKE '$Status' AND type LIKE '$Tipe'");
            } elseif ($Status) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE kelulusan LIKE '$Status'");
            } elseif ($Tipe) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE type LIKE '$Tipe'");
            } elseif ($Ipk) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE ipk LIKE '$Ipk'");
            } elseif ($Telp) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE telp LIKE '$Telp'");
            } elseif ($date1 and $date2) {
              $sql = mysqli_query($conn, "SELECT * FROM cv WHERE tanggal BETWEEN '$date1' AND '$date2' ORDER BY tanggal ASC");
            }
          } else {
            $sql = mysqli_query($conn, "SELECT * FROM cv");
          }


          while ($user_data = mysqli_fetch_array($sql)) {
            echo "<tr>";
            echo "<td>" . $user_data['tanggal'] . "</td>";
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

  <!-- DataTable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/index.js"></script>


</body>

</html>