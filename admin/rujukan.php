<?php 
include"../koneksi.php";
error_reporting(0);
 mysqli_query($koneksi,"INSERT INTO tb_rujukan VALUES (null,
 	'$_POST[id]',
 	'$_POST[no_rujuk]',
 	'$_POST[rs]',
 	'$_POST[alasan]',
 	'$_POST[alasan_lain]',
 	'$_POST[anamnesi]',
 	'$_POST[pemeriksaan]',
 	'$_POST[tanda_vital]',
 	'$_POST[diagnosa_sementara]',
 	'$_POST[tindakan]'
 )");

                 ?> 
                <script type="text/javascript">
                    
                    alert ("Data Rujukan Berhasil Disimpan");
                    window.location.href="media.php?module=kunjungan&act=view";
                </script>
            <?php
 ?>