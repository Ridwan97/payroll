 <?php
 $id_payroll= $_GET["id"];
 $ambil = $koneksi->query("SELECT * FROM tbl_payroll 
 	JOIN tbl_npwp ON tbl_payroll.id_npwp=tbl_npwp.id_npwp 
 	JOIN tbl_status ON tbl_payroll.id_status=tbl_status.id_status 
 	JOIN tbl_ptkp ON tbl_payroll.id_ptkp=tbl_ptkp.id_ptkp
 	WHERE id_payroll='$id_payroll'"); 
 $pecah =$ambil->fetch_assoc();



// echo "<pre>";
// print_r($detail_payroll);
// echo "</pre>";
 ?>
 
 <div class="container">
 	<h1>Detail Data Payroll</h1>
 	<div class="row">
 		<div class="col s2">
 			<h6>
 				<b>
 					Nama Karyawan <br>
 					Gaji Pokok <br>
 					Tanggal Masuk <br>
 					NPWP <br>
 					Status Karyawan <br>
 					PTKP <br>
 				</b>
 			</h6>	 
 		</div>
 		<div class="col s1">
 			<h6>
 				<b>
 					:<br> 
 					:<br>
 					:<br> 
 					:<br>
 					:<br>
 					:<br>
 				</b>	
 			</h6>
 		</div>
 		<div class="col s3">
 			<h6>
 				<b>
 					<?php echo $pecah['nama_karyawan']; ?> <br>	
 					Rp. <?php echo number_format($pecah['gaji_pokok']); ?> <br>
 					<?php echo date("d F Y",strtotime(	$pecah['tgl_masuk'])) ?><br>
 					<?php echo $pecah['status_npwp'] ;?> <br>
 					<?php echo 	$pecah['nama_status'] ?> <br>
 					<?php echo 	$pecah['nama_ptkp']; ?><br>
 				</b>
 			</h6>				
 		</div>
 		<div class="col s3">
 			<h6>
 				<b>
 					Jumlah Hari Kerja selama setahun<br>
 					Alokasi THR <br>
 					Persenan THR <br>
 					Tunjangan Hari Raya <br>
 					Lama Bekerja <br>
 				</b>
 			</h6>
 		</div>
 		<div class="col s1">
 			<h6>
 				<b>

 					:<br>
 					:<br>
 					:<br>
 					:<br>
 					:<br>
 				</b>
 			</h6>
 		</div>
 		<div class="col s2">
 			<h6>
 				<b>
 					<?php echo $pecah['hari_kerja'] ?> hari<br>
 					<?php 
 					if ($pecah['alokasi_hari'] == 0) {
 						echo "- hari<br>";
 					} elseif ($pecah['alokasi_hari'] > 1) {
 						echo $pecah['alokasi_hari']." hari <br>";	
 					} 
 					?>
 					<?php 
 					if ($pecah['persenan_thr'] == 0) {
 						echo "- %<br>";
 					} elseif ($pecah['persenan_thr'] > 1) {
 						echo $pecah['persenan_thr']." % <br>";	
 					} 
 					?>
 					<?php
 					if ($pecah['thr'] == 0) {
 						echo "-<br>";
 					} elseif ($pecah['thr'] > 1) {
 						echo "Rp.".number_format($pecah['thr'])."<br>";	
 					} 
 					?>
 					<?php
 					$awal  = new DateTime($pecah['tgl_masuk']);
 					$akhir_dec = new DateTime('2020-12-31');
 					$diff  = $awal->diff($akhir_dec);

 					if ($awal >= $akhir_dec) {
 						$selisih = "0 hari";
 					} elseif ($awal <= $akhir_dec) {
 						$selisih  = $diff->format('%m bulan %d hari');	
 					} else {
 						$selisih = "0 hari";
 					}

					echo $selisih; // Usia anda adalah 29 tahun 9 hari.
					?>


				</b>
			</h6>
		</div>

	</div>

	<div class="row">
		<div class="col s6">
			<h4> Dibayar Oleh Perusahaan <br> </h4>
			<h6>Penggajian dan Penghasilan Pajak</h6> 			
		</div>
		<div class="col s6">
			<h4> Dibayar Oleh Karyawan <br></h4>
			<h6> Penggajian dan Pembayaran Pajak</h6>
		</div>
	</div>
	<div class="row">
		<div class="col s3">
			<p>
				Gaji Setahun <br>	
				BPJS TK JKM JKK 0,54%<br>	
				BPJS Kesehatan 4% MAX 480rb<br>
				<strong>Gaji Kotor</strong> <br>
			</p>
		</div>
		<div class="col s1">
			<p>
				: <br>
				: <br>
				: <br> 	
				<b>:</b> <br>
			</p>
		</div>
		<div class="col s2">
			<p align="right">
				<?php
				if ($pecah['gaji_setahun'] == 0) {
					echo "-<br>";
				} elseif ($pecah['gaji_setahun'] > 1) {
					echo "Rp.".number_format($pecah['gaji_setahun'])."<br>";	
				} 
				?>
				<?php
				if ($pecah['bpjs_jkm'] == 0) {
					echo "-<br>";
				} elseif ($pecah['bpjs_jkm'] > 1) {
					echo "Rp.".number_format($pecah['bpjs_jkm'])."<br>";	
				} 
				?>
				<?php
				if ($pecah['bpjs_kes'] == 0) {
					echo "-<br>";
				} elseif ($pecah['bpjs_kes'] > 1) {
					echo "Rp.".number_format($pecah['bpjs_kes'])."<br>";	
				} 
				?>
				<?php
				if ($pecah['gaji_kotor'] == 0) {
					echo "<b>-</b><br>";
				} elseif ($pecah['gaji_kotor'] > 1) {
					echo "<b>Rp.".number_format($pecah['gaji_kotor'])."</b><br>";	
				} 
				?>
			</p>
		</div>
		<div class="col s3">
			<p>
				BPJSTK JHT 2% <br>
				BPJS JP Maksimal Rp. 89,397<br>
				Biaya Jabatan Max 500rb<br>
				<b>Total Pajak</b> <br>
			</p>	
		</div>
		<div class="col s1">
			<p>
				: <br>
				: <br>
				: <br>
				<b>:</b> <br>
			</p>
		</div>
		<div class="col s2">
			<p align="right">
				<?php
				if ($pecah['bpjstk_jht'] == 0) {
					echo "-<br>";
				} elseif ($pecah['bpjstk_jht'] > 1) {
					echo "Rp.".number_format($pecah['bpjstk_jht'])."<br>";	
				} 
				?>
				<?php
				if ($pecah['bpjstk_jp'] == 0) {
					echo "-<br>";
				} elseif ($pecah['bpjstk_jp'] > 1) {
					echo "Rp.".number_format($pecah['bpjstk_jp'])."<br>";	
				} 
				?>
				<?php
				if ($pecah['biaya_jabatan'] == 0) {
					echo "-<br>";
				} elseif ($pecah['biaya_jabatan'] > 1) {
					echo "Rp.".number_format($pecah['biaya_jabatan'])."<br>";	
				} 
				?>
				<?php
				if ($pecah['total_pajak'] == 0) {
					echo "<b>-</b><br>";
				} elseif ($pecah['total_pajak'] > 1) {
					echo "<b>Rp.".number_format($pecah['total_pajak'])."</b><br>";	
				} 
				?>
			</p>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col s6">
			<h4>Penghasilan Tidak Kena Pajak <br></h4>
			<h6>Yang Diterima Karyawan</h6>
		</div>
		<div class="col s6">
			<h4>Pembayaran Kena Pajak PPH21 <br></h4>
			<h6>Lapisan Penghasilan kena Pajak</h6>
		</div>
	</div>
	<div class="row">
		<div class="col s3">
			<p>
				<b>Penghasilan Bersih</b><br>
				Penghasilan Tidak Kena Pajak <br>
				Penhghasilan Kena Pajak <br>	
			</p>
		</div>
		<div class="col s1">
			<p>
				<b>:</b><br>
				: <br>
				: <br>
			</p>
		</div>
		<div class="col s2">
			<p align="right">
				<?php
				if ($pecah['penghasilan_bersih'] == 0) {
					echo "<b>-</b><br>";
				} elseif ($pecah['penghasilan_bersih'] > 1) {
					echo "<b>Rp.".number_format($pecah['penghasilan_bersih'])."</b><br>";	
				} 
				?>
				<?php
				if ($pecah['id_status'] == 1 OR $pecah['penghasilan_bersih'] <= $pecah['nilai_ptkp']) {
					echo "-<br>";
				} elseif ($pecah['id_status'] == 0 OR $pecah['penghasilan_bersih'] >= $pecah['nilai_ptkp']) {
					echo "Rp.".number_format($pecah['nilai_ptkp'])."<br>";	
				} 
				?>
				<?php
				if ($pecah['penghasilan_kena_pajak'] == 0) {
					echo "-<br>";
				} elseif ($pecah['penghasilan_kena_pajak'] > 1) {
					echo "Rp.".number_format($pecah['penghasilan_kena_pajak'])."<br>";	
				} 
				?>
			</p>
		</div>
		<div class="col s3">
			<p>
				<?php if ($pecah['id_npwp'] == 1): ?>
					0 - 50Jt 5% dengan NPWP
					<?php else : ?>
						0 - 50Jt 6% dengan NPWP
					<?php endif ?>
					<br>

					<?php if ($pecah['id_npwp'] == 1): ?>
						50Jt - 250Jt 15% dengan NPWP
						<?php else : ?>
							50Jt - 250Jt 18% dengan NPWP
						<?php endif ?>
						<br>

						<?php if ($pecah['id_npwp'] == 1): ?>
							250Jt - 500Jt 25% dengan NPWP
							<?php else : ?>
								250Jt - 500Jt 30% dengan NPWP
							<?php endif ?>
							<br>
							<?php if ($pecah['id_npwp'] == 1): ?>
								lebih dari 500Jt 30% dengan NPWP
								<?php else : ?>
									lebih dari 500Jt 36% dengan NPWP
								<?php endif ?>
								<br>
								<b>Total PPH 21</b> <br>		
							</p>
						</div>
						<div class="col s1">
							<p>
								: <br>
								: <br>
								: <br>
								: <br>
								<b>:</b> <br>
							</p>
						</div>
						<div class="col s2">
							<p align="right">
								<?php
								if ($pecah['pajak1'] == 0) {
									echo "-<br>";
								} elseif ($pecah['pajak1'] > 1) {
									echo "Rp.".number_format($pecah['pajak1'])."<br>";	
								} 
								?>
								<?php
								if ($pecah['pajak2'] == 0) {
									echo "-<br>";
								} elseif ($pecah['pajak2'] > 1) {
									echo "Rp.".number_format($pecah['pajak2'])."<br>";	
								} 
								?>
								<?php
								if ($pecah['pajak3'] == 0) {
									echo "-<br>";
								} elseif ($pecah['pajak3'] > 1) {
									echo "Rp.".number_format($pecah['pajak3'])."<br>";	
								} 
								?>
								<?php
								if ($pecah['pajak4'] == 0) {
									echo "-<br>";
								} elseif ($pecah['pajak4'] > 1) {
									echo "Rp.".number_format($pecah['pajak4'])."<br>";	
								} 
								?>
								<?php
								if ($pecah['pph21'] == 0) {
									echo "<b>-</b><br>";
								} elseif ($pecah['pph21'] > 1) {
									echo "<b>Rp.".number_format($pecah['pph21'])."</b><br>";	
								} 
								?>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="col s3">
							<p>
								BPJSTK JHT 3,7% <br>
								BPJSTK JP 2% MAX Rp. 178.794 <br>
							</p>
						</div>
						<div class="col s1">
							<p>
								:<br>
								:<br>
							</p>
						</div>
						<div class="col s2">
							<p align="right">
								<?php
								if ($pecah['jht'] == 0) {
									echo "-<br>";
								} elseif ($pecah['jht'] > 1) {
									echo "Rp.".number_format($pecah['jht'])."<br>";	
								} 
								?>
								<?php
								if ($pecah['jp'] == 0) {
									echo "-<br>";
								} elseif ($pecah['jp'] > 1) {
									echo "Rp.".number_format($pecah['jp'])."<br>";	
								} 
								?>
							</p>
						</div>
						<div class="col s3">
							<p>	
								bpjs Kesehatan <br>
								<b>gaji bersih selama setahun<br></b>
							</p>
						</div>
						<div class="col s1">
							<p>
								:<br>
								<b>:</b>
							</p>
						</div>
						<div class="col s2">
							<p align="right">
								<?php
								if ($pecah['bpjs_keset'] == 0) {
									echo "-<br>";
								} elseif ($pecah['bpjs_keset'] > 1) {
									echo "Rp.".number_format($pecah['bpjs_keset'])."<br>";	
								} 
								?>
								<?php
								if ($pecah['gaji_bersih'] == 0) {
									echo "-<br>";
								} elseif ($pecah['gaji_bersih'] > 1) {
									echo "<b>Rp.".number_format($pecah['gaji_bersih'])."</b><br>";	
								} 
								?>
							</p>
						</div>

					</div>




				</div>

			</div>	



