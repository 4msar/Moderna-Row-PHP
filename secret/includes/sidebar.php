<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
		<?php 
			$uid = $_SESSION['user_id'];
		?>
        <div class="img-box">
                <img class="___user-avatar" src="<?php 
                        if(get_data('users', $uid, 'avator')==null) {
                            echo "assets/images/avatar.png"; 
                        } else{ 
                            if(file_exists('uploads/'.get_data('users', $uid, 'avator'))) {
                                echo "uploads/".get_data('users', $uid, 'avator'); 
                            }else{ 
                                echo "assets/images/avatar.png"; 
                            }
                        } ?>" alt="User Image">
        </div>
        <div>
          <p class="app-sidebar__user-name"><?php echo get_data('users', $uid, 'name'); ?></p>
          <p class="app-sidebar__user-designation"><?php echo '@ '.get_data('users', $uid, 'role');//.$uid; ?></p>
        </div>
      </div>
      <ul class="app-menu">
       
        <li><a class="app-menu__item <?= active_menu(); ?>" href="?dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
		<li><a class="app-menu__item <?= active_menu('list'); ?>" href="?page=list"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">All User </span></a></li>
		<?php if($_SESSION['user_role']=='admin'): ?>
         <li class="treeview"><a class="app-menu__item treeview <?= active_menu('front-end'); ?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Front-End</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?= active_menu('homepage'); ?>" href="?page=front-end&get=homepage"><i class="icon fa fa-leaf"></i> Homepage</a></li>
            
            <li><a class="treeview-item <?= active_menu('slider'); ?>" href="?page=front-end&get=slider"><i class="icon fa fa-diamond"></i> Slider</a></li>
            <li><a class="treeview-item <?= active_menu('blog'); ?>" href="?page=front-end&get=blog"><i class="icon fa fa-rss"></i> Blog</a></li>
            <li><a class="treeview-item <?= active_menu('portfolio'); ?>" href="?page=front-end&get=portfolio"><i class="icon fa fa-star"></i> Projects</a></li>
            <li><a class="treeview-item <?= active_menu('category'); ?>" href="?page=front-end&get=category"><i class="icon fa fa-comment"></i> Categories</a></li>
            <li><a class="treeview-item <?= active_menu('setting'); ?>" href="?page=front-end&get=setting"><i class="icon fa fa-cog"></i> Others Setting</a></li>
          </ul>
        </li>
        
        <li><a class="app-menu__item <?= active_menu('settings'); ?>" href="?page=settings"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label"> Setting </span></a></li>
        <?php endif; ?>

      </ul>
    </aside>