<?php
include "../koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/fungsi_rupiah.php";

// Bagian Home
if ($_GET[module]=='home'){
  include"home.php";
}

// Bagian Modul

// Bagian Kategori
elseif ($_GET[module]=='artikel'){
    include "modul/artikel.php"; 
}
elseif ($_GET[module]=='user'){
    include "modul/user.php"; 
}
elseif ($_GET[module]=='transaksi'){
    include "modul/transaksi.php"; 
}
elseif ($_GET[module]=='perawat'){
    include "modul/perawat.php";
  
}
elseif ($_GET[module]=='laporan_pasien'){
    include "modul/laporan_pasien.php";
  
}
elseif ($_GET[module]=='poli'){
    include "modul/poli.php";
  
}
elseif ($_GET[module]=='pesan'){
    include "modul/pesan.php";
  
}
elseif ($_GET[module]=='obat'){
    include "modul/obat.php";
  
}
elseif ($_GET[module]=='menu'){
    include "modul/menu.php";
  
}
elseif ($_GET[module]=='dokter'){
    include "modul/dokter.php";
  
}
elseif ($_GET[module]=='osis'){
    include "modul/osis.php";
  
}
elseif ($_GET[module]=='pasien'){
    include "modul/pasien.php";
  
}
elseif ($_GET[module]=='kunjungan'){
    include "modul/kunjungan.php";
  
}
elseif ($_GET[module]=='kategori'){
    include "modul/kategori.php";
  
}
elseif ($_GET[module]=='jadwal'){
    include "modul/jadwal.php";
  
}
elseif ($_GET[module]=='grafik'){
    include "modul/grafik.php";
  
}
elseif ($_GET[module]=='laporan_obat'){
    include "modul/laporan_obat.php";
  
}
elseif ($_GET[module]=='laporan_rekam'){
    include "modul/laporan_rekam.php";
  
}

// Bagian Laporan
elseif ($_GET[module]=='laporan'){
    include "modul/mod_laporan/laporan.php";
  
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
