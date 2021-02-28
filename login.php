 <?php 	
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
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/mbooks.ico" sizes="32x32">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	<title>LOGIN | Books 12</title>
 	<body>
 		<!--Navbar-->
 		<!-- 	<?php include"navbar.php" ?> -->
 <br>
 		<div class="container">	
 			<div class="row">
 				<div class="col s12 m4 offset-m4 center">
 					<img src="images/logo/mbooks.png" height="200px">
 				</div>
 			</div>
 			<div class="row">
 					<div class="card-panel hoverable s4 m4 offset-m4 center" >
 						<span class="card-title"><h3><center>LOGIN ADMIN</center></h3></span>
 						<span class="white-text">
 							<form method="post">
 								<div class="input-field">
 									<i class="material-icons prefix">email</i>
 									<input id="icon_email" type="text" class="validate" name="username" required autocomplete="off">
 									<label for="icon_email">User</label>
 								</div>
 								<div class="input-field">
 									<i class="material-icons prefix">lock</i>
 									<input id="icon_lock" type="password" required class="validate" name="password">
 									<label for="icon_lock">Password</label>
 								</div>
 								<div class="row">
 									<div class="col s6 m6 l6 xl6">
 										<a href="daftar.php" class="button btn blue left">Daftar</a>	
 									</div>
 									<div class="col s6 m6 l6 xl6">
 										<button class="btn right" name="login">Login</button>
 									</div>
 								</div>	
 							</form>
 						</span>
 					</div>
 				</div>
 			</div>

 		</div>
		<?php   // if (isset($_SESSION['id'])){ header ('location:index.php');}
		if (isset($_POST['login'])) 
		{

			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$ambil = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE user_admin='$username' AND password_admin='$password' ");

			if (mysqli_num_rows($ambil) > 0){
				$row =  mysqli_fetch_assoc($ambil);
				$_SESSION['user_admin'] = $row['user_admin'];
				$_SESSION['nama_admin'] = $row['nama_admin'];
				$_SESSION['id_admin'] = $row['id_admin'];
				$_SESSION['foto_admin'] = $row['foto_admin'];
            // $_SESSION['id_admin'] = $row['id_admin'];
            // $_SESSION['id_toko'] = $row['id_toko'];
       //    $_SESSION['nama'];
				echo "<script>alert('Login Sukses')</script>";
				echo "<meta http-equiv='refresh' content='1;url=index.php'> ";

             // session_start();
             // $_SESSION['status_login']='sudah_login';
             // header('location:index.php');
			}
			else{ 
				echo "<script>alert('Username atau Password salah')</script>";
				echo "<meta http-equiv='refresh' content='1 url=login.php'>";
			}


		}

		?>
<!-- 		<?php 	
// jika ada tombol login (tombol login ditekan)
		if (isset ($_POST["login"]))
		{
			$email = $_POST["email"];
			$password = $_POST["password"];
	//lakukan query ngecek akun ditabel pelanggan di db
			$ambil = $koneksi-> query("SELECT * FROM pelanggan 
				WHERE email_pelanggan='$email' 
				AND password_pelanggan='$password' ");

	// ngitung akun yang terambil
			$akunyangcocok = $ambil->num_rows;

	//jika 1 akun yang cocok, maka diloginkan
			if ($akunyangcocok==1)
			{
		//anda sudah login
		//mendapatkan akun dalam array
				$akun = $ambil->fetch_assoc();
		// simpern di session pelanggan
				$_SESSION['pelanggan'] = $akun;
				echo "<script>alert('anda berhasil login');</script>";
				// jika sudah belanja
				if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]) ) 
				{
					echo "<script>location='checkout.php';</script>";
				}
				else{
					echo "<script>location='index.php';</script>";

				}
			}
			else
			{
		//anda gagal login
				echo "<script>alert('anda gagal login, periksa akun anda');</script>";
				echo "<script>location='login.php';</script>";
			}

		}

		?> -->


	</body>
	</html>