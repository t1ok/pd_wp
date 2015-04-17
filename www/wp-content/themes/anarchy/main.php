	<div id="primary" class="content-area col-sm-9">
			<main id="main" class="site-main row" role="main">
				<?php
					$args = array(
						'hide_empty' => 0,//показать пустые категории
						'orderby'	 => 'ID'
					);
					$categories = get_categories($args);
						// echo "<pre>";
						// print_r($categories);
						// echo "</pre>";
				?>
				<?php foreach ($categories as $cat) {?>

				<div class="elem-holder col-lg-12">
					<h2><a href="?cat=<?php echo $cat->cat_ID; ?>"><span><?php echo $cat->name; ?></span><span class="pd-icon"></span></a></h2>
					<?php if ( have_posts() ) : ?>
						<?php $numpost = 4; // количество постов в категории ?>
						<?php query_posts('cat='.$cat->cat_ID.'&showposts='.$numpost); ?>
						<?php $i=0; ?>
						<?php while (have_posts()) : the_post(); ?>
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
					<?php else: ?>
					<?php //wp_reset_query(); ?>

						<?php get_template_part( 'content', 'none' ); ?>
						
					<?php //endif; ?>

				</div>

				<?php }  ?>

		<?php //if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php //while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'content', get_post_format() );
				?>

			<?php //endwhile; ?>

			<?php //the_posts_navigation(); ?>

		<?php //else : ?>

			<?php //get_template_part( 'content', 'none' ); ?>

		<?php //endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->