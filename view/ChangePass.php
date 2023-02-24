<?php
include_once '../header.php';
include '../config.php';
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
    left: 93%;
    top: 75%;
    color: #ccc;
    cursor: pointer;
    transform: translateY(-50%);
  }

  .form i.active::before {
    color: #333;
    content: "\f070";
  }

  .form i.i2 {
    position: absolute;
    left: 93%;
    top: 75%;
    color: #ccc;
    cursor: pointer;
    transform: translateY(-50%);
  }

  .form i.i2.active::before {
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

    .form i.i2 {
      position: absolute;
      left: 85%;
      top: 75%;
      color: #ccc;
      cursor: pointer;
      transform: translateY(-50%);
    }

    .form i.i2.active::before {
      color: #333;
      content: "\f070";
    }
  }
</style>

<body class="bg-light">

  <div class="h-100 d-flex align-items-center justify-content-center row">
    <div class="form bg-white rounded-3 shadow-sm p-5">
      <h1 class="">Change Password</h1>
      <hr>
      <form action="../function/ChangePass.php" method="POST">
        <div class="mb-3">
          <label for="mails" class="form-label text-xl font-bold underline">Email</label>
          <input type="email" class="form-control" name="mails" id="mails" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
          <i class="fas fa-eye"></i>
        </div>
        <div class="mb-3 position-relative">
          <label for="passwordChange" class="form-label">New Password</label>
          <input type="password" class="form-control p2" name="passwordChange" id="passwordChange" aria-required="tes">
          <i class="fas fa-eye i2"></i>
        </div>
        <input type="submit" class="btn btn-success float-end" name="submit" value="Change" >
        <a href="../HomePage.php" class="btn btn-danger float-end mx-3">Back</a>
      </form>
    </div>
  </div>

  <script src="../js/hidepass.js"></script>

</body>

</html>