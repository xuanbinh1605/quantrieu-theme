<?php
/**
 * Customizer settings cho trang archive tin tức
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel và controls cho trang archive tin tức
 */
function quantrieu_customize_archive_news($wp_customize) {
    
    // Panel chính cho trang archive tin tức
    $wp_customize->add_panel('archive_news_panel', array(
        'title' => 'Cài Đặt Trang Tin Tức',
        'description' => 'Tùy chỉnh nội dung phần Hero trên trang danh sách tin tức',
        'priority' => 39,
    ));

    // =================== HERO SECTION ===================
    $wp_customize->add_section('archive_news_hero_section', array(
        'title' => 'Phần Hero (Banner)',
        'panel' => 'archive_news_panel',
        'priority' => 10,
    ));

    // Badge text
    $wp_customize->add_setting('archive_news_hero_badge', array(
        'default' => 'TIN TỨC & KIẾN THỨC',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_hero_badge', array(
        'label' => 'Badge Text',
        'section' => 'archive_news_hero_section',
        'type' => 'text',
    ));

    // Main heading
    $wp_customize->add_setting('archive_news_hero_heading', array(
        'default' => 'Tin Tức & Kiến Thức <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF9800] to-[#F44336]">In Ấn</span>',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('archive_news_hero_heading', array(
        'label' => 'Tiêu đề chính',
        'section' => 'archive_news_hero_section',
        'type' => 'textarea',
        'description' => 'Có thể sử dụng HTML. Sử dụng <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF9800] to-[#F44336]"> để tô màu gradient.',
    ));

    // Description
    $wp_customize->add_setting('archive_news_hero_description', array(
        'default' => 'Cập nhật những tin tức mới nhất về ngành in ấn, kiến thức hữu ích và xu hướng thiết kế từ đội ngũ chuyên gia In Quan Triều.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('archive_news_hero_description', array(
        'label' => 'Mô tả',
        'section' => 'archive_news_hero_section',
        'type' => 'textarea',
    ));

    // =================== CONTENT SECTION ===================
    $wp_customize->add_section('archive_news_content_section', array(
        'title' => 'Phần Nội Dung',
        'panel' => 'archive_news_panel',
        'priority' => 20,
    ));

    // Search placeholder
    $wp_customize->add_setting('archive_news_search_placeholder', array(
        'default' => 'Tìm kiếm bài viết...',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_search_placeholder', array(
        'label' => 'Placeholder ô tìm kiếm',
        'section' => 'archive_news_content_section',
        'type' => 'text',
    ));

    // Filter "All" text
    $wp_customize->add_setting('archive_news_filter_all_text', array(
        'default' => 'Tất cả',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_filter_all_text', array(
        'label' => 'Văn bản bộ lọc "Tất cả"',
        'section' => 'archive_news_content_section',
        'type' => 'text',
    ));

    // Results text
    $wp_customize->add_setting('archive_news_results_text', array(
        'default' => 'Hiển thị %d bài viết',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_results_text', array(
        'label' => 'Văn bản hiển thị kết quả',
        'section' => 'archive_news_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %d để hiển thị số lượng bài viết hiện tại.',
    ));

    // Total results text
    $wp_customize->add_setting('archive_news_total_results_text', array(
        'default' => '/ %d tổng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_total_results_text', array(
        'label' => 'Văn bản tổng kết quả',
        'section' => 'archive_news_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %d để hiển thị tổng số bài viết.',
    ));

    // Reading time text
    $wp_customize->add_setting('archive_news_reading_time_text', array(
        'default' => '%d phút',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_reading_time_text', array(
        'label' => 'Văn bản thời gian đọc',
        'section' => 'archive_news_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %d để hiển thị số phút đọc.',
    ));

    // Read more text
    $wp_customize->add_setting('archive_news_read_more_text', array(
        'default' => 'Đọc thêm',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_read_more_text', array(
        'label' => 'Văn bản "Đọc thêm"',
        'section' => 'archive_news_content_section',
        'type' => 'text',
    ));

    // Default excerpt text
    $wp_customize->add_setting('archive_news_default_excerpt', array(
        'default' => 'Đọc thêm...',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_default_excerpt', array(
        'label' => 'Văn bản mô tả mặc định',
        'section' => 'archive_news_content_section',
        'type' => 'text',
        'description' => 'Hiển thị khi bài viết không có mô tả.',
    ));

    // No news found title
    $wp_customize->add_setting('archive_news_no_results_title', array(
        'default' => 'Không tìm thấy bài viết',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_no_results_title', array(
        'label' => 'Tiêu đề khi không có kết quả',
        'section' => 'archive_news_content_section',
        'type' => 'text',
    ));

    // No news found search text
    $wp_customize->add_setting('archive_news_no_results_search', array(
        'default' => 'Không có bài viết nào phù hợp với từ khóa "%s".',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_no_results_search', array(
        'label' => 'Mô tả khi tìm kiếm không có kết quả',
        'section' => 'archive_news_content_section',
        'type' => 'text',
        'description' => 'Sử dụng %s để hiển thị từ khóa tìm kiếm.',
    ));

    // No news found category text
    $wp_customize->add_setting('archive_news_no_results_category', array(
        'default' => 'Không có bài viết nào trong danh mục này.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_no_results_category', array(
        'label' => 'Mô tả khi danh mục không có bài viết',
        'section' => 'archive_news_content_section',
        'type' => 'text',
    ));

    // No news found button text
    $wp_customize->add_setting('archive_news_no_results_button', array(
        'default' => 'Xem tất cả tin tức',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('archive_news_no_results_button', array(
        'label' => 'Nút khi không có kết quả',
        'section' => 'archive_news_content_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'quantrieu_customize_archive_news');

/**
 * Helper functions để lấy customizer values với fallback
 */

// Hero section helpers
function quantrieu_get_archive_news_hero_badge() {
    return get_theme_mod('archive_news_hero_badge', 'TIN TỨC & KIẾN THỨC');
}

function quantrieu_get_archive_news_hero_heading() {
    return get_theme_mod('archive_news_hero_heading', 'Tin Tức & Kiến Thức <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF9800] to-[#F44336]">In Ấn</span>');
}

function quantrieu_get_archive_news_hero_description() {
    return get_theme_mod('archive_news_hero_description', 'Cập nhật những tin tức mới nhất về ngành in ấn, kiến thức hữu ích và xu hướng thiết kế từ đội ngũ chuyên gia In Quan Triều.');
}

// Content section helpers
function quantrieu_get_archive_news_search_placeholder() {
    return get_theme_mod('archive_news_search_placeholder', 'Tìm kiếm bài viết...');
}

function quantrieu_get_archive_news_filter_all_text() {
    return get_theme_mod('archive_news_filter_all_text', 'Tất cả');
}

function quantrieu_get_archive_news_results_text() {
    return get_theme_mod('archive_news_results_text', 'Hiển thị %d bài viết');
}

function quantrieu_get_archive_news_total_results_text() {
    return get_theme_mod('archive_news_total_results_text', '/ %d tổng');
}

function quantrieu_get_archive_news_reading_time_text() {
    return get_theme_mod('archive_news_reading_time_text', '%d phút');
}

function quantrieu_get_archive_news_read_more_text() {
    return get_theme_mod('archive_news_read_more_text', 'Đọc thêm');
}

function quantrieu_get_archive_news_default_excerpt() {
    return get_theme_mod('archive_news_default_excerpt', 'Đọc thêm...');
}

function quantrieu_get_archive_news_no_results_title() {
    return get_theme_mod('archive_news_no_results_title', 'Không tìm thấy bài viết');
}

function quantrieu_get_archive_news_no_results_search() {
    return get_theme_mod('archive_news_no_results_search', 'Không có bài viết nào phù hợp với từ khóa "%s".');
}

function quantrieu_get_archive_news_no_results_category() {
    return get_theme_mod('archive_news_no_results_category', 'Không có bài viết nào trong danh mục này.');
}

function quantrieu_get_archive_news_no_results_button() {
    return get_theme_mod('archive_news_no_results_button', 'Xem tất cả tin tức');
}