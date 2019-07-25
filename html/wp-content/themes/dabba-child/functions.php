<?php if ( ! defined( 'WP_DEBUG' ) ) {
	die( 'Direct access forbidden.' );
}

function etcode_dabba_child_style_enqueue_scripts() {
    wp_enqueue_style( 'dabba-child-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'etcode_dabba_child_style_enqueue_scripts' );
