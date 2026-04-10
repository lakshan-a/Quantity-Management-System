<?php
// ============================================
// File: modules/couriers/index.php
// Description: Couriers management
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Couriers | Qty Management';
ob_start();
?>

<script src="../../assets/js/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 md:py-10">
    <div class="space-y-6">
        <!-- Header: Search + Add Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="relative w-full sm:w-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400">
                    <circle cx="10" cy="10" r="8"/><path d="m21 21-4.3-4.3"/>
                </svg>
                <input type="text" id="searchInput" placeholder="Search couriers by name or ID..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div class="flex gap-3">
                <!-- Filter Dropdown -->
                <div class="relative" id="filterDropdown">
                    <button id="filterButton" class="inline-flex items-center px-4 py-2 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                        <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span data-i18n="filter_btn">Filter</span>
                        <svg class="w-3 h-3 ml-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="filterMenu" class="absolute right-0 mt-2 w-64 bg-white dark:bg-slate-800 rounded-lg shadow-lg border border-slate-200 dark:border-slate-700 z-20 hidden">
                        <div class="p-4 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Delivery Fee Range</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="number" id="minPrice" placeholder="Min $" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
                                    <input type="number" id="maxPrice" placeholder="Max $" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
                                </div>
                            </div>
                            <button id="resetFiltersBtn" class="w-full px-3 py-2 text-sm text-blue-600 dark:text-blue-400 border border-blue-300 dark:border-blue-600 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors">
                                <span data-i18n="reset_filters_btn">Reset Filters</span>
                            </button>
                        </div>
                    </div>
                </div>
                <button id="openAddCourierBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M12 5v14M5 12h14"/></svg>
                    Add Courier
                </button>
            </div>
        </div>

        <!-- Active Filters Display -->
        <div id="activeFilters" class="flex flex-wrap gap-2"></div>

        <!-- Main Card / Table Container -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <!-- Mobile view (cards) -->
            <div id="mobileCardContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
            
            <!-- Desktop view (table) -->
            <div id="desktopTableContainer" class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 dark:bg-slate-900/40">
                        <tr class="border-b border-slate-200 dark:border-slate-700">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Courier ID</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Courier Name</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Delivery Fee</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Contact</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Address</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
                </table>
            </div>
            <!-- Empty state -->
            <div id="emptyMessage" class="hidden py-12 text-center text-slate-500 dark:text-slate-400 text-sm">No couriers found</div>
        </div>
    </div>
</div>

<!-- Modal: View Courier (Read Only) -->
<div id="viewModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-lg overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Courier Details</h2>
                <button id="closeViewModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <div class="bg-slate-50 dark:bg-slate-900/30 rounded-lg p-3">
                    <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Courier ID</label>
                    <p id="viewCourierId" class="text-slate-900 dark:text-white font-mono"></p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900/30 rounded-lg p-3">
                    <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Courier Name</label>
                    <p id="viewCourierName" class="text-slate-900 dark:text-white font-medium"></p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900/30 rounded-lg p-3">
                    <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Delivery Fee</label>
                    <p id="viewPrice" class="text-slate-900 dark:text-white"></p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900/30 rounded-lg p-3">
                    <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Contact Number</label>
                    <p id="viewContact" class="text-slate-900 dark:text-white"></p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900/30 rounded-lg p-3">
                    <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Address</label>
                    <p id="viewAddress" class="text-slate-900 dark:text-white"></p>
                </div>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="closeViewModalFooterBtn" class="w-full px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Add / Edit Courier -->
