<footer class="bg-foreground text-background">
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Company Info -->
            <div>
                <?php 
                $logo_url = quantrieu_get_logo();
                if ($logo_url) {
                    echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="h-16 w-auto mb-6" loading="lazy">';
                } else {
                    // Fallback to text logo if image doesn't exist
                    echo '<div class="h-16 mb-6 flex items-center"><span class="text-2xl font-bold text-background">' . esc_html(get_bloginfo('name')) . '</span></div>';
                }
                ?>
                <p class="text-background/70 leading-relaxed mb-6">
                    In Quan Triều cung cấp dịch vụ in ấn chuyên nghiệp với đa dạng chất liệu, đáp ứng mọi nhu cầu in ấn từ cá nhân đến doanh nghiệp.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 rounded-full bg-[#0090ff] flex items-center justify-center hover:opacity-80 transition-opacity" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook w-5 h-5">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-[#FF0000] flex items-center justify-center hover:opacity-80 transition-opacity" aria-label="YouTube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube w-5 h-5">
                            <path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path>
                            <path d="m10 15 5-3-5-3z"></path>
                        </svg>
                    </a>
                    <a href="https://zalo.me/0909123456" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-[#25D366] flex items-center justify-center hover:opacity-80 transition-opacity" aria-label="Zalo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-5 h-5">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                        </svg>
                    </a>
                </div>
            </div>

             <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-[#FF9800]">Thông tin liên hệ</h3>
                <ul class="space-y-4">
                    <?php $address = quantrieu_get_address(); ?>
                    <?php if ($address): ?>
                    <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5 text-[#FF9800] flex-shrink-0 mt-0.5">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span class="text-background/70"><?php echo esc_html($address); ?></span>
                    </li>
                    <?php endif; ?>
                    <?php $phone = quantrieu_get_phone(); ?>
                    <?php if ($phone): ?>
                    <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5 text-[#FF9800] flex-shrink-0">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>" class="text-background/70 hover:text-[#FF9800] transition-colors"><?php echo esc_html($phone); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php $email = quantrieu_get_email(); ?>
                    <?php if ($email): ?>
                    <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-5 h-5 text-[#FF9800] flex-shrink-0">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="text-background/70 hover:text-[#FF9800] transition-colors"><?php echo esc_html($email); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php $open_hours = quantrieu_get_open_hours(); ?>
                    <?php if ($open_hours): ?>
                    <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-5 h-5 text-[#FF9800] flex-shrink-0">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span class="text-background/70"><?php echo esc_html($open_hours); ?></span>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-[#FF9800]">Dịch vụ</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-services',
                    'menu_class' => 'space-y-3',
                    'container' => 'nav',
                    'fallback_cb' => function() {
                        ?>
                        <ul class="space-y-3">
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">In Standee</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">In UV</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">In PP</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">In Bạt Hiflex</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">In Canvas</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">In Decal</a></li>
                        </ul>
                        <?php
                    },
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'link_before' => '<span class="text-background/70 hover:text-[#FF9800] transition-colors">',
                    'link_after' => '</span>',
                ));
                ?>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-[#FF9800]">Liên kết nhanh</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-quick-links',
                    'menu_class' => 'space-y-3',
                    'container' => 'nav',
                    'fallback_cb' => function() {
                        ?>
                        <ul class="space-y-3">
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">Giới thiệu</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="<?php echo esc_url(get_post_type_archive_link('dich_vu')); ?>">Dịch vụ</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="<?php echo esc_url(get_post_type_archive_link('du_an')); ?>">Dự án</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>">Tin tức</a></li>
                            <li><a class="text-background/70 hover:text-[#FF9800] transition-colors" href="#">Liên hệ</a></li>
                        </ul>
                        <?php
                    },
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'link_before' => '<span class="text-background/70 hover:text-[#FF9800] transition-colors">',
                    'link_after' => '</span>',
                ));
                ?>
            </div>

            
           
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="border-t border-background/10">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-background/50 text-sm">
                    © <?php echo date('Y'); ?> In Quan Triều. Tất cả quyền được bảo lưu.
                </p>
                <div class="flex gap-6 text-sm text-background/50">
                    <a class="hover:text-background transition-colors" href="#">Chính sách bảo mật</a>
                    <a class="hover:text-background transition-colors" href="#">Điều khoản sử dụng</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed w-12 h-12 bg-[#FF9800] text-white rounded-full shadow-lg opacity-0 invisible flex items-center justify-center" style="z-index: 9999; bottom: 80px; right: 50px;" aria-label="Back to top">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up">
        <path d="m5 12 7-7 7 7"></path>
        <path d="M12 19V5"></path>
    </svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
