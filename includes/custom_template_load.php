<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit("You can not access plugin file directly.");// Exit if accessed directly
 }
/**
 * Add "Custom" template to page attirbute template section.
 */
 
 add_filter( 'theme_page_templates', 'resolute_template_to_select',10,4);
 function resolute_template_to_select($post_templates,$wp_theme,$post,$post_type) {
 
     // Add custom template named template-custom.php to select dropdown 
     $post_templates['custom-template.php'] = __('Resolute Template');
     return $post_templates;
 }

 /**
 * Include the Plugin Template into the WordPress Theme 
 */
 add_filter( 'template_include', 'resolute_template_load_plugin_template',99);
 function resolute_template_load_plugin_template($template){
     if(get_page_template_slug() === PLUGIN_PATH . 'templates/custom-template.php'){

         if ( $theme_file = locate_template( array( PLUGIN_PATH .'custom-template.php' ) ) ) {
             $template = $theme_file;
         } else {
             $template = PLUGIN_PATH . 'templates/custom-template.php';
         }
     }
 
     if($template == '') {
         throw new \Exception('No template found');
     }
     return $template;

}


 /**
 * Include the Plugin Template into the Gutenberg Template to default editor
 */
 add_filter( 'get_block_templates','manage_block_templates', 10, 3 );
 function manage_block_templates( $query_result, $query, $template_type ) {

    $theme = wp_get_theme();
    $template_contents = file_get_contents( plugin_dir_path( __DIR__ ) . 'templates/custom-template.html' );
    $template_contents = str_replace( '~theme~', $theme->stylesheet, $template_contents );
    $new_block                 = new WP_Block_Template();
    $new_block->type           = 'wp_template';
    $new_block->theme          = $theme->stylesheet;
    $new_block->slug           = 'resolute-template';
    $new_block->id             = $theme->stylesheet .'/custom-template';
    $new_block->title          = 'Resolute Template';
    $new_block->description    = '';
    $new_block->post_types     = array('page');
    $new_block->source         = 'theme';
    $new_block->status         = 'publish';
    $new_block->has_theme_file = true;
    $new_block->is_custom      = true;
    $new_block->content        = $template_contents;
    $query_result[] = $new_block;
    return $query_result;
}


// Use the native hook that is triggered after the post was inserted.
add_action( 'wp_insert_post', 'resolute_plugin_want_apply_custom_template_on_insert', 10, 3 );
function resolute_plugin_want_apply_custom_template_on_insert( int $post_ID, object $post, bool $update ) {
	if ($post->post_type === 'page' ){
		if (empty($update) || 'auto-draft' === $post->post_status) {
            update_post_meta( $post_ID, '_wp_page_template', 'resolute-template' );
        }
    }
}
function resolute_register_block_template() {
	$block_template = array(
		array( 'core/image' ),
		array( 'core/heading', array(
			'placeholder'	=> 'Add H2...',
			'level'			=> 2
		) ),
		array( 'core/paragraph', array(
			'placeholder'	=> 'Add paragraph...'
			
		) ),
		array( 'core/columns', 
			array(), 
			array( 
				array( 'core/column',
					array(),
					array(
						array( 'core/image' )
					)
				), 
				array( 'core/column',
					array(),
					array(
						array( 'core/heading', array(
							'placeholder'	=> 'Add H3...',
							'level'			=> 3
						) ),
						array( 'core/paragraph', array(
							'placeholder'	=> 'Add paragraph...'
						) )
					) 
				)
			) 
		)
	);
	$post_type_object = get_post_type_object( 'page' );
	$post_type_object->template = $block_template;
}
add_action( 'init', 'resolute_register_block_template' );
?>