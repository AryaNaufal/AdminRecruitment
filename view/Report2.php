<?php
session_start();
error_reporting(0);
include "../config.php";

if (!isset($_SESSION['name'])) {
  # code...
  header("location: index.php");
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
          <div class="nav d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 240px; height: 100vh;">
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
                        <div class="collapse show ms-2" id="report-collapse">
                          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <li><a href="Report1.php" class="nav-link text-white text-decoration-none rounded ms-3">Laporan 1</a></li>
                          <li><a href="Report2.php" class="nav-link text-white text-decoration-none rounded ms-3 active">Laporan 2</a></li>
                          </ul>
                        </div>
                      </li>
                    </ul>';
            } elseif ($_SESSION['role'] == 'Recruitment Officer' || $_SESSION['role'] == 'Recruitment Admin') {
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
                        <div class="collapse show ms-2" id="report-collapse">
                          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <li><a href="Report1.php" class="nav-link text-white text-decoration-none rounded ms-3">Laporan 1</a></li>
                          <li><a href="Report2.php" class="nav-link text-white text-decoration-none rounded ms-3 active">Laporan 2</a></li>
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
        <div class="mt-5">
          <div class="wrapper mx-5">
            <div class="my-5 p-5 bg-white rounded-3 shadow-sm">
              <div class="mb-3 row">

                <h1>Laporan 2</h1>
                <div class="reports pb-3">
                  <a href="../function/Excel.php" class="btn btn-success float-end">Download CV</a>
                </div>

                <div class="table-responsive z-1">
                  <table id="example" class="table table-responsive-sm table-striped" style="width:100%; border-radius: 200px;">
                    <thead class="bg-dark text-white">
                      <tr class="sticky-top">
                        <th>Position</th>
                        <th>CV in</th>
                        <th>Candidate</th>
                        <th>In progress</th>
                        <th>Test 1</th>
                        <th>Interview</th>
                        <th>Technical Interview</th>
                        <th>Interview by Client</th>
                        <th>Final Interview</th>
                        <th>Blind CV</th>
                        <th>Employee</th>
                        <th>Drop by Candidate</th>
                        <th>Drop by Klimaks</th>
                        <th>Drop</th>
                        <th>Pending</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $positions = mysqli_query($conn, "SELECT DISTINCT posisi FROM position ORDER BY posisi ASC");
                        $first_cv = mysqli_query($conn, "SELECT tanggal FROM cv ORDER BY tanggal ASC LIMIT 1");
                        $row_cv = mysqli_fetch_array($first_cv);

                        $date1 = date("Y-m-d", strtotime($row_cv[0]));
                        $date2 = date("Y-m-d");


                        foreach ($positions as $position) {
                          echo '<tr>';
                          foreach ($position as $cv) {
                            $cv_in = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'CV in' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $candidate = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Candidate' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $in_progress = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'In Progress' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $test1 = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Test1' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $interview = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Interview' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $technical_interview = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Technical Interview' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $client_interview = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Interview by Client' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $blind_cv = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Blind CV' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $employee = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Employee' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $drop_candidate = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Drop by Candidate' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $drop_klimaks = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Drop by Klimaks' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $drop = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Drop' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $pending = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Pending' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);
                            $final_interview = mysqli_fetch_all(mysqli_query($conn, "SELECT cv.status FROM cv INNER JOIN position ON position.posisi = cv.posisi WHERE cv.status = 'Final Interview' AND cv.posisi = '$cv' AND cv.tanggal BETWEEN '$date1' AND '$date2' ORDER BY cv.posisi ASC"), MYSQLI_ASSOC);

                            $res1 = count($cv_in) + count($candidate) + count($in_progress) + count($test1) + count($interview) + count($technical_interview) + count($client_interview) + count($blind_cv) + count($employee) + count($drop_candidate) + count($drop_klimaks) + count($drop) + count($pending) + count($final_interview);


                            echo '<td>' . $cv . '</td>';
                            print '<td>' . count($cv_in) . '</td>';
                            print '<td>' . count($candidate) . '</td>';
                            print '<td>' . count($in_progress) . '</td>';
                            print '<td>' . count($test1) . '</td>';
                            print '<td>' . count($interview) . '</td>';
                            print '<td>' . count($technical_interview) . '</td>';
                            print '<td>' . count($client_interview) . '</td>';
                            print '<td>' . count($final_interview) . '</td>';
                            print '<td>' . count($blind_cv) . '</td>';
                            print '<td>' . count($employee) . '</td>';
                            print '<td>' . count($drop_candidate) . '</td>';
                            print '<td>' . count($drop_klimaks) . '</td>';
                            print '<td>' . count($drop) . '</td>';
                            print '<td>' . count($pending) . '</td>';
                            echo '<td>' . $res1  . '</td>';
                          }
                          echo '</tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot class="table-secondary">
                      <?php
                      $result_cv_in = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'CV in' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_candidate = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Candidate' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_in_progress = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'In Progress' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_test1 = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Test1' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_interview = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Interview' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_technical_interview = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Technical Interview' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_client_interview = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Interview by Client' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_blind_cv = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Blind CV' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_employee = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Employee' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_drop_candidate = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Drop by Candidate' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_drop_klimaks = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Drop by Klimaks' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_drop = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Drop' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_pending = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Pending' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));
                      $result_final_interview = mysqli_fetch_all(mysqli_query($conn, "SELECT status FROM cv WHERE status = 'Final Interview' AND cv.tanggal BETWEEN '$date1' AND '$date2'"));

                      $res2 = count($result_cv_in) + count($result_candidate) + count($result_in_progress) + count($result_test1) + count($result_interview) + count($result_technical_interview) + count($result_client_interview) + count($result_blind_cv) + count($result_employee) + count($result_drop_candidate) + count($result_drop_klimaks) + count($result_drop) + count($result_pending) + count($result_final_interview);
                      echo '<tr>
                            <td>Total</td>';
                      print '<td>' . count($result_cv_in) . '</td>';
                      print '<td>' . count($result_candidate) . '</td>';
                      print '<td>' . count($result_in_progress) . '</td>';
                      print '<td>' . count($result_test1) . '</td>';
                      print '<td>' . count($result_interview) . '</td>';
                      print '<td>' . count($result_technical_interview) . '</td>';
                      print '<td>' . count($result_client_interview) . '</td>';
                      print '<td>' . count($result_final_interview) . '</td>';
                      print '<td>' . count($result_blind_cv) . '</td>';
                      print '<td>' . count($result_employee) . '</td>';
                      print '<td>' . count($result_drop_candidate) . '</td>';
                      print '<td>' . count($result_drop_klimaks) . '</td>';
                      print '<td>' . count($result_drop) . '</td>';
                      print '<td>' . count($result_pending) . '</td>';
                      print '<td>' . $res2 . '</td>';
                      echo '</tr>';
                      ?>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- DataTable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="../public/DataTables-1/js/jquery.dataTables.min.js"></script>
  <script src="../public/DataTables-1/js/dataTables.bootstrap5.min.js"></script>

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