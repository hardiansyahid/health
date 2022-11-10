<?php
include"inc/mod_laporan/fungsi_combobox.php ";
include"inc/mod_laporan/fungsi_indotgl.php ";
include"inc/mod_laporan/library.php";
   
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Laporan Pasien </h1>
            <ol class="breadcrumb">
            <li><a href="?module=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=kategori">Laporan Pasien</a></li>
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
          <form method=GET action='cetak_pasien.php' target='_blank'>
          <table class="table">
		 
            <tr>
              <td>Jenis</td>
              <td>:</td>
              <td>
                  <select name="jenis" class="form-control" required>
                      <option>BPJS</option>
                      <option>Non BPJS</option>
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

