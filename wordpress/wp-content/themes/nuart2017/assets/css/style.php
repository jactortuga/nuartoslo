<?php

header('Content-type: text/css');
$theme = $_GET['theme_color'];

?>


.site-header {
    background-color: #<?= $theme ?>;
}

.site-header__nav-mobile {
    outline: 2px solid #<?= $theme ?>;
}

.site-header__nav-mobile .site-header__link {
    color: #<?= $theme ?>;
}

.subheader__logo-caption {
    background-color: #<?= $theme ?>;
}

.site-footer {
    background-color: #<?= $theme ?>;
}

.module__title {
    background-color: #<?= $theme ?>;
}

.module__title--alt {
    color: #<?= $theme ?>;
}

.module__title--double:first-of-type {
    color: #<?= $theme ?>;
}

.module__title--double:last-of-type {
    background-color: #<?= $theme ?>;
}

.module__title-link {
    color: #<?= $theme ?>;
}

.module__article-container--double:first-of-type {
    background-color: #<?= $theme ?>;
}

.module__article-container--double:first-of-type .module__title {
    color: #<?= $theme ?>;
}

.module__article-container--double:first-of-type .module__article {
    background-color: #<?= $theme ?>;
}

.module__article-container--special:first-of-type {
    background-color: #<?= $theme ?>;
}

.module__article-container--special:first-of-type .module__article {
    background-color: #<?= $theme ?>;
}

.module__article-title {
    color: #<?= $theme ?>;
}

.module__repeater-item-link {
    color: #<?= $theme ?>;
}

.module__repeater-item-title {
    color: #<?= $theme ?>;
}

.module__artists-item-link {
    color: #<?= $theme ?>;
}

.module__artists-item-title {
    color: #<?= $theme ?>;
}

.module__posts-item {
    background-color: #<?= $theme ?>;
}

.module__partners-title {
    color: #<?= $theme ?>;
}

.module__contact .contact_name_wrap input,
.module__contact .contact_email_wrap input,
.module__contact .contact_subject_wrap input {
    border: 2px solid #<?= $theme ?>;
    color: #<?= $theme ?>;
}

.module__contact .contact_name_wrap input:focus,
.module__contact .contact_email_wrap input:focus,
.module__contact .contact_subject_wrap input:focus {
    outline-color: #<?= $theme ?>;
}

.module__contact .contact_message_wrap textarea {
    border: 2px solid #<?= $theme ?>;
    color: #<?= $theme ?>;
}

.module__contact .contact_message_wrap textarea:focus {
    outline-color: #<?= $theme ?>;
}

.module__contact .contact_submit_wrap .pirate-forms-submit-button {
    background-color: #<?= $theme ?>;
}

.module__contact .contact_submit_wrap .pirate-forms-submit-button.-state-hover {
    border: 2px solid #<?= $theme ?>;
    color: #<?= $theme ?>;
}

.module__divider--primary {
    background-color: #<?= $theme ?>;
}

.module__artist-pagination-link {
    color: #<?= $theme ?>;
}

.site-main {
    background-color: #<?= $theme ?>;
}

.module__newsletter {
    background-color: #<?= $theme ?>;
}

.module__newsletter-input-submit {
    background-color: #<?= $theme ?>;
}

.module__downloads-item:not(:last-of-type) {
    border-bottom: 1px solid #<?= $theme ?>;
}

.module__downloads-title {
    color: #<?= $theme ?>;
}

.module__downloads-link.-state-hover {
    color: #<?= $theme ?>;
}

.module__post-pagination-link {
    color: #<?= $theme ?>;
}