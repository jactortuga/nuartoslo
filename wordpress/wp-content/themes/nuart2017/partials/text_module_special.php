<?php

$module_title       = get_sub_field('module_title');
$module_content_one = get_sub_field('module_content_one');
$module_content_two = get_sub_field('module_content_two');
$module_class       = '--special';

?>

<div class="module">
    <h1 class="module__title module__title--single"><?= $module_title ?></h1>
    <section class="module__double-article">
        <div class="module__article-container module__article-container<?= $module_class ?>">
            <article class="module__article module__article--centered">
                <div class="module__text-wrapper module__text-wrapper--left">
                    <?= $module_content_one ?>
                </div>
            </article>
        </div>
        <div class="module__article-container module__article-container<?= $module_class ?>">
            <article class="module__article module__article--centered">
                <div class="module__text-wrapper module__text-wrapper--left">
                    <?= $module_content_two ?>
                </div>
            </article>
        </div>
    </section>
</div>