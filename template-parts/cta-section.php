<?php
// Kiểm tra xem CTA có được bật không
if (!quantrieu_get_cta_enable_section()) {
    return;
}

// Lấy màu nền tùy chỉnh nếu có
$custom_bg_color = quantrieu_get_cta_background_color();
$bg_style = $custom_bg_color ? 'background-color: ' . esc_attr($custom_bg_color) : '';
$bg_class = $custom_bg_color ? '' : 'bg-primary';
?>
<!-- CTA Section -->
<section class="py-16 relative overflow-hidden <?php echo esc_attr($bg_class); ?>" data-animate="fade-up" <?php echo $bg_style ? 'style="' . $bg_style . '"' : ''; ?>>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center text-primary-foreground">
            <h2 class="text-primary-foreground mb-4 text-balance"><?php echo esc_html(quantrieu_get_cta_heading()); ?></h2>
            <p class="text-lg text-primary-foreground/90 mb-8"><?php echo esc_html(quantrieu_get_cta_description()); ?></p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <?php if (quantrieu_get_cta_show_phone_button()) : ?>
                <a href="<?php echo esc_url(quantrieu_get_cta_phone_tel_link()); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground hover:bg-primary/90 h-10 rounded-md px-6 has-[>svg]:px-4 btn-white btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <?php echo esc_html(quantrieu_get_cta_phone_button_text()); ?>: <?php echo esc_html(quantrieu_get_cta_phone_display()); ?>
                </a>
                <?php endif; ?>
                
                <?php if (quantrieu_get_cta_show_zalo_button()) : ?>
                <a href="<?php echo esc_url(quantrieu_get_cta_zalo_link()); ?>" target="_blank" rel="noopener noreferrer" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[>svg]:px-4 btn-outline-white btn-lg bg-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-5 h-5">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                    </svg>
                    <?php echo esc_html(quantrieu_get_cta_zalo_button_text()); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
