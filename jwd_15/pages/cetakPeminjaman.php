<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data peminjaman</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</th>
			<th>ID Peminjaman</th>
			<th>ID Anggota</th>
			<th>ID Buku/th>
			<th>Tanggal Peminjaman</th>
		</tr>
		
		<?php		
		$nomor=1;
		$query="SELECT * FROM tbpeminjaman ORDER BY idpeminjaman DESC";
		$q_tampil_peminjaman = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_peminjaman)>0)
		{
		while($r_tampil_peminjaman=mysqli_fetch_array($q_tampil_peminjaman)){
			if(empty($r_tampil_peminjaman['foto'])or($r_tampil_peminjaman['foto']=='-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_peminjaman['foto'];
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_peminjaman['idpeminjaman']; ?></td>
			<td><?php echo $r_tampil_peminjaman['idanggota']; ?></td>
			<td><?php echo $r_tampil_peminjaman['idbuku']; ?></td>
			<td><?php echo $r_tampil_peminjaman['tglpinjam']; ?></td>		
		</tr>		
		<?php $nomor++; } 
		}?>		
	</table>
	<script>
		window.print();
	</script>
</div>
