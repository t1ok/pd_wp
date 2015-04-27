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
							<?php $havePost = false; ?>
							<?php if ( have_posts() ) : ?>
								<?php $havePost = true; ?>

									<?php
										$numpost = 4;// количество постов в категории
										// query_posts('cat='.$cat->cat_ID.'&showposts='.$numpost);
										$secondary_query = new WP_Query('cat='.$cat->cat_ID.'&showposts='.$numpost);
										$i=0;
										while ($secondary_query->have_posts()) : $secondary_query->the_post(); ?>
										<?php $i+=1; ?>
											<?php if ($i === 1) : ?>
												<div class="elem-holder col-lg-12">
													<h2><a href="?cat=<?php echo $cat->cat_ID; ?>"><span><?php echo $cat->name; ?></span><span class="pd-icon"></span></a></h2>
											<?php endif; ?>

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
												if ($i == 2) {
													echo "<div class='divider'></div>";
												}
											?>
											<?php if ($i===$numpost) : ?>
												</div>
											<?php endif; ?>
									<?php endwhile; ?>
							<?php endif; ?>

						<?php }  ?>
						
					<?php if (!$havePost): ?>
					<?php wp_reset_query(); ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>



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
