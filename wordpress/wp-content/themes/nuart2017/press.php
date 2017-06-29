<?php
/*
Template Name: Press
*/

/**
 * The press page template
 *
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

// $press_material   = get_field('press_material');

// var_dump($press_material);

get_header(); ?>


<div class="module">
    <h1 class="module__title module__title--single"><? the_title() ?></h1>
    <div class="module__divider module__divider--white"></div>

    <section class="module__downloads">
        <? if(have_rows('press_material')): ?>
            <? while(have_rows('press_material')) : the_row();
                $press_material_title       = get_sub_field('press_material_title');
                $press_material_downloads   = get_sub_field('press_material_downloads');
            ?>
                <div class="module__downloads-item">
                    <h1 class="module__downloads-title"><?=  $press_material_title?></h1>
                    <? foreach($press_material_downloads as $press_material_download):
                        $press_material_download_file = $press_material_download['press_material_download_file'];
                    ?>
                        <a class="module__downloads-link" href="<?= $press_material_download_file['url']; ?>" target="_blank">
                            <?= $press_material_download_file['filename']; ?>
                        </a>
                    <? endforeach; ?>
                </div>
            <? endwhile; ?>
        <? endif; ?>
    </section>

    <div class="module__divider module__divider--white"></div>
</div>

<? get_footer(); ?>