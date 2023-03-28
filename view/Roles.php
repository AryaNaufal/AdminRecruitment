<?php
session_start();
include "../config.php";

if (!isset($_SESSION['name'])) {
  header("location: ../index.php");
}

if ($_SESSION['role'] != 'Administrator') {
  header("location: ../HomePage.php");
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
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <button class="nav-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                  <i class="fas fa-user"></i>
                  My-Administrator
                </button>
                <div class="collapse show ms-2" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="Roles.php" class="nav-link text-white text-decoration-none rounded ms-3 active">Role</a></li>
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
            </ul>
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
                      <li><a href='../function/ResetPass.php?id=$row[id]' class='text-decoration-none'> <button class='dropdown-item' name='resetPass'>Reset Pass</button></a></li>            
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
  </div>

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