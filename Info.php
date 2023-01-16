<?php
include_once "header.php";
include "config.php";

$id         = $_GET['id'];
$query  = mysqli_query($conn, "SELECT * FROM cv WHERE id='$id'");
$row        = mysqli_fetch_array($query);

$ktg = mysqli_query($conn, "SELECT * FROM category");
$Analyst = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Analyst'");
$Dev = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Developer'");
$NonIT = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'NonIT'");
$Support = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Support'");
$Tester = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Tester'");


?>

<html>

<body class="bg-light">
  <!-- Navigasi Bar -->
  <nav class="navbar bg-dark px-5">
    <div class="container-fluid">
      <img width="250" src="https://kwad5.com/wp-content/uploads/2019/09/cropped-logo-1.png" class="img-fluid" alt="">
    </div>
  </nav>

  <!-- Cari Pelamar -->
  <div class="container form-search my-5 p-5 bg-white rounded-3 shadow-sm">
    <form id="form1" action="function/prosesUpdate.php" method="POST">
      <div class="mb-3 row">
        <label for="date" class="col-sm-2 col-form-label">Tanggal : </label>
        <div class="col-sm-4">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <input type="date" class="form-control shadow-none" id="date" placeholder="Tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" disabled>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="nama" name="nama" value="<?php echo $row['nama']; ?>" disabled>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="NoTelp" class="col-sm-2 col-form-label">No Telp : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="NoTelp" name="noTelp" value="<?php echo $row['telp']; ?>" disabled>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Category : </label>
        <div class="col-sm-4">
          <select id="kategori" onchange="tampilKategori()" class="form-select shadow-none" aria-label="Default select example" name="category" disabled>
            <option value="<?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?></option>
            <?php
            while ($kategori = mysqli_fetch_array($ktg)) {
              echo "<option value='" . $kategori['kategori'] . "'";
              echo ">" . $kategori['kategori'] . "</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="posisi" class="col-sm-2 col-form-label">Position : </label>
        <div class="col-sm-4">
          <select id="posisi" class="form-select shadow-none" aria-label="Default select example" name="posisi" value="<?php echo $row['posisi']; ?>" disabled>
            <option value="<?php echo $row['posisi']; ?>"><?php echo $row['posisi']; ?></option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="chanel" class="col-sm-2 col-form-label">Chanel : </label>
        <div class="col-sm-4">
          <select class="form-select shadow-none" aria-label="Default select example" name="chanel" disabled>
            <option value="<?php echo $row['chanel']; ?>"><?php echo $row['chanel']; ?></option>
            <option value="Facebook">Facebook</option>
            <option value="Telkom">Telkom</option>
            <option value="Karyawan">Karyawan K5</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="education" class="col-sm-2 col-form-label">Education : </label>
        <div class="col-sm-4">
          <select id="edukasi" class="form-select shadow-none" onchange="tampilEdukasi()" aria-label="Default select example" name="education" disabled>

            <option value="<?php echo $row['edukasi']; ?>"><?php echo $row['edukasi']; ?></option>
            <option value="SMA">SMA</option>
            <option value="SMK">SMK</option>
            <option value="Diploma1">Diploma1</option>
            <option value="Diploma2">Diploma2</option>
            <option value="Diploma3">Diploma3</option>
            <option value="Diploma4">Diploma4</option>
            <option value="Sarjana1">Sarjana1</option>
            <option value="Sarjana2">Sarjana2</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="institution" class="col-sm-2 col-form-label">Name of Institution : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="institution" name="institution" value="<?php echo $row['institusi']; ?>" disabled>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="major" class="col-sm-2 col-form-label">Major : </label>
        <div class="col-sm-4">
          <select id="jurusan" class="form-select shadow-none" aria-label="Default select example" name="major" disabled>
            <option value="<?php echo $row['jurusan']; ?>"><?php echo $row['jurusan']; ?></option>
            <!-- <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Komputer">Sistem Komputer</option> -->
          </select>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="ipk" class="col-sm-2 col-form-label">Ipk : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="ipk" name="ipk" value="<?php echo $row['ipk']; ?>" disabled>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="experience" class="col-sm-2 col-form-label">Working Experience (Month) : </label>

        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="experience" name="experience" value="<?php echo $row['pengalaman']; ?>" disabled>
          <a href="index.php" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
        </div>
      </div>
    </form>
  </div>



  <script src="js/add.js"></script>
</body>

</html>