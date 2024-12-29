<div class="card">
  <div class="card-header text-bg-primary">
    Tambah MAHASISWA
  </div>
  <div class="card-body">
    <h5 class="card-title">Tambah Mahasiswa</h5>
	<?php
	include "koneksi.php";
	if(isset($_POST['simpan'])){
		$nim=$_POST['nim'];
		$nama_mhs=$_POST['nama_mhs'];
		$prodi=$_POST['prodi'];
		$semester=$_POST['semester'];
		$alamat=$_POST['alamat'];
		$jnskel=$_POST['jnskel'];
		$foto=$_FILES['foto']['name'];
		$tmp=$_FILES['foto']['tmp_name'];
		$a="insert into tblmahasiswa values('$nim','$nama_mhs','$prodi','$semester',
		'$alamat','$jnskel','$foto')";
		$b=mysqli_query($koneksi,$a);
		move_uploaded_file($tmp,"foto/$foto");
		if($b){
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Berhasil!</strong> Data berhasil disimpan.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
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
      <input type="text" name="nim" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
    <div class="col-sm-8">
      <input type="text" name="nama_mhs" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi</label>
    <div class="col-sm-8">
      <select class="form-select" name="prodi" aria-label="Default select example">
  <option value="Teknik Informatika">Teknik Informatika</option>
  <option value="Sistem Informasi">Sistem Informasi</option>
  <option value="Teknologi Informasi">Teknologi Informasi</option> 
</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Semester</label>
    <div class="col-sm-8">
      <select class="form-select" name="semester" aria-label="Default select example">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>  
</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
    <div class="col-sm-8">
      <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin</legend>
    <div class="col-sm-8">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jnskel" id="gridRadios1" value="L" checked>
        <label class="form-check-label" for="gridRadios1">
          Laki-laki
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jnskel" id="gridRadios2" value="P">
        <label class="form-check-label" for="gridRadios2">
          Perempuan
        </label>
      </div>
      
    </div>
  </fieldset>
  
  
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Upload Foto</label>
    <div class="col-sm-8">
      <input class="form-control" name="foto" type="file" id="formFile">
    </div>
  </div>
  <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">
  <input type="reset" name="batal" class="btn btn-warning" value="BATAL">
</form>
  </div>
</div>