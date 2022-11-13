<?php
//if(empty($_SESSION['poliname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Poli </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=poli&act=view">poli</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?module=poli&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode</th>
                          <th>Nama Poli</th>
                          <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                <tbody>  
                <?php              
				$result = mysqli_query($koneksi,"select * from tb_poli");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['kode']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
                 
	  <td><center><a href="media.php?module=poli&act=edit&id_poli=<?php echo $data['id_poli']; ?>">
	  <button class="btn btn-primary">Edit</button> </a>
	  <a href="media.php?module=poli&act=delete&kode_poli=<?php echo $data['id_poli']; ?>">
	  <button class="btn btn-danger">Hapus</button> </a></center></td>
               </tr>
			<?php
                                $no++;
                }
                ?>
                </tbody>
                
                </table>
                  </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
	</div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

      <?php
      break;
      // PROSES TAMBAH DATA kasmasuk //
      case 'add':
      if (isset($_POST['add'])) {
		  
			 mysqli_query($koneksi,"INSERT INTO tb_poli VALUES (null,'$_POST[kode]','$_POST[poli]')");

                 ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Disimpan");
                    window.location.href="media.php?module=poli&act=view";
                </script>
            <?php
		 
                
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data poli</h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=masuk&act=view">Data poli</a></li>
            <li class="active"><a href="#">Tambah Data poli</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form stapoli -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode</label>
                      <input type="text" class="form-control" id="nama" maxlength="2" name="kode" placeholder="Kode poli" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
				   <div class="form-group">
                      <label for="exampleInputEmail1">Nama poli</label>
                      <input type="text" class="form-control" id="nama" name="poli" placeholder="Nama poli" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   
                   
                    
                  
                   
                   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol poli Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-primary">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA kasmasuk //
      case 'edit':
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `tb_poli` WHERE id_poli='$_GET[id_poli]'"));
            if (isset($_POST['update'])) {

                mysqli_query($koneksi,"UPDATE tb_poli SET kode='$_POST[kode]',nama_poli='$_POST[poli]' WHERE id_poli='$_GET[id_poli]'");
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Diubah");
                    window.location.href="media.php?module=poli&act=view";
                </script>
            <?php
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Edit Data poli </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=poli&act=view">Data poli</a></li>
            <li class="active">Update Data poli</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form stapoli -->
                <form role="form" method = "POST" action="">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Kode</label>
                      <input type="text" class="form-control" id="nama" maxlength="2" name="kode" placeholder="Kode poli" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['kode'] ?>">
                    </div>
                 <div class="form-group">
                      <label for="exampleInputEmail1">Nama poli</label>
                      <input type="text" class="form-control" id="nama" name="poli" value="<?php echo $d['nama_poli'] ?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    



              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol poli Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-primary">Update</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


    <?php
    break;
    $mysqli = $koneksi;
    // PROSES HAPUS DATA POLI //
      case 'delete':

      //hapus jadwal dan detail jadwal
      $jadwalDokter = mysqli_query($koneksi, "select * from jadwal_dokter where id_poli='$_GET[kode_poli]'");
      $existJadwalDokter = mysqli_num_rows($jadwalDokter);
      $dataJadwalDokter = mysqli_fetch_array($jadwalDokter);
      if ($existJadwalDokter > 0){
          $idJadwal = $dataJadwalDokter['id_jadwal'];
          mysqli_query($koneksi, "DELETE FROM detail_jadwal where id_jadwal='$idJadwal'");
          mysqli_query($koneksi,"DELETE FROM jadwal_dokter WHERE id_poli='$_GET[kode_poli]'");
      }

      //hapus tb_unitmedis
      $queryUnitMedis = mysqli_query($koneksi, "select * from tb_unitmedis where id_poli='$_GET[kode_poli]'");
      $existUnitMedis = mysqli_num_rows($queryUnitMedis);
      $unitMedis = mysqli_fetch_array($queryUnitMedis);
      if ($existUnitMedis > 0){
          mysqli_query($koneksi,"DELETE FROM jadwal_dokter WHERE id_unitmedis='$unitMedis[id_unitmedis]'");
          mysqli_query($koneksi, "DELETE FROM tb_unitmedis where id_poli='$_GET[kode_poli]'");
      }
      //hapus pegawai
      mysqli_query($koneksi,"DELETE FROM tb_pegawai WHERE id_poli='$_GET[kode_poli]'");

      //hapus poli
      mysqli_query($koneksi,"DELETE FROM tb_poli WHERE id_poli='$_GET[kode_poli]'");

      echo "<script>window.location='media.php?module=poli&act=view'</script>";
      break;

    }
    ?>