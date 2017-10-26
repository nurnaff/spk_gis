<html>
<body>
<table width="400" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#CCFFFF">
    <td><div align="center"><strong>No</strong></div></td>
	<td><div align="center"><strong>Kecamatan</strong></div></td>
	<td><div align="center"><strong>Nama Waduk </strong></div></td>
    <td><div align="center"><strong>Luas Waduk</strong></div></td>
	<td><div align="center"><strong>Wewenang</strong></div></td>
  </tr>
  <form>
  <?php
      include("koneksi.php");
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
  </tr>
    <?php } ?>
	</form>
</table>
</body>
</html>