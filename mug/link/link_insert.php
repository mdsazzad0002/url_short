<?php
require_once '../../conection/index.php';
if (isset($_POST['link'])) {
	$link = $_POST['link'];
	$short_link = $_POST['short_link'];
	$user_type = $_POST['user_type'];
	if (mysqli_num_rows($con->query("SELECT * FROM `shorturl` WHERE `short_link`='$short_link'")) == 0) {

		$suc = $con->query("INSERT `shorturl` SET `link`='$link',`short_link`='$short_link',`user_type`='$user_type',`hit_count`='0',`status`='1'");
		if ($suc) {
			echo '<p class="p-2 rounded bg-success text-light  text-left"><i class="bi bi-exclamation-triangle"></i>&nbsp; https://short.ttcm.pw/' . $short_link . '</p>';
		
		} else {
			echo '<p class="p-2 rounded bg-danger text-light  text-left"><i class="bi bi-exclamation-triangle"></i>&nbsp;Please reload and try again.</p>';
		}
	} else {
		echo '<p class="p-2 rounded bg-danger text-light  text-left"><i class="bi bi-exclamation-triangle"></i>&nbsp;This link already Exists</p>';
	}
}
