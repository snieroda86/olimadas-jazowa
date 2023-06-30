<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-lg">
			<!-- breadcrumbs -->
			<div class="row">
				<div class="col-12">
					<div class="breadcrumbs-container-sn">
				       <?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
						?>	
					</div>
				</div>
			</div>
			<!-- Post content -->
			<div class="row">
				<div class="col-lg-8">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content');

					endwhile; // End of the loop.
					?>
					<section>
						 <!-- Related posts area -->
				        <div class="sp-related-area pt-5">
				            <h2 class="section-title-sn">
				                    <?php _e('Polecamy' , 'web14devsn'); ?>
				            </h2>

				            <div class="sp-related-container">
				                <!-- post slider -->
				                <?php $getFeaturedToSlider = getRelatedSingleSlider(); ?>
				                <?php if($getFeaturedToSlider->have_posts()): ?>
				                    <div class="featured-post-slider-home">
				                        <?php while( $getFeaturedToSlider->have_posts() ) : $getFeaturedToSlider->the_post(); ?>
				                            <div><?php get_template_part('post-templates/content-slider'); ?></div>
				                        <?php endwhile; ?>
				                        <?php wp_reset_postdata(); ?>
				                    </div>
				                <?php endif; ?>
				                <!-- End post slider -->

				                <!-- Featured post grid -->
				                <div class="featured-post-grid-sn pt-3">
				                    <?php $getFeaturedGrid = getSingleRelatedGrid(); ?>
				                    <?php if ($getFeaturedGrid->have_posts()) { ?>
				                        <div class="row">
				                            <?php 
				                            while ( $getFeaturedGrid->have_posts() ) : $getFeaturedGrid->the_post(); ?> 
				                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
				                                    <?php get_template_part('post-templates/content'); ?>
				                                </div>
				                            <?php endwhile;

				                            wp_reset_postdata(); 
				                             ?>
				                        </div>
				                    <?php } ?>
				                    
				                </div>
				                <!-- More featured post button -->
				                <?php 
				                $categories = get_the_category();
												if ( ! empty( $categories ) ) { ?>
													<div class="text-center">
					                    <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="btn-main-sn">
					                        <span><?php _e('Więcej', 'web14devsn'); ?></span>       
					                    </a>
					                </div>
												<?php } ?>
				                
				            </div>
				        </div>
				        <!-- End related -->
					</section>
				</div>
				<div class="col-lg-4 mt-5 mt-lg-0">
					<div id="sidebar-sn">
						<?php get_sidebar(); ?>
					</div>
				</div>

			</div>
		</div>

	</main><!-- #main -->

	<script type="text/javascript">
    jQuery(document).ready(function($) {
      // Post slider
      $('.featured-post-slider-home').slick({
        slidesToShow : 1 ,
        autoplay: false ,
        arrows: false ,
        dots: true
      }); 
    })
    
</script>

<?php
get_footer();
