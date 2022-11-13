<?php
//if(empty($_SESSION['pasienname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data pasien </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=pasien&act=view">pasien</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?module=pasien&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
     
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                  	<thead>
                <tr>
                <th>No.</th>
				<th>Kd. Pasien</th>
				<th style="width:180px">NIK</th>
                <th style="width:180px">Nama</th>
                
                <th style="width:130px">Usia</th>
				<th style="width:70px">Kelamin</th>
				<th style="width:70px">No. Telp</th>
				<th style="width:70px">Email</th>
				<th style="width:70px">Berat Badan</th>
				 
	 	<th style="width:200px">Aksi</th>			      				
		
                
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                       
                
$result = mysqli_query($koneksi,"select * from tb_pasien order by kode_pasien desc");
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['kode_pasien']; ?></td>
				<td><?php echo $data['nik']; ?></td>
                <td><?php echo $data['nama_pasien']; ?></td>
                
				
                <td>
                    
                    
                    <?php
// tanggal lahir
$tanggal = new DateTime($data['tanggal_lahir']);

// tanggal hari ini
$today = new DateTime('today');

// tahun
$y = $today->diff($tanggal)->y;

// bulan
$m = $today->diff($tanggal)->m;

// hari
$d = $today->diff($tanggal)->d;
echo " " . $y . " tahun ";
?>
                    
                    
                </td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['telpon']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['bb']; ?>kg</td>
			<td>
		
      <a href="?module=pasien&act=edit&id=<?php echo $data['kode_pasien']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i> Edit</button></a>

		 <a href="media.php?module=pasien&act=delete&kode_pasien=<?php echo $data['kode_pasien']; ?>">
		 <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a></center></td>
		
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
     
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data pasien</h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=masuk&act=view">Data pasien</a></li>
            <li class="active"><a href="#">Tambah Data pasien</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form stapasien -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
				  <table class="table">
				   <?php
/*pertama kita panggil colom yang akan kita gunakan untuk ID kita dengan menyaring nilai maksimum */
$sql ="SELECT MAX(RIGHT(kode_pasien,4)) AS terakhir FROM tb_pasien";
//mengecek hasil atau value yang dihasilkan dari query yang disimpan pada variable sql
  $hasil = mysqli_query($koneksi,$sql);
//memecah table hasil query
  $data = mysqli_fetch_array($hasil);
//mengambil cell atau 1 kotak bagian dari table yaitu cell id_anggota yang dialiaskan terakhir
  $lastID = $data['terakhir'];
  // baca nomor urut  id transaksi terakhir
 $lastNoUrut = (int) $lastID;
  // nomor urut ditambah 1
  $nextNoUrut = $lastNoUrut + 1;
  // membuat format nomor berikutnya
  $nextID = "PSN".sprintf("%04s",$nextNoUrut);
// selesai,,, untuk memanggil ID otomatis ini  bisa memasangkan cara
 ?>
 
 
 
 
		  <tr>
			<td width="120"><b>KODE PASIEN</b></td>
			<td><input name="kode_pasien" type="text" size="40" value="<?php echo  $nextID;?>"> <em><font color="red">Otomatis</font></em></td>
		  </tr>
		 
		  <tr>
			<td>NIK</td>
			<td><input name="nik" maxlength="16" onkeypress="return hanyaAngka(event)" type="text" size="40" class="form-control"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Nama Pasien</td>
			<td><input name="nama_pasien" type="text" size="40" class="form-control" required> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Username</td>
			<td><input name="username" type="text" size="40" class="form-control" required> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Password</td>
			<td><input name="password" maxlength="16" type="password" size="40" class="form-control" required> <em>harus diisi</em></td>
		  </tr>
		  
	
		  
		  <tr>
			<td>Tgl. Lahir</td>
			<td><input type="date" size="34" class="form-control" name="tanggal_lahir" title="dd-mm-yyyy"   />
		  <em>harus diisi</em></td>
		  </tr>

		<tr>
		<td>Jenis Kelamin</td>
		<td>
		<select name="jenis_kelamin" class="form-control" required>
		<option value="">-Pilih jenis kelamin-</option>
		<option>Laki-laki</option>
		<option>Perempuan</option>
		</select> <em>harus diisi</em>
		</td>
		</tr>
		
		<tr>
		<td>Pekerjaan</td>
		<td><input name="pekerjaan" type="text" class="form-control" required> <em>harus diisi</em></td>
		</tr>
		
		<tr>
		<td>Alamat</td>
		<td><input name="alamat" type="text" class="form-control" required> <em>harus diisi</em></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><input name="telpon" onkeypress="return hanyaAngka(event)" maxlength="12" type="text" class="form-control" required> <em>harus diisi</em></td>
		</tr>
		<tr>
		<td>Email</td>
		<td><input name="email" type="email" class="form-control" required> <em>harus diisi</em></td>
		</tr>
			<tr>
		<td>Berat badan</td>
		<td><input name="bb" type="number" class="form-control" placeholder="Cm..."required> <em>harus diisi</em></td>
		</tr>
		
		
				  		  <?php
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
?>
<input name="tanggal" type="hidden" size="40" value="<?php echo $tglsekarang;?>">

			  <tr>
			<td></td>
			<td><input name="simpan" type="submit" value="Simpan"> <input name="batal" type="reset" onClick="location.href='media.php?module=pasien&act=view';"value="Batal"></td>
		  </tr>
		</table>
                   
         <?php
