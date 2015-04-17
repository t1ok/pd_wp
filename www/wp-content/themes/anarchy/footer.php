<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package direct_action
 */
?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer container" role="contentinfo">
		<div class="site-info col-sm-10">
		<p>Пряма дія - студ профспілка Студентство, прийшов час самоорганізовуватися!</p>
		<?php /*
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'anarchy' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'anarchy' ), 'WordPress' ); ?></a>
		*/ ?>
			<?php /*<span class="sep"> | </span>*/ ?>
			<?php //printf( __( 'Theme: %1$s by %2$s.', 'anarchy' ), 'direct_action', '<a href="http://bigkrp@gmail.com" rel="designer">krp</a>' ); ?>
		</div><!-- .site-info -->
		<div class="f-logo col-sm-2 hidden-xs">
			
		</div>
	</footer><!-- #colophon -->
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/common.js"></script>
<?php wp_footer(); ?>
</body>
</html>
