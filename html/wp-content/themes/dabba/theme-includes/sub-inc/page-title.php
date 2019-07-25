<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
if (!function_exists('etdabba_etcodes_get_title')) {
    function etdabba_etcodes_get_title()
    {

        $breadcrumb_opt = 'yes';
        $page_id = get_the_ID();
        $the_title = get_the_title();
        $page_title     = get_post_meta($page_id, 'ecp_etcodes_page_title', true) ? get_post_meta($page_id, 'ecp_etcodes_page_title', true) : 'on';

        // Theme Settings
        $page_title_container_width = get_theme_mod('etdabba_etcodes_page_title_container_width') == true ? 'alignwide' : '';
        $title_position   =  get_post_meta($page_id, 'ecp_etcodes_page_title_position', true) ? get_post_meta($page_id, 'ecp_etcodes_page_title_position', true) : 'text-left';
        $breadcrumb_opt   =  get_theme_mod('etdabba_etcodes_page_title_container_breadcrumb', true);


        if(is_home()) {
            $page_id = get_option('page_for_posts');
            $the_title = $page_id !== '0' ? get_the_title($page_id) : 'Blog';
            $page_title_container_width = 'alignwide';
        }
        if(class_exists('WooCommerce') && is_shop() || class_exists('WooCommerce') && is_product_category()) {
            $page_id = wc_get_page_id( 'shop' );
            $the_title = woocommerce_page_title(false);
            $page_title_container_width = 'alignwide';
        }
        
        ?>

        <?php if ($page_title == 'on' && !is_singular( array( 'post', 'product' )) ): ?>
            <div class="page-main-title">
                
                <div class="entry-content">
                    <div class="row no-gutters align-items-center  <?php echo esc_attr($page_title_container_width); ?>">
                    
                    <?php if ($title_position == 'text-left'){ ?>
                        <div class="col-lg-7">
                            <h3 class="entry-title"><?php echo esc_html($the_title); ?></h3>
                        </div>
                        <div class="col-lg-5 align-self-center text-lg-right">
                            <?php if ($breadcrumb_opt) {
                                if(class_exists('WooCommerce') && is_shop() || class_exists('WooCommerce') && is_product_category()) {
                                    woocommerce_breadcrumb(array('delimiter' => ' > '));
                                } else {
                                    etdabba_etcodes_ext_breadcrumbs();
                                }
                            } ?>
                        </div>
                    <?php } elseif($title_position == 'text-center') {?>
                        <div class="col-lg-12 text-center">
                            <h3 class="entry-title mb-3"><?php echo esc_html($the_title); ?></h3>
                            <?php if ($breadcrumb_opt) {
                                if(class_exists('WooCommerce') && is_shop() || class_exists('WooCommerce') && is_product_category()) {
                                    woocommerce_breadcrumb(array('delimiter' => ' > '));
                                } else {
                                    etdabba_etcodes_ext_breadcrumbs();
                                }
                            } ?>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-7 text-center text-lg-right">
                            <h3 class="entry-title"><?php echo esc_html($the_title); ?></h3>
                        </div>
                        <div class="col-lg-5 align-self-center text-center  text-md-left order-md-first">
                            <?php if ($breadcrumb_opt) {
                                if(class_exists('WooCommerce') && is_shop() || class_exists('WooCommerce') && is_product_category()) {
                                    woocommerce_breadcrumb(array('delimiter' => ' > '));
                                } else {
                                    etdabba_etcodes_ext_breadcrumbs();
                                }
                            } ?>
                        </div> 
                    <?php }?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (is_singular( array( 'post') ) && get_theme_mod('etdabba_etcodes_single_post_breadcrumbs', false) == true && function_exists('etdabba_etcodes_ext_breadcrumbs')  ): ?>
            <div class="page-main-title mb-60px">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 align-self-center text-center text-md-left">
                        <?php etdabba_etcodes_ext_breadcrumbs(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (is_singular( array('product' ) ) && function_exists('etdabba_etcodes_ext_breadcrumbs') ): ?>
            <div class="page-main-title mb-60px">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 align-self-center text-center text-md-left">
                            <?php woocommerce_breadcrumb(array('delimiter' => ' > ')); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php
    }
}