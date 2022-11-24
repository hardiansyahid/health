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
<?php
$s = mysqli_query($koneksi,"select * from tb_pasien where kode_pasien='$_GET[pasien]'");
$r = mysqli_fetch_array($s);
$kode = $r['kode_pasien'];
?>
<h3><center>Laporan Rekam Medis Pasien <?php echo $r['nama_pasien'] ?>

        <hr>


        <table class="table" width="100%" border="1">
            <tr>
                <th colspan="6"><center>History Rekam Medis </center></th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Tanggal Rekam Medis</th>
                <th>Nama Dokter</th>
                <th>Anamnesa</th>
                <th>Resep Obat</th>
                <th>Pemeriksaan</th>
                <th>Diagnosa</th>
            </tr>
            <?php
            $sql = mysqli_query($koneksi,"select * from tb_rekmed,tb_unitmedis where tb_rekmed.id_unitmedis=tb_unitmedis.id_unitmedis and tb_rekmed.kode_pasien='$kode' order by tb_rekmed.no_rekmed desc");
            $da = mysqli_num_rows($sql);
            $no = 1;
            if($da=='0'){
                ?>
                <tr>
                    <td colspan="6"><center>Belum ada Rekam medis dari pasien</center></td>
                </tr>
                <?php
            }else{
                while($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?>.</td>
                        <td><?php echo tgl_indo($data['tanggal']) ?></td>
                        <td><?php echo $data['nama_unitmedis'] ?></td>
                        <td><?php echo $data['diagnosa1'] ?></td>
                        <td><ol>
                                <?php
                                $sq = mysqli_query($koneksi,"select * from resep,obat where resep.id_obat=obat.id_obat and resep.no_rekmed='$data[no_rekmed]'");
                                while($d = mysqli_fetch_array($sq)){
                                    ?>
                                    <li><?php echo $d['nama_obat'] ?>(<?php echo $d['dosis'] ?>)</li>
                                    <?php
                                }
                                ?>

                            </ol>
                        </td>
                        <td><?php echo $data['diagnosa2'] ?></td>
                        <td><?php echo $data['tindakan'] ?></td>

                        </td>

                    </tr>
                    <?php
                }

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