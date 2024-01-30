 <?php 
		require_once '../../conection/index.php';
		  if(isset($_POST['type']) && $_POST['type']=='status'){

			$id=mysqli_real_escape_string($con,$_POST['id']);
			$status=mysqli_real_escape_string($con,$_POST['status']);
			
			if($status=='active'){
				mysqli_query($con,"update shorturl set status='1' where id='$id'");
			}else{
				mysqli_query($con,"update shorturl set status='0' where id='$id'");
			}
		 }
		 ?>