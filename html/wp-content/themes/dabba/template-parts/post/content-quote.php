<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
/***********************************************************************************************/
/* Template for the Quote post format */
/***********************************************************************************************/

$quote = false;
if (preg_match('/<blockquote.*?>(.*?)<\/blockquote>/is', get_the_content(), $matches)) {
    if ($matches[1]) {
        $quote = $matches[1];
    }
}

etdabba_etcodes_single_post_image();
if ($quote) {?>
        <div class="entry-media post_blockquote">
            <a href="<?php the_permalink();?>"><blockquote><?php echo wp_kses_post($quote); ?></blockquote></a>
         </div>
    <?php
?><div class="entry-content-wrapper"><?php
etdabba_etcodes_single_entry_meta_top();
    ?></div><?php
} else {?>
<div class="entry-content-wrapper">
    <?php
    etdabba_etcodes_single_entry_meta_top();
    etdabba_etcodes_single_entry_title();
    echo etdabba_etcodes_excerpt(55);
    etdabba_etcodes_single_post_readmore_btn();
    ?>
</div>
<?php }
