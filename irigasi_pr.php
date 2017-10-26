<html>
<body>
<table width="400" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#CCFFFF">
    <td><div align="center"><strong>No</strong></div></td>
	<td><div align="center"><strong>Kecamatan</strong></div></td>
	<td><div align="center"><strong>Nama Irigasi Primer</strong></div></td>
    <td><div align="center"><strong>Luas Area Irigasi (dalam meter persegi)</strong></div></td>
  </tr>
  <form>
  <?php
      include("koneksi.php");
	  $tampil="select * from tb_primer";
      $qryTampil=mysql_query($tampil);
      while ($dataTampil=mysql_fetch_array($qryTampil)) {
     ?>
 
   <tr bgcolor="#FFFFFF">
    <td><?php echo $dataTampil['NO1'] ; ?></td>
	<td><?php echo $dataTampil['KECAMATAN2']; ?></td>
	<td><?php echo $dataTampil['NAMA2']; ?></td>
	<td><?php echo $dataTampil['LUAS2']; ?></td>
  </tr>
    <?php } ?>
	</form>
</table>
</body>
</html>