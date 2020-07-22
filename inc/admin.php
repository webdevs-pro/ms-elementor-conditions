<?php

require_once(MSEC_PATH . 'inc/RationalOptionPages.php');

// admin page
$pages = [
	'ms-element-conditions'	=> [ // option name
		'parent_slug' => 'options-general.php',
		'page_title' => __( 'MS Elements Conditions', 'ms_element_conditions' ),
		'sections' => [
			'section-main'	=> [
				'title'			=> __( 'Setup selectors', 'ms_element_conditions' ),
				'text'			=> '<p>' . __( 'Click on elements with this selectors will setup cookie and widget visibility logic will based on it. This classes or id must be same as in corresponding buttons in disclaimer popups.', 'ms_element_conditions' ) . '</p>',
				'fields'	=> [
					'private' => [
						'title' => __( 'Private', 'ms_element_conditions' ),
               ],
               'institutional' => [
						'title' => __( 'Institutional', 'ms_element_conditions' ),
               ],
               'financial' => [
						'title' => __( 'Financial', 'ms_element_conditions' ),
					],
				],
			],
		],
	],
];
$ms_element_conditions_option_page = new RationalOptionPages($pages);