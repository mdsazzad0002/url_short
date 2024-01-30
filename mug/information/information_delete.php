	 <?php 
	 	require_once '../../conection/index.php';
		 if(isset($_POST['type']) && $_POST['type']=='delete'){
			$id=mysqli_real_escape_string($con,$_POST['id']);
			mysqli_query($con,"delete from information where id='$id'");
		 }
?>