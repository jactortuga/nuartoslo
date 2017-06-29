<?php

/**
* The home page default template file
*
* @package WordPress
* @subpackage Tortuga Labs - Nuart2017
* @since Tortuga Labs - Nuart2017 1.0
**/


$header_type    = get_field('header_type', 'option');
$header_image   = ($header_type == 'image' ? get_field('header_image', 'option') : false);
$header_video   = ($header_type == 'video' ? get_field('header_video', 'option') : false);
$header_logo    = (get_field('header_logo', 'option') ? get_field('header_logo', 'option') : false);


get_header(); ?>


<? if(have_posts()) : while(have_posts()) : the_post(); ?>

    <h1>Home Page</h1>


    <? if($header_image): ?>
        <?= wp_get_attachment_image($header_image, 'full'); ?>
    <? elseif($header_video):?>
        <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

        <div class='embed-container'>
              <?= $header_video ?>
        </div>
    <? endif; ?>

    <? if($header_logo): ?>
        <?= wp_get_attachment_image($header_logo, 'full'); ?>
    <? endif; ?>


    <? include(locate_template('partials/_modules.php')); ?>

<? endwhile; endif; ?>


<? get_footer(); ?>