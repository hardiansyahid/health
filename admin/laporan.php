<?php 
error_reporting(0);
include"../koneksi.php" ?>
<script type="text/javascript">
	window.print();
</script>
<table border="1" align="center" width="100%" cellpadding="0">
		<tr bgcolor="#fff">
			<td width="100px"><img src="../img/core-img/logo.png" width="100px"></td>
			<td align="center"><h2>DR CIKA NAYA </h2>
			  <small>
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
<h3><center>LAPORAN KUNJUNGAN PASIEN 
<?php if($_GET['poli']==''){
	
}
else
{
    $s = mysqli_query($koneksi,"select * from tb_poli where id_poli='$_GET[poli]'");
    $d = mysqli_fetch_array($s);
    echo $d['nama_poli'];
} ?></center></h3>
<h3><center>PERIODE <?php echo $dari ?> - <?php echo $sampai ?></center></h3>

<hr>
       <table width="100%" border="1">
               
                <tr>
                <th>No.</th>
				<th>No. Reg</th>
                <th>Tgl. Reg</th>
                <th>Tgl. Berobat</th>
                <th>Unit Tujuan</th>
                <th>Kode Pasien</th>
				<th>Nama Pasien</th>
				<th>Jns. Kelamin</th>
				<th>Alamat</th>
				<th>Dokter</th>
                </tr>
                
                <?php
				

                $no = 1;
					if($_GET['poli']=='ALL'){
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal,tb_unitmedis,jadwal_dokter 
						WHERE detail_jadwal.id_jadwal=jadwal_dokter.id_jadwal and jadwal_dokter.id_unitmedis=tb_unitmedis.id_unitmedis
						and tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and tb_kunjungan.tgl_reg between '$_GET[dari]' and '$_GET[sampai]'");
					}else{
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal,tb_unitmedis,jadwal_dokter WHERE 
						detail_jadwal.id_jadwal=jadwal_dokter.id_jadwal and jadwal_dokter.id_unitmedis=tb_unitmedis.id_unitmedis
						and tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and tb_poli.id_poli='$_GET[poli]' and tb_kunjungan.tgl_reg between '$_GET[dari]' and '$_GET[sampai]'");
					}
				
				
				

				
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['no_reg']; ?></td>
                <td><?php echo $data['tgl_reg']; ?></td>
                <td><?php echo $data['tgl_berobat']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
				<td><?php echo $data['kode_pasien']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['nama_unitmedis']; ?></td>
                
			</tr>
			<?php
                                $no++;
                }
                ?>
                
                
                </table>
<br>
<br>
<br>
<br>
<br>
<br>
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

  $array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
  $bulan = $array_bulan[date('n')];

  $tgl = date('j');
  $thn = date('Y');

  echo $hari.", ".$tgl." ".$bulan." ".$thn ;
?>
<br>Mengetahui,
<br><br><br><br>________________<br><br><br></td>
    </tr>
  </table>