<?php
switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Pesan dari Pasien kepada anda</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=artikel&act=view"> Pesan dari Pasien kepada anda</a></li>
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
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Kirim</th>
                        <th>Isi Pesan</th>
                        <th>Balas</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sq = mysqli_query($koneksi,"select * from tb_unitmedis where username='$_SESSION[namauser]'");
                    $da = mysqli_fetch_array($sq);

                    $tampil=mysqli_query($koneksi,"SELECT * FROM chat,tb_pasien where chat.kode_pasien=tb_pasien.kode_pasien and chat.id_unitmedis='$da[id_unitmedis]' and chat.keterangan='Belum terbalas'");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo $no++ ;?></td>
                        <td><?php echo $r['kode_pasien'] ?></td>
                        <td><?php echo $r['nama_pasien'] ?></td>
                        <td><?php echo $r['tanggal'] ?></td>
                        <td><?php echo $r['isi'] ?></td>
                        <td>
                          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $r['id_chat'] ?>">
  Balas
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $r['id_chat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Balas Pesan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?module=pesan&act=balas" method="post">
<table class="table">
  <tr>
    <td><label for="exampleInputEmail1">Isi Balasan</label><br>
    <input type="text" name="isi" class="form-control" placeholder="Isi Balasan..."></td>
  </tr>
  <input type="hidden" name="id" value="<?php echo $r['id_chat'] ?>">
</table>
    
    

 
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="balas" class="btn btn-primary">Kirim Balasan</button>
      </div>
     
</form>
    </div>
  </div>
</div>
                        </td>
                        </tr>

                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                  </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
	</div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
 <?php
      break;
      // PROSES TAMBAH DATA kasmasuk //
      case 'balas':


    date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y H:i:s');
    mysqli_query($koneksi,"insert into balasan values(null,'$_POST[id]','$tanggal','$_POST[isi]')");
    mysqli_query($koneksi,"update chat set keterangan='Terbalas' where id_chat='$_POST[id]'");
    ?> 
    <script type="text/javascript">
      alert('Pesan berhasil dibalas');
      window.location.href="media.php?module=pesan&act=view";
    </script>
     <?php
  

      break;
    }?>