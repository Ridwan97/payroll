<div class="container">	
<h3 class="text-center">Selamat Datang  <?php echo $_SESSION['nama_admin']; ?></h3>
 <?php   
$ambil =$koneksi->query("SELECT * FROM tbl_payroll ");
while ($pecah=$ambil->fetch_assoc()) {
  $data[]= $pecah;
}
    $total=0; 
    $total_pph21=0; 
    $total_thr=0; 
    $total_bersih=0 ;
    $total_karyawan = 0;
   ?>
<?php foreach ($data as $key => $value): ?>
  <?php
      $value["nama_karyawan"] = 1;
      $karyawan=$value["nama_karyawan"];
      $total+=$value["gaji_setahun"];
      $total_pph21+=$value["pph21"];
      $total_thr+=$value["thr"];
      $total_bersih+=$value["gaji_bersih"];
      $total_karyawan+=$karyawan;
   ?>
   <?php endforeach ?>

            <div id="card-stats ">
              <div class="row mt-1">
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s5 m5">
                        <i class="material-icons background-round mt-5">assignment_ind</i>
                      </div>
                      <div class="col s7 m7 right-align">
                        <br> 
                        <h6 class="mb-0"><?php echo $total_karyawan; ?> Karyawan<h6>
                      </div>
                      <br><br><p >Jumlah Karyawan</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s5 m5">
                        <i class="material-icons background-round mt-5">account_balance_wallet</i>
                      </div>
                      <div class="col s7 m7 right-align">
                       <br> 
                        <h6 class="mb-0">Rp.<?php echo number_format($total); ?><h6>
                      </div>
                      <br> <br> 
                      <p>Total Gaji Karyawan Setahun</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s5 m5">
                        <i class="material-icons background-round mt-5">monetization_on</i>
                      </div>
                      <div class="col s7 m7 right-align">
                        <br>
                        <h6 class="mb-0">Rp.<?php echo  number_format($total_thr); ?></h6>
                      </div>
                      <br><br><p>Jumlah THR</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s5 m5">
                        <i class="material-icons background-round mt-5">account_balance</i>
                      </div>
                      <div class="col s7 m7 right-align">
                        <br>
                        <h6 class="mb-0">Rp.<?php echo   number_format($total_pph21) ;?></h6>
                      </div>
                      <br><br><p>Jumlah PPH21</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="container">
              <p style="font-family: arial; font-size: 20px;" >
              Website ini masih dalam tahap perkembangan yang berisi tetang sistem penggajian selama setahun yang dimana telah terhitung juga perhitungan Pajak Penghasilan Pasal 21, Penghasilan Tidak Kena Pajak, Perhitungan THR, BPJSTK, BPJS Kesehatan, BPJS Jaminan Hari Tua, BPJS Keceleakaan Kerja.
            </p> 
              </div>
            </div>
            </div>
