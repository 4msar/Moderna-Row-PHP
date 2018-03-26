<?php

if(isset($_GET['page']) && isset($_GET['get'])){
    $view = $_GET['get'];
    switch ($view) {
        case $view:
            if(file_exists('contents/front-data/'.$view.'.php')){
                require_once('contents/front-data/'.$view.'.php');
            }else{
                if(file_exists('contents/_404.php')){
                    require_once('contents/_404.php');
                }
            }
        break;

        default:
            if(file_exists('contents/_404.php')){
                require_once('contents/_404.php');
            }
        break;
    }
}
// if it is the main page or $view was null
else{
    if(file_exists('contents/front-data/homepage.php')){
        require_once('contents/front-data/homepage.php');
    }
}

 ?>
