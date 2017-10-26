<h1>Inputkan Data Tes</h1>
<table>
<form action="proseshitung.php" method="post">
<tr bgcolor="#CCCCCC">
<td>Inputkan Luas Lahan Persawahan</td>
<td>:</td>
<td><input type="text" name="sawah" width="100"></td> </tr>
<tr bgcolor="#CCCCCC">
<td>Inputkan Luas Lahan Waduk</td>
<td>:</td>
<td><input type="text" name="waduk" width="100"></td> </tr>
<tr bgcolor="#CCCCCC">
<td>Inputkan Kemiringan Tanah</td>
<td>:</td>
<td>
<select name="miring">
<option value="0">-pilih-</option>
<option value="0 - 2 %">0 - 2 %</option>
<option value="2 - 5 %">2 - 5 %</option>
<option value="5 - 15 %">5 - 15 %</option>
</select>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td>Inputkan Ketinggian Tanah</td>
<td>:</td>
<td>
<select name="tinggi">
<option value="0">-pilih-</option>
<option value="0 - 100 m">0 - 100 m</option>
<option value="100 - 500 m">100 - 500 m</option>
</select>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td>Inputkan Curah Hujan</td>
<td>:</td>
<td>
<select name="hujan">
<option value="0">-pilih-</option>
<option value="Tadah Hujan">Tadah Hujan</option>
<option value="Irigasi Semi Teknis">Irigasi Semi Teknis</option>
</select>
</td>
</tr>
<tr bgcolor="#CCCCCC">
<td>Inputkan Topografi</td>
<td>:</td>
<td>
<select name="topografi">
<option value="0">-pilih-</option>
<option value="Dataran">Dataran</option>
<option value="Perbukitan">Perbukitan</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" value="Proses" /></td>
</tr>
</form>
</table>