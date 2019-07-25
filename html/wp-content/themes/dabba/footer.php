  <footer class="web-footer footer">
  <?php
    /**
     * etdabba_etcodes_footer_start hook.
     *
     */
    do_action( 'etdabba_etcodes_footer_start' );

    // Get footer
    echo do_shortcode(etdabba_etcodes_get_footer_content());

    /**
     * etdabba_etcodes_footer_ends hook.
     *
    */
    do_action( 'etdabba_etcodes_footer_ends' );
  ?>
  </footer>
<?php
  /**
  * etdabba_etcodes_before_body_tag_end hook
  *
  */
  do_action('etdabba_etcodes_before_body_tag_end'); ?>

<?php wp_footer(); ?>
</body>
</html>