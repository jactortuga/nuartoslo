<?php

$module_video   = get_sub_field('module_video');

// preg_match('/src="(.+?)"/', $module_video, $matches);
// $src = $matches[1];

// $params = array(
//     'autoplay'      => 1,
//     'loop'          => 1,
//     'byline'        => 0,
//     'title'         => 0,
//     'portrait'      => 0,
//     'color'         => 'red',
// );

// $new_src = add_query_arg($params, $src);
// $module_video = str_replace($src, $new_src, $module_video);
// $attributes = 'frameborder="0"';
// $module_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $module_video);


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