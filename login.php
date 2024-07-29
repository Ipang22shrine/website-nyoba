<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<div class="wrapper">
		<div class="halaman_login">
			<form action="" method="post">
				<table align="center">
					<h1>Login</h1>

					<?php
						if(isset($_GET['msg'])){
							echo "<div class='alert alert alert-error'>".$_GET['msg']."</div>";
						}
					?>

					<div class="input-box">
						<input type="text" name="user" placeholder="username" required>
						<i class='bx bxs-user'></i>
					</div>
					<div class="input-box">
						<input type="password" name="pass" placeholder="password" required>
						<i class='bx bxs-lock-alt'></i>
					</div>

					<button type="submit" class="btn" name="login" value="login">Login</button>
				</table>
			</form>
				<?php
					
						if(isset($_POST['login'])){

							$user = $_POST['user'];
							$pass = $_POST['pass'];

							$cek  = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$user."' ");
							if(mysqli_num_rows($cek) > 0){

								$d = mysqli_fetch_object($cek);
								if($pass == $d->password){

									$_SESSION['status_login']	= true;
									$_SESSION['uid']			= $d->id;
									$_SESSION['uname']			= $d->nama;
									$_SESSION['ulevel']			= $d->level;

									echo "<script>window.location = 'admin/beranda.php'</script>";

								}else{
								echo 'password salah';

							}

								}else{
								echo "username tidak ditemukan";
							}

						}
							
					?>
		</div>	
	</div>	
</body>
</html>