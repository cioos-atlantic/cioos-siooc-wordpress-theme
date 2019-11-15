<?php

	function enqueue_parent_styles() {
	    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    }

    add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );







// =======================================================
// Disable Jquery core, replace with new
// ======================================================= 

    function my_jquery_enqueue() {
       wp_deregister_script('jquery');
       wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js", false, null);
       
    }
    add_action("wp_enqueue_scripts", "my_jquery_enqueue");




//Dequeue JavaScripts
function dequeue_unnecessary_scripts() {
    wp_dequeue_script( 'modernizr-js' );
    wp_dequeue_script( 'prettyPhoto' ); 
    wp_dequeue_script( 'modernizr' );
    wp_dequeue_script( 'sticky' );
    wp_dequeue_script( 'waypoints' );
    wp_dequeue_script( 'waypoints-sticky' ); 
    wp_dequeue_script( 'videobg' );
    wp_dequeue_script( 'jquery-scrollup' ); 
    wp_dequeue_script( 'thinkup-bootstrap' ); 
    wp_dequeue_script( 'thinkup-frontend' ); 
    wp_dequeue_script( 'jquery-masonry' );
    wp_dequeue_script( 'thinkup-portfolio' ); 
    wp_dequeue_script( 'thinkup-quicksand' ); 
    wp_dequeue_script( 'thinkup-quicksand-scale');
    wp_dequeue_script( 'responsiveslides' );
    wp_dequeue_script( 'thinkup-responsiveslides' ); 
    wp_dequeue_script( 'comment-reply' );
    wp_dequeue_script( 'bootstrap' ); 
    wp_dequeue_script( 'thinkup-confirm' ); 
    wp_dequeue_script( 'thinkup-backend' ); 
    wp_dequeue_script( 'carouFredSel' ); 
    wp_dequeue_script( 'knob' );
    wp_dequeue_script( 'responsiveslides' );
    wp_dequeue_script( 'thinkup-responsiveslides' ); 
    wp_dequeue_script( 'jquery-ui-core' ); 
    wp_dequeue_script( 'jquery-ui-widget' );
    wp_dequeue_script( 'jquery-ui-mouse' );
    wp_dequeue_script( 'jquery-ui-draggable');
    wp_dequeue_script( 'underscore');
    wp_dequeue_script( 'backbone');
    wp_dequeue_script( 'backbone-marionette');
    wp_dequeue_script( 'backbone-radio');
    wp_dequeue_script( 'elementor-common-modules');
    wp_dequeue_script( 'jquery-ui-position');
    wp_dequeue_script( 'elementor-dialog');
    wp_dequeue_script( 'elementor-common');
    wp_dequeue_script( 'thinkupverification');
    wp_dequeue_script( 'bellows');
    wp_dequeue_script( 'hoverIntent');
    wp_dequeue_script( 'megamenu');
    wp_dequeue_script( 'megamenu-pro');
    wp_dequeue_script( 'elementor-frontend-modules');
    wp_dequeue_script( 'elementor-waypoints');
    wp_dequeue_script( 'swiper');
    wp_dequeue_script( 'elementor-frontend');
    wp_dequeue_script( 'tweetscroll');
}
add_action( 'wp_print_scripts', 'dequeue_unnecessary_scripts', 1);
// =======================================================
// Enqueue scripts and styles.
// ======================================================= 

    function assetmap_scripts() {
        
        // CSS
        wp_enqueue_style( 'asset-style', get_stylesheet_directory_uri().'/asset/css/asset.css' );
        wp_enqueue_style( 'map-style', get_stylesheet_directory_uri().'/asset/css/ol.css' );
       

        //google fonts
        wp_enqueue_style( 'gfont','https://fonts.googleapis.com/css?family=Montserrat:400,700,900|Quicksand:400,700&display=swap' );
        wp_enqueue_style( 'bootstyle','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

        // SCRIPTS
        if( is_front_page() ){ 
            wp_enqueue_script( 'map-build','https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js', array('jquery'), '', false  );
            wp_enqueue_script( 'polyfill','https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL', array('jquery'), '', false  );
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '', false  );
            wp_enqueue_script( 'i18', get_stylesheet_directory_uri() . '/asset/js/asset_i18n.js', array('jquery'), '', false   );
            wp_enqueue_script( 'assetckan', get_stylesheet_directory_uri() . '/asset/js/asset_ckan.js', array('jquery'), '', false   );
            wp_enqueue_script( 'assetgeneral', get_stylesheet_directory_uri() . '/asset/js/asset.js', array('jquery'), '', false   );
            wp_enqueue_script( 'assetol', get_stylesheet_directory_uri() . '/asset/js/asset_ol.js', array('jquery'), '', true   );
        }
        
    }
    add_action( 'wp_enqueue_scripts', 'assetmap_scripts', 10);





//==================================================================================
// Header iframe options and security policy
//===================================================================================

    function addheaders() {        
        
        header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' *.googleapis.com *.canada.ca *.gstatic.com *.bootstrapcdn.com *.rawgit.com *.polyfill.io *.gebco.net *.mailchimp.com cdn-images.mailchimp.com *.dropboxusercontent.com/s/pxxqg90g7zxtt8n/q67JXA0dJ1dt.js?ver=1573772173 *.gravatar.com data: ;");
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

    define( 'WP_DEBUG', true );

?>