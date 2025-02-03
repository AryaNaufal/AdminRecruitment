const pswrdField = document.querySelector(".form input[type='password']"),
pswrdFields = document.querySelector(".form input.p2[type='password']"),
toggleIcon = document.querySelector(".form i"),
toggleIcons = document.querySelector(".form i.i2");

toggleIcon.onclick = () =>{
  if(pswrdField.type === "password"){
    pswrdField.type = "text";
    toggleIcon.classList.add("active");
  }else{
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
}
toggleIcons.onclick = () =>{
  if(pswrdFields.type === "password"){
    pswrdFields.type = "text";
    toggleIcons.classList.add("active");
  }else{
    pswrdFields.type = "password";
    toggleIcons.classList.remove("active");
  }
}