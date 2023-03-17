<?php
session_start();
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwad 5</title>
  <link rel="stylesheet" href="../public/bootstrap-5/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/DataTables-1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../public/fontawesome-6/css/all.min.css">

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
              <a href="../HomePage.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
                            <li><a href="Roles.php" class="nav-link text-white text-decoration-none rounded ms-3">Role</a></li>
                            <li><a href="Users.php" class="nav-link text-white text-decoration-none rounded ms-3">user</a></li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <a href="Inputs.php" class="nav-link text-white">
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
                          <li><a href="Report1.php" class="nav-link text-white text-decoration-none rounded ms-3">Laporan 1</a></li>
                          <li><a href="Report2.php" class="nav-link text-white text-decoration-none rounded ms-3">Laporan 2</a></li>
                          </ul>
                        </div>
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
            } elseif ($_SESSION['role'] == 'Recruitment Officer') {
              echo '<ul class="nav nav-pills flex-column mb-auto">
              <li>
                <a href="Inputs.php" class="nav-link text-white">
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
                          <li><a href="Report1.php" class="nav-link text-white text-decoration-none rounded ms-3">Laporan 1</a></li>
                          <li><a href="Report2.php" class="nav-link text-white text-decoration-none rounded ms-3">Laporan 2</a></li>
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
                      <label for="status" class="col-sm-3 col-form-label">Status : </label>
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
                        $cv_exist= mysqli_query($conn, "SELECT file_cv FROM cv WHERE id='$id'");
                        if ($row['file_cv']) {
                          echo '<a href="../function/DownloadCV.php?url=' . $row['file_cv'] . '&id=' . $row['id'] . '" class="btn btn-warning mt-3 mx-3 float-end">Download CV</a>';
                        } else {
                          echo '<a href="../function/DownloadCV.php?url=' . $row['file_cv'] . '&id=' . $row['id'] . '" class="btn btn-seccondary mt-3 mx-3 float-end disabled">Download CV</a>';
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
  </div>

  <!-- DataTable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../public/bootstrap-5/js/bootstrap.min.js"></script>

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