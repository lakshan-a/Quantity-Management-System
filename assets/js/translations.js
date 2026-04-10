// ============================================
// File: assets/js/translations.js
// Description: Centralized translations for the entire application
// Languages: English (en), Sinhala (si), Tamil (ta)
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
        
        // ==================== DASHBOARD ====================
        'dashboard.welcome': 'Welcome back',
        'dashboard.total_orders': 'Total Orders',
        'dashboard.revenue': 'Revenue',
        'dashboard.customers': 'Customers',
        'dashboard.low_stock': 'Low Stock Items',
        'dashboard.recent_orders': 'Recent Orders',
        'dashboard.view_all': 'View All',
        'dashboard.order_number': 'Order #',
        'dashboard.customer': 'Customer',
        'dashboard.date': 'Date',
        'dashboard.total': 'Total',
        
        // ==================== CUSTOMERS MODULE ====================
        'customers_title': 'Customers',
        'customers_subtitle': 'Manage your customer base, view orders, and track engagement',
        'export_btn': 'Export',
        'add_customer_btn': 'Add Customer',
        'total_customers_label': 'Total Customers',
        'active_customers_label': 'Active Customers',
        'total_orders_label': 'Total Orders',
        'lifetime_value_label': 'Lifetime Value',
        'all_districts_option': 'All Districts',
        'all_status_option': 'All Status',
        'reset_btn': 'Reset',
        'table_header_id': 'ID',
        'table_header_name': 'Name',
        'table_header_email': 'Email',
        'table_header_phone': 'Phone',
        'table_header_city': 'City',
        'table_header_actions': 'Actions',
        'add_customer_title': 'Add Customer',
        'edit_customer_title': 'Edit Customer',
        'view_details_title': 'Customer Details',
        'form_customer_id': 'Customer ID',
        'form_customer_id_hint': 'Auto-generated',
        'form_full_name': 'Full Name *',
        'form_phone': 'Phone *',
        'form_email': 'Email',
        'form_city': 'City',
        'form_district': 'District',
        'form_postal_code': 'Postal Code',
        'form_address': 'Address',
        'form_notes': 'Notes',
        'cancel_btn': 'Cancel',
        'save_btn': 'Save Customer',
        'delete_title': 'Delete Customer',
        'delete_confirmation_msg': 'Are you sure you want to delete this customer? This action cannot be undone.',
        'delete_btn': 'Delete',
        'no_customers_found': 'No customers found',
        'alert_fill_name_phone': 'Please fill in Name and Phone',
        'export_alert': 'Export functionality will be implemented here',
        
        // ==================== ITEMS MODULE ====================
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
            'form_wholesale': 'Wholesale',
            'form_size': 'Size',
            'size_placeholder': 'e.g., M, L, XL, One Size',
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
            'alert_name_required': 'Item name is required',
            'alert_image_invalid': 'Please upload a valid image file.',
            'stock_movement_title': 'Stock Movement History',
            'cost_price_label': 'Cost Price',
            'selling_price_label': 'Selling Price',
            'stock_quantity_label': 'Stock Quantity',
            'colors_label': 'Colors',
            'size_label': 'Size',
            'category_id_label': 'Category ID',
            'wholesale_id_label': 'Wholesale ID',
        
        // ==================== ORDERS MODULE ====================
        'orders.title': 'Orders',
        'orders.new_order': 'New Order',
        'orders.order_number': 'Order Number',
        'orders.customer': 'Customer',
        'orders.order_date': 'Order Date',
        'orders.items': 'Items',
        'orders.subtotal': 'Subtotal',
        'orders.delivery_fee': 'Delivery Fee',
        'orders.discount': 'Discount',
        'orders.total_amount': 'Total Amount',
        'orders.payment_status': 'Payment Status',
        'orders.order_status': 'Order Status',
        'orders.payment_method': 'Payment Method',
        'orders.courier': 'Courier',
        'orders.tracking_number': 'Tracking Number',
        'orders.notes': 'Order Notes',
        
        // ==================== PAYMENTS MODULE ====================
        'payments.title': 'Payments',
        'payments.payment_id': 'Payment ID',
        'payments.amount': 'Amount',
        'payments.method': 'Payment Method',
        'payments.date': 'Payment Date',
        'payments.verified': 'Verified',
        'payments.total_collected': 'Total Collected',
        'payments.pending_verification': 'Pending Verification',
        'payments.this_month': 'This Month',
        
        // ==================== RETURNS MODULE ====================
        'returns.title': 'Returns & Refunds',
        'returns.return_id': 'Return ID',
        'returns.reason': 'Reason',
        'returns.return_status': 'Return Status',
        'returns.refund_status': 'Refund Status',
        'returns.requested': 'Requested',
        'returns.approved': 'Approved',
        'returns.rejected': 'Rejected',
        'returns.refund_pending': 'Refund Pending',
        'returns.refund_completed': 'Refund Completed',
        
        // ==================== DAMAGES MODULE ====================
        'damages.title': 'Damaged Items',
        'damages.report_damage': 'Report Damage',
        'damages.quantity': 'Quantity',
        'damages.reason': 'Reason for Damage',
        'damages.reported_by': 'Reported By',
        'damages.reported_date': 'Reported Date',
        
        // ==================== USERS MODULE ====================
        'users.title': 'User Management',
        'users.add_user': 'Add User',
        'users.name': 'Full Name',
        'users.email': 'Email',
        'users.role': 'Role',
        'users.admin': 'Admin',
        'users.staff': 'Staff',
        'users.password': 'Password',
        'users.confirm_password': 'Confirm Password',
        
        // ==================== BUSINESSES MODULE ====================
        'search_placeholder': 'Search by name or owner...',
            'all_status': 'All Status',
            'active_option': 'Active',
            'expired_option': 'Expired',
            'suspended_option': 'Suspended',
            'add_business_btn': 'Add Business',
            'table_header_id': 'Business ID',
            'table_header_business': 'Business',
            'table_header_email': 'Email',
            'table_header_phone': 'Phone',
            'table_header_status': 'Status',
            'table_header_expires': 'Expires',
            'table_header_actions': 'Actions',
            'add_business_title': 'Add Business',
            'edit_business_title': 'Edit Business',
            'form_business_name': 'Business Name *',
            'business_name_placeholder': 'Tech Store Pro',
            'form_owner_name': 'Owner Name *',
            'owner_name_placeholder': 'John Smith',
            'form_email': 'Email *',
            'email_placeholder': 'contact@business.com',
            'form_phone': 'Phone *',
            'phone_placeholder': '+1 234 567 8900',
            'form_address': 'Address',
            'address_placeholder': '123 Business Street, City',
            'form_subscription_status': 'Subscription Status',
            'form_subscription_start': 'Subscription Start',
            'form_subscription_end': 'Subscription End',
            'cancel_btn': 'Cancel',
            'save_business_btn': 'Save Business',
            'business_details_title': 'Business Details',
            'owner_label': 'Owner',
            'id_prefix': 'ID',
            'email_label': 'Email',
            'phone_label': 'Phone',
            'address_label': 'Address',
            'subscription_start_label': 'Subscription Start',
            'subscription_end_label': 'Subscription End',
            'status_label': 'Status',
            'quick_actions_label': 'Quick Actions',
            'close_btn': 'Close',
            'delete_business_title': 'Delete Business',
            'delete_confirmation_msg': 'Are you sure you want to delete ',
            'delete_btn': 'Delete',
            'no_businesses_found': 'No businesses found',
            'activate_btn': 'Activate',
            'suspend_btn': 'Suspend',
            'delete_btn_action': 'Delete',
            'alert_fill_required': 'Please fill required fields: Name, Owner, Email, Phone',
            'alert_invalid_dates': 'Invalid dates',
        
        // ==================== CATEGORIES MODULE ====================
         'search_placeholder': 'Search categories...',
        'add_category_btn': 'Add Category',
        'table_header_id': 'Category ID',
        'table_header_name': 'Category Name',
        'table_header_created': 'Created',
        'table_header_actions': 'Actions',
        'add_category_title': 'Add Category',
        'edit_category_title': 'Edit Category',
        'form_category_id': 'Category ID',
        'form_category_id_hint': 'Auto-generated',
        'form_category_name': 'Category Name',
        'category_name_placeholder': 'e.g., Electronics, Clothing ...',
        'cancel_btn': 'Cancel',
        'save_btn': 'Save',
        'delete_title': 'Delete Category',
        'delete_confirmation_msg': 'Are you sure you want to delete this category? This action cannot be undone.',
        'delete_btn': 'Delete',
        'no_categories_found': 'No categories found',
        'alert_name_required': 'Category name is required',
        
        // ==================== WHOLESALERS MODULE ====================
        'search_placeholder': 'Search wholesales...',
            'add_wholesale_btn': 'Add Wholesale',
            'table_header_id': 'Wholesale ID',
            'table_header_name': 'Name',
            'table_header_email': 'Email',
            'table_header_phone': 'Phone',
            'table_header_address': 'Address',
            'table_header_actions': 'Actions',
            'add_wholesale_title': 'Add Wholesale',
            'edit_wholesale_title': 'Edit Wholesale',
            'form_wholesale_id': 'Wholesale ID',
            'auto_generated_hint': 'Auto-generated',
            'form_wholesale_name': 'Wholesale Name *',
            'form_phone': 'Phone',
            'form_email': 'Email',
            'form_address': 'Address',
            'form_category': 'Category',
            'select_option': 'Select...',
            'cancel_btn': 'Cancel',
            'save_btn': 'Save',
            'view_details_title': 'Wholesale Details',
            'delete_title': 'Delete Wholesale',
            'delete_confirmation_msg': 'Are you sure you want to delete this wholesale? This action cannot be undone.',
            'delete_btn': 'Delete',
            'no_wholesales_found': 'No wholesales found',
            'alert_name_required': 'Wholesale Name is required',
            'wholesale_id_label': 'Wholesale ID',
            'name_label': 'Name',
            'phone_label': 'Phone',
            'email_label': 'Email',
            'address_label': 'Address',
            'category_label': 'Category',
        
        // ==================== COURIERS MODULE ====================
        'couriers.title': 'Courier Services',
        'couriers.add_courier': 'Add Courier',
        'couriers.name': 'Courier Name',
        'couriers.contact': 'Contact Number',
        'couriers.pricing_type': 'Pricing Type',
        'couriers.flat_rate': 'Flat Rate',
        'couriers.weight_based': 'Weight Based',
        'couriers.price': 'Price',
        
        // ==================== MODALS ====================
        'modal.add_title': 'Add New',
        'modal.edit_title': 'Edit',
        'modal.close': 'Close',
        
        // ==================== FOOTER ====================
        'footer.copyright': '© 2024 Qty Management. All rights reserved.',
        'footer.terms': 'Terms of Service',
        'footer.privacy': 'Privacy Policy'
    },
    
    // ==================== SINHALA TRANSLATIONS ====================
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
        
        // Dashboard
        'dashboard.welcome': 'ආපසු සාදරයෙන් පිළිගනිමු',
        'dashboard.total_orders': 'සම්පූර්ණ ඇණවුම්',
        'dashboard.revenue': 'ආදායම',
        'dashboard.customers': 'පාරිභෝගිකයින්',
        'dashboard.low_stock': 'අඩු තොග අයිතම',
        'dashboard.recent_orders': 'මෑත ඇණවුම්',
        'dashboard.view_all': 'සියල්ල බලන්න',
        'dashboard.order_number': 'ඇණවුම් අංකය',
        'dashboard.customer': 'පාරිභෝගිකයා',
        'dashboard.date': 'දිනය',
        'dashboard.total': 'එකතුව',
        
        // Customers Module
        'customers_title': 'පාරිභෝගිකයින්',
        'customers_subtitle': 'ඔබගේ පාරිභෝගික පදනම කළමනාකරණය කරන්න, ඇණවුම් බලන්න, සහ නියැලීම් ලුහුබඳින්න',
        'export_btn': 'අපනයනය',
        'add_customer_btn': 'පාරිභෝගිකයෙකු එක් කරන්න',
        'total_customers_label': 'සම්පූර්ණ පාරිභෝගිකයින්',
        'active_customers_label': 'ක්‍රියාකාරී පාරිභෝගිකයින්',
        'total_orders_label': 'සම්පූර්ණ ඇණවුම්',
        'lifetime_value_label': 'ජීවිත කාලීන වටිනාකම',
        'all_districts_option': 'සියලුම දිස්ත්‍රික්ක',
        'all_status_option': 'සියලුම තත්වයන්',
        'reset_btn': 'යළි සකසන්න',
        'table_header_id': 'හැඳුනුම්පත',
        'table_header_name': 'නම',
        'table_header_email': 'විද්‍යුත් තැපෑල',
        'table_header_phone': 'දුරකථනය',
        'table_header_city': 'නගරය',
        'table_header_actions': 'ක්‍රියා',
        'add_customer_title': 'පාරිභෝගිකයෙකු එක් කරන්න',
        'edit_customer_title': 'පාරිභෝගිකයා සංස්කරණය කරන්න',
        'view_details_title': 'පාරිභෝගික විස්තර',
        'form_customer_id': 'පාරිභෝගික හැඳුනුම්පත',
        'form_customer_id_hint': 'ස්වයංක්‍රීයව ජනනය කෙරේ',
        'form_full_name': 'සම්පූර්ණ නම *',
        'form_phone': 'දුරකථන අංකය *',
        'form_email': 'විද්‍යුත් තැපෑල',
        'form_city': 'නගරය',
        'form_district': 'දිස්ත්‍රික්කය',
        'form_postal_code': 'තැපැල් කේතය',
        'form_address': 'ලිපිනය',
        'form_notes': 'සටහන්',
        'cancel_btn': 'අවලංගු කරන්න',
        'save_btn': 'පාරිභෝගිකයා සුරකින්න',
        'delete_title': 'පාරිභෝගිකයා මකන්න',
        'delete_confirmation_msg': 'ඔබට මෙම පාරිභෝගිකයා මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'delete_btn': 'මකන්න',
        'no_customers_found': 'පාරිභෝගිකයින් හමු නොවීය',
        'alert_fill_name_phone': 'කරුණාකර නම සහ දුරකථන අංකය පුරවන්න',
        'export_alert': 'අපනයන ක්‍රියාකාරීත්වය මෙහිදී ක්‍රියාත්මක වේ',
        
         // ==================== ITEMS MODULE ====================

        'search_placeholder': 'අයිතම නම හෝ කේතය අනුව සොයන්න...',
            'filter_btn': 'පෙරහන',
            'filter_status_label': 'තත්වය',
            'filter_all': 'සියල්ල',
            'filter_active': 'ක්‍රියාකාරී',
            'filter_inactive': 'අක්‍රිය',
            'filter_category_label': 'ප්‍රවර්ගය',
            'all_categories': 'සියලුම ප්‍රවර්ග',
            'filter_stock_label': 'තොග මට්ටම',
            'all_stock': 'සියල්ල',
            'low_stock': 'අඩු තොග (< 10)',
            'out_of_stock': 'තොග නැත (0)',
            'in_stock': 'තොග ඇත (> 0)',
            'reset_filters_btn': 'පෙරහන් යළි සකසන්න',
            'add_item_btn': 'අයිතමය එක් කරන්න',
            'table_header_code': 'කේතය',
            'table_header_name': 'නම',
            'table_header_price': 'මිල',
            'table_header_stock': 'තොග',
            'table_header_status': 'තත්වය',
            'table_header_actions': 'ක්‍රියා',
            'add_item_title': 'අයිතමය එක් කරන්න',
            'edit_item_title': 'අයිතමය සංස්කරණය කරන්න',
            'form_item_code': 'අයිතම කේතය',
            'auto_generated_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
            'form_item_name': 'අයිතම නම *',
            'form_category': 'ප්‍රවර්ගය',
            'select_option': 'තෝරන්න...',
            'form_wholesale': 'තොග වෙළෙන්දා',
            'form_size': 'ප්‍රමාණය',
            'size_placeholder': 'උදා: M, L, XL, එක ප්‍රමාණය',
            'form_colors': 'වර්ණ',
            'colors_placeholder': 'රතු, නිල්, කොළ',
            'form_cost_price': 'පිරිවැය මිල',
            'form_selling_price': 'විකුණුම් මිල',
            'form_stock_quantity': 'තොග ප්‍රමාණය',
            'form_status': 'තත්වය',
            'active_option': 'ක්‍රියාකාරී',
            'inactive_option': 'අක්‍රිය',
            'form_item_image': 'අයිතම පින්තූරය',
            'upload_text': 'උඩුගත කරන්න',
            'cancel_btn': 'අවලංගු කරන්න',
            'save_btn': 'අයිතමය සුරකින්න',
            'view_details_title': 'අයිතම විස්තර',
            'delete_title': 'අයිතමය මකන්න',
            'delete_confirmation_msg': 'ඔබට මෙම අයිතමය මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
            'delete_btn': 'මකන්න',
            'no_items_found': 'අයිතම කිසිවක් හමු නොවීය',
            'alert_name_required': 'අයිතම නම අවශ්‍ය වේ',
            'alert_image_invalid': 'කරුණාකර වලංගු පින්තූර ගොනුවක් උඩුගත කරන්න.',
            'stock_movement_title': 'තොග චලන ඉතිහාසය',
            'cost_price_label': 'පිරිවැය මිල',
            'selling_price_label': 'විකුණුම් මිල',
            'stock_quantity_label': 'තොග ප්‍රමාණය',
            'colors_label': 'වර්ණ',
            'size_label': 'ප්‍රමාණය',
            'category_id_label': 'ප්‍රවර්ග හැඳුනුම්පත',
            'wholesale_id_label': 'තොග වෙළෙන්දා හැඳුනුම්පත',

        // ==================== CATEGORIES MODULE ====================

        'search_placeholder': 'ප්‍රවර්ග සොයන්න...',
        'add_category_btn': 'ප්‍රවර්ගය එක් කරන්න',
        'table_header_id': 'ප්‍රවර්ග හැඳුනුම්පත',
        'table_header_name': 'ප්‍රවර්ග නම',
        'table_header_created': 'නිර්මාණය කළ දිනය',
        'table_header_actions': 'ක්‍රියා',
        'add_category_title': 'ප්‍රවර්ගය එක් කරන්න',
        'edit_category_title': 'ප්‍රවර්ගය සංස්කරණය කරන්න',
        'form_category_id': 'ප්‍රවර්ග හැඳුනුම්පත',
        'form_category_id_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
        'form_category_name': 'ප්‍රවර්ග නම',
        'category_name_placeholder': 'උදා: ඉලෙක්ට්‍රොනික්ස්, ඇඳුම් පැළඳුම් ...',
        'cancel_btn': 'අවලංගු කරන්න',
        'save_btn': 'සුරකින්න',
        'delete_title': 'ප්‍රවර්ගය මකන්න',
        'delete_confirmation_msg': 'ඔබට මෙම ප්‍රවර්ගය මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'delete_btn': 'මකන්න',
        'no_categories_found': 'ප්‍රවර්ග කිසිවක් හමු නොවීය',
        'alert_name_required': 'ප්‍රවර්ග නම අවශ්‍ය වේ',

        // ==================== WHOLESALERS MODULE ====================

        'search_placeholder': 'තොග වෙළෙන්දන් සොයන්න...',
            'add_wholesale_btn': 'තොග වෙළෙන්දෙකු එක් කරන්න',
            'table_header_id': 'තොග වෙළෙන්දා හැඳුනුම්පත',
            'table_header_name': 'නම',
            'table_header_email': 'විද්‍යුත් තැපෑල',
            'table_header_phone': 'දුරකථනය',
            'table_header_address': 'ලිපිනය',
            'table_header_actions': 'ක්‍රියා',
            'add_wholesale_title': 'තොග වෙළෙන්දෙකු එක් කරන්න',
            'edit_wholesale_title': 'තොග වෙළෙන්දා සංස්කරණය කරන්න',
            'form_wholesale_id': 'තොග වෙළෙන්දා හැඳුනුම්පත',
            'auto_generated_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
            'form_wholesale_name': 'තොග වෙළෙන්දාගේ නම *',
            'form_phone': 'දුරකථනය',
            'form_email': 'විද්‍යුත් තැපෑල',
            'form_address': 'ලිපිනය',
            'form_category': 'ප්‍රවර්ගය',
            'select_option': 'තෝරන්න...',
            'cancel_btn': 'අවලංගු කරන්න',
            'save_btn': 'සුරකින්න',
            'view_details_title': 'තොග වෙළෙන්දාගේ විස්තර',
            'delete_title': 'තොග වෙළෙන්දා මකන්න',
            'delete_confirmation_msg': 'ඔබට මෙම තොග වෙළෙන්දා මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
            'delete_btn': 'මකන්න',
            'no_wholesales_found': 'තොග වෙළෙන්දන් හමු නොවීය',
            'alert_name_required': 'තොග වෙළෙන්දාගේ නම අවශ්‍ය වේ',
            'wholesale_id_label': 'තොග වෙළෙන්දා හැඳුනුම්පත',
            'name_label': 'නම',
            'phone_label': 'දුරකථනය',
            'email_label': 'විද්‍යුත් තැපෑල',
            'address_label': 'ලිපිනය',
            'category_label': 'ප්‍රවර්ගය',
        
        // Footer
        'footer.copyright': '© 2024 ප්‍රමාණ කළමනාකරණය. සියලුම හිමිකම් ඇවිරිණි.',
        'footer.terms': 'සේවා කොන්දේසි',
        'footer.privacy': 'රහස්‍යතා ප්‍රතිපත්තිය'
    },
    
    // ==================== TAMIL TRANSLATIONS ====================
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
        
        // Dashboard
        'dashboard.welcome': 'மீண்டும் வருக',
        'dashboard.total_orders': 'மொத்த ஆர்டர்கள்',
        'dashboard.revenue': 'வருவாய்',
        'dashboard.customers': 'வாடிக்கையாளர்கள்',
        'dashboard.low_stock': 'குறைந்த பங்கு பொருட்கள்',
        'dashboard.recent_orders': 'சமீபத்திய ஆர்டர்கள்',
        'dashboard.view_all': 'அனைத்தையும் காண்க',
        'dashboard.order_number': 'ஆர்டர் எண்',
        'dashboard.customer': 'வாடிக்கையாளர்',
        'dashboard.date': 'தேதி',
        'dashboard.total': 'மொத்தம்',
        
        // Customers Module
        'customers_title': 'வாடிக்கையாளர்கள்',
        'customers_subtitle': 'உங்கள் வாடிக்கையாளர் தளத்தை நிர்வகிக்கவும், ஆர்டர்களைப் பார்க்கவும், ஈடுபாட்டைக் கண்காணிக்கவும்',
        'export_btn': 'ஏற்றுமதி',
        'add_customer_btn': 'வாடிக்கையாளரைச் சேர்',
        'total_customers_label': 'மொத்த வாடிக்கையாளர்கள்',
        'active_customers_label': 'செயலில் உள்ள வாடிக்கையாளர்கள்',
        'total_orders_label': 'மொத்த ஆர்டர்கள்',
        'lifetime_value_label': 'வாழ்நாள் மதிப்பு',
        'all_districts_option': 'அனைத்து மாவட்டங்களும்',
        'all_status_option': 'அனைத்து நிலைகளும்',
        'reset_btn': 'மீட்டமை',
        'table_header_id': 'அடையாளம்',
        'table_header_name': 'பெயர்',
        'table_header_email': 'மின்னஞ்சல்',
        'table_header_phone': 'தொலைபேசி',
        'table_header_city': 'நகரம்',
        'table_header_actions': 'செயல்கள்',
        'add_customer_title': 'வாடிக்கையாளரைச் சேர்',
        'edit_customer_title': 'வாடிக்கையாளரைத் திருத்து',
        'view_details_title': 'வாடிக்கையாளர் விவரங்கள்',
        'form_customer_id': 'வாடிக்கையாளர் அடையாளம்',
        'form_customer_id_hint': 'தானாக உருவாக்கப்பட்டது',
        'form_full_name': 'முழு பெயர் *',
        'form_phone': 'தொலைபேசி எண் *',
        'form_email': 'மின்னஞ்சல்',
        'form_city': 'நகரம்',
        'form_district': 'மாவட்டம்',
        'form_postal_code': 'தபால் குறியீடு',
        'form_address': 'முகவரி',
        'form_notes': 'குறிப்புகள்',
        'cancel_btn': 'ரத்து செய்',
        'save_btn': 'வாடிக்கையாளரைச் சேமி',
        'delete_title': 'வாடிக்கையாளரை நீக்கு',
        'delete_confirmation_msg': 'இந்த வாடிக்கையாளரை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
        'delete_btn': 'நீக்கு',
        'no_customers_found': 'வாடிக்கையாளர்கள் எதுவும் கிடைக்கவில்லை',
        'alert_fill_name_phone': 'தயவுசெய்து பெயர் மற்றும் தொலைபேசி எண்ணை நிரப்பவும்',
        'export_alert': 'ஏற்றுமதி செயல்பாடு இங்கே செயல்படுத்தப்படும்',
        
         // ==================== ITEMS MODULE ====================

        'search_placeholder': 'பொருளின் பெயர் அல்லது குறியீட்டால் தேடுக...',
            'filter_btn': 'வடிகட்டி',
            'filter_status_label': 'நிலை',
            'filter_all': 'அனைத்தும்',
            'filter_active': 'செயலில்',
            'filter_inactive': 'செயலற்றது',
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
            'edit_item_title': 'பொருளைத் திருத்து',
            'form_item_code': 'பொருள் குறியீடு',
            'auto_generated_hint': 'தானாக உருவாக்கப்பட்டது',
            'form_item_name': 'பொருள் பெயர் *',
            'form_category': 'வகை',
            'select_option': 'தேர்ந்தெடு...',
            'form_wholesale': 'மொத்த விற்பனையாளர்',
            'form_size': 'அளவு',
            'size_placeholder': 'எ.கா: M, L, XL, ஒற்றை அளவு',
            'form_colors': 'நிறங்கள்',
            'colors_placeholder': 'சிவப்பு, நீலம், பச்சை',
            'form_cost_price': 'அடக்க விலை',
            'form_selling_price': 'விற்பனை விலை',
            'form_stock_quantity': 'இருப்பு அளவு',
            'form_status': 'நிலை',
            'active_option': 'செயலில்',
            'inactive_option': 'செயலற்றது',
            'form_item_image': 'பொருள் படம்',
            'upload_text': 'பதிவேற்று',
            'cancel_btn': 'ரத்து செய்',
            'save_btn': 'பொருளைச் சேமி',
            'view_details_title': 'பொருள் விவரங்கள்',
            'delete_title': 'பொருளை நீக்கு',
            'delete_confirmation_msg': 'இந்த பொருளை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
            'delete_btn': 'நீக்கு',
            'no_items_found': 'பொருள்கள் எதுவும் கிடைக்கவில்லை',
            'alert_name_required': 'பொருள் பெயர் தேவை',
            'alert_image_invalid': 'தயவுசெய்து செல்லுபடியாகும் பட கோப்பை பதிவேற்றவும்.',
            'stock_movement_title': 'இருப்பு இயக்க வரலாறு',
            'cost_price_label': 'அடக்க விலை',
            'selling_price_label': 'விற்பனை விலை',
            'stock_quantity_label': 'இருப்பு அளவு',
            'colors_label': 'நிறங்கள்',
            'size_label': 'அளவு',
            'category_id_label': 'வகை அடையாளம்',
            'wholesale_id_label': 'மொத்த விற்பனையாளர் அடையாளம்',

         // ==================== CATEGORIES MODULE ====================

          'search_placeholder': 'வகைகளைத் தேடுக...',
        'add_category_btn': 'வகையைச் சேர்',
        'table_header_id': 'வகை அடையாளம்',
        'table_header_name': 'வகை பெயர்',
        'table_header_created': 'உருவாக்கப்பட்டது',
        'table_header_actions': 'செயல்கள்',
        'add_category_title': 'வகையைச் சேர்',
        'edit_category_title': 'வகையைத் திருத்து',
        'form_category_id': 'வகை அடையாளம்',
        'form_category_id_hint': 'தானாக உருவாக்கப்பட்டது',
        'form_category_name': 'வகை பெயர்',
        'category_name_placeholder': 'எ.கா: மின்னணுவியல், ஆடைகள் ...',
        'cancel_btn': 'ரத்து செய்',
        'save_btn': 'சேமி',
        'delete_title': 'வகையை நீக்கு',
        'delete_confirmation_msg': 'இந்த வகையை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
        'delete_btn': 'நீக்கு',
        'no_categories_found': 'வகைகள் எதுவும் கிடைக்கவில்லை',
        'alert_name_required': 'வகை பெயர் தேவை',
        
        // ==================== WHOLESALERS MODULE ====================

        'search_placeholder': 'மொத்த விற்பனையாளர்களைத் தேடுக...',
            'add_wholesale_btn': 'மொத்த விற்பனையாளரைச் சேர்',
            'table_header_id': 'மொத்த விற்பனையாளர் அடையாளம்',
            'table_header_name': 'பெயர்',
            'table_header_email': 'மின்னஞ்சல்',
            'table_header_phone': 'தொலைபேசி',
            'table_header_address': 'முகவரி',
            'table_header_actions': 'செயல்கள்',
            'add_wholesale_title': 'மொத்த விற்பனையாளரைச் சேர்',
            'edit_wholesale_title': 'மொத்த விற்பனையாளரைத் திருத்து',
            'form_wholesale_id': 'மொத்த விற்பனையாளர் அடையாளம்',
            'auto_generated_hint': 'தானாக உருவாக்கப்பட்டது',
            'form_wholesale_name': 'மொத்த விற்பனையாளர் பெயர் *',
            'form_phone': 'தொலைபேசி',
            'form_email': 'மின்னஞ்சல்',
            'form_address': 'முகவரி',
            'form_category': 'வகை',
            'select_option': 'தேர்ந்தெடு...',
            'cancel_btn': 'ரத்து செய்',
            'save_btn': 'சேமி',
            'view_details_title': 'மொத்த விற்பனையாளர் விவரங்கள்',
            'delete_title': 'மொத்த விற்பனையாளரை நீக்கு',
            'delete_confirmation_msg': 'இந்த மொத்த விற்பனையாளரை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
            'delete_btn': 'நீக்கு',
            'no_wholesales_found': 'மொத்த விற்பனையாளர்கள் எதுவும் கிடைக்கவில்லை',
            'alert_name_required': 'மொத்த விற்பனையாளர் பெயர் தேவை',
            'wholesale_id_label': 'மொத்த விற்பனையாளர் அடையாளம்',
            'name_label': 'பெயர்',
            'phone_label': 'தொலைபேசி',
            'email_label': 'மின்னஞ்சல்',
            'address_label': 'முகவரி',
            'category_label': 'வகை',

        // Footer
        'footer.copyright': '© 2024 அளவு மேலாண்மை. அனைத்து உரிமைகளும் பாதுகாக்கப்படுகின்றன.',
        'footer.terms': 'சேவை விதிமுறைகள்',
        'footer.privacy': 'தனியுரிமைக் கொள்கை'
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
    if (translation) return translation;
    
    // Fallback to English
    const englishTranslation = translations['en'][key];
    if (englishTranslation) return englishTranslation;
    
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
        } else if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
            element.value = t(key);
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
    
    // Update sidebar sections
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
        if (index < sidebarKeys.length) item.textContent = t(sidebarKeys[index]);
    });
    
    // Update logout button in sidebar
    const logoutBtn = document.querySelector('.sidebar a[href*="logout"] span:last-child');
    if (logoutBtn) logoutBtn.textContent = t('sidebar.logout');
    
    // Update header search placeholder
    const searchInput = document.getElementById('globalSearch');
    if (searchInput) searchInput.placeholder = t('header.search_placeholder');
    
    // Update notification texts
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
            item.querySelector('span:last-child').textContent = t(profileKeys[index]);
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
                if (!textSpan.classList.contains('material-icons-round')) {
                    textSpan.textContent = t(langTexts[index]);
                }
            }
        });
    }
    
    // Update theme dropdown items
    const themeItems = document.querySelectorAll('#themeDropdown .hdr-dropdown-item');
    if (themeItems.length >= 2) {
        themeItems[0].querySelector('span:last-child').textContent = t('header.light');
        themeItems[1].querySelector('span:last-child').textContent = t('header.dark');
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
document.addEventListener('DOMContentLoaded', () => {
    updatePageTranslations();
});

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
window.translations = translations;
window.getCurrentLanguage = getCurrentLanguage;
window.setCurrentLanguage = setCurrentLanguage;
window.t = t;
window.translate = translate;
window.updatePageTranslations = updatePageTranslations;
window.changeLanguage = changeLanguage;