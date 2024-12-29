<div class="card">
  <div class="card-header text-bg-primary">
    UBAH MAHASISWA
  </div>
  <div class="card-body">
    <h5 class="card-title">Ubah Mahasiswa</h5>
	<?php
	include "koneksi.php";
	if(isset($_GET['nidn'])){
		$nidn=$_GET['nidn'];
		$tampil="select * from tbldosen where nidn='$nidn'";
		$qtampil=mysqli_query($koneksi,$tampil);
		$dt=mysqli_fetch_array($qtampil);
	}else{
		header("location:?page=datadsn");
	}
	if(isset($_POST['simpan'])){
		$nama_lengkap=$_POST['nama_lengkap'];
		$pendidikan=$_POST['pendidikan'];
		$alamat=$_POST['alamat'];
		$jnskel=$_POST['jnskel'];
		$foto=$_FILES['foto']['name'];
		$tmp=$_FILES['foto']['tmp_name'];
		if(strlen($foto>0)){
			$a="update tbldosen set nama_lengkap='$nama_lengkap',pendidikan='$pendidikan',
			alamat='$alamat',jnskel='$jnskel',foto='$foto' where nidn='$nidn'";
			$b=mysqli_query($koneksi,$a);
			move_uploaded_file($tmp,"foto/$foto");
		}else{
			$a="update tbldosen set nama_lengkap='$nama_lengkap',pendidikan='$pendidikan',
			alamat='$alamat',jnskel='$jnskel' where nidn='$nidn'";
			$b=mysqli_query($koneksi,$a);
		}
		if($b){
			header("location:?page=datadsn");
		}else{
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Gagal!</strong> Data gagal disimpan.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
		}
	}
	?>
	<form method="POST" action="" enctype="multipart/form-data">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Induk Dosen Nasional</label>
    <div class="col-sm-8">
      <input type="text" value="<?php echo $dt['nidn'];?>" name="nidn" class="form-control" disabled>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Nama Dosen</label>
    <div class="col-sm-8">
      <input type="text" value="<?php echo $dt['nama_lengkap'];?>" name="nama_lengkap" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Pendidikan</label>
    <div class="col-sm-8">
      <input type="text" value="<?php echo $dt['pendidikan'];?>" name="pendidikan" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
    <div class="col-sm-8">
      <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?php echo $dt['alamat'];?></textarea>
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin</legend>
    <div class="col-sm-8">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jnskel" id="gridRadios1" value="L" <?php if($dt['jnskel']=="L"){ echo "checked";}?>>
        <label class="form-check-label" for="gridRadios1">
          Laki-laki
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jnskel" id="gridRadios2" value="P" <?php if($dt['jnskel']=="P"){ echo "checked";}?>>
        <label class="form-check-label" for="gridRadios2">
          Perempuan
        </label>
      </div>
      
    </div>
  </fieldset>
  
  
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Upload Foto</label>
    <div class="col-sm-8">
		<img src="foto/<?php echo $dt['foto'];?>" class="img-thumbnail" width="65px" alt="...">
      <input class="form-control" name="foto" type="file" id="formFile">
    </div>
  </div>
  <input type="submit" name="simpan" class="btn btn-primary" value="UBAH">
  <a href="?page=datadsn" class="btn btn-warning">BATAL</a>
</form>
  </div>
</div>
