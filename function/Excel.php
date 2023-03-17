<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include "../config.php";
$date = date("d-M-Y");
header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Data CV $date.xls");
?>


<table border="1">
  <thead>
    <tr>
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
  <tfoot>
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