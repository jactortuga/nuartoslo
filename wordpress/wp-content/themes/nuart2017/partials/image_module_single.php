<?php

$module_image_id   = get_sub_field('module_image');

/*
For lazyload plugin:
wp_get_attachment_image($module_image_id, 'full', false, array( 'class' => 'lazyload' ))
*/

?>

<div class="module">
    <section class="module__image-container">
        <?= wp_get_attachment_image($module_image_id, 'full', false, array('class' => 'module__image')); ?>
    </section>
</div>