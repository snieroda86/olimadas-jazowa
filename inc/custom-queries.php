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