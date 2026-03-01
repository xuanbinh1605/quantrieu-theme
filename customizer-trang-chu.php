<?php
/**
 * Customizer settings cho trang chủ
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel và controls cho trang chủ
 */
function quantrieu_customize_homepage($wp_customize) {
    
    // Panel chính cho trang chủ
    $wp_customize->add_panel('homepage_panel', array(
        'title' => 'Cài Đặt Trang Chủ',
        'description' => 'Tùy chỉnh nội dung các phần trên trang chủ',
        'priority' => 30,
    ));

    // =================== HERO SECTION ===================
    $wp_customize->add_section('hero_section', array(
        'title' => 'Phần Hero (Banner)',
        'panel' => 'homepage_panel',
        'priority' => 10,
    ));

    // Badge text
    $wp_customize->add_setting('hero_badge_text', array(
        'default' => 'In ấn chuyên nghiệp tại TP.HCM',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge_text', array(
        'label' => 'Văn bản Badge',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Main heading
    $wp_customize->add_setting('hero_heading', array(
        'default' => 'Dịch Vụ <span class="text-primary">In Ấn Trọn Gói</span> Chất Lượng Cao',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('hero_heading', array(
        'label' => 'Tiêu đề chính',
        'section' => 'hero_section',
        'type' => 'textarea',
        'description' => 'Có thể sử dụng HTML. Sử dụng <span class="text-primary"> để tô màu.',
    ));

    // Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'In Quan Triều cung cấp đa dạng dịch vụ in ấn từ Standee, Banner, Backdrop đến in UV, Decal với công nghệ hiện đại, giá cả cạnh tranh và giao hàng nhanh toàn quốc.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => 'Mô tả',
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    // CTA Button 1 text
    $wp_customize->add_setting('hero_cta1_text', array(
        'default' => 'Nhận báo giá ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_cta1_text', array(
        'label' => 'Nút CTA 1 - Văn bản',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // CTA Button 1 link
    $wp_customize->add_setting('hero_cta1_link', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_cta1_link', array(
        'label' => 'Nút CTA 1 - Liên kết',
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Phone number
    $wp_customize->add_setting('hero_phone', array(
        'default' => '0909 123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_phone', array(
        'label' => 'Số điện thoại',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Hero image
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_image', array(
        'label' => 'Hình ảnh Hero',
        'section' => 'hero_section',
        'mime_type' => 'image',
        'description' => 'Kích thước đề xuất: 800x600px',
    )));

    // Stats
    $wp_customize->add_setting('hero_stat1_number', array(
        'default' => '10+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_stat1_number', array(
        'label' => 'Thống kê 1 - Số',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_stat1_text', array(
        'default' => 'Năm kinh nghiệm',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_stat1_text', array(
        'label' => 'Thống kê 1 - Văn bản',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_stat2_number', array(
        'default' => '5000+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_stat2_number', array(
        'label' => 'Thống kê 2 - Số',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_stat2_text', array(
        'default' => 'Khách hàng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_stat2_text', array(
        'label' => 'Thống kê 2 - Văn bản',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_stat3_number', array(
        'default' => '99%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_stat3_number', array(
        'label' => 'Thống kê 3 - Số',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_stat3_text', array(
        'default' => 'Hài lòng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_stat3_text', array(
        'label' => 'Thống kê 3 - Văn bản',
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // =================== SERVICES SECTION ===================
    $wp_customize->add_section('services_section', array(
        'title' => 'Phần Dịch Vụ',
        'panel' => 'homepage_panel',
        'priority' => 20,
    ));

    // Services badge
    $wp_customize->add_setting('services_badge', array(
        'default' => 'OUR SERVICES',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_badge', array(
        'label' => 'Badge Dịch Vụ',
        'section' => 'services_section',
        'type' => 'text',
    ));

    // Services title
    $wp_customize->add_setting('services_title', array(
        'default' => 'Dịch Vụ Của Chúng Tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_title', array(
        'label' => 'Tiêu đề Dịch Vụ',
        'section' => 'services_section',
        'type' => 'text',
    ));

    // Services description
    $wp_customize->add_setting('services_description', array(
        'default' => 'Đa dạng dịch vụ in ấn đáp ứng mọi nhu cầu từ in ấn văn phòng đến quảng cáo thương mại',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('services_description', array(
        'label' => 'Mô tả Dịch Vụ',
        'section' => 'services_section',
        'type' => 'textarea',
    ));

    // Number of services to show
    $wp_customize->add_setting('services_count', array(
        'default' => 8,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('services_count', array(
        'label' => 'Số lượng dịch vụ hiển thị',
        'section' => 'services_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 12,
        ),
    ));

    // View all button text
    $wp_customize->add_setting('services_view_all_text', array(
        'default' => 'Xem tất cả dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_view_all_text', array(
        'label' => 'Văn bản nút "Xem tất cả"',
        'section' => 'services_section',
        'type' => 'text',
    ));

    // =================== ABOUT SECTION ===================
    $wp_customize->add_section('about_section', array(
        'title' => 'Phần Giới Thiệu',
        'panel' => 'homepage_panel',
        'priority' => 30,
    ));

    // About badge
    $wp_customize->add_setting('about_badge', array(
        'default' => 'ABOUT US',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_badge', array(
        'label' => 'Badge Giới Thiệu',
        'section' => 'about_section',
        'type' => 'text',
    ));

    // About title
    $wp_customize->add_setting('about_title', array(
        'default' => 'Về Chúng Tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label' => 'Tiêu đề Giới Thiệu',
        'section' => 'about_section',
        'type' => 'text',
    ));

    // About description
    $wp_customize->add_setting('about_description', array(
        'default' => 'In Quan Triều cung cấp nhiều dịch vụ in đa dạng theo nhu cầu về chất liệu và thiết kế của khách hàng. Với đội ngũ nhân viên giàu kinh nghiệm và hệ thống máy móc hiện đại, chúng tôi cam kết mang đến sản phẩm in ấn chất lượng cao với giá cả cạnh tranh nhất.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_description', array(
        'label' => 'Mô tả Giới Thiệu',
        'section' => 'about_section',
        'type' => 'textarea',
    ));

    // About image
    $wp_customize->add_setting('about_image', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'about_image', array(
        'label' => 'Hình ảnh Giới Thiệu',
        'section' => 'about_section',
        'mime_type' => 'image',
        'description' => 'Kích thước đề xuất: 600x450px',
    )));

    // About experience years
    $wp_customize->add_setting('about_experience_years', array(
        'default' => '10+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_experience_years', array(
        'label' => 'Số năm kinh nghiệm',
        'section' => 'about_section',
        'type' => 'text',
    ));

    // About features (4 features)
    for ($i = 1; $i <= 4; $i++) {
        $defaults = array(
            1 => 'Công nghệ in hiện đại, độ phân giải cao',
            2 => 'Đa dạng chất liệu: PP, Hiflex, Canvas, Decal, UV...',
            3 => 'Đội ngũ thiết kế chuyên nghiệp hỗ trợ 24/7',
            4 => 'Cam kết giao hàng đúng hẹn'
        );

        $wp_customize->add_setting('about_feature_' . $i, array(
            'default' => $defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('about_feature_' . $i, array(
            'label' => 'Đặc điểm ' . $i,
            'section' => 'about_section',
            'type' => 'text',
        ));
    }

    // About CTA button
    $wp_customize->add_setting('about_cta_text', array(
        'default' => 'Xem thêm về chúng tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_cta_text', array(
        'label' => 'Văn bản nút CTA',
        'section' => 'about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_cta_link', array(
        'default' => '/gioi-thieu',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('about_cta_link', array(
        'label' => 'Liên kết nút CTA',
        'section' => 'about_section',
        'type' => 'url',
    ));

    // Benefits (3 benefits)
    for ($i = 1; $i <= 3; $i++) {
        $benefit_defaults = array(
            1 => array('title' => 'Giao hàng toàn quốc', 'desc' => 'Vận chuyển nhanh chóng đến tận nơi'),
            2 => array('title' => 'Miễn phí Ship nội thành', 'desc' => 'Freeship cho đơn hàng nội thành HCM'),
            3 => array('title' => 'Thanh toán linh hoạt', 'desc' => 'Đa dạng hình thức thanh toán')
        );

        $wp_customize->add_setting('benefit_' . $i . '_title', array(
            'default' => $benefit_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('benefit_' . $i . '_title', array(
            'label' => 'Lợi ích ' . $i . ' - Tiêu đề',
            'section' => 'about_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting('benefit_' . $i . '_description', array(
            'default' => $benefit_defaults[$i]['desc'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('benefit_' . $i . '_description', array(
            'label' => 'Lợi ích ' . $i . ' - Mô tả',
            'section' => 'about_section',
            'type' => 'text',
        ));
    }

    // =================== PROCESS SECTION ===================
    $wp_customize->add_section('process_section', array(
        'title' => 'Phần Quy Trình',
        'panel' => 'homepage_panel',
        'priority' => 40,
    ));

    // Process badge
    $wp_customize->add_setting('process_badge', array(
        'default' => 'Quy trình',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('process_badge', array(
        'label' => 'Nhãn Badge',
        'section' => 'process_section',
        'type' => 'text',
    ));

    // Process title
    $wp_customize->add_setting('process_title', array(
        'default' => 'Quy Trình In Ấn Tại <span class="text-[#FF9800]">Quan Triều</span>',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('process_title', array(
        'label' => 'Tiêu đề Quy Trình',
        'section' => 'process_section',
        'type' => 'textarea',
        'description' => 'Có thể sử dụng HTML để tô màu.',
    ));

    // Process description
    $wp_customize->add_setting('process_description', array(
        'default' => 'Chúng tôi luôn đảm bảo chất lượng in ấn qua từng khâu làm việc chuyên nghiệp',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('process_description', array(
        'label' => 'Mô tả Quy Trình',
        'section' => 'process_section',
        'type' => 'textarea',
    ));

    // Process steps (4 steps)
    $process_steps = array(
        1 => array(
            'title' => 'Tiếp nhận & Tư vấn',
            'desc' => 'Lắng nghe nhu cầu và tư vấn giải pháp in ấn phù hợp nhất cho khách hàng'
        ),
        2 => array(
            'title' => 'Thiết kế & Duyệt mẫu',
            'desc' => 'Thiết kế theo yêu cầu hoặc hỗ trợ hoàn thiện file in cho khách hàng'
        ),
        3 => array(
            'title' => 'In ấn & Gia công',
            'desc' => 'Sản xuất với công nghệ hiện đại, kiểm soát chất lượng nghiêm ngặt'
        ),
        4 => array(
            'title' => 'Giao hàng & Nghiệm thu',
            'desc' => 'Đóng gói cẩn thận và giao hàng tận nơi đúng hẹn'
        )
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting('process_step_' . $i . '_title', array(
            'default' => $process_steps[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('process_step_' . $i . '_title', array(
            'label' => 'Bước ' . $i . ' - Tiêu đề',
            'section' => 'process_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting('process_step_' . $i . '_description', array(
            'default' => $process_steps[$i]['desc'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control('process_step_' . $i . '_description', array(
            'label' => 'Bước ' . $i . ' - Mô tả',
            'section' => 'process_section',
            'type' => 'textarea',
        ));
    }

    // Process CTA buttons
    $wp_customize->add_setting('process_cta1_text', array(
        'default' => 'Xem chi tiết quy trình',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('process_cta1_text', array(
        'label' => 'Nút CTA 1 - Văn bản',
        'section' => 'process_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('process_cta1_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('process_cta1_link', array(
        'label' => 'Nút CTA 1 - Liên kết',
        'section' => 'process_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('process_cta2_text', array(
        'default' => 'Tư vấn dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('process_cta2_text', array(
        'label' => 'Nút CTA 2 - Văn bản',
        'section' => 'process_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('process_cta2_link', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('process_cta2_link', array(
        'label' => 'Nút CTA 2 - Liên kết',
        'section' => 'process_section',
        'type' => 'url',
    ));

    // =================== CLIENTS SECTION ===================
    $wp_customize->add_section('clients_section', array(
        'title' => 'Phần Khách Hàng',
        'panel' => 'homepage_panel',
        'priority' => 50,
    ));

    // Clients badge
    $wp_customize->add_setting('clients_badge', array(
        'default' => 'CLIENT',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('clients_badge', array(
        'label' => 'Badge Khách Hàng',
        'section' => 'clients_section',
        'type' => 'text',
    ));

    // Clients title
    $wp_customize->add_setting('clients_title', array(
        'default' => 'Khách Hàng Của Chúng Tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('clients_title', array(
        'label' => 'Tiêu đề Khách Hàng',
        'section' => 'clients_section',
        'type' => 'text',
    ));

    // Clients description
    $wp_customize->add_setting('clients_description', array(
        'default' => 'Được tin tưởng bởi hàng nghìn doanh nghiệp trên toàn quốc',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('clients_description', array(
        'label' => 'Mô tả Khách Hàng',
        'section' => 'clients_section',
        'type' => 'textarea',
    ));

    // Number of clients to show
    $wp_customize->add_setting('clients_count', array(
        'default' => 8,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('clients_count', array(
        'label' => 'Số lượng khách hàng hiển thị',
        'section' => 'clients_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 12,
        ),
    ));

    // =================== NEWS SECTION ===================
    $wp_customize->add_section('news_section', array(
        'title' => 'Phần Tin Tức',
        'panel' => 'homepage_panel',
        'priority' => 60,
    ));

    // News badge
    $wp_customize->add_setting('news_badge', array(
        'default' => 'NEWS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('news_badge', array(
        'label' => 'Badge Tin Tức',
        'section' => 'news_section',
        'type' => 'text',
    ));

    // News title
    $wp_customize->add_setting('news_title', array(
        'default' => 'Tin Tức & Kiến Thức In Ấn',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('news_title', array(
        'label' => 'Tiêu đề Tin Tức',
        'section' => 'news_section',
        'type' => 'text',
    ));

    // News view all text
    $wp_customize->add_setting('news_view_all_text', array(
        'default' => 'Xem tất cả',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('news_view_all_text', array(
        'label' => 'Văn bản nút "Xem tất cả"',
        'section' => 'news_section',
        'type' => 'text',
    ));

    // Number of news to show
    $wp_customize->add_setting('news_count', array(
        'default' => 3,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('news_count', array(
        'label' => 'Số lượng tin tức hiển thị',
        'section' => 'news_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 6,
        ),
    ));
}

add_action('customize_register', 'quantrieu_customize_homepage');

/**
 * Helper functions để lấy customizer values với fallback
 */

// Hero section helpers
function quantrieu_get_hero_badge_text() {
    return get_theme_mod('hero_badge_text', 'In ấn chuyên nghiệp tại TP.HCM');
}

function quantrieu_get_hero_heading() {
    return get_theme_mod('hero_heading', 'Dịch Vụ <span class="text-primary">In Ấn Trọn Gói</span> Chất Lượng Cao');
}

function quantrieu_get_hero_description() {
    return get_theme_mod('hero_description', 'In Quan Triều cung cấp đa dạng dịch vụ in ấn từ Standee, Banner, Backdrop đến in UV, Decal với công nghệ hiện đại, giá cả cạnh tranh và giao hàng nhanh toàn quốc.');
}

function quantrieu_get_hero_cta1_text() {
    return get_theme_mod('hero_cta1_text', 'Nhận báo giá ngay');
}

function quantrieu_get_hero_cta1_link() {
    return get_theme_mod('hero_cta1_link', '#contact');
}

function quantrieu_get_hero_phone() {
    return get_theme_mod('hero_phone', '0909 123 456');
}

function quantrieu_get_hero_image_id() {
    return get_theme_mod('hero_image', 14);
}

function quantrieu_get_hero_stats() {
    return array(
        array(
            'number' => get_theme_mod('hero_stat1_number', '10+'),
            'text' => get_theme_mod('hero_stat1_text', 'Năm kinh nghiệm')
        ),
        array(
            'number' => get_theme_mod('hero_stat2_number', '5000+'),
            'text' => get_theme_mod('hero_stat2_text', 'Khách hàng')
        ),
        array(
            'number' => get_theme_mod('hero_stat3_number', '99%'),
            'text' => get_theme_mod('hero_stat3_text', 'Hài lòng')
        )
    );
}

// Services section helpers
function quantrieu_get_services_badge() {
    return get_theme_mod('services_badge', 'OUR SERVICES');
}

function quantrieu_get_services_title() {
    return get_theme_mod('services_title', 'Dịch Vụ Của Chúng Tôi');
}

function quantrieu_get_services_description() {
    return get_theme_mod('services_description', 'Đa dạng dịch vụ in ấn đáp ứng mọi nhu cầu từ in ấn văn phòng đến quảng cáo thương mại');
}

function quantrieu_get_services_count() {
    return get_theme_mod('services_count', 8);
}

function quantrieu_get_services_view_all_text() {
    return get_theme_mod('services_view_all_text', 'Xem tất cả dịch vụ');
}

// About section helpers
function quantrieu_get_about_badge() {
    return get_theme_mod('about_badge', 'ABOUT US');
}

function quantrieu_get_about_title() {
    return get_theme_mod('about_title', 'Về Chúng Tôi');
}

function quantrieu_get_about_description() {
    return get_theme_mod('about_description', 'In Quan Triều cung cấp nhiều dịch vụ in đa dạng theo nhu cầu về chất liệu và thiết kế của khách hàng. Với đội ngũ nhân viên giàu kinh nghiệm và hệ thống máy móc hiện đại, chúng tôi cam kết mang đến sản phẩm in ấn chất lượng cao với giá cả cạnh tranh nhất.');
}

function quantrieu_get_about_image_id() {
    return get_theme_mod('about_image', 31);
}

function quantrieu_get_about_experience_years() {
    return get_theme_mod('about_experience_years', '10+');
}

function quantrieu_get_about_features() {
    return array(
        get_theme_mod('about_feature_1', 'Công nghệ in hiện đại, độ phân giải cao'),
        get_theme_mod('about_feature_2', 'Đa dạng chất liệu: PP, Hiflex, Canvas, Decal, UV...'),
        get_theme_mod('about_feature_3', 'Đội ngũ thiết kế chuyên nghiệp hỗ trợ 24/7'),
        get_theme_mod('about_feature_4', 'Cam kết giao hàng đúng hẹn')
    );
}

function quantrieu_get_about_cta_text() {
    return get_theme_mod('about_cta_text', 'Xem thêm về chúng tôi');
}

function quantrieu_get_about_cta_link() {
    return get_theme_mod('about_cta_link', '/gioi-thieu');
}

function quantrieu_get_benefits() {
    return array(
        array(
            'title' => get_theme_mod('benefit_1_title', 'Giao hàng toàn quốc'),
            'description' => get_theme_mod('benefit_1_description', 'Vận chuyển nhanh chóng đến tận nơi')
        ),
        array(
            'title' => get_theme_mod('benefit_2_title', 'Miễn phí Ship nội thành'),
            'description' => get_theme_mod('benefit_2_description', 'Freeship cho đơn hàng nội thành HCM')
        ),
        array(
            'title' => get_theme_mod('benefit_3_title', 'Thanh toán linh hoạt'),
            'description' => get_theme_mod('benefit_3_description', 'Đa dạng hình thức thanh toán')
        )
    );
}

// Process section helpers
function quantrieu_get_process_badge() {
    return get_theme_mod('process_badge', 'Quy trình');
}

function quantrieu_get_process_title() {
    return get_theme_mod('process_title', 'Quy Trình In Ấn Tại <span class="text-[#FF9800]">Quan Triều</span>');
}

function quantrieu_get_process_description() {
    return get_theme_mod('process_description', 'Chúng tôi luôn đảm bảo chất lượng in ấn qua từng khâu làm việc chuyên nghiệp');
}

function quantrieu_get_process_steps() {
    return array(
        array(
            'title' => get_theme_mod('process_step_1_title', 'Tiếp nhận & Tư vấn'),
            'description' => get_theme_mod('process_step_1_description', 'Lắng nghe nhu cầu và tư vấn giải pháp in ấn phù hợp nhất cho khách hàng')
        ),
        array(
            'title' => get_theme_mod('process_step_2_title', 'Thiết kế & Duyệt mẫu'),
            'description' => get_theme_mod('process_step_2_description', 'Thiết kế theo yêu cầu hoặc hỗ trợ hoàn thiện file in cho khách hàng')
        ),
        array(
            'title' => get_theme_mod('process_step_3_title', 'In ấn & Gia công'),
            'description' => get_theme_mod('process_step_3_description', 'Sản xuất với công nghệ hiện đại, kiểm soát chất lượng nghiêm ngặt')
        ),
        array(
            'title' => get_theme_mod('process_step_4_title', 'Giao hàng & Nghiệm thu'),
            'description' => get_theme_mod('process_step_4_description', 'Đóng gói cẩn thận và giao hàng tận nơi đúng hẹn')
        )
    );
}

function quantrieu_get_process_cta_buttons() {
    return array(
        array(
            'text' => get_theme_mod('process_cta1_text', 'Xem chi tiết quy trình'),
            'link' => get_theme_mod('process_cta1_link', '#')
        ),
        array(
            'text' => get_theme_mod('process_cta2_text', 'Tư vấn dịch vụ'),
            'link' => get_theme_mod('process_cta2_link', '#contact')
        )
    );
}

// Clients section helpers
function quantrieu_get_clients_badge() {
    return get_theme_mod('clients_badge', 'CLIENT');
}

function quantrieu_get_clients_title() {
    return get_theme_mod('clients_title', 'Khách Hàng Của Chúng Tôi');
}

function quantrieu_get_clients_description() {
    return get_theme_mod('clients_description', 'Được tin tưởng bởi hàng nghìn doanh nghiệp trên toàn quốc');
}

function quantrieu_get_clients_count() {
    return get_theme_mod('clients_count', 8);
}

// News section helpers
function quantrieu_get_news_badge() {
    return get_theme_mod('news_badge', 'NEWS');
}

function quantrieu_get_news_title() {
    return get_theme_mod('news_title', 'Tin Tức & Kiến Thức In Ấn');
}

function quantrieu_get_news_view_all_text() {
    return get_theme_mod('news_view_all_text', 'Xem tất cả');
}

function quantrieu_get_news_count() {
    return get_theme_mod('news_count', 3);
}