<div id="label-page"><h3>Input Data buku</h3></div>
<div id="content">
	<form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">FOTO</td>
			<td class="isian-formulir"><input type="file" name="foto" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">ID buku</td>
			<td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul</td>
			<td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Jenis</td>
			<td class="isian-formulir"><input type="radio" name="jenis" value="Fiksi">Fiksi</label></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="radio" name="jenis" value="Non_Fiksi">Non Fiksi</td>
		</tr>
		<tr>
			<td class="label-formulir">Pengarang</td>
			<td class="isian-formulir"><textarea rows="2" cols="40" name="pengarang" class="isian-formulir isian-formulir-border"></textarea></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>