<?php 

/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Resolute HR
 * @copyright         2024  resolute
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       CPT Resolute 
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Test Task Plugin For WP.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Resolute HR
 * Author URI:        https://example.com
 * Text Domain:       resolute-hr
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */
 if ( ! defined( 'ABSPATH' ) ) {
	exit("You can not access plugin file directly.");// Exit if accessed directly
 }
 define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));

 /**
 * Register the "Portfolio" custom post type
 */
function portfolio_setup_post_type() {

    require_once(PLUGIN_PATH . 'includes/custom-post.php');
   

    //Create a post type with the slug is 'portfolio' and arguments in $args.
    register_post_type('portfolio', $args);   
} 
add_action('init', 'portfolio_setup_post_type');
/*
*  Inculde style files
*/
require_once(PLUGIN_PATH . 'includes/enqueue_style_script.php');

/*
*  Triggerd Custom meta box 
*/
require_once(PLUGIN_PATH . 'includes/custom-metabox.php');
require_once(PLUGIN_PATH . 'includes/meta_form_save.php');


/*
*  Inculde custom template files
*/
require_once(PLUGIN_PATH . 'includes/custom_template_load.php');

/**
 * Activate the plugin.
 */
function resolute_custom_plugin_activate() { 
	// Trigger our function that registers the custom post type plugin.
    portfolio_setup_post_type(); 

	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules(); 
}
register_activation_hook(PLUGIN_PATH, 'resolute_custom_plugin_activate');


/**
 * Deactivation hook.
 */
 function resolute_custom_plugin_deactivate() {
	// Unregister the post type, so the rules are no longer in memory.
	unregister_post_type( 'portfolio' );
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
}
register_deactivation_hook(PLUGIN_PATH, 'resolute_custom_plugin_deactivate');

?>