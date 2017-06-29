<?php
/*
Template Name: Holding
*/

/**
 * The custom holding page template
 *
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

$header_type    = get_field('header_type', 'option');
$header_class   = ($header_type == 'image' ? '--image' : '--video');
$header_image   = ($header_type == 'image' ? get_field('header_image', 'option') : false);
$header_video   = ($header_type == 'video' ? get_field('header_video', 'option') : false);
$header_logo    = (get_field('header_logo', 'option') ? get_field('header_logo', 'option') : false);
$header_info    = get_field('header_info', 'option');
$information    = get_field('information');


get_header(); ?>

<? if (have_posts()) : while (have_posts()) : the_post();?>

<section id="main-subheader" class="subheader subheader<?= $header_class ?>">
    <figure class="subheader__logo-container subheader__logo-container<?= $header_class ?>" style="background-image: url('<?= $header_image ?>')">
        
        <? if(!$header_image && $header_video):?>
            <div class='subheader__video-container'>
                  <?= $header_video ?>
            </div>
        <? endif; ?>

        <? if($header_logo): ?>
            <?= wp_get_attachment_image($header_logo, 'full', false, array('id' => 'subheader-logo', 'class' => 'subheader__logo-image')); ?>
        <? endif; ?>

        <figcaption class="subheader__logo-caption"><?= $header_info ?></figcaption>
    </figure>
</section>

<div class="module">
    <article class="module__article module__article--centered">
        <h1 class="module__article-title module__article-title--padding">Info</h1>
        <div class="module__text-wrapper module__text-wrapper--left">
            <?= $information ?>
        </div>
    </article>
</div>

<div id="artists" class="module">
    <h1 class="module__title module__title--single">Artists</h1>
    <section class="module__repeater module__repeater--artists">
        <? if(have_rows('artists')): ?>
            <? while(have_rows('artists')) : the_row();
                $name       = get_sub_field('name');
                $bio        = get_sub_field('bio');
                $website    = get_sub_field('website');
                $image      = get_sub_field('image');
            ?>
                <div class="module__repeater-item module__repeater-item--artist">
                    <?= wp_get_attachment_image($image, 'full', false, array('class' => 'module__repeater-item-image module__repeater-item-image--artist')); ?>
                    <article class="module__repeater-item-content module__repeater-item-content--artist">
                        <a href="<?= $website ?>" class="module__repeater-item-link" target="_blank">
                            <h1 class="module__repeater-item-title"><?= $name ?></h1>
                        </a>
                        <p class="module__repeater-item-text"><?= $bio ?></p>
                    </article>
                </div>
            <? endwhile; ?>
        <? endif; ?>
    </section>
</div>

<div class="module">
    <section class="module__partners">
        <h1 class="module__partners-title">Supported By</h1>
        <div class="module__partners-repeater">
        <? if(have_rows('supported_by')): ?>
            <? while(have_rows('supported_by')) : the_row();
                $name       = get_sub_field('name');
                $website    = get_sub_field('website');
                $image      = get_sub_field('image');
            ?>
                <div class="module__partners-item">
                    <a href="<?= $website ?>" class="module__partners-item-link" target="_blank">
                        <?= wp_get_attachment_image($image, 'full', false, array('class' => 'module__partners-item-image')); ?>
                    </a>
                </div>
            <? endwhile; ?>
        <? endif; ?>
        </div>
    </section>
</div>

<div class="module">
    <section class="module__partners">
        <h1 class="module__partners-title">Partners</h1>
        <div class="module__partners-repeater">
        <? if(have_rows('sponsors')): ?>
            <? while(have_rows('sponsors')) : the_row();
                $name       = get_sub_field('name');
                $website    = get_sub_field('website');
                $image      = get_sub_field('image');
            ?>
                <div class="module__partners-item">
                    <a href="<?= $website ?>" class="module__partners-item-link" target="_blank">
                        <?= wp_get_attachment_image($image, 'full', false, array('class' => 'module__partners-item-image')); ?>
                    </a>
                </div>
            <? endwhile; ?>
        <? endif; ?>
        </div>
    </section>
</div>

<div class="module">
    <section class="module__partners">
        <h1 class="module__partners-title">Media Partners</h1>
        <div class="module__partners-repeater">
        <? if(have_rows('media_partners')): ?>
            <? while(have_rows('media_partners')) : the_row();
                $name       = get_sub_field('name');
                $website    = get_sub_field('website');
                $image      = get_sub_field('image');
            ?>
                <div class="module__partners-item">
                    <a href="<?= $website ?>" class="module__partners-item-link" target="_blank">
                        <?= wp_get_attachment_image($image, 'full', false, array('class' => 'module__partners-item-image')); ?>
                    </a>
                </div>
            <? endwhile; ?>
        <? endif; ?>
        </div>
    </section>
</div>

<?endwhile; endif;?>

<?php get_footer(); ?>
