<?php
include_once 'header.php';
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwad5</title>

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
</head>

<body class="bg-light">
  <div class="h-100 d-flex align-items-center justify-content-center row">
    <div class="form bg-white rounded-3 shadow-sm p-5">
      <h1>Register</h1>
      <hr>
      <form action="function/Signup.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Nama</label>
          <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="mb-3">
          <label for="mails" class="form-label">Email</label>
          <input type="email" class="form-control" name="mails" id="mails" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
          <i class="fas fa-eye"></i>
        </div>
        <input type="submit" class="btn btn-success float-end" name="submit" value="Register">
        <a href="index.php" class="btn btn-danger float-end mx-3">Back</a>
      </form>
    </div>
  </div>

  <script src="js/hidepass.js"></script>
</body>

</html>