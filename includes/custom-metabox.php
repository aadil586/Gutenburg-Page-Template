<?php
 if ( ! defined( 'ABSPATH' ) ) {
	exit("You can not access plugin file directly.");// Exit if accessed directly
 }

/**
 * Register meta boxes.
 */
 function resolute_cpt_register_meta_boxes(){
    add_meta_box(	 'resolute_cpt_',
    				 __( 'Custom Meta Box For CPT',
    				  'resolute_cpt' ), 
    				 'resolute_cpt_meta_box_display_callback', 
    				 'portfolio' 
    			);
}
add_action( 'add_meta_boxes', 'resolute_cpt_register_meta_boxes' );

/**
 * Meta box display callback.
 */
function resolute_cpt_meta_box_display_callback( $post ) {
    //print_r($post);
    require_once(PLUGIN_PATH . 'includes/metabox_form.php');
   
}

?>