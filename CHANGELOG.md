# Changelog - Quantrieu Theme Updates

## Date: March 5, 2026

### Summary of Changes

All requested tasks have been completed successfully:

---

## 1. ✅ Removed Client Logo Hover Effects

**File Modified:** [front-page.php](front-page.php#L364-L421)

**Changes:**
- Removed `grayscale hover:grayscale-0` classes from client logo containers
- Client logos now display in their original colors at all times
- Hover effect still includes shadow transition for visual feedback

**Lines Updated:**
- Line 387: Removed grayscale effects from active clients grid
- Line 417: Removed grayscale effects from fallback clients grid

---

## 2. ✅ Created 404 Error Page

**File Created:** [404.php](404.php)

**Features:**
- Professional and user-friendly 404 error page
- Large gradient "404" text display
- Helpful navigation buttons:
  - "Về trang chủ" (Back to homepage)
  - "Liên hệ ngay" (Contact us)
- Quick links section with three cards:
  - Dịch vụ in ấn (Printing services)
  - Dự án tiêu biểu (Featured projects)
  - Về chúng tôi (About us)
- Consistent with theme design (colors, spacing, animations)
- Fully responsive design

---

## 3. ✅ Implemented Global Contact Settings

### A. Existing Global Settings (Already Available)

**File:** [customizer-general.php](customizer-general.php)

The theme already had global settings in place:
- Logo
- Phone Number (`quantrieu_phone`)
- Address (`quantrieu_address`)
- Email (`quantrieu_email`)
- Opening Hours (`quantrieu_open_hours`)

### B. Updated Contact Page to Use Global Settings

**File Modified:** [customizer-lien-he.php](customizer-lien-he.php)

**Changes Made:**
- Updated helper functions to use global settings:
  - `quantrieu_get_contact_info_phone()` → Now calls `quantrieu_get_phone()`
  - `quantrieu_get_contact_info_email()` → Now calls `quantrieu_get_email()`
  - `quantrieu_get_contact_info_address()` → Now calls `quantrieu_get_address()`
  - `quantrieu_get_contact_info_working_hours()` → Now calls `quantrieu_get_open_hours()`
  - `quantrieu_get_contact_info_phone_link()` → Auto-generates from global phone (removes spaces)

- Marked duplicate settings as DEPRECATED with warning messages:
  - Address
  - Phone Number
  - Email
  - Working Hours

### C. Updated CTA Section to Use Global Settings

**File Modified:** [customizer-cta.php](customizer-cta.php)

**Changes Made:**
- Updated helper functions to use global settings:
  - `quantrieu_get_cta_phone_number()` → Now calls `quantrieu_get_phone()` (formatted for tel: links)
  - `quantrieu_get_cta_phone_display()` → Now calls `quantrieu_get_phone()`

- Marked duplicate settings as DEPRECATED with warning messages:
  - Phone Number
  - Phone Display Text

### D. Created Documentation

**Files Created:**
1. [GLOBAL-SETTINGS-GUIDE.md](GLOBAL-SETTINGS-GUIDE.md) - Complete guide for using global settings

**Documentation Includes:**
- Where to edit global contact information
- List of all global settings
- Where settings are used throughout the theme
- List of deprecated settings
- Migration guide
- Developer reference
- Troubleshooting tips

---

## How to Use Global Settings

### For Site Administrators:

1. **Go to WordPress Dashboard**
2. **Navigate to:** Appearance → Customize → Thông Tin Chung
3. **Update the following fields:**
   - Logo
   - Số Điện Thoại (Phone)
   - Địa Chỉ (Address)
   - Email
   - Giờ Mở Cửa (Opening Hours)
4. **Click "Publish"**

✅ Your changes will automatically appear on:
- Footer
- Contact page
- CTA sections
- Hero section
- All other places using contact info

### No Need to Update:
- ~~Contact Page Settings~~ (deprecated)
- ~~CTA Phone Settings~~ (deprecated)
- ~~Individual page settings~~ (deprecated)

---

## Benefits

1. **Single Source of Truth** - Edit once, update everywhere
2. **No Duplication** - Eliminates inconsistent contact info across pages
3. **Easy Maintenance** - One place to manage all contact information
4. **Time Saving** - No need to update multiple customizer sections
5. **Error Prevention** - Reduces risk of having outdated info on some pages

---

## Files Modified

```
✏️ Modified Files:
├── front-page.php (removed grayscale effects)
├── customizer-lien-he.php (global settings integration)
└── customizer-cta.php (global settings integration)

📄 New Files:
├── 404.php (error page)
├── GLOBAL-SETTINGS-GUIDE.md (documentation)
└── CHANGELOG.md (this file)
```

---

## Testing Checklist

- [x] Front page clients section displays logos in color
- [x] 404 page renders correctly
- [x] Footer displays global contact information
- [x] Contact page displays global contact information
- [x] CTA section uses global phone number
- [x] All customizer deprecated warnings appear correctly
- [x] No PHP errors in modified files
- [x] Phone links format correctly (spaces removed)

---

## Notes for Developers

### Phone Number Auto-Formatting:
```php
// Display with spaces
quantrieu_get_phone(); // "0909 123 456"

// For tel: links (spaces removed)
preg_replace('/\s+/', '', quantrieu_get_phone()); // "0909123456"
```

### Backwards Compatibility:
All wrapper functions maintained for backwards compatibility. Existing code will continue to work without changes.

---

## Support

If you encounter any issues:
1. Clear browser cache
2. Clear WordPress cache
3. Check theme updates
4. Refer to GLOBAL-SETTINGS-GUIDE.md

---

**Version:** 1.0.0  
**Date:** March 5, 2026  
**Developer:** GitHub Copilot  
**Status:** ✅ All Tasks Completed
