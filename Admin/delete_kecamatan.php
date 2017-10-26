<?php 
 include("koneksi.php"); 
 $id=$_GET['id']; 
 $delete="Delete from tb_kecamatan Where id_kec='$id'"; 
 mysql_query($delete) or die ("Error tu"); 
 echo "<center><h3>Data berhasil di hapus</h3></center>"; 
?>  
<a href="kecamatan.php"> Kembali </a>