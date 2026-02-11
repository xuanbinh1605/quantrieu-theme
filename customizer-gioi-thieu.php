<?php
/**
 * Customizer settings cho trang giới thiệu
 *
 * @package QuantrieuTheme
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Thêm panel và controls cho trang giới thiệu
 */
function quantrieu_customize_about_page($wp_customize) {
    
    // Panel chính cho trang giới thiệu
    $wp_customize->add_panel('about_page_panel', array(
        'title' => 'Cài Đặt Trang Giới Thiệu',
        'description' => 'Tùy chỉnh nội dung các phần trên trang giới thiệu',
        'priority' => 35,
    ));

    // =================== HERO SECTION ===================
    $wp_customize->add_section('about_hero_section', array(
        'title' => 'Phần Hero (Banner)',
        'panel' => 'about_page_panel',
        'priority' => 10,
    ));

    // Main heading
    $wp_customize->add_setting('about_hero_heading', array(
        'default' => 'Về <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent">In Quan Triều</span>',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_hero_heading', array(
        'label' => 'Tiêu đề chính',
        'section' => 'about_hero_section',
        'type' => 'textarea',
        'description' => 'Có thể sử dụng HTML. Sử dụng <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent"> để tô màu gradient.',
    ));

    // Description
    $wp_customize->add_setting('about_hero_description', array(
        'default' => 'Đơn vị tiên phong trong lĩnh vực in ấn kỹ thuật số tại TP. Hồ Chí Minh, mang đến giải pháp in ấn toàn diện cho mọi nhu cầu của bạn.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_hero_description', array(
        'label' => 'Mô tả',
        'section' => 'about_hero_section',
        'type' => 'textarea',
    ));

    // =================== ABOUT US SECTION ===================
    $wp_customize->add_section('about_main_section', array(
        'title' => 'Phần Về Chúng Tôi',
        'panel' => 'about_page_panel',
        'priority' => 20,
    ));

    // Badge text
    $wp_customize->add_setting('about_main_badge', array(
        'default' => 'VỀ CHÚNG TÔI',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_main_badge', array(
        'label' => 'Badge',
        'section' => 'about_main_section',
        'type' => 'text',
    ));

    // Section title
    $wp_customize->add_setting('about_main_title', array(
        'default' => 'Đối tác tin cậy cho mọi nhu cầu in ấn',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_main_title', array(
        'label' => 'Tiêu đề phần',
        'section' => 'about_main_section',
        'type' => 'text',
    ));

    // First paragraph
    $wp_customize->add_setting('about_main_paragraph1', array(
        'default' => 'In Quan Triều được thành lập với sứ mệnh mang đến dịch vụ in ấn chất lượng cao, đáp ứng đa dạng nhu cầu từ cá nhân đến doanh nghiệp. Với hơn 10 năm hoạt động trong ngành, chúng tôi tự hào là đơn vị tiên phong áp dụng công nghệ in hiện đại nhất tại Việt Nam.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_main_paragraph1', array(
        'label' => 'Đoạn văn thứ nhất',
        'section' => 'about_main_section',
        'type' => 'textarea',
    ));

    // Second paragraph
    $wp_customize->add_setting('about_main_paragraph2', array(
        'default' => 'Đội ngũ nhân viên giàu kinh nghiệm, tận tâm cùng hệ thống máy móc nhập khẩu từ Nhật Bản, Hàn Quốc giúp chúng tôi tạo ra những sản phẩm in ấn sắc nét, bền màu và hoàn hảo đến từng chi tiết.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_main_paragraph2', array(
        'label' => 'Đoạn văn thứ hai',
        'section' => 'about_main_section',
        'type' => 'textarea',
    ));

    // Features (4 items)
    $feature_defaults = array(
        1 => 'Công nghệ in UV, Eco-solvent hiện đại nhất',
        2 => 'Đội ngũ thiết kế sáng tạo, hỗ trợ 24/7',
        3 => 'Cam kết chất lượng, đúng tiến độ',
        4 => 'Giá cả cạnh tranh, minh bạch'
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting('about_main_feature_' . $i, array(
            'default' => $feature_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('about_main_feature_' . $i, array(
            'label' => 'Đặc điểm ' . $i,
            'section' => 'about_main_section',
            'type' => 'text',
        ));
    }

    // Images
    $wp_customize->add_setting('about_main_image1', array(
        'default' => 57,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'about_main_image1', array(
        'label' => 'Hình ảnh chính',
        'section' => 'about_main_section',
        'mime_type' => 'image',
        'description' => 'Hình ảnh lớn bên trái',
    )));

    $wp_customize->add_setting('about_main_image2', array(
        'default' => 58,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'about_main_image2', array(
        'label' => 'Hình ảnh phụ',
        'section' => 'about_main_section',
        'mime_type' => 'image',
        'description' => 'Hình ảnh nhỏ góc dưới bên phải',
    )));

    // Statistics (3 stats)
    $stats_defaults = array(
        1 => array('number' => '5000+', 'text' => 'Khách hàng'),
        2 => array('number' => '10000+', 'text' => 'Dự án hoàn thành'),
        3 => array('number' => '99%', 'text' => 'Khách hàng hài lòng')
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting('about_main_stat_' . $i . '_number', array(
            'default' => $stats_defaults[$i]['number'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('about_main_stat_' . $i . '_number', array(
            'label' => 'Thống kê ' . $i . ' - Số',
            'section' => 'about_main_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting('about_main_stat_' . $i . '_text', array(
            'default' => $stats_defaults[$i]['text'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('about_main_stat_' . $i . '_text', array(
            'label' => 'Thống kê ' . $i . ' - Văn bản',
            'section' => 'about_main_section',
            'type' => 'text',
        ));
    }

    // Years of experience
    $wp_customize->add_setting('about_main_years_experience', array(
        'default' => '10+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_main_years_experience', array(
        'label' => 'Số năm kinh nghiệm',
        'section' => 'about_main_section',
        'type' => 'text',
    ));

    // =================== VISION & MISSION SECTION ===================
    $wp_customize->add_section('about_vision_section', array(
        'title' => 'Phần Tầm Nhìn & Sứ Mệnh',
        'panel' => 'about_page_panel',
        'priority' => 30,
    ));

    // Badge text
    $wp_customize->add_setting('about_vision_badge', array(
        'default' => 'TẦM NHÌN & SỨ MỆNH',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_vision_badge', array(
        'label' => 'Badge',
        'section' => 'about_vision_section',
        'type' => 'text',
    ));

    // Section title
    $wp_customize->add_setting('about_vision_title', array(
        'default' => 'Định hướng phát triển',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_vision_title', array(
        'label' => 'Tiêu đề phần',
        'section' => 'about_vision_section',
        'type' => 'text',
    ));

    // Section description
    $wp_customize->add_setting('about_vision_description', array(
        'default' => 'Những giá trị cốt lõi định hình nên In Quan Triều ngày hôm nay',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_vision_description', array(
        'label' => 'Mô tả phần',
        'section' => 'about_vision_section',
        'type' => 'textarea',
    ));

    // Vision cards (3 cards)
    $vision_cards = array(
        1 => array(
            'title' => 'Sứ mệnh',
            'description' => 'Mang đến giải pháp in ấn toàn diện, chất lượng cao với chi phí hợp lý, góp phần nâng cao hình ảnh thương hiệu cho khách hàng.'
        ),
        2 => array(
            'title' => 'Tầm nhìn',
            'description' => 'Trở thành đơn vị in ấn hàng đầu tại Việt Nam, tiên phong ứng dụng công nghệ hiện đại và thân thiện với môi trường.'
        ),
        3 => array(
            'title' => 'Giá trị cốt lõi',
            'description' => 'Chất lượng - Uy tín - Tận tâm. Mỗi sản phẩm là một cam kết về sự hoàn hảo và sự hài lòng của khách hàng.'
        )
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting('about_vision_card_' . $i . '_title', array(
            'default' => $vision_cards[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('about_vision_card_' . $i . '_title', array(
            'label' => 'Thẻ ' . $i . ' - Tiêu đề',
            'section' => 'about_vision_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting('about_vision_card_' . $i . '_description', array(
            'default' => $vision_cards[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control('about_vision_card_' . $i . '_description', array(
            'label' => 'Thẻ ' . $i . ' - Mô tả',
            'section' => 'about_vision_section',
            'type' => 'textarea',
        ));
    }

    // =================== WHY CHOOSE US SECTION ===================
    $wp_customize->add_section('about_why_choose_section', array(
        'title' => 'Phần Tại Sao Chọn Chúng Tôi',
        'panel' => 'about_page_panel',
        'priority' => 40,
    ));

    // Badge text
    $wp_customize->add_setting('about_why_badge', array(
        'default' => 'TẠI SAO CHỌN CHÚNG TÔI',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_why_badge', array(
        'label' => 'Badge',
        'section' => 'about_why_choose_section',
        'type' => 'text',
    ));

    // Section title
    $wp_customize->add_setting('about_why_title', array(
        'default' => 'Lý do khách hàng tin tưởng In Quan Triều',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_why_title', array(
        'label' => 'Tiêu đề phần',
        'section' => 'about_why_choose_section',
        'type' => 'text',
    ));

    // Section description
    $wp_customize->add_setting('about_why_description', array(
        'default' => 'Với phương châm "Chất lượng là hàng đầu", chúng tôi không ngừng nỗ lực để mang đến cho khách hàng những trải nghiệm dịch vụ tốt nhất.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_why_description', array(
        'label' => 'Mô tả phần',
        'section' => 'about_why_choose_section',
        'type' => 'textarea',
    ));

    // Section image
    $wp_customize->add_setting('about_why_image', array(
        'default' => 59,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'about_why_image', array(
        'label' => 'Hình ảnh phần',
        'section' => 'about_why_choose_section',
        'mime_type' => 'image',
    )));

    // Why choose features (6 features)
    $why_features = array(
        1 => array(
            'title' => 'Công nghệ hiện đại',
            'description' => 'Trang bị máy in UV, Eco-solvent thế hệ mới nhất từ Nhật Bản, Hàn Quốc'
        ),
        2 => array(
            'title' => 'Chất lượng đảm bảo',
            'description' => 'Sản phẩm sắc nét, bền màu theo thời gian, đạt tiêu chuẩn quốc tế'
        ),
        3 => array(
            'title' => 'Đội ngũ chuyên nghiệp',
            'description' => 'Nhân viên tận tâm, nhiều năm kinh nghiệm trong ngành in ấn'
        ),
        4 => array(
            'title' => 'Đúng tiến độ',
            'description' => 'Cam kết giao hàng đúng hẹn, đáp ứng mọi yêu cầu gấp của khách hàng'
        ),
        5 => array(
            'title' => 'Giao hàng toàn quốc',
            'description' => 'Miễn phí giao hàng nội thành HCM, ship COD toàn quốc'
        ),
        6 => array(
            'title' => 'Hỗ trợ 24/7',
            'description' => 'Đội ngũ tư vấn sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi'
        )
    );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting('about_why_feature_' . $i . '_title', array(
            'default' => $why_features[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('about_why_feature_' . $i . '_title', array(
            'label' => 'Đặc điểm ' . $i . ' - Tiêu đề',
            'section' => 'about_why_choose_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting('about_why_feature_' . $i . '_description', array(
            'default' => $why_features[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control('about_why_feature_' . $i . '_description', array(
            'label' => 'Đặc điểm ' . $i . ' - Mô tả',
            'section' => 'about_why_choose_section',
            'type' => 'textarea',
        ));
    }
}

add_action('customize_register', 'quantrieu_customize_about_page');

/**
 * Helper functions để lấy customizer values với fallback
 */

// Hero section helpers
function quantrieu_get_about_hero_heading() {
    return get_theme_mod('about_hero_heading', 'Về <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent">In Quan Triều</span>');
}

function quantrieu_get_about_hero_description() {
    return get_theme_mod('about_hero_description', 'Đơn vị tiên phong trong lĩnh vực in ấn kỹ thuật số tại TP. Hồ Chí Minh, mang đến giải pháp in ấn toàn diện cho mọi nhu cầu của bạn.');
}

// About main section helpers
function quantrieu_get_about_main_badge() {
    return get_theme_mod('about_main_badge', 'VỀ CHÚNG TÔI');
}

function quantrieu_get_about_main_title() {
    return get_theme_mod('about_main_title', 'Đối tác tin cậy cho mọi nhu cầu in ấn');
}

function quantrieu_get_about_main_paragraph1() {
    return get_theme_mod('about_main_paragraph1', 'In Quan Triều được thành lập với sứ mệnh mang đến dịch vụ in ấn chất lượng cao, đáp ứng đa dạng nhu cầu từ cá nhân đến doanh nghiệp. Với hơn 10 năm hoạt động trong ngành, chúng tôi tự hào là đơn vị tiên phong áp dụng công nghệ in hiện đại nhất tại Việt Nam.');
}

function quantrieu_get_about_main_paragraph2() {
    return get_theme_mod('about_main_paragraph2', 'Đội ngũ nhân viên giàu kinh nghiệm, tận tâm cùng hệ thống máy móc nhập khẩu từ Nhật Bản, Hàn Quốc giúp chúng tôi tạo ra những sản phẩm in ấn sắc nét, bền màu và hoàn hảo đến từng chi tiết.');
}

function quantrieu_get_about_main_features() {
    return array(
        get_theme_mod('about_main_feature_1', 'Công nghệ in UV, Eco-solvent hiện đại nhất'),
        get_theme_mod('about_main_feature_2', 'Đội ngũ thiết kế sáng tạo, hỗ trợ 24/7'),
        get_theme_mod('about_main_feature_3', 'Cam kết chất lượng, đúng tiến độ'),
        get_theme_mod('about_main_feature_4', 'Giá cả cạnh tranh, minh bạch')
    );
}

function quantrieu_get_about_main_image1_id() {
    return get_theme_mod('about_main_image1', 57);
}

function quantrieu_get_about_main_image2_id() {
    return get_theme_mod('about_main_image2', 58);
}

function quantrieu_get_about_main_years_experience() {
    return get_theme_mod('about_main_years_experience', '10+');
}

function quantrieu_get_about_main_stats() {
    return array(
        array(
            'number' => get_theme_mod('about_main_stat_1_number', '5000+'),
            'text' => get_theme_mod('about_main_stat_1_text', 'Khách hàng'),
            'color' => 'text-[#FF9800]'
        ),
        array(
            'number' => get_theme_mod('about_main_stat_2_number', '10000+'),
            'text' => get_theme_mod('about_main_stat_2_text', 'Dự án hoàn thành'),
            'color' => 'text-[#0090ff]'
        ),
        array(
            'number' => get_theme_mod('about_main_stat_3_number', '99%'),
            'text' => get_theme_mod('about_main_stat_3_text', 'Khách hàng hài lòng'),
            'color' => 'text-[#F44336]'
        )
    );
}

// Vision section helpers
function quantrieu_get_about_vision_badge() {
    return get_theme_mod('about_vision_badge', 'TẦM NHÌN & SỨ MỆNH');
}

function quantrieu_get_about_vision_title() {
    return get_theme_mod('about_vision_title', 'Định hướng phát triển');
}

function quantrieu_get_about_vision_description() {
    return get_theme_mod('about_vision_description', 'Những giá trị cốt lõi định hình nên In Quan Triều ngày hôm nay');
}

function quantrieu_get_about_vision_cards() {
    return array(
        array(
            'title' => get_theme_mod('about_vision_card_1_title', 'Sứ mệnh'),
            'description' => get_theme_mod('about_vision_card_1_description', 'Mang đến giải pháp in ấn toàn diện, chất lượng cao với chi phí hợp lý, góp phần nâng cao hình ảnh thương hiệu cho khách hàng.'),
            'icon_color' => 'rgb(255, 152, 0)',
            'bg_color' => 'rgba(255, 152, 0, 0.082)',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-target w-8 h-8">
                <circle cx="12" cy="12" r="10"></circle>
                <circle cx="12" cy="12" r="6"></circle>
                <circle cx="12" cy="12" r="2"></circle>
            </svg>'
        ),
        array(
            'title' => get_theme_mod('about_vision_card_2_title', 'Tầm nhìn'),
            'description' => get_theme_mod('about_vision_card_2_description', 'Trở thành đơn vị in ấn hàng đầu tại Việt Nam, tiên phong ứng dụng công nghệ hiện đại và thân thiện với môi trường.'),
            'icon_color' => 'rgb(0, 144, 255)',
            'bg_color' => 'rgba(0, 144, 255, 0.082)',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-8 h-8">
                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>'
        ),
        array(
            'title' => get_theme_mod('about_vision_card_3_title', 'Giá trị cốt lõi'),
            'description' => get_theme_mod('about_vision_card_3_description', 'Chất lượng - Uy tín - Tận tâm. Mỗi sản phẩm là một cam kết về sự hoàn hảo và sự hài lòng của khách hàng.'),
            'icon_color' => 'rgb(244, 67, 54)',
            'bg_color' => 'rgba(244, 67, 54, 0.082)',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-8 h-8">
                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
            </svg>'
        )
    );
}

// Why choose us section helpers
function quantrieu_get_about_why_badge() {
    return get_theme_mod('about_why_badge', 'TẠI SAO CHỌN CHÚNG TÔI');
}

function quantrieu_get_about_why_title() {
    return get_theme_mod('about_why_title', 'Lý do khách hàng tin tưởng In Quan Triều');
}

function quantrieu_get_about_why_description() {
    return get_theme_mod('about_why_description', 'Với phương châm "Chất lượng là hàng đầu", chúng tôi không ngừng nỗ lực để mang đến cho khách hàng những trải nghiệm dịch vụ tốt nhất.');
}

function quantrieu_get_about_why_image_id() {
    return get_theme_mod('about_why_image', 59);
}

function quantrieu_get_about_why_features() {
    $icons = array(
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap w-6 h-6 text-[#FF9800]">
            <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
        </svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award w-6 h-6 text-[#FF9800]">
            <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
            <circle cx="12" cy="8" r="6"></circle>
        </svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-6 h-6 text-[#FF9800]">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-6 h-6 text-[#FF9800]">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
        </svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-6 h-6 text-[#FF9800]">
            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
            <path d="M15 18H9"></path>
            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
            <circle cx="17" cy="18" r="2"></circle>
            <circle cx="7" cy="18" r="2"></circle>
        </svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headphones w-6 h-6 text-[#FF9800]">
            <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path>
        </svg>'
    );

    $features = array();
    for ($i = 1; $i <= 6; $i++) {
        $features[] = array(
            'title' => get_theme_mod('about_why_feature_' . $i . '_title', ''),
            'description' => get_theme_mod('about_why_feature_' . $i . '_description', ''),
            'icon' => $icons[$i - 1]
        );
    }
    
    return $features;
}