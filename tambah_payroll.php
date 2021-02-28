<?php 
$dataptkp = array();

$ambil = $koneksi->query("SELECT * FROM tbl_ptkp");
while($tiap = $ambil->fetch_assoc())
{
  $dataptkp[] = $tiap;
}
?>

<?php 
$datanpwp = array();

$ambil = $koneksi->query("SELECT * FROM tbl_npwp");
while($tiap1 = $ambil->fetch_assoc())
{
  $datanpwp[] = $tiap1;
}

?>
<?php 
$datastatus = array();

$ambil = $koneksi->query("SELECT * FROM tbl_status");
while($tiap1 = $ambil->fetch_assoc())
{
  $datastatus[] = $tiap1;
}

?>

<body>
  <div class="container">
    <div class="col s12 m12 l6">
      <div class="card-panel">
        <h4 class="header2">Form Gaji Karyawan</h4>
        <div class="row">
          <form class="col s12" method="post" enctype="multipart/form-data" >
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input name="nama_karyawan" type="text" class="validate" required placeholder="ridwan">
                <label for="icon_prefix" class="active">Nama Karyawan</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">account_balance_wallet</i>
                <input name="gaji_pokok" type="number" min="1" class="validate" required placeholder="3500000">
                <label >Gaji Pokok</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">money_off</i>
                <select name="id_ptkp">
                  <option value="" disabled selected></option>
                  <?php foreach ($dataptkp as $key => $value): ?>
                    <option value="<?php echo $value['id_ptkp'] ?>"> <?php echo $value['nama_ptkp'] ;?> <?php echo $value['keterangan_ptkp'];  ?></option>
                  <?php endforeach ?>
                </select>
                <label>PTKP</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">account_balance</i>
                <select name="id_npwp">
                  <option value="" disabled selected></option>
                  <?php foreach ($datanpwp as $key => $value): ?>
                    <option value="<?php echo $value['id_npwp'] ?>"><?php echo $value['status_npwp'] ?></option>
                  <?php endforeach ?>
                </select>
                <label>NPWP</label>
              </div>  
            </div>
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">assignment_ind</i>
                <select name="id_status">
                  <option value="" disabled selected></option>
                  <?php foreach ($datastatus as $key => $value): ?>
                    <option value="<?php echo $value['id_status'] ?>"><?php echo $value['nama_status'] ?></option>
                  <?php endforeach ?>
                </select>
                <label>Status Karyawan</label>
              </div>  
              <div class="input-field col s6">

                <i class="material-icons prefix">date_range</i>
                <input type="date" name='tgl_masuk' min="2020-01-01" max="2020-12-31"> 
                <label for="icon_prefix" class="active">Awal Masuk</label>
              </div>
            </div>
            <button  class="btn waves-effect waves-light right col s2 green" type="submit" name="simpan">simpan
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
        <?php 
        if (isset($_POST['simpan'])) 
        {
          // Memasukkan Nama Karyawan
          $nama_karyawan = $_POST["nama_karyawan"];

          // Memassukkan Gaji Pokok
          $gaji_pokok = $_POST["gaji_pokok"];

          // Memasukan Tanggal Masuk
          $tgl_masuk = $_POST['tgl_masuk'];

          // Memasukkan ID PTKP
          $id_ptkp = $_POST['id_ptkp'];


          // Memasukkan ID STATUS
          $id_status = $_POST['id_status'];

          // Memasukkan ID NPWP
          $id_npwp = $_POST['id_npwp'];

          // Memasukkan jumlah hari kerja Karyawan
          $awal_jan = date('2020-01-01');
          $akhir_jan = date('2020-01-31');
          $awal_feb = date('2020-02-01');
          $akhir_feb = date('2020-02-29');
          $awal_mar = date('2020-03-01');
          $akhir_mar = date('2020-03-31');
          $awal_apr = date('2020-04-01');
          $akhir_apr = date('2020-04-30');
          $awal_may = date('2020-05-01');
          $akhir_may = date('2020-05-31');
          $awal_jun = date('2020-06-01');
          $akhir_jun = date('2020-06-30');
          $awal_jul = date('2020-07-01');
          $akhir_jul = date('2020-07-31');
          $awal_aug= date('2020-08-01');
          $akhir_aug = date('2020-08-31');
          $awal_sep = date('2020-09-01');
          $akhir_sep = date('2020-09-30');
          $awal_oct = date('2020-10-01');
          $akhir_oct = date('2020-10-31');
          $awal_nov = date('2020-11-01');
          $akhir_nov = date('2020-11-30');
          $awal_dec = date('2020-12-01');
          $akhir_dec = date('2020-12-31');

          if ($tgl_masuk <= $awal_jan ) {
            $masuk_kerja = $awal_jan ;
          } elseif (( $tgl_masuk >= $awal_jan) && ( $tgl_masuk <= $akhir_jan)) { 
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_feb) && ( $tgl_masuk <= $akhir_feb)) {
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_mar) && ( $tgl_masuk <= $akhir_mar)) { 
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_apr) && ( $tgl_masuk <= $akhir_apr)) {
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_may) && ( $tgl_masuk <= $akhir_may)) { 
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_jun) && ( $tgl_masuk <= $akhir_jun)) {
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_jul) && ( $tgl_masuk <= $akhir_jul)) { 
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_aug) && ( $tgl_masuk <= $akhir_aug)) {
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_sep) && ( $tgl_masuk <= $akhir_sep)) { 
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_oct) && ( $tgl_masuk <= $akhir_oct)) {
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_nov) && ( $tgl_masuk <= $akhir_nov)) { 
            $masuk_kerja = $tgl_masuk ;  
          } elseif (( $tgl_masuk >= $awal_dec) && ( $tgl_masuk <= $akhir_dec)) {
            $masuk_kerja = $tgl_masuk ;  
          } 

          $tgl1 = new DateTime($masuk_kerja);
          $tgl2 = new DateTime("2020-12-31");
          $hari_kerja = $tgl2->diff($tgl1)->days + 1;


          if ($hari_kerja > 1) {
            $gaji_pokok = $_POST["gaji_pokok"];
          } else  {
            $gaji_pokok = $_POST["gaji_pokok"]*0;
          }




              // Memasukkan Total Kerja Karyawan Selama Setahun
          if ($tgl_masuk <= $awal_jan ) {
            $total_kerja = 366 ;
          } elseif (( $tgl_masuk >= $awal_jan) && ( $tgl_masuk <= $akhir_jan)) { 
            $total_kerja = 366 ;  
          } elseif (( $tgl_masuk >= $awal_feb) && ( $tgl_masuk <= $akhir_feb)) {
            $total_kerja = 335 ;  
          } elseif (( $tgl_masuk >= $awal_mar) && ( $tgl_masuk <= $akhir_mar)) { 
            $total_kerja = 306 ;  
          } elseif (( $tgl_masuk >= $awal_apr) && ( $tgl_masuk <= $akhir_apr)) {
            $total_kerja = 275 ;  
          } elseif (( $tgl_masuk >= $awal_may) && ( $tgl_masuk <= $akhir_may)) { 
            $total_kerja = 245 ;  
          } elseif (( $tgl_masuk >= $awal_jun) && ( $tgl_masuk <= $akhir_jun)) {
            $total_kerja = 214 ;  
          } elseif (( $tgl_masuk >= $awal_jul) && ( $tgl_masuk <= $akhir_jul)) { 
            $total_kerja = 184 ;  
          } elseif (( $tgl_masuk >= $awal_aug) && ( $tgl_masuk <= $akhir_aug)) {
            $total_kerja = 153 ;  
          } elseif (( $tgl_masuk >= $awal_sep) && ( $tgl_masuk <= $akhir_sep)) { 
            $total_kerja = 122 ;  
          } elseif (( $tgl_masuk >= $awal_oct) && ( $tgl_masuk <= $akhir_oct)) {
            $total_kerja = 92 ;  
          } elseif (( $tgl_masuk >= $awal_nov) && ( $tgl_masuk <= $akhir_nov)) { 
            $total_kerja = 61 ;  
          } elseif (( $tgl_masuk >= $awal_dec) && ( $tgl_masuk <= $akhir_dec)) {
            $total_kerja = 31 ;  
          } else {
            $total_kerja == 0;
          }


              // Memasukkan Jumlah setahun
          $setahun = 366;


              // Memasukkan Jumlah Gaji selama setahun
          if ($id_status == 0 ) {
            if ($tgl_masuk <= $awal_jan ) {
              $gaji_setahun =  $gaji_pokok*12 ;
            } elseif (( $tgl_masuk >= $awal_jan) && ( $tgl_masuk <= $akhir_jan)) { 
              $gaji_setahun =  $gaji_pokok*12 ;  
            } elseif (( $tgl_masuk >= $awal_feb) && ( $tgl_masuk <= $akhir_feb)) {
              $gaji_setahun =  $gaji_pokok*11 ;  
            } elseif (( $tgl_masuk >= $awal_mar) && ( $tgl_masuk <= $akhir_mar)) { 
              $gaji_setahun =  $gaji_pokok*10 ;  
            } elseif (( $tgl_masuk >= $awal_apr) && ( $tgl_masuk <= $akhir_apr)) {
              $gaji_setahun =  $gaji_pokok*9 ;  
            } elseif (( $tgl_masuk >= $awal_may) && ( $tgl_masuk <= $akhir_may)) { 
              $gaji_setahun =  $gaji_pokok*8 ;  
            } elseif (( $tgl_masuk >= $awal_jun) && ( $tgl_masuk <= $akhir_jun)) {
              $gaji_setahun =  $gaji_pokok*7 ;  
            } elseif (( $tgl_masuk >= $awal_jul) && ( $tgl_masuk <= $akhir_jul)) { 
              $gaji_setahun =  $gaji_pokok*6 ;  
            } elseif (( $tgl_masuk >= $awal_aug) && ( $tgl_masuk <= $akhir_aug)) {
              $gaji_setahun =  $gaji_pokok*5 ;  
            } elseif (( $tgl_masuk >= $awal_sep) && ( $tgl_masuk <= $akhir_sep)) { 
              $gaji_setahun =  $gaji_pokok*4 ;  
            } elseif (( $tgl_masuk >= $awal_oct) && ( $tgl_masuk <= $akhir_oct)) {
              $gaji_setahun = $gaji_pokok*3 ;  
            } elseif (( $tgl_masuk >= $awal_nov) && ( $tgl_masuk <= $akhir_nov)) { 
              $gaji_setahun = $gaji_pokok*2 ;  
            } elseif (( $tgl_masuk >= $awal_dec) && ( $tgl_masuk <= $akhir_dec)) {
              $gaji_setahun = $gaji_pokok*1 ;  
            } else {
              $gaji_setahun == $gaji_pokok*0;
            }
          } else {
            $gaji_setahun = 0;
          }


              // Memasukkan Alokasi Hari
          $hari_masuk = new DateTime($tgl_masuk);
          $lebaran2020 = new DateTime("2020-05-24");
          $lebaran2019 = new DateTime("2019-06-05");
          $sebelum_lebaran = new DateTime("2020-04-24");

          if ($hari_masuk >= $sebelum_lebaran) {
            $alokasi_hari = 0;
          } elseif ($hari_masuk <= $sebelum_lebaran) {
            $alokasi_hari = $lebaran2020->diff($hari_masuk)->days; 
          } else {
            $alokasi_hari = 0;
          }


              // Memasukkam Alokasi THR
          $staff_keluar = 0;
          if ($alokasi_hari <= $setahun) {
            $alokasi_thr = $alokasi_hari ;
          } elseif ($alokasi_hari > $setahun) {
            if ($staff_keluar = 0) {
              $alokasi_thr = $lebaran2020->diff($lebaran2019)->days +1 +10;
            }
            else {
              $alokasi_thr = $sebelum_lebaran->diff($lebaran2019)->days +1 +10;
            }
          } else {
            $alokasi_thr = $alokasi_hari;
          }


              // Memasukkan Persenan THR
          if ($alokasi_thr < 30) {
            $persenan_thr = 0 ; 
          } elseif ($staff_keluar > 30) {
            $persenan_thr = 0 ; 
          } else  {
            $persenan_thr = $alokasi_thr / $setahun * 100;
          }

          if ($id_status == 0 ) {
          // Memasukkan THR 
            $thr = $gaji_pokok*$persenan_thr/100;  
          } else {
            $thr = 0 ;
          }





              // Memasukkan BPJS JKM
          $bpjs_jkm = $gaji_setahun*54/10000;


              // Memasukkan BPJS Kesehatan
          if( $gaji_setahun > 12000000 ) { 
            $bpjs_kes = 480000*12; 
          } else { 
            $bpjs_kes = $gaji_setahun*4/100;
          }


              // Memasukkan Gaji Kotor
          $gaji_kotor = $gaji_setahun+$bpjs_jkm+$bpjs_kes+$thr;


              // Memasukkan BPJSTK JHT
          $bpjstk_jht = $gaji_setahun*2/100;


              // Memasukkan BPJSTK JP
          if ( $gaji_setahun > 8939700) { 
            $bpjstk_jp = 89397*12;  
          } else { 
            $bpjstk_jp = $gaji_setahun*1/100*12 ;
          }


              // Memasukkan Biaya Jabatan Selama Setahun
          if ( $gaji_setahun*5/100 > 500000) { 
            $biaya_jabatan = 500000*12;
          } else { 
            $biaya_jabatan = $gaji_setahun*5/100*12; 
          }


              // Memasukkan Total Pajak 
          $total_pajak = $bpjstk_jht+$bpjstk_jp+$biaya_jabatan;


              // Memasukkan Penghasilan Bersih
          $penghasilan_bersih = $gaji_kotor - $total_pajak;



              // MEMASUKKAN NILAI PTKP
          if ($id_ptkp == 1) {
            $nilai_ptkp = 54000000;
          } elseif ($id_ptkp ==2) {
            $nilai_ptkp = 58500000;
          } elseif ($id_ptkp == 3) {
            $nilai_ptkp = 63000000;
          } elseif ($id_ptkp == 4) {
            $nilai_ptkp = 67500000;
          } elseif ($id_ptkp == 5) {
            $nilai_ptkp = 58500000;
          } elseif ($id_ptkp ==6) {
            $nilai_ptkp = 63000000;
          } elseif ($id_ptkp == 7) {
            $nilai_ptkp = 67500000;
          } elseif ($id_ptkp ==8) {
            $nilai_ptkp = 72000000;
          } elseif ($id_ptkp == 9) {
            $nilai_ptkp = 112500000;
          } elseif ($id_ptkp ==10) {
            $nilai_ptkp = 117000000;
          } elseif ($id_ptkp == 11) {
            $nilai_ptkp = 121500000;
          } else {
            $nilai_ptkp =126000000;
          }


              // Memasukkan penghasilan kena pajak
          $penghasilan = round(($penghasilan_bersih - $nilai_ptkp)/1000)*1000 ;

          if ($penghasilan < 0) {
            $penghasilan_kena_pajak = 0;
          } else {
            $penghasilan_kena_pajak = $penghasilan;
          }




              // Memasukkkan Pajak1
          if ($id_npwp == 1) {
            if ( $penghasilan_kena_pajak <= 50000000) { 
              $pajak1 = $penghasilan_kena_pajak*5/100;  
            } else { 
              $pajak1 = 2500000 ;
            }
          } elseif ($id_npwp == 0) {
            if ( $penghasilan_kena_pajak <= 50000000) { 
              $pajak1 = $penghasilan_kena_pajak*6/100;  
            } else { 
              $pajak1 = 3000000 ;
            }
          }


              // Memasukkan Pajak2
          if ($id_npwp == 1) {
            if (( $penghasilan_kena_pajak > 50000000) && ( $penghasilan_kena_pajak <= 250000000)) { 
              $pajak2 = ($penghasilan_kena_pajak-50000000)*15/100;  
            } elseif ($penghasilan_kena_pajak<=50000000) {
              $pajak2 = 0 ;
            } else { 
              $pajak2 = 30000000 ;
            }
          } elseif ($id_npwp == 0) {
            if (( $penghasilan_kena_pajak > 50000000) && ( $penghasilan_kena_pajak <= 250000000)) { 
              $pajak2 = ($penghasilan_kena_pajak-50000000)*18/100;  
            } elseif ($penghasilan_kena_pajak<=50000000) {
              $pajak2 = 0 ; 
            } else { 
              $pajak2 = 36000000 ;
            }
          }


             // Memasukkan Pajak3
          if  ($id_npwp == 1) {
            if (( $penghasilan_kena_pajak > 250000000) && ( $penghasilan_kena_pajak <= 500000000)) { 
              $pajak3 = ($penghasilan_kena_pajak-250000000)*25/100;  
            } elseif ($penghasilan_kena_pajak<=250000000) {
              $pajak3 = 0 ; 
            } else { 
              $pajak3 = 62500000 ;
            }
          } elseif ($id_npwp == 0) {
            if (( $penghasilan_kena_pajak > 250000000) && ( $penghasilan_kena_pajak <= 500000000)) { 
              $pajak3 = ($penghasilan_kena_pajak-250000000)*30/100;  
            } elseif ($penghasilan_kena_pajak<=250000000) {
              $pajak3 = 0 ;
            } else { 
              $pajak3 = 75000000 ;
            }
          }


             // Memasukkan Pajak4
          if ($id_npwp == 1) {
            if ( $penghasilan_kena_pajak > 500000000) { 
              $pajak4 = ($penghasilan_kena_pajak-500000000)*30/100;  
            } else { 
              $pajak4 = 0 ;
            }
          } elseif ($id_npwp == 0) {
            if ( $penghasilan_kena_pajak > 500000000) { 
              $pajak4 = $penghasilan_kena_pajak*36/100;  
            } else { 
              $pajak4 = 0 ;
            }
          }


              // PPH 21
          $pph21 = $pajak1 + $pajak2 + $pajak3 + $pajak4;


              // BPJS KESEHATAN
          if ($id_status == 0 ) {
            if ( $gaji_pokok > 12000000) { 
              $bpjs_keset = 120000*12;  
            } else { 
              $bpjs_keset = $gaji_pokok*1/100*12 ;
            };
          } else {
            $bpjs_keset = 0;
          }


              // GAJI BERSIH
          $gaji_bersih = $gaji_setahun + $thr - $bpjstk_jht - $bpjstk_jp - $pph21 - $bpjs_keset;



              // JHT
          $jht = $gaji_setahun*37/1000;


              // JP
          if ($id_status == 0) {
            if ($gaji_pokok > 8939700) {
              $jp = 178794*12;
            } else {
              $jp = $gaji_pokok*2/100*12;
            }
          } else {
            $jp = 0;
          }




          $koneksi->query("INSERT INTO tbl_payroll 
            (
            nama_karyawan,
            gaji_pokok,
            tgl_masuk,
            hari_kerja,
            total_kerja,
            setahun,
            gaji_setahun,
            alokasi_hari,
            alokasi_thr,
            persenan_thr,
            thr,
            bpjs_jkm,
            bpjs_kes,
            gaji_kotor,
            bpjstk_jht,
            bpjstk_jp,
            biaya_jabatan,
            total_pajak,
            penghasilan_bersih,
            id_ptkp,
            penghasilan_kena_pajak,
            id_npwp,
            pajak1,
            pajak2,
            pajak3,
            pajak4,
            pph21,
            bpjs_keset,
            gaji_bersih,
            id_status,
            jht,
            jp
            ) 
            VALUES (
            '$nama_karyawan',
            '$gaji_pokok',
            '$tgl_masuk',
            '$hari_kerja',
            '$total_kerja',
            '$setahun',
            '$gaji_setahun',
            '$alokasi_hari',
            '$alokasi_thr',
            '$persenan_thr',
            '$thr',
            '$bpjs_jkm',
            '$bpjs_kes',
            '$gaji_kotor',
            '$bpjstk_jht',
            '$bpjstk_jp',
            '$biaya_jabatan',
            '$total_pajak',
            '$penghasilan_bersih',
            '$id_ptkp',
            '$penghasilan_kena_pajak',
            '$id_npwp',
            '$pajak1',
            '$pajak2',
            '$pajak3',
            '$pajak4',
            '$pph21',
            '$bpjs_keset',
            '$gaji_bersih',
            '$id_status',
            '$jht',
            '$jp'
          ) ");


          echo "<div class='alert alert-info'>Data Payroll Telah Ditambahkan</div>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=payroll'>";







        }
        ?>
      </div>

    </div>
  </div>
</div>




<!-- jQuery Library -->
<script type="text/javascript" src="vendors/jquery-3.2.1.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="js/custom-script.js"></script>
</body>
