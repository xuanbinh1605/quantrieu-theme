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
        const formGroup = input.closest('.space-y-2');
        input.classList.add('border-red-500', 'focus-visible:ring-red-500/20');
        input.classList.remove('border-green-500', 'focus-visible:ring-green-500/20');
        
        // Remove existing error message
        const existingError = formGroup.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
        
        // Add error message
        const errorDiv = document.createElement('p');
        errorDiv.className = 'error-message text-xs text-red-500 mt-1';
        errorDiv.textContent = message;
        formGroup.appendChild(errorDiv);
    }

    // Show success
    function showSuccess(input) {
        const formGroup = input.closest('.space-y-2');
        input.classList.add('border-green-500', 'focus-visible:ring-green-500/20');
        input.classList.remove('border-red-500', 'focus-visible:ring-red-500/20');
        
        // Remove error message
        const existingError = formGroup.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
    }

    // Clear validation
    function clearValidation(input) {
        const formGroup = input.closest('.space-y-2');
        input.classList.remove('border-red-500', 'border-green-500', 'focus-visible:ring-red-500/20', 'focus-visible:ring-green-500/20');
        
        const existingError = formGroup.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
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
        notification.className = `form-notification fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 animate-slide-in ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        } text-white`;
        
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
            if (this.classList.contains('border-red-500') || this.classList.contains('border-green-500')) {
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
    
    // Add CSS animations
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
    `;
    document.head.appendChild(style);
    
})(jQuery);
