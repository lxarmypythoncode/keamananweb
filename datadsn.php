<div class="card">
  <div class="card-header text-bg-primary">
    DATA DOSEN
  </div>
  <div class="card-body">
    <h5 class="card-title">Data Dosen</h5>
	<br><a class="btn btn-primary" href="?page=tambahdsn" role="button">+Tambah</a><br><br>
	<div class="table-responsive">
    <table class="table table-bordered table-hover" >
  <thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nama Dosen</th>
	  <th scope="col">NIDN</th>
	  <th scope="col">Pendidikan</th>
	  <th scope="col">L/P</th>
	  <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include "koneksi.php";
  $sql="select * from tbldosen";
  $query=mysqli_query($koneksi,$sql);
  while($a=mysqli_fetch_array($query)){
  ?>
    <tr>
      <td><img src="foto/<?php echo $a['foto'];?>" class="img-thumbnail" width="70px" alt="..."></td>
      <td><?php echo $a['nama_lengkap'];?></td>
	  <td><?php echo $a['nidn'];?></td>
      <td><?php echo $a['pendidikan'];?></td>
	  <td><?php echo $a['jnskel'];?></td>
	  <td><a href="?page=ubahdsn&&nidn=<?php echo $a['nidn'];?>">Ubah</a> | 
	  <a href="?page=hapusdsn&&nidn=<?php echo $a['nidn'];?>" onclick="return confirm('Anda yakin menghapus data ini ?')">Hapus</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>
