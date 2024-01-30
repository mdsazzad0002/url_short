<?php require_once "../assets/custom/session.php"; ?>
<?php require_once "../../conection/index.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>TTCM short link powered by D Engr Web</title>
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="/assets/vendor/sweetalert/sweetalert.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="icon" href="/image/sde.jpg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,700;0,1000;1,400;1,700;1,900&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        body {

            background-color: #1abc9c;
            background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('/image/breadcumb.jpg') fixed top left;
            min-height: 100vh;
        }

        .container {
            padding: 0 20px;
            max-width: 440px;
            margin: 150px auto;



        }

        .wrapper {
            width: 100%;
            background-color: #fff;
            border-radius: 5px;
        }

        .wrapper .title {
            line-height: 80px;
            background: #16a085;
            padding-left: 20px;
            border-radius: 5px 5px 0 0;
            font-size: 30px;
            font-weight: 600;
            color: #fff;
            text-transform: capitalize;
            text-align: center;
        }

        .wrapper form {
            padding: 20px;
        }

        .wrapper form .row {
            height: 45px;
            margin-bottom: 15px;

            position: relative;
        }

        .wrapper form .row input {
            height: 100%;
            width: 100%;
            padding-left: 60px;
            border-radius: 5px;
            border: 1px solid lightgray;
            transition: all 0.3s ease;
        }

        form .row input:focus {
            border-color: #16a085;
            box-shadow: inset 0px 0 2px 2px rgba(26, 188, 156, 0.25);
        }

        .wrapper form .row input:hover,
        .wrapper form .row input:focus {
            outline: 1px solid lightgray;
        }

        .wrapper form .row i {
            position: absolute;
            width: 47px;
            color: #fff;
            font-size: 25px;
            height: 100%;
            background-color: #16a085;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px 0 0 5px;

        }

        .wrapper form .pass {
            margin: -6px 0 20px 0;
        }

        .wrapper form .pass a {
            color: #16a085;
            font-size: 17px;
            font-weight: 600;
            text-decoration: none;
        }

        .wrapper form .pass a:hover {

            text-decoration: underline;
        }

        .wrapper form .button input {
            padding-left: 0;
            font-size: 20px;
            background-color: #16a085;
            border: 1px solid #16a085;
            color: #fff;
            font-weight: bold;
            display: block;
        }

        .wrapper form .button input:hover {
            background: #12876f;
        }

        .wrapper form .Signup {
            text-align: center;
        }

        .wrapper form .Signup a {
            color: #16a085;
            font-size: 17px;
            font-weight: 600;
            text-decoration: none;
        }

        .wrapper form .Signup a:hover {
            text-decoration: underline;
        }
    </style>

<body>
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
            }, 1500)
        }

        function redirect() {
            swal({
                title: "error",
                text: "Please wait for access!",
                icon: "error",
                button: "ok",
                timer: 1000,
            });
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

        function noredirect() {
            swal({
                title: "error",
                text: "Please wait for access!",
                icon: "error",
                button: "ok",
                timer: 3000,
            });

            setTimeout(function() {
                swal({
                    title: "Oh",
                    text: "Please try again!",
                    icon: "warning",
                    button: "ok",
                    timer: 10000,
                });
            }, 4000)
        }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $emailp = $_POST['emailp'];
        $password = $_POST['password'];
        $password = md5($password);
        $insert_user_admin = mysqli_query($con, "SELECT * FROM `admin_user` WHERE `email`='$emailp' AND `password`='$password' and `status`='active'");
        if (mysqli_num_rows($insert_user_admin) == 0) {
            echo '<script>
                        swal({title: "error",text: "User and password not match! or need activate go to forgotten password",icon: "error",button: "ok", timer: 3000,});
                        </script>';
        } else {
            $row_user_admin = mysqli_fetch_assoc($insert_user_admin);
            $cont = $row_user_admin['control'];
            if ($cont == 'full') {
                $_SESSION['full'] = $emailp;
                $_SESSION['half'] = $emailp;
                $_SESSION['id'] = $row_user_admin['id'];

                echo '<script>redirectfull()</script>';
            } else if ($cont == 'half') {
                $_SESSION['half'] = $emailp;
                echo '<script>redirect()</script>';
            } else {
                echo '<script>noredirect()</script>';
            }
        }
    }

    ?>


    <?php
    if (file_exists('../../home/header.php')) {
        require_once '../../home/header.php';
    }
    ?>

    <div class="container">
        <div class="wrapper">
            <div class="title">
                <span>Login form</span>
            </div>
            <form action="" method="post">
                <div class="row">
                    <i class="bi bi-person-fill"></i>
                    <input required type="text" placeholder="Email " value="<?php if (isset($emailp)) {
                                                                                echo $emailp;
                                                                            } ?>" name="emailp" id="username">
                </div>
                <div class="row">
                    <i class="bi bi-lock-fill"></i>
                    <input required type="text" name="password" placeholder="Password" id="password">
                </div>
                <div class="pass"><a href="forget.php">Forgot your password?</a></div>
                <div class="row button">
                    <input type="submit" value="Login" name="submit">

                </div>

                <div class="Signup"> Not a member? <a href="register.php">Signup Now</a></div>
            </form>
        </div>
    </div>
</body>

</html>