<?php
include'../koneksi.php';
$id_buku=$_POST['id_buku'];
$judul=$_POST['judul'];
$jenis=$_POST['jenis'];
$pengarang=$_POST['pengarang'];
	
if(isset($_POST['simpan'])){
		extract($_POST);
		$judul_file   = $_FILES['foto']['name'];
		if(!empty($judul_file)){
		// Baca lokasi file sementar dan judul file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($judul_file, PATHINFO_EXTENSION);
		$file_foto = $id_buku.".".$tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto="-";
	
	$sql = 
	"INSERT INTO tbbuku
		VALUES('$id_buku','$judul','$jenis','$pengarang','$file_foto')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=buku");
}
?>