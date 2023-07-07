<?php  
/*
 * Template Name: Utwórz rodzica
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php  get_template_part( 'template-parts/page', 'header' ); ?>
        <div class="container-lg page-container-sn">
        <?php if(is_user_logged_in()): ?>
            
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		<?php else: ?>

			 <div style="min-height: 80vh;max-width: 500px;" class="pt-5 m-auto">
                <div class="alert alert-warning text-center" role="alert">
                  You must be logged in to add a dog
                </div>
                <div class="text-center pt-4">
                    <a href="<?php echo wp_login_url();?>" class="btn-main-sn m-auto"><?php _e('Go to login' , 'Przejdź do logowania'); ?></a>
                </div>
            </div>
            
		<?php endif; ?>


<?php get_footer(); ?>

