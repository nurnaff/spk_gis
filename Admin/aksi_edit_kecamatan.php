<?php 
    include("koneksi.php"); 
    $update="UPDATE tb_kecamatan SET id_kec='$_POST[no]',nama_kec='$_POST[kec]',jumlah='$_POST[jumlah]' WHERE id_kec='$_POST[no]'"; 
    mysql_query($update); 
    echo "<center>Data Berhasil Di Update<center>"; 
?>
<a href="kecamatan.php">Back Tampil Data</a>