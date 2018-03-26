		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="widget">
							<h5 class="widgetheading">Get in touch with us</h5>
							<address>
					<strong><?php echo  get_data('settings', 'data_key','ws_name', 'data_value'); ?></strong><br>
					 <?php echo  get_data('settings', 'data_key','ws_address', 'data_value'); ?></address>
							<p>
								<i class="icon-phone"></i> <?php echo  get_data('settings', 'data_key','ws_phone', 'data_value'); ?> <br>
								<i class="icon-envelope-alt"></i> <?php echo  get_data('settings', 'data_key','ws_email', 'data_value'); ?>
							</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="widget">
							<h5 class="widgetheading">Pages</h5>
							<ul class="link-list">
								<li><a href="?home">Home</a></li>
							
								<li><a href="?page=portfolio">Portfolio</a></li>
								<li><a href="?page=blog">Blog</a></li>
								<li><a href="?page=contact">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="widget">
							<h5 class="widgetheading">Latest posts</h5>
							<ul class="link-list">
								<?php 
									// start blog posts 
									global $con;
									$sql = "SELECT * FROM posts WHERE post_type='blog_post' ORDER BY id DESC LIMIT 3";
									$q = mysqli_query($con, $sql);
									while ($data = mysqli_fetch_assoc($q)) {
								?>
								<li><a href="?page=blog&post=<?= $data['slug']; ?>"><?= $data['title']; ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div> 
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="widget">
							<h5 class="widgetheading">Flickr photostream</h5>
							<div class="flickr_badge">
							    <?php $flickr_id = get_data('settings', 'data_key','ws_flickr', 'data_value'); ?>
								<script type="text/javascript" src="https://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickr_id!=null ? $flickr_id : '147688899@N03'; ?>"></script>
							</div>
							<div class="clear">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="solidline"></div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="copyright">
								<p>&copy; <?php echo  get_data('settings', 'data_key','ws_name', 'data_value'); ?></p>
								<div class="credits">
									<?php echo  get_data('settings', 'data_key','ws_footer_credit', 'data_value'); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="social-network">
								<li><a href="<?php echo  get_data('settings', 'data_key','ws_sl_fb', 'data_value'); ?>" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo  get_data('settings', 'data_key','ws_sl_tt', 'data_value'); ?>" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo  get_data('settings', 'data_key','ws_sl_lin', 'data_value'); ?>" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="<?php echo  get_data('settings', 'data_key','ws_sl_pin', 'data_value'); ?>" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="<?php echo  get_data('settings', 'data_key','ws_sl_gp', 'data_value'); ?>" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.fancybox.pack.js"></script>
	<script src="assets/js/jquery.fancybox-media.js"></script>
	<script src="assets/js/google-code-prettify/prettify.js"></script>
	<script src="assets/js/portfolio/jquery.quicksand.js"></script>
	<script src="assets/js/portfolio/setting.js"></script>
	<script src="assets/js/jquery.flexslider.js"></script>
	<script src="assets/js/animate.js"></script>
	<script src="assets/js/custom.js"></script>
    <!-- Contact page JS -->
    <?php 
    $api = get_data('settings', 'data_key','ws_gmap_api', 'data_value');
    if(isset($_GET['page']) && $_GET['page']=='contact'){ ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api!=null ? $api : 'AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY'; ?>"></script>
    <script>
		jQuery(document).ready(function($) {
			//Google Map
			var get_latitude = $('#google-map').data('latitude');
			var get_longitude = $('#google-map').data('longitude');

			function initialize_google_map() {
				var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
				var mapOptions = {
					zoom: 14,
					scrollwheel: false,
					center: myLatlng
				};
				var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize_google_map);
		});
	</script>
    <!-- <script src="assets/contactform/contactform.js"></script> -->
    <?php } ?>
</body>

</html>
