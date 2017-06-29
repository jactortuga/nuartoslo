<?php

$module_video   = get_sub_field('module_video');

/*
For lazyload plugin:
wp_get_attachment_image($module_image_id, 'full', false, array( 'class' => 'lazyload' ))
*/

?>

<div class="module">
    <section class="module__video-container">
        <?= $module_video ?>
    </section>
</div>