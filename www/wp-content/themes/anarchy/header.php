<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package direct_action
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="bootstrap/css/bootstrap.min.css?1" rel="stylesheet">
<link href="css/commons.css?1" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'anarchy' ); ?></a>


	
	<header class="header container" role="banner">
	<div class="row text-center head-bg">
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="homes">
				<?php bloginfo( 'name' ); ?>
				<img src="<?php bloginfo('template_url'); ?>/images/head2.jpg" alt="<?php bloginfo( 'name' ); ?>" class="img-responsive" />
			</a>
		</h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div>
	</header>
	<nav class="navbar" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" data-toggle="collapse"><?php bloginfo( 'name' ); ?></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-bar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<?php
				$args = array(
					'hide_empty' => 0,//показать пустые категории
					'orderby'	 => 'ID'
				);
				$categories = get_categories($args);
				$pages = get_pages();
			?>
			<div id="nav-bar" class="collapse navbar-collapse">
				<?php
					if ($categories) {
						// echo "<pre>";
						// print_r($categories);
						// echo "</pre>";
						$list = "<ul class=\"nav navbar-nav\">";
						foreach ($categories as $cat) {
							if ($cat->name == "Без рубрики") {
								continue;
							}
							$each_cat = $cat->cat_ID!=6 ? $cat->cat_ID : "";//НЕ ВЫВОДИМ "Библиотеку"
							$list .= "<li class=\"" . $cat->slug . "\"><a href=\"?cat=". $each_cat ."\"><span>" . $cat->name . "</span></a></li>";	
						}
						if (!$pages) {
							$list .= "</ul>";
						}
					}
					if ($pages) {
						// echo "<pre>";
						// print_r($pages);
						// echo "</pre>";
						foreach ($pages as $page) {
							// echo $get_page_link($page->ID)."<br/>";
							$list .= "<li class=\"".$page->post_name."\"><a href=\"#\"><span>".$page->post_title."</span></a></li>";	
							// echo $page->post_title."<br/>";
						}
						$list .= "</ul>";
					}
					echo $list;
					// wp_list_categories( $args );
				?>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	

	<?php /*
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'anarchy' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	*/ ?>

	<div id="content" class="site-content">
