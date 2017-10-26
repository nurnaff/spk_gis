<html>
<body>
<?php
 include("koneksi.php");
 if(!isset($_POST['simpan'])) {
?>
<table aligment="center" border="1">
<form action="tambah_dataset.php" method="post">
<tr> <td> No </td>
     <td> <input type="text" name="no" width="60"> </td> </tr>
<tr> <td> Luas Lahan </td>
	 <td> <input type="double" name="lahan" width="100"></td> </tr>
<tr> <td> Luas Waduk </td>
	 <td> <input type="double" name="waduk" width="100"></td> </tr>
<tr> <td> Kemiringan Tanah </td>
	 <td> <select name="miring" width="100">
	 <option value=0 selected>-Jenis-</option>
	 <option value="0 - 2 %">0 - 2 %</option>
	 <option value="2 - 5 %">2 - 5 %</option>
	 <option value="5 - 15 %">5 - 15 %</option>
	 </select></td> </tr>
<tr> <td> Ketinggian Tanah </td>
	 <td> <select name="tinggi" width="100">
	 <option value=0 selected>-Jenis-</option>
	 <option value="0 - 100 m">0 - 100 m</option>
	 <option value="100 - 500 m">100 - 500 m</option>
	 </select></td> </tr>
<tr> <td> Curah Hujan </td>
	 <td> <select name="hujan" width="100">
	 <option value=0 selected>-Jenis-</option>
	 <option value="Tadah Hujan">Tadah Hujan</option>
	 <option value="Irigasi Semi Teknis">Irigasi Semi Teknis</option>
	 </select></td> </tr>
<tr> <td> Topografi </td>
	 <td> <select name="topografi" width="100">
	 <option value=0 selected>-Jenis-</option>
	 <option value="Dataran">Dataran</option>
	 <option value="Perbukitan">Perbukitan</option>
	 </select></td> </tr>
<tr> <td> Hasil Irigasi </td>
	 <td> <select name="irigasi" width="100">
	 <option value=0 selected>-Jenis-</option>
	 <option value="Irigasi">Irigasi</option>
	 <option value="Non Irigasi">Non Irigasi</option>
	 </select></td> </tr>
<tr> <td> <input type="submit" name="simpan" value="Simpan"></td></tr> 
</form>
<?php
} else {
 $no=$_POST['no'];
 $lahan=$_POST['lahan'];
 $waduk=$_POST['waduk'];
 $miring=$_POST['miring'];
 $tinggi=$_POST['tinggi'];
 $hujan=$_POST['hujan'];
 $topografi=$_POST['topografi'];
 $irigasi=$_POST['irigasi'];
 $sql=mysql_query("INSERT INTO tb_data VALUES('$no','$lahan','$waduk','$miring','$tinggi','$hujan','$topografi','$irigasi')");
 }
 ?>
 <a href="belajar.php"> Kembali </a>
</table>
</body>
</html>