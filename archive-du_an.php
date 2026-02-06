<?php
/**
 * Template for displaying Dự án archive
 *
 * @package QuantrieuTheme
 */

get_header();

// Get current page number
$paged = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// Get current category filter
$current_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

// Setup query args
$args = array(
    'post_type' => 'du_an',
    'posts_per_page' => 9,
    'paged' => $paged,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

// Add taxonomy filter if category is selected
if (!empty($current_category)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'danh_muc_du_an',
            'field'    => 'slug',
            'terms'    => $current_category,
        ),
    );
}

$projects_query = new WP_Query($args);

// Get all project categories
$categories = get_terms(array(
    'taxonomy' => 'danh_muc_du_an',
    'hide_empty' => true,
));
?>

<!-- Hero Section -->
<section class="relative pt-32 pb-20 bg-gradient-to-br from-foreground via-foreground/95 to-foreground overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-72 h-72 border border-white rounded-full"></div>
        <div class="absolute bottom-10 right-20 w-96 h-96 border border-white rounded-full"></div>
        <div class="absolute top-40 right-40 w-48 h-48 border border-white rounded-full"></div>
    </div>
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-[#0090ff]/10 to-transparent"></div>
    
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
                        Dự án
                    </span>
                </li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 text-balance">
                Dự Án <span class="bg-gradient-to-r from-[#FF9800] to-[#F44336] bg-clip-text text-transparent">Đã Thực Hiện</span>
            </h1>
            <p class="text-lg md:text-xl text-white/70 leading-relaxed">
                Những dự án in ấn tiêu biểu mà In Quan Triều đã thực hiện cho các khách hàng. Mỗi dự án là một câu chuyện về sự tận tâm và chất lượng.
            </p>
        </div>
        
        <!-- Stats -->
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1">500+</div>
                <div class="text-white/60 text-sm">Dự án hoàn thành</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1">200+</div>
                <div class="text-white/60 text-sm">Khách hàng</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1">10+</div>
                <div class="text-white/60 text-sm">Năm kinh nghiệm</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-[#FF9800] mb-1">100%</div>
                <div class="text-white/60 text-sm">Đúng tiến độ</div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid Section -->
<section class="py-20 bg-background">
    <div class="container mx-auto px-4">
        <!-- Category Filters -->
        <div class="flex flex-wrap gap-3 mb-12 justify-center">
            <a href="<?php echo esc_url(get_post_type_archive_link('du_an')); ?>" 
               data-slot="button" 
               class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[>svg]:px-3 <?php echo empty($current_category) ? 'bg-[#FF9800] hover:bg-[#FF9800]/90 text-white' : 'border bg-background shadow-xs hover:bg-accent dark:bg-input/30 dark:border-input dark:hover:bg-input/50 hover:border-[#FF9800] hover:text-[#FF9800]'; ?>">
                Tất cả
            </a>
            
            <?php if (!is_wp_error($categories) && !empty($categories)) : ?>
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url(add_query_arg('category', $category->slug, get_post_type_archive_link('du_an'))); ?>" 
                       data-slot="button" 
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[>svg]:px-3 <?php echo ($current_category === $category->slug) ? 'bg-[#FF9800] hover:bg-[#FF9800]/90 text-white' : 'border bg-background shadow-xs hover:bg-accent dark:bg-input/30 dark:border-input dark:hover:bg-input/50 hover:border-[#FF9800] hover:text-[#FF9800]'; ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <!-- Results Count -->
        <p class="text-muted-foreground mb-8 text-center">
            Hiển thị <?php echo $projects_query->post_count; ?> dự án
            <?php if ($projects_query->found_posts > $projects_query->post_count) : ?>
                / <?php echo $projects_query->found_posts; ?> tổng
            <?php endif; ?>
        </p>
        
        <!-- Projects Grid -->
        <?php if ($projects_query->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
                    <?php
                    $post_id = get_the_ID();
                    $thumbnail = get_the_post_thumbnail_url($post_id, 'large');
                    $excerpt = get_the_excerpt();
                    $date = get_the_date('j \t\h\á\n\g n, Y');
                    
                    // Get project client meta
                    $client = get_post_meta($post_id, '_quantrieu_ten_cong_ty', true);
                    
                    // Get project categories
                    $project_terms = get_the_terms($post_id, 'danh_muc_du_an');
                    $category_name = '';
                    if ($project_terms && !is_wp_error($project_terms)) {
                        $category_name = $project_terms[0]->name;
                    }
                    ?>
                    
                    <a class="group bg-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-border" 
                       href="<?php the_permalink(); ?>">
                        <!-- Project Image -->
                        <div class="aspect-[4/3] overflow-hidden relative">
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
                                    <span class="px-3 py-1 bg-[#FF9800] text-white text-sm font-medium rounded-full">
                                        <?php echo esc_html($category_name); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Project Content -->
                        <div class="p-6">
                            <!-- Date -->
                            <div class="flex items-center gap-2 text-sm text-muted-foreground mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                                <span><?php echo $date; ?></span>
                            </div>
                            
                            <!-- Title -->
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-[#FF9800] transition-colors line-clamp-2">
                                <?php the_title(); ?>
                            </h3>
                            
                            <!-- Excerpt -->
                            <p class="text-muted-foreground mb-4 line-clamp-2">
                                <?php echo $excerpt ? esc_html($excerpt) : 'Xem chi tiết dự án...'; ?>
                            </p>
                            
                            <!-- Client & Arrow -->
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-foreground/60">
                                    <?php echo $client ? 'Khách hàng: ' . esc_html($client) : '&nbsp;'; ?>
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
            <?php if ($projects_query->max_num_pages > 1) : ?>
                <div class="mt-16 flex justify-center items-center gap-2">
                    <?php
                    $current_page = $paged;
                    $total_pages = $projects_query->max_num_pages;
                    $base_url = !empty($current_category) 
                        ? add_query_arg('category', $current_category, get_post_type_archive_link('du_an'))
                        : get_post_type_archive_link('du_an');
                    
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
            <!-- No Projects Found -->
            <div class="text-center py-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4 text-muted-foreground">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <h3 class="text-xl font-semibold mb-2">Không tìm thấy dự án</h3>
                <p class="text-muted-foreground mb-6">Không có dự án nào trong danh mục này.</p>
                <a href="<?php echo esc_url(get_post_type_archive_link('du_an')); ?>" 
                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 bg-[#FF9800] text-white hover:bg-[#FF9800]/90">
                    Xem tất cả dự án
                </a>
            </div>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>
