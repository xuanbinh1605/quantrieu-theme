<?php
/**
 * Custom Post Type: Tin tức (News)
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

function quantrieu_register_tin_tuc_post_type() {
    $labels = array(
        'name'                  => _x('Tin tức', 'Post type general name', 'quantrieu'),
        'singular_name'         => _x('Tin tức', 'Post type singular name', 'quantrieu'),
        'menu_name'             => _x('Tin tức', 'Admin Menu text', 'quantrieu'),
        'name_admin_bar'        => _x('Tin tức', 'Add New on Toolbar', 'quantrieu'),
        'add_new'               => __('Thêm mới', 'quantrieu'),
        'add_new_item'          => __('Thêm tin tức mới', 'quantrieu'),
        'new_item'              => __('Tin tức mới', 'quantrieu'),
        'edit_item'             => __('Sửa tin tức', 'quantrieu'),
        'view_item'             => __('Xem tin tức', 'quantrieu'),
        'all_items'             => __('Tất cả tin tức', 'quantrieu'),
        'search_items'          => __('Tìm kiếm tin tức', 'quantrieu'),
        'parent_item_colon'     => __('Tin tức cha:', 'quantrieu'),
        'not_found'             => __('Không tìm thấy tin tức.', 'quantrieu'),
        'not_found_in_trash'    => __('Không có tin tức trong thùng rác.', 'quantrieu'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'tin-tuc'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array('title', 'thumbnail', 'editor', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('tin_tuc', $args);
}
add_action('init', 'quantrieu_register_tin_tuc_post_type');
