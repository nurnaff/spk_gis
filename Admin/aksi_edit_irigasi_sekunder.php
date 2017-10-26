<?php 
    include("koneksi.php"); 
    $update="UPDATE tb_sekunder SET NO2='$_POST[no]',KECAMATAN2='$_POST[kec]',NAMA2='$_POST[nama]',LUAS2='$_POST[luas]' WHERE NO2='$_POST[no]'"; 
    mysql_query($update); 
    echo "<center>Data Berhasil Di Update<center>"; 
?>
<a href="irigasi_sekunder.php">Back Tampil Data</a>