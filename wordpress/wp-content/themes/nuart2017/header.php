<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

$navigation_logo    = (get_field('navigation_logo', 'option') ? get_field('navigation_logo', 'option') : false);
$spinning_animation = get_field('spinning_animation', 'option');
$spinning_logo      = (get_field('spinning_logo', 'option') ? get_field('spinning_logo', 'option') : false);
$social_preview     = get_field('social_share_image', 'option');
$facebook_link      = (get_field('facebook_link', 'option') ? get_field('facebook_link', 'option') : false);
$twitter_link       = (get_field('twitter_link', 'option') ? get_field('twitter_link', 'option') : false);
$instagram_link     = (get_field('instagram_link', 'option') ? get_field('instagram_link', 'option') : false);

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta property="og:image" content="<?= $social_preview ?>">
<meta property="og:image:secure_url" content="<?= $social_preview ?>">
<meta name="author" content="Studio Bergini - Tortuga Labs">
<link rel="shortcut icon" href="<?= bloginfo('template_url') ?>/assets/img/favicon.ico">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script>(function(){document.documentElement.className='js'})();</script>
	
	<?php wp_head(); ?>

	<?include(locate_template('partials/favicons.php'));?>
</head>

<body <?php body_class(); ?> <? if(!$spinning_animation || !$spinning_logo): ?>style="overflow: initial;"<? endif; ?>>

    <? if($spinning_animation && $spinning_logo): ?>
        <div id="loading-overlay" class="site-overlay">
            <?= wp_get_attachment_image($spinning_logo, 'full', false, array('id' => 'header-logo', 'class' => 'site-overlay__logo-image')); ?>
        </div>
    <? endif; ?>

    <header id="main-header" class="site-header">

        <? if($navigation_logo): ?>
            <a href="/"><?= wp_get_attachment_image($navigation_logo, 'full', false, array('id' => 'header-logo', 'class' => 'site-header__logo-image')); ?></a>
        <? endif; ?>

        <?
            wp_nav_menu(array(
                'menu'          => 'primary',
                'walker'        => new Tortuga_Custom_Nav_Menu(),
                'container'     => false,
                'items_wrap'    => '<nav id="full-nav" class="site-header__nav">%3$s</nav>'
            ));
        ?>

        <? if($facebook_link || $twitter_link || $instagram_link): ?>
            <nav class="site-header__social-nav">
                <? if($facebook_link): ?>
                    <a href="<?= $facebook_link ?>" class="site-header__social-link" target="_blank">
                        <img src="<?= bloginfo('template_url') ?>/assets/img/icons/svg/facebook-circle.svg" class= "site-header__social-icon">
                    </a>
                <? endif; ?>
                <? if($twitter_link): ?>
                    <a href="<?= $twitter_link ?>" class="site-header__social-link" target="_blank">
                        <img src="<?= bloginfo('template_url') ?>/assets/img/icons/svg/twitter-circle.svg" class=" site-header__social-icon">
                    </a>
                <? endif; ?>
                <? if($instagram_link): ?>
                    <a href="<?= $instagram_link ?>" class="site-header__social-link" target="_blank">
                        <img src="<?= bloginfo('template_url') ?>/assets/img/icons/svg/instagram-circle.svg" class="site-header__social-icon">
                    </a>
                <? endif; ?>
            </nav>
        <? endif; ?>

        <?
            wp_nav_menu(array(
                'menu'          => 'primary',
                'walker'        => new Tortuga_Custom_Nav_Menu(),
                'container'     => false,
                'items_wrap'    => '<nav id="mobile-nav" class="site-header__nav-mobile">%3$s</nav>'
            ));
        ?>

        <button id="hamburger-menu" class="hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>

    </header>

    <main id="main-container" class="site-main">