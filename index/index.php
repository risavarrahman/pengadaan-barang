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

?>

<body> 
<div class="container-fluid">
	<div class="row my-5 mx-5">
		<div class="col-lg-9">
			<div class="d-flex justify-content-end">
				<a href="../request/request.php" class="btn btn-primary mb-3"> + Permintaan</a>
			</div>
			<table class="table table-bordered table-hover" id="inventory">
				<thead class="table-light">
					<tr>
						<th>ID</th>
						<th>Nama Barang</th>
						<th>Stok</th>
						<th>Harga Satuan</th>
						<th>Status</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				
				<?php 
					$result = mysqli_query($connection, "SELECT * FROM barang");
					foreach ($result as $row) : 
				?>
				<tbody>
					<tr>
						<td><?= $row['ID_barang']; ?></td>
						<td><?= $row['NAMA_barang']; ?></td>
						<td><?= $row['STOK_barang']; ?></td>
						<td class="text-end">Rp. 
							<?= number_format($row['HARGA_satuan']); ?>
						</td>
						<td><?= $row['STATUS_barang']; ?></td>
						<td class="text-center">
							<?php if($row['STATUS_barang'] === "Terbayar") { ?>

								<button class="btn btn-success">Terbayar</button>

							<?php } else { ?> 
								
								<a href="../payment/payment.php?bayar=<?= $row['ID_barang']; ?>" class="btn btn-danger">Belum Terbayar</a>

							<?php } ?>

						</td>
					</tr>
				</tbody>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="col-lg-3 my-5">
			<?php include('../partials/sidebar.php') ?>
		</div>
	</div>
</div>
</body>
</html>
<?php 
  include_once('../partials/footer.php'); 

