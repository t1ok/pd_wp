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


	
	<header class="main-header container" role="banner">
		<div class="text-center head-logo clearfix">
			<div class="rot-front left visible-md visible-lg"></div>
			<div class="title-wrapper">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="homes">
						<?php bloginfo( 'name' ); ?>
						<span class="main-logo hidden-xs"></span>
					</a>
				</h1>				
			</div>
			<div class="rot-front right visible-md visible-lg"></div>
			<?php /*<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>*/ ?>
		</div>
		<nav class="navbar row" role="navigation">
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
				<ul class="nav navbar-nav">
					<li>
						<a href="/" class="pd_link"><span>Головна</span><span class="pd-icon"></span></a>
					</li>
				<?php
					if ($categories) {
						// echo "<pre>";
						// print_r($categories);
						// echo "</pre>";
						$list = "";
						foreach ($categories as $cat) {
							if ($cat->name == "Без рубрики") {
								continue;
							}
							$list .= "<li class=\"" . $cat->slug . "\"><a href=\"?cat=". $cat->cat_ID ."\" class=\"pd_link\"><span>" . $cat->name . "</span><span class=\"pd-icon\"></span></a></li>";	
						}
					}
					if ($pages) {
						// echo "<pre>";
						// print_r($pages);
						// echo "</pre>";
						foreach ($pages as $page) {
							// echo $get_page_link($page->ID)."<br/>";
							$list .= "<li class=\"".$page->post_name."\"><a href=\"#\" class=\"pd_link\"><span>".$page->post_title."</span><span class=\"pd-icon\"></span></a></li>";	
							// echo $page->post_title."<br/>";
						}
						$list .= "";
					}
					echo $list;
					// wp_list_categories( $args );
				?>
					<li class="search">
					<!-- <form role="search" method="get" id="searchform" class="searchform" action="Адрес вашего сайта">
					<input type="text" value="" name="s" id="s">
					<input type="submit" id="searchsubmit" value="Поиск">
					</form> -->
						<aside class="widget widget_search" id="search-1">
							<form action="http://pd_wp/" id="searchform" class="search-form" method="get" role="search">
								<!-- <label> -->
									<span class="screen-reader-text">Найти:</span>
									<input type="search" title="Найти:" name="s" id="s" value="" placeholder="Пошук…" class="search-field">
								<!-- </label> -->
								<input type="submit" id="searchsubmit" value="Поиск" class="search-submit">
							</form>
						</aside>
					</li>
				</ul>
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	

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

	<div id="content" class="site-content container">
