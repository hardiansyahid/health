<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Menu</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=artikel&act=view">Data menu</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box-header">
				<div class="box box-primary">
                  <div class="box-body">
				  <?php 
					$sql = mysqli_query($koneksi,"select * from menu where id_menu='$_GET[id]'");
					$data = mysqli_fetch_array($sql);
				  ?>
					<form action="" method="post">
						<table class="table">
							<tr>
								<td>Nama Menu</td>
								<td>:</td>
								<td><input type="text" name="nama" class="form-control" value="<?php echo $data['nama_menu'] ?>"></td>
							</tr>
							<tr>
								<td>Isi Menu</td>
								<td>:</td>
								<td>
									<textarea name='isi' id='text-ckeditor'><?php echo $data['isi'] ?></textarea>
<script>CKEDITOR.replace('text-ckeditor');</script>
								</td>
							</tr>
							<tr>
							<td colspan="3"><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
							</tr>
						</table>
						<?php 
						if(isset($_POST['simpan'])){
							mysqli_query($koneksi,"update menu set nama_menu='$_POST[nama]',isi='$_POST[isi]' where id_menu='$_GET[id]'");
							?> 
                                            <script type="text/javascript">
                                            
                                            alert ("Data Berhasil Diedit");
                                            window.location.href="media.php?module=menu&id=<?php echo $_GET['id'] ?>";
                                            </script>
                                               <?php
						}
						?>
					</form>
				  </div>
				 </div>
			</div>
		</div>
	</div>
</section>
</div>