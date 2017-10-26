<div id="menu">
<ul class="menu">
<li><a href='?page=kategori'>Daftar Kategori Usaha</a></li>
<li><a href='?page=kategori&add'>Tambah Kategori Usaha</a></li>
</ul>
<div id="footer_menu"></div>
</div>
<div id="contents">
<?php
if(isset($_GET['add'])){
	?>
   	<form method="post" action="" id="geeky">
    <table>
    <tr><td>Nama Kategori Usaha</td><td><input type="text" name="nama_kategori_usaha" class="input" required="true" /></td></tr>
    <tr><td></td><td><input type="submit" value="Tambah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("insert into tbl_kategori_usaha set 
					 nama_kategori_usaha = '".$_POST['nama_kategori_usaha']."'");
		echo "<script>location.href='?page=kategori'</script>";
	}
}elseif(isset($_GET['hapus'])){
	mysql_query("delete from tbl_kategori_usaha where id_kategori_usaha = '".$_GET['hapus']."'");
	echo "<script>location.href='?page=kategori'</script>";
}elseif(isset($_GET['edit'])){
	$sql_e = mysql_query("select * from tbl_kategori_usaha where id_kategori_usaha = '".$_GET['edit']."'");
	$r_e   = mysql_fetch_array($sql_e);
	?>
    <form method="post" action="" id="geeky">
    <table>
    <tr><td>Nama Kategori Usaha</td><td><input type="text" name="nama_kategori_usaha" class="input" required="true" value="<?php echo $r_e['nama_kategori_usaha']; ?>" /></td></tr>
    <tr><td></td><td><input type="submit" value="Ubah" class="button" name="btn_add" />
    <input type="button" value="Batal" class="button" onclick="self.history.back()" /></td></tr>
    </table>
    </form> 
    <?php
	if(isset($_POST['btn_add'])){
		mysql_query("update tbl_kategori_usaha set nama_kategori_usaha = '".$_POST['nama_kategori_usaha']."' where id_kategori_usaha = '".$_GET['edit']."'");
		echo "<script>location.href='?page=kategori'</script>";
	}
}else{
	?>
    <form id="mac">
    <table>
    <tr><th>No</th><th width="500">Nama Kategori Usaha</th><th>Setting</th></tr>
    <?php
	$no=1;
	$sql_list = mysql_query("select * from tbl_kategori_usaha order by 1 asc");
	while($r_list = mysql_fetch_array($sql_list)){
		echo "<tr><td>".$no."</td><td>".$r_list['nama_kategori_usaha']."</td>";
		echo "<td><a href='?page=kategori&edit=".$r_list['id_kategori_usaha']."'>Edit</a> | ";
		?>
		<a href='?page=kategori&hapus=<?php echo $r_list['id_kategori_usaha']; ?>' onclick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a></td></tr>
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