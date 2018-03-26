<?php

/*
*
*     Add and Update User 
*
*/


$nameErr = $emailErr = $phnErr = $unErr = $pwdErr = $msg = "";
$name = $email = $phn = $username = $pwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
    
        if (empty($_POST["name"])) {
            flash_msg( 'nameErr', "* Name is required", 'danger', 'form-msg');
        } else {
            $name = $_POST["name"];
            flash_msg( 'nameErr');
        }
        
        if (empty($_POST["phone"])) {
            flash_msg( 'phnErr', "* Phone is required", 'danger', 'form-msg');
        } else {
            $phn = $_POST["phone"];
            flash_msg( 'phnErr');
        }
        
        if (empty($_POST["email"])) {
            flash_msg( 'emailErr', "* email is required", 'danger', 'form-msg');
        } else {
            $email = $_POST["email"];
            flash_msg( 'emailErr');
        }
        
        if (empty($_POST["username"])) {
            flash_msg( 'unErr', "* UserName is required", 'danger', 'form-msg');
        } else {
            $username = $_POST["username"];
            flash_msg( 'unErr');
        }
        
        if (empty($_POST["pwd"])) {
            flash_msg( 'pwdErr', "* Password Can't be Null", 'danger', 'form-msg');
        } else {
            $pwd = md5($_POST["pwd"]);
            flash_msg( 'pwdErr');
        }
        
        if($_POST["pwd"]!=$_POST["re-pwd"]){
            flash_msg( 're-pwdErr', "* Password disn't match", 'danger', 'form-msg');
        }else {
            flash_msg( 're-pwdErr');
        }
        
        $query = mysqli_query($con, 'SELECT id FROM users');
        if(mysqli_num_rows($query) > 0){
            $role = 'user';
        }else{
            $role = 'admin';
        }
        
        if($_POST['name']!=null && $_POST['phone']!=null && $_POST["email"]!=null && $_POST["username"]!=null && $_POST["pwd"]!=null && $_POST["pwd"]==$_POST["re-pwd"]){
            
            if(isset($_FILES['avator'])){
                $imgName = 'user-'.time().'-'.rand(1000,100000).'.'.pathinfo($_FILES['avator']['name'],PATHINFO_EXTENSION);
            }else{
                $imgName='';
            }
            
            if($_POST['submit']=='Register'){
                $insert = "INSERT INTO users(name,phone, email, username, password, role,avator, created_at) 
                VALUES('$name','$phn','$email','$username','$pwd','$role','$imgName',NOW())";
                
                if(mysqli_query($con, $insert)){
                    
                    move_uploaded_file($_FILES['avator']['tmp_name'], 'uploads/'.$imgName);
                    
                    $msg = 'Data Added Successfully...! Add New.';
                    flash_msg( 'msg', $msg, 'success' );
                }else{
                    $msg = 'Data Adding Failed, Try Again '.mysqli_error($con);
                    flash_msg( 'msg', $msg, 'danger' );
                }
            }
        }
        
