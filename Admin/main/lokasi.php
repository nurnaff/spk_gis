<div id="menu">
<ul class="menu">
<li><a href='?page=lokasi'>Daftar Letak Lokasi</a></li>
<li><a href='?page=lokasi&add'>Tambah Letak Lokasi</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="contents">
<?php
if(isset($_GET["add"])){
?>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDs7DDghtxpe7kOIwtCcgkIPNSr5pVgYA4&sensor=false"></script>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=AIzaSyDs7DDghtxpe7kOIwtCcgkIPNSr5pVgYA4" type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
    var map;
	var geocoder;
	var address;
    
    
    function BuatMarker(lintang, bujur, id_bidan, nama_usaha) {
        var marker = new GMarker(new GLatLng(lintang, bujur));
        GEvent.addListener(marker, 'click', 
                            function() {
                                marker.openInfoWindowHtml(id_bidan);
                            }
                           );
    
        map.addOverlay(marker);
    }
	
    function load() {
			if (GBrowserIsCompatible()) {			 
            map = new GMap2(document.getElementById("map"));
			map.addControl(new GLargeMapControl());
			map.addControl(new GMapTypeControl());
			map.addControl(new GScaleControl());
			map.enableContinuousZoom();
			GEvent.addListener(map, 'click',
							function(overlay,latlng) {
								document.frm.bujur.value=latlng.lng();
								document.frm.lintang.value=latlng.lat();
								
							}
						   );
						   
			GEvent.addListener(map, "moveend", 
							   function() {
									var center = map.getCenter();
									draggable : true;
									//document.getElementById("info").innerHTML="Posisi tengah : "+center.toString();
								}
							   );
			
			var batas_kiri,batas_kanan,batas_atas,batas_bawah;
			batas_atas=master_map[0].lintang;
			batas_bawah=master_map[0].lintang;
			batas_kiri=master_map[0].bujur;
			batas_kanan=master_map[0].bujur;
			for(i=0;i<master_map.length;i++){
				BuatMarker(master_map[i].lintang,master_map[i].bujur,master_map[i].id_bidan);	
				if(master_map[i].lintang<batas_atas) batas_atas=master_map[i].lintang;
				if(master_map[i].lintang>batas_bawah) batas_bawah=master_map[i].lintang;
				if(master_map[i].bujur<batas_kiri) batas_kiri=master_map[i].bujur;
				if(master_map[i].bujur>batas_kanan) batas_kanan=master_map[i].bujur;
            }
            var location = new GLatLng(-6.9899488,112.3368225);
            map.setCenter(location, 13);
        }
    }
    //]]>
    </script>
    </head>
    <body onLoad="load()">
    <div id="one">
    <div id="map" style="width: 700px; height: 700px;"></div>
    <div id="info"></div>
    </div>
    <div id="two">
    <form name="frm" id="geekyx" method="post" action="" enctype="multipart/form-data">
    <table>
    <tr><td>Kategori Usaha</td><td><select name="id_kategori_usaha" class="input" required>
    <option value="" selected></option>
    <?php
	$sql_k = mysql_query("select * from tbl_kategori_usaha");
	while($r_k = mysql_fetch_array($sql_k)){
		echo "<option value='".$r_k['id_kategori_usaha']."'>".$r_k['nama_kategori_usaha']."</option>";
	}
	?>
    </select></td></tr>
    <tr><td>Kelurahan</td><td><select name="id_kelurahan" class="input" required="true">
    <option value="" selected></option>
    <?php
	$sql_bid = mysql_query("select * from tbl_kelurahan order by 1 asc");
	while($r_bid = mysql_fetch_array($sql_bid)){
		echo "<option value='".$r_bid['id_kelurahan']."'>".$r_bid['nama_kelurahan']."</option>";
	}
	?>
    </select></td></tr>
    <tr><td>Nama Usaha</td><td><input type="text" name="nama_usaha" class="input" required size="40"></td></tr>
    <tr><td>Nama Pemilik</td><td><input type="text" name="nama_pemilik" class="input" required size="40"></td></tr>
    <tr><td>Photo Lokasi</td><td><input type="file" name="lokasi_img" required="true"></td></tr>
    <tr><td>Keterangan Lain</td><td><textarea name="keterangan_lain" class="textarea" required='true'></textarea></td></tr>
    <tr><td colspan="2">Klik di peta untuk mengambil lokasi koordinat</td></tr>
    <tr><td>Longitude (Bujur)</td><td><input type="text" class="input" required="true" name="bujur" /></td></tr>
    <tr><td>Latitude (Lintang)</td><td><input type="text" name="lintang" required="true" class="input" /></td></tr>
    <tr><td></td><td><input type="submit" name="simpan" value="Simpan" class="button" />
    <input type="button" value="Batal" class="button" onClick="self.history.back()"></td></tr>
    </table>
    </form>
    </div>
	<?php
	$lokasi_img = str_replace(" ", "_", $_FILES["lokasi_img"]["name"]);
    if(isset($_POST['simpan'])){
        include "../../config/db.php";
		move_uploaded_file($_FILES["lokasi_img"]["tmp_name"], "lokasi_img/".$lokasi_img);
        $sql = mysql_query("insert into tbl_lokasi set id_kelurahan = '".$_POST["id_kelurahan"]."', id_kategori_usaha = '".$_POST['id_kategori_usaha']."', 
						    nama_usaha = '".$_POST['nama_usaha']."', nama_pemilik = '".$_POST['nama_pemilik']."', 
							keterangan_lain = '".$_POST['keterangan_lain']."', lintang='".$_POST["lintang"]."', bujur='".$_POST["bujur"]."', photo = '".$lokasi_img."'");
        if($sql){
            echo "<script>location.href='?page=lokasi'</script>";	
        }	
    }
}elseif(isset($_GET["edit"])){
	$sql_edit = mysql_query("select * from tbl_lokasi where id_lokasi = '".$_GET["edit"]."'");
	$r_edit   = mysql_fetch_array($sql_edit);
	?>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDs7DDghtxpe7kOIwtCcgkIPNSr5pVgYA4&sensor=false"></script>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=AIzaSyDs7DDghtxpe7kOIwtCcgkIPNSr5pVgYA4" type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
    var map;
	var geocoder;
	var address;
    
    
    function BuatMarker(lintang, bujur, id_bidan, nama_usaha) {
        var marker = new GMarker(new GLatLng(lintang, bujur));
        GEvent.addListener(marker, 'click', 
                            function() {
                                marker.openInfoWindowHtml(id_bidan);
                            }
                           );
    
        map.addOverlay(marker);
    }
	
    function load() {
			if (GBrowserIsCompatible()) {			 
            map = new GMap2(document.getElementById("map"));
			map.addControl(new GLargeMapControl());
			map.addControl(new GMapTypeControl());
			map.addControl(new GScaleControl());
			map.enableContinuousZoom();
			GEvent.addListener(map, 'click',
							function(overlay,latlng) {
								document.frm.bujur.value=latlng.lng();
								document.frm.lintang.value=latlng.lat();
								
							}
						   );
						   
			GEvent.addListener(map, "moveend", 
							   function() {
									var center = map.getCenter();
									draggable : true;
									//document.getElementById("info").innerHTML="Posisi tengah : "+center.toString();
								}
							   );
			
			var batas_kiri,batas_kanan,batas_atas,batas_bawah;
			batas_atas=master_map[0].lintang;
			batas_bawah=master_map[0].lintang;
			batas_kiri=master_map[0].bujur;
			batas_kanan=master_map[0].bujur;
			for(i=0;i<master_map.length;i++){
				BuatMarker(master_map[i].lintang,master_map[i].bujur,master_map[i].id_bidan);	
				if(master_map[i].lintang<batas_atas) batas_atas=master_map[i].lintang;
				if(master_map[i].lintang>batas_bawah) batas_bawah=master_map[i].lintang;
				if(master_map[i].bujur<batas_kiri) batas_kiri=master_map[i].bujur;
				if(master_map[i].bujur>batas_kanan) batas_kanan=master_map[i].bujur;
            }
            var location = new GLatLng(-6.9899488,112.3368225);
            map.setCenter(location, 13);
        }
    }
    //]]>
    </script>
    </head>
    <body onLoad="load()">
    <div id="one">
    <div id="map" style="width: 700px; height: 700px;"></div>
    <div id="info"></div>
    </div>
    <div id="two">
    <form name="frm" id="geekyx" method="post" action="" enctype="multipart/form-data">
    <table>
    <tr><td>Kategori Usaha</td><td><select name="id_kategori_usaha" class="input" required>
    <option value="" selected></option>
    <?php
	$sql_k = mysql_query("select * from tbl_kategori_usaha");
	while($r_k = mysql_fetch_array($sql_k)){
		if($r_k['id_kategori'] == $r_edit['id_kategori']){
			echo "<option value='".$r_k['id_kategori_usaha']."' selected>".$r_k['nama_kategori_usaha']."</option>";
		}else{
			echo "<option value='".$r_k['id_kategori_usaha']."'>".$r_k['nama_kategori_usaha']."</option>";
		}
	}
	?>
    </select></td></tr>
    <tr><td>Kelurahan</td><td><select name="id_kelurahan" class="input" required="true">
    <option value="" selected></option>
    <?php
	$sql_bid = mysql_query("select * from tbl_kelurahan order by 1 asc");
	while($r_bid = mysql_fetch_array($sql_bid)){
		if($r_edit['id_kelurahan'] == $r_bid['id_kelurahan']){
			echo "<option value='".$r_bid['id_kelurahan']."' selected>".$r_bid['nama_kelurahan']."</option>";
		}else{
			echo "<option value='".$r_bid['id_kelurahan']."'>".$r_bid['nama_kelurahan']."</option>";
		}
	}
	?>
    </select></td></tr>
    <tr><td>Nama Usaha</td><td><input type="text" value="<?php echo $r_edit['nama_usaha']; ?>" name="nama_usaha" class="input" required size="40"></td></tr>
    <tr><td>Nama Pemilik</td><td><input type="text" name="nama_pemilik" value="<?php echo $r_edit['nama_pemilik']; ?>" class="input" required size="40"></td></tr>
    <tr><td>Photo Lokasi</td><td><input type="file" name="lokasi_img"> *) Kosongkan jika tidak diganti</td></tr>
    <tr><td>Keterangan Lain</td><td><textarea name="keterangan_lain" class="textarea" required='true'><?php echo $r_edit['keterangan_lain']; ?></textarea></td></tr>
    <tr><td colspan="2">Klik di peta untuk mengambil lokasi koordinat</td></tr>
    <tr><td>Longitude (Bujur)</td><td><input type="text" class="input" required="true" name="bujur" value="<?php echo $r_edit['bujur']; ?>" /></td></tr>
    <tr><td>Latitude (Lintang)</td><td><input type="text" name="lintang" required="true" class="input" value="<?php echo $r_edit['lintang']; ?>" /></td></tr>
    <tr><td></td><td><input type="submit" name="simpan" value="Update" class="button" />
    <input type="button" value="Batal" class="button" onClick="self.history.back()"></td></tr>
    </table>
    </form>
    </div>
	<?php
	$lokasi_img = str_replace(" ", "_", $_FILES["lokasi_img"]["name"]);
    if(isset($_POST['simpan'])){
		if(!empty($lokasi_img)){
			move_uploaded_file($_FILES["lokasi_img"]["tmp_name"], "lokasi_img/".$lokasi_img);
			$sql = mysql_query("update tbl_lokasi set id_kelurahan = '".$_POST["id_kelurahan"]."', id_kategori_usaha = '".$_POST['id_kategori_usaha']."',
								nama_pemilik = '".$_POST['nama_pemilik']."', nama_usaha = '".$_POST['nama_usaha']."',
								keterangan_lain = '".$_POST['keterangan_lain']."', lintang='".$_POST["lintang"]."', bujur='".$_POST["bujur"]."', photo = '".$lokasi_img."'
								where id_lokasi = '".$_GET['edit']."'");
			if($sql){
				echo "<script>location.href='?page=lokasi'</script>";	
			}
		}else{
			$sql = mysql_query("update tbl_lokasi set id_kelurahan = '".$_POST["id_kelurahan"]."', id_kategori_usaha = '".$_POST['id_kategori_usaha']."',
								nama_pemilik = '".$_POST['nama_pemilik']."', nama_usaha = '".$_POST['nama_usaha']."',
								keterangan_lain = '".$_POST['keterangan_lain']."', lintang='".$_POST["lintang"]."', bujur='".$_POST["bujur"]."'
								where id_lokasi = '".$_GET['edit']."'");
			if($sql){
				echo "<script>location.href='?page=lokasi'</script>";	
			}
		}
    }
}elseif(isset($_GET["hapus"])){
	mysql_query("delete from tbl_lokasi where id_lokasi = '".$_GET["hapus"]."'");
	echo "<script>location.href='?page=lokasi'</script>";
}else{
	?>
    <form id="mac">
    <table>
    <tr><th>No</th><th>Code Desa</th><th>Desa</th><th>Nama Usaha</th><th>Nama Pemilik</th><th>Titik Lokasi</th><th>Setting</th></tr>
    <?php
	$batch = 5;
	$sql_count = mysql_query("select * from tbl_lokasi where id_kelurahan <> '0'");
	$r_count   = mysql_num_rows($sql_count);
	$pages     = ceil($r_count / $batch);
	$page      = isset($_GET["act"]) ? (int)$_GET["act"] : 1;
	$start     = ($page - 1) * $batch;
	$no        = $start + 1;
	$sql_list = mysql_query("select * from tbl_lokasi, tbl_kelurahan, tbl_kategori_usaha where tbl_lokasi.id_kelurahan = tbl_kelurahan.id_kelurahan
						     AND tbl_lokasi.id_kategori_usaha = tbl_kategori_usaha.id_kategori_usaha
							 AND tbl_lokasi.id_kelurahan <> '0' order by 1 asc limit ".$start.", ".$batch."");
	while($r_list = mysql_fetch_array($sql_list)){
		echo "<tr><td>".$no."</td><td>".$r_list['kd_kelurahan']."</td>";
		echo "<td>".$r_list['nama_kelurahan']."</td><td>".$r_list['nama_usaha']."</td><td>".$r_list['nama_pemilik']."</td>";
		echo "<td><a href='../?page=map&code=".$r_list['id_kelurahan']."' target='_blank'>Lihat Titik Lokasi</a></td>";
		echo "<td><a href='?page=lokasi&edit=".$r_list['id_kelurahan']."'>Edit</a> | ";
		?>
		<a href='?page=lokasi&hapus=<?php echo $r_list['id_lokasi']; ?>' onClick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a></tr>
		<?php
        $no++;
	}
	?>
    </table>
    <?php
	if($pages > 1){
		echo "<div id='box_page'>";
		echo "<ul class='box_page'>";
		for($i=1; $i<=$pages; $i++){
			echo ($i == $page) ? "<li class='active'><a href='?page=lokasi&act=".$i."'>".$i."</a></li>" : 
								 "<li><a href='?page=lokasi&act=".$i."'>".$i."</a></li>";
		}
		echo "</ul>";
		echo "<div id='footer_menu'></div>";
		echo "</div>";
	}
	?>
	</form>
	<?php
}
?>
</div>
</body>
</html>