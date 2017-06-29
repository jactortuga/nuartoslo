<?php

$module_gallery  = get_sub_field('module_gallery');

/*
For lazyload plugin:
wp_get_attachment_image($module_image_id, 'full', false, array( 'class' => 'lazyload' ))
<?= wp_get_attachment_image($module_image_id, 'full'); ?>
*/

?>

<div class="module">
    <section class="module__carousel-container">
        <?foreach($module_gallery as $module_image):
            $module_image_id = $module_image['ID'];
        ?>
            <div class="module__carousel-slide">
                <?= wp_get_attachment_image($module_image_id, 'landscape', false, array('class' => 'module__carousel-image')); ?>
                
            </div>
        <?endforeach;?>
    </section>
</div>