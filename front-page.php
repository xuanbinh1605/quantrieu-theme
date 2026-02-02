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
</main>

<?php
get_footer();
