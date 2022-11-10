<?php 
error_reporting(0);
include"koneksi.php" ?>
<script type="text/javascript">
	window.print();
</script>
<table border="1" align="center" width="100%" cellpadding="0">
		<tr bgcolor="#fff">
			<td width="100px"><img src="img/core-img/logo.png" width="100px"></td>
			<td align="center"><h2>Klinik DR Cika Naya</h2><small>Lampung 34199</small></td>
			
		</tr>
		</table>
    <hr width="100%" align="center">
  
<h3><center>
  CETAK FORM KUNJUNGAN PASIEN
</center>
<hr>
<?php 
	$sql = mysqli_query($koneksi,"SELECT tb_pasien.NIK,tb_pasien.nama_pasien,tb_pasien.jenis_kelamin,tb_pasien.pekerjaan,tb_pasien.alamat,
	tb_kunjungan.no_reg,tb_kunjungan.jenis_pendaftaran,tb_poli.nama_poli,detail_jadwal.hari,tb_kunjungan.tgl_berobat,
	jadwal_dokter.keadaan,jadwal_dokter.jam,tb_unitmedis.nama_unitmedis  FROM tb_kunjungan,
tb_pasien,tb_poli,jadwal_dokter,tb_unitmedis,detail_jadwal
WHERE jadwal_dokter.id_jadwal=detail_jadwal.id_jadwal 
and tb_kunjungan.id_detail=detail_jadwal.id_detail 
and jadwal_dokter.id_unitmedis=tb_unitmedis.id_unitmedis 
and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien 
AND tb_poli.id_poli=tb_kunjungan.id_poli 
AND tb_kunjungan.no_reg='$_GET[no]' and detail_jadwal.id_detail='$_GET[id]'");
$data = mysqli_fetch_array($sql);
 ?>
     <table width="100%">
		<tr>
			<th colspan="3">Biodata Pasien</th>
		</tr>
		<tr>
			<td>NIK</td>
			<td>:</td>
			<td><?php echo $data['NIK'] ?></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><?php echo $data['nama_pasien'] ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?php echo $data['jenis_kelamin'] ?></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>:</td>
			<td><?php echo $data['pekerjaan'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $data['alamat'] ?></td>
		</tr>
		<tr>
			<th colspan="3">Detail Kunjungan</th>
		</tr>
		<tr>
			<td>Nomor Urut</td>
			<td>:</td>
			<td><?php echo $data['no_reg'] ?></td>
		</tr>
		
		<tr>
			<td>Jenis</td>
			<td>:</td>
			<td><?php echo $data['jenis_pendaftaran'] ?></td>
		</tr>
		<tr>
			<td>Nama Poli</td>
			<td>:</td>
			<td><?php echo $data['nama_poli'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Berobat</td>
			<td>:</td>
			<td><?php echo $data['tgl_berobat'] ?></td>
		</tr>
		<tr>
			<td>Hari</td>
			<td>:</td>
			<td><?php echo $data['hari'] ?></td>
		</tr>
		<tr>
			<td>Keadaan</td>
			<td>:</td>
			<td><?php echo $data['keadaan'] ?></td>
		</tr>
		<tr>
			<td>Jam</td>
			<td>:</td>
			<td><?php echo $data['jam'] ?></td>
		</tr>
		<tr>
			<td>Dokter yang menangani</td>
			<td>:</td>
			<td><?php echo $data['nama_unitmedis'] ?></td>
		</tr>
		
	</table>
<br>
<br>
<br>
<br>
<br>
<br>
<table align="center" width="100%" cellpadding="2">
    <tr>
      
      <td align="LEFT">
        <?php 
  $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
  $hari = $array_hari[date('N')];

  $array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novemer','Desember');
  $bulan = $array_bulan[date('n')];

  $tgl = date('j');
  $thn = date('Y');

  echo $hari.", ".$tgl." ".$bulan." ".$thn ;
?>
</td>
    </tr>
  </table>