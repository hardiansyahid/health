<?php 
error_reporting(0);
session_start();
include"../koneksi.php" ?>
<script type="text/javascript">
	window.print();
</script>
<table border="1" align="center" width="100%" cellpadding="0">
    <tr bgcolor="#fff">
      <td width="100px"><img src="../img/core-img/logo.png" width="100px"></td>
      <td align="center"><h2>Klinik DR Cika Naya</h2><small>Lampung 34199</small></td>
      
    </tr>
    </table>
    <hr width="100%" align="center">
  <?php 
  function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

   ?>
   
<h3><center>RUJUKAN PASIEN</center></h3>

    <br>
    <?php 
    $sq = mysqli_query($koneksi,"select * from tb_rujukan,tb_kunjungan,tb_pasien where tb_rujukan.no_reg=tb_kunjungan.no_reg and tb_pasien.kode_pasien=tb_kunjungan.kode_pasien and tb_rujukan.id_rujukan='$_GET[id]'");
    $da = mysqli_fetch_array($sq);
     ?>

    <i>No.Rujukan : <?php echo $da['no_rujuk'] ?></i>
<br>
Rujukan pasien ke Rumah Sakit : <?php echo $da['rs'] ?>
<br>
Petugas penerimaan informasi : Administrator
<br>

<p>Dengan ini Kliik DR Cika Naya merujuk pasien untuk mendapatkan pelayanan kesehatan lebih lanjut.
dengan data sebagai berikut</p>
<center>
  <table >
    <tr>
      <td>Nama Pasien</td>
      <td>:</td>
      <td><?php echo $da['nama_pasien'] ?></td>
    </tr>
    <tr>
      <td>Umur</td>
      <td>:</td>
      <td> <?php
// tanggal lahir
$tanggal = new DateTime($da['tanggal_lahir']);

// tanggal hari ini
$today = new DateTime('today');

// tahun
$y = $today->diff($tanggal)->y;

// bulan
$m = $today->diff($tanggal)->m;

// hari
$d = $today->diff($tanggal)->d;
echo " " . $y . " tahun ";
?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $da['alamat'] ?></td>
    </tr>
  </table>
</center>
  
<br>
Alasan rujukan : <?php echo $da['alasan'] ?>
<br>
Alasan lain : <?php echo $da['alasan_lain'] ?>
   
   <br>
   <b>Anamnesi :</b>
   <br>
   <?php echo $da['anamnesi'] ?>
<br>
<b>Pemeriksaan <?php echo $da['pemeriksaan'] ?></b>
<br>
Tanda Vital : <?php echo $da['tanda_vital'] ?>
<br>
<b>Diagnosa Sementara :</b>
   <br>
   <?php echo $da['diagnosa_sementara'] ?>
<br>
<b>Tindakan yang telah diberikan :</b>
   <br>
   <?php echo $da['tindakan'] ?>
<br>
<br>
<table align="center" width="100%" cellpadding="2">
    <tr>
      <td align="center">
      <br><br><br><br><br>
      <b><u></u></b>
      </td>
      <td width="20%"></td>
      <td align="center">
        <?php 
  $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
  $hari = $array_hari[date('N')];

  $array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novemer','Desember');
  $bulan = $array_bulan[date('n')];

  $tgl = date('j');
  $thn = date('Y');

  
?>
<br>Bandar Lampung,...................
<br>Dokter Pengirim<br><br><br>


<u><b></b></u><br><br><br><br></td>
    </tr>
  </table>