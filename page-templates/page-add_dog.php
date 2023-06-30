<?php
/**
 * The template for adding new god
 * Template Name: Dodaj psa
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-lg page-container-sn">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
