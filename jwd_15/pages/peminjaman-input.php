<div id="label-page"><h3>Input Data Peminjaman</h3></div>
<div id="content">
	<form action="proses/peminjaman-input-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID PEMINJAMAN</td>
			<td class="isian-formulir"><input type="text" name="id_peminjaman" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">ID Anggota</td>
			<td class="isian-formulir"><input type="text" name="id_anggota" class="isian-formulir isian-formulir-border"></td>
		</tr>
        <tr>
			<td class="label-formulir">ID BUKU</td>
			<td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">TANGGAL PINJAM</td>
			<td class="isian-formulir"><input type="text" name="tglpinjam" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>