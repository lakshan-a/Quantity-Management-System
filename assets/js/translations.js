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
        'customers.title': 'Customers',
        'customers.subtitle': 'Manage your customer base, view orders, and track engagement',
        'customers.export_btn': 'Export',
        'customers.add_customer_btn': 'Add Customer',
        'customers.total_customers_label': 'Total Customers',
        'customers.active_customers_label': 'Active Customers',
        'customers.total_orders_label': 'Total Orders',
        'customers.lifetime_value_label': 'Lifetime Value',
        'customers.all_districts_option': 'All Districts',
        'customers.all_status_option': 'All Status',
        'customers.reset_btn': 'Reset',
        'customers.table_header_id': 'ID',
        'customers.table_header_name': 'Name',
        'customers.table_header_email': 'Email',
        'customers.table_header_phone': 'Phone',
        'customers.table_header_city': 'City',
        'customers.table_header_actions': 'Actions',
        'customers.add_customer_title': 'Add Customer',
        'customers.edit_customer_title': 'Edit Customer',
        'customers.view_details_title': 'Customer Details',
        'customers.form_customer_id': 'Customer ID',
        'customers.form_customer_id_hint': 'Auto-generated',
        'customers.form_full_name': 'Full Name *',
        'customers.form_phone': 'Phone *',
        'customers.form_email': 'Email',
        'customers.form_city': 'City',
        'customers.form_district': 'District',
        'customers.form_postal_code': 'Postal Code',
        'customers.form_address': 'Address',
        'customers.form_notes': 'Notes',
        'customers.cancel_btn': 'Cancel',
        'customers.save_btn': 'Save Customer',
        'customers.delete_title': 'Delete Customer',
        'customers.delete_confirmation_msg': 'Are you sure you want to delete this customer? This action cannot be undone.',
        'customers.delete_btn': 'Delete',
        'customers.no_customers_found': 'No customers found',
        'customers.alert_fill_name_phone': 'Please fill in Name and Phone',
        'customers.export_alert': 'Export functionality will be implemented here',
        
        // ==================== ITEMS MODULE ====================
        'items.search_placeholder': 'Search items by name or code...',
        'items.filter_btn': 'Filter',
        'items.filter_status_label': 'Status',
        'items.filter_all': 'All',
        'items.filter_active': 'Active',
        'items.filter_inactive': 'Inactive',
        'items.filter_category_label': 'Category',
        'items.all_categories': 'All Categories',
        'items.filter_stock_label': 'Stock Level',
        'items.all_stock': 'All',
        'items.low_stock': 'Low Stock (< 10)',
        'items.out_of_stock': 'Out of Stock (0)',
        'items.in_stock': 'In Stock (> 0)',
        'items.reset_filters_btn': 'Reset Filters',
        'items.add_item_btn': 'Add Item',
        'items.table_header_code': 'Code',
        'items.table_header_name': 'Name',
        'items.table_header_price': 'Price',
        'items.table_header_stock': 'Stock',
        'items.table_header_status': 'Status',
        'items.table_header_actions': 'Actions',
        'items.add_item_title': 'Add Item',
        'items.edit_item_title': 'Edit Item',
        'items.form_item_code': 'Item Code',
        'items.auto_generated_hint': 'Auto-generated',
        'items.form_item_name': 'Item Name *',
        'items.form_category': 'Category',
        'items.select_option': 'Select...',
        'items.form_wholesale': 'Wholesale',
        'items.form_size': 'Size',
        'items.size_placeholder': 'e.g., M, L, XL, One Size',
        'items.form_colors': 'Colors',
        'items.colors_placeholder': 'Red, Blue, Green',
        'items.form_cost_price': 'Cost Price',
        'items.form_selling_price': 'Selling Price',
        'items.form_stock_quantity': 'Stock Quantity',
        'items.form_status': 'Status',
        'items.active_option': 'Active',
        'items.inactive_option': 'Inactive',
        'items.form_item_image': 'Item Image',
        'items.upload_text': 'Upload',
        'items.cancel_btn': 'Cancel',
        'items.save_btn': 'Save Item',
        'items.view_details_title': 'Item Details',
        'items.delete_title': 'Delete Item',
        'items.delete_confirmation_msg': 'Are you sure you want to delete this item? This action cannot be undone.',
        'items.delete_btn': 'Delete',
        'items.no_items_found': 'No items found',
        'items.alert_name_required': 'Item name is required',
        'items.alert_image_invalid': 'Please upload a valid image file.',
        'items.stock_movement_title': 'Stock Movement History',
        'items.cost_price_label': 'Cost Price',
        'items.selling_price_label': 'Selling Price',
        'items.stock_quantity_label': 'Stock Quantity',
        'items.colors_label': 'Colors',
        'items.size_label': 'Size',
        'items.category_id_label': 'Category ID',
        'items.wholesale_id_label': 'Wholesale ID',
        
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
        close: "Close",
        
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
        'businesses.search_placeholder': 'Search by name or owner...',
        'businesses.all_status': 'All Status',
        'businesses.active_option': 'Active',
        'businesses.expired_option': 'Expired',
        'businesses.suspended_option': 'Suspended',
        'businesses.add_business_btn': 'Add Business',
        'businesses.table_header_id': 'Business ID',
        'businesses.table_header_business': 'Business',
        'businesses.table_header_email': 'Email',
        'businesses.table_header_phone': 'Phone',
        'businesses.table_header_status': 'Status',
        'businesses.table_header_expires': 'Expires',
        'businesses.table_header_actions': 'Actions',
        'businesses.add_business_title': 'Add Business',
        'businesses.edit_business_title': 'Edit Business',
        'businesses.form_business_name': 'Business Name *',
        'businesses.business_name_placeholder': 'Tech Store Pro',
        'businesses.form_owner_name': 'Owner Name *',
        'businesses.owner_name_placeholder': 'John Smith',
        'businesses.form_email': 'Email *',
        'businesses.email_placeholder': 'contact@business.com',
        'businesses.form_phone': 'Phone *',
        'businesses.phone_placeholder': '+1 234 567 8900',
        'businesses.form_address': 'Address',
        'businesses.address_placeholder': '123 Business Street, City',
        'businesses.form_subscription_status': 'Subscription Status',
        'businesses.form_subscription_start': 'Subscription Start',
        'businesses.form_subscription_end': 'Subscription End',
        'businesses.cancel_btn': 'Cancel',
        'businesses.save_business_btn': 'Save Business',
        'businesses.business_details_title': 'Business Details',
        'businesses.owner_label': 'Owner',
        'businesses.id_prefix': 'ID',
        'businesses.email_label': 'Email',
        'businesses.phone_label': 'Phone',
        'businesses.address_label': 'Address',
        'businesses.subscription_start_label': 'Subscription Start',
        'businesses.subscription_end_label': 'Subscription End',
        'businesses.status_label': 'Status',
        'businesses.quick_actions_label': 'Quick Actions',
        'businesses.close_btn': 'Close',
        'businesses.delete_business_title': 'Delete Business',
        'businesses.delete_confirmation_msg': 'Are you sure you want to delete ',
        'businesses.delete_btn': 'Delete',
        'businesses.no_businesses_found': 'No businesses found',
        'businesses.activate_btn': 'Activate',
        'businesses.suspend_btn': 'Suspend',
        'businesses.delete_btn_action': 'Delete',
        'businesses.alert_fill_required': 'Please fill required fields: Name, Owner, Email, Phone',
        'businesses.alert_invalid_dates': 'Invalid dates',
        
        // ==================== CATEGORIES MODULE ====================
        'categories.search_placeholder': 'Search categories...',
        'categories.add_category_btn': 'Add Category',
        'categories.table_header_id': 'Category ID',
        'categories.table_header_name': 'Category Name',
        'categories.table_header_created': 'Created',
        'categories.table_header_actions': 'Actions',
        'categories.add_category_title': 'Add Category',
        'categories.edit_category_title': 'Edit Category',
        'categories.form_category_id': 'Category ID',
        'categories.form_category_id_hint': 'Auto-generated',
        'categories.form_category_name': 'Category Name',
        'categories.category_name_placeholder': 'e.g., Electronics, Clothing ...',
        'categories.cancel_btn': 'Cancel',
        'categories.save_btn': 'Save',
        'categories.delete_title': 'Delete Category',
        'categories.delete_confirmation_msg': 'Are you sure you want to delete this category? This action cannot be undone.',
        'categories.delete_btn': 'Delete',
        'categories.no_categories_found': 'No categories found',
        'categories.alert_name_required': 'Category name is required',
        
        // ==================== WHOLESALERS MODULE ====================
        'wholesalers.search_placeholder': 'Search wholesalers...',
        'wholesalers.add_wholesale_btn': 'Add Wholesaler',
        'wholesalers.table_header_id': 'Wholesale ID',
        'wholesalers.table_header_name': 'Name',
        'wholesalers.table_header_email': 'Email',
        'wholesalers.table_header_phone': 'Phone',
        'wholesalers.table_header_address': 'Address',
        'wholesalers.table_header_actions': 'Actions',
        'wholesalers.add_wholesale_title': 'Add Wholesaler',
        'wholesalers.edit_wholesale_title': 'Edit Wholesaler',
        'wholesalers.form_wholesale_id': 'Wholesale ID',
        'wholesalers.auto_generated_hint': 'Auto-generated',
        'wholesalers.form_wholesale_name': 'Wholesaler Name *',
        'wholesalers.form_phone': 'Phone',
        'wholesalers.form_email': 'Email',
        'wholesalers.form_address': 'Address',
        'wholesalers.form_category': 'Category',
        'wholesalers.select_option': 'Select...',
        'wholesalers.cancel_btn': 'Cancel',
        'wholesalers.save_btn': 'Save',
        'wholesalers.view_details_title': 'Wholesaler Details',
        'wholesalers.delete_title': 'Delete Wholesaler',
        'wholesalers.delete_confirmation_msg': 'Are you sure you want to delete this wholesaler? This action cannot be undone.',
        'wholesalers.delete_btn': 'Delete',
        'wholesalers.no_wholesales_found': 'No wholesalers found',
        'wholesalers.alert_name_required': 'Wholesaler Name is required',
        'wholesalers.wholesale_id_label': 'Wholesale ID',
        'wholesalers.name_label': 'Name',
        'wholesalers.phone_label': 'Phone',
        'wholesalers.email_label': 'Email',
        'wholesalers.address_label': 'Address',
        'wholesalers.category_label': 'Category',
        
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
        'customers.title': 'පාරිභෝගිකයින්',
        'customers.subtitle': 'ඔබගේ පාරිභෝගික පදනම කළමනාකරණය කරන්න, ඇණවුම් බලන්න, සහ නියැලීම් ලුහුබඳින්න',
        'customers.export_btn': 'අපනයනය',
        'customers.add_customer_btn': 'පාරිභෝගිකයෙකු එක් කරන්න',
        'customers.total_customers_label': 'සම්පූර්ණ පාරිභෝගිකයින්',
        'customers.active_customers_label': 'ක්‍රියාකාරී පාරිභෝගිකයින්',
        'customers.total_orders_label': 'සම්පූර්ණ ඇණවුම්',
        'customers.lifetime_value_label': 'ජීවිත කාලීන වටිනාකම',
        'customers.all_districts_option': 'සියලුම දිස්ත්‍රික්ක',
        'customers.all_status_option': 'සියලුම තත්වයන්',
        'customers.reset_btn': 'යළි සකසන්න',
        'customers.table_header_id': 'හැඳුනුම්පත',
        'customers.table_header_name': 'නම',
        'customers.table_header_email': 'විද්‍යුත් තැපෑල',
        'customers.table_header_phone': 'දුරකථනය',
        'customers.table_header_city': 'නගරය',
        'customers.table_header_actions': 'ක්‍රියා',
        'customers.add_customer_title': 'පාරිභෝගිකයෙකු එක් කරන්න',
        'customers.edit_customer_title': 'පාරිභෝගිකයා සංස්කරණය කරන්න',
        'customers.view_details_title': 'පාරිභෝගික විස්තර',
        'customers.form_customer_id': 'පාරිභෝගික හැඳුනුම්පත',
        'customers.form_customer_id_hint': 'ස්වයංක්‍රීයව ජනනය කෙරේ',
        'customers.form_full_name': 'සම්පූර්ණ නම *',
        'customers.form_phone': 'දුරකථන අංකය *',
        'customers.form_email': 'විද්‍යුත් තැපෑල',
        'customers.form_city': 'නගරය',
        'customers.form_district': 'දිස්ත්‍රික්කය',
        'customers.form_postal_code': 'තැපැල් කේතය',
        'customers.form_address': 'ලිපිනය',
        'customers.form_notes': 'සටහන්',
        'customers.cancel_btn': 'අවලංගු කරන්න',
        'customers.save_btn': 'පාරිභෝගිකයා සුරකින්න',
        'customers.delete_title': 'පාරිභෝගිකයා මකන්න',
        'customers.delete_confirmation_msg': 'ඔබට මෙම පාරිභෝගිකයා මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'customers.delete_btn': 'මකන්න',
        'customers.no_customers_found': 'පාරිභෝගිකයින් හමු නොවීය',
        'customers.alert_fill_name_phone': 'කරුණාකර නම සහ දුරකථන අංකය පුරවන්න',
        'customers.export_alert': 'අපනයන ක්‍රියාකාරීත්වය මෙහිදී ක්‍රියාත්මක වේ',
        
        // Items Module
        'items.search_placeholder': 'අයිතම නම හෝ කේතය අනුව සොයන්න...',
        'items.filter_btn': 'පෙරහන',
        'items.filter_status_label': 'තත්වය',
        'items.filter_all': 'සියල්ල',
        'items.filter_active': 'ක්‍රියාකාරී',
        'items.filter_inactive': 'අක්‍රිය',
        'items.filter_category_label': 'ප්‍රවර්ගය',
        'items.all_categories': 'සියලුම ප්‍රවර්ග',
        'items.filter_stock_label': 'තොග මට්ටම',
        'items.all_stock': 'සියල්ල',
        'items.low_stock': 'අඩු තොග (< 10)',
        'items.out_of_stock': 'තොග නැත (0)',
        'items.in_stock': 'තොග ඇත (> 0)',
        'items.reset_filters_btn': 'පෙරහන් යළි සකසන්න',
        'items.add_item_btn': 'අයිතමය එක් කරන්න',
        'items.table_header_code': 'කේතය',
        'items.table_header_name': 'නම',
        'items.table_header_price': 'මිල',
        'items.table_header_stock': 'තොග',
        'items.table_header_status': 'තත්වය',
        'items.table_header_actions': 'ක්‍රියා',
        'items.add_item_title': 'අයිතමය එක් කරන්න',
        'items.edit_item_title': 'අයිතමය සංස්කරණය කරන්න',
        'items.form_item_code': 'අයිතම කේතය',
        'items.auto_generated_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
        'items.form_item_name': 'අයිතම නම *',
        'items.form_category': 'ප්‍රවර්ගය',
        'items.select_option': 'තෝරන්න...',
        'items.form_wholesale': 'තොග වෙළෙන්දා',
        'items.form_size': 'ප්‍රමාණය',
        'items.size_placeholder': 'උදා: M, L, XL, එක ප්‍රමාණය',
        'items.form_colors': 'වර්ණ',
        'items.colors_placeholder': 'රතු, නිල්, කොළ',
        'items.form_cost_price': 'පිරිවැය මිල',
        'items.form_selling_price': 'විකුණුම් මිල',
        'items.form_stock_quantity': 'තොග ප්‍රමාණය',
        'items.form_status': 'තත්වය',
        'items.active_option': 'ක්‍රියාකාරී',
        'items.inactive_option': 'අක්‍රිය',
        'items.form_item_image': 'අයිතම පින්තූරය',
        'items.upload_text': 'උඩුගත කරන්න',
        'items.cancel_btn': 'අවලංගු කරන්න',
        'items.save_btn': 'අයිතමය සුරකින්න',
        'items.view_details_title': 'අයිතම විස්තර',
        'items.delete_title': 'අයිතමය මකන්න',
        'items.delete_confirmation_msg': 'ඔබට මෙම අයිතමය මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'items.delete_btn': 'මකන්න',
        'items.no_items_found': 'අයිතම කිසිවක් හමු නොවීය',
        'items.alert_name_required': 'අයිතම නම අවශ්‍ය වේ',
        'items.alert_image_invalid': 'කරුණාකර වලංගු පින්තූර ගොනුවක් උඩුගත කරන්න.',
        'items.stock_movement_title': 'තොග චලන ඉතිහාසය',
        'items.cost_price_label': 'පිරිවැය මිල',
        'items.selling_price_label': 'විකුණුම් මිල',
        'items.stock_quantity_label': 'තොග ප්‍රමාණය',
        'items.colors_label': 'වර්ණ',
        'items.size_label': 'ප්‍රමාණය',
        'items.category_id_label': 'ප්‍රවර්ග හැඳුනුම්පත',
        'items.wholesale_id_label': 'තොග වෙළෙන්දා හැඳුනුම්පත',

        // Categories Module
        'categories.search_placeholder': 'ප්‍රවර්ග සොයන්න...',
        'categories.add_category_btn': 'ප්‍රවර්ගය එක් කරන්න',
        'categories.table_header_id': 'ප්‍රවර්ග හැඳුනුම්පත',
        'categories.table_header_name': 'ප්‍රවර්ග නම',
        'categories.table_header_created': 'නිර්මාණය කළ දිනය',
        'categories.table_header_actions': 'ක්‍රියා',
        'categories.add_category_title': 'ප්‍රවර්ගය එක් කරන්න',
        'categories.edit_category_title': 'ප්‍රවර්ගය සංස්කරණය කරන්න',
        'categories.form_category_id': 'ප්‍රවර්ග හැඳුනුම්පත',
        'categories.form_category_id_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
        'categories.form_category_name': 'ප්‍රවර්ග නම',
        'categories.category_name_placeholder': 'උදා: ඉලෙක්ට්‍රොනික්ස්, ඇඳුම් පැළඳුම් ...',
        'categories.cancel_btn': 'අවලංගු කරන්න',
        'categories.save_btn': 'සුරකින්න',
        'categories.delete_title': 'ප්‍රවර්ගය මකන්න',
        'categories.delete_confirmation_msg': 'ඔබට මෙම ප්‍රවර්ගය මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'categories.delete_btn': 'මකන්න',
        'categories.no_categories_found': 'ප්‍රවර්ග කිසිවක් හමු නොවීය',
        'categories.alert_name_required': 'ප්‍රවර්ග නම අවශ්‍ය වේ',

        // Wholesalers Module
        'wholesalers.search_placeholder': 'තොග වෙළෙන්දන් සොයන්න...',
        'wholesalers.add_wholesale_btn': 'තොග වෙළෙන්දෙකු එක් කරන්න',
        'wholesalers.table_header_id': 'තොග වෙළෙන්දා හැඳුනුම්පත',
        'wholesalers.table_header_name': 'නම',
        'wholesalers.table_header_email': 'විද්‍යුත් තැපෑල',
        'wholesalers.table_header_phone': 'දුරකථනය',
        'wholesalers.table_header_address': 'ලිපිනය',
        'wholesalers.table_header_actions': 'ක්‍රියා',
        'wholesalers.add_wholesale_title': 'තොග වෙළෙන්දෙකු එක් කරන්න',
        'wholesalers.edit_wholesale_title': 'තොග වෙළෙන්දා සංස්කරණය කරන්න',
        'wholesalers.form_wholesale_id': 'තොග වෙළෙන්දා හැඳුනුම්පත',
        'wholesalers.auto_generated_hint': 'ස්වයංක්‍රීයව ජනනය වේ',
        'wholesalers.form_wholesale_name': 'තොග වෙළෙන්දාගේ නම *',
        'wholesalers.form_phone': 'දුරකථනය',
        'wholesalers.form_email': 'විද්‍යුත් තැපෑල',
        'wholesalers.form_address': 'ලිපිනය',
        'wholesalers.form_category': 'ප්‍රවර්ගය',
        'wholesalers.select_option': 'තෝරන්න...',
        'wholesalers.cancel_btn': 'අවලංගු කරන්න',
        'wholesalers.save_btn': 'සුරකින්න',
        'wholesalers.view_details_title': 'තොග වෙළෙන්දාගේ විස්තර',
        'wholesalers.delete_title': 'තොග වෙළෙන්දා මකන්න',
        'wholesalers.delete_confirmation_msg': 'ඔබට මෙම තොග වෙළෙන්දා මකා දැමීමට විශ්වාසද? මෙම ක්‍රියාව ආපසු හැරවිය නොහැක.',
        'wholesalers.delete_btn': 'මකන්න',
        'wholesalers.no_wholesales_found': 'තොග වෙළෙන්දන් හමු නොවීය',
        'wholesalers.alert_name_required': 'තොග වෙළෙන්දාගේ නම අවශ්‍ය වේ',
        'wholesalers.wholesale_id_label': 'තොග වෙළෙන්දා හැඳුනුම්පත',
        'wholesalers.name_label': 'නම',
        'wholesalers.phone_label': 'දුරකථනය',
        'wholesalers.email_label': 'විද්‍යුත් තැපෑල',
        'wholesalers.address_label': 'ලිපිනය',
        'wholesalers.category_label': 'ප්‍රවර්ගය',
        
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
        'customers.title': 'வாடிக்கையாளர்கள்',
        'customers.subtitle': 'உங்கள் வாடிக்கையாளர் தளத்தை நிர்வகிக்கவும், ஆர்டர்களைப் பார்க்கவும், ஈடுபாட்டைக் கண்காணிக்கவும்',
        'customers.export_btn': 'ஏற்றுமதி',
        'customers.add_customer_btn': 'வாடிக்கையாளரைச் சேர்',
        'customers.total_customers_label': 'மொத்த வாடிக்கையாளர்கள்',
        'customers.active_customers_label': 'செயலில் உள்ள வாடிக்கையாளர்கள்',
        'customers.total_orders_label': 'மொத்த ஆர்டர்கள்',
        'customers.lifetime_value_label': 'வாழ்நாள் மதிப்பு',
        'customers.all_districts_option': 'அனைத்து மாவட்டங்களும்',
        'customers.all_status_option': 'அனைத்து நிலைகளும்',
        'customers.reset_btn': 'மீட்டமை',
        'customers.table_header_id': 'அடையாளம்',
        'customers.table_header_name': 'பெயர்',
        'customers.table_header_email': 'மின்னஞ்சல்',
        'customers.table_header_phone': 'தொலைபேசி',
        'customers.table_header_city': 'நகரம்',
        'customers.table_header_actions': 'செயல்கள்',
        'customers.add_customer_title': 'வாடிக்கையாளரைச் சேர்',
        'customers.edit_customer_title': 'வாடிக்கையாளரைத் திருத்து',
        'customers.view_details_title': 'வாடிக்கையாளர் விவரங்கள்',
        'customers.form_customer_id': 'வாடிக்கையாளர் அடையாளம்',
        'customers.form_customer_id_hint': 'தானாக உருவாக்கப்பட்டது',
        'customers.form_full_name': 'முழு பெயர் *',
        'customers.form_phone': 'தொலைபேசி எண் *',
        'customers.form_email': 'மின்னஞ்சல்',
        'customers.form_city': 'நகரம்',
        'customers.form_district': 'மாவட்டம்',
        'customers.form_postal_code': 'தபால் குறியீடு',
        'customers.form_address': 'முகவரி',
        'customers.form_notes': 'குறிப்புகள்',
        'customers.cancel_btn': 'ரத்து செய்',
        'customers.save_btn': 'வாடிக்கையாளரைச் சேமி',
        'customers.delete_title': 'வாடிக்கையாளரை நீக்கு',
        'customers.delete_confirmation_msg': 'இந்த வாடிக்கையாளரை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
        'customers.delete_btn': 'நீக்கு',
        'customers.no_customers_found': 'வாடிக்கையாளர்கள் எதுவும் கிடைக்கவில்லை',
        'customers.alert_fill_name_phone': 'தயவுசெய்து பெயர் மற்றும் தொலைபேசி எண்ணை நிரப்பவும்',
        'customers.export_alert': 'ஏற்றுமதி செயல்பாடு இங்கே செயல்படுத்தப்படும்',
        
        // Items Module
        'items.search_placeholder': 'பொருளின் பெயர் அல்லது குறியீட்டால் தேடுக...',
        'items.filter_btn': 'வடிகட்டி',
        'items.filter_status_label': 'நிலை',
        'items.filter_all': 'அனைத்தும்',
        'items.filter_active': 'செயலில்',
        'items.filter_inactive': 'செயலற்றது',
        'items.filter_category_label': 'வகை',
        'items.all_categories': 'அனைத்து வகைகளும்',
        'items.filter_stock_label': 'இருப்பு நிலை',
        'items.all_stock': 'அனைத்தும்',
        'items.low_stock': 'குறைந்த இருப்பு (< 10)',
        'items.out_of_stock': 'இருப்பு இல்லை (0)',
        'items.in_stock': 'இருப்பு உள்ளது (> 0)',
        'items.reset_filters_btn': 'வடிப்பான்களை மீட்டமை',
        'items.add_item_btn': 'பொருளைச் சேர்',
        'items.table_header_code': 'குறியீடு',
        'items.table_header_name': 'பெயர்',
        'items.table_header_price': 'விலை',
        'items.table_header_stock': 'இருப்பு',
        'items.table_header_status': 'நிலை',
        'items.table_header_actions': 'செயல்கள்',
        'items.add_item_title': 'பொருளைச் சேர்',
        'items.edit_item_title': 'பொருளைத் திருத்து',
        'items.form_item_code': 'பொருள் குறியீடு',
        'items.auto_generated_hint': 'தானாக உருவாக்கப்பட்டது',
        'items.form_item_name': 'பொருள் பெயர் *',
        'items.form_category': 'வகை',
        'items.select_option': 'தேர்ந்தெடு...',
        'items.form_wholesale': 'மொத்த விற்பனையாளர்',
        'items.form_size': 'அளவு',
        'items.size_placeholder': 'எ.கா: M, L, XL, ஒற்றை அளவு',
        'items.form_colors': 'நிறங்கள்',
        'items.colors_placeholder': 'சிவப்பு, நீலம், பச்சை',
        'items.form_cost_price': 'அடக்க விலை',
        'items.form_selling_price': 'விற்பனை விலை',
        'items.form_stock_quantity': 'இருப்பு அளவு',
        'items.form_status': 'நிலை',
        'items.active_option': 'செயலில்',
        'items.inactive_option': 'செயலற்றது',
        'items.form_item_image': 'பொருள் படம்',
        'items.upload_text': 'பதிவேற்று',
        'items.cancel_btn': 'ரத்து செய்',
        'items.save_btn': 'பொருளைச் சேமி',
        'items.view_details_title': 'பொருள் விவரங்கள்',
        'items.delete_title': 'பொருளை நீக்கு',
        'items.delete_confirmation_msg': 'இந்த பொருளை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
        'items.delete_btn': 'நீக்கு',
        'items.no_items_found': 'பொருள்கள் எதுவும் கிடைக்கவில்லை',
        'items.alert_name_required': 'பொருள் பெயர் தேவை',
        'items.alert_image_invalid': 'தயவுசெய்து செல்லுபடியாகும் பட கோப்பை பதிவேற்றவும்.',
        'items.stock_movement_title': 'இருப்பு இயக்க வரலாறு',
        'items.cost_price_label': 'அடக்க விலை',
        'items.selling_price_label': 'விற்பனை விலை',
        'items.stock_quantity_label': 'இருப்பு அளவு',
        'items.colors_label': 'நிறங்கள்',
        'items.size_label': 'அளவு',
        'items.category_id_label': 'வகை அடையாளம்',
        'items.wholesale_id_label': 'மொத்த விற்பனையாளர் அடையாளம்',

        // Categories Module
        'categories.search_placeholder': 'வகைகளைத் தேடுக...',
        'categories.add_category_btn': 'வகையைச் சேர்',
        'categories.table_header_id': 'வகை அடையாளம்',
        'categories.table_header_name': 'வகை பெயர்',
        'categories.table_header_created': 'உருவாக்கப்பட்டது',
        'categories.table_header_actions': 'செயல்கள்',
        'categories.add_category_title': 'வகையைச் சேர்',
        'categories.edit_category_title': 'வகையைத் திருத்து',
        'categories.form_category_id': 'வகை அடையாளம்',
        'categories.form_category_id_hint': 'தானாக உருவாக்கப்பட்டது',
        'categories.form_category_name': 'வகை பெயர்',
        'categories.category_name_placeholder': 'எ.கா: மின்னணுவியல், ஆடைகள் ...',
        'categories.cancel_btn': 'ரத்து செய்',
        'categories.save_btn': 'சேமி',
        'categories.delete_title': 'வகையை நீக்கு',
        'categories.delete_confirmation_msg': 'இந்த வகையை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
        'categories.delete_btn': 'நீக்கு',
        'categories.no_categories_found': 'வகைகள் எதுவும் கிடைக்கவில்லை',
        'categories.alert_name_required': 'வகை பெயர் தேவை',
        
        // Wholesalers Module
        'wholesalers.search_placeholder': 'மொத்த விற்பனையாளர்களைத் தேடுக...',
        'wholesalers.add_wholesale_btn': 'மொத்த விற்பனையாளரைச் சேர்',
        'wholesalers.table_header_id': 'மொத்த விற்பனையாளர் அடையாளம்',
        'wholesalers.table_header_name': 'பெயர்',
        'wholesalers.table_header_email': 'மின்னஞ்சல்',
        'wholesalers.table_header_phone': 'தொலைபேசி',
        'wholesalers.table_header_address': 'முகவரி',
        'wholesalers.table_header_actions': 'செயல்கள்',
        'wholesalers.add_wholesale_title': 'மொத்த விற்பனையாளரைச் சேர்',
        'wholesalers.edit_wholesale_title': 'மொத்த விற்பனையாளரைத் திருத்து',
        'wholesalers.form_wholesale_id': 'மொத்த விற்பனையாளர் அடையாளம்',
        'wholesalers.auto_generated_hint': 'தானாக உருவாக்கப்பட்டது',
        'wholesalers.form_wholesale_name': 'மொத்த விற்பனையாளர் பெயர் *',
        'wholesalers.form_phone': 'தொலைபேசி',
        'wholesalers.form_email': 'மின்னஞ்சல்',
        'wholesalers.form_address': 'முகவரி',
        'wholesalers.form_category': 'வகை',
        'wholesalers.select_option': 'தேர்ந்தெடு...',
        'wholesalers.cancel_btn': 'ரத்து செய்',
        'wholesalers.save_btn': 'சேமி',
        'wholesalers.view_details_title': 'மொத்த விற்பனையாளர் விவரங்கள்',
        'wholesalers.delete_title': 'மொத்த விற்பனையாளரை நீக்கு',
        'wholesalers.delete_confirmation_msg': 'இந்த மொத்த விற்பனையாளரை நீக்குவதில் உறுதியாக உள்ளீர்களா? இந்த செயலை மீண்டும் செய்ய முடியாது.',
        'wholesalers.delete_btn': 'நீக்கு',
        'wholesalers.no_wholesales_found': 'மொத்த விற்பனையாளர்கள் எதுவும் கிடைக்கவில்லை',
        'wholesalers.alert_name_required': 'மொத்த விற்பனையாளர் பெயர் தேவை',
        'wholesalers.wholesale_id_label': 'மொத்த விற்பனையாளர் அடையாளம்',
        'wholesalers.name_label': 'பெயர்',
        'wholesalers.phone_label': 'தொலைபேசி',
        'wholesalers.email_label': 'மின்னஞ்சல்',
        'wholesalers.address_label': 'முகவரி',
        'wholesalers.category_label': 'வகை',

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