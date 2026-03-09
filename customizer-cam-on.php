<?php
/**
 * Customizer settings cho trang Cảm ơn (Thank You Page)
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel và các section cho trang Cảm ơn
 */
function quantrieu_customize_thankyou_page($wp_customize) {
    
    // =================== PANEL ===================
    $wp_customize->add_panel('thankyou_panel', array(
        'title' => 'Cài Đặt Trang Cảm Ơn',
        'description' => 'Tùy chỉnh nội dung trang Cảm ơn (Thank You Page) hiển thị sau khi khách hàng gửi form liên hệ.',
        'priority' => 95,
    ));

    // =================== HERO SECTION ===================
    $wp_customize->add_section('thankyou_hero_section', array(
        'title' => 'Phần Hero (Banner)',
        'panel' => 'thankyou_panel',
        'priority' => 10,
    ));

    // Hero Badge
    $wp_customize->add_setting('thankyou_hero_badge', array(
        'default' => 'Cảm ơn bạn',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_hero_badge', array(
        'label' => 'Nhãn Badge',
        'section' => 'thankyou_hero_section',
        'type' => 'text',
        'description' => 'Nhãn nhỏ phía trên tiêu đề',
    ));

    // Hero Heading
    $wp_customize->add_setting('thankyou_hero_heading', array(
        'default' => 'Cảm Ơn Bạn Đã Liên Hệ!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_hero_heading', array(
        'label' => 'Tiêu đề chính',
        'section' => 'thankyou_hero_section',
        'type' => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('thankyou_hero_subtitle', array(
        'default' => 'Chúng tôi đã nhận được thông tin của bạn và sẽ liên hệ lại trong thời gian sớm nhất. Cảm ơn bạn đã tin tưởng và lựa chọn dịch vụ của chúng tôi!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('thankyou_hero_subtitle', array(
        'label' => 'Mô tả phụ',
        'section' => 'thankyou_hero_section',
        'type' => 'textarea',
    ));

    // Hero Show Success Icon
    $wp_customize->add_setting('thankyou_hero_show_icon', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('thankyou_hero_show_icon', array(
        'label' => 'Hiển thị icon thành công',
        'section' => 'thankyou_hero_section',
        'type' => 'checkbox',
        'description' => 'Hiển thị icon dấu tích lớn màu xanh bên trái tiêu đề',
    ));

    // =================== CTA SECTION ===================
    $wp_customize->add_section('thankyou_cta_section', array(
        'title' => 'Phần Kêu Gọi Hành Động',
        'panel' => 'thankyou_panel',
        'priority' => 20,
        'description' => '📌 Số điện thoại và link Zalo được lấy từ "📞 Thông Tin Liên Hệ Toàn Cục"',
    ));

    // CTA Heading
    $wp_customize->add_setting('thankyou_cta_heading', array(
        'default' => 'Bạn Muốn Tư Vấn Nhanh Hơn?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_cta_heading', array(
        'label' => 'Tiêu đề CTA',
        'section' => 'thankyou_cta_section',
        'type' => 'text',
    ));

    // CTA Description
    $wp_customize->add_setting('thankyou_cta_description', array(
        'default' => 'Liên hệ ngay với chúng tôi để được hỗ trợ tư vấn trực tiếp và nhanh chóng.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('thankyou_cta_description', array(
        'label' => 'Mô tả CTA',
        'section' => 'thankyou_cta_section',
        'type' => 'textarea',
    ));

    // Zalo CTA Label
    $wp_customize->add_setting('thankyou_cta_zalo_label', array(
        'default' => 'Đặt lịch Tư vấn & Báo giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_cta_zalo_label', array(
        'label' => 'Zalo - Nhãn chính',
        'section' => 'thankyou_cta_section',
        'type' => 'text',
    ));

    // Zalo CTA Sublabel
    $wp_customize->add_setting('thankyou_cta_zalo_sublabel', array(
        'default' => 'Nhân viên sẽ liên hệ làm việc trực tiếp với anh/chị',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_cta_zalo_sublabel', array(
        'label' => 'Zalo - Nhãn phụ',
        'section' => 'thankyou_cta_section',
        'type' => 'text',
    ));

    // Zalo Button Text
    $wp_customize->add_setting('thankyou_cta_zalo_button_text', array(
        'default' => 'Nhắn cho tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_cta_zalo_button_text', array(
        'label' => 'Zalo - Văn bản nút',
        'section' => 'thankyou_cta_section',
        'type' => 'text',
    ));

    // Phone CTA Label
    $wp_customize->add_setting('thankyou_cta_phone_label', array(
        'default' => 'Gọi Hotline ngay!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_cta_phone_label', array(
        'label' => 'Hotline - Nhãn chính',
        'section' => 'thankyou_cta_section',
        'type' => 'text',
    ));

    // Phone CTA Sublabel
    $wp_customize->add_setting('thankyou_cta_phone_sublabel', array(
        'default' => 'Tư vấn 24/7',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_cta_phone_sublabel', array(
        'label' => 'Hotline - Nhãn phụ',
        'section' => 'thankyou_cta_section',
        'type' => 'text',
    ));

    // Phone Button Text
    $wp_customize->add_setting('thankyou_cta_phone_button_text', array(
        'default' => 'Gọi ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_cta_phone_button_text', array(
        'label' => 'Hotline - Văn bản nút',
        'section' => 'thankyou_cta_section',
        'type' => 'text',
    ));

    // =================== BENEFITS SECTION ===================
    $wp_customize->add_section('thankyou_benefits_section', array(
        'title' => 'Phần Lợi Ích',
        'panel' => 'thankyou_panel',
        'priority' => 30,
    ));

    // Benefits Section Title
    $wp_customize->add_setting('thankyou_benefits_title', array(
        'default' => 'Cam Kết Của Chúng Tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('thankyou_benefits_title', array(
        'label' => 'Tiêu đề phần',
        'section' => 'thankyou_benefits_section',
        'type' => 'text',
    ));

    // Benefits Section Description
    $wp_customize->add_setting('thankyou_benefits_description', array(
        'default' => 'Chúng tôi cam kết mang đến cho bạn dịch vụ in ấn chất lượng cao với những giá trị tốt nhất.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('thankyou_benefits_description', array(
        'label' => 'Mô tả phần',
        'section' => 'thankyou_benefits_section',
        'type' => 'textarea',
    ));

    // 4 Benefits
    $benefit_defaults = array(
        1 => array(
            'title' => 'Hỗ trợ khách hàng 24/7',
            'desc' => 'Đội ngũ tư vấn chuyên nghiệp luôn sẵn sàng hỗ trợ bạn'
        ),
        2 => array(
            'title' => 'Giao hàng nội thành miễn phí',
            'desc' => 'Freeship cho tất cả đơn hàng trong nội thành TP.HCM'
        ),
        3 => array(
            'title' => '100% chất liệu đúng cam kết',
            'desc' => 'Sử dụng nguyên liệu chính hãng, đảm bảo chất lượng'
        ),
        4 => array(
            'title' => 'Bảo hành sản phẩm trong 24h',
            'desc' => 'Đổi trả miễn phí nếu sản phẩm có lỗi do nhà sản xuất'
        ),
    );

    for ($i = 1; $i <= 4; $i++) {
        // Benefit Title
        $wp_customize->add_setting('thankyou_benefit_' . $i . '_title', array(
            'default' => $benefit_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('thankyou_benefit_' . $i . '_title', array(
            'label' => 'Lợi ích ' . $i . ' - Tiêu đề',
            'section' => 'thankyou_benefits_section',
            'type' => 'text',
        ));

        // Benefit Description
        $wp_customize->add_setting('thankyou_benefit_' . $i . '_description', array(
            'default' => $benefit_defaults[$i]['desc'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('thankyou_benefit_' . $i . '_description', array(
            'label' => 'Lợi ích ' . $i . ' - Mô tả',
            'section' => 'thankyou_benefits_section',
            'type' => 'text',
        ));
    }
}

add_action('customize_register', 'quantrieu_customize_thankyou_page');

/**
 * Helper functions để lấy giá trị từ Customizer
 */

// =================== HERO HELPERS ===================
function quantrieu_get_thankyou_hero_badge() {
    return get_theme_mod('thankyou_hero_badge', 'Cảm ơn bạn');
}

function quantrieu_get_thankyou_hero_heading() {
    return get_theme_mod('thankyou_hero_heading', 'Cảm Ơn Bạn Đã Liên Hệ!');
}

function quantrieu_get_thankyou_hero_subtitle() {
    return get_theme_mod('thankyou_hero_subtitle', 'Chúng tôi đã nhận được thông tin của bạn và sẽ liên hệ lại trong thời gian sớm nhất. Cảm ơn bạn đã tin tưởng và lựa chọn dịch vụ của chúng tôi!');
}

function quantrieu_get_thankyou_hero_show_icon() {
    return get_theme_mod('thankyou_hero_show_icon', true);
}

// =================== CTA HELPERS ===================
function quantrieu_get_thankyou_cta_heading() {
    return get_theme_mod('thankyou_cta_heading', 'Bạn Muốn Tư Vấn Nhanh Hơn?');
}

function quantrieu_get_thankyou_cta_description() {
    return get_theme_mod('thankyou_cta_description', 'Liên hệ ngay với chúng tôi để được hỗ trợ tư vấn trực tiếp và nhanh chóng.');
}

function quantrieu_get_thankyou_cta_zalo_label() {
    return get_theme_mod('thankyou_cta_zalo_label', 'Đặt lịch Tư vấn & Báo giá');
}

function quantrieu_get_thankyou_cta_zalo_sublabel() {
    return get_theme_mod('thankyou_cta_zalo_sublabel', 'Nhân viên sẽ liên hệ làm việc trực tiếp với anh/chị');
}

function quantrieu_get_thankyou_cta_zalo_button_text() {
    return get_theme_mod('thankyou_cta_zalo_button_text', 'Nhắn cho tôi');
}

function quantrieu_get_thankyou_cta_phone_label() {
    return get_theme_mod('thankyou_cta_phone_label', 'Gọi Hotline ngay!');
}

function quantrieu_get_thankyou_cta_phone_sublabel() {
    return get_theme_mod('thankyou_cta_phone_sublabel', 'Tư vấn 24/7');
}

function quantrieu_get_thankyou_cta_phone_button_text() {
    return get_theme_mod('thankyou_cta_phone_button_text', 'Gọi ngay');
}

// =================== BENEFITS HELPERS ===================
function quantrieu_get_thankyou_benefits_title() {
    return get_theme_mod('thankyou_benefits_title', 'Cam Kết Của Chúng Tôi');
}

function quantrieu_get_thankyou_benefits_description() {
    return get_theme_mod('thankyou_benefits_description', 'Chúng tôi cam kết mang đến cho bạn dịch vụ in ấn chất lượng cao với những giá trị tốt nhất.');
}

function quantrieu_get_thankyou_benefits() {
    $benefits = array();
    
    for ($i = 1; $i <= 4; $i++) {
        $benefits[] = array(
            'title' => get_theme_mod('thankyou_benefit_' . $i . '_title', ''),
            'description' => get_theme_mod('thankyou_benefit_' . $i . '_description', ''),
        );
    }
    
    return $benefits;
}
