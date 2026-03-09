<?php
/**
 * Global Contact Settings - Số Điện Thoại & Zalo
 * 
 * Panel toàn cục để quản lý thông tin liên hệ được sử dụng trên toàn website
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel toàn cục cho thông tin liên hệ
 */
function quantrieu_customize_global_contact($wp_customize) {
    
    // Panel toàn cục cho thông tin liên hệ
    $wp_customize->add_panel('global_contact_panel', array(
        'title' => '📞 Thông Tin Liên Hệ Toàn Cục',
        'description' => 'Cài đặt số điện thoại và Zalo cho toàn website. Các giá trị này sẽ được sử dụng ở nhiều vị trí.',
        'priority' => 20,
    ));

    // =================== PHONE SECTION ===================
    $wp_customize->add_section('global_phone_section', array(
        'title' => 'Số Điện Thoại',
        'panel' => 'global_contact_panel',
        'priority' => 10,
    ));

    // Phone number - hiển thị (có thể có dấu cách)
    $wp_customize->add_setting('global_phone_display', array(
        'default' => '0909 123 456',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('global_phone_display', array(
        'label' => 'Số điện thoại hiển thị',
        'section' => 'global_phone_section',
        'type' => 'text',
        'description' => 'Số điện thoại hiển thị trên website (có thể có dấu cách để dễ đọc)',
    ));

    // Phone link - không có dấu cách (cho tel: link)
    $wp_customize->add_setting('global_phone_link', array(
        'default' => '0909123456',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('global_phone_link', array(
        'label' => 'Số điện thoại cho link',
        'section' => 'global_phone_section',
        'type' => 'text',
        'description' => 'Số điện thoại KHÔNG có dấu cách, dùng cho link tel: (ví dụ: 0909123456)',
    ));

    // =================== ZALO SECTION ===================
    $wp_customize->add_section('global_zalo_section', array(
        'title' => 'Zalo',
        'panel' => 'global_contact_panel',
        'priority' => 20,
    ));

    // Zalo link
    $wp_customize->add_setting('global_zalo_link', array(
        'default' => 'https://zalo.me/0909123456',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('global_zalo_link', array(
        'label' => 'Liên kết Zalo',
        'section' => 'global_zalo_section',
        'type' => 'url',
        'description' => 'Link Zalo đầy đủ (ví dụ: https://zalo.me/0909123456). Số điện thoại trong link phải giống với "Số điện thoại cho link" ở trên.',
    ));

    // =================== HOTLINE (OPTIONAL) ===================
    $wp_customize->add_section('global_hotline_section', array(
        'title' => 'Hotline (Tùy chọn)',
        'panel' => 'global_contact_panel',
        'priority' => 30,
        'description' => 'Nếu cần số hotline khác với số điện thoại chính',
    ));

    // Enable hotline
    $wp_customize->add_setting('global_hotline_enable', array(
        'default' => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('global_hotline_enable', array(
        'label' => 'Bật số Hotline riêng',
        'section' => 'global_hotline_section',
        'type' => 'checkbox',
        'description' => 'Bật nếu muốn sử dụng số hotline khác với số điện thoại chính',
    ));

    // Hotline display
    $wp_customize->add_setting('global_hotline_display', array(
        'default' => '1900 xxxx',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('global_hotline_display', array(
        'label' => 'Số Hotline hiển thị',
        'section' => 'global_hotline_section',
        'type' => 'text',
    ));

    // Hotline link
    $wp_customize->add_setting('global_hotline_link', array(
        'default' => '1900xxxx',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('global_hotline_link', array(
        'label' => 'Số Hotline cho link',
        'section' => 'global_hotline_section',
        'type' => 'text',
        'description' => 'Không có dấu cách',
    ));
}

add_action('customize_register', 'quantrieu_customize_global_contact');

/**
 * Helper functions để lấy giá trị toàn cục
 * Các functions khác sẽ sử dụng các helper này thay vì get_theme_mod trực tiếp
 */

// Phone helpers
function quantrieu_get_global_phone_display() {
    return get_theme_mod('global_phone_display', '0909 123 456');
}

function quantrieu_get_global_phone_link() {
    return get_theme_mod('global_phone_link', '0909123456');
}

// Zalo helpers
function quantrieu_get_global_zalo_link() {
    return get_theme_mod('global_zalo_link', 'https://zalo.me/0909123456');
}

// Hotline helpers
function quantrieu_get_global_hotline_enable() {
    return get_theme_mod('global_hotline_enable', false);
}

function quantrieu_get_global_hotline_display() {
    return get_theme_mod('global_hotline_display', '1900 xxxx');
}

function quantrieu_get_global_hotline_link() {
    return get_theme_mod('global_hotline_link', '1900xxxx');
}

/**
 * Backward compatibility functions
 * Để các template cũ vẫn hoạt động, redirect các functions cũ sang global functions
 */

// CTA phone compatibility
if (!function_exists('quantrieu_get_cta_phone_number')) {
    function quantrieu_get_cta_phone_number() {
        return quantrieu_get_global_phone_link();
    }
}

if (!function_exists('quantrieu_get_cta_phone_display')) {
    function quantrieu_get_cta_phone_display() {
        return quantrieu_get_global_phone_display();
    }
}

if (!function_exists('quantrieu_get_cta_zalo_link')) {
    function quantrieu_get_cta_zalo_link() {
        return quantrieu_get_global_zalo_link();
    }
}

// Contact page phone compatibility
if (!function_exists('quantrieu_get_contact_info_phone')) {
    function quantrieu_get_contact_info_phone() {
        return quantrieu_get_global_phone_display();
    }
}

if (!function_exists('quantrieu_get_contact_info_phone_link')) {
    function quantrieu_get_contact_info_phone_link() {
        return quantrieu_get_global_phone_link();
    }
}

if (!function_exists('quantrieu_get_contact_zalo_link')) {
    function quantrieu_get_contact_zalo_link() {
        return quantrieu_get_global_zalo_link();
    }
}

// Hero phone compatibility
if (!function_exists('quantrieu_get_hero_phone')) {
    function quantrieu_get_hero_phone() {
        return quantrieu_get_global_phone_display();
    }
}
