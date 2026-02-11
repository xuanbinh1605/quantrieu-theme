<?php
/**
 * Customizer settings cho trang archive dự án
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel và controls cho trang archive dự án
 */
function quantrieu_customize_archive_projects($wp_customize) {
    
    // Panel chính cho trang archive dự án
    $wp_customize->add_panel('archive_projects_panel', array(
        'title' => 'Cài Đặt Trang Dự Án',
        'description' => 'Tùy chỉnh nội dung phần Hero trên trang danh sách dự án',
        'priority' => 37,
    ));

    // =================== HERO SECTION ===================
    $wp_customize->add_section('archive_projects_hero_section', array(
        'title' => 'Phần Hero (Banner)',
        'panel' => 'archive_projects_panel',
        'priority' => 10,
    ));

    // Main heading
    $wp_customize->add_setting('archive_projects_hero_heading', array(
        'default' => 'Dự Án <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent">Đã Thực Hiện</span>',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('archive_projects_hero_heading', array(
        'label' => 'Tiêu đề chính',
        'section' => 'archive_projects_hero_section',
        'type' => 'textarea',
        'description' => 'Có thể sử dụng HTML. Sử dụng <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent"> để tô màu gradient.',
    ));

    // Description
    $wp_customize->add_setting('archive_projects_hero_description', array(
        'default' => 'Những dự án in ấn tiêu biểu mà In Quan Triều đã thực hiện cho các khách hàng. Mỗi dự án là một câu chuyện về sự tận tâm và chất lượng.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('archive_projects_hero_description', array(
        'label' => 'Mô tả',
        'section' => 'archive_projects_hero_section',
        'type' => 'textarea',
    ));

    // =================== STATS SECTION ===================
    $wp_customize->add_section('archive_projects_stats_section', array(
        'title' => 'Phần Thống Kê',
        'panel' => 'archive_projects_panel',
        'priority' => 20,
    ));

    // Show stats section toggle
    $wp_customize->add_setting('archive_projects_stats_show', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('archive_projects_stats_show', array(
        'label' => 'Hiển thị phần thống kê',
        'section' => 'archive_projects_stats_section',
        'type' => 'checkbox',
    ));

    // Stat 1
    $wp_customize->add_setting('archive_projects_stat1_number', array(
        'default' => '500+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat1_number', array(
        'label' => 'Thống kê 1 - Số liệu',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_projects_stat1_text', array(
        'default' => 'Dự án hoàn thành',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat1_text', array(
        'label' => 'Thống kê 1 - Văn bản',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    // Stat 2
    $wp_customize->add_setting('archive_projects_stat2_number', array(
        'default' => '200+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat2_number', array(
        'label' => 'Thống kê 2 - Số liệu',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_projects_stat2_text', array(
        'default' => 'Khách hàng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat2_text', array(
        'label' => 'Thống kê 2 - Văn bản',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    // Stat 3
    $wp_customize->add_setting('archive_projects_stat3_number', array(
        'default' => '10+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat3_number', array(
        'label' => 'Thống kê 3 - Số liệu',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_projects_stat3_text', array(
        'default' => 'Năm kinh nghiệm',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat3_text', array(
        'label' => 'Thống kê 3 - Văn bản',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    // Stat 4
    $wp_customize->add_setting('archive_projects_stat4_number', array(
        'default' => '100%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat4_number', array(
        'label' => 'Thống kê 4 - Số liệu',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('archive_projects_stat4_text', array(
        'default' => 'Đúng tiến độ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_stat4_text', array(
        'label' => 'Thống kê 4 - Văn bản',
        'section' => 'archive_projects_stats_section',
        'type' => 'text',
    ));

    // =================== CONTENT SECTION ===================
    $wp_customize->add_section('archive_projects_content_section', array(
        'title' => 'Phần Nội Dung',
        'panel' => 'archive_projects_panel',
        'priority' => 30,
    ));

    // Results text
    $wp_customize->add_setting('archive_projects_results_text', array(
        'default' => 'Hiển thị %d dự án',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_results_text', array(
        'label' => 'Văn bản hiển thị kết quả',
        'section' => 'archive_projects_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %d để hiển thị số lượng dự án hiện tại.',
    ));

    // Total results text
    $wp_customize->add_setting('archive_projects_total_results_text', array(
        'default' => '/ %d tổng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_total_results_text', array(
        'label' => 'Văn bản tổng kết quả',
        'section' => 'archive_projects_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %d để hiển thị tổng số dự án.',
    ));

    // Filter "All" text
    $wp_customize->add_setting('archive_projects_filter_all_text', array(
        'default' => 'Tất cả',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_filter_all_text', array(
        'label' => 'Văn bản bộ lọc "Tất cả"',
        'section' => 'archive_projects_content_section',
        'type' => 'text',
    ));

    // No projects found title
    $wp_customize->add_setting('archive_projects_no_results_title', array(
        'default' => 'Không tìm thấy dự án',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_no_results_title', array(
        'label' => 'Tiêu đề khi không có kết quả',
        'section' => 'archive_projects_content_section',
        'type' => 'text',
    ));

    // No projects found text
    $wp_customize->add_setting('archive_projects_no_results_text', array(
        'default' => 'Không có dự án nào trong danh mục này.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_no_results_text', array(
        'label' => 'Mô tả khi không có kết quả',
        'section' => 'archive_projects_content_section',
        'type' => 'text',
    ));

    // No projects found button text
    $wp_customize->add_setting('archive_projects_no_results_button', array(
        'default' => 'Xem tất cả dự án',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_projects_no_results_button', array(
        'label' => 'Nút khi không có kết quả',
        'section' => 'archive_projects_content_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'quantrieu_customize_archive_projects');

/**
 * Helper functions để lấy customizer values với fallback
 */

// Hero section helpers
function quantrieu_get_archive_projects_hero_heading() {
    return get_theme_mod('archive_projects_hero_heading', 'Dự Án <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent">Đã Thực Hiện</span>');
}

function quantrieu_get_archive_projects_hero_description() {
    return get_theme_mod('archive_projects_hero_description', 'Những dự án in ấn tiêu biểu mà In Quan Triều đã thực hiện cho các khách hàng. Mỗi dự án là một câu chuyện về sự tận tâm và chất lượng.');
}

// Stats section helpers  
function quantrieu_get_archive_projects_stats_show() {
    return get_theme_mod('archive_projects_stats_show', true);
}

function quantrieu_get_archive_projects_stat1_number() {
    return get_theme_mod('archive_projects_stat1_number', '500+');
}

function quantrieu_get_archive_projects_stat1_text() {
    return get_theme_mod('archive_projects_stat1_text', 'Dự án hoàn thành');
}

function quantrieu_get_archive_projects_stat2_number() {
    return get_theme_mod('archive_projects_stat2_number', '200+');
}

function quantrieu_get_archive_projects_stat2_text() {
    return get_theme_mod('archive_projects_stat2_text', 'Khách hàng');
}

function quantrieu_get_archive_projects_stat3_number() {
    return get_theme_mod('archive_projects_stat3_number', '10+');
}

function quantrieu_get_archive_projects_stat3_text() {
    return get_theme_mod('archive_projects_stat3_text', 'Năm kinh nghiệm');
}

function quantrieu_get_archive_projects_stat4_number() {
    return get_theme_mod('archive_projects_stat4_number', '100%');
}

function quantrieu_get_archive_projects_stat4_text() {
    return get_theme_mod('archive_projects_stat4_text', 'Đúng tiến độ');
}

// Content section helpers
function quantrieu_get_archive_projects_results_text() {
    return get_theme_mod('archive_projects_results_text', 'Hiển thị %d dự án');
}

function quantrieu_get_archive_projects_total_results_text() {
    return get_theme_mod('archive_projects_total_results_text', '/ %d tổng');
}

function quantrieu_get_archive_projects_filter_all_text() {
    return get_theme_mod('archive_projects_filter_all_text', 'Tất cả');
}

function quantrieu_get_archive_projects_no_results_title() {
    return get_theme_mod('archive_projects_no_results_title', 'Không tìm thấy dự án');
}

function quantrieu_get_archive_projects_no_results_text() {
    return get_theme_mod('archive_projects_no_results_text', 'Không có dự án nào trong danh mục này.');
}

function quantrieu_get_archive_projects_no_results_button() {
    return get_theme_mod('archive_projects_no_results_button', 'Xem tất cả dự án');
}