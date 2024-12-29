<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['level'])){
include "koneksi.php";
$sql="select * from user where email='$_SESSION[email]'";
$query=mysqli_query($koneksi,$sql);
$data=mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Beranda</title>
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
	<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SIAKAD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Akademik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Pengumuman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav><br>
<div class="row">
	<div class="col-md-3">
	<div class="list-group">
  <a href="beranda.php" class="list-group-item list-group-item-action active" aria-current="true">
    MENU UTAMA
  </a>
  <?php
  if($_SESSION['level']=="admin"){
  ?>
  <a href="?page=datamhs" class="list-group-item list-group-item-action">Data Mahasiswa</a>
  <a href="?page=datadsn" class="list-group-item list-group-item-action">Data Dosen</a>
  <a href="?page=datamtklh" class="list-group-item list-group-item-action">Data Mata Kuliah</a>
  <a href="#" class="list-group-item list-group-item-action">Data Kelas</a>
<?php
  }elseif($_SESSION['level']=="dosen"){
?> 
  <a href="#" class="list-group-item list-group-item-action">Update Profil</a>
  <a href="#" class="list-group-item list-group-item-action">Cek KRS</a>
  <a href="#" class="list-group-item list-group-item-action">Input Nilai</a>
  <a href="#" class="list-group-item list-group-item-action">Jadwal Mengajar</a>
<?php
  }elseif($_SESSION['level']=="mahasiswa"){
?>
  <a href="#" class="list-group-item list-group-item-action">Update Profil</a>
  <a href="#" class="list-group-item list-group-item-action">Isi KRS</a>
  <a href="#" class="list-group-item list-group-item-action">Lihat KHS</a>
  <a href="#" class="list-group-item list-group-item-action">Jadwal Kuliah</a>
  <?php } ?>
</div><br>
</div>
<div class="col-md-9">
<?php include "konten.php";?>
</div>
</div><br>
<div class="row">
<div class="card">
  <div class="card-body text-center">
    <strong>Copyright &copy;2023 by Universitas Teknologi Mataram</strong>
  </div>
</div>
</div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else{
	echo "<h2>Anda mengakses halaman ini tanpa login, 
	silahkan login dulu <a href='index.php'>disini</a></h2>";
}
?>