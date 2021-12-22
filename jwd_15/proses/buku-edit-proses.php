<?php
include'../koneksi.php';

$id_buku=$_POST['id_buku'];
$judul=$_POST['judul'];
$jenis=$_POST['jenis'];
$pengarang=$_POST['pengarang'];

If(isset($_POST['simpan'])){
	
		extract($_POST);
		$judul_file   = $_FILES['foto']['name'];
		if(!empty($judul_file)){
		// Baca lokasi file sementar dan judul file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($judul_file, PATHINFO_EXTENSION);
		$file_foto = $id_buku.".".$tipe_file;
		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		@unlink ("$folder");
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto=$foto_awal;
	
	mysqli_query($db,
		"UPDATE tbbuku
		SET judul='$judul',jenis='$jenis',pengarang='$pengarang',foto='$file_foto'
		WHERE idbuku='$id_buku'"
	);
	header("location:../index.php?p=buku");
}
?>
