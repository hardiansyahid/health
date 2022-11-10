<?php
//if(empty($_SESSION['kunjunganname'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kasmasuk //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data kunjungan </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=kunjungan&act=view">kunjungan</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
		<?php 
	if($_SESSION['leveluser']=='admin'){
		?> 
		
    
	
		 <div class="row">
	 <form action="" method="get">
		<div class="col-md-3">
			<select name="poli" class="form-control">
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
		<?php
	}else{
		?> 
		<div class="row">
		<form action="" method="get">
		
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
		<?php
	}
	?>
	
    <div class="box-header">
   
	</div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                <th>No.</th>
				<th>No. Reg</th>
				<th>Tgl. Berobat</th>
                <th>Unit Tujuan</th>
				<th>Nama Pasien</th>
				<th>Jenis Pendaftaran</th>
				<th>Detail</th>
				<th>Nomor Kartu</th>
				<th>File BPJS</th>
				<th>Rujukan</th>
                <th>Aksi</th>
				<th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
				

                $no = 1;
				if($_SESSION['leveluser']=='admin'){
					if($_GET['poli']==''){
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien order by tb_kunjungan.no_reg desc");
					}else{
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and tb_poli.id_poli='$_GET[poli]' and tb_kunjungan.tgl_berobat='$_GET[tanggal]'");
					}
				}else{
					$s = mysqli_query($koneksi,"select * from tb_unitmedis where username='$_SESSION[namauser]'");
					$d = mysqli_fetch_array($s);
					if($_GET['tanggal']==''){
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and tb_kunjungan.id_poli='$d[id_poli]'");
					}else{
						$result = mysqli_query($koneksi,"SELECT * FROM tb_kunjungan,tb_pasien,tb_poli,detail_jadwal WHERE tb_kunjungan.id_detail=detail_jadwal.id_detail and
						tb_poli.id_poli=tb_kunjungan.id_poli and tb_kunjungan.kode_pasien = tb_pasien.kode_pasien and tb_kunjungan.id_poli='$d[id_poli]' and tb_kunjungan.tgl_berobat='$_GET[tanggal]'");
					}
					
				}
				
				

				
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
				<td><?php echo $data['no_reg']; ?></td>
				<td><?php echo $data['tgl_berobat']; ?></td>
                <td><?php echo $data['nama_poli']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
				<td><?php echo $data['jenis_pendaftaran']; ?></td>
				<td><?php echo $data['detail']; ?></td>
				<td><?php echo $data['no_kartu']; ?></td>
				
				<td>
						<?php 
						if($data['file_bpjs']==''){
							echo"-";
						}else{
							?><a target="_blank" href="../img/<?php echo $data['file_bpjs'] ?>">Lihat</a> <?php
						}
						?>
				</td>







				<td>

					<?php 
					$sy = mysqli_query($koneksi,"select * from tb_rujukan where no_reg='$data[no_reg]'");
					$dy = mysqli_fetch_array($sy);
					if($dy>='1'){
						?> 
						<a target="_blank" href="cetak_rujukan.php?id=<?php echo $dy['id_rujukan'] ?>"><button class="btn btn-primary"><i class="fa fa-print"></i> Print</button></a>
						 <?php
					}else{
						?> 
							<a href="#" data-toggle="modal" data-target="#r<?php echo $data['no_reg'] ?>">
				<button class="btn btn-success">Rujukan</button></a>
				<!-- Modal -->
<div class="modal fade" id="r<?php echo $data['no_reg'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-xl">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM RUJUKAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="rujukan.php" method="post">
      		<input type="hidden" name="id" value="<?php echo $data['no_reg'] ?>">

      		<div class="row">
      			<div class="col-md-6">
      				 <div class="form-group">
			        	<label>No Rujukan</label><br>
			        	<input type="text" name="no_rujuk" class="form-control" required="">
			        </div>
			        <div class="form-group">
			        	<label>Rumah Sakit</label><br>
			        	<input type="text" name="rs" class="form-control" required="">
			        </div>
			        <div class="form-group">
			        	<label>Alasan</label><br>
			        	<textarea name="alasan" class="form-control" required=""></textarea>
			        </div>
			        <div class="form-group">
			        	<label>Alasan Lain</label><br>
			        	<textarea name="alasan_lain" class="form-control"></textarea>
			        </div>
			        <div class="form-group">
			        	<label>Anamnesi</label><br>
			        	<textarea name="anamnesi" class="form-control"></textarea>
			        </div>
      			</div>
      			<div class="col-md-6">
      				
			        <div class="form-group">
			        	<label>Pemeriksaan Fisik</label><br>
			        	<input type="time" name="pemeriksaan" class="form-control" required="">
			        </div>
			        <div class="form-group">
			        	<label>Tanda Vital</label><br>
			        	<textarea name="tanda_vital" class="form-control"></textarea>
			        </div>
			        <div class="form-group">
			        	<label>Diagnosa</label><br>
			        	<textarea name="diagnosa_sementara" class="form-control"></textarea>
			        </div>
			        <div class="form-group">
			        	<label>Tindakan</label><br>
			        	<textarea name="tindakan" class="form-control"></textarea>
			        </div>
      			</div>
      		</div>
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="kirim" class="btn btn-primary">Simpan</button>
      </div>
  </form>
    </div>
  </div>
</div>




						 <?php
					}
					 ?>
					
					



				














			</td>


				<?php 
				$cek = mysqli_query($koneksi,"select * from tb_rekmed where no_reg='$data[no_reg]'");
				$ada = mysqli_num_rows($cek);
				if($ada=='1'){
					?> 
					<td><a href="?module=kunjungan&act=lihat&no_reg=<?php echo $data['no_reg']; ?>">
				<button class="btn btn-success">Lihat Rekmed</button></a></td>
					 <?php
				}else{
					?> 
					<td><a href="?module=kunjungan&act=lihat&no_reg=<?php echo $data['no_reg']; ?>">
				<button class="btn btn-primary">Input Rekmed</button></a></td>
					 <?php
				}
				 ?>
                



				 <td><a href="?module=kunjungan&act=delete&id=<?php echo $data['no_reg']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i> Hapus</button></a></td>
                        
				
			</tr>
			<?php
                                $no++;
                }
                ?>
                
                </tbody>
                </table>
                </form>
			  <br/><br/><br/><br/>
			  

			  
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
      case 'lihat':
      if (isset($_POST['add'])) {
		  
			 mysqli_query($koneksi,"INSERT INTO kunjungan VALUES (null,'$_POST[kunjungan]')");

                 ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Disimpan");
                    window.location.href="media.php?module=kunjungan&act=view";
                </script>
            <?php
		 
                
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Detail Rekam Medis Pasien</h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=masuk&act=view">Data kunjungan</a></li>
            <li class="active"><a href="#">Detail Rekam Medis Pasien</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
	<?php 
		$s = mysqli_query($koneksi,"select * from tb_kunjungan where no_reg='$_GET[no_reg]'");
		$r = mysqli_fetch_array($s);
		$kode = $r['kode_pasien'];
	?>
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form stakunjungan -->
					<div class="row">
					<div class="col-md-6">
					
						<table class="table">
						<tr>
							<th colspan="3"><center>Biodata Pasien </center></th>
						</tr>
						<?php 
						$pa = mysqli_query($koneksi,"select * from tb_pasien where kode_pasien='$kode'");
						$pp = mysqli_fetch_array($pa);
						?>
						<tr>
							<td>Kode Pasien</td>
							<td>:</td>
							<td><?php echo $pp['kode_pasien'] ?></td>
						</tr>
						<tr>
							<td>Nama Pasien</td>
							<td>:</td>
							<td><?php echo $pp['nama_pasien'] ?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?php echo $pp['jenis_kelamin'] ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $pp['alamat'] ?></td>
						</tr>
						<tr>
							<td>Telpon</td>
							<td>:</td>
							<td><?php echo $pp['telpon'] ?></td>
						</tr>
						
						<?php 
						$cek = mysqli_query($koneksi,"select * from tb_rekmed where no_reg='$_GET[no_reg]'");
				$ada = mysqli_num_rows($cek);
				if($ada=='1'){
					?> 
					<tr>
						<th colspan="3"><center><b>Rekam Medis Sudah dibuat</b></center></th>
					
					</tr>
				    </table>
					 <?php
				}else{
					?> 

					<tr>
							<th colspan="3"><center>Masukan Resep Obat</center></th>
						</tr>
						</table>
<form action="" method="post">
<table class="table">
						
								<tr>
									<th colspan="3"><center>Masukan Rekam medis </center></th>
								</tr>
								<tr>
									<td>Tanggal Rekam Medis</td>
									<td>:</td>
									<td> <input type="date" class="form-control" name="tgl" value="<?php echo date('Y-m-d') ?>" required data-fv-notempty-message="Tidak boleh kosong">
									</td>
								</tr>
								<tr>
									<td>Dokter</td>
									<td>:</td>
									<td>
										<?php 
										if($_SESSION['leveluser']=='dokter'){
											$sql = mysqli_query($koneksi,"select * from tb_unitmedis where username='$_SESSION[namauser]'");
					$data = mysqli_fetch_array($sql);
											?> 
											<select class="form-control" name="dokter">
											<option value="<?php echo $data['id_unitmedis'] ?>"><?php echo $data['nama_unitmedis'] ?></option>
											 <?php
										}
										else{
											?> 
											<select class="form-control" name="dokter">
											<option value="">-Pilih dokter-</option>
											<?php 
												$dd = mysqli_query($koneksi,"select * from tb_unitmedis where id_poli='$r[id_poli]'");
												while($tt = mysqli_fetch_array($dd)){
													?> <option value="<?php echo $tt['id_unitmedis'] ?>"><?php echo $tt['nama_unitmedis'] ?></option> <?php
												}
											?>
										</select>
											<?php
										}
										 ?>

										
									
									</td>
								</tr>
								<tr>
									<td>Anamnesa</td>
									<td>:</td>
									<td> <input type="text" class="form-control" name="gejala" required data-fv-notempty-message="Tidak boleh kosong">
									</td>
								</tr>
								<tr>
									<td>Pemeriksaan</td>
									<td>:</td>
									<td> <input type="text" class="form-control" name="diagnosa" required data-fv-notempty-message="Tidak boleh kosong">
									</td>
								</tr>
								<tr>
									<td>Diagnosis</td>
									<td>:</td>
									<td> <input type="text" class="form-control" name="ket" required data-fv-notempty-message="Tidak boleh kosong">
									</td>
								</tr>
								<tr>
									<td>Tindakan</td>
									<td>:</td>
									<td> <input type="text" class="form-control" name="tindakan" required data-fv-notempty-message="Tidak boleh kosong">
									</td>
								</tr>
						
								</tr>
								
								
							</table>
<table id="example1" class="table table-bordered table-striped">
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
                if($r['jenis_pendaftaran']=='BPJS'){
                	$result = mysqli_query($koneksi,"select * from obat where kategori='BPJS'");
                }else{
                	$result = mysqli_query($koneksi,"select * from obat where kategori!='BPJS'");
                }       
				
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['kode_obat']; ?></td>
                <td><?php echo $data['jenis']; ?></td>
                <td><?php echo $data['nama_obat']; ?></td>
                <td><input type="number" name="dosis[]" size="9" max='<?php echo $data['stok'] ?>'><input type="hidden" name="obat[]"  value="<?php echo $data['id_obat'] ?>"></td>
               </tr>
			<?php
                                $no++;
                }
                ?>
                </tbody>
                
                </table>

<input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">

						
							</form>
							<?php 
/*pertama kita panggil colom yang akan kita gunakan untuk ID kita dengan menyaring nilai maksimum */
$sql ="SELECT MAX(RIGHT(no_rekmed,4)) AS terakhir FROM tb_rekmed";
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
  $nextID = "RM-".sprintf("%04s",$nextNoUrut);
						if(isset($_POST['simpan'])){

							$z = count($_POST['dosis']);
          for($ii=0; $ii < $z ; $ii++){
            $id_obat = $_POST['obat'][$ii];
            $dosis = $_POST['dosis'][$ii];
           if($dosis==''){

           }else{
           	mysqli_query($koneksi,"insert into resep values(null,'$nextID','$id_obat','$dosis')");
           	mysqli_query($koneksi,"update obat set stok=stok-'$dosis' where id_obat='$id_obat'");
           }
             
            
          }



						
							mysqli_query($koneksi,"insert into tb_rekmed values('$nextID','$_GET[no_reg]','$kode','$_POST[dokter]','$_POST[gejala]','$_POST[diagnosa]','$_POST[ket]','$_POST[tindakan]','$_POST[tgl]','','Belum')");
							
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Dinput");
                    window.location.href="?module=kunjungan&act=lihat&no_reg=<?php echo $_GET['no_reg'] ?>";
                </script>
            <?php
						}
							?>
					 <?php
				}
						 ?>



						


















						</div>
						<div class="col-md-6">
							<table class="table">
								<tr>
									<th colspan="6"><center>History Rekam Medis </center></th>
								</tr>
								<tr>
									<th>No.</th>
									<th>Tanggal Rekam Medis</th>
									<th>Nama Dokter</th>
									<th>Gejala</th>
									<th>Diagnosa</th>
									<th>Tindakan</th>
									<th>Resep</th>
								</tr>
								<?php 
								$sql = mysqli_query($koneksi,"select * from tb_rekmed,tb_unitmedis where tb_rekmed.id_unitmedis=tb_unitmedis.id_unitmedis and tb_rekmed.kode_pasien='$kode' order by tb_rekmed.no_rekmed desc");
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
										<td><?php echo $data['tindakan'] ?></td>
										<td><a href="#" data-toggle="modal" data-target="#obat<?php echo $data['no_rekmed'] ?>"><button class="btn btn-success"><i class="fa fa-eye"></i></button></a>

