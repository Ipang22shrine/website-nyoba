<?php

	include '../koneksi.php';

	if(isset($_GET['idpengguna'])){

		$delete = mysqli_query($conn, "DELETE FROM user WHERE id = '".$_GET['idpengguna']."' ");
		echo "<script>window.location =  'pengguna.php'</script>";
	}

	if(isset($_GET['idartikel'])){

		$artikel = mysqli_query($conn, "SELECT gambar FROM artikel WHERE id = '".$_GET['idartikel']."' ");

		if(mysqli_num_rows($artikel) > 0){

			$p = mysqli_fetch_object($artikel);

			if(file_exists("../uploads/artikel/".$p->gambar)){

				unlink("../uploads/artikel/".$p->gambar);
			}
		}

		$delete = mysqli_query($conn, "DELETE FROM artikel WHERE id = '".$_GET['idartikel']."' ");
		echo "<script>window.location =  'artikel.php'</script>";
	}

?>