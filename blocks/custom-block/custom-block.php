<?php
/*
    Block Name: Custom Block
    Block Description: An example custom ACF block.
    Block Category: common
    Block Mode: edit
    Post Types: post, page, custom-type
*/

// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'custom-block';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <h5><?php the_field('test'); ?></h5>
    <p>
        <?php the_field('info'); ?>
    </p>
</div>