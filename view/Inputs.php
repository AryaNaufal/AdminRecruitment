<?php
session_start();
include "../config.php";

$ktg = mysqli_query($conn, "SELECT * FROM category");
$Analyst = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Analyst'");
$Dev = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Developer'");
$NonIT = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'NonIT'");
$Support = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Support'");
$Software = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Software'");
$Ch = mysqli_query($conn, "SELECT * FROM channel");
$edks = mysqli_query($conn, "SELECT edukasi FROM education");

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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwad 5</title>

  <link rel="stylesheet" href="../public/bootstrap-5/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/fontawesome-6/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />
  <link rel="stylesheet" href="../style.css">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <style>
    @media only screen and (max-width: 768px) {
      .wrapper {
        margin: 0 !important;
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
              <a href="../HomePage.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" onclick="deletelocal()">
                <span class="fs-5 fw-bolder">Recruitment Admin</span>
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
                  <li><a href="../view/Roles.php" class="nav-link text-white text-decoration-none rounded" onclick="deletelocal()">Role</a></li>
                  <li><a href="../view/Users.php" class="nav-link text-white text-decoration-none rounded" onclick="deletelocal()">user</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a href="" class="nav-link text-white active">
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
                  <li><a href="Report1.php" class="nav-link text-white text-decoration-none rounded" onclick="deletelocal()">Laporan 1</a></li>
                  <li><a href="Report2.php" class="nav-link text-white text-decoration-none rounded" onclick="deletelocal()">Laporan 2</a></li>
                </ul>
              </div>
            </li>
          </ul>';
            } elseif ($_SESSION['role'] == 'Recruitment Officer' || $_SESSION['role'] == 'Recruitment Admin') {
              echo '<ul class="nav nav-pills flex-column mb-auto">
            <li>
              <a href="" class="nav-link text-white active">
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
                  <li><a href="Report1.php" class="nav-link text-white text-decoration-none rounded" onclick="deletelocal()">Laporan 1</a></li>
                  <li><a href="Report2.php" class="nav-link text-white text-decoration-none rounded" onclick="deletelocal()">Laporan 2</a></li>
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
        <!-- Header -->
        <header style="display: flex; background-color: #0d6efd; justify-content: space-between; align-items: center; height: 50px; padding-right: 20px;">
          <i class="menu fas fa-bars m-5 text-white"></i>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-cog me-3"></i>
              <strong><?php echo $_SESSION['name'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="ChangePass.php">Change Password</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../function/Destroy.php">Sign out</a></li>
            </ul>
          </div>
        </header>
        <!-- Content -->
        <div class="mt-5">
          <div class="wrapper mx-5">
            <div class="form-search my-5 p-5 bg-white rounded-3 shadow-sm">

              <form id="form1" action="../function/TambahData.php" method="POST">
                <div class="mb-3 row">
                  <label for="date" class="col-sm-2 col-form-label">Tanggal : </label>
                  <div class="col-sm-4">
                    <input type="hidden" name="id">
                    <input type="text" class="form-control shadow-none" id="datepicker" name="tanggal" placeholder="dd-mm-yy" autocomplete="off" required>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama : </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="nama" name="nama" autocomplete="off" required>
                  </div>
                </div>


                <div class="mb-3 row">
                  <label for="NoTelp" class="col-sm-2 col-form-label">No Telp : </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="NoTelp" name="noTelp" autocomplete="off" required>
                  </div>
                </div>


                <div class="mb-3 row">
                  <label for="tipe" class="col-sm-2 col-form-label">Type : </label>
                  <div class="col-sm-4">
                    <select id="tipe" onchange="itsIT()" class="form-select shadow-none" name="tipe" required>
                      <option value="-">-</option>
                      <option value="IT">IT</option>
                      <option value="Non IT">Non IT</option>
                    </select>
                  </div>
                </div>


                <div class="mb-3 row">
                  <label for="category" class="col-sm-2 col-form-label">Category : </label>
                  <div class="col-sm-4">
                    <select id="kategori" onchange="tampilKategori()" class="form-select shadow-none" aria-label="Default select example" name="category" required>
                      <option selected>-</option>
                      <?php
                      // while ($kategori = mysqli_fetch_array($ktg)) {
                      //   echo "<option value='" . $kategori['kategori'] . "'";
                      //   echo ">" . $kategori['kategori'] . "</option>";
                      // }
                      ?>
                    </select>
                  </div>
                </div>


                <div class="mb-3 row">
                  <label for="posisi" class="col-sm-2 col-form-label">Position : </label>
                  <div class="col-sm-4">
                    <select id="posisi" class="form-select shadow-none" aria-label="Default select example" name="posisi" required>
                      <option selected>-</option>
                    </select>
                  </div>
                  <a href="Position.php" onclick="savelocal()" class="btn btn-light float-end col-auto"><i class="fas fa-plus"></i></a>
                </div>


                <div class="mb-3 row">
                  <label for="chanel" class="col-sm-2 col-form-label">Chanel : </label>
                  <div class="col-sm-4">
                    <select class="form-select shadow-none" id="chanel" aria-label="Default select example" name="chanel" required>
                      <option selected>-</option>
                      <?php
                      while ($Channel = mysqli_fetch_array($Ch)) {
                        echo "<option value='" . $Channel['nama_ch'] . "'";
                        echo ">" . $Channel['nama_ch'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <a href="Chanel.php" onclick="savelocal()" class="btn btn-light float-end col-auto" data-bs-toggle="tooltip" data-bs-placement="right" title="Tambah Channel"><i class="fas fa-plus"></i></a>
                </div>


                <div class="mb-3 row">
                  <label for="education" class="col-sm-2 col-form-label">Education : </label>
                  <div class="col-sm-4">
                    <select id="edukasi" class="form-select shadow-none" onchange="tampilJurusan()" aria-label="Default select example" name="education" required>
                      <option selected>-</option>
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
                    <select id="jurusan" class="form-select shadow-none" aria-label="Default select example" name="major" required>
                      <option selected>-</option>
                    </select>
                  </div>
                  <a href="Major.php" onclick="savelocal()" class="btn btn-light float-end col-auto"><i class="fas fa-plus"></i></a>
                </div>


                <div class="mb-3 row">
                  <label for="institution" class="col-sm-2 col-form-label">Name of Institution : </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="institution" name="institution" autocomplete="off" required>
                  </div>
                </div>


                <div class="mb-3 row">
                  <label for="ipk" class="col-sm-2 col-form-label">Ipk : </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="ipk" name="ipk" autocomplete="off" required>
                    <span id="passwordHelpInline" class="form-text">
                      Gunakan titik jika Angka berbentuk decimal.
                    </span>
                  </div>
                </div>


                <div class="mb-3 row">
                  <label for="experience" class="col-sm-2 col-form-label">Working Experience (Month) : </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="experience" name="experience" autocomplete="off" required>
                    <span id="passwordHelpInline" class="form-text">
                      Gunakan titik jika Angka berbentuk decimal.
                    </span>
                    <input type="submit" id="submit" class="btn btn-success mt-3 ms-3 float-end" name="Submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- DataTable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- Localstorage -->
  <!-- <script src="../js/localstorage.js"></script> -->

  <!-- Bootstrap -->
  <script src="../public/bootstrap-5/js/bootstrap.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
  </script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
  </script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js">
  </script>

  <script>
    $("#datepicker").datepicker({
      format: "dd-mm-yyyy",
      orientation: "bottom right",
      todayHighlight: true,
      container: 'body',
      autoclose: true,
    });

    $(".menu").on('click', function() {
      $(".aside").addClass('active');
    })

    $(".close").on('click', function() {
      $(".aside").removeClass('active');
    })


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
      let nama_kategori = document.getElementById("form1").kategori.value;
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
      } else if (nama_kategori == 'Software') {
        document.getElementById("posisi").innerHTML = "<?php
                                                        while ($posisi = mysqli_fetch_array($Software)) {
                                                          echo "<option value='" . $posisi['posisi'] . "'>" . $posisi['posisi'] . "</option>";
                                                        } ?>";
      } else {
        document.getElementById("posisi").innerHTML = '<option value="-"> - </option>';
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
      } else if (nama_edukasi == 'Sarjana 3') {
        document.getElementById("jurusan").innerHTML = "<?php
                                                        while ($jurusan = mysqli_fetch_array($Sarjana3)) {
                                                          echo "<option value='" . $jurusan['jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                                        } ?>";
      } else {
        document.getElementById("jurusan").innerHTML = '<option value="-"> - </option>';
      }
    }

    document.getElementById("datepicker").value = localStorage.getItem("inputdate");
    document.getElementById("nama").value = localStorage.getItem("inputname");
    document.getElementById("NoTelp").value = localStorage.getItem("inputNoTelp");
    document.getElementById("institution").value = localStorage.getItem("inputInstitution");
    document.getElementById("ipk").value = localStorage.getItem("inputIpk");
    document.getElementById("experience").value = localStorage.getItem("inputExperience");
    document.getElementById("chanel").value = localStorage.getItem("inputchanel");

    function savelocal() {
      let dates = document.getElementById("datepicker").value;
      let name = document.getElementById("nama").value;
      let telp = document.getElementById("NoTelp").value;
      let institut = document.getElementById("institution").value;
      let ipk = document.getElementById("ipk").value;
      let Exp = document.getElementById("experience").value;
      let ch = document.getElementById("chanel").value;

      localStorage.setItem("inputdate", dates);
      localStorage.setItem("inputname", name);
      localStorage.setItem("inputNoTelp", telp);
      localStorage.setItem("inputInstitution", institut);
      localStorage.setItem("inputIpk", ipk);
      localStorage.setItem("inputExperience", Exp);
      localStorage.setItem("inputchanel", ch);
    }

    function deletelocal() {
      let dates = document.getElementById("datepicker").value;
      let name = document.getElementById("nama").value;
      let telp = document.getElementById("NoTelp").value;
      let institut = document.getElementById("institution").value;
      let ipk = document.getElementById("ipk").value;
      let Exp = document.getElementById("experience").value;
      let ch = document.getElementById("chanel").value;

      localStorage.removeItem("inputdate", dates);
      localStorage.removeItem("inputname", name);
      localStorage.removeItem("inputNoTelp", telp);
      localStorage.removeItem("inputInstitution", institut);
      localStorage.removeItem("inputIpk", ipk);
      localStorage.removeItem("inputExperience", Exp);
      localStorage.removeItem("inputchanel", ch);
    }
  </script>

</body>

</html>