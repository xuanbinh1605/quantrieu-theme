<?php
/**
 * Template Name: Giới Thiệu
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-br from-foreground via-foreground/95 to-foreground overflow-hidden" data-animate="fade">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-10 w-72 h-72 border border-white rounded-full"></div>
            <div class="absolute bottom-10 right-20 w-96 h-96 border border-white rounded-full"></div>
            <div class="absolute top-40 right-40 w-48 h-48 border border-white rounded-full"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <nav aria-label="breadcrumb" data-slot="breadcrumb" class="mb-6">
                <ol data-slot="breadcrumb-list" class="text-muted-foreground flex flex-wrap items-center gap-1.5 text-sm break-words sm:gap-2.5">
                    <li data-slot="breadcrumb-item" class="inline-flex items-center gap-1.5">
                        <a data-slot="breadcrumb-link" class="transition-colors text-white/60 hover:text-white" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>
                    </li>
                    <li data-slot="breadcrumb-separator" role="presentation" aria-hidden="true" class="[&>svg]:size-3.5 text-white/40">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </li>
                    <li data-slot="breadcrumb-item" class="inline-flex items-center gap-1.5">
                        <span data-slot="breadcrumb-page" role="link" aria-disabled="true" aria-current="page" class="font-normal text-[#FF9800]">Giới thiệu</span>
                    </li>
                </ol>
            </nav>
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 text-balance">
                    <?php echo wp_kses_post(quantrieu_get_about_hero_heading()); ?>
                </h1>
                <p class="text-lg md:text-xl text-white/70 leading-relaxed">
                    <?php echo esc_html(quantrieu_get_about_hero_description()); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Về chúng tôi Section -->
    <section class="py-20 lg:py-28" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="relative">
                    <div class="relative aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">
                        <?php echo wp_get_attachment_image(quantrieu_get_about_main_image1_id(), 'large', false, array('alt' => 'Xưởng in Quan Triều', 'class' => 'w-full h-full object-cover')); ?>
                    </div>
                    <div class="absolute -bottom-10 -right-6 w-48 md:w-64 aspect-square rounded-2xl overflow-hidden shadow-2xl border-4 border-background hidden md:block">
                        <?php echo wp_get_attachment_image(quantrieu_get_about_main_image2_id(), 'medium', false, array('alt' => 'Máy in hiện đại', 'class' => 'w-full h-full object-cover')); ?>
                    </div>
                    <div class="absolute top-6 -left-4 md:-left-8 bg-gradient-to-br from-[#FF9800] to-[#F44336] text-white p-5 rounded-2xl shadow-xl">
                        <div class="text-4xl font-bold"><?php echo esc_html(quantrieu_get_about_main_years_experience()); ?></div>
                        <div class="text-sm font-medium">Năm kinh nghiệm</div>
                    </div>
                </div>
                <div>
                    <span class="inline-block px-4 py-1.5 bg-[#0090ff]/10 text-[#0090ff] text-sm font-semibold rounded-full mb-4"><?php echo esc_html(quantrieu_get_about_main_badge()); ?></span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-balance"><?php echo esc_html(quantrieu_get_about_main_title()); ?></h2>
                    <div class="space-y-4 text-muted-foreground leading-relaxed mb-8">
                        <p><strong class="text-foreground">In Quan Triều</strong> <?php echo esc_html(quantrieu_get_about_main_paragraph1()); ?></p>
                        <p><?php echo esc_html(quantrieu_get_about_main_paragraph2()); ?></p>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <?php $features = quantrieu_get_about_main_features(); foreach ($features as $feature) : ?>
                        <li class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-[#FF9800]/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-3 h-3 text-[#FF9800]">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                            </div>
                            <span class="text-foreground font-medium"><?php echo esc_html($feature); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="flex gap-4 md:gap-8 pt-6 border-t border-border">
                        <?php $stats = quantrieu_get_about_main_stats(); foreach ($stats as $stat) : ?>
                        <div class="flex-shrink-0">
                            <div class="text-2xl md:text-3xl font-bold <?php echo esc_attr($stat['color']); ?>"><?php echo esc_html($stat['number']); ?></div>
                            <div class="text-muted-foreground text-xs md:text-sm"><?php echo esc_html($stat['text']); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Định hướng phát triển Section -->
    <section class="py-20 bg-muted/30" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-block px-4 py-1.5 bg-[#FF9800]/10 text-[#FF9800] text-sm font-semibold rounded-full mb-4"><?php echo esc_html(quantrieu_get_about_vision_badge()); ?></span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-balance"><?php echo esc_html(quantrieu_get_about_vision_title()); ?></h2>
                <p class="text-muted-foreground"><?php echo esc_html(quantrieu_get_about_vision_description()); ?></p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <?php $vision_cards = quantrieu_get_about_vision_cards(); foreach ($vision_cards as $card) : ?>
                <div class="bg-card p-8 rounded-3xl shadow-lg hover:shadow-xl transition-shadow border border-border">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6" style="background-color: <?php echo esc_attr($card['bg_color']); ?>;">
                        <?php echo wp_kses($card['icon'], array(
                            'svg' => array(
                                'xmlns' => true,
                                'width' => true,
                                'height' => true,
                                'viewBox' => true,
                                'fill' => true,
                                'stroke' => true,
                                'stroke-width' => true,
                                'stroke-linecap' => true,
                                'stroke-linejoin' => true,
                                'class' => true
                            ),
                            'circle' => array(
                                'cx' => true,
                                'cy' => true,
                                'r' => true
                            ),
                            'path' => array(
                                'd' => true
                            )
                        )); ?>
                    </div>
                    <h3 class="text-xl font-bold mb-4"><?php echo esc_html($card['title']); ?></h3>
                    <p class="text-muted-foreground leading-relaxed"><?php echo esc_html($card['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tại sao chọn chúng tôi Section -->
    <section class="py-20 lg:py-28" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-[#0090ff]/10 text-[#0090ff] text-sm font-semibold rounded-full mb-4"><?php echo esc_html(quantrieu_get_about_why_badge()); ?></span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-balance"><?php echo esc_html(quantrieu_get_about_why_title()); ?></h2>
                    <p class="text-muted-foreground leading-relaxed mb-8"><?php echo esc_html(quantrieu_get_about_why_description()); ?></p>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <?php 
                        $why_features = quantrieu_get_about_why_features(); 
                        // Check if the first feature has actual content
                        $has_content = !empty($why_features) && !empty($why_features[0]['title']);
                        
                        if ($has_content) :
                            foreach ($why_features as $feature) : 
                        ?>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 flex items-center justify-center flex-shrink-0">
                                <?php echo $feature['icon']; ?>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1"><?php echo esc_html($feature['title']); ?></h3>
                                <p class="text-sm text-muted-foreground"><?php echo esc_html($feature['description']); ?></p>
                            </div>
                        </div>
                        <?php 
                            endforeach; 
                        else : 
                        ?>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap w-6 h-6 text-[#FF9800]">
                                    <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Công nghệ hiện đại</h3>
                                <p class="text-sm text-muted-foreground">Trang bị máy in UV, Eco-solvent thế hệ mới nhất từ Nhật Bản, Hàn Quốc</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award w-6 h-6 text-[#FF9800]">
                                    <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                                    <circle cx="12" cy="8" r="6"></circle>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Chất lượng đảm bảo</h3>
                                <p class="text-sm text-muted-foreground">Sản phẩm sắc nét, bền màu theo thời gian, đạt tiêu chuẩn quốc tế</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-6 h-6 text-[#FF9800]">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Đội ngũ chuyên nghiệp</h3>
                                <p class="text-sm text-muted-foreground">Nhân viên tận tâm, nhiều năm kinh nghiệm trong ngành in ấn</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-6 h-6 text-[#FF9800]">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Đúng tiến độ</h3>
                                <p class="text-sm text-muted-foreground">Cam kết giao hàng đúng hẹn, đáp ứng mọi yêu cầu gấp của khách hàng</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-6 h-6 text-[#FF9800]">
                                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                                    <path d="M15 18H9"></path>
                                    <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                                    <circle cx="17" cy="18" r="2"></circle>
                                    <circle cx="7" cy="18" r="2"></circle>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Giao hàng toàn quốc</h3>
                                <p class="text-sm text-muted-foreground">Miễn phí giao hàng nội thành HCM, ship COD toàn quốc</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headphones w-6 h-6 text-[#FF9800]">
                                    <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Hỗ trợ 24/7</h3>
                                <p class="text-sm text-muted-foreground">Đội ngũ tư vấn sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi</p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-square rounded-3xl overflow-hidden">
                        <?php echo wp_get_attachment_image(quantrieu_get_about_why_image_id(), 'large', false, array('alt' => 'Đội ngũ In Quan Triều', 'class' => 'w-full h-full object-cover')); ?>
                    </div>
                    <div class="absolute -bottom-6 -left-2 bg-card rounded-2xl shadow-2xl p-6 border border-border">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-[#FF9800] to-[#F44336] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award w-7 h-7 text-white">
                                    <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                                    <circle cx="12" cy="8" r="6"></circle>
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-bold">Top 10</div>
                                <div class="text-sm text-muted-foreground">Đơn vị in ấn uy tín</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <?php get_template_part('template-parts/cta-section'); ?>
</main>

<?php
get_footer();
