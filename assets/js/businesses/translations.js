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

        // ==================== BUSINESSESS  ====================

         // Headers
        'businesses_title': 'Businesses Management',
        'businesses_subtitle': 'Manage your Businesses, organize products, and track performance.',
        'th_business_id': 'Business ID',
        'th_business': 'Business',
        'th_email': 'Email',
        'th_phone': 'Phone',
        'th_status': 'Status',
        'th_expires': 'Expires',
        'th_actions': 'Actions',
        'empty_message': 'No businesses found',
        // Modal
        'modal_add_title': 'Add Business',
        'modal_edit_title': 'Edit Business',
        'label_business_name': 'Business Name *',
        'label_owner_name': 'Owner Name *',
        'label_email': 'Email *',
        'label_phone': 'Phone *',
        'label_address': 'Address',
        'label_status': 'Subscription Status',
        'label_start_date': 'Subscription Start',
        'label_end_date': 'Subscription End',
        'btn_cancel': 'Cancel',
        'btn_save': 'Save Business',
        'btn_close': 'Close',
        'btn_delete': 'Delete',
        // Status
        'status_active': 'Active',
        'status_expired': 'Expired',
        'status_suspended': 'Suspended',
        // View modal
        'modal_view_title': 'Business Details',
        'view_email': 'Email',
        'view_phone': 'Phone',
        'view_address': 'Address',
        'view_start': 'Subscription Start',
        'view_end': 'Subscription End',
        'view_status': 'Status',
        'quick_actions': 'Quick Actions',
        // Delete modal
        'delete_title': 'Delete Business',
        'delete_confirmation': 'Are you sure you want to delete',
        'delete_warning': 'This action cannot be undone.',
        // Buttons
        'btn_activate': 'Activate',
        'btn_suspend': 'Suspend',
        'btn_delete_action': 'Delete',
        // Placeholders
        'search_placeholder': 'Search by name or owner...',
        'filter_all': 'All Status',
        // Alerts
        'alert_fill_fields': 'Please fill required fields: Name, Owner, Email, Phone',
        'alert_invalid_dates': 'Invalid dates'
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


        // ==================== BUSINESSESS  ====================

        'businesses_title': 'ව්‍යාපාර කළමනාකරණය',
        'businesses_subtitle': 'ඔබගේ ව්‍යාපාර කළමනාකරණය කරන්න, නිෂ්පාදන සංවිධානය කරන්න, සහ කාර්ය සාධනය නිරීක්ෂණය කරන්න.',
        'th_business_id': 'ව්‍යාපාර හැඳුනුම්පත',
        'th_business': 'ව්‍යාපාරය',
        'th_email': 'විද්‍යුත් තැපෑල',
        'th_phone': 'දුරකථනය',
        'th_status': 'තත්වය',
        'th_expires': 'කල් ඉකුත්වන දිනය',
        'th_actions': 'ක්‍රියා',
        'empty_message': 'ව්‍යාපාර හමු නොවීය',
        'modal_add_title': 'ව්‍යාපාරය එක් කරන්න',
        'modal_edit_title': 'ව්‍යාපාරය සංස්කරණය කරන්න',
        'label_business_name': 'ව්‍යාපාර නම *',
        'label_owner_name': 'හිමිකරුගේ නම *',
        'label_email': 'විද්‍යුත් තැපෑල *',
        'label_phone': 'දුරකථනය *',
        'label_address': 'ලිපිනය',
        'label_status': 'දායකත්ව තත්වය',
        'label_start_date': 'දායකත්ව ආරම්භය',
        'label_end_date': 'දායකත්ව අවසානය',
        'btn_cancel': 'අවලංගු කරන්න',
        'btn_save': 'ව්‍යාපාරය සුරකින්න',
        'btn_close': 'වසන්න',
        'btn_delete': 'මකන්න',
        'status_active': 'සක්‍රිය',
        'status_expired': 'කල් ඉකුත් වූ',
        'status_suspended': 'අත්හිටුවන ලදී',
        'modal_view_title': 'ව්‍යාපාර විස්තර',
        'view_email': 'විද්‍යුත් තැපෑල',
        'view_phone': 'දුරකථනය',
        'view_address': 'ලිපිනය',
        'view_start': 'දායකත්ව ආරම්භය',
        'view_end': 'දායකත්ව අවසානය',
        'view_status': 'තත්වය',
        'quick_actions': 'ඉක්මන් ක්‍රියා',
        'delete_title': 'ව්‍යාපාරය මකන්න',
        'delete_confirmation': 'ඔබට නිසැකවම මකා දැමීමට අවශ්‍යද',
        'delete_warning': 'මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'btn_activate': 'සක්‍රිය කරන්න',
        'btn_suspend': 'අත්හිටුවන්න',
        'btn_delete_action': 'මකන්න',
        'search_placeholder': 'නම හෝ හිමිකරු අනුව සොයන්න...',
        'filter_all': 'සියලුම තත්වයන්',
        'alert_fill_fields': 'කරුණාකර අවශ්‍ය ක්ෂේත්‍ර පුරවන්න: නම, හිමිකරු, විද්‍යුත් තැපෑල, දුරකථනය',
        'alert_invalid_dates': 'වලංගු නොවන දිනයන්'
        
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

        // ==================== BUSINESSESS  ====================

        'businesses_title': 'வணிக மேலாண்மை',
        'businesses_subtitle': 'உங்கள் வணிகங்களை நிர்வகிக்கவும், தயாரிப்புகளை ஒழுங்கமைக்கவும், செயல்திறனைக் கண்காணிக்கவும்.',
        'th_business_id': 'வணிக ஐடி',
        'th_business': 'வணிகம்',
        'th_email': 'மின்னஞ்சல்',
        'th_phone': 'தொலைபேசி',
        'th_status': 'நிலை',
        'th_expires': 'காலாவதியாகும் தேதி',
        'th_actions': 'செயல்கள்',
        'empty_message': 'வணிகங்கள் எதுவும் கிடைக்கவில்லை',
        'modal_add_title': 'வணிகத்தை சேர்க்கவும்',
        'modal_edit_title': 'வணிகத்தை திருத்தவும்',
        'label_business_name': 'வணிகப் பெயர் *',
        'label_owner_name': 'உரிமையாளர் பெயர் *',
        'label_email': 'மின்னஞ்சல் *',
        'label_phone': 'தொலைபேசி *',
        'label_address': 'முகவரி',
        'label_status': 'சந்தா நிலை',
        'label_start_date': 'சந்தா ஆரம்பம்',
        'label_end_date': 'சந்தா முடிவு',
        'btn_cancel': 'ரத்து செய்',
        'btn_save': 'வணிகத்தை சேமி',
        'btn_close': 'மூடு',
        'btn_delete': 'நீக்கு',
        'status_active': 'செயலில்',
        'status_expired': 'காலாவதியானது',
        'status_suspended': 'இடைநிறுத்தப்பட்டது',
        'modal_view_title': 'வணிக விவரங்கள்',
        'view_email': 'மின்னஞ்சல்',
        'view_phone': 'தொலைபேசி',
        'view_address': 'முகவரி',
        'view_start': 'சந்தா ஆரம்பம்',
        'view_end': 'சந்தா முடிவு',
        'view_status': 'நிலை',
        'quick_actions': 'விரைவான செயல்கள்',
        'delete_title': 'வணிகத்தை நீக்குக',
        'delete_confirmation': 'நீங்கள் நிச்சயமாக நீக்க விரும்புகிறீர்களா',
        'delete_warning': 'இந்த செயலை மீண்டும் செய்ய முடியாது.',
        'btn_activate': 'செயல்படுத்து',
        'btn_suspend': 'இடைநிறுத்து',
        'btn_delete_action': 'நீக்கு',
        'search_placeholder': 'பெயர் அல்லது உரிமையாளர் மூலம் தேடுக...',
        'filter_all': 'அனைத்து நிலைகளும்',
        'alert_fill_fields': 'தேவையான புலங்களை நிரப்பவும்: பெயர், உரிமையாளர், மின்னஞ்சல், தொலைபேசி',
        'alert_invalid_dates': 'செல்லாத தேதிகள்'
        
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