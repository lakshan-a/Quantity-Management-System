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

        // ==================== RETURNS  ====================

         'returns_title': 'Return Management',
        'returns_subtitle': 'Manage your returns, view orders, and track refunds',
        'search_placeholder': 'Search by return ID, order or reason...',
        'new_return': 'New Return',
        'return_id': 'Return ID',
        'order_number': 'Order #',
        'reason': 'Reason',
        'status': 'Status',
        'refund': 'Refund',
        'created': 'Created',
        'return_date_header': 'Return Date',
        'actions': 'Actions',
        'no_returns_found': 'No returns found matching your search.',
        'new_return_title': 'New Return Request',
        'order_label': 'Order *',
        'select_order': 'Select order',
        'reason_label': 'Reason for return *',
        'return_status_label': 'Return Status',
        'refund_status_label': 'Refund Status',
        'return_date_label': 'Return Date (optional)',
        'order_lost_notes_label': 'Order lost notes',
        'order_lost_placeholder': 'e.g., Customer refused to return',
        'cancel': 'Cancel',
        'submit_request': 'Submit Request',
        'edit_return_title': 'Edit Return',
        'update_return': 'Update Return',
        'return_details_title': 'Return Details',
        'delete_return_title': 'Delete Return',
        'delete_confirmation_message': 'Are you sure you want to delete ',
        'delete': 'Delete',
        'requested': 'Requested',
        'approved': 'Approved',
        'rejected': 'Rejected',
        'pending': 'Pending',
        'completed': 'Completed',
        'view': 'View',
        'edit': 'Edit',
        'approve': 'Approve',
        'reject': 'Reject',
        'complete_refund': 'Complete Refund',
        'no_further_actions': 'No further actions',
        'return_id_label': 'Return ID',
        'order_number_label': 'Order Number',
        'status_label': 'Status',
        'refund_label': 'Refund',
        'reason_display': 'Reason',
        'returned_date_label': 'Returned Date',
        'order_lost_notes_display': 'Order lost notes',
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


        // ==================== RETURNS  ====================

        'returns_title': 'ආපසු භාරදීම් කළමනාකරණය',
        'returns_subtitle': 'ඔබගේ ආපසු භාරදීම් කළමනාකරණය කරන්න, ඇණවුම් බලන්න, මුදල් ආපසු ගෙවීම් ලුහුබඳින්න',
        'search_placeholder': 'ආපසු භාරදීම් ID, ඇණවුම හෝ හේතුව අනුව සොයන්න...',
        'new_return': 'නව ආපසු භාරදීමක්',
        'return_id': 'ආපසු භාරදීම් ID',
        'order_number': 'ඇණවුම් අංකය',
        'reason': 'හේතුව',
        'status': 'තත්වය',
        'refund': 'මුදල් ආපසු ගෙවීම',
        'created': 'සාදන ලද්දේ',
        'return_date_header': 'ආපසු භාරදීමේ දිනය',
        'actions': 'ක්‍රියා',
        'no_returns_found': 'ඔබගේ සෙවීමට ගැලපෙන ආපසු භාරදීම් හමු නොවිණි.',
        'new_return_title': 'නව ආපසු භාරදීමේ ඉල්ලීම',
        'order_label': 'ඇණවුම *',
        'select_order': 'ඇණවුම තෝරන්න',
        'reason_label': 'ආපසු භාරදීමට හේතුව *',
        'return_status_label': 'ආපසු භාරදීමේ තත්වය',
        'refund_status_label': 'මුදල් ආපසු ගෙවීමේ තත්වය',
        'return_date_label': 'ආපසු භාරදීමේ දිනය (විකල්ප)',
        'order_lost_notes_label': 'ඇණවුම අහිමි වූ සටහන්',
        'order_lost_placeholder': 'උදා: පාරිභෝගිකයා ආපසු භාරදීම ප්‍රතික්ෂේප කළේය',
        'cancel': 'අවලංගු කරන්න',
        'submit_request': 'ඉල්ලීම ඉදිරිපත් කරන්න',
        'edit_return_title': 'ආපසු භාරදීම සංස්කරණය කරන්න',
        'update_return': 'ආපසු භාරදීම යාවත්කාලීන කරන්න',
        'return_details_title': 'ආපසු භාරදීමේ විස්තර',
        'delete_return_title': 'ආපසු භාරදීම මකන්න',
        'delete_confirmation_message': 'ඔබට ',
        'delete': 'මකන්න',
        'requested': 'ඉල්ලා ඇත',
        'approved': 'අනුමත කර ඇත',
        'rejected': 'ප්‍රතික්ෂේප කර ඇත',
        'pending': 'විසඳුම් නොකළ',
        'completed': 'සම්පූර්ණ කර ඇත',
        'view': 'බලන්න',
        'edit': 'සංස්කරණය',
        'approve': 'අනුමත කරන්න',
        'reject': 'ප්‍රතික්ෂේප කරන්න',
        'complete_refund': 'මුදල් ආපසු ගෙවීම සම්පූර්ණ කරන්න',
        'no_further_actions': 'තවත් ක්‍රියා නැත',
        'return_id_label': 'ආපසු භාරදීම් ID',
        'order_number_label': 'ඇණවුම් අංකය',
        'status_label': 'තත්වය',
        'refund_label': 'මුදල් ආපසු ගෙවීම',
        'reason_display': 'හේතුව',
        'returned_date_label': 'ආපසු භාරදීමේ දිනය',
        'order_lost_notes_display': 'ඇණවුම අහිමි වූ සටහන්'

        
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

        // ==================== RETURNS  ====================

         'returns_title': 'திரும்பப் பெறுதல் மேலாண்மை',
        'returns_subtitle': 'உங்கள் திரும்பப் பெறுதல்களை நிர்வகிக்கவும், ஆர்டர்களைப் பார்க்கவும், பணத்தைத் திருப்பிச் செலுத்துவதைக் கண்காணிக்கவும்',
        'search_placeholder': 'திரும்பப் பெறுதல் ID, ஆர்டர் அல்லது காரணம் மூலம் தேடுக...',
        'new_return': 'புதிய திரும்பப் பெறுதல்',
        'return_id': 'திரும்பப் பெறுதல் ID',
        'order_number': 'ஆர்டர் எண்',
        'reason': 'காரணம்',
        'status': 'நிலை',
        'refund': 'பணத்தைத் திருப்பிச் செலுத்துதல்',
        'created': 'உருவாக்கப்பட்டது',
        'return_date_header': 'திரும்பப் பெறுதல் தேதி',
        'actions': 'செயல்கள்',
        'no_returns_found': 'உங்கள் தேடலுடன் பொருந்தக்கூடிய திரும்பப் பெறுதல்கள் எதுவும் கிடைக்கவில்லை.',
        'new_return_title': 'புதிய திரும்பப் பெறுதல் கோரிக்கை',
        'order_label': 'ஆர்டர் *',
        'select_order': 'ஆர்டரைத் தேர்ந்தெடுக்கவும்',
        'reason_label': 'திரும்பப் பெறுவதற்கான காரணம் *',
        'return_status_label': 'திரும்பப் பெறுதல் நிலை',
        'refund_status_label': 'பணத்தைத் திருப்பிச் செலுத்தும் நிலை',
        'return_date_label': 'திரும்பப் பெறுதல் தேதி (விருப்பத்தேர்வு)',
        'order_lost_notes_label': 'ஆர்டர் இழந்த குறிப்புகள்',
        'order_lost_placeholder': 'எ.கா: வாடிக்கையாளர் திரும்பப் பெற மறுத்துவிட்டார்',
        'cancel': 'ரத்து செய்',
        'submit_request': 'கோரிக்கையை சமர்ப்பிக்கவும்',
        'edit_return_title': 'திரும்பப் பெறுதலைத் திருத்துக',
        'update_return': 'திரும்பப் பெறுதலைப் புதுப்பிக்கவும்',
        'return_details_title': 'திரும்பப் பெறுதல் விவரங்கள்',
        'delete_return_title': 'திரும்பப் பெறுதலை நீக்குக',
        'delete_confirmation_message': 'இதை நீக்க விரும்புகிறீர்களா ',
        'delete': 'நீக்குக',
        'requested': 'கோரப்பட்டது',
        'approved': 'அங்கீகரிக்கப்பட்டது',
        'rejected': 'நிராகரிக்கப்பட்டது',
        'pending': 'நிலுவையில்',
        'completed': 'முடிந்தது',
        'view': 'பார்க்க',
        'edit': 'திருத்துக',
        'approve': 'அங்கீகரி',
        'reject': 'நிராகரி',
        'complete_refund': 'பணத்தைத் திருப்பிச் செலுத்துதலை முடிக்கவும்',
        'no_further_actions': 'மேலும் செயல்கள் இல்லை',
        'return_id_label': 'திரும்பப் பெறுதல் ID',
        'order_number_label': 'ஆர்டர் எண்',
        'status_label': 'நிலை',
        'refund_label': 'பணத்தைத் திருப்பிச் செலுத்துதல்',
        'reason_display': 'காரணம்',
        'returned_date_label': 'திரும்பப் பெறுதல் தேதி',
        'order_lost_notes_display': 'ஆர்டர் இழந்த குறிப்புகள்'
        
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