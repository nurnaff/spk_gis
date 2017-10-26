<html>
<body>
<table width="400" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#CCFFFF">
    <td><div align="center"><strong>No</strong></div></td>
	<td><div align="center"><strong>Luas Lahan</strong></div></td>
	<td><div align="center"><strong>Luas Waduk </strong></div></td>
    <td><div align="center"><strong>Kemiringan</strong></div></td>
	<td><div align="center"><strong>Ketinggian</strong></div></td>
	<td><div align="center"><strong>Curah Hujan</strong></div></td>
	<td><div align="center"><strong>Topografi</strong></div></td>
	<td><div align="center"><strong>Irigasi</strong></div></td>
  </tr>
  <form method="post" action="data_belajar.php">
  <?php
      include ("koneksi.php");
	  $tampil="select * from tb_data";
      $qryTampil=mysql_query($tampil);
      while ($dataTampil=mysql_fetch_array($qryTampil)) {
     ?>
 
   <tr bgcolor="#FFFFFF">
    <td><?php echo $dataTampil['NOMOR'] ; ?></td>
	<td><?php echo $dataTampil['LUAS_LAHAN2']; ?></td>
	<td><?php echo $dataTampil['LUAS_WADUK2']; ?></td>
    <td><?php echo $dataTampil['KEMIRINGAN2']; ?></td>
	<td><?php echo $dataTampil['KETINGGIAN2']; ?></td>
	<td><?php echo $dataTampil['CURAH_HUJAN2']; ?></td>
	<td><?php echo $dataTampil['TOPOGRAFI2']; ?></td>
	<td><?php echo $dataTampil['IRIGASI2']; ?></td>
	<td><div align="center"><a href="delete_data1.php?id=<?php echo $dataTampil['NOMOR'] ; ?>">Delete</a> 
	<a href="edit_data1.php?id=<?php echo $dataTampil['NOMOR']; ?>">Edit </a></div></td>
  </tr>
    <?php } ?>
	</form>
	<a href="tambah_dataset1.php"> Tambah </a>
</table>
</body>
</html>