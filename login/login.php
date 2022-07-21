<?php 
  include_once('../partials/header.php');
  require ('../config/config.php');

  ob_start();
  session_start();

  if( isset($_SESSION['login']) ) {
    header("location: ../index/index.php");
    exit;
  }

  if( isset($_POST['login']) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($connection, "SELECT * FROM admin WHERE USER_admin = '$username' AND ROLE_admin = 'admin_perusahaan'");

    // Cek Username
    if( mysqli_num_rows($result) === 1) {

      // Cek Password
      $row = mysqli_fetch_assoc($result);
      if( password_verify($password, $row["PASS_admin"]) ) {

        // Set Session
        $_SESSION["login"] = true;

        header("location: ../index/index.php");
        exit;
      }
    }

    $error = true;
  }
?>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h1 class="my-5 pt-5 text-center">Welcome</h1>
        <?php if( isset($error) ) : ?>
          <div class="alert alert-danger" role="alert">
            Username atau Password Salah ! <br>
            Hanya Admin Perusahaan yang diperbolehkan
          </div>
        <?php endif; ?>

        <form method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
            <label for="username">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
            <label for="password">Password</label>
          </div>
          <button type="submit" class="w-100 btn btn-lg btn-primary" name="login">Login</button>
        </form>
        <small class="d-block text-center mt-3">Not Registered? <a href="../register/register.php">Register Now!</a></small>
      </div>
    </div>
  </div>
</body>


