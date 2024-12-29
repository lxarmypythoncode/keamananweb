<?php
include "koneksi.php";
	if(isset($_GET['nim'])){
		$nim=$_GET['nim'];
		$hapus="delete from tblmahasiswa where nim='$nim'";
		$qhapus=mysqli_query($koneksi,$hapus);
		if($qhapus){
			header("location:?page=datamhs");
		}
	}else{
		header("location:?page=datamhs");
	}
?>