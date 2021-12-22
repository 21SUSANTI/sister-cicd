<?php
include'../koneksi.php';

$id_peminjaman=$_POST['id_peminjaman'];
$id_anggota=$_POST['idanggota'];
$id_buku=$_POST['idbuku'];
$tglpinjam=$_POST['tglpinjam'];
$status="Tidak Meminjam";

If(isset($_POST['simpan'])){
	
		extract($_POST);
		$nama_file   = $_FILES['foto']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_peminjaman.".".$tipe_file;
		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		@unlink ("$folder");
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto=$foto_awal;
	
	mysqli_query($db,
		"UPDATE tbpeminjaman
		SET idanggota='$id_anggota',idbuku='$id_buku',tglpinjam='$tglpinjam'
		WHERE idpeminjaman='$id_peminjaman'"
	);
	header("location:../index.php?p=peminjaman");
}
?>
