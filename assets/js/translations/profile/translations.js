// ============================================
// File: assets/js/translations.js
// Description: Multi-language support for damages page (English, Sinhala, Tamil)
// ============================================

const translations = {
    en: {
       // ==================== SIDEBAR NAVIGATION ====================
        'sidebar.dashboard': 'Dashboard',
        'sidebar.customers': 'Customers',
        'sidebar.items': 'Items',
        'sidebar.orders': 'Orders',
        'sidebar.payments': 'Payments',
        'sidebar.returns': 'Returns',
        'sidebar.damages': 'Damages',
        'sidebar.users': 'Users',
        'sidebar.businesses': 'Businesses',
        'sidebar.categories': 'Categories',
        'sidebar.wholesalers': 'Wholesalers',
        'sidebar.couriers': 'Couriers',
        'sidebar.logout': 'Logout',
        'sidebar.main': 'Main Menu',
        'sidebar.management': 'Management',
        'sidebar.operations': 'Operations',
        
        // ==================== COMMON UI ELEMENTS ====================
        'common.save': 'Save',
        'common.cancel': 'Cancel',
        'common.edit': 'Edit',
        'common.delete': 'Delete',
        'common.add': 'Add',
        'common.search': 'Search',
        'common.filter': 'Filter',
        'common.actions': 'Actions',
        'common.status': 'Status',
        'common.active': 'Active',
        'common.inactive': 'Inactive',
        'common.pending': 'Pending',
        'common.confirmed': 'Confirmed',
        'common.shipped': 'Shipped',
        'common.delivered': 'Delivered',
        'common.cancelled': 'Cancelled',
        'common.paid': 'Paid',
        'common.unpaid': 'Unpaid',
        'common.yes': 'Yes',
        'common.no': 'No',
        'common.loading': 'Loading...',
        'common.no_data': 'No data found',
        'common.confirm_delete': 'Are you sure you want to delete this?',
        'common.success': 'Success!',
        'common.error': 'Error!',
        'common.warning': 'Warning!',
        
        // ==================== HEADER ====================
        'header.search_placeholder': 'Search anything...',
        'header.notifications': 'Notifications',
        'header.mark_all_read': 'Mark all as read',
        'header.new_order': 'New order received',
        'header.low_stock': 'Low stock alert',
        'header.payment_received': 'Payment received',
        'header.no_notifications': 'No new notifications',
        'header.profile': 'Profile',
        'header.my_profile': 'My Profile',
        'header.account_settings': 'Account Settings',
        'header.change_password': 'Change Password',
        'header.help': 'Help & Support',
        'header.light': 'Light',
        'header.dark': 'Dark',
        'header.system': 'System',
        'header.english': 'English',
        'header.sinhala': 'සිංහල',
        'header.tamil': 'தமிழ்',
        'header.logout': 'Logout',

        // PROFILE Page
         profile_title: "My Profile",
            profile_subtitle: "Manage your personal information and account settings.",
            member_since: "Member since",
            account_stats: "Account Statistics",
            last_login: "Last Login",
            account_status: "Account Status",
            personal_info: "Personal Information",
            personal_info_desc: "Update your personal details and contact information.",
            form_full_name: "Full Name",
            full_name_placeholder: "John Doe",
            form_email: "Email Address",
            email_placeholder: "user@example.com",
            form_phone: "Phone Number",
            phone_placeholder: "+1 234 567 8900",
            form_role: "Role",
            save_changes_btn: "Save Changes",
            cancel_btn: "Cancel",
            change_password: "Change Password",
            change_password_desc: "Update your password to keep your account secure.",
            current_password: "Current Password",
            new_password: "New Password",
            confirm_password: "Confirm New Password",
            update_password_btn: "Update Password",
            password_placeholder: "••••••••",
            uploaded: "Uploaded!",
            profile_updated: "Profile updated successfully!",
            image_updated: "Profile image updated!",
            password_updated: "Password updated successfully!",
            changes_discarded: "Changes discarded",
            full_name_required: "Full name is required",
            email_required: "Email is required",
            phone_required: "Phone number is required",
            current_password_required: "Current password is required",
            new_password_required: "New password is required",
            password_min_length: "New password must be at least 6 characters",
            passwords_do_not_match: "New passwords do not match",
            administrator: "Administrator",
            staff_member: "Staff Member",
            active: "Active",
            inactive: "Inactive", 
            profile_title: "My Profile",
            profile_subtitle: "Manage your personal information and account settings.",
            member_since: "Member since",
            account_stats: "Account Statistics",
            last_login: "Last Login",
            account_status: "Account Status",
            personal_info: "Personal Information",
            personal_info_desc: "Update your personal details and contact information.",
            form_full_name: "Full Name",
            full_name_placeholder: "John Doe",
            form_email: "Email Address",
            email_placeholder: "user@example.com",
            form_phone: "Phone Number",
            phone_placeholder: "+1 234 567 8900",
            form_role: "Role",
            save_changes_btn: "Save Changes",
            cancel_btn: "Cancel",
            change_password: "Change Password",
            change_password_desc: "Update your password to keep your account secure.",
            current_password: "Current Password",
            new_password: "New Password",
            confirm_password: "Confirm New Password",
            update_password_btn: "Update Password",
            password_placeholder: "••••••••",
            uploaded: "Uploaded!",
            profile_updated: "Profile updated successfully!",
            image_updated: "Profile image updated!",
            password_updated: "Password updated successfully!",
            changes_discarded: "Changes discarded",
            full_name_required: "Full name is required",
            email_required: "Email is required",
            phone_required: "Phone number is required",
            current_password_required: "Current password is required",
            new_password_required: "New password is required",
            password_min_length: "New password must be at least 6 characters",
            passwords_do_not_match: "New passwords do not match",
            administrator: "Administrator",
            staff_member: "Staff Member",
            active: "Active",
            inactive: "Inactive"
    },
    si: {

        // Sidebar Navigation
        'sidebar.dashboard': 'උපකරණ පුවරුව',
        'sidebar.customers': 'පාරිභෝගිකයින්',
        'sidebar.items': 'අයිතම',
        'sidebar.orders': 'ඇණවුම්',
        'sidebar.payments': 'ගෙවීම්',
        'sidebar.returns': 'ආපසු ලබාදීම්',
        'sidebar.damages': 'හානි',
        'sidebar.users': 'පරිශීලකයින්',
        'sidebar.businesses': 'ව්‍යාපාර',
        'sidebar.categories': 'ප්‍රවර්ග',
        'sidebar.wholesalers': 'තොග වෙළෙන්දන්',
        'sidebar.couriers': 'කුරියර්',
        'sidebar.logout': 'ඉවත් වන්න',
        'sidebar.main': 'ප්‍රධාන මෙනුව',
        'sidebar.management': 'කළමනාකරණය',
        'sidebar.operations': 'මෙහෙයුම්',
        
        // Common UI Elements
        'common.save': 'සුරකින්න',
        'common.cancel': 'අවලංගු කරන්න',
        'common.edit': 'සංස්කරණය කරන්න',
        'common.delete': 'මකන්න',
        'common.add': 'එකතු කරන්න',
        'common.search': 'සොයන්න',
        'common.filter': 'පෙරහන',
        'common.actions': 'ක්‍රියා',
        'common.status': 'තත්වය',
        'common.active': 'ක්‍රියාකාරී',
        'common.inactive': 'අක්‍රිය',
        'common.pending': 'විසඳුම් රැඳී ඇත',
        'common.confirmed': 'තහවුරු කරන ලදී',
        'common.shipped': 'නැව්ගත කරන ලදී',
        'common.delivered': 'භාරදුන්නා',
        'common.cancelled': 'අවලංගු කරන ලදී',
        'common.paid': 'ගෙවන ලදී',
        'common.unpaid': 'නොගෙවූ',
        'common.yes': 'ඔව්',
        'common.no': 'නැහැ',
        'common.loading': 'පූරණය වෙමින්...',
        'common.no_data': 'දත්ත හමු නොවීය',
        'common.confirm_delete': 'ඔබට මෙය මැකීමට අවශ්‍ය බව විශ්වාසද?',
        'common.success': 'සාර්ථකයි!',
        'common.error': 'දෝෂයක්!',
        'common.warning': 'අවවාදයයි!',
        
        // Header
        'header.search_placeholder': 'සොයන්න...',
        'header.notifications': 'දැනුම් දීම්',
        'header.mark_all_read': 'සියල්ල කියවූ ලෙස සලකන්න',
        'header.new_order': 'නව ඇණවුමක් ලැබිණි',
        'header.low_stock': 'අඩු තොග අනතුරු ඇඟවීම',
        'header.payment_received': 'ගෙවීම ලැබිණි',
        'header.no_notifications': 'නව දැනුම් දීම් නැත',
        'header.profile': 'පැතිකඩ',
        'header.my_profile': 'මගේ පැතිකඩ',
        'header.account_settings': 'ගිණුම් සැකසුම්',
        'header.change_password': 'මුරපදය වෙනස් කරන්න',
        'header.help': 'උදව් සහ සහාය',
        'header.light': 'ආලෝකය',
        'header.dark': 'අඳුරු',
        'header.system': 'පද්ධතිය',
        'header.english': 'English',
        'header.sinhala': 'සිංහල',
        'header.tamil': 'தமிழ்',
        'header.logout': 'ඉවත් වන්න',

        // PROFILE Page
        profile_title: "මගේ පැතිකඩ",
            profile_subtitle: "ඔබගේ පුද්ගලික තොරතුරු සහ ගිණුම් සැකසුම් කළමනාකරණය කරන්න.",
            member_since: "සාමාජිකයා වූ දින සිට",
            account_stats: "ගිණුම් සංඛ්‍යාලේඛන",
            last_login: "අවසන් ප්‍රවේශය",
            account_status: "ගිණුම් තත්වය",
            personal_info: "පුද්ගලික තොරතුරු",
            personal_info_desc: "ඔබගේ පුද්ගලික විස්තර සහ සම්බන්ධතා තොරතුරු යාවත්කාලීන කරන්න.",
            form_full_name: "සම්පූර්ණ නම",
            full_name_placeholder: "ජෝන් ඩෝ",
            form_email: "විද්‍යුත් තැපෑල",
            email_placeholder: "user@example.com",
            form_phone: "දුරකථන අංකය",
            phone_placeholder: "+1 234 567 8900",
            form_role: "භූමිකාව",
            save_changes_btn: "වෙනස්කම් සුරකින්න",
            cancel_btn: "අවලංගු කරන්න",
            change_password: "මුරපදය වෙනස් කරන්න",
            change_password_desc: "ඔබගේ ගිණුම ආරක්ෂිතව තබා ගැනීමට ඔබගේ මුරපදය යාවත්කාලීන කරන්න.",
            current_password: "වත්මන් මුරපදය",
            new_password: "නව මුරපදය",
            confirm_password: "නව මුරපදය තහවුරු කරන්න",
            update_password_btn: "මුරපදය යාවත්කාලීන කරන්න",
            password_placeholder: "••••••••",
            uploaded: "උඩුගත කරන ලදී!",
            profile_updated: "පැතිකඩ සාර්ථකව යාවත්කාලීන කරන ලදී!",
            image_updated: "පැතිකඩ පින්තූරය යාවත්කාලීන කරන ලදී!",
            password_updated: "මුරපදය සාර්ථකව යාවත්කාලීන කරන ලදී!",
            changes_discarded: "වෙනස්කම් ඉවතලන ලදී",
            full_name_required: "සම්පූර්ණ නම අවශ්‍ය වේ",
            email_required: "විද්‍යුත් තැපෑල අවශ්‍ය වේ",
            phone_required: "දුරකථන අංකය අවශ්‍ය වේ",
            current_password_required: "වත්මන් මුරපදය අවශ්‍ය වේ",
            new_password_required: "නව මුරපදය අවශ්‍ය වේ",
            password_min_length: "නව මුරපදය අවම වශයෙන් අක්ෂර 6 ක් විය යුතුය",
            passwords_do_not_match: "නව මුරපද ගැලපෙන්නේ නැත",
            administrator: "පරිපාලක",
            staff_member: "කාර්ය මණ්ඩල සාමාජික",
            active: "සක්‍රිය",
            inactive: "අක්‍රිය"
    },
    ta: {
        
        // Sidebar Navigation
        'sidebar.dashboard': 'டாஷ்போர்டு',
        'sidebar.customers': 'வாடிக்கையாளர்கள்',
        'sidebar.items': 'பொருட்கள்',
        'sidebar.orders': 'ஆர்டர்கள்',
        'sidebar.payments': 'பணம் செலுத்துதல்',
        'sidebar.returns': 'திரும்பப்பெறுதல்கள்',
        'sidebar.damages': 'சேதங்கள்',
        'sidebar.users': 'பயனர்கள்',
        'sidebar.businesses': 'வணிகங்கள்',
        'sidebar.categories': 'வகைகள்',
        'sidebar.wholesalers': 'மொத்த விற்பனையாளர்கள்',
        'sidebar.couriers': 'கூரியர்கள்',
        'sidebar.logout': 'வெளியேறு',
        'sidebar.main': 'பிரதான மெனு',
        'sidebar.management': 'நிர்வாகம்',
        'sidebar.operations': 'செயல்பாடுகள்',
        
        // Common UI Elements
        'common.save': 'சேமி',
        'common.cancel': 'ரத்து செய்',
        'common.edit': 'திருத்து',
        'common.delete': 'நீக்கு',
        'common.add': 'சேர்',
        'common.search': 'தேடுக',
        'common.filter': 'வடிகட்டு',
        'common.actions': 'செயல்கள்',
        'common.status': 'நிலை',
        'common.active': 'செயலில்',
        'common.inactive': 'செயலற்றது',
        'common.pending': 'நிலுவையில்',
        'common.confirmed': 'உறுதிப்படுத்தப்பட்டது',
        'common.shipped': 'அனுப்பப்பட்டது',
        'common.delivered': 'வழங்கப்பட்டது',
        'common.cancelled': 'ரத்து செய்யப்பட்டது',
        'common.paid': 'செலுத்தப்பட்டது',
        'common.unpaid': 'செலுத்தப்படவில்லை',
        'common.yes': 'ஆம்',
        'common.no': 'இல்லை',
        'common.loading': 'ஏற்றுகிறது...',
        'common.no_data': 'தரவு எதுவும் இல்லை',
        'common.confirm_delete': 'இதை நீக்க வேண்டுமா?',
        'common.success': 'வெற்றி!',
        'common.error': 'பிழை!',
        'common.warning': 'எச்சரிக்கை!',
        
        // Header
        'header.search_placeholder': 'தேடுக...',
        'header.notifications': 'அறிவிப்புகள்',
        'header.mark_all_read': 'அனைத்தையும் படித்ததாக குறி',
        'header.new_order': 'புதிய ஆர்டர் வந்தது',
        'header.low_stock': 'குறைந்த இருப்பு எச்சரிக்கை',
        'header.payment_received': 'பணம் பெறப்பட்டது',
        'header.no_notifications': 'புதிய அறிவிப்புகள் இல்லை',
        'header.profile': 'சுயவிவரம்',
        'header.my_profile': 'எனது சுயவிவரம்',
        'header.account_settings': 'கணக்கு அமைப்புகள்',
        'header.change_password': 'கடவுச்சொல்லை மாற்று',
        'header.help': 'உதவி & ஆதரவு',
        'header.light': 'ஒளி',
        'header.dark': 'இருட்டு',
        'header.system': 'கணினி',
        'header.english': 'English',
        'header.sinhala': 'සිංහල',
        'header.tamil': 'தமிழ்',
        'header.logout': 'வெளியேறு',

        // PROFILE Page

        profile_title: "எனது சுயவிவரம்",
            profile_subtitle: "உங்கள் தனிப்பட்ட தகவல்களையும் கணக்கு அமைப்புகளையும் நிர்வகிக்கவும்.",
            member_since: "உறுப்பினரான தேதி",
            account_stats: "கணக்கு புள்ளிவிவரங்கள்",
            last_login: "கடைசி உள்நுழைவு",
            account_status: "கணக்கு நிலை",
            personal_info: "தனிப்பட்ட தகவல்கள்",
            personal_info_desc: "உங்கள் தனிப்பட்ட விவரங்கள் மற்றும் தொடர்புத் தகவல்களைப் புதுப்பிக்கவும்.",
            form_full_name: "முழு பெயர்",
            full_name_placeholder: "ஜான் டோ",
            form_email: "மின்னஞ்சல் முகவரி",
            email_placeholder: "user@example.com",
            form_phone: "தொலைபேசி எண்",
            phone_placeholder: "+1 234 567 8900",
            form_role: "பாத்திரம்",
            save_changes_btn: "மாற்றங்களைச் சேமி",
            cancel_btn: "ரத்து செய்",
            change_password: "கடவுச்சொல்லை மாற்று",
            change_password_desc: "உங்கள் கணக்கைப் பாதுகாக்க உங்கள் கடவுச்சொல்லைப் புதுப்பிக்கவும்.",
            current_password: "தற்போதைய கடவுச்சொல்",
            new_password: "புதிய கடவுச்சொல்",
            confirm_password: "புதிய கடவுச்சொல்லை உறுதிப்படுத்துக",
            update_password_btn: "கடவுச்சொல்லைப் புதுப்பி",
            password_placeholder: "••••••••",
            uploaded: "பதிவேற்றப்பட்டது!",
            profile_updated: "சுயவிவரம் வெற்றிகரமாகப் புதுப்பிக்கப்பட்டது!",
            image_updated: "சுயவிவரப் படம் புதுப்பிக்கப்பட்டது!",
            password_updated: "கடவுச்சொல் வெற்றிகரமாகப் புதுப்பிக்கப்பட்டது!",
            changes_discarded: "மாற்றங்கள் நிராகரிக்கப்பட்டன",
            full_name_required: "முழு பெயர் தேவை",
            email_required: "மின்னஞ்சல் தேவை",
            phone_required: "தொலைபேசி எண் தேவை",
            current_password_required: "தற்போதைய கடவுச்சொல் தேவை",
            new_password_required: "புதிய கடவுச்சொல் தேவை",
            password_min_length: "புதிய கடவுச்சொல் குறைந்தது 6 எழுத்துகளாக இருக்க வேண்டும்",
            passwords_do_not_match: "புதிய கடவுச்சொற்கள் பொருந்தவில்லை",
            administrator: "நிர்வாகி",
            staff_member: "ஊழியர்",
            active: "செயலில்",
            inactive: "செயலற்ற"
        
    }
};

