<?php

define( 'ACF_LITE', true );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_page-options',
		'title' => 'Page Options',
		'fields' => array (
			array (
				'key' => 'field_59f185fe2821d',
				'label' => 'Header',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_59f1860c2821e',
				'label' => 'Header Color Scheme',
				'name' => 'header_color_scheme',
				'type' => 'radio',
				'instructions' => 'Choose the header color styles',
				'choices' => array (
					'header-white' => 'White Header <img src="'. get_template_directory_uri() .'/assets/img/headers/header-white.png" alt="" class="radio-img">',
					'header-black' => 'Black Header <img src="'. get_template_directory_uri() .'/assets/img/headers/header-black.png" alt="" class="radio-img">',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_59f18a44c7e1e',
				'label' => 'Custom Logo',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_59f18a0128082',
				'label' => 'Select Logo',
				'name' => 'page_custom_logo',
				'type' => 'image',
				'instructions' => 'Select and upload the custom logo for this specific page. It will override the default site logo.',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_59f1874b2821f',
				'label' => 'Footer',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_59f1875628220',
				'label' => 'Footer Color Scheme',
				'name' => 'footer_color_scheme',
				'type' => 'radio',
				'instructions' => 'Choose the footer color styles',
				'choices' => array (
					'footer-white' => 'White Footer',
					'footer-black' => 'Black Footer',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
