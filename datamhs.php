<div class="card">
  <div class="card-header text-bg-primary">
    DATA MAHASISWA
  </div>
  <div class="card-body">
    <h5 class="card-title">Data Mahasiswa</h5>
	<br><a class="btn btn-primary" href="?page=tambahmhs" role="button">+Tambah</a><br><br>
	<div class="table-responsive">
    <table class="table table-bordered table-hover" >
  <thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nama Mahasiswa</th>
	  <th scope="col">NIM</th>
      <th scope="col">Program Studi</th>
	  <th scope="col">Semester</th>
	  <th scope="col">L/P</th>
	  <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include "koneksi.php";
  $sql="select * from tblmahasiswa";
  $query=mysqli_query($koneksi,$sql);
  while($a=mysqli_fetch_array($query)){
  ?>
    <tr>
      <td><img src="foto/<?php echo $a['foto'];?>" class="img-thumbnail" width="65px" alt="..."></td>
      <td><?php echo $a['nama_mhs'];?></td>
	  <td><?php echo $a['nim'];?></td>
      <td><?php echo $a['prodi'];?></td>
      <td><?php echo $a['semester'];?></td>
	  <td><?php echo $a['jnskel'];?></td>
	  <td><a href="?page=ubahmhs&&nim=<?php echo $a['nim'];?>">Ubah</a> | 
	  <a href="?page=hapusmhs&&nim=<?php echo $a['nim'];?>" onclick="return confirm('Anda yakin menghapus data ini ?')">Hapus</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>
