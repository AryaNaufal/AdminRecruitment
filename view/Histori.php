<?php
session_start();
include "../header.php";
include "../config.php";

$id         = $_GET['id'];
$query  = mysqli_query($conn, "SELECT * FROM cv WHERE id='$id'");
$rows        = mysqli_fetch_array($query);

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
          <ul class="nav nav-pills flex-column mb-auto">
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
          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://lh3.googleusercontent.com/a/AEdFTp729xpL4avP9sX3gqZdsQYLOCsTOuuunWqtDUg_jA=s96-c-rg-br100" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong><?php echo $_SESSION['name'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="#">Change Password</a></li>
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
          <div class="form-search my-5 p-5 bg-white rounded-3 shadow-sm">
            <div class="row">

              <ul class="list-group">
                <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">

                <!-- <li class="list-group-item"><strong>Tono</strong> Telah Menambahkan Kandidat... <p class="float-end">08:00</p>
      </li>
      <li class="list-group-item"><strong>Budi</strong> Telah Merubah Kandidat... <p class="float-end">08:00</p>
      </li>
      <li class="list-group-item"><strong>Asep</strong> Telah Menghapus Kandidat... <p class="float-end">08:00</p>
      </li> -->

                <?php
                $sql = mysqli_query($conn, "SELECT * FROM history WHERE id='$id'");


                while ($row = mysqli_fetch_array($sql)) {
                  if ($row['histori'] == 'Mengedit' and $rows['id']) {
                    echo "<li class='list-group-item'><a href='Edit.php?id=$row[id]'  style='text-decoration:none; color: #212529;'><strong>" . $row['nama'] . "</strong> Telah " . $row['histori'] . " Status Kandidat bernama <strong>" . $row['data'] . "</strong> Menjadi " . $row['status'] . " <p class='float-end'>" . date("l, d/M/Y H:i", strtotime($row['waktu'])) . "</p></a></li>";
                  } elseif ($row['histori'] == 'Menambah' and $rows['id']) {
                    echo "<li class='list-group-item'><a href='Edit.php?id=$row[id]'  style='text-decoration:none; color: #212529;'><strong>" . $row['nama'] . "</strong> Telah " . $row['histori'] . " Kandidat bernama <strong>" . $row['data'] . "</strong><p class='float-end'>" . date("l, d/M/Y H:i", strtotime($row['waktu'])) . "</p></a></li>";
                  } elseif ($row['histori'] == 'Menginput' and $rows['id']) {
                    echo "<li class='list-group-item'><a href='Edit.php?id=$row[id]'  style='text-decoration:none; color: #212529;'><strong>" . $row['nama'] . "</strong> Telah " . $row['histori'] . " Cv Kandidat bernama <strong>" . $row['data'] . "</strong><p class='float-end'>" . date("l, d/M/Y H:i", strtotime($row['waktu'])) . "</p></a></li>";
                  }
                }

                ?>
              </ul>


              <a <?php echo "href='Info.php?id=$rows[id]'" ?> class="btn btn-danger mt-3 float-end">Back</a>
            </div>

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