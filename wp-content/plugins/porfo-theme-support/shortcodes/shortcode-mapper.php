<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_action('init', 'johny_kc_mapper', 99 );

function johny_kc_mapper(){

	global $kc, $appaiObj, $appaiShortcodes;

	// Check if the function exists
	if( method_exists($kc, 'add_map_param') ) {

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'use_full_height_with_content_bottom',
				'label' => 'Use Full Height with Content Bottom?',
				'type' => 'toggle',
				'value' => 'no',
				'description' => __(' Toggle this to make the section full height with content position at bottom.', 'johny'),
			), 5, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'use_pattern_bg',
				'label' => 'Use Background Pattern Animation?',
				'type' => 'toggle',
				'value' => 'no',
				'description' => __(' Toggle this to use pattern in background. If you use this, you can not use Row ID.', 'johny'),
			), 6, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'pattern_styles',
				'label' => 'Select pattern styles',
				'type' => 'select',
				'description' => __(' Toggle this to use pattern in background. If you use this, you can not Row ID.', 'johny'),
				'options' => array(
					'style_1' => __('Style 1', 'johny'),
					'style_2' => __('Style 2', 'johny'),
					'style_3' => __('Style 3', 'johny'),
					'style_4' => __('Style 4', 'johny'),
				),
				'value' => 'style_1',
				'relation'      => array(
					'parent'    => 'use_pattern_bg',
					'show_when' => 'yes'
				)
			), 7, 'general' );

		$kc->add_map_param(
			'kc_title',
			array(
				'name' => 'use_icon',
				'label' => __('Use Icon?', 'johny'),
				'type' => 'toggle',
				'admin_label' => true,
				'value' => 'no',
				'description' => __('Toggle this to add icon in front of title.', 'johny')
			), 4
		);

		$kc->add_map_param(
			'kc_title',
			array(
				'name' => 'title_icon',
				'label' => __('Choose Icon', 'johny'),
				'type' => 'icon_picker',
				'admin_label' => true,
				'relation'      => array(
					'parent'    => 'use_icon',
					'show_when' => 'yes'
				),
				'description' => __('Choose your preferred icon.', 'johny'),
			), 5
		);

		$kc->update_map(
			'kc_title',
			'params',
			array(
				'styling' => array(
					array(
						'name'    => 'css_custom',
						'type'    => 'css',
						'options'		=> array(
							array(
								"screens" => "any,1024,999,767,479",
								'Title Style' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link')
								),
								'Title Icon' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '+.kc_title i,.kc_title i,.kc_title a.kc_title_link i'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.kc_title i,.kc_title i,.kc_title a.kc_title_link i'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.kc_title i,.kc_title i,.kc_title a.kc_title_link i'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.kc_title i,.kc_title i,.kc_title a.kc_title_link i')
								)
							)
						)
					)
				),
			)
		);

		$kc->update_map(
			'kc_single_image',
			'params',
			array(

					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Image Style' => array(
										array('property' => 'text-align', 'label' => 'Image Alignment'),
										array('property' => 'display', 'label' => 'Image Display'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => 'img'),
										array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'img'),
										array('property' => 'border', 'label' => 'Border', 'selector' => 'img'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'img'),
										array('property' => 'width', 'label' => 'Width', 'selector' => 'img'),
										array('property' => 'height', 'label' => 'Height', 'selector' => 'img'),
										array('property' => 'max-width', 'label' => 'Max Width', 'selector' => 'img'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => 'img'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => 'img')
									),
									'Caption' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.scapt'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.scapt'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.scapt'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.scapt'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.scapt'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.scapt'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.scapt'),
										array('property' => 'text-align', 'label' => 'Text Alignment', 'selector' => '.scapt'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.scapt'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.scapt'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.scapt')
									),
									'Overlay Effect' => array(
										array('property' => 'background-color', 'label' => 'Overlay Background Color', 'selector' => '.kc-image-overlay'),
										array('property' => 'background-color', 'label' => 'Icon BG Color', 'selector' => '.kc-image-overlay i'),
										array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.kc-image-overlay i'),
										array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => '.kc-image-overlay i'),
										array('property' => 'line-height', 'label' => 'Icon Line Height', 'selector' => '.kc-image-overlay i'),
										array('property' => 'width', 'label' => 'Icon Width', 'selector' => '.kc-image-overlay i'),
										array('property' => 'height', 'label' => 'Icon Height', 'selector' => '.kc-image-overlay i'),
										array('property' => 'border', 'label' => 'Icon Border', 'selector' => '.kc-image-overlay i'),
										array('property' => 'border-radius', 'label' => 'Icon Border Radius', 'selector' => '.kc-image-overlay i')
									),
									'Wrapper' => array(
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'width', 'label' => 'Width'),
										array('property' => 'height', 'label' => 'Height'),
										array('property' => 'max-width', 'label' => 'Max Width'),
										array('property' => 'z-index', 'label' => 'Z-Index'),
										array('property' => 'transform', 'label' => 'Transform'),
										array('property' => 'position', 'label' => 'Position'),
										array('property' => 'top', 'label' => 'Position Top'),
										array('property' => 'bottom', 'label' => 'Position Bottom'),
										array('property' => 'left', 'label' => 'Position Left'),
										array('property' => 'right', 'label' => 'Position Right'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
									),
								)
							)
						)
					)
			)
		);


		$kc->update_map(
			'kc_multi_icons',
			'params',
			array(

				'styling' => array(
					array(
						'name'    => 'css_custom',
						'type'    => 'css',
						'options' => array(
							array(
								"screens" => "any,1024,999,767,479",
								'Icon Style' => array(
									array('property' => 'color', 'label' => 'Icon Color', 'selector' => 'i'),
									array('property' => 'background-color', 'label' => 'Icon BG Color', 'selector' => 'a'),
									array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => 'i'),
									array('property' => 'text-align', 'label' => 'Icon Align', 'selector' => 'a'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'i'),
									array('property' => 'width', 'label' => 'Width', 'selector' => 'a'),
									array('property' => 'height', 'label' => 'Height', 'selector' => 'a'),
									array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'a'),
									array('property' => 'border', 'label' => 'Icon Border', 'selector' => 'a'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'a'),
									array('property' => 'padding', 'label' => 'Icon Padding', 'selector' => 'a'),
									array('property' => 'margin-right', 'label' => 'Icon gap', 'selector' => 'a'),
								),
								'Icon Hover' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => 'a:hover i'),
									array('property' => 'background-color', 'label' => 'BG Color', 'selector' => 'a:hover'),
									array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'a:hover'),
									array('property' => 'border-color', 'label' => 'Border Color', 'selector' => 'a:hover'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'a:hover'),
								),
								'Box' => array(
									array('property' => 'text-align', 'label' => 'Icon Align'),
									array('property' => 'z-index', 'label' => 'Z-Index'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'padding', 'label' => 'Padding'),
									array('property' => 'margin', 'label' => 'Margin'),
									array('property' => 'transform', 'label' => 'Transform'),
									array('property' => 'position', 'label' => 'position'),
									array('property' => 'top', 'label' => 'Top'),
									array('property' => 'bottom', 'label' => 'Bottom'),
									array('property' => 'left', 'label' => 'Left'),
									array('property' => 'right', 'label' => 'Right'),
								)
							),
						),
					),
				),
			)
		);

		$kc->update_map(
			'kc_button',
			'params',
			array(

				'styling' => array(
					array(
						'type'			=> 'css',
						'label'			=> __( 'css', 'kingcomposer' ),
						'name'			=> 'custom_css',
						'options'		=> array(
							array(
								'screens' => 'any,1024,999,767,479',
								'Button Style' => array(
									array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc_button'),
									array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.kc_button'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc_button'),
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc_button'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc_button'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc_button'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc_button'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc_button'),
									array('property' => 'text-align', 'label' => 'Align'),
									array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc_button'),
									array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.kc_button'),
									array('property' => 'width', 'selector' => '.kc_button'),
									array('property' => 'height', 'selector' => '.kc_button'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.kc_button'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc_button'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc_button'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc_button'),
									array('property' => 'padding', 'label' => 'Icon Spacing', 'selector' => '.kc_button i')
								),
								'Mouse Hover' => array(
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc_button:hover'),
									array('property' => 'color', 'label' => 'Text Color', 'selector'=>'.kc_button:hover'),
									array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'.kc_button:hover'),
									array('property' => 'border', 'label' => 'Border', 'selector'=>'.kc_button:hover'),
									array('property' => 'border-radius', 'label' => 'Border Radius Hover', 'selector'=>'.kc_button:hover')
								),
								'Button Wrapper' => array(
									array('property' => 'width', 'selector' => '+.kc-elm'),
									array('property' => 'padding', 'selector' => '+.kc-elm'),
									array('property' => 'margin', 'selector' => '+.kc-elm'),
								)
							)
						)
					),
				),
			)
		);

		$kc->update_map(
			'kc_row',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),

						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),

						            //Box group
						            'Box' => array(
						                array('property' => 'align-items', 'label' => 'Align Items'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'z-index', 'label' => 'Z index'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
										array('property' => 'position', 'label' => 'Position'),
										array('property' => 'top', 'label' => 'Top'),
										array('property' => 'bottom', 'label' => 'Bottom'),
										array('property' => 'left', 'label' => 'Left'),
										array('property' => 'right', 'label' => 'Right'),
						            ),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);


		$kc->update_map(
			'kc_column',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),

						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),

						            //Box group
						            'Box' => array(
						                array('property' => 'align-items', 'label' => 'Align Items'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'z-index', 'label' => 'Z index'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
										array('property' => 'position', 'label' => 'Position'),
										array('property' => 'top', 'label' => 'Top'),
										array('property' => 'bottom', 'label' => 'Bottom'),
										array('property' => 'left', 'label' => 'Left'),
										array('property' => 'right', 'label' => 'Right'),
						            ),

						            //Box group
						            'Inside' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);


		$kc->update_map(
			'kc_progress_bars',
			'params',
			array(

				'styling' => array(
					array(
						'type'			=> 'css',
						'label'			=> __( 'css', 'kingcomposer' ),
						'name'			=> 'custom_css',
						'options'		=> array(
							array(
								'screens' => 'any,1024,999,767,479',
								'Title' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.progress-item span.label'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.progress-item span.label'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.progress-item span.label'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.progress-item span.label'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.progress-item span.label'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.progress-item span.label'),
									array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.progress-item span.label'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.progress-item span.label'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.progress-item span.label'),
								),
								'Value' => array(
									array('property' => 'color', 'label' => 'Font Family', 'selector' => '.progress-item .value'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.progress-item .value'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.progress-item .value'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.progress-item .value'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.progress-item .value'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.progress-item .ui-label'),
								),
								'Item Style' => array(
									array('property' => 'height', 'label' => 'Progressbar Weight', 'selector' => '.kc-ui-progress-bar, .kc-ui-progress'),
									array('property' => 'background-color', 'label' => 'Progressbar Background Color', 'selector' => '.kc-ui-progress-bar'),
									array('property' => 'border-radius', 'label' => 'Trackbar Radius', 'selector' => '.kc-ui-progress-bar .kc-ui-progress, .kc-ui-progress-bar'),
									array('property' => 'padding', 'label' => 'Progressbar Spacing', 'selector' => '.progress-item'),
								),
								'Wrapper' => array(
									array('property' => 'width', 'label' => 'Width'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'margin', 'label' => 'Margin'),
									array('property' => 'padding', 'label' => 'Padding'),
									array('property' => 'background', 'label' => 'Background'),
								)

							)
						)
					),
				),
			)
		);


	}




	if (function_exists('kc_add_map'))
	{

		// Adding Custom Icon Font Family
		kc_add_icon( get_template_directory_uri().'/assets/css/themify-icons.css' );

		$contact_forms = kc_tools::get_cf7_names();

		// Johny Spacing Add on
		kc_add_map(
		    array(

		        'johny_spacer' => array(
		        	'name' => esc_html__('Spacer - Johny', 'johny'),
		        	'description' => esc_html__('Add a responsive white space area', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Spacer - Johny', 'johny'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Divider' => array(
	                    					array(
	                    						'property' => 'height',
	                    						'label' => 'Height',
	                    						'selector' => '+ .johny-spacer'
	                    					),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'johny_typing_title' => array(
		        	'name' => esc_html__('Typing title - Johny', 'johny'),
		        	'description' => esc_html__('Add a title with typewriter style', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Typing title', 'johny'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Before typewriting text', 'johny' ),
								'name'			=> 'before_typewriter_text',
								'description'	=> __( 'Add some text that will be placed at first before the typewriting text apprear.', 'johny' ),
								'value'			=> 'I’m ',
							),
							array(
								'type'			=> 'group',
								'label'			=> __('Titles', 'johny'),
								'name'			=> 'titles',
								'description'	=> __('Add titles for typewriter texts', 'johny'),
								'options'		=> array('add_text' => __('Add new title', 'johny')),
								// default values when create new group
								'value' => base64_encode( json_encode( array(
									"1" => array(
										"title" => "Johny Legend",
									),
									"2" => array(
										"title" => "Professional Web Designer",
									),
									"3" => array(
										"title" => "Professional Web Developer",
									),
									"4" => array(
										"title" => "Professional Photographer",
									),

								))),

								'params' => array(
									array(
										'type' => 'text',
										'label' => 'Title',
										'name' => 'title',
										'description' => 'Add title for typewriter',
										'admin_label' => true,
									),
								)
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Name' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .cd-headline'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .cd-headline'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .cd-headline'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .cd-headline'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .cd-headline'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .cd-headline'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .cd-headline'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .cd-headline'),
											array('property' => 'display', 'label' => 'Display'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .cd-headline'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .cd-headline'),
			                    		),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'johny_portfolio' => array(
		        	'name' => esc_html__('Portfolio - Johny', 'johny'),
		        	'description' => esc_html__('Add portfolio posts and show them using masonry grid layout', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Portfolio - Johny', 'johny'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Posts Limit', 'johny' ),
								'name'			=> 'limit',
								'description'	=> __( 'Set the number of the posts to display.', 'johny' ),
								'value'			=> 9,
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Portfolio Filters', 'johny' ),
								'name'			=> 'pf_switch',
								'description'	=> __( 'Choose to display or hide portfolio filters.', 'johny' ),
								'value'			=> true,
							),


		        			array(
		        				'name' => 'orderby',
		        				'type' => 'select',
		        				'label' => esc_html__('Order By', 'johny'),
								'description'	=> esc_html__( 'Select post order by', 'johny' ),
		        				'options' => array(
		        					'id' => esc_html__('ID', 'johny'),
		        					'author' => esc_html__('author', 'johny'),
		        					'title' => esc_html__('title', 'johny'),
		        					'name' => esc_html__('name', 'johny'),
		        					'type' => esc_html__('type', 'johny'),
		        					'date' => esc_html__('date', 'johny'),
		        					'modified' => esc_html__('modified', 'johny'),
		        					'menu_order' => esc_html__('menu_order', 'johny'),
		        					'rand' => esc_html__('modified', 'johny'),
		        				),
		        				'value' => 'date'
		        			),

		        			array(
		        				'name' => 'order',
		        				'type' => 'select',
		        				'label' => esc_html__('Order', 'johny'),
								'description'	=> esc_html__( 'Select post order', 'johny' ),
		        				'options' => array(
		        					'DESC' => esc_html__('Descending', 'johny'),
		        					'ASC' => esc_html__('Ascending', 'johny'),
		        				),
		        				'value' => 'ASC'
		        			),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .portfolio-details-inner h3 a'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .portfolio-details-inner h3 a')
			                    		),
										'Filter' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .portfolio-filter li'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .portfolio-filter-wrap'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .portfolio-filter-wrap')
			                    		),
										'Active Filter' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .portfolio-filter li.active, .dark-layout .portfolio-filter li:hover'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .portfolio-filter li.active'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .portfolio-filter li.active')
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ .portfolio.portfolio-masonry.isotope'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'johny_blog_posts' => array(
		        	'name' => esc_html__('Blog Posts - Johny', 'johny'),
		        	'description' => esc_html__('Add a logo slider', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Blog Posts - Johny', 'johny'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'text',
								'label'			=> __( 'Limit', 'johny' ),
								'name'			=> 'limit',
								'description'	=> __( 'Set the number of the posts to show or enter -1 to show all the posts.', 'johny' ),
								'value'			=> -1,
							),
							array(
								'type'			=> 'select',
								'label'			=> __( 'Grid Column', 'johny' ),
								'name'			=> 'grid_column',
								'description'	=> __( 'Select the grid column', 'johny' ),
								'options'		=> array(
									'one-column'	=> 'One column',
									'two-column'	=> 'Two column',
									'three-column'	=> 'Three column',
								),
								'value'			=> 'three-column',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Content Word Limit', 'johny' ),
								'name'			=> 'content_limit',
								'description'	=> __( 'Set the number of the words you want to show in post content posts.', 'johny' ),
								'value'			=> 10,
							),
							array(
								'name'	  => 'title_tag',
								'label'   => __('Title Tag Type'),
								'type'	  => 'select',
								'admin_label' => true,
								'options' => array(
									'h1'  => 'H1',
									'h2'  => 'H2',
									'h3'  => 'H3',
									'h4'  => 'H4',
									'h5'  => 'H5',
									'h6'  => 'H6',
									'div'  => 'div',
									'span'  => 'Span',
									'p'  => 'P'
								),
								'value'			=> 'h3',
							),
		        			array(
		        				'name' => 'orderby',
		        				'type' => 'select',
		        				'label' => esc_html__('Order By', 'johny'),
								'description'	=> esc_html__( 'Select post order by', 'johny' ),
		        				'options' => array(
		        					'id' => esc_html__('ID', 'johny'),
		        					'author' => esc_html__('author', 'johny'),
		        					'title' => esc_html__('title', 'johny'),
		        					'name' => esc_html__('name', 'johny'),
		        					'type' => esc_html__('type', 'johny'),
		        					'date' => esc_html__('date', 'johny'),
		        					'modified' => esc_html__('modified', 'johny'),
		        					'menu_order' => esc_html__('menu_order', 'johny'),
		        					'rand' => esc_html__('modified', 'johny'),
		        				),
		        				'value' => 'date'
		        			),

		        			array(
		        				'name' => 'order',
		        				'type' => 'select',
		        				'label' => esc_html__('Order', 'johny'),
								'description'	=> esc_html__( 'Select post order', 'johny' ),
		        				'options' => array(
		        					'DESC' => esc_html__('DESC', 'johny'),
		        					'ASC' => esc_html__('ASC', 'johny'),
		        				),
		        				'value' => 'ASC'
		        			),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Read more text', 'johny' ),
								'name'			=> 'read_more_text',
								'description'	=> __( 'Add read more button text', 'johny' ),
								'value'			=> 'Read more',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),


						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .post-content-inner h3 a:hover'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .post-content-inner h3'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .post-content-inner h3'),
			                    		),
			                    		'Content' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .post-content-inner p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .post-content-inner p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .post-content-inner p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .post-content-inner p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .post-content-inner p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .post-content-inner p'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .post-content-inner p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .post-content-inner p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .post-content-inner p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .post-content-inner p'),
			                    		),
			                    		'Button' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .read-more-btn a'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .read-more-btn a:hover'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .read-more-btn a'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .read-more-btn a'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .read-more-btn a'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .read-more-btn a'),
			                    		),
			                    		'Item' => array(
											array('property' => 'background-color', 'label' => 'Background color', 'selector' => '.post-content, .blog-post'),
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)

		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'johny_inline_list' => array(
		        	'name' => esc_html__('Inline list - Johny', 'johny'),
		        	'description' => esc_html__('Add inline list items', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Inline list - Johny', 'johny'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'group',
								'label'			=> __('Lists', 'johny'),
								'name'			=> 'lists',
								'description'	=> __('Add list items', 'johny'),
								'options'		=> array('add_text' => __('Add new list', 'johny')),
								// default values when create new group
								'value' => base64_encode( json_encode( array(
									"1" => array(
										"text" => "DESIGNER",
									),
									"2" => array(
										"text" => "DEVELOPER",
									),
									"3" => array(
										"text" => "PHOTOGRAPHER",
									),

								))),

								'params' => array(
									array(
										'type' => 'text',
										'label' => 'Text',
										'name' => 'text',
										'description' => 'Add text for the list item',
										'admin_label' => true,
									),
								)
							),


							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Ul' => array(
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .johny-list-inline'),
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ .johny-list-inline'),
			                    		),
			                    		'List texts' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .johny-list-inline li'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .johny-list-inline li'),
			                    		),
			                    		'Divider' => array(
											array('property' => 'background-color', 'label' => 'Color', 'selector' => '+ .johny-list-inline li::after'),
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ .johny-list-inline li::after'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'johny_section_title' => array(
		        	'name' => esc_html__('Section Title - Johny', 'johny'),
		        	'description' => esc_html__('Add inline list items', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Section Title - Johny', 'johny'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'johny' ),
								'name'			=> 'title',
							),
							array(
								'name'	  => 'type',
								'label'   => __(' Type'),
								'type'	  => 'select',
								'admin_label' => true,
								'options' => array(
									'h1'  => 'H1',
									'h2'  => 'H2',
									'h3'  => 'H3',
									'h4'  => 'H4',
									'h5'  => 'H5',
									'h6'  => 'H6',
									'div'  => 'div',
									'span'  => 'Span',
									'p'  => 'P'
								),
								'value' => 'h2'
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .section-title .title'),
											array('property' => 'background', 'label' => 'Background Image', 'selector' => '+ .section-title .title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .section-title .title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .section-title .title'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .section-title .title'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .section-title .title'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .section-title .title'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .section-title .title'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .section-title .title'),
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ .section-title .title'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .section-title .title'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .section-title .title'),
			                    		),

			                    		'Background' => array(
											array('property' => 'background', 'label' => 'Background Image', 'selector' => '+ .section-title .title'),
			                    		),

			                    		'Wrapper' => array(
											array('property' => 'text-align', 'label' => 'Text align'),
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'johny_profile_image' => array(
		        	'name' => esc_html__('Profile Image - Johny', 'johny'),
		        	'description' => esc_html__('Add inline list items', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Profile Image - Johny', 'johny'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Profile image.', 'johny' ),
								'name'			=> 'image',
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Image' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .profile-image img'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .profile-image'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .profile-image'),
			                    		),

			                    		'Background' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .profile-image'),
			                    		),

			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)

		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'johny_resume' => array(
		        	'name' => esc_html__('Resume - Johny', 'johny'),
		        	'description' => esc_html__('Add inline list items', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Resume - Johny', 'johny'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'text',
								'label'			=> __( 'Title.', 'johny' ),
								'name'			=> 'title',
								'value'			=> 'Professional Web Design',
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Short description.', 'johny' ),
								'name'			=> 'details',
								'value'			=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do iusmodm incididunt ut labore et dolore magna aliqua.',
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Date.', 'johny' ),
								'name'			=> 'date',
								'value'			=> 'March 2011 - 2014 Deacember.',
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Location or Job Position.', 'johny' ),
								'name'			=> 'location',
								'value'			=> 'Florida University',
							),
							array(
								'name' => 'use_icon',
								'label' => __('Use Icon?', 'johny'),
								'type' => 'toggle',
								'admin_label' => true,
								'value' => 'no',
								'description' => __('Toggle this to add icon in front of title.', 'johny')
							),
							array(
								'name' => 'title_icon',
								'label' => __('Choose Icon', 'johny'),
								'type' => 'icon_picker',
								'admin_label' => true,
								'relation'      => array(
									'parent'    => 'use_icon',
									'show_when' => 'yes'
								),
								'description' => __('Choose your preferred icon.', 'johny'),
							),
							array(
								'name' => 'use_icon_image',
								'label' => __('Use Icon Image?', 'johny'),
								'type' => 'toggle',
								'admin_label' => true,
								'value' => 'no',
								'description' => __('Toggle this to add icon image in front of title.', 'johny')
							),
							array(
								'name' => 'title_icon_img',
								'label' => __('Choose Image', 'johny'),
								'type' => 'attach_image',
								'admin_label' => true,
								'relation'      => array(
									'parent'    => 'use_icon_image',
									'show_when' => 'yes'
								),
								'description' => __('Choose your preferred image.', 'johny'),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-resume h4'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-resume h4'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-resume h4'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-resume h4'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-resume h4'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-resume h4'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-resume h4'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .single-resume h4'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-resume h4'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-resume h4')
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-resume > p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-resume > p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-resume > p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-resume > p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-resume > p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-resume > p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-resume > p'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .single-resume > p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-resume > p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-resume > p')
			                    		),
			                    		'Position' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-resume h5'),
											array('property' => 'color', 'label' => 'Color on hover', 'selector' => '+ .single-resume:hover h5'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-resume h5'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .single-resume h5'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-resume h5'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-resume h5')
			                    		),
			                    		'Date' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-resume .work-duration'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-resume .work-duration'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .single-resume .work-duration'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-resume .work-duration'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-resume .work-duration')
			                    		),
			                    		'Icon' => array(
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .single-resume h4 span img'),
											array('property' => 'max-width', 'label' => 'Max Width', 'selector' => '+ .single-resume h4 span img'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-resume h4 span'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-resume h4 span')
			                    		),
			                    		'Item' => array(
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .single-resume'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-resume'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-resume'),
											array('property' => 'background-color', 'label' => 'Border Background Color', 'selector' => '+ .single-resume:after'),
			                    		),
			                    		'Item:hover' => array(
											array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '+ .single-resume:hover'),
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .single-resume:hover')
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)

		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'johny_service_slider' => array(
		        	'name' => esc_html__('Service slider - Johny', 'johny'),
		        	'description' => esc_html__('Add inline list items', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Service slider - Johny', 'johny'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'group',
								'label'			=> __('Services', 'johny'),
								'name'			=> 'services',
								'description'	=> __('Add Service and show them using slider', 'johny'),
								'options'		=> array('add_text' => __('Add new service', 'johny')),
								// default values when create new group
								'value' => base64_encode( json_encode( array(
									"1" => array(
										"title" => "PRODUCT DESIGN",
										"desc" => "Lorem ipsum dolor amet, consecte tempor incididunt ut labore et dolore tumber tur adipisicing elit.",
										"icon" => "ti-desktop",
									),
									"2" => array(
										"title" => "UI/UX DESIGN",
										"desc" => "Lorem ipsum dolor amet, consecte tempor incididunt ut labore et dolore tumber tur adipisicing elit.",
										"icon" => "ti-vector",
									),
									"3" => array(
										"title" => "APP DEVELOPMENT",
										"desc" => "Lorem ipsum dolor amet, consecte tempor incididunt ut labore et dolore tumber tur adipisicing elit.",
										"icon" => "ti-paint-bucket",
									),
									"4" => array(
										"title" => "PHOTOGRAPHY",
										"desc" => "Lorem ipsum dolor amet, consecte tempor incididunt ut labore et dolore tumber tur adipisicing elit.",
										"icon" => "ti-camera",
									),
									"5" => array(
										"title" => "PRODUCT DESIGN",
										"desc" => "Lorem ipsum dolor amet, consecte tempor incididunt ut labore et dolore tumber tur adipisicing elit.",
										"icon" => "ti-desktop",
									),

								))),

								'params' => array(
									array(
										'type' => 'text',
										'label' => 'Title',
										'name' => 'title',
										'description' => 'Add a title for the service',
										'admin_label' => true,
									),
									array(
										'type' => 'text',
										'label' => 'Short Description',
										'name' => 'desc',
										'description' => 'Add a short description about the service',
										'admin_label' => true,
									),
									array(
										'type' => 'icon_picker',
										'label' => 'Choose icon',
										'name' => 'icon',
										'description' => 'Choose a service icon',
										'admin_label' => true,
									),
								)
							),



							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .service-content h5'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .service-content h5'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .service-content h5'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .service-content h5'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .service-content h5'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .service-content h5'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .service-content h5'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .service-content h5'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .service-content h5'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .service-content h5')
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .service-content p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .service-content p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .service-content p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .service-content p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .service-content p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .service-content p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .service-content p'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .service-content p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .service-content p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .service-content p')
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .service-content i'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .service-content i'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .service-content i'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .service-content i'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .service-content i')
			                    		),
			                    		'Item' => array(
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .service-content'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .service-content')
			                    		),
			                    		'Item:hover' => array(
											array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '+ .single-service:hover .service-content'),
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .single-service:hover .service-content')
			                    		),
			                    		'Dots' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .slick-dots li button::before'),
											array('property' => 'border', 'label' => 'Active Border', 'selector' => '+ .slick-dots li.slick-active button::before'),
											array('property' => 'background-color', 'label' => 'Active Background Color', 'selector' => '+ .slick-dots li.slick-active button::before'),
			                    		),

			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)

		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'johny_counter_up' => array(
		        	'name' => esc_html__('Counter Up - Johny', 'johny'),
		        	'description' => esc_html__('Add inline list items', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Counter Up - Johny', 'johny'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'johny' ),
								'name'			=> 'title',
								'description'	=> __( 'Give an title.', 'johny' ),
								'value'			=> 'Cup of Tea',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Targeted number', 'johny' ),
								'name'			=> 'number',
								'description'	=> __( 'The targeted number to count up to (From zero).', 'johny' ),
								'admin_label'	=> true,
								'value'			=> '100'
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Icon', 'johny' ),
								'name'			=> 'icon',
								'description'	=> __( 'Choose an icon.', 'johny' ),
								'value'			=> 'ti-cup',
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .counter-content h3'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .counter-content h3'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .counter-content h3'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .counter-content h3'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .counter-content h3'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .counter-content h3'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .counter-content h3'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .counter-content h3'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .counter-content h3'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .counter-content h3')
			                    		),
			                    		'Number' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .counter-content h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .counter-content h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .counter-content h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .counter-content h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .counter-content h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .counter-content h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .counter-content h2'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .counter-content h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .counter-content h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .counter-content h2')
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .counter-content i'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .counter-content i'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .counter-content i'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .counter-content i'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .counter-content i'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .counter-content i'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .counter-content i'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .counter-content i'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .counter-content i'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .counter-content i')
			                    		),

			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)

		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'johny_testimonial_slider' => array(
		        	'name' => esc_html__('Testimonial Slider - Johny', 'johny'),
		        	'description' => esc_html__('Add inline list items', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Testimonial Slider - Johny', 'johny'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'group',
								'label'			=> __('Testimonials', 'johny'),
								'name'			=> 'testimonials',
								'description'	=> __('Add testimonial sliders', 'johny'),
								'options'		=> array('add_text' => __('Add new testimonial', 'johny')),
								// default values when create new group

								'params' => array(
									array(
										'type' => 'text',
										'label' => 'Person name',
										'name' => 'name',
										'description' => 'Person name of the testimonial',
										'admin_label' => true,
									),
									array(
										'type' => 'attach_image',
										'label' => 'Picture',
										'name' => 'image',
										'description' => 'Picture of the person',
										'admin_label' => true,
									),
									array(
										'type' => 'text',
										'label' => 'Designation',
										'name' => 'designation',
										'description' => 'Designation of the person for the testimonial',
										'admin_label' => true,
									),
									array(
										'type' => 'textarea',
										'label' => 'Comment',
										'name' => 'comment',
										'description' => 'Comment/text of the testimonial',
										'admin_label' => true,
									),

								)
							),


							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .testimonial-content h4'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .testimonial-content h4')
			                    		),
			                    		'Comment' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .testimonial-content p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .testimonial-content p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .testimonial-content p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .testimonial-content p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .testimonial-content p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .testimonial-content p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .testimonial-content p'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .testimonial-content p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .testimonial-content p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .testimonial-content p')
			                    		),
			                    		'Designation' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .testimonial-content h6'),
											array('property' => 'color', 'label' => 'Color on hover', 'selector' => '+ .single-resume:hover h5'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .testimonial-content h6'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .testimonial-content h6'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .testimonial-content h6'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .testimonial-content h6')
			                    		),
			                    		'Dots' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .slick-dots li button::before'),
											array('property' => 'border', 'label' => 'Active Border', 'selector' => '+ .slick-dots li.slick-active button::before'),
											array('property' => 'background-color', 'label' => 'Active Background Color', 'selector' => '+ .slick-dots li.slick-active button::before'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-resume h4 span'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-resume h4 span')
			                    		),
			                    		'Item' => array(
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .testimonial-content-wrapper'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .testimonial-content-wrapper'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .testimonial-content-wrapper'),
											array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '+ .testimonial-content-wrapper'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'johny_logo_slider' => array(
		        	'name' => esc_html__('Logo Slider - Johny', 'johny'),
		        	'description' => esc_html__('Add a logo slider', 'johny'),
		        	'category' => 'Johny',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Logo Slider - Johny', 'johny'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'attach_images',
								'label'			=> __( 'Images', 'johny' ),
								'name'			=> 'images',
								'description'	=> __( 'Choose images.', 'johny' ),
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'johny' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'johny' ),
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Item Hover' => array(
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .single-brand-logo:hover .client-logo-inner'),
											array('property' => 'box-shadow', 'label' => 'Border', 'selector' => '+ .single-brand-logo:hover .client-logo-inner'),
			                    		),
										'Dots' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .slick-dots li button::before'),
											array('property' => 'border', 'label' => 'Active Border', 'selector' => '+ .slick-dots li.slick-active button::before'),
											array('property' => 'background-color', 'label' => 'Active Background Color', 'selector' => '+ .slick-dots li.slick-active button::before'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding'),
											array('property' => 'margin', 'label' => 'Margin'),
			                    		)

		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'johny_pf_title' => array(
		        	'name' => esc_html__('Portfolio Title - Porfo', 'porfo'),
		        	'description' => esc_html__('Add a portfolio title', 'porfo'),
		        	'category' => 'porfo',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Portfolio Title - Porfo', 'porfo'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Title on top', 'porfo' ),
								'name'			=> 'pf_title_top',
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Use Custom Title', 'porfo' ),
								'name'			=> 'pf_title_switch',
								'value'			=> false,
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Portfolio Details Custom Title', 'porfo' ),
								'name'			=> 'pf_dtl_title',
								'relation'      => array(
									'parent'    => 'pf_title_switch',
									'show_when' => 'yes'
								)
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Show Portfolio Tags', 'porfo' ),
								'name'			=> 'pf_tags_switch',
								'default'		=> 'yes',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'porfo' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'porfo' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .portfolio-details-title h3'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .portfolio-details-title h3'),
			                    		),
			                    		'Tags' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .portfolio-details-title  .pf_tags '),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .portfolio-details-title  .pf_tags '),
			                    		),
			                    		'Wrapper' => array(
	                    					array('property' => 'text-align','label' => 'Text align'),
	                    					array('property' => 'padding','label' => 'Padding'),
	                    					array('property' => 'margin','label' => 'Margin'),
			                    		)
		        					)
		        				)
		        			)
		        		)
		        	)
		        ),



		        'johny_pf_meta' => array(
		        	'name' => esc_html__('Portfolio Meta - Porfo', 'porfo'),
		        	'description' => esc_html__('Add portfolio meta content', 'porfo'),
		        	'category' => 'porfo',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Portfolio Meta - Porfo', 'porfo'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'select',
								'label'			=> __( 'Portfolio Meta Style', 'porfo' ),
								'name'			=> 'pf_meta_style',
								'options'		=> array(
									'pf_meta_style_1' => 'Style One',
									'pf_meta_style_2' => 'Style Two',
								),
								'default'			=> 'pf_meta_style_1',
							),
							array(
								'type'			=> 'group',
								'label'			=> __('Portfolio Meta Content', 'porfo'),
								'name'			=> 'pf_metas',
								'description'	=> __( 'Add portfolio meta content.', 'porfo' ),
								'options'		=> array('add_text' => __(' Add new meta info', 'porfo')),
								'params' => array(
									array(
										'type'			=> 'text',
										'label'			=> __( 'Meta title', 'porfo' ),
										'name'			=> 'title',
										'description'	=> __( 'Add portfolio meta title.', 'porfo' ),
										'value'			=> 'Author Name:',
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Meta info', 'porfo' ),
										'name'			=> 'info',
										'description'	=> __( 'Add portfolio meta info.', 'porfo' ),
										'value'			=> 'John Doe',
									),
								),
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'porfo' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'porfo' ),
							),
						),
		        	)
		        ),

		        'johny_breadcrumb_content' => array(
		        	'name' => esc_html__('Breadcrumb Content - Porfo', 'porfo'),
		        	'description' => esc_html__('Add portfolio meta content', 'porfo'),
		        	'category' => 'porfo',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Breadcrumb Content - Porfo', 'porfo'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'select',
								'label'			=> __( 'Portfolio Meta Style', 'porfo' ),
								'name'			=> 'pf_meta_style',
								'options'		=> array(
									'pf_meta_style_1' => 'Style One',
									'pf_meta_style_2' => 'Style Two',
								),
								'default'			=> 'pf_meta_style_1',
							),
							array(
								'type'			=> 'group',
								'label'			=> __('Portfolio Meta Content', 'porfo'),
								'name'			=> 'pf_metas',
								'description'	=> __( 'Add portfolio meta content.', 'porfo' ),
								'options'		=> array('add_text' => __(' Add new meta info', 'porfo')),
								'params' => array(
									array(
										'type'			=> 'text',
										'label'			=> __( 'Meta title', 'porfo' ),
										'name'			=> 'title',
										'description'	=> __( 'Add portfolio meta title.', 'porfo' ),
										'value'			=> 'Author Name:',
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Meta info', 'porfo' ),
										'name'			=> 'info',
										'description'	=> __( 'Add portfolio meta info.', 'porfo' ),
										'value'			=> 'John Doe',
									),
								),
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'porfo' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'porfo' ),
							),
						),
		        	)
		        ),


		        'johny_pf_social_share' => array(
		        	'name' => esc_html__('Portfolio Social Share - Porfo', 'porfo'),
		        	'description' => esc_html__('Add portfolio social share buttons', 'porfo'),
		        	'category' => 'porfo',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Portfolio Social Share - Porfo', 'porfo'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'group',
								'label'			=> __('Portfolio Meta Content', 'porfo'),
								'name'			=> 'pf_metas',
								'description'	=> __( 'Add portfolio meta content.', 'porfo' ),
								'options'		=> array('add_text' => __(' Add new meta info', 'porfo')),
								'params' => array(
									array(
										'type'			=> 'text',
										'label'			=> __( 'Meta title', 'porfo' ),
										'name'			=> 'title',
										'description'	=> __( 'Add portfolio meta title.', 'porfo' ),
										'value'			=> 'Author Name:',
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Meta info', 'porfo' ),
										'name'			=> 'info',
										'description'	=> __( 'Add portfolio meta info.', 'porfo' ),
										'value'			=> 'John Doe',
									),
								),
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'porfo' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'porfo' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Wrapper' => array(
	                    					array(
	                    						'property' => 'margin',  'label' => 'Margin',
	                    						'property' => 'padding',  'label' => 'Padding'
	                    					),
			                    		)
		        					)
		        				)
		        			)
		        		)
		        	)
		        ),


		        'johny_project_nav' => array(
		        	'name' => esc_html__('Portfolio Project Nav - Porfo', 'porfo'),
		        	'description' => esc_html__('Add portfolio project navigation', 'porfo'),
		        	'category' => 'porfo',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Portfolio Project Nav - Porfo', 'porfo'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'select',
								'label'			=> __( 'Select Content', 'porfo' ),
								'name'			=> 'pf_nav_content',
								'description'	=> __( 'Select the content of portfolio nav.', 'porfo' ),
								'options'		=> array(
									'only_pf_nav'	=> 'Only Project Nav',
									'pf_nav_w_ss'	=> 'Project Nav With Social Share',
								),
								'default' 		=> 'pf_nav_w_ss'
							),
							array(
								'type'			=> 'select',
								'label'			=> __( 'Prev. Button Alignment', 'porfo' ),
								'name'			=> 'pf_nav_prev_align',
								'options'		=> array(
									'f-left'	=> 'Align Left',
									'f-right'	=> 'Align Right',
								),
								'default' 		=> 'f-left'
							),
							array(
								'type'			=> 'select',
								'label'			=> __( 'Next. Button Alignment', 'porfo' ),
								'name'			=> 'pf_nav_next_align',
								'options'		=> array(
									'f-left'	=> 'Align Left',
									'f-right'	=> 'Align Right',
								),
								'default' 		=> 'f-right'
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Previous Button Text', 'porfo' ),
								'name'			=> 'prev_btn_text',
								'description'	=> __( 'Enter text for previous project button.', 'porfo' ),
								'value'			=> 'Prev. Project',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Next Button Text', 'porfo' ),
								'name'			=> 'next_btn_text',
								'description'	=> __( 'Enter text for next project button.', 'porfo' ),
								'value'			=> 'Next. Project',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'porfo' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'porfo' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Button' => array(
	                    					array( 'property' => 'margin',  'label' => 'Margin', 'selector' => '+ .portfolio-details-nav' ),
	                    					array( 'property' => 'padding',  'label' => 'Padding' ),
			                    		),
			                    		'Wrapper' => array(
	                    					array( 'property' => 'margin',  'label' => 'Margin' ),
	                    					array( 'property' => 'padding',  'label' => 'Padding' ),
			                    		)
		        					)
		        				)
		        			)
		        		)
		        	)
		        ),

		    )
		);

	}


}
