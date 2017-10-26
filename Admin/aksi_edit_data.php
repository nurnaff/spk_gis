<?php 
    include("koneksi.php"); 
    $update="UPDATE tb_data SET NOMOR='$_POST[no]',LUAS_LAHAN2='$_POST[lahan]',LUAS_WADUK2='$_POST[waduk]',KEMIRINGAN2='$_POST[miring]',KETINGGIAN2='$_POST[tinggi]',CURAH_HUJAN2='$_POST[hujan]',TOPOGRAFI2='$_POST[topografi]',IRIGASI2='$_POST[irigasi]' WHERE NOMOR='$_POST[no]'"; 
    mysql_query($update); 
    echo "<center>Data Berhasil Di Update<center>"; 
?>
<a href="belajar.php">Back Tampil Data</a>