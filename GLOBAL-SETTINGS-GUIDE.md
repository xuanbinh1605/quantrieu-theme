# Global Contact Settings Guide

## Overview
The Quantrieu Theme now uses **global contact settings** that can be managed from a single location in the WordPress Customizer. This eliminates the need to update contact information in multiple places.

## Where to Edit Global Contact Information

Navigate to: **WordPress Customizer → Thông Tin Chung (General Information)**

### Available Global Settings:

1. **Logo** - Company logo image
2. **Số Điện Thoại (Phone Number)** - Contact phone number (e.g., "0909 123 456")
3. **Địa Chỉ (Address)** - Company address
4. **Email** - Contact email address
5. **Giờ Mở Cửa (Opening Hours)** - Business hours

## Where These Settings Are Used

The global contact settings are automatically used throughout the theme:

### ✅ Footer
- Phone number
- Email address
- Address
- Opening hours

### ✅ Contact Page (Liên Hệ)
- Contact information sidebar
- All contact details

### ✅ CTA Section (Call-to-Action)
- Phone button
- Contact information

### ✅ Hero Section (Trang Chủ)
- Phone button in hero

## Deprecated Settings

The following settings are **no longer used** and have been marked as deprecated. They are kept in the Customizer for backwards compatibility but won't affect the site:

### In "Cài Đặt Trang Liên Hệ" (Contact Page Settings):
- ⚠️ Địa chỉ (Address) - Use: **Thông Tin Chung → Địa Chỉ**
- ⚠️ Số điện thoại (Phone) - Use: **Thông Tin Chung → Số Điện Thoại**
- ⚠️ Email - Use: **Thông Tin Chung → Email**
- ⚠️ Giờ làm việc (Working Hours) - Use: **Thông Tin Chung → Giờ Mở Cửa**

### In "Phần Kêu Gọi Hành Động (CTA)":
- ⚠️ Số điện thoại - Use: **Thông Tin Chung → Số Điện Thoại**
- ⚠️ Số điện thoại hiển thị - Use: **Thông Tin Chung → Số Điện Thoại**

## How It Works

### Phone Number Formatting:
When you enter a phone number in the global settings (e.g., "0909 123 456"):
- **Display**: Shows exactly as entered with spaces
- **Tel Links**: Automatically removes spaces for `tel:` links (becomes "0909123456")

### Example:
```php
// Display on page
quantrieu_get_phone(); // Returns: "0909 123 456"

// For tel: links
preg_replace('/\s+/', '', quantrieu_get_phone()); // Returns: "0909123456"
```

## Benefits of Global Settings

1. **Single Source of Truth** - Update contact info once, changes everywhere
2. **Consistency** - Same information across all pages
3. **Easy Maintenance** - No need to search through multiple customizer sections
4. **Error Reduction** - Less chance of having different contact info on different pages

## Migration Notes

If you previously set contact information in the deprecated settings:
1. Go to **Thông Tin Chung** in the Customizer
2. Enter your contact information there
3. The changes will automatically apply to all pages
4. Old settings will be ignored

## Developer Notes

### Functions Available:

```php
// Get contact information
quantrieu_get_logo()        // Returns logo URL
quantrieu_get_phone()       // Returns phone number
quantrieu_get_address()     // Returns address
quantrieu_get_email()       // Returns email
quantrieu_get_open_hours()  // Returns opening hours
```

### Contact Page Wrappers (for backwards compatibility):
```php
quantrieu_get_contact_info_phone()    // → quantrieu_get_phone()
quantrieu_get_contact_info_email()    // → quantrieu_get_email()
quantrieu_get_contact_info_address()  // → quantrieu_get_address()
```

### CTA Section Wrappers:
```php
quantrieu_get_cta_phone_display()  // → quantrieu_get_phone()
quantrieu_get_cta_phone_number()   // → quantrieu_get_phone() (formatted for tel: link)
```

## Troubleshooting

### Contact info not updating?
1. Clear your browser cache
2. Clear WordPress cache (if using a caching plugin)
3. Check that you're editing **Thông Tin Chung** (not deprecated sections)

### Phone link not working?
- The phone number is automatically formatted for tel: links by removing spaces
- Make sure your phone number doesn't contain invalid characters

## Support

For questions or issues, please contact the theme developer.

---

**Last Updated:** March 5, 2026  
**Theme Version:** 1.0.0
