<?php 
	require_once '../../conection/index.php';
	if (isset($_POST['id'])) {
		$id=$_POST['id'];
		$change=$_POST['change'];
		$change=str_replace($change);
		$con->query("UPDATE `admin_user` SET `control`='$change' WHERE `id`='$id'");
		 echo $success='<h3 class="text-center p-2 rounded text-light bg-success">Admin Access change successfull!</h3>';
	}
 ?>