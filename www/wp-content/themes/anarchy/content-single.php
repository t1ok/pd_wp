<?php
/**
 * @package direct_action
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php //anarchy_posted_on(); ?>
			<time><?php echo get_the_time('d-m-Y'); ?></time>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="divider"></div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'anarchy' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clearfix">
		<div class="divider"></div>
		<div class="tagcloud">
			<?php the_tags('', ' ', ''); ?>
		</div>
		<div class="divider"></div>
		
		<div class="similar_records">
			<p class="h2">Схожі статті</p>
			<?php
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
				'tag__in' => $tag_ids, // Сортировка происходит по тегам (меткам)
				'orderby'=>rand, // Добавляем условие сортировки рандом (случайный подбор)
				'caller_get_posts'=>1, // Запрещаем повторение ссылок
				'post__not_in' => array($post->ID),
				'showposts'=>5 // Цифра означает количество выводимых записей
				);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {
					echo '<ul class="clearfix">';
				    while ($my_query->have_posts()) {
				        $my_query->the_post();
				    ?>
				        <li class="">
				        	<?php if (catch_that_image()){ ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="elem-img-wrapper">
								<?php echo catch_that_image(); ?>																
							</a>
							<?php } ?>
				        	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				        		<?php the_title(); ?></a>
				        </li>
				    <?php
				    }
				    echo '</ul>';
				}
				wp_reset_query();
				}
			?>
		</div>
		<div class="divider"></div>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
		<?php //anarchy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
