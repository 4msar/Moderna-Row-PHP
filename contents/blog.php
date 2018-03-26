		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php 
						if (isset($_GET['post'])) {
							if ($_GET['post']!=null) { 
							$slug = $_GET['post'];
							$sql = "SELECT * FROM posts NATURAL JOIN category WHERE slug='$slug'";
							$q = mysqli_query($con, $sql);
							$post = mysqli_fetch_assoc($q)
							?>
							<article id="post-">
									<div class="post-image">
										<div class="post-heading">
											<h3><a href="?page=blog&post=<?= $post['slug']; ?>"><?= $post['title']; ?></a></h3>
										</div>
										<img src="uploads/<?= $post['image']; ?>" alt="<?= $post['title']; ?>" class="img-responsive">
									</div>

								<div class="entry-summary">
									<?= $post['details']; ?>
								</div>
								<div class="bottom-article">
									<ul class="meta-post">
										<li><i class="fa fa-calendar"></i><?php 
									$date = strtotime( $post['created_at'] );
									echo date('l j M Y h:i A', $date); ?></li>
									<li><i class="icon-folder-open fa fa-folder"></i> <?= $post['cat_name']; ?></li>
									</ul>
								</div>
							</article>
							<?php } }else{
						?>
						<?php 
							// start blog posts 
							$sql = "SELECT * FROM posts NATURAL JOIN category WHERE post_type='blog_post' ORDER BY id DESC LIMIT 20";
							$q = mysqli_query($con, $sql);
							while ($data = mysqli_fetch_assoc($q)) {
						?>
						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3><a href="?page=blog&post=<?= $data['slug']; ?>"><?= $data['title']; ?></a></h3>
								</div>
								<img src="uploads/<?php echo file_exists('uploads/'.$data['image']) ? $data['image'] : 'no-img.jpg'; ?>" alt="" />
							</div>
							<p>
								<?php echo substr($data['details'], 0, 200).'...'; ?>
							</p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="icon-calendar fa fa-clock-o"></i><a href="#"> <?php 
									$date = strtotime( $data['created_at'] );
									echo date('l j M Y h:i A', $date); ?></a></li>
									<li><i class="icon-user fa fa-user"></i><a href="#"> Admin</a></li>
									<li><i class="icon-folder-open fa fa-folder"></i><a href="#"> <?= $data['cat_name']; ?></a></li>
								</ul>
								<a href="?page=blog&post=<?= $data['slug']; ?>" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
						</article>
						<?php } ?>
						
						<div id="pagination">
							<span class="all">Page 1 of 3</span>
							<span class="current">1</span>
							<a href="#" class="inactive">2</a>
							<a href="#" class="inactive">3</a>
						</div>
						<?php } ?>
					</div>
					<div class="col-lg-4">
						<aside class="right-sidebar">
							<div class="widget">
								<form class="form-search">
									<input class="form-control" type="text" placeholder="Search..">
								</form>
							</div>
							<div class="widget">
								<h5 class="widgetheading">Categories</h5>
								<ul class="cat">
									<?php 
									$c_sql = "SELECT * FROM category WHERE cat_type='blog_post'";
									$res = mysqli_query($con, $c_sql);
									while ($cat = mysqli_fetch_assoc($res)) {
									?>
									<li><i class="icon-angle-right"></i><a href="#"><?php echo $cat['cat_name']; ?></a><span> [<?php echo count_data('posts', 'cat_id', $cat['cat_id']) ?>]</span></li>
									<?php } ?>
								</ul>
							</div>
							<div class="widget">
								<h5 class="widgetheading">Latest posts</h5>
								<ul class="recent">
									<?php 
										$sql = "SELECT * FROM posts WHERE post_type='blog_post' ORDER BY id DESC LIMIT 3";
										$q = mysqli_query($con, $sql);
										while ($recent = mysqli_fetch_assoc($q)) {
									?>
									<li>
										<img src="uploads/<?php echo file_exists('uploads/'.$recent['image']) ? $recent['image'] : 'no-img.jpg'; ?>" class="pull-left" alt="" />
										<h6><a href="?page=blog&post=<?= $recent['slug']; ?>"><?php echo strip_tags($recent['title']); ?></a></h6>
										<p>
											<?php echo strip_tags(substr($recent['details'], 0, 50)); ?>
										</p>
									</li><br>
									<?php } ?>
								</ul>
							</div>
							<!-- <div class="widget">
								<h5 class="widgetheading">Popular tags</h5>
								<ul class="tags">
									<li><a href="#">Web design</a></li>
									<li><a href="#">Trends</a></li>
									<li><a href="#">Technology</a></li>
									<li><a href="#">Internet</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Development</a></li>
								</ul>
							</div> -->
						</aside>
					</div>
				</div>
			</div>
		</section>