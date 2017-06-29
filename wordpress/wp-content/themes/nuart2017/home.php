<?php
/*
Template Name: Home
*/

/**
 * The home page template
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

get_header(); ?>


<? if(have_posts()) : while(have_posts()) : the_post(); ?>

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

    <? include(locate_template('partials/_modules.php')); ?>

<? endwhile; endif; ?>


<? get_footer(); ?>