<div id="courierModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity modal-backdrop" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalTopDismiss"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-lg max-h-[90vh] overflow-y-auto modal-content">
            <div class="sticky top-0 bg-white dark:bg-slate-800 z-10 flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0">Add Courier</h2>
                <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Courier ID</label>
                    <input type="text" id="courierIdInput" disabled class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-60 disabled:cursor-not-allowed font-mono">
                    <p class="text-xs text-slate-500 mt-1">Auto-generated</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Courier Name</label>
                    <input type="text" id="courierNameInput" placeholder="e.g., FedEx, UPS, DHL" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Delivery Fee ($)</label>
                    <input type="number" step="0.01" id="priceInput" placeholder="0.00" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Contact Number</label>
                    <input type="text" id="contactInput" placeholder="+1 234 567 8900" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Address</label>
                    <input type="text" id="addressInput" placeholder="123 Shipping Lane, City" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="sticky bottom-0 bg-white dark:bg-slate-800 flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="modalCancelBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
                <button id="modalSaveBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
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
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2">Delete Courier</h3>
                <p class="text-center text-slate-500 dark:text-slate-400 mb-6">Are you sure you want to delete this courier? This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   // ---------- MOCK DATA ----------
    let couriers = [
        { courier_id: 'COU-2024-001', business_id: 'biz1', courier_name: 'FedEx', price: 15.99, address: '123 Shipping Lane', contact_number: '+1234567890', created_by: '1', createdAt: new Date(2024, 0, 15), updatedAt: new Date() },
        { courier_id: 'COU-2024-002', business_id: 'biz1', courier_name: 'UPS', price: 12.99, address: '456 Delivery Rd', contact_number: '+1234567891', created_by: '1', createdAt: new Date(2024, 1, 10), updatedAt: new Date() },
        { courier_id: 'COU-2024-003', business_id: 'biz1', courier_name: 'DHL', price: 18.99, address: '789 Express Ave', contact_number: '+1234567892', created_by: '1', createdAt: new Date(2024, 2, 5), updatedAt: new Date() },
        { courier_id: 'COU-2024-004', business_id: 'biz1', courier_name: 'Local Courier', price: 8.99, address: '321 Local St', contact_number: '+1234567893', created_by: '1', createdAt: new Date(2024, 3, 20), updatedAt: new Date() }
    ];

    // Helper: generate new Courier ID based on year & max sequence
    function generateCourierId() {
        const year = new Date().getFullYear();
        const existingCodes = couriers
            .map(c => {
                const match = c.courier_id.match(/COU-(\d{4})-(\d{3})/);
                if (match && match[1] === year.toString()) return parseInt(match[2]);
                return 0;
            })
            .filter(n => n > 0);
        const nextNum = existingCodes.length > 0 ? Math.max(...existingCodes) + 1 : 1;
        return `COU-${year}-${String(nextNum).padStart(3, '0')}`;
    }

    // State
    let editingCourier = null;
    let searchQuery = '';
    let courierToDeleteId = null;
    
    // Filter state
    let minPrice = '';
    let maxPrice = '';

    // DOM elements
    const searchInput = document.getElementById('searchInput');
    const mobileContainer = document.getElementById('mobileCardContainer');
    const tableBody = document.getElementById('tableBody');
    const emptyMessageDiv = document.getElementById('emptyMessage');
    const modal = document.getElementById('courierModal');
    const modalTitle = document.getElementById('modalTitle');
    const courierIdInput = document.getElementById('courierIdInput');
    const courierNameInput = document.getElementById('courierNameInput');
    const priceInput = document.getElementById('priceInput');
    const contactInput = document.getElementById('contactInput');
    const addressInput = document.getElementById('addressInput');
    const openAddBtn = document.getElementById('openAddCourierBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalCancelBtn = document.getElementById('modalCancelBtn');
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalTopDismiss = document.getElementById('modalTopDismiss');
    
    // View Modal elements
    const viewModal = document.getElementById('viewModal');
    const viewModalBackdrop = document.getElementById('viewModalBackdrop');
    const closeViewModalBtn = document.getElementById('closeViewModalBtn');
    const closeViewModalFooterBtn = document.getElementById('closeViewModalFooterBtn');
    const viewCourierId = document.getElementById('viewCourierId');
    const viewCourierName = document.getElementById('viewCourierName');
    const viewPrice = document.getElementById('viewPrice');
    const viewContact = document.getElementById('viewContact');
    const viewAddress = document.getElementById('viewAddress');
    
    // Filter elements
    const filterButton = document.getElementById('filterButton');
    const filterMenu = document.getElementById('filterMenu');
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    const activeFiltersDiv = document.getElementById('activeFilters');
    
    // Delete modal elements
    const deleteModal = document.getElementById('deleteModal');
    const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

    // Helper: format date to locale string (for created date in cards)
    function formatDate(date) {
        if (!date) return 'N/A';
        return new Date(date).toLocaleDateString();
    }

    // Escape HTML
    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    // Update active filters display
    function updateActiveFiltersDisplay() {
        const filters = [];
        const search = searchQuery.trim();
        const min = minPrice;
        const max = maxPrice;
        
        if (search) filters.push(`Search: "${search}"`);
        if (min && max) filters.push(`Fee: $${min} - $${max}`);
        else if (min) filters.push(`Fee: ≥ $${min}`);
        else if (max) filters.push(`Fee: ≤ $${max}`);
        
        if (filters.length === 0) {
            activeFiltersDiv.innerHTML = '';
            return;
        }
        
        activeFiltersDiv.innerHTML = `
            <div class="text-xs text-slate-500 mb-1">Active Filters:</div>
            <div class="flex flex-wrap gap-2">
                ${filters.map(filter => `
                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-lg text-xs">
                        ${escapeHtml(filter)}
                    </span>
                `).join('')}
                <button id="clearAllFilters" class="text-xs text-red-600 dark:text-red-400 hover:underline">Clear all</button>
            </div>
        `;
        
        const clearAllBtn = document.getElementById('clearAllFilters');
        if (clearAllBtn) {
            clearAllBtn.addEventListener('click', () => {
                searchInput.value = '';
                minPriceInput.value = '';
                maxPriceInput.value = '';
                searchQuery = '';
                minPrice = '';
                maxPrice = '';
                render();
            });
        }
    }

    // Filter couriers based on search and price range
    function getFilteredCouriers() {
        let filtered = [...couriers];
        
        const query = searchQuery.trim().toLowerCase();
        if (query) {
            filtered = filtered.filter(c => 
                c.courier_name.toLowerCase().includes(query) || 
                c.courier_id.toLowerCase().includes(query)
            );
        }
        
        if (minPrice !== '') {
            const min = parseFloat(minPrice);
            if (!isNaN(min)) {
                filtered = filtered.filter(c => c.price >= min);
            }
        }
        
        if (maxPrice !== '') {
            const max = parseFloat(maxPrice);
            if (!isNaN(max)) {
                filtered = filtered.filter(c => c.price <= max);
            }
        }
        
        updateActiveFiltersDisplay();
        return filtered;
    }

    // Show delete confirmation modal
    function showDeleteModal(id) {
        courierToDeleteId = id;
        deleteModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    // Close delete modal
    function closeDeleteModal() {
        deleteModal.classList.add('hidden');
        courierToDeleteId = null;
        document.body.style.overflow = '';
    }
    
    // Perform delete action
    function performDelete() {
        if (courierToDeleteId) {
            couriers = couriers.filter(c => c.courier_id !== courierToDeleteId);
            if (editingCourier && editingCourier.courier_id === courierToDeleteId) {
                closeModal();
            }
            render();
            closeDeleteModal();
        }
    }

    // Show View Modal
    function showViewModal(courier) {
        viewCourierId.textContent = courier.courier_id;
        viewCourierName.textContent = courier.courier_name;
        viewPrice.textContent = `$${courier.price.toFixed(2)}`;
        viewContact.textContent = courier.contact_number;
        viewAddress.textContent = courier.address || '—';
        viewModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeViewModal() {
        viewModal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Open add modal
    function openAddModal() {
        editingCourier = null;
        const newId = generateCourierId();
        courierIdInput.value = newId;
        courierNameInput.value = '';
        priceInput.value = '';
        contactInput.value = '';
        addressInput.value = '';
        modalTitle.innerText = t('add_courier_title');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Open edit modal
    function openEditModal(courier) {
        editingCourier = courier;
        courierIdInput.value = courier.courier_id;
        courierNameInput.value = courier.courier_name;
        priceInput.value = courier.price;
        contactInput.value = courier.contact_number;
        addressInput.value = courier.address;
        modalTitle.innerText = t('edit_courier_title');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.add('hidden');
        editingCourier = null;
        document.body.style.overflow = '';
    }

    // Save courier (create or update)
    function saveCourier() {
        const name = courierNameInput.value.trim();
        const priceVal = parseFloat(priceInput.value);
        const contact = contactInput.value.trim();
        const address = addressInput.value.trim();

        if (!name) {
            alert(t('name_required'));
            return;
        }
        if (isNaN(priceVal) || priceVal < 0) {
            alert(t('fee_valid'));
            return;
        }
        if (!contact) {
            alert(t('contact_required'));
            return;
        }

        if (editingCourier) {
            couriers = couriers.map(c => 
                c.courier_id === editingCourier.courier_id 
                ? { 
                    ...c, 
                    courier_name: name, 
                    price: priceVal, 
                    contact_number: contact, 
                    address: address, 
                    updatedAt: new Date() 
                  }
                : c
            );
        } else {
            const newId = generateCourierId();
            const newCourier = {
                courier_id: newId,
                business_id: 'biz1',
                courier_name: name,
                price: priceVal,
                address: address,
                contact_number: contact,
                created_by: '1',
                createdAt: new Date(),
                updatedAt: new Date(),
            };
            couriers.push(newCourier);
        }
        render();
        closeModal();
    }

    // Main render function: mobile cards + desktop table
    function render() {
        const filtered = getFilteredCouriers();
        const hasItems = filtered.length > 0;

        if (!hasItems) {
            mobileContainer.innerHTML = '';
            tableBody.innerHTML = '';
            emptyMessageDiv.classList.remove('hidden');
            emptyMessageDiv.textContent = t('no_couriers');
            return;
        }
        emptyMessageDiv.classList.add('hidden');

        // ---------- RENDER MOBILE (Cards with Truck Icon) ----------
        mobileContainer.innerHTML = filtered.map(courier => `
            <div class="p-4 space-y-3" data-id="${courier.courier_id}">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M5 9h14M3 15h3M18 15h3M6 9v6M18 9v6M3 9h3M18 9h3"/><rect x="1" y="3" width="22" height="14" rx="2"/><circle cx="6" cy="19" r="2"/><circle cx="18" cy="19" r="2"/></svg>
                        </div>
                        <span class="font-medium text-slate-900 dark:text-white">${escapeHtml(courier.courier_name)}</span>
                    </div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-mono">${courier.courier_id}</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div>
                        <span class="text-slate-500 text-xs block">${t('col_delivery_fee')}</span>
                        <span class="text-slate-700 dark:text-slate-300 font-medium">$${courier.price.toFixed(2)}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 text-xs block">${t('col_contact')}</span>
                        <span class="text-slate-700 dark:text-slate-300">${escapeHtml(courier.contact_number)}</span>
                    </div>
                </div>
                <div class="text-sm text-slate-500 truncate">📍 ${escapeHtml(courier.address)}</div>
                <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-700">
                    <button class="view-mobile-btn p-2 text-green-600 dark:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition" data-id="${courier.courier_id}" title="${t('courier_details')}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                    <button class="edit-mobile-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition" data-id="${courier.courier_id}" title="${t('edit_courier_title')}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg>
                    </button>
                    <button class="delete-mobile-btn p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition" data-id="${courier.courier_id}" title="${t('delete_confirm_title')}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v5M14 11v5"/></svg>
                    </button>
                </div>
            </div>
        `).join('');

        // attach mobile events
        document.querySelectorAll('.view-mobile-btn').forEach(btn => {
            btn.removeEventListener('click', handleMobileView);
            btn.addEventListener('click', handleMobileView);
        });
        document.querySelectorAll('.edit-mobile-btn').forEach(btn => {
            btn.removeEventListener('click', handleMobileEdit);
            btn.addEventListener('click', handleMobileEdit);
        });
        document.querySelectorAll('.delete-mobile-btn').forEach(btn => {
            btn.removeEventListener('click', handleMobileDelete);
            btn.addEventListener('click', handleMobileDelete);
        });

        // ---------- RENDER DESKTOP TABLE ----------
        tableBody.innerHTML = filtered.map(courier => `
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                <td class="px-4 py-3 text-sm text-slate-500 font-mono">${courier.courier_id}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M5 9h14M3 15h3M18 15h3M6 9v6M18 9v6M3 9h3M18 9h3"/><rect x="1" y="3" width="22" height="14" rx="2"/><circle cx="6" cy="19" r="2"/><circle cx="18" cy="19" r="2"/></svg>
                        </div>
                        <span class="font-medium text-slate-900 dark:text-white">${escapeHtml(courier.courier_name)}</span>
                    </div>
                </td>
                <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300 font-medium">$${courier.price.toFixed(2)}</td>
                <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(courier.contact_number)}</td>
                <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300 max-w-xs truncate">${escapeHtml(courier.address)}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                        <button class="view-table-btn p-2 text-green-600 dark:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition" data-id="${courier.courier_id}" title="${t('courier_details')}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                        <button class="edit-table-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition" data-id="${courier.courier_id}" title="${t('edit_courier_title')}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg>
                        </button>
                        <button class="delete-table-btn p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition" data-id="${courier.courier_id}" title="${t('delete_confirm_title')}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v5M14 11v5"/></svg>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');

        // attach desktop events
        document.querySelectorAll('.view-table-btn').forEach(btn => {
            btn.removeEventListener('click', handleDesktopView);
            btn.addEventListener('click', handleDesktopView);
        });
        document.querySelectorAll('.edit-table-btn').forEach(btn => {
            btn.removeEventListener('click', handleDesktopEdit);
            btn.addEventListener('click', handleDesktopEdit);
        });
        document.querySelectorAll('.delete-table-btn').forEach(btn => {
            btn.removeEventListener('click', handleDesktopDelete);
            btn.addEventListener('click', handleDesktopDelete);
        });
    }
    
    // Event handlers
    function handleMobileView(e) {
        const id = e.currentTarget.getAttribute('data-id');
        const courier = couriers.find(c => c.courier_id === id);
        if (courier) showViewModal(courier);
    }
    function handleMobileEdit(e) {
        const id = e.currentTarget.getAttribute('data-id');
        const courier = couriers.find(c => c.courier_id === id);
        if (courier) openEditModal(courier);
    }
    function handleMobileDelete(e) {
        const id = e.currentTarget.getAttribute('data-id');
        showDeleteModal(id);
    }
    function handleDesktopView(e) {
        const id = e.currentTarget.getAttribute('data-id');
        const courier = couriers.find(c => c.courier_id === id);
        if (courier) showViewModal(courier);
    }
    function handleDesktopEdit(e) {
        const id = e.currentTarget.getAttribute('data-id');
        const courier = couriers.find(c => c.courier_id === id);
        if (courier) openEditModal(courier);
    }
    function handleDesktopDelete(e) {
        const id = e.currentTarget.getAttribute('data-id');
        showDeleteModal(id);
    }

    // Event listeners
    searchInput.addEventListener('input', (e) => {
        searchQuery = e.target.value;
        render();
    });
    
    // Filter dropdown toggle
    filterButton.addEventListener('click', (e) => {
        e.stopPropagation();
        filterMenu.classList.toggle('hidden');
    });
    
    document.addEventListener('click', (e) => {
        if (!filterButton.contains(e.target) && !filterMenu.contains(e.target)) {
            filterMenu.classList.add('hidden');
        }
    });
    
    minPriceInput.addEventListener('input', (e) => {
        minPrice = e.target.value;
        render();
    });
    
    maxPriceInput.addEventListener('input', (e) => {
        maxPrice = e.target.value;
        render();
    });
    
    resetFiltersBtn.addEventListener('click', () => {
        searchInput.value = '';
        minPriceInput.value = '';
        maxPriceInput.value = '';
        searchQuery = '';
        minPrice = '';
        maxPrice = '';
        render();
    });

    openAddBtn.addEventListener('click', openAddModal);
    closeModalBtn.addEventListener('click', closeModal);
    modalCancelBtn.addEventListener('click', closeModal);
    modalBackdrop.addEventListener('click', closeModal);
    if (modalTopDismiss) modalTopDismiss.addEventListener('click', closeModal);
    modalSaveBtn.addEventListener('click', saveCourier);
    
    // View modal events
    closeViewModalBtn.addEventListener('click', closeViewModal);
    closeViewModalFooterBtn.addEventListener('click', closeViewModal);
    viewModalBackdrop.addEventListener('click', closeViewModal);
    
    // Delete modal events
    deleteModalBackdrop.addEventListener('click', closeDeleteModal);
    cancelDeleteBtn.addEventListener('click', closeDeleteModal);
    confirmDeleteBtn.addEventListener('click', performDelete);

    // escape key closes modals
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (!deleteModal.classList.contains('hidden')) {
                closeDeleteModal();
            } else if (!modal.classList.contains('hidden')) {
                closeModal();
            } else if (!viewModal.classList.contains('hidden')) {
                closeViewModal();
            }
        }
    });

    // body scroll lock on modal open via mutation observer
    const observer = new MutationObserver(() => {
        if (!modal.classList.contains('hidden') || !deleteModal.classList.contains('hidden') || !viewModal.classList.contains('hidden')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    });
    observer.observe(modal, { attributes: true, attributeFilter: ['class'] });
    observer.observe(deleteModal, { attributes: true, attributeFilter: ['class'] });
    observer.observe(viewModal, { attributes: true, attributeFilter: ['class'] });

    // initial render
    render();

    // Dark mode detection
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>


<?php $content = ob_get_clean(); include '../../includes/header.php'; include '../../includes/sidebar.php'; echo '<div class="main-content min-h-screen">'; echo $content; include '../../includes/footer.php'; ?>