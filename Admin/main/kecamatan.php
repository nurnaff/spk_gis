<div id="menu">
<ul class="menu">
<li><a href='?page=kecamatan'>Daftar Kecamatan</a></li>
<li><a href='?page=kecamatan&add'>Tambah Kecamatan</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="contents">
<?php
if(isset($_GET['add'])){
	?>
   	<form method="post" action="" id="geeky">
    <table>
    <tr><td>Kabupaten</td><td><select name="id_kabupaten" class="input" required="true">
    <option value="" selected="selected"></option>
    <?php
	$sql_p = mysql_query("select * from tbl_kabupaten order by 1 asc");
	while($r_p = mysql_fetch_array($sql_p)){
		echo "<option value='".$r_p['id_kabupaten']."'>".$r_p['nama_kabupaten']."</option>";
	}
	?>
    </select></td></tr>
    <tr><td>Nama Kecamatan</td><td><input type="text" name="nama_kecamatan" class="input" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Tambah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("insert into tbl_kecamatan set id_kabupaten = '".$_POST['id_kabupaten']."',
					 nama_kecamatan = '".$_POST['nama_kecamatan']."'");
		echo "<script>location.href='?page=kecamatan'</script>";
	}
}elseif(isset($_GET['hapus'])){
	mysql_query("delete from tbl_kecamatan where id_kecamatan = '".$_GET['hapus']."'");
	echo "<script>location.href='?page=kecamatan'</script>";
}elseif(isset($_GET['edit'])){
	$sql_e = mysql_query("select * from tbl_kecamatan where id_kecamatan = '".$_GET['edit']."'");
	$r_e   = mysql_fetch_array($sql_e);
	?>
    <form method="post" action="" id="geeky">
    <table>
    <tr><td>Kabupaten</td><td><select name="id_kabupaten" class="input" required="true">
    <option value="" selected="selected"></option>
    <?php
	$sql_p = mysql_query("select * from tbl_kabupaten order by 1 asc");
	while($r_p = mysql_fetch_array($sql_p)){
		if($r_e['id_kabupaten'] == $r_p['id_kabupaten']){
			echo "<option value='".$r_p['id_kabupaten']."' selected>".$r_p['nama_kabupaten']."</option>";
		}else{
			echo "<option value='".$r_p['id_kabupaten']."'>".$r_p['nama_kabupaten']."</option>";
		}
	}
	?>
    </select></td></tr>
    <tr><td>Nama Kecamatan</td><td><input type="text" name="nama_kecamatan" value="<?php echo $r_e['nama_kecamatan']; ?>" class="input" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Ubah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("update tbl_kecamatan set id_kabupaten = '".$_POST['id_kabupaten']."', kd_kecamatan = '".$_POST['kd_kecamatan']."',
					 nama_kecamatan = '".$_POST['nama_kecamatan']."' where id_kecamatan = '".$_GET['edit']."'");
		echo "<script>location.href='?page=kecamatan'</script>";
	}
}else{
	?>
    <form id="mac">
    <table>
    <tr><th>No</th><th>Propinsi</th><th>Kabupaten</th><th>Nama Kecamatan</th><th>Setting</th></tr>
    <?php
	$batch = 10;
	$sql_count = mysql_query("select * from tbl_kecamatan, tbl_kabupaten, tbl_propinsi where tbl_kecamatan.id_kabupaten = tbl_kabupaten.id_kabupaten
							  AND tbl_kabupaten.id_propinsi = tbl_propinsi.id_propinsi order by 1 asc");
	$r_count   = mysql_num_rows($sql_count);
	$pages     = ceil($r_count / $batch);
	$page      = isset($_GET["act"]) ? (int)$_GET["act"] : 1;
	$start     = ($page - 1) * $batch;
	$no        = $start + 1;
	$sql_list = mysql_query("select * from tbl_kecamatan, tbl_kabupaten, tbl_propinsi where tbl_kecamatan.id_kabupaten = tbl_kabupaten.id_kabupaten
							  AND tbl_kabupaten.id_propinsi = tbl_propinsi.id_propinsi order by 1 asc limit ".$start.", ".$batch."");
	while($r_list = mysql_fetch_array($sql_list)){
		echo "<tr><td>".$no."</td><td>".$r_list['nama_propinsi']."</td>";
		echo "<td>".$r_list['nama_kabupaten']."</td><td>".$r_list['nama_kecamatan']."</td>";
		echo "<td><a href='?page=kecamatan&edit=".$r_list['id_kecamatan']."'>Edit</a> | ";
		?>
		<a href='?page=kecamatan&hapus=<?php echo $r_list['id_kecamatan']; ?>' onclick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a></td></tr>
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
			echo ($i == $page) ? "<li class='active'><a href='?page=kecamatan&act=".$i."'>".$i."</a></li>" : 
							     "<li><a href='?page=kecamatan&act=".$i."'>".$i."</a></li>";
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