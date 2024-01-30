<?php

    include('../../config.php');
    include ROOT_PATH.'mug/partials/master.php';
    $master = new master();
    
    $title = '';
    $meta = '';
    $data ='';
    echo $master->complete($data);



   exit();

  