<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

get_header(); ?>

<? include(locate_template('partials/_modules.php')); ?>

<div class="module">
    <div class="module__post-pagination">
        <div class="module__post-pagination-container">
            <? if(next_post_link('%link', 'Previous', true, '', 'category')): ?>
                <?= next_post_link('%link', 'Previous', true, '', 'category') ?>
            <? endif; ?>
        </div>
        <div class="module__post-pagination-container">
            <? if(previous_post_link('%link', 'Next', true, '', 'category')): ?>
                <?= previous_post_link('%link', 'Next', true, '', 'category') ?>
            <? endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>