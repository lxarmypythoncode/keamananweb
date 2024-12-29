<div class="card">
  <div class="card-header text-bg-primary">
    UBAH MAHASISWA
  </div>
  <div class="card-body">
    <h5 class="card-title">Ubah Mahasiswa</h5>
	<?php
	include "koneksi.php";
	if(isset($_GET['nim'])){
		$nim=$_GET['nim'];
		$tampil="select * from tblmahasiswa where nim='$nim'";
		$qtampil=mysqli_query($koneksi,$tampil);
		$dt=mysqli_fetch_array($qtampil);
	}else{
		header("location:?page=datamhs");
	}
	if(isset($_POST['simpan'])){
		$nama_mhs=$_POST['nama_mhs'];
		$prodi=$_POST['prodi'];
		$semester=$_POST['semester'];
		$alamat=$_POST['alamat'];
		$jnskel=$_POST['jnskel'];
		$foto=$_FILES['foto']['name'];
		$tmp=$_FILES['foto']['tmp_name'];
		if(strlen($foto>0)){
			$a="update tblmahasiswa set nama_mhs='$nama_mhs',prodi='$prodi',semester='$semester',
			alamat='$alamat',jnskel='$jnskel',foto='$foto' where nim='$nim'";
			$b=mysqli_query($koneksi,$a);
			move_uploaded_file($tmp,"foto/$foto");
		}else{
			$a="update tblmahasiswa set nama_mhs='$nama_mhs',prodi='$prodi',semester='$semester',
			alamat='$alamat',jnskel='$jnskel' where nim='$nim'";
			$b=mysqli_query($koneksi,$a);
		}
		if($b){
			header("location:?page=datamhs");
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
    <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Induk Mahasiswa</label>
    <div class="col-sm-8">
      <input type="text" value="<?php echo $dt['nim'];?>" name="nim" class="form-control" disabled>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
    <div class="col-sm-8">
      <input type="text" value="<?php echo $dt['nama_mhs'];?>" name="nama_mhs" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi</label>
    <div class="col-sm-8">
      <select class="form-select" name="prodi" aria-label="Default select example">
  <option value="Teknik Informatika" <?php if($dt['prodi']=="Teknik Informatika"){ echo "selected";}?>>Teknik Informatika</option>
  <option value="Sistem Informasi" <?php if($dt['prodi']=="Sistem Informasi"){ echo "selected";}?>>Sistem Informasi</option>
  <option value="Teknologi Informasi" <?php if($dt['prodi']=="Teknologi Informasi"){ echo "selected";}?>>Teknologi Informasi</option> 
</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Semester</label>
    <div class="col-sm-8">
      <select class="form-select" name="semester" aria-label="Default select example">
  <option value="1" <?php if($dt['semester']=="1"){ echo "selected";}?>>1</option>
  <option value="2" <?php if($dt['semester']=="2"){ echo "selected";}?>>2</option>
  <option value="3" <?php if($dt['semester']=="3"){ echo "selected";}?>>3</option>
<option value="4" <?php if($dt['semester']=="4"){ echo "selected";}?>>4</option>
<option value="5" <?php if($dt['semester']=="5"){ echo "selected";}?>>5</option>
<option value="6" <?php if($dt['semester']=="6"){ echo "selected";}?>>6</option>
<option value="7" <?php if($dt['semester']=="7"){ echo "selected";}?>>7</option>
<option value="8" <?php if($dt['semester']=="8"){ echo "selected";}?>>8</option>  
</select>
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
  <a href="?page=datamhs" class="btn btn-warning">BATAL</a>
</form>
  </div>
</div>
