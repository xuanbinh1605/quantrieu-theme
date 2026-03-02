<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Critical CSS: Hide animated elements immediately to prevent FOUC */
        [data-animate] { opacity: 0; }
        [data-animate="fade-up"] { transform: translateY(30px); }
        [data-animate="fade-down"] { transform: translateY(-30px); }
        [data-animate="fade-left"] { transform: translateX(30px); }
        [data-animate="fade-right"] { transform: translateX(-30px); }
        [data-animate="zoom-in"] { transform: scale(0.9); }
        [data-animate="zoom-out"] { transform: scale(1.1); }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-md border-b border-border">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-24">
            <!-- Logo -->
            <a class="flex items-center gap-2" href="<?php echo esc_url(home_url('/')); ?>">
                <?php 
                $logo_url = quantrieu_get_logo();
                if ($logo_url) {
                    echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="h-10 md:h-14 w-auto" loading="eager">';
                } else {
                    echo '<span class="text-xl font-bold">' . esc_html(get_bloginfo('name')) . '</span>';
                }
                ?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="lg:flex hidden items-center gap-1" style="display: flex;">
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
                                if ($depth === 0) {
                                    $classes = 'flex items-center gap-1 px-4 py-2 text-sm font-medium text-foreground hover:text-primary transition-colors';
                                    
                                    $output .= '<div class="relative menu-item-parent">';
                                    $output .= '<a class="' . $classes . '" href="' . esc_url($item->url) . '">';
                                    $output .= esc_html($item->title);
                                    
                                    if (in_array('menu-item-has-children', $item->classes)) {
                                        $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down w-4 h-4"><path d="m6 9 6 6 6-6"></path></svg>';
                                    }
                                    
                                    $output .= '</a>';
                                } else {
                                    // Submenu item
                                    $output .= '<a class="block px-4 py-2.5 text-sm text-foreground hover:bg-primary/10 hover:text-primary transition-colors" href="' . esc_url($item->url) . '">';
                                    $output .= esc_html($item->title);
                                    $output .= '</a>';
                                }
                            }
                            
                            function start_lvl(&$output, $depth = 0, $args = null) {
                                $output .= '<div class="submenu absolute top-full left-0 w-56 bg-card rounded-lg shadow-xl border border-border py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">';
                            }
                            
                            function end_lvl(&$output, $depth = 0, $args = null) {
                                $output .= '</div>';
                            }
                            
                            function end_el(&$output, $item, $depth = 0, $args = null) {
                                if ($depth === 0) {
                                    $output .= '</div>';
                                }
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
            <div class="lg:flex hidden items-center gap-4" style="display: flex;">
                <?php $phone = quantrieu_get_phone(); ?>
                <?php if ($phone): ?>
                <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>" class="flex items-center gap-2 text-primary font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <?php echo esc_html($phone); ?>
                </a>
                <?php endif; ?>
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] bg-primary text-primary-foreground hover:bg-primary/90 h-9 px-4 py-2">
                    Nhận báo giá
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden p-2" id="mobile-menu-toggle" aria-label="Toggle menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-6 h-6">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden border-t border-border bg-white" style ="height: 100vh;">
        <div class="container mx-auto px-4">
            <nav class="py-4">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'space-y-1',
                        'fallback_cb' => false,
                        'items_wrap' => '<div class="%2$s">%3$s</div>',
                        'walker' => new class extends Walker_Nav_Menu {
                            function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                if ($depth === 0) {
                                    $has_children = in_array('menu-item-has-children', $item->classes);
                                    $output .= '<div class="mobile-menu-item">';
                                    $output .= '<a class="block px-4 py-3 text-sm font-medium text-foreground hover:bg-muted hover:text-primary transition-colors rounded-lg' . ($has_children ? ' flex items-center justify-between' : '') . '" href="' . esc_url($item->url) . '">';
                                    $output .= '<span>' . esc_html($item->title) . '</span>';
                                    if ($has_children) {
                                        $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down w-4 h-4 mobile-submenu-toggle transition-transform"><path d="m6 9 6 6 6-6"></path></svg>';
                                    }
                                    $output .= '</a>';
                                } else {
                                    // Submenu item for mobile
                                    $output .= '<a class="block py-2 text-sm text-muted-foreground" href="' . esc_url($item->url) . '">';
                                    $output .= esc_html($item->title);
                                    $output .= '</a>';
                                }
                            }
                            
                            function start_lvl(&$output, $depth = 0, $args = null) {
                                $output .= '<div class="mobile-submenu hidden pl-4">';
                            }
                            
                            function end_lvl(&$output, $depth = 0, $args = null) {
                                $output .= '</div>';
                            }
                            
                            function end_el(&$output, $item, $depth = 0, $args = null) {
                                if ($depth === 0) {
                                    $output .= '</div>';
                                }
                            }
                        },
                    ));
                } else {
                    // Fallback menu
                    ?>
                    <div class="space-y-1">
                        <a class="block px-4 py-3 text-sm font-medium text-foreground hover:bg-muted hover:text-primary transition-colors rounded-lg" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>
                        <a class="block px-4 py-3 text-sm font-medium text-foreground hover:bg-muted hover:text-primary transition-colors rounded-lg" href="<?php echo esc_url(home_url('/gioi-thieu')); ?>">Giới thiệu</a>
                        <a class="block px-4 py-3 text-sm font-medium text-foreground hover:bg-muted hover:text-primary transition-colors rounded-lg" href="<?php echo esc_url(home_url('/dich-vu')); ?>">Dịch vụ</a>
                        <a class="block px-4 py-3 text-sm font-medium text-foreground hover:bg-muted hover:text-primary transition-colors rounded-lg" href="<?php echo esc_url(home_url('/du-an')); ?>">Dự án</a>
                        <a class="block px-4 py-3 text-sm font-medium text-foreground hover:bg-muted hover:text-primary transition-colors rounded-lg" href="<?php echo esc_url(home_url('/tin-tuc')); ?>">Tin tức</a>
                        <a class="block px-4 py-3 text-sm font-medium text-foreground hover:bg-muted hover:text-primary transition-colors rounded-lg" href="<?php echo esc_url(home_url('/lien-he')); ?>">Liên hệ</a>
                    </div>
                    <?php
                }
                ?>
                
                <!-- Mobile Actions -->
                <div class="mt-4 space-y-3">
                    <?php $phone = quantrieu_get_phone(); ?>
                    <?php if ($phone): ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>" class="flex items-center justify-center gap-2 text-primary font-semibold py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <?php echo esc_html($phone); ?>
                    </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url(home_url('/lien-he')); ?>" data-slot="button" class="w-full inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4">
                        Nhận báo giá
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>

