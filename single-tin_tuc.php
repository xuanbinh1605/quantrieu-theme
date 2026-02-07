<?php
/**
 * Template for displaying single Tin tức post
 *
 * @package QuantrieuTheme
 */

get_header();

while (have_posts()) : the_post();
    $post_id = get_the_ID();
    $thumbnail = get_the_post_thumbnail_url($post_id, 'full');
    $date = get_the_date('j \t\h\á\n\g n, Y');
    
    // Get estimated reading time
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    // Get news category
    $news_terms = get_the_terms($post_id, 'danh_muc_tin_tuc');
    $category_name = '';
    $category_id = 0;
    if ($news_terms && !is_wp_error($news_terms)) {
        $category_name = $news_terms[0]->name;
        $category_id = $news_terms[0]->term_id;
    }
    
    // Get related posts (from same category, excluding current post)
    $related_args = array(
        'post_type' => 'tin_tuc',
        'posts_per_page' => 5,
        'post__not_in' => array($post_id),
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    if ($category_id) {
        $related_args['tax_query'] = array(
            array(
                'taxonomy' => 'danh_muc_tin_tuc',
                'field'    => 'term_id',
                'terms'    => $category_id,
            ),
        );
    }
    
    $related_posts = new WP_Query($related_args);
?>

<article class="pt-24 pb-12 bg-background" data-animate="fade">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="flex flex-wrap items-center gap-2 text-sm text-muted-foreground mb-8 bg-muted/30 py-3 px-4 rounded-lg">
            <a class="hover:text-[#FF9800] transition-colors whitespace-nowrap flex-shrink-0" href="<?php echo esc_url(home_url('/')); ?>">
                Trang chủ
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4 flex-shrink-0">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <a class="hover:text-[#FF9800] transition-colors whitespace-nowrap flex-shrink-0" href="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>">
                Tin tức
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4 flex-shrink-0">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <span class="text-foreground min-w-0"><?php the_title(); ?></span>
        </nav>
        
        <!-- Main Content Layout -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="flex-1 lg:max-w-[calc(100%-320px)]" data-animate="fade-up">
                <!-- Featured Image -->
                <?php if ($thumbnail) : ?>
                    <div class="relative aspect-video w-full rounded-lg overflow-hidden mb-6">
                        <img alt="<?php echo esc_attr(get_the_title()); ?>" 
                             decoding="async" 
                             class="object-cover w-full h-full" 
                             src="<?php echo esc_url($thumbnail); ?>">
                    </div>
                <?php endif; ?>
                
                <!-- Category Badge -->
                <?php if ($category_name) : ?>
                    <span class="text-sm text-[#0090ff] font-medium">
                        <?php echo esc_html($category_name); ?>
                    </span>
                <?php endif; ?>
                
                <!-- Post Title -->
                <h1 class="text-2xl md:text-3xl font-bold text-foreground mt-2 mb-4">
                    <?php the_title(); ?>
                </h1>
                
                <!-- Post Meta -->
                <div class="flex flex-wrap items-center gap-4 text-sm text-muted-foreground mb-6 pb-6 border-b border-border">
                    <div class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-4 h-4">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>In Quan Triều</span>
                    </div>
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
                        <span><?php echo $reading_time; ?> phút đọc</span>
                    </div>
                </div>
                
                <!-- Post Content -->
                <div class="prose prose-lg max-w-none [&_h2]:text-xl [&_h2]:font-bold [&_h2]:mt-8 [&_h2]:mb-3 [&_h2]:text-foreground [&_h3]:text-lg [&_h3]:font-semibold [&_h3]:mt-6 [&_h3]:mb-2 [&_h3]:text-foreground [&_p]:text-foreground/80 [&_p]:leading-relaxed [&_p]:mb-4 [&_strong]:text-foreground [&_strong]:font-semibold [&_ul]:space-y-2 [&_ul]:mb-6 [&_ul]:list-disc [&_ul]:pl-6 [&_ul_li]:text-foreground/80 [&_ol]:space-y-2 [&_ol]:mb-6 [&_ol]:list-decimal [&_ol]:pl-6 [&_ol_li]:text-foreground/80 [&_a]:text-[#0090ff] [&_a]:underline hover:[&_a]:text-[#FF9800] [&_img]:rounded-lg [&_img]:my-6 [&_blockquote]:border-l-4 [&_blockquote]:border-[#FF9800] [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-foreground/70 [&_table]:w-full [&_table]:border-collapse [&_table]:my-6 [&_th]:border [&_th]:border-border [&_th]:bg-muted [&_th]:p-2 [&_th]:text-left [&_td]:border [&_td]:border-border [&_td]:p-2 [&_code]:bg-muted [&_code]:px-1.5 [&_code]:py-0.5 [&_code]:rounded [&_code]:text-sm [&_pre]:bg-muted [&_pre]:p-4 [&_pre]:rounded-lg [&_pre]:overflow-x-auto [&_pre]:my-6">
                    <?php the_content(); ?>
                </div>
                
                <!-- Contact Footer -->
                <div class="mt-8 pt-6 border-t border-border text-muted-foreground">
                    Liên hệ tư vấn: 
                    <a href="tel:0909099939" class="text-[#FF9800] font-semibold hover:underline">0909 099 939</a> | 
                    <a href="https://zalo.me/0909099939" target="_blank" rel="noopener noreferrer" class="text-[#0090ff] font-semibold hover:underline">Chat Zalo</a>
                </div>
            </div>
            
            <!-- Sidebar -->
            <aside class="w-full lg:w-[300px] flex-shrink-0" data-animate="fade-left">
                <div class="lg:sticky lg:top-24 space-y-6">
                    <!-- Contact Box -->
                    <div class="bg-muted/50 rounded-lg p-5">
                        <h3 class="font-semibold text-foreground mb-4">Liên hệ tư vấn</h3>
                        <div class="space-y-3">
                            <a href="tel:0909099939" class="flex items-center gap-3 p-3 bg-[#FF9800] text-white rounded-lg hover:bg-[#FF9800]/90 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <span class="font-medium">0909 099 939</span>
                            </a>
                            <a href="https://zalo.me/0909099939" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3 bg-[#0090ff] text-white rounded-lg hover:bg-[#0090ff]/90 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-5 h-5">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                </svg>
                                <span class="font-medium">Chat Zalo</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Related Posts -->
                    <?php if ($related_posts->have_posts()) : ?>
                        <div class="bg-muted/50 rounded-lg p-5">
                            <h3 class="font-semibold text-foreground mb-4">Bài viết khác</h3>
                            <ul class="space-y-3">
                                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <li>
                                        <a class="text-sm text-muted-foreground hover:text-[#FF9800] transition-colors block py-1 line-clamp-2" 
                                           href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                            <a class="text-sm text-[#0090ff] hover:underline mt-4 inline-block" 
                               href="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>">
                                Xem tất cả tin tức
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </aside>
        </div>
    </div>
</article>

<!-- Related Posts Section -->
<section class="py-20 bg-muted/50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#FF9800]/10 text-[#FF9800] text-sm font-medium rounded-full mb-4">
                BÀI VIẾT LIÊN QUAN
            </span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Bài Viết Liên Quan</h2>
            <p class="text-muted-foreground max-w-2xl mx-auto">
                Khám phá thêm những bài viết hữu ích khác từ In Quan Triều
            </p>
        </div>
        
        <?php
        // Get more related posts for the section (4 posts)
        $section_related_args = array(
            'post_type' => 'tin_tuc',
            'posts_per_page' => 4,
            'post__not_in' => array($post_id),
            'orderby' => 'date',
            'order' => 'DESC',
        );
        
        if ($category_id) {
            $section_related_args['tax_query'] = array(
                array(
                    'taxonomy' => 'danh_muc_tin_tuc',
                    'field'    => 'term_id',
                    'terms'    => $category_id,
                ),
            );
        }
        
        $section_related = new WP_Query($section_related_args);
        
        if ($section_related->have_posts()) :
        ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php while ($section_related->have_posts()) : $section_related->the_post(); ?>
                    <?php
                    $related_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $related_excerpt = get_the_excerpt();
                    ?>
                    <a class="group relative bg-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-border" 
                       href="<?php the_permalink(); ?>">
                        <!-- Image -->
                        <div class="aspect-[4/3] overflow-hidden">
                            <?php if ($related_thumbnail) : ?>
                                <img alt="<?php echo esc_attr(get_the_title()); ?>" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                     src="<?php echo esc_url($related_thumbnail); ?>">
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
                            <h3 class="text-lg font-semibold text-background mb-1 group-hover:text-[#FF9800] transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-background/70 text-sm line-clamp-2">
                                <?php echo $related_excerpt ? esc_html($related_excerpt) : 'Đọc thêm...'; ?>
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
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        
        <!-- View All Button -->
        <div class="text-center mt-12">
            <a class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#FF9800] to-[#F44336] text-white font-medium rounded-full hover:shadow-lg hover:shadow-[#FF9800]/25 transition-all" 
               href="<?php echo esc_url(get_post_type_archive_link('tin_tuc')); ?>">
                Xem tất cả bài viết
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<?php
endwhile;
get_footer();
?>
