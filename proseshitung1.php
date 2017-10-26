<head>
<title>Penentuan Irigasi Baru</title>
</head>
<body>
<h1>Hasil Penentuan Pembangunan Irigasi Baru</h1>
<?php
$sawah=$_POST['sawah'];
$waduk=$_POST['waduk'];
$miring=$_POST['miring'];
$tinggi=$_POST['tinggi'];
$hujan=$_POST['hujan'];
$topografi=$_POST['topografi'];
include("koneksi.php");
$qll=mysql_query("select count(*) as tot from tb_data",$con);
$eks1=mysql_fetch_assoc($qll);
$jumlah=$eks1['tot'];

$ql1=mysql_query("select count(*) as jum1 from tb_data where IRIGASI2='Non Irigasi'",$con);
$eksekusi=mysql_fetch_assoc($ql1);
$jum1=$eksekusi['jum1'];

$ql2=mysql_query("select count(*) as jum2 from tb_data where IRIGASI2='Irigasi'",$con);
$eksekusi=mysql_fetch_assoc($ql2);
$jum2=$eksekusi['jum2'];

$q1=mysql_query("select count(*) as jm1 from tb_data where IRIGASI2='Non Irigasi' and LUAS_LAHAN2='$sawah'",$con);
$eksekusi=mysql_fetch_assoc($q1);
$jm1=$eksekusi['jm1'];

$q2=mysql_query("select count(*) as jm2 from tb_data where IRIGASI2='Non Irigasi' and LUAS_WADUK2='$waduk'",$con);
$eksekusi=mysql_fetch_assoc($q2);
$jm2=$eksekusi['jm2'];

$q3=mysql_query("select count(*) as jm3 from tb_data where IRIGASI2='Non Irigasi' and KEMIRINGAN2='$miring'",$con);
$eksekusi=mysql_fetch_assoc($q3);
$jm3=$eksekusi['jm3'];

$q4=mysql_query("select count(*) as jm4 from tb_data where IRIGASI2='Non Irigasi' and KETINGGIAN2='$tinggi'",$con);
$eksekusi=mysql_fetch_assoc($q4);
$jm4=$eksekusi['jm4'];

$q5=mysql_query("select count(*) as jm5 from tb_data where IRIGASI2='Non Irigasi' and CURAH_HUJAN2='$hujan'",$con);
$eksekusi=mysql_fetch_assoc($q5);
$jm5=$eksekusi['jm5'];

$q6=mysql_query("select count(*) as jm6 from tb_data where IRIGASI2='Non Irigasi' and TOPOGRAFI2='$topografi'",$con);
$eksekusi=mysql_fetch_assoc($q6);
$jm6=$eksekusi['jm6'];

$l1=mysql_query("select count(*) as j1 from tb_data where IRIGASI2='Irigasi' and LUAS_LAHAN2='$sawah'",$con);
$eksekusi=mysql_fetch_assoc($l1);
$j1=$eksekusi['j1'];

$l2=mysql_query("select count(*) as j2 from tb_data where IRIGASI2='Irigasi' and LUAS_WADUK2='$waduk'",$con);
$eksekusi=mysql_fetch_assoc($l2);
$j2=$eksekusi['j2'];

$l3=mysql_query("select count(*) as j3 from tb_data where IRIGASI2='Irigasi' and KEMIRINGAN2='$miring'",$con);
$eksekusi=mysql_fetch_assoc($l3);
$j3=$eksekusi['j3'];

$l4=mysql_query("select count(*) as j4 from tb_data where IRIGASI2='Irigasi' and KETINGGIAN2='$tinggi'",$con);
$eksekusi=mysql_fetch_assoc($l4);
$j4=$eksekusi['j4'];

$l5=mysql_query("select count(*) as j5 from tb_data where IRIGASI2='Irigasi' and CURAH_HUJAN2='$hujan'",$con);
$eksekusi=mysql_fetch_assoc($l5);
$j5=$eksekusi['j5'];

$l6=mysql_query("select count(*) as j6 from tb_data where IRIGASI2='Irigasi' and TOPOGRAFI2='$topografi'",$con);
$eksekusi=mysql_fetch_assoc($l6);
$j6=$eksekusi['j6'];

$irigasi=$jum2/$jumlah*(($j1+1)/($jum2+6))*(($j2+1)/($jum2+6))*(($j3+1)/($jum2+6))*(($j4+1)/($jum2+6))*(($j5+1)/($jum2+6))*(($j6+1)/($jum2+6));
$non_irigasi=$jum1/$jumlah*(($jm1+1)/($jum1+6))*(($jm2+1)/($jum1+6))*(($jm3+1)/($jum1+6))*(($jm4+1)/($jum1+6))*(($jm5+1)/($jum1+6))*(($jm6+1)/($jum1+6));
if($irigasi>$non_irigasi)
 {$keputusan="Keputusan Irigasi Baru";}
else {$keputusan="Keputusan Tidak Irigasi Baru";}
?>
<table>
<tr> <td> Hasil Keputusan <?php echo $keputusan; ?> </td> </tr> </table>
</body>
</html>