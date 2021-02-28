<?php 
//koneksi ke database
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- My Css -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="text/css" href="favicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Home | Books 12</title>
</head>
<!-- Form with validation -->
<div class="container">
	<div class="col s12 m12 l6">
		<div class="card-panel">
			<h4 class="header2">Form Pendaftaran Admin</h4>
			<div class="row">
				<form class="col s12" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input name="user_admin" type="text" class="validate" required>
							<label >User Admin</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock_outline</i>
							<input name="password_admin" type="password" class="validate" required>
							<label >Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_box</i>
							<input name="nama_admin" type="text" class="validate" required>
							<label >Nama Admin</label>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<p>
								<label>
									<input name="jk_admin" value="pria" type="radio" validate/>
									<span>Pria</span>
								</label>
							</p>
						</div>
						<div class="col s6">
							<p>
								<label>
									<input name="jk_admin" value="wanita" type="radio" validate/>
									<span>Wanita</span>
								</label>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">email</i>
							<input name="email_admin" type="email" class="validate" required>
							<label >Email Admin</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">phone_iphone</i>
							<input name="no_handphone" type="number" class="validate" required>
							<label>Nomor Handphone</label>
						</div>
					</div>
					<div class="row">
						<div class="file-field input-field col s10">
							<div class="btn indigo">
								<span>File</span>
								<input type="file" name="foto_admin" required>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<br>
						<button  class="btn waves-effect waves-light right col s2 green" type="submit" name="daftar">Daftar
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</form>
			<?php 
			// jika ada tombol daftar(ditekan tombol daftar)
			if (isset($_POST["daftar"])) 
			{
				$id_admin = 'adm'.date("Y").$letter = chr(rand(65,90)).rand(1,10).date("m").$letter = chr(rand(97,122)).rand(10,100).date("d");
			//mengambil isian nama, email, password, alamat telpon
			  // upload dulu foto bukti
				$namabukti=$_FILES["foto_admin"]["name"];
				$lokasibukti=$_FILES["foto_admin"]["tmp_name"];
				$fotop=date("YmdHis").$namabukti;
				move_uploaded_file($lokasibukti, "images/admin/$fotop");

				$user_admin = $_POST["user_admin"];
				$password_admin = sha1($_POST["password_admin"]) ;
				$nama_admin = $_POST["nama_admin"];
				$jk_admin = $_POST["jk_admin"];
				$email_admin = $_POST["email_admin"];
				$no_handphone = $_POST["no_handphone"];

				

		 	// cek apakah email sudah digunakan
				$ambil = $koneksi->query("SELECT * FROM tbl_admin WHERE user_admin='$user'");
				$yangcocok =$ambil->num_rows;
				if ($yangcocok==1)
				{
					echo "<script>alert('pendaftaran gagal, user admin sudah digunakan');</script>";
					echo "<script>location='daftar.php';</script>";
				}
				else 
				{
			// query insert ke tabel admin 
					$koneksi->query("INSERT INTO tbl_admin (
						id_admin,
						user_admin,
						password_admin, 
						nama_admin,
						jk_admin,
						email_admin,
						no_handphone,
						foto_admin ) 
						VALUES (
						'$id_admin',
						'$user_admin',
						'$password_admin',
						'$nama_admin',
						'$jk_admin',
						'$email_admin',
						'$no_handphone',
						'$fotop');");

					echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
					echo "<script>location='login.php';</script>";
				}

			}

			?>
		</div>
	</div>
</div>
