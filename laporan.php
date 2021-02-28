<?php 	
$semuadata=array();
$tgl_mulai="";
$tgl_selesai="";
$status="";


if (isset($_POST["kirim"])) 
{
	$tgl_mulai= $_POST["tglm"];
	$tgl_selesai= $_POST["tgls"];
	$status = $_POST["status"];
	$ambil = $koneksi->query("SELECT * FROM tbl_payroll prl
		LEFT JOIN tbl_ptkp ptkp ON prl.id_ptkp=ptkp.id_ptkp
		WHERE id_status='$status' 
		AND tgl_masuk BETWEEN 
		'$tgl_mulai' AND '$tgl_selesai' ");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
	 // echo "<pre>";
	 // print_r($semuadata);
	 // echo "</pre>";
}

?>


<h4 class="text-center">Laporan Penggajian <?php if (isset($_POST["kirim"])) {
	echo date("d F Y",strtotime($tgl_mulai)) . " Sampai " . date("d F Y", strtotime($tgl_selesai)) ;
} ?> 
</h4>	
<form method="post">	
	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="input-field col s3 m3 l3 xl3">
					<i class="material-icons prefix">date_range</i>
					<input type="date" name="tglm" value="<?php echo $tgl_mulai ?>" min="2020-01-01" max="2020-12-30">	
					<label for="icon_prefix" class="active">Tanggal Mulai</label>
				</div>
				<div class="input-field col s3 m3 l3 xl3">
					<i class="material-icons prefix">date_range</i>
					<input type="date" name="tgls" value="<?php echo $tgl_selesai ?>" min="2020-01-02" max="2020-12-31">
					<label for="icon_prefix" class="active">Tanggal Akhir</label>
				</div>
				<div class="input-field col s4 m4 l4 xl">
					<i class="material-icons prefix">assignment_ind</i>
					<select name="status">
						<option value="0">Aktif</option>
						<option value="1">Tidak Aktif</option>
					</select>
					<label>Status Karyawan</label>
				</div>  
				<br>
				<button class="btn waves-effect waves-light col s2" name="kirim">LIHAT LAPORAN</button>		
			</div>	
		</div>	
	</div>
</form>	

<table class="table centered striped hoverable col s12 m12 l12 xl12">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Karyawan</th>
			<th>Tanggal Masuk</th>
			<th>Gaji Sebulan</th>
			<th>Status</th>	
			<th>PTKP</th>
			<th>Gaji pokok Setahun</th>
			<th>PPH 21</th>
			<th>THR</th>
			<th>Gaji bersih</th>
		</tr>	
	</thead>	
	<tbody> 
		<?php 	
		$total=0; 
		$total_pph21=0; 
		$total_thr=0; 
		$total_bersih=0 ;
		?>
		<?php foreach ($semuadata as $key => $value): ?>
			<?php 	
			$total+=$value["gaji_setahun"];
			$total_pph21+=$value["pph21"];
			$total_thr+=$value["thr"];
			$total_bersih+=$value["gaji_bersih"]; 
			?>
			<tr>
				<td><?php echo 	$key+1; ?></td>
				<td><?php echo 	$value["nama_karyawan"] ;?></td>
				<td><?php echo 	date("d F Y",strtotime($value["tgl_masuk"])); ?></td>
				<td>
					<?php
					if ($value["gaji_pokok"] == 0) {
						echo "-";
					} elseif ($value["gaji_pokok"] > 1) {
						echo "Rp.".number_format($value["gaji_pokok"]);
					}
					?>
				</td>
				<td>
					<?php if ($value["id_status"] == 0 ): ?>
						<?php echo "Aktif" ?>
						<?php elseif ($value["id_status"] == 1 ):  ?>
							<?php echo 	"Tidak Akif" ?>						
						<?php endif ?>
					</td>
					<td><?php echo 	$value["nama_ptkp"] ;?></td>
					<td>
						<?php
					if ($value["gaji_setahun"] == 0) {
						echo "-";
					} elseif ($value["gaji_setahun"] > 1) {
						echo "Rp.".number_format($value["gaji_setahun"]);
					}
					?>
							
					</td>
					<td> <?php if (($value["pph21"]) == 0	): ?>
					<?php echo 	"-" ?>
					<?php elseif ($value["pph21"] > 1 ):  ?>
						<?php echo "Rp.".number_format($value["pph21"]); ?></td>							
					<?php endif ?>
					<td>
						<?php 	
						if ($value["thr"] == 0) {
							echo "-";
						} elseif ($value["thr"] > 1) {
							echo "Rp.". number_format($value["thr"]);
						}
						?>
					</td>		
					<td>
						<?php
						if ($value["gaji_bersih"] == 0) {
							echo "-";
						} elseif ($value["gaji_bersih"] > 1) {
							echo "Rp.". number_format($value["gaji_bersih"]);
						}	
						?>
					</td>	
				</tr>
			<?php endforeach ?>
			<tbody>
				<tr>
					<td colspan="6"	> <strong>TOTAL</strong></td>		
					<td><strong>
						<?php 	
						if ($total == 0) {
							echo "-";
						} elseif ($total > 1) {
							echo "Rp.". number_format($total);
						}
						?>							
						</strong>
					</td>
					<td><b>
						<?php 	
						if ($total_pph21 == 0) {
							echo "-";
						} elseif ($total_pph21 > 1) {
							echo "Rp.". number_format($total_pph21);
						}
						?>							
						</b>	
					</td>
					<td>
						<b>
						<?php 	
						if ($total_thr == 0) {
							echo "-";
						} elseif ($total_thr > 1) {
							echo "Rp.". number_format($total_thr);
						}
						?>							
						</b>	
					</td>
					<td><b>						
						<?php 	
						if ($total_bersih == 0) {
							echo "-";
						} elseif ($total_bersih > 1) {
							echo "Rp.". number_format($total_bersih);
						}
						?>		
						</b>
					</td>	
				</tr>
			</tbody>
		</tbody>		
		</table>
		<?php if (isset($_POST['kirim']))	: ?>
		<a href="download_laporan.php?tglm=<?php echo $tgl_mulai ?>&tgls=<?php echo $tgl_selesai ?>&status=<?php echo $status ?>" target="_blank">Download PDF</a>
	
		<?php endif ?>
		

