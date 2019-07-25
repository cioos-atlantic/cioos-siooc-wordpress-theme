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
	'etdabba-etcodes-admin-build',
	$etdabba_etcodes_template_directory . '/assets/css/admin.build.css',
	array(),
    $etdabba_etcodes_version
);


wp_enqueue_script(
	'etdabba-customizer-controls',
	$etdabba_etcodes_template_directory . '/assets/js/customizer-controls.js',
	array( 'customize-controls'),
    $etdabba_etcodes_version,
	true
);