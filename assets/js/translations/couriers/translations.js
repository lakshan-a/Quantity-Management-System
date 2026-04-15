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

        // ==================== COURIERS  ====================

        'couriers_title': 'Couriers Management',
        'couriers_subtitle': 'Manage your couriers, organize deliveries, and track performance.',
        'search_placeholder': 'Search couriers by name or ID...',
        'filter_btn': 'Filter',
        'delivery_fee_range': 'Delivery Fee Range',
        'min_placeholder': 'Min $',
        'max_placeholder': 'Max $',
        'reset_filters_btn': 'Reset Filters',
        'add_courier_btn': 'Add Courier',
        'col_courier_id': 'Courier ID',
        'col_courier_name': 'Courier Name',
        'col_delivery_fee': 'Delivery Fee',
        'col_contact': 'Contact',
        'col_address': 'Address',
        'col_actions': 'Actions',
        'no_couriers_found': 'No couriers found',
        'courier_details_title': 'Courier Details',
        'close_btn': 'Close',
        'add_courier_title': 'Add Courier',
        'edit_courier_title': 'Edit Courier',
        'auto_generated_hint': 'Auto-generated',
        'form_courier_name': 'Courier Name',
        'courier_name_placeholder': 'e.g., FedEx, UPS, DHL',
        'form_delivery_fee': 'Delivery Fee ($)',
        'fee_placeholder': '0.00',
        'form_contact': 'Contact Number',
        'contact_placeholder': '+1 234 567 8900',
        'form_address': 'Address',
        'address_placeholder': '123 Shipping Lane, City',
        'cancel_btn': 'Cancel',
        'save_btn': 'Save',
        'delete_title': 'Delete Courier',
        'delete_confirmation_msg': 'Are you sure you want to delete this courier? This action cannot be undone.',
        'delete_btn': 'Delete',
        'name_required': 'Courier name is required',
        'fee_valid': 'Please enter a valid delivery fee',
        'contact_required': 'Contact number is required',
        'view': 'View',
        'edit': 'Edit',
        'delete': 'Delete',
        'courier_details': 'Courier Details',
        'delete_confirm_title': 'Delete Courier'
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


        // ==================== COURIERS  ====================

        'couriers_title': 'කුරියර් කළමනාකරණය',
        'couriers_subtitle': 'ඔබගේ කුරියර් කළමනාකරණය කරන්න, බෙදාහැරීම් සංවිධානය කරන්න, සහ කාර්ය සාධනය නිරීක්ෂණය කරන්න.',
        'search_placeholder': 'නම හෝ ID අනුව කුරියර් සොයන්න...',
        'filter_btn': 'පෙරහන',
        'delivery_fee_range': 'බෙදාහැරීමේ ගාස්තු පරාසය',
        'min_placeholder': 'අවම $',
        'max_placeholder': 'උපරිම $',
        'reset_filters_btn': 'පෙරහන් යළි සකසන්න',
        'add_courier_btn': 'කුරියර් එකතු කරන්න',
        'col_courier_id': 'කුරියර් හැඳුනුම්පත',
        'col_courier_name': 'කුරියර් නම',
        'col_delivery_fee': 'බෙදාහැරීමේ ගාස්තුව',
        'col_contact': 'අමතන්න',
        'col_address': 'ලිපිනය',
        'col_actions': 'ක්‍රියා',
        'no_couriers_found': 'කුරියර් හමු නොවිණි',
        'courier_details_title': 'කුරියර් විස්තර',
        'close_btn': 'වසන්න',
        'add_courier_title': 'කුරියර් එකතු කරන්න',
        'edit_courier_title': 'කුරියර් සංස්කරණය කරන්න',
        'auto_generated_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
        'form_courier_name': 'කුරියර් නම',
        'courier_name_placeholder': 'උදා: ෆෙඩෙක්ස්, යූපීඑස්, ඩීඑච්එල්',
        'form_delivery_fee': 'බෙදාහැරීමේ ගාස්තුව ($)',
        'fee_placeholder': '0.00',
        'form_contact': 'අමතන්න අංකය',
        'contact_placeholder': '+1 234 567 8900',
        'form_address': 'ලිපිනය',
        'address_placeholder': '123 ෂිපිං ලේන්, නගරය',
        'cancel_btn': 'අවලංගු කරන්න',
        'save_btn': 'සුරකින්න',
        'delete_title': 'කුරියර් මකන්න',
        'delete_confirmation_msg': 'ඔබට මෙම කුරියර් මකා දැමීමට අවශ්‍ය බව විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'delete_btn': 'මකන්න',
        'name_required': 'කුරියර් නම අවශ්‍ය වේ',
        'fee_valid': 'කරුණාකර වලංගු බෙදාහැරීමේ ගාස්තුවක් ඇතුළත් කරන්න',
        'contact_required': 'අමතන්න අංකය අවශ්‍ය වේ',
        'view': 'බලන්න',
        'edit': 'සංස්කරණය',
        'delete': 'මකන්න',
        'courier_details': 'කුරියර් විස්තර',
        'delete_confirm_title': 'කුරියර් මකන්න'

        
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

        // ==================== COURIERS  ====================

        'couriers_title': 'கூரியர்கள் மேலாண்மை',
        'couriers_subtitle': 'உங்கள் கூரியர்களை நிர்வகிக்கவும், டெலிவரிகளை ஒழுங்கமைக்கவும், செயல்திறனைக் கண்காணிக்கவும்.',
        'search_placeholder': 'பெயர் அல்லது ஐடி மூலம் கூரியர்களைத் தேடுக...',
        'filter_btn': 'வடிகட்டி',
        'delivery_fee_range': 'டெலிவரி கட்டண வரம்பு',
        'min_placeholder': 'குறைந்த $',
        'max_placeholder': 'அதிக $',
        'reset_filters_btn': 'வடிப்பான்களை மீட்டமை',
        'add_courier_btn': 'கூரியரைச் சேர்',
        'col_courier_id': 'கூரியர் ஐடி',
        'col_courier_name': 'கூரியர் பெயர்',
        'col_delivery_fee': 'டெலிவரி கட்டணம்',
        'col_contact': 'தொடர்பு',
        'col_address': 'முகவரி',
        'col_actions': 'செயல்கள்',
        'no_couriers_found': 'கூரியர்கள் எதுவும் கிடைக்கவில்லை',
        'courier_details_title': 'கூரியர் விவரங்கள்',
        'close_btn': 'மூடு',
        'add_courier_title': 'கூரியரைச் சேர்',
        'edit_courier_title': 'கூரியரைத் திருத்துக',
        'auto_generated_hint': 'தானாக உருவாக்கப்பட்டது',
        'form_courier_name': 'கூரியர் பெயர்',
        'courier_name_placeholder': 'எ.கா: ஃபெடெக்ஸ், யுபிஎஸ், டிஎச்எல்',
        'form_delivery_fee': 'டெலிவரி கட்டணம் ($)',
        'fee_placeholder': '0.00',
        'form_contact': 'தொடர்பு எண்',
        'contact_placeholder': '+1 234 567 8900',
        'form_address': 'முகவரி',
        'address_placeholder': '123 ஷிப்பிங் லேன், நகரம்',
        'cancel_btn': 'ரத்து செய்',
        'save_btn': 'சேமி',
        'delete_title': 'கூரியரை நீக்குக',
        'delete_confirmation_msg': 'இந்த கூரியரை நீக்க விரும்புகிறீர்களா? இந்த செயலை மீளமுடியாது.',
        'delete_btn': 'நீக்குக',
        'name_required': 'கூரியர் பெயர் தேவை',
        'fee_valid': 'செல்லுபடியாகும் டெலிவரி கட்டணத்தை உள்ளிடவும்',
        'contact_required': 'தொடர்பு எண் தேவை',
        'view': 'பார்க்க',
        'edit': 'திருத்துக',
        'delete': 'நீக்குக',
        'courier_details': 'கூரியர் விவரங்கள்',
        'delete_confirm_title': 'கூரியரை நீக்குக'
        
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