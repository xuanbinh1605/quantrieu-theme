<?php
/**
 * Customizer settings cho trang liên hệ
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel và controls cho trang liên hệ
 */
function quantrieu_customize_contact_page($wp_customize) {
    
    // Panel chính cho trang liên hệ
    $wp_customize->add_panel('contact_page_panel', array(
        'title' => 'Cài Đặt Trang Liên Hệ',
        'description' => 'Tùy chỉnh nội dung các phần trên trang liên hệ',
        'priority' => 36,
    ));

    // =================== HERO SECTION ===================
    $wp_customize->add_section('contact_hero_section', array(
        'title' => 'Phần Hero (Banner)',
        'panel' => 'contact_page_panel',
        'priority' => 10,
    ));

    // Badge text
    $wp_customize->add_setting('contact_hero_badge', array(
        'default' => 'LIÊN HỆ VỚI CHÚNG TÔI',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_hero_badge', array(
        'label' => 'Badge Text',
        'section' => 'contact_hero_section',
        'type' => 'text',
    ));

    // Main heading
    $wp_customize->add_setting('contact_hero_heading', array(
        'default' => 'Hãy Kết Nối Với <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF9800] to-[#F44336]">In Quan Triều</span>',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('contact_hero_heading', array(
        'label' => 'Tiêu đề chính',
        'section' => 'contact_hero_section',
        'type' => 'textarea',
        'description' => 'Có thể sử dụng HTML. Sử dụng <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF9800] to-[#F44336]"> để tô màu gradient.',
    ));

    // Description
    $wp_customize->add_setting('contact_hero_description', array(
        'default' => 'Liên hệ ngay với chúng tôi để được tư vấn miễn phí và nhận báo giá tốt nhất cho dự án in ấn của bạn.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_hero_description', array(
        'label' => 'Mô tả',
        'section' => 'contact_hero_section',
        'type' => 'textarea',
    ));

    // =================== CONTACT FORM SECTION ===================
    $wp_customize->add_section('contact_form_section', array(
        'title' => 'Phần Form Liên Hệ',
        'panel' => 'contact_page_panel',
        'priority' => 20,
    ));

    // Form title
    $wp_customize->add_setting('contact_form_title', array(
        'default' => 'Gửi Yêu Cầu Báo Giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_title', array(
        'label' => 'Tiêu đề form',
        'section' => 'contact_form_section',
        'type' => 'text',
    ));

    // Form description
    $wp_customize->add_setting('contact_form_description', array(
        'default' => 'Điền thông tin bên dưới, chúng tôi sẽ liên hệ tư vấn trong vòng 30 phút.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_form_description', array(
        'label' => 'Mô tả form',
        'section' => 'contact_form_section',
        'type' => 'textarea',
    ));

    // Form button text
    $wp_customize->add_setting('contact_form_button_text', array(
        'default' => 'Gửi Yêu Cầu Báo Giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_button_text', array(
        'label' => 'Văn bản nút gửi',
        'section' => 'contact_form_section',
        'type' => 'text',
    ));

    // =================== CONTACT INFO SECTION ===================
    $wp_customize->add_section('contact_info_section', array(
        'title' => 'Phần Thông Tin Liên Hệ',
        'panel' => 'contact_page_panel',
        'priority' => 30,
    ));

    // Section title
    $wp_customize->add_setting('contact_info_title', array(
        'default' => 'Thông Tin Liên Hệ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_info_title', array(
        'label' => 'Tiêu đề phần',
        'section' => 'contact_info_section',
        'type' => 'text',
    ));

    // Address
    $wp_customize->add_setting('contact_info_address', array(
        'default' => '123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_info_address', array(
        'label' => 'Địa chỉ',
        'section' => 'contact_info_section',
        'type' => 'text',
    ));

    // Address Google Maps link
    $wp_customize->add_setting('contact_info_address_link', array(
        'default' => 'https://maps.google.com',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_info_address_link', array(
        'label' => 'Liên kết Google Maps',
        'section' => 'contact_info_section',
        'type' => 'url',
    ));

    // Phone
    $wp_customize->add_setting('contact_info_phone', array(
        'default' => '0909 123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_info_phone', array(
        'label' => 'Số điện thoại',
        'section' => 'contact_info_section',
        'type' => 'text',
    ));

    // Phone link (without spaces)
    $wp_customize->add_setting('contact_info_phone_link', array(
        'default' => '0909123456',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_info_phone_link', array(
        'label' => 'Số điện thoại (không dấu cách)',
        'section' => 'contact_info_section',
        'type' => 'text',
        'description' => 'Để tạo link tel: (ví dụ: 0909123456)',
    ));

    // Email
    $wp_customize->add_setting('contact_info_email', array(
        'default' => 'info@inquantrieu.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_info_email', array(
        'label' => 'Email',
        'section' => 'contact_info_section',
        'type' => 'email',
    ));

    // Working hours
    $wp_customize->add_setting('contact_info_working_hours', array(
        'default' => '08:00 - 18:00 (Thứ 2 - Thứ 7)',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_info_working_hours', array(
        'label' => 'Giờ làm việc',
        'section' => 'contact_info_section',
        'type' => 'text',
    ));

    // =================== ZALO CTA SECTION ===================
    $wp_customize->add_section('contact_zalo_section', array(
        'title' => 'Phần Zalo CTA',
        'panel' => 'contact_page_panel',
        'priority' => 40,
    ));

    // Zalo title
    $wp_customize->add_setting('contact_zalo_title', array(
        'default' => 'Chat Zalo',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_zalo_title', array(
        'label' => 'Tiêu đề Zalo',
        'section' => 'contact_zalo_section',
        'type' => 'text',
    ));

    // Zalo description
    $wp_customize->add_setting('contact_zalo_description', array(
        'default' => 'Phản hồi nhanh trong 5 phút',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_zalo_description', array(
        'label' => 'Mô tả Zalo',
        'section' => 'contact_zalo_section',
        'type' => 'text',
    ));

    // Zalo button text
    $wp_customize->add_setting('contact_zalo_button_text', array(
        'default' => 'Nhắn tin ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_zalo_button_text', array(
        'label' => 'Văn bản nút Zalo',
        'section' => 'contact_zalo_section',
        'type' => 'text',
    ));

    // Zalo link
    $wp_customize->add_setting('contact_zalo_link', array(
        'default' => 'https://zalo.me/0909123456',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_zalo_link', array(
        'label' => 'Liên kết Zalo',
        'section' => 'contact_zalo_section',
        'type' => 'url',
    ));

    // =================== SOCIAL MEDIA SECTION ===================
    $wp_customize->add_section('contact_social_section', array(
        'title' => 'Phần Mạng Xã Hội',
        'panel' => 'contact_page_panel',
        'priority' => 50,
    ));

    // Social media title
    $wp_customize->add_setting('contact_social_title', array(
        'default' => 'Kết nối với chúng tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_social_title', array(
        'label' => 'Tiêu đề mạng xã hội',
        'section' => 'contact_social_section',
        'type' => 'text',
    ));

    // Facebook link
    $wp_customize->add_setting('contact_social_facebook', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_social_facebook', array(
        'label' => 'Link Facebook',
        'section' => 'contact_social_section',
        'type' => 'url',
    ));

    // YouTube link
    $wp_customize->add_setting('contact_social_youtube', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_social_youtube', array(
        'label' => 'Link YouTube',
        'section' => 'contact_social_section',
        'type' => 'url',
    ));

    // =================== NOTICE SECTION ===================
    $wp_customize->add_section('contact_notice_section', array(
        'title' => 'Phần Lưu Ý',
        'panel' => 'contact_page_panel',
        'priority' => 60,
    ));

    // Notice title
    $wp_customize->add_setting('contact_notice_title', array(
        'default' => 'Lưu ý',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_notice_title', array(
        'label' => 'Tiêu đề lưu ý',
        'section' => 'contact_notice_section',
        'type' => 'text',
    ));

    // Notice content
    $wp_customize->add_setting('contact_notice_content', array(
        'default' => 'Để được phục vụ tốt nhất, quý khách vui lòng liên hệ trong giờ làm việc hoặc để lại tin nhắn qua form, chúng tôi sẽ phản hồi sớm nhất.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_notice_content', array(
        'label' => 'Nội dung lưu ý',
        'section' => 'contact_notice_section',
        'type' => 'textarea',
    ));

    // =================== MAP SECTION ===================
    $wp_customize->add_section('contact_map_section', array(
        'title' => 'Phần Bản Đồ',
        'panel' => 'contact_page_panel',
        'priority' => 70,
    ));

    // Map title
    $wp_customize->add_setting('contact_map_title', array(
        'default' => 'Vị Trí Cửa Hàng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_map_title', array(
        'label' => 'Tiêu đề bản đồ',
        'section' => 'contact_map_section',
        'type' => 'text',
    ));

    // Map description
    $wp_customize->add_setting('contact_map_description', array(
        'default' => 'Ghé thăm chúng tôi để được tư vấn trực tiếp',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_map_description', array(
        'label' => 'Mô tả bản đồ',
        'section' => 'contact_map_section',
        'type' => 'text',
    ));

    // Map embed URL
    $wp_customize->add_setting('contact_map_embed_url', array(
        'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4694!2d106.6297!3d10.8231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDQ5JzIzLjIiTiAxMDbCsDM3JzQ2LjkiRQ!5e0!3m2!1svi!2s!4v1629876543210!5m2!1svi!2s',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_map_embed_url', array(
        'label' => 'URL nhúng Google Maps',
        'section' => 'contact_map_section',
        'type' => 'url',
        'description' => 'URL embed từ Google Maps (dạng https://www.google.com/maps/embed?pb=...)',
    ));

    // Map title attribute
    $wp_customize->add_setting('contact_map_title_attr', array(
        'default' => 'Bản đồ In Quan Triều',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_map_title_attr', array(
        'label' => 'Tiêu đề iframe bản đồ',
        'section' => 'contact_map_section',
        'type' => 'text',
        'description' => 'Thuộc tính title cho iframe (SEO)',
    ));
}

add_action('customize_register', 'quantrieu_customize_contact_page');

/**
 * Helper functions để lấy customizer values với fallback
 */

// Hero section helpers
function quantrieu_get_contact_hero_badge() {
    return get_theme_mod('contact_hero_badge', 'LIÊN HỆ VỚI CHÚNG TÔI');
}

function quantrieu_get_contact_hero_heading() {
    return get_theme_mod('contact_hero_heading', 'Hãy Kết Nối Với <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF9800] to-[#F44336]">In Quan Triều</span>');
}

function quantrieu_get_contact_hero_description() {
    return get_theme_mod('contact_hero_description', 'Liên hệ ngay với chúng tôi để được tư vấn miễn phí và nhận báo giá tốt nhất cho dự án in ấn của bạn.');
}

// Contact form helpers
function quantrieu_get_contact_form_title() {
    return get_theme_mod('contact_form_title', 'Gửi Yêu Cầu Báo Giá');
}

function quantrieu_get_contact_form_description() {
    return get_theme_mod('contact_form_description', 'Điền thông tin bên dưới, chúng tôi sẽ liên hệ tư vấn trong vòng 30 phút.');
}

function quantrieu_get_contact_form_button_text() {
    return get_theme_mod('contact_form_button_text', 'Gửi Yêu Cầu Báo Giá');
}

// Contact info helpers
function quantrieu_get_contact_info_title() {
    return get_theme_mod('contact_info_title', 'Thông Tin Liên Hệ');
}

function quantrieu_get_contact_info_address() {
    return get_theme_mod('contact_info_address', '123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh');
}

function quantrieu_get_contact_info_address_link() {
    return get_theme_mod('contact_info_address_link', 'https://maps.google.com');
}

function quantrieu_get_contact_info_phone() {
    return get_theme_mod('contact_info_phone', '0909 123 456');
}

function quantrieu_get_contact_info_phone_link() {
    return get_theme_mod('contact_info_phone_link', '0909123456');
}

function quantrieu_get_contact_info_email() {
    return get_theme_mod('contact_info_email', 'info@inquantrieu.com');
}

function quantrieu_get_contact_info_working_hours() {
    return get_theme_mod('contact_info_working_hours', '08:00 - 18:00 (Thứ 2 - Thứ 7)');
}

// Zalo CTA helpers
function quantrieu_get_contact_zalo_title() {
    return get_theme_mod('contact_zalo_title', 'Chat Zalo');
}

function quantrieu_get_contact_zalo_description() {
    return get_theme_mod('contact_zalo_description', 'Phản hồi nhanh trong 5 phút');
}

function quantrieu_get_contact_zalo_button_text() {
    return get_theme_mod('contact_zalo_button_text', 'Nhắn tin ngay');
}

function quantrieu_get_contact_zalo_link() {
    return get_theme_mod('contact_zalo_link', 'https://zalo.me/0909123456');
}

// Social media helpers
function quantrieu_get_contact_social_title() {
    return get_theme_mod('contact_social_title', 'Kết nối với chúng tôi');
}

function quantrieu_get_contact_social_facebook() {
    return get_theme_mod('contact_social_facebook', '#');
}

function quantrieu_get_contact_social_youtube() {
    return get_theme_mod('contact_social_youtube', '#');
}

// Notice helpers
function quantrieu_get_contact_notice_title() {
    return get_theme_mod('contact_notice_title', 'Lưu ý');
}

function quantrieu_get_contact_notice_content() {
    return get_theme_mod('contact_notice_content', 'Để được phục vụ tốt nhất, quý khách vui lòng liên hệ trong giờ làm việc hoặc để lại tin nhắn qua form, chúng tôi sẽ phản hồi sớm nhất.');
}

// Map helpers
function quantrieu_get_contact_map_title() {
    return get_theme_mod('contact_map_title', 'Vị Trí Cửa Hàng');
}

function quantrieu_get_contact_map_description() {
    return get_theme_mod('contact_map_description', 'Ghé thăm chúng tôi để được tư vấn trực tiếp');
}

function quantrieu_get_contact_map_embed_url() {
    return get_theme_mod('contact_map_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4694!2d106.6297!3d10.8231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDQ5JzIzLjIiTiAxMDbCsDM3JzQ2LjkiRQ!5e0!3m2!1svi!2s!4v1629876543210!5m2!1svi!2s');
}

function quantrieu_get_contact_map_title_attr() {
    return get_theme_mod('contact_map_title_attr', 'Bản đồ In Quan Triều');
}