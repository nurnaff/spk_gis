var master_map = [
<?php
	include "../config/db.php";
	$sql="select id_lokasi, nama_usaha, lintang, bujur from tbl_lokasi where id_kelurahan = '0'";
	$koordinat="";
	$res=mysql_query($sql);
	while($data=mysql_fetch_array($res)){
		$koordinat.="{
				  'lintang': ".$data['lintang'].",
				  'bujur': ".$data['bujur'].",
				  'id_lokasi':'".$data['id_lokasi']."'
				 },";
	}
	$koordinat=substr($koordinat,0,strlen($koordinat)-1);// Hilangkan , terakhir
	echo $koordinat;

?>
];