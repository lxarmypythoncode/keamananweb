<?php
session_start();
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
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
			<div class="col-md-4">
			<div class="card">
			  <div class="card-header text-center">
				<h5><b>Silahkan <span class="text-primary">LOGIN</span></b></h5>
			  </div>			  
			  <div class="card-body">
			  <?php
			  if(isset($_POST['login'])){
				  $password=md5($_POST['password']);
				  $email=$_POST['email'];
				  $sql="select * from user where email='$email' and password='$password'";
				  $query=mysqli_query($koneksi,$sql);
				  $row=mysqli_num_rows($query);
				  $data=mysqli_fetch_array($query);
				if($row>0){
				  $_SESSION['email']=$data['email'];
				  $_SESSION['level']=$data['level'];
				  header("location:beranda.php");
				}else{
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
				  <strong>Warning!</strong>Email atau password Anda salah!
				  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				</div>";
				}
			  }
			  ?>
			  <form method="post" action="">
				<div class="mb-3">
				  <label for="exampleFormControlInput1" class="form-label">Email</label>
				  <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan email!">
				</div>
				<div class="mb-3">
				  <label for="exampleFormControlInput1" class="form-label">Password</label>
				  <input name="password" type="password" id="inputPassword5" class="form-control" placeholder="Masukkan password!">
				</div>
				<div class="mb-3 d-md-flex justify-content-md-end">		
					<input type="submit" name="login" value="Login" class="btn btn-primary">
				</div>
				Jika belum punya Akun, silahkan <a href='daftar.php'>daftar!</a>
				</form>
			  </div>
			</div>
			</div>
		</div>
	</div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>