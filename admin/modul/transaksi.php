<?php
//if(empty($_SESSION['transaksiname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <?php 
          if($_SESSION['leveluser']=='apoteker'){
            ?> 
             <h1> Data Resep Obat </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=transaksi&act=view">Data Resep Dokter</a></li>
             </ol>
        </section>
             <?php
          }else{
            ?>  
             <h1> Data Transaksi </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=transaksi&act=view">transaksi</a></li>
             </ol>
        </section>
            <?php
          }
           ?>
       

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
   
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
                  <th>Tanggal Rekam Medis</th>
                  <th>Nama Dokter</th>
                  <th>Diagnosa</th>
                  <th>Keterangan</th>
                  <th>Resep</th>
                   <?php 
          if($_SESSION['leveluser']=='apoteker'){
            ?> 
            <th>Keterangan</th>
             <?php
          }else{
            ?>  
            <th>Transaksi</th>
            <?php
          }?>
                  
                </tr>
              </thead>
              <tbody>
                <?php 
                $sql = mysqli_query($koneksi,"select * from tb_rekmed,tb_unitmedis where tb_rekmed.id_unitmedis=tb_unitmedis.id_unitmedis order by tb_rekmed.no_rekmed desc");
                $da = mysqli_num_rows($sql);
                $no = 1;
                if($da=='0'){
                  ?> 
                  <tr>
                    <td colspan="6"><center>Belum ada Rekam medis dari pasien</center></td>
                  </tr>
                  <?php
                }else{
                  while($data = mysqli_fetch_array($sql)){
                  ?> 
                  <tr>
                    <td><?php echo $no++ ?>.</td>
                    <td><?php echo $data['no_rekmed'] ?></td>
                    <td><?php echo $data['tanggal'] ?></td>
                    <td><?php echo $data['nama_unitmedis'] ?></td>
                    <td><?php echo $data['diagnosa1'] ?></td>
                    <td><?php echo $data['keterangan'] ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#obat<?php echo $data['no_rekmed'] ?>"><button class="btn btn-success"><i class="fa fa-eye"></i></button></a>

<!-- Modal -->
<div class="modal fade" id="obat<?php echo $data['no_rekmed'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Resep Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table class="table">
                    <thead>
                <tr>
                <th>No.</th>
                <th>Kode Obat</th>
                <th>Jenis</th>
                <th>Nama Obat</th>
                <th>Dosis</th>
                </tr>
              </thead>
              <tbody>
                
                <?php              
        $r = mysqli_query($koneksi,"select * from obat,resep where obat.id_obat=resep.id_obat and resep.no_rekmed='$data[no_rekmed]'");
                $n = 1;
                while ($d = mysqli_fetch_array($r)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $d['kode_obat']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <td><?php echo $d['nama_obat']; ?></td>
                <td><?php echo $d['dosis']; ?></td>
                 
    
  
               </tr>
      <?php
                                $n++;
                }
                ?>
                </tbody>
                
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                    </td>



                     <?php 
          if($_SESSION['leveluser']=='apoteker'){
            ?> 
            <td>
                <?php 
                $dek = mysqli_query($koneksi,"select * from resep_diambil where kode_rekmed='$data[no_rekmed]'");
                $apa = mysqli_num_rows($dek);
                if($apa!='1'){
                  ?> 
                   <a href="media.php?module=transaksi&act=diambil&id=<?php echo $data['no_rekmed'] ?>"><button class="btn btn-success"><i class="fa fa-check"></i> Sudah diambil</button></a>
                   <?php
                }else{
                  ?> Sudah diambil <?php
                }
               ?>
            </td>
             <?php
          }else{
            ?>  
             <td> 
                      <?php 
                      if($data['status']=='Belum'){
                        ?> 
                        <a href="#" data-toggle="modal" data-target="#rekmed<?php echo $data['no_rekmed'] ?>"><button class="btn btn-primary"><i class="fa fa-dollar"></i> Bayar</button></a>




                        <!-- Modal -->
<div class="modal fade" id="rekmed<?php echo $data['no_rekmed'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Resep Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="media.php?module=transaksi&act=bayar&id=<?php echo $data['no_rekmed'] ?>" method="get">
        <input type="hidden" name="module" value="transaksi">
        <input type="hidden" name="act" value="bayar">
        <input type="hidden" name="id" value="<?php echo $data['no_rekmed'] ?>">
      <div class="modal-body">
        <table class="table">
                    <thead>
                <tr>
                <th>No.</th>
                <th>Kode Obat</th>
                <th>Jenis</th>
                <th>Nama Obat</th>
                <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                
                <?php              
        $ra = mysqli_query($koneksi,"select * from obat,resep where obat.id_obat=resep.id_obat 
          and resep.no_rekmed='$data[no_rekmed]'");
                $n = 1;
                while ($dd = mysqli_fetch_array($ra)) {
                ?>
            <tr>
                <td><?php echo $n++; ?></td>
                <td><?php echo $dd['kode_obat']; ?></td>
                <td><?php echo $dd['jenis']; ?></td>
                <td><?php echo $dd['nama_obat']; ?></td>
                <td><?php echo number_format($dd['harga']) ?></td>
                 
    
  
               </tr>
      <?php
                                $total_obat += $dd['harga'];

                }
                ?>
                </tbody>



                <tr>
                  <th colspan="4"><center>Total Biaya Obat</center></th>
                  <th><center><?php echo number_format($total_obat) ?></center></th>
                </tr>
                 <?php 
    $ss = mysqli_query($koneksi,"select * from tb_rekmed where no_rekmed='$data[no_rekmed]'");
    $rs = mysqli_fetch_array($ss);
  ?>
                <tr>
                  <th colspan="4"><center>Biaya Pemeriksaan</center></th>
                  <th>
                    <input type="text" name="biaya" class="form-control" placeholder="Biaya Pemeriksaan">
                  </th>
                </tr>

               
              </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Cetak Total Pembayaran</button>
      </div>
    </form>
    </div>
  </div>
</div>







                         <?php
                      }
                      else if($data['status']=='total'){
                        ?> 
                        <a target="_blank" href="cetak_rekmed.php?id=<?php echo $data['no_rekmed'] ?>"><button class="btn btn-primary"><i class="fa fa-print"></i></button></a>
                        <a href="media.php?module=transaksi&act=lunas&id=<?php echo $data['no_rekmed'] ?>"><button class="btn btn-success"><i class="fa fa-check"></i> Lunas</button></a>
                         <?php
                      }
                      else{
                        ?> 
                        <a target="_blank" href="cetak_rekmed.php?id=<?php echo $data['no_rekmed'] ?>"><button class="btn btn-primary"><i class="fa fa-print"></i></button></a>
                         <?php
                        echo $data['status'];
                      }
                       ?>
                      
                      
                      
                    </td>
            <?php
          }?>
                   
                  </tr>
                  <?php
                }
                
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
		  
			 mysqli_query($koneksi,"INSERT INTO transaksi VALUES (null,'$_POST[kode]','$_POST[jenis]','$_POST[nama]','$_POST[harga]','$_POST[kadaluarsa]')");

                 ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Disimpan");
                    window.location.href="media.php?module=transaksi&act=view";
                </script>
            <?php
		 
                
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data transaksi</h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=masuk&act=view">Data transaksi</a></li>
            <li class="active"><a href="#">Tambah Data transaksi</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form statransaksi -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
				   <div class="form-group">
                      <label for="exampleInputEmail1">Kode transaksi</label>
                      <input type="text" class="form-control" id="nama" name="kode" placeholder="Kode transaksi" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama transaksi</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama transaksi" required data-fv-notempty-message="Tidak boleh kosong">
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
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="number" class="form-control" id="nama" name="harga" placeholder="Harga transaksi" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Kadaluarsa</label>
                      <input type="date" class="form-control" id="nama" name="kadaluarsa" placeholder="Kadaluarsa transaksi" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   
                    
                  
                   
                   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol transaksi Bawah -->

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
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `transaksi` WHERE id_transaksi='$_GET[id_transaksi]'"));
            if (isset($_POST['update'])) {

                mysqli_query($koneksi,"UPDATE transaksi SET 
                  nama_transaksi='$_POST[nama]',kode='$_POST[kode]',
                  jenis='$_POST[jenis]',harga='$_POST[harga]','$_POST[kadaluarsa]' WHERE id_transaksi='$_GET[id_transaksi]'");
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Diubah");
                    window.location.href="media.php?module=transaksi&act=view";
                </script>
            <?php
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data transaksi </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=transaksi&act=view">Data transaksi</a></li>
            <li class="active">Update Data transaksi</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form statransaksi -->
                <form role="form" method = "POST" action="">
                 <div class="form-group">
                      <label for="exampleInputEmail1">Nama transaksi</label>
                      <input type="text" class="form-control" id="nama" name="transaksi" value="<?php echo $d['nama_transaksi'] ?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode transaksi</label>
                      <input type="text" class="form-control" id="nama" value="<?php echo $d['kode_transaksi'] ?>" name="kode" placeholder="Kode transaksi" required data-fv-notempty-message="Tidak boleh kosong">
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
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="number" class="form-control" id="nama" name="harga" placeholder="Harga transaksi" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['harga'] ?>">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Kadaluarsa</label>
                      <input type="date" class="form-control" id="nama" name="kadaluarsa" placeholder="Kadaluarsa transaksi" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['kadaluarsa'] ?>">
                    </div>
                    



              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol transaksi Bawah -->

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
      mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_transaksi='$_GET[kode_transaksi]'");
      echo "<script>window.location='media.php?module=transaksi&act=view'</script>";
      break;

      case 'bayar':
      mysqli_query($koneksi,"update tb_rekmed set status='total',biaya='$_GET[biaya]' where no_rekmed='$_GET[id]'");
      echo "<script>window.location='media.php?module=transaksi&act=view'</script>";
      break;
      case 'lunas':
      mysqli_query($koneksi,"update tb_rekmed set status='Lunas' where no_rekmed='$_GET[id]'");
      echo "<script>window.location='media.php?module=transaksi&act=view'</script>";
      break;

      case 'diambil':
      mysqli_query($koneksi,"insert into resep_diambil value(null,'$_GET[id]')");
      echo "<script>window.location='media.php?module=transaksi&act=view'</script>";
      break;

    }
    ?>