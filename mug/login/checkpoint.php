

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email varification</title>
    <style>
        .email_form {
            margin: 100px auto;
            width: 400px;
        }

        .email_form .box {
            background-color: #fff;
            border: 1px solid #6b6b6b;
            overflow: hidden;
            border-radius: 10px;
            text-align: center;
        }

        .email_form .box .head {
            padding: 15px;
            background: rgb(70, 70, 216);
            position: relative;
        }

        .email_form .box .head::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            background: rgb(70, 70, 216);
            bottom: 0px;
            transform: rotate(-45deg) translateX(-50%);
            left: 50%;

        }

        .email_form .box .head .svg {
            font-size: 40px;
        }

        .email_form .box .content {
            padding: 15px;
        }

        .email_form .box .content h1 {
            font-family: sans-serif;
        }

        .email_form .box .content form {
            display: flex;
            align-items: stretch;
            flex-direction: column;
            gap: 10px;
            padding: 20px;
            /* flex-wrap: wrap; */
            align-content: center;
        }

        .email_form .box .content form input,
        .email_form .box .content form button {
            padding: 10px 15px;
            /* flex: 1 1 100%; */
            /* width: 100%; */
            display: block;
            font-size: 20px;
            border-radius: 30px;
            outline: none;
            border: 1px solid #6b6b6b;
            text-align: center;

        }

        .email_form .box .content form button {
            background: rgb(70, 70, 216);
            color: #fff;

        }
    </style>
</head>

<body>
    <?php require '../../home/header.php'; ?>
<!-- ========================================= -->
<!-- ========================================= -->
<!-- =========================================== -->
<script src="/assets/vendor/sweetalert/sweetalert.js"></script>
<script type="text/javascript">
         function redirectfull() {
            swal({
                title: "success",
                text: "Please wait just a moment!",
                icon: "success",
                button: "ok",
                timer: 3000,
            });
            setTimeout(function() {
                window.location.href = '/mug/';
            }, 2000)
        }

        function varified() {
                 swal({
                title: "Varified",
                text: "Please wait just a moment!",
                icon: "warning",
                button: "ok",
                timer: 3000,
            });
            setTimeout(function() {
                window.location.href = '/mug/';
            }, 2000)
        }

        
        function send_faild() {
                 swal({
                title: "Sorry",
                text: "Please try again!",
                icon: "warning",
                button: "ok",
                timer: 3000,
            });
            
        }
     function notmatch() {
                 swal({
                title: "Sorry",
                text: "Please try again!",
                icon: "warning",
                button: "ok",
                timer: 3000,
            });
            
        }
        function send_suc() {
                 swal({
                title: "success",
                text: "Successfully send Email plase check inbox or spam!",
                icon: "success",
                button: "ok",
                timer: 3000,
            });
           
        }
</script>


<!-- ========================================= -->
<!-- ========================================= -->
<!-- ========================================= -->
<!-- ========================================= -->
<?php
require_once '../../conection/index.php';
// verify code

$checkpoint='';
if (isset($_GET['mail'])) {
     $checkpoint=$mail=$_GET['mail'];
    if (isset($_GET['gcode'])) {
     $gcode=$_GET['gcode'];

     if (mysqli_num_rows($con->query("SELECT * FROM `admin_user` WHERE `email`='$mail' and `status`='$gcode'"))) {
         $succ=$con->query("UPDATE `admin_user` SET `status`='active' WHERE `email`='$mail'");
         if ($succ) {
             echo '<script>redirectfull()</script>';
         }else{
            
              echo '<script>notmatch()</script>';
         }
     }else if (mysqli_num_rows($con->query("SELECT * FROM `admin_user` WHERE `email`='$mail' and `status`='active'"))) {
            echo '<script>varified()</script>';
         }else{
              echo '<script>notmatch()</script>';
         }
     }

    }
   




// send mail
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@ttcm.pw>' . "\r\n";
$headers .= 'Cc:noreply@ttcm.pw' . "\r\n";

