<?php

$args = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'category_name'     => 'info',
    'numberposts'       => 4,
    'orderby'           => 'post_date',
    'order'             => 'DESC',
    'suppress_filters'  => true 
);

$module_title           = get_sub_field('module_title');
$module_info_list       = wp_get_recent_posts($args);

?>


<div class="module">
    <h1 class="module__title module__title--single module__title--alt">
        <a class="module__title-link" href="/info/"><?= $module_title ?></a>
    </h1>
    <section class="module__posts">
        <? foreach($module_info_list as $module_info):
        $module_info_id     = $module_info['ID'];
        $module_info_title  = get_the_title($module_info_id);
        $module_info_date   = get_the_date('d/m/y', $module_info_id);;
        $module_info_intro  = (get_field('introduction', $module_info_id) ? get_field('introduction', $module_info_id) : false);
        $module_info_image  = get_post_thumbnail_id($module_info_id);
        $module_info_link   = get_the_permalink($module_info_id);
        ?>
            <div class="module__posts-item">
                <div class="module__posts-item-image-container">
                    <?= wp_get_attachment_image($module_info_image, 'full', false, array('class' => 'module__posts-item-image')); ?>
                </div>
                <div class="module__posts-item-content">
                    <h1 class="module__posts-item-title"><?= $module_info_title ?></h1>
                    <? if($module_info_intro):?>
                        <div class="module__posts-item-intro module__posts-item-intro--info"><?= $module_info_intro ?></div>
                    <? endif; ?>
                </div>
                <div class="module__posts-item-overlay">
                    <a href="<?= $module_info_link ?>" class="module__posts-item-link"><span class="module__posts-item-span">Read More</span></a>
                </div>
            </div>
        <? endforeach; ?>
    </section>
</div>