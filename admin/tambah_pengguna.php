<?php include 'header.php' ?>

		<!-- content -->
	<div class="content">

		<div class="container">
		
			<div class="box">

				<div class="box-header">
					Tambah Pengguna
				</div>

				<div class="box-body">
					<form action="" method="POST">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>				
						</div>
						
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="user" placeholder="Username" class="input-control" required>				
						</div>

						<div class="form-group">
							<label>Level</label>
							<select name="level" class="input-control">
								<option value="">Pilih</option>
								<option value="Admin">Admin</option>
								<option value="Sekretaris">Sekretaris</option>
							</select>				
						</div>

						<button type="button" class="btn" onclick="window.location = 'pengguna.php'">kembali</button>

						<input type="submit" name="submit" value="Simpan" class="btn btn-blue" >

					</form>

					<?php

						if(isset($_POST['submit'])){

							$nama	= $_POST['nama'];
							$user	= $_POST['user'];
							$level	= $_POST['level'];
							$pass	= '123456';

							$simpan = mysqli_query($conn, "INSERT INTO user VALUES (
								null,
								'".$nama."',
								'".$user."',
								'".$pass."',
								'".$level."'
						)");

							if($simpan){
								echo '<div class="alert-succes">simpan berhasil</div>';
							}
						}
					?>
				</div>
				
			</div>

		</div>
		
	</div>

<?php include 'footer.php' ?>