// ==================== HELPER FUNCTIONS ====================

// Get current language from cookie or localStorage
function getCurrentLanguage() {
    // Check localStorage first
    let lang = localStorage.getItem('app_language');
    if (lang && translations[lang]) return lang;
    
    // Check cookie
    const cookies = document.cookie.split(';');
    for (let cookie of cookies) {
        const [name, value] = cookie.trim().split('=');
        if (name === 'user_lang' && translations[value]) return value;
    }
    
    // Check browser language
    const browserLang = navigator.language.split('-')[0];
    if (translations[browserLang]) return browserLang;
    
    // Default to English
    return 'en';
}

// Set current language
function setCurrentLanguage(lang) {
    if (translations[lang]) {
        localStorage.setItem('app_language', lang);
        document.cookie = `user_lang=${lang}; path=/; max-age=${60*60*24*365}`;
        return true;
    }
    return false;
}

// Translation function - main function to use throughout the app
function t(key) {
    const lang = getCurrentLanguage();
    const translation = translations[lang]?.[key];
    if (translation !== undefined) return translation;
    
    // Fallback to English
    const englishTranslation = translations.en[key];
    if (englishTranslation !== undefined) return englishTranslation;
    
    // Return the key if no translation found
    console.warn(`Translation missing for key: ${key}`);
    return key;
}

