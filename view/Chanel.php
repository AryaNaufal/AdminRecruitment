<?php
include_once "../header.php";
include "../config.php";

if (isset($_POST['Submit'])) {
  $Channel = $_POST['Channel'];

  $sql = mysqli_query($conn, "INSERT INTO channel (nama_ch) VALUES ('$Channel')");
  header("location: Add.php");
}
?>

<html>

<body class="bg-light">
  <!-- Navigasi Bar -->
  <nav class="navbar bg-dark px-5">
    <div class="container-fluid">
      <img width="250" src="https://kwad5.com/wp-content/uploads/2019/09/cropped-logo-1.png" class="img-fluid" alt="">
    </div>
  </nav>

  <!-- Cari Pelamar -->
  <div class="container form-search my-5 p-5 bg-white rounded-3 shadow-sm">
    <form action="#" method="POST">

      <div class="mb-3 row">
        <label for="channel" class="col-sm-2 col-form-label">Channel :</label>
        <div class="col-sm-4">
          <input type="text" class="form-control shadow-none" id="channel" name="Channel" required>
          <input type="submit" id="submit" class="btn btn-success mt-3 float-end" name="Submit" onclick="return confirm('Apakah Channel Sudah Benar?' + value)">
          <a href="add.php" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
        </div>
      </div>
    </form>
  </div>



  </script>
</body>

</html>