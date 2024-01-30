<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>This is Some crateion for nessary</title>
	
	<?php require_once 'index.php'; ?>

</head>
<body>
	<?php 
		if(isset($_POST['submit']) or isset($_GET['type'])){

// used
// admin
		$create_admin_user=mysqli_query($con,"CREATE TABLE IF NOT EXISTS `admin_user`(id int not null AUTO_INCREMENT, name varchar(200), email varchar(100), phone varchar(50), control varchar(50), description varchar(5000), password varchar(1000), file varchar(1500), user_type varchar(1500), date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY key(id))");
		if (mysqli_num_rows($con->query("SELECT * FROM `admin_user`"))==0) {
			$pass=md5('123456');
			$con->query("INSERT INTO `admin_user`(`email`, `control`,`password`) VALUES ('admin@gmail.com','full','$pass')");
		}


		$con->query("CREATE TABLE IF NOT EXISTS `shorturl` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `link` varchar(255) NOT NULL,
				  `short_link` varchar(50) NOT NULL,
				  `user_type` varchar(50) NOT NULL,
				  `hit_count` int(11) NOT NULL,
				  `status` tinyint(4) NOT NULL,
				  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 
		");
		

		$con->query("CREATE TABLE IF NOT EXISTS `information`( id int not null AUTO_INCREMENT, user_type varchar(200), email varchar(250), password varchar(200), url varchar(200), name varchar(150), birth varchar(16), about varchar(1500), date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY key(id))");
}
		
	 ?>
	<div class="container">
		<br>
		<form method="post" action="">
			<div class="row justify-content-md-center">
				<div class="col-md-4 col-sm-12">
					<h1 class="text-center text-italic">Information</h1>
					<p>We are some create dynamicy table. You can click button <span class="text-danger bg-light">create new first time</span> Thank you. </p>
					<button class="btn btn-primary w-100" type="submit" name="submit">Create New first time</button>
					<br>
					<br>
					<a class="link" href="/mug/">Go to your home page thank?</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>