<?php 
error_reporting(0);
session_start();
include"../koneksi.php" ?>
<script type="text/javascript">
	window.print();
</script>


<table border="1" width="60%" cellpadding="0">
    <tr>
      <td width="100px"><img src="../img/core-img/logo.png" width="50px"></td>
      <td align="center"><b>KARTU BEROBAT</b><br><b>Klinik DR Cika Naya</b></td>
      
    </tr>
    </table>

    <?php 
    $result = mysqli_query($koneksi,"select * from tb_pasien where kode_pasien='$_GET[id]'");
$data = mysqli_fetch_array($result);
     ?>

<table width="60%" border="1">
  <tr>
    <td colspan="3"><center><b>KARTU BERLAKU UNTUK SEKELUARGA</b></center></td>
  </tr>
  <tr>
    <td width="20%">Nama KK</td>
    <td width="10%">:</td>
    <td width="70%"><?php echo $data['nama_kk'] ?></td>
  </tr>
  <tr>
    <td width="20%">Alamat</td>
    <td width="10%">:</td>
    <td width="70%"><?php echo $data['alamat'] ?></td>
  </tr>
  <tr>
    <td width="20%">Indeks</td>
    <td width="10%">:</td>
    <td width="70%"><?php echo $data['kode_pasien'] ?></td>
  </tr>

</table>
 