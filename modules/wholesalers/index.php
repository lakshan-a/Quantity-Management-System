<?php
// ============================================
// File: modules/wholesalers/index.php
// Description: Wholesalers management
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Wholesalers | Qty Management';
ob_start();
?>

  <script src="../../assets/js/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- MAIN PAGE CONTAINER - equivalent to WholesalePage component -->
    <div class="space-y-6">
      
        <!-- Header: Search + Add Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="relative w-full sm:w-72">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 6a5 5 0 100 10 5 5 0 000-10z" />
                </svg>
                <input type="text" id="searchInput" data-i18n-placeholder="search_placeholder" placeholder="Search wholesales..." 
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <button id="openAddModalBtn" 
                class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span data-i18n="add_wholesale_btn">Add Wholesale</span>
            </button>
        </div>

        <!-- Wholesale Table / Card View (responsive) -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            
            <!-- Mobile card layout (visible below md) -->
            <div id="mobileCardContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>

            <!-- Desktop table layout (hidden on mobile, visible md+) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_id">Wholesale ID</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_name">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_email">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_phone">Phone</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_address">Address</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
                </table>
            </div>

            <!-- Empty state (will be shown via JS if needed) -->
            <div id="emptyStateDesktop" class="hidden text-center py-12 text-slate-500 dark:text-slate-400" data-i18n="no_wholesales_found">No wholesales found</div>
        </div>
    </div>
</div>

<!-- ================= MODAL: ADD / EDIT ================= -->
<div id="formModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalDismissArea"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-lg max-h-[90vh] overflow-hidden flex flex-col">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="add_wholesale_title">Add Wholesale</h2>
                <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            <!-- Modal Body (scrollable) -->
            <div class="p-4 overflow-y-auto flex-1 custom-scroll space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_wholesale_id">Wholesale ID</label>
                    <input type="text" id="wholesaleIdInput" disabled class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-60 disabled:cursor-not-allowed font-mono">
                    <p class="text-xs text-slate-500 mt-1" data-i18n="auto_generated_hint">Auto-generated</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_wholesale_name">Wholesale Name *</label>
                    <input type="text" id="wholesaleName" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_phone">Phone</label>
                        <input type="text" id="wholesalePhone" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_email">Email</label>
                        <input type="email" id="wholesaleEmail" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_address">Address</label>
                    <input type="text" id="wholesaleAddress" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_category">Category</label>
                    <select id="wholesaleCategory" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" data-i18n="select_option">Select...</option>
                        <option value="1">Electronics</option>
                        <option value="2">Clothing</option>
                        <option value="3">Home & Garden</option>
                        <option value="4">Sports</option>
                    </select>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="modalCancelBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors"><span data-i18n="cancel_btn">Cancel</span></button>
                <button id="modalSaveBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors"><span data-i18n="save_btn">Save</span></button>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODAL: VIEW DETAILS ================= -->
