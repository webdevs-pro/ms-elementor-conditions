<?php
/**
* Plugin Name: MS Elementor Display Conditions
* Description: This plugin allows to show/hide elementor elements based on conditional logic 
* Plugin URI: https://plugins.magnificsoft.com/
* Version: 0.1
* Author: Mafnific Soft
* Author URI: https://magnificsoft.com/
* License: GPL 3.0
* Text Domain: ms-elementor-conditions
*/

define('MSEC_PATH', plugin_dir_path(__FILE__));

include(MSEC_PATH . 'inc/admin.php');


// enqueue js
add_action( 'wp_enqueue_scripts', function() {

   wp_enqueue_script('ms_element_conditions', plugins_url('assets/ms-element-conditions.js', __FILE__), array('jquery'));
   
	wp_localize_script('ms_element_conditions', 'MsElementConditions', array(
		'selectors' => get_option('ms-element-conditions', array()),
   ));
     
});


// CUSTOM CONDITIONS SECTION
include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( is_plugin_active( 'elementor-pro/elementor-pro.php' ) ) { // for Elementor Pro

	add_action('elementor/element/section/section_custom_css/before_section_start', 'ms_element_conditions', 10, 2);
	add_action('elementor/element/column/section_custom_css/before_section_start', 'ms_element_conditions', 10, 2);
   add_action('elementor/element/common/section_custom_css/before_section_start', 'ms_element_conditions', 10, 2);
   
} else { // for Elementor Free

	add_action('elementor/element/section/section_custom_css_pro/before_section_start', 'ms_element_conditions', 10, 2);
	add_action('elementor/element/column/section_custom_css_pro/before_section_start', 'ms_element_conditions', 10, 2);
   add_action('elementor/element/common/section_custom_css_pro/before_section_start', 'ms_element_conditions', 10, 2);
   
}
function ms_element_conditions( $element, $args ) {
   
	$element->start_controls_section(
		'ms_section_element_conditions',
		[
			'label' => __('Element Conditions', 'ms-elementor-conditions'),
			'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
		]
	);
      // arrows enable
		$element->add_control(
			'ms_hide_element_for',
			[
				'label' => __('Hide Element For', 'ms-elementor-conditions'),
				'type' => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'label_block' => true,
				'options' => [
					'private'  => __('Private', 'ms-elementor-conditions'),
					'institutional' => __('Institutional', 'ms-elementor-conditions'),
					'financial' => __('Financial ', 'ms-elementor-conditions'),
				],
				'default' => [ '' ],
			]
		);

	$element->end_controls_section();

}


// DO NOT RENDER ELEMENT
add_filter( 'elementor/frontend/section/should_render', 'ms_elementor_hide_element', 10, 3);
function ms_elementor_hide_element( $bool, $element ) {



   $settings = $element->get_settings();
   if( 'test' === $settings['_element_id'] ) {
       return false;
   } else { 
      return true;
   }

}

error_log( print_r($_COOKIE, true) );

