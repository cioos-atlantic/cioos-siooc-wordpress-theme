<?php

	function enqueue_parent_styles() {
	   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

//==================================================================================
// Header iframe options and security policy
//===================================================================================

    function addheaders() {        
        
        header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' data: *.googleapis.com *.gstatic.com *.bootstrapcdn.com *.rawgit.com *.polyfill.io *.gebco.net *.mailchimp.com;");
        header("Access-Control-Allow-Origin: *");
        header("X-Frame-Options: SAMEORIGIN" );
        header("X-XSS-Protection: 1; mode=block");
        header("Strict-Transport-Security: max-age=31536000");
        header("Referrer-Policy: no-referrer-when-downgrade");

        if ($wp_query->is_404) {
            header("HTTP/1.0 404 Not Found");
        }
    }
    add_action('init','addheaders');

    define( 'WP_DEBUG', false );

?>