<?php

$koneksi = mysqli_connect("localhost","root","","dtb_health");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>

<?php
//
//$koneksi = mysqli_connect("localhost","u483751771_hardeey","T@isapi3d","u483751771_dtb_health");
//
//if (mysqli_connect_errno()){
//    echo "Koneksi database gagal : " . mysqli_connect_error();
//}
//
//?>