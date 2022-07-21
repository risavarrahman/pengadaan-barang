<?php 

  $host 		= "localhost";
  $username = "root";
  $password = "";
  $database = "pengadaan_barang";

  $connection = mysqli_connect($host, $username, $password, $database);

  if(!$connection){
  	die ("Connection Failed: ".mysqli_connect_error());
  }

	// Function Register untuk registrasi akun admin
	function register($data) {
		global $connection;

		$username 	= strtolower(stripslashes($data["username"]));
		$password 	= mysqli_real_escape_string($connection, $data["password"]);
		$roleadmin	= $data["ROLE_admin"];

		// Admin Tidak Boleh ada yg sama
		$result = mysqli_query($connection, "SELECT USER_admin FROM admin WHERE USER_admin = '$username'");
		if( mysqli_fetch_assoc($result) ) {
			echo "<script>
				alert('Username sudah terdaftar!');
			</script>";
			return false;
		}
		
		// Enkripsi Password
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		// Tambahkan ADMIN ke DATABASE
		mysqli_query($connection, "INSERT INTO admin VALUES('', '$username', '$password', '$roleadmin')");

		return mysqli_affected_rows($connection);
	}

	$sql1 = mysqli_query($connection, "SELECT * FROM barang WHERE STATUS_barang = 'Belum Terbayar'");
	$sql2 = mysqli_query($connection, "SELECT * FROM barang WHERE STATUS_barang = 'Terbayar'");
  $belum = mysqli_num_rows($sql1);
  $bayar = mysqli_num_rows($sql2);


