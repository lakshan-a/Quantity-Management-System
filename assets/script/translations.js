// ============================================
// File: assets/js/translations.js
// Description: Multi-language support for damages page (English, Sinhala, Tamil)
// ============================================

const translations = {
    en: {
        // Damages Page
        total_damaged_items: "Total damaged items",
        total_records: "Total Records",
        this_month: "This Month",
        last_30_days: "Last 30 Days",
        avg_quantity: "Avg Quantity",
        search_placeholder: "Search by item, reason, or reporter...",
        all_items: "All Items",
        newest_first: "Newest First",
        oldest_first: "Oldest First",
        highest_quantity: "Highest Quantity",
        lowest_quantity: "Lowest Quantity",
        report_damage: "Report Damage",
        item: "Item",
        item_code: "Item Code",
        quantity: "Quantity",
        reason: "Reason",
        reported_by: "Reported by",
        reported_date: "Reported date",
        actions: "Actions",
        no_records_found: "No damaged records found.",
        view: "View",
        edit: "Edit",
        delete: "Delete",
        
        // Modal
        report_damage_title: "Report Damage",
        edit_damage_title: "Edit Damage Report",
        select_item: "Select item",
        item_required: "Please select an item",
        quantity_required: "Please enter a valid quantity",
        reason_required: "Please enter a reason",
        reporter_required: "Please enter reporter name",
        cancel: "Cancel",
        save: "Save",
        update: "Update",
        
        // Delete Modal
        delete_title: "Delete Damage Record",
        delete_confirmation: "Are you sure you want to delete the damage record for",
        delete_warning: "This action cannot be undone.",
        
        // View Modal
        damage_details: "Damage Details",
        damaged_item: "Damaged Item",
        close: "Close"
    },
    si: {
        // Damages Page
        total_damaged_items: "මුළු හානි වූ අයිතම",
        total_records: "මුළු වාර්තා",
        this_month: "මෙම මාසය",
        last_30_days: "පසුගිය දින 30",
        avg_quantity: "සාමාන්‍ය ප්‍රමාණය",
        search_placeholder: "අයිතමය, හේතුව හෝ වාර්තාකරු අනුව සොයන්න...",
        all_items: "සියලුම අයිතම",
        newest_first: "අලුත්ම පළමුව",
        oldest_first: "පැරණිම පළමුව",
        highest_quantity: "ඉහළම ප්‍රමාණය",
        lowest_quantity: "අඩම ප්‍රමාණය",
        report_damage: "හානි වාර්තා කරන්න",
        item: "අයිතමය",
        item_code: "අයිතම කේතය",
        quantity: "ප්‍රමාණය",
        reason: "හේතුව",
        reported_by: "වාර්තා කළේ",
        reported_date: "වාර්තා කළ දිනය",
        actions: "ක්‍රියා",
        no_records_found: "හානි වාර්තා කිසිවක් හමු නොවීය.",
        view: "බලන්න",
        edit: "සංස්කරණය",
        delete: "මකන්න",
        
        // Modal
        report_damage_title: "හානි වාර්තා කරන්න",
        edit_damage_title: "හානි වාර්තාව සංස්කරණය කරන්න",
        select_item: "අයිතමය තෝරන්න",
        item_required: "කරුණාකර අයිතමයක් තෝරන්න",
        quantity_required: "කරුණාකර වලංගු ප්‍රමාණයක් ඇතුළත් කරන්න",
        reason_required: "කරුණාකර හේතුවක් ඇතුළත් කරන්න",
        reporter_required: "කරුණාකර වාර්තාකරුගේ නම ඇතුළත් කරන්න",
        cancel: "අවලංගු කරන්න",
        save: "සුරකින්න",
        update: "යාවත්කාලීන කරන්න",
        
        // Delete Modal
        delete_title: "හානි වාර්තාව මකන්න",
        delete_confirmation: "ඔබට අවශ්‍යයිද මකා දැමීමට",
        delete_warning: "මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.",
        
        // View Modal
        damage_details: "හානි විස්තර",
        damaged_item: "හානි වූ අයිතමය",
        close: "වසන්න"
    },
    ta: {
        // Damages Page
        total_damaged_items: "மொத்த சேதமடைந்த பொருட்கள்",
        total_records: "மொத்த பதிவுகள்",
        this_month: "இந்த மாதம்",
        last_30_days: "கடந்த 30 நாட்கள்",
        avg_quantity: "சராசரி அளவு",
        search_placeholder: "பொருள், காரணம் அல்லது பதிவாளர் மூலம் தேடுக...",
        all_items: "அனைத்து பொருட்களும்",
        newest_first: "புதியவை முதலில்",
        oldest_first: "பழையவை முதலில்",
        highest_quantity: "அதிக அளவு",
        lowest_quantity: "குறைந்த அளவு",
        report_damage: "சேதத்தை பதிவு செய்யுங்கள்",
        item: "பொருள்",
        item_code: "பொருள் குறியீடு",
        quantity: "அளவு",
        reason: "காரணம்",
        reported_by: "பதிவு செய்தவர்",
        reported_date: "பதிவு செய்த தேதி",
        actions: "செயல்கள்",
        no_records_found: "சேதமடைந்த பதிவுகள் எதுவும் காணப்படவில்லை.",
        view: "பார்க்க",
        edit: "திருத்த",
        delete: "நீக்க",
        
        // Modal
        report_damage_title: "சேதத்தை பதிவு செய்யுங்கள்",
        edit_damage_title: "சேத பதிவை திருத்தவும்",
        select_item: "பொருளை தேர்ந்தெடுக்கவும்",
        item_required: "தயவுசெய்து ஒரு பொருளை தேர்ந்தெடுக்கவும்",
        quantity_required: "தயவுசெய்து சரியான அளவை உள்ளிடவும்",
        reason_required: "தயவுசெய்து ஒரு காரணத்தை உள்ளிடவும்",
        reporter_required: "தயவுசெய்து பதிவாளரின் பெயரை உள்ளிடவும்",
        cancel: "ரத்து செய்",
        save: "சேமி",
        update: "புதுப்பி",
        
        // Delete Modal
        delete_title: "சேத பதிவை நீக்கவும்",
        delete_confirmation: "இந்த சேத பதிவை நீக்க உறுதியா",
        delete_warning: "இந்த செயலை மீளமுடியாது.",
        
        // View Modal
        damage_details: "சேத விவரங்கள்",
        damaged_item: "சேதமடைந்த பொருள்",
        close: "மூடு"
    }
};

