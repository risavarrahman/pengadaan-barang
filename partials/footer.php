

<footer class="container-fluid sticky-bottom mt-5">
  <!-- <div class="row bg-warning py-3">
    <div class="col">
      <small class="text-dark mx-4">Copyright &copy; Sistem Informasi 2019 | 2021 All rights reserved.</small>
    </div>
  </div> -->

  <div class="row bg-dark text-white py-4 px-2">
    <div class="col-lg-4">
      <small class="text-white mx-4 align-bottom">Copyright &copy; Sistem Informasi 2019 | 2021 All rights reserved.</small>
    </div>
    <div class="d-flex justify-content-end">
      <ul class="nav align-items-start flex-column me-5">
				<strong class="nav-item text-start">FAKULTAS ILMU KOMPUTER</strong>
        <li class="nav-item text-white">Jl. Raya Rungkut Madya Gunung Anyar Surabaya</li>
        <li class="nav-item text-white">Jawa Timur, Indonesia - 60294</li>
        <li class="nav-item text-white">Telp. 031 - 8706369</li>
        <li class="nav-item text-white">Fax. 031 - 8706372</li>
        <li class="nav-item text-white">Email : fasilkom@upnjatim</li>
      </ul>
    </div>


  </div>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Datatables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script lang="javascript">
    $(document).ready(function() {
    $('#inventory').DataTable();
    } );

    $(document).ready(function() {
      $("#stok_barang, #harga_satuan").keyup(function() {
        var harga  = $("#harga_satuan").val();
        var jumlah = $("#stok_barang").val();

        var total = parseInt(harga) * parseInt(jumlah);
        $("#harga_barang").val(total);
      });
    });
</script>

