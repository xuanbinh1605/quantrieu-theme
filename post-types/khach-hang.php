<?php
/**
 * Custom Post Type: Khách hàng (Customers)
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

function quantrieu_register_khach_hang_post_type() {
    $labels = array(
        'name'                  => _x('Khách hàng', 'Post type general name', 'quantrieu'),
        'singular_name'         => _x('Khách hàng', 'Post type singular name', 'quantrieu'),
        'menu_name'             => _x('Khách hàng', 'Admin Menu text', 'quantrieu'),
        'name_admin_bar'        => _x('Khách hàng', 'Add New on Toolbar', 'quantrieu'),
        'add_new'               => __('Thêm mới', 'quantrieu'),
        'add_new_item'          => __('Thêm khách hàng mới', 'quantrieu'),
        'new_item'              => __('Khách hàng mới', 'quantrieu'),
        'edit_item'             => __('Sửa khách hàng', 'quantrieu'),
        'view_item'             => __('Xem khách hàng', 'quantrieu'),
        'all_items'             => __('Tất cả khách hàng', 'quantrieu'),
        'search_items'          => __('Tìm kiếm khách hàng', 'quantrieu'),
        'parent_item_colon'     => __('Khách hàng cha:', 'quantrieu'),
        'not_found'             => __('Không tìm thấy khách hàng.', 'quantrieu'),
        'not_found_in_trash'    => __('Không có khách hàng trong thùng rác.', 'quantrieu'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'khach-hang'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('khach_hang', $args);
}
add_action('init', 'quantrieu_register_khach_hang_post_type');
