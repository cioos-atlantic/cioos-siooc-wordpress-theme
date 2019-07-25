<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists. 
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage dabba
 * @since dabba 1.0
 */

get_header(); ?> 
<?php if(is_category()) { 

$category = get_category( get_query_var( 'cat' ) );
$image_url = wp_get_attachment_image_url(get_term_meta ( $category->cat_ID, 'category-image-id', true ), 'full');

$devStyle = $image_url && $image_url !== '' ? 'style="background-image:url( '. esc_attr( $image_url ) .');"' : '';
 
?>
<div class="page-main-title-2 mt-60px mb-60px mx-20px mx-lg-60px" <?php echo wp_kses_data($devStyle); ?> >

  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 text-center text-center all-text-content-white">
        <?php     
          the_archive_title( '<h2 class="entry-title">', '</h2>' ); 
          the_archive_description( '<div class="entry-description">', '</div>' );   
        ?>
      </div>
    </div>
  </div>
</div>

<?php } elseif (is_author()) { 
  
  $author = get_queried_object();
  $author_id = $author->ID;
  ?>
 <div class="page-main-title">
   <div class="container">
     <div class="row">
      <div class="col-lg-3">
        <img src="<?php echo esc_url(get_avatar_url( $author_id, array('size' => '550'))); ?>">
       </div>
       <div class="col-lg-7">
         <?php     
           the_archive_title( '<h4 class="entry-title">', '</h4>' ); 
           the_archive_description( '<div class="entry-description mt-2">', '</div>' ); 
           if(get_the_author_meta( 'user_url', $author_id ) !== '') {
            $author_website = get_the_author_meta( 'user_url', $author_id );
            echo sprintf( 
            '<div class="mt-15px">%2$s <a href="%1$s">%1$s</a></div>',
              esc_html('Website: ', 'dabba'),
              esc_url($author_website),
              esc_html(preg_replace("#^http(s)?://#","",$author_website))
              
            );
          }
         ?>
       </div>
     </div>
   </div>
 </div>
 
<?php } else { ?>

<div class="page-main-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php     
          the_archive_title( '<h4 class="entry-title">', '</h4>' ); 
          the_archive_description( '<div class="entry-description mt-2">', '</div>' );   
        ?>
      </div>
    </div>
  </div>
</div>

<?php } 

  $page_width  =   get_theme_mod( 'etdabba_etcodes_blog_page_width') == true ? 'container-fluid' : 'container';
  $page_layout =   is_active_sidebar( 'etdabba_etcodes_blog_sidebar' ) ? get_theme_mod( 'etdabba_etcodes_blog_page_layout', 'right_sidebar') : 'full_width';
?>

<div id="primary" class="content-area mb-80px">
  <main id="main" class="site-main">
    
  <div class="<?php echo esc_attr($page_width); ?> ">
    <div class="row large-gutters">
      <?php if ($page_layout == 'left_sidebar') { ?>
        <div class="col-lg-4">
          <?php  if ( is_active_sidebar( 'etdabba_etcodes_blog_sidebar' ) ) :
              dynamic_sidebar( 'etdabba_etcodes_blog_sidebar' );
          endif; ?>
        </div>
        <div class="col-lg-8">
      <?php } elseif ($page_layout == 'right_sidebar') {?>
          <div class="col-lg-8">
      <?php } else { ?>
          <div class="col-lg-12">
      <?php } ?>

          <div id="infinite-scroll-entries" class="row masonry-grid blog-post <?php echo esc_attr(get_theme_mod( 'etdabba_etcodes_post_style', 'card-post-style' )); ?>">
            <?php if ( have_posts() ) : 
              while ( have_posts() ) : the_post(); ?>
                <div class="<?php echo esc_attr(get_theme_mod( 'etdabba_etcodes_blog_post_layout_col', 'col-lg-6')); ?>">
                  <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                    <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>
                  </article>
                </div>
              <?php endwhile;
            // If no content, include the "No posts found" template.
            else :
              get_template_part( 'template-parts/content', 'none' );
            endif; ?>
          </div>
          <?php
          if ( ! class_exists( 'Jetpack' ) || ! Jetpack::is_module_active( 'infinite-scroll' ) ) {
            the_posts_pagination( array(
              'mid_size' => 2,
              'prev_text' => esc_html__( '<', 'dabba' ),
              'next_text' => esc_html__( '>', 'dabba' ),
            ) );
          }
          ?>  

      <?php if ($page_layout == 'left_sidebar') {?>
        </div>
      <?php } elseif ($page_layout == 'right_sidebar') { ?>
        </div>
          <div class="col-lg-4">
            <?php if ( is_active_sidebar( 'etdabba_etcodes_blog_sidebar' ) ) :
                    dynamic_sidebar( 'etdabba_etcodes_blog_sidebar' ); 
            endif;  ?>
          </div>
      <?php } else {?>
        </div>
      <?php } ?>

    </div>
  </div>

  </main>
</div>

<?php get_footer(); ?>