<pre><?php 	print_r($_SESSION['id_admin']); ?></pre>
<h1 text-center>Form Tambah Gaji</h1>

<div class="container">
	<div class="col s12 m12 l6">
		<div class="card-panel">
			<h4 class="header2">Form Gaji Karyawan</h4>
			<div class="row">
				<form class="col s12" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
							<input name="nama_karyawan" type="text" class="validate" required>
							<label for="icon_prefix" class="active">Nama Karyawan</label>
						</div>
					</div>

					<br>
					<br>
					<h3>Dibayar Oleh Perusahaan</h3>
					<h6>Penggajian dan Penghasilan Pajak</h6>	
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">email</i>
							<input name="gaji_bulanan" type="number" class="validate" required >
							<label >Gaji Pokok</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">email</i>
							<input name="bpjs_jkk" type="number" class="validate" required >
							<label >BPJS TK JKM JKK</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">email</i>
							<input name="bpjs_kes" type="number" class="validate" required >
							<label>BPJS Kesehatan</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">email</i>
							<input name="gaji_kotor" type="number" class="validate" required >
							<label >Gaji Kotor</label>
						</div>
					</div>
					<br>
					<button  class="btn waves-effect waves-light right col s2 green" type="submit" name="simpan">Simpan
						<i class="material-icons right">send</i>
					</button>
				</form>
		<?php 
		if (isset($_POST['simpan'])) 
		{
			$nama_karyawan = $_POST["nama_karyawan"];
			$gaji_bulanan = $_POST["gaji_bulanan"];
			$bpjs_jkk = $_POST["bpjs_jkk"];
			$bpjs_kes = $_POST["bpjs_kes"];
			$gaji_kotor = $_POST["gaji_kotor"];

			if (!isset($_SESSION["id_admin"])) header("location:login.php"); 
			$admin = $_SESSION["nama_admin"];

			$koneksi->query("INSERT INTO tbl_payroll 
				(
				nama_karyawan,
				gaji_bulanan,
				bpjs_jkk,
				bpjs_kes,
				gaji_kotor,
				nama_admin
				) 
				VALUES (
				'$nama_karyawan',
				'$gaji_bulanan',
				'$bpjs_jkk',
				'$bpjs_kes',
				'$gaji_kotor',
				'$admin') ");


			echo "<div class='alert alert-info'>Data tersimpan</div>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_karyawan'>";


		} ?>
	</div>
</div>
</div>



