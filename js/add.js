function tampilKategori() {
  var nama_kategori = document.getElementById("form1").kategori.value;
  if (nama_kategori == "Developer") {
    document.getElementById("posisi").innerHTML = "<option value='Front End'>Front End</option><option value='Back End'>Back End</option><option value='Java'>Java</option><option value='Fullstack'>Fullstack</option><option value='Mobile'>Mobile</option><option value='SQL'>SQL</option><option value='SQL BI'>SQL BI</option><option value='Project Manager'>Project Manager</option>";
  } else if (nama_kategori == "Analyst") {
    document.getElementById("posisi").innerHTML = "<option value='Bussiness'>Bussiness</option><option value='Data'>Data</option><option value='System'>System</option>";
  } else if (nama_kategori == "Tester") {
    document.getElementById("posisi").innerHTML = "<option value='Software'>Software</option>";
  } else if (nama_kategori == "Support") {
    document.getElementById("posisi").innerHTML = "<option value='IT'>IT</option><option value='Technical Writer'>Technical Writer</option><option value='Impl.'>Impl.</option>";
  } else if (nama_kategori == "Non IT") {
    document.getElementById("posisi").innerHTML = "<option value='Design Product'>Design Product</option><option value='Sales Promotion'>Sales Promotion</option><option value='Marketing'>Marketing</option><option value='HR Recruitment'>HR Recruitment</option><option value='Finance Leader'>Finance Leader</option><option value='Admin'>Admin</option>";
  }
}

function tampilEdukasi() {
  var nama_edukasi = document.getElementById("form1").edukasi.value;
  if (nama_edukasi == "SMA") {
    document.getElementById("jurusan").innerHTML = "<option value='IPA'>IPA</option><option value='IPS'>IPS</option><option value='Bahasa'>Bahasa</option>";
  } else if (nama_edukasi == "SMK") {
    document.getElementById("jurusan").innerHTML = "<option value='Teknik Komputer & Jaringan'>Teknik Komputer & Jaringan</option><option value='Produksi Grafika'>Produksi Grafika</option><option value='Akuntansi'>Akuntansi</option>";
  } else if (nama_edukasi == "Diploma1") {
    document.getElementById("jurusan").innerHTML = "<option value='Information System'>Information System</option><option value='Information Technology'>Information Technology</option><option value='System Computer'>System Computer</option><option value='Design'>Design</option><option value='Accounting'>Accounting</option><option value='Management'>Management</option>";
  } else if (nama_edukasi == "Diploma2") {
    document.getElementById("jurusan").innerHTML = "<option value='Information System'>Information System</option><option value='Information Technology'>Information Technology</option><option value='System Computer'>System Computer</option><option value='Design'>Design</option><option value='Accounting'>Accounting</option><option value='Management'>Management</option>";
  } else if (nama_edukasi == "Diploma3") {
    document.getElementById("jurusan").innerHTML = "<option value='Information System'>Information System</option><option value='Information Technology'>Information Technology</option><option value='System Computer'>System Computer</option><option value='Design'>Design</option><option value='Accounting'>Accounting</option><option value='Management'>Management</option>";
  } else if (nama_edukasi == "Diploma4") {
    document.getElementById("jurusan").innerHTML = "<option value='Information System'>Information System</option><option value='Information Technology'>Information Technology</option><option value='System Computer'>System Computer</option><option value='Design'>Design</option><option value='Accounting'>Accounting</option><option value='Management'>Management</option>";
  } else if (nama_edukasi == "Sarjana1") {
    document.getElementById("jurusan").innerHTML = "<option value='Information System'>Information System</option><option value='Information Technology'>Information Technology</option><option value='System Computer'>System Computer</option><option value='Design'>Design</option><option value='Psychology'>Psychology</option><option value='Accounting'>Accounting</option><option value='Management'>Management</option>";
  } else if (nama_edukasi == "Sarjana2") {
    document.getElementById("jurusan").innerHTML = "<option value='Information System'>Information System</option><option value='Information Technology'>Information Technology</option><option value='System Computer'>System Computer</option><option value='Design'>Design</option><option value='Psychology'>Psychology</option><option value='Accounting'>Accounting</option><option value='Management'>Management</option>";
  }
}