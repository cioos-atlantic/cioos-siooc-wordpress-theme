<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
/***********************************************************************************************/
/* Template for the Video post format */
/***********************************************************************************************/

$content = apply_filters('the_content', get_the_content());
$video = false;

if (false === strpos($content, 'wp-playlist-script')) {
    $video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
}

if (!empty($video)) {
    foreach ($video as $video_html) {
        echo '<div class="entry-media mb-0 mx-auto embed-responsive embed-responsive-16by9">';
        echo do_shortcode($video_html);
        echo '</div>';
    }
} else {
    etdabba_etcodes_single_post_image();
}

?><div class="entry-content-wrapper"><?php
etdabba_etcodes_single_entry_meta_top();
etdabba_etcodes_single_entry_title();
echo etdabba_etcodes_excerpt(55);
etdabba_etcodes_single_post_readmore_btn();
?></div>