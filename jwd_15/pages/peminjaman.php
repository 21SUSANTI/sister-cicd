<div id="label-page"><h3>Tampil Data peminjaman</h3></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="index.php?p=peminjaman-input" class="tombol">Tambah peminjaman</a>
	<a target="_blank" href="pages/cetakPeminjaman.php"><img src="images/print.png" height="50px" height="50px"></a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID peminjaman</th>
			<th>ID Anggota</th>
			<th>ID buku</th>
			<th>Tanggal Pinjam</th>
			<th id="label-opsi">Opsi</th>
		</tr>
	
		<?php
		$batas = 4;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi+1;
		}	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tbpeminjaman WHERE idpeminjaman LIKE '%$pencarian%'
						OR idanggota LIKE '%$pencarian%'
						OR idbuku LIKE '%$pencarian%'
						OR tglpinjam LIKE '%$pencarian%'";
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tbpeminjaman LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbpeminjaman";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tbpeminjaman LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbpeminjaman";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbpeminjaman ORDER BY idpeminjaman DESC";
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
			<td>
				<div class="tombol-opsi-container"><a href="index.php?p=peminjaman-edit&id=<?php echo $r_tampil_peminjaman['idpeminjaman'];?>" class="tombol">Edit</a></div>
				<div class="tombol-opsi-container"><a href="proses/peminjaman-hapus.php?id=<?php echo $r_tampil_peminjaman['idpeminjaman']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
			</td>			
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
	<?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
		<div style="float: left;">		
		<?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Jumlah Data : <b>$jml</b>";
		?>			
		</div>		
		<div class="pagination">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=peminjaman&hal=$i\">$i</a>";
					}
					else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
		</div>
	<?php
	}
	?>
</div>