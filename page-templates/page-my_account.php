<?php 
// Template Name: Moje konto

get_header(); ?>

<main id="primary" class="site-main">
	<div class="container-lg page-container-sn">
		<h1>Moje konto</h1>
		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
	</div>
</main><!-- #main -->

<?php get_footer(); ?>