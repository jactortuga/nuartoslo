<?php

$module_title   = get_sub_field('module_title');
$module_content = get_sub_field('module_content');

?>

<div class="module">
    <h1 class="module__title module__title--single"><?= $module_title ?></h1>
    <article class="module__article module__article--centered">
        <div class="module__text-wrapper module__text-wrapper--left">
            <?= $module_content ?>
        </div>
    </article>
</div>