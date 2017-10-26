<html>
<body>
<?php
 include("koneksi.php");
 if(!isset($_POST['simpan'])) {
?>
<table aligment="center" border="1">
<form action="tambah_waduk.php" method="post">
<tr> <td> No </td>
     <td> <input type="text" name="no" width="60"> </td> </tr>
<tr> <td> Kecamatan </td>
	 <td> <input type="text" name="kec" width="100"></td> </tr>
<tr> <td> Nama Waduk </td>
	 <td> <input type="text" name="nama" width="100"></td> </tr>
<tr> <td> Luas </td>
	 <td> <input type="text" name="luas" width="100"></td> </tr>
<tr> <td> Wewenang </td>
	 <td> <select name="wenang" width="100">
	 <option value=0 selected>-Jenis-</option>
	 <option value="Propinsi">Propinsi</option>
	 <option value="Pusat">Pusat</option>
	 <option value="Kabupaten">Kabupaten</option>
	 </select></td> </tr>
<tr> <td> <input type="submit" name="simpan" value="Simpan"></td></tr> 
</form>
<?php
} else {
 $no=$_POST['no'];
 $kec=$_POST['kec'];
 $nama=$_POST['nama'];
 $luas=$_POST['luas'];
 $wewenang=$_POST['wenang'];
 $sql=mysql_query("INSERT INTO tb_waduk VALUES('$no','$kec','$nama','$luas','$wewenang')");
 }
 ?>
 <a href="waduk.php"> Kembali </a>
</table>
</body>
</html>