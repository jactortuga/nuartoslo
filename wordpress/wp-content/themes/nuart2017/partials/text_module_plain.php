<?php

$module_subtitle    = (get_sub_field('module_subtitle') ? get_sub_field('module_subtitle') : false);
$module_content     = get_sub_field('module_content');

?>

<div class="module">
    <article class="module__article module__article--centered">
        <? if($module_subtitle):?>
            <h1 class="module__article-title module__article-title--padding">
                <?= $module_subtitle ?>
            </h1>
        <? endif; ?>
        <div class="module__text-wrapper module__text-wrapper--left">
            <?= $module_content ?>
        </div>
    </article>
</div>