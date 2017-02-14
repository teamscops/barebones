<?php
/**
 * Barebones Theme Customizer
 *
 * @package Barebones
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function barebones_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	require get_template_directory() . '/library/customizer/google-fonts/google-fonts-customizer.php';

	/**
	Layout
	**/

	//section
	$wp_customize->add_section( 'barebones_layout', array(
		'title' => __( 'Layout', 'barebones' ),
		'priority' => 20,
		) );

	// Primary
	$wp_customize->add_setting( 'barebones_app__margin', array(
		'default' => 100,
		) );
	$wp_customize->add_control( 'barebones_app__margin_control', array(
		'section' => 'barebones_layout',
		'settings' => 'barebones_app__margin',
		'type' => 'range',
		'label' => __( 'App Margin' ),
		'description' => __( 'This is the range control for the outer margin of your app.' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
			),
		) );

}
add_action( 'customize_register', 'barebones_customize_register' );

/**
 * Prints inline css
 */
function barebones_customizer_head_styles() {

	$barebones_font_main = get_theme_mod('main_google_font_list');
	$barebones_font_headings = get_theme_mod('headings_google_font_list');
	$barebones_app__margin = get_theme_mod('barebones_app__margin');

	?>
	<style type="text/css">
		html, body {
			font-family: <?php echo $barebones_font_main; ?>;
		}
		h1, h2, h3, h4, h5, h6,
		.site-title a {
			font-family: <?php echo $barebones_font_headings; ?>
		}
		@media screen and (min-width: 767px) {
			body {
				margin: <?php echo $barebones_app__margin; ?>px !important;
			}
		}
	</style>
	<?php
}

add_action( 'wp_head', 'barebones_customizer_head_styles' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function barebones_customize_preview_js() {
	wp_enqueue_script( 'barebones_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'barebones_customize_preview_js' );
