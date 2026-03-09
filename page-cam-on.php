<?php
/**
 * Template Name: Cảm ơn
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-br from-foreground via-foreground/95 to-foreground overflow-hidden" data-animate="fade">
        <!-- Decorative Background -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-10 w-72 h-72 border border-white rounded-full"></div>
            <div class="absolute bottom-10 right-20 w-96 h-96 border border-white rounded-full"></div>
            <div class="absolute top-40 right-40 w-48 h-48 border border-white rounded-full"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Breadcrumb -->
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
                        <span data-slot="breadcrumb-page" role="link" aria-disabled="true" aria-current="page" class="font-normal text-[#FF9800]">Cảm ơn</span>
                    </li>
                </ol>
            </nav>

            <!-- Hero Content Grid -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <!-- Success Icon & Badge -->
                    <div class="flex items-center gap-4 mb-6">
                        <?php if (quantrieu_get_thankyou_hero_show_icon()) : ?>
                        <div class="flex-shrink-0 w-24 h-24 rounded-2xl bg-green-500/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle w-16 h-16 text-green-400">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <?php endif; ?>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary/10 rounded-full text-primary text-xs md:text-sm font-medium">
                            <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                            <?php echo esc_html(quantrieu_get_thankyou_hero_badge()); ?>
                        </div>
                    </div>

                    <!-- Heading -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 text-balance">
                        <?php echo esc_html(quantrieu_get_thankyou_hero_heading()); ?>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg md:text-xl text-white/70 leading-relaxed">
                        <?php echo esc_html(quantrieu_get_thankyou_hero_subtitle()); ?>
                    </p>
                </div>

                <!-- Right Image -->
                <div class="relative">
                    <div class="relative aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('alt' => get_the_title(), 'class' => 'w-full h-full object-cover')); ?>
                        <?php else : ?>
                            <div class="w-full h-full bg-gradient-to-br from-[#FF9800] to-[#F44336] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image text-white/30 w-24 h-24">
                                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                    <circle cx="9" cy="9" r="2"></circle>
                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-background" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-balance">
                    <?php echo esc_html(quantrieu_get_thankyou_cta_heading()); ?>
                </h2>
                <p class="text-muted-foreground">
                    <?php echo esc_html(quantrieu_get_thankyou_cta_description()); ?>
                </p>
            </div>

            <!-- CTA Grid -->
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Zalo CTA -->
                <div class="bg-card border border-border rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#FF9800] to-[#F44336] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-8 h-8 text-white">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php echo esc_html(quantrieu_get_thankyou_cta_zalo_label()); ?></h3>
                    <p class="text-sm text-muted-foreground mb-6"><?php echo esc_html(quantrieu_get_thankyou_cta_zalo_sublabel()); ?></p>
                    <a href="<?php echo esc_url(quantrieu_get_global_zalo_link()); ?>" target="_blank" rel="noopener noreferrer" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground hover:bg-primary/90 h-10 rounded-md px-6 has-[>svg]:px-4 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-5 h-5">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                        </svg>
                        <?php echo esc_html(quantrieu_get_thankyou_cta_zalo_button_text()); ?>
                    </a>
                </div>

                <!-- Hotline CTA -->
                <div class="bg-card border border-border rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#FF9800] to-[#F44336] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-8 h-8 text-white">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php echo esc_html(quantrieu_get_thankyou_cta_phone_label()); ?></h3>
                    <p class="text-sm text-muted-foreground mb-6"><?php echo esc_html(quantrieu_get_thankyou_cta_phone_sublabel()); ?></p>
                    <a href="tel:<?php echo esc_attr(quantrieu_get_global_phone_link()); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[>svg]:px-4 w-full bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <?php echo esc_html(quantrieu_get_thankyou_cta_phone_button_text()); ?>: <?php echo esc_html(quantrieu_get_global_phone_display()); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-20 bg-muted/30" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-balance">
                    <?php echo esc_html(quantrieu_get_thankyou_benefits_title()); ?>
                </h2>
                <p class="text-muted-foreground">
                    <?php echo esc_html(quantrieu_get_thankyou_benefits_description()); ?>
                </p>
            </div>

            <!-- Benefits Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php 
                $benefits = quantrieu_get_thankyou_benefits();
                $benefit_icons = array(
                    // Benefit 1: 24/7 Support
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headphones w-7 h-7 text-white">
                        <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path>
                    </svg>',
                    // Benefit 2: Free Delivery
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-7 h-7 text-white">
                        <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                        <path d="M15 18H9"></path>
                        <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                        <circle cx="17" cy="18" r="2"></circle>
                        <circle cx="7" cy="18" r="2"></circle>
                    </svg>',
                    // Benefit 3: 100% Quality
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-7 h-7 text-white">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                    </svg>',
                    // Benefit 4: 24h Warranty
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-7 h-7 text-white">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>'
                );
                
                foreach ($benefits as $index => $benefit) : 
                    if (empty($benefit['title'])) continue;
                ?>
                <!-- Benefit <?php echo $index + 1; ?> -->
                <div class="bg-card border border-border rounded-2xl p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#FF9800] to-[#F44336] flex items-center justify-center">
                        <?php echo $benefit_icons[$index]; ?>
                    </div>
                    <h3 class="text-sm font-semibold"><?php echo esc_html($benefit['title']); ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
