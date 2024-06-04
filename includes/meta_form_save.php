<?php 
 if ( ! defined( 'ABSPATH' ) ) {
	exit("You can not access plugin file directly.");// Exit if accessed directly
 }

/**
 * Save meta box content.
 */

 function resolute_cpt_save_meta_box( $post_id) {
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ($parent_id = wp_is_post_revision( $post_id)){
        $post_id   = $parent_id;
    }
    $fields = [
        'project_offer_by',
        'company_name',
        'project_start_date',
        'project_end_date'
    ];
    foreach ($fields as $field){
        if(array_key_exists($field,$_POST)) {
            update_post_meta($post_id,$field,sanitize_text_field($_POST[$field]));
        }
    }
}
add_action( 'save_post', 'resolute_cpt_save_meta_box' );

?>