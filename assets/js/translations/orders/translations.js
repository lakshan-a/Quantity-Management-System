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

        // ==================== ORDERS  ====================

        orders_title: "Orders Management",
      orders_subtitle: "Manage your Orders, organize deliveries, and track performance.",
      search_placeholder: "Search by order or customer...",
      all_status: "All Status",
      status_pending: "Pending",
      status_processing: "Processing",
      status_shipped: "Shipped",
      status_delivered: "Delivered",
      status_returned: "Returned",
      new_order_btn: "New Order",
      col_order_number: "Order Number",
      col_customer: "Customer",
      col_total: "Total",
      col_payment: "Payment",
      col_status: "Status",
      col_date: "Date",
      col_actions: "Actions",
      create_order_title: "Create New Order",
      label_customer: "Customer",
      select_customer_placeholder: "Click to select or add customer",
      label_courier: "Courier",
      select_courier: "Select courier",
      form_business_name: "Business Name",
      business_helper: "Start typing to search and select a business",
      search_business_placeholder: "Search business name...",
      no_business_found:"No businesses found",
      label_order_items: "Order Items",
      add_item_btn: "Add Item",
      select_product: "Select product",
      items_helper: "Add items, quantity and price will be calculated automatically.",
      label_payment_method: "Payment Method",
      payment_cod: "Cash on Delivery (COD)",
      payment_bank: "Bank Transfer",
      label_payment_status: "Payment Status",
      payment_status_pending: "Pending",
      payment_status_paid: "Paid",
      label_delivery_type: "Delivery Type",
      delivery_paid: "Paid Delivery",
      delivery_free: "Free Delivery",
      label_tracking_number: "Tracking Number",
      label_discount: "Discount ($)",
      label_notes: "Notes (Optional)",
      notes_placeholder: "Additional order information...",
      summary_subtotal: "Subtotal:",
      summary_delivery: "Delivery fee:",
      summary_discount: "Discount:",
      summary_total: "Total:",
      cancel_btn: "Cancel",
      create_order_btn: "Create Order",
      select_customer_title: "Select Customer",
      search_customers: "Search customers...",
      add_new_customer: "Add New Customer",
      add_customer_title: "Add New Customer",
      form_customer_id: "Customer ID",
      auto_generated_hint: "Auto-generated",
      form_full_name: "Full Name *",
      form_phone: "Phone *",
      form_email: "Email",
      form_address: "Address",
      form_city: "City",
      form_district: "District",
      form_postal_code: "Postal Code",
      form_notes: "Notes",
      save_btn: "Save Customer",
      order_details_title: "Order",
      delete_order_title: "Delete Order",
      delete_confirmation_msg: "Are you sure you want to delete this order? This action cannot be undone.",
      delete_btn: "Delete",
      customer_label: "Customer",
      courier_label: "Courier",
      payment_method_label: "Payment Method",
      payment_status_label: "Payment Status",
      delivery_type_label: "Delivery Type",
      tracking_label: "Tracking Number",
      notes_label: "Notes",
      items_label: "Order Items",
      delivery_fee_label: "Delivery Fee",
      discount_label: "Discount",
      total_label: "Total",
      mark_as_processing: "Mark as Processing",
      mark_as_shipped: "Mark as Shipped",
      mark_as_delivered: "Mark as Delivered",
      print_invoice: "Print Invoice",
      no_orders_found: "No orders found",
      no_customers_found: "No customers found. Click 'Add New Customer' to create one.",
      order_created_success: "Order created successfully!",
      please_select_customer: "Please select a customer by clicking the customer field",
      please_select_courier: "Please select a courier",
      please_add_items: "Please add at least one item with valid quantity",
      customer_name_required: "Please enter customer full name",
      customer_phone_required: "Please enter customer phone number",
      
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


        // ==================== ORDERS  ====================

        'orders_title': 'ඇණවුම් කළමනාකරණය',
        'orders_subtitle': 'ඔබගේ ඇණවුම් කළමනාකරණය කරන්න, බෙදාහැරීම් සංවිධානය කරන්න, සහ කාර්ය සාධනය නිරීක්ෂණය කරන්න.',
        'search_placeholder': 'ඇණවුම හෝ පාරිභෝගික අනුව සොයන්න...',
        'all_status': 'සියලුම තත්වයන්',
        'status_pending': 'විසඳුම් නොකළ',
        'status_processing': 'සැකසෙමින්',
        'status_shipped': 'නැව්ගත කරන ලදී',
        'status_delivered': 'භාරදෙන ලදී',
        'status_returned': 'ආපසු ලබාදෙන ලදී',
        'new_order_btn': 'නව ඇණවුම',
        'col_order_number': 'ඇණවුම් අංකය',
        'col_customer': 'පාරිභෝගික',
        'col_total': 'එකතුව',
        'col_payment': 'ගෙවීම',
        'col_status': 'තත්වය',
        'col_date': 'දිනය',
        'col_actions': 'ක්‍රියා',
        'create_order_title': 'නව ඇණවුමක් සාදන්න',
        'label_customer': 'පාරිභෝගික',
        'select_customer_placeholder': 'තෝරාගැනීමට හෝ එකතු කිරීමට ක්ලික් කරන්න',
        'label_courier': 'කුරියර්',
        'select_courier': 'කුරියර් තෝරන්න',
        'form_business_name': 'ව්‍යාපාරයේ නම',
        'business_helper': 'ව්‍යාපාරයක් සෙවීමට සහ තෝරා ගැනීමට ටයිප් කිරීම ආරම්භ කරන්න',
        'search_business_placeholder': 'ව්‍යාපාරයේ නම සොයන්න...',
        'no_business_found':'ව්‍යාපාර කිසිවක් හමු නොවීය',
        'label_order_items': 'ඇණවුම් අයිතම',
        'add_item_btn': 'අයිතමය එකතු කරන්න',
        'select_product': 'නිෂ්පාදනය තෝරන්න',
        'items_helper': 'අයිතම එකතු කරන්න, ප්‍රමාණය සහ මිල ස්වයංක්‍රීයව ගණනය කෙරේ.',
        'label_payment_method': 'ගෙවීමේ ක්‍රමය',
        'payment_cod': 'භාරදීමේදී මුදල් (COD)',
        'payment_bank': 'බැංකු හුවමාරුව',
        'label_payment_status': 'ගෙවීමේ තත්වය',
        'payment_status_pending': 'විසඳුම් නොකළ',
        'payment_status_paid': 'ගෙවන ලදී',
        'label_delivery_type': 'බෙදාහැරීමේ වර්ගය',
        'delivery_paid': 'ගෙවන ලද බෙදාහැරීම',
        'delivery_free': 'නොමිලේ බෙදාහැරීම',
        'label_tracking_number': 'ලුහුබැඳීමේ අංකය',
        'label_discount': 'වට්ටම ($)',
        'label_notes': 'සටහන් (විකල්ප)',
        'notes_placeholder': 'අමතර ඇණවුම් තොරතුරු...',
        'summary_subtotal': 'උප එකතුව:',
        'summary_delivery': 'බෙදාහැරීමේ ගාස්තුව:',
        'summary_discount': 'වට්ටම:',
        'summary_total': 'එකතුව:',
        'cancel_btn': 'අවලංගු කරන්න',
        'create_order_btn': 'ඇණවුම සාදන්න',
        'select_customer_title': 'පාරිභෝගික තෝරන්න',
        'search_customers': 'පාරිභෝගිකයන් සොයන්න...',
        'add_new_customer': 'නව පාරිභෝගික එකතු කරන්න',
        'add_customer_title': 'නව පාරිභෝගික එකතු කරන්න',
        'form_customer_id': 'පාරිභෝගික හැඳුනුම්පත',
        'auto_generated_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
        'form_full_name': 'සම්පූර්ණ නම *',
        'form_phone': 'දුරකථන අංකය *',
        'form_email': 'විද්‍යුත් තැපෑල',
        'form_address': 'ලිපිනය',
        'form_city': 'නගරය',
        'form_district': 'දිස්ත්‍රික්කය',
        'form_postal_code': 'තැපැල් කේතය',
        'form_notes': 'සටහන්',
        'save_btn': 'පාරිභෝගික සුරකින්න',
        'order_details_title': 'ඇණවුම',
        'delete_order_title': 'ඇණවුම මකන්න',
        'delete_confirmation_msg': 'ඔබට මෙම ඇණවුම මකා දැමීමට අවශ්‍ය බව විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'delete_btn': 'මකන්න',
        'customer_label': 'පාරිභෝගික',
        'courier_label': 'කුරියර්',
        'payment_method_label': 'ගෙවීමේ ක්‍රමය',
        'payment_status_label': 'ගෙවීමේ තත්වය',
        'delivery_type_label': 'බෙදාහැරීමේ වර්ගය',
        'tracking_label': 'ලුහුබැඳීමේ අංකය',
        'notes_label': 'සටහන්',
        'items_label': 'ඇණවුම් අයිතම',
        'delivery_fee_label': 'බෙදාහැරීමේ ගාස්තුව',
        'discount_label': 'වට්ටම',
        'total_label': 'එකතුව',
        'mark_as_processing': 'සැකසෙමින් ලෙස සලකුණු කරන්න',
        'mark_as_shipped': 'නැව්ගත කරන ලදී ලෙස සලකුණු කරන්න',
        'mark_as_delivered': 'භාරදෙන ලදී ලෙස සලකුණු කරන්න',
        'print_invoice': 'ඉන්වොයිස් මුද්‍රණය කරන්න',
        'no_orders_found': 'ඇණවුම් හමු නොවිණි',
        'no_customers_found': 'පාරිභෝගිකයන් හමු නොවිණි. නව එකක් සෑදීමට \'නව පාරිභෝගික එකතු කරන්න\' ක්ලික් කරන්න.',
        'order_created_success': 'ඇණවුම සාර්ථකව සාදන ලදී!',
        'please_select_customer': 'කරුණාකර පාරිභෝගික ක්ෂේත්‍රය ක්ලික් කිරීමෙන් පාරිභෝගිකයෙකු තෝරන්න',
        'please_select_courier': 'කරුණාකර කුරියර් තෝරන්න',
        'please_add_items': 'කරුණාකර අවම වශයෙන් එක් අයිතමයක් වලංගු ප්‍රමාණයක් සමඟ එකතු කරන්න',
        'customer_name_required': 'කරුණාකර පාරිභෝගිකයාගේ සම්පූර්ණ නම ඇතුළත් කරන්න',
        'customer_phone_required': 'කරුණාකර පාරිභෝගිකයාගේ දුරකථන අංකය ඇතුළත් කරන්න',
        
        
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

        // ==================== ORDERS  ====================

        'orders_title': 'ஆர்டர்கள் மேலாண்மை',
        'orders_subtitle': 'உங்கள் ஆர்டர்களை நிர்வகிக்கவும், டெலிவரிகளை ஒழுங்கமைக்கவும், செயல்திறனைக் கண்காணிக்கவும்.',
        'search_placeholder': 'ஆர்டர் அல்லது வாடிக்கையாளர் மூலம் தேடுக...',
        'all_status': 'அனைத்து நிலைகளும்',
        'status_pending': 'நிலுவையில்',
        'status_processing': 'செயலாக்கத்தில்',
        'status_shipped': 'அனுப்பப்பட்டது',
        'status_delivered': 'வழங்கப்பட்டது',
        'status_returned': 'திருப்பித் தரப்பட்டது',
        'new_order_btn': 'புதிய ஆர்டர்',
        'col_order_number': 'ஆர்டர் எண்',
        'col_customer': 'வாடிக்கையாளர்',
        'col_total': 'மொத்தம்',
        'col_payment': 'கட்டணம்',
        'col_status': 'நிலை',
        'col_date': 'தேதி',
        'col_actions': 'செயல்கள்',
        'create_order_title': 'புதிய ஆர்டரை உருவாக்கு',
        'label_customer': 'வாடிக்கையாளர்',
        'select_customer_placeholder': 'தேர்ந்தெடுக்க அல்லது சேர்க்க கிளிக் செய்யவும்',
        'label_courier': 'கூரியர்',
        'select_courier': 'கூரியரைத் தேர்ந்தெடுக்கவும்',
        'form_business_name': 'வணிக பெயர்',
        'business_helper': 'ஒரு வணிகத்தைத் தேட மற்றும் தேர்ந்தெடுக்க தட்டச்சு செய்யத் தொடங்குங்கள்',
        'search_business_placeholder': 'வணிக பெயரைத் தேடுங்கள்...',
        'no_business_found':'வணிகங்கள் எதுவும் கிடைக்கவில்லை',
        'label_order_items': 'ஆர்டர் பொருட்கள்',
        'add_item_btn': 'பொருளைச் சேர்',
        'select_product': 'தயாரிப்பைத் தேர்ந்தெடுக்கவும்',
        'items_helper': 'பொருட்களைச் சேர்க்கவும், அளவு மற்றும் விலை தானாகவே கணக்கிடப்படும்.',
        'label_payment_method': 'கட்டண முறை',
        'payment_cod': 'டெலிவரியில் பணம் (COD)',
        'payment_bank': 'வங்கி பரிமாற்றம்',
        'label_payment_status': 'கட்டண நிலை',
        'payment_status_pending': 'நிலுவையில்',
        'payment_status_paid': 'செலுத்தப்பட்டது',
        'label_delivery_type': 'டெலிவரி வகை',
        'delivery_paid': 'கட்டண டெலிவரி',
        'delivery_free': 'இலவச டெலிவரி',
        'label_tracking_number': 'டிராக்கிங் எண்',
        'label_discount': 'தள்ளுபடி ($)',
        'label_notes': 'குறிப்புகள் (விருப்பத்தேர்வு)',
        'notes_placeholder': 'கூடுதல் ஆர்டர் தகவல்...',
        'summary_subtotal': 'இடைத்தொகை:',
        'summary_delivery': 'டெலிவரி கட்டணம்:',
        'summary_discount': 'தள்ளுபடி:',
        'summary_total': 'மொத்தம்:',
        'cancel_btn': 'ரத்து செய்',
        'create_order_btn': 'ஆர்டரை உருவாக்கு',
        'select_customer_title': 'வாடிக்கையாளரைத் தேர்ந்தெடுக்கவும்',
        'search_customers': 'வாடிக்கையாளர்களைத் தேடுக...',
        'add_new_customer': 'புதிய வாடிக்கையாளரைச் சேர்',
        'add_customer_title': 'புதிய வாடிக்கையாளரைச் சேர்',
        'form_customer_id': 'வாடிக்கையாளர் ஐடி',
        'auto_generated_hint': 'தானாக உருவாக்கப்பட்டது',
        'form_full_name': 'முழு பெயர் *',
        'form_phone': 'தொலைபேசி எண் *',
        'form_email': 'மின்னஞ்சல்',
        'form_address': 'முகவரி',
        'form_city': 'நகரம்',
        'form_district': 'மாவட்டம்',
        'form_postal_code': 'அஞ்சல் குறியீடு',
        'form_notes': 'குறிப்புகள்',
        'save_btn': 'வாடிக்கையாளரைச் சேமி',
        'order_details_title': 'ஆர்டர்',
        'delete_order_title': 'ஆர்டரை நீக்குக',
        'delete_confirmation_msg': 'இந்த ஆர்டரை நீக்க விரும்புகிறீர்களா? இந்த செயலை மீளமுடியாது.',
        'delete_btn': 'நீக்குக',
        'customer_label': 'வாடிக்கையாளர்',
        'courier_label': 'கூரியர்',
        'payment_method_label': 'கட்டண முறை',
        'payment_status_label': 'கட்டண நிலை',
        'delivery_type_label': 'டெலிவரி வகை',
        'tracking_label': 'டிராக்கிங் எண்',
        'notes_label': 'குறிப்புகள்',
        'items_label': 'ஆர்டர் பொருட்கள்',
        'delivery_fee_label': 'டெலிவரி கட்டணம்',
        'discount_label': 'தள்ளுபடி',
        'total_label': 'மொத்தம்',
        'mark_as_processing': 'செயலாக்கத்தில் எனக் குறிக்க',
        'mark_as_shipped': 'அனுப்பப்பட்டது எனக் குறிக்க',
        'mark_as_delivered': 'வழங்கப்பட்டது எனக் குறிக்க',
        'print_invoice': 'இன்வாய்ஸை அச்சிடுக',
        'no_orders_found': 'ஆர்டர்கள் எதுவும் கிடைக்கவில்லை',
        'no_customers_found': 'வாடிக்கையாளர்கள் எதுவும் கிடைக்கவில்லை. புதியதை உருவாக்க \'புதிய வாடிக்கையாளரைச் சேர்\' என்பதைக் கிளிக் செய்யவும்.',
        'order_created_success': 'ஆர்டர் வெற்றிகரமாக உருவாக்கப்பட்டது!',
        'please_select_customer': 'தயவுசெய்து வாடிக்கையாளர் புலத்தைக் கிளிக் செய்வதன் மூலம் வாடிக்கையாளரைத் தேர்ந்தெடுக்கவும்',
        'please_select_courier': 'தயவுசெய்து கூரியரைத் தேர்ந்தெடுக்கவும்',
        'please_add_items': 'தயவுசெய்து குறைந்தது ஒரு பொருளைச் செல்லுபடியாகும் அளவுடன் சேர்க்கவும்',
        'customer_name_required': 'தயவுசெய்து வாடிக்கையாளரின் முழுப் பெயரை உள்ளிடவும்',
        'customer_phone_required': 'தயவுசெய்து வாடிக்கையாளரின் தொலைபேசி எண்ணை உள்ளிடவும்',
        
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