<?php include 'header.php' ?>

		<!-- content -->
	<div class="content">

		<div class="container">
		
			<div class="box">

				<div class="box-header">
					Tambah Artikel
				</div>

				<div class="box-body">
					<form action="" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Judul Artikel" class="input-control" required>				
						</div>
						
						<div class="form-group">
							<label>Keterangan</label>
							<textarea name="keterangan" class="input-control" placeholder="Keterangan"></textarea>				
						</div>

						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar" class="input-control" required>			
						</div>

						<button type="button" class="btn" onclick="window.location = 'artikel.php'">kembali</button>

						<input type="submit" name="submit" value="Simpan" class="btn btn-blue" >

					</form>

					<?php

						if(isset($_POST['submit'])){


							//print_r($_FILES['gambar']);

							$nama	= $_POST['nama'];
							$ket	= $_POST['keterangan'];

							$filename	= $_FILES['gambar']['name'];
							$tmpname	= $_FILES['gambar']['tmp_name'];
							$filesize	= $_FILES['gambar']['size'];

							$formatfile	= pathinfo($filename, PATHINFO_EXTENSION);
							$rename		= 'artikel'.time().'.'.$formatfile;

							$allowedtype = array('png', 'jpeg', 'jpg', 'gif');

							if(!in_array($formatfile, $allowedtype)){

								echo '<div class="alert-error">format tidak diziinkan</div>';

							}elseif($filesize > 1000000){

								echo '<div class="alert-error">Ukuran file terlalu besar</div>';

							}else{	

								move_uploaded_file($tmpname, "../uploads/artikel/".$rename);


							$simpan = mysqli_query($conn, "INSERT INTO artikel VALUES (
								null,
								'".$nama."',
								'".$ket."',
								'".$rename."'
								
						)");

							if($simpan){
								echo '<div class="alert-succes">simpan berhasil</div>';
							}


							}
				

						}
					?>
				</div>
				
			</div>

		</div>
		
	</div>

<?php include 'footer.php' ?>