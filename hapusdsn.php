<?php
include "koneksi.php";
	if(isset($_GET['nidn'])){
		$nidn=$_GET['nidn'];
		$hapus="delete from tbldosen where nidn='$nidn'";
		$qhapus=mysqli_query($koneksi,$hapus);
		if($qhapus){
			header("location:?page=datadsn");
		}
	}else{
		header("location:?page=datadsn");
	}
?>