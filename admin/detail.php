<?php 
error_reporting(0);
include"../koneksi.php" ?>
<script type="text/javascript">
	window.print();
</script>
<table border="1" align="center" width="100%" cellpadding="0">
    <tr bgcolor="#fff">
      <td width="100px"><img src="../img/logo.jpg" width="100px"></td>
      <td align="center"><h2>CV LAUT SELATAN JAYA</h2><small>Jl Laks Malahayati No.58 Pesawahan, Teluk Betung Selatan,Kota Bandar Lampung, Lampung | Cp.(0721)881234 | Email: lautselatanjayacv@gmail.com | website: www.cvlautselatanjaya.com</small></td>
      <td width="100px"><img src="../img/logo.jpg" width="100px"></td>
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
   <?php 
  $dari = tgl_indo($_GET['dari']);
  $sampai = tgl_indo($_GET['sampai']);
 ?>
<h3><center>LAPORAN DETAIL PENJUALAN KOSMETIK</center></h3>
<h3><center>PERIODE <?php echo $dari ?> - <?php echo $sampai ?></center></h3>


          <table border="1" align="center" width="100%" cellpadding="2" >
          <tr>
          	<th>No.</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
          </tr>
         
 <?php
 	$i =1;
  $grand=0;
  $dari = $_GET['dari'];
  $sampai = $_GET['sampai'];
    $tampil = mysql_query("select produk.nama_produk,SUM(beli.jumlah) as jumlah from `beli`,`produk` where beli.id_produk=produk.id_produk and beli.tanggal BETWEEN '$dari' and '$sampai' GROUP BY beli.id_produk");
    while($r=mysql_fetch_array($tampil)){

      ?><tr>
      			<td><p align='center'><?php echo $i++ ?></p></td>	
            <td><?php echo $r['nama_produk'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            
            
             
         </tr>

      <?php
      

    }
    ?>
    <hr>
    
</table>
<hr>
<table align="center" width="100%" cellpadding="2">
    <tr>
      <br>
      <td align="center"><br>Pimpinan,
      <br><br><br><br>
      ________________
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

  echo $hari.", ".$tgl." ".$bulan." ".$thn ;
?>
<br>
<br><br><br><br><br><br><br></td>
    </tr>
  </table>