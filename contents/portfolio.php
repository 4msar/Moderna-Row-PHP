		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="portfolio-categ filter">
							<li class="all active"><a href="#">All</a></li>
							<?php  $aa = "SELECT * FROM category WHERE cat_type='portfolio'";
				        		$q = mysqli_query($con, $aa);
				        		if(mysqli_num_rows($q) > 0){ 
				            	while ($cat = mysqli_fetch_assoc($q)) {
				            ?>
							<li class="<?= $cat['cat_id']; ?>"><a href="#" title=""><?= $cat['cat_name']; ?></a></li>
							<?php } } ?>
						</ul>
						<div class="clearfix">
						</div>
						<div class="row">
							<section id="projects">
								<ul id="thumbs" class="portfolio">
							<?php 
                            $sql = "SELECT * FROM posts WHERE post_type='portfolio' ORDER BY id DESC LIMIT 4";
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
