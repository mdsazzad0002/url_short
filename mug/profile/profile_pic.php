
<?php 

      if(file_exists('../../conection/index.php')){
         require_once '../../conection/index.php';
      }

      

    if (isset($_POST['user_type'])) {
            $user_type=$_POST['user_type'];
          }      
     
   $s_r_pic=mysqli_fetch_assoc($con->query("SELECT * FROM `admin_user` WHERE `email`='$user_type'"));
   if (!empty($s_r_pic['file'])) {
   		echo '<img class="img-fulid" style="width:150px;" src="/image/'.$s_r_pic['file'].'"/>';
   		echo ' <i class="bi bi-plus-circle-fill text-primary h3 position-absolute" style="top:10px; right: 10px;"></i>';
   }else{
   		echo '<i class="bi bi-person-circle"></i>';
   }

 ?>