<div id="primary" class="content-area container">
		<main id="main" class="site-main row" role="main">

		
			
				<div class="col-md-6 elem-holder">
					<h3><a href="?cat=2">Новини</a></h3>
					<?php if ( have_posts() ) : ?>
						<?php query_posts('cat=2'); ?>
						<?php while (have_posts()) : the_post(); ?>

							<article class="elem col-md-6">
								<header>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</header>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="elem-img-wrapper"><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" width="100" height="100" class="img-rounded" /></a>
								<!-- <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" alt="" width="100" height="100" class="img-rounded"> -->
								<div class="post-desc"><?php kama_excerpt('maxchar=152'); ?></div>
								<footer>
									<time><?php echo get_the_time('G:i d-m-Y'); ?></time>
									<a href="<?php the_permalink(); ?>">детальніше</a>
								</footer>
							</article>

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div class="col-md-6 elem-holder">
					<h3><a href="?cat=4">Рух</a></h3>
					<?php if ( have_posts() ) : ?>
						<?php query_posts('cat=4'); ?>
						<?php while (have_posts()) : the_post(); ?>

							<article class="elem col-md-6">
								<header>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</header>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="elem-img-wrapper"><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" width="100" height="100" class="img-rounded" /></a>
								<!-- <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" alt="" width="100" height="100" class="img-rounded"> -->
								<div class="post-desc"><?php kama_excerpt('maxchar=152'); ?></div>
								<footer>
									<time><?php echo get_the_time('G:i d-m-Y'); ?></time>
									<a href="<?php the_permalink(); ?>">детальніше</a>
								</footer>
							</article>

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div class="col-md-6 elem-holder">
					<h3><a href="?cat=3">Про нас</a></h3>
					<?php if ( have_posts() ) : ?>
						<?php query_posts('cat=3'); ?>
						<?php while (have_posts()) : the_post(); ?>

							<article class="elem col-md-6">
								<header>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</header>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="elem-img-wrapper"><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" width="100" height="100" class="img-rounded" /></a>
								<!-- <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" alt="" width="100" height="100" class="img-rounded"> -->
								<div class="post-desc"><?php kama_excerpt('maxchar=152'); ?></div>
								<footer>
									<time><?php echo get_the_time('G:i d-m-Y'); ?></time>
									<a href="<?php the_permalink(); ?>">детальніше</a>
								</footer>
							</article>

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div class="col-md-6 elem-holder">
					<h3><a href="?cat=5">Історія, теорія</a></h3>
					<?php if ( have_posts() ) : ?>
						<?php query_posts('cat=5'); ?>
						<?php while (have_posts()) : the_post(); ?>

							<article class="elem col-md-6">
								<header>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</header>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="elem-img-wrapper"><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" width="100" height="100" class="img-rounded" /></a>
								<!-- <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" alt="" width="100" height="100" class="img-rounded"> -->
								<div class="post-desc"><?php kama_excerpt('maxchar=152'); ?></div>
								<footer>
									<time><?php echo get_the_time('G:i d-m-Y'); ?></time>
									<a href="<?php the_permalink(); ?>">детальніше</a>
								</footer>
							</article>

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>










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