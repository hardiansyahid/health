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
   <?php 
  $dari = tgl_indo($_GET['dari']);
  $sampai = tgl_indo($_GET['sampai']);
 ?>
<h3><center>Laporan Data Pasien Jenis <?php echo $_GET['jenis'] ?>

  <hr>
  

 <table border="1" width="100%">
                  	<thead>
                <tr>
                <th>No.</th>
				<th>Kd. Pasien</th>
				<th style="width:180px">NIK</th>
                <th style="width:180px">Nama</th>
                
                <?php 
                    if($_GET['jenis']=='BPJS'){
                        ?> <th style="width:180px">No BPJS</th> <?php
                    }else{  
                        
                    }
                ?>
                
                
                
                
                <th style="width:130px">Tgl. Lahir</th>
				<th style="width:70px">Kelamin</th>
				<th style="width:70px">No. Telp</th>
				 
	 			      				
		
                
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                 if($_GET['jenis']=='BPJS'){
        $s = mysqli_query($koneksi,"select * from tb_pasien,tb_kunjungan where tb_pasien.kode_pasien=tb_kunjungan.kode_pasien and tb_kunjungan.detail='BPJS'");
    }else{
       $s = mysqli_query($koneksi,"select * from tb_pasien,tb_kunjungan where tb_pasien.kode_pasien=tb_kunjungan.kode_pasien and tb_kunjungan.detail!='BPJS'"); 
    }
                while ($data = mysqli_fetch_array($s)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['kode_pasien']; ?></td>
				<td><?php echo $data['NIK']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
				 <?php 
                    if($_GET['jenis']=='BPJS'){
                        ?> <td><?php echo $data['no_bpjs']; ?></td> <?php
                    }else{  
                        
                    }
                ?>
                
                
				
                <td><?php echo $data['tanggal_lahir']; ?></td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['telpon']; ?></td>
		
		
               </tr>
			<?php
                                $no++;
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