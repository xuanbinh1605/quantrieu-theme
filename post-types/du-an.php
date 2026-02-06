<?php
/**
 * Custom Post Type: Dự án (Projects)
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

function quantrieu_register_du_an_post_type() {
    $labels = array(
        'name'                  => _x('Dự án', 'Post type general name', 'quantrieu'),
        'singular_name'         => _x('Dự án', 'Post type singular name', 'quantrieu'),
        'menu_name'             => _x('Dự án', 'Admin Menu text', 'quantrieu'),
        'name_admin_bar'        => _x('Dự án', 'Add New on Toolbar', 'quantrieu'),
        'add_new'               => __('Thêm mới', 'quantrieu'),
        'add_new_item'          => __('Thêm dự án mới', 'quantrieu'),
        'new_item'              => __('Dự án mới', 'quantrieu'),
        'edit_item'             => __('Sửa dự án', 'quantrieu'),
        'view_item'             => __('Xem dự án', 'quantrieu'),
        'all_items'             => __('Tất cả dự án', 'quantrieu'),
        'search_items'          => __('Tìm kiếm dự án', 'quantrieu'),
        'parent_item_colon'     => __('Dự án cha:', 'quantrieu'),
        'not_found'             => __('Không tìm thấy dự án.', 'quantrieu'),
        'not_found_in_trash'    => __('Không có dự án trong thùng rác.', 'quantrieu'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'du-an'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-admin-multisite',
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('du_an', $args);
}
add_action('init', 'quantrieu_register_du_an_post_type');
