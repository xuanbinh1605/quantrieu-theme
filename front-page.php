<?php
/**
 * The front page template file
 *
 * @package QuantrieuTheme
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative py-12 lg:py-16 pt-24 lg:pt-28 overflow-hidden bg-background" data-animate="fade">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center" style="margin-top: 3rem;">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary/10 rounded-full text-primary text-xs md:text-sm font-medium mb-4 mx-auto lg:mx-0">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                        <?php echo esc_html(quantrieu_get_hero_badge_text()); ?>
                    </div>

                    <!-- Heading -->
                    <h1 class="mb-4 text-balance text-center lg:text-left">
                        <?php echo wp_kses_post(quantrieu_get_hero_heading()); ?>
                    </h1>

                    <!-- Description -->
                    <p class="text-muted-foreground mb-6 max-w-lg text-center lg:text-left mx-auto lg:mx-0">
                        <?php echo esc_html(quantrieu_get_hero_description()); ?>
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mb-8 justify-center lg:justify-start">
                        <a href="<?php echo esc_url(quantrieu_get_hero_cta1_link()); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground hover:bg-primary/90 h-10 rounded-md px-6 has-[>svg]:px-4 btn-primary btn-lg">
                            <?php echo esc_html(quantrieu_get_hero_cta1_text()); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="tel:<?php echo esc_attr(str_replace(' ', '', quantrieu_get_hero_phone())); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[>svg]:px-4 btn-outline btn-lg bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <?php echo esc_html(quantrieu_get_hero_phone()); ?>
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="flex gap-6 md:gap-8 justify-center lg:justify-start">
                        <?php $stats = quantrieu_get_hero_stats(); foreach ($stats as $stat) : ?>
                        <div>
                            <div class="text-2xl font-bold text-primary"><?php echo esc_html($stat['number']); ?></div>
                            <div class="text-sm text-muted-foreground"><?php echo esc_html($stat['text']); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative">
                    <div class="relative aspect-[4/3] w-full rounded-xl overflow-hidden shadow-lg">
                        <?php 
                        $hero_image_id = quantrieu_get_hero_image_id();
                        echo wp_get_attachment_image($hero_image_id, 'full', false, array(
                            'alt' => 'Dịch vụ in ấn chuyên nghiệp',
                            'class' => 'w-full h-full object-cover',
                            'loading' => 'eager'
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 bg-muted/50" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16 px-2">
                <span class="inline-block px-3 md:px-4 py-1.5 bg-[#FF9800]/10 text-[#FF9800] text-xs md:text-sm font-medium rounded-full mb-4"><?php echo esc_html(quantrieu_get_services_badge()); ?></span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4 text-balance"><?php echo esc_html(quantrieu_get_services_title()); ?></h2>
                <p class="text-muted-foreground max-w-2xl mx-auto text-sm md:text-base"><?php echo esc_html(quantrieu_get_services_description()); ?></p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                // Query dich-vu posts
                $services_query = new WP_Query(array(
                    'post_type' => 'dich_vu',
                    'posts_per_page' => quantrieu_get_services_count(),
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($services_query->have_posts()) :
                    $delay = 0;
                    while ($services_query->have_posts()) : $services_query->the_post();
                        ?>
                        <a class="group relative bg-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2" 
                           href="<?php echo esc_url(get_permalink()); ?>" 
                           style="animation-delay: <?php echo $delay; ?>ms;">
                            <!-- Image -->
                            <div class="aspect-[4/3] overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full', array(
                                        'alt' => get_the_title(),
                                        'class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500'
                                    )); ?>
                                <?php else : ?>
                                    <div class="w-full h-full bg-muted flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-muted-foreground">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                            <circle cx="9" cy="9" r="2"></circle>
                                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-foreground/90 via-foreground/20 to-transparent"></div>

                            <!-- Content -->
                            <div class="absolute bottom-0 left-0 right-0 p-5">
                                <h3 class="text-lg font-semibold text-background mb-1 group-hover:text-[#FF9800] transition-colors">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="text-background/70 text-sm line-clamp-2">
                                    <?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?>
                                </p>
                            </div>

                            <!-- Arrow Icon -->
                            <div class="absolute top-4 right-4 w-10 h-10 bg-background/20 backdrop-blur-sm rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5 text-background">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </div>
                        </a>
                        <?php
                        $delay += 100;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-primary-foreground hover:bg-primary/90 font-medium rounded-full transition-all" href="<?php echo esc_url(get_post_type_archive_link('dich_vu')); ?>">
                    <?php echo esc_html(quantrieu_get_services_view_all_text()); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-24" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Image -->
                <div class="relative">
                    <div class="relative aspect-[4/3] rounded-3xl overflow-hidden">
                        <?php 
                        $about_image_id = quantrieu_get_about_image_id(); // WordPress media ID for about image
                        echo wp_get_attachment_image($about_image_id, 'full', false, array(
                            'alt' => 'Xưởng in Quan Triều',
                            'class' => 'w-full h-full object-cover'
                        ));
                        ?>
                    </div>
                    <div class="absolute -bottom-8 -right-7 bg-card rounded-2xl shadow-2xl p-6 max-w-xs">
                        <div class="text-4xl font-bold bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent mb-2"><?php echo esc_html(quantrieu_get_about_experience_years()); ?></div>
                        <p class="text-muted-foreground">Năm kinh nghiệm trong ngành in ấn</p>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="text-center lg:text-left">
                    <span class="inline-block px-3 md:px-4 py-1.5 bg-[#0090ff]/10 text-[#0090ff] text-xs md:text-sm font-medium rounded-full mb-4"><?php echo esc_html(quantrieu_get_about_badge()); ?></span>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-balance"><?php echo esc_html(quantrieu_get_about_title()); ?></h2>
                    <p class="text-muted-foreground leading-relaxed mb-6">
                        <?php echo esc_html(quantrieu_get_about_description()); ?>
                    </p>

                    <!-- Features List -->
                    <ul class="space-y-3 mb-8">
                        <?php $features = quantrieu_get_about_features(); foreach ($features as $feature) : ?>
                        <li class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-[#FF9800]/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-3 h-3 text-[#FF9800]">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                            </div>
                            <span class="text-foreground" style="text-align: left;"><?php echo esc_html($feature); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo esc_url(quantrieu_get_about_cta_link()); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[>svg]:px-3 bg-primary text-primary-foreground hover:bg-primary/90">
                        <?php echo esc_html(quantrieu_get_about_cta_text()); ?>
                    </a>
                </div>
            </div>

            <!-- Benefits Grid -->
            <div class="grid sm:grid-cols-3 gap-6 mt-20">
                <?php 
                $benefits = quantrieu_get_benefits();
                $benefit_icons = array(
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-7 h-7 text-white">
                        <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                        <path d="M15 18H9"></path>
                        <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                        <circle cx="17" cy="18" r="2"></circle>
                        <circle cx="7" cy="18" r="2"></circle>
                    </svg>',
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-7 h-7 text-white">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                    </svg>',
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card w-7 h-7 text-white">
                        <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                        <line x1="2" x2="22" y1="10" y2="10"></line>
                    </svg>'
                );
                
                foreach ($benefits as $index => $benefit) : ?>
                <!-- Benefit <?php echo $index + 1; ?> -->
                <div class="flex items-start gap-4 p-6 bg-muted/50 rounded-2xl">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#FF9800] to-[#F44336] flex items-center justify-center flex-shrink-0">
                        <?php echo $benefit_icons[$index]; ?>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1"><?php echo esc_html($benefit['title']); ?></h3>
                        <p class="text-sm text-muted-foreground"><?php echo esc_html($benefit['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-24 bg-gradient-to-br from-foreground via-foreground/95 to-foreground text-background overflow-hidden" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16 px-2">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4 text-balance">
                    <?php echo wp_kses_post(quantrieu_get_process_title()); ?>
                </h2>
                <p class="text-background/70 max-w-2xl mx-auto text-sm md:text-base">
                    <?php echo esc_html(quantrieu_get_process_description()); ?>
                </p>
            </div>

            <!-- Process Steps -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 mb-12">
                <!-- Step 1 -->
                <div class="relative group flex flex-col items-center">
                    <div class="relative z-10 text-center px-2 w-full">
                        <div class="inline-flex items-center justify-center w-16 h-16 lg:w-24 lg:h-24 rounded-2xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 mb-4 lg:mb-6 group-hover:from-[#FF9800]/30 group-hover:to-[#F44336]/30 transition-colors border border-[#FF9800]/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square w-8 h-8 lg:w-10 lg:h-10 text-[#FF9800]">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div class="text-xs lg:text-sm font-medium text-[#FF9800] mb-2">01</div>
                        <h3 class="text-sm lg:text-lg font-semibold mb-2 lg:mb-3">Tiếp nhận & Tư vấn</h3>
                        <p class="text-background/60 text-xs lg:text-sm leading-relaxed mx-auto">
                            Lắng nghe nhu cầu và tư vấn giải pháp in ấn phù hợp nhất cho khách hàng
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative group flex flex-col items-center">
                    <div class="relative z-10 text-center px-2 w-full">
                        <div class="inline-flex items-center justify-center w-16 h-16 lg:w-24 lg:h-24 rounded-2xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 mb-4 lg:mb-6 group-hover:from-[#FF9800]/30 group-hover:to-[#F44336]/30 transition-colors border border-[#FF9800]/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-palette w-8 h-8 lg:w-10 lg:h-10 text-[#FF9800]">
                                <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle>
                                <circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle>
                                <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                <circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle>
                                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"></path>
                            </svg>
                        </div>
                        <div class="text-xs lg:text-sm font-medium text-[#FF9800] mb-2">02</div>
                        <h3 class="text-sm lg:text-lg font-semibold mb-2 lg:mb-3">Thiết kế & Duyệt mẫu</h3>
                        <p class="text-background/60 text-xs lg:text-sm leading-relaxed mx-auto">
                            Thiết kế theo yêu cầu hoặc hỗ trợ hoàn thiện file in cho khách hàng
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative group flex flex-col items-center">
                    <div class="relative z-10 text-center px-2 w-full">
                        <div class="inline-flex items-center justify-center w-16 h-16 lg:w-24 lg:h-24 rounded-2xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 mb-4 lg:mb-6 group-hover:from-[#FF9800]/30 group-hover:to-[#F44336]/30 transition-colors border border-[#FF9800]/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer w-8 h-8 lg:w-10 lg:h-10 text-[#FF9800]">
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 0 0 1-2 2h-2"></path>
                                <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"></path>
                                <rect x="6" y="14" width="12" height="8" rx="1"></rect>
                            </svg>
                        </div>
                        <div class="text-xs lg:text-sm font-medium text-[#FF9800] mb-2">03</div>
                        <h3 class="text-sm lg:text-lg font-semibold mb-2 lg:mb-3">In ấn & Gia công</h3>
                        <p class="text-background/60 text-xs lg:text-sm leading-relaxed mx-auto">
                            Sản xuất với công nghệ hiện đại, kiểm soát chất lượng nghiêm ngặt
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative group flex flex-col items-center">
                    <div class="relative z-10 text-center px-2 w-full">
                        <div class="inline-flex items-center justify-center w-16 h-16 lg:w-24 lg:h-24 rounded-2xl bg-gradient-to-br from-[#FF9800]/20 to-[#F44336]/20 mb-4 lg:mb-6 group-hover:from-[#FF9800]/30 group-hover:to-[#F44336]/30 transition-colors border border-[#FF9800]/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-8 h-8 lg:w-10 lg:h-10 text-[#FF9800]">
                                <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                <path d="M12 22V12"></path>
                                <path d="m3.3 7 7.703 4.734a2 2 0 0 0 1.994 0L20.7 7"></path>
                                <path d="m7.5 4.27 9 5.15"></path>
                            </svg>
                        </div>
                        <div class="text-xs lg:text-sm font-medium text-[#FF9800] mb-2">04</div>
                        <h3 class="text-sm lg:text-lg font-semibold mb-2 lg:mb-3">Giao hàng & Nghiệm thu</h3>
                        <p class="text-background/60 text-xs lg:text-sm leading-relaxed mx-auto">
                            Đóng gói cẩn thận và giao hàng tận nơi đúng hẹn
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <?php $cta_buttons = quantrieu_get_process_cta_buttons(); ?>
                <a href="<?php echo esc_url($cta_buttons[0]['link']); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground hover:bg-primary/90 h-10 rounded-md px-6 has-[>svg]:px-4 btn-white">
                    <?php echo esc_html($cta_buttons[0]['text']); ?>
                </a>
                <a href="<?php echo esc_url($cta_buttons[1]['link']); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border shadow-xs hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-9 px-4 py-2 has-[>svg]:px-3 border-background/30 text-background hover:bg-background/10 bg-transparent">
                    <?php echo esc_html($cta_buttons[1]['text']); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-24 bg-muted/30" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16 px-2">
                <span class="inline-block px-3 md:px-4 py-1.5 bg-[#0090ff]/10 text-[#0090ff] text-xs md:text-sm font-medium rounded-full mb-4"><?php echo esc_html(quantrieu_get_clients_badge()); ?></span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4"><?php echo esc_html(quantrieu_get_clients_title()); ?></h2>
                <p class="text-muted-foreground max-w-2xl mx-auto text-sm md:text-base"><?php echo esc_html(quantrieu_get_clients_description()); ?></p>
            </div>

            <!-- Clients Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php
                // Query khach-hang posts
                $clients_query = new WP_Query(array(
                    'post_type' => 'khach_hang',
                    'posts_per_page' => quantrieu_get_clients_count(),
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($clients_query->have_posts()) :
                    while ($clients_query->have_posts()) : $clients_query->the_post();
                        ?>
                        <div class="flex items-center justify-center p-6 bg-card rounded-xl hover:shadow-lg transition-shadow grayscale hover:grayscale-0">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array(
                                    'alt' => get_the_title(),
                                    'class' => 'h-12 w-auto object-contain'
                                )); ?>
                            <?php else : ?>
                                <div class="h-12 flex items-center justify-center text-muted-foreground text-sm font-medium">
                                    <?php the_title(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback if no clients
                    for ($i = 1; $i <= 8; $i++) :
                        ?>
                        <div class="flex items-center justify-center p-6 bg-card rounded-xl hover:shadow-lg transition-shadow grayscale hover:grayscale-0">
                            <div class="h-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="48" viewBox="0 0 120 48" class="text-muted-foreground opacity-30">
                                    <rect x="10" y="14" width="100" height="20" rx="4" fill="currentColor"/>
                                    <text x="60" y="30" text-anchor="middle" fill="white" font-size="12" font-family="Arial">Client <?php echo $i; ?></text>
                                </svg>
                            </div>
                        </div>
                        <?php
                    endfor;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-24" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-12 px-2">
                <div class="text-center sm:text-left">
                    <span class="inline-block px-3 md:px-4 py-1.5 bg-[#FF9800]/10 text-[#FF9800] text-xs md:text-sm font-medium rounded-full mb-4"><?php echo esc_html(quantrieu_get_news_badge()); ?></span>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold"><?php echo esc_html(quantrieu_get_news_title()); ?></h2>
                </div>
                <a class="inline-flex items-center gap-2 text-[#0090ff] hover:text-[#0070cc] font-medium" href="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>">
                    <?php echo esc_html(quantrieu_get_news_view_all_text()); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- News Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Query tin-tuc posts
                $news_query = new WP_Query(array(
                    'post_type' => 'tin_tuc',
                    'posts_per_page' => quantrieu_get_news_count(),
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        ?>
                        <article class="group bg-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <!-- Featured Image -->
                                <div class="aspect-[4/3] overflow-hidden">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', array(
                                            'alt' => get_the_title(),
                                            'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500'
                                        )); ?>
                                    <?php else : ?>
                                        <div class="w-full h-full bg-muted flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-muted-foreground">
                                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="16" x2="8" y1="13" y2="13"></line>
                                                <line x1="16" x2="8" y1="17" y2="17"></line>
                                                <line x1="10" x2="8" y1="9" y2="9"></line>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Content -->
                                <div class="p-6">
                                    <!-- Date -->
                                    <div class="flex items-center gap-2 text-sm text-muted-foreground mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <?php echo get_the_date('d/m/Y'); ?>
                                    </div>

                                    <!-- Title -->
                                    <h3 class="text-lg font-semibold mb-2 line-clamp-2 group-hover:text-[#FF9800] transition-colors">
                                        <?php the_title(); ?>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="text-muted-foreground text-sm line-clamp-2">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                    </p>
                                </div>
                            </a>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/cta-section'); ?>
</main>

<?php
get_footer();
