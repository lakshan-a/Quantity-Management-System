<?php
// ============================================
// File: modules/businesses/index.php
// Description: Business settings (Admin only)
// ============================================
require_once '../../middleware/check_auth.php';
require_once '../../middleware/check_role.php';
checkRole('admin');
$pageTitle = 'Business Settings | Qty Management';
ob_start();
?>

<script src="../../assets/js/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 md:py-10">
    <div class="space-y-6">
        <!-- Header: search, filter, add button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                <div class="relative w-full sm:w-72">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 w-4 h-4"><circle cx="10" cy="10" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input type="text" id="searchBusinessInput" placeholder="Search by name or owner..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
                <select id="statusFilterSelect" class="w-full sm:w-48 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="expired">Expired</option>
                    <option value="suspended">Suspended</option>
                </select>
            </div>
            <button id="openAddBusinessBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M12 5v14M5 12h14"/></svg>
                Add Business
            </button>
        </div>

        <!-- main card/table container -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <!-- Mobile card container -->
            <div id="mobileCardContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
            
            <!-- Desktop table - responsive overflow -->
            <div class="desktop-table overflow-x-auto hidden sm:block">
                <table class="min-w-full">
                    <thead class="bg-slate-50 dark:bg-slate-900/40">
                        <tr class="border-b border-slate-200 dark:border-slate-700">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Business ID</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Business</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Phone</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Expires</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="desktopTableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
                </table>
            </div>
            <!-- Empty state -->
            <div id="emptyMessage" class="hidden py-12 text-center text-slate-500 dark:text-slate-400 text-sm">No businesses found</div>
        </div>
    </div>
</div>

<!-- ==================== MODAL: ADD / EDIT BUSINESS ==================== -->
<div id="businessModal" class="fixed inset-0 z-50 hidden overflow-y-auto modal-transition" aria-modal="true">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalTopDismiss"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0">Add Business</h2>
                <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
            </div>
            <div class="p-4 overflow-y-auto custom-scroll space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Business Name *</label>
                        <input type="text" id="businessName" placeholder="Tech Store Pro" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Owner Name *</label>
                        <input type="text" id="ownerName" placeholder="John Smith" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Email *</label>
                        <input type="email" id="emailInput" placeholder="contact@business.com" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Phone *</label>
                        <input type="text" id="phoneInput" placeholder="+1 234 567 8900" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Address</label>
                        <input type="text" id="addressInput" placeholder="123 Business Street, City" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Subscription Status</label>
                        <select id="statusSelect" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="active">Active</option>
                            <option value="expired">Expired</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Subscription Start</label>
                        <input type="date" id="startDate" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Subscription End</label>
                        <input type="date" id="endDate" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="modalCancelBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
                <button id="modalSaveBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">Save Business</button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== VIEW MODAL (DETAILS) ==================== -->
