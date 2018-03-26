<?php 

    // Call Functions File
    if(file_exists('functions/function.php')){
        require_once('functions/function.php');
    }

        
    // Call Necessary functions
    get_header();
    // view the specific page 
    
    if(isset($_GET['page'])){
        get_breadcrumb();
        $view = $_GET['page'];
        switch ($view) {
            case $view:
                if(file_exists('contents/'.$view.'.php')){
                    require_once('contents/'.$view.'.php');
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
        if(file_exists('contents/index.php')){
            require_once('contents/index.php');
        }
    }
    
    // Call the footer 
    get_footer();

require_once('includes/footer.php'); ?>
    