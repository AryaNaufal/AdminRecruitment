<?php
session_start();
include "../header.php";
include "../config.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM cv WHERE id='$id'");
$query2 = mysqli_query($conn, "SELECT * FROM user");
$row = mysqli_fetch_array($query);
$rows = mysqli_fetch_array($query2);

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

if (!isset($_SESSION['name'])) {
  header("location: ../index.php");
}
?>

<style>
  html,
  body {
    height: 100%;
  }

  .app {
    display: flex;
  }

  .content {
    width: 100vw !important;
    overflow: scroll !important;
  }

  .nav-link:hover {
    color: #0d6efd !important;
  }

  .active:hover {
    color: white !important;
  }

  span.active {
    color: #0d6efd !important;
  }

  @media only screen and (max-width: 768px) {
    aside {
      width: 0;
      visibility: hidden;
    }
  }
</style>
<html>

<body class="bg-light">
  <!-- Container -->
  <div class="app">
    <aside>
      <nav>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 240px; height: 100vh;">
          <a href="../HomePage.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 fw-bolder">Recruitment Admin</span>
          </a>
          <hr>
          <?php
          if ($_SESSION['role'] == 'Administrator') {
            echo '<ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <button class="nav-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                <i class="fas fa-user-cog"></i>
                My-Administrator 
              </button>
              <div class="collapse ms-2" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="../view/Roles.php" class="nav-link text-white text-decoration-none rounded">Role</a></li>
                  <li><a href="../view/Users.php" class="nav-link text-white text-decoration-none rounded">user</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a href="Inputs.php" class="nav-link text-white">
                <i class="fas fa-keyboard"></i>
                Input CV
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <i class="fas fa-file"></i>
                Laporan
              </a>
            </li>
          </ul>';
          } elseif ($_SESSION['role'] == 'Recruitment Admin') {
            echo '<ul class="nav nav-pills flex-column mb-auto">
            <li>
              <a href="Inputs.php" class="nav-link text-white">
                <i class="fas fa-keyboard"></i>
                Input CV
              </a>
            </li>
          </ul>';
          }
          ?>

          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://lh3.googleusercontent.com/a/AEdFTp729xpL4avP9sX3gqZdsQYLOCsTOuuunWqtDUg_jA=s96-c-rg-br100" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong><?php echo $_SESSION['name'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="view/ChangePass.php">Change Password</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../function/Destroy.php">Sign out</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="content overflow-scroll" style="height: 100vh;">
      <div class="mt-5">
        <div class="wrapper mx-5">
          <div class="container form-search my-5 p-5 bg-white rounded-3 shadow-sm">
            <form id="form1" action="../function/UpdateData.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal : </label>
                <div class="col-sm-4">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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
                    <?php
                    if ($_SESSION['role'] == "Recruitment Admin") {
                      if ($row['status'] == "CV in") {
                        echo '<option value="CV in">CV in</option>';
                      } else {
                        echo '<script>document.getElementById("status").disabled = true;</script>';
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="Remark" class="col-sm-2 col-form-label">Remarks : </label>
                <div class="col-sm-4">
                  <textarea class="form-control" id="Remark" name="remark" rows="3"><?php echo $row['remarks'] ?></textarea>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="experience" class="col-sm-2 col-form-label">Working Experience (Month) : </label>

                <div class="col-sm-4">
                  <input type="text" class="form-control shadow-none" id="experience" name="experience" value="<?php echo $row['pengalaman']; ?>" autocomplete="off">
                  <input type="submit" class="btn btn-success mt-3 float-end" name="Edit">
                  <a href="../HomePage.php" id="back" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

  </div>

  <!-- DataTable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="js/index.js"></script>
  <script>
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

    let nama_status = document.getElementById("form1").status.value;
    if ((nama_status == "Drop by Klimaks") || (nama_status == "Drop by Candidate") || (nama_status == "Drop")) {
      document.getElementById("status").disabled = true;
    } else if (nama_status == "CV in") {
      document.getElementById("status").innerHTML = "<select><option value='CV in'>CV in</option><option value='Pending'>Pending</option><option value='Drop by Klimaks'>Drop by Klimaks</option><option value='Candidate'>Candidate</option></select>";
    } else if (nama_status == "Candidate") {
      document.getElementById("status").innerHTML = "<select><option value='Candidate'>Candidate</option><option value='In Progress'>In Progress</option><option value='Drop by Candidate'>Drop by Candidate</option></select>";
    } else if (nama_status == "In Progress") {
      document.getElementById("status").innerHTML = "<select><option value='In Progress'>In Progress</option><option value='Interview'>Interview</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option></select>";
    } else if (nama_status == "Interview") {
      document.getElementById("status").innerHTML = "<select><option value='Interview'>Interview</option><option value='Test1'>Test1</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option></select>";
    } else if (nama_status == "Test1") {
      document.getElementById("status").innerHTML = "<select><option value='Test1'>Test1</option><option value='Technical Interview'>Technical Interview</option><option value='Blind CV'>Blind CV</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option></select>";
    } else if (nama_status == "Technical Interview") {
      document.getElementById("status").innerHTML = "<select><option value='Technical Interview'>Technical Interview</option><option value='Blind CV'>Blind CV</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option></select>";
    } else if (nama_status == "Blind CV") {
      document.getElementById("status").innerHTML = "<select><option value='Blind CV'>Blind CV</option><option value='Interview by Client'>Interview by Client</option><option value='Pending'>Pending</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option></select>";
    } else if (nama_status == "Interview by Client") {
      document.getElementById("status").innerHTML = "<select><option value='Interview by Client'>Interview by Client</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option><option value='Final Interview'>Final Interview</option></select>";
    } else if (nama_status == "Final Interview") {
      document.getElementById("status").innerHTML = "<select><option value='Final Interview'>Final Interview</option><option value='Employee'>Employee</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option></select>";
    } else if (nama_status == "Pending") {
      document.getElementById("status").innerHTML = "<select><option value='Pending'>Pending</option><option value='In Progress'>In Progress</option><option value='Drop by Candidate'>Drop by Candidate</option><option value='Drop by Klimaks'>Drop by Klimaks</option></select>";
    } else if (nama_status == "Employee") {
      document.getElementById("status").disabled = true;
    }
  </script>

</body>

</html>