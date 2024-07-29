<?php
session_start();
session_destroy();
?>
<script type="text/javascript">
	alert('Berhasil Logout.');
	location.href = "../index.php";
</script>