var master_map = [
<?php
	include "../../config/db.php";
	$sql="select id_kelurahan, nama_usaha, lintang, bujur from tbl_lokasi";
	$koordinat="";
	$res=mysql_query($sql);
	while($data=mysql_fetch_array($res)){
		$sql_bid = mysql_query("select * from tbl_kelurahan where id_kelurahan = '".$data['id_kelurahan']."'");
		$r_bid   = mysql_fetch_array($sql_bid);
		if($r_bid['id_kelurahan'] == 0){
			$koordinat.="{
					  'lintang': ".$data['lintang'].",
					  'bujur': ".$data['bujur'].",
					  'id_bidan':'".$data['nama_usaha']."'
				     },";
		}else{
			$koordinat.="{
					  'lintang': ".$data['lintang'].",
					  'bujur': ".$data['bujur'].",
					  'id_bidan':'".$data['nama_usaha']."'
				     },";
		}
	}
	$koordinat=substr($koordinat,0,strlen($koordinat)-1);// Hilangkan , terakhir
	echo $koordinat;
?>
];
