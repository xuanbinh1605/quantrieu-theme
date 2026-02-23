<?php
/**
 * Template for displaying Dịch vụ archive
 *
 * @package QuantrieuTheme
 */

get_header();

// Get current page number
$paged = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// Get search query
$search_query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

// Get view mode (default to grid)
$view_mode = isset($_GET['view']) && in_array($_GET['view'], ['grid', 'list']) ? $_GET['view'] : 'grid';

// Setup query args
$args = array(
    'post_type' => 'dich_vu',
    'posts_per_page' => 8,
    'paged' => $paged,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

// Add search query
if (!empty($search_query)) {
    $args['s'] = $search_query;
}

$services_query = new WP_Query($args);
?>

<!-- Hero Section -->
<section class="relative pt-32 pb-20 bg-gradient-to-br from-foreground via-foreground/95 to-foreground overflow-hidden" data-animate="fade">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-72 h-72 border border-white rounded-full"></div>
        <div class="absolute bottom-10 right-20 w-96 h-96 border border-white rounded-full"></div>
        <div class="absolute top-40 right-40 w-48 h-48 border border-white rounded-full"></div>
    </div>
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-[#FF9800]/10 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" data-slot="breadcrumb" class="mb-6">
            <ol data-slot="breadcrumb-list" class="text-muted-foreground flex flex-wrap items-center gap-1.5 text-sm break-words sm:gap-2.5">
                <li data-slot="breadcrumb-item" class="inline-flex items-center gap-1.5">
                    <a data-slot="breadcrumb-link" class="transition-colors text-white/60 hover:text-white" href="<?php echo esc_url(home_url('/')); ?>">
                        Trang chủ
                    </a>
                </li>
                <li data-slot="breadcrumb-separator" role="presentation" aria-hidden="true" class="[&>svg]:size-3.5 text-white/40">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>
                <li data-slot="breadcrumb-item" class="inline-flex items-center gap-1.5">
                    <span data-slot="breadcrumb-page" role="link" aria-disabled="true" aria-current="page" class="font-normal text-[#FF9800]">
                        Dịch vụ
                    </span>
                </li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 text-balance">
                <?php echo wp_kses_post(quantrieu_get_archive_services_hero_heading()); ?>
            </h1>
            <p class="text-lg md:text-xl text-white/70 leading-relaxed">
                <?php echo esc_html(quantrieu_get_archive_services_hero_description()); ?>
            </p>
        </div>
        
        <!-- Stats -->
        <?php if (quantrieu_get_archive_services_stats_show()) : ?>
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl">
            <div>
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1"><?php echo esc_html(quantrieu_get_archive_services_stat1_number()); ?></div>
                <div class="text-white/60 text-sm"><?php echo esc_html(quantrieu_get_archive_services_stat1_text()); ?></div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1"><?php echo esc_html(quantrieu_get_archive_services_stat2_number()); ?></div>
                <div class="text-white/60 text-sm"><?php echo esc_html(quantrieu_get_archive_services_stat2_text()); ?></div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1"><?php echo esc_html(quantrieu_get_archive_services_stat3_number()); ?></div>
                <div class="text-white/60 text-sm"><?php echo esc_html(quantrieu_get_archive_services_stat3_text()); ?></div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1"><?php echo esc_html(quantrieu_get_archive_services_stat4_number()); ?></div>
                <div class="text-white/60 text-sm"><?php echo esc_html(quantrieu_get_archive_services_stat4_text()); ?></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Services Grid Section -->
<section class="py-20 bg-background" data-animate="fade-up">
    <div class="container mx-auto px-4">
        <!-- Search & View Controls -->
        <div class="flex flex-col sm:flex-row gap-4 justify-between items-center mb-12">
            <!-- Search Box -->
            <div class="relative w-full sm:w-96">
                <form method="get" action="<?php echo esc_url(get_post_type_archive_link('dich_vu')); ?>" id="services-search-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground pointer-events-none z-10">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input 
                        data-slot="input" 
                        class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10" 
                        placeholder="<?php echo esc_attr(quantrieu_get_archive_services_search_placeholder()); ?>" 
                        type="text"
                        name="search"
                        id="services-search-input"
                        value="<?php echo esc_attr($search_query); ?>"
                        autocomplete="off">
                    <?php if ($view_mode !== 'grid') : ?>
                        <input type="hidden" name="view" value="<?php echo esc_attr($view_mode); ?>">
                    <?php endif; ?>
                </form>
            </div>
            
            <!-- View Toggle Buttons -->
            <div class="flex gap-2">
                <a href="<?php echo esc_url(add_query_arg(array('view' => 'grid', 'search' => $search_query), remove_query_arg('page'))); ?>" 
                   data-slot="button" 
                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive size-9 <?php echo $view_mode === 'grid' ? 'bg-[#FF9800] text-white hover:bg-[#FF9800]/90' : 'border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-grid3x3 w-4 h-4">
                        <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                        <path d="M3 9h18"></path>
                        <path d="M3 15h18"></path>
                        <path d="M9 3v18"></path>
                        <path d="M15 3v18"></path>
                    </svg>
                </a>
                <a href="<?php echo esc_url(add_query_arg(array('view' => 'list', 'search' => $search_query), remove_query_arg('page'))); ?>" 
                   data-slot="button" 
                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive size-9 <?php echo $view_mode === 'list' ? 'bg-[#FF9800] text-white hover:bg-[#FF9800]/90' : 'border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list w-4 h-4">
                        <path d="M3 12h.01"></path>
                        <path d="M3 18h.01"></path>
                        <path d="M3 6h.01"></path>
                        <path d="M8 12h13"></path>
                        <path d="M8 18h13"></path>
                        <path d="M8 6h13"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Results Count -->
        <p class="text-muted-foreground mb-8">
            <?php echo sprintf(esc_html(quantrieu_get_archive_services_results_text()), $services_query->post_count); ?>
            <?php if ($services_query->found_posts > $services_query->post_count) : ?>
                <?php echo sprintf(esc_html(quantrieu_get_archive_services_total_results_text()), $services_query->found_posts); ?>
            <?php endif; ?>
        </p>
        
        <!-- Services Grid/List -->
        <?php if ($services_query->have_posts()) : ?>
            <div class="<?php echo $view_mode === 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6' : 'space-y-4'; ?>">
                <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <?php
                    $post_id = get_the_ID();
                    $thumbnail = get_the_post_thumbnail_url($post_id, 'large');
                    $excerpt = get_the_excerpt();
                    ?>
                    
                    <?php if ($view_mode === 'grid') : ?>
                        <!-- Grid View -->
                        <a class="group relative bg-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-border" 
                           href="<?php the_permalink(); ?>">
                            <!-- Service Image -->
                            <div class="aspect-[4/3] overflow-hidden">
                                <?php if ($thumbnail) : ?>
                                    <img alt="<?php echo esc_attr(get_the_title()); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                         src="<?php echo esc_url($thumbnail); ?>">
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
                                <h3 class="text-lg font-semibold text-background mb-2 group-hover:text-[#FF9800] transition-colors">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="text-background/70 text-sm line-clamp-2">
                                    <?php echo $excerpt ? esc_html($excerpt) : 'Xem chi tiết dịch vụ...'; ?>
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
                    <?php else : ?>
                        <!-- List View -->
                        <a class="group flex flex-col md:flex-row gap-6 bg-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-border p-4" 
                           href="<?php the_permalink(); ?>">
                            <!-- Service Image -->
                            <div class="w-full md:w-64 h-48 md:h-40 rounded-xl overflow-hidden flex-shrink-0">
                                <?php if ($thumbnail) : ?>
                                    <img alt="<?php echo esc_attr(get_the_title()); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                         src="<?php echo esc_url($thumbnail); ?>">
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
                            
                            <!-- Content -->
                            <div class="flex-1 flex flex-col justify-center">
                                <h3 class="text-xl font-semibold mb-2 group-hover:text-[#FF9800] transition-colors">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="text-muted-foreground mb-4">
                                    <?php echo $excerpt ? esc_html($excerpt) : 'Xem chi tiết dịch vụ...'; ?>
                                </p>
                                
                                <?php
                                // Get content to extract features (if needed, can be customized per service)
                                $content_text = get_the_content();
                                ?>
                                
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 bg-[#FF9800]/10 text-[#FF9800] text-sm rounded-full"><?php echo esc_html(quantrieu_get_archive_services_feature_tag1()); ?></span>
                                    <span class="px-3 py-1 bg-[#FF9800]/10 text-[#FF9800] text-sm rounded-full"><?php echo esc_html(quantrieu_get_archive_services_feature_tag2()); ?></span>
                                    <span class="px-3 py-1 bg-[#FF9800]/10 text-[#FF9800] text-sm rounded-full"><?php echo esc_html(quantrieu_get_archive_services_feature_tag3()); ?></span>
                                    <span class="px-3 py-1 bg-[#FF9800]/10 text-[#FF9800] text-sm rounded-full"><?php echo esc_html(quantrieu_get_archive_services_feature_tag4()); ?></span>
                                </div>
                            </div>
                            
                            <!-- Arrow Button -->
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-[#FF9800]/10 rounded-full flex items-center justify-center group-hover:bg-[#FF9800] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5 text-[#FF9800] group-hover:text-white transition-colors">
                                        <path d="M5 12h14"></path>
                                        <path d="m12 5 7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($services_query->max_num_pages > 1) : ?>
                <div class="mt-16 flex justify-center items-center gap-2">
                    <?php
                    $current_page = $paged;
                    $total_pages = $services_query->max_num_pages;
                    $base_url = get_post_type_archive_link('dich_vu');
                    
                    // Add filters to base URL
                    $url_params = array();
                    if (!empty($search_query)) {
                        $url_params['search'] = $search_query;
                    }
                    if ($view_mode !== 'grid') {
                        $url_params['view'] = $view_mode;
                    }
                    if (!empty($url_params)) {
                        $base_url = add_query_arg($url_params, $base_url);
                    }
                    
                    // Previous button
                    if ($current_page > 1) : ?>
                        <a href="<?php echo esc_url(add_query_arg('page', $current_page - 1, $base_url)); ?>" 
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors h-9 w-9 border bg-background shadow-xs hover:bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                    
                    <?php
                    // Page numbers
                    $range = 2;
                    for ($i = 1; $i <= $total_pages; $i++) :
                        if ($i == 1 || $i == $total_pages || ($i >= $current_page - $range && $i <= $current_page + $range)) :
                            if ($i == $current_page) : ?>
                                <span class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium h-9 w-9 bg-[#FF9800] text-white">
                                    <?php echo $i; ?>
                                </span>
                            <?php else : ?>
                                <a href="<?php echo esc_url(add_query_arg('page', $i, $base_url)); ?>" 
                                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium h-9 w-9 border bg-background shadow-xs hover:bg-accent hover:border-[#FF9800] hover:text-[#FF9800]">
                                    <?php echo $i; ?>
                                </a>
                            <?php endif;
                        elseif ($i == $current_page - $range - 1 || $i == $current_page + $range + 1) : ?>
                            <span class="inline-flex items-center justify-center gap-2 h-9 w-9 text-muted-foreground">
                                ...
                            </span>
                        <?php endif;
                    endfor;
                    ?>
                    
                    <?php
                    // Next button
                    if ($current_page < $total_pages) : ?>
                        <a href="<?php echo esc_url(add_query_arg('page', $current_page + 1, $base_url)); ?>" 
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors h-9 w-9 border bg-background shadow-xs hover:bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
        <?php else : ?>
            <!-- No Services Found -->
            <div class="text-center py-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4 text-muted-foreground">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <h3 class="text-xl font-semibold mb-2"><?php echo esc_html(quantrieu_get_archive_services_no_results_title()); ?></h3>
                <p class="text-muted-foreground mb-6">
                    <?php if (!empty($search_query)) : ?>
                        <?php echo sprintf(esc_html(quantrieu_get_archive_services_no_results_text()), esc_html($search_query)); ?>
                    <?php else : ?>
                        <?php echo esc_html(quantrieu_get_archive_services_no_results_general()); ?>
                    <?php endif; ?>
                </p>
                <a href="<?php echo esc_url(get_post_type_archive_link('dich_vu')); ?>" 
                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 bg-[#FF9800] text-white hover:bg-[#FF9800]/90">
                    <?php echo esc_html(quantrieu_get_archive_services_no_results_button()); ?>
                </a>
            </div>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<!-- Live Search Script -->
<script>
(function() {
    const searchInput = document.getElementById('services-search-input');
    const searchForm = document.getElementById('services-search-form');
    let searchTimeout;
    
    if (searchInput && searchForm) {
        searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function() {
                searchForm.submit();
            }, 500); // Wait 500ms after user stops typing
        });
    }
})();
</script>

<?php get_footer(); ?>
