<?php
include_once "../header.php";
include "../config.php";

$edks = mysqli_query($conn, "SELECT * FROM education");

if (isset($_POST['Submit'])) {
  $Education = $_POST['Education'];
  $Major = $_POST['Major'];

  $sql = mysqli_query($conn, "INSERT INTO major (edukasi, jurusan) VALUES ('$Education', '$Major')");
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
          <a href="Add.php" class="btn btn-danger mt-3 mx-3 float-end">Back</a>
        </div>
      </div>
    </form>
  </div>



  <script src="js/add.js"></script>
  </script>
</body>

</html>