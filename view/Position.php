<?php
session_start();
include "../config.php";
$ktg = mysqli_query($conn, "SELECT * FROM category");

if (isset($_POST['Submit'])) {
  $Category = $_POST['Category'];
  $Position = $_POST['Position'];

  if ($Category == 'Analyst') {
    $sql = mysqli_query($conn, "INSERT INTO position (kategori, posisi) VALUES ('$Category', CONCAT('$Position', ' Analyst'))");
  } else {
    $sql = mysqli_query($conn, "INSERT INTO position (kategori, posisi) VALUES ('$Category', '$Position')");
  }

  header("location: Inputs.php");
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
                  <li><a href="Roles.php" class="nav-link text-white text-decoration-none rounded">Role</a></li>
                  <li><a href="Users.php" class="nav-link text-white text-decoration-none rounded">user</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a href="Inputs.php" class="nav-link text-white active">
                <i class="fas fa-keyboard"></i>
                Input CV
              </a>
            </li>
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
                  <a href="Inputs.php" class="nav-link text-white active">
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
                    <li><a href="Report1.php" class="nav-link text-white text-decoration-none rounded">Laporan 1</a></li>
                    <li><a href="Report2.php" class="nav-link text-white text-decoration-none rounded">Laporan 2</a></li>
                  </ul>
                </div>
              </li>
              </ul>';
              }
            ?>            
          </div>
        </nav>
      </aside>

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
              <form action="#" method="POST">

                <div class="mb-3 row">
                  <label for="kategori" class="col-sm-2 col-form-label">Category : </label>
                  <div class="col-sm-4">
                    <select id="kategori" class="form-select shadow-none" aria-label="Default select example" name="Category">
                      <option selected></option>
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
                  <label for="position" class="col-sm-2 col-form-label">Position :</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control shadow-none" id="position" name="Position" required>
                    <input type="submit" id="submit" class="btn btn-success mt-3 float-end" name="Submit" onclick="return confirm('Are you sure want to add Position?' + value)">
                    <a href="Inputs.php" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
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

  <!-- Bootstrap -->
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