<?php
/**
 * The program category template file
 *
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

$args = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'category_name'     => 'program',
    'posts_per_page'    => -1,
    'orderby'           => 'post_date',
    'order'             => 'DESC',
    'suppress_filters'  => true
);

$module_program_list = wp_get_recent_posts($args);

get_header(); ?>

<div class="module module__category">
    <h1 class="module__title module__title--single module__title--alt">Program</h1>
    <section class="module__posts">
        <? foreach($module_program_list as $module_program):
        $module_program_id     = $module_program['ID'];
        $module_program_title  = get_the_title($module_program_id);
        $module_program_date   = get_the_date('d/m/y', $module_program_id);;
        $module_program_intro  = (get_field('introduction', $module_program_id) ? get_field('introduction', $module_program_id) : false);
        $module_program_image  = get_post_thumbnail_id($module_program_id);
        $module_program_link   = get_the_permalink($module_program_id);
        ?>
            <div class="module__posts-item">
                <div class="module__posts-item-image-container">
                    <?= wp_get_attachment_image($module_program_image, 'full', false, array('class' => 'module__posts-item-image')); ?>
                </div>
                <div class="module__posts-item-content">
                    <h1 class="module__posts-item-title"><?= $module_program_title ?></h1>
                    <? if($module_program_intro):?>
                        <div class="module__posts-item-intro module__posts-item-intro--program"><?= $module_program_intro ?></div>
                    <? endif; ?>
                </div>
                <div class="module__posts-item-overlay">
                    <a href="<?= $module_program_link ?>" class="module__posts-item-link"><span class="module__posts-item-span">Read More</span></a>
                </div>
            </div>
        <? endforeach; ?>
    </section>
</div>

<div class="module">
    <div class="module__divider module__divider--white"></div>
</div>

<?php get_footer(); ?>