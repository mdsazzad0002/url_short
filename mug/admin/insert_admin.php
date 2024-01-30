
    <?php 
        
        require_once '../../conection/index.php';
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

                    $insert_user_admin=mysqli_query($con,"SELECT * FROM `admin_user` WHERE `email`='$email'");
                    $row_user_admin=mysqli_num_rows($insert_user_admin);
                    
                    if ($row_user_admin<1) {
                        $insert_user_admin=mysqli_query($con,"INSERT INTO `admin_user`( `name`, `email`, `phone`, `control`, `description`, `password`,`user_type`, `status`) VALUES ('$name','$email','$phone','$control','$description','$password',' $user_type','inactive')");
                    if ($insert_user_admin) {
                       echo $success='<h3 class="text-center p-2 rounded text-light bg-success">Admin Create successfull!</h3>';
                    }
                    }else{
                       echo $user='<h3 class="text-center p-2 rounded text-light bg-danger">User Alerady Exists!</h3>';
                    }
                }else{
                    echo $password_n='<h3 class="text-center p-2 rounded text-light bg-danger">Password not match!</h3>';
                }
            }else{
               echo $agree_w='<h3 class="text-center p-2 rounded text-light bg-danger">Press Agree button then try</h3>';
            }
        }

     ?>




             

    

