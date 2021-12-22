<?php
	$id_peminjaman=$_GET['id'];
	$q_tampil_peminjaman=mysqli_query($db,"SELECT * FROM tbpeminjaman WHERE idpeminjaman='$id_peminjaman'");
	$r_tampil_peminjaman=mysqli_fetch_array($q_tampil_peminjaman);
?>
<div id="label-page"><h3>Edit Data Peminjaman</h3></div>
<div id="content">
	<form action="proses/peminjaman-edit-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID peminjaman</td>
			<td class="isian-formulir"><input type="text" name="id_peminjaman" value="<?php echo $r_tampil_peminjaman['idpeminjaman']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">ID Anggota</td>
			<td class="isian-formulir"><input type="text" name="id_anggota" value="<?php echo $r_tampil_peminjaman['idanggota']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><input type="text" name="id_buku" value="<?php echo $r_tampil_peminjaman['idbuku']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
        <tr>
			<td class="label-formulir">Tanggal Peminjaman</td>
			<td class="isian-formulir"><input type="text" name="tglpinjam" value="<?php echo $r_tampil_peminjaman['tglpinjam']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div>