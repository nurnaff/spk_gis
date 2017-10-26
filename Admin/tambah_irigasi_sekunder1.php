<?php
session_start();
if(empty($_SESSION['authid'])){
	echo "<script>location.href='./login.php'</script>";
}

include "../config/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cpanel - Administrator</title>
<script src="./main/master_map.php" type="text/javascript"></script>
<link href="style/global.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
<div id="banner"><marquee>SELAMAT DATANG DI CONTROL PANEL</marquee></div>
<div id="menu_side">
<ul class="menu_side">
<li><a href='./index.php'>Beranda</a></li>
<li><a href='./irigasi_primer.php'>Manajemen Data Irigasi Primer</a></li>
<li><a href='./irigasi_sekunder.php'>Manajemen Data Irigasi Sekunder</a></li>
<li><a href='./kecamatan.php'>Manajemen Data Kecamatan</a></li>
<li><a href='./waduk.php'>Manajemen Data Waduk</a></li>
<li><a href='./belajar.php'>Manajemen Data Irigasi</a></li>
<li><a href='../index.php' target="_blank">Kunjungi Situs</a></li>
<li><a href='./?act=logout'>Logout</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="content">
<?php
if(isset($_GET['page']) && ($_GET['page'] == "IrigasiPrimer")){
	include "./main/irigasi_primer.php";
}elseif(isset($_GET['page']) && ($_GET['page'] == "IrigasiSekunder")){
	include "./main/irigasi_sekunder.php";
}elseif(isset($_GET['page']) && ($_GET['page'] == "Kecamatan")){
	include "./main/kecamatan.php";
}elseif(isset($_GET['page']) && ($_GET['page'] == "Waduk")){
	include "./main/waduk.php";
}elseif(isset($_GET['page']) && ($_GET['page'] == "Irigasi")){
	include "./main/belajar.php";
}elseif(isset($_GET['page']) && ($_GET['page'] == "lokasi")){
	include "./main/lokasi.php";
}elseif(isset($_GET['act']) && ($_GET['act'] == "logout")){
	unset($_SESSION['authid']);
	echo "<script>location.href='./index.php'</script>";
}else{
	include "./tambah_irigasi_sekunder.php";	
}
?>
</div>
<div id="footer">Copyright, GIS Pembangunan Irigasi Baru <?php echo date("Y"); ?></div>
</div>
</body>
</html>