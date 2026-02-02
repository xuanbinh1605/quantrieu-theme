<?php
/**
 * Custom Post Type: Dịch vụ (Services)
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

function quantrieu_register_dich_vu_post_type() {
    $labels = array(
        'name'                  => _x('Dịch vụ', 'Post type general name', 'quantrieu'),
        'singular_name'         => _x('Dịch vụ', 'Post type singular name', 'quantrieu'),
        'menu_name'             => _x('Dịch vụ', 'Admin Menu text', 'quantrieu'),
        'name_admin_bar'        => _x('Dịch vụ', 'Add New on Toolbar', 'quantrieu'),
        'add_new'               => __('Thêm mới', 'quantrieu'),
        'add_new_item'          => __('Thêm dịch vụ mới', 'quantrieu'),
        'new_item'              => __('Dịch vụ mới', 'quantrieu'),
        'edit_item'             => __('Sửa dịch vụ', 'quantrieu'),
        'view_item'             => __('Xem dịch vụ', 'quantrieu'),
        'all_items'             => __('Tất cả dịch vụ', 'quantrieu'),
        'search_items'          => __('Tìm kiếm dịch vụ', 'quantrieu'),
        'parent_item_colon'     => __('Dịch vụ cha:', 'quantrieu'),
        'not_found'             => __('Không tìm thấy dịch vụ.', 'quantrieu'),
        'not_found_in_trash'    => __('Không có dịch vụ trong thùng rác.', 'quantrieu'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'dich-vu'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('dich_vu', $args);
}
add_action('init', 'quantrieu_register_dich_vu_post_type');
