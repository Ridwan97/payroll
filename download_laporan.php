<?php
include"koneksi.php"; 

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$mpdf->SetWatermarkImage('images/logo/mbooks.png');
$mpdf->showWatermarkImage = true;


$tgl_mulai = $_GET["tglm"];
$tgl_selesai = $_GET["tgls"];
$status = $_GET["id_status"];

$semuadata= array();
	$ambil = $koneksi->query("SELECT * FROM tbl_payroll prl
		LEFT JOIN tbl_ptkp ptkp ON prl.id_ptkp=ptkp.id_ptkp
		WHERE id_status='$status' 
		AND tgl_masuk BETWEEN 
		'$tgl_mulai' AND '$tgl_selesai' ");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}

$isi.="<link rel='shortcut icon' type='text/css' href='images/favicon/mbooks.ico' sizes='32x32'>";
$isi.="<link rel='stylesheet' href='css/print.css'>";
$isi= "<h3 align='center'>Laporan Penggajian Mulai ".date("d F Y",strtotime($tgl_mulai))." Sampai ".date("d F Y",strtotime($tgl_selesai))."</h3>".
$isi.= "<br>";
$isi.= "<table border='1' cellpadding='10' cellspacing='0' align='center'>";
	$isi.= "<thead>
		<tr>
			<th>NO</th>
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
	<tbody> ";
		$total=0; 
		$total_pph21=0; 
		$total_thr=0; 
		$total_bersih=0 ;		
		foreach ($semuadata as $key => $value): 
		 	$total+=$value["gaji_setahun"];
			$total_pph21+=$value["pph21"];
			$total_thr+=$value["thr"];
			$total_bersih+=$value["gaji_bersih"]; 	
			$nomor = $key+1;
			 $isi.= "<tr>";
				$isi.= "<td align='center' >".$nomor."</td>";
				$isi.= "<td align='center' >".$value["nama_karyawan"]."</td>";
				$isi.= "<td align='center' >".date("d F Y",strtotime($value["tgl_masuk"]))."</td>";
				if ($value["gaji_pokok"] == 0) {
						$isi.= "<td align='center' > - </td>";
					} elseif ($value["gaji_pokok"] > 1) {
						$isi.= "<td align='center' > Rp.".number_format($value["gaji_pokok"])."</td>";
					}
				if ($value["id_status"] == 0 ) {
					$isi.="<td align='center' >Aktif</td>";
				} elseif($value["id_status"] == 1) {
					$isi.="<td align='center' >Tidak Aktif</td>";
				}
				$isi.="<td>".$value["nama_ptkp"]."</td>";
				if ($value["gaji_setahun"] == 0) {
						$isi.= "<td align='center'> - </td>";
					} elseif ($value["gaji_setahun"] > 1) {
						$isi.= "<td align='center'>Rp.".number_format($value["gaji_setahun"])."</td>";
					}
				if ($value["pph21"] == 0) {
						$isi.= "<td align='center'> - </td>";
					} elseif ($value["pph21"] > 1) {
						$isi.= "<td align='center'>Rp.".number_format($value["pph21"])."</td>";
					}
				if ($value["thr"] == 0) {
						$isi.= "<td align='center'> - </td>";
					} elseif ($value["thr"] > 1) {
						$isi.= "<td align='center'>Rp.".number_format($value["thr"])."</td>";
					}
				if ($value["gaji_bersih"] == 0) {
						$isi.= "<td align='center'> - </td>";
					} elseif ($value["gaji_bersih"] > 1) {
						$isi.= "<td align='center'>Rp.".number_format($value["gaji_bersih"])."</td>";
					}
			$isi.= "</tr>";
		 endforeach;
		$isi.= "<tbody>";
			$isi.= "<tr >";
				$isi.= "<td colspan='6' align='center'> <strong>TOTAL</strong></td>";
				if ($total == 0) {
					$isi.= "<td align='center' ><b> - </b></td>";
					} elseif ($total > 1) {
					$isi.= "<td align='center' ><b>Rp.".number_format($total)."</b></td>";
					}
				if ($total_pph21 == 0) {
					$isi.= "<td align='center' ><b> - </b></td>";
					} elseif ($total_pph21 > 1) {
					$isi.= "<td align='center' ><b>Rp.".number_format($total_pph21)."</b></td>";
					}
				if ($total_thr == 0) {
					$isi.= "<td align='center' ><b> - </b></td>";
					} elseif ($total_thr > 1) {
					$isi.= "<td align='center' ><b>Rp.".number_format($total_thr)."</b></td>";
					}
				if ($total_bersih == 0) {
					$isi.= "<td align='center' ><b> - </b></td>";
					} elseif ($total_bersih > 1) {
					$isi.= "<td align='center' ><b>Rp.".number_format($total_bersih)."</b></td>";
					}
			$isi.= "</tr>
		</tbody>
	</tbody>		
</table>	";

// Write some HTML code:
$mpdf->WriteHTML($isi);

// Output a PDF file directly to the browser
$mpdf->Output("laporan-payroll.pdf","I");
?>

