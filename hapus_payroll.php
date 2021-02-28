  <?php 
	$ambil = $koneksi->query("SELECT * FROM tbl_payroll WHERE id_payroll='$_GET[id]' ");
	$pecah= $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM tbl_payroll WHERE id_payroll='$_GET[id]' ");

	echo "<script>alert('payroll terhapus');</script>";
	echo "<script>location='index.php?halaman=payroll';</script>";
 ?>

