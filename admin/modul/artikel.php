<?php
//if(empty($_SESSION['artikelname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Informasi Artikel Kesehatan</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=artikel&act=view">Informasi Artikel Kesehatan</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?module=artikel&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
						<th>Kategori</th>
                        <th>Tanggal</th>
						<th>Slider</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM `artikel`,`kategori` where artikel.id_kategori=kategori.id_kategori and artikel.status!='waiting' order by artikel.id_artikel desc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo $no++ ;?></td>
                        <td><?php echo "$r[judul]"?></td>
						<td><?php echo "$r[nama_kategori]"?></td>
                        <td><?php echo "$r[tanggal]"?></td>
						<td><?php echo "$r[slider]"?></td>
                        <td><img src="../img/<?php echo $r['gambar'] ?>" width="75"></td>
                        <td><?php echo $r['status'] ?></td>
    
                       
                        <td><a href="?module=artikel&act=edit&id=<?php echo $r['id_artikel']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?module=artikel&act=delete&id=<?php echo $r['id_artikel']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y H:i:s');

        $sumber = @$_FILES['gambar']['tmp_name'];
        $target ='../img/';
        $nama_gambar = @$_FILES['gambar']['name'];

        $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
          if ($pindah)
          {
                $query = mysqli_query($koneksi,"INSERT INTO artikel VALUES (null,'$_POST[judul]',
				'$_POST[kategori]','$tanggal',
                  '$_POST[isi]','$_POST[slider]','$nama_gambar','$_POST[status]')");
                 ?> 
                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan");
                    window.location.href="media.php?module=artikel&act=view";
                </script>
            <?php
          }else{
            ?> 
                <script type="text/javascript">
                    alert ("Eror");
                    window.location.href="media.php?module=artikel&act=add";
                </script>
            <?php
          }
      }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Informasi Kesehatan </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=masuk&act=view">Data Informasi Kesehatan</a></li>
            <li class="active"><a href="#">Tambah Data Informasi Kesehatan</a></li>
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
                <form role="form" method ="POST" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul Artikel</label>
                      <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul artikel" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                      <select name="kategori" class="form-control">
						<option value="">-Pilih kategori-</option>
						<?php 
						$sq = mysqli_query($koneksi,"select * from kategori");
						while($da = mysqli_fetch_array($sq)){
							?> <option value="<?php echo $da['id_kategori'] ?>"><?php echo $da['nama_kategori'] ?></option> <?php
						}
						?>
					  </select>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Isi Artikel</label>
                      <textarea name="isi" id="text-ckeditor" class="form-control m-b" placeholder="Soal" rows="3"></textarea>
			<script>CKEDITOR.replace('text-ckeditor');</script>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <input type="file" name="gambar">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Slider</label><br>
                      <input type="radio" name="slider" value="Y">Aktif
                      <input type="radio"  name="slider" value="N">Tidak
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label><br>
                      <input type="radio" name="status" value="Share">Share
                      <input type="radio"  name="status" value="Arsip">Non aktif
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
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `artikel` WHERE  id_artikel='$_GET[id]'"));
            if (isset($_POST['update'])) 
            {
              if ($nama_gambar=='') 
              {
                mysqli_query($koneksi,"UPDATE artikel SET judul='$_POST[judul]',isi='$_POST[isi]',slider='$_POST[slider]',
                  status='$_POST[status]' WHERE id_artikel='$_GET[id]'");
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Diubah");
                    window.location.href="media.php?module=artikel&act=view";
                </script>
                <?php
              }else
              {
                 
                 $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
                  if ($pindah)
                  
                  {
                    mysqli_query($koneksi,"UPDATE artikel SET judul='$_POST[judul]',isi='$_POST[isi]'
					,slider='$_POST[slider]',gambar='$nama_gambar',status='$_POST[status]' WHERE id_artikel='$_GET[id]'");
                    ?> 
                    <script type="text/javascript">
                        
                        alert ("Data Berhasil Diubah");
                        window.location.href="media.php?module=artikel&act=view";
                    </script>
                    <?php
                  }
              }
                
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Edit Data Informasi Kesehatan </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=artikel&act=view">Data artikel</a></li>
            <li class="active">Update Data Informasi Kesehatan</li>
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
                      <label for="exampleInputEmail1">Judul Artikel</label>
                      <input type="text" class="form-control" id="judul" value="<?php echo $d['judul'] ?>" name="judul" placeholder="Judul artikel" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Isi Artikel</label>
                      <textarea name="isi" id="text-ckeditor" class="form-control m-b" placeholder="Soal" rows="3"><?php echo $d['isi'] ?></textarea>
			<script>CKEDITOR.replace('text-ckeditor');</script>
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
      mysqli_query($koneksi,"DELETE FROM artikel WHERE id_artikel='$_GET[id]'");
      echo "<script>window.location='media.php?module=artikel&act=view'</script>";
      break;

    }
    ?>