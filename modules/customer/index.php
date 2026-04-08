<?php
// ============================================
// File: modules/customers/index.php
// Description: Customers management page
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Customers | Qty Management';
ob_start();
?>

<script src="../../assets/js/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section with Gradient Accent -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="customers_title">Customers</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="customers_subtitle">Manage your customer base, view orders, and track engagement</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <button onclick="exportCustomers()" class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 px-4 py-2 rounded-xl flex items-center gap-2 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span data-i18n="export_btn">Export</span>
            </button>
            <button id="openAddCustomerBtn" class="bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white px-5 py-2 rounded-xl flex items-center gap-2 transition shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span data-i18n="add_customer_btn">Add Customer</span>
            </button>
        </div>
    </div>

   
    <!-- Search, Filter, and Table -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <!-- Toolbar -->
        <div class="p-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/30">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="relative flex-1 max-w-md">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" id="searchInput" placeholder="Search by name, email, phone, or city..." class="w-full pl-9 pr-4 py-2 border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-400">
                </div>
                <div class="flex flex-wrap gap-3">
                    <select id="districtFilter" class="px-4 py-2 border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <option value="" data-i18n="all_districts_option">All Districts</option>
                        <option>Colombo</option>
                        <option>Gampaha</option>
                        <option>Kalutara</option>
                        <option>Kandy</option>
                        <option>Galle</option>
                        <option>Matara</option>
                        <option>Kurunegala</option>
                        <option>Anuradhapura</option>
                    </select>
                    <select id="statusFilter" class="px-4 py-2 border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <option value="" data-i18n="all_status_option">All Status</option>
                        <option value="active" data-i18n="active_option">Active</option>
                        <option value="inactive" data-i18n="inactive_option">Inactive</option>
                    </select>
                    <button onclick="resetFilters()" class="px-4 py-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition"><span data-i18n="reset_btn">Reset</span></button>
                </div>
            </div>
        </div>

        <!-- Customers List: Mobile card + Desktop Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
            <!-- Mobile Card View -->
            <div id="mobileCustomerList" class="md:hidden divide-y divide-gray-200 dark:divide-gray-700"></div>
            <!-- Desktop Table View -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/30">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider" data-i18n="table_header_id">ID</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider" data-i18n="table_header_name">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider" data-i18n="table_header_email">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider" data-i18n="table_header_phone">Phone</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider" data-i18n="table_header_city">City</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider" data-i18n="table_header_actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="desktopCustomerTableBody" class="divide-y divide-gray-200 dark:divide-gray-700"></tbody>
                </table>
            </div>
            <!-- Empty state message (both views) handled by JS -->
        </div>
    </div>
</div>

<!-- ADD/EDIT MODAL -->
<div id="customerModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalDismissAreaTop"></div>
        <div class="relative w-full bg-white dark:bg-gray-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-gray-300 dark:bg-gray-600 rounded-full sm:hidden"></div>
                <h2 id="modalTitle" class="text-lg font-semibold text-gray-900 dark:text-white pt-2 sm:pt-0" data-i18n="add_customer_title">Add Customer</h2>
                <button id="closeModalBtn" class="p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto max-h-[calc(80vh-140px)]">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_customer_id">Customer ID</label>
                        <input type="text" id="customerId" readonly disabled class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 disabled:opacity-60 disabled:cursor-not-allowed font-mono">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1" data-i18n="form_customer_id_hint">Auto-generated</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_full_name">Full Name *</label>
                        <input type="text" id="fullName" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_phone">Phone *</label>
                        <input type="text" id="phone" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_email">Email</label>
                        <input type="email" id="email" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_city">City</label>
                        <input type="text" id="city" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_district">District</label>
                        <input type="text" id="district" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_postal_code">Postal Code</label>
                        <input type="text" id="postalCode" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_address">Address</label>
                        <input type="text" id="address" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5" data-i18n="form_notes">Notes</label>
                        <textarea id="notes" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"></textarea>
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-gray-200 dark:border-gray-700">
                <button id="cancelModalBtn" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"><span data-i18n="cancel_btn">Cancel</span></button>
                <button id="saveCustomerBtn" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors shadow-sm"><span data-i18n="save_btn">Save Customer</span></button>
            </div>
        </div>
    </div>
</div>

