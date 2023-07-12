<?php  
/*
 * Template Name: Utwórz rodzica
 */

if(!array_key_exists( 'sex' , $_GET ) || !array_key_exists( 'child_id' , $_GET )){
		wp_safe_redirect(home_url());
		exit();
}

// Save data
include get_template_directory() . '/inc/create_parent.php';

get_header();

// Autocomplete data
$ownersArr = getAllOwners();
$ownersJSON = json_encode($ownersArr);
// Breeders
$breedersArr = getAllBreeders();
$breedersJSON = json_encode($breedersArr);
// Sire
$sireArr = getAllSire();
$sireJSON = json_encode($sireArr);
// Sire
$damArr = getAllDam();
$damJSON = json_encode($damArr);

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

					<!-- Tabs start -->
					<div class="tabs-wrapper-sn m-auto">
						<ul class="nav nav-pills mb-3 justify-content-center" id="create-parent-tab" role="tablist">
						  <li class="nav-item" role="presentation">
						    <button class="nav-link active btn-main-sn b-none btn-long-sn b-radius-none m-1 min-w-300" id="existing-parents-tab" data-toggle="pill" data-target="#existing-parents" type="button" role="tab" aria-controls="existing-parents" aria-selected="true"><?php _e('Choose from existing parent' , 'web14devsn'); ?></button>
						  </li>
						  <li class="nav-item" role="presentation">
						    <button class="nav-link btn-main-sn b-none btn-long-sn b-radius-none m-1 min-w-300" id="new-parent-tab" data-toggle="pill" data-target="#new-parent" type="button" role="tab" aria-controls="new-parent" aria-selected="false"><?php _e('Create new parent' , 'web14devsn'); ?></button>
						  </li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<!-- Existing parent -->
						  <div class="tab-pane fade show active" id="existing-parents" role="tabpanel" aria-labelledby="existing-parents-tab">
						  	<div class="m-auto max-w-500">
						  		 <?php if(array_key_exists( 'sex' , $_GET )): ?>
						  		 	  <?php if($_GET['sex']=='male'): ?>
						  		 	 	
						  		 	 		<form action="" method="post">
						  		 	 			<div class="parent-male-dropdown text-center">
							  		 	 			<input name="ex_sire_name" type="text" placeholder="Search for a sire..." id="sire-dropdown-atc" class="dropdown-bottom-bordered" required>
							  		 	 			<input type="hidden" name="ex_sex"  value="male">
							  		 	 		</div>
							  		 	 		<div class="text-center">
							  		 	 			<input type="submit" class="btn-main-sn btn-gold b-none m-auto" name="create_ex_parent" value="<?php _e('Create sire' , 'web14devsn'); ?>">	
							  		 	 		</div>
							  		 	 		
						  		 	 		</form>
						  		 	  <?php endif; ?>
						  		 	  <?php if($_GET['sex']=='female'): ?>
						  		 	 	
						  		 	 		<form action="" method="post">
						  		 	 			<div class="parent-male-dropdown text-center">
							  		 	 			<input name="ex_dam_name" type="text" placeholder="Search for a dam..." id="dam-dropdown-atc" class="dropdown-bottom-bordered" required>
							  		 	 			<input type="hidden" name="ex_sex"  value="female">

							  		 	 		</div>
							  		 	 		<div class="text-center">
							  		 	 			<input type="submit" class="btn-main-sn btn-gold b-none m-auto" name="create_ex_parent" value="<?php _e('Create dam' , 'web14devsn'); ?>">	
							  		 	 		</div>
							  		 	 		
						  		 	 		</form>
						  		 	  <?php endif; ?>
						  		 <?php endif; ?>
						  	</div>
						  </div>

						  <!-- Create new parent -->
						  <div class="tab-pane fade" id="new-parent" role="tabpanel" aria-labelledby="new-parent-tab">New parent</div>

						  <!-- New parent end -->
						  
						</div>
					</div>
					<!-- Tabs end -->
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

<script type="text/javascript">
	jQuery(document).ready(function($) {
	   
	   var sireDropdownAtc = document.getElementById('sire-dropdown-atc');
	   var damDropdownAtc = document.getElementById('dam-dropdown-atc');

	   if(sireDropdownAtc){
 	      var sireList = <?php echo $sireJSON; ?>;
        $('#sire-dropdown-atc').autocomplete({
           source: sireList 
        });
	   }

	   if(damDropdownAtc){
 	      var damList = <?php echo $damJSON; ?>;
        $('#dam-dropdown-atc').autocomplete({
           source: damList
        });
	   }

	})
</script>

<?php get_footer(); ?>

