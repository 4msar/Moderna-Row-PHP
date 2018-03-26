<?php 

if(file_exists('../includes/config.php')){
    require_once ('../includes/config.php');
}

if(isset($_POST['add_post_cat'])) {
	$name = $_POST['name'];
	if($name!=''){
		$insert = "INSERT INTO category(cat_name,cat_type) 
		    VALUES('$name', 'blog_post')";
		$chk = mysqli_query($con, 'SELECT * FROM category WHERE cat_type="blog_post"');
		if (mysqli_query($con, $insert)) {

			if(mysqli_num_rows($chk) > 0){
				$data = "<option value='".mysqli_insert_id($con)."'>".$name."</option>";
				echo $data;
			}else{
			    $data = "<select name='category' class='form-control'>";
			    $data .= "<option value='".mysqli_insert_id($con)."'>".$name."</option>";
			    $data .= "</select>";
			    echo $data;
			}
		}else{
		    echo 'Error';
		}
	}
	
}

// Portfolio Category

if(isset($_POST['add_portfolio_cat'])) {
	$name = $_POST['name'];
	if($name!=''){
		$insert = "INSERT INTO category(cat_name,cat_type) 
		    VALUES('$name', 'portfolio')";
		$chk = mysqli_query($con, 'SELECT * FROM category WHERE cat_type="portfolio"');
		if (mysqli_query($con, $insert)) {

			if(mysqli_num_rows($chk) > 0){
				$data = "<option value='".mysqli_insert_id($con)."'>".$name."</option>";
				echo $data;
			}else{
			    $data = "<select name='category' class='form-control'>";
			    $data .= "<option value='".mysqli_insert_id($con)."'>".$name."</option>";
			    $data .= "</select>";
			    echo $data;
			}
		}else{
		    echo 'Error';
		}
	}
	
}