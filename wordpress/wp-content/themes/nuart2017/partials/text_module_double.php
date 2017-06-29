<?php

$module_title_one   = get_sub_field('module_title_one');
$module_content_one = get_sub_field('module_content_one');
$module_title_two   = (get_sub_field('module_title_two') ? get_sub_field('module_title_two') : false);
$module_content_two = get_sub_field('module_content_two');
$module_class       = '--double';

?>

<div class="module">
    <section class="module__double-article">
        <div class="module__article-container module__article-container<?= $module_class ?>">
            <h1 class="module__title module__title--single"><?= $module_title_one ?></h1>
            <article class="module__article module__article--centered">
                <div class="module__text-wrapper module__text-wrapper--left">
                    <?= $module_content_one ?>
                </div>
            </article>
        </div>
        <div class="module__article-container module__article-container<?= $module_class ?>">
            <h1 class="module__title module__title--single"><?= $module_title_two ?></h1>
            <article class="module__article module__article--centered">
                <div class="module__text-wrapper module__text-wrapper--left">
                    <?= $module_content_two ?>
                </div>
            </article>
        </div>
    </section>
</div>