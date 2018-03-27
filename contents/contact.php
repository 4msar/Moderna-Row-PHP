<?php 

$success = $msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['contact'])) {

    	
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sub = $_POST['subject'].' - '.APP_NAME;
        $msg = $_POST['message'];

        $message = '<h2>'.$name.'</h2>';
        $message .= '<h4>'.$email.'</h4>';
        $message .= $msg;
        // $msg = wordwrap($msg,70);
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

        $admin_mail = get_data('settings', 'data_key','ws_email', 'data_value');
        $to = ($admin_mail!=null ? $admin_mail : '120msar@gmail.com');
        
        if($name!=null && $email!=null && $msg!=null){
            // send email
            if (mail($to,$sub,$message, $headers)) {
            	$success = 'true';
            }else{
            	$msg = 'true';
            }
        }else{
            $msg = 'true';
        }
    }
    
}
?>

<?php 

$lat = get_data('settings', 'data_key','ws_c_lat', 'data_value');
$lng = get_data('settings', 'data_key','ws_c_lng', 'data_value');
// echo $lat.'-'.$lng;
?>
		<section id="content">
			<div class="map">
				<div id="google-map" data-latitude="<?php echo $lat!=null ? $lat : "23.7524558"; ?>" data-longitude="<?php echo $lng!=null ? $lng : "90.3864777"; ?>"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h4>Get in touch with us by filling <strong>contact form below</strong></h4>
						<?php if ($success=='true'): ?>
							<div style="display: block" id="sendmessage">Your message has been sent. Thank you!</div>
						<?php endif ?>
						<?php if ($msg=='true'): ?>
						    <div style="<?php echo $msg=='true' ? "display: block" : 'display: none'; ?>" id="errormessage">Please Enter Your Name, Email & Message.</div>
						<?php endif; ?>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
							</div>

							<div class="text-center"><button name="contact" type="submit" class="btn btn-theme">Send Message</button></div>
						</form>
					</div>
				</div>
			</div>
		</section>
		
