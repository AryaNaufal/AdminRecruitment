<?php
include_once 'header.php';
include 'config.php';
?>
<html>
<style>
  html,
  body {
    height: 100%;
  }

  .form {
    width: 30%;
  }

  .form i {
    position: absolute;
    left: 90%;
    top: 75%;
    color: #ccc;
    cursor: pointer;
    transform: translateY(-50%);
  }

  .form i.active::before {
    color: #333;
    content: "\f070";
  }

  @media only screen and (max-width: 768px) {

    /* For mobile phones: */
    .form {
      width: 75%;
    }

    .form i {
      position: absolute;
      left: 85%;
      top: 75%;
      color: #ccc;
      cursor: pointer;
      transform: translateY(-50%);
    }

    .form i.active::before {
      color: #333;
      content: "\f070";
    }
  }
</style>

<body class="bg-light">

  <div class="h-100 d-flex align-items-center justify-content-center row">
    <div class="form bg-white rounded-3 shadow-sm p-5">
      <h1>Login</h1>
      <hr>
      <form action="function/Login.php" method="POST">
        <div class="mb-3">
          <label for="mails" class="form-label">Email</label>
          <input type="email" class="form-control" name="mails" id="mails" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
          <i class="fas fa-eye"></i>
        </div>
        <!-- <div class="mb-3">
          <a href="view/ResetPass.php" class="">Forgot Password?</a>
        </div> -->
        <div class="mx-3">
          <input type="submit" class="btn btn-success float-end" name="submit" value="Login">
          <a href="Register.php" class="btn btn-primary float-end mx-3">Sign Up</a>
        </div>
      </form>
    </div>
  </div>





  <script src="js/hidepass.js"></script>
</body>

</html>