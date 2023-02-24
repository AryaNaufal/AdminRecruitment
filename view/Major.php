<?php
include_once "../header.php";
include "../config.php";
session_start();
$edks = mysqli_query($conn, "SELECT * FROM education");

if (isset($_POST['Submit'])) {
  $Education = $_POST['Education'];
  $Major = $_POST['Major'];

  $sql = mysqli_query($conn, "INSERT INTO major (edukasi, jurusan) VALUES ('$Education', '$Major')");
  header("location: Add.php");
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
            <li>
              <a href="#" class="nav-link text-white active">
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
              <li><a class="dropdown-item" href="function/Destroy.php">Sign out</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </aside>

    <main class="content overflow-scroll" style="height: 100vh;">
      <div class="mt-5">
        <div class="wrapper mx-5">
          <div class="form-search my-5 p-5 bg-white rounded-3 shadow-sm">
            <form action="#" method="POST">

              <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">Category : </label>
                <div class="col-sm-4">
                  <select id="education" class="form-select shadow-none" aria-label="Default select example" name="Education">
                    <option selected></option>
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
                <label for="position" class="col-sm-2 col-form-label">Major :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control shadow-none" id="major" name="Major" autocomplete="off" required>
                  <input type="submit" id="submit" class="btn btn-success mt-3 float-end" name="Submit" onclick="return confirm('Are you sure want to add Major?' + value)">
                  <a href="Inputs.php" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="js/add.js"></script>
</body>

</html>