//        UPDATE USER INFO
        
        $id = (!empty($_POST['edit_id']) ? $_POST['edit_id'] : '');
        if($_SESSION['user_role']=='admin' || $_SESSION['user_id']==$id){
            if($_POST['submit']=='Update'){
                if($_SESSION['user_role']=='admin'){
                    if (empty($_POST["role"])) {
                        $role = 'user';
                    } else {
                        $role  = $_POST["role"];
                    }
                }
                
                $image=$_FILES['avator'];
                if(isset($image['name'])){
                    $imageName='user-'.time().'-'.rand(10000,100000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
                }
                $i = ( $image['error'] > 0 ? get_data('users', $id, 'avator') :$imageName);
                
                if($_SESSION['user_id']==$id){
                    if (empty($_POST["pwd"])) {
                        $update = "UPDATE users SET name='$name', phone='$phn', email='$email', role='$role', avator='$i' WHERE id=$id";
                    } else {
                        $pwd = md5($_POST["pwd"]);
                        $update = "UPDATE users SET name='$name', phone='$phn', email='$email', role='$role' ,password='$pwd', avator='$i' WHERE id=$id";
                    }
                }else{
                    $update = "UPDATE users SET name='$name', phone='$phn', email='$email', role='$role', avator='$i' WHERE id=$id";
                }
                
                
                if(mysqli_query($con, $update)){
                    if(isset($image)){
				        move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
				    }
                    flash_msg( 'msg', 'Data Update Successfully', 'success' );
                }else{
                    flash_msg( 'msg', 'Data Update Failed '.mysqli_error($con), 'danger' );
                }
            }
        }else{
            $msg = "User can't do this. Permission Denied";
            flash_msg( 'msg', $msg, 'danger' );
        }
    }
    
    
    /*
    *
    *     Add and Update Front Page Settings 
    *
    */
    
    if(isset($_POST['ws_submit'])) {
        $data_type = 'site_setting';
        if($_SESSION['user_role']=='admin'){
        
            if (!empty($_POST["ws_name"])) {
                $ws_name = $_POST['ws_name'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_name','$ws_name')";
                $update = "UPDATE settings SET data_value='$ws_name' WHERE data_type='$data_type' AND data_key='ws_name'";
                if(check_exist('settings', 'data_key','ws_name')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }

            if (!empty($_POST["ws_menu"])) {
                $ws_menu = $_POST['ws_menu'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_menu','$ws_menu')";
                $update = "UPDATE settings SET data_value='$ws_menu' WHERE data_type='$data_type' AND data_key='ws_menu'";
                if(check_exist('settings', 'data_key','ws_menu')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }

            if (!empty($_POST["ws_address"])) {
                $ws_address = $_POST['ws_address'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_address','$ws_address')";
                $update = "UPDATE settings SET data_value='$ws_address' WHERE data_type='$data_type' AND data_key='ws_address'";
                if(check_exist('settings', 'data_key','ws_address')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }

            if (!empty($_POST["ws_email"])) {
                $ws_email = $_POST['ws_email'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_email','$ws_email')";
                $update = "UPDATE settings SET data_value='$ws_email' WHERE data_type='$data_type' AND data_key='ws_email'";
                if(check_exist('settings', 'data_key','ws_email')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }

            if (!empty($_POST["ws_phone"])) {
                $ws_phone = $_POST['ws_phone'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_phone','$ws_phone')";
                $update = "UPDATE settings SET data_value='$ws_phone' WHERE data_type='$data_type' AND data_key='ws_phone'";
                if(check_exist('settings', 'data_key','ws_phone')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            
            if (!empty($_POST["ws_skin"])) {
                $ws_skin = $_POST['ws_skin'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_skin','$ws_skin')";
                $update = "UPDATE settings SET data_value='$ws_skin' WHERE data_type='$data_type' AND data_key='ws_skin'";
                if(check_exist('settings', 'data_key','ws_skin')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            
            if (!empty($_POST["ws_footer_credit"])) {
                $ws_footer_credit = $_POST['ws_footer_credit'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_footer_credit','$ws_footer_credit')";
                $update = "UPDATE settings SET data_value='$ws_footer_credit' WHERE data_type='$data_type' AND data_key='ws_footer_credit'";
                if(check_exist('settings', 'data_key','ws_footer_credit')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }

            // SOCIAL LINK 
            
            if (!empty($_POST["ws_sl_fb"])) {
                $ws_sl_fb = $_POST['ws_sl_fb'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_sl_fb','$ws_sl_fb')";
                $update = "UPDATE settings SET data_value='$ws_sl_fb' WHERE data_type='$data_type' AND data_key='ws_sl_fb'";
                if(check_exist('settings', 'data_key','ws_sl_fb')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            if (!empty($_POST["ws_sl_tt"])) {
                $ws_sl_tt = $_POST['ws_sl_tt'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_sl_tt','$ws_sl_tt')";
                $update = "UPDATE settings SET data_value='$ws_sl_tt' WHERE data_type='$data_type' AND data_key='ws_sl_tt'";
                if(check_exist('settings', 'data_key','ws_sl_tt')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            if (!empty($_POST["ws_sl_lin"])) {
                $ws_sl_lin = $_POST['ws_sl_lin'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_sl_lin','$ws_sl_lin')";
                $update = "UPDATE settings SET data_value='$ws_sl_lin' WHERE data_type='$data_type' AND data_key='ws_sl_lin'";
                if(check_exist('settings', 'data_key','ws_sl_lin')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            if (!empty($_POST["ws_sl_pin"])) {
                $ws_sl_pin = $_POST['ws_sl_pin'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_sl_pin','$ws_sl_pin')";
                $update = "UPDATE settings SET data_value='$ws_sl_pin' WHERE data_type='$data_type' AND data_key='ws_sl_pin'";
                if(check_exist('settings', 'data_key','ws_sl_pin')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            if (!empty($_POST["ws_sl_gp"])) {
                $ws_sl_gp = $_POST['ws_sl_gp'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_sl_gp','$ws_sl_gp')";
                $update = "UPDATE settings SET data_value='$ws_sl_gp' WHERE data_type='$data_type' AND data_key='ws_sl_gp'";
                if(check_exist('settings', 'data_key','ws_sl_gp')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            

        flash_msg( 'msg', 'Data Update Successfully', 'success' );
        }//end check is admin if
        else{
            flash_msg( 'msg', 'You have not permission to do this', 'danger' );
        }
    }// WS End

    // Add Service
    if(isset($_POST['add_service'])) {
        $data_type = 'home_service';
        if($_SESSION['user_role']=='admin'){
        
            
            $title = $_POST['title'];
            $details = $_POST['details'];
            $status = $_POST['status'];
            $img = $_POST['image'];

            $insert = "INSERT INTO posts(title,post_type,details, status, image) 
                VALUES('$title', '$data_type','$details', '$status','$img')";
            if (mysqli_query($con, $insert)) {
                flash_msg( 'msg', 'Data Update Successfully', 'success' );
            }else{
                flash_msg( 'msg', 'Error found '.mysqli_error($con), 'danger' );
            }
        }else{
            flash_msg( 'msg', 'You have not permission to do this', 'danger' );
        }
    }



    if(isset($_POST['ws_content'])) {
        $data_type = 'site_content';
        if($_SESSION['user_role']=='admin'){
        
            if (!empty($_POST["ws_hcta"])) {
                $ws_hcta = $_POST['ws_hcta'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_hcta','$ws_hcta')";
                $update = "UPDATE settings SET data_value='$ws_hcta' WHERE data_type='$data_type' AND data_key='ws_hcta'";
                if(check_exist('settings', 'data_key','ws_hcta')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            
            if (!empty($_POST["ws_flickr"])) {
                $ws_flickr = $_POST['ws_flickr'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_flickr','$ws_flickr')";
                $update = "UPDATE settings SET data_value='$ws_flickr' WHERE data_type='$data_type' AND data_key='ws_flickr'";
                if(check_exist('settings', 'data_key','ws_flickr')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            
            if (!empty($_POST["ws_gmap_api"])) {
                $ws_gmap_api = $_POST['ws_gmap_api'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_gmap_api','$ws_gmap_api')";
                $update = "UPDATE settings SET data_value='$ws_gmap_api' WHERE data_type='$data_type' AND data_key='ws_gmap_api'";
                if(check_exist('settings', 'data_key','ws_gmap_api')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }

            if (!empty($_POST["ws_c_lat"])) {
                $ws_c_lat = $_POST['ws_c_lat'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_c_lat','$ws_c_lat')";
                $update = "UPDATE settings SET data_value='$ws_c_lat' WHERE data_type='$data_type' AND data_key='ws_c_lat'";
                if(check_exist('settings', 'data_key','ws_c_lat')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            if (!empty($_POST["ws_c_lng"])) {
                $ws_c_lng = $_POST['ws_c_lng'];
                $insert = "INSERT INTO settings(data_type,data_key,data_value) 
                    VALUES('$data_type', 'ws_c_lng','$ws_c_lng')";
                $update = "UPDATE settings SET data_value='$ws_c_lng' WHERE data_type='$data_type' AND data_key='ws_c_lng'";
                if(check_exist('settings', 'data_key','ws_c_lng')==true){
                    mysqli_query($con, $update);
                }else{
                    mysqli_query($con, $insert);
                }
            }
            
        flash_msg( 'msg', 'Data Update Successfully', 'success' );
        }//end check is admin if
        else{
            flash_msg( 'msg', 'You have not permission to do this', 'danger' );
        }
    }

    // Add Slider and slider item
    if(isset($_POST['add_slider'])) {
        $data_type = 'home_slider';
        if($_SESSION['user_role']=='admin'){
        
            
            $title = $_POST['title'];
            $details = $_POST['details'];
            $status = 1;
            $image=$_FILES['image'];
            if(isset($image['name'])){
                $imageName='slider-'.time().'-'.rand(10000,100000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
            }

            $insert = "INSERT INTO posts(title,post_type,details, status, image, created_at) 
                VALUES('$title', '$data_type','$details', '$status','$imageName',NOW())";
            if (mysqli_query($con, $insert)) {
                if(isset($image)){
                    move_uploaded_file($image['tmp_name'],'../uploads/'.$imageName);
                }
                flash_msg( 'msg', 'Data Update Successfully', 'success' );
            }else{
                flash_msg( 'msg', 'Error found '.mysqli_error($con), 'danger' );
            }
        }else{
            flash_msg( 'msg', 'You have not permission to do this', 'danger' );
        }
    }

    // Add Blog post
    if(isset($_POST['add_post'])) {
        $data_type = 'blog_post';
        if($_SESSION['user_role']=='admin'){
            
            $title = $_POST['title'];
            $slug = create_slug($title);
            $details = $_POST['details'];
            $status = $_POST['status'];
            $cat = $_POST['category'];
            $image=$_FILES['image'];
            if(isset($image['name'])){
                $imageName='post-'.time().'-'.rand(10000,100000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
            }
            $insert = "INSERT INTO posts(title,post_type, slug,cat_id,details, status, image, created_at) 
                VALUES('$title', '$data_type', '$slug', '$cat','$details', '$status','$imageName',NOW())";
            if (mysqli_query($con, $insert)) {
                if(isset($image)){
                    move_uploaded_file($image['tmp_name'],'../uploads/'.$imageName);
                }
                flash_msg( 'msg', 'Data Update Successfully', 'success' );
            }else{
                flash_msg( 'msg', 'Error found '.mysqli_error($con), 'danger' );
            }
        }else{
            flash_msg( 'msg', 'You have not permission to do this', 'danger' );
        }
    }



    // Add Project
    if(isset($_POST['add_portfolio'])) {
        $data_type = 'portfolio';
        if($_SESSION['user_role']=='admin'){
            
            $title = $_POST['title'];
            $slug = create_slug($title);
            $details = $_POST['details'];
            $status = $_POST['status'];
            $cat = $_POST['category'];
            $image=$_FILES['image'];
            if(isset($image['name'])){
                $imageName='post-'.time().'-'.rand(10000,100000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
            }
            $insert = "INSERT INTO posts(title,post_type, slug,cat_id,details, status, image, created_at) 
                VALUES('$title', '$data_type', '$slug', '$cat','$details', '$status','$imageName',NOW())";
            if (mysqli_query($con, $insert)) {
                if(isset($image)){
                    move_uploaded_file($image['tmp_name'],'../uploads/'.$imageName);
                }
                flash_msg( 'msg', 'Data Update Successfully', 'success' );
            }else{
                flash_msg( 'msg', 'Error found '.mysqli_error($con), 'danger' );
            }
        }else{
            flash_msg( 'msg', 'You have not permission to do this', 'danger' );
        }
    }


} //  POST Request methode end
