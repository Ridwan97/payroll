<?php
$id_karyawan= $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM tbl_karyawan JOIN tbl_ptkp ON tbl_karyawan.id_ptkp=tbl_ptkp.id_ptkp JOIN tbl_status ON tbl_karyawan.id_status=tbl_status.id_status WHERE id_karyawan='$id_karyawan'"); 
$detail_karyawan =$ambil->fetch_assoc();



// echo "<pre>";
// print_r($detail_karyawan);
// echo "</pre>";
?>

<div class="container">
	<h2 class="text-center">Profile karyawan</h2>

<div class="row">

	<div class="col s4">
		<h5>
			<strong>Nama :</strong> <?php echo $detail_karyawan['nama_karyawan'] ?><br>
			<strong>Tanggal Masuk :</strong> <?php echo date("d F Y",strtotime(	$detail_karyawan['tgl_masuk'])) ?>
			<strong>NPWP : </strong><?php echo $detail_karyawan['npwp'] ?><br>
				
		</h5>
	</div>
	<div class="col s5">
		<h5>
			<strong>bpjs :</strong> <?php echo $detail_karyawan['bpjs'] ?><br>
<strong>No handphone :</strong> <?php echo $detail_karyawan['no_handphone'] ?><br>	
<strong>Penghasilan Tidak Kena Pajak :</strong> <?php echo $detail_karyawan['nama_ptkp'] ?><br>	
<strong>Status :</strong> <?php echo $detail_karyawan['nama_status'] ?>	
		</h5>
	</div>
	<div class="col s3">
		<img src="images/karyawan/<?php echo $detail_karyawan['foto_karyawan'] ?>" style="height: 300px; width: 200px;" >	
	</div>
</div>
</div>



