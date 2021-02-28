  <div class="container">
   <h1>Data admin</h1>
   <table class="bordered striped centered hoverable col s12 m12 l12 xl12">
    <thead>
     <tr>
      <th>No</th>
      <th>User Admin</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php     $nomor=1 ?>
    <?php 
    $ambil=$koneksi->query("SELECT * FROM tbl_admin"); 
    while ($pecah =$ambil->fetch_assoc())
     {
      ?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['user_admin']; ?></td>
        <td><img src="images/admin/<?php echo   $pecah['foto_admin'] ;?>" class="circle" style='height: 50px; width: 50px;'></td>
        <td><?php echo  $pecah['nama_admin']; ?></td>
        <td><?php echo  $pecah['jk_admin'] ;?></td>
        <td>
          <a href="index.php?halaman=detail_admin&id=<?php echo $pecah['id_admin'];    ?>" class="btn">Detail</a>
        </td>
        </tr>
        <?php 
        $nomor++ ;
      } 
      ?>
    </tbody>

  </table>
</div>
