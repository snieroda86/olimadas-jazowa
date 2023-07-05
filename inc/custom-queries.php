<?php 
// Get all owners name
function getAllOwners(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1, 
	));

	$wlasciciele = array();

	foreach ($posts as $post) {

	    $wlasciciel = get_post_meta($post->ID, 'wlasciciel', true);

	    if (!in_array($wlasciciel, $wlasciciele)) {
	        $wlasciciele[] = $wlasciciel;
	    }
	}

	return $wlasciciele;
}

// Get all breeders
function getAllBreeders(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1, 
	));

	$hodowcy = array();

	foreach ($posts as $post) {

	    $hodowca = get_post_meta($post->ID, 'hodowca', true);

	    if (!in_array($hodowca, $hodowcy)) {
	        $hodowcy[] = $hodowca;
	    }
	}

	return $hodowcy;
}

// Get all sire
function getAllSire(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1 ,
	    'meta_query' => array(
	        array(
	            'key' => 'plec_psa',
	            'value' => 'male',
	            'compare' => '='
	        )
	    )
	));

	$sireArr =[];
	foreach ($posts as $post) {
		$sireArr[] = $post->post_title;
	}

	return $sireArr; 
}

// Get all dam
function getAllDam(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1 ,
	    'meta_query' => array(
	        array(
	            'key' => 'plec_psa',
	            'value' => 'female',
	            'compare' => '='
	        )
	    )
	));

	$damArr =[];
	foreach ($posts as $post) {
		$damArr[] = $post->post_title;
	}

	return $damArr; 
}

/*
* Get page / post object by title
*/

function getPageByTitleSN( $title , $type){
	$args = array(
	    'post_type'      => $type,
	    'post_status'    => 'publish',
	    'posts_per_page' => 1,
	    'title'          => $title
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
	    while ( $query->have_posts() ) {
	        $query->the_post();

	        $post_id = get_the_ID();

	    }

	    wp_reset_postdata();
	} else {
	    $post_id = null;
	}

	return $post_id;

}

// Dog offspring
function getDogOffspring( $post_title , $gender ){
	if($gender == 'male'){

		$offspring = get_posts(array(
		    'post_type' => 'rodowody_psow',
		    'posts_per_page' => -1 ,
		    'meta_query' => array(
		        array(
		            'key' => 'ojciec_sire',
		            'value' => $post_title ,
		            'compare' => '='
		        )
		    )
		));

	}else{

		$offspring = get_posts(array(
		    'post_type' => 'rodowody_psow',
		    'posts_per_page' => -1 ,
		    'meta_query' => array(
		        array(
		            'key' => 'matka_dam',
		            'value' => $post_title ,
		            'compare' => '='
		        )
		    )
		));

	}

	return $offspring; 
}