<?php
/**
* The template for displaying the footer
*
* Contains the closing of the main div and all content after
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>
</div> <!-- End Main -->
</div> <!-- End page -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container copyright">
			<div class="sixteen columns footer-table">
				<div class="footer-cell text-center">
					<strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></strong>
 &copy; <?php echo ' ' . date('Y'); ?>
<?php
	$privacy_link = esc_url( get_theme_mod( 'FCN_privacy_link' ) );	
	if ( ! empty( $privacy_link) ) { ?>
		<span class="sep"> | </span> <a id="privacy-policy-link" href="<?php echo esc_url($privacy_link); ?>">Privacy Policy</a>
	<?php	
	}
?>
<span class="sep"> | </span> 
<?php wp_loginout(); ?>
</div><!-- End footer cell -->
		</div>	<!-- End sixteen columns -->
		</div> <!-- End site info -->
	</footer> <!-- End footer -->
<?php wp_footer(); ?>
</body>
</html>