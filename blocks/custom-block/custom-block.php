<?php
/*
    Block Name: Custom Block
    Block Description: An example custom ACF block.
    Block Category: common
    Block Mode: edit
    Post Types: post, page, custom-type
*/

$divInfo = agt_acf_class_names( $block, 'infoblock'); ?>

<div id="<?= $divInfo['id']; ?>" class="<?= $divInfo['className']; ?>">
    <h5><?php the_field('test'); ?></h5>
    <p>
        <?php the_field('info'); ?>
    </p>
</div>