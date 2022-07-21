<?php 
	include_once('../partials/header.php');
	include_once('../partials/navbar.php');
	require('../config/config.php');

	session_start();
	ob_start();

	if( !isset($_SESSION["login"]) ) {
		header("location: ../login/login.php");
		exit;
	}

	if(isset($_POST['permintaan'])) :
		$nama_barang 		= $_POST['nama_barang'];
		$stok_barang 		= $_POST['stok_barang'];
		$status_barang 	= $_POST['status_barang'];
		$harga_satuan 	= $_POST['harga_satuan'];
		$harga_barang 	= $_POST['harga_barang'];

		$sql = mysqli_query($connection, "INSERT INTO barang VALUES ('', '$nama_barang','$stok_barang','$status_barang','$harga_satuan','$harga_barang')");

		echo "<script>
			alert('Permintaan Barang telah dilakukan!');
			location.replace('../index/index.php');
		</script>";
	endif;	

	

?>

<div class="container">
	<div class="row my-5">
		<h2 class="text-center">Halaman Permintaan</h2>
		<div class="col-lg-8">
			<form action="" method="post" class="text-start">
				<input type="hidden" name="id_barang" id="id_barang">
				<div class="form-group mb-3">
					<label for="nama_barang">Nama Barang</label>
					<input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
				</div>
				<div class="form-group mb-3">
					<label for="stok_barang">Stok Barang</label>
					<input type="text" class="form-control" name="stok_barang" id="stok_barang" required>
				</div>
				<div class="form-group mb-3">
					<label for="status_barang">Status Barang</label>
					<select class="form-select" name="status_barang">
						<option value="Terbayar">Terbayar</option>
						<option value="Belum Terbayar">Belum Terbayar</option>
					</select>
				</div>
				<div class="form-group mb-3">
					<label for="harga_satuan">Harga Satuan Barang</label>
					<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" required>
				</div>
				<div class="form-group mb-3">
					<label for="harga_barang">Total Harga Barang</label>
					<input type="text" class="form-control" name="harga_barang" id="harga_barang" required>
				</div>
				<input type="submit" class="btn btn-success" value="Permintaan" name="permintaan">
			</form>
			
		</div>
		<div class="col-lg-4 mt-3">
			<?php include('../partials/sidebar.php') ?>

		</div>
	</div>
</div>
	

<?php 
  include_once('../partials/footer.php'); 