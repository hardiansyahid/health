<div class="content-wrapper">
<div class="container">
<section id="content"> 
<section class="vbox"> 
<section class="scrollable padder"> 
<div class="m-b-md"> 
<h3 class="m-b-none">Data dokter</h3>  </div> 

<section class="panel panel-default"> 
<div class="table-responsive"> 

<?php 
	if ($_GET['act']=='view') {
		?> <div class="doc-buttons"><a href="media.php?module=dokter&act=input" class="btn btn-s-md btn-dark"><button class="btn btn-primary"> Tambah dokter</button></a></div> <br>
		<table id="example1" class="table table-bordered table-striped">
			<thead>
                <tr>
                <th>No.</th>
				<th>ID. Unit Medis</th>
                <th style="width:250px">Nama Unit Medis</th>
                <th>Username</th>
                <th style="width:130px">Spesialis</th>
				<th style="width:70px">Alamat</th>
				<th style="width:70px">No. Telp</th>
	 			 <th style="width:130px">Aksi</th>	      				
		 
               
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
$result = mysqli_query($koneksi,"select * from tb_unitmedis,tb_poli where tb_unitmedis.id_poli=tb_poli.id_poli");
				
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['id_unitmedis']; ?></td>
                <td><?php echo $data['nama_unitmedis']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['telpon']; ?></td>
				
	 			     <td><center><a href="media.php?module=dokter&act=edit&id_unitmedis=<?php echo $data['id_unitmedis']; ?>">
					 <button class="btn btn-primary">Edit</button></a>  
					 <a href="media.php?module=dokter&act=hapus&id_unitmedis=<?php echo $data['id_unitmedis']; ?>">
					 <button class="btn btn-danger">Hapus</button></a></center></td>
			      				
		
           </tr>
			<?php
                                $no++;
                }
                ?>
                
                </tbody>
                </table>
		 <?php
	}else if ($_GET['act']=='input') {
		?> 
		<header class="panel-heading font-bold">Input Data dokter</header> 
<div class="panel-body"> 
<?php
if(isset($_POST['simpan'])){
$nis=$_POST['nis'];
$nike=md5($_POST['nis']);
$nama=$_POST['nama'];
$tlahir=$_POST['tlahir'];
$tgllahir=$_POST['tgllahir'];
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];
		
		
		$a="insert into dokter values('$nis','$nama','$nike','$tlahir','$tgllahir','$jk','$alamat','$nohp','$_POST[kelas]')";
		$b=mysqli_query($koneksi,$a);
			if ($b) {
				?> 
                                            <script type="text/javascript">
                                            
                                            alert ("Data dokter Berhasil Disimpan");
                                            window.location.href="media.php?module=dokter&act=view";
                                            </script>
                                               <?php

			}
		
	}
?>
<form class="bs-example form-horizontal" method="post" action=""> 
<table class="table">
		
										<?php
/*pertama kita panggil colom yang akan kita gunakan untuk ID kita dengan menyaring nilai maksimum */
$sql ="SELECT MAX(RIGHT(id_unitmedis,4)) AS terakhir FROM tb_unitmedis";
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
  $nextID = "DOK".sprintf("%04s",$nextNoUrut);
// selesai,,, untuk memanggil ID otomatis ini  bisa memasangkan cara
 ?>
 
 
 
		  <tr>
			<td width="120"><b>ID. Unit Medis</b></td>
			<td><input name="id_unitmedis" type="text" size="40" value="<?php echo  $nextID;?>"> <em><font color="red">Otomatis</font></em></td>
		  </tr>
		  <tr>
			<td>Nama Unit Medis</td>
			<td><input name="nama_unitmedis" type="text" size="40" value=""> <em>harus diisi</em></td>
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
		<td>Unit Medis Spesialis Poli</td>
		<td>
		<select name="poli" id="unit_tujuan" style="width:263px">
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
		<td>Alamat</td>
		<td><input name="alamat" type="text" size="40" value=""> <em>harus diisi</em></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><input name="telpon" type="text" size="40" value=""> <em>harus diisi</em></td>
		</tr>
		
		
	  <tr>
			<td></td>
			<td><input name="simpan" type="submit" value="Simpan"> <input name="batal" type="reset" onClick="location.href='media.php?module=dokter&act=view';"value="Batal"></td>
		  </tr>
		</table>
