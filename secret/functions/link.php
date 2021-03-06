<?php

// All action link 
if(isset($_GET['action'])){

    // Delete user
    if($_SESSION['user_role']=='admin'){
        if($_GET['action']=='delete_u' && $_GET['id']!=null ){
            $id = $_GET['id'];
            //deleting the row from table
            $img = get_s_data('users', 'id', $id, 'avator');
            if (file_exists('uploads/'.$img)) {
                unlink('uploads/'.$img);
            }
            $result = mysqli_query($con, "DELETE FROM users WHERE id=$id");
            
            if ($result) {
                $msg = "Record deleted successfully";
                flash_msg( 'msg', $msg, 'warning' );
                
            } else {
                $msg = "Error deleting record: " . mysqli_error($con);
                flash_msg( 'msg', $msg, 'danger' );
            }
        }
        if ($_GET['action']=='delete_p' && $_GET['did']!=null) {
            $id = $_GET['did'];
            //deleting the row from table
            $img = get_s_data('posts', 'id', $id, 'image');
            if (file_exists('../uploads/'.$img)) {
                unlink('../uploads/'.$img);
            }
            $result = mysqli_query($con, "DELETE FROM posts WHERE id=$id");
            
            if ($result) {
                $msg = "Record deleted successfully";
                flash_msg( 'msg', $msg, 'warning' );
                
            } else {
                $msg = "Error deleting record: " . mysqli_error($con);
                flash_msg( 'msg', $msg, 'danger' );
            }
        }
        if($_GET['action']=='delete_c' && $_GET['cid']!=null ){
            $id = $_GET['cid'];
            $result = mysqli_query($con, "DELETE FROM category WHERE cat_id=$id");
            
            if ($result) {
                $msg = "Record deleted successfully";
                flash_msg( 'msg', $msg, 'warning' );
                
            } else {
                $msg = "Error deleting record: " . mysqli_error($con);
                flash_msg( 'msg', $msg, 'danger' );
            }
        }
        // end 
    }else{
        $msg = "User can't do this.";
        flash_msg( 'msg', $msg, 'danger' );
    }
    
    // LogOut link
    if($_GET['action']=='logout'){
    	session_start(); /* Starts the session */
    	session_destroy(); /* Destroy started session */
    	if(isset($_COOKIE['user_logged_in'])){
    	    setcookie("user_logged_in", "", time() - 3600, '/');
    	    setcookie('user_loggedin_name', '', time() - 3600, '/');
    	    setcookie('user_role', '', time() - 3600, '/');
    	}
    	header("location:login.php");
    	exit;
    }
}

// Redirection link 
if(isset($_GET['u']) && $_GET['u']!=null){
    $link = $_GET['u'];
    if(isset($_GET['id'])){
        header("Location: index.php?page=".$link."&id=".$_GET['id']."");
    }elseif(isset($_GET['get'])){
        header("Location: index.php?page=".$link."&get=".$_GET['get']."");
    }
    else{
        header("Location: index.php?page=$link");
    }
    flash_msg( 'r-msg' ,$msg, 'warning');
}

if(isset($_GET['page'])){
    if($_GET['page']=='view' || $_GET['page']=='edit'){
        if(!isset($_GET['id']) && $_GET['id']==null){
            header('Location: index.php?page=list');
        }
    }
}