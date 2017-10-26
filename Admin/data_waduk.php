<html>
<body>
<table width="400" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#CCFFFF">
    <td><div align="center"><strong>No</strong></div></td>
	<td><div align="center"><strong>Kecamatan</strong></div></td>
	<td><div align="center"><strong>Nama Waduk </strong></div></td>
    <td><div align="center"><strong>Luas</strong></div></td>
	<td><div align="center"><strong>Wewenang</strong></div></td>
  </tr>
  <form method="post" action="data_waduk.php">
  <?php
      include ("koneksi.php");
	  $tampil="select * from tb_waduk";
      $qryTampil=mysql_query($tampil);
      while ($dataTampil=mysql_fetch_array($qryTampil)) {
     ?>
 
   <tr bgcolor="#FFFFFF">
    <td><?php echo $dataTampil['NO3'] ; ?></td>
	<td><?php echo $dataTampil['KECAMATAN3']; ?></td>
	<td><?php echo $dataTampil['NAMA3']; ?></td>
    <td><?php echo $dataTampil['LUAS3']; ?></td>
	<td><?php echo $dataTampil['WEWENANG3']; ?></td>
	<td><div align="center"><a href="delete_waduk1.php?id=<?php echo $dataTampil['NO3'] ; ?>">Delete</a> 
	<a href="edit_waduk1.php?id=<?php echo $dataTampil['NO3']; ?>">Edit </a></div></td>
  </tr>
    <?php } ?>
	</form>
	<a href="tambah_waduk1.php"> Tambah </a>
</table>
</body>
</html>