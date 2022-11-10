<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data User </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=user&act=view">Data User</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?module=user&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
                </tr>
                
                <?php
                $no = 1;
$result = mysqli_query($koneksi,"select * from user where level='pimpinan' or level='apoteker'");
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['level']; ?></td>
                <td><a href="media.php?module=user&act=edit&id=<?php echo $data['id_user']; ?>"><button class="btn btn-success">edit</button></a>
				 <a href="?module=user&act=hapus&id=<?php echo $data['id_user']; ?>"><button class="btn btn-danger">Hapus</button></a></td>
			</tr>
			<?php
                                $no++;
                }
                ?>
                
                
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
      case 'add':
      if (isset($_POST['add'])) 
      {
  
$username = $_POST['username'];
$pass = md5($_POST['password']);
mysqli_query($koneksi,"insert into user values (NULL,'$_POST[username]','$pass','$_POST[level]')");
//$simpon = mysqli_query("insert into t_keluarga_aset(no_ktp,menurut_dinding,menurut_lantai,menurut_atap,kategori) values ('$no_ktp','$dinding
//','$lantai','$atap','$kategori')");

echo"<script>window.alert('Data Sudah Tersimpan')
window.location='media.php?module=user&act=view'</script>";
      }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data user </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=masuk&act=view">Data user</a></li>
            <li class="active"><a href="#">Tambah Data user</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
                <form action="" name="tes" method="post">
		
		
		
		
		
		

		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		
		
							
 
 
 
 
 
		 
		 
		  <tr>
			<td>Username</td>
			<td><input name="username" type="text" size="40" required="" class="form-control" value=""> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Password</td>
			<td><input name="password" type="password" required="" size="40" class="form-control" value=""> <em>harus diisi</em></td>
		  </tr>
		 <tr>
		<td>Level</td>
		<td>
      <select name="level" class="form-control" required="">
        <option value="">-Pilih Level-</option>
        <option>pimpinan</option>
        <option>apoteker</option>
      </select>
     <em>harus diisi</em></td>
		</tr>

		
	  <tr>
			<td></td>
			<td><input name="add" class="btn btn-primary" type="submit" value="Simpan"> <input name="batal" type="reset"  class="btn btn-danger" onClick="location.href='media.php?module=user&act=view';"value="Batal"></td>
		  </tr>
		</table>
		
		
		
		
		
		
		
		
		
		
		
		</form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA kasmasuk //
      case 'edit':
	  $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `user` WHERE id_user='$_GET[id]'"));
      
      
            if (isset($_POST['update'])) 
            {
              
            

//memasukkan nilai nilai ke dalam table

$ubah = mysqli_query($koneksi,"update user set username = '$_POST[username]', level= '$_POST[level]' where id_user = '$_GET[id]'");
echo"<script>window.alert('Data Berhasil diedit')
window.location='media.php?module=user&act=view'</script>";
                
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Edit Data user </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=user&act=view">Data user</a></li>
            <li class="active">Update Data user</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
               <form name="form1" method="post" action="">
				

		
		
		
		

		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		   <tr>
      <td>Username</td>
      <td><input name="username" value="<?php echo $d['username'] ?>" type="text" size="40" required="" class="form-control" value=""> <em>harus diisi</em></td>
      </tr>
     
     <tr>
    <td>Level</td>
    <td>
      <select name="level" class="form-control" required="">
        <option><?php echo $d['level'] ?></option>
        <option>pimpinan</option>
        <option>apoteker</option>
      </select>
     <em>harus diisi</em></td>
    </tr>
     <tr>
      <td></td>
      <td><input name="update" class="btn btn-primary" type="submit" value="Edit"> <input name="batal" type="reset"  class="btn btn-danger" onClick="location.href='media.php?module=user&act=view';"value="Batal"></td>
      </tr>
		</table>
		
		</form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'hapus':
     
      mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$_GET[id]'");
      echo "<script>window.location='media.php?module=user&act=view'</script>";
      break;

    }
    ?>