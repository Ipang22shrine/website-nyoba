<?php 
include 'header.php'
 ?>

		<!-- content -->
	<div class="content">

		<div class="container">
		
			<div class="box">

				<div class="box-header">
					Ubah Password
				</div>

				<div class="box-body">
					<form action="" method="POST">

						<div class="form-group">
							<label>Password</label>
							<input type="Password" name="pass1" placeholder="Password" class="input-control" required>				
						</div>
						
						<div class="form-group">
							<label>Ulangi Password</label>
							<input type="Password" name="pass2" placeholder="Ulangi Password" class="input-control" required>				
						</div>

						<input type="submit" name="submit" value="Ubah Password" class="btn btn-blue" >

					</form>

					<?php

						if(isset($_POST['submit'])){

							$pass1	= addslashes($_POST['pass1']);
							$pass2	= addslashes($_POST['pass2']);

							if($pass2 != $pass1){
								echo '<div class="alert-error">Password Tidak sesuai</div>';
							}else{

								$update = mysqli_query($conn, "UPDATE user SET
									password = '".$pass1."'
									WHERE id = '".$_SESSION['uid']."'
								 ");
						

								if($update){
									echo '<div class="alert-succes">Ubah Password berhasil</div>';
								}else{
									echo 'gagal ubah pasword'.mysqli_error($conn);
								}

							}
							
						}
					?>
				</div>
				
			</div>

		</div>
		
	</div>

<?php include 'footer.php' ?>