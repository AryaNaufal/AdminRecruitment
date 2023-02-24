<?php
session_start();
include "../header.php";
include "../config.php";

$id         = $_GET['id'];
$query  = mysqli_query($conn, "SELECT * FROM cv WHERE id='$id'");
$row        = mysqli_fetch_array($query);

$ktg = mysqli_query($conn, "SELECT * FROM category");
$Analyst = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Analyst'");
$Dev = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Developer'");
$NonIT = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'NonIT'");
$Support = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Support'");
$Tester = mysqli_query($conn, "SELECT DISTINCT position.posisi FROM  position WHERE position.kategori = 'Tester'");

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
            <form id="form1" action="" method="get">
              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3 row">
                    <label for="date" class="col-sm-3 col-form-label">Tanggal : </label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <input type="date" class="form-control shadow-none" id="date" placeholder="Tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" disabled>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control shadow-none" id="nama" name="nama" value="<?php echo $row['nama']; ?>" disabled>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="NoTelp" class="col-sm-3 col-form-label">No Telp : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control shadow-none" id="NoTelp" name="noTelp" value="<?php echo $row['telp']; ?>" disabled>
                    </div>
                  </div>


                  <div class="mb-3 row">
                    <label for="category" class="col-sm-3 col-form-label">Category : </label>
                    <div class="col-sm-8">
                      <select id="kategori" class="form-select shadow-none" aria-label="Default select example" name="category" disabled>
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
                    <label for="posisi" class="col-sm-3 col-form-label">Position : </label>
                    <div class="col-sm-8">
                      <select id="posisi" class="form-select shadow-none" aria-label="Default select example" name="posisi" value="<?php echo $row['posisi']; ?>" disabled>
                        <option value="<?php echo $row['posisi']; ?>"><?php echo $row['posisi']; ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="chanel" class="col-sm-3 col-form-label">Chanel : </label>
                    <div class="col-sm-8">
                      <select class="form-select shadow-none" aria-label="Default select example" name="chanel" disabled>
                        <option value="<?php echo $row['chanel']; ?>"><?php echo $row['chanel']; ?></option>
                        <option value="Facebook">Facebook</option>
                        <option value="Telkom">Telkom</option>
                        <option value="Karyawan">Karyawan K5</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="education" class="col-sm-3 col-form-label">Education : </label>
                    <div class="col-sm-8">
                      <select id="edukasi" class="form-select shadow-none" aria-label="Default select example" name="education" disabled>

                        <option value="<?php echo $row['edukasi']; ?>"><?php echo $row['edukasi']; ?></option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="Diploma1">Diploma1</option>
                        <option value="Diploma2">Diploma2</option>
                        <option value="Diploma3">Diploma3</option>
                        <option value="Diploma8">Diploma8</option>
                        <option value="Sarjana1">Sarjana1</option>
                        <option value="Sarjana2">Sarjana2</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="institution" class="col-sm-3 col-form-label">Name of Institution : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control shadow-none" id="institution" name="institution" value="<?php echo $row['institusi']; ?>" disabled>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="major" class="col-sm-3 col-form-label">Major : </label>
                    <div class="col-sm-8">
                      <select id="jurusan" class="form-select shadow-none" aria-label="Default select example" name="major" disabled>
                        <option value="<?php echo $row['jurusan']; ?>"><?php echo $row['jurusan']; ?></option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="ipk" class="col-sm-3 col-form-label">Ipk : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control shadow-none" id="ipk" name="ipk" value="<?php echo $row['ipk']; ?>" disabled>
                    </div>
                  </div>


                  <div class="mb-3 row">
                    <label for="experience" class="col-sm-3 col-form-label">Working Experience (Month) : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control shadow-none" id="experience" name="experience" value="<?php echo $row['pengalaman']; ?>" disabled>
                    </div>
                  </div>

                </div>
                <div class="col-sm-6">
                  <div class="mb-3 row">
                    <label for="status" class="col-sm-3 col-form-label">status : </label>
                    <div class="col-sm-8">
                      <select name="status" id="status" class="form-select shadow-none" disabled>
                        <option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
                      </select>
                    </div>
                  </div>


                  <div class="mb-3 row">
                    <label for="Remark" class="col-sm-3 col-form-label">Remarks : </label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="Remark" name="remark" rows="3" disabled><?php echo $row['remarks']; ?></textarea>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="cv" class="col-sm-3 col-form-label">CV : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control shadow-none" id="cv" name="cv" value="<?php echo $row['file_cv']; ?>" disabled>
                      <a href="Histori.php?id=<?php echo $row['id'] ?>" class="btn btn-primary mt-3 float-end"><i class="fas fa-history"></i></a>
                      <?php

                      if ($row['file_cv'] > 0) {
                        echo '<a href="../function/downloadCV.php?url=' . $row['file_cv'] . '&id=' . $row['id'] . '" class="btn btn-warning mt-3 mx-3 float-end">Download CV</a>';
                      } else {
                        echo '<a href="../function/downloadCV.php?url=' . $row['file_cv'] . '&id=' . $row['id'] . '" class="btn btn-seccondary mt-3 mx-3 float-end disabled">Download CV</a>';
                      }

                      ?>
                      <!-- <a href="../function/downloadCV.php?url=<?php echo $row['file_cv']; ?>" class="btn btn-warning mt-3 mx-3 float-end">Download CV</a> -->
                      <a href="../HomePage.php" class="btn btn-danger mt-3 float-end">Back</a>

                    </div>
                  </div>
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


</body>

</html>