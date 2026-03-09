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

    // Phone number - có thể có dấu cách để dễ đọc
    $wp_customize->add_setting('global_phone_display', array(
        'default' => '0909 123 456',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('global_phone_display', array(
        'label' => 'Số Điện Thoại',
        'section' => 'global_phone_section',
        'type' => 'text',
        'description' => 'Số điện thoại hiển thị (có thể có dấu cách). Dấu cách sẽ tự động bị loại khi tạo link tel:',
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
        'description' => 'Link Zalo đầy đủ (ví dụ: https://zalo.me/0909123456)',
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

// Phone link - tự động loại bỏ dấu cách từ phone display
function quantrieu_get_global_phone_link() {
    $phone = quantrieu_get_global_phone_display();
    return preg_replace('/\s+/', '', $phone);
}

// Zalo helpers
function quantrieu_get_global_zalo_link() {
    return get_theme_mod('global_zalo_link', 'https://zalo.me/0909123456');
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
