<?php
/** no direct access **/
defined('MECEXEC') or die();

/**
 * @author Webnus <info@webnus.biz>
 */
class MEC_feature_search extends MEC_base
{
    /**
     * @var MEC_factory
     */
    public $factory;

    /**
     * @var MEC_main
     */
    public $main;

    /**
     * Constructor method
     * @author Webnus <info@webnus.biz>
     */
    public function __construct()
    {
        // Import MEC Factory
        $this->factory = $this->getFactory();
        
        // Import MEC Main
        $this->main = $this->getMain();

    }
    
    /**
     * Initialize search feature
     * @author Webnus <info@webnus.biz>
     */
    public function init()
    {
        // search Shortcode
        $this->factory->shortcode('MEC_search_bar', array($this, 'search'));
        $this->factory->filter( 'pre_get_posts', array($this, 'mec_search_filter') );

    }

    /**
     * Show taxonomy
     * @param array $atts
     * @return string
     */
    public function show_taxonomy($taxonomy,$icon)
    {
        $terms = get_terms($taxonomy, array('hide_empty' => false));
        $out = '';
        
        if ( is_wp_error($terms) || empty($terms) ) return;
        $taxonomy_name = ( $taxonomy == 'post_tag') ? 'Tag' : str_replace("mec_","",$taxonomy);

        $out .= '<div class="mec-dropdown-search"><i class="mec-sl-'.$icon.'"></i>';
        $args = array(
            'show_option_none'   => $taxonomy_name,
            'option_none_value'  => '',
            'orderby'            => 'name',
            'order'              => 'ASC',
            'show_count'         => 0,
            'hide_empty'         => 0,
            'include'            =>((isset($taxonomy_name) and trim($taxonomy_name)) ? $taxonomy_name : ''),
            'echo'               => false,
            'selected'           => 0,
            'hierarchical'       => true,
            'name'               => $taxonomy_name,
            'taxonomy'           => $taxonomy,
        );
        $out .= wp_dropdown_categories($args);
        $out .= '</div>';

        return $out;
    }

    /**
     * Search Filter
     * @param array $atts
     * @return string
     */
    public function mec_search_filter( $query )
    {
        if ( ! $query->is_search ) {
            return $query;
        }

        $mec_quesries = [];    
        if (!empty($_GET['location']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_location',
                'field' => 'id',
                'terms' => array( $_GET['location'] ),
                'operator'=> 'IN'
            );
        }

        if (!empty($_GET['category']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_category',
                'field' => 'id',
                'terms' => array( $_GET['category'] ),
                'operator'=> 'IN'
            );
        }

        if (!empty($_GET['organizer']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_organizer',
                'field' => 'id',
                'terms' => array( $_GET['organizer'] ),
                'operator'=> 'IN'
            );
        }

        if (!empty($_GET['speaker']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_speaker',
                'field' => 'id',
                'terms' => array( $_GET['speaker'] ),
                'operator'=> 'IN'
            );
        }

        if (!empty($_GET['tag']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'post_tag',
                'field' => 'id',
                'terms' => array( $_GET['tag'] ),
                'operator'=> 'IN'
            );
        }

        if (!empty($_GET['label']))
        {
            $mec_quesries[] = array(
                'taxonomy' => 'mec_label',
                'field' => 'id',
                'terms' => array( $_GET['label'] ),
                'operator'=> 'IN'
            );
        }

        
        $query->set( 'tax_query', $mec_quesries );
        $query->set( 'post_type', array( 'post' , 'mec-events' ) );

        return $query;
    }

    /**
     * Show user search bar
     * @param array $atts
     * @return string
     */
    public function search()
    {
        $path = MEC::import('app.features.search_bar.search_bar', true, true);

        ob_start();
        include $path;
        return ob_get_clean();
    }
}