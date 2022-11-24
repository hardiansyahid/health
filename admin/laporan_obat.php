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
      <td align="center"><h2>Klinik DR Cika Naya</h2><small>
              Jl. Ikan Sebelah No.21, Pesawahan, Kec. Telukbetung Selatan, Kota Bandar Lampung, Lampung 35211
              Telepon: (0721) 485153
          </small></td>
      
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
<h3><center>Laporan Pengeluaran Obat Periode <?php echo $dari ?> sampai <?php echo $sampai ?></center></h3>


    <table class="table" width="100%" border="1">
                    <thead>
                <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Kode Obat</th>
                <th>Jenis</th>
                <th>Nama Obat</th>
                <th>Pengeluaran</th>
                </tr>
              </thead>
              <tbody>
                
                <?php              
        $r = mysqli_query($koneksi,"select * from obat,resep,tb_rekmed where obat.id_obat=resep.id_obat and tb_rekmed.no_rekmed=resep.no_rekmed and tb_rekmed.tanggal between '$_GET[dari]' and '$_GET[sampai]'");
                $n = 1;
                while ($d = mysqli_fetch_array($r)) {
                ?>
            <tr>
                <td><?php echo $n++; ?></td>
                <td><?php echo tgl_indo($d['tanggal']); ?></td>
                <td><?php echo $d['kode_obat']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <td><?php echo $d['nama_obat']; ?></td>
                <td><?php echo $d['dosis']; ?> pcs</td>
                 
    
  
               </tr>
      <?php
                                $n++;
                }
                ?>
                </tbody>
              </table>

   
<br>
<br>
<br>
<br>
<br>
<br>
<table align="center" width="100%" cellpadding="2">
    <tr>
      <td align="center">Administrator,
      <br><br><br><br><br>
      <b><u><?php echo $_SESSION['namauser'] ?></u></b>
      </td>
      <td width="20%"></td>
      <td align="center">
        <?php 
  $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
  $hari = $array_hari[date('N')];

  $array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
  $bulan = $array_bulan[date('n')];

  $tgl = date('j');
  $thn = date('Y');

  echo $hari.", ".$tgl." ".$bulan." ".$thn ;
?>
<br>Mengetahui,Dokter
<br><br><br><br>
<?php 
    $sr = mysqli_query($koneksi,"select * from tb_rekmed,tb_unitmedis where tb_rekmed.id_unitmedis=tb_unitmedis.id_unitmedis and tb_rekmed.no_rekmed='$_GET[id]'");
    $rr = mysqli_fetch_array($sr);
  ?>

<u><b><?php echo $rr['nama_unitmedis'] ?></b></u><br><br><br><br></td>
    </tr>
  </table>