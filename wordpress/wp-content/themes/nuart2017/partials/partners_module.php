<?php

$module_title       = get_sub_field('module_title');
$module_partners    = get_sub_field('module_partners');

?>

<div class="module">
    <section class="module__partners">
        <h1 class="module__partners-title"><?= $module_title ?></h1>
        <div class="module__partners-repeater">
            <? foreach($module_partners as $module_partner):
                $partner_name       = $module_partner['partner_name'];
                $partner_website    = $module_partner['partner_website'];
                $partner_logo       = $module_partner['partner_logo'];
            ?>
                <div class="module__partners-item">
                    <a href="<?= $partner_website ?>" class="module__partners-item-link" target="_blank">
                        <?= wp_get_attachment_image($partner_logo, 'full', false, array('class' => 'module__partners-item-image')); ?>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </section>
</div>