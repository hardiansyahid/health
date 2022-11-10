<div class="content-wrapper">
<div class="container">
<section id="content"> 
<section class="vbox"> 
<section class="scrollable padder"> 
<div class="m-b-md"> 
<h3 class="m-b-none">Data Kelas</h3> </div> 

<section class="panel panel-default"> 
<div class="table-responsive"> 

<?php 
	if ($_GET['act']=='view') {
		?> <div class="doc-buttons"><a href="media.php?module=kelas&act=input"><button class="btn btn-primary"> Tambah kelas</button></a></div> <br>
		<table class="table table-striped m-b-none"> 
<thead> <tr> 
<th>No</th>  
<th>Nama Kelas</th> 
<th>Aksi</th>
</tr> </thead> 
<tbody>
<?php
	$a="select * from kelas";
	$b=mysqli_query($koneksi,$a);
	$no=1;
	while($c=mysqli_fetch_array($b)){
	?>

<tr>
						<td><?php echo $no;?></td>
								<td><?php echo $c['nama_kelas'];?></td>
								<td>
								<a href="media.php?module=kelas&act=ubah&id=<?php echo $c['id_kelas'];?>"><i class="fa fa-edit"></i> Ubah</a> | 
								<a href="javascript:if(confirm('Anda yakin menghapus ini?'))
								{document.location='media.php?module=kelas&act=hapus&id=<?php echo $c['id_kelas']; ?>';}"><i class="fa fa-trash-o"></i> Hapus</a>
								</td>
								
</tr>
	  <?php $no++; } ?>


</tbody>
</table> 
		 <?php
	}else if ($_GET['act']=='input') {
		?> 
		<header class="panel-heading font-bold">Input Data kelas</header> 
<div class="panel-body"> 
<?php
if(isset($_POST['simpan'])){
$nama=$_POST['nama'];
		
		if (empty($nama)){
			echo "<script language='javascript'>
alert('Data belum lengkap !');
</script>";
		}else{
		$a="insert into kelas values(NULL,'$nama')";
		$b=mysqli_query($koneksi,$a);
			if ($b) {
				?> 
                                            <script type="text/javascript">
                                            
                                            alert ("Data kelas Berhasil Disimpan");
                                            window.location.href="media.php?module=kelas&act=view";
                                            </script>
                                               <?php

			}
		}
	}
?>
<form class="bs-example form-horizontal" method="post" action=""> 
<div class="form-group"> 
<label class="col-lg-2 control-label">Nama Kelas</label> <div class="col-lg-10"> 
<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kelas"> </div> </div> 

<a href="datakelas.php"><input type="button" class="btn btn-default" value="Cancel"></input></a> 
<button type="submit" name="simpan" class="btn btn-primary">Save Change</button>

</form> 
</div> 
		 <?php
	}else if ($_GET['act']=='ubah') {
		?> 
		<header class="panel-heading font-bold">Ubah Data kelas</header> 
<div class="panel-body"> 

<?php
if(isset($_POST['ubah'])){
$nama=$_POST['nama'];
		
		$a="update kelas set nama_kelas='$nama' where id_kelas='$_GET[id]'";
		$b=mysqli_query($koneksi,$a);
			if ($b) {
				?> 
                                            <script type="text/javascript">
                                            
                                            alert ("Data kelas Berhasil Diubah");
                                            window.location.href="media.php?module=kelas&act=view";
                                            </script>
                                               <?php

			
	}
}
?>
<?php 
	$sql = mysqli_query($koneksi,"select * from kelas where id_kelas='$_GET[id]'");
	$data = mysqli_fetch_array($sql);
 ?>
<form class="bs-example form-horizontal" method="post" action="" enctype="multipart/form-data"> 
<div class="form-group"> 
<label class="col-lg-2 control-label">Nama Kelas</label> <div class="col-lg-10">
 <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_kelas'];?>"> </div> </div> 

<br>
<input type="reset" name="" value="Cancel" class="btn btn-danger"></a> 
<button type="submit" name="ubah" class="btn btn-primary">Ubah</button>

</form> 
</div>
		 <?php
	}else if ($_GET['act']=='hapus') {
		mysqli_query($koneksi,"delete from kelas where id_kelas='$_GET[id]'");
		?> 
                                            <script type="text/javascript">
                                            
                                            alert ("Data Berhasil Dihapus");
                                            window.location.href="media.php?module=kelas&act=view";
                                            </script>
                                               <?php
	}else{

	}
 ?>






</div> </section> 
</section> 
</section>
 </section>
 <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav">
 </a> 
 </section> 
 </div>
 </div>

