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

        // ==================== ITEMS MODULE ====================
         'items_title': 'Items Management',
        'items_subtitle': 'Manage your Items, organize products, and track performance.',
        'search_placeholder': 'Search items by name or code...',
        'filter_btn': 'Filter',
        'filter_status_label': 'Status',
        'filter_all': 'All',
        'filter_active': 'Active',
        'filter_inactive': 'Inactive',
        'filter_category_label': 'Category',
        'all_categories': 'All Categories',
        'filter_stock_label': 'Stock Level',
        'all_stock': 'All',
        'low_stock': 'Low Stock (< 10)',
        'out_of_stock': 'Out of Stock (0)',
        'in_stock': 'In Stock (> 0)',
        'reset_filters_btn': 'Reset Filters',
        'add_item_btn': 'Add Item',
        'table_header_code': 'Code',
        'table_header_name': 'Name',
        'table_header_price': 'Price',
        'table_header_stock': 'Stock',
        'table_header_status': 'Status',
        'table_header_actions': 'Actions',
        'add_item_title': 'Add Item',
        'edit_item_title': 'Edit Item',
        'form_item_code': 'Item Code',
        'auto_generated_hint': 'Auto-generated',
        'form_item_name': 'Item Name *',
        'form_category': 'Category',
        'select_option': 'Select...',
        'form_wholesale': 'wholesaler',
        'form_size': 'Size',
        'size_placeholder': 'e.g., M, L, XL, One Size',
        'multi_size_hint': 'Click on sizes to select multiple. Click again to remove.',
        'form_colors': 'Colors',
        'colors_placeholder': 'Red, Blue, Green',
        'form_cost_price': 'Cost Price',
        'form_selling_price': 'Selling Price',
        'form_stock_quantity': 'Stock Quantity',
        'form_status': 'Status',
        'active_option': 'Active',
        'inactive_option': 'Inactive',
        'form_item_image': 'Item Image',
        'upload_text': 'Upload',
        'cancel_btn': 'Cancel',
        'save_btn': 'Save Item',
        'view_details_title': 'Item Details',
        'delete_title': 'Delete Item',
        'delete_confirmation_msg': 'Are you sure you want to delete this item? This action cannot be undone.',
        'delete_btn': 'Delete',
        'no_items_found': 'No items found',
        'item_name_required': 'Item name is required',
        'image_upload_error': 'Please upload a valid image file.',
        'stock_movement_history': 'Stock Movement History',
        'no_stock_movements': 'No stock movements recorded',
        'cost_price_label': 'Cost Price',
        'selling_price_label': 'Selling Price',
        'stock_quantity_label': 'Stock Quantity',
        'status_label': 'Status',
        'colors_label': 'Colors',
        'size_label': 'Size',
        'category_id_label': 'Category ID',
        'wholesale_id_label': 'Wholesale ID',
        'item_code_label': 'Item Code',
        'item_name_label': 'Item Name',
        'view': 'View',
        'edit': 'Edit',
        'delete': 'Delete'
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


        // ==================== ITEMS  ====================

         'items_title': 'අයිතම කළමනාකරණය',
        'items_subtitle': 'ඔබගේ අයිතම කළමනාකරණය කරන්න, නිෂ්පාදන සංවිධානය කරන්න, සහ කාර්ය සාධනය නිරීක්ෂණය කරන්න.',
        'search_placeholder': 'නම හෝ කේතය අනුව අයිතම සොයන්න...',
        'filter_btn': 'පෙරහන',
        'filter_status_label': 'තත්වය',
        'filter_all': 'සියල්ල',
        'filter_active': 'සක්‍රිය',
        'filter_inactive': 'අක්‍රිය',
        'filter_category_label': 'ප්‍රවර්ගය',
        'all_categories': 'සියලුම ප්‍රවර්ග',
        'filter_stock_label': 'තොග මට්ටම',
        'all_stock': 'සියල්ල',
        'low_stock': 'අඩු තොගය (< 10)',
        'out_of_stock': 'තොග නැත (0)',
        'in_stock': 'තොග ඇත (> 0)',
        'reset_filters_btn': 'පෙරහන් යළි සකසන්න',
        'add_item_btn': 'අයිතමය එකතු කරන්න',
        'table_header_code': 'කේතය',
        'table_header_name': 'නම',
        'table_header_price': 'මිල',
        'table_header_stock': 'තොගය',
        'table_header_status': 'තත්වය',
        'table_header_actions': 'ක්‍රියා',
        'add_item_title': 'අයිතමය එකතු කරන්න',
        'edit_item_title': 'අයිතමය සංස්කරණය කරන්න',
        'form_item_code': 'අයිතම කේතය',
        'auto_generated_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
        'form_item_name': 'අයිතම නම *',
        'form_category': 'ප්‍රවර්ගය',
        'select_option': 'තෝරන්න...',
        'form_wholesale': 'තොග වෙළෙන්දා',
        'form_size': 'ප්‍රමාණය',
        'size_placeholder': 'උදා: එම්, එල්, එක්ස්එල්, එක් ප්‍රමාණය',
        'multi_size_hint': 'බහුවිධ තේරීම් සඳහා ප්‍රමාණ මත ක්ලික් කරන්න. ඉවත් කිරීමට නැවත ක්ලික් කරන්න.',
        'form_colors': 'වර්ණ',
        'colors_placeholder': 'රතු, නිල්, කොළ',
        'form_cost_price': 'පිරිවැය මිල',
        'form_selling_price': 'විකුණුම් මිල',
        'form_stock_quantity': 'තොග ප්‍රමාණය',
        'form_status': 'තත්වය',
        'active_option': 'සක්‍රිය',
        'inactive_option': 'අක්‍රිය',
        'form_item_image': 'අයිතම පින්තූරය',
        'upload_text': 'උඩුගත කරන්න',
        'cancel_btn': 'අවලංගු කරන්න',
        'save_btn': 'අයිතමය සුරකින්න',
        'view_details_title': 'අයිතම විස්තර',
        'delete_title': 'අයිතමය මකන්න',
        'delete_confirmation_msg': 'ඔබට මෙම අයිතමය මකා දැමීමට අවශ්‍ය බව විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'delete_btn': 'මකන්න',
        'no_items_found': 'අයිතම හමු නොවිණි',
        'item_name_required': 'අයිතම නම අවශ්‍ය වේ',
        'image_upload_error': 'කරුණාකර වලංගු පින්තූර ගොනුවක් උඩුගත කරන්න.',
        'stock_movement_history': 'තොග චලන ඉතිහාසය',
        'no_stock_movements': 'තොග චලන වාර්තා නැත',
        'cost_price_label': 'පිරිවැය මිල',
        'selling_price_label': 'විකුණුම් මිල',
        'stock_quantity_label': 'තොග ප්‍රමාණය',
        'status_label': 'තත්වය',
        'colors_label': 'වර්ණ',
        'size_label': 'ප්‍රමාණය',
        'category_id_label': 'ප්‍රවර්ග හැඳුනුම්පත',
        'wholesale_id_label': 'තොග වෙළෙන්දා හැඳුනුම්පත',
        'item_code_label': 'අයිතම කේතය',
        'item_name_label': 'අයිතම නම',
        'view': 'බලන්න',
        'edit': 'සංස්කරණය',
        'delete': 'මකන්න'
        
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

        // ==================== ITEMS  ====================

        'items_title': 'பொருட்கள் மேலாண்மை',
        'items_subtitle': 'உங்கள் பொருட்களை நிர்வகிக்கவும், தயாரிப்புகளை ஒழுங்கமைக்கவும், செயல்திறனைக் கண்காணிக்கவும்.',
        'search_placeholder': 'பெயர் அல்லது குறியீடு மூலம் பொருட்களைத் தேடுக...',
        'filter_btn': 'வடிகட்டி',
        'filter_status_label': 'நிலை',
        'filter_all': 'அனைத்தும்',
        'filter_active': 'செயலில்',
        'filter_inactive': 'செயலற்ற',
        'filter_category_label': 'வகை',
        'all_categories': 'அனைத்து வகைகளும்',
        'filter_stock_label': 'இருப்பு நிலை',
        'all_stock': 'அனைத்தும்',
        'low_stock': 'குறைந்த இருப்பு (< 10)',
        'out_of_stock': 'இருப்பு இல்லை (0)',
        'in_stock': 'இருப்பு உள்ளது (> 0)',
        'reset_filters_btn': 'வடிப்பான்களை மீட்டமை',
        'add_item_btn': 'பொருளைச் சேர்',
        'table_header_code': 'குறியீடு',
        'table_header_name': 'பெயர்',
        'table_header_price': 'விலை',
        'table_header_stock': 'இருப்பு',
        'table_header_status': 'நிலை',
        'table_header_actions': 'செயல்கள்',
        'add_item_title': 'பொருளைச் சேர்',
        'edit_item_title': 'பொருளைத் திருத்துக',
        'form_item_code': 'பொருள் குறியீடு',
        'auto_generated_hint': 'தானாக உருவாக்கப்பட்டது',
        'form_item_name': 'பொருள் பெயர் *',
        'form_category': 'வகை',
        'select_option': 'தேர்ந்தெடுக்கவும்...',
        'form_wholesale': 'மொத்த விற்பனையாளர்',
        'form_size': 'அளவு',
        'size_placeholder': 'எ.கா: எம், எல், எக்ஸ்எல், ஒரு அளவு',
        'multi_size_hint': 'பலவற்றைத் தேர்ந்தெடுக்க அளவுகளைக் கிளிக் செய்யவும். அகற்ற மீண்டும் கிளிக் செய்யவும்.',
        'form_colors': 'வண்ணங்கள்',
        'colors_placeholder': 'சிவப்பு, நீலம், பச்சை',
        'form_cost_price': 'அடக்க விலை',
        'form_selling_price': 'விற்பனை விலை',
        'form_stock_quantity': 'இருப்பு அளவு',
        'form_status': 'நிலை',
        'active_option': 'செயலில்',
        'inactive_option': 'செயலற்ற',
        'form_item_image': 'பொருள் படம்',
        'upload_text': 'பதிவேற்றுக',
        'cancel_btn': 'ரத்து செய்',
        'save_btn': 'பொருளைச் சேமி',
        'view_details_title': 'பொருள் விவரங்கள்',
        'delete_title': 'பொருளை நீக்குக',
        'delete_confirmation_msg': 'இந்த பொருளை நீக்க விரும்புகிறீர்களா? இந்த செயலை மீளமுடியாது.',
        'delete_btn': 'நீக்குக',
        'no_items_found': 'பொருட்கள் எதுவும் கிடைக்கவில்லை',
        'item_name_required': 'பொருள் பெயர் தேவை',
        'image_upload_error': 'செல்லுபடியாகும் படக் கோப்பைப் பதிவேற்றவும்.',
        'stock_movement_history': 'இருப்பு இயக்க வரலாறு',
        'no_stock_movements': 'இருப்பு இயக்கங்கள் பதிவு செய்யப்படவில்லை',
        'cost_price_label': 'அடக்க விலை',
        'selling_price_label': 'விற்பனை விலை',
        'stock_quantity_label': 'இருப்பு அளவு',
        'status_label': 'நிலை',
        'colors_label': 'வண்ணங்கள்',
        'size_label': 'அளவு',
        'category_id_label': 'வகை ஐடி',
        'wholesale_id_label': 'மொத்த விற்பனையாளர் ஐடி',
        'item_code_label': 'பொருள் குறியீடு',
        'item_name_label': 'பொருள் பெயர்',
        'view': 'பார்க்க',
        'edit': 'திருத்துக',
        'delete': 'நீக்குக'
        
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