$message='';
$to='';
$subject='';




if (isset($_GET['checkpoint'])) {

    // generate code
    function generateRandomString($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
       
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    // geenrate code
    $gcode=generateRandomString();
    $checkpoint=$_GET['checkpoint'];
    $subject="Your code is " .$gcode;
    $to=$checkpoint;

// update code database
     $con->query("UPDATE `admin_user` SET `status`='$gcode' WHERE `email`='$checkpoint'");

    $message="<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <style type='text/css'>
        h1{
            text-align: center;
        }
        .card{
            display:block;
            background: #F7F7F7;
            border-radius: 10px;
            border: 1px solid #C8C9CA;
        }
        .card-header{
            text-align:center;
                
        }
        .card-header h1{
            font-size: 36px;
        }
        .card-body{
            background: #fff;
            border: 1px solid #C8C9CA;
            border-left: 0;
            border-right: 0;
            border-bottom: 0;
            padding: 10px;
        }
        .text-center{
            text-align: center;
            align-items: center;
            padding: 5px;
        }

        .btn{
            outline: none;
            background: #0B5ED7;
            padding: 10px;
            border-radius: 5px;
            color: #ffffff;
        }
        a{
            text-decoration: none;
            margin: 5px;
        }
        span{
            color:#4E73DF;
        }
        .image{
            text-align: center;
            align-items: center;
            padding: 5px;
        }
        .image img{
            width: 150px;
            height: 100px;
        }
    </style>
</head>
<body class='container'>
    <div class='card'>
        <div class='card-header'>
            <h1 class='text-center'>".$checkpoint." code is: " .$gcode."</h1>
        </div>
        <div class='card-body'>
            <div class='image'>
                <img src='https://short.ttcm.pw/image/sde.jpg'/>
            </div>
            <p style='text-align:justify'> Your verify code is: ".$gcode."</p>
            
            

            <br>
            <div class='text-center'>
            <br>
            or click this link verify
                <a class='' style='color:white' href='https://short.ttcm.pw/mug/login/checkpoint.php?mail=".$checkpoint."&gcode=".$gcode."'>
                https://short.ttcm.pw/mug/login/checkpoint.php?mail=".$checkpoint."&gcode=".$gcode."
                </a>
            </div>
            <hr>
            <div class='text-center'>
                <a href='https://facebook.com/dengrweb'>Facebook</a>
                <a href='https://dengrweb.com'></a>
                <a href='dev@dengrweb.com'>Email</a>

                

            </div>
            <div class='text-center'>
                You received this message because you This website is linked to. thank you
                <br>
                Alright reserved <a href='https://ttcn.pw'>ttcm</a>
            </div>
        </div>
    </div>
</body>
</html>";

        if (mail($to,$subject,$message,$headers)) {
            echo "<script>send_suc();</script>";
        }else{
            echo "<script>send_faild()</script>";
        }
    }

    




?>
<!-- =========================================== -->
<!-- =========================================== -->


    <div class="email_form">
        <div class="box">
            <div class="head">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"
                    style="fill: rgb(255, 255, 255);transform:0px ;msFilter:0px;">
                    <path
                        d="m21.555 8.168-9-6a1 1 0 0 0-1.109 0l-9 6A.995.995 0 0 0 2.004 9H2v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9h-.004a.997.997 0 0 0-.441-.832zM20 12.7 12 17l-8-4.3v-2.403l8 4.299 8-4.299V12.7z">
                    </path>
                </svg>
            </div>

            <div class="content">
                <h1>Check your Inbox and Give Below</h1>
                <form action="">
                    <input name="gcode" type="text" placeholder="Enter you Verification code">
                    <input placeholder="Enter your Email Address"
                    type="text" value="<?php if(isset($checkpoint)){echo $checkpoint;}?>" name="mail">

                    <button type="submit">Submit</button>
                    <a href="?checkpoint=<?php if(isset($checkpoint)){echo $checkpoint;}?>">Don't Get mail? Please Click here.</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>