<?php
if (isset($_POST['submit'])) {
  # code...
  $date1 = date("Y-m-d", strtotime($_POST['from']));
  $date2 = date("Y-m-d", strtotime($_POST['to']));
  // $query = mysqli_query($conn, "SELECT * FROM 'cv' WHERE date('tanggal') BETWEEN '$date1' AND '$date2'") or die();

  $Nama = $_POST['nama'];
  $Posisi = $_POST['posisi'];
  $Ipk = $_POST['ipk'];
  $Telp = $_POST['noTelp'];
  // $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama, posisi, ipk LIKE '%".$Nama."%', '%".$Posisi."%', '%".$Ipk."%'");
  // $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '$Nama' OR ( posisi LIKE '$Posisi' OR ipk LIKE '$Ipk' ) OR (tanggal BETWEEN '$date1' AND '$date2')");
  $sql = mysqli_query($conn, "SELECT * FROM cv WHERE (nama LIKE '$Nama%' OR posisi LIKE '$Posisi' OR telp LIKE '$Telp' OR ipk LIKE '$Ipk') OR (tanggal BETWEEN '$date1' AND '$date2')");
  // $sql = mysqli_query($conn, "SELECT * FROM cv WHERE nama LIKE '$Nama%' AND posisi LIKE '$Posisi'");
} else {
  # code...
  $sql = mysqli_query($conn, "SELECT * FROM cv");
}

while ($user_data = mysqli_fetch_array($sql)) {
  echo "<tr>";
  echo "<td>" . $user_data['tanggal'] . "</td>";
  echo "<td>" . $user_data['nama'] . "</td>";
  echo "<td>" . $user_data['telp'] . "</td>";
  // echo "<td>" . $user_data['kategori'] . "</td>";
  echo "<td>" . $user_data['posisi'] . "</td>";
  echo "<td>" . $user_data['chanel'] . "</td>";
  echo "<td>" . $user_data['edukasi'] . "</td>";
  echo "<td>" . $user_data['institusi'] . "</td>";
  echo "<td>" . $user_data['jurusan'] . "</td>";
  echo "<td>" . $user_data['ipk'] . "</td>";
  echo "<td>" . $user_data['pengalaman'] . "</td>";
  echo "<td>";
  echo "<a href='Info.php?id=$user_data[id]' class='fas fa-info-circle ingfo' style='text-decoration:none; color:#428bca;'></a>";
  echo "<a href='Edit.php?id=$user_data[id]' class='fas fa-edit' style='text-decoration:none; color:#5cb85c;'></a>";
  ?> <a <?php echo "href='function/delete.php?id=$user_data[id] '"?> onclick="return confirm('Are you sure?')" class='fas fa-trash del' style='text-decoration:none; color:#d9534f;'></a>
  <?php
  echo "</td>";
  echo "</tr>";
}

?>

