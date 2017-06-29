<?php

$module_information = get_sub_field('module_information');

?>

<div id="newsletter" class="module">
    <h1 class="module__title module__title--single">Newsletter</h1>
    <section class="module__newsletter">
        <p class="module__newsletter-information"><?= $module_information ?></p>
        <?= do_shortcode('[mc4wp_form]'); ?>
    </section>
</div>