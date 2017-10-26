<?php 
    include("koneksi.php"); 
    $update="UPDATE tb_waduk SET NO3='$_POST[no]',KECAMATAN3='$_POST[kec]',NAMA3='$_POST[nama]',LUAS3='$_POST[luas]',WEWENANG3='$_POST[wenang]' WHERE NO3='$_POST[no]'"; 
    mysql_query($update); 
    echo "<center>Data Berhasil Di Update<center>"; 
?>
<a href="waduk.php">Back Tampil Data</a>