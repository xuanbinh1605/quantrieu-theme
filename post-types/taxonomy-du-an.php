<?php
/**
 * Custom Taxonomy: Danh mục dự án (Project Categories)
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

function quantrieu_register_du_an_taxonomy() {
    $labels = array(
        'name'                       => _x('Danh mục dự án', 'taxonomy general name', 'quantrieu'),
        'singular_name'              => _x('Danh mục dự án', 'taxonomy singular name', 'quantrieu'),
        'search_items'               => __('Tìm kiếm danh mục', 'quantrieu'),
        'popular_items'              => __('Danh mục phổ biến', 'quantrieu'),
        'all_items'                  => __('Tất cả danh mục', 'quantrieu'),
        'parent_item'                => __('Danh mục cha', 'quantrieu'),
        'parent_item_colon'          => __('Danh mục cha:', 'quantrieu'),
        'edit_item'                  => __('Sửa danh mục', 'quantrieu'),
        'update_item'                => __('Cập nhật danh mục', 'quantrieu'),
        'add_new_item'               => __('Thêm danh mục mới', 'quantrieu'),
        'new_item_name'              => __('Tên danh mục mới', 'quantrieu'),
        'separate_items_with_commas' => __('Phân cách các danh mục bằng dấu phẩy', 'quantrieu'),
        'add_or_remove_items'        => __('Thêm hoặc xóa danh mục', 'quantrieu'),
        'choose_from_most_used'      => __('Chọn từ danh mục hay dùng', 'quantrieu'),
        'not_found'                  => __('Không tìm thấy danh mục.', 'quantrieu'),
        'menu_name'                  => __('Danh mục dự án', 'quantrieu'),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'danh-muc-du-an'),
        'show_in_rest'          => true,
    );

    register_taxonomy('danh_muc_du_an', array('du_an'), $args);
}
add_action('init', 'quantrieu_register_du_an_taxonomy');
