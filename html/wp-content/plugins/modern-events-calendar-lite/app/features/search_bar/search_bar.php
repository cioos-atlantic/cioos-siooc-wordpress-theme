<?php
/** no direct access **/
defined('MECEXEC') or die();

$settings = $this->main->get_settings();

$output = '<div class="mec-wrap mec-search-bar-wrap"><form class="mec-search-form mec-totalcal-box" role="search" method="get" id="searchform" action="'.get_bloginfo('url').'">';

if ( $settings['search_bar_category'] == '1' || $settings['search_bar_location'] == '1' || $settings['search_bar_organizer'] == '1' || $settings['search_bar_speaker'] == '1' || $settings['search_bar_tag'] == '1' || $settings['search_bar_label'] == '1' ) :
$output .= '<div class="mec-dropdown-wrap">';
    if($settings['search_bar_category'] == '1' ) $output .= $this->show_taxonomy('mec_category' , 'folder');
    if($settings['search_bar_location'] == '1' ) $output .= $this->show_taxonomy('mec_location' , 'location-pin');
    if($settings['search_bar_organizer'] == '1' ) $output .= $this->show_taxonomy('mec_organizer' , 'user');
    if($settings['search_bar_speaker'] == '1' ) $output .= $this->show_taxonomy('mec_speaker' , 'microphone');
    if($settings['search_bar_tag'] == '1' ) $output .= $this->show_taxonomy('post_tag' , 'tag');
    if($settings['search_bar_label'] == '1' ) $output .= $this->show_taxonomy('mec_label' , 'pin');
$output .= '</div>';
endif;
if($settings['search_bar_text_field'] == '1' ){
    $output .= '
    <div class="mec-text-input-search">
        <i class="mec-sl-magnifier"></i>
        <input type="search" value="" id="s" name="s" />
    </div>';
}

$output .= '<input class="mec-search-bar-input" id="mec-search-bar-input" type="submit" alt="Search" value="'.esc_html('Search', 'modern-events-calendar-lite').'" /><input type="hidden" name="post_type" value="mec-events">';

$output .= '</form></div>';

echo $output;