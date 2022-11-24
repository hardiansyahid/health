<?php 
	if ($_GET['module']=='home') {
		include"home.php";
	}
	else if ($_GET['module']=='hub') {
		?> 
		<br>
		<br><br>
		<br>
		  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
        </div>

      </div>

     

      <div class="container">

        <?php $s=mysqli_fetch_array(mysqli_query($koneksi,"select * from menu where id_menu='2'"));
           echo $s['isi']; ?>

         

        </div>

      </div>
    </section><!-- End Contact Section -->
		 <?php
	}
	else if ($_GET['module']=='profil_puskes') {
		?> 
		<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Profil Klinik</h2>
          <p>Klinik Dr Cika Naya adalah klinik kesehatan dokter umum yang terletak di Jl. Ikan Sebelah No.21, Pesawahan, Kec. Telukbetung Selatan, Kota Bandar Lampung, Lampung 35211 </p>
        </div>

        <div class="row">
         
          <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left">
           <?php $s=mysqli_fetch_array(mysqli_query($koneksi,"select * from menu where id_menu='1'"));
           echo $s['isi']; ?>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
		 <?php
	}
	else if ($_GET['module']=='edit_profil') {
		?> 
			 <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <!-- Breadcumb Area -->
                <div class="col-12 col-md-4">
                    <h3>Edit Profil Saya</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="media.php?module=profil_saya">Edit Profil Saya</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-8">
                    
                </div>
            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
					<?php 
$result = mysqli_query($koneksi,"select * from tb_pasien where kode_pasien='$_SESSION[kode]'");
$data = mysqli_fetch_array($result);
					?>
					<form action="" method="post">
<table class="table">
		  <tr>
			<td width="120"><b>KODE PASIEN</b></td>
			<td><?php echo $data['kode_pasien']; ?></td>
		  </tr>
		  <tr>
			<td>NIK</td>
			<td><input type="text" name="nik" value="<?php echo $data['nik']; ?>" class="form-control"></td>
		  </tr>
		  <tr>
			<td>Nama Pasien</td>
			<td><input type="text" name="nama_pasien" value="<?php echo $data['nama_pasien']; ?>" class="form-control"></td>
		  </tr>
		
		  <tr>
			<td>Tgl. Lahir</td>
			<td><input type="text" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" class="form-control"></td>
		  </tr>
		  
		<tr>
		<td>Jenis Kelamin</td>
		<td>
		<input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($data['jenis_kelamin']=='Laki-laki'){echo"checked";}else{} ?>> Laki-laki
		<input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin']=='Perempuan'){echo"checked";}else{} ?>> Perempuan
		</td>
		</tr>
		
		<tr>
		<td>Pekerjaan</td>
		<td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>Alamat</td>
		<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><input type="text" name="telpon" value="<?php echo $data['telpon']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>Email</td>
		<td><input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
		<td>Berat Badan</td>
		<td><input type="number" name="bb" value="<?php echo $data['bb']; ?>" class="form-control"></td>
		</tr>
		
		<tr>
			<td><input type="submit" name="edit" value="Edit Sekarang" class="btn btn-primary"></td>
		</tr>
		
			
		</table>
		<?php 
		if (isset($_POST['edit'])) {
			mysqli_query($koneksi,"UPDATE tb_pasien SET nik='$_POST[nik]',
											  nama_pasien='$_POST[nama_pasien]',
                  							  tanggal_lahir='$_POST[tanggal_lahir]',
                  							  jenis_kelamin='$_POST[jenis_kelamin]',
                  							  pekerjaan='$_POST[pekerjaan]', 
                  							  alamat='$_POST[alamat]',
                  							  telpon='$_POST[telpon]',
                  							  bb='$_POST[bb]',
                  							  email='$_POST[email]'
                  							  WHERE username='$_SESSION[username]'");
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Diubah");
                    window.location.href="media.php?module=profil_saya";
                </script>
                <?php
		}
		 ?>
		</form>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else if ($_GET['module']=='profil_saya') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Profil Saya</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
					<?php 
$result = mysqli_query($koneksi,"select * from tb_pasien where kode_pasien='$_SESSION[kode]'");
$data = mysqli_fetch_array($result);
					?>
<table class="table">
		  <tr>
			<td width="120"><b>KODE PASIEN</b></td>
			<td><?php echo $data['kode_pasien']; ?></td>
		  </tr>
		  <tr>
			<td>NIK</td>
			<td><?php echo $data['nik']; ?></td>
		  </tr>
		  <tr>
			<td>Nama Pasien</td>
			<td><?php echo $data['nama_pasien']; ?></td>
		  </tr>
		  <tr>
			<td>Username</td>
			<td><?php echo $data['username']; ?></td>
		  </tr>
		 
		  <tr>
			<td>Tgl. Lahir</td>
			<td><?php echo $data['tanggal_lahir']; ?></td>
		  </tr>
		  
		<tr>
		<td>Jenis Kelamin</td>
		<td>
		<?php echo $data['jenis_kelamin']; ?>
		</td>
		</tr>
		
		<tr>
		<td>Pekerjaan</td>
		<td><?php echo $data['pekerjaan']; ?></td>
		</tr>
		
		<tr>
		<td>Alamat</td>
		<td><?php echo $data['alamat']; ?></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><?php echo $data['telpon']; ?></td>
		</tr>
		<tr>
		<td>Email</td>
		<td><?php echo $data['email']; ?></td>
		</tr>
		<tr>
		<td>Berat Badan</td>
		<td><?php echo $data['bb']; ?> Kg</td>
		</tr>
		<tr>
			<td><a href="?module=edit_profil"><button class="btn btn-success">Edit Profil</button></a></td>
		</tr>
		
			
		</table>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
	else if ($_GET['module']=='daftar') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Halaman Daftar Akun</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
<table class="table">
		
		<form action="" name="tes" method="post" id="daftar">
						<?php
/*pertama kita panggil colom yang akan kita gunakan untuk ID kita dengan menyaring nilai maksimum */
$sql ="SELECT MAX(RIGHT(kode_pasien,4)) AS terakhir FROM tb_pasien";
//mengecek hasil atau value yang dihasilkan dari query yang disimpan pada variable sql
  $hasil = mysqli_query($koneksi,$sql);
//memecah table hasil query
  $data = mysqli_fetch_array($hasil);
//mengambil cell atau 1 kotak bagian dari table yaitu cell id_anggota yang dialiaskan terakhir
  $lastID = $data['terakhir'];
  // baca nomor urut  id transaksi terakhir
 $lastNoUrut = (int) $lastID;
  // nomor urut ditambah 1
  $nextNoUrut = $lastNoUrut + 1;
  // membuat format nomor berikutnya
  $nextID = "PSN".sprintf("%04s",$nextNoUrut);
// selesai,,, untuk memanggil ID otomatis ini  bisa memasangkan cara
 ?>
 
 
 
 
		  <input name="kode_pasien" type="hidden" class="form-control" size="40" value="<?php echo  $nextID;?>"> 
		 
		  <tr>
			<td>NIK</td>
			<td><input name="nik" maxlength="16" onkeypress="return hanyaAngka(event)" type="text" size="40" class="form-control"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Nama Pasien</td>
			<td><input name="nama_pasien" type="text" size="40" class="form-control" required> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Username</td>
			<td><input name="username" type="text" size="40" class="form-control" required> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Password</td>
			<td><input name="password" maxlength="16" type="password" size="40" class="form-control" required> <em>harus diisi</em></td>
		  </tr>
		  
	
		  
		  <tr>
			<td>Tgl. Lahir</td>
			<td><input type="date" size="34" class="form-control" name="tanggal_lahir" title="dd-mm-yyyy"   />
		  <em>harus diisi</em></td>
		  </tr>

		<tr>
		<td>Jenis Kelamin</td>
		<td>
		<select name="jenis_kelamin" class="form-control" required>
		<option value="">-Pilih jenis kelamin-</option>
		<option>Laki-laki</option>
		<option>Perempuan</option>
		</select> <em>harus diisi</em>
		</td>
		</tr>
		
		<tr>
		<td>Pekerjaan</td>
		<td><input name="pekerjaan" type="text" class="form-control" required> <em>harus diisi</em></td>
		</tr>
		
		<tr>
		<td>Alamat</td>
		<td><input name="alamat" type="text" class="form-control" required> <em>harus diisi</em></td>
		</tr>
		
		<tr>
		<td>No. Telp</td>
		<td><input name="telpon" onkeypress="return hanyaAngka(event)" maxlength="12" type="text" class="form-control" required> <em>harus diisi</em></td>
		</tr>
		<tr>
		<td>Email</td>
		<td><input name="email" type="email" class="form-control" required> <em>harus diisi</em></td>
		</tr>
			<tr>
		<td>Berat badan</td>
		<td><input name="bb" type="number" class="form-control" placeholder="Kg..."required> <em>harus diisi</em></td>
		</tr>
		
		
				  		  <?php
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
?>
<input name="tanggal" type="hidden" size="40" value="<?php echo $tglsekarang;?>">

			  <tr>
			<td></td>
			<td><input name="simpan" type="submit" class="btn btn-primary" value="Simpan"> <input name="batal" type="reset" class="btn btn-danger" onClick="location.href='data-pasien.php';"value="Batal"></td>
		  </tr>
		</table>
                        <!-- Single Featured Post -->
    <?php
//include "koneksi.php";
/* memanggil variable dan nilai – nilai nya .*/
if(isset($_POST['simpan'])){
$kode_pasien = $_POST['kode_pasien'];
$nik = $_POST['nik'];
$nama_pasien = $_POST['nama_pasien']; 
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$tanggal = date('Y-m-d');
$no_bpjs = $_POST['no_bpjs'];
$pass = md5($_POST['password']);
$password = $_POST['password'];
$email = $_POST['email'];
$bb = $_POST['bb'];


		//memasukkan nilai nilai ke dalam table

mysqli_query($koneksi,"insert into tb_pasien values ('$kode_pasien','$nama_pasien','$_POST[username]','$nik','$tanggal_lahir','$jenis_kelamin',
'$pekerjaan','$alamat','$telpon','$email','$bb','$tanggal')");
mysqli_query($koneksi,"insert into user values(null,'$_POST[username]','$pass','pasien')");

echo"<script>window.alert('Anda berhasil mendaftar silahkan login')
window.location='index.php'</script>";




}
?>   
</form>                
					</div>
				</div>
			</div>
		</div>
	</div>
</table></div></div></div></div></div></section>
		<?php
	}
	else if ($_GET['module']=='menu') {
		?> 
			 <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
<?php 
	$sql = mysqli_query($koneksi,"select * from menu where id_menu='$_GET[id]'");
	$data = mysqli_fetch_array($sql);
 ?>
                <!-- Breadcumb Area -->
                <div class="col-12 col-md-4">
                    <h3><?php echo $data['nama_menu'] ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="media.php?module=menu&id=<?php echo $_GET['id'] ?>"><?php echo $data['nama_menu'] ?></a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-8">
                    
                </div>
            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
<?php echo $data['isi'] ?>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else if ($_GET['module']=='login') {
		?> 
		<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Halaman Login</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-4 col-lg-4">
                </div>
                <div class="col-4 col-lg-4">
                    <div class="blog-posts-area">
 <div class="newsletter-widget mb-70">
                            <h4>Silahkan isi form berikut<br></h4>
                            <form action="#" method="post">
                                <input type="text" name="username" placeholder="Username..." maxlength="20" class="form-control my-3">
                                <input type="password" name="password" placeholder="Password..." maxlength="20" class="form-control my-3">
                                <button type="submit" name="login" class="btn btn-primary">Masuk</button><hr>
								
								 <?php 
            if (isset($_POST['login'])) {
echo "<div id='info'>";
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM user,tb_pasien WHERE user.username=tb_pasien.username and user.username='$username' AND user.password='$password'";
        $hasil = mysqli_query($koneksi,$sql);
        $r = mysqli_fetch_array($hasil);
        
        if(mysqli_num_rows($hasil) == 0){
                     echo "<script> alert('username dan Password anda tidak benar silahkan login ulang');window.location='?module=login'</script>\n";
        }
        else{
        session_start();
		$_SESSION['kode']= $r['kode_pasien'];
        $_SESSION['username']= $r['username'];
        $_SESSION['password']= $r['password'];
       echo "<script> alert('Anda berhasil login');window.location='index.php'</script>\n";
         exit(0);
        }
echo "</div>";
    }?>
                            </form>

                        </div>   
                         Belum punya akun?  <a href="?module=daftar"><button class="btn btn-success">Daftar Akun Disini</button></a>                     <!-- Single Featured Post -->
               
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
	else if ($_GET['module']=='poli') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Daftar Poli</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
<table id="example1" class="table table-bordered table-striped">
                <tr>
                <th>No.</th>
                <th>Nama Poli</th>
             
                </tr>
                
                <?php              
				$result = mysqli_query($koneksi,"select * from tb_poli");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><b><?php echo $data['nama_poli']; ?></b><br>
                	<table class="table">
				List Dokter :<br>
					<?php 
					$r = mysqli_query($koneksi,"select * from tb_unitmedis where id_poli='$data[id_poli]'");
					while($dd = mysqli_fetch_array($r)){
						?> 

						
							<tr>
								<td>Nama Dokter</td>
								<td>:</td>
								<td><?php echo $dd['nama_unitmedis'] ?> </td>
								
							</tr>
						

						  




						  <?php
					}
					?>
					</table>
				</td>
               </tr>
			<?php
                                $no++;
                }
                ?>
                
                
                </table>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
	
	else if ($_GET['module']=='chat') {
		?> 
			 <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
<?php 
                    	$sq = mysqli_query($koneksi,"select * from tb_unitmedis where id_unitmedis='$_GET[id]'");
                    	$da = mysqli_fetch_array($sq);
                    	 ?>
                <!-- Breadcumb Area -->
                <div class="col-12 col-md-8">
                    <h3>Halaman Chat Dokter <?php echo $da['nama_unitmedis'] ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Halaman Chat Dokter</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-4">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                		<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Isi chat</label>
    <textarea name="isi" class="form-control" placeholder="Apa yang ingin anda tanyakan..."></textarea>
    <small id="emailHelp" class="form-text text-muted">chat akan disampaikan ke dokter <?php echo $da['nama_unitmedis'] ?>.</small>
  </div>
 
  <button type="submit" name="kirim" class="btn btn-success">Kirim Pesan</button>
  <?php 
  if(isset($_POST['kirim'])){
  	date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y H:i:s');
  	mysqli_query($koneksi,"insert into chat values(null,'$_SESSION[kode]','$_GET[id]','$_POST[isi]','$tanggal','Belum terbalas')");
  	?> 
  	<script type="text/javascript">
  		alert('Pesan anda berhasil dikirim, Harap sabar untuk menunggu balasan dari Dokter');
  		window.location.href="?module=chat&id=<?php echo $_GET['id'] ?>";
  	</script>
  	 <?php
  }
   ?>
</form>
                </div>
                <div class="col-md-6">
                	<center>History Pesan</center>
                	<table class="table">
                		<?php 
                		$sql = mysqli_query($koneksi,"select * from chat,tb_pasien where chat.kode_pasien=tb_pasien.kode_pasien and chat.kode_pasien='$_SESSION[kode]'");
                		while($data = mysqli_fetch_array($sql)){
                			?> 
                			<tr>
                				<td>
                					
                						<div class="alert alert-primary" role="alert">
                							<div class="row">
                						<div class="col-md-6">
                							<b><?php echo $data['nama_pasien'] ?></b>
                						</div>
                						<div class="col-md-6">
                							<small><?php echo $data['tanggal'] ?></small>
                						</div>
                						</div>
                						
										  <?php echo $data['isi'] ?>
										  <br>
										  <i>Balasan :</i><br>

										  <?php 
										  $sql_b = mysqli_query($koneksi,"select * from balasan where id_chat='$data[id_chat]'");
										  $da_b = mysqli_fetch_array($sql_b);
										  $di = mysqli_num_rows($sql_b);
										  if($di=='1'){
										  	?> <?php echo $da_b['isi_balasan'] ?> <?php
										  }else{
										  	?> <i><small>Masih menunggu jawaban dokter</i> </small><?php
										  }
										   ?>

										</div>
                					
                					
                				</td>
                			</tr>
                			 <?php
                		}
                		 ?>
                		
                		
                	</table>
                </div>
            </div>
         </div>
     </div>
 <?php } 



	else if ($_GET['module']=='praktik') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Jadwal Praktik dan Daftar</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
<table id="example1" class="table table-bordered table-striped">
                <tr>
                <th>No.</th>
                <th>Nama Poli</th>
				<th>Lihat</th>
             
                </tr>
                
                <?php              
				$result = mysqli_query($koneksi,"select * from tb_poli");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><b><?php echo $data['nama_poli']; ?>
				</td>
				<td>
					<a href="?module=jadwal&id=<?php echo $data['id_poli'] ?>"><button class="btn btn-primary">Lihat</button></a>
				</td>
				
               </tr>
			<?php
                                $no++;
                }
                ?>
                
                
                </table>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
	else if ($_GET['module']=='jadwal') {
		?> 
			 <br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Jadwal Praktik dan Daftar</h2>
        </div>
       
<?php 
	$result = mysqli_query($koneksi,"select * from tb_poli where id_poli='$_GET[id]'");
     $data = mysqli_fetch_array($result);
 ?>
                <!-- Breadcumb Area -->
                <div class="col-12 col-md-8">
                    <h3>Jadwal Praktik <?php echo $data['nama_poli'] ?> dr Cika Naya</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="media.php?module=poli">Daftar Spesialis dr Cika Naya</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-4">
                    
                </div>
            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area"><div class="table-responsive">
<table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Hari</th>
						<th>Jam</th>
                        <th>Poli</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM `jadwal_dokter`,`detail_jadwal`,`tb_poli`,`tb_unitmedis`
					where tb_poli.id_poli=tb_unitmedis.id_poli and tb_poli.id_poli='$_GET[id]' and jadwal_dokter.id_unitmedis=tb_unitmedis.id_unitmedis 
					and jadwal_dokter.id_jadwal=detail_jadwal.id_jadwal order by jadwal_dokter.id_jadwal desc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo $no++ ;?></td>
                        <td><?php echo "$r[nama_unitmedis]"?></td>
                        <td><?php echo "$r[hari]"?></td>
						<td><?php echo "$r[jam]"?> Wib</td>
                        <td><?php echo $r['nama_poli'] ?></td>
    
                       
                         <td>
                         	<?php 
                         	if ($_SESSION['username']=='') {
                         		?> 
                         		<a href="?module=lihat_jadwal&id=<?php echo $r['id_detail']?>"><button type="button" class="btn btn-success"><i class = "fa fa-eye"></i> Lihat</button></a>
                         		
                         		 <?php
                         	}else{
                         		?> 
                         		<a href="?module=lihat_jadwal&id=<?php echo $r['id_detail']?>"><button type="button" class="btn btn-success"><i class = "fa fa-eye"></i> Lihat</button></a>
                         		<a href="?module=pilih_jadwal&id=<?php echo $r['id_detail']?>&hari=<?php echo $r['hari'] ?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?');"><i class = "fa fa-send"></i> Pilih</button></a>
                         		 <?php
                         	}
                         	 ?>
                         	
                         	</td>
                        </tr>

                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                  </div>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else if ($_GET['module']=='pilih_jadwal') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pilih Jadwal</h2>
        </div>
       
            <div class="row h-100 align-items-center">
<?php 
	$result = mysqli_query($koneksi,"SELECT * FROM `jadwal_dokter`,`detail_jadwal`,`tb_poli`,`tb_unitmedis`
					where tb_poli.id_poli=tb_unitmedis.id_poli and detail_jadwal.id_detail='$_GET[id]' and jadwal_dokter.id_unitmedis=tb_unitmedis.id_unitmedis and jadwal_dokter.id_jadwal=detail_jadwal.id_jadwal");
     $dat = mysqli_fetch_array($result);
 ?>
                <!-- Breadcumb Area -->
                <div class="col-12 col-md-8">
                    <h3>Praktik <?php echo $dat['nama_unitmedis'] ?> dr Cika Naya</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="media.php?module=pilih_jadwal&id=<?php echo $_GET['id'] ?>">Praktik <?php echo $dat['nama_unitmedis'] ?> dr Cika Naya</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-4">
                    
                </div>
            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
	<form action="" name="" method="post" id="form1" enctype="multipart/form-data">
		
		
		
		
		
		

		<table class="table">
		
		
		
				<?php
  $today = date('Ymd');
        // baca id member dari form proses.php
$id = $_POST&#91;'id'&#93;;
 
// baca jumlah pembayaran dari form proses.php
$jumlah = $_POST&#91;'jumlah'&#93;;
 
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = "SELECT max(no_reg) AS last FROM tb_kunjungan where id_poli='$dat[id_poli]'";
$hasil = mysqli_query($koneksi,$query);
$data  = mysqli_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
 
// baca nomor urut transaksi dari id transaksi terakhir 
$lastNoUrut = substr($lastNoTransaksi, 10, 4); 
 
// nomor urut ditambah 1
$nextNoUrut = $lastNoUrut + 1;
 $kode_poli = $dat['kode'];
// membuat format nomor transaksi berikutnya
$noreg= $kode_poli.$today.sprintf('%04s', $nextNoUrut);
// selesai,,, untuk memanggil ID otomatis ini  bisa memasangkan cara
 ?>
 
 
 
		  <tr>
			<td width="120"><b>No. Reqistrasi - <?php echo $lastNoUrut ?></b></td>
			<td><input name="no_ndut" type="text" size="40" value="<?php echo  $noreg;?>" disabled> <em><font color="red">Otomatis</font></em></td>
			<input name="no_reg" type="hidden" size="40" value="<?php echo  $noreg;?>">
		  </tr>

		 
		  
		  
		  		 
		   <tr>
		<td>Unit Tujuan</td>
		<td>
		<input type="text" disabled name="namapoli" value="<?php echo $dat['nama_poli'] ?>">
		<input type="hidden" name="poli" value="<?php echo $dat['id_poli'] ?>">
		</td>
		</tr>
		<tr>
			<td>Tgl. Berobat</td>
			<td><input name="tgl_berobat" type="date">
				<script>
  var today = new Date().toISOString().split('T')[0];
document.getElementsByName("tgl_berobat")[0].setAttribute('min', today);
</script><br>
<small><i><font color="red">Pastikan anda memilih hari <?php echo $_GET['hari'] ?></font></i></small>
</td>
		  </tr>
		  
	<script>
function tampilkan(){
  var pendaftaran=document.getElementById("form1").jenis.value;
  if (pendaftaran=="BPJS")
    {
        document.getElementById("tampil").innerHTML="<select id='tampil' name='tampil'><option value=''>-Detail-</option><option value='BPJS'>BPJS</option></select><input type='file' name='file_bpjs' required> <input type='number' name='no_kartu' placeholder='Nomor Kartu...' required>";
    }
  else if (pendaftaran=="UMUM")
    {
        document.getElementById("tampil").innerHTML="<select id='tampil' name='tampil'><option value='Berbayar'>Berbayar</option></select>";
    }
}
</script>	  

		  <tr>
		  	<td>Jenis Pendaftaran</td>
		  	
		  	<td>
		  		<select name="jenis" id="jenis" required style="width:263px" onchange="tampilkan()">
		  			<option value="">-Pilih Jenis-</option>
		  			<option value="BPJS">BPJS</option>
		  			<option value="UMUM">UMUM</option>
		  		</select>
		  	</td>
		  </tr>
		  <tr>
		  	<td>Detail</td>
		  	
		  	<td><div id='tampil'></div>
		  		
		  	</td>
		  </tr>
		  <tr>
		  		<td colspan='2'><font color="red">**maksimal kunjungan berobat adalah 20 pasien per jadwal Dokter</font></td>
		  </tr>
		  
		 
		
		
		
		
					
		
		
		

		
		
			  <tr>
			<td></td>
			<td><input name="simpan" class="btn btn-success" type="submit" value="Simpan"> <input name="batal" type="reset" class="btn btn-danger" onClick="location.href='data-kunjungan.php';"value="Batal"></td>
		  </tr>
		</table>
	 
		<?php
//include "koneksi.php";
/* memanggil variable dan nilai – nilai nya .*/
if(isset($_POST['simpan'])){
$no_reg = $_POST['no_reg'];
$tgl_reg = date('Y-m-d'); 
$jenis = $_POST['jenis'];
$detail = $_POST['tampil'];


$daftar_hari = array(
 'Sunday' => 'Minggu',
 'Monday' => 'Senin',
 'Tuesday' => 'Selasa',
 'Wednesday' => 'Rabu',
 'Thursday' => 'Kamis',
 'Friday' => 'Jumat',
 'Saturday' => 'Sabtu'
);
$tanggal_pilih= $_POST['tgl_berobat'];
$namahari = date('l', strtotime($tanggal_pilih));
$hari = $daftar_hari[$namahari];
if($hari==$_GET['hari']){




$dd = mysqli_query($koneksi,"select * from tb_kunjungan where tgl_berobat='$_POST[tgl_berobat]' and id_detail='$_GET[id]' and id_poli='$_POST[poli]'");
$tt = mysqli_num_rows($dd);

$date = date('Y-m-d');
if($_POST['tgl_berobat']==$date){
	echo"<script>window.alert('Pendaftaran minimal dilakukan Lebih dari 1 Hari')
window.location='?module=pilih_jadwal&id=$_GET[id]'</script>";
}
else if($tt>=20){
	echo"<script>window.alert('Kunjungan pada poli tersebut sudah penuh')
window.location='?module=pilih_jadwal&id=$_GET[id]'</script>";
}
else{




$tanggal_pilih= new DateTime($_POST['tgl_berobat']);
$tanggal_sekarang = new DateTime();
$jarak_hari = $tanggal_sekarang->diff($tanggal_pilih)->format("%a");
if($jarak_hari >= 15){
	?> 
	                <script type="text/javascript">
	                    alert ("Tanggal yang anda pilih lebih dari 14 hari dari hari ini");
	                    window.location.href="?module=pilih_jadwal&id=<?php echo $_GET[id]?>&hari=<?php echo $_GET[hari] ?>";
	                </script>
	            <?php
}else{
		//memasukkan nilai nilai ke dalam table
		 $sumber = @$_FILES['file_bpjs']['tmp_name'];
	        $target ='img/';
	        $nama_gambar = @$_FILES['file_bpjs']['name'];
	if($nama_gambar=='')
	{
			mysqli_query($koneksi,"insert into tb_kunjungan values ('$no_reg','$tgl_reg','$_POST[tgl_berobat]','$jenis','Online','$detail','','','$_POST[poli]','$_SESSION[kode]','$_GET[id]')");
		echo"<script>window.alert('Data Sudah Tersimpan')
		window.location='?module=history'</script>";
	}
	else

	{
		$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
	          if ($pindah)
	          {
	                $query = mysqli_query($koneksi,"insert into tb_kunjungan values ('$no_reg','$tgl_reg','$_POST[tgl_berobat]','$jenis',
	                	'$_POST[jenis_pemeriksaan]','$detail','$nama_gambar','$_POST[no_kartu]','$_POST[poli]','$_SESSION[kode]','$_GET[id]')");
	                 ?> 
	                <script type="text/javascript">
	                    alert ("Data Berhasil Disimpan");
	                    window.location.href="?module=history";
	                </script>
	            <?php
	          }else{
	            ?> 
	                <script type="text/javascript">
	                    alert ("Eror");
	                    window.location.href="?module=pilih_jadwal&id=<?php echo $_GET[id]?>&hari=<?php echo $_GET[hari] ?>";
	                </script>
	            <?php
	          }
	}
}

		



        

}

//$simpon = mysqli_query("insert into t_keluarga_aset(no_ktp,menurut_dinding,menurut_lantai,menurut_atap,kategori) values ('$no_ktp','$dinding
//','$lantai','$atap','$kategori')");





}else{


	 ?> 
                <script type="text/javascript">
                    alert ("Pastikan anda hanya memilih hari <?php echo $_GET['hari'] ?>");
                </script>
            <?php


}














}
?>
		
				
		
		
		
		
		
		
		
		</form>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else if ($_GET['module']=='history') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>History Kunjungan</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
             <div class="table-responsive">           
 <table class="table">
                <tr>
                <th>No.</th>
				<th>No. Reg</th>
                <th>Tgl. Registrasi</th>
                <th>Unit Tujuan</th>
				<th>Nama Pasien</th>
					<th>Dokter</th>
					<th>Tanggal berobat</th>
					<th>Hari</th>
					<th>Keadaaan</th>
					<th>Jam</th>
					<th>Cetak</th>
					<th>Keterangan</th>
               
                </tr>
                
                <?php
                
$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,
tb_pasien,tb_poli,jadwal_dokter,tb_unitmedis,detail_jadwal 
WHERE jadwal_dokter.id_jadwal=detail_jadwal.id_jadwal 
and tb_kunjungan.id_detail=detail_jadwal.id_detail 
and jadwal_dokter.id_unitmedis=tb_unitmedis.id_unitmedis 
and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien 
AND tb_poli.id_poli=tb_kunjungan.id_poli 
AND tb_kunjungan.kode_pasien='$_SESSION[kode]' order by tb_kunjungan.no_reg desc");
                $no = 1;

                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['no_reg']; ?></td>
                <td><?php echo $data['tgl_reg']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
              <td><?php echo $data['nama_unitmedis']; ?></td>
			  <td><?php echo $data['tgl_berobat']; ?></td>
			  <td><?php echo $data['hari']; ?></td>
				<td><?php echo $data['keadaan']; ?></td>
				<td><?php echo $data['jam']; ?></td>
				<td><a target="_blank" href="cetak.php?id=<?php echo $data['id_detail'] ?>&no=<?php echo $data['no_reg'] ?>"><button class="btn btn-primary">Cetak</button></a></td>
				<td>
					<?php 
					$tgl = $data['tgl_berobat'];
					$tanggal1 = new DateTime($tgl);
					$tanggal2 = new DateTime();
	 					
	 				if ($tanggal1 > $tanggal2) {
	 					?> <a href="?module=batal&id=<?php echo $data['no_reg'] ?>" onclick="return confirm('Apakah anda yakin akan membatalkan?');"><button class="btn btn-danger">Batal</button></a> <?php
	 				}else{
	 					?> <button class="btn btn-primary">Selesai</button> <?php
	 				}


					 ?>
				</td>
			</tr>
			<?php
                                $no++;
                }
                ?>
                
                
                </table>
                </div>
                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
	else if ($_GET['module']=='batal') {
		mysqli_query($koneksi,"DELETE FROM tb_kunjungan WHERE no_reg='$_GET[id]'");
		?> 
                <script type="text/javascript">
                    alert ("berhasil dibatalkan");
                    window.location.href="media.php?module=history";
                </script>
            <?php
	}
	else if ($_GET['module']=='kunjungan') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Daftar Kunjungan Pasien</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">

                        
		
	<form action="" method="get">
		 <div class="row">
	 
		<div class="col-md-3">
			<select name="poli" class="form-control" required>
				<option value="">-Filter berdasarkan Poli-</option>
				<?php 
					$sq = mysqli_query($koneksi,"select * from tb_poli");
					while($da = mysqli_fetch_array($sq)){
						?> <option value="<?php echo $da['id_poli'] ?>"><?php echo $da['nama_poli'] ?></option> <?php
					}
				?>
			</select>
		</div>
		<div class="col-md-3">
			<input type="date" name="tanggal" class="form-control">
		</div>
		<div class="col-md-3">
			<input type="submit" name="filter" value="Filter" class="btn btn-success">
			<input type="hidden" name="module" value="kunjungan" class="btn btn-success">
			<input type="hidden" name="act" value="view" class="btn btn-success">
		</div>
		</form>
		</div>
		</div>
	</div>
		<hr>
	
    <div class="box-header">
   
	</div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
               
                <tr>
                <th>No.</th>
				<th>No. Reg</th>
                <th>Tgl. Reg</th>
				<th>Tgl. Berobat</th>
                <th>Unit Tujuan</th>
                <th>Kode Pasien</th>
				<th>Nama Pasien</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
                </tr>
                
                <?php
				

                $no = 1;
                
             
                
					if($_GET['poli']==''){
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien");
					}else{
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and tb_poli.id_poli='$_GET[poli]' and tb_kunjungan.tgl_berobat='$_GET[tanggal]'");
					}
				
				
				

				
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['no_reg']; ?></td>
                <td><?php echo $data['tgl_reg']; ?></td>
				<td><?php echo $data['tgl_berobat']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
				<td><?php echo $data['kode_pasien']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
                <td><a href="?module=kunjungan&act=lihat&no_reg=<?php echo $data['no_reg']; ?>">
			</tr>
			<?php
                                $no++;
                }
                ?>
                
                
                </table>
                </form>
                       
					
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
	else if ($_GET['module']=='lihat_jadwal') {
		?> 
			 <br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>lihat</h2>
        </div>
    

                <!-- Breadcumb Area -->
                <div class="col-12 col-md-12">
                	<?php 
                	$sq = mysqli_query($koneksi,"select * from detail_jadwal,jadwal_dokter,tb_unitmedis,tb_poli where tb_poli.id_poli=jadwal_dokter.id_poli and tb_unitmedis.id_unitmedis=jadwal_dokter.id_unitmedis and detail_jadwal.id_jadwal=jadwal_dokter.id_jadwal and detail_jadwal.id_detail='$_GET[id]'");
                	$da = mysqli_fetch_array($sq);
                	 ?>
                    <h3>Daftar Kunjungan <?php echo $da['nama_poli'] ?> Oleh <?php echo $da['nama_unitmedis']  ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Detail Jadwal</a></li>
                            <li class="breadcrumb-item"><a href="#">
                            	Keadaan <?php echo $da['keadaan'] ?>, Hari <?php echo $da['hari'] ?> Jam <?php echo $da['jam'] ?>
                            </a></li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">

                        
		
	<form action="" method="get">
		 <div class="row">
	 
		
		</form>
		</div>
		</div>
	</div>
		<hr>
	
    <div class="box-header">
   
	</div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
              	<form action="" method="get">
		 <div class="row">
	 
		
		<div class="col-md-3">
			<input type="date" name="tanggal" class="form-control">
		</div>
		<div class="col-md-3">
			<input type="submit" name="filter" value="Filter" class="btn btn-success">
			<input type="hidden" name="module" value="lihat_jadwal" class="btn btn-success">
			<input type="hidden" name="id" value="<?php echo $_GET[id] ?>" class="btn btn-success">
		</div>
	</div>
		</form>
                  <div class="box-body">

                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
               
                <tr>
                <th>No.</th>
				<th>No. Reg</th>
				<th>Tgl. Berobat</th>
                <th>Unit Tujuan</th>
                <th>Kode Pasien</th>
				<th>Nama Pasien</th>
				<th>Jns. Kelamin</th>
				<th>Alamat</th>
                </tr>
                
                <?php
				

                $no = 1;
					if ($_GET['filter']=='') {
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and detail_jadwal.id_detail='$_GET[id]'");
					}else{
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and detail_jadwal.id_detail='$_GET[id]' and tb_kunjungan.tgl_berobat='$_GET[tanggal]'");
					}
						
					
				
				
				

				
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['no_reg']; ?></td>
				<td><?php echo $data['tgl_berobat']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
				<td><?php echo $data['kode_pasien']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
			</tr>
			<?php
                                $no++;
                }
                ?>
                
                
                </table>
                </form>
                       
					
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else if ($_GET['module']=='profil') {
		?> 
			 <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <!-- Breadcumb Area -->
                <div class="col-12 col-md-4">
                    <h3>Profil Sekolah</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="media.php?module=profil">Profil Sekolah</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-8">
                    
                </div>
            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                       
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else if ($_GET['module']=='rekam') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Halaman Rekam Medis</h2>
        </div>
       </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
                        <div class="table-responsive">
<table id="example1" class="table table-bordered table-striped">
								<tr>
									<th colspan="6"><center>History Rekam Medis </center></th>
								</tr>
								<tr>
									<th>No.</th>
									<th>Tanggal Rekam Medis</th>
									<th>Nama Dokter</th>
									<th>Gejala</th>
									<th>Diagnosa</th>
									<th>Keterangan</th>
									<th>Resep</th>
								</tr>
								<?php 
								
								$sql = mysqli_query($koneksi,"select * from tb_rekmed,tb_unitmedis where tb_rekmed.id_unitmedis=tb_unitmedis.id_unitmedis and tb_rekmed.kode_pasien='$_SESSION[kode]' order by tb_rekmed.no_rekmed desc");
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
										<td><?php echo $data['tanggal'] ?></td>
										<td><?php echo $data['nama_unitmedis'] ?></td>
										<td><?php echo $data['diagnosa1'] ?></td>
										<td><?php echo $data['diagnosa2'] ?></td>
										<td><?php echo $data['keterangan'] ?></td>

										<td><a href="#" data-bs-toggle="modal" data-bs-target="#obat<?php echo $data['no_rekmed'] ?>"><button class="btn btn-success"><i class="fa fa-eye"></i></button></a>
										
<!-- Modal -->
<div class="modal fade" id="obat<?php echo $data['no_rekmed'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
                    <thead>
                <tr>
                <th>No.</th>
                <th>Kode Obat</th>
                <th>Jenis</th>
                <th>Nama Obat</th>
                <th>Dosis</th>
                </tr>
              </thead>
              <tbody>
                
                <?php              
				$r = mysqli_query($koneksi,"select * from obat,resep where obat.id_obat=resep.id_obat and resep.no_rekmed='$data[no_rekmed]'");
                $noo = 1;
                while ($d = mysqli_fetch_array($r)) {
                ?>
            <tr>
                <td><?php echo $noo++; ?></td>
                <td><?php echo $d['kode_obat']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <td><?php echo $d['nama_obat']; ?></td>
                <td><?php echo $d['dosis']; ?></td>
                 
	  
  
               </tr>
			<?php
                                $n++;
                }
                ?>
                </tbody>
                
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

										</td>
									</tr>
									<?php
								}
								
								}
								?>
								
							</table>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
	}
	else if ($_GET['module']=='artikel_saya') {
		?> 
			 <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <!-- Breadcumb Area -->
                <div class="col-12 col-md-4">
                    <h3>Artikel Saya</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="media.php?module=artikel_saya">Artikel Saya</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-8">
                    
                </div>
            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
<a href="?module=tambah_artikel"><button class="btn btn-success">Buat Artikel Baru</button></a><br><hr>
                        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
						<th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Gambar</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM `artikel`,`kategori`,`siswa` where siswa.Nis=artikel.Nis and artikel.id_kategori=kategori.id_kategori and siswa.Nis='$_SESSION[nis]' order by artikel.id_artikel desc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo $no++ ;?></td>
                        <td><?php echo "$r[judul]"?></td>
						<td><?php echo "$r[nama_kategori]"?></td>
                        <td><?php echo "$r[Nama]"?></td>
                        <td><?php echo "$r[tanggal]"?></td>
                        <td><img src="img/<?php echo $r['gambar'] ?>" width="75"></td>
                        <td><?php echo $r['status'] ?></td>
    
                       
                       </tr>

                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                       
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else if ($_GET['module']=='tambah_artikel') {
		?> 
			 <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <!-- Breadcumb Area -->
                <div class="col-12 col-md-4">
                    <h3>Buat Artikel Baru</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="media.php?module=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="media.php?module=tambah_artikel">Buat Artikel</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-8">
                    
                </div>
            </div>
        </div>
    </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
	<form role="form" method ="POST" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul Artikel</label>
                      <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul artikel" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                      <select name="kategori" class="form-control">
						<option value="">-Pilih kategori-</option>
						<?php 
						$sq = mysqli_query($koneksi,"select * from kategori");
						while($da = mysqli_fetch_array($sq)){
							?> <option value="<?php echo $da['id_kategori'] ?>"><?php echo $da['nama_kategori'] ?></option> <?php
						}
						?>
					  </select>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Isi Artikel</label>
                      <textarea name="isi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <input type="file" name="gambar">
                    </div>
					
                   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-primary">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  <?php 
					if (isset($_POST['add'])) 
      {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y H:i:s');

        $sumber = @$_FILES['gambar']['tmp_name'];
        $target ='img/';
        $nama_gambar = @$_FILES['gambar']['name'];

        $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
          if ($pindah)
          {
                $query = mysqli_query($koneksi,"INSERT INTO artikel VALUES (null,'$_POST[judul]',
				'$_POST[kategori]','$_SESSION[nis]','$tanggal',
                  '$_POST[isi]','','','$nama_gambar','waiting')");
                 ?> 
                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan");
                    window.location.href="media.php?module=artikel_saya";
                </script>
            <?php
          }else{
            ?> 
                <script type="text/javascript">
                    alert ("Eror");
                    window.location.href="media.php?module=artikel_saya";
                </script>
            <?php
          }
      }
				  ?>
            </form>
                       
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	
	else if ($_GET['module']=='detail') {
		?> 
			<br>
		<br><br>
		<br>
		 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Detail Artikel</h2>
        </div>
	<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
<?php 
			$sq = mysqli_query($koneksi,"select * from artikel,kategori where kategori.id_kategori=artikel.id_kategori 
			and artikel.status='share' and artikel.id_artikel='$_GET[id]'");
			$dat = mysqli_fetch_array($sq);
				?> 
                        <!-- Single Featured Post -->
                        <div class="single-blog-post-details">
                            <div class="post-thumb">
                                <img src="img/<?php echo $dat['gambar'] ?>" width="100%" alt="">
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-catagory"><?php echo $dat['nama_kategori'] ?></a>
                                <h2 class="post-title"><?php echo $dat['judul'] ?></h2>
                                <div class="post-meta">

                                    <!-- Post Details Meta Data -->
                                    <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                                        <!-- Post Author & Date -->
                                        <div class="post-authors-date">
                                            <p class="post-author">By <a href="#">dr Cika Naya</a></p>
                                            <p class="post-date"><?php echo $dat['tanggal'] ?></p>
                                        </div>
                                        <!-- View Comments -->
                                        
                                    </div>

                                    <p><?php echo $dat['isi'] ?></p>
                                </div>
                            </div>
                            
                        </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
 ?>