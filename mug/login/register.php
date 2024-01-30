<?php require_once "../../conection/index.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>ttcm short link powered by dengrweb.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css"> -->
    <script type="text/javascript" src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/vendor/jquery/jquery.min.js"></script>
    <link rel="icon" href="/image/sde.jpg">

    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('/image/breadcumb.jpg') fixed top left;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 150px 0;
        }


        form {
            max-height: 520px;
            max-width: 400px;
            min-width: 250px;
            background-color: rgba(255, 255, 255, 0.13);

            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
            background: #16a085;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #000;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            color: #eee;
        }

        form a {
            color: #eee;
        }

        form a:hover {
            color: blue;
        }

        label {

            font-weight: 500;
            background-color: black;
        }


        button {
            margin-top: 20px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .status {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 11;
        }
    </style>
</head>

<body>
    <script src="/assets/vendor/sweetalert/sweetalert.js"></script>
    <script type="text/javascript">
        function success() {
            swal({
                title: "success",
                text: "Please wait just a moment!",
                icon: "success",
                button: "ok",
                timer: 3000,
            });
            setTimeout(function() {
                let val=document.querySelector('#email_address').value;
                 window.location.href = 'checkpoint.php?checkpoint='+val;
                
                // console.log(val);
            }, 1500)
        }

        function agree() {
            swal({
                title: "error",
                text: "Please press agree button!",
                icon: "error",
                button: "ok",
                timer: 1000,
            });

        }


        function password() {
            swal({
                title: "error",
                text: "Password not match!",
                icon: "error",
                button: "ok",
                timer: 1000,
            });

        }


        function user() {
            swal({
                title: "error",
                text: "User Already Exists!",
                icon: "error",
                button: "ok",
                timer: 1000,
            });

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
    if (file_exists('../../home/header.php')) {
        require_once '../../home/header.php';
    }
    ?>
    <div class="status">
        <!-- RESPONSE BY AJAX  -->
    </div>

    <form id="signup_user" method="post">
        <h3>Register Here</h3>
        <div class="input-group mb-3">
            <label for="name" class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                </svg></label>
            <input required type="text" class="form-control" placeholder="Enter your name " name="name" id="name">
        </div>



        <div class="input-group mb-3">
            <label for="username" class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                    <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                    <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                </svg></label>
            <input required type="email" id="email_address" class="form-control" placeholder="Email " value="<?php if (isset($emailp)) {
                                                                                                echo $emailp;
                                                                                            } ?>" name="email" id="username">
        </div>

        <div class="input-group mb-3">
            <label for="password" class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg></label>
            <input required type="text" class="form-control" name="password" placeholder="Password" id="password">
        </div>

        <div class="input-group mb-3">
            <label for="repassword" class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg></label>
            <input required type="text" class="form-control" name="c_password" placeholder="Password" id="repassword">
        </div>
        <!-- need extra input for insert -->
        <input hidden type="checkbox" checked name="agree">
        <input hidden type="text" name="user_type" value="admin@gmail.com">
        <input hidden type="text" name="phone" value="013">
        <input hidden type="text" name="description" value="i am a valueable person">
        <input hidden type="text" name="control" value="half">
        <!-- end need input extra feture -->

        <button type="submit" name="submit" value="Submit">Sign Up</button>
        <br>
        <br>
        <br>
        <a href="../login/">Already have account loging here ?</a>
    </form>
</body>

</html>

<script type="text/javascript">
    $('#signup_user').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/mug/admin/insert_admin.php',
            processData: false,
            contentType: false,
            data: new FormData(this),

            success: function(data) {
                $('.status').html(data);
                let getdata = $('.status h3').html().replaceAll(" ", "");
                if (getdata == 'PressAgreebuttonthentry') {
                    agree();
                } else if (getdata == 'AdminCreatesuccessfull!') {
                    success();
                } else if (getdata == 'Passwordnotmatch!') {
                    password();
                } else if (getdata == 'UserAleradyExists!') {
                    user();
                } else {
                    alert(getdata);
                }
                //load_link();
            }
        })
    })
</script>