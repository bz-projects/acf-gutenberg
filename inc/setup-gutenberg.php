<?php
/**
 * Setup Gutenberg
 *
 * @package core
 */

/**
 * Gutenberg setup
 */
add_action('after_setup_theme', function() {

  // support wide width
  add_theme_support('align-wide');

  // disable custom color picker
  add_theme_support('disable-custom-colors');

  // disable font size selection
  add_theme_support('disable-custom-font-sizes');

  // disable gradients
  add_theme_support('__experimental-editor-gradient-presets', []);
  add_theme_support('__experimental-disable-custom-gradients', true);
  add_theme_support('editor-gradient-presets', []);
  add_theme_support('disable-custom-gradients', true);

  remove_theme_support( 'core-block-patterns' );

  // remove font size options
  add_theme_support('editor-font-sizes', []);

  /**
   * Remove colors and prefer using colors through custom styles
   * as long as Gutenberg won't support scoping specific colors
   * to specific blocks. As for now, the same color options will
   * show up to every block that supports colors and fot both
   * text color and background color options.
   */
  add_theme_support('editor-color-palette', []);

});

// REMOVE PATTERN
function acfThemeRemovePattern() {
  unregister_block_pattern( 'core/text-two-columns' );
	unregister_block_pattern( 'core/two-buttons' );
	unregister_block_pattern( 'core/cover-abc' );
	unregister_block_pattern( 'core/two-images' );
	unregister_block_pattern( 'core/hero-two-columns' );
	unregister_block_pattern( 'core/numbered-features' );
	unregister_block_pattern( 'core/its-time' );
}
add_action( 'init', 'acfThemeRemovePattern' );