<?php
include "koneksi.php";
	if(isset($_GET['kdmk'])){
		$kdmk=$_GET['kdmk'];
		$hapus="delete from tblmatakuliah where kdmk='$kdmk'";
		$qhapus=mysqli_query($koneksi,$hapus);
		if($qhapus){
			header("location:?page=datamtklh");
		}
	}else{
		header("location:?page=datamtklh");
	}
?>