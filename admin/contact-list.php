<?php
/**
 * Contact Form Submissions Admin Page
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

// Create database table on theme activation
function quantrieu_create_contact_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        phone varchar(20) NOT NULL,
        email varchar(100),
        company varchar(255),
        service varchar(100) NOT NULL,
        quantity varchar(100),
        message text NOT NULL,
        status varchar(20) DEFAULT 'new',
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'quantrieu_create_contact_table');

// Add admin menu
function quantrieu_contact_admin_menu() {
    add_menu_page(
        __('Liên hệ', 'quantrieu'),
        __('Liên hệ', 'quantrieu'),
        'manage_options',
        'quantrieu-contacts',
        'quantrieu_contact_admin_page',
        'dashicons-email',
        30
    );
}
add_action('admin_menu', 'quantrieu_contact_admin_menu');

// Handle delete action
function quantrieu_handle_contact_delete() {
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['contact_id']) && isset($_GET['_wpnonce'])) {
        if (!wp_verify_nonce($_GET['_wpnonce'], 'delete_contact_' . $_GET['contact_id'])) {
            wp_die(__('Lỗi bảo mật', 'quantrieu'));
        }

        if (!current_user_can('manage_options')) {
            wp_die(__('Bạn không có quyền thực hiện thao tác này', 'quantrieu'));
        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'contact_submissions';
        $contact_id = intval($_GET['contact_id']);
        
        $wpdb->delete($table_name, array('id' => $contact_id), array('%d'));
        
        wp_redirect(admin_url('admin.php?page=quantrieu-contacts&deleted=1'));
        exit;
    }
}
add_action('admin_init', 'quantrieu_handle_contact_delete');

// Admin page callback
function quantrieu_contact_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';

    // Get all contacts
    $contacts = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");

    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline"><?php _e('Danh sách liên hệ', 'quantrieu'); ?></h1>
        
        <?php if (isset($_GET['deleted']) && $_GET['deleted'] == '1'): ?>
            <div class="notice notice-success is-dismissible">
                <p><?php _e('Đã xóa liên hệ thành công!', 'quantrieu'); ?></p>
            </div>
        <?php endif; ?>

        <table class="wp-list-table widefat fixed striped table-view-list">
            <thead>
                <tr>
                    <th scope="col" style="width: 50px;"><?php _e('ID', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Họ và tên', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Số điện thoại', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Email', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Công ty', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Dịch vụ', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Số lượng', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Nội dung', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Trạng thái', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Ngày gửi', 'quantrieu'); ?></th>
                    <th scope="col"><?php _e('Hành động', 'quantrieu'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contacts)): ?>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo esc_html($contact->id); ?></td>
                            <td><strong><?php echo esc_html($contact->name); ?></strong></td>
                            <td><a href="tel:<?php echo esc_attr($contact->phone); ?>"><?php echo esc_html($contact->phone); ?></a></td>
                            <td>
                                <?php if (!empty($contact->email)): ?>
                                    <a href="mailto:<?php echo esc_attr($contact->email); ?>"><?php echo esc_html($contact->email); ?></a>
                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>
                            <td><?php echo esc_html($contact->company ?: '—'); ?></td>
                            <td><?php echo esc_html($contact->service); ?></td>
                            <td><?php echo esc_html($contact->quantity ?: '—'); ?></td>
                            <td>
                                <button type="button" class="button button-small" onclick="alert('<?php echo esc_js($contact->message); ?>')">
                                    <?php _e('Xem', 'quantrieu'); ?>
                                </button>
                            </td>
                            <td>
                                <span class="status-badge status-<?php echo esc_attr($contact->status); ?>">
                                    <?php 
                                    $statuses = array('new' => 'Mới', 'processing' => 'Đang xử lý', 'completed' => 'Hoàn thành');
                                    echo esc_html($statuses[$contact->status] ?? 'Mới'); 
                                    ?>
                                </span>
                            </td>
                            <td><?php echo esc_html(date_i18n('d/m/Y H:i', strtotime($contact->created_at))); ?></td>
                            <td>
                                <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=quantrieu-contacts&action=delete&contact_id=' . $contact->id), 'delete_contact_' . $contact->id); ?>" 
                                   class="button button-small button-link-delete" 
                                   onclick="return confirm('<?php _e('Bạn có chắc chắn muốn xóa liên hệ này?', 'quantrieu'); ?>')">
                                    <?php _e('Xóa', 'quantrieu'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11" style="text-align: center; padding: 20px;">
                            <?php _e('Chưa có liên hệ nào.', 'quantrieu'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <style>
        .wp-list-table td {
            vertical-align: middle;
        }
        .button-link-delete {
            color: #b32d2e;
        }
        .button-link-delete:hover {
            color: #dc3232;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-new {
            background: #e3f2fd;
            color: #1976d2;
        }
        .status-processing {
            background: #fff3e0;
            color: #f57c00;
        }
        .status-completed {
            background: #e8f5e9;
            color: #388e3c;
        }
    </style>
    <?php
}

// Example function to add contact (can be used with Contact Form 7 or custom form)
function quantrieu_add_contact($data) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'quantrieu_contacts';

    $wpdb->insert(
        $table_name,
        array(
            'ho_va_ten' => sanitize_text_field($data['ho_va_ten']),
            'so_dien_thoai' => sanitize_text_field($data['so_dien_thoai']),
            'email' => sanitize_email($data['email']),
            'cong_ty_to_chuc' => sanitize_text_field($data['cong_ty_to_chuc']),
            'dich_vu_quan_tam' => sanitize_textarea_field($data['dich_vu_quan_tam']),
            'so_luong_du_kien' => sanitize_text_field($data['so_luong_du_kien']),
            'noi_dung_yeu_cau' => sanitize_textarea_field($data['noi_dung_yeu_cau']),
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
    );

    return $wpdb->insert_id;
}

// Hook for Contact Form 7 integration (example)
function quantrieu_cf7_save_contact($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    
    if ($submission) {
        $posted_data = $submission->get_posted_data();
        
        // Map your Contact Form 7 fields to database fields
        $contact_data = array(
            'ho_va_ten' => isset($posted_data['ho-va-ten']) ? $posted_data['ho-va-ten'] : '',
            'so_dien_thoai' => isset($posted_data['so-dien-thoai']) ? $posted_data['so-dien-thoai'] : '',
            'email' => isset($posted_data['email']) ? $posted_data['email'] : '',
            'cong_ty_to_chuc' => isset($posted_data['cong-ty']) ? $posted_data['cong-ty'] : '',
            'dich_vu_quan_tam' => isset($posted_data['dich-vu']) ? $posted_data['dich-vu'] : '',
            'so_luong_du_kien' => isset($posted_data['so-luong']) ? $posted_data['so-luong'] : '',
            'noi_dung_yeu_cau' => isset($posted_data['noi-dung']) ? $posted_data['noi-dung'] : '',
        );
        
        quantrieu_add_contact($contact_data);
    }
}
add_action('wpcf7_before_send_mail', 'quantrieu_cf7_save_contact');
