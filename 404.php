<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package QuantrieuTheme
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- 404 Error Section -->
    <section class="relative py-16 lg:py-24 overflow-hidden bg-background" style="padding-top: 140px; min-height: 80vh;">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <!-- 404 Number -->
                <div class="mb-8" data-animate="fade">
                    <div class="text-9xl md:text-[200px] font-bold bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent leading-none">
                        404
                    </div>
                </div>

                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary/10 rounded-full text-primary text-xs md:text-sm font-medium mb-6" data-animate="fade-up">
                    <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                    Trang không tồn tại
                </div>

                <!-- Heading -->
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6" data-animate="fade-up">
                    Oops! Trang bạn tìm kiếm không tồn tại
                </h1>

                <!-- Description -->
                <p class="text-muted-foreground text-lg mb-10 max-w-2xl mx-auto" data-animate="fade-up">
                    Trang bạn đang tìm kiếm có thể đã bị xóa, đổi tên hoặc tạm thời không khả dụng. 
                    Hãy quay lại trang chủ hoặc sử dụng menu để tìm kiếm thông tin bạn cần.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16" data-animate="fade-up">
                    <a href="<?php echo esc_url(home_url('/')); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8 has-[>svg]:px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home w-4 h-4">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Về trang chủ
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('lien-he'))); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-11 rounded-md px-8 has-[>svg]:px-4 bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Liên hệ ngay
                    </a>
                </div>

                <!-- Quick Links -->
                <div class="grid sm:grid-cols-3 gap-6 mt-16" data-animate="fade-up">
                    <!-- Services -->
                    <div class="bg-card rounded-2xl p-6 hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800] to-[#F44336] flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-6 h-6 text-white">
                                <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                <path d="M12 22V12"></path>
                                <path d="m3.3 7 7.703 4.734a2 2 0 0 0 1.994 0L20.7 7"></path>
                                <path d="m7.5 4.27 9 5.15"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2">Dịch vụ in ấn</h3>
                        <p class="text-sm text-muted-foreground mb-4">Khám phá các dịch vụ in ấn chuyên nghiệp</p>
                        <a href="<?php echo esc_url(get_post_type_archive_link('dich_vu')); ?>" class="text-sm text-primary hover:underline font-medium">
                            Xem thêm →
                        </a>
                    </div>

                    <!-- Projects -->
                    <div class="bg-card rounded-2xl p-6 hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0090ff] to-[#0070cc] flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase w-6 h-6 text-white">
                                <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2">Dự án tiêu biểu</h3>
                        <p class="text-sm text-muted-foreground mb-4">Xem các dự án đã thực hiện</p>
                        <a href="<?php echo esc_url(get_post_type_archive_link('du_an')); ?>" class="text-sm text-primary hover:underline font-medium">
                            Xem thêm →
                        </a>
                    </div>

                    <!-- About -->
                    <div class="bg-card rounded-2xl p-6 hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#4CAF50] to-[#388E3C] flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info w-6 h-6 text-white">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2">Về chúng tôi</h3>
                        <p class="text-sm text-muted-foreground mb-4">Tìm hiểu về In Quan Triều</p>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('gioi-thieu'))); ?>" class="text-sm text-primary hover:underline font-medium">
                            Xem thêm →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
