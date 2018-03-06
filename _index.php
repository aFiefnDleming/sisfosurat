<?php
session_start();


//ambil nilai
require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
require("inc/class/paging.php");
$tpl = LoadTpl("template/login.html");



nocache;

//nilai
$filenya = "index.php";
$filenya_ke = $sumber;
$judul = "Sistem Informasi Surat - Menyurat";
$s = nosql($_REQUEST['s']);
$judulku = $judul;






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST['btnOK'])
	{
	//ambil nilai
	$username = nosql($_POST["usernamex"]);
	$password = md5(nosql($_POST["passwordx"]));

	//cek null
	if ((empty($username)) OR (empty($password)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//query
		$q = mysql_query("SELECT * FROM adminx ".
							"WHERE usernamex = '$username' ".
							"AND passwordx = '$password'");
		$row = mysql_fetch_assoc($q);
		$total = mysql_num_rows($q);

		//cek login
		if ($total != 0)
			{
			session_start();

			//bikin session
			$_SESSION['kd11_session'] = nosql($row['kd']);
			$_SESSION['username11_session'] = $username;
			$_SESSION['pass11_session'] = $password;
			$_SESSION['surat_session'] = "Petugas Pengarsip Surat";
			$_SESSION['hajirobe_session'] = $hajirobe;


			//diskonek
			xfree($q);
			xclose($koneksi);

			//re-direct
			//$ke = "adm/index.php";
			$ke = "iklan.php?nilai=adm/index.php";
			xloc($ke);
			exit();
			}
		else
			{
			//diskonek
			xfree($q);
			xclose($koneksi);

			//re-direct
			pekem($pesan, $filenya);
			exit();
			}
		}

	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////








//isi *START
ob_start();



//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







echo '<form action="'.$filenya.'" method="post" name="formx">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
<tr valign="top" align="center">
<td width="100">';



//jika null 
if (empty($s))
	{
	echo '<table bgcolor="gray" width="500" border="0" cellspacing="3" cellpadding="0">
	<tr valign="top">
	<td>
	
	<div id="d_utama">
	<table bgcolor="#7b1f53" width="100%" border="0" cellspacing="3" cellpadding="0">
	<tr valign="top">
	<td>
	
	<h2>
	SISFOSURAT
	</h2>
	</td>
	</tr>
	</table>
	
	<p>
	Username :
	<br>
	<input name="usernamex" type="text" size="10">
	</p>
	
	
	<p>
	Password :
	<br>
	<input name="passwordx" type="password" size="10">
	</p>
	
	
	<p>
	<input name="btnOK" type="submit" value="OK &gt;&gt;&gt;">
	</p>

	<hr>
	Contoh akses : admin
	<hr>	
	</td>
	</tr>
	</table>
	
	</div>';
	}

	
else if ($s == "pengembang")
	{
	echo '<table bgcolor="gray" width="500" border="0" cellspacing="3" cellpadding="0">
	<tr valign="top" height="300">
	<td>
	<table bgcolor="maroon" width="100%" border="0" cellspacing="3" cellpadding="0">
	<tr valign="top">
	<td>
	<h2>
	Pengembang Aplikasi SISFOSURAT
	</h2>
	</td>
	</tr>
	</table>
	<p>
	Aplikasi ini dibuat oleh Agus Muhajir. (http://omahbiasawae.com). 
	</p>
	
	<p>
	Merupakan versi pertama, yang rilis pada Mei 2016 ini. 
	</p>
	
	<p>
	Informasi selengkapnya, bisa kontak ke :
	<br>
	E-Mail/FB : hajirodeon@yahoo.com, hajirodeon@gmail.com
	<br>
	SMS/WhatsApp/Telegram : 0818298854.
	<br>
	http://omahbiasawae.com/
	<br>
	http://sisfokol.wordpress.com/
	<br>
	http://yahoogroup.com/groups/sisfokol/
	<br>
	http://www.tokopedia.com/omahbiasawae/
	</p>
	</td>
	</tr>
	</table>';	
	}





else if ($s == "kastumisasi")
	{
	echo '<table bgcolor="gray" width="500" border="0" cellspacing="3" cellpadding="0">
	<tr valign="top" height="300">
	<td>
	<table bgcolor="maroon" width="100%" border="0" cellspacing="3" cellpadding="0">
	<tr valign="top">
	<td>
	<h2>
	Beli Paket Kastumisasi
	</h2>
	</td>
	</tr>
	</table>
		


	<p>
	Layanan ini adalah kastumisasi, yakni revisi yang Anda inginkan agar aplikasi ini, bisa sesuai keinginan. 
	</p>
	
	<p>
	Besarnya donasi sekitar Rp.800.000,- (DELAPAN RATUS RIBU RUPIAH) sampai dengan Rp. 1.500.000,- (SATU JUTA LIMA RATUS RIBU RUPIAH).
	</p>
	
	<p>
	Bergantung pada banyaknya revisi update yang diinginkan.
	</p>
	</td>
	</tr>
	</table>';
	}



echo '<table bgcolor="#d7a2bd" width="500" border="0" cellspacing="3" cellpadding="0">
<tr valign="top" align="right">
<td>
(c) 2016. '.$versi.'
</td>
</tr>
</table>



<table bgcolor="#a13c71" width="500" border="0" cellspacing="3" cellpadding="0">
<tr valign="top" align="left">
<td width="200">
<a href="http://www.omahbiasawae.com/" target="_blank">OmahBIASAWAE.COM</a>
<br>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FOmahbiasawae%2F570684559728799&amp;width&amp;layout=button&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=312487135596733" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px;" allowTransparency="true"></iframe>
</td>
<td align="right">
[<a href="'.$filenya.'">LOGIN</a>].
<br>
 
*[<a href="'.$filenya.'?s=pengembang">Pengembang</a>].
<br>
[<a href="'.$filenya.'?s=kastumisasi">Beli Paket Kastumisasi</a>].
</td>
</tr>
</table>



   <table width="500" border="0" cellpadding="0" cellspacing="0" bgcolor="orange">
    <tr>
      <td align="left">
	  <font color="gray">
	  <iframe frameborder="0" width="500" src="http://iklan.omahbiasawae.com/iklanbaris.php" scrolling="no" name="frku" height="30"></iframe>
	  </font>
	  </td>
    </tr>
  </table>










</td>
</tr>
</table>





</form>';



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>
