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
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'anarchy' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'anarchy' ), 'WordPress' ); ?></a>
			<?php /*<span class="sep"> | </span>*/ ?>
			<?php //printf( __( 'Theme: %1$s by %2$s.', 'anarchy' ), 'direct_action', '<a href="http://bigkrp@gmail.com" rel="designer">krp</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/common.js"></script>
<?php wp_footer(); ?>
</body>
</html>
