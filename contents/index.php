		<section id="featured">
		    <?php
		      //  global $con;
                // $sql = "SELECT * FROM settings WHERE id=1";
                // $result = mysqli_query($con, $sql);
                // if($result){
                //     $data = mysqli_fetch_assoc($result);
                //     var_dump($data);
                // }else{
                //     echo mysqli_error($con);
                // }
		    ?> 
			<!-- start slider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<!-- Slider -->
						<div id="main-slider" class="flexslider">
							<ul class="slides">
							<?php 
								$sql = "SELECT * FROM posts WHERE post_type='home_slider'";
	            				$result = mysqli_query($con, $sql);
	            				while ($data=mysqli_fetch_assoc($result)) {
							?>
								<li>
									<img src="uploads/<?= $data['image']; ?>" alt="" />
									<div class="flex-caption">
										<h3><?= $data['title']; ?></h3>
										<p><?= $data['details']; ?></p>
										<!-- <a href="#" class="btn btn-theme">Learn More</a> -->
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>



		</section>
		<section class="callaction">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="big-cta">
							<div class="cta-text">
								<h2><?php echo get_data('settings', 'data_key','ws_hcta', 'data_value'); ?></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							<?php 
                            $sql = "SELECT * FROM posts WHERE post_type='home_service' AND status=1 ORDER BY id DESC LIMIT 4";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            
                                while($data = mysqli_fetch_assoc($result)) { ?>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="box">
									<div class="box-gray aligncenter">
										<h4><?php echo $data['title']; ?></h4>
										<div class="icon">
											<i class="fa <?= $data['image']; ?> fa-3x"></i>
										</div>
										<p>
											<?php echo $data['details']; ?>
										</p>
									</div>
									<div class="box-bottom">
										<a href="#">Learn more</a>
									</div>
								</div>
							</div>
							<?php }} ?>
						</div>
					</div>
				</div>
				<!-- divider -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="solidline">
						</div>
					</div>
				</div>
				<!-- end divider -->
				<!-- Portfolio Projects -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h4 class="heading">Recent Works</h4>
						<div class="row">
							<section id="projects">
								<ul id="thumbs" class="portfolio">
							<?php 
                            $sql = "SELECT * FROM posts NATURAL JOIN category WHERE post_type='portfolio' ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            
                                while($data = mysqli_fetch_assoc($result)) { ?>
									<!-- Item Project and Filter Name -->
									<li class="item-thumbs col-lg-3 col-md-3 col-sm-6 design" data-id="id-<?= $data['cat_id']; ?>" data-type="<?= $data['cat_id']; ?>">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?= $data['title']; ?>" href="uploads/<?= $data['image']; ?>">
											<span class="overlay-img"></span>
											<span class="overlay-img-thumb font-icon-plus"></span>
										</a>
										<!-- Thumb Image and Description -->
										<img src="uploads/<?= $data['image']; ?>" alt="<?= $data['details']; ?>">
									</li>
									<!-- End Item Project -->
									<?php 
										} }
									 ?>
								</ul>
							</section>
						</div>
					</div>
				</div>

			</div>
		</section>
