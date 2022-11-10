<?php
//if(empty($_SESSION['perawatname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data pegawai</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=perawat&act=view">Data pegawai</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?module=perawat&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                  	<thead>
                <tr>
                <th>No.</th>
				<th>Kd. Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Bagian</th>
                <th>Usia</th>
				<th>Alamat</th>
				<th>No. Telp</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $no = 1;
                
                 function hitung_umur($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y." Tahun";
}
                
                
                
$result = mysqli_query($koneksi,"select * from tb_pegawai,tb_poli where tb_pegawai.id_poli=tb_poli.id_poli");
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['kode_pegawai']; ?></td>
                <td><?php echo $data['nama_pegawai']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
				<td><?php 
                    
                    
                  

echo hitung_umur($data['tanggal_lahir']);
                
                
                ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['telpon']; ?></td>
                <td><center><a href="media.php?module=perawat&act=edit&kode_pegawai=<?php echo $data['kode_pegawai']; ?>"><button>edit</button></a>
				| <a href="?module=perawat&act=hapus&kode_pegawai=<?php echo $data['kode_pegawai']; ?>"><button>Hapus</button></a></center></td>
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
      if (isset($_POST['add'])) 
      {
        $kode_pegawai = $_POST['kode_pegawai'];
$nama_pegawai = $_POST['nama_pegawai']; 
$nama_bagian = $_POST['nama_bagian']; 
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$pass = md5($_POST['password']);


//memasukkan nilai nilai ke dalam table
mysqli_query($koneksi,"insert into tb_pegawai values ('$kode_pegawai','$nama_pegawai','$_POST[username]','$_POST[poli]','$tanggal_lahir','$alamat','$telpon')");
mysqli_query($koneksi,"insert into user values (NULL,'$_POST[username]','$pass','perawat')");
//$simpon = mysqli_query("insert into t_keluarga_aset(no_ktp,menurut_dinding,menurut_lantai,menurut_atap,kategori) values ('$no_ktp','$dinding
//','$lantai','$atap','$kategori')");

echo"<script>window.alert('Data Sudah Tersimpan')
window.location='media.php?module=perawat&act=view'</script>";
      }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data pegawai </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=masuk&act=view">Data pegawai</a></li>
            <li class="active"><a href="#">Tambah Data pegawai</a></li>
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
                <form action="" name="tes" method="post">
		
		
		
		
		
		

		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		
		
								<?php
			include "../../koneksi/koneksi.php";
/*pertama kita panggil colom yang akan kita gunakan untuk ID kita dengan menyaring nilai maksimum */
$sql ="SELECT MAX(RIGHT(kode_pegawai,4)) AS terakhir FROM tb_pegawai";
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
  $nextID = "PGW".sprintf("%04s",$nextNoUrut);
// selesai,,, untuk memanggil ID otomatis ini  bisa memasangkan cara
 ?>
 
 
 
 
 
		  <tr>
			<td width="120"><b>KODE PEGAWAI</b></td>
			<td><input name="kode_pegawai" type="text" size="40" class="form-control" value="<?php echo  $nextID;?>"> <em><font color="red">Otomatis</font></em></td>
		  </tr>
		  <tr>
			<td>Nama Pegawai</td>
			<td><input name="nama_pegawai" type="text" size="40" class="form-control" value=""> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Username</td>
			<td><input name="username" type="text" size="40" class="form-control" value=""> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Password</td>
			<td><input name="password" type="password" size="40" class="form-control" value=""> <em>harus diisi</em></td>
		  </tr>
		  <tr>
		<td>Bagian</td>
		<td>
		<select name="poli" id="unit_tujuan" class="form-control">
		<option value="">-Pilih Poli-</option>
		<?php 
		$sql = mysqli_query($koneksi,"select * from tb_poli");
		while ($data = mysqli_fetch_array($sql)) {
			?> <option value="<?php echo $data['id_poli'] ?>"><?php echo $data['nama_poli'] ?></option> <?php
		}
		 ?>
		</select> <em>harus diisi</em>
		</td>
		</tr>
		  
		<tr>
		<td>Tgl. Lahir</td>
		<td><input type="date" size="34" class="form-control" name="tanggal_lahir" title="dd-mm-yyyy"   />
		  <em>harus diisi</em></td>
		</tr>

		<tr>
		<td>Alamat</td>
		<td><input name="alamat" type="text" class="form-control" size="40" value=""> <em>harus diisi</em></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><input name="telpon" type="text" class="form-control" size="40" value=""> <em>harus diisi</em></td>
		</tr>
		
	  <tr>
			<td></td>
			<td><input name="add" class="btn btn-primary" type="submit" value="Simpan"> <input name="batal" type="reset"  class="btn btn-danger" onClick="location.href='media.php?module=perawat&act=view';"value="Batal"></td>
		  </tr>
		</table>
		
		
		
		
		
		
		
		
		
		
		
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
	  $data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `tb_pegawai`,`tb_poli` WHERE tb_pegawai.id_poli=tb_poli.id_poli and tb_pegawai.kode_pegawai='$_GET[kode_pegawai]'"));
      
      
            if (isset($_POST['update'])) 
            {
              
              $data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `tb_pegawai`,`tb_poli` WHERE tb_pegawai.id_poli=tb_poli.id_poli and tb_pegawai.kode_pegawai='$_GET[kode_pegawai]'"));
     $kode_pegawai = $_POST['kode_pegawai'];
$nama_pegawai = $_POST['nama_pegawai']; 
$nama_bagian = $_POST['nama_bagian']; 
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];

