<html>
<head>
<title>Resset Password</title>
<style>
body {background:skyblue; padding:0px; margin:0px}
h3 {color:#ffffff; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:20px; margin:20px;}
.wrapper-f{width:300px; margin:auto; padding:40px 20px 20px 20px; background:#E84C3D; margin-top:5%; min-height:120px;}
.wrapper-f label {color:#ffffff;}
.wrapper-f input {padding:5px; background:#eeeeee; border:0px; color:#333; width:98%; margin-bottom:10px;}
.wrapper-f input:focus{ background:#ccc;}
.wrapper-f .button {padding:10px 20px 10px 20px; color:#ffffff; background:#C1392B; margin-top:10px; cursor:pointer}
.wrapper-f .button:hover {background:#333;}
.warning {background:#FF9900; color:#ffffff; padding:10px; border-radius:5px; border:1px; text-align:center;margin:auto;
 width:400px; margin-top:20px;}
</style>
</head>
<h3>LUPA PASSWORD?</h3>
<div class="wrapper-f">
<form action="" method="post">
<label>Masukkan Email anda</label>
<input name="email" type="email" placeholder="Masukkan Email" required oninvalid="this.setCustomValidity('Masukkan Email Dengan benar oke gan')">
<input class="button" name="act_resset" type="submit" value="Kirim Sekarang">

</form>

</div>
<div style="width:600px; margin:auto">
<?php
include"koneksi.php";
///////////////////////////////////////////////////////////////////////
if (isset($_POST['act_resset']))  
{
	date_default_timezone_set("Asia/Jakarta");
	$pass="123ABC"; $panjang='8'; $len=strlen($pass); 
	$start=$len-$panjang; $xx=rand('0',$start); 
	$yy=str_shuffle($pass); 
	$passwordbaru=substr($yy, $xx, $panjang);

	$email = $_POST['email'];
	$password = md5($passwordbaru);
	$datetime=date("h:i:s-j-M-Y");


	
	$query = "SELECT * FROM tb_pasien WHERE email ='$email'";
	$hasil = mysqli_query($koneksi,$query);
	$data  = mysqli_fetch_array($hasil);
	$cek = mysqli_num_rows($hasil);
	$username = strip_tags($data['username']);
	$alamatEmail = strip_tags($data['email']);
	$nama = strip_tags($data['nama_pasien']);
	if ($cek == 1) {

	
	// mengirim email
	require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "mail.dotuku.store";

$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Username = "noreply@dotuku.store";
$mail->Password = "347610Tgmby";

$mail->From = "noreply@dotuku.store";
$mail->FromName = "Fitur Lupa Password Website Puskesmas Mataram Baru";
$mail->AddAddress($alamatEmail);

$mail->IsHTML(true);
$mail->Subject = "Reset password";
$mail->Body = "Kami telah meresset Ulang Kata sandi ".$nama." Dan anda dapat login kembali ke web kami \n\n 
	DETAIL AKUN ANDA :\n Email anda : ".$alamatEmail." \n 
	Kata sandi Anda yang baru adalah: ".$passwordbaru."\n\n 
	\n\n PESAN NO-REPLY";
	// cek status pengiriman email
	if(!$mail->Send())
	{ 

	    // update password baru ke database (jika pengiriman email sukses)
	    

	    if ($hasil) 
		echo'<div class="warning">Kata sandi baru telah direset dan sudah dikirim ke email "'.$alamatEmail.'" Silahkan cek emailnya</div><br><br><hr><h3>CONTOH PESAN DALAM EMAIL<hr><br>
		'.$pesan.'<hr>';
	    }
		else {
		    mysqli_query($koneksi,"UPDATE user SET password='$password' WHERE username = '$username'");
		echo'<div class="warning">Kata sandi baru telah direset dan sudah dikirim ke email "'.$alamatEmail.'" Silahkan cek emailnya</div><br><br><hr>
		'.$pesan.'<hr>';
		}
	}
	else
	{
		echo'<div class="warning">Alamat Email tidak ditemukan</div>';
	}
}


?>

</div>

<body>
</body>
</html>
