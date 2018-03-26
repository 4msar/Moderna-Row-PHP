<?php 
if(file_exists('../includes/config.php')){
    require_once ('../includes/config.php');
}

function get_header()
{
    if(file_exists('includes/header.php')){
        require_once ('includes/header.php');
    }
}

function get_title($title=''){
    $view = (!empty($_GET['page']) ? $_GET['page'] : 'Dashboard');
    $title = ucfirst($view);
    
    if($view=='list'){
        $title = 'All Users';
    }
    if($view=='add'){
        $title = 'Add User';
    }
    if($view=='edit'){
        $title = 'Edit User';
    }
    if($view=='view'){
        $title = 'View User';
    }

    return $title;
}

function get_sidebar()
{
	if(file_exists('includes/sidebar.php')){
        require_once ('includes/sidebar.php');
    }
}

function get_bread()
{
    if(file_exists('includes/bread.php')){
        require_once ('includes/bread.php');
    }
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

function get_data($table, $id='', $col=''){
    global $con;
    $sql = "SELECT * FROM $table WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    if($col!=''){
        return $data[$col];
    }
}
function get_s_data($table, $key='', $id='', $col=''){
    global $con;
    $sql = "SELECT * FROM $table WHERE $key='$id'";
    $result = mysqli_query($con, $sql);
    if($result){
        $data = mysqli_fetch_assoc($result);
        if($col!=''){
            return $data[$col];
        }
    }else{
        return mysqli_error($con);
    }
}
//Ensure that a session exists (just in case)

function flash_msg( $name = '', $message = '', $class = 'success', $type='alert'){
    //We can only do something if the name isn't empty
    if( !empty( $name ) ){
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$name] ) ){
            if( !empty( $_SESSION[$name] ) ){
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) ){
                unset( $_SESSION[$name.'_class'] );
            }
            if( !empty( $_SESSION[$name.'_type'] ) ){
                unset( $_SESSION[$name.'_type'] );
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
            $_SESSION[$name.'_type'] = $type;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$name] ) && empty( $message ) ){
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            $type = !empty( $_SESSION[$name.'_type'] ) ? $_SESSION[$name.'_type'] : 'alert';
            
            if($type!='alert'){
                echo $_SESSION[$name];
            }else{
                echo '<div class=" alert alert-'.$class.'" >'.$_SESSION[$name].'</div>'; //<span class="alert-close">x</span>
            }
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}



function check_exist($table, $key='',  $value=''){
    global $con;
    $sql = "SELECT * FROM $table WHERE $key='$value'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}


function active_menu($page=''){
    if(isset($_GET['page'])){
        if($_GET['page']==$page){
            return 'active';
        }
    }
    if(isset($_GET['get'])){
        if($_GET['get']==$page){
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

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return strtolower($slug);
}


