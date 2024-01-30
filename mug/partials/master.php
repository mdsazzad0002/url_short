<?php 
    require_once ROOT_PATH.'mug/partials/session.php';
    require_once ROOT_PATH.'conection/index.php';
    class master{
    function __construct() {
            define('main', 420);
    }



    function complete($data) {
        echo $con = new connection();

         $header = include(ROOT_PATH.'mug/partials/header.php');
         $footer = include(ROOT_PATH.'mug/partials/footer.php');
        // return $ff.'lkjl'.$g;
        echo $header.$footer;
        
    }
}