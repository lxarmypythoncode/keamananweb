<?php
session_start();
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Pendaftaran Akun</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
        body{
            background-image: url(logo\ UTM.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
        }
        .title{
            text-align: center;
            font-size: 2.5em;
            color: #000;
        }

        
    </style>
  </head>
  <body>
    <div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-10">
			<div class="card">
			  <div class="card-header text-center">
				<h5><b>Daftar <span class="text-primary">AKUN</span></b></h5>
			  </div>			  
			  <div class="card-body">
			  <?php
				if(isset($_POST['daftar'])){
					$nama_lengkap=$_POST['nama_lengkap'];
					$email=$_POST['email'];
					$password1=$_POST['password'];
					$password=md5($_POST['password']);
					$level=$_POST['level'];
					if(empty($nama_lengkap)){
						echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						  <strong>Warning!</strong>Nama belum diisi!
						  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";
					}elseif(empty($email)){
						echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						  <strong>Warning!</strong>Email belum diisi!
						  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";
					}elseif(empty($password1)){
						echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						  <strong>Warning!</strong>Password belum diisi!
						  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";
					}else{						
					$sql="insert into user values('$email','$password','$level','$nama_lengkap')";
					$query=mysqli_query($koneksi,$sql);					
					if($query){
					echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>Sukses!</strong>Pendaftaran akun Anda berhasil!
					  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
					}else{
					echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>Warning!</strong>Pendaftaran akun Anda gagal!
					  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
					}
				}			
				}
				?>
			  <form method="post" action="">	
				<div class="mb-3">
				  <label class="form-label">Nama Lengkap</label>
				  <input type="text" name="nama_lengkap" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama lengkap!">
				</div>
				<div class="mb-3">
				  <label class="form-label">Email</label>
				  <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan email!">
				</div>
				<div class="mb-3">
				  <label class="form-label">Password</label>
				  <input name="password" type="password" id="inputPassword5" class="form-control" placeholder="Masukkan password!">
				</div>
				<div class="mb-3">
				  <label class="form-label">Daftar Sebagai</label>
				  <div class="form-check">
					<input class="form-check-input" type="radio" name="level" value="dosen" checked>
					<label class="form-check-label">
					  Dosen
					</label>
				  </div>
				  <div class="form-check">
					<input class="form-check-input" type="radio" name="level" value="mahasiswa">
					<label class="form-check-label">
					  Mahasiswa
					</label>
				  </div>
				</div>						
				<input type="submit" name="daftar" value="DAFTAR" class="btn btn-primary">
				<br>
				Sudah punya akun? Login <a href='login.php'>disini!</a>
				</form>
			  </div>
			</div>
			</div>
		</div>
	</div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>