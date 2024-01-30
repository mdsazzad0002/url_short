
              
       <?php 
            if (file_exists('../../conection/index.php')) {
              require_once '../../conection/index.php';
            }
            if (isset($_POST['id'])) {
              $id=$_POST['id'];
              $suc= mysqli_query($con,"DELETE FROM `admin_user` WHERE `id` ='$id'");
              if ($suc) {
                echo "Delete";
              }else{
                echo "Please try again";
              }
            }else{
              echo "not found Expected data";
            }
           ?>
  
                