<div id="viewModal" class="fixed inset-0 z-50 hidden overflow-y-auto modal-transition" aria-modal="true">
    <div class="fixed inset-0 bg-black/50" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Business Details</h2>
                <button id="closeViewModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
            </div>
            <div class="p-4 overflow-y-auto custom-scroll space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between flex-wrap gap-3">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M3 9l9-6 9 6v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/><polyline points="3 9 12 15 21 9"/><path d="M12 3v12"/></svg>
                        </div>
                        <div>
                            <h3 id="viewBusinessName" class="text-xl font-bold text-slate-900 dark:text-white">Business Name</h3>
                            <p id="viewOwnerName" class="text-slate-500 dark:text-slate-400">Owner</p>
                        </div>
                    </div>
                    <span id="viewBusinessIdBadge" class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-mono">ID: --</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><p class="text-sm text-slate-500">Email</p><p id="viewEmail" class="font-medium break-all">-</p></div>
                    <div><p class="text-sm text-slate-500">Phone</p><p id="viewPhone" class="font-medium">-</p></div>
                    <div class="col-span-2"><p class="text-sm text-slate-500">Address</p><p id="viewAddress" class="font-medium">-</p></div>
                    <div><p class="text-sm text-slate-500">Subscription Start</p><p id="viewStart" class="font-medium">-</p></div>
                    <div><p class="text-sm text-slate-500">Subscription End</p><p id="viewEnd" class="font-medium">-</p></div>
                    <div><p class="text-sm text-slate-500 mb-1">Status</p><span id="viewStatusBadge" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-sm font-medium"></span></div>
                </div>
                <div class="pt-4 border-t border-slate-200 dark:border-slate-700">
                    <p class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Quick Actions</p>
                    <div class="flex flex-wrap gap-3" id="quickActionsContainer"></div>
                </div>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="closeViewModalFooter" class="w-full px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== DELETE CONFIRMATION MODAL ==================== -->
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
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2">Delete Business</h3>
                <p class="text-center text-slate-500 dark:text-slate-400 mb-6">Are you sure you want to delete <span id="deleteBusinessName" class="font-medium text-slate-700 dark:text-slate-300"></span>? This action cannot be undone.</p>
                <div class="flex flex-col-reverse sm:flex-row gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ---------- MOCK DATA ----------
    let businesses = [
        { business_id: '1', business_name: 'Tech Store Pro', owner_name: 'John Smith', email: 'john@techstore.com', phone: '+1234567890', address: '123 Tech Lane', subscription_status: 'active', subscription_start: new Date('2024-01-01'), subscription_end: new Date('2025-01-01'), createdAt: new Date(), updatedAt: new Date() },
        { business_id: '2', business_name: 'Fashion Hub', owner_name: 'Sarah Johnson', email: 'sarah@fashionhub.com', phone: '+1234567891', address: '456 Style Ave', subscription_status: 'active', subscription_start: new Date('2024-02-15'), subscription_end: new Date('2025-02-15'), createdAt: new Date(), updatedAt: new Date() },
        { business_id: '3', business_name: 'Sports Outlet', owner_name: 'Mike Brown', email: 'mike@sportsoutlet.com', phone: '+1234567892', address: '789 Sports Blvd', subscription_status: 'expired', subscription_start: new Date('2023-06-01'), subscription_end: new Date('2024-06-01'), createdAt: new Date(), updatedAt: new Date() },
        { business_id: '4', business_name: 'Home Decor Plus', owner_name: 'Emily Davis', email: 'emily@homedecor.com', phone: '+1234567893', address: '321 Home St', subscription_status: 'active', subscription_start: new Date('2024-03-01'), subscription_end: new Date('2025-03-01'), createdAt: new Date(), updatedAt: new Date() },
        { business_id: '5', business_name: 'Book World', owner_name: 'Chris Wilson', email: 'chris@bookworld.com', phone: '+1234567894', address: '654 Book Lane', subscription_status: 'suspended', subscription_start: new Date('2024-01-15'), subscription_end: new Date('2025-01-15'), createdAt: new Date(), updatedAt: new Date() }
    ];

    // Helper: status colors and icons
    const statusConfig = {
        active: { bg: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>' },
        expired: { bg: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>' },
        suspended: { bg: 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="18" y1="6" x2="6" y2="18"/></svg>' }
    };

    let editingBusinessId = null;
    let currentViewBusiness = null;
    let businessToDelete = null;
    let searchQuery = '';
    let statusFilter = '';

    // DOM elements
    const searchInput = document.getElementById('searchBusinessInput');
    const statusFilterSelect = document.getElementById('statusFilterSelect');
    const mobileContainer = document.getElementById('mobileCardContainer');
    const desktopTbody = document.getElementById('desktopTableBody');
    const emptyMsg = document.getElementById('emptyMessage');
    const modal = document.getElementById('businessModal');
    const modalTitle = document.getElementById('modalTitle');
    const businessNameInput = document.getElementById('businessName');
    const ownerNameInput = document.getElementById('ownerName');
    const emailInput = document.getElementById('emailInput');
    const phoneInput = document.getElementById('phoneInput');
    const addressInput = document.getElementById('addressInput');
    const statusSelect = document.getElementById('statusSelect');
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const openAddBtn = document.getElementById('openAddBusinessBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalCancelBtn = document.getElementById('modalCancelBtn');
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalTopDismiss = document.getElementById('modalTopDismiss');
    // view modal
    const viewModalEl = document.getElementById('viewModal');
    const closeViewBtn = document.getElementById('closeViewModalBtn');
    const closeViewFooter = document.getElementById('closeViewModalFooter');
    const viewModalBackdropEl = document.getElementById('viewModalBackdrop');
    // delete modal
    const deleteModal = document.getElementById('deleteModal');
    const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const deleteBusinessNameSpan = document.getElementById('deleteBusinessName');

    // Helper: format date
    function formatDate(dateObj) { return new Date(dateObj).toLocaleDateString(); }

    // Filter logic
    function getFilteredBusinesses() {
        let filtered = [...businesses];
        if (searchQuery.trim()) {
            const q = searchQuery.trim().toLowerCase();
            filtered = filtered.filter(b => b.business_name.toLowerCase().includes(q) || b.owner_name.toLowerCase().includes(q));
        }
        if (statusFilter) filtered = filtered.filter(b => b.subscription_status === statusFilter);
        return filtered;
    }

    // Render both views
    function render() {
        const filtered = getFilteredBusinesses();
        const hasItems = filtered.length > 0;
        emptyMsg.classList.toggle('hidden', hasItems);
        
        if (!hasItems) { 
            mobileContainer.innerHTML = ''; 
            desktopTbody.innerHTML = ''; 
            return; 
        }

        // Mobile cards
        mobileContainer.innerHTML = filtered.map(b => `
            <div class="p-4 space-y-3" data-id="${b.business_id}">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M3 9l9-6 9 6v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/><polyline points="3 9 12 15 21 9"/><path d="M12 3v12"/></svg></div>
                        <div><p class="font-medium break-words">${escapeHtml(b.business_name)}</p><p class="text-sm text-slate-500">${escapeHtml(b.owner_name)}</p></div>
                    </div>
                    <span class="text-xs font-mono bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded whitespace-nowrap">ID: ${b.business_id}</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div class="min-w-0"><span class="text-slate-500 text-xs">Email</span><p class="truncate">${escapeHtml(b.email)}</p></div>
                    <div><span class="text-slate-500 text-xs">Phone</span><p class="break-words">${escapeHtml(b.phone)}</p></div>
                    <div><span class="text-slate-500 text-xs">Status</span><span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium ${statusConfig[b.subscription_status]?.bg}">${statusConfig[b.subscription_status]?.icon || ''} ${capitalize(b.subscription_status)}</span></div>
                    <div><span class="text-slate-500 text-xs">Expires</span><p>${formatDate(b.subscription_end)}</p></div>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2 border-t">
                    <button class="view-business-btn p-2 text-green-600 dark:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg" data-id="${b.business_id}" title="View Details"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
                    <button class="edit-business-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" data-id="${b.business_id}" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg></button>
                    <button class="delete-business-btn p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg" data-id="${b.business_id}" data-name="${escapeHtml(b.business_name)}" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg></button>
                </div>
            </div>
        `).join('');
        
        // Desktop table
        desktopTbody.innerHTML = filtered.map(b => `
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
                <td class="px-4 py-3 text-sm text-slate-500 font-mono">${b.business_id}</td>
                <td class="px-4 py-3"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-6 9 6v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/><polyline points="3 9 12 15 21 9"/><path d="M12 3v12"/></svg></div><div><p class="font-medium break-words">${escapeHtml(b.business_name)}</p><p class="text-sm text-slate-500">${escapeHtml(b.owner_name)}</p></div></div></td>
                <td class="px-4 py-3 text-sm break-all">${escapeHtml(b.email)}</td>
                <td class="px-4 py-3 text-sm whitespace-nowrap">${escapeHtml(b.phone)}</td>
                <td class="px-4 py-3"><span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium ${statusConfig[b.subscription_status]?.bg}">${statusConfig[b.subscription_status]?.icon || ''} ${capitalize(b.subscription_status)}</span></td>
                <td class="px-4 py-3 text-sm whitespace-nowrap">${formatDate(b.subscription_end)}</td>
                <td class="px-4 py-3"><div class="flex gap-2"><button class="view-desktop-btn p-2 text-green-600 hover:bg-green-50 rounded-lg" data-id="${b.business_id}" title="View Details"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button><button class="edit-desktop-btn p-2 text-slate-600 hover:bg-slate-100 rounded-lg" data-id="${b.business_id}" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg></button><button class="delete-desktop-btn p-2 text-red-600 hover:bg-red-50 rounded-lg" data-id="${b.business_id}" data-name="${escapeHtml(b.business_name)}" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg></button></div></td>
            </tr>
        `).join('');
        
        attachEvents();
    }

    function attachEvents() {
        // View buttons
        document.querySelectorAll('.view-business-btn, .view-desktop-btn').forEach(btn => btn.addEventListener('click', (e) => { 
            const id = btn.dataset.id; 
            const biz = businesses.find(b => b.business_id === id); 
            if(biz) openViewModal(biz); 
        }));
        // Edit buttons
        document.querySelectorAll('.edit-business-btn, .edit-desktop-btn').forEach(btn => btn.addEventListener('click', (e) => { 
            const id = btn.dataset.id; 
            const biz = businesses.find(b => b.business_id === id); 
            if(biz) openEditModal(biz); 
        }));
        // Delete buttons
        document.querySelectorAll('.delete-business-btn, .delete-desktop-btn').forEach(btn => btn.addEventListener('click', (e) => { 
            const id = btn.dataset.id; 
            const name = btn.dataset.name;
            const biz = businesses.find(b => b.business_id === id); 
            if(biz) openDeleteModal(biz); 
        }));
    }

    function capitalize(str) { return str.charAt(0).toUpperCase() + str.slice(1); }
    function escapeHtml(str) { if(!str) return ''; return str.replace(/[&<>]/g, function(m){ if(m==='&') return '&amp;'; if(m==='<') return '&lt;'; if(m==='>') return '&gt;'; return m;}); }

    function openAddModal() {
        editingBusinessId = null;
        modalTitle.innerText = 'Add Business';
        businessNameInput.value = ''; ownerNameInput.value = ''; emailInput.value = ''; phoneInput.value = ''; addressInput.value = '';
        statusSelect.value = 'active';
        const today = new Date().toISOString().split('T')[0];
        const nextYear = new Date(Date.now() + 365*24*60*60*1000).toISOString().split('T')[0];
        startDateInput.value = today;
        endDateInput.value = nextYear;
        modal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    
    function openEditModal(business) {
        editingBusinessId = business.business_id;
        modalTitle.innerText = 'Edit Business';
        businessNameInput.value = business.business_name;
        ownerNameInput.value = business.owner_name;
        emailInput.value = business.email;
        phoneInput.value = business.phone;
        addressInput.value = business.address || '';
        statusSelect.value = business.subscription_status;
        startDateInput.value = new Date(business.subscription_start).toISOString().split('T')[0];
        endDateInput.value = new Date(business.subscription_end).toISOString().split('T')[0];
        modal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    
    function saveBusiness() {
        const name = businessNameInput.value.trim();
        const owner = ownerNameInput.value.trim();
        const email = emailInput.value.trim();
        const phone = phoneInput.value.trim();
        if(!name || !owner || !email || !phone) { alert('Please fill required fields: Name, Owner, Email, Phone'); return; }
        const newStatus = statusSelect.value;
        const start = new Date(startDateInput.value);
        const end = new Date(endDateInput.value);
        if(isNaN(start) || isNaN(end)) { alert('Invalid dates'); return; }
        if(editingBusinessId) {
            businesses = businesses.map(b => b.business_id === editingBusinessId ? { ...b, business_name: name, owner_name: owner, email, phone, address: addressInput.value, subscription_status: newStatus, subscription_start: start, subscription_end: end, updatedAt: new Date() } : b);
        } else {
            const newId = (Date.now() + Math.floor(Math.random()*1000)).toString();
            businesses.push({ business_id: newId, business_name: name, owner_name: owner, email, phone, address: addressInput.value, subscription_status: newStatus, subscription_start: start, subscription_end: end, createdAt: new Date(), updatedAt: new Date() });
        }
        closeModal();
        render();
    }
    
    function closeModal() { modal.classList.add('hidden'); document.body.classList.remove('modal-open'); editingBusinessId = null; }
    
    function openViewModal(biz) {
        currentViewBusiness = biz;
        document.getElementById('viewBusinessName').innerText = biz.business_name;
        document.getElementById('viewOwnerName').innerText = biz.owner_name;
        document.getElementById('viewBusinessIdBadge').innerHTML = `ID: ${biz.business_id}`;
        document.getElementById('viewEmail').innerText = biz.email;
        document.getElementById('viewPhone').innerText = biz.phone;
        document.getElementById('viewAddress').innerText = biz.address || '—';
        document.getElementById('viewStart').innerText = formatDate(biz.subscription_start);
        document.getElementById('viewEnd').innerText = formatDate(biz.subscription_end);
        const statusSpan = document.getElementById('viewStatusBadge');
        const cfg = statusConfig[biz.subscription_status];
        statusSpan.innerHTML = `${cfg?.icon || ''} ${capitalize(biz.subscription_status)}`;
        statusSpan.className = `inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-sm font-medium ${cfg?.bg || ''}`;
        const actionsDiv = document.getElementById('quickActionsContainer');
        actionsDiv.innerHTML = '';
        if(biz.subscription_status !== 'active') {
            const activateBtn = document.createElement('button'); 
            activateBtn.className = 'inline-flex items-center px-3 py-1.5 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600'; 
            activateBtn.innerHTML = '<svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg> Activate'; 
            activateBtn.onclick = () => { updateStatus(biz.business_id, 'active'); closeViewModal(); };
            actionsDiv.appendChild(activateBtn);
        }
        if(biz.subscription_status !== 'suspended') {
            const suspendBtn = document.createElement('button'); 
            suspendBtn.className = 'inline-flex items-center px-3 py-1.5 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600'; 
            suspendBtn.innerHTML = '<svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="18" y1="6" x2="6" y2="18"/></svg> Suspend'; 
            suspendBtn.onclick = () => { updateStatus(biz.business_id, 'suspended'); closeViewModal(); };
            actionsDiv.appendChild(suspendBtn);
        }
        // Add delete button to quick actions
        const deleteFromViewBtn = document.createElement('button'); 
        deleteFromViewBtn.className = 'inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700'; 
        deleteFromViewBtn.innerHTML = '<svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg> Delete'; 
        deleteFromViewBtn.onclick = () => { closeViewModal(); openDeleteModal(biz); };
        actionsDiv.appendChild(deleteFromViewBtn);
        
        viewModalEl.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    
    function updateStatus(businessId, newStatus) {
        businesses = businesses.map(b => b.business_id === businessId ? { ...b, subscription_status: newStatus, updatedAt: new Date() } : b);
        render();
    }
    
    function closeViewModal() { viewModalEl.classList.add('hidden'); document.body.classList.remove('modal-open'); currentViewBusiness = null; }
    
    // Delete modal functions
    function openDeleteModal(business) {
        businessToDelete = business;
        deleteBusinessNameSpan.innerText = business.business_name;
        deleteModal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    
    function closeDeleteModal() {
        deleteModal.classList.add('hidden');
        document.body.classList.remove('modal-open');
        businessToDelete = null;
    }
    
    function confirmDelete() {
        if (businessToDelete) {
            businesses = businesses.filter(b => b.business_id !== businessToDelete.business_id);
            closeDeleteModal();
            render();
            // If view modal is open, close it
            if (!viewModalEl.classList.contains('hidden')) {
                closeViewModal();
            }
        }
    }

    // Event listeners
    searchInput.addEventListener('input', (e) => { searchQuery = e.target.value; render(); });
    statusFilterSelect.addEventListener('change', (e) => { statusFilter = e.target.value; render(); });
    openAddBtn.addEventListener('click', openAddModal);
    closeModalBtn.addEventListener('click', closeModal);
    modalCancelBtn.addEventListener('click', closeModal);
    modalBackdrop.addEventListener('click', closeModal);
    if(modalTopDismiss) modalTopDismiss.addEventListener('click', closeModal);
    modalSaveBtn.addEventListener('click', saveBusiness);
    closeViewBtn.addEventListener('click', closeViewModal);
    closeViewFooter.addEventListener('click', closeViewModal);
    viewModalBackdropEl.addEventListener('click', closeViewModal);
    
    // Delete modal event listeners
    cancelDeleteBtn.addEventListener('click', closeDeleteModal);
    confirmDeleteBtn.addEventListener('click', confirmDelete);
    deleteModalBackdrop.addEventListener('click', closeDeleteModal);
    
    document.addEventListener('keydown', (e) => { 
        if(e.key === 'Escape') { 
            if(!modal.classList.contains('hidden')) closeModal(); 
            if(!viewModalEl.classList.contains('hidden')) closeViewModal();
            if(!deleteModal.classList.contains('hidden')) closeDeleteModal();
        } 
    });

    // initial render
    render();
    // set dark mode based on preference
    if(window.matchMedia('(prefers-color-scheme: dark)').matches) document.documentElement.classList.add('dark');
    else document.documentElement.classList.remove('dark');
</script>

<?php $content = ob_get_clean(); 
include '../../includes/header.php'; 
include '../../includes/sidebar.php'; 
echo '<div class="main-content min-h-screen">'; echo $content; include '../../includes/footer.php'; ?>