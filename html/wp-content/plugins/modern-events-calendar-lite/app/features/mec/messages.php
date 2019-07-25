<?php
/** no direct access **/
defined('MECEXEC') or die();

$messages = $this->main->get_messages();
$values = $this->main->get_messages_options();
?>
<div class="wns-be-container wns-be-container-sticky">

    <div id="wns-be-infobar">
        <a href="" id="" class="dpr-btn dpr-save-btn"><?php _e('Save Changes', 'modern-events-calendar-lite'); ?></a>
    </div>

    <div class="wns-be-sidebar">

        <ul class="wns-be-group-menu">

            <li class="wns-be-group-menu-li has-sub">
                <a href="<?php echo $this->main->remove_qs_var('tab'); ?>" id="" class="wns-be-group-tab-link-a">
                    <span class="extra-icon">
                        <i class="sl-arrow-down"></i>
                    </span>
                    <i class="mec-sl-settings"></i> 
                    <span class="wns-be-group-menu-title"><?php _e('Settings', 'modern-events-calendar-lite'); ?></span>
                </a>
                <ul id="" class="submneu-hover">
                    <li class="submenu-item">
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#general_option"><?php _e('General Options', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#archive_options"><?php _e('Archive Pages', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#slug_option"><?php _e('Slugs/Permalinks', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#currency_option"><?php _e('Currency Options', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#recaptcha_option"><?php _e('Google Recaptcha Options', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#fes_option"><?php _e('Frontend Event Submission', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#user_profile_options"><?php _e('User Profile', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#search_bar_options"><?php _e('Search Bar', 'modern-events-calendar-lite'); ?></a>
                        <?php if($this->main->getPRO()): ?>
                            <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#mailchimp_option"><?php _e('Mailchimp Integration', 'modern-events-calendar-lite'); ?></a>
                        <?php endif; ?>
                        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>#uploadfield_option"><?php _e('Upload Field', 'modern-events-calendar-lite'); ?></a>
                    </li>
                </ul>
            </li>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-single'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-note"></i> 
                    <span class="wns-be-group-menu-title"><?php echo __('Single Event', 'modern-events-calendar-lite'); ?></span>
                </a>
                <ul id="" class="submneu-hover">
                    <li class="submenu-item">
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-single'); ?>#event_options"><?php _e('Single Event Page', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-single'); ?>#countdown_option"><?php _e('Countdown Options', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-single'); ?>#exceptional_option"><?php _e('Exceptional Days', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-single'); ?>#additional_organizers"><?php _e('Additional Organizers', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-single'); ?>#additional_locations"><?php _e('Additional Locations', 'modern-events-calendar-lite'); ?></a>
                    </li>
                </ul>
            </li>

            <?php if($this->main->getPRO()): ?>

                <li class="wns-be-group-menu-li">
                    <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-booking'); ?>" id="" class="wns-be-group-tab-link-a">
                        <i class="mec-sl-credit-card"></i> 
                        <span class="wns-be-group-menu-title"><?php echo __('Booking', 'modern-events-calendar-lite'); ?></span>
                    </a>
                    <ul id="" class="submneu-hover">
                        <li class="submenu-item">
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-booking'); ?>#booking_option"><?php _e('Booking', 'modern-events-calendar-lite'); ?></a>
                            <?php if(isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
                                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-booking'); ?>#coupon_option"><?php _e('Coupons', 'modern-events-calendar-lite'); ?></a>
                                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-booking'); ?>#taxes_option"><?php _e('Taxes / Fees', 'modern-events-calendar-lite'); ?></a>
                                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-booking'); ?>#ticket_variations_option"><?php _e('Ticket Variations & Options', 'modern-events-calendar-lite'); ?></a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </li>

            <?php endif; ?>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-grid"></i> 
                    <span class="wns-be-group-menu-title"><?php echo __('Modules', 'modern-events-calendar-lite'); ?></span>
                </a>
                <ul id="" class="submneu-hover">
                    <li class="submenu-item">
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#speakers_option"><?php _e('Speakers', 'modern-events-calendar-lite'); ?></a>
                        <?php if($this->main->getPRO()): ?>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#googlemap_option"><?php _e('Google Maps Options', 'modern-events-calendar-lite'); ?></a>
                        <?php endif; ?>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#export_module_option"><?php _e('Export Options', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#time_module_option"><?php _e('Local Time', 'modern-events-calendar-lite'); ?></a>
                        <?php if($this->main->getPRO()): ?>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#qrcode_module_option"><?php _e('QR Code', 'modern-events-calendar-lite'); ?></a>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#weather_module_option"><?php _e('Weather', 'modern-events-calendar-lite'); ?></a>
                        <?php endif; ?>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#social_options"><?php _e('Social Networks', 'modern-events-calendar-lite'); ?></a>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#next_event_option"><?php _e('Next Event', 'modern-events-calendar-lite'); ?></a>
                        <?php if($this->main->getPRO()): ?>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-modules'); ?>#buddy_option"><?php _e('BuddyPress Integration', 'modern-events-calendar-lite'); ?></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </li>

            <?php if($this->main->getPRO() and isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>

                <li class="wns-be-group-menu-li">
                    <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-reg-form'); ?>" id="" class="wns-be-group-tab-link-a">
                        <i class="mec-sl-layers"></i> 
                        <span class="wns-be-group-menu-title"><?php _e('Booking Form', 'modern-events-calendar-lite'); ?></span>
                    </a>
                </li>

                <li class="wns-be-group-menu-li">
                    <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-gateways'); ?>" id="" class="wns-be-group-tab-link-a">
                        <i class="mec-sl-wallet"></i> 
                        <span class="wns-be-group-menu-title"><?php _e('Payment Gateways', 'modern-events-calendar-lite'); ?></span>
                    </a>
                </li>

            <?php endif;?>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-envelope"></i> 
                    <span class="wns-be-group-menu-title"><?php _e('Notifications', 'modern-events-calendar-lite'); ?></span>
                </a>
                <ul id="" class="submneu-hover">
                    <li class="submenu-item">
                        <?php if(isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>#booking_notification"><?php _e('Booking', 'modern-events-calendar-lite'); ?></a>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>#booking_verification"><?php _e('Booking Verification', 'modern-events-calendar-lite'); ?></a>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>#booking_confirmation"><?php _e('Booking Confirmation', 'modern-events-calendar-lite'); ?></a>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>#cancellation_notification"><?php _e('Booking Cancellation', 'modern-events-calendar-lite'); ?></a>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>#admin_notification"><?php _e('Admin', 'modern-events-calendar-lite'); ?></a>
                            <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>#booking_reminder"><?php _e('Booking Reminder', 'modern-events-calendar-lite'); ?></a>
                        <?php endif; ?>
                        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>#new_event"><?php _e('New Event', 'modern-events-calendar-lite'); ?></a>
                    </li>
                </ul>
            </li> 

            <li class="wns-be-group-menu-li">
                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-styling'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-equalizer"></i> 
                    <span class="wns-be-group-menu-title"><?php _e('Styling Options', 'modern-events-calendar-lite'); ?></span>
                </a>
            </li>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-customcss'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-wrench"></i> 
                    <span class="wns-be-group-menu-title"><?php _e('Custom CSS', 'modern-events-calendar-lite'); ?></span>
                </a>
            </li>

            <li class="wns-be-group-menu-li active">
                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-messages'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-bubble"></i> 
                    <span class="wns-be-group-menu-title"><?php _e('Messages', 'modern-events-calendar-lite'); ?></span>
                </a>
            </li>

            <li class="wns-be-group-menu-li">
                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-ie'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-refresh"></i> 
                    <span class="wns-be-group-menu-title"><?php _e('Import / Export', 'modern-events-calendar-lite'); ?></span>
                </a>
            </li>

        </ul>
    </div>

    <div class="wns-be-main">

        <div id="wns-be-notification"></div>

        <div id="wns-be-content">
            <div class="wns-be-group-tab">
                <h2><?php _e('Messages', 'modern-events-calendar-lite'); ?></h2>
                <div class="mec-container">
                    <form id="mec_messages_form">
                        <p><?php _e("You can change some MEC messages here simply. For example if you like to change \"REGISTER\" button label, you can do it here. By the Way, if your website is a multilingual website, we recommend you to change the messages/phrases from language files.", 'modern-events-calendar-lite'); ?></p>
                        <div class="mec-form-row" id="mec_messages_form_container">
                            <ul class="mec-accordion mec-message-categories" id="mec_message_categories_wp">
                                <?php foreach($messages as $cat_key=>$category): ?>
                                    <li class="mec-acc-label" data-key="<?php echo $cat_key; ?>" data-status="close"><?php echo $category['category']['name']; ?></li>
                                    <ul id="mec-acc-<?php echo $cat_key; ?>">
                                        <?php foreach($category['messages'] as $key=>$message): ?>
                                            <li>
                                                <label for="<?php echo 'mec_m_'.$key; ?>"><?php echo $message['label']; ?></label>
                                                <input id="<?php echo 'mec_m_'.$key; ?>" name="mec[messages][<?php echo $key; ?>]" type="text" placeholder="<?php echo esc_attr($message['default']); ?>" value="<?php echo (isset($values[$key]) and trim($values[$key])) ? esc_attr($values[$key]) : ''; ?>" />
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="mec-form-row">
                            <?php wp_nonce_field('mec_options_form'); ?>
                            <button style="display: none;" id="mec_messages_form_button" class="button button-primary mec-button-primary" type="submit"><?php _e('Save Changes', 'modern-events-calendar-lite'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="wns-be-footer">
        <a href="" id="" class="dpr-btn dpr-save-btn"><?php _e('Save Changes', 'modern-events-calendar-lite'); ?></a>
    </div>

</div>

<script type="text/javascript">
jQuery(document).ready(function()
{
    jQuery(".dpr-save-btn").on('click', function(event) {
        event.preventDefault();
        jQuery("#mec_messages_form_button").trigger('click');
    });
});
jQuery("#mec_messages_form").on('submit', function(event)
{
    event.preventDefault();
    
    // Add loading Class to the button
    jQuery(".dpr-save-btn").addClass('loading').text("<?php echo esc_js(esc_attr__('Saved', 'modern-events-calendar-lite')); ?>");
    jQuery('<div class="wns-saved-settings"><?php echo esc_js(esc_attr__('Settings Saved!', 'modern-events-calendar-lite')); ?></div>').insertBefore('#wns-be-content');

    var messages = jQuery("#mec_messages_form").serialize();
    jQuery.ajax(
    {
        type: "POST",
        url: ajaxurl,
        data: "action=mec_save_messages&"+messages,
        beforeSend: function () {
            jQuery('.wns-be-main').append('<div class="mec-loarder-wrap mec-settings-loader"><div class="mec-loarder"><div></div><div></div><div></div></div></div>');
        },
        success: function(data)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery(".dpr-save-btn").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'modern-events-calendar-lite')); ?>");
                jQuery('.wns-saved-settings').remove();
                jQuery('.mec-loarder-wrap').remove();
            }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery(".dpr-save-btn").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'modern-events-calendar-lite')); ?>");
                jQuery('.wns-saved-settings').remove();
                jQuery('.mec-loarder-wrap').remove();
            }, 1000);
        }
    });
});
</script>