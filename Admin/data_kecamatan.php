<html>
<body>
<table width="400" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#CCFFFF">
    <td><div align="center"><strong>No</strong></div></td>
	<td><div align="center"><strong>Kecamatan</strong></div></td>
	<td><div align="center"><strong>Jumlah Desa dan Dusun Irigasi </strong></div></td>
  </tr>
  <form method="post" action="data_kecamatan.php">
  <?php
      include ("koneksi.php");
	  $tampil="select * from tb_kecamatan";
      $qryTampil=mysql_query($tampil);
      while ($dataTampil=mysql_fetch_array($qryTampil)) {
     ?>
 
   <tr bgcolor="#FFFFFF">
    <td><?php echo $dataTampil['id_kec'] ; ?></td>
	<td><?php echo $dataTampil['nama_kec']; ?></td>
	<td><?php echo $dataTampil['jumlah']; ?></td>
	<td><div align="center"><a href="delete_kecamatan1.php?id=<?php echo $dataTampil['id_kec'] ; ?>">Delete</a> 
	<a href="edit_kecamatan1.php?id=<?php echo $dataTampil['id_kec']; ?>">Edit </a></div></td>
  </tr>
    <?php } ?>
	</form>
	<a href="tambah_kecamatan1.php"> Tambah </a>
</table>
</body>
</html>