<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-md border-b border-border">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a class="flex items-center gap-2" href="<?php echo esc_url(home_url('/')); ?>">
                <?php 
                $logo_id = 7;
                echo wp_get_attachment_image($logo_id, 'full', false, array(
                    'alt' => get_bloginfo('name'),
                    'class' => 'h-10 md:h-14 w-auto',
                    'loading' => 'eager'
                ));
                ?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="flex items-center gap-1">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'flex items-center gap-1',
                        'fallback_cb' => false,
                        'items_wrap' => '%3$s',
                        'walker' => new class extends Walker_Nav_Menu {
                            function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                $classes = 'flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors';
                                
                                $output .= '<div class="relative">';
                                $output .= '<a class="' . $classes . '" href="' . esc_url($item->url) . '">';
                                $output .= esc_html($item->title);
                                
                                if (in_array('menu-item-has-children', $item->classes)) {
                                    $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down w-4 h-4"><path d="m6 9 6 6 6-6"></path></svg>';
                                }
                                
                                $output .= '</a>';
                            }
                            
                            function end_el(&$output, $item, $depth = 0, $args = null) {
                                $output .= '</div>';
                            }
                        },
                    ));
                } else {
                    // Fallback menu if no menu is assigned
                    ?>
                    <div class="relative">
                        <a class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>
                    </div>
                    <div class="relative">
                        <a class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors" href="<?php echo esc_url(home_url('/gioi-thieu')); ?>">Giới thiệu</a>
                    </div>
                    <div class="relative">
                        <a class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors" href="<?php echo esc_url(home_url('/dich-vu')); ?>">Dịch vụ</a>
                    </div>
                    <div class="relative">
                        <a class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors" href="<?php echo esc_url(home_url('/du-an')); ?>">Dự án</a>
                    </div>
                    <div class="relative">
                        <a class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors" href="<?php echo esc_url(home_url('/tin-tuc')); ?>">Tin tức</a>
                    </div>
                    <div class="relative">
                        <a class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors" href="<?php echo esc_url(home_url('/lien-he')); ?>">Liên hệ</a>
                    </div>
                    <?php
                }
                ?>
            </nav>

            <!-- Desktop Actions -->
            <div class="flex items-center gap-4">
                <a href="tel:0909123456" class="flex items-center gap-2 text-primary font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    0909 123 456
                </a>
                <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] bg-primary hover:bg-primary/90 h-9 px-4 py-2 bg-gradient-to-r from-[#FF9800] to-[#F44336] hover:from-[#F57C00] hover:to-[#E53935] text-white shadow-lg">
                    Nhận báo giá
                </button>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden p-2" id="mobile-menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-6 h-6">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>
</header>
