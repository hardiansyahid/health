<?php
include"inc/mod_laporan/fungsi_combobox.php ";
include"inc/mod_laporan/fungsi_indotgl.php ";
include"inc/mod_laporan/library.php";
   
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Laporan Pengeluaran Obat </h1>
            <ol class="breadcrumb">
            <li><a href="?module=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=kategori">Laporan Pengeluaran Obat</a></li>
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
          <form method=GET action='laporan_obat.php' target='_blank'>
          <table class="table">
		 
            <tr>
              <td>Dari Tanggal</td>
              <td>:</td>
              <td><input type="date" name="dari" class="form-control"></td>
            </tr>
            <tr>
              <td>Sampai Tanggal</td>
              <td>:</td>
              <td><input type="date" name="sampai" class="form-control"></td>
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

