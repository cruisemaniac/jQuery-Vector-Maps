<?php
/* 
 * Plugin Name: jQuery Vector Maps Plugin
 * Plugin URI: http://cruisemaniac.com/code
 * Description: A beautiful clickable map Plugin that uses vector maps generated by the even-more-awesome http://jqvmap.com/ jQuery Plugin.
 * Version: 0.1a
 * Author: cruisemaniac
 * Author URI: http://cruisemaniac.com
 * License: MIT License
 */


function jquery_vector_maps_plugin_admin_menu() {
    
    add_menu_page(__('jQuery Vector Maps Plugin', 'jquvm_plugin'), __('jQuery Vector Maps Plugin', 'jquvm_plugin'), 'manage_options', 'jquery-vector-map-plugin-options', 'jquery_vector_map_plugin_options');    
}

function jquery_vector_map_plugin_options() {
    echo "<h1>Yo!<h1>";
}

add_action('admin_menu', 'jquery_vector_maps_plugin_admin_menu');

function jquery_vector_maps_plugin_activation() {
    
}

register_activation_hook(__FILE__, 'jquery_vector_maps_plugin_activation');

function jquery_vector_maps_plugin_deactivation() {
    
}

register_deactivation_hook(__FILE__, 'jquery_vector_maps_plugin_deactivation');


function jqueryvm_plugin_shortcode($attrs) {
    $type = (isset($attrs['region'])) ? $attrs['region'] : 'usa';
    
    switch($type)
    {
        case 'world':
            $filename = 'jquery.vmap.world.js';
            break;
        
        case 'europe':
            $filename = 'jquery.vmap.europe.js';
            break;
        
        case 'germany':
            $filename = 'jquery.vmap.germany.js';
            break;
        
        case 'usa':
        default:
            $filename = 'jquery.vmap.usa.js';
            break;
    }
    wp_register_script('jquery','http://code.jquery.com/jquery-1.11.0.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-noconflict', plugins_url('noconflict.js', __FILE__));
    wp_enqueue_script('jqvmap', plugins_url('/jqvmap/jquery.vmap.min.js', __FILE__));
    wp_enqueue_script('jqvmap_country', plugins_url('/jqvmap/maps/'.$filename, __FILE__));
    wp_enqueue_style('jqvmap_style', plugins_url('/jqvmap/jqvmap.css', __FILE__));
    
    
    $output = '<script type="text/javascript">
                jQuery(document).ready(function() {
		jQuery(\'#vmap\').vectorMap({
		    map: \'usa_en\',
		    enableZoom: true,
		    showTooltip: true,
		    selectedRegion: \'MO\'
		});
	});</script><div id="vmap" style="width: 600px; height: 400px;"></div>';
    
    return '';
}

add_shortcode('jqvectormap', 'jqueryvm_plugin_shortcode');