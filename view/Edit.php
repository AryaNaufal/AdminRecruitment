<?php
include_once "../header.php";
include "../config.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM cv WHERE id='$id'");
$row = mysqli_fetch_array($query);

$ktg = mysqli_query($conn, "SELECT * FROM category");
$Analyst = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Analyst'");
$Dev = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Developer'");
$NonIT = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'NonIT'");
$Support = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Support'");
$Tester = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Tester'");
$Ch = mysqli_query($conn, "SELECT * FROM channel");
$edks = mysqli_query($conn, "SELECT * FROM education");

$SMA = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'SMA'");
$SMK = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'SMK'");
$Diploma1 = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'Diploma 1'");
$Diploma2 = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'Diploma 2'");
$Diploma3 = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'Diploma 3'");
$Diploma4 = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'Diploma 4'");
$Sarjana1 = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'Sarjana 1'");
$Sarjana2 = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'Sarjana 2'");
$Sarjana3 = mysqli_query($conn, "SELECT DISTINCT major.jurusan FROM  major WHERE major.edukasi = 'Sarjana 3'");

$itsIT = mysqli_query($conn, "SELECT kategori FROM category WHERE kategori in('Analyst', 'Developer', 'Software', 'Support')");
$itsNIT = mysqli_query($conn, "SELECT kategori FROM category WHERE kategori in('NonIT')");
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
    <form id="form1" action="../function/UpdateData.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3 row">
        <label for="date" class="col-sm-2 col-form-label">Tanggal : </label>
        <div class="col-sm-4">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <input type="hidden" id="histori" name="histori">
          <input type="date" class="form-control shadow-none" id="date" placeholder="Tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="date" class="col-sm-2 col-form-label">File CV : </label>
        <div class="col-sm-4">
          <input class="form-control" type="file" id="files" name="files">
        </div>
      </div>


      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="nama" name="nama" value="<?php echo $row['nama']; ?>" autocomplete="off">
        </div>
      </div>


      <div class="mb-3 row">
        <label for="NoTelp" class="col-sm-2 col-form-label">No Telp : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="NoTelp" name="noTelp" value="<?php echo $row['telp']; ?>" autocomplete="off">
        </div>
      </div>


      <div class="mb-3 row">
        <label for="tipe" class="col-sm-2 col-form-label">Type : </label>
        <div class="col-sm-4">
          <select id="tipe" onchange="itsIT()" class="form-select shadow-none" name="tipe">
            <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
            <option value="-">-</option>
            <option value="IT">IT</option>
            <option value="Non IT">Non IT</option>
          </select>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Category : </label>
        <div class="col-sm-4">
          <select id="kategori" onchange="tampilKategori()" class="form-select shadow-none" aria-label="Default select example" name="category">
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
          <select id="posisi" class="form-select shadow-none" aria-label="Default select example" name="posisi" value="<?php echo $row['posisi']; ?>">
            <option value="<?php echo $row['posisi']; ?>"><?php echo $row['posisi']; ?></option>
          </select>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="chanel" class="col-sm-2 col-form-label">Chanel : </label>
        <div class="col-sm-4">
          <select class="form-select shadow-none" aria-label="Default select example" name="chanel">
            <option value="<?php echo $row['chanel']; ?>"><?php echo $row['chanel']; ?></option>
            <?php
            while ($Channel = mysqli_fetch_array($Ch)) {
              echo "<option value='" . $Channel['nama_ch'] . "'";
              echo ">" . $Channel['nama_ch'] . "</option>";
            }
            ?>
          </select>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="education" class="col-sm-2 col-form-label">Education : </label>
        <div class="col-sm-4">
          <select id="edukasi" class="form-select shadow-none" onchange="tampilJurusan()" aria-label="Default select example" name="education">
            <option value="<?php echo $row['edukasi']; ?>"><?php echo $row['edukasi']; ?></option>
            <?php
            while ($edukasi = mysqli_fetch_array($edks)) {
              echo "<option value='" . $edukasi['edukasi'] . "'";
              echo ">" . $edukasi['edukasi'] . "</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="major" class="col-sm-2 col-form-label">Major : </label>
        <div class="col-sm-4">
          <select id="jurusan" class="form-select shadow-none" aria-label="Default select example" name="major">
            <option value="<?php echo $row['jurusan']; ?>"><?php echo $row['jurusan']; ?></option>
          </select>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="institution" class="col-sm-2 col-form-label">Name of Institution : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="institution" name="institution" value="<?php echo $row['institusi']; ?>" autocomplete="off">
        </div>
      </div>


      <div class="mb-3 row">
        <label for="ipk" class="col-sm-2 col-form-label">Ipk : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="ipk" name="ipk" value="<?php echo $row['ipk']; ?>" autocomplete="off">
        </div>
      </div>


      <div class="mb-3 row">
        <label for="kelulusan" class="col-sm-2 col-form-label">kelulusan : </label>
        <div class="col-sm-4">
          <select name="kelulusan" id="kelulusan" class="form-select shadow-none">
            <option value="<?php echo $row['kelulusan'] ?>"><?php echo $row['kelulusan'] ?></option>
            <option value="Lolos">Lolos</option>
            <option value="Tidak Lolos">Tidak Lolos</option>
          </select>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="status" class="col-sm-2 col-form-label">status : </label>
        <div class="col-sm-4">
          <select name="status" id="status" class="form-select shadow-none">
            <option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
            <option value="-">-</option>
            <option value="CV in">CV in</option>
            <option value="Drop">Drop</option>
            <option value="Kandidat">Kandidat</option>
            <option value="In Progress">In Progress</option>
            <option value="Interview">Interview</option>
            <option value="Tes">Tes</option>
            <option value="Drop By Kandidat">Drop By Kandidat</option>
            <option value="Drop By Klimaks">Drop By Klimaks</option>
            <option value="Interview Lanjutan">Interview Lanjutan</option>
            <option value="Tes1">Tes1</option>
            <option value="Technical Interview">Technical Interview</option>
            <option value="Employee">Employee</option>
            <option value="Blind CV">Blind CV</option>
            <option value="Pending">Pending</option>
          </select>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="experience" class="col-sm-2 col-form-label">Working Experience (Month) : </label>

        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="experience" name="experience" value="<?php echo $row['pengalaman']; ?>" autocomplete="off">
          <input type="submit" class="btn btn-success mt-3 float-end" name="Edit" onclick="history()">
          <a href="../index.php" id="back" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
        </div>
      </div>
    </form>
  </div>



  <script>
    function history() {
      var histori = prompt("Siapa yang mengubah/menambahkan?");
      if (histori != null && histori != "") {
        document.getElementById("histori").value = histori;
        document.getElementById("form1").submit();
      }
    }

    function itsIT() {
      let nama_tipe = document.getElementById("form1").tipe.value;
      if (nama_tipe == 'IT') {
        document.getElementById("kategori").innerHTML = "<?php
                                                          while ($IT = mysqli_fetch_array($itsIT)) {
                                                            echo "<option value='" . $IT['kategori'] . "'>" . $IT['kategori'] . "</option>";
                                                          } ?>";
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($Analyst)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";
      } else if (nama_tipe == 'Non IT') {
        document.getElementById("kategori").innerHTML = "<?php
                                                          while ($NIT = mysqli_fetch_array($itsNIT)) {
                                                            echo "<option value='" . $NIT['kategori'] . "'>" . $NIT['kategori'] . "</option>";
                                                          } ?>";
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($NonIT)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";

      }
    }

    function tampilKategori() {
      var nama_kategori = document.getElementById("form1").kategori.value;
      if (nama_kategori == 'Developer') {
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($Dev)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";
      } else if (nama_kategori == 'Analyst') {
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($Analyst)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";
      } else if (nama_kategori == 'NonIT') {
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($NonIT)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";
      } else if (nama_kategori == 'Support') {
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($Support)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";
      } else if (nama_kategori == 'Tester') {
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($Tester)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";
      }
    }

    function tampilJurusan() {
      let nama_edukasi = document.getElementById("form1").edukasi.value;
      if (nama_edukasi == 'SMA') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($SMA)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else if (nama_edukasi == 'SMK') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($SMK)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else if (nama_edukasi == 'Diploma 1') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($Diploma1)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else if (nama_edukasi == 'Diploma 2') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($Diploma2)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else if (nama_edukasi == 'Diploma 3') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($Diploma3)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else if (nama_edukasi == 'Diploma 4') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($Diploma4)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else if (nama_edukasi == 'Sarjana 1') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($Sarjana1)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else if (nama_edukasi == 'Sarjana 2') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($Sarjana2)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      }
    }
  </script>
</body>

</html>