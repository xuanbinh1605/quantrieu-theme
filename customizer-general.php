<?php
/**
 * Customizer General Settings
 * Thiết lập Customizer cho thông tin chung
 */

function quantrieu_customize_general_register($wp_customize) {
    
    // Thêm Section cho Thông tin Chung
    $wp_customize->add_section('quantrieu_general_section', array(
        'title'    => 'Thông Tin Chung',
        'priority' => 30,
    ));

    // Logo
    $wp_customize->add_setting('quantrieu_logo', array(
        'default'           => '7',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'quantrieu_logo', array(
        'label'       => 'Logo',
        'description' => 'Tải lên logo của công ty',
        'section'     => 'quantrieu_general_section',
        'mime_type'   => 'image',
        'priority'    => 10,
    )));

    // Số Điện Thoại
    $wp_customize->add_setting('quantrieu_phone', array(
        'default'           => '0909 123 456',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('quantrieu_phone', array(
        'label'       => 'Số Điện Thoại',
        'description' => 'Nhập số điện thoại liên hệ',
        'section'     => 'quantrieu_general_section',
        'type'        => 'text',
        'priority'    => 20,
    ));

    // Địa Chỉ
    $wp_customize->add_setting('quantrieu_address', array(
        'default'           => '123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('quantrieu_address', array(
        'label'       => 'Địa Chỉ',
        'description' => 'Nhập địa chỉ công ty',
        'section'     => 'quantrieu_general_section',
        'type'        => 'textarea',
        'priority'    => 30,
    ));

    // Email
    $wp_customize->add_setting('quantrieu_email', array(
        'default'           => 'info@inquantrieu.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('quantrieu_email', array(
        'label'       => 'Email',
        'description' => 'Nhập địa chỉ email liên hệ',
        'section'     => 'quantrieu_general_section',
        'type'        => 'email',
        'priority'    => 40,
    ));

    // Giờ Mở Cửa
    $wp_customize->add_setting('quantrieu_open_hours', array(
        'default'           => '08:00 - 18:00 (T2 - T7)',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('quantrieu_open_hours', array(
        'label'       => 'Giờ Mở Cửa',
        'description' => 'Nhập giờ làm việc (VD: Thứ 2 - Thứ 6: 8:00 - 17:00)',
        'section'     => 'quantrieu_general_section',
        'type'        => 'textarea',
        'priority'    => 50,
    ));
}

add_action('customize_register', 'quantrieu_customize_general_register');

/**
 * Helper functions để lấy giá trị customizer
 */

// Lấy Logo URL
function quantrieu_get_logo() {
    $logo_id = get_theme_mod('quantrieu_logo', '7');
    if ($logo_id) {
        return wp_get_attachment_url($logo_id);
    }
    return '';
}

// Lấy Số Điện Thoại
function quantrieu_get_phone() {
    return get_theme_mod('quantrieu_phone', '0909 123 456');
}

// Lấy Địa Chỉ
function quantrieu_get_address() {
    return get_theme_mod('quantrieu_address', '123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh');
}

// Lấy Email
function quantrieu_get_email() {
    return get_theme_mod('quantrieu_email', 'info@inquantrieu.com');
}

// Lấy Giờ Mở Cửa
function quantrieu_get_open_hours() {
    return get_theme_mod('quantrieu_open_hours', '08:00 - 18:00 (T2 - T7)');
}
