<?php 

if(file_exists('includes/auth.php')){
    include_once ('includes/auth.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Register</title>
    <link rel="shortcut icon" type="image/png" href="/favicon.png">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/main.css" rel="stylesheet" type="text/css">
</head>
<body style="background: #eee;"> <!--272833-->
	<div class="container">
	    <div class="row">
		  <div class="mainbox col-md-6 offset-md-3 col-sm-8 offset-sm-2" id="signupbox" >
			<div class="card border-primary mt-10 mb-10">
				<div class="card-header">
					<h4>Sign Up</h4>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="signupform"  method="post" name="signupform" role="form" onsubmit="return formCheck()">
						<div >
						<?php if($reg_err!=null && $msg!=''){ ?>
    					<div class="alert alert-danger col-sm-12" id="login-alert" ><?php echo $msg; ?></div>
    					<?php } ?>
						</div>
						<div class="form-group">
                            <label for="" class="col-sm-3 control-label">Name </label>
                            <div class="col-sm-8">
                              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full Name"><span class="err" id="name-err"><?php echo $nameErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" id="email" name='email' class="form-control" placeholder="Enter your Email">
                              <span class="err" id="email-err"><?php echo $emailErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-8">
                              <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter your Phone Number">
                              <span class="err" id="phn-err"><?php echo $phnErr; ?></span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">UserName</label>
                            <div class="col-sm-8">
                              <input type="text" id="username" name="username" class="form-control" placeholder="Enter a Username">
                              <span class="err" id="un-err"><?php echo $unErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                              <input type="password" id="pass" name="pwd" class="form-control" placeholder="Enter Password">
                              <span class="err" id="pwd-err"><?php echo $pwdErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                              <input type="password" id="re-pass" name="re-pwd" class="form-control" placeholder="Enter Password Again">
                              <span class="err" id="re-pwd-err"><?php echo $re_pwdErr; ?></span>
                            </div>
                          </div>
                          
						<div class="form-group">
							<label class="col-md-3 control-label" for="icode">Invitation Code</label>
							<div class="col-md-9">
								<input class="form-control" name="icode" placeholder="" type="text">
							</div>
						</div>
						<div class="form-group">
							<!-- Button -->
							<div class="col-md-offset-3 col-md-9">
								<input type="submit" name="submit" class="btn btn-sm btn-primary" value="SignUp"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript">
	</script> 
	<script src="assets/js/bootstrap.min.js" type="text/javascript">
	</script> 
	<script src="assets/js/custom.js" type="text/javascript">
	</script>

</body>
</html>