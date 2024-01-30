<?php 
	require_once '../../conection/index.php';

	if (isset($_POST['link'])) {
		$link=$_POST['link'];

		if (mysqli_num_rows($con->query("SELECT * FROM `shorturl` WHERE `short_link`='$link'"))==1) {
			echo '<p class="p-2 rounded bg-danger text-light  text-left"><i class="bi bi-exclamation-triangle"></i>&nbsp;This link already Exists</p>';
		}else{
			echo '<p class="p-2 rounded bg-success text-light text-left"><i class="bi bi-exclamation-triangle"></i>&nbsp;You can use this.</p>';
		}
	}
 ?>
