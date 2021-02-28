<div class="container">
  <h1 class="center">Data Payroll</h1>
  <div class="row">
    <div class="col s2"><br>
      <a href="index.php?halaman=tambah_payroll" class="btn right lemon">tambah</a>
    </div>
    <form action="" method="post" autocomplete="off">
      <div class="col s8"> 
        <div class="input-field">
          <i class="material-icons prefix">search</i>
          <input  name="keyword"  placeholder="Cari Data Payroll" autofocus  >         
        </div>
      </div>
      <div class="col s2"><br>  
        <button type="submit" name="cari" class="btn teal">Cari</button>
      </div>        
    </form> 
  </div>


  <table class="bordered striped hoverable centered col s12 m12 l12 xl12">
    <thead>
     <tr>
      <th>Nomor</th>
      <th>Nama Karyawan</th>
      <th>Status</th>
      <th>Gaji Sebulan</th>
      <th>Tanggal Masuk</th>
      <th>Gaji Setahun</th>
      <th>THR</th>
      <th>PTKP</th>
      <th>PPH 21</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody align="center">
    <?php if ((isset($_POST['keyword']))): ?>
      <?php  $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
      $limit = 20;
      $limitStart = ($page - 1) * $limit;
      $keyword= $_POST["keyword"];
      $SqlQuery=$koneksi->query("SELECT * FROM tbl_payroll 
        JOIN tbl_ptkp ON tbl_payroll.id_ptkp=tbl_ptkp.id_ptkp 
        JOIN tbl_status ON tbl_payroll.id_status=tbl_status.id_status 
        WHERE nama_karyawan LIKE '%$keyword%' 
        OR gaji_pokok LIKE '%$keyword%'
        OR nama_ptkp LIKE '$keyword'
        OR nama_status LIKE '$keyword%'
        LIMIT ".$limitStart.",".$limit);
      $no = $limitStart + 1;
      while($row = mysqli_fetch_array($SqlQuery)){   
       ?>
       <tr>
       <td><?php echo $no ; ?></td> 
       <td><?php echo $row['nama_karyawan'] ;?></td>
       <td><?php echo $row['nama_status'] ;?></td>  
       <td>Rp.<?php echo number_format($row['gaji_pokok']); ?></td>
       <td><?php echo date("d F Y",strtotime($row['tgl_masuk'])); ?></td>
       <td>
                   <?php
            if ($row['gaji_setahun'] == 0) {
              echo "-<br>";
            } elseif ($row['gaji_setahun'] > 1) {
              echo "Rp.".number_format($row['gaji_setahun'])."<br>"; 
            } 
          ?>  

       </td>
       <td>
          <?php
            if ($row['thr'] == 0) {
              echo "-<br>";
            } elseif ($row['thr'] > 1) {
              echo "Rp.".number_format($row['thr'])."<br>"; 
            } 
          ?>  
      </td> 
      <td><?php echo $row['nama_ptkp'] ;?></td>
      <td>
          <?php
            if ($row['pph21'] == 0) {
              echo "-<br>";
            } elseif ($row['pph21'] > 1) {
              echo "Rp.".number_format($row['pph21'])."<br>"; 
            } 
          ?>          
      </td>          
      <td>
          <a href="index.php?halaman=detail_payroll&id=<?php echo $row['id_payroll'] ;?>" class="btn yellow">detail</a>
          <a href="cetak_payroll.php?id=<?php echo $row['id_payroll'];  ?>" class="btn teal" target="_blank">Cetak</a>
          <a href="index.php?halaman=hapus_payroll&id=<?php  echo $row['id_payroll'];  ?>" class="btn red">hapus</a>
        </td>    
      </tr>
      <?php $no++; ?>
    <?php   } ?>
    <?php else: ?> 
     <?php

     $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;

      // Jumlah data per halaman
     $limit = 20;

     $limitStart = ($page - 1) * $limit;

     $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tbl_payroll 
      JOIN tbl_ptkp ON tbl_payroll.id_ptkp=tbl_ptkp.id_ptkp 
      JOIN tbl_status ON tbl_payroll.id_status=tbl_status.id_status
      LIMIT ".$limitStart.",".$limit);

     $no = $limitStart + 1;

     while($row = mysqli_fetch_array($SqlQuery)){ 
      ?>


      <tr>
       <td><?php echo $no ; ?></td> 
       <td><?php echo $row['nama_karyawan'] ;?></td>
       <td><?php echo $row['nama_status'] ;?></td>  
       <td>Rp.<?php echo number_format($row['gaji_pokok']); ?></td>
       <td><?php echo date("d F Y",strtotime($row['tgl_masuk'])); ?></td>
       <td>
                   <?php
            if ($row['gaji_setahun'] == 0) {
              echo "-<br>";
            } elseif ($row['gaji_setahun'] > 1) {
              echo "Rp.".number_format($row['gaji_setahun'])."<br>"; 
            } 
          ?>  

       </td>
       <td>
          <?php
            if ($row['thr'] == 0) {
              echo "-<br>";
            } elseif ($row['thr'] > 1) {
              echo "Rp.".number_format($row['thr'])."<br>"; 
            } 
          ?>  
      </td> 
      <td><?php echo $row['nama_ptkp'] ;?></td>
      <td>
          <?php
            if ($row['pph21'] == 0) {
              echo "-<br>";
            } elseif ($row['pph21'] > 1) {
              echo "Rp.".number_format($row['pph21'])."<br>"; 
            } 
          ?>          
      </td> 
      <td>
        <a href="index.php?halaman=detail_payroll&id=<?php echo $row['id_payroll'] ;?>" class="btn yellow btn-tiny">detail</a>
        <!--            <a href="cetak_payroll.php?id=<?php echo $row['id_payroll'];  ?>" class="btn teal" target="_blank">Cetak</a> -->
        <a href="index.php?halaman=ubah_payroll&id=<?php echo $row['id_payroll'];  ?>" class="btn blue btn-tiny">Ubah</a>
        <a href="index.php?halaman=hapus_payroll&id=<?php  echo $row['id_payroll'];  ?>" class="btn red btn-tiny">hapus</a>
      </td>    
    </tr>
    <?php $no++; ?>
  <?php   } ?>

<?php endif ?>

</tbody>
</table>

<div align="right">
  <ul class="pagination">
    <?php
    // Jika page = 1, maka LinkPrev disable
    if($page == 1){ 
      ?>        

      <!-- link Previous Page disable --> 
      <li class="disabled"><a href="#">Previous</a></li>
      <?php
    } else{ 
      $LinkPrev = ($page > 1)? $page - 1 : 1; 
      ?>

      <!-- link Previous Page --> 
      <li class="active"><a href="index.php?halaman=payroll&page=<?php echo $LinkPrev ; ?>"><i class="material-icons">chevron_left</i></a></li>
    <?php }  ?>

    <?php
    $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tbl_payroll JOIN tbl_ptkp ON tbl_payroll.id_ptkp=tbl_ptkp.id_ptkp");        

      //Hitung semua jumlah data yang berada pada tabel Sisawa
    $JumlahData = mysqli_num_rows($SqlQuery);

      // Hitung jumlah halaman yang tersedia
    $jumlahPage = ceil($JumlahData / $limit); 

      // Jumlah link number 
    $jumlahNumber = 1; 

      // Untuk awal link number
    $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 

      // Untuk akhir link number
    $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 

    for($i = $startNumber; $i <= $endNumber; $i++){
      $linkActive = ($page == $i)? '<li class="active">' : '';
      ?>
      <li  class="waves-effect"><?php echo $linkActive; ?><a href="index.php?halaman=payroll&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php
    }
    ?>

    <!-- link Next Page -->
    <?php       
    if($page == $jumlahPage){ 
      ?>
      <li class="active"><a href="#"><i class="material-icons">chevron_right</i></a></li>
      <?php
    }
    else{
      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
      ?>
      <li><a href="index.php?halaman=payroll&page=<?php echo $linkNext; ?>"><i class="material-icons">chevron_right</i></a></li>
      <?php
    }
    ?>
  </ul>

</div>

</div>
