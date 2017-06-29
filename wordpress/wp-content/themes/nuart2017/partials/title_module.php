<?php

$module_title = get_sub_field('module_title');
$module_color = get_sub_field('module_color');

?>

<div class="module">
    <h1 class="module__title module__title--single module__title--<?= $module_color ?>"><?= $module_title ?></h1>
</div>