<!-- Modal -->
<div class="modal fade" id="obat<?php echo $data['no_rekmed'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Resep Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
                $nn = 1;
                while ($d = mysqli_fetch_array($r)) {
                ?>
            <tr>
                <td><?php echo $nn++; ?></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `kunjungan` WHERE id_kunjungan='$_GET[id]'"));
            if (isset($_POST['update'])) {

                mysqli_query($koneksi,"UPDATE kunjungan SET nama_kunjungan='$_POST[kunjungan]' WHERE id_kunjungan='$_GET[id]'");
                ?> 
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Diubah");
                    window.location.href="media.php?module=kunjungan&act=view";
                </script>
            <?php
                
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data kunjungan </h1>
            <ol class="breadcrumb">
            <li><a href="?module=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?module=kunjungan&act=view">Data kunjungan</a></li>
            <li class="active">Update Data kunjungan</li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form stakunjungan -->
                <form role="form" method = "POST" action="">
                 <div class="form-group">
                      <label for="exampleInputEmail1">Nama kunjungan Bantuan</label>
                      <input type="text" class="form-control" id="nama" name="kunjungan" value="<?php echo $d['nama_kunjungan'] ?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    



              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol kunjungan Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-primary">Update</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
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
      case 'delete':
      mysqli_query($koneksi,"DELETE FROM tb_kunjungan WHERE no_reg='$_GET[id]'");
      echo "<script>window.location='media.php?module=kunjungan&act=view'</script>";
      break;

    }
    ?>