//include "koneksi.php";
/* memanggil variable dan nilai – nilai nya .*/
if(isset($_POST['simpan'])){
$kode_pasien = $_POST['kode_pasien'];
$nik = $_POST['nik'];
$nama_pasien = $_POST['nama_pasien']; 
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$tanggal = date('Y-m-d');
$no_bpjs = $_POST['no_bpjs'];
$pass = md5($_POST['password']);
$password = $_POST['password'];
$email = $_POST['email'];
$bb = $_POST['bb'];


		//memasukkan nilai nilai ke dalam table

mysqli_query($koneksi,"insert into tb_pasien values ('$kode_pasien','$nama_pasien','$_POST[username]','$nik','$tanggal_lahir','$jenis_kelamin',
'$pekerjaan','$alamat','$telpon','$email','$bb','$tanggal')");
mysqli_query($koneksi,"insert into user values(null,'$_POST[username]','$pass','pasien')");

echo"<script>window.alert('Data Sudah Tersimpan')
window.location='media.php?module=pasien&act=view'</script>";


}
?>          
                    
                  
                   
                   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol pasien Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

           
                  
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
	  $kode_pasien = $_GET['id'];
$result = mysqli_query($koneksi,"select * from tb_pasien where kode_pasien='$kode_pasien'");
$data = mysqli_fetch_array($result);
            if (isset($_POST['update'])) {

                $kode_pasien = $_POST['kode_pasien'];
$nama_pasien = $_POST['nama_pasien']; 
$tanggal_lahir = $_POST['tanggal_lahir'];
//$dusun = $_POST['dusun'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];

//memasukkan nilai nilai ke dalam table

$ubah = mysqli_query($koneksi,"UPDATE tb_pasien SET nik='$_POST[nik]',
											  nama_pasien='$_POST[nama_pasien]',
                  							  tanggal_lahir='$_POST[tanggal_lahir]',
                  							  jenis_kelamin='$_POST[jenis_kelamin]',
                  							  pekerjaan='$_POST[pekerjaan]', 
                  							  alamat='$_POST[alamat]',
                  							  telpon='$_POST[telpon]',
                  							  bb='$_POST[bb]',
                  							  email='$_POST[email]' where kode_pasien = '$kode_pasien'");

echo"<script>window.alert('Data Sudah Tersimpan')
window.location='media.php?module=pasien&act=view'</script>";
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data pasien </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=pasien&act=view">Data pasien</a></li>
            <li class="active">Update Data pasien</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form stapasien -->
               <form name="form1" method="post" action="">
				

		
		
		
		

		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td width="120"><b>KODE PASIEN</b></td>
			<td><input name="kode_pasien" type="text" class="form-control" size="40" value="<?php echo $data['kode_pasien']; ?>"> <em>harus diisi</em></td>
		  </tr>
		   <tr>
			<td>NIK</td>
			<td><input type="text" name="nik" value="<?php echo $data['nik']; ?>" class="form-control"></td>
		  </tr>
		  <tr>
			<td>Nama Pasien</td>
			<td><input type="text" name="nama_pasien" value="<?php echo $data['nama_pasien']; ?>" class="form-control"></td>
		  </tr>
		
		  <tr>
			<td>Tgl. Lahir</td>
			<td><input type="text" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" class="form-control"></td>
		  </tr>
		  
		<tr>
		<td>Jenis Kelamin</td>
		<td>
		<input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($data['jenis_kelamin']=='Laki-laki'){echo"checked";}else{} ?>> Laki-laki
		<input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin']=='Perempuan'){echo"checked";}else{} ?>> Perempuan
		</td>
		</tr>
		
		<tr>
		<td>Pekerjaan</td>
		<td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>Alamat</td>
		<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><input type="text" name="telpon" value="<?php echo $data['telpon']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>Email</td>
		<td><input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>Berat Badan</td>
		<td><input type="number" name="bb" value="<?php echo $data['bb']; ?>" class="form-control"></td>
		</tr>
		
			  <tr>
			<td></td>
			<td><input name="update" type="submit" value="Simpan"> <input name="batal" type="reset" onClick="location.href='media.php?module=pasien&act=view';"value="Batal"></td>
		  </tr>
		</table>
		
		</form>
		
		</div>
		</td>
		</tr>
</table>
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
      mysqli_query($koneksi,"DELETE FROM tb_kunjungan WHERE kode_pasien='$_GET[kode_pasien]'");
      mysqli_query($koneksi,"DELETE FROM tb_pasien WHERE kode_pasien='$_GET[kode_pasien]'");
      echo "<script>window.location='media.php?module=pasien&act=view'</script>";
      break;

    }
    ?>