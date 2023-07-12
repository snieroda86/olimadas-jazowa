<?php 

// Existing parent
if(isset($_POST['create_ex_parent'])){

	$ex_errors = [];

	if(isset($_POST['ex_sex'])){

		if($_POST['ex_sex']=='male'){
			$sireName = sanitize_text_field($_POST['ex_sire_name']) ;

			if(!empty($sireName)){
				// Check if sire exists
				$check_sire_ex = getDogByTitleSN($sireName);
				if($check_sire_ex->have_posts()){
					$check_sire_ex->the_post();
					$ex_sire_name = get_the_title();
                	if(!empty($ex_sire_name)){
                		update_field('ojciec_sire', $ex_sire_name , $_GET['child_id']);
                		wp_reset_postdata();
                		$child_url = get_permalink($_GET['child_id']);
                		wp_redirect($child_url);
                	}
					

				}else{
					// Create new sire
					$new_sire = array(
                        'post_title' => $sireName,
                        'post_status' => 'publish',
                        'post_type' => 'rodowody_psow',
                    );

                    $new_sire_id = wp_insert_post($new_sire);
                    update_field('ojciec_sire', $sireName , $_GET['child_id']);
                    $child_url = get_permalink($_GET['child_id']);
                	wp_redirect($child_url);
				}	
			}else{
				$ex_errors[] = 'Sire name cannot be empty'; 
			}
			
			

		}

		if($_POST['ex_sex']=='female'){
			$damName = sanitize_text_field($_POST['ex_dam_name']);

			if(!empty($damName)){
				// Check if dam exists
				$check_dam_ex = getDogByTitleSN($damName);
				if($check_dam_ex->have_posts()){
					$check_dam_ex->the_post();
					$ex_dam_name = get_the_title();
					if(!empty($ex_dam_name)){
                		update_field('matka_dam', $ex_dam_name , $_GET['child_id']);
                		wp_reset_postdata();
                		$child_url = get_permalink($_GET['child_id']);
                		wp_redirect($child_url);
                	}
					
				}else{
					// Create new dam
					$new_dam = array(
                        'post_title' => $damName,
                        'post_status' => 'publish',
                        'post_type' => 'rodowody_psow',
                    );

                    $new_dam_id = wp_insert_post($new_dam);
                    update_field('matka_dam', $damName , $_GET['child_id']);
                    $child_url = get_permalink($_GET['child_id']);
                	wp_redirect($child_url);

				}	
			}else{
				$ex_errors[] = 'Dam name cannot be empty'; 
			}
			
	
		}
	}

}

// New parent