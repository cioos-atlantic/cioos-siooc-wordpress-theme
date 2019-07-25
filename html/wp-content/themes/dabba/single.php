<?php get_header();

/**
 * etdabba_etcodes_main_title hook.
 *
 */
do_action( 'etdabba_etcodes_main_title' );

$page_layout  = get_theme_mod( 'etdabba_etcodes_single_post_page_layout', 'full_width');
?>
<?php if (has_post_thumbnail() && get_theme_mod('etdabba_etcodes_blog_single_post_featured_image', 'true')): ?>
  <div class="container mx-lg-100 px-20px px-lg-60px mt-60px mb-lg-35px">
    <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="entry-media">
            <?php the_post_thumbnail(get_theme_mod('etdabba_etcodes_blog_single_posts_featured_image_size', ''));?>
          </div>
        </div>
        <div class="col-lg-6 pt-40px pb-lg-30px">
          <?php
            etdabba_etcodes_single_entry_meta_top();
            if (get_the_title() != ''): ?>
                <h1 class="single-post-entry-title entry-title"><a  href="<?php the_permalink();?>"><?php the_title();?></a></h1>
            <?php else: ?>
                <h1 class="single-post-entry-title entry-title"><a  href="<?php the_permalink();?>"><?php esc_html_e('Permalink to the post', 'dabba');?></a></h1>
          <?php endif; ?>
        </div>
    </div>
  </div>
<?php else: ?>
  <div class="container">
    <div class="entry-content mt-60px">
      <?php
        etdabba_etcodes_single_entry_meta_top();
        if (get_the_title() != ''): ?>
            <h1 class="single-post-entry-title entry-title"><a  href="<?php the_permalink();?>"><?php the_title();?></a></h1>
        <?php else: ?>
            <h1 class="single-post-entry-title entry-title"><a  href="<?php the_permalink();?>"><?php esc_html_e('Permalink to the post', 'dabba');?></a></h1>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>



    <?php if ($page_layout == 'left_sidebar') { ?>
    <div class="container">
    <div class="row large-gutters">
      <div class="col-lg-4">
        <?php  if ( is_active_sidebar( 'etdabba_etcodes_blog_sidebar' ) ) :
          dynamic_sidebar( 'etdabba_etcodes_blog_sidebar' ); 
        endif; ?>
      </div>
      <div class="col-lg-8">
    <?php } elseif ($page_layout == 'right_sidebar') {?>
    <div class="container">
      <div class="row large-gutters">
        <div class="col-lg-8">
    <?php } ?>
  
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="blog-post stander-post-style single-stander-post-style">
          <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
            <div class="entry-content-wrapper entry-content">
              <?php
                the_content();
                etdabba_etcodes_single_post_meta_bottom();
                etdabba_etcodes_single_post_author_details();
                etdabba_etcodes_single_post_related_post();
              ?>
              <div class="blog-post-comments"> 
                <?php 
                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) :
                    comments_template('', true);
                  endif;
                ?>
              </div>
            </div>
          </article>
        </div>
      <?php endwhile; ?>

    <?php if ($page_layout == 'left_sidebar') {?>
      </div>
      </div>
    </div>
    <?php } elseif ($page_layout == 'right_sidebar') { ?>
      </div>
        <div class="col-lg-4">
          <?php 
            if ( is_active_sidebar( 'etdabba_etcodes_blog_sidebar' ) ) :
                dynamic_sidebar( 'etdabba_etcodes_blog_sidebar' ); 
            endif;  ?>
        </div>
      </div>
    </div>
    <?php } ?>
<?php get_footer(); ?>