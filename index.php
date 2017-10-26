<?php
include "./config/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIG Pembangunan Irigasi Baru pada Kabupaten Lamongan</title>
<?php echo "<script src='./admin/main/master_map.php' type='text/javascript'></script>"; ?>
<link href="style/global.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
<div id="banner">
<div id="assx">
<img src="images/sss.png" class="assx" />
</div>
<div id="text">
<div id="big1">SISTEM INFORMASI GEOGRAFIS</div>
<div id="big2">PEMBANGUNAN IRIGASI BARU PADA KABUPATEN LAMONGAN</div>
<div id="big3">BERBASIS WEB</div>
</div>
<div id="footer_menu"></div>
</div>
<div id="menu_wrapper">
<ul class="menu_wrapper">
<li><a href='./index.php'>Beranda</a></li>
<li><a href='./irigasi_primer.php'>Data Irigasi Primer</a></li>
<li><a href='./irigasi_sekunder.php'>Data Irigasi Sekunder</a>
<li><a href='./waduk1.php'>Data Waduk</a></li>
<li><a href='./penentuan1.php'>Proses Keputusan Irigasi Baru</a></li>
<li><a href='./map.php'>Map Jalur Irigasi Primer dan Sekunder</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="menu_side">
<img src="img/1.jpg" class="m" /><br />
<img src="img/2.jpg" class="m" /><br />
<img src="img/3.jpg" class="m" />
</div>
<div id="content">
<?php
if(isset($_GET['page']) && ($_GET['page'] == "lokasi")){
	include "./main/lokasi.php";
}elseif(isset($_GET['page']) && ($_GET['page'] == "map")){
	include "./main/map.php";
}else{
	include "./welcome.php";	
}
?>
</div>
<div id="menu_side2">
<div id="title">Daftar Kecamatan Irigasi :</div>
<ul class="menu_side2">
<?php
$sql_kab = mysql_query("select nama_kec,jumlah from tb_kecamatan order by nama_kec asc");
while($r_kab = mysql_fetch_array($sql_kab)){
	echo "<li>";
	echo $r_kab['nama_kec'];
	echo "</li>";
}
?>
</ul>
</div>
<div id="footer">&copy; Copyright, SIG Irigasi Baru pada Kabupaten Lamongan Berbasis Web - <?php echo date("Y"); ?></div>
</div>
</body>
</html>