<?php
/**
 * Template for displaying Tin tức archive
 *
 * @package QuantrieuTheme
 */

get_header();

// Get current page number
$paged = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// Get current category filter
$current_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

// Get search query
$search_query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

// Setup query args
$args = array(
    'post_type' => 'tin_tuc',
    'posts_per_page' => 6,
    'paged' => $paged,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

// Add taxonomy filter if category is selected
if (!empty($current_category)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'danh_muc_tin_tuc',
            'field'    => 'slug',
            'terms'    => $current_category,
        ),
    );
}

// Add search query
if (!empty($search_query)) {
    $args['s'] = $search_query;
}

$news_query = new WP_Query($args);

// Get all news categories
$categories = get_terms(array(
    'taxonomy' => 'danh_muc_tin_tuc',
    'hide_empty' => true,
));
?>

<!-- Hero Section -->
<section class="relative pt-32 pb-16 bg-gradient-to-br from-foreground via-foreground/95 to-foreground overflow-hidden" data-animate="fade">
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-white/60 mb-6">
            <a class="hover:text-white transition-colors" href="<?php echo esc_url(home_url('/')); ?>">
                Trang chủ
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <span class="text-white">Tin tức</span>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                <?php echo wp_kses_post(quantrieu_get_archive_news_hero_heading()); ?>
            </h1>
            <p class="text-lg text-white/70">
                <?php echo esc_html(quantrieu_get_archive_news_hero_description()); ?>
            </p>
        </div>
    </div>
</section>

