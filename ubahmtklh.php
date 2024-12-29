<div class="card">
  <div class="card-header text-bg-primary">
    UBAH MATA KULIAH
  </div>
  <div class="card-body">
    <h5 class="card-title">Ubah Mata Kuliah</h5>
	<?php
	include "koneksi.php";
	if(isset($_GET['kdmk'])){
		$kdmk=$_GET['kdmk'];
		$tampil="select * from tblmatakuliah where kdmk='$kdmk'";
		$qtampil=mysqli_query($koneksi,$tampil);
		$dt=mysqli_fetch_array($qtampil);
	}else{
		header("location:?page=datamtklh");
	}
	if(isset($_POST['simpan'])){
		$nama_mk=$_POST['nama_mk'];
		$sks=$_POST['sks'];
		if(strlen($foto>0)){
			$a="update tblmatakuliah set nama_mk='$nama_mk',sks='$sks' where kdmk='$kdmk'";
			$b=mysqli_query($koneksi,$a);
		}else{
			$a="update tblmatakuliah set nama_mk='$nama_mk',sks='$sks' where kdmk='$kdmk'";
			$b=mysqli_query($koneksi,$a);
		}
		if($b){
			header("location:?page=datamtklh");
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
      <input type="text" value="<?php echo $dt['kdmk'];?>" name="kdmk" class="form-control" disabled>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Nama Mata Kuliah</label>
    <div class="col-sm-8">
      <input type="text" value="<?php echo $dt['nama_mk'];?>" name="nama_mk" class="form-control" id="inputPassword3">
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
  <input type="submit" name="simpan" class="btn btn-primary" value="UBAH">
  <a href="?page=datamtklh" class="btn btn-warning">BATAL</a>
</form>
  </div>
</div>
