<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */
$etdabba_etcodes_theme = wp_get_theme();
$etdabba_etcodes_version = $etdabba_etcodes_theme->get( 'Version' );
$etdabba_etcodes_template_directory = get_template_directory_uri();

wp_enqueue_style(
	'etdabba-etcodes-editor-build',
	$etdabba_etcodes_template_directory . '/assets/css/editor.build.css',
	array(),
    $etdabba_etcodes_version
);

/************* Enqueue Fonts files *********************/

wp_enqueue_style(
    'etdabba-etcodes-google-fonts',
    etdabba_etcodes_google_fonts_url(),
    array(),
    $etdabba_etcodes_version
);