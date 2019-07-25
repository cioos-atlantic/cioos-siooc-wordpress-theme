<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 
 */

/**
 * Add JetPack support.
 */
function etdabba_etcodes_jetpack_setup() {

	/**
	 * Add support for JetPack Infinite scrolling.
	 *
	 * @see https://jetpack.com/support/infinite-scroll/
	 * @since dabba 1.0
	 */
	add_theme_support(
		'infinite-scroll', array(
			'container' => 'infinite-scroll-entries',
			'footer'    => false,
			'wrapper'   => false,
			'type'		=> 'click',
			'render'    => 'etdabba_etcodes_infinite_scroll',
		)
	);

}
add_action( 'after_setup_theme', 'etdabba_etcodes_jetpack_setup' );

/**
 * Custom Infinite Scroll Render function.
 */
function etdabba_etcodes_infinite_scroll() {

	while ( have_posts() ) { 
		the_post(); ?>
		<div class="<?php echo esc_attr(get_theme_mod( 'etdabba_etcodes_blog_post_layout_col', 'col-lg-6')); ?>">
        	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>> <?php
			get_template_part( 'template-parts/post/content', get_post_format() ); ?>
			</article>
		</div> <?php	
	}

}

/**
 * Filter Jetpack's Infinite Scroll text on button that loads more posts.
 *
 * @param array $settings An array of settings for infinite scroll.
 */
function etdabba_etcodes_filter_jetpack_infinite_scroll_button_text( $settings ) {

	$text = apply_filters( 'etdabba_etcodes_infinite_scroll_button_text', esc_html__( 'Load More...', 'dabba' ) );

	$settings['text'] = esc_html( $text );

	return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'etdabba_etcodes_filter_jetpack_infinite_scroll_button_text' );

if ( ! function_exists( 'etdabba_etcodes_jetpack_sharing' ) ) :
	/**
	 * Jetpack's sharing module.
	 *
	 * Create your own etdabba_etcodes_jetpack_sharing() to override in a child theme.
	 */
	function etdabba_etcodes_jetpack_sharing() {

		if ( ! class_exists( 'Jetpack' ) ) {
			return;
		}

		if ( function_exists( 'sharing_display' ) ) :

			echo '<div class="container">';

			if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			}
			echo '</div>';

		endif;

	}
endif;
add_action( 'etdabba_etcodes_after_comments', 'etdabba_etcodes_jetpack_sharing' );
