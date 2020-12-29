<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package agt
 */

get_header(); ?>

  <?php Aucor_Hero::render(); ?>

  <div id="primary" class="primary primary--404">

      <article class="entry entry--404">

        <div class="entry__content">
          <p><?php ask_e('404: Page not found description'); ?></p>
          <?php
            Aucor_Search_Form::render([
              'attr' => [
                'class' => ['search-form--404'],
              ],
            ]);
          ?>
        </div>

      </article>

  </div><!-- #primary -->

<?php
get_footer();
