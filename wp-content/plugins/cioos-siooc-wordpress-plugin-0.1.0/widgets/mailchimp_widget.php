<?php
namespace CIOOS\Widgets;
 
// Creating the widget 
class mailchimp_widget extends \WP_Widget {
    
    function __construct() {
        parent::__construct(
            
            // Base ID of your widget
            'mailchimp_widget', 
            
            // Widget name will appear in UI
            __('Mailchimp Widget', 'cioos-siooc-wordpress-plugin'), 
            
            // Widget description
            array( 'description' => __( 'Widget to display the mailchimp subscription form', 'cioos-siooc-wordpress-plugin' ), ) 
        );
    }
    
    // Creating widget front-end
    
    public function widget( $args, $instance ) {
        $api_key = apply_filters( 'widget_api_key', $instance['api_key'] );
        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        // if ( ! empty( $title ) )
        //     echo $args['before_title'] . $title . $args['after_title'];
        ?>
        <h3 class="footer-widget-title"><span> <?php _e( 'SUBSCRIBE TO CIOOS VIA EMAIL', 'cioos-siooc-wordpress-plugin' ); ?></span></h3><div class="textwidget custom-html-widget"><!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; }
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="mc_embed_signup">
            <form action="<?php echo($api_key); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                <div id="mc_embed_signup_scroll">
                    <div class="mc-field-group input-group clearfix">
                        <label><?php _e('I am interested in:', 'cioos-siooc-wordpress-plugin'); ?> </label>
                        <div class="block_1">
                            <ul>
                                <li><input type="checkbox" value="1" name="group[3249][1]" id="mce-group[3249]-3249-0"><label for="mce-group[3249]-3249-0"><?php _e('General news', 'cioos-siooc-wordpress-plugin'); ?></label></li>
                                <li><input type="checkbox" value="2" name="group[3249][2]" id="mce-group[3249]-3249-1"><label for="mce-group[3249]-3249-1"><?php _e('Physical data', 'cioos-siooc-wordpress-plugin'); ?></label></li>
                                <li><input type="checkbox" value="4" name="group[3249][4]" id="mce-group[3249]-3249-2"><label for="mce-group[3249]-3249-2"><?php _e('Geochemical data', 'cioos-siooc-wordpress-plugin'); ?></label></li>
                            </ul>
                        </div>
                        <div class="block_2">
                            <ul>
                                <li><input type="checkbox" value="8" name="group[3249][8]" id="mce-group[3249]-3249-3"><label for="mce-group[3249]-3249-3"><?php _e('Biological data', 'cioos-siooc-wordpress-plugin'); ?></label></li>
                                <li><input type="checkbox" value="16" name="group[3249][16]" id="mce-group[3249]-3249-4"><label for="mce-group[3249]-3249-4"><?php _e('Sociological data', 'cioos-siooc-wordpress-plugin'); ?></label></li>
                                <li><input type="checkbox" value="32" name="group[3249][32]" id="mce-group[3249]-3249-5"><label for="mce-group[3249]-3249-5"><?php _e('Cross-sector data', 'cioos-siooc-wordpress-plugin'); ?></label></li>
                            </ul>
                        </div>
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div class="subcribe_container">
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" tabindex="-1" value=""></div>
                        <div class="mc-field-group email">
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="<?php _e('Email Address', 'cioos-siooc-wordpress-plugin'); ?>">
                        </div>
                    <div class="clear"><input type="submit" value="<?php _e('Subscribe', 'cioos-siooc-wordpress-plugin'); ?>" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </div>
            </form>
        </div>

        <!--End mc_embed_signup--></div>
        <?php
        
        // This is where you run the code and display the output
        // echo __( 'Hello, World!', 'wpb_widget_domain' );
        echo $args['after_widget'];
    }
            
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'api_key' ] ) ) {
            $api_key = $instance[ 'api_key' ];
        } else {
            $api_key = __( 'API key', 'cioos-siooc-wordpress-plugin' );
        }
        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'api_key' ); ?>"><?php __( 'API Key:', 'cioos-siooc-wordpress-plugin' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'api_key' ); ?>" name="<?php echo $this->get_field_name( 'api_key' ); ?>" type="text" value="<?php echo esc_attr( $api_key ); ?>" />
        </p>
        <?php 
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['api_key'] = ( ! empty( $new_instance['api_key'] ) ) ? strip_tags( $new_instance['api_key'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

?>