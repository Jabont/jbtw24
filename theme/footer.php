<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JBTW24
 */

?>

</div><!-- #content -->
</div><!-- #page -->

<div id="footer">
	<?php get_template_part('template-parts/layout/footer', 'content'); ?>
</div><!-- #footer -->
</div><!-- #page-container -->
<?php wp_footer(); ?>
<?php if (get_edit_post_link()) : ?>
	<footer class="admin-footer">
		<?php
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Edit <span class="sr-only">%s</span>', 'jbtw24'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		?>
	</footer><!-- .entry-footer -->
<?php endif; ?>
</body>

</html>