<?php
  error_reporting(0);
include"../koneksi.php";
session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin || Klinik DR Cika Naya</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue-light.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <script src="ckeditor/ckeditor.js"></script>

    <!-- Boostrap Sub Menu -->
    <link rel="stylesheet" href="dist/css/bootstrap-submenu.min.css">
     <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script src="dist/js/highcharts.js" type="text/javascript"></script>

  <!--  <link href="../dist/slider/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="../dist/slider/js-image-slider.js" type="text/javascript"></script> -->
    <script src="plugins/slider/js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
    <![endif]-->
	<script language='javascript'>

function showKab()

{

<?php

// membaca semua kategori

$query = "SELECT * FROM tb_unitmedis ORDER BY id_unitmedis ASC";

$hasil = mysqli_query($koneksi,$query);

// membuat if untuk masing-masing pilihan kategori beserta isi option untuk combobox kedua

while ($data = mysqli_fetch_array($hasil))

{

$kat = $data['id_poli'];

// membuat IF untuk masing-masing propinsi

echo "if (document.form1.poli.value == \"".$kat."\")";

echo "{";

// membuat option kota untuk masing-masing propinsi

$query2 = "SELECT * from tb_unitmedis where id_poli='$kat'";

$hasil2 = mysqli_query($koneksi,$query2);

$content = "document.getElementById('pelang').innerHTML = \"";

while ($data2 = mysqli_fetch_array($hasil2))

{

$content .= "<option value='".$data2['id_unitmedis']."'> ".$data2['nama_unitmedis']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}

</script>
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Klinik DR Cika Naya</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                  <img src="dist/img/admin.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"> <?php echo strtoupper($_SESSION['username']);?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/admin.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['namauser'] ?> - <?php echo $_SESSION['leveluser'] ?>
                      <small>Klinik DR Cika Naya</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
		<div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['namauser'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           
            <li class="header">Menu Utama</li>

            <li class="active treeview">
              <a href="?module=home">
                <i class="fa fa-dashboard"></i> <span>Home</span>
              </a>
            </li>

            
          
            
       <?php 
        if ($_SESSION['leveluser']=='admin') {
          ?>

           <li class="header">Profil</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-home"></i>
                <span>Profil</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=menu&id=1"><i class="fa fa-check-square-o"></i>Profil Klinik</a></li>
                <li><a href="?module=menu&id=2"><i class="fa fa-check-square-o"></i>Hubungi Kami</a></li>
                <li><a href="?module=artikel&act=view"><i class="fa fa-check-square-o"></i>Artikel Kesehatan</a></li>
        
                 </ul>
            </li>
         
          <li class="header">Master Data</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="?module=poli&act=view"><i class="fa fa-check-square-o"></i> Data Poli</a></li>
			  <li><a href="?module=pasien&act=view"><i class="fa fa-check-square-o"></i> Data Pasien</a></li>
			  <li><a href="?module=dokter&act=view"><i class="fa fa-check-square-o"></i> Data Dokter</a></li>
        <li><a href="?module=obat&act=view"><i class="fa fa-check-square-o"></i> Data Obat</a></li>
       			  <li><a href="?module=perawat&act=view"><i class="fa fa-check-square-o"></i> Data Pegawai</a></li>
			  <li><a href="?module=jadwal&act=view"><i class="fa fa-check-square-o"></i> Data Jadwal Praktik</a></li>
			  <li><a href="?module=kunjungan&act=view"><i class="fa fa-check-square-o"></i> Data Reservasi/Kunjungan</a></li>
			  
                 </ul>
            </li>
            
            <li class="header">Laporan</li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Data Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=grafik"><i class="fa fa-check-square-o"></i> Grafik Kunjungan</a></li>
              <li><a href="?module=laporan_pasien"><i class="fa fa-check-square-o"></i> Laporan Pasien</a></li>
              <li><a href="?module=laporan"><i class="fa fa-check-square-o"></i> Laporan Reservasi/Kunjungan</a></li>
              <li><a href="?module=laporan_rekam"><i class="fa fa-check-square-o"></i> Laporan Rekam medis</a></li>
              </ul>
            </li>
           <?php
        }
		else if($_SESSION['leveluser']=='dokter'){
			?> 
			<li class="header">Master Data</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			  
			  <li><a href="?module=kunjungan&act=view"><i class="fa fa-check-square-o"></i> Data Reservasi/Kunjungan</a></li>
			  <li><a href="?module=pesan&act=view"><i class="fa fa-check-square-o"></i> Konsultasi Pasien</a></li>
                 </ul>
            </li>	
			<?php
		}
    else if($_SESSION['leveluser']=='apoteker'){
      ?> 
      <li class="header">Master Data</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
        
        <li><a href="?module=obat&act=view"><i class="fa fa-check-square-o"></i> Data Obat</a></li>
        <li><a href="?module=transaksi&act=view"><i class="fa fa-check-square-o"></i> Data Resep</a></li>
        
                 </ul>
            </li> 
      <?php
    }
		else if($_SESSION['leveluser']=='pimpinan'){
			?> 
			<li class="header">Laporan</li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Data Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="?module=grafik"><i class="fa fa-check-square-o"></i> Grafik Kunjungan</a></li>
              <li><a href="?module=laporan_pasien"><i class="fa fa-check-square-o"></i> Laporan Pasien</a></li>
              <li><a href="?module=laporan"><i class="fa fa-check-square-o"></i> Laporan Kunjungan</a></li>
               <li><a href="?module=laporan_obat"><i class="fa fa-check-square-o"></i> Laporan Obat</a></li>
               <li><a href="?module=laporan_rekam"><i class="fa fa-check-square-o"></i> Laporan Rekam medis</a></li>
              </ul>
            </li>
			<?php
		}
		else{
          ?> <?php
        }
        ?>     
          
          </ul>
          
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <?php
      include "content.php";
      ?>
      <!-- /.content-wrapper -->


      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>©Klinik DR Cika Naya, 2022. ALL RIGHTS RESERVED </b>
        </div>
        <strong><a href="#">SELAMAT DATANG ADMIN</a></strong>
      </footer>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="dist/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- daterangepicker -->
    <script src="dist/js/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
     <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- Donut Chart -->
    <script src="plugins/chartjs/Chart.Doughnut.js"></script>

    <!-- Fileinput.js -->
    <script src="bootstrap/js/photo_adm.js"></script>

    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true
        });
        $("#example4").DataTable();
        $('#example3').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true
        });
      });
    </script>
    
    <!-- page script Select2 Elements -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
         });
    </script>
    
    <!-- page script Submenu -->
    <script src="dist/js/bootstrap-submenu.min.js"></script>

    <!-- page script Dropdown Submenu -->
    <script type="text/javascript">
    $(document).ready(function() {

    $( ".dropdown-submenu" ).click(function(event) {
        // stop bootstrap.js to hide the parents
        event.stopPropagation();
        // hide the open children
        $( this ).find(".dropdown-submenu").removeClass('open');
        // add 'open' class to all parents with class 'dropdown-submenu'
        $( this ).parents(".dropdown-submenu").addClass('open');
        // this is also open (or was)
        $( this ).toggleClass('open');
      });
  });
    </script>

    <!-- page script datepicker -->
    <script>
    $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.content form').length>0 ? $('.content form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
<!--//////////////////////////nyebmbunyiin form ////////////////// -->
<script type="text/javascript">
$(document).ready(function(){
    $('#id_jeniskas').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
        $("#kaskeluar").hide();  
        $("#kasmasuk").show();
      }
      else  if ( this.value == '2')
      {
        $("#kaskeluar").show();  
        $("#kasmasuk").hide();
      }
       else  
      {
         
              }
    });
}); 
</script>
  </body>
</html>

<?php
}
?>
