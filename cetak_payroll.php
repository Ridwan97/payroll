<?php 	include"koneksi.php"; 

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


 $id_payroll= $_GET["id"];
 $ambil = $koneksi->query("SELECT * FROM tbl_payroll 
 	JOIN tbl_npwp ON tbl_payroll.id_npwp=tbl_npwp.id_npwp 
 	JOIN tbl_status ON tbl_payroll.id_status=tbl_status.id_status 
 	JOIN tbl_ptkp ON tbl_payroll.id_ptkp=tbl_ptkp.id_ptkp
 	WHERE id_payroll='$id_payroll'"); 
 $pecah =$ambil->fetch_assoc();

$isi = "<h1> Cetak Payroll ". $pecah['nama_karyawan'] . "</h1>". 

$isi.= "<table class='table border-collapse'>";
    $isi.= "<tr>
                <td><b>NAMA KARYAWAN</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>".$pecah['nama_karyawan']."</td>";    
    $isi.="</tr>";
    $isi.= "<tr>
                <td><b>GAJI POKOK</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah["gaji_pokok"])."</td>";
    $isi.="</tr>";       
    $isi.= "<tr>
                <td><b>NPWP</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>".$pecah['status_npwp']."</td>";
    $isi.="</tr>"; 
    $isi.= "<tr>
                <td><b>STATUS KARYAWAN</b></td>
                <td><b>:</b></td>";
                $isi.="<td>".$pecah['nama_status']."</td>";
    $isi.="</tr>"; 
    $isi.= "<tr>
                <td><b>JUMLAH KERJA</b></td>
                <td><b>:</b></td>";
                 $isi.="<td>".$pecah['jumlah_kerja']." hari</td>";
    $isi.="</tr>"; 
    $isi.= "<tr>
                <td><b>PERSENAN THR</b></td>
                <td><b>:</b></td>";
                $isi.="<td>".$pecah['persenan_thr']."%</td>";
    $isi.="</tr>"; 
    $isi.= "<tr>
                <td><b>THR</b></td>
                <td><b>:</b></td>";
                $isi.="<td>Rp. ".number_format($pecah['thr'])."</td>";
    $isi.="</tr>"; 
    $isi.= "<tr>
                <td><b> NAMA PTKP</b></td>
                <td><b>:</b></td>";
                $isi.="<td>".$pecah['nama_ptkp']."</td>";
    $isi.="</tr>"; 
            $isi.= "
</table>    ";
$isi.= "<br><br><br>";
$isi.= "<table class='table border-collapse'>";
    $isi.= "<tr>
                <td><b>GAJI SETAHUN</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['gaji_setahun'])."</td>";
                $isi.="<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>";
                $isi.="<td><b>BPJS TK JHT 2%</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['bpjstk_jht'])."</td>";    
    $isi.="</tr>";
    $isi.= "<tr>
                <td><b>BPJS TK JKM <br>JKK 0,54%<br> </b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah["bpjs_jkm"])."</td>";
                $isi.="<td> </td>";
                $isi.="<td><b>BPJS JP MAX Rp. 89.397 </b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['bpjstk_jp'])."</td>";
    $isi.="</tr>";       
    $isi.= "<tr>
                <td><b>BPJS KESEHATAN<br>4% MAX 480rb<br> </b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['bpjs_kes'])."</td>";
                $isi.="<td> </td>";
                $isi.="<td><b>BIAYA JABATAN</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['biaya_jabatan'])."</td>";
    $isi.="</tr>"; 
    $isi.= "<tr>
                <td><b>GAJI KOTOR</b></td>
                <td><b>:</b></td>";
                $isi.="<td>Rp. ".number_format($pecah['gaji_kotor'])."</td>";
                $isi.="<td> </td>";
                $isi.="<td><b>TOTAL PAJAK</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['total_pajak'])."</td>";
    $isi.="</tr>"; 
            $isi.= "
</table>    ";

$isi.= "<br><br><br>";
$isi.= "<table class='table border-collapse'>";
    $isi.= "<tr>
                <td><b>PENGHASILAN BERSIH</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['penghasilan_bersih'])."</td>";
                $isi.="<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>";
                if ($pecah['id_npwp'] == 1) {
                    $isi.="<td><b>0 - 50Jt 5% DENGAN NPWP </b></td>";
                } else {
                    $isi.="<td><b>0 - 50Jt 6% TANPA NPWP</b></td>";
                }
                $isi.="<td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['pph1'])."</td>";    
    $isi.="</tr>";
    $isi.= "<tr>
                <td><b>PENGHASILAN TIDAK KENA PAJAK </b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah["nilai_ptkp"])."</td>";
                $isi.="<td> </td>";
                if ($pecah['id_npwp'] == 1) {
                    $isi.="<td><b>50Jt - 250Jt 15% DENGAN NPWP </b></td>";
                } else {
                    $isi.="<td><b>50Jt - 250Jt 18% TANPA NPWP</b></td>";
                }
                $isi.="<td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['pph2'])."</td>";
    $isi.="</tr>";       
    $isi.= "<tr>
                <td><b>PENGHASILAN KENA PAJAK </b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['penghasilan_kena_pajak'])."</td>";
                $isi.="<td> </td>";
                if ($pecah['id_npwp'] == 1) {
                    $isi.="<td><b>250Jt - 500Jt 25% DENGAN NPWP </b></td>";
                } else {
                    $isi.="<td><b>250Jt - 500Jt 30% TANPA NPWP</b></td>";
                }
                $isi.="<td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['pph3'])."</td>";
    $isi.="</tr>"; 
    $isi.= "<tr>
                <td><b></b></td>
                <td><b></b></td>";
                $isi.="<td></td>";
                $isi.="<td> </td>";
                if ($pecah['id_npwp'] == 1) {
                    $isi.="<td><b>Lebih dari 500Jt 30% DENGAN NPWP </b></td>";
                } else {
                    $isi.="<td><b>Lebih dari 50Jt 36% TANPA NPWP</b></td>";
                }
                $isi.="<td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['pph4'])."</td>";
    $isi.="</tr>";
    $isi.= "<tr>
                <td><b></b></td>
                <td><b></b></td>";
                $isi.="<td></td>";
                $isi.="<td> </td>";
                $isi.="<td><b>TOTAL KENA PAJAK</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['pph21'])."</td>";
    $isi.="</tr>";

            $isi.= "
</table>    ";


$isi.= "<br><br><br><br><br>";
$isi.= "<table class='table border-collapse'>";
    $isi.= "<tr>
                <td><b>BPJSTK JHT 3%</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['jht'])."</td>";
                $isi.="<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>";
                $isi.="<td><b>BPJS KESEHATAN</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['bpjs_keset'])."</td>";    
    $isi.="</tr>";
    $isi.= "<tr>
                <td><b>BPJSTK JP 2% MAX Rp. 178.794</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah["jp"])."</td>";
                $isi.="<td> </td>";
                $isi.="<td><b>Gaji Bersih Selama Setahun</b></td>
                <td><b>:</b></td>";
                $isi.= "<td>Rp. ".number_format($pecah['gaji_bersih'])."</td>";
    $isi.="</tr>";       
            $isi.= "
</table>    ";
 

$mpdf->WriteHTML($isi);
$mpdf->Output();
?>