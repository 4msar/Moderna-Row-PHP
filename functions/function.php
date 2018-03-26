<?php 
if(file_exists('includes/config.php')){
    require_once ('includes/config.php');
}

function get_header()
{
    global $con;
    if(file_exists('includes/header.php')){
        require_once ('includes/header.php');
    }
}

function get_breadcrumb()
{
    if(file_exists('includes/breadcrumb.php')){
        require_once ('includes/breadcrumb.php');
    }
}


function get_title($title=''){
    $view = (!empty($_GET['page']) ? $_GET['page'] : 'Homepage');
    $title = ucfirst($view);
    switch ($view) {
        case 'blog':
            $title = 'Blog';
        break;
            
        case 'portfolio':
            $title = 'Portfolio';
        break;
        
        case 'contact':
            $title = 'Contact';
        break;
            
        default:
            $title = 'Homepage';
    }

    return ucfirst($title);
}

function dashboard(){
    include_once ('contents/index.php');
}

function get_footer()
{
    if(file_exists('includes/footer.php')){
        require_once ('includes/footer.php');
    }
}

function get_data($table, $key='', $id='', $col=''){
    global $con;
    $sql = "SELECT * FROM $table WHERE $key='$id'";
    $result = mysqli_query($con, $sql);
    if($result){
        $data = mysqli_fetch_assoc($result);
        if($col!=''){
            return $data[$col];
        }
    }else{
        return false;//mysqli_error($con);
    }
}

function active_menu($page=''){
    if(isset($_GET['page'])){
        if($_GET['page']==$page){
            return 'active';
        }
    }
    if(!isset($_GET['page']) && $page==''){
        return 'active';
    }
}


function count_data($table='', $where='', $value=''){
    global $con;
    if($table!=null && $where==''){
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($con, $sql);
        return mysqli_num_rows($result);
    }
    if($table!=null && $where!=null){
        $sql = "SELECT * FROM $table WHERE $where='$value'";
        $result = mysqli_query($con, $sql);
        return mysqli_num_rows($result);
    } 
}