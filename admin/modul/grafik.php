<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Grafik Kunjungan</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=artikel&act=view">Data artikel</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
				  
                      <script type="text/javascript">
    var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Kunjungan Klinik dr. Cika Naya '
         },
         xAxis: {
            categories: ['Nama POLI']
         },
         yAxis: {
            title: {
               text: 'Jumlah Pasien'
            }
         },
              series:             
            [
            <?php 
                             
                 $sql_jumlah   = "SELECT tb_poli.nama_poli, COUNT( tb_kunjungan.no_reg ) AS jumlah
FROM tb_poli,tb_kunjungan where tb_poli.id_poli=tb_kunjungan.id_poli
GROUP BY tb_poli.nama_poli";        
                 $query_jumlah = mysqli_query($koneksi,$sql_jumlah ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah']; 
                    

$bln = $data['nama_poli']; ?>          
                  
                  {
                      name: '<?php echo $bln; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },<?php } ?>
                 
            ]
      });
   });  
</script>
<div id='container'></div> 
				  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->