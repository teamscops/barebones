<?php
/*--------------------------------------------------------------
## Google Fonts
Credit: http://madebydenis.com/adding-google-fonts-to-your-wordpress-theme/
--------------------------------------------------------------*/
if ( ! function_exists( 'barebones_fonts_url' ) ){
	function barebones_fonts_url($name = FALSE) {
		$fonts_url = '';
		$main_font = get_theme_mod('main_google_font_list', '');
		$headings_font = get_theme_mod('headings_google_font_list', '');
	    // Translators: If there are characters in your language that are not supported by Google font, translate it to 'off'. Do not translate into your own language.
	    // $main_font = _x( 'on', ''.$main_font.' font: on or off', 'yourtheme' );
	    // $headings_font = _x( 'on', ''.$headings_font.' font: on or off', 'yourtheme' );

		if ( 'off' !== $main_font || 'off' !== $headings_font ) {
			$font_families = array();

			if ( 'off' !== $main_font ) {
				$font_families[] = $main_font;
			}

			if ( 'off' !== $headings_font ) {
				$font_families[] = $headings_font;
			}

			$query_args = array(
				'family' => urlencode( implode( '|', array_unique($font_families) ) ),
				);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
		return esc_url_raw( $fonts_url );
	}
}
