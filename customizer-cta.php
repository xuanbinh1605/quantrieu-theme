<?php
/**
 * Customizer settings cho phần CTA (Call To Action)
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm section và controls cho phần CTA
 */
function quantrieu_customize_cta_section($wp_customize) {
    
    // Section cho CTA
    $wp_customize->add_section('cta_section', array(
        'title' => 'Phần Kêu Gọi Hành Động (CTA)',
        'description' => 'Tùy chỉnh nội dung phần kêu gọi hành động xuất hiện cuối trang',
        'priority' => 40,
    ));

    // CTA Heading
    $wp_customize->add_setting('cta_heading', array(
        'default' => 'Bạn Cần Tư Vấn Dịch Vụ In Ấn?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_heading', array(
        'label' => 'Tiêu đề CTA',
        'section' => 'cta_section',
        'type' => 'text',
        'description' => 'Câu hỏi hoặc lời kêu gọi chính',
    ));

    // CTA Description
    $wp_customize->add_setting('cta_description', array(
        'default' => 'Liên hệ ngay với chúng tôi để nhận báo giá tốt nhất và được tư vấn miễn phí!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cta_description', array(
        'label' => 'Mô tả CTA',
        'section' => 'cta_section',
        'type' => 'textarea',
        'description' => 'Thông điệp khuyến khích khách hàng liên hệ',
    ));

    // Phone Number
    $wp_customize->add_setting('cta_phone_number', array(
        'default' => '0909123456',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_phone_number', array(
        'label' => 'Số điện thoại',
        'section' => 'cta_section',
        'type' => 'text',
        'description' => 'Số điện thoại không có dấu cách (ví dụ: 0909123456)',
    ));

    // Phone Display Text
    $wp_customize->add_setting('cta_phone_display', array(
        'default' => '0909 123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_phone_display', array(
        'label' => 'Số điện thoại hiển thị',
        'section' => 'cta_section',
        'type' => 'text',
        'description' => 'Số điện thoại hiển thị trên nút (có thể có dấu cách)',
    ));

    // Phone Button Text
    $wp_customize->add_setting('cta_phone_button_text', array(
        'default' => 'Gọi ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_phone_button_text', array(
        'label' => 'Văn bản nút gọi điện',
        'section' => 'cta_section',
        'type' => 'text',
        'description' => 'Văn bản trước số điện thoại trên nút',
    ));

    // Zalo Link
    $wp_customize->add_setting('cta_zalo_link', array(
        'default' => 'https://zalo.me/0909123456',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_zalo_link', array(
        'label' => 'Liên kết Zalo',
        'section' => 'cta_section',
        'type' => 'url',
        'description' => 'Link Zalo đầy đủ (ví dụ: https://zalo.me/0909123456)',
    ));

    // Zalo Button Text
    $wp_customize->add_setting('cta_zalo_button_text', array(
        'default' => 'Chat Zalo',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_zalo_button_text', array(
        'label' => 'Văn bản nút Zalo',
        'section' => 'cta_section',
        'type' => 'text',
    ));

    // Enable/Disable Phone Button
    $wp_customize->add_setting('cta_show_phone_button', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('cta_show_phone_button', array(
        'label' => 'Hiện nút gọi điện',
        'section' => 'cta_section',
        'type' => 'checkbox',
    ));

    // Enable/Disable Zalo Button
    $wp_customize->add_setting('cta_show_zalo_button', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('cta_show_zalo_button', array(
        'label' => 'Hiện nút Zalo',
        'section' => 'cta_section',
        'type' => 'checkbox',
    ));

    // Background Color
    $wp_customize->add_setting('cta_background_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_background_color', array(
        'label' => 'Màu nền CTA',
        'section' => 'cta_section',
        'description' => 'Để trống để sử dụng màu chủ đề mặc định',
    )));

    // Enable/Disable CTA Section
    $wp_customize->add_setting('cta_enable_section', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('cta_enable_section', array(
        'label' => 'Hiển thị phần CTA',
        'section' => 'cta_section',
        'type' => 'checkbox',
        'description' => 'Bỏ check để ẩn phần CTA hoàn toàn',
    ));
}

add_action('customize_register', 'quantrieu_customize_cta_section');

/**
 * Helper functions để lấy customizer values với fallback
 */

function quantrieu_get_cta_heading() {
    return get_theme_mod('cta_heading', 'Bạn Cần Tư Vấn Dịch Vụ In Ấn?');
}

function quantrieu_get_cta_description() {
    return get_theme_mod('cta_description', 'Liên hệ ngay với chúng tôi để nhận báo giá tốt nhất và được tư vấn miễn phí!');
}

function quantrieu_get_cta_phone_number() {
    return get_theme_mod('cta_phone_number', '0909123456');
}

function quantrieu_get_cta_phone_display() {
    return get_theme_mod('cta_phone_display', '0909 123 456');
}

function quantrieu_get_cta_phone_button_text() {
    return get_theme_mod('cta_phone_button_text', 'Gọi ngay');
}

function quantrieu_get_cta_zalo_link() {
    return get_theme_mod('cta_zalo_link', 'https://zalo.me/0909123456');
}

function quantrieu_get_cta_zalo_button_text() {
    return get_theme_mod('cta_zalo_button_text', 'Chat Zalo');
}

function quantrieu_get_cta_show_phone_button() {
    return get_theme_mod('cta_show_phone_button', true);
}

function quantrieu_get_cta_show_zalo_button() {
    return get_theme_mod('cta_show_zalo_button', true);
}

function quantrieu_get_cta_background_color() {
    return get_theme_mod('cta_background_color', '');
}

function quantrieu_get_cta_enable_section() {
    return get_theme_mod('cta_enable_section', true);
}

/**
 * Helper function để tạo tel: link từ số điện thoại
 */
function quantrieu_get_cta_phone_tel_link() {
    $phone = quantrieu_get_cta_phone_number();
    return 'tel:' . str_replace(' ', '', $phone);
}