<?php 
    include("koneksi.php"); 
    $update="UPDATE tb_primer SET NO1='$_POST[no]',KECAMATAN2='$_POST[kec]',NAMA2='$_POST[nama]',LUAS2='$_POST[luas]' WHERE NO1='$_POST[no]'"; 
    mysql_query($update); 
    echo "<center>Data Berhasil Di Update<center>"; 
?>
<a href="irigasi_primer.php">Back Tampil Data</a>