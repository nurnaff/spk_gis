<html>
<body>
<form name="form1" method="post" action="aksi_edit_waduk.php"> 
      <table width="400" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#FFFF99" bgcolor="#FF0000"> 
        <tr bgcolor="#FFFFCC"> 
          <td height="50" colspan="2"><div align="center">EDIT DATA</div></td> 
        </tr> 
     <?php 
      include("koneksi.php");
       
      $sqlTampil="select * from tb_waduk Where No3='$_GET[id]'"; 
      $qryTampil=mysql_query($sqlTampil); 
      $dataTampil=mysql_fetch_array($qryTampil); 
     ?> 
    <tr bgcolor="#FFFFFF"> 
          <td height="40">No Tidak Diedit</td> 
          <td>: 
          <input name="no" type="text" id="no" value="<?php echo $dataTampil['NO3']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td height="40">Kecamatan</td> 
          <td>: 
          <input name="kec" type="text" id="kec" value="<?php echo $dataTampil['KECAMATAN3']; ?>"></td> 
        </tr> 
        <tr bgcolor="#FFFFFF"> 
          <td height="40">Nama Waduk</td> 
          <td>: 
          <input name="nama" type="text" id="nama" value="<?php echo $dataTampil['NAMA3']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td height="40">Luas</td> 
          <td>: 
          <input name="luas" type="text" id="luas" value="<?php echo $dataTampil['LUAS3']; ?>"></td> 
        </tr> 
        <tr bgcolor="#FFFFFF"> 
          <td height="40">Wewenang</td> 
          <td>: 
          <input name="wenang" type="text" id="wenang" value="<?php echo $dataTampil['WEWENANG3']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td>&nbsp;</td> 
          <td height="50"><input type="submit" name="Submit" value="Simpan"></td> 
        </tr> 
      </table> 
    </form>  