//memasukkan nilai nilai ke dalam table

$ubah = mysqli_query($koneksi,"update tb_pegawai set nama_pegawai = '$nama_pegawai', id_poli= '$_POST[poli]', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', telpon = '$telpon' where kode_pegawai = '$kode_pegawai'");
echo"<script>window.alert('Data Berhasil diedit')
window.location='media.php?module=perawat&act=view'</script>";
                
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Edit Data pegawai </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=perawat&act=view">Data pegawai</a></li>
            <li class="active">Update Data pegawai</li>
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
               <form name="form1" method="post" action="">
				

		
		
		
		

		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td width="120"><b>KODE PEGAWAI</b></td>
			<td><input name="kode_pegawai" type="text" size="40" class="form-control" value="<?php echo $data['kode_pegawai']; ?>"> <em><font color="red">Otomatis</font></em></td>
		  </tr>
		  <tr>
			<td>Nama Pegawai</td>
			<td><input name="nama_pegawai" type="text" size="40" class="form-control" value="<?php echo $data['nama_pegawai']; ?>"> <em>harus diisi</em></td>
		  </tr>
		  
		  	
					  
		  <tr>
			<td>Tgl. Lahir</td>
			<td><input name="tanggal_lahir" type="date" class="form-control" size="40" value="<?php echo $data['tanggal_lahir']; ?>"> <em>harus diisi</em></td>
		  </tr>

		<tr>
		<td>Alamat</td>
		<td><input name="alamat" type="text" size="40" class="form-control" value="<?php echo $data['alamat']; ?>"> <em>harus diisi</em></td>
		</tr>
		 <tr>
		<td>Bagian</td>
		<td>
		<select name="poli" id="unit_tujuan" class="form-control">
		<option value="<?php echo $data['id_poli'] ?>">-<?php echo $data['nama_poli'] ?>-</option>
		<?php 
		$sq = mysqli_query($koneksi,"select * from tb_poli");
		while ($dat = mysqli_fetch_array($sq)) {
			?> <option value="<?php echo $dat['id_poli'] ?>"><?php echo $dat['nama_poli'] ?></option> <?php
		}
		 ?>
		</select> <em>harus diisi</em>
		</td>
		</tr>
		<tr>
		<td>No. Telp</td>
		<td><input name="telpon" type="text" size="40" class="form-control" value="<?php echo $data['telpon']; ?>"> <em>harus diisi</em></td>
		</tr>
		
			  <tr>
			<td></td>
			<td><input name="update" type="submit" value="Simpan"> <input name="batal" type="reset" onClick="location.href='media.php?module=perawat&act=view';"value="Batal"></td>
		  </tr>
		</table>
		
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
      case 'hapus':
      mysqli_query($koneksi,"DELETE FROM tb_pegawai WHERE kode_pegawai='$_GET[kode_pegawai]'");
      echo "<script>window.location='media.php?module=perawat&act=view'</script>";
      break;

    }
    ?>