<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package direct_action
 */

get_header(); ?>

	<div id="primary" class="content-area container col-sm-9">
		<main id="main" class="site-main row" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					// the_archive_title( '<h2 class="page-title">', '</h2>' );
				?>
				<h2 class="page-title"><?php single_term_title(); ?></h2>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php $numpost = 4; // количество постов в категории ?>
			<?php $i=0; ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'category', get_post_format() );
				?>
				<?php $i+=1; ?>
				<article class="elem col-md-6">
					<header>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</header>
					<?php if (catch_that_image()){ ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="elem-img-wrapper">
						<img src="<?php echo catch_that_image(); ?>" alt="" width="140" height="auto" class="img-rounded" />
					</a>
					<?php } ?>
					<div class="post-desc"><?php kama_excerpt('maxchar=152'); ?></div>
					<footer>
						<a href="<?php the_permalink(); ?>"><span class="glyphicon glyphicon-link"></span>до публікації</a>
						<a href="<?php the_permalink(); ?>#comments"><span class='glyphicon glyphicon-comment'></span> <?php comments_number('0 коментарів', '1 коментар', '% коментарів'); ?></a>
						<time><span class='glyphicon glyphicon-calendar'></span> <?php echo get_the_time('d-m-Y'); ?></time>
					</footer>
				</article>
				<?php
					if ($i == 2 || $i == 4) {
						echo "<div class='divider'></div>";
					}
				?>
			<?php endwhile; ?>

			<?php //the_posts_navigation(); ?>
			<div class="wp-pagenavi col-xs-12"><?php if (function_exists('wp_corenavi')) wp_corenavi(); ?></div>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
