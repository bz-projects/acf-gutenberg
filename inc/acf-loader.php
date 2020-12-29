<?php
/**
 * ACF Block Loader
 *
 * @package core
 */

function agt_acf_blocks_loader() {

    // Get an array of theme PHP templates
    $theme = wp_get_theme();
    $files = $theme->get_files('php', 2, false);
  
    // Iterate over and ignore non-block templates
    foreach ($files as $filename => $filepath) {
  
        if (preg_match('#^blocks?/#', $filename, $matches) !== 1) {
            continue;
        }

        // Read the PHP comment meta data for the block
        $meta = get_file_data($filepath, array(
            'name'        => 'Block Name',
            'description' => 'Block Description',
            'cartegory'   => 'Block Category',
            'post_types'  => 'Post Types',
            'mode'        => 'Block Mode',
            'align'       => 'Block Align'
        ));
        
        // Skip template if a name is not provided
        if (empty($meta['name'])) {
            continue;
        }
        
        // Convert the post types to an array (or use defaults)
        $post_types = array_filter(
            array_map('trim', explode(',', $meta['post_types']))
        );

        if (empty($post_types)) {
            $post_types = array('page', 'post');
        }

        // Register the ACF block using the meta data
        acf_register_block_type(array(
            'name'              => "{$matches[0]}_" . sanitize_title($meta['name']),
            'title'             => $meta['name'],
            'description'       => $meta['description'],
            'category'          => $meta['category'],
            'post_types'        => $post_types,
            'render_template'   => strstr( $filepath, 'blocks'),
            'supports'          => array(
                'align'           => boolval($meta['align']),
                'mode'            => $meta['mode'] !== 'false',
                'customClassName' => false
            ),
        ));
    }
}
  add_action('acf/init', 'agt_acf_blocks_loader');