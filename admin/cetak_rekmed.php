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
<h3><center>DETAIL REKAM MEDIS DAN RESEP OBAT
  <?php 
    $s = mysqli_query($koneksi,"select * from tb_rekmed where no_rekmed='$_GET[id]'");
    $r = mysqli_fetch_array($s);
    $kode = $r['kode_pasien'];
  ?>
  <hr>
  <h4><u>Kode Rekmed : <?php echo $r['no_rekmed'] ?></u></h4>
  <hr>
<table class="table">
            <tr>
              <th colspan="3"><center>Biodata Pasien </center></th>
            </tr>
            <?php 
            $pa = mysqli_query($koneksi,"select * from tb_pasien where kode_pasien='$kode'");
            $pp = mysqli_fetch_array($pa);
            ?>
            <tr>
              <td>Kode Pasien</td>
              <td>:</td>
              <td><?php echo $pp['kode_pasien'] ?></td>
            </tr>
            <tr>
              <td>Nama Pasien</td>
              <td>:</td>
              <td><?php echo $pp['nama_pasien'] ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td><?php echo $pp['jenis_kelamin'] ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?php echo $pp['alamat'] ?></td>
            </tr>
            <tr>
              <td>Telpon</td>
              <td>:</td>
              <td><?php echo $pp['telpon'] ?></td>
            </tr>
            <tr>
              <th colspan="3"><center>Hasil Pemeriksaan</center></th>
            </tr>
            
             <tr>
              <td>Gejala</td>
              <td>:</td>
              <td><?php echo $r['diagnosa2'] ?></td>
            </tr>
            <tr>
              <td>Diagnosa</td>
              <td>:</td>
              <td><?php echo $r['diagnosa1'] ?></td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td><?php echo $r['keterangan'] ?></td>
            </tr>

            <tr>
              <th colspan="3"><center>Resep Obat</center></th>
            </tr>
            </table>
             <table width="100%" border='1'>
                    <thead>
                <tr>
                <th>No.</th>
                <th>Kode Obat</th>
                <th>Jenis</th>
                <th>Nama Obat</th>
                <th>Dosis</th>
                <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                
                <?php              
        $r = mysqli_query($koneksi,"select * from obat,resep where obat.id_obat=resep.id_obat and resep.no_rekmed='$_GET[id]'");
                $n = 1;
                while ($d = mysqli_fetch_array($r)) {
                ?>
            <tr>
                <td><?php echo $n++; ?></td>
                <td><?php echo $d['kode_obat']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <td><?php echo $d['nama_obat']; ?></td>
                <td><?php echo $d['dosis']; ?></td>
                <td><?php echo number_format($d['harga']) ?></td>
                 
    
  
               </tr>
      <?php
                                $total_obat += $d['harga'];

                }
                ?>
                </tbody>
                <tr>
                  <th colspan="5"><center>Biaya Obat</center></th>
                  <th><center><?php echo number_format($total_obat) ?></center></th>
                </tr>
                 <?php 
    $s = mysqli_query($koneksi,"select * from tb_rekmed where no_rekmed='$_GET[id]'");
    $r = mysqli_fetch_array($s);
    $total = $total_obat + $r['biaya'];
  ?>
              <tr>
                  <th colspan="5"><center>Biaya Pemeriksaan</center></th>
                  <th><center><?php echo number_format($r['biaya']) ?></center></th>
                </tr>
                <tr>
                  <th colspan="5"><center>Total Pembayaran</center></th>
                  <th><center><?php echo number_format($total) ?></center></th>
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
      <td align="center">Administrator,
      <br><br><br><br><br>
      <b><u><?php echo $_SESSION['namauser'] ?></u></b>
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
<br>Mengetahui,Dokter
<br><br><br><br>
<?php 
    $sr = mysqli_query($koneksi,"select * from tb_rekmed,tb_unitmedis where tb_rekmed.id_unitmedis=tb_unitmedis.id_unitmedis and tb_rekmed.no_rekmed='$_GET[id]'");
    $rr = mysqli_fetch_array($sr);
  ?>

<u><b><?php echo $rr['nama_unitmedis'] ?></b></u><br><br><br><br></td>
    </tr>
  </table>