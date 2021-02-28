<?php 
$dataptkp = array();

$ambil = $koneksi->query("SELECT * FROM tbl_ptkp");
while($tiap = $ambil->fetch_assoc())
{
	$dataptkp[] = $tiap;
}
?>

<?php 
$datastatus = array();

$ambil = $koneksi->query("SELECT * FROM tbl_status");
while($tiap = $ambil->fetch_assoc())
{
	$datastatus[] = $tiap;
}

?>
<pre><?php 	print_r($_SESSION['id_admin']); ?></pre>	
<h1>Tambah Karyawan</h1>

<div class="container">
	<div class="col s12 m12 l6">
		<div class="card-panel">
			<h4 class="header2">Form Gaji Karyawan</h4>
			<div class="row">
				<form class="col s12" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input name="nama_karyawan" type="text" class="validate" required>
							<label>Nama</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">monetization_on</i>
							<input name="npwp" type="text" class="validate" required>
							<label >NPWP</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">local_hospital</i>
							<input name="bpjs" type="text" class="validate" required>
							<label >BPJS</label>
						</div>	
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">date_range</i>
							<input type="date" name='tgl_masuk' >	
							<label for="icon_prefix" class="active">Awal Masuk</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">money_off</i>
							<select name="id_ptkp">
								<option value="" disabled selected></option>
								<?php foreach ($dataptkp as $key => $value): ?>
									<option value="<?php echo $value['id_ptkp'] ?>"><?php echo $value['nama_ptkp'] ?></option>
								<?php endforeach ?>
							</select>
							<label>PTKP</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">local_phone</i>
							<input name="no_handphone" type="text" class="validate" required>
							<label >No Handphone</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">assignment_ind</i>
							<select name="id_status">
								<option value="" disabled selected></option>
								<?php foreach ($datastatus as $key => $value): ?>
									<option value="<?php echo $value['id_status'] ?>"><?php echo $value['nama_status'] ?></option>
								<?php endforeach ?>
							</select>
							<label>Status</label>
						</div>						
					</div>

					<div class="row">
						<div class="file-field input-field col s10">
							<div class="btn indigo">
								<span>File</span>
								<input type="file" name="foto" required>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<br>
						<button  class="btn waves-effect waves-light right col s2 green" type="submit" name="simpan">Simpan
							<i class="material-icons right">send</i>
						</button>
					</div>
				</form>
				<?php 
				if (isset($_POST['simpan'])) 
				{
					$foto_karyawan = $_FILES['foto']['name'];
					$lokasifoto = $_FILES['foto']['tmp_name'];
					move_uploaded_file($lokasifoto, "images/karyawan/".$foto_karyawan);

					$nama_karyawan = $_POST["nama_karyawan"];
					$npwp = $_POST["npwp"];
					$bpjs = $_POST["bpjs"];
					$tgl_masuk = $_POST["tgl_masuk"];
					$id_ptkp = $_POST["id_ptkp"];
					$no_handphone = $_POST["no_handphone"];
					$id_status = $_POST["id_status"];
					$id_karyawan = 'krywn'.date("YmdHis").rand(10,1000);

					if (!isset($_SESSION["id_admin"])) header("location:login.php"); 
					$admin = $_SESSION["nama_admin"];

					$koneksi->query("INSERT INTO tbl_karyawan 
						(
						id_karyawan,
						nama_karyawan,
						npwp,
						bpjs,
						tgl_masuk,
						id_ptkp,
						no_handphone,
						foto_karyawan,
						id_status,
						nama_admin
						) 
						VALUES (
						'$id_karyawan',
						'$nama_karyawan',
						'$npwp',
						'$bpjs',
						'$tgl_masuk',
						'$id_ptkp',
						'$tgl_masuk',
						'$foto_karyawan',
						'$id_status',
						'$admin') ");

		
					echo "<div class='alert alert-info'>Data tersimpan</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_karyawan'>";


				}
				?>
			</div>
		</div>
	</div>
</div>