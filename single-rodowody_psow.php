<?php
/**
 * The template for displaying single dog business card
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php  get_template_part( 'template-parts/page', 'header' ); ?>
		<!-- <div class="container-lg"> -->
        <!-- Page content-->
        <div class="container pt-4">
        	<?php
			while ( have_posts() ) : the_post(); ?>

				<div class="row">
	                <!-- Blog entries-->
	                <div class="col-lg-7">
	                    <!-- Featured blog post-->
	                    <div class="card mb-4">	                        
	                        <div class="card-body">
	                        	<div class="pb-4">
	                        		<?php if ( has_post_thumbnail() ) : ?>
								      <?php the_post_thumbnail('large' , ['class' => 'img-fluid']); ?> 
								  	<?php else: ?>
								  		<img class="img-fluid m-auto" src="<?php echo PATH_SN ?>/uploads/no_photo.jpg" alt="<?php the_title(); ?>" />
								  	<?php endif; ?> 
	                        	</div>
	                            <!-- Table info-->
	                            <table class="table table table-bordered table-dog-info">
	                            	<tr>
	                            		<th><?php _e('Name' , 'web14devsn'); ?></th>
	                            		<td><?php the_title(); ?></td>
	                            	</tr>
	                            	<tr>
	                            		<th><?php _e('Sex' , 'web14devsn'); ?></th>
	                            		<td><?php the_field('plec_psa'); ?></td>
	                            	</tr>
	                            	<tr>
	                            		<th><?php _e('Breeder' , 'web14devsn'); ?></th>
	                            		<td><?php the_field('hodowca'); ?> ( <?php the_field('breeder_country'); ?> )</td>
	                            	</tr>
	                            	<tr>
	                            		<th><?php _e('Owner' , 'web14devsn'); ?></th>
	                            		<td><?php the_field('wlasciciel'); ?> ( <?php the_field('owner_country'); ?> )</td>
	                            	</tr>
	                            	<tr>
	                            		<th><?php _e('SIRE' , 'web14devsn'); ?></th>
	                            		<td><?php the_field('ojciec_sire'); ?></td>
	                            	</tr>
	                            	<tr>
	                            		<th><?php _e('DAM' , 'web14devsn'); ?></th>
	                            		<td><?php the_field('matka_dam'); ?></td>
	                            	</tr>
	                            	<tr>
	                            		<th><?php _e('Born date' , 'web14devsn'); ?></th>
	                            		<td><?php the_field('data_urodzenia'); ?></td>
	                            	</tr>
	                            </table>
	                            <!-- Table info end -->
	                        </div>
	                    </div>
	                   
	                </div>
	                <!-- Side widgets-->
	                <div class="col-lg-5">
	                    <!-- Search widget-->
	                    <div class="card mb-4">
	                    	 <?php $offspring = getDogOffspring( get_the_title() , get_field('plec_psa') ); ?>
	                        <div class="card-header"><?php _e('Offspring' , 'web14devsn'); ?> (<?php echo count($offspring); ?>)</div>
	                        <div class="card-body">
	                        	<?php if(count($offspring) > 0): ?>
	                        		<ul class="list-unstyled mb-0">
	                        			<?php foreach( $offspring as $child ): ?>
	                                   		<li style="border-bottom: 1px solid #eee;" class="pb-2 mb-3">
	                                   			<a class="color-gold text-uppercase" href="<?php the_permalink( $child->ID ); ?>">
	                                   				<strong><?php echo $child->post_title; ?></strong>
	                                   			</a>
	                                   			<div class="d-flex">
	                                   				<span class="pr-2"><?php _e('Born date:' , 'web14devsn'); ?></span>
	                                   				<span><?php the_field('data_urodzenia' , $child->ID ); ?></span>
	                                   			</div>
	                                   			<div class="d-flex">
	                                   				<?php 
	                                   				$current_dog_gender = get_field('plec_psa' , get_the_ID());
	                                   				?>
	                                   				<?php if($current_dog_gender == 'male'): ?>
	                                   					<span class="pr-2"><?php _e('DAM:' , 'web14devsn'); ?></span>
	                                   					<span><?php the_field('matka_dam' , $child->ID ); ?></span>
	                                   				<?php else: ?>
	                                   					<span class="pr-2"><?php _e('SIRE:' , 'web14devsn'); ?></span>
	                                   					<span><?php the_field('ojciec_sire' , $child->ID ); ?></span>
	                                   				<?php endif; ?>
	                                   				
	                                   			</div>
	                                   			
	                                   		</li>
	                               		<?php endforeach; ?>
	                                </ul>
	                        	<?php endif; ?>
	                          
	                           <?php 
	                           // echo '<pre>';
	                           // print_r($offspring);
	                           // echo '</pre>';
	                           ?>

	                        </div>
	                    </div>
	                    <!-- Categories widget-->
	                    <div class="card mb-4">
	                        <div class="card-header"><?php _e('Siblings' , 'web14devsn'); ?></div>
	                        <div class="card-body">
	                            <div class="row">
	                                <div class="col-sm-6">
	                                    <ul class="list-unstyled mb-0">
	                                        <li><a href="#!">Web Design</a></li>
	                                        <li><a href="#!">HTML</a></li>
	                                        <li><a href="#!">Freebies</a></li>
	                                    </ul>
	                                </div>
	                                <div class="col-sm-6">
	                                    <ul class="list-unstyled mb-0">
	                                        <li><a href="#!">JavaScript</a></li>
	                                        <li><a href="#!">CSS</a></li>
	                                        <li><a href="#!">Tutorials</a></li>
	                                    </ul>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                   
	                </div>
	            </div>

			<?php endwhile; ?>
           
        </div>
		<!-- </div> -->

	</main><!-- #main -->

	<script type="text/javascript">
    jQuery(document).ready(function($) {
     
    })
    
</script>

<?php
get_footer();
