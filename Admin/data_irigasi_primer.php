<html>
<body>
<table width="400" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#CCFFFF">
    <td><div align="center"><strong>No</strong></div></td>
	<td><div align="center"><strong>Kecamatan</strong></div></td>
	<td><div align="center"><strong>Jalur Irigasi Desa </strong></div></td>
    <td><div align="center"><strong>Luas Area</strong></div></td>
  </tr>
  <form method="post" action="data_irigasi_primer.php">
  <?php
      include ("koneksi.php");
	  $tampil="select * from tb_primer";
      $qryTampil=mysql_query($tampil);
      while ($dataTampil=mysql_fetch_array($qryTampil)) {
     ?>
 
   <tr bgcolor="#FFFFFF">
    <td><?php echo $dataTampil['NO1'] ; ?></td>
	<td><?php echo $dataTampil['KECAMATAN2']; ?></td>
	<td><?php echo $dataTampil['NAMA2']; ?></td>
    <td><?php echo $dataTampil['LUAS2']; ?></td>
	<td><div align="center"><a href="delete_irigasi_primer1.php?id=<?php echo $dataTampil['NO1'] ; ?>">Delete</a> 
	<a href="edit_irigasi_primer1.php?id=<?php echo $dataTampil['NO1']; ?>">Edit </a></div></td>
  </tr>
    <?php } ?>
	</form>
	<a href="tambah_irigasi_primer1.php"> Tambah </a>
</table>
</body>
</html>