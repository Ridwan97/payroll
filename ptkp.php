<div class="container">	
	<h3>Ketereangan dari Penghasilan Tidak Kena Pajak</h3>
<table class="table bordered striped centered col s12 m12 l12 xl12">
	<thead>
		<tr>
			<th>NO</th>
			<th>Nama PTKP</th>
			<th>Jumlah Tidak Kena Pajak Setahun</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("SELECT * FROM tbl_ptkp"); ?>
	<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_ptkp']; ?></td>
			<td>Rp.<?php echo number_format($pecah['nilai_ptkp']); ?></td>
			<td><?php echo $pecah['keterangan_ptkp']; ?></td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>	
</table>
</div>