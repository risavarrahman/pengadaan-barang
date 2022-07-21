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

	$id_barang = $_GET['bayar'];

	if(isset($_POST['bayar'])) :
		$nama_barang 		= $_POST['nama_barang'];
		$stok_barang 		= $_POST['stok_barang'];
		$status_barang 	= $_POST['status_barang'];
		$harga_satuan 	= $_POST['harga_satuan'];
		$harga_barang 	= $_POST['harga_barang'];

		$sql = mysqli_query($connection, "UPDATE barang SET 
			NAMA_barang 		= '$nama_barang',
			STOK_barang			= '$stok_barang',
			STATUS_barang		= 'Terbayar',
			HARGA_satuan		= '$harga_satuan',
			HARGA_barang		= '$harga_barang'
			WHERE ID_barang = '$id_barang'
		");
		echo "<script>
			alert('Barang telah terbayar!');
			location.replace('../index/index.php');
		</script>";

	endif;	


?>

<div class="container">
	<div class="row my-5">
		<h2 class="text-center">Halaman Pembayaran</h2>
		<div class="col-lg-8">
			<?php 
				$result = mysqli_query($connection, "SELECT * FROM barang WHERE ID_barang = '$id_barang'");

				foreach ($result as $row) :
			?>
			<form action="" method="post" class="text-start">
				<input type="hidden" name="id_barang" id="id_barang">
				<div class="form-group mb-3">
					<label for="nama_barang">Nama Barang</label>
					<input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $row['NAMA_barang']; ?>" readonly>
				</div>
				<div class="form-group mb-3">
					<label for="stok_barang">Stok Barang</label>
					<input type="text" class="form-control" name="stok_barang" id="stok_barang" value="<?= $row['STOK_barang']; ?>" readonly>
				</div>
				<div class="form-group mb-3">
					<label for="status_barang">Status Barang</label>
					<input type="text" class="form-control" name="status_barang" id="status_barang" value="<?= $row['STATUS_barang']; ?>" readonly>
				</div>
				<div class="form-group mb-3">
					<label for="harga_satuan">Harga Satuan Barang</label>
					<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" value="<?= $row['HARGA_satuan']; ?>" readonly>
				</div>
				<div class="form-group mb-3">
					<label for="harga_barang">Total Harga Barang</label>
					<input type="text" class="form-control" name="harga_barang" id="harga_barang" value="<?= $row['HARGA_barang']; ?>" readonly>
				</div>
				<input onclick="return confirm('Apakah anda ingin melanjutkan pembayaran ?')" type="submit" class="btn btn-success" value="Bayar" name="bayar">
			</form>
			<?php endforeach; ?>
		</div>
		<div class="col-lg-4 mt-3">
			<?php include('../partials/sidebar.php') ?>

		</div>
	</div>
</div>


<?php 
  include_once('../partials/footer.php'); 