// Function to update all translatable elements on the page
function updatePageTranslations() {
    // Update elements with data-i18n attribute
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        if (element.tagName === 'INPUT' && element.hasAttribute('placeholder')) {
            element.placeholder = t(key);
        } else if ((element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') && element.getAttribute('type') !== 'button' && element.getAttribute('type') !== 'submit') {
            // Don't override button values
            if (!element.value || element.getAttribute('data-i18n-original') === 'true') {
                element.value = t(key);
                element.setAttribute('data-i18n-original', 'true');
            }
        } else {
            element.textContent = t(key);
        }
    });
    
    // Update elements with data-i18n-placeholder attribute
    document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
        const key = element.getAttribute('data-i18n-placeholder');
        element.placeholder = t(key);
    });
    
    // Update elements with data-i18n-title attribute
    document.querySelectorAll('[data-i18n-title]').forEach(element => {
        const key = element.getAttribute('data-i18n-title');
        element.title = t(key);
    });
    
    // Update sidebar sections if they exist
    document.querySelectorAll('.sidebar-section-label').forEach((el, index) => {
        const keys = ['sidebar.main', 'sidebar.operations', 'sidebar.management'];
        if (index < keys.length) el.textContent = t(keys[index]);
    });
    
    // Update sidebar items
    const sidebarItems = document.querySelectorAll('.sidebar-item span:last-child');
    const sidebarKeys = [
        'sidebar.dashboard', 'sidebar.orders', 'sidebar.customers',
        'sidebar.payments', 'sidebar.returns', 'sidebar.damages',
        'sidebar.items', 'sidebar.categories', 'sidebar.wholesalers',
        'sidebar.couriers', 'sidebar.businesses', 'sidebar.users'
    ];
    sidebarItems.forEach((item, index) => {
        if (index < sidebarKeys.length && item && !item.querySelector('.material-icons-round')) {
            item.textContent = t(sidebarKeys[index]);
        }
    });
    
    // Update logout button in sidebar
    const logoutBtn = document.querySelector('.sidebar a[href*="logout"] span:last-child');
    if (logoutBtn && logoutBtn.textContent !== t('sidebar.logout')) logoutBtn.textContent = t('sidebar.logout');
    
    // Update header search placeholder
    const searchInput = document.getElementById('globalSearch');
    if (searchInput) searchInput.placeholder = t('header.search_placeholder');
    
    // Update notification texts if they exist
    const notifItems = document.querySelectorAll('.notif-item p:first-child');
    if (notifItems.length >= 3) {
        notifItems[0].textContent = t('header.new_order');
        notifItems[1].textContent = t('header.low_stock');
        notifItems[2].textContent = t('header.payment_received');
    }
    
    // Update dropdown menu texts
    const profileItems = document.querySelectorAll('.profile-dropdown .hdr-dropdown-item');
    const profileKeys = ['header.my_profile', 'header.account_settings', 'header.change_password', 'header.help'];
    profileItems.forEach((item, index) => {
        if (index < profileKeys.length && item.querySelector('span:last-child')) {
            const textSpan = item.querySelector('span:last-child');
            if (textSpan && !textSpan.classList.contains('material-icons-round')) {
                textSpan.textContent = t(profileKeys[index]);
            }
        }
    });
    
    // Update logout in profile dropdown
    const logoutProfileItem = document.querySelector('.profile-dropdown .hdr-dropdown-item[href*="logout"] span:last-child');
    if (logoutProfileItem) logoutProfileItem.textContent = t('header.logout');
    
    // Update language dropdown items
    const langItems = document.querySelectorAll('#langDropdown .hdr-dropdown-item');
    if (langItems.length >= 3) {
        const langTexts = ['header.english', 'header.sinhala', 'header.tamil'];
        langItems.forEach((item, index) => {
            if (index < langTexts.length && item.querySelector('span:last-child')) {
                const textSpan = item.querySelector('span:last-child');
                if (textSpan && !textSpan.classList.contains('material-icons-round')) {
                    textSpan.textContent = t(langTexts[index]);
                }
            }
        });
    }
    
    // Update theme dropdown items
    const themeItems = document.querySelectorAll('#themeDropdown .hdr-dropdown-item');
    if (themeItems.length >= 2) {
        const lightSpan = themeItems[0].querySelector('span:last-child');
        const darkSpan = themeItems[1].querySelector('span:last-child');
        if (lightSpan) lightSpan.textContent = t('header.light');
        if (darkSpan) darkSpan.textContent = t('header.dark');
    }
    
    // Update notification header
    const notifHeader = document.querySelector('#notifDropdown > div:first-child span:first-child');
    if (notifHeader) notifHeader.textContent = t('header.notifications');
    
    const markAllReadBtn = document.querySelector('#notifDropdown button');
    if (markAllReadBtn) markAllReadBtn.textContent = t('header.mark_all_read');
    
    // Dispatch custom event for other components
    window.dispatchEvent(new CustomEvent('translationsUpdated', { detail: { language: getCurrentLanguage() } }));
}

// Function to change language and reload page content
function changeLanguage(lang) {
    if (setCurrentLanguage(lang)) {
        updatePageTranslations();
        // Dispatch event for components that need to re-render
        window.dispatchEvent(new CustomEvent('languageChanged', { detail: { language: lang } }));
    }
}

// Function to translate a key with parameters
function translate(key, params = {}) {
    let text = t(key);
    Object.keys(params).forEach(param => {
        text = text.replace(new RegExp(`{{${param}}}`, 'g'), params[param]);
    });
    return text;
}

// Initialize translations when DOM is ready
if (typeof document !== 'undefined') {
    document.addEventListener('DOMContentLoaded', () => {
        updatePageTranslations();
    });
}

// Export for use in other scripts (if using modules)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        translations,
        getCurrentLanguage,
        setCurrentLanguage,
        t,
        translate,
        updatePageTranslations,
        changeLanguage
    };
}

// Make functions globally available
if (typeof window !== 'undefined') {
    window.translations = translations;
    window.getCurrentLanguage = getCurrentLanguage;
    window.setCurrentLanguage = setCurrentLanguage;
    window.t = t;
    window.translate = translate;
    window.updatePageTranslations = updatePageTranslations;
    window.changeLanguage = changeLanguage;
}