document.getElementById("datepicker").value = localStorage.getItem("inputdate");
document.getElementById("nama").value = localStorage.getItem("inputname");
document.getElementById("NoTelp").value = localStorage.getItem("inputNoTelp");
document.getElementById("institution").value = localStorage.getItem("inputInstitution");
document.getElementById("ipk").value = localStorage.getItem("inputIpk");
document.getElementById("experience").value = localStorage.getItem("inputExperience");
document.getElementById("chanel").value = localStorage.getItem("inputchanel");

function savelocal() {
  let dates = document.getElementById("datepicker").value;
  let name = document.getElementById("nama").value;
  let telp = document.getElementById("NoTelp").value;
  let institut = document.getElementById("institution").value;
  let ipk = document.getElementById("ipk").value;
  let Exp = document.getElementById("experience").value;
  let ch = document.getElementById("chanel").value;

  localStorage.setItem("inputdate", dates);
  localStorage.setItem("inputname", name);
  localStorage.setItem("inputNoTelp", telp);
  localStorage.setItem("inputInstitution", institut);
  localStorage.setItem("inputIpk", ipk);
  localStorage.setItem("inputExperience", Exp);
  localStorage.setItem("inputchanel", ch);
}

function deletelocal() {
  let dates = document.getElementById("datepicker").value;
  let name = document.getElementById("nama").value;
  let telp = document.getElementById("NoTelp").value;
  let institut = document.getElementById("institution").value;
  let ipk = document.getElementById("ipk").value;
  let Exp = document.getElementById("experience").value;
  let ch = document.getElementById("chanel").value;

  localStorage.removeItem("inputdate", dates);
  localStorage.removeItem("inputname", name);
  localStorage.removeItem("inputNoTelp", telp);
  localStorage.removeItem("inputInstitution", institut);
  localStorage.removeItem("inputIpk", ipk);
  localStorage.removeItem("inputExperience", Exp);
  localStorage.removeItem("inputchanel", ch);
}