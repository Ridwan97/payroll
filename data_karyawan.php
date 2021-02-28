   <section id="content">
  	<!--breadcrumbs start-->
  	<div id="breadcrumbs-wrapper">
  		<!-- Search for small screen -->
  		<div class="header-search-wrapper grey lighten-2 hide-on-large-only">
  			<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
  		</div>
  		<div class="container">
  			<div class="row">
  				<div class="col s10 m6 l6">
  					<h5 class="breadcrumbs-title">Data Karyawan</h5>
  					<ol class="breadcrumbs">
  						<li><a href="index.html">Dashboard</a>
  						</li>
  						<li><a href="#">Forms</a>
  						</li>
  						<li class="active">Forms Layouts</li>
  					</ol>
  				</div>
  				<div class="col s2 m6 l6">
  					<a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-activates="dropdown1">
  						<i class="material-icons hide-on-med-and-up">settings</i>
  						<span class="hide-on-small-onl">Settings</span>
  						<i class="material-icons right">arrow_drop_down</i>
  					</a>
  					<ul id="dropdown1" class="dropdown-content">
  						<li><a href="#!" class="grey-text text-darken-2">Access<span class="badge">1</span></a>
  						</li>
  						<li><a href="#!" class="grey-text text-darken-2">Profile<span class="new badge">2</span></a>
  						</li>
  						<li><a href="#!" class="grey-text text-darken-2">Notifications</a>
  						</li>
  					</ul>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!--breadcrumbs end-->

  	<!--start container-->
  	<div class="container">
  		<div class="section">
  			<p class="caption">Includes predefined classes for easy form layout options.</p>
  			<div class="divider"></div>
  		</div>
  	</div>
  </section>


  <!-- Table -->
  <div class="container">
  	<h1>Data Karyawan</h1>
   <a href="index.php?halaman=tambah_karyawan" class="btn right lemon">tambah karyawan</a><br>
   <table class="bordered striped responsive-table">
    <thead>
     <tr>
      <th>Nomor</th>
      <th>Nama Karyawan</th>
      <th>foto karyawan</th>
      <th>tanggal masuk</th>
      <th>Status</th>
      <th>ptkp</th>
      <th>diperbarui</th>
      <th>aksi</th>
    </tr>
  </thead>
  <tbody align="center">
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM tbl_karyawan 
      JOIN tbl_status ON tbl_karyawan.id_status=tbl_status.id_status 
      JOIN tbl_ptkp ON tbl_karyawan.id_ptkp=tbl_ptkp.id_ptkp ORDER BY tgl_masuk
      ");
      while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
         <td><?php echo $nomor ; ?></td> 
          <td><?php echo $pecah['nama_karyawan'] ;?></td>
          <td><img src="images/karyawan/<?php echo $pecah['foto_karyawan'] ;?>" width="100"></td>
          <td><?php echo date('d F Y',strtotime($pecah['tgl_masuk'] )) ; ?> </td>
          <td><?php echo $pecah['nama_status'] ; ?></td>
          <td><?php echo $pecah['nama_ptkp'] ; ?></td> 
          <td><?php echo $pecah['nama_admin'] ;?></td> 
          <td>
            <a href="index.php?halaman=detail_karyawan&id=<?php echo $pecah['id_karyawan'] ;?>" class="btn yellow">detail</a>
            <a href="index.php?halaman=ubah_karyawan&id=<?php echo $pecah['id_karyawan'];  ?>" class="btn teal">ubah</a>
            <a href="index.php?halaman=hapus_karyawan&id=<?php  echo $pecah['id_karyawan'];  ?>" class="btn red">hapus</a>
          </td>    
        </tr>
        <?php $nomor++; ?>
      <?php   } ?>
    </tbody>
  </table>
</div>
<!-- table -->

<br>
<br>
<br>

<!-- Form with validation -->
<!-- <div class="container">
 <div class="col s12 m12 l6">
  <div class="card-panel">
   <h4 class="header2">Form with validation</h4>
   <div class="row">
    <form class="col s12">
     <div class="row">
      <div class="input-field col s12">
       <i class="material-icons prefix">account_circle</i>
       <input id="name4" type="text" class="validate">
       <label for="first_name">Name</label>
     </div>
   </div>
   <div class="row">
    <div class="input-field col s12">
     <i class="material-icons prefix">email</i>
     <input id="email4" type="email" class="validate">
     <label for="email">Email</label>
   </div>
 </div>
 <div class="row">
  <div class="input-field col s12">
   <i class="material-icons prefix">lock_outline</i>
   <input id="password5" type="password" class="validate">
   <label for="password">Password</label>
 </div>
</div>
<div class="row">
  <div class="input-field col s12">
   <i class="material-icons prefix">question_answer</i>
   <textarea id="message4" class="materialize-textarea validate" length="120"></textarea>
   <label for="message">Message</label>
 </div>
 <div class="row">
   <div class="input-field col s12">
    <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
     <i class="material-icons right">send</i>
   </button>
 </div>
</div> -->
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>