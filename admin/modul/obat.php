<?php
//if(empty($_SESSION['obatname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data obat </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=obat&act=view">obat</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?module=obat&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                <tr>
                <th>No.</th>
                <th>Kategori</th>
                <th>Kode Obat</th>
                <th>Jenis</th>
                <th>Nama Obat</th>
                <th>Kadaluarsa</th>
                <th>Keterangan</th>
                <th>Stok</th>
                <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                
                <?php              
				$result = mysqli_query($koneksi,"select * from obat");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                 <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['kode_obat']; ?></td>
                <td><?php echo $data['jenis']; ?></td>
                <td><?php echo $data['nama_obat']; ?></td>
                <td><?php echo tgl_indo($data['kadaluarsa']); ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php  if($data['stok']<=5){
                  ?> <p class="text-red"><?php echo $data['stok'] ?></p>  <?php
                }else{
                  ?> <p class="text-green"><?php echo $data['stok'] ?></p> <?php
                } ?></td>
                 
	  <td><center><a href="media.php?module=obat&act=edit&id_obat=<?php echo $data['id_obat']; ?>">
	  <button class="btn btn-primary">Edit</button> </a>
	  <a href="media.php?module=obat&act=delete&kode_obat=<?php echo $data['id_obat']; ?>">
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
		  
			 mysqli_query($koneksi,"INSERT INTO obat VALUES (null,'$_POST[kode]','$_POST[jenis]','$_POST[nama]','0',
        '$_POST[kadaluarsa]','$_POST[keterangan]','$_POST[kategori]','$_POST[stok]')");

                 ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Disimpan");
                    window.location.href="media.php?module=obat&act=view";
                </script>
            <?php
		 
                
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data obat</h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=masuk&act=view">Data obat</a></li>
            <li class="active"><a href="#">Tambah Data obat</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form staobat -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
				   <div class="form-group">
                      <label for="exampleInputEmail1">Kode obat</label>
                      <input type="text" class="form-control" id="nama" name="kode" placeholder="Kode obat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                      <select name="kategori" class="form-control" required="">
                        <option value="">-Pilih Jenis-</option>
                        <option>BPJS</option>
                        <option>Non BPJS</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama obat</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama obat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis</label>
                      <select name="jenis" class="form-control" required="">
                        <option value="">-Pilih Jenis-</option>
                        <option>Serbuk</option>
                        <option>Pulveres</option>
                        <option>Tablet</option>
                        <option>Pil</option>
                        <option>Kapsul</option>
                        <option>Kapsul Tablet</option>
                        <option>Larutan</option>
                        <option>Suspensi</option>
                      </select>
                    </div>
                   
                   <div class="form-group">
                      <label for="exampleInputEmail1">Kadaluarsa</label>
                      <input type="date" class="form-control" id="nama" name="kadaluarsa" placeholder="Kadaluarsa obat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="text" class="form-control" id="nama" name="keterangan" placeholder="Keterangan obat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Stok</label>
                      <input type="number" class="form-control" id="nama" name="stok" placeholder="Stok obat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   
                    
                  
                   
                   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol obat Bawah -->

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
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `obat` WHERE id_obat='$_GET[id_obat]'"));
            if (isset($_POST['update'])) {

                mysqli_query($koneksi,"UPDATE obat SET 
                  nama_obat='$_POST[obat]',kode_obat='$_POST[kode]',kategori='$_POST[kategori]',stok='$_POST[stok]',
                  jenis='$_POST[jenis]',harga='$_POST[harga]',kadaluarsa='$_POST[kadaluarsa]',
                  keterangan='$_POST[keterangan]' WHERE id_obat='$_GET[id_obat]'");
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Diubah");
                    window.location.href="media.php?module=obat&act=view";
                </script>
            <?php
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data obat </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=obat&act=view">Data obat</a></li>
            <li class="active">Update Data obat</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form staobat -->
                <form role="form" method = "POST" action="">
                 <div class="form-group">
                      <label for="exampleInputEmail1">Nama obat</label>
                      <input type="text" class="form-control" id="nama" name="obat" value="<?php echo $d['nama_obat'] ?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                      <select name="kategori" class="form-control" required="">
                        <option>-<?php echo $d['kategori'] ?>-</option>
                        <option>BPJS</option>
                        <option>Non BPJS</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode obat</label>
                      <input type="text" class="form-control" id="nama" value="<?php echo $d['kode_obat'] ?>" name="kode" placeholder="Kode obat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis</label>
                      <select name="jenis" class="form-control" required="">
                        <option value="<?php echo $d['jenis'] ?>">-<?php echo $d['jenis'] ?>-</option>
                        <option>Serbuk</option>
                        <option>Pulveres</option>
                        <option>Tablet</option>
                        <option>Pil</option>
                        <option>Kapsul</option>
                        <option>Kapsul Tablet</option>
                        <option>Larutan</option>
                        <option>Suspensi</option>
                      </select>
                    </div>
                   
                   <div class="form-group">
                      <label for="exampleInputEmail1">Kadaluarsa</label>
                      <input type="date" class="form-control" id="nama" name="kadaluarsa" placeholder="Kadaluarsa obat" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['kadaluarsa'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="text" class="form-control" id="nama" name="keterangan" placeholder="Keterangan obat" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['keterangan'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Stok</label>
                      <input type="number" class="form-control" name="stok" placeholder="Stok obat" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['stok'] ?>">
                    </div>
                    



              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol obat Bawah -->

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

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysqli_query($koneksi,"DELETE FROM obat WHERE id_obat='$_GET[kode_obat]'");
      echo "<script>window.location='media.php?module=obat&act=view'</script>";
      break;

    }
    ?>