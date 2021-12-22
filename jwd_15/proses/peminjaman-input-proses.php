<?php
include'../koneksi.php';
$id_peminjaman=$_POST['id_peminjaman'];
$id_anggota=$_POST['id_anggota'];
$id_buku=$_POST['id_buku'];
$tglpinjam=$_POST['tglpinjam'];
$status="Tidak Meminjam";
	
if(isset($_POST['simpan'])){
		extract($_POST);
		$id_anggota_file   = $_FILES['foto']['name'];
		if(!empty($id_anggota_file)){
		// Baca lokasi file sementar dan id_anggota file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($id_anggota_file, PATHINFO_EXTENSION);
		$file_foto = $id_peminjaman.".".$tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto="-";
	
	$sql = 
	"INSERT INTO tbpeminjaman
		VALUES('$id_peminjaman','$id_anggota','$id_buku','$tglpinjam')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=peminjaman");
}
?>