<style>
@media (max-width: 1023px) {
    header nav.hidden,
    header .hidden.lg\:flex {
        display: none !important;
    }
    #mobile-menu.hidden {
        display: none !important;
    }
    #mobile-menu:not(.hidden) {
        display: block !important;
    }
}
@media (min-width: 1024px) {
    header nav,
    header .hidden.lg\:flex {
        display: flex !important;
    }
    #mobile-menu {
        display: none !important;
    }
}

/* Desktop Submenu Styles */
.menu-item-parent {
    position: relative;
}

.menu-item-parent .submenu {
    position: absolute;
    top: 100%;
    left: 0;
    margin-top: 0;
    padding-top: 0.5rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.2s ease-in-out;
    pointer-events: none;
    z-index: 50;
}

.menu-item-parent:hover .submenu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    pointer-events: auto;
}

/* Mobile Submenu Styles */
.mobile-submenu.hidden {
    display: none;
}

.mobile-submenu:not(.hidden) {
    display: block;
}

.mobile-submenu-toggle.rotate-180 {
    transform: rotate(180deg);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (toggleButton && mobileMenu) {
        toggleButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icon
            const svg = toggleButton.querySelector('svg');
            if (mobileMenu.classList.contains('hidden')) {
                svg.innerHTML = '<line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line>';
            } else {
                svg.innerHTML = '<path d="M18 6 6 18"></path><path d="m6 6 12 12"></path>';
            }
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!toggleButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                toggleButton.querySelector('svg').innerHTML = '<line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line>';
            }
        });
    }
    
    // Mobile submenu toggle functionality
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
    mobileMenuItems.forEach(function(item) {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.mobile-submenu');
        const toggle = item.querySelector('.mobile-submenu-toggle');
        
        if (submenu && toggle) {
            // Prevent navigation when clicking on parent with submenu
            link.addEventListener('click', function(e) {
                e.preventDefault();
                submenu.classList.toggle('hidden');
                toggle.classList.toggle('rotate-180');
            });
        }
    });
});
</script>
