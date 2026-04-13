<?php
// ============================================
// File: modules/customers/index.php
// Description: Customers management page
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Customers | Qty Management';
ob_start();
?>

<script src="../../assets/js/customers/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8">
  <div class="space-y-6">

    <div>
      <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="customers_title">Customers</h1>
      <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="customers_subtitle">Manage your customer base, view orders, and track engagement</p>
    </div>
        
    <!-- Header + Search + Add Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="relative w-full sm:w-72">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <input type="text" id="searchInput" data-i18n-placeholder="search_placeholder" placeholder="Search by name, email, phone or ID..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <button id="addCustomerBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        <span data-i18n="add_customer_btn">Add Customer</span>
      </button>
    </div>

    <!-- Customers Table / Cards container -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
      <!-- Mobile Card View -->
      <div id="mobileCustomersContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
      <!-- Desktop Table View -->
      <div class="hidden md:block overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="border-b border-slate-200 dark:border-slate-700">
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="table_header_id">ID</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="table_header_name">Name</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="table_header_email">Email</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="table_header_phone">Phone</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="table_header_city">City</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="table_header_actions">Actions</th>
            </tr>
          </thead>
          <tbody id="customersTableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- ============================================= -->
<!-- ADD / EDIT MODAL (unified for create and edit) -->
<!-- ============================================= -->
<div id="customerModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
  <div class="fixed inset-0 bg-black/50" id="customerModalBackdrop"></div>
  <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
    <div class="flex-1 sm:hidden"></div>
    <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden">
      <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
        <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="add_customer_title">Add Customer</h2>
        <button class="closeCustomerModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto max-h-[calc(90vh-140px)]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_customer_id">Customer ID</label>
            <input type="text" id="customer_id" disabled class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-60 disabled:cursor-not-allowed font-mono">
            <p class="text-xs text-slate-500 mt-1" data-i18n="auto_generated_hint">Auto-generated</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_full_name">Full Name *</label>
            <input type="text" id="full_name" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_phone">Phone *</label>
            <input type="text" id="phone" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_email">Email *</label>
            <input type="email" id="email" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_city">City</label>
            <input type="text" id="city" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_district">District</label>
            <input type="text" id="district" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_postal_code">Postal Code</label>
            <input type="text" id="postal_code" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_address">Address</label>
            <input type="text" id="address" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_notes">Notes</label>
            <textarea id="notes" rows="3" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
          </div>
        </div>
      </div>
      <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
        <button class="closeCustomerModalBtn px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel_btn">Cancel</button>
        <button id="saveCustomerBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors" data-i18n="save_btn">Save Customer</button>
      </div>
    </div>
  </div>
</div>

<!-- VIEW CUSTOMER MODAL -->
<div id="viewModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
  <div class="fixed inset-0 bg-black/50" id="viewModalBackdrop"></div>
  <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
    <div class="flex-1 sm:hidden"></div>
    <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-lg max-h-[90vh] overflow-hidden">
      <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="view_details_title">Customer Details</h2>
        <button class="closeViewModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
      </div>
      <div id="viewModalContent" class="p-4 space-y-4"></div>
    </div>
  </div>
</div>

