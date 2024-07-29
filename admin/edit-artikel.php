<?php include 'header.php' ?>

<?php
	$artikel	 = mysqli_query($conn, "SELECT * FROM artikel WHERE id = '".$_GET['id']."' ");
	$p 			 = mysqli_fetch_object($artikel); 
?>

		<!-- content -->
	<div class="content">

		<div class="container">
		
			<div class="box">

				<div class="box-header">
					Edit Artikel
				</div>

				<div class="box-body">

					<form action="" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Judul Artikel" value="<?= $p->nama ?>" class="input-control" required>				
						</div>
						
						<div class="form-group">
							<label>Keterangan</label>
							<textarea name="keterangan" class="input-control" placeholder="Keterangan"><?= $p->keterangan ?></textarea>				
						</div>

						<div class="form-group">
							<label>Gambar</label>
							<img src="../uploads/artikel/<?= $p->gambar ?>"width="200px" class="image">
							<input type="hidden" name="gambar2" value="<?= $p->gambar ?>">
							<input type="file" name="gambar" class="input-control" >			
						</div>

						<button type="button" class="btn" onclick="window.location = 'artikel.php'">kembali</button>

						<input type="submit" name="submit" value="Simpan" class="btn btn-blue" >

					</form>


					<?php

						if(isset($_POST['submit'])){

							$nama	= $_POST['nama'];
							$ket	= $_POST['keterangan'];

							if($_FILES['gambar']['name']!= ''){

								echo 'user ganti gambar';

								$filename	= $_FILES['gambar']['name'];
								$tmpname	= $_FILES['gambar']['tmp_name'];
								$filesize	= $_FILES['gambar']['size'];

								$formatfile	= pathinfo($filename, PATHINFO_EXTENSION);
								$rename		= 'artikel'.time().'.'.$formatfile;

								$allowedtype = array('png', 'jpeg', 'jpg', 'gif');

								if(!in_array($formatfile, $allowedtype)){

									echo '<div class="alert-error">format tidak diziinkan</div>';

									return false;

								}elseif($filesize > 1000000){

									echo '<div class="alert-error">Ukuran file terlalu besar</div>';

									return false;

								}else{	

								if(file_exists("../uploads/artikel/".$_POST['gambar2'])){

									unlink("../uploads/artikel/".$_POST['gambar2']);
								}

								move_uploaded_file($tmpname, "../uploads/artikel/".$rename);

							  }

							}else{

								echo 'user tidak ganti gambar';

								$rename = $_POST['gambar2'];
							}

							$update = mysqli_query($conn, "UPDATE artikel SET
								nama = '".$nama."',
								keterangan = '".$ket."',
								gambar = '".$rename."'
								WHERE id = '".$_GET['id']."'
							 ");
						

							if($update){
								echo "<script>window.location='artikel.php?success=Edit Data Berhasil'</script>";
							}else{
								echo 'gagal simpan' .mysqli_error($conn);
							}
						}
					?>
				</div>
				
			</div>

		</div>
		
	</div>

<?php include 'footer.php' ?>