
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Laporan Rekam Medis </h1>
            <ol class="breadcrumb">
            <li><a href="?module=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=kategori">Data laporan</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
          <form method=GET action='laporan_rekam.php' target='_blank'>
          <table class="table">
		  <tr>
			<td>Pasien</td>
			<td>:</td>
			<td>
				<select name="pasien" id="unit_tujuan" class="form-control">
		<option value="">-Pasien-</option>
		<?php 
		$sql = mysqli_query($koneksi,"select * from tb_pasien");
		while ($data = mysqli_fetch_array($sql)) {
			?> <option value="<?php echo $data['kode_pasien'] ?>"><?php echo $data['nama_pasien'] ?></option> <?php
		}
		 ?>
		</select>
			</td>
		  </tr>
           
            <tr>
              <td colspan="3"><input type="submit" class="btn btn-primary" value="CETAK" name="simpan"></td>
            </tr>
          </table>
          </form>
          </div>
</div>
</div>
</div>
</div>

