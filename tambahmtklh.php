<div class="card">
  <div class="card-header text-bg-primary">
    Tambah MATA KULIAH 
  </div>
  <div class="card-body">
    <h5 class="card-title">Tambah Mata Kuliah</h5>
	<?php
	include "koneksi.php";
	if(isset($_POST['simpan'])){
		$kdmk=$_POST['kdmk'];
		$nama_mk=$_POST['nama_mk'];
    $sks=$_POST['sks'];
		$a="insert into tblmatakuliah values('$kdmk','$nama_mk','$sks')";
		$b=mysqli_query($koneksi,$a);
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
    <label for="inputEmail3" class="col-sm-4 col-form-label">Kode Mata Kuliah</label>
    <div class="col-sm-8">
      <input type="text" name="kdmk" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Nama Mata Kuliah</label>
    <div class="col-sm-8">
      <input type="text" name="nama_mk" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label">SKS</label>
    <div class="col-sm-8">
      <select class="form-select" name="sks" aria-label="Default select example">
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
  <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">
  <input type="reset" name="batal" class="btn btn-warning" value="BATAL">
</form>
  </div>
</div>