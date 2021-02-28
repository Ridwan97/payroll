  <?php 
	$ambil = $koneksi->query("SELECT * FROM tbl_karyawan WHERE id_karyawan='$_GET[id]' ");
	$pecah= $ambil->fetch_assoc();
	$fotokaryawan = $pecah['foto_karyawan'];
	if(file_exists("images/karyawan/$fotokaryawan"))
	{
		unlink("images/karyawan/$fotokaryawan");
	}

	$koneksi->query("DELETE FROM tbl_karyawan WHERE id_karyawan='$_GET[id]' ");

	echo "<script>alert('Karyawan sudah terhapus');</script>";
	echo "<script>location='index.php?halaman=data_karyawan';</script>";
 ?>

