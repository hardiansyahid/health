 <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide.jpg)">
         
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide2.jpg)">

        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide3.jpg)">

        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

   
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Sudah punya akun dan dapat berobat online?</h3>
          <p> Layanan terbaru dari Klinik, anda dapat mengakses segala keperluan klinik melalui online</p>
          <a class="cta-btn scrollto" href="?module=login">Sudah punya akun anda?</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

   

   

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
     <!-- ##### Blog Post Area Start ##### -->
    <div class="section-title">
          <h2>Informasi Artkel Kesehatan Klinik DR Cika Naya</h2>
        </div>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-12">
                    <div class="row">
          <?php 
        $batas = 4;
$page = isset( $_GET['page'] ) ? $_GET['page'] : "";

if ( empty( $page ) ) {
    $posisi = 0;
    $page = 1;
} else {
    $posisi = ( $page - 1 ) * $batas;
}
        $s = mysqli_query($koneksi,"select * from artikel,kategori where kategori.id_kategori=artikel.id_kategori 
      and artikel.status='share' order by artikel.id_artikel desc limit $posisi, $batas");
        $no = 1+$posisi;
        while($d = mysqli_fetch_array($s)){
          ?> 
                        <!-- Single Blog Post -->
                        <div class="col-md-3">
                            <div class="single-blog-post style-3">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <a href="?module=detail&id=<?php echo $d['id_artikel'] ?>">
                                      <img src="img/<?php echo $d['gambar'] ?>" alt="" class="img-fluid"></a>
                                </div>
                                <!-- Post Data -->
                                <div class="post-data">
                                    <a href="#" class="post-catagory"><?php echo $d['nama_kategori'] ?></a>
                                    <a href="?module=detail&id=<?php echo $d['id_artikel'] ?>" class="post-title">
                                        <h6><?php echo $d['judul'] ?></h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By Klinik DR Cika Naya</a></p>
                                        <p class="post-date"><?php echo $d['tanggal'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
      <?php } ?>
       <?php
//hitung jumlah data
        $jml_data = mysqli_num_rows(mysqli_query("select * from artikel,kategori,siswa where siswa.username=artikel.username and kategori.id_kategori=artikel.id_kategori 
      and artikel.status='share' order by artikel.id_artikel desc"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

//Navigasi ke sebelumnya
if ( $page > 1 ) {
    $link = $page-1;
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $prev = "<a href='$actual_link&page=$link' class='page-link'>Prev </a>";
} else {
    $prev = "Prev ";
}

//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $page ) {
        $nmr .= $i . " ";
    } else {
      $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $nmr .= "<a href='$actual_link&page=$i' class='page-link'>$i</a> ";
    }
}

//Navigasi ke selanjutnya
if ( $page < $JmlHalaman ) {
    $link = $page + 1;
    $next = " <a href='$actual_link&page=$link' class='page-link'>Next</a>";
} else {
    $next = " Next";
}

//Tampilkan navigasi
?> 
<center>
<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-primary"><?php echo $prev ?></button>
  <button type="button" class="btn btn-default"><?php echo $nmr ?></button>
  <button type="button" class="btn btn-primary"><?php echo $next ?></button>
</div>    
</center>                   

                    </div>

                    
                </div>

                <!-- Sidebar Area -->
               
            </div>
        </div>
    </div>
    </section><!-- End Doctors Section -->

   




   
