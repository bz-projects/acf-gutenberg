<?php
/**
 * Register: Assets
 *
 * Enqueue scripts and stylesheets for theme.
 * Append content into <head> or footer.
 * Include favicons.
 *
 * @package agt
 */

/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', function() {

  // main css
  wp_enqueue_style(
    'agt-style',
    get_template_directory_uri() . '/dist/styles/main.css',
    [],
    agt_last_edited('css')
  );

  // critical js
  wp_enqueue_script(
    'agt-critical-js',
    get_template_directory_uri() . '/dist/scripts/critical.js',
    [],
    agt_last_edited('js'),
    false
  );

  // main js
  wp_enqueue_script(
    'agt-js',
    get_template_directory_uri() . '/dist/scripts/main.js',
    [],
    agt_last_edited('js'),
    true
  );

  // localize scripts
  $strings = array(
    // Tobi.js
    'prev'    => ask__('Tobi: Prev'),
    'next'    => ask__('Tobi: Next'),
    'close'   => ask__('Tobi: Close'),
    'loading' => ask__('Tobi: Loading'),
  );
  wp_localize_script('agt-js', 'theme_strings', $strings);

  // comments
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

});

/**
 * Enqueue styles for Gutenberg Editor
 */
add_action('enqueue_block_editor_assets', function() {

  // editor styles
  wp_enqueue_style(
    'agt-editor-gutenberg-style',
    get_stylesheet_directory_uri() . '/dist/styles/editor-gutenberg.css',
    [],
    agt_last_edited('css')
  );

  // editor scripts
  wp_enqueue_script(
    'agt-editor-gutenberg-scripts',
    get_stylesheet_directory_uri() . '/dist/scripts/editor-gutenberg.js',
    ['wp-i18n', 'wp-blocks', 'wp-dom-ready'],
    agt_last_edited('js'),
    true
  );

}, 10);

/**
 * Enqueue scripts and styles for admin
 */
add_action('admin_enqueue_scripts', function() {

  // admin.css
  wp_enqueue_style(
    'agt-admin-css',
    get_template_directory_uri() . '/dist/styles/admin.css',
    [],
    agt_last_edited('css')
  );

});

/**
 * Enqueue styles for Classic Editor
 */
add_action('admin_init', function() {

  add_editor_style('dist/styles/editor-classic.css');

});

/**
 * Append to <head>
 */
add_action('wp_head', function() {

  // replace class no-js with js in html tag
  echo "<script>(function(d){d.className = d.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

});

/**
 * Append to footer
 */
add_action('wp_footer', function() {

});

/**
 * Favicons
 *
 * Add favicons' <link> and <meta> tags here
 */
function agt_favicons() {

}
add_action('wp_head',    'agt_favicons');
add_action('admin_head', 'agt_favicons');
add_action('login_head', 'agt_favicons');
