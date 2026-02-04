<?php
/**
 * Contact Form AJAX Handler
 *
 * @package QuantrieuTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

// AJAX handler for contact form submission
function handle_contact_form_submission() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        wp_send_json_error(array('message' => 'Phiên làm việc đã hết hạn, vui lòng tải lại trang'));
        return;
    }
    
    // Parse form data
    parse_str($_POST['formData'], $form_data);
    
    // Sanitize data
    $name = sanitize_text_field($form_data['contact_name']);
    $phone = sanitize_text_field($form_data['contact_phone']);
    $email = sanitize_email($form_data['contact_email']);
    $company = sanitize_text_field($form_data['contact_company']);
    $service = sanitize_text_field($form_data['contact_service']);
    $quantity = sanitize_text_field($form_data['contact_quantity']);
    $message = sanitize_textarea_field($form_data['contact_message']);
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($service) || empty($message)) {
        wp_send_json_error(array('message' => 'Vui lòng điền đầy đủ thông tin bắt buộc'));
        return;
    }
    
    // Validate phone number
    if (!preg_match('/^[0-9]{10,11}$/', $phone)) {
        wp_send_json_error(array('message' => 'Số điện thoại không hợp lệ'));
        return;
    }
    
    // Validate email if provided
    if (!empty($email) && !is_email($email)) {
        wp_send_json_error(array('message' => 'Email không hợp lệ'));
        return;
    }
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';
    
    // Insert data into database
    $result = $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'company' => $company,
            'service' => $service,
            'quantity' => $quantity,
            'message' => $message,
            'status' => 'new',
            'created_at' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
    );
    
    if ($result === false) {
        wp_send_json_error(array('message' => 'Có lỗi xảy ra, vui lòng thử lại sau'));
        return;
    }
    
    // Send email notification (optional)
    $admin_email = get_option('admin_email');
    $subject = '[In Quan Triều] Yêu cầu báo giá mới từ ' . $name;
    $email_message = "Có yêu cầu báo giá mới:\n\n";
    $email_message .= "Họ tên: {$name}\n";
    $email_message .= "Số điện thoại: {$phone}\n";
    $email_message .= "Email: {$email}\n";
    $email_message .= "Công ty: {$company}\n";
    $email_message .= "Dịch vụ: {$service}\n";
    $email_message .= "Số lượng: {$quantity}\n";
    $email_message .= "Nội dung: {$message}\n";
    
    wp_mail($admin_email, $subject, $email_message);
    
    wp_send_json_success(array('message' => 'Gửi yêu cầu thành công! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.'));
}
add_action('wp_ajax_submit_contact_form', 'handle_contact_form_submission');
add_action('wp_ajax_nopriv_submit_contact_form', 'handle_contact_form_submission');
