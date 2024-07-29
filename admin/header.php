<?php
session_start();
include '../koneksi.php';
if(!isset($_SESSION['status_login'])){
	echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
	}

	$identitas = mysqli_query($conn, "SELECT * FROM webidentitas ORDER BY id DESC LIMIT 1");
	$d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel Admin - <?= $d->nama ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Beranda</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/stylev3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
<!-- Navbar -->
	<div class="navbar">

		<div class="container">

			<!-- navbar brand-->
			<h2 class="nav-brand float-left"><?= $d->nama ?></h2>
			
			<!--navbar menu-->
			<ul class="nav-menu float-left">
			 	<li><a href="beranda.php">DASBOARD</a></li>
			 	<?php
			 	$level = $_SESSION['ulevel'] == 'Sekretaris';
			 	if($level){
			 	?>
			 	<li><a href="artikel.php">Artikel </a></li>
			 	<li>
				    <a href="">Galeri 
				    	<i class="fa fa-caret-down"></i></a>
					<!-- sub menu -->
					<ul class="dropdown">
						<li><a href="proses.php">Proses</a></li>
						<li><a href="finished.php">finished</a></li>
					</ul>
				</li>
			 	<li><a href="tentang.php">Tentang </a></li>
			 	<li><a href="../halaman_utama.php">Halaman Utama </a></li>
			 	<?php }else{ ?>
			 	<li><a href="traffic.php">Traffic</a>
			 	<li><a href="pengguna.php">Pengguna</a>
			 	<li><a href="artikel.php">Artikel </a></li>
			 	<li>
				    <a href="">Galeri 
				    	<i class="fa fa-caret-down"></i></a>
					<!-- sub menu -->
					<ul class="dropdown">
						<li><a href="proses.php">Proses</a></li>
						<li><a href="finished.php">finished</a></li>
					</ul>
				</li>
			 	<li><a href="pengaturan.php">Tentang </a></li>
			 	<?php } ?>
			    <li>
				    <a href="">(<?=$_SESSION['ulevel'] ?>) 
				    	<i class="fa fa-caret-down"></i></a>

					<!-- sub menu -->
					<ul class="dropdown">
						<li><a href="ubah-password.php">Ubah Password</a></li>
						<li><a href="identitas.php">Identitas</a></li>
						<li><a href="../halaman_utama.php">Home</a></li>
						<li><a href="logout.php">Keluar</a></li>
					</ul>
				</li>
			 </ul>

			 <div class="clearfix"></div>

		</div>
	</div>
