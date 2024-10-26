<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nice_blog
 */

?>
	</div><!-- #content -->
<!-- Footer Menu -->
	<nav id="site-navigation" class="footer-navigation niche-blog-navigation-menu">
			<div class="container">

				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer_menu',
	    			'container' 	 => false,
					'menu_id'        => 'footer-menu',
					'menu_class'     => 'nav-menu',
				) );
				?>
			</div><!-- .container -->
		</nav><!-- #site-navigation -->

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div id="footer-widgets" class="container">
				<?php
					get_template_part( 'inc/footer', 'widgets' );
				?>
			</div><!-- .container -->
		<?php endif; ?>

		<div class="site-info">
			<div class="footer-container">
				<?php
				$copyright_text = sprintf( __( 'Niche Blog WordPress Theme by %s', 'niche-blog' ), '<a target="_blank" rel="developer" href="'.esc_url( 'https://fahimm.com/' ).'">'. esc_html__( 'Fahim Murshed', 'niche-blog' ). '</a>' ); ?>

				<?php echo $copyright_text; ?>
			</div><!-- .container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<a href="#page" aria-label="to-top" class="to-top"></a>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
