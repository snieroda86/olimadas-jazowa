<?php 
// Template Name: Wirtualni rodzice

if( !array_key_exists('sire' , $_GET) && !array_key_exists('dam' , $_GET)){
	wp_redirect(home_url());
	exit();
}

$sire_vp_name = $_GET['sire'];
$dam_vp_name = $_GET['dam'];

get_header(); ?>

<main id="primary" class="site-main">
	<?php  get_template_part( 'template-parts/page', 'header' ); ?>
	<div class="container-lg page-container-sn">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>


		<!-- Sire pedigree -->
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
                						$sire_1 = &$sire_vp_name;
                						if($sire_1){
                							$get_sire_1 = getDogByTitleSN($sire_1);
                							if ( $get_sire_1->have_posts() ) {
												
												$dog = $get_sire_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_1_id = $dog->ID;
												$dog_color = get_post_meta( $sire_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo get_the_ID() ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
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
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-2">
                					<!-- 2.2 -->
                					<?php 
                					if( isset($sire_1_id) ){
                						$dam_2_2 = get_field('matka_dam' , $sire_1_id);
                						if($dam_2_2){
                							$get_dam_2_2 = getDogByTitleSN($dam_2_2);
                							if ( $get_dam_2_2->have_posts() ) {
												
												$dog = $get_dam_2_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_2_2_id = $dog->ID;
												$dog_color = get_post_meta( $dam_2_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                			<!-- col 3 -->
                			<td>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.1 -->
                				    <?php 
                					if( isset($sire_2_1_id) ){
                						$sire_3_1 = get_field('ojciec_sire' , $sire_2_1_id);
                						if($sire_3_1){
                							$get_sire_3_1 = getDogByTitleSN($sire_3_1);
                							if ( $get_sire_3_1->have_posts() ) {
												
												$dog = $get_sire_3_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_3_1_id = $dog->ID;
												$dog_color = get_post_meta( $sire_3_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_2_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_2_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.2 -->

                					<?php 
                					if( isset($sire_2_1_id) ){
                						$dam_3_2 = get_field('matka_dam' , $sire_2_1_id);
                						if($dam_3_2){
                							$get_dam_3_2 = getDogByTitleSN($dam_3_2);
                							if ( $get_dam_3_2->have_posts() ) {
												
												$dog = $get_dam_3_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_3_2_id = $dog->ID;
												$dog_color = get_post_meta( $dam_3_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_2_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_2_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.3 -->
                					<?php 
                					if( isset($dam_2_2_id) ){
                						$sire_3_3 = get_field('ojciec_sire' , $dam_2_2_id);
                						if($sire_3_3){
                							$get_sire_3_3 = getDogByTitleSN($sire_3_3);
                							if ( $get_sire_3_3->have_posts() ) {
												
												$dog = $get_sire_3_3->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_3_3_id = $dog->ID;
												$dog_color = get_post_meta( $sire_3_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_2_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_2_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                					
                				</div>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.4 -->
                					<?php 
                					if( isset($dam_2_2_id) ){
                						$dam_3_4 = get_field('matka_dam' , $dam_2_2_id);
                						if($dam_3_4){
                							$get_dam_3_4 = getDogByTitleSN($dam_3_4);
                							if ( $get_dam_3_4->have_posts() ) {
												
												$dog = $get_dam_3_4->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_3_4_id = $dog->ID;
												$dog_color = get_post_meta( $dam_3_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_2_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_2_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                			<!-- col 4 -->
                			<td>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.1 -->
                					<?php 
                					if( isset($sire_3_1_id) ){
                						$sire_4_1 = get_field('ojciec_sire' , $sire_3_1_id);
                						if($sire_4_1){
                							$get_sire_4_1 = getDogByTitleSN($sire_4_1);
                							if ( $get_sire_4_1->have_posts() ) {
												
												$dog = $get_sire_4_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_1_id = $dog->ID;
												$dog_color = get_post_meta( $sire_4_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.2 -->
                					<?php 
                					if( isset($sire_3_1_id) ){
                						$dam_4_2 = get_field('matka_dam' , $sire_3_1_id);
                						if($dam_4_2){
                							$get_dam_4_2 = getDogByTitleSN($dam_4_2);
                							if ( $get_dam_4_2->have_posts() ) {
												
												$dog = $get_dam_4_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_2_id = $dog->ID;
												$dog_color = get_post_meta( $dam_4_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.3 -->
                					<?php 
                					if( isset($dam_3_2_id) ){
                						$sire_4_3 = get_field('ojciec_sire' , $dam_3_2_id);
                						if($sire_4_3){
                							$get_sire_4_3 = getDogByTitleSN($sire_4_3);
                							if ( $get_sire_4_3->have_posts() ) {
												
												$dog = $get_sire_4_3->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_3_id = $dog->ID;
												$dog_color = get_post_meta( $sire_4_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.4 -->
                					<?php 
                					if( isset($dam_3_2_id) ){
                						$dam_4_4 = get_field('matka_dam' , $dam_3_2_id);
                						if($dam_4_4){
                							$get_dam_4_4 = getDogByTitleSN($dam_4_4);
                							if ( $get_dam_4_4->have_posts() ) {
												
												$dog = $get_dam_4_4->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_4_id = $dog->ID;
												$dog_color = get_post_meta( $dam_4_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.5 -->
                					<?php 
                					if( isset($sire_3_3_id) ){
                						$sire_4_5 = get_field('ojciec_sire' , $sire_3_3_id);
                						if($sire_4_5){
                							$get_sire_4_5 = getDogByTitleSN($sire_4_5);
                							if ( $get_sire_4_5->have_posts() ) {
												
												$dog = $get_sire_4_5->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_5_id = $dog->ID;
												$dog_color = get_post_meta( $sire_4_5_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.6 -->
                					<?php 
                					if( isset($sire_3_3_id) ){
                						$dam_4_6 = get_field('matka_dam' , $sire_3_3_id);
                						if($dam_4_6){
                							$get_dam_4_6 = getDogByTitleSN($dam_4_6);
                							if ( $get_dam_4_6->have_posts() ) {
												
												$dog = $get_dam_4_6->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_6_id = $dog->ID;
												$dog_color = get_post_meta( $dam_4_6_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.7 -->
                					<?php 
                					if( isset($dam_3_4_id) ){
                						$sire_4_7 = get_field('ojciec_sire' , $dam_3_4_id);
                						if($sire_4_7){
                							$get_sire_4_7 = getDogByTitleSN($sire_4_7);
                							if ( $get_sire_4_7->have_posts() ) {
												
												$dog = $get_sire_4_7->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_7_id = $dog->ID;
												$dog_color = get_post_meta( $sire_4_7_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.8 -->
                					<?php 
                					if( isset($dam_3_4_id) ){
                						$dam_4_8 = get_field('matka_dam' , $dam_3_4_id);
                						if($dam_4_8){
                							$get_dam_4_8 = getDogByTitleSN($dam_4_8);
                							if ( $get_dam_4_8->have_posts() ) {
												
												$dog = $get_dam_4_8->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_8_id = $dog->ID;
												$dog_color = get_post_meta( $dam_4_8_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                			<!-- col 5 -->
                			<td>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.1 -->
                					<?php 
                					if( isset($sire_4_1_id) ){
                						$sire_5_1 = get_field('ojciec_sire' , $sire_4_1_id);
                						if($sire_5_1){
                							$get_sire_5_1 = getDogByTitleSN($sire_5_1);
                							if ( $get_sire_5_1->have_posts() ) {
												
												$dog = $get_sire_5_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_1_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.2 -->
                					<?php 
                					if( isset($sire_4_1_id) ){
                						$dam_5_2 = get_field('matka_dam' , $sire_4_1_id);
                						if($dam_5_2){
                							$get_dam_5_2 = getDogByTitleSN($dam_5_2);
                							if ( $get_dam_5_2->have_posts() ) {
												
												$dog = $get_dam_5_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_2_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.3 -->
                					<?php 
                					if( isset($dam_4_2_id) ){
                						$sire_5_3 = get_field('ojciec_sire' , $dam_4_2_id);
                						if($sire_5_3){
                							$get_sire_5_3 = getDogByTitleSN($sire_5_3);
                							if ( $get_sire_5_3->have_posts() ) {
												
												$dog = $get_sire_5_3->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_3_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.4 -->
                					<?php 
                					if( isset($dam_4_2_id) ){
                						$dam_5_4 = get_field('matka_dam' , $dam_4_2_id);
                						if($dam_5_4){
                							$get_dam_5_4 = getDogByTitleSN($dam_5_4);
                							if ( $get_dam_5_4->have_posts() ) {
												
												$dog = $get_dam_5_4->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_4_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.5 -->
                					<?php 
                					if( isset($sire_4_3_id) ){
                						$sire_5_5 = get_field('ojciec_sire' , $sire_4_3_id);
                						if($sire_5_5){
                							$get_sire_5_5 = getDogByTitleSN($sire_5_5);
                							if ( $get_sire_5_5->have_posts() ) {
												
												$dog = $get_sire_5_5->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_5_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_5_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.6 -->
                					<?php 
                					if( isset($sire_4_3_id) ){
                						$dam_5_6 = get_field('matka_dam' , $sire_4_3_id);
                						if($dam_5_6){
                							$get_dam_5_6 = getDogByTitleSN($dam_5_6);
                							if ( $get_dam_5_6->have_posts() ) {
												
												$dog = $get_dam_5_6->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_6_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_6_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.7 -->
                					<?php 
                					if( isset($dam_4_4_id) ){
                						$sire_5_7 = get_field('ojciec_sire' , $dam_4_4_id);
                						if($sire_5_7){
                							$get_sire_5_7 = getDogByTitleSN($sire_5_7);
                							if ( $get_sire_5_7->have_posts() ) {
												
												$dog = $get_sire_5_7->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_7_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_7_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.8 -->
                					<?php 
                					if( isset($dam_4_4_id) ){
                						$dam_5_8 = get_field('matka_dam' , $dam_4_4_id);
                						if($dam_5_8){
                							$get_dam_5_8 = getDogByTitleSN($dam_5_8);
                							if ( $get_dam_5_8->have_posts() ) {
												
												$dog = $get_dam_5_8->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_8_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_8_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.9 -->
                					<?php 
                					if( isset($sire_4_5_id) ){
                						$sire_5_9 = get_field('ojciec_sire' , $sire_4_5_id);
                						if($sire_5_9){
                							$get_sire_5_9 = getDogByTitleSN($sire_5_9);
                							if ( $get_sire_5_9->have_posts() ) {
												
												$dog = $get_sire_5_9->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_9_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_9_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_5_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_5_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.10 -->
                					<?php 
                					if( isset($sire_4_5_id) ){
                						$dam_5_10 = get_field('matka_dam' , $sire_4_5_id);
                						if($dam_5_10){
                							$get_dam_5_10 = getDogByTitleSN($dam_5_10);
                							if ( $get_dam_5_10->have_posts() ) {
												
												$dog = $get_dam_5_10->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_10_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_10_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_5_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_5_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.11 -->
                					<?php 
                					if( isset($dam_4_6_id) ){
                						$sire_5_11 = get_field('ojciec_sire' , $dam_4_6_id);
                						if($sire_5_11){
                							$get_sire_5_11 = getDogByTitleSN($sire_5_11);
                							if ( $get_sire_5_11->have_posts() ) {
												
												$dog = $get_sire_5_11->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_11_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_11_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_6_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_6_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.12 -->
                					<?php 
                					if( isset($dam_4_6_id) ){
                						$dam_5_12 = get_field('matka_dam' , $dam_4_6_id);
                						if($dam_5_12){
                							$get_dam_5_12 = getDogByTitleSN($dam_5_12);
                							if ( $get_dam_5_12->have_posts() ) {
												
												$dog = $get_dam_5_12->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_12_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_12_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_6_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_6_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.13 -->
                					<?php 
                					if( isset($sire_4_7_id) ){
                						$sire_5_13 = get_field('ojciec_sire' , $sire_4_7_id);
                						if($sire_5_13){
                							$get_sire_5_13 = getDogByTitleSN($sire_5_13);
                							if ( $get_sire_5_13->have_posts() ) {
												
												$dog = $get_sire_5_13->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_13_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_13_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_7_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_7_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>

                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.14 -->
                					<?php 
                					if( isset($sire_4_7_id) ){
                						$dam_5_14 = get_field('matka_dam' , $sire_4_7_id);
                						if($dam_5_14){
                							$get_dam_5_14 = getDogByTitleSN($dam_5_14);
                							if ( $get_dam_5_14->have_posts() ) {
												
												$dog = $get_dam_5_14->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_14_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_14_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_7_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_7_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.15 -->
                					<?php 
                					if( isset($dam_4_8_id) ){
                						$sire_5_15 = get_field('ojciec_sire' , $dam_4_8_id);
                						if($sire_5_15){
                							$get_sire_5_15 = getDogByTitleSN($sire_5_15);
                							if ( $get_sire_5_15->have_posts() ) {
												
												$dog = $get_sire_5_15->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_15_id = $dog->ID;
												$dog_color = get_post_meta( $sire_5_15_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_8_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_8_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.16 -->
                					<?php 
                					if( isset($dam_4_8_id) ){
                						$dam_5_16 = get_field('matka_dam' , $dam_4_8_id);
                						if($dam_5_16){
                							$get_dam_5_16 = getDogByTitleSN($dam_5_16);
                							if ( $get_dam_5_16->have_posts() ) {
												
												$dog = $get_dam_5_16->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_16_id = $dog->ID;
												$dog_color = get_post_meta( $dam_5_16_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_8_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_8_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                		</tr>
                	</table>
            	
            	</div>
        	</div>
		</div>
		<!-- Sire pedigree end -->

		<?php include get_template_directory().'/template-parts/vp-dam-pedigree.php' ?>


		
	</div>
</main><!-- #main -->

<script type="text/javascript">
    jQuery(document).ready(function($) {
     	// Pobranie wszystkich elementów div o klasie 'dog-cell-inner'
		const elements = document.querySelectorAll('div.dog-cell-inner');

		// Tworzenie obiektu do przechowywania liczby wystąpień danej klasy
		const classCount = {};

		// Liczenie wystąpień klas
		elements.forEach(element => {
		  const classes = element.classList;

		  // Pobranie klasy zaczynającej się od 'dog-color'
		  const colorClass = Array.from(classes).find(cls => cls.startsWith('dog-color'));

		  if (colorClass) {
		    // Inkrementacja liczby wystąpień danej klasy
		    classCount[colorClass] = (classCount[colorClass] || 0) + 1;
		  }
		});

		// Usunięcie atrybutu 'style' z elementów, których klasy się nie powtarzają
		elements.forEach(element => {
		  const classes = element.classList;

		  // Pobranie klasy zaczynającej się od 'dog-color'
		  const colorClass = Array.from(classes).find(cls => cls.startsWith('dog-color'));

		  if (colorClass && classCount[colorClass] === 1) {
		    // Usunięcie atrybutu 'style'
		    element.removeAttribute('style');
		  }
		});

    })
    
</script>

<?php get_footer(); ?>