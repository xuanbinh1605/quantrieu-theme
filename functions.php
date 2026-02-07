<?php
/**
 * Quan Triều Theme Functions
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme setup
function quantrieu_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'quantrieu'),
        'footer' => __('Footer Menu', 'quantrieu'),
        'footer-quick-links' => __('Footer Quick Links', 'quantrieu'),
        'footer-services' => __('Footer Services', 'quantrieu'),
    ));
}
add_action('after_setup_theme', 'quantrieu_theme_setup');

// Enqueue scripts and styles
function quantrieu_enqueue_scripts() {
    wp_enqueue_style('quantrieu-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue entrance animations script
    wp_enqueue_script('quantrieu-entrance-animations', get_template_directory_uri() . '/js/entrance-animations.js', array(), '1.0.0', true);
    
    // Enqueue contact form script on contact page
    if (is_page_template('page-lien-he.php')) {
        wp_enqueue_script('quantrieu-contact-form', get_template_directory_uri() . '/js/contact-form.js', array('jquery'), '1.0.0', true);
        wp_localize_script('quantrieu-contact-form', 'contactFormAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('contact_form_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'quantrieu_enqueue_scripts');

// Include custom post types
require_once get_template_directory() . '/post-types/dich-vu.php';
require_once get_template_directory() . '/post-types/khach-hang.php';
require_once get_template_directory() . '/post-types/tin-tuc.php';
require_once get_template_directory() . '/post-types/du-an.php';

// Include taxonomies
require_once get_template_directory() . '/post-types/taxonomy-tin-tuc.php';
require_once get_template_directory() . '/post-types/taxonomy-du-an.php';

// Include meta fields
require_once get_template_directory() . '/metas/du-an-meta.php';

// Include contact admin page
require_once get_template_directory() . '/admin/contact-list.php';

// Include AJAX handlers
require_once get_template_directory() . '/ajax/contact-form-handler.php';
