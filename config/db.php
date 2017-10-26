<?php
mysql_connect("localhost","root","");
mysql_select_db("ta_sofyan");

// function readmore($str, $url){
	// $max = 60;
	// $exp = explode(" ", $str);
	// $output = NULL;
	// if(count($exp)>$max){
		// for($i=0; $i<$max; $i++){
			// $output .= $exp[$i]." ";
		// }
		// echo $output."...<br /><a href='".$url."'>Baca Selengkapnya!</a>";
	// }else{
		// echo $str;	
	// }
// }

// function kd_auto($table, $inisial){
	// $struktur = mysql_query("SELECT * FROM ".$table."");
	// $field 	  = mysql_field_name($struktur, 0);
	// $panjang  = mysql_field_len($struktur, 0);
	
	// $sql 	  = mysql_query("SELECT max(".$field.") FROM ".$table."");
	// $row 	  = mysql_fetch_array($sql);
	
	// if($row[0] == ""){
		// $angka = 0;	
	// }else{
		// $angka = substr($row[0], strlen($inisial));
	// }
	
	// $angka++;
	// $angka = strval($angka);
	// $tmp = "";
	// for($i = 1; $i <= ($panjang - strlen($inisial) - strlen($angka)); $i++){
		// $tmp = $tmp."0";
	// }
	// return $inisial.$tmp.$angka;
// }

// function kd_autox($table, $inisial){
	// $struktur = mysql_query("SELECT * FROM ".$table."");
	// $field 	  = mysql_field_name($struktur, 3);
	// $panjang  = mysql_field_len($struktur, 3);
	
	// $sql 	  = mysql_query("SELECT max(".$field.") FROM ".$table."");
	// $row 	  = mysql_fetch_array($sql);
	
	// if($row[0] == ""){
		// $angka = 0;	
	// }else{
		// $angka = substr($row[0], strlen($inisial));
	// }
	
	// $angka++;
	// $angka = strval($angka);
	// $tmp = "";
	// for($i = 1; $i <= ($panjang - strlen($inisial) - strlen($angka)); $i++){
		// $tmp = $tmp."0";
	// }
	// return $inisial.$tmp.$angka;
// }

// function select($table, $field, $id){
	// $sql = mysql_query("select * from tbl_".$table." WHERE id_".$table." = '".$id."'");
	// $r   = mysql_fetch_array($sql);
	// return $r[$field];
// }
?>