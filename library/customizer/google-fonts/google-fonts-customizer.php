<?php
/*--------------------------------------------------------------
## Google Fonts
Credit: http://madebydenis.com/adding-google-fonts-to-your-wordpress-theme/
--------------------------------------------------------------*/
/**
Google Fonts settings
**/
$wp_customize->add_section('section_fonts', array(
	'title'		=> esc_html__('Google Fonts', 'barebones'),
	'priority'	=> 20,
	));
$wp_customize->add_setting( 'headings_google_font_list', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field',
	));
$wp_customize->add_setting( 'main_google_font_list', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field',
	));

require get_template_directory() . '/library/customizer/google-fonts/google-fonts-custom-control.php';
$wp_customize->add_control( new google_font_dropdown_custom_control( $wp_customize, 'headings_google_font_list', array(
	'label'      => __('Headings Google Font', 'barebones'),
	'section'    => 'section_fonts',
	'settings'   => 'headings_google_font_list',
	)));
$wp_customize->add_control( new google_font_dropdown_custom_control( $wp_customize, 'main_google_font_list', array(
	'label'      => __('Main Google Font', 'barebones'),
	'section'    => 'section_fonts',
	'settings'   => 'main_google_font_list',
	)));