<!-- News Grid Section -->
<section class="py-20 bg-background" data-animate="fade-up">
    <div class="container mx-auto px-4">
        <!-- Search & Filter Section -->
        <div class="mb-8 flex flex-col lg:flex-row items-center justify-between gap-6">
            <!-- Search Box -->
            <div class="w-64">
                <form method="get" action="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>" id="news-search-form">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <input 
                            data-slot="input" 
                            class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input w-full min-w-0 border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-12 h-12 rounded-full" 
                            placeholder="<?php echo esc_attr(quantrieu_get_archive_news_search_placeholder()); ?>" 
                            type="text" 
                            name="search"
                            id="news-search-input"
                            value="<?php echo esc_attr($search_query); ?>"
                            autocomplete="off">
                        <?php if (!empty($current_category)) : ?>
                            <input type="hidden" name="category" value="<?php echo esc_attr($current_category); ?>">
                        <?php endif; ?>
                    </div>
                </form>
            </div>
            
            <!-- Category Filters -->
            <div class="flex flex-wrap gap-3 justify-center lg:justify-start flex-1">
                <a href="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>" 
                   data-slot="button" 
                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[>svg]:px-3 <?php echo empty($current_category) && empty($search_query) ? 'bg-[#FF9800] hover:bg-[#FF9800]/90 text-white' : 'border bg-background shadow-xs hover:bg-accent dark:bg-input/30 dark:border-input dark:hover:bg-input/50 hover:border-[#FF9800] hover:text-[#FF9800]'; ?>">
                    <?php echo esc_html(quantrieu_get_archive_news_filter_all_text()); ?>
                </a>
                
                <?php if (!is_wp_error($categories) && !empty($categories)) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <?php
                        $category_url = add_query_arg('category', $category->slug, get_post_type_archive_link('tin_tuc'));
                        if (!empty($search_query)) {
                            $category_url = add_query_arg('search', $search_query, $category_url);
                        }
                        ?>
                        <a href="<?php echo esc_url($category_url); ?>" 
                           data-slot="button" 
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[>svg]:px-3 <?php echo ($current_category === $category->slug) ? 'bg-[#FF9800] hover:bg-[#FF9800]/90 text-white' : 'border bg-background shadow-xs hover:bg-accent dark:bg-input/30 dark:border-input dark:hover:bg-input/50 hover:border-[#FF9800] hover:text-[#FF9800]'; ?>">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Results Count -->
            <div class="text-muted-foreground text-sm whitespace-nowrap">
                <?php echo sprintf(esc_html(quantrieu_get_archive_news_results_text()), $news_query->post_count); ?>
                <?php if ($news_query->found_posts > $news_query->post_count) : ?>
                    <?php echo sprintf(esc_html(quantrieu_get_archive_news_total_results_text()), $news_query->found_posts); ?>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- News Grid -->
        <div id="news-grid-container">
            <?php if ($news_query->have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                        <?php
                        $post_id = get_the_ID();
                        $thumbnail = get_the_post_thumbnail_url($post_id, 'large');
                        $excerpt = get_the_excerpt();
                        $date = get_the_date('j \t\h\g n, Y');
                        
                        // Get estimated reading time
                        $content = get_post_field('post_content', $post_id);
                        $word_count = str_word_count(strip_tags($content));
                        $reading_time = ceil($word_count / 200); // Average reading speed
                        
                        // Get news categories
                        $news_terms = get_the_terms($post_id, 'danh_muc_tin_tuc');
                        $category_name = '';
                        if ($news_terms && !is_wp_error($news_terms)) {
                            $category_name = $news_terms[0]->name;
                        }
                        ?>
                        
                        <a class="group bg-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-border" 
                           href="<?php the_permalink(); ?>">
                            <!-- News Image -->
                            <div class="aspect-[16/10] overflow-hidden relative">
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
                                
                                <?php if ($category_name) : ?>
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 bg-[#0090ff] text-white text-sm font-medium rounded-full">
                                            <?php echo esc_html($category_name); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- News Content -->
                            <div class="p-6">
                                <!-- Date & Reading Time -->
                                <div class="flex items-center gap-4 text-sm text-muted-foreground mb-3">
                                    <div class="flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <span><?php echo $date; ?></span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-4 h-4">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        <span><?php echo sprintf(esc_html(quantrieu_get_archive_news_reading_time_text()), $reading_time); ?></span>
                                    </div>
                                </div>
                                
                                <!-- Title -->
                                <h3 class="text-xl font-semibold mb-2 group-hover:text-[#FF9800] transition-colors line-clamp-2">
                                    <?php the_title(); ?>
                                </h3>
                                
                                <!-- Excerpt -->
                                <p class="text-muted-foreground mb-4 line-clamp-2">
                                    <?php echo $excerpt ? esc_html($excerpt) : esc_html(quantrieu_get_archive_news_default_excerpt()); ?>
                                </p>
                                
                                <!-- Read More & Arrow -->
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-[#FF9800]">
                                        <?php echo esc_html(quantrieu_get_archive_news_read_more_text()); ?>
                                    </span>
                                    <div class="w-10 h-10 bg-[#FF9800]/10 rounded-full flex items-center justify-center group-hover:bg-[#FF9800] transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5 text-[#FF9800] group-hover:text-white transition-colors">
                                            <path d="M5 12h14"></path>
                                            <path d="m12 5 7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <?php if ($news_query->max_num_pages > 1) : ?>
                    <div class="mt-24 flex justify-center items-center gap-3">
                        <?php
                        $current_page = $paged;
                        $total_pages = $news_query->max_num_pages;
                        $base_url = get_post_type_archive_link('tin_tuc');
                        
                        // Add filters to base URL
                        $url_params = array();
                        if (!empty($current_category)) {
                            $url_params['category'] = $current_category;
                        }
                        if (!empty($search_query)) {
                            $url_params['search'] = $search_query;
                        }
                        if (!empty($url_params)) {
                            $base_url = add_query_arg($url_params, $base_url);
                        }
                        
                        // Previous button
                        if ($current_page > 1) : ?>
                            <a href="<?php echo esc_url(add_query_arg('page', $current_page - 1, $base_url)); ?>" 
                               class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors h-9 w-9 border bg-background shadow-xs hover:bg-[#FF9800] hover:text-white hover:border-[#FF9800]">
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
                                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium h-9 w-9 border bg-background shadow-xs hover:bg-[#FF9800] hover:text-white hover:border-[#FF9800]">
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
                               class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors h-9 w-9 border bg-background shadow-xs hover:bg-[#FF9800] hover:text-white hover:border-[#FF9800]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
            <?php else : ?>
                <!-- No News Found -->
                <div class="text-center py-16">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4 text-muted-foreground">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2"><?php echo esc_html(quantrieu_get_archive_news_no_results_title()); ?></h3>
                    <p class="text-muted-foreground mb-6">
                        <?php if (!empty($search_query)) : ?>
                            <?php echo sprintf(esc_html(quantrieu_get_archive_news_no_results_search()), esc_html($search_query)); ?>
                        <?php else : ?>
                            <?php echo esc_html(quantrieu_get_archive_news_no_results_category()); ?>
                        <?php endif; ?>
                    </p>
                    <a href="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>" 
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 bg-[#FF9800] text-white hover:bg-[#FF9800]/90">
                        <?php echo esc_html(quantrieu_get_archive_news_no_results_button()); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<!-- Live Search Script -->
<script>
(function() {
    const searchInput = document.getElementById('news-search-input');
    const searchForm = document.getElementById('news-search-form');
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
