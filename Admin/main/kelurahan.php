<div id="menu">
<ul class="menu">
<li><a href='?page=kelurahan'>Daftar Kelurahan</a></li>
<li><a href='?page=kelurahan&add'>Tambah Kelurahan</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="contents">
<?php
if(isset($_GET['add'])){
	?>
   	<form method="post" action="" id="geeky">
    <table>
    <tr><td>Code Kelurahan</td><td><input type="text" name="kd_kelurahan" size="8" class="input" required="true" /></td></tr>
    <tr><td>Kecamatan</td><td><select name="id_kecamatan" class="input" required="true">
    <option value="" selected="selected"></option>
    <?php
	$sql_p = mysql_query("select * from tbl_kecamatan order by 1 asc");
	while($r_p = mysql_fetch_array($sql_p)){
		echo "<option value='".$r_p['id_kecamatan']."'>".$r_p['nama_kecamatan']."</option>";
	}
	?>
    </select></td></tr>
    <tr><td>Nama Kelurahan</td><td><input type="text" name="nama_kelurahan" class="input" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Tambah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("insert into tbl_kelurahan set id_kecamatan = '".$_POST['id_kecamatan']."',
					 kd_kelurahan = '".$_POST['kd_kelurahan']."', nama_kelurahan = '".$_POST['nama_kelurahan']."'");
		echo "<script>location.href='?page=kelurahan'</script>";
	}
}elseif(isset($_GET['hapus'])){
	mysql_query("delete from tbl_kecamatan where id_kecamatan = '".$_GET['hapus']."'");
	echo "<script>location.href='?page=kelurahan'</script>";
}elseif(isset($_GET['edit'])){
	$sql_e = mysql_query("select * from tbl_kelurahan where id_kelurahan = '".$_GET['edit']."'");
	$r_e   = mysql_fetch_array($sql_e);
	?>
    <form method="post" action="" id="geeky">
    <table>
    <tr><td>Code Kelurahan</td><td><input type="text" value="<?php echo $r_e['kd_kelurahan']; ?>" name="kd_kelurahan" size="8" class="input" required="true" /></td></tr>
    <tr><td>Kecamatan</td><td><select name="id_kecamatan" class="input" required="true">
    <option value="" selected="selected"></option>
    <?php
	$sql_p = mysql_query("select * from tbl_kecamatan order by 1 asc");
	while($r_p = mysql_fetch_array($sql_p)){
		if($r_p['id_kecamatan'] == $r_e['id_kecamatan']){
			echo "<option value='".$r_p['id_kecamatan']."' selected>".$r_p['nama_kecamatan']."</option>";
		}else{
			echo "<option value='".$r_p['id_kecamatan']."'>".$r_p['nama_kecamatan']."</option>";
		}
	}
	?>
    </select></td></tr>
    <tr><td>Nama Kelurahan</td><td><input type="text" name="nama_kelurahan" class="input" value="<?php echo $r_e['nama_kelurahan']; ?>" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Update" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("update tbl_kelurahan set id_kecamatan = '".$_POST['id_kecamatan']."',
					 kd_kelurahan = '".$_POST['kd_kelurahan']."', nama_kelurahan = '".$_POST['nama_kelurahan']."'
					 where id_kelurahan = '".$_GET['edit']."'");
		echo "<script>location.href='?page=kelurahan'</script>";
	}
}else{
	?>
    <form id="mac">
    <table>
    <tr><th>No</th><th>Code Desa/Kelurahan</th><th width="400">Nama Desa/Kelurahan</th><th>Setting</th></tr>
    <?php
	$batch = 10;
	$sql_count = mysql_query("select * from tbl_kelurahan order by 1 asc");
	$r_count   = mysql_num_rows($sql_count);
	$pages     = ceil($r_count / $batch);
	$page      = isset($_GET["act"]) ? (int)$_GET["act"] : 1;
	$start     = ($page - 1) * $batch;
	$no        = $start + 1;
	$sql_list = mysql_query("select * from tbl_kelurahan order by 1 asc limit ".$start.", ".$batch."");
	while($r_list = mysql_fetch_array($sql_list)){
		echo "<tr><td>".$no."</td>";
		echo "<td>".$r_list['kd_kelurahan']."</td><td>".$r_list['nama_kelurahan']."</td>";
		echo "<td><a href='?page=kelurahan&edit=".$r_list['id_kelurahan']."'>Edit</a> | ";
		?>
		<a href='?page=kelurahan&hapus=<?php echo $r_list['id_kelurahan']; ?>' onclick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a></td></tr>
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
			echo ($i == $page) ? "<li class='active'><a href='?page=kelurahan&act=".$i."'>".$i."</a></li>" : 
							     "<li><a href='?page=kelurahan&act=".$i."'>".$i."</a></li>";
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