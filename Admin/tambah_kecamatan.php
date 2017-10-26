<html>
<body>
<?php
 include("koneksi.php");
 if(!isset($_POST['simpan'])) {
?>
<table aligment="center" border="1">
<form action="tambah_kecamatan.php" method="post">
<tr> <td> No </td>
     <td> <input type="text" name="no" width="60"> </td> </tr>
<tr> <td> Kecamatan </td>
	 <td> <input type="text" name="kec" width="100"></td> </tr>
<tr> <td> Jumlah Desa dan Dusun yang Teririgasi </td>
	 <td> <input type="double" name="jumlah" width="100"></td> </tr>
<tr> <td> <input type="submit" name="simpan" value="Simpan"></td></tr> 
</form>
<?php
} else {
 $no=$_POST['no'];
 $kec=$_POST['kec'];
 $jumlah=$_POST['jumlah'];
 $sql=mysql_query("INSERT INTO tb_kecamatan VALUES('$no','$kec','$jumlah')");
 }
 ?>
 <a href="kecamatan.php"> Kembali </a>
</table>
</body>
</html>