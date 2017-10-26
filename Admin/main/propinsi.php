<div id="menu">
<ul class="menu">
<li><a href='?page=propinsi'>Daftar Propinsi</a></li>
<li><a href='?page=propinsi&add'>Tambah Propinsi</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="contents">
<?php
if(isset($_GET['add'])){
	?>
   	<form method="post" action="" id="geeky">
    <table>
    <tr><td>Nama Propinsi</td><td><input type="text" name="nama_propinsi" class="input" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Tambah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("insert into tbl_propinsi set 
					 nama_propinsi = '".$_POST['nama_propinsi']."'");
		echo "<script>location.href='?page=propinsi'</script>";
	}
}elseif(isset($_GET['hapus'])){
	mysql_query("delete from tbl_propinsi where id_propinsi = '".$_GET['hapus']."'");
	echo "<script>location.href='?page=propinsi'</script>";
}elseif(isset($_GET['edit'])){
	$sql_e = mysql_query("select * from tbl_propinsi where id_propinsi = '".$_GET['edit']."'");
	$r_e   = mysql_fetch_array($sql_e);
	?>
    <form method="post" action="" id="geeky">
    <table>
    <tr><td>Nama Propinsi</td><td><input type="text" name="nama_propinsi" class="input" required="true" value="<?php echo $r_e['nama_propinsi']; ?>" /></td></tr>
    <tr><td></td><td><input type="submit" value="Ubah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("update tbl_propinsi set nama_propinsi = '".$_POST['nama_propinsi']."' where id_propinsi = '".$_GET['edit']."'");
		echo "<script>location.href='?page=propinsi'</script>";
	}
}else{
	?>
    <form id="mac">
    <table>
    <tr><th>No</th><th width="500">Nama Propinsi</th><th>Setting</th></tr>
    <?php
	$no=1;
	$sql_list = mysql_query("select * from tbl_propinsi order by 1 asc");
	while($r_list = mysql_fetch_array($sql_list)){
		echo "<tr><td>".$no."</td><td>".$r_list['nama_propinsi']."</td>";
		echo "<td><a href='?page=propinsi&edit=".$r_list['id_propinsi']."'>Edit</a> | ";
		?>
		<a href='?page=propinsi&hapus=<?php echo $r_list['id_propinsi']; ?>' onclick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a></td></tr>
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