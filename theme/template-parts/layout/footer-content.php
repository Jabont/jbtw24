<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JBTW24
 */

?>
<footer id="main_footer" class=" text-white bg-stone-800 mt-20">
<div class="jb-container">
	Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos numquam velit molestias optio adipisci similique qui rerum explicabo aliquid iure dolore, cupiditate mollitia quod maiores cum rem nesciunt fuga architecto.
</div>	
</footer>
<footer id="colophon" class=" text-white bg-stone-900">
<div class="jb-container py-4">

	<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
		<nav aria-label="<?php esc_attr_e( 'Footer Menu', 'jbtw24' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_class'     => 'footer-menu',
					'depth'          => 1,
				)
			);
			?>
		</nav>
	<?php endif; ?>

	<div>
		<?php
		$jbtw24_blog_info = get_bloginfo( 'name' );
		if ( ! empty( $jbtw24_blog_info ) ) :
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php
		endif;
		?>
	</div>
	</div>
</footer><!-- #colophon -->
