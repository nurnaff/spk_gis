<html>
<body>
<?php
 include("koneksi.php");
 if(!isset($_POST['simpan'])) {
?>
<table aligment="center" border="1">
<form action="tambah_irigasi_primer.php" method="post">
<tr> <td> No </td>
     <td> <input type="text" name="no" width="60"> </td> </tr>
<tr> <td> Kecamatan </td>
	 <td> <input type="text" name="kec" width="100"></td> </tr>
<tr> <td> Nama Irigasi Desa</td>
	 <td> <input type="text" name="nama" width="100"></td> </tr>
<tr> <td> Luas Area </td>
	 <td> <input type="text" name="luas" width="100"></td> </tr>
<tr> <td> <input type="submit" name="simpan" value="Simpan"></td></tr> 
</form>
<?php
} else {
 $no=$_POST['no'];
 $kec=$_POST['kec'];
 $nama=$_POST['nama'];
 $luas=$_POST['luas'];
 $sql=mysql_query("INSERT INTO tb_primer VALUES('$no','$kec','$nama','$luas')"); ?>
 <?php  }
 ?>
 <a href="irigasi_primer.php"> Kembali </a>
</table>
</body>
</html>