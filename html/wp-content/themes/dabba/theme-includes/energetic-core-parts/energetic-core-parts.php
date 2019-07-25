<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}

// Post Block style
add_filter( 'ecp_post_style_list_filter','etdabba_etcodes_post_style_list_filter' );
function etdabba_etcodes_post_style_list_filter($postStyleList) {
    return $postStyleList = array(
		array( 'value' => 'stander-post-style', 'label' => 'Stander Post Style'),
        array( 'value' => 'card-post-style', 'label' => 'Card Post Style'),
        array( 'value' => 'blog-img-overlay', 'label' => 'Blog image overlay'),
	);
}

// Post Block style
add_filter( 'ecp_post_carousel_style_list_filter','etdabba_etcodes_post_carousel_style_list_filter' );
function etdabba_etcodes_post_carousel_style_list_filter($postStyleList) {
    return $postStyleList = array(
        array('value' => 'post-carousel-style', 'label' => 'Stander Post Style'),
        array('value' => 'card-post-carousel-style', 'label' => 'Card Post Style'),
        array('value' => 'blog-img-overlay', 'label' => 'Blog image overlay'),
	);
}