<div id="viewModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black/50" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="viewDismissArea"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md max-h-[90vh] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="view_details_title">Wholesale Details</h2>
                <button id="closeViewBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            <div class="p-4 space-y-4" id="viewContent">
                <!-- Dynamic view details injected -->
            </div>
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
                <h3 class="text-lg font-semibold text-center text-gray-900 dark:text-white mb-2" data-i18n="delete_title">Delete Wholesale</h3>
                <p class="text-center text-gray-500 dark:text-gray-400 mb-6" data-i18n="delete_confirmation_msg">Are you sure you want to delete this wholesale? This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"><span data-i18n="cancel_btn">Cancel</span></button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm"><span data-i18n="delete_btn">Delete</span></button>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
    // ---------- DATA MODEL ----------
    let wholesales = [
      { wholesale_id: 'WS-2024-001', business_id: 'biz1', wholesale_name: 'ABC Wholesale', phone: '+1234567890', email: 'abc@wholesale.com', address: '100 Industrial Blvd', category_id: '1', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
      { wholesale_id: 'WS-2024-002', business_id: 'biz1', wholesale_name: 'XYZ Distributors', phone: '+1234567891', email: 'xyz@dist.com', address: '200 Commerce St', category_id: '2', created_by: '1', createdAt: new Date(), updatedAt: new Date() },
      { wholesale_id: 'WS-2024-003', business_id: 'biz1', wholesale_name: 'Global Supplies', phone: '+1234567892', email: 'global@supplies.com', address: '300 Trade Ave', category_id: '1', created_by: '1', createdAt: new Date(), updatedAt: new Date() }
    ];

    const categoryMap = { '1': 'Electronics', '2': 'Clothing', '3': 'Home & Garden', '4': 'Sports' };

    // Helper: generate new ID similar to React logic
    function generateWholesaleId() {
      const year = new Date().getFullYear();
      const existingNums = wholesales
        .map(w => {
          const match = w.wholesale_id.match(/WS-(\d{4})-(\d{3})/);
          if (match && match[1] === year.toString()) return parseInt(match[2], 10);
          return 0;
        })
        .filter(n => n > 0);
      const nextNum = existingNums.length > 0 ? Math.max(...existingNums) + 1 : 1;
      return `WS-${year}-${String(nextNum).padStart(3, '0')}`;
    }

    // DOM Elements
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');
    const mobileContainer = document.getElementById('mobileCardContainer');
    const emptyDesktopDiv = document.getElementById('emptyStateDesktop');
    
    // Modal elements
    const formModal = document.getElementById('formModal');
    const modalTitle = document.getElementById('modalTitle');
    const wholesaleIdInput = document.getElementById('wholesaleIdInput');
    const wholesaleName = document.getElementById('wholesaleName');
    const wholesalePhone = document.getElementById('wholesalePhone');
    const wholesaleEmail = document.getElementById('wholesaleEmail');
    const wholesaleAddress = document.getElementById('wholesaleAddress');
    const wholesaleCategory = document.getElementById('wholesaleCategory');
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    const modalCancelBtn = document.getElementById('modalCancelBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalDismissArea = document.getElementById('modalDismissArea');
    
    // View modal
    const viewModal = document.getElementById('viewModal');
    const viewContent = document.getElementById('viewContent');
    const closeViewBtn = document.getElementById('closeViewBtn');
    const viewModalBackdrop = document.getElementById('viewModalBackdrop');
    const viewDismissArea = document.getElementById('viewDismissArea');
    
    // Delete modal elements
    const deleteModal = document.getElementById('deleteModal');
    const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    
    let currentEditId = null; // if null -> add mode
    let pendingDeleteId = null; // tracks wholesale to delete

    // Helper: render both views
    function renderWholesales() {
      const query = searchInput.value.trim().toLowerCase();
      let filtered = wholesales.filter(w => 
        w.wholesale_name.toLowerCase().includes(query) ||
        w.email.toLowerCase().includes(query) ||
        w.wholesale_id.toLowerCase().includes(query)
      );
      
      // Desktop table rendering
      if (filtered.length === 0) {
        tableBody.innerHTML = '';
        emptyDesktopDiv.classList.remove('hidden');
        mobileContainer.innerHTML = `<div class="p-8 text-center text-slate-500">No wholesales found</div>`;
        return;
      }
      emptyDesktopDiv.classList.add('hidden');
      
      // Desktop rows
      tableBody.innerHTML = filtered.map(w => `
        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
          <td class="px-4 py-3 text-sm text-slate-500 font-mono">${escapeHtml(w.wholesale_id)}</td>
          <td class="px-4 py-3 text-sm text-slate-900 dark:text-white font-medium">${escapeHtml(w.wholesale_name)}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(w.email)}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(w.phone)}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(w.address)}</td>
          <td class="px-4 py-3">
            <div class="flex items-center gap-2">
              <button data-view='${w.wholesale_id}' class="action-view p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </button>
              <button data-edit='${w.wholesale_id}' class="action-edit p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
              </button>
              <button data-delete='${w.wholesale_id}' class="action-delete p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
              </button>
            </div>
          </td>
         </tr>
      `).join('');
      
      // Mobile Cards
      mobileContainer.innerHTML = filtered.map(w => `
        <div class="p-4 space-y-3 border-b border-slate-200 dark:border-slate-700">
          <div class="flex items-center justify-between">
            <div class="font-medium text-slate-900 dark:text-white">${escapeHtml(w.wholesale_name)}</div>
            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-mono">${escapeHtml(w.wholesale_id)}</span>
          </div>
          <div class="grid grid-cols-2 gap-2 text-sm">
            <div><span class="text-slate-500 text-xs block">Email</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(w.email)}</span></div>
            <div><span class="text-slate-500 text-xs block">Phone</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(w.phone)}</span></div>
            <div class="col-span-2"><span class="text-slate-500 text-xs block">Address</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(w.address)}</span></div>
          </div>
          <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-700">
            <button data-view-mob='${w.wholesale_id}' class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
            </button>
            <button data-edit-mob='${w.wholesale_id}' class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
            </button>
            <button data-delete-mob='${w.wholesale_id}' class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            </button>
          </div>
        </div>
      `).join('');
      
      // attach event listeners dynamically
      attachTableEvents();
      attachMobileEvents();
    }
    
    function attachTableEvents() {
      document.querySelectorAll('.action-view').forEach(btn => {
        btn.removeEventListener('click', handleViewClick);
        btn.addEventListener('click', handleViewClick);
      });
      document.querySelectorAll('.action-edit').forEach(btn => {
        btn.removeEventListener('click', handleEditClick);
        btn.addEventListener('click', handleEditClick);
      });
      document.querySelectorAll('.action-delete').forEach(btn => {
        btn.removeEventListener('click', handleDeleteClick);
        btn.addEventListener('click', handleDeleteClick);
      });
    }
    
    function attachMobileEvents() {
      document.querySelectorAll('[data-view-mob]').forEach(btn => {
        btn.removeEventListener('click', (e) => handleViewFromId(btn.getAttribute('data-view-mob')));
        btn.addEventListener('click', () => handleViewFromId(btn.getAttribute('data-view-mob')));
      });
      document.querySelectorAll('[data-edit-mob]').forEach(btn => {
        btn.removeEventListener('click', (e) => handleEditFromId(btn.getAttribute('data-edit-mob')));
        btn.addEventListener('click', () => handleEditFromId(btn.getAttribute('data-edit-mob')));
      });
      document.querySelectorAll('[data-delete-mob]').forEach(btn => {
        btn.removeEventListener('click', (e) => handleDeleteFromId(btn.getAttribute('data-delete-mob')));
        btn.addEventListener('click', () => handleDeleteFromId(btn.getAttribute('data-delete-mob')));
      });
    }
    
    function handleViewClick(e) { const id = e.currentTarget.getAttribute('data-view'); openViewModal(id); }
    function handleEditClick(e) { const id = e.currentTarget.getAttribute('data-edit'); openEditModal(id); }
    function handleDeleteClick(e) { const id = e.currentTarget.getAttribute('data-delete'); showDeleteModal(id); }
    function handleViewFromId(id) { openViewModal(id); }
    function handleEditFromId(id) { openEditModal(id); }
    function handleDeleteFromId(id) { showDeleteModal(id); }
    
    // Show delete confirmation modal
    function showDeleteModal(id) {
      pendingDeleteId = id;
      deleteModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }
    
    // Close delete modal
    function closeDeleteModal() {
      deleteModal.classList.add('hidden');
      pendingDeleteId = null;
      document.body.style.overflow = '';
    }
    
    // Perform delete action
    function performDelete() {
      if (pendingDeleteId) {
        wholesales = wholesales.filter(w => w.wholesale_id !== pendingDeleteId);
        renderWholesales();
        closeDeleteModal();
      }
    }
    
    function openViewModal(id) {
      const wholesale = wholesales.find(w => w.wholesale_id === id);
      if (!wholesale) return;
      viewContent.innerHTML = `
        <div class="grid grid-cols-2 gap-4">
          <div><p class="text-sm text-slate-500">Wholesale ID</p><p class="font-medium text-slate-900 dark:text-white font-mono">${escapeHtml(wholesale.wholesale_id)}</p></div>
          <div><p class="text-sm text-slate-500">Name</p><p class="font-medium text-slate-900 dark:text-white">${escapeHtml(wholesale.wholesale_name)}</p></div>
          <div><p class="text-sm text-slate-500">Phone</p><p class="font-medium text-slate-900 dark:text-white">${escapeHtml(wholesale.phone)}</p></div>
          <div><p class="text-sm text-slate-500">Email</p><p class="font-medium text-slate-900 dark:text-white">${escapeHtml(wholesale.email)}</p></div>
          <div class="col-span-2"><p class="text-sm text-slate-500">Address</p><p class="font-medium text-slate-900 dark:text-white">${escapeHtml(wholesale.address)}</p></div>
          <div class="col-span-2"><p class="text-sm text-slate-500">Category</p><p class="font-medium text-slate-900 dark:text-white">${categoryMap[wholesale.category_id] || 'Uncategorized'}</p></div>
        </div>
      `;
      viewModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }
    
    function openEditModal(id) {
      const wholesale = wholesales.find(w => w.wholesale_id === id);
      if (wholesale) {
        currentEditId = id;
        modalTitle.innerText = 'Edit Wholesale';
        wholesaleIdInput.value = wholesale.wholesale_id;
        wholesaleName.value = wholesale.wholesale_name;
        wholesalePhone.value = wholesale.phone;
        wholesaleEmail.value = wholesale.email;
        wholesaleAddress.value = wholesale.address;
        wholesaleCategory.value = wholesale.category_id;
      }
      formModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }
    
    function closeModals() {
      formModal.classList.add('hidden');
      viewModal.classList.add('hidden');
      deleteModal.classList.add('hidden');
      document.body.style.overflow = 'auto';
      currentEditId = null;
      pendingDeleteId = null;
    }
    
    function resetFormToAdd() {
      currentEditId = null;
      modalTitle.innerText = 'Add Wholesale';
      const newId = generateWholesaleId();
      wholesaleIdInput.value = newId;
      wholesaleName.value = '';
      wholesalePhone.value = '';
      wholesaleEmail.value = '';
      wholesaleAddress.value = '';
      wholesaleCategory.value = '';
    }
    
    function handleSave() {
      const name = wholesaleName.value.trim();
      if (!name) { alert('Wholesale Name is required'); return; }
      const formData = {
        wholesale_name: name,
        phone: wholesalePhone.value,
        email: wholesaleEmail.value,
        address: wholesaleAddress.value,
        category_id: wholesaleCategory.value,
      };
      if (currentEditId) {
        wholesales = wholesales.map(w => w.wholesale_id === currentEditId ? { ...w, ...formData, updatedAt: new Date() } : w);
      } else {
        const newId = generateWholesaleId();
        const newWholesale = {
          wholesale_id: newId,
          business_id: 'biz1',
          ...formData,
          created_by: '1',
          createdAt: new Date(),
          updatedAt: new Date(),
        };
        wholesales.push(newWholesale);
      }
      renderWholesales();
      closeModals();
    }
    
    // open add modal
    document.getElementById('openAddModalBtn').addEventListener('click', () => {
      resetFormToAdd();
      formModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });
    
    modalSaveBtn.addEventListener('click', handleSave);
    modalCancelBtn.addEventListener('click', closeModals);
    closeModalBtn.addEventListener('click', closeModals);
    modalBackdrop?.addEventListener('click', closeModals);
    modalDismissArea?.addEventListener('click', closeModals);
    closeViewBtn.addEventListener('click', closeModals);
    viewModalBackdrop?.addEventListener('click', closeModals);
    viewDismissArea?.addEventListener('click', closeModals);
    
    // Delete modal event listeners
    cancelDeleteBtn.addEventListener('click', closeDeleteModal);
    confirmDeleteBtn.addEventListener('click', performDelete);
    deleteModalBackdrop.addEventListener('click', closeDeleteModal);
    
    searchInput.addEventListener('input', () => renderWholesales());
    
    // Close modals on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        if (!deleteModal.classList.contains('hidden')) {
          closeDeleteModal();
        } else if (!formModal.classList.contains('hidden') || !viewModal.classList.contains('hidden')) {
          closeModals();
        }
      }
    });
    
    // Body scroll lock observer
    const observer = new MutationObserver(() => {
      if (!formModal.classList.contains('hidden') || !viewModal.classList.contains('hidden') || !deleteModal.classList.contains('hidden')) {
        document.body.style.overflow = 'hidden';
      } else {
        document.body.style.overflow = '';
      }
    });
    observer.observe(formModal, { attributes: true, attributeFilter: ['class'] });
    observer.observe(viewModal, { attributes: true, attributeFilter: ['class'] });
    observer.observe(deleteModal, { attributes: true, attributeFilter: ['class'] });
    
    function escapeHtml(str) { if(!str) return ''; return str.replace(/[&<>]/g, function(m) { if(m === '&') return '&amp;'; if(m === '<') return '&lt;'; if(m === '>') return '&gt;'; return m;}); }
    
    renderWholesales();
  </script>

<?php $content = ob_get_clean(); 
include '../../includes/header.php'; 
include '../../includes/sidebar.php'; 
echo '<div class="main-content min-h-screen">'; 
echo $content; 
include '../../includes/footer.php'; ?>