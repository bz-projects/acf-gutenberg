<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agt
 */

?>

  </div><!-- #content -->

  <footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">

    <div class="site-footer__container">

      <div class="site-footer__branding">
        <span class="site-footer__branding__title">
          <?php bloginfo('name'); ?>
        </span>
      </div>

      <div class="site-footer__social">
        <?php Aucor_Menu_Social::render(); ?>
      </div>

    </div>


  </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
