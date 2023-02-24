<?php
session_start();
include "../header.php";
include "../config.php";

if (!isset($_SESSION['name'])) {
  header("location: ../index.php");
}

if ($_SESSION['role'] != 'Administrator') {
  header("location: ../HomePage.php");
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
              <div class="collapse show ms-2" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="Roles.php" class="nav-link text-white text-decoration-none rounded active">Role</a></li>
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
              <li><a class="dropdown-item" href="ChangePass.php">Change Password</a></li>
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
          <div class="my-5 p-5 bg-white rounded-3 shadow-sm">
            <table class="table table-responsive-sm table-light table-striped" width="100%">
              <thead>
                <tr>
                  <th>Role ID</th>
                  <th style="width: 50%">Role Name</th>
                  <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
                <?php

                $sql = mysqli_query($conn, "SELECT * FROM user");
                $tes = mysqli_query($conn, "SELECT nama FROM user WHERE nama = '" . $_SESSION['name'] . "'");
                while ($row = mysqli_fetch_array($sql)) {
                  echo "<tr>";
                  echo "<td>" . $row['role_id'] . "</td>";
                  echo "<td>" . $row['role_name'] . "</td>";
                  if ($_SESSION['name'] == $row['nama']) {
                    echo "<td>
                    <a href='' class='' data-bs-toggle='dropdown' aria-expanded='false' style='color: black; visibility:hidden;'>
                    <i class='fas fa-ellipsis-h'></i>
                    </a>
                    <ul class='dropdown-menu' >
                      <form action='../function/ChangeRoles.php' method='POST'>
                      <input type='hidden' name='id' value='" . $row['id'] . "'>
                      <li><a href='?id=$row[id]' class='text-decoration-none'> <button class='dropdown-item' name='tes' value='Administrator'>Administrator</button></a></li>            
                      <li><a href='?id=$row[id]' class='text-decoration-none'> <button class='dropdown-item' name='tes2' value='Recruitment Admin'>Recruitment Admin</button></a></li>            
                      <li><a href='?id=$row[id]' class='text-decoration-none'> <button class='dropdown-item' name='tes3' value='Recruitment Officer'>Recruitment Officer</button></a></li>            
                      </form>
                    </ul>
                    </td>";
                  } else {
                    echo "<td>
                    <a href='' class='' data-bs-toggle='dropdown' aria-expanded='false' style='color: black;'>
                    <i class='fas fa-ellipsis-h'></i>
                    </a>
                    <ul class='dropdown-menu' >
                      <form action='../function/ChangeRoles.php' method='POST'>
                      <input type='hidden' name='id' value='" . $row['id'] . "'>
                      <li><a href='?id=$row[id]' class='text-decoration-none'> <button class='dropdown-item' name='tes' value='Administrator'>Administrator</button></a></li>            
                      <li><a href='?id=$row[id]' class='text-decoration-none'> <button class='dropdown-item' name='tes2' value='Recruitment Admin'>Recruitment Admin</button></a></li>            
                      <li><a href='?id=$row[id]' class='text-decoration-none'> <button class='dropdown-item' name='tes3' value='Recruitment Officer'>Recruitment Officer</button></a></li>            
                      </form>
                    </ul>
                    </td>";
                  }
                }
                echo "</tr>";



                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>

  </div>


</body>

</html>