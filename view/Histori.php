<?php
include_once "../header.php";
include "../config.php";
?>
<html>

<body class="bg-light">
  <!-- Navigasi Bar -->
  <nav class="navbar bg-dark px-5 sticky-top">
    <div class="container-fluid">
      <img width="250" src="https://kwad5.com/wp-content/uploads/2019/09/cropped-logo-1.png" class="img-fluid" alt="">
    </div>
  </nav>

  <!-- Cari Pelamar -->
  <div class="container form-search my-5 p-5 bg-white rounded-3 shadow-sm">
    <div class="row">

      <ul class="list-group">
        <!-- <li class="list-group-item"><strong>Tono</strong> Telah Menambahkan Kandidat... <p class="float-end">08:00</p>
      </li>
      <li class="list-group-item"><strong>Budi</strong> Telah Merubah Kandidat... <p class="float-end">08:00</p>
      </li>
      <li class="list-group-item"><strong>Asep</strong> Telah Menghapus Kandidat... <p class="float-end">08:00</p>
      </li> -->

        <?php
        $sql = mysqli_query($conn, "SELECT * FROM history");


        while ($row = mysqli_fetch_array($sql)) {
          echo "<li class='list-group-item'><a href='Edit.php?id=$row[id]'  style='text-decoration:none; color: #212529;'><strong>" . $row['nama'] . "</strong> Telah " . $row['histori'] . " Kandidat bernama <strong>" . $row['data'] . "</strong><p class='float-end'>" . date("l, d/M/Y H:i", strtotime($row['waktu'])) . "</p></a></li>";
        }
        ?>
      </ul>
      <a href="../index.php" class="btn btn-danger mt-3 float-end">Back</a>
    </div>

  </div>


</body>

</html>