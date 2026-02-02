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
    <section class="relative py-12 lg:py-16 pt-24 lg:pt-28 overflow-hidden bg-background">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center" style="margin-top: 3rem;">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary/10 rounded-full text-primary text-xs md:text-sm font-medium mb-4 mx-auto lg:mx-0">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                        In ấn chuyên nghiệp tại TP.HCM
                    </div>

                    <!-- Heading -->
                    <h1 class="mb-4 text-balance text-center lg:text-left">
                        Dịch Vụ <span class="text-primary">In Ấn Trọn Gói</span> Chất Lượng Cao
                    </h1>

                    <!-- Description -->
                    <p class="text-muted-foreground mb-6 max-w-lg text-center lg:text-left mx-auto lg:mx-0">
                        In Quan Triều cung cấp đa dạng dịch vụ in ấn từ Standee, Banner, Backdrop đến in UV, Decal với công nghệ hiện đại, giá cả cạnh tranh và giao hàng nhanh toàn quốc.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mb-8 justify-center lg:justify-start">
                        <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground hover:bg-primary/90 h-10 rounded-md px-6 has-[>svg]:px-4 btn-primary btn-lg">
                            Nhận báo giá ngay
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </button>
                        <a href="tel:0909123456" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[>svg]:px-4 btn-outline btn-lg bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            0909 123 456
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="flex gap-6 md:gap-8 justify-center lg:justify-start">
                        <div>
                            <div class="text-2xl font-bold text-primary">10+</div>
                            <div class="text-sm text-muted-foreground">Năm kinh nghiệm</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">5000+</div>
                            <div class="text-sm text-muted-foreground">Khách hàng</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">99%</div>
                            <div class="text-sm text-muted-foreground">Hài lòng</div>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative">
                    <div class="relative aspect-[4/3] w-full rounded-xl overflow-hidden shadow-lg">
                        <?php 
                        $hero_image_id = 14;
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
    <section class="py-24 bg-muted/50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16 px-2">
                <span class="inline-block px-3 md:px-4 py-1.5 bg-[#FF9800]/10 text-[#FF9800] text-xs md:text-sm font-medium rounded-full mb-4">OUR SERVICES</span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4 text-balance">Dịch Vụ Của Chúng Tôi</h2>
                <p class="text-muted-foreground max-w-2xl mx-auto text-sm md:text-base">Đa dạng dịch vụ in ấn đáp ứng mọi nhu cầu từ in ấn văn phòng đến quảng cáo thương mại</p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                // Query dich-vu posts
                $services_query = new WP_Query(array(
                    'post_type' => 'dich_vu',
                    'posts_per_page' => 8,
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
                <a class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#FF9800] to-[#F44336] text-white font-medium rounded-full hover:shadow-lg hover:shadow-[#FF9800]/25 transition-all" href="<?php echo esc_url(get_post_type_archive_link('dich_vu')); ?>">
                    Xem tất cả dịch vụ
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
