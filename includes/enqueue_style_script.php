<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit("You can not access plugin file directly.");// Exit if accessed directly
 }


function resolute_enqueue_style_and_script(){
    wp_register_style('resolute_admin_style', plugins_url('/assets/css/style.css', __FILE__),false, '1.0.0', 'all');
    wp_enqueue_style('resolute_admin_style');
}

add_action('admin_init','resolute_enqueue_style_and_script');


function resolute_plugin_web_style_and_script(){
    wp_register_style('resolute_web_style', plugins_url('/assets/css/web_style.css', __FILE__),false, '1.0.0', 'all');
    wp_enqueue_style('resolute_web_style');
    wp_register_style('owl.carousel.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',false, '1.0.0', 'all');
    wp_enqueue_style('owl.carousel.min.css');
    wp_register_style('owl.theme.default.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',false, '1.0.0', 'all');
    wp_enqueue_style('owl.theme.default.min.css');
    wp_register_script('jquery-min-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',true, '1.0.0', 'all');
    wp_enqueue_script('jquery-min-js');
    wp_register_script('owl.carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',true, '1.0.0', 'all');
    wp_enqueue_script('owl.carousel');
    wp_register_script('app-js',plugins_url('/assets/js/app.js', __FILE__),true, '1.0.0', 'all');
    wp_enqueue_script('app-js');
    
}
add_action('wp_enqueue_scripts','resolute_plugin_web_style_and_script');

?>