<!-- VIEW MODAL (Details) -->
<div id="viewModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="viewDismissTop"></div>
        <div class="relative w-full bg-white dark:bg-gray-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-lg max-h-[90vh] overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-gray-300 dark:bg-gray-600 rounded-full sm:hidden"></div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white pt-2 sm:pt-0" data-i18n="view_details_title">Customer Details</h2>
                <button id="closeViewModalBtn" class="p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 space-y-4" id="viewDetailsContainer"></div>
        </div>
    </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="deleteModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden"></div>
        <div class="relative w-full bg-white dark:bg-gray-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-center text-gray-900 dark:text-white mb-2" data-i18n="delete_title">Delete Customer</h3>
                <p class="text-center text-gray-500 dark:text-gray-400 mb-6" data-i18n="delete_confirmation_msg">Are you sure you want to delete this customer? This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"><span data-i18n="cancel_btn">Cancel</span></button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm"><span data-i18n="delete_btn">Delete</span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ---------- Data Model ----------
    let customers = [
        { customer_id: 'CUM-2024-001', business_id: 'biz1', full_name: 'John Smith', phone: '+1234567890', email: 'john@example.com', address: '123 Main St', city: 'New York', district: 'Manhattan', postal_code: '10001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
        { customer_id: 'CUM-2024-002', business_id: 'biz1', full_name: 'Sarah Johnson', phone: '+1234567891', email: 'sarah@example.com', address: '456 Oak Ave', city: 'Los Angeles', district: 'Downtown', postal_code: '90001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
        { customer_id: 'CUM-2024-003', business_id: 'biz1', full_name: 'Mike Brown', phone: '+1234567892', email: 'mike@example.com', address: '789 Pine Rd', city: 'Chicago', district: 'Loop', postal_code: '60601', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
        { customer_id: 'CUM-2024-004', business_id: 'biz1', full_name: 'Emily Davis', phone: '+1234567893', email: 'emily@example.com', address: '321 Elm St', city: 'Houston', district: 'Midtown', postal_code: '77001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
        { customer_id: 'CUM-2024-005', business_id: 'biz1', full_name: 'Chris Wilson', phone: '+1234567894', email: 'chris@example.com', address: '654 Cedar Ln', city: 'Phoenix', district: 'Central', postal_code: '85001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() }
    ];

    // helper: generate new customer ID similar to original logic (CUM-YYYY-XXX)
    function generateCustomerId() {
        const year = new Date().getFullYear();
        const existingIds = customers.filter(c => c.customer_id.startsWith(`CUM-${year}-`)).map(c => {
            const match = c.customer_id.match(/CUM-(\d{4})-(\d{3})/);
            return match ? parseInt(match[2]) : 0;
        }).filter(n => n > 0);
        const nextNum = existingIds.length > 0 ? Math.max(...existingIds) + 1 : 1;
        return `CUM-${year}-${String(nextNum).padStart(3, '0')}`;
    }

    let currentEditCustomerId = null; // null = add mode
    let pendingDeleteId = null; // Store ID for deletion

    // DOM Elements
    const searchInput = document.getElementById('searchInput');
    const districtFilter = document.getElementById('districtFilter');
    const statusFilter = document.getElementById('statusFilter');
    const mobileContainer = document.getElementById('mobileCustomerList');
    const desktopTbody = document.getElementById('desktopCustomerTableBody');
    const modal = document.getElementById('customerModal');
    const viewModal = document.getElementById('viewModal');
    const deleteModal = document.getElementById('deleteModal');
    const openAddBtn = document.getElementById('openAddCustomerBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelModalBtn = document.getElementById('cancelModalBtn');
    const saveBtn = document.getElementById('saveCustomerBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalDismissTop = document.getElementById('modalDismissAreaTop');
    const viewBackdrop = document.getElementById('viewModalBackdrop');
    const closeViewBtn = document.getElementById('closeViewModalBtn');
    const viewDismissTop = document.getElementById('viewDismissTop');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');

    // Form fields
    const customerIdField = document.getElementById('customerId');
    const fullNameField = document.getElementById('fullName');
    const phoneField = document.getElementById('phone');
    const emailField = document.getElementById('email');
    const cityField = document.getElementById('city');
    const districtField = document.getElementById('district');
    const postalCodeField = document.getElementById('postalCode');
    const addressField = document.getElementById('address');
    const notesField = document.getElementById('notes');
    const modalTitle = document.getElementById('modalTitle');

    // Stats fields
    const totalCustomersSpan = document.getElementById('totalCustomers');
    const activeCustomersSpan = document.getElementById('activeCustomers');
    const totalOrdersSpan = document.getElementById('totalOrders');
    const lifetimeValueSpan = document.getElementById('lifetimeValue');

    // Update stats
    function updateStats() {
        totalCustomersSpan.textContent = customers.length;
        // For demo, assume all customers are active
        activeCustomersSpan.textContent = customers.length;
        // Mock stats - in real app, these would come from orders data
        totalOrdersSpan.textContent = Math.floor(customers.length * 2.5);
        lifetimeValueSpan.textContent = `$${(customers.length * 1250).toLocaleString()}`;
    }

    // Helpers: render lists
    function render() {
        let filtered = [...customers];
        
        // Apply search filter
        const query = searchInput.value.toLowerCase();
        if (query) {
            filtered = filtered.filter(c => 
                c.full_name.toLowerCase().includes(query) ||
                c.email.toLowerCase().includes(query) ||
                c.phone.includes(query) ||
                c.customer_id.toLowerCase().includes(query) ||
                (c.city && c.city.toLowerCase().includes(query))
            );
        }
        
        // Apply district filter
        const district = districtFilter.value;
        if (district) {
            filtered = filtered.filter(c => c.district === district);
        }
        
        // Apply status filter (mock - all customers are active for demo)
        const status = statusFilter.value;
        if (status === 'active') {
            // All are active in demo
        } else if (status === 'inactive') {
            filtered = [];
        }
        
        // render mobile
        if (filtered.length === 0) {
            mobileContainer.innerHTML = `<div class="p-8 text-center text-gray-500 dark:text-gray-400">No customers found</div>`;
            desktopTbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">No customers found</td></tr>`;
            return;
        }
        
        // mobile cards
        mobileContainer.innerHTML = filtered.map(c => `
            <div class="p-4 space-y-3 border-b border-gray-100 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="font-medium text-gray-900 dark:text-white">${escapeHtml(c.full_name)}</div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-mono">${c.customer_id}</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><span class="text-gray-500 dark:text-gray-400 text-xs block">Email</span><span class="text-gray-700 dark:text-gray-300 break-all">${escapeHtml(c.email) || '-'}</span></div>
                    <div><span class="text-gray-500 dark:text-gray-400 text-xs block">Phone</span><span class="text-gray-700 dark:text-gray-300">${escapeHtml(c.phone)}</span></div>
                    <div><span class="text-gray-500 dark:text-gray-400 text-xs block">City</span><span class="text-gray-700 dark:text-gray-300">${escapeHtml(c.city) || '-'}</span></div>
                    <div><span class="text-gray-500 dark:text-gray-400 text-xs block">District</span><span class="text-gray-700 dark:text-gray-300">${escapeHtml(c.district) || '-'}</span></div>
                </div>
                <div class="flex items-center gap-2 pt-2 border-t border-gray-100 dark:border-gray-700">
                    <button data-id="${c.customer_id}" data-action="view" class="action-btn p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition" title="View Details">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                    <button data-id="${c.customer_id}" data-action="edit" class="action-btn p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition" title="Edit Customer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </button>
                    <button data-id="${c.customer_id}" data-action="delete" class="action-btn p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition" title="Delete Customer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `).join('');
        
        // desktop rows
        desktopTbody.innerHTML = filtered.map(c => `
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                <td class="px-4 py-3 text-sm text-gray-900 dark:text-white font-mono">${c.customer_id}</td>
                <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">${escapeHtml(c.full_name)}</td>
                <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-300">${escapeHtml(c.email) || '-'}</td>
                <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-300">${escapeHtml(c.phone)}</td>
                <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-300">${escapeHtml(c.city) || '-'}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-1">
                        <button data-id="${c.customer_id}" data-action="view" class="action-btn p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition" title="View Details">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        <button data-id="${c.customer_id}" data-action="edit" class="action-btn p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition" title="Edit Customer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button data-id="${c.customer_id}" data-action="delete" class="action-btn p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition" title="Delete Customer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');

        // attach event listeners to dynamic buttons
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.removeEventListener('click', handleActionClick);
            btn.addEventListener('click', handleActionClick);
        });
        
        // Update stats after render
        updateStats();
    }

    function handleActionClick(e) {
        const btn = e.currentTarget;
        const id = btn.getAttribute('data-id');
        const action = btn.getAttribute('data-action');
        if (action === 'view') {
            const customer = customers.find(c => c.customer_id === id);
            if (customer) showViewModal(customer);
        } else if (action === 'edit') {
            const customer = customers.find(c => c.customer_id === id);
            if (customer) openEditModal(customer);
        } else if (action === 'delete') {
            pendingDeleteId = id;
            openDeleteModal();
        }
    }

    function escapeHtml(str) { 
        if (!str) return ''; 
        return str.replace(/[&<>]/g, function(m) { 
            if (m === '&') return '&amp;'; 
            if (m === '<') return '&lt;'; 
            if (m === '>') return '&gt;'; 
            return m;
        });
    }

    function showViewModal(customer) {
        const container = document.getElementById('viewDetailsContainer');
        container.innerHTML = `
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1">
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Customer ID</p>
                    <p class="font-medium font-mono text-gray-900 dark:text-white mt-1">${escapeHtml(customer.customer_id)}</p>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Full Name</p>
                    <p class="font-medium text-gray-900 dark:text-white mt-1">${escapeHtml(customer.full_name)}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Phone</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">${escapeHtml(customer.phone)}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Email</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1 break-all">${escapeHtml(customer.email) || '-'}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">City</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">${escapeHtml(customer.city) || '-'}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">District</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">${escapeHtml(customer.district) || '-'}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Postal Code</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">${escapeHtml(customer.postal_code) || '-'}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Address</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">${escapeHtml(customer.address) || '-'}</p>
                </div>
                ${customer.notes ? `<div class="col-span-2">
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Notes</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1 whitespace-pre-wrap">${escapeHtml(customer.notes)}</p>
                </div>` : ''}
            </div>
        `;
        viewModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function openEditModal(customer) {
        currentEditCustomerId = customer.customer_id;
        modalTitle.innerText = 'Edit Customer';
        customerIdField.value = customer.customer_id;
        fullNameField.value = customer.full_name;
        phoneField.value = customer.phone;
        emailField.value = customer.email || '';
        cityField.value = customer.city || '';
        districtField.value = customer.district || '';
        postalCodeField.value = customer.postal_code || '';
        addressField.value = customer.address || '';
        notesField.value = customer.notes || '';
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function openAddModal() {
        currentEditCustomerId = null;
        modalTitle.innerText = 'Add Customer';
        const newId = generateCustomerId();
        customerIdField.value = newId;
        fullNameField.value = '';
        phoneField.value = '';
        emailField.value = '';
        cityField.value = '';
        districtField.value = '';
        postalCodeField.value = '';
        addressField.value = '';
        notesField.value = '';
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function closeViewModalFunc() {
        viewModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function openDeleteModal() {
        deleteModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteModal() {
        deleteModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        pendingDeleteId = null;
    }

    function confirmDelete() {
        if (pendingDeleteId) {
            customers = customers.filter(c => c.customer_id !== pendingDeleteId);
            closeDeleteModal();
            render();
        }
    }

    function saveCustomer() {
        const full_name = fullNameField.value.trim();
        const phone = phoneField.value.trim();
        if (!full_name || !phone) {
            alert('Please fill in Name and Phone');
            return;
        }
        const commonData = {
            full_name: full_name,
            phone: phoneField.value.trim(),
            email: emailField.value.trim(),
            address: addressField.value.trim(),
            city: cityField.value.trim(),
            district: districtField.value.trim(),
            postal_code: postalCodeField.value.trim(),
            notes: notesField.value.trim(),
            updatedAt: new Date(),
        };
        if (currentEditCustomerId) {
            // update
            customers = customers.map(c => c.customer_id === currentEditCustomerId ? { ...c, ...commonData, updatedAt: new Date() } : c);
        } else {
            // add new
            const newId = generateCustomerId();
            const newCustomer = {
                customer_id: newId,
                business_id: 'biz1',
                ...commonData,
                created_by: '1',
                createdAt: new Date(),
                updatedAt: new Date(),
            };
            customers.push(newCustomer);
        }
        closeModal();
        render();
    }

    function resetFilters() {
        searchInput.value = '';
        districtFilter.value = '';
        statusFilter.value = '';
        render();
    }

    function exportCustomers() {
        alert('Export functionality will be implemented here');
    }

    // Make functions global for inline onclick handlers
    window.resetFilters = resetFilters;
    window.exportCustomers = exportCustomers;
    window.openCustomerModal = openAddModal;

    // event listeners
    openAddBtn.addEventListener('click', openAddModal);
    closeModalBtn.addEventListener('click', closeModal);
    cancelModalBtn.addEventListener('click', closeModal);
    modalBackdrop?.addEventListener('click', closeModal);
    modalDismissTop?.addEventListener('click', closeModal);
    saveBtn.addEventListener('click', saveCustomer);
    closeViewBtn.addEventListener('click', closeViewModalFunc);
    viewBackdrop?.addEventListener('click', closeViewModalFunc);
    viewDismissTop?.addEventListener('click', closeViewModalFunc);
    cancelDeleteBtn.addEventListener('click', closeDeleteModal);
    confirmDeleteBtn.addEventListener('click', confirmDelete);
    deleteModalBackdrop?.addEventListener('click', closeDeleteModal);
    searchInput.addEventListener('input', () => render());
    districtFilter.addEventListener('change', () => render());
    statusFilter.addEventListener('change', () => render());

    // initial render
    render();

    // Block body scroll when modal opens via class management
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (!modal.classList.contains('hidden')) closeModal();
            if (!viewModal.classList.contains('hidden')) closeViewModalFunc();
            if (!deleteModal.classList.contains('hidden')) closeDeleteModal();
        }
    });
</script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen bg-slate-100 dark:bg-slate-900">';
echo $content;
include '../../includes/footer.php';
?>