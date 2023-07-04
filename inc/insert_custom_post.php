<?php 
// Insert post ( rodowody_psow ) into database

// Validation start
            
$post_title = '';
$gender = '';
$wlasciciel = '';
$owner_country = '';
$hodowca = '';
$breeder_country = '';
$ojciec_sire = '';
$matka_dam = '';
$data_urodzenia = '';
$tytuly = '';

if(isset($_POST['insert_rodowod_psa'])){
    $post_title = $_POST['post_title'];
    $gender = $_POST['gender'];
    $wlasciciel = $_POST['wlasciciel'];
    $owner_country = $_POST['owner_country'];
    $hodowca = $_POST['hodowca'];
    $breeder_country = $_POST['breeder_country'];
    $ojciec_sire = $_POST['ojciec_sire'];
    $matka_dam = $_POST['matka_dam'];
    $data_urodzenia = $_POST['data_urodzenia'];
    $tytuly = $_POST['tytuly'];
    $dog_photo = $_FILES['dog_photo'];

    // Validation
    $validation_errors = [];
    if(empty($post_title)){
        $validation_errors[] = 'Dog name field is required';
    }

    if(empty($gender)){
        $validation_errors[] = 'Gender field is required';
    }
    if(empty($wlasciciel)){
        $validation_errors[] = 'Owner name field is required';
    }
    if(empty($owner_country)){
        $validation_errors[] = 'Owner country field is required';
    }

    if(empty($hodowca)){
        $validation_errors[] = 'Breeder name field is required';
    }

    if(empty($breeder_country)){
        $validation_errors[] = 'Breeder country field is required';
    }

    if(empty($ojciec_sire)){
        $validation_errors[] = 'Sire field is required';
    }

    if(empty($matka_dam)){
        $validation_errors[] = 'Dam field is required';
    }
    if(empty($data_urodzenia)){
        $validation_errors[] = 'Birth date field is required';
    }

    // Chceck errors
    $validation_check = false;
    if(!empty($validation_errors) && count($validation_errors) > 0){
        $validation_check = false;
    }else{
        $validation_check = true;
    }

    if($validation_check === true){
        // Insert post

        global $wpdb;
        $table_name = $wpdb->prefix . 'dog_colors';

        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'");

        if ($table_exists === $table_name) {
            $query = "SELECT color_code FROM $table_name ORDER BY RAND() LIMIT 1";
            $color = $wpdb->get_var($query);

            if (empty($color)) { 
                $color = '#ffffff';
            }
                

        }else{
            $color = '#ffffff';
        }

        $new_post = array(
            'post_title' => $post_title,
            'post_status' => 'publish',
            'post_type' => 'rodowody_psow',
        );

        $existing_post = get_page_by_title($post_title, OBJECT, 'rodowody_psow');
        if ($existing_post) {
            $validation_errors[] = 'Dog name already exists!';
            return;
        }else{

            $post_id = wp_insert_post($new_post);

            if ($post_id) {
                add_post_meta($post_id, 'dog_color', $color);

                // ACF fileds
                update_field('wlasciciel', $wlasciciel , $post_id);
                update_field('plec_psa', $gender , $post_id);
                update_field('owner_country', $owner_country , $post_id);
                update_field('hodowca', $hodowca , $post_id);
                update_field('breeder_country', $breeder_country , $post_id);
                update_field('ojciec_sire', $ojciec_sire , $post_id);
                update_field('matka_dam', $matka_dam , $post_id);
                update_field('data_urodzenia', $data_urodzenia , $post_id);
                update_field('tytuly', $tytuly , $post_id);

                // Redirect
                $redirect_url = get_permalink( $post_id);
                if ( wp_redirect( $redirect_url ) ) {
                    exit;
                }


            } else {
                $validation_errors[] = "The dog's contact card has not been created";
                return;
            }
        }

    }

}
