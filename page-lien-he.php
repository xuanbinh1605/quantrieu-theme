<?php
/**
 * Template Name: Liên Hệ
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative pt-32 pb-16 bg-gradient-to-br from-[#1a1a2e] via-[#16213e] to-[#0f0f23] overflow-hidden" data-animate="fade">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fillRule='evenodd'%3E%3Cg fill='%23ffffff' fillOpacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <nav class="flex items-center gap-2 text-sm text-white/60 mb-6">
                <a class="hover:text-white transition-colors" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
                <span class="text-white">Liên hệ</span>
            </nav>
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#FF9800]/20 text-[#FF9800] text-sm font-medium rounded-full mb-4"><?php echo esc_html(quantrieu_get_contact_hero_badge()); ?></span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 text-balance">
                    <?php echo wp_kses_post(quantrieu_get_contact_hero_heading()); ?>
                </h1>
                <p class="text-lg text-white/70"><?php echo esc_html(quantrieu_get_contact_hero_description()); ?></p>
            </div>
        </div>
    </section>

    <!-- Form + Contact Information Section -->
    <section class="py-16 lg:py-24" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg border border-border p-8">
                        <h2 class="text-2xl font-bold text-foreground mb-2"><?php echo esc_html(quantrieu_get_contact_form_title()); ?></h2>
                        <p class="text-muted-foreground mb-8"><?php echo esc_html(quantrieu_get_contact_form_description()); ?></p>
                        <form id="contact-form" class="space-y-6">
                            <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="name">Họ và tên *</label>
                                    <input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="name" name="contact_name" placeholder="Nguyễn Văn A" required="">
                                </div>
                                <div class="space-y-2">
                                    <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="phone">Số điện thoại *</label>
                                    <input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="phone" name="contact_phone" placeholder="0909 123 456" required="" type="tel">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="email">Email</label>
                                    <input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="email" name="contact_email" placeholder="email@example.com" type="email">
                                </div>
                                <div class="space-y-2">
                                    <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="company">Công ty / Tổ chức</label>
                                    <input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="company" name="contact_company" placeholder="Tên công ty">
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="service">Dịch vụ quan tâm *</label>
                                <select data-slot="select" class="border-input h-9 w-full rounded-md border bg-transparent px-3 py-1 text-sm shadow-xs transition-[color,box-shadow] outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50" id="service" name="contact_service" required="">
                                    <option value="">Chọn dịch vụ</option>
                                    <option value="in-standee">In Standee</option>
                                    <option value="in-uv">In UV</option>
                                    <option value="in-pp">In PP</option>
                                    <option value="in-bat-hiflex">In Bạt Hiflex</option>
                                    <option value="in-canvas">In Canvas</option>
                                    <option value="in-decal">In Decal</option>
                                    <option value="in-backlit">In Backlit</option>
                                    <option value="in-bia-kep-ho-so">In Bìa Kẹp Hồ Sơ</option>
                                    <option value="khac">Khác</option>
                                </select>
                            </div>
                            
                            <div class="space-y-2">
                                <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="quantity">Số lượng dự kiến</label>
                                <input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="quantity" name="contact_quantity" placeholder="Ví dụ: 100 cái, 50m2...">
                            </div>
                            
                            <div class="space-y-2">
                                <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="message">Nội dung yêu cầu *</label>
                                <textarea data-slot="textarea" class="border-input placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 flex field-sizing-content min-h-16 w-full rounded-md border bg-transparent px-3 py-2 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" id="message" name="contact_message" placeholder="Mô tả chi tiết yêu cầu in ấn của bạn: kích thước, chất liệu, số lượng, thời gian cần giao hàng..." rows="5" required=""></textarea>
                            </div>
                            
                            <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary hover:bg-primary/90 h-10 rounded-md px-6 has-[>svg]:px-4 w-full bg-gradient-to-r from-[#FF9800] to-[#F44336] hover:from-[#F57C00] hover:to-[#E53935] text-white" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send w-5 h-5 mr-2">
                                    <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                                    <path d="m21.854 2.147-10.94 10.939"></path>
                                </svg>
                                <?php echo esc_html(quantrieu_get_contact_form_button_text()); ?>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information Sidebar -->
                <div>
                    <div class="space-y-6">
                        <!-- Contact Info Card -->
                        <div class="bg-white rounded-2xl shadow-lg border border-border p-6">
                            <h3 class="text-xl font-bold text-foreground mb-6"><?php echo esc_html(quantrieu_get_contact_info_title()); ?></h3>
                            <div class="space-y-5">
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/10 to-[#F44336]/10 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5 text-[#FF9800]">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-muted-foreground mb-0.5">Địa chỉ</p>
                                        <a class="text-foreground font-medium hover:text-[#FF9800] transition-colors" href="<?php echo esc_url(quantrieu_get_contact_info_address_link()); ?>"><?php echo esc_html(quantrieu_get_contact_info_address()); ?></a>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/10 to-[#F44336]/10 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5 text-[#FF9800]">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-muted-foreground mb-0.5">Hotline</p>
                                        <a class="text-foreground font-medium hover:text-[#FF9800] transition-colors" href="tel:<?php echo esc_attr(quantrieu_get_contact_info_phone_link()); ?>"><?php echo esc_html(quantrieu_get_contact_info_phone()); ?></a>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/10 to-[#F44336]/10 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-5 h-5 text-[#FF9800]">
                                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-muted-foreground mb-0.5">Email</p>
                                        <a class="text-foreground font-medium hover:text-[#FF9800] transition-colors" href="mailto:<?php echo esc_attr(quantrieu_get_contact_info_email()); ?>"><?php echo esc_html(quantrieu_get_contact_info_email()); ?></a>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FF9800]/10 to-[#F44336]/10 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-5 h-5 text-[#FF9800]">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-muted-foreground mb-0.5">Giờ làm việc</p>
                                        <p class="text-foreground font-medium"><?php echo esc_html(quantrieu_get_contact_info_working_hours()); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Zalo CTA -->
                        <div class="bg-gradient-to-br from-[#0068FF] to-[#00A2FF] rounded-2xl p-6 text-white">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-6 h-6">
                                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg"><?php echo esc_html(quantrieu_get_contact_zalo_title()); ?></h3>
                                    <p class="text-white/80 text-sm"><?php echo esc_html(quantrieu_get_contact_zalo_description()); ?></p>
                                </div>
                            </div>
                            <a target="_blank" class="block w-full py-3 bg-white text-[#0068FF] font-semibold rounded-xl text-center hover:bg-white/90 transition-colors" href="<?php echo esc_url(quantrieu_get_contact_zalo_link()); ?>"><?php echo esc_html(quantrieu_get_contact_zalo_button_text()); ?></a>
                        </div>

                        <!-- Social Media -->
                        <div class="bg-white rounded-2xl shadow-lg border border-border p-6">
                            <h3 class="text-lg font-bold text-foreground mb-4"><?php echo esc_html(quantrieu_get_contact_social_title()); ?></h3>
                            <div class="flex gap-3">
                                <a class="w-12 h-12 rounded-xl bg-[#0068FF] flex items-center justify-center text-white hover:opacity-80 transition-opacity" aria-label="Zalo" href="<?php echo esc_url(quantrieu_get_contact_zalo_link()); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-5 h-5">
                                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                    </svg>
                                </a>
                                <a class="w-12 h-12 rounded-xl bg-[#1877F2] flex items-center justify-center text-white hover:opacity-80 transition-opacity" aria-label="Facebook" href="<?php echo esc_url(quantrieu_get_contact_social_facebook()); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook w-5 h-5">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a>
                                <a class="w-12 h-12 rounded-xl bg-[#FF0000] flex items-center justify-center text-white hover:opacity-80 transition-opacity" aria-label="Youtube" href="<?php echo esc_url(quantrieu_get_contact_social_youtube()); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube w-5 h-5">
                                        <path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path>
                                        <path d="m10 15 5-3-5-3z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Notice -->
                        <div class="bg-[#FFF8E1] rounded-2xl p-6 border border-[#FFE082]">
                            <h4 class="font-semibold text-[#F57C00] mb-2"><?php echo esc_html(quantrieu_get_contact_notice_title()); ?></h4>
                            <p class="text-sm text-[#795548]"><?php echo esc_html(quantrieu_get_contact_notice_content()); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Maps Section -->
    <section class="pb-16 lg:pb-24" data-animate="fade-up">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-foreground mb-3"><?php echo esc_html(quantrieu_get_contact_map_title()); ?></h2>
                <p class="text-muted-foreground"><?php echo esc_html(quantrieu_get_contact_map_description()); ?></p>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-border">
                <iframe src="<?php echo esc_url(quantrieu_get_contact_map_embed_url()); ?>" width="100%" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="<?php echo esc_attr(quantrieu_get_contact_map_title_attr()); ?>" style="border: 0px;"></iframe>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
