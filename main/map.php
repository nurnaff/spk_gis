<form method="post" action="" id="geeky">
<table>
<tr><td><select name="id_kelurahan" class="input" required="true">
<option value="" selected="selected">-- Pilih Code Kelurahan --</option>
<?php
$sql_bid = mysql_query("select * from tbl_kelurahan order by 1 asc");
while($r_bid = mysql_fetch_array($sql_bid)){
	echo "<option value='".$r_bid['id_kelurahan']."'>".$r_bid['kd_kelurahan']." - ".$r_bid['nama_kelurahan']."</option>";
}
?>
</select></td></tr>
<tr><td><input type="submit" value="Cari Lokasi" name="btn_search" class="button" /></td></tr>
</table>
</form><br />
<?php
if(isset($_POST["btn_search"])){
	echo "<script>location.href='?page=map&code=".$_POST["id_kelurahan"]."'</script>";	
}
?>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDs7DDghtxpe7kOIwtCcgkIPNSr5pVgYA4&sensor=true"></script>
<script type="text/javascript">
	var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
	new google.maps.Size(32, 32), new google.maps.Point(0, 0),
	new google.maps.Point(16, 32));
	var center = null;
	var map = null;
	var currentPopup;
	var southWest = new google.maps.LatLng(-6.9901192,112.3649749);
	var northEast = new google.maps.LatLng(-6.9885021,112.4074228);
	var bounds = new google.maps.LatLngBounds(southWest,northEast);
	
	function addMarker(lat, lng, info){
		var pt = new google.maps.LatLng(lat, lng);
		bounds.extend(pt);
		var marker = new google.maps.Marker({
		position: pt,
        icon: icon,
		map: map
	});
	
	var popup = new google.maps.InfoWindow({
		content: info,
		maxWidth: 345,
	});
	
	google.maps.event.addListener(marker, "click", function(){
		if(currentPopup != null){
		currentPopup.close();
		currentPopup = null;
	}
	
	popup.open(map, marker);
	currentPopup = popup;
	});
	
	google.maps.event.addListener(popup, "closeclick", function(){
		map.panTo(center);
		currentPopup = null;
	});
	}
	
	function initMap() {
		map = new google.maps.Map(document.getElementById("map"), {
		zoom: 17,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		panControl: true,
		zoomControl: true,
		mapTypeControl: true,
		scaleControl: true,
		streetViewControl: true,
		overviewMapControl: true,
		mapTypeControlOptions:{
		style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
	},
	
		navigationControl: true,
		navigationControlOptions: {
		style: google.maps.NavigationControlStyle.SMALL
	}
	});

	<?php
	
	if(isset($_GET["code"]) && ($_GET['code'] > 0)){
		$query = mysql_query("SELECT * FROM tbl_lokasi, tbl_kelurahan where tbl_lokasi.id_kelurahan = tbl_kelurahan.id_kelurahan
							  AND tbl_kelurahan.id_kelurahan = '".$_GET["code"]."'");
		$row = mysql_fetch_array($query);
		$nama_usaha=$row['nama_usaha'];
		$lat=$row['lintang'];
		$lon=$row['bujur'];
		echo("addMarker($lat, $lon,'<b>".$nama_usaha."</b>');\n");
	}else{
		$query = mysql_query("SELECT * FROM tbl_lokasi, tbl_kelurahan where tbl_lokasi.id_kelurahan = tbl_kelurahan.id_kelurahan");
		while($row = mysql_fetch_array($query)){
			$nama_usaha=$row['nama_usaha'];
			$nama_pemilik=$row['nama_pemilik'];
			$lat=$row['lintang'];
			$lon=$row['bujur'];
			$gambar = "<img src=./admin/lokasi_img/".$row['photo']." width=130>";
			echo("addMarker($lat, $lon,'Nama usaha : <b>".$nama_usaha."</b><br />Nama Pemilik : <b>".$nama_pemilik."</b><br />Gambar Lokasi : <br />".$gambar."');\n");	
		}
	}
	?>
	center = bounds.getCenter();
	map.fitBounds(bounds);
}
</script>

</head>
<body onLoad="initMap()">
<div id="one">
<div id="map" style="width: 700px; height: 700px;"></div>
</div>