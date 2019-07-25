<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
$etdabba_etcodes_theme = wp_get_theme();
$etdabba_etcodes_version = $etdabba_etcodes_theme->get( 'Version' );
$etdabba_etcodes_template_directory = get_template_directory_uri();

/***********************************************************************************************/
/* Enqueue the fonts, Js, CSS files. */
/***********************************************************************************************/

/************* Enqueue Fonts files *********************/

wp_enqueue_style(
    'etdabba-etcodes-google-fonts',
    etdabba_etcodes_google_fonts_url(),
    array(),
    $etdabba_etcodes_version
);

/************* Enqueue css files *********************/


// Load bootstrap stylesheet.
wp_enqueue_style(
    'bootstrap',
    $etdabba_etcodes_template_directory . '/assets/css/bootstrap.build.css',
    array(),
    $etdabba_etcodes_version
);

// Load font-awesome stylesheet.
wp_enqueue_style(
    'font-awesome',
    $etdabba_etcodes_template_directory . '/assets/css/fontawesome.build.css',
    array(),
    $etdabba_etcodes_version
);


// Load app stylesheet.
wp_enqueue_style(
    'etdabba-etcodes-app-build',
    $etdabba_etcodes_template_directory . '/assets/css/app.build.css',
    array(),
    $etdabba_etcodes_version
);

if ( class_exists( 'WooCommerce' ) ) {
    // Load woocommerce stylesheet.
    wp_enqueue_style(
        'etdabba-etcodes-woocommerce-build',
        $etdabba_etcodes_template_directory . '/assets/css/woocommerce.build.css',
        array(),
        $etdabba_etcodes_version
    );
}

/************* Enqueue js files *********************/

// Load bootstrap js.
wp_enqueue_script(
    'bootstrap',
    $etdabba_etcodes_template_directory . '/assets/js/bootstrap.build.js',
    array('jquery'),
    $etdabba_etcodes_version,
    true
);

// Load isotope js.
wp_enqueue_script(
    'isotope',
    $etdabba_etcodes_template_directory . '/assets/js/isotope.build.js',
    array('jquery'),
    $etdabba_etcodes_version,
    true
);

// Load app main js.
wp_enqueue_script(
    'etdabba-etcodes-main',
    $etdabba_etcodes_template_directory . '/assets/js/main.js',
    array('jquery'),
    $etdabba_etcodes_version,
    true
);

// on single blog post pages with comments open and threaded comments
if (is_singular() && comments_open() && get_option('thread_comments')) {
    // enqueue the javascript that performs in-link comment reply fanciness
    wp_enqueue_script('comment-reply');
}
