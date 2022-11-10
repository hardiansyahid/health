<?php
//if(empty($_SESSION['jadwalname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Jadwal Praktik Dokter</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=jadwal&act=view">Data jadwal</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?module=jadwal&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
						<th>Keadaan</th>
                        <th>Hari</th>
						<th>Jam</th>
                        <th>Poli</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM `jadwal_dokter`,`detail_jadwal`,`tb_poli`,`tb_unitmedis`
					where tb_poli.id_poli=tb_unitmedis.id_poli and jadwal_dokter.id_unitmedis=tb_unitmedis.id_unitmedis and jadwal_dokter.id_jadwal=detail_jadwal.id_jadwal order by jadwal_dokter.id_jadwal desc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo $no++ ;?></td>
                        <td><?php echo "$r[nama_unitmedis]"?></td>
						<td><?php echo "$r[keadaan]"?></td>
                        <td><?php echo "$r[hari]"?></td>
						<td><?php echo "$r[jam]"?></td>
                        <td><?php echo $r['nama_poli'] ?></td>
    
                       
                         <td><a href="?module=jadwal&act=delete&id=<?php echo $r['id_detail']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>

                    <?php
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
      if (isset($_POST['add'])) 
      {
        
                mysqli_query($koneksi,"INSERT INTO jadwal_dokter VALUES (null,'$_POST[keadaan]',
				'$_POST[jam]',
                  '$_POST[dokter]','$_POST[poli]')");
				  $id = mysqli_insert_id($koneksi);
				  foreach($_POST['hari'] as $hari){
					  mysqli_query($koneksi,"insert into detail_jadwal values(null,'$id','$hari')");
				  }
                 ?> 
                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan");
                    window.location.href="media.php?module=jadwal&act=view";
                </script>
            <?php
          
      }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data jadwal </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=masuk&act=view">Data jadwal</a></li>
            <li class="active"><a href="#">Tambah Data jadwal</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
	
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" name='form1' method ="POST" action="" id="form-combo">
                  <div class="box-body">
                    
					<div class="form-group">
                      <label for="exampleInputEmail1">Spesialis</label>
                      <select name="poli" onchange='showKab()' class="form-control">
						<option value="">-Pilih spesialis-</option>
						<?php 
						$sq = mysqli_query($koneksi,"select * from tb_poli");
						while($da = mysqli_fetch_array($sq)){
							?> <option value="<?php echo $da['id_poli'] ?>"><?php echo $da['nama_poli'] ?></option> <?php
						}
						?>
					  </select>
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Nama Dokter</label>
					  <select name="dokter" id="pelang" class="form-control">
					  <option value="">Pilih dokter untuk menjadi spesialis</option>
						
						</select>
					  </div>
                   
					<div class="form-group">
                      <label for="exampleInputEmail1">Keadaan</label><br>
                      <input type="radio" name="keadaan" value="Pagi">Pagi
                      <input type="radio" name="keadaan" value="Siang">Siang
					  <input type="radio" name="keadaan" value="Sore">Sore
					  <input type="radio" name="keadaan" value="Malam">Malam
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Hari</label><br>
                      <input type="checkbox" name="hari[]" value="Senin">Senin<br>
                      <input type="checkbox" name="hari[]" value="Selasa">Selasa<br>
					  <input type="checkbox" name="hari[]" value="Rabu">Rabu<br>
					  <input type="checkbox" name="hari[]" value="Kamis">Kamis<br>
					  <input type="checkbox" name="hari[]" value="Jumat">Jumat<br>
					  <input type="checkbox" name="hari[]" value="Sabtu">Sabtu<br>
					  <input type="checkbox" name="hari[]" value="Minggu">Minggu
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Jam</label>
                      <input type="text" class="form-control" id="judul" name="jam" placeholder="Jam Praktik" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

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
      $sumber = @$_FILES['gambar']['tmp_name'];
                 $target ='../img/';
                 $nama_gambar = @$_FILES['gambar']['name'];
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `jadwal` WHERE  id_jadwal='$_GET[id]'"));
            if (isset($_POST['update'])) 
            {
              if ($nama_gambar=='') 
              {
                mysqli_query($koneksi,"UPDATE jadwal SET judul='$_POST[judul]',isi='$_POST[isi]',slider='$_POST[slider]',
                  status='$_POST[status]' WHERE id_jadwal='$_GET[id]'");
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Diubah");
                    window.location.href="media.php?module=jadwal&act=view";
                </script>
                <?php
              }else
              {
                 
                 $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
                  if ($pindah)
                  
                  {
                    mysqli_query($koneksi,"UPDATE jadwal SET judul='$_POST[judul]',isi='$_POST[isi]'
					,slider='$_POST[slider]',gambar='$nama_gambar',status='$_POST[status]' WHERE id_jadwal='$_GET[id]'");
                    ?> 
                    <script type="text/javascript">
                        
                        alert ("Data Berhasil Diubah");
                        window.location.href="media.php?module=jadwal&act=view";
                    </script>
                    <?php
                  }
              }
                
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data jadwal </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=jadwal&act=view">Data jadwal</a></li>
            <li class="active">Update Data jadwal</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="" enctype="multipart/form-data">
                 <div class="box-body">
                    <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul jadwal</label>
                      <input type="text" class="form-control" id="judul" value="<?php echo $d['judul'] ?>" name="judul" placeholder="Judul jadwal" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Isi jadwal</label>
                      <textarea name="isi" class="form-control"><?php echo $d['isi'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <input type="file" name="gambar"><img src="../img/<?php echo $d['gambar'] ?>" width="50">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Slider</label><br>
                      <input type="radio" name="slider" value="Y" <?php if ($d['slider']=='Y'){echo"checked";}else{}?>>Aktif
                      <input type="radio"  name="slider" value="N" <?php if ($d['slider']=='N'){echo"checked";}else{}?>>Tidak
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label><br>
                      <input type="radio" name="status" value="Share" <?php if ($d['status']=='Share'){echo"checked";}else{}?>>Share
                      <input type="radio"  name="status" value="Arsip" <?php if ($d['status']=='Arsip'){echo"checked";}else{}?>>Non aktif
                    </div>
                   
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->



              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

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
      mysqli_query($koneksi,"DELETE FROM detail_jadwal WHERE id_detail='$_GET[id]'");
      echo "<script>window.location='media.php?module=jadwal&act=view'</script>";
      break;

    }
    ?>