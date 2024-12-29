<div class="card">
  <div class="card-header text-bg-primary">
    DATA MATAKULIAH
  </div>
  <div class="card-body">
    <h5 class="card-title">Data Matakuliah</h5>
	<br><a class="btn btn-primary" href="?page=tambahmtklh" role="button">+Tambah</a><br><br>
	<div class="table-responsive">
    <table class="table table-bordered table-hover" >
  <thead>
    <tr>
      <th scope="col">Nama MK</th>
	  <th scope="col">KDMK</th>
    <th scope="col">SKS</th>
	  <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include "koneksi.php";
  $sql="select * from tblmatakuliah";
  $query=mysqli_query($koneksi,$sql);
  while($a=mysqli_fetch_array($query)){
  ?>
    <tr>
      <td><?php echo $a['nama_mk'];?></td>
	  <td><?php echo $a['kdmk'];?></td>
    <td><?php echo $a['sks'];?></td>
	  <td><a href="?page=ubahmtklh&&kdmk=<?php echo $a['kdmk'];?>">Ubah</a> | 
	  <a href="?page=hapusmtklh&&kdmk=<?php echo $a['kdmk'];?>" onclick="return confirm('Anda yakin menghapus data ini ?')">Hapus</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>
