<?php 
 include("koneksi.php"); 
 $id=$_GET['id']; 
 $delete="Delete from tb_primer Where NO1='$id'"; 
 mysql_query($delete) or die ("Error tu"); 
 echo "<center><h3>Data berhasil di hapus</h3></center>"; 
?>  
<a href="irigasi_primer.php"> Kembali </a>