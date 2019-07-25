<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
/***********************************************************************************************/
/* Template for the default post format */
/***********************************************************************************************/

etdabba_etcodes_single_post_image(); ?>
<div class="entry-content-wrapper">
<?php
    etdabba_etcodes_single_entry_meta_top();
    etdabba_etcodes_single_entry_title();
    echo etdabba_etcodes_excerpt(55);
    etdabba_etcodes_single_post_readmore_btn(); 
?>
</div>