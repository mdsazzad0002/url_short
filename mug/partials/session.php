<?php
ini_set('session.cookie_samesite', 'None');
session_set_cookie_params(['samesite' => 'None']);

if (!session_id()) {
     session_start();
}
if (!isset($_SESSION['full'])) {
     if (!isset($_SESSION['half'])) {

          $url = $_SERVER['PHP_SELF'];
          $url = explode('/', $url);
          if ($url[2] != 'login') {
               echo "<script>console.log('We are not found session_id')</script>";
               echo "<script>window.location.href='../login/'</script>";
               exit();
               session_start();
          }
     }
}
// who user inserted data
$user_type = '';
if (isset($_SESSION['full'])) {
     $user_type = $_SESSION['full'];
} else if (isset($_SESSION['half'])) {
     $user_type = $_SESSION['half'];
} else {
     echo "<script>console.log('Oh shit please contacts developer')</script>";
}
