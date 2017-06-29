<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

get_header(); ?>
<? if (have_posts()) : while (have_posts()) : the_post();?>
	
<main>
	
</main>

<?endwhile; endif;?>
<?php get_footer(); ?>
