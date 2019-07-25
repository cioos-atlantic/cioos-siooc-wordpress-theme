<?php
/** no direct access **/
defined('MECEXEC') or die();

$settings = $this->main->get_settings();

// WordPress Pages
$pages = get_pages();

?>
<div class="wns-be-container wns-be-container-sticky">
    <div id="wns-be-infobar">
        <input id="mec-search-settings" type="text" placeholder="Search..">
        <a id="" class="dpr-btn dpr-save-btn"><?php _e('Save Changes', 'modern-events-calendar-lite'); ?></a>
    </div>

    <div class="wns-be-sidebar">
        <ul class="wns-be-group-menu">

            <li class="wns-be-group-menu-li">
                <a href="<?php echo $this->main->remove_qs_var('tab'); ?>" id="" class="wns-be-group-tab-link-a">
                    <i class="mec-sl-settings"></i> 
                    <span class="wns-be-group-menu-title"><?php echo __('Settings', 'modern-events-calendar-lite'); ?></span>
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

            <li class="wns-be-group-menu-li has-sub active">

                <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-single'); ?>" id="" class="wns-be-group-tab-link-a">
                    <span class="extra-icon">
                        <i class="mec-sl-arrow-down"></i>
                    </span>
                    <i class="mec-sl-note"></i> 
                    <span class="wns-be-group-menu-title"><?php echo __('Single Event', 'modern-events-calendar-lite'); ?></span>
                </a>

                <ul id="" class="subsection" style="display: block;">

                    <li id="" class="pr-be-group-menu-li active">
                        <a data-id= "event_options" class="wns-be-group-tab-link-a WnTabLinks active">
                            <span class="pr-be-group-menu-title"><?php _e('Single Event Page', 'modern-events-calendar-lite'); ?></span>
                        </a>
                    </li>

                    <li id="" class="pr-be-group-menu-li">
                        <a data-id= "countdown_option" class="wns-be-group-tab-link-a WnTabLinks">
                            <span class="pr-be-group-menu-title"><?php _e('Countdown Options', 'modern-events-calendar-lite'); ?></span>
                        </a>
                    </li>

                    <li id="" class="pr-be-group-menu-li">
                        <a data-id= "exceptional_option" class="wns-be-group-tab-link-a WnTabLinks">
                            <span class="pr-be-group-menu-title"><?php _e('Exceptional Days', 'modern-events-calendar-lite'); ?></span>
                        </a>
                    </li>

                   <li id="" class="pr-be-group-menu-li">
                       <a data-id= "additional_organizers" class="wns-be-group-tab-link-a WnTabLinks">
                           <span class="pr-be-group-menu-title"><?php _e('Additional Organizers', 'modern-events-calendar-lite'); ?></span>
                       </a>
                   </li>

                   <li id="" class="pr-be-group-menu-li">
                       <a data-id= "additional_locations" class="wns-be-group-tab-link-a WnTabLinks">
                           <span class="pr-be-group-menu-title"><?php _e('Additional Locations', 'modern-events-calendar-lite'); ?></span>
                       </a>
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

            <li class="wns-be-group-menu-li">
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
                <div class="mec-container">

                    <form id="mec_single_form">

                        <div id="event_options" class="mec-options-fields active">

                            <h4 class="mec-form-subtitle"><?php _e('Single Event Page', 'modern-events-calendar-lite'); ?></h4>
                            <div class="mec-form-row">
                                <label class="mec-col-3" for="mec_settings_single_event_date_format1"><?php _e('Single Event Date Format', 'modern-events-calendar-lite'); ?></label>
                                <div class="mec-col-4">
                                    <input type="text" id="mec_settings_single_event_date_format1" name="mec[settings][single_date_format1]" value="<?php echo ((isset($settings['single_date_format1']) and trim($settings['single_date_format1']) != '') ? $settings['single_date_format1'] : 'M d Y'); ?>" />
                                    <span class="mec-tooltip">
                                        <div class="box">
                                            <h5 class="title"><?php _e('Single Event Date Format', 'modern-events-calendar-lite'); ?></h5>
                                            <div class="content"><p><?php esc_attr_e("Default is M d Y", 'modern-events-calendar-lite'); ?><a href="https://webnus.net/dox/modern-events-calendar/event-detailssingle-event-page/" target="_blank"><?php _e('Read More', 'modern-events-calendar-lite'); ?></a></p></div>    
                                        </div>
                                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mec-form-row">
                                <label class="mec-col-3" for="mec_settings_single_event_date_method"><?php _e('Date Method', 'modern-events-calendar-lite'); ?></label>
                                <div class="mec-col-4">
                                    <select id="mec_settings_single_event_date_method" name="mec[settings][single_date_method]">
                                        <option value="next" <?php echo (isset($settings['single_date_method']) and $settings['single_date_method'] == 'next') ? 'selected="selected"' : ''; ?>><?php _e('Next occurrence date', 'modern-events-calendar-lite'); ?></option>
                                        <option value="referred" <?php echo (isset($settings['single_date_method']) and $settings['single_date_method'] == 'referred') ? 'selected="selected"' : ''; ?>><?php _e('Referred date', 'modern-events-calendar-lite'); ?></option>
                                    </select>
                                    <span class="mec-tooltip">
                                        <div class="box">
                                            <h5 class="title"><?php _e('Date Method', 'modern-events-calendar-lite'); ?></h5>
                                            <div class="content"><p><?php esc_attr_e('Referred date" shows the event date based on referred date in event list.', 'modern-events-calendar-lite'); ?><a href="https://webnus.net/dox/modern-events-calendar/event-detailssingle-event-page/" target="_blank"><?php _e('Read More', 'modern-events-calendar-lite'); ?></a></p></div>    
                                        </div>
                                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mec-form-row">
                                <label class="mec-col-3" for="mec_settings_single_event_single_style"><?php _e('Single Event Style', 'modern-events-calendar-lite'); ?></label>
                                <div class="mec-col-4">
                                    <select id="mec_settings_single_event_single_style" name="mec[settings][single_single_style]">
                                        <option value="default" <?php echo (isset($settings['single_single_style']) and $settings['single_single_style'] == 'default') ? 'selected="selected"' : ''; ?>><?php _e('Default Style', 'modern-events-calendar-lite'); ?></option>
                                        <option value="modern" <?php echo (isset($settings['single_single_style']) and $settings['single_single_style'] == 'modern') ? 'selected="selected"' : ''; ?>><?php _e('Modern Style', 'modern-events-calendar-lite'); ?></option>
                                        <?php if ( is_plugin_active( 'mec-single-builder/mec-single-builder.php' ) ) : ?>
                                        <option value="builder" <?php echo (isset($settings['single_single_style']) and $settings['single_single_style'] == 'builder') ? 'selected="selected"' : ''; ?>><?php _e('Elementor Single Builder', 'modern-events-calendar-lite'); ?></option>
                                        <?php endif; ?>
                                    </select>
                                    <span class="mec-tooltip">
                                        <div class="box top">
                                            <h5 class="title"><?php _e('Single Event Style', 'modern-events-calendar-lite'); ?></h5>
                                            <div class="content"><p><?php esc_attr_e("Choose your single event style.", 'modern-events-calendar-lite'); ?><a href="https://webnus.net/dox/modern-events-calendar/event-detailssingle-event-page/" target="_blank"><?php _e('Read More', 'modern-events-calendar-lite'); ?></a></p></div>    
                                        </div>
                                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                                    </span>
                                </div>
                            </div>
                            <?php if($this->main->getPRO() and isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
                            <div class="mec-form-row">
                                <label class="mec-col-3" for="mec_settings_single_event_booking_style"><?php _e('Booking Style', 'modern-events-calendar-lite'); ?></label>
                                <div class="mec-col-4">
                                    <select id="mec_settings_single_event_booking_style" name="mec[settings][single_booking_style]">
                                        <option value="default" <?php echo (isset($settings['single_booking_style']) and $settings['single_booking_style'] == 'default') ? 'selected="selected"' : ''; ?>><?php _e('Default', 'modern-events-calendar-lite'); ?></option>
                                        <option value="modal" <?php echo (isset($settings['single_booking_style']) and $settings['single_booking_style'] == 'modal') ? 'selected="selected"' : ''; ?>><?php _e('Modal', 'modern-events-calendar-lite'); ?></option>
                                    </select>
                                    <span class="mec-tooltip">
                                        <div class="box top">
                                            <h5 class="title"><?php _e('Booking Style', 'modern-events-calendar-lite'); ?></h5>
                                            <div class="content"><p><?php esc_attr_e("Choose your Booking style, Please Note: When you set this feature to modal you can not see booking box if you set popoup module view on shortcodes", 'modern-events-calendar-lite'); ?><a href="https://webnus.net/dox/modern-events-calendar/event-detailssingle-event-page/" target="_blank"><?php _e('Read More', 'modern-events-calendar-lite'); ?></a></p></div>    
                                        </div>
                                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                                    </span>
                                </div>
                            </div>
                            <?php endif;?> 
                            <div class="mec-form-row">
                            <label class="mec-col-3" for="mec_settings_gutenberg"><?php _e('Disable Block Editor (Gutenberg)', 'modern-events-calendar-lite'); ?></label>
                                <label id="mec_settings_gutenberg" >
                                    <input type="hidden" name="mec[settings][gutenberg]" value="0" />
                                    <input value="1" type="checkbox" name="mec[settings][gutenberg]" <?php if(!isset($settings['gutenberg']) or (isset($settings['gutenberg']) and $settings['gutenberg'])) echo 'checked="checked"'; ?> /> <?php _e('Disable Block Editor', 'modern-events-calendar-lite'); ?>
                                </label>
                                <span class="mec-tooltip">
                                    <div class="box top">
                                        <h5 class="title"><?php _e('Block Editor', 'modern-events-calendar-lite'); ?></h5>
                                        <div class="content"><p><?php esc_attr_e("If you want to use the new WordPress block editor you should keep this checkbox unchecked.", 'modern-events-calendar-lite'); ?><a href="https://webnus.net/dox/modern-events-calendar/event-detailssingle-event-page/" target="_blank"><?php _e('Read More', 'modern-events-calendar-lite'); ?></a></p></div>
                                    </div>
                                    <i title="" class="dashicons-before dashicons-editor-help"></i>
                                </span>
                            </div>
                            <div class="mec-form-row">
                            <label class="mec-col-3" for="mec_settings_breadcrumbs"><?php _e('Breadcrumbs', 'modern-events-calendar-lite'); ?></label>
                                <label id="mec_settings_breadcrumbs" >
                                    <input type="hidden" name="mec[settings][breadcrumbs]" value="0" />
                                    <input type="checkbox" name="mec[settings][breadcrumbs]" id="mec_settings_breadcrumbs" <?php echo ((isset($settings['breadcrumbs']) and $settings['breadcrumbs']) ? 'checked="checked"' : ''); ?> value="1" /><?php _e('Enable Breadcrumbs.', 'modern-events-calendar-lite'); ?>
                                </label>
                                <span class="mec-tooltip">
                                    <div class="box top">
                                        <h5 class="title"><?php _e('Breadcrumbs', 'modern-events-calendar-lite'); ?></h5>
                                        <div class="content"><p><?php esc_attr_e("Check this option, for showing the breadcrumbs on single event page", 'modern-events-calendar-lite'); ?><a href="https://webnus.net/dox/modern-events-calendar/event-detailssingle-event-page/" target="_blank"><?php _e('Read More', 'modern-events-calendar-lite'); ?></a></p></div>
                                    </div>
                                    <i title="" class="dashicons-before dashicons-editor-help"></i>
                                </span>
                            </div>

                        </div>

                        <div id="countdown_option" class="mec-options-fields">
                            <h4 class="mec-form-subtitle"><?php _e('Countdown Options', 'modern-events-calendar-lite'); ?></h4>
                            <div class="mec-form-row">
                                <label>
                                    <input type="hidden" name="mec[settings][countdown_status]" value="0" />
                                    <input onchange="jQuery('#mec_count_down_container_toggle').toggle();" value="1" type="checkbox" name="mec[settings][countdown_status]" <?php if(isset($settings['countdown_status']) and $settings['countdown_status']) echo 'checked="checked"'; ?> /> <?php _e('Show countdown module on event page', 'modern-events-calendar-lite'); ?>
                                </label>
                            </div>
                            <div id="mec_count_down_container_toggle" class="<?php if((isset($settings['countdown_status']) and !$settings['countdown_status']) or !isset($settings['countdown_status'])) echo 'mec-util-hidden'; ?>">
                                <div class="mec-form-row">
                                    <label class="mec-col-3" for="mec_settings_countdown_list"><?php _e('Countdown Style', 'modern-events-calendar-lite'); ?></label>
                                    <div class="mec-col-4">
                                        <select id="mec_settings_countdown_list" name="mec[settings][countdown_list]">
                                            <option value="default" <?php echo ((isset($settings['countdown_list']) and $settings['countdown_list'] == "default") ? 'selected="selected"' : ''); ?> ><?php _e('Plain Style', 'modern-events-calendar-lite'); ?></option>
                                            <option value="flip" <?php echo ((isset($settings['countdown_list']) and $settings['countdown_list'] == "flip") ? 'selected="selected"' : ''); ?> ><?php _e('Flip Style', 'modern-events-calendar-lite'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="exceptional_option" class="mec-options-fields">
                            <h4 class="mec-form-subtitle"><?php _e('Exceptional days', 'modern-events-calendar-lite'); ?></h4>
                            <div class="mec-form-row">
                                <label>
                                    <input type="hidden" name="mec[settings][exceptional_days]" value="0" />
                                    <input value="1" type="checkbox" name="mec[settings][exceptional_days]" <?php if(isset($settings['exceptional_days']) and $settings['exceptional_days']) echo 'checked="checked"'; ?> /> <?php _e('Show exceptional days option on Add/Edit events page', 'modern-events-calendar-lite'); ?>
                                    <span class="mec-tooltip">
                                        <div class="box">
                                            <h5 class="title"><?php _e('Exceptional days', 'modern-events-calendar-lite'); ?></h5>
                                            <div class="content"><p><?php esc_attr_e("Using this option you can include/exclude certain days to/from event occurrence dates.", 'modern-events-calendar-lite'); ?><a href="https://webnus.net/dox/modern-events-calendar/exceptional-days/" target="_blank"><?php _e('Read More', 'modern-events-calendar-lite'); ?></a></p></div>    
                                        </div>
                                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div id="additional_organizers" class="mec-options-fields">
                            <h4 class="mec-form-subtitle"><?php _e('Additional Organizers', 'modern-events-calendar-lite'); ?></h4>
                            <div class="mec-form-row">
                                <label>
                                    <input type="hidden" name="mec[settings][additional_organizers]" value="0" />
                                    <input value="1" type="checkbox" name="mec[settings][additional_organizers]" <?php if(!isset($settings['additional_organizers']) or (isset($settings['additional_organizers']) and $settings['additional_organizers'])) echo 'checked="checked"'; ?> /> <?php _e('Show additional organizers option on Add/Edit events page and single event page.', 'modern-events-calendar-lite'); ?>
                                </label>
                            </div>
                        </div>

                        <div id="additional_locations" class="mec-options-fields">
                            <h4 class="mec-form-subtitle"><?php _e('Additional locations', 'modern-events-calendar-lite'); ?></h4>
                            <div class="mec-form-row">
                                <label>
                                    <input type="hidden" name="mec[settings][additional_locations]" value="0" />
                                    <input value="1" type="checkbox" name="mec[settings][additional_locations]" <?php if(!isset($settings['additional_locations']) or (isset($settings['additional_locations']) and $settings['additional_locations'])) echo 'checked="checked"'; ?> /> <?php _e('Show additional locations option on Add/Edit events page and single event page.', 'modern-events-calendar-lite'); ?>
                                </label>
                            </div>
                        </div>

                        <div class="mec-options-fields">
                            <?php wp_nonce_field('mec_options_form'); ?>
                            <button style="display: none;" id="mec_single_form_button" class="button button-primary mec-button-primary" type="submit"><?php _e('Save Changes', 'modern-events-calendar-lite'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div id="wns-be-footer">
        <a id="" class="dpr-btn dpr-save-btn"><?php _e('Save Changes', 'modern-events-calendar-lite'); ?></a>
    </div>

</div>

<script type="text/javascript">
jQuery(document).ready(function()
{   
    jQuery('.WnTabLinks').each(function()
    {
        var ContentId = jQuery(this).attr('data-id');
         jQuery(this).click(function()
         {
            jQuery('.pr-be-group-menu-li').removeClass('active');
            jQuery(this).parent().addClass('active');
            jQuery(".mec-options-fields").hide();
            jQuery(".mec-options-fields").removeClass('active');
            jQuery("#"+ContentId+"").show();
            jQuery("#"+ContentId+"").addClass('active');
            jQuery('html, body').animate({
                scrollTop: jQuery("#"+ContentId+"").offset().top - 140
            }, 300);
        });
        var hash = window.location.hash.replace('#', '');
        $('[data-id="'+hash+'"]').trigger('click');
    });
   
    jQuery(".dpr-save-btn").on('click', function(event)
    {
        event.preventDefault();
        jQuery("#mec_single_form_button").trigger('click');
    });

    jQuery(".wns-be-sidebar .pr-be-group-menu-li").on('click', function(event)
    {
        jQuery(".wns-be-sidebar .pr-be-group-menu-li").removeClass('active');
        jQuery(this).addClass('active');
    });
});

jQuery("#mec_single_form").on('submit', function(event)
{
    event.preventDefault();
    
    // Add loading Class to the button
    jQuery(".dpr-save-btn").addClass('loading').text("<?php echo esc_js(esc_attr__('Saved', 'modern-events-calendar-lite')); ?>");
    jQuery('<div class="wns-saved-settings"><?php echo esc_js(esc_attr__('Settings Saved!', 'modern-events-calendar-lite')); ?></div>').insertBefore('#wns-be-content');

    if(jQuery(".mec-purchase-verify").text() != '<?php echo esc_js(esc_attr__('Verified', 'modern-events-calendar-lite')); ?>')
    {
        jQuery(".mec-purchase-verify").text("<?php echo esc_js(esc_attr__('Checking ...', 'modern-events-calendar-lite')); ?>");
    } 
    
    var settings = jQuery("#mec_single_form").serialize();
    jQuery.ajax(
    {
        type: "POST",
        url: ajaxurl,
        data: "action=mec_save_settings&"+settings,
        beforeSend: function () {
            jQuery('.wns-be-main').append('<div class="mec-loarder-wrap mec-settings-loader"><div class="mec-loarder"><div></div><div></div><div></div></div></div>');
        },
        success: function(data)
        {
            // Remove the loading Class to the button
            setTimeout(function()
            {
                jQuery(".dpr-save-btn").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'modern-events-calendar-lite')); ?>");
                jQuery('.wns-saved-settings').remove();
                jQuery('.mec-loarder-wrap').remove();
                if(jQuery(".mec-purchase-verify").text() != '<?php echo esc_js(esc_attr__('Verified', 'modern-events-calendar-lite')); ?>')
                {
                    jQuery(".mec-purchase-verify").text("<?php echo esc_js(esc_attr__('Please Refresh Page', 'modern-events-calendar-lite')); ?>");
                }
            }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            setTimeout(function()
            {
                jQuery(".dpr-save-btn").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'modern-events-calendar-lite')); ?>");
                jQuery('.wns-saved-settings').remove();
                jQuery('.mec-loarder-wrap').remove();
            }, 1000);
        }
    });
});
</script>