<!-- DELETE CONFIRM MODAL (exactly as requested) -->
<div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
  <div class="fixed inset-0 bg-black/50 transition-opacity" id="deleteModalBackdrop"></div>
  <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
    <div class="flex-1 sm:hidden"></div>
    <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md overflow-hidden">
      <div class="p-6">
        <div class="flex items-center justify-center mb-4">
          <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
          </div>
        </div>
        <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2" data-i18n="delete_title">Delete Customer</h3>
        <p class="text-center text-slate-500 dark:text-slate-400 mb-6" data-i18n="delete_confirmation_msg">Are you sure you want to delete this customer? This action cannot be undone.</p>
        <div class="flex gap-3">
          <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel_btn">Cancel</button>
          <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm" data-i18n="delete_btn">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // ---------- MOCK DATA ----------
  let customers = [
    { customer_id: 'CUM-2024-001', business_id: 'biz1', full_name: 'John Smith', phone: '+1234567890', email: 'john@example.com', address: '123 Main St', city: 'New York', district: 'Manhattan', postal_code: '10001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
    { customer_id: 'CUM-2024-002', business_id: 'biz1', full_name: 'Sarah Johnson', phone: '+1234567891', email: 'sarah@example.com', address: '456 Oak Ave', city: 'Los Angeles', district: 'Downtown', postal_code: '90001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
    { customer_id: 'CUM-2024-003', business_id: 'biz1', full_name: 'Mike Brown', phone: '+1234567892', email: 'mike@example.com', address: '789 Pine Rd', city: 'Chicago', district: 'Loop', postal_code: '60601', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
    { customer_id: 'CUM-2024-004', business_id: 'biz1', full_name: 'Emily Davis', phone: '+1234567893', email: 'emily@example.com', address: '321 Elm St', city: 'Houston', district: 'Midtown', postal_code: '77001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
    { customer_id: 'CUM-2024-005', business_id: 'biz1', full_name: 'Chris Wilson', phone: '+1234567894', email: 'chris@example.com', address: '654 Cedar Ln', city: 'Phoenix', district: 'Central', postal_code: '85001', notes: '', created_by: '1', createdAt: new Date(), updatedAt: new Date() }
  ];

  // Helper: generate next customer ID (CUM-YYYY-XXX)
  function generateCustomerId() {
    const year = new Date().getFullYear();
    const existingForYear = customers.filter(c => c.customer_id.startsWith(`CUM-${year}-`));
    const numbers = existingForYear.map(c => parseInt(c.customer_id.split('-')[2])).filter(n => !isNaN(n));
    const nextNum = numbers.length > 0 ? Math.max(...numbers) + 1 : 1;
    return `CUM-${year}-${String(nextNum).padStart(3, '0')}`;
  }

  let currentDeleteCustomerId = null;
  let editingCustomerId = null;

  // Render customers (desktop + mobile)
  function renderCustomers() {
    const searchQuery = document.getElementById('searchInput').value.toLowerCase();
    const filtered = customers.filter(c => 
      c.full_name.toLowerCase().includes(searchQuery) ||
      c.email.toLowerCase().includes(searchQuery) ||
      c.phone.includes(searchQuery) ||
      c.customer_id.toLowerCase().includes(searchQuery)
    );

    // Desktop table
    const tbody = document.getElementById('customersTableBody');
    tbody.innerHTML = filtered.length ? filtered.map(c => `
      <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
        <td class="px-4 py-3 text-sm font-mono text-slate-900 dark:text-white">${c.customer_id}</td>
        <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-white">${escapeHtml(c.full_name)}</td>
        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(c.email)}</td>
        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(c.phone)}</td>
        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(c.city || '—')}</td>
        <td class="px-4 py-3">
          <div class="flex items-center gap-2">
            <button onclick="viewCustomer('${c.customer_id}')" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="View">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </button>
            <button onclick="openEditCustomer('${c.customer_id}')" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="Edit">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </button>
            <button onclick="deleteCustomerPrompt('${c.customer_id}')" class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg" title="Delete">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
          </div>
        </td>
      </tr>
    `).join('') : '<tr><td colspan="6" class="px-4 py-8 text-center text-slate-500">No customers found</td></tr>';

    // Mobile cards
    const mobileContainer = document.getElementById('mobileCustomersContainer');
    mobileContainer.innerHTML = filtered.length ? filtered.map(c => `
      <div class="p-4 space-y-3">
        <div class="flex items-center justify-between">
          <div class="font-medium text-slate-900 dark:text-white">${escapeHtml(c.full_name)}</div>
          <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-mono">${c.customer_id}</span>
        </div>
        <div class="grid grid-cols-2 gap-2 text-sm">
          <div><span class="text-slate-500 text-xs block">Email</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(c.email)}</span></div>
          <div><span class="text-slate-500 text-xs block">Phone</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(c.phone)}</span></div>
          <div><span class="text-slate-500 text-xs block">City</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(c.city || '—')}</span></div>
        </div>
        <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-700">
          <button onclick="viewCustomer('${c.customer_id}')" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
          <button onclick="openEditCustomer('${c.customer_id}')" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
          <button onclick="deleteCustomerPrompt('${c.customer_id}')" class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
        </div>
      </div>
    `).join('') : '<div class="p-8 text-center text-slate-500">No customers found</div>';
  }

  // Helper to escape HTML
  function escapeHtml(str) { if(!str) return ''; return str.replace(/[&<>]/g, function(m) { if(m === '&') return '&amp;'; if(m === '<') return '&lt;'; if(m === '>') return '&gt;'; return m;}); }

  // View Customer
  window.viewCustomer = (id) => {
    const customer = customers.find(c => c.customer_id === id);
    if(!customer) return;
    const container = document.getElementById('viewModalContent');
    container.innerHTML = `
      <div class="grid grid-cols-2 gap-4">
        <div><p class="text-sm text-slate-500">${t('customer_id_label')}</p><p class="font-medium font-mono">${customer.customer_id}</p></div>
        <div><p class="text-sm text-slate-500">${t('full_name_label')}</p><p class="font-medium">${escapeHtml(customer.full_name)}</p></div>
        <div><p class="text-sm text-slate-500">${t('phone_label')}</p><p class="font-medium">${escapeHtml(customer.phone)}</p></div>
        <div><p class="text-sm text-slate-500">${t('email_label')}</p><p class="font-medium">${escapeHtml(customer.email)}</p></div>
        <div><p class="text-sm text-slate-500">${t('city_label')}</p><p class="font-medium">${escapeHtml(customer.city || '—')}</p></div>
        <div><p class="text-sm text-slate-500">${t('district_label')}</p><p class="font-medium">${escapeHtml(customer.district || '—')}</p></div>
        <div><p class="text-sm text-slate-500">${t('postal_code_label')}</p><p class="font-medium">${escapeHtml(customer.postal_code || '—')}</p></div>
        <div class="col-span-2"><p class="text-sm text-slate-500">${t('address_label')}</p><p class="font-medium">${escapeHtml(customer.address || '—')}</p></div>
        ${customer.notes ? `<div class="col-span-2"><p class="text-sm text-slate-500">${t('notes_label')}</p><p class="font-medium">${escapeHtml(customer.notes)}</p></div>` : ''}
      </div>
    `;
    document.getElementById('viewModal').classList.remove('hidden');
  };

  // Open Add/Edit Modal
  function openCustomerModal(editId = null) {
    editingCustomerId = editId;
    const modal = document.getElementById('customerModal');
    const title = document.getElementById('modalTitle');
    if(editId) {
      const cust = customers.find(c => c.customer_id === editId);
      if(cust) {
        title.innerText = 'Edit Customer';
        document.getElementById('customer_id').value = cust.customer_id;
        document.getElementById('full_name').value = cust.full_name;
        document.getElementById('phone').value = cust.phone;
        document.getElementById('email').value = cust.email;
        document.getElementById('city').value = cust.city || '';
        document.getElementById('district').value = cust.district || '';
        document.getElementById('postal_code').value = cust.postal_code || '';
        document.getElementById('address').value = cust.address || '';
        document.getElementById('notes').value = cust.notes || '';
      }
    } else {
      title.innerText = 'Add Customer';
      document.getElementById('customer_id').value = generateCustomerId();
      document.getElementById('full_name').value = '';
      document.getElementById('phone').value = '';
      document.getElementById('email').value = '';
      document.getElementById('city').value = '';
      document.getElementById('district').value = '';
      document.getElementById('postal_code').value = '';
      document.getElementById('address').value = '';
      document.getElementById('notes').value = '';
    }
    modal.classList.remove('hidden');
  }

  window.openEditCustomer = (id) => openCustomerModal(id);
  document.getElementById('addCustomerBtn').onclick = () => openCustomerModal(null);

  // Save customer (Create or Update)
  function saveCustomer() {
    const full_name = document.getElementById('full_name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();
    if(!full_name || !phone || !email) { alert('Please fill in name, phone and email'); return; }
    
    const formData = {
      full_name, phone, email,
      city: document.getElementById('city').value,
      district: document.getElementById('district').value,
      postal_code: document.getElementById('postal_code').value,
      address: document.getElementById('address').value,
      notes: document.getElementById('notes').value,
    };
    
    if(editingCustomerId) {
      // update
      customers = customers.map(c => c.customer_id === editingCustomerId ? { ...c, ...formData, updatedAt: new Date() } : c);
    } else {
      // create
      const newId = generateCustomerId();
      const newCustomer = {
        customer_id: newId,
        business_id: 'biz1',
        ...formData,
        created_by: '1',
        createdAt: new Date(),
        updatedAt: new Date(),
      };
      customers.push(newCustomer);
    }
    renderCustomers();
    closeCustomerModal();
  }

  function closeCustomerModal() {
    document.getElementById('customerModal').classList.add('hidden');
    editingCustomerId = null;
  }

  // Delete confirmation
  window.deleteCustomerPrompt = (id) => {
    currentDeleteCustomerId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
  };

  function closeDeleteModal() { document.getElementById('deleteModal').classList.add('hidden'); currentDeleteCustomerId = null; }
  document.getElementById('confirmDeleteBtn').onclick = () => {
    if(currentDeleteCustomerId) {
      customers = customers.filter(c => c.customer_id !== currentDeleteCustomerId);
      renderCustomers();
      closeDeleteModal();
      // if view modal open with deleted customer, close it
      document.getElementById('viewModal').classList.add('hidden');
    }
  };
  document.getElementById('cancelDeleteBtn').onclick = closeDeleteModal;
  document.getElementById('deleteModalBackdrop').onclick = closeDeleteModal;
  
  // Close modals backdrop & buttons
  document.querySelectorAll('.closeCustomerModalBtn, #customerModalBackdrop').forEach(el => el?.addEventListener('click', closeCustomerModal));
  document.querySelectorAll('.closeViewModalBtn, #viewModalBackdrop').forEach(el => el?.addEventListener('click', () => document.getElementById('viewModal').classList.add('hidden')));
  document.getElementById('saveCustomerBtn').onclick = saveCustomer;
  document.getElementById('searchInput').addEventListener('input', renderCustomers);
  
  // Initial render
  renderCustomers();
</script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen ">';
echo $content;
include '../../includes/footer.php';
?>