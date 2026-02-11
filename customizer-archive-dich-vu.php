<?php
/**
 * Customizer settings cho trang archive dịch vụ
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel và controls cho trang archive dịch vụ
 */
function quantrieu_customize_archive_services($wp_customize) {
    
    // Panel chính cho trang archive dịch vụ
    $wp_customize->add_panel('archive_services_panel', array(
        'title' => 'Cài Đặt Trang Dịch Vụ',
        'description' => 'Tùy chỉnh nội dung phần Hero trên trang danh sách dịch vụ',
        'priority' => 38,
    ));

    // =================== HERO SECTION ===================
    $wp_customize->add_section('archive_services_hero_section', array(
        'title' => 'Phần Hero (Banner)',
        'panel' => 'archive_services_panel',
        'priority' => 10,
    ));

    // Main heading
    $wp_customize->add_setting('archive_services_hero_heading', array(
        'default' => 'Dịch Vụ <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent">In Ấn</span>',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('archive_services_hero_heading', array(
        'label' => 'Tiêu đề chính',
        'section' => 'archive_services_hero_section',
        'type' => 'textarea',
        'description' => 'Có thể sử dụng HTML. Sử dụng <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent"> để tô màu gradient.',
    ));

    // Description
    $wp_customize->add_setting('archive_services_hero_description', array(
        'default' => 'Đa dạng dịch vụ in ấn chuyên nghiệp đáp ứng mọi nhu cầu từ in ấn văn phòng đến quảng cáo thương mại. Chất lượng cao, giá cả cạnh tranh, giao hàng nhanh chóng.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('archive_services_hero_description', array(
        'label' => 'Mô tả',
        'section' => 'archive_services_hero_section',
        'type' => 'textarea',
    ));

    // =================== STATS SECTION ===================
    $wp_customize->add_section('archive_services_stats_section', array(
        'title' => 'Phần Thống Kê',
        'panel' => 'archive_services_panel',
        'priority' => 20,
    ));

    // Show stats section toggle
    $wp_customize->add_setting('archive_services_stats_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('archive_services_stats_show', array(
        'label' => 'Hiển thị phần thống kê',
        'section' => 'archive_services_stats_section',
        'type' => 'checkbox',
    ));

    // Stat 1
    $wp_customize->add_setting('archive_services_stat1_number', array(
        'default' => '8+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat1_number', array(
        'label' => 'Thống kê 1 - Số liệu',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_services_stat1_text', array(
        'default' => 'Dịch vụ chính',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat1_text', array(
        'label' => 'Thống kê 1 - Văn bản',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    // Stat 2
    $wp_customize->add_setting('archive_services_stat2_number', array(
        'default' => '50+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat2_number', array(
        'label' => 'Thống kê 2 - Số liệu',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_services_stat2_text', array(
        'default' => 'Loại sản phẩm',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat2_text', array(
        'label' => 'Thống kê 2 - Văn bản',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    // Stat 3
    $wp_customize->add_setting('archive_services_stat3_number', array(
        'default' => '24h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat3_number', array(
        'label' => 'Thống kê 3 - Số liệu',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_services_stat3_text', array(
        'default' => 'In gấp nhanh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat3_text', array(
        'label' => 'Thống kê 3 - Văn bản',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    // Stat 4
    $wp_customize->add_setting('archive_services_stat4_number', array(
        'default' => '100%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat4_number', array(
        'label' => 'Thống kê 4 - Số liệu',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_services_stat4_text', array(
        'default' => 'Hài lòng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_stat4_text', array(
        'label' => 'Thống kê 4 - Văn bản',
        'section' => 'archive_services_stats_section',
        'type' => 'text',
    ));

    // =================== CONTENT SECTION ===================
    $wp_customize->add_section('archive_services_content_section', array(
        'title' => 'Phần Nội Dung',
        'panel' => 'archive_services_panel',
        'priority' => 30,
    ));

    // Search placeholder
    $wp_customize->add_setting('archive_services_search_placeholder', array(
        'default' => 'Tìm kiếm dịch vụ...',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_search_placeholder', array(
        'label' => 'Placeholder ô tìm kiếm',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));

    // Results text
    $wp_customize->add_setting('archive_services_results_text', array(
        'default' => 'Hiển thị %d dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_results_text', array(
        'label' => 'Văn bản hiển thị kết quả',
        'section' => 'archive_services_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %d để hiển thị số lượng dịch vụ hiện tại.',
    ));

    // Total results text
    $wp_customize->add_setting('archive_services_total_results_text', array(
        'default' => '/ %d tổng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_total_results_text', array(
        'label' => 'Văn bản tổng kết quả',
        'section' => 'archive_services_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %d để hiển thị tổng số dịch vụ.',
    ));

    // No services found title
    $wp_customize->add_setting('archive_services_no_results_title', array(
        'default' => 'Không tìm thấy dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_no_results_title', array(
        'label' => 'Tiêu đề khi không có kết quả',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));

    // No services found text 
    $wp_customize->add_setting('archive_services_no_results_text', array(
        'default' => 'Không có dịch vụ nào phù hợp với từ khóa "%s".',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_no_results_text', array(
        'label' => 'Mô tả khi tìm kiếm không có kết quả',
        'section' => 'archive_services_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %s để hiển thị từ khóa tìm kiếm.',
    ));

    // No services found text (general)
    $wp_customize->add_setting('archive_services_no_results_general', array(
        'default' => 'Không có dịch vụ nào.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_no_results_general', array(
        'label' => 'Mô tả khi không có dịch vụ',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));

    // No services found button text
    $wp_customize->add_setting('archive_services_no_results_button', array(
        'default' => 'Xem tất cả dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_no_results_button', array(
        'label' => 'Nút khi không có kết quả',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));

    // List view feature tags
    $wp_customize->add_setting('archive_services_feature_tag1', array(
        'default' => 'Thiết kế chuyên nghiệp',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_feature_tag1', array(
        'label' => 'Tag đặc điểm 1 (chế độ danh sách)',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_services_feature_tag2', array(
        'default' => 'Chất lượng cao',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_feature_tag2', array(
        'label' => 'Tag đặc điểm 2 (chế độ danh sách)',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_services_feature_tag3', array(
        'default' => 'Giá cạnh tranh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_feature_tag3', array(
        'label' => 'Tag đặc điểm 3 (chế độ danh sách)',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_services_feature_tag4', array(
        'default' => 'Giao hàng nhanh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_services_feature_tag4', array(
        'label' => 'Tag đặc điểm 4 (chế độ danh sách)',
        'section' => 'archive_services_content_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'quantrieu_customize_archive_services');

/**
 * Helper functions để lấy customizer values với fallback
 */

// Hero section helpers
function quantrieu_get_archive_services_hero_heading() {
    return get_theme_mod('archive_services_hero_heading', 'Dịch Vụ <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent">In Ấn</span>');
}

function quantrieu_get_archive_services_hero_description() {
    return get_theme_mod('archive_services_hero_description', 'Đa dạng dịch vụ in ấn chuyên nghiệp đáp ứng mọi nhu cầu từ in ấn văn phòng đến quảng cáo thương mại. Chất lượng cao, giá cả cạnh tranh, giao hàng nhanh chóng.');
}

// Stats section helpers  
function quantrieu_get_archive_services_stats_show() {
    return get_theme_mod('archive_services_stats_show', true);
}

function quantrieu_get_archive_services_stat1_number() {
    return get_theme_mod('archive_services_stat1_number', '8+');
}

function quantrieu_get_archive_services_stat1_text() {
    return get_theme_mod('archive_services_stat1_text', 'Dịch vụ chính');
}

function quantrieu_get_archive_services_stat2_number() {
    return get_theme_mod('archive_services_stat2_number', '50+');
}

function quantrieu_get_archive_services_stat2_text() {
    return get_theme_mod('archive_services_stat2_text', 'Loại sản phẩm');
}

function quantrieu_get_archive_services_stat3_number() {
    return get_theme_mod('archive_services_stat3_number', '24h');
}

function quantrieu_get_archive_services_stat3_text() {
    return get_theme_mod('archive_services_stat3_text', 'In gấp nhanh');
}

function quantrieu_get_archive_services_stat4_number() {
    return get_theme_mod('archive_services_stat4_number', '100%');
}

function quantrieu_get_archive_services_stat4_text() {
    return get_theme_mod('archive_services_stat4_text', 'Hài lòng');
}

// Content section helpers
function quantrieu_get_archive_services_search_placeholder() {
    return get_theme_mod('archive_services_search_placeholder', 'Tìm kiếm dịch vụ...');
}

function quantrieu_get_archive_services_results_text() {
    return get_theme_mod('archive_services_results_text', 'Hiển thị %d dịch vụ');
}

function quantrieu_get_archive_services_total_results_text() {
    return get_theme_mod('archive_services_total_results_text', '/ %d tổng');
}

function quantrieu_get_archive_services_no_results_title() {
    return get_theme_mod('archive_services_no_results_title', 'Không tìm thấy dịch vụ');
}

function quantrieu_get_archive_services_no_results_text() {
    return get_theme_mod('archive_services_no_results_text', 'Không có dịch vụ nào phù hợp với từ khóa "%s".');
}

function quantrieu_get_archive_services_no_results_general() {
    return get_theme_mod('archive_services_no_results_general', 'Không có dịch vụ nào.');
}

function quantrieu_get_archive_services_no_results_button() {
    return get_theme_mod('archive_services_no_results_button', 'Xem tất cả dịch vụ');
}

function quantrieu_get_archive_services_feature_tag1() {
    return get_theme_mod('archive_services_feature_tag1', 'Thiết kế chuyên nghiệp');
}

function quantrieu_get_archive_services_feature_tag2() {
    return get_theme_mod('archive_services_feature_tag2', 'Chất lượng cao');
}

function quantrieu_get_archive_services_feature_tag3() {
    return get_theme_mod('archive_services_feature_tag3', 'Giá cạnh tranh');
}

function quantrieu_get_archive_services_feature_tag4() {
    return get_theme_mod('archive_services_feature_tag4', 'Giao hàng nhanh');
}