// Current language (default to English)
let currentLanguage = 'en';

// Function to apply translations to the page
function applyTranslations() {
    // Translate elements with data-i18n attribute
    const elements = document.querySelectorAll('[data-i18n]');
    elements.forEach(element => {
        const key = element.getAttribute('data-i18n');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            element.textContent = translations[currentLanguage][key];
        }
    });
    
    // Translate elements with data-i18n-placeholder attribute
    const placeholderElements = document.querySelectorAll('[data-i18n-placeholder]');
    placeholderElements.forEach(element => {
        const key = element.getAttribute('data-i18n-placeholder');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            element.placeholder = translations[currentLanguage][key];
        }
    });
    
    // Translate select options
    const filterSelect = document.getElementById('filterItemSelect');
    if (filterSelect && filterSelect.options[0]) {
        const key = filterSelect.options[0].getAttribute('data-i18n');
        if (key && translations[currentLanguage] && translations[currentLanguage][key]) {
            filterSelect.options[0].textContent = translations[currentLanguage][key];
        }
    }
    
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        for (let i = 0; i < sortSelect.options.length; i++) {
            const key = sortSelect.options[i].getAttribute('data-i18n');
            if (key && translations[currentLanguage] && translations[currentLanguage][key]) {
                sortSelect.options[i].textContent = translations[currentLanguage][key];
            }
        }
    }
    
    // Update modal title and buttons
    const modalTitle = document.getElementById('modalTitle');
    if (modalTitle && modalTitle.getAttribute('data-i18n')) {
        const key = modalTitle.getAttribute('data-i18n');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            modalTitle.textContent = translations[currentLanguage][key];
        }
    }
    
    // Update button texts that might have been changed
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    if (modalSaveBtn && modalSaveBtn.getAttribute('data-i18n')) {
        const key = modalSaveBtn.getAttribute('data-i18n');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            modalSaveBtn.innerHTML = translations[currentLanguage][key];
        }
    }
    
    const modalCancelBtn = document.getElementById('modalCancelBtn');
    if (modalCancelBtn && modalCancelBtn.getAttribute('data-i18n')) {
        const key = modalCancelBtn.getAttribute('data-i18n');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            modalCancelBtn.textContent = translations[currentLanguage][key];
        }
    }
    
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    if (confirmDeleteBtn && confirmDeleteBtn.getAttribute('data-i18n')) {
        const key = confirmDeleteBtn.getAttribute('data-i18n');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            confirmDeleteBtn.textContent = translations[currentLanguage][key];
        }
    }
    
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    if (cancelDeleteBtn && cancelDeleteBtn.getAttribute('data-i18n')) {
        const key = cancelDeleteBtn.getAttribute('data-i18n');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            cancelDeleteBtn.textContent = translations[currentLanguage][key];
        }
    }
    
    const closeViewFooterBtn = document.getElementById('closeViewFooterBtn');
    if (closeViewFooterBtn && closeViewFooterBtn.getAttribute('data-i18n')) {
        const key = closeViewFooterBtn.getAttribute('data-i18n');
        if (translations[currentLanguage] && translations[currentLanguage][key]) {
            closeViewFooterBtn.textContent = translations[currentLanguage][key];
        }
    }
}

// Function to change language
function setLanguage(lang) {
    if (translations[lang]) {
        currentLanguage = lang;
        localStorage.setItem('preferred_language', lang);
        applyTranslations();
        
        // Update language selector if it exists
        const languageSelector = document.getElementById('languageSelector');
        if (languageSelector) {
            languageSelector.value = lang;
        }
        
        // Dispatch event for other components
        if (typeof window.dispatchEvent === 'function') {
            window.dispatchEvent(new CustomEvent('languageChanged', { detail: { language: lang } }));
        }
    }
}

// Function to get current language
function getCurrentLanguage() {
    return currentLanguage;
}

// Function to translate a specific key
function translate(key, params = {}) {
    let text = translations[currentLanguage] && translations[currentLanguage][key] 
        ? translations[currentLanguage][key] 
        : (translations['en'][key] || key);
    
    // Replace parameters if provided
    Object.keys(params).forEach(param => {
        text = text.replace(new RegExp(`{{${param}}}`, 'g'), params[param]);
    });
    
    return text;
}

// Initialize translations on page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        // Check for saved language preference
        const savedLanguage = localStorage.getItem('preferred_language');
        if (savedLanguage && translations[savedLanguage]) {
            currentLanguage = savedLanguage;
        }
        
        applyTranslations();
        
        // Set language selector value
        const languageSelector = document.getElementById('languageSelector');
        if (languageSelector) {
            languageSelector.value = currentLanguage;
        }
    });
} else {
    // Check for saved language preference
    const savedLanguage = localStorage.getItem('preferred_language');
    if (savedLanguage && translations[savedLanguage]) {
        currentLanguage = savedLanguage;
    }
    
    applyTranslations();
    
    // Set language selector value
    const languageSelector = document.getElementById('languageSelector');
    if (languageSelector) {
        languageSelector.value = currentLanguage;
    }
}

// Make functions available globally
window.translations = translations;
window.setLanguage = setLanguage;
window.getCurrentLanguage = getCurrentLanguage;
window.translate = translate;