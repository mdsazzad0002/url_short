  <?php
  		require_once '../../conection/index.php';
  		  if (isset($_POST['user_type'])) {
            $user_type=$_POST['user_type'];
          }   

  		if (isset($_POST['name'])) {
            if (isset($_POST['agree'])) {
                $user_type=$_POST['user_type'];
                $user_type=str_replace("'", "\'", $user_type);
                $name=$_POST['name'];
                $name=str_replace("'", "\'", $name);
                $phone=$_POST['phone'];
                $phone=str_replace("'", "\'", $phone);
                $email=$_POST['email'];
                $email=str_replace("'", "\'", $email);
                $description=$_POST['description'];
                $description=str_replace("'", "\'", $description);
                $password=$_POST['password'];
                $password=str_replace("'", "\'", $password);
                $control=$_POST['control'];
                $control=str_replace("'", "\'", $control);
                $c_password=$_POST['c_password'];
                $c_password=str_replace("'", "\'", $c_password);
                if ($password==$c_password) {
                    $password=md5($password);

                    $insert_user_admin=mysqli_query($con,"SELECT * FROM `admin_user` WHERE `email`='$user_type'");
                    $row_user_admin=mysqli_num_rows($insert_user_admin);
        

                    if ($row_user_admin==1) {
                        //echo $row_user_admin;
                        $insert_user_admin=mysqli_query($con,"UPDATE  `admin_user` SET `name`= '$name' ,`phone`= '$phone', `control`= '$control', `description`= '$description', `password`='$password' WHERE `email`= '$user_type'");
                        if ($insert_user_admin) {
                           echo $success='<script>swal("Success", "Admin update successfull!", "success")</script>';
                        }
                    }else{
                        echo '<script>swal("Err", "User not found!", "error")</script>';
                    }
                }else{
                   echo $password_n='<script>swal("Err", "Password not match!", "error")</script>';
                }
            }else{
              echo  $agree_w='<script>swal("Err", "Press Agree button then try!", "error")</script>';
            }
        }