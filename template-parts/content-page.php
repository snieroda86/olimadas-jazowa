<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header pt-5 pb-4">
		<?php the_title( '<h1 class="page-section-h2">', '</h1>' ); ?>
	</header><!-- .entry-head -->

	<div class="entry-content pb-3 pb-lg-5">
		<?php
		the_content();

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