</div> 
<?php
//include "koneksi.php";
/* memanggil variable dan nilai – nilai nya .*/
if(isset($_POST['simpan'])){
$id_unitmedis = $_POST['id_unitmedis'];
$nama_unitmedis = $_POST['nama_unitmedis']; 
$spesialis = $_POST['poli']; 
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$pass = md5($_POST['password']);

//memasukkan nilai nilai ke dalam table
mysqli_query($koneksi,"insert into tb_unitmedis values ('$id_unitmedis','$nama_unitmedis','$_POST[username]','$spesialis','$alamat','$telpon')");

mysqli_query($koneksi,"insert into user values (NULL,'$_POST[username]','$pass','dokter')");
//$simpon = mysqli_query("insert into t_keluarga_aset(no_ktp,menurut_dinding,menurut_lantai,menurut_atap,kategori) values ('$no_ktp','$dinding
//','$lantai','$atap','$kategori')");

echo"<script>window.alert('Data Sudah Tersimpan')
window.location='media.php?module=dokter&act=view'</script>";
}
?>
</form>
		 <?php
	}else if ($_GET['act']=='edit') {
		?> 
		<header class="panel-heading font-bold">Ubah Data dokter</header> 
<div class="panel-body"> 
<?php
//include "koneksi.php";
/* memanggil variable dan nilai – nilai nya .*/
if(isset($_POST['simpan'])){
$id_unitmedis = $_POST['id_unitmedis'];
$nama_unitmedis = $_POST['nama_unitmedis']; 
$spesialis = $_POST['poli']; 
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];

//memasukkan nilai nilai ke dalam table

$ubah = mysqli_query($koneksi,"update tb_unitmedis set nama_unitmedis = '$nama_unitmedis', id_poli = '$spesialis', alamat = '$alamat', telpon = '$telpon' where id_unitmedis = '$id_unitmedis'");

echo"<script>window.alert('Data Sudah Tersimpan')
window.location='media.php?module=dokter&act=view'</script>";
}
?>
         <?php
$id_unitmedis = $_GET['id_unitmedis'];
$result = mysqli_query($koneksi,"select * from tb_unitmedis,tb_poli where tb_unitmedis.id_poli=tb_poli.id_poli 
	and tb_unitmedis.id_unitmedis='$_GET[id_unitmedis]'");
$data = mysqli_fetch_array($result);


?>





		
		

<form name="form1" method="post" action="">
				

		
		
		
		

		<table width="100%" class="table">
		  <tr>
			<td width="120"><b>ID> Unit Medis</b></td>
			<td><input name="id_unitmedis" type="text" size="40" value="<?php echo $data['id_unitmedis']; ?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Nama Unit Medis</td>
			<td><input name="nama_unitmedis" type="text" size="40" value="<?php echo $data['nama_unitmedis']; ?>"> <em>harus diisi</em></td>
		  </tr>
		  			  
		   <tr>
		<td>Perawat Poli</td>
		<td>
		<select name="poli" id="unit_tujuan" style="width:263px">
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
		<td>Alamat</td>
		<td><input name="alamat" type="text" size="40" value="<?php echo $data['alamat']; ?>"> <em>harus diisi</em></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><input name="telpon" type="text" size="40" value="<?php echo $data['telpon']; ?>"> <em>harus diisi</em></td>
		</tr>
		
			  <tr>
			<td></td>
			<td><input name="simpan" type="submit" value="Simpan"> <input name="batal" type="reset" onClick="location.href='media.php?module=dokter&act=view';"value="Batal"></td>
		  </tr>
		</table>
		
		</form>
</div>
		 <?php
	}else if ($_GET['act']=='hapus') {
         $jadwalDokter = mysqli_query($koneksi, "select * from jadwal_dokter where id_unitmedis='$_GET[id_unitmedis]'");
         $existJadwalDokter = mysqli_num_rows($jadwalDokter);
         $dataJadwalDokter = mysqli_fetch_array($jadwalDokter);
         if ($existJadwalDokter > 0){
             $idJadwal = $dataJadwalDokter['id_jadwal'];
             mysqli_query($koneksi, "DELETE FROM detail_jadwal where id_jadwal='$idJadwal'");
             mysqli_query($koneksi,"DELETE FROM jadwal_dokter WHERE id_unitmedis='$_GET[id_unitmedis]'");
         }
         mysqli_query($koneksi,"delete from tb_unitmedis where id_unitmedis = '$_GET[id_unitmedis]'");
		?>
                                            <script type="text/javascript">
                                            
                                            alert ("Data Berhasil Dihapus");
                                            window.location.href="media.php?module=dokter&act=view";
                                            </script>
                                               <?php
	}else{

	}
 ?>






</div> </section> 
</section> 
</section>
 </section>
 <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav">
 </a> 
 </section> 
</div>
</div>
