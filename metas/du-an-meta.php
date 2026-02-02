<?php
/**
 * Meta Field: Tên công ty (Company Name)
 * For Dự án (Projects) post type
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

// Add meta box
function quantrieu_add_du_an_meta_box() {
    add_meta_box(
        'quantrieu_du_an_meta',
        __('Thông tin dự án', 'quantrieu'),
        'quantrieu_du_an_meta_box_callback',
        'du_an',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'quantrieu_add_du_an_meta_box');

// Meta box callback
function quantrieu_du_an_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('quantrieu_du_an_meta_box', 'quantrieu_du_an_meta_box_nonce');

    // Retrieve current value
    $company_name = get_post_meta($post->ID, '_quantrieu_ten_cong_ty', true);

    // Display the form
    ?>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="quantrieu_ten_cong_ty"><?php _e('Tên công ty', 'quantrieu'); ?></label>
            </th>
            <td>
                <input type="text" 
                       id="quantrieu_ten_cong_ty" 
                       name="quantrieu_ten_cong_ty" 
                       value="<?php echo esc_attr($company_name); ?>" 
                       class="regular-text" />
                <p class="description"><?php _e('Nhập tên công ty cho dự án này.', 'quantrieu'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

// Save meta box data
function quantrieu_save_du_an_meta_box($post_id) {
    // Check if nonce is set
    if (!isset($_POST['quantrieu_du_an_meta_box_nonce'])) {
        return;
    }

    // Verify nonce
    if (!wp_verify_nonce($_POST['quantrieu_du_an_meta_box_nonce'], 'quantrieu_du_an_meta_box')) {
        return;
    }

    // Check if it's an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if our field is set
    if (!isset($_POST['quantrieu_ten_cong_ty'])) {
        return;
    }

    // Sanitize and save the data
    $company_name = sanitize_text_field($_POST['quantrieu_ten_cong_ty']);
    update_post_meta($post_id, '_quantrieu_ten_cong_ty', $company_name);
}
add_action('save_post_du_an', 'quantrieu_save_du_an_meta_box');

// Helper function to get company name
function quantrieu_get_du_an_company_name($post_id) {
    return get_post_meta($post_id, '_quantrieu_ten_cong_ty', true);
}
