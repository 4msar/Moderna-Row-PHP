<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title><?php echo get_title() . ' - '; 
        echo (!empty(APP_NAME) ? APP_NAME : 'Admin Panel'); ?></title>
    <meta charset="utf-8">
	<link href="assets/favicon.ico" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- FA Icon picker  -->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-iconpicker.css">
    <!--    Main Jquery Script -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
  </head>
  <body class="app sidebar-mini rtl <?php 
               if(isset($_GET['page'])){
                   if($_GET['page']=='front-end'){
                       // echo 'sidenav-toggled';
                   }
               }
    ?>">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="?dashboard"><?php echo (!empty(APP_NAME) ? APP_NAME : 'Admin Panel'); ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
         <form action="" method="get">
          <input class="app-search__input" name="_s" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
          </form>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="?page=settings"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="?page=view&id=<?= $_SESSION['user_id']; ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="?action=logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>