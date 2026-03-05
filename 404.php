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
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
