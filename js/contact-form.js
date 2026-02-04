/**
 * Contact Form Validation and AJAX Submission
 */

(function($) {
    'use strict';

    // Validation patterns
    const patterns = {
        phone: /^[0-9]{10,11}$/,
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    };

    // Validation messages
    const messages = {
        name: 'Vui lòng nhập họ tên',
        phone: 'Số điện thoại không hợp lệ (10-11 số)',
        email: 'Email không hợp lệ',
        service: 'Vui lòng chọn dịch vụ',
        message: 'Vui lòng nhập nội dung yêu cầu'
    };

    // Show error
    function showError(input, message) {
        const $input = $(input);
        const $formGroup = $input.closest('.space-y-2');
        
        // Add error classes
        $input.addClass('border-red-500 is-invalid');
        
        // Remove existing error message
        $formGroup.find('.error-message').remove();
        
        // Add error message
        const errorDiv = $('<p></p>')
            .addClass('error-message text-xs text-red-500 mt-1 font-medium')
            .css('color', '#ef4444')
            .text(message);
        $formGroup.append(errorDiv);
    }

    // Show success (clear error state)
    function showSuccess(input) {
        const $input = $(input);
        const $formGroup = $input.closest('.space-y-2');
        
        // Remove error classes
        $input.removeClass('border-red-500 is-invalid');
        
        // Remove error message
        $formGroup.find('.error-message').remove();
    }

    // Clear validation
    function clearValidation(input) {
        const $input = $(input);
        const $formGroup = $input.closest('.space-y-2');
        
        // Remove validation classes
        $input.removeClass('border-red-500 is-invalid');
        
        // Remove error message
        $formGroup.find('.error-message').remove();
    }

    // Validate field
    function validateField(input) {
        const value = input.value.trim();
        const fieldName = input.name.replace('contact_', '');
        
        // Check if required
        if (input.hasAttribute('required') && !value) {
            showError(input, messages[fieldName] || 'Trường này là bắt buộc');
            return false;
        }
        
        // Skip validation if field is empty and not required
        if (!value && !input.hasAttribute('required')) {
            clearValidation(input);
            return true;
        }
        
        // Validate phone
        if (fieldName === 'phone' && !patterns.phone.test(value)) {
            showError(input, messages.phone);
            return false;
        }
        
        // Validate email
        if (fieldName === 'email' && value && !patterns.email.test(value)) {
            showError(input, messages.email);
            return false;
        }
        
        showSuccess(input);
        return true;
    }

    // Show notification
    function showNotification(message, type = 'success') {
        // Remove existing notifications
        const existingNotification = document.querySelector('.form-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? '#22c55e' : '#ef4444';
        notification.className = `form-notification fixed top-20 right-4 z-50 px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 animate-slide-in text-white`;
        notification.style.backgroundColor = bgColor;
        
        const icon = type === 'success' 
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M20 6 9 17l-5-5"></path></svg>'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><circle cx="12" cy="12" r="10"></circle><line x1="12" x2="12" y1="8" y2="12"></line><line x1="12" x2="12.01" y1="16" y2="16"></line></svg>';
        
        notification.innerHTML = `${icon}<span>${message}</span>`;
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.style.animation = 'slide-out 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }

    // Initialize
    $(document).ready(function() {
        const form = $('#contact-form');
        const inputs = form.find('input, select, textarea');
        const submitBtn = form.find('button[type="submit"]');
        
        // Real-time validation
        inputs.on('blur', function() {
            validateField(this);
        });
        
        inputs.on('input', function() {
            const $this = $(this);
            if ($this.hasClass('border-red-500') || $this.hasClass('border-green-500')) {
                validateField(this);
            }
        });
        
        // Form submission
        form.on('submit', function(e) {
            e.preventDefault();
            
            // Validate all fields
            let isValid = true;
            inputs.each(function() {
                if (!validateField(this)) {
                    isValid = false;
                }
            });
            
            if (!isValid) {
                showNotification('Vui lòng kiểm tra lại thông tin', 'error');
                return;
            }
            
            // Disable submit button
            const originalText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<svg class="animate-spin h-5 w-5 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Đang gửi...');
            
            // Submit via AJAX
            $.ajax({
                url: contactFormAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'submit_contact_form',
                    nonce: contactFormAjax.nonce,
                    formData: form.serialize()
                },
                success: function(response) {
                    if (response.success) {
                        showNotification(response.data.message, 'success');
                        form[0].reset();
                        inputs.each(function() {
                            clearValidation(this);
                        });
                    } else {
                        showNotification(response.data.message || 'Có lỗi xảy ra, vui lòng thử lại', 'error');
                    }
                },
                error: function() {
                    showNotification('Có lỗi xảy ra, vui lòng thử lại', 'error');
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });
    });
    
    // Add CSS animations and validation styles
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slide-in {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes slide-out {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        .form-notification {
            animation: slide-in 0.3s ease-out;
        }
        
        /* Validation styles */
        input.is-invalid,
        select.is-invalid,
        textarea.is-invalid {
            border-color: #ef4444 !important;
            border-width: 2px !important;
        }
        
        input.is-invalid:focus,
        select.is-invalid:focus,
        textarea.is-invalid:focus {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }
        
        .error-message {
            display: block;
            color: #ef4444 !important;
            font-size: 0.75rem !important;
            margin-top: 0.25rem !important;
            font-weight: 500 !important;
            animation: fadeIn 0.2s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-4px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);
    
})(jQuery);
