<html>
<body>
<form name="form1" method="post" action="aksi_edit_data.php"> 
      <table width="400" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#FFFF99" bgcolor="#FF0000"> 
        <tr bgcolor="#FFFFCC"> 
          <td height="50" colspan="2"><div align="center">EDIT DATA</div></td> 
        </tr> 
     <?php 
      include("koneksi.php");
       
      $sqlTampil="select * from tb_data Where NOMOR='$_GET[id]'"; 
      $qryTampil=mysql_query($sqlTampil); 
      $dataTampil=mysql_fetch_array($qryTampil); 
     ?> 
    <tr bgcolor="#FFFFFF"> 
          <td height="40">No Tidak Diedit</td> 
          <td>: 
          <input name="no" type="text" id="no" value="<?php echo $dataTampil['NOMOR']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td height="40">Luas Lahan</td> 
          <td>: 
          <input name="lahan" type="double" id="lahan" value="<?php echo $dataTampil['LUAS_LAHAN2']; ?>"></td> 
        </tr> 
        <tr bgcolor="#FFFFFF"> 
          <td height="40">Luas Waduk</td> 
          <td>: 
          <input name="waduk" type="double" id="waduk" value="<?php echo $dataTampil['LUAS_WADUK2']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td height="40">Kemiringan Tanah</td> 
          <td>: 
          <input name="miring" type="text" id="miring" value="<?php echo $dataTampil['KEMIRINGAN2']; ?>"></td> 
        </tr> 
        <tr bgcolor="#FFFFFF"> 
          <td height="40">Ketinggian Tanah</td> 
          <td>: 
          <input name="tinggi" type="text" id="tinggi" value="<?php echo $dataTampil['KETINGGIAN2']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td height="40">Curah Hujan</td> 
          <td>: 
          <input name="hujan" type="text" id="hujan" value="<?php echo $dataTampil['CURAH_HUJAN2']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td height="40">Topografi Tanah</td> 
          <td>: 
          <input name="topografi" type="text" id="topografi" value="<?php echo $dataTampil['TOPOGRAFI2']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td height="40">Hasil Irigasi</td> 
          <td>: 
          <input name="irigasi" type="text" id="irigasi" value="<?php echo $dataTampil['IRIGASI2']; ?>"></td> 
        </tr> 
		<tr bgcolor="#FFFFFF"> 
          <td>&nbsp;</td> 
          <td height="50"><input type="submit" name="Submit" value="Simpan"></td> 
        </tr> 
      </table> 
    </form>  