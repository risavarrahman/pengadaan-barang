<?php 
  include_once('../partials/header.php');
  require ('../config/config.php');
  ob_start();
  session_start();

  if( isset($_POST['register'])) {
    if( register($_POST) > 0 ) {
      echo "<script>
        alert('Admin Berhasil ditambahkan!');
        location.replace('../login/login.php');
      </script>";
    } else {
      echo mysqli_error($connection);
    } 
  }
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <h1 class="my-5 pt-5 text-center">Registration</h1>
      <form method="POST" action="">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
          <label for="username">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
          <label for="password">Password</label>
        </div>
        <select class="form-select mb-3" id="ROLE_admin" name="ROLE_admin">
          <option value="admin_perusahaan" selected>Admin Perusahaan</option>
          <option value="admin_gudang">Admin Gudang</option>
        </select>

        <button type="submit" class="w-100 btn btn-lg btn-primary" name="register">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already Registered ? <a href="../login/login.php">Login Now!</a></small>
    </div>
  </div>
</div>