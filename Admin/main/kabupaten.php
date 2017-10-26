<div id="menu">
<ul class="menu">
<li><a href='?page=kabupaten'>Daftar Kabupaten</a></li>
<li><a href='?page=kabupaten&add'>Tambah Kabupaten</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="contents">
<?php
if(isset($_GET['add'])){
	?>
   	<form method="post" action="" id="geeky">
    <table>
    <tr><td>Propinsi</td><td><select name="id_propinsi" class="input" required="true">
    <option value="" selected="selected"></option>
    <?php
	$sql_p = mysql_query("select * from tbl_propinsi order by 1 asc");
	while($r_p = mysql_fetch_array($sql_p)){
		echo "<option value='".$r_p['id_propinsi']."'>".$r_p['nama_propinsi']."</option>";
	}
	?>
    </select></td></tr>
    <tr><td>Nama Kabupaten</td><td><input type="text" name="nama_kabupaten" class="input" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Tambah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("insert into tbl_kabupaten set id_propinsi = '".$_POST['id_propinsi']."',
					 nama_kabupaten = '".$_POST['nama_kabupaten']."'");
		echo "<script>location.href='?page=kabupaten'</script>";
	}
}elseif(isset($_GET['hapus'])){
	mysql_query("delete from tbl_kabupaten where id_kabupaten = '".$_GET['hapus']."'");
	echo "<script>location.href='?page=kabupaten'</script>";
}elseif(isset($_GET['edit'])){
	$sql_e = mysql_query("select * from tbl_kabupaten where id_kabupaten = '".$_GET['edit']."'");
	$r_e   = mysql_fetch_array($sql_e);
	?>
    <form method="post" action="" id="geeky">
    <table>
    <tr><td>Propinsi</td><td><select name="id_propinsi" class="input" required="true">
    <option value="" selected="selected"></option>
    <?php
	$sql_p = mysql_query("select * from tbl_propinsi order by 1 asc");
	while($r_p = mysql_fetch_array($sql_p)){
		if($r_e['id_propinsi'] == $r_p['id_propinsi']){
			echo "<option value='".$r_p['id_propinsi']."' selected>".$r_p['nama_propinsi']."</option>";
		}else{
			echo "<option value='".$r_p['id_propinsi']."'>".$r_p['nama_propinsi']."</option>";
		}
	}
	?>
    </select></td></tr>
    <tr><td>Nama Kabupaten</td><td><input type="text" name="nama_kabupaten" value="<?php echo $r_e['nama_kabupaten']; ?>" class="input" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Ubah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("update tbl_kabupaten set id_propinsi = '".$_POST['id_propinsi']."',
					 nama_kabupaten = '".$_POST['nama_kabupaten']."' where id_kabupaten = '".$_GET['edit']."'");
		echo "<script>location.href='?page=kabupaten'</script>";
	}
}else{
	?>
    <form id="mac">
    <table>
    <tr><th>No</th><th width="300">Propinsi</th><th width="300">Nama Kabupaten</th><th>Setting</th></tr>
    <?php
	$no=1;
	$sql_list = mysql_query("select * from tbl_kabupaten, tbl_propinsi where tbl_kabupaten.id_propinsi = tbl_propinsi.id_propinsi order by 1 asc");
	while($r_list = mysql_fetch_array($sql_list)){
		echo "<tr><td>".$no."</td><td>".$r_list['nama_propinsi']."</td><td>".$r_list['nama_kabupaten']."</td>";
		echo "<td><a href='?page=kabupaten&edit=".$r_list['id_kabupaten']."'>Edit</a> | ";
		?>
		<a href='?page=kabupaten&hapus=<?php echo $r_list['id_kabupaten']; ?>' onclick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a></td></tr>
        <?php
		$no++;
	}
	?>
    </table>
    </form>
    <?php
}
?>
</div>