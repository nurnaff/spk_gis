<div id="header_msg">
Berikut ini adalah data tabel usaha dan warung yang ada di KECAMATAN KARANGGENENG dan ada nama-nama usaha dan warung, nama-nama pemilik usaha dan warung
</div>
<form id="mac">
<table>
<tr><th>No</th><th>Code Desa</th><th>Desa (Kelurahan)</th><th>Nama Usaha</th><th>Nama Pemilik</th><th>Titik Lokasi</th></tr>
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
    echo "<td><a href='./?page=map&code=".$r_list['id_kelurahan']."' target='_blank'>Lihat Titik Lokasi</a></td>";
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