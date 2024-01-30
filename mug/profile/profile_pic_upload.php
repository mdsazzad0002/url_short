<?php 

	require_once '../../conection/index.php';
	  if (isset($_POST['user_type'])) {
            $user_type=$_POST['user_type'];
        }   
    // who user inserted data


     function generateRandomString($length = 100) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }


	if (isset($_FILES['profile_pic'])) {
		$file=$_FILES['profile_pic'];
		$file_name=generateRandomString().$file['name'];
		$file_name=str_replace("'","\'",$file_name);
		$tmp_name=$file['tmp_name'];

		$s_r_pic=mysqli_fetch_assoc($con->query("SELECT * FROM `admin_user` WHERE `email`='$user_type'"))['file'];
		if (!empty($s_r_pic)) {
			if (file_exists('../../image/'.$s_r_pic)) {
				unlink('../../image/'.$s_r_pic);
			}
		}

		
		$update=$con->query("UPDATE `admin_user` SET `file`='$file_name' WHERE `email` ='$user_type'");
		if ($update) {
			$move=move_uploaded_file($tmp_name,'../../image/'.$file_name);
			if ($move) {
				echo "We are Success";
			}else{
				echo "Something Wrong";
			}
		}
	}else{
		echo "We are not found Expected data";
	}

 ?>