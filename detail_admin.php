<?php 
$id_admin=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM tbl_admin WHERE id_admin='$id_admin'; ");
while($pecah=$ambil->fetch_assoc()){
	?>

	<div class="container">
		<h1>Detail Data Admin</h1>
		<div class="row">
			<div class="col s3">
				<h5>
				Nama <br>
				User Admin <br>	
				Jenis Kelamin <br>	
				Email Admin <br>	
				No Handphone
				</h5>
				 
			</div>
			<div class="col s1">
				<h5>
				: <br>
				: <br>
				: <br>
				: <br>
				:	
				</h5>
			</div>
			<div class="col s3">
				<h5>
				<?php echo $pecah['nama_admin']; ?> <br>
				<?php echo $pecah['user_admin']; ?>	 <br>
				<?php echo $pecah['jk_admin']; ?> <br>
				<?php echo 	$pecah['email_admin']; ?> <br>
				<?php echo 	$pecah['no_handphone']; ?>
				</h5>				
			</div>
			<div class="col s4">
				<img src="images/admin/<?php echo 	$pecah['foto_admin'];?>" style="float: right; height: 150px; width: 150px;">
			</div>
		</div>
		</div>

	</div>	

<?php }
?>