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
	                        	<h4 class="pb-2"><?php _e('Dog information' , 'web14devsn'); ?></h4>
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
	                    <!-- Siblings-->
	                    <div class="card mb-4">
	                        <div class="card-header"><?php _e('Siblings' , 'web14devsn'); ?></div>
	                        <div class="card-body">
	                            <?php $siblings = getDogSiblings( get_the_ID() , get_field('ojciec_sire') , get_field('matka_dam') ); ?>
	                            <?php if ( $siblings): ?>
	                            	<ul class="list-unstyled mb-0">
	                        			<?php foreach( $siblings as $sibling ): ?>
	                                   		<li style="border-bottom: 1px solid #eee;" class="pb-2 mb-3">
	                                   			<a class="color-gold text-uppercase" href="<?php the_permalink( $sibling->ID ); ?>">
	                                   				<strong><?php echo $sibling->post_title; ?></strong>
	                                   			</a>
	                                   			<div class="d-flex">
	                                   				<span class="pr-2"><?php _e('Born date:' , 'web14devsn'); ?></span>
	                                   				<span><?php the_field('data_urodzenia' , $sibling->ID ); ?></span>
	                                   			</div>
	                                   
	                                   			
	                                   		</li>
	                               		<?php endforeach; ?>
	                                </ul>
	                            <?php endif ?>
	                        </div>
	                    </div>

	                    <!-- Titles -->
	                    <div class="card mb-4">
	                        <div class="card-header"><?php _e('Titles' , 'web14devsn'); ?></div>
	                        <div class="card-body">
	                            <?php 
	                            	if(get_field('tytuly')){ ?>
	                            		<p><?php the_field('tytuly'); ?></p>
	                            	<?php }else{
	                            		echo 'No titles to show';
	                            	}
	                            ?>
	                        </div>
	                    </div>

	                   
	                   
	                </div>
	            </div>

	            <!-- Pedigree table -->
	            <div class="row">
	            	<div class="col-12">
	            		<!-- Sire -->
	            		<div class="pedigree-table">
	            			<?php 

	            			// Variables
	            			$c_parent_url = get_permalink(89);
	            			?>

	                    	<table class="table-bordered">
	                    		<tr>
	                    			<!-- col 1 -->
	                    			<td>
	                    				<div class="dog-cell dog-cell-1">
	                    					<!-- Sire 1 -->

	                    					<?php 
	                    						$sire_1 = get_field('ojciec_sire');
	                    						if($sire_1){
	                    							$get_sire_1 = getDogByTitleSN($sire_1);
	                    							if ( $get_sire_1->have_posts() ) {
														
														$dog = $get_sire_1->posts[0];
														$permalink = get_permalink($dog->ID);
														$sire_1_id = $dog->ID;
														$dog_color = get_post_meta( $sire_1_id , 'dog_color' , true);
														echo '<div class="dog-cell-inner" style="background:'.$dog_color.'">';
														echo '<div class="dog-cell-card">';
														echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
														echo '</div>';
														echo '</div>';
														
													}
	                    						}else{ ?>
	                    							<div class="undefined-cell-inner">
	                    								<p class="undefined-label">Undefined</p>
	                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo get_the_ID(); ?>&sex=male"><?php _e('Create sire'); ?></a>	
	                    							</div>
	                    						<?php }
	                    					?>
	                    				</div>
	                    			</td>
	                    			<!-- col 2 -->
	                    			<td>
	                    				<div class="dog-cell dog-cell-2">
	                    					<!-- 2.1 -->
	                    					<?php 
	                    					if( isset($sire_1_id) ){
	                    						$sire_2_1 = get_field('ojciec_sire' , $sire_1_id);
	                    						if($sire_2_1){
	                    							$get_sire_2_1 = getDogByTitleSN($sire_2_1);
	                    							if ( $get_sire_2_1->have_posts() ) {
														
														$dog = $get_sire_2_1->posts[0];
														$permalink = get_permalink($dog->ID);
														$sire_2_1_id = $dog->ID;
														$dog_color = get_post_meta( $sire_2_1_id , 'dog_color' , true);
														echo '<div class="dog-cell-inner" style="background:'.$dog_color.'">';
														echo '<div class="dog-cell-card">';
														echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
														echo '</div>';
														echo '</div>';
														
													}else{ ?>
														<div class="undefined-cell-inner">
		                    								<p class="undefined-label">Undefined</p>
		                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
		                    							</div>
													<?php }
	                    						}else{ ?>
	                    							<div class="undefined-cell-inner">
	                    								<p class="undefined-label">Undefined</p>
	                    								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
	                    							</div>
	                    							
	                    						<?php }
	                    					}else{
	                    						echo '<div class="undefined-q-mark">';
	                    						echo '<p>Undefined</p>';
	                    						echo '</div>';
	                    					}
	            
	                    					?>
	                    				</div>
	                    				<div class="dog-cell dog-cell-2">
	                    					<!-- 2.2 -->
	                    					<?php 
	                    					if( isset($sire_1_id) ){
	                    						$dam_2_1 = get_field('matka_dam' , $sire_1_id);
	                    						if($dam_2_1){
	                    							$get_dam_2_1 = getDogByTitleSN($dam_2_1);
	                    							if ( $get_dam_2_1->have_posts() ) {
														
														$dog = $get_dam_2_1->posts[0];
														$permalink = get_permalink($dog->ID);
														$dam_2_1 = $dog->ID;
														$dog_color = get_post_meta( $dam_2_1 , 'dog_color' , true);
														echo '<div class="dog-cell-inner" style="background:'.$dog_color.'">';
														echo '<div class="dog-cell-card">';
														echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
														echo '</div>';
														echo '</div>';
														
													}else{ ?>
														<div class="undefined-cell-inner">
		                    								<p class="undefined-label">Undefined</p>
		                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
		                    							</div>
													<?php }
	                    						}else{ ?>
	                    							<div class="undefined-cell-inner">
	                    								<p class="undefined-label">Undefined</p>
	                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
	                    							</div>
	                    							
	                    						<?php }
	                    					}else{
	                    						echo '<div class="undefined-q-mark">';
	                    						echo '<p>Undefined</p>';
	                    						echo '</div>';
	                    					}
	            
	                    					?>
	                    				</div>
	                    			</td>
	                    			<!-- col 3 -->
	                    			<td>
	                    				<div class="dog-cell dog-cell-3">
	                    					<!-- 3.1 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-3">
	                    					<!-- 3.2 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-3">
	                    					<!-- 3.3 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-3">
	                    					<!-- 3.4 -->
	                    				</div>
	                    			</td>
	                    			<!-- col 4 -->
	                    			<td>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.1 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.2 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.3 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.4 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.5 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.6 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.7 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-4">
	                    					<!-- 4.8 -->
	                    				</div>
	                    			</td>
	                    			<!-- col 5 -->
	                    			<td>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.1 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.2 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.3 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.4 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.5 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.6 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.7 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.8 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.9 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.10 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.11 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.12 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.13 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.14 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.15 -->
	                    				</div>
	                    				<div class="dog-cell dog-cell-5">
	                    					<!-- 5.16 -->
	                    				</div>
	                    			</td>
	                    		</tr>
	                    	</table>
                    	
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
