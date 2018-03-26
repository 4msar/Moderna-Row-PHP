<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['contact'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sub = $_POST['subject'];
        $msg = $_POST['message'];

        $message = '<h2>'.$name.'</h2>';
        $message .= $msg;
        // $msg = wordwrap($msg,70);

        $admin_mail = get_data('settings', 'data_key','ws_email', 'data_value');
        $to = ($admin_mail!=null ? $admin_mail : '120msar@gmail.com');
        
        // send email
        if (mail($to,$sub,$message)) {
        	return true;
        }
    }
    
}
?>