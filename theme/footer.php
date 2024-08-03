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
<?php get_template_part( 'template-parts/layout/footer', 'content' ); ?>
</div><!-- #footer -->
</div><!-- #page-container -->
<?php wp_footer(); ?>

</body>
</html>
