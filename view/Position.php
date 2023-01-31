<?php
include_once "../header.php";
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

  header("location: add.php");
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
          <a href="add.php" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
        </div>
      </div>
    </form>
  </div>



  </script>
</body>

</html>