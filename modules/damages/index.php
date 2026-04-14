<?php
// ============================================
// File: modules/damages/index.php
// Description: Damages reporting with full CRUD operations
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Damages | Qty Management';
ob_start();
?>

<script src="../../assets/js/damages/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6" id="damagesApp">

<div>
    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="damages_title">Damages Management</h1>
    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="damages_subtitle">Manage damages efficiently, keep products organized, and track performance at a glance.</p>
</div>

    <!-- header / total damaged card (dynamic) -->
    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-6">
      <div class="flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-red-100 dark:bg-red-900/50 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600 dark:text-red-400"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
        </div>
        <div>
          <p class="text-sm text-red-600 dark:text-red-400" data-i18n="total_damaged_items">Total damaged items</p>
          <p class="text-3xl font-bold text-red-700 dark:text-red-300" id="totalDamagedCount">0</p>
        </div>
      </div>
    </div>

    <!-- stats row -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-4">
        <p class="text-xs text-slate-500 uppercase mb-1" data-i18n="total_records">Total Records</p>
        <p class="text-2xl font-bold text-slate-900 dark:text-white" id="totalRecordsCount">0</p>
      </div>
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-4">
        <p class="text-xs text-slate-500 uppercase mb-1" data-i18n="this_month">This Month</p>
        <p class="text-2xl font-bold text-slate-900 dark:text-white" id="thisMonthCount">0</p>
      </div>
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-4">
        <p class="text-xs text-slate-500 uppercase mb-1" data-i18n="last_30_days">Last 30 Days</p>
        <p class="text-2xl font-bold text-slate-900 dark:text-white" id="last30DaysCount">0</p>
      </div>
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-4">
        <p class="text-xs text-slate-500 uppercase mb-1" data-i18n="avg_quantity">Avg Quantity</p>
        <p class="text-2xl font-bold text-slate-900 dark:text-white" id="avgQuantity">0</p>
      </div>
    </div>

    <!-- search + report button + filters -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <!-- Search bar -->
        <div class="relative w-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
            </svg>
            <input type="text" id="searchInput" data-i18n-placeholder="search_placeholder" placeholder="Search by item, reason, or reporter..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <!-- Filters and button group - improved stacking behavior: better tablet+ handling, preserve original lg:flex-row but add responsive tweaks -->
        <div class="flex flex-col lg:flex-row gap-3">
            <!-- Filter selects: original classes kept, but add better shrink/wrapping and ensure consistent width on all screens -->
            <div class="flex flex-col sm:flex-row gap-2 flex-1">
                <select id="filterItemSelect" class="w-full sm:flex-1 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <option value="" data-i18n="all_items">All Items</option>
                    <option value="1">Wireless Headphones</option>
                    <option value="2">Cotton T-Shirt</option>
                    <option value="3">Smart Watch</option>
                    <option value="5">Yoga Mat</option>
                </select>
                <select id="sortSelect" class="w-full sm:flex-1 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <option value="newest" data-i18n="newest_first">Newest First</option>
                    <option value="oldest" data-i18n="oldest_first">Oldest First</option>
                    <option value="quantity_high" data-i18n="highest_quantity">Highest Quantity</option>
                    <option value="quantity_low" data-i18n="lowest_quantity">Lowest Quantity</option>
                </select>
            </div>
            
            <!-- Report button: improved full width on small, natural shrink on large, no original classes removed -->
            <button id="openModalBtn" class="w-full lg:w-auto inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                <span data-i18n="report_damage">Report Damage</span>
            </button>
        </div>
    </div>

    <!-- damages table + mobile card view -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700">
      <!-- mobile cards -->
      <div class="md:hidden divide-y divide-slate-200 dark:divide-slate-700" id="mobileDamagesContainer"></div>
      <!-- desktop table -->
      <div class="hidden md:block overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="item">Item</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="item_code">Item Code</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="quantity">Quantity</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="reason">Reason</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="reported_by">Reported by</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="reported_date">Reported date</th>
              <th class="px-4 py-3 text-right text-xs font-semibold text-slate-500 uppercase" data-i18n="actions">Actions</th>
            </tr>
          </thead>
          <tbody id="damagesTableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
        </table>
      </div>
      <div id="emptyMessageContainer" class="p-8 text-center text-slate-500 hidden" data-i18n="no_records_found">No damaged records found.</div>
    </div>
  </div>

  <!-- MODAL STRUCTURE for Add/Edit -->
  <div id="damageModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
      <div class="flex-1 sm:hidden" id="modalTopDismiss"></div>
      <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md max-h-[90vh] overflow-hidden">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
          <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
          <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="report_damage_title">Report Damage</h2>
          <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
        <div class="p-4 space-y-4">
          <input type="hidden" id="editDamageId" value="">
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="item">Item *</label>
            <select id="modalItemSelect" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="" data-i18n="select_item">Select item</option>
              <option value="1">Wireless Headphones</option>
              <option value="2">Cotton T-Shirt</option>
              <option value="3">Smart Watch</option>
              <option value="5">Yoga Mat</option>
            </select>
            <p id="itemCodePreview" class="text-xs text-slate-500 font-mono mt-1 hidden"></p>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="quantity">Quantity *</label>
            <input type="number" id="modalQuantity" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0" min="1">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="reason">Reason *</label>
            <textarea id="modalReason" rows="3" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Describe damage reason"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="reported_by">Reported by *</label>
            <input type="text" id="modalReportedBy" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your name">
          </div>
        </div>
        <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
          <button id="modalCancelBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel">Cancel</button>
          <button id="modalSaveBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors" data-i18n="save">Report Damage</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
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
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2" data-i18n="delete_title">Delete Damage Record</h3>
                <p class="text-center text-slate-500 dark:text-slate-400 mb-6"><span data-i18n="delete_confirmation">Are you sure you want to delete the damage record for</span> <span id="deleteItemName" class="font-medium text-slate-700 dark:text-slate-300"></span>? <span data-i18n="delete_warning">This action cannot be undone.</span></p>
                <div class="flex flex-col-reverse sm:flex-row gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel">Cancel</button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm" data-i18n="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- View Details Modal -->
  <div id="viewModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
      <div class="flex-1 sm:hidden"></div>
      <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md overflow-hidden">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
          <h2 class="text-lg font-semibold text-slate-900 dark:text-white" data-i18n="damage_details">Damage Details</h2>
          <button id="closeViewModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
        <div class="p-4 space-y-4">
          <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4">
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600 dark:text-red-400"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <div>
                <p class="text-sm text-red-600 dark:text-red-400" data-i18n="damaged_item">Damaged Item</p>
                <p class="text-xl font-bold text-red-700 dark:text-red-300" id="viewItemName">-</p>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="text-xs text-slate-500 block mb-1" data-i18n="item_code">Item Code</label>
              <p class="text-slate-900 dark:text-white font-mono" id="viewItemCode">-</p>
            </div>
            <div>
              <label class="text-xs text-slate-500 block mb-1" data-i18n="quantity">Quantity</label>
              <p class="text-red-600 dark:text-red-400 font-bold text-lg" id="viewQuantity">-</p>
            </div>
            <div class="col-span-2">
              <label class="text-xs text-slate-500 block mb-1" data-i18n="reason">Reason</label>
              <p class="text-slate-900 dark:text-white" id="viewReason">-</p>
            </div>
            <div>
              <label class="text-xs text-slate-500 block mb-1" data-i18n="reported_by">Reported By</label>
              <p class="text-slate-900 dark:text-white" id="viewReportedBy">-</p>
            </div>
            <div>
              <label class="text-xs text-slate-500 block mb-1" data-i18n="reported_date">Reported Date</label>
              <p class="text-slate-900 dark:text-white" id="viewCreatedAt">-</p>
            </div>
          </div>
        </div>
        <div class="p-4 border-t border-slate-200 dark:border-slate-700">
          <button id="closeViewFooterBtn" class="w-full px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="close">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // ---------- DATA MODELS ----------
    let damages = [
      {
        damage_id: '1',
        business_id: 'biz1',
        item_id: '1',
        item_name: 'Wireless Headphones',
        quantity: 3,
        reason: 'Shipping damage - box crushed during transit',
        reported_by: 'Jane Staff',
        created_by: '2',
        createdAt: new Date(2025, 2, 14),
        updatedAt: new Date(),
      },
      {
        damage_id: '2',
        business_id: 'biz1',
        item_id: '2',
        item_name: 'Cotton T-Shirt',
        quantity: 5,
        reason: 'Water damage in warehouse from leaking roof',
        reported_by: 'John Admin',
        created_by: '1',
        createdAt: new Date(2025, 2, 10),
        updatedAt: new Date(),
      },
      {
        damage_id: '3',
        business_id: 'biz1',
        item_id: '3',
        item_name: 'Smart Watch',
        quantity: 1,
        reason: 'Manufacturing defect - screen not turning on',
        reported_by: 'Jane Staff',
        created_by: '2',
        createdAt: new Date(2025, 2, 5),
        updatedAt: new Date(),
      },
      {
        damage_id: '4',
        business_id: 'biz1',
        item_id: '1',
        item_name: 'Wireless Headphones',
        quantity: 2,
        reason: 'Missing ear cushions',
        reported_by: 'Mike Wilson',
        created_by: '3',
        createdAt: new Date(2025, 2, 1),
        updatedAt: new Date(),
      }
    ];

    const itemOptions = [
      { value: '1', label: 'Wireless Headphones', code: 'ITM001' },
      { value: '2', label: 'Cotton T-Shirt', code: 'ITM002' },
      { value: '3', label: 'Smart Watch', code: 'ITM003' },
      { value: '5', label: 'Yoga Mat', code: 'ITM005' }
    ];

    // Helper: get item code
    function getItemCode(itemId) {
      const found = itemOptions.find(opt => opt.value === itemId);
      return found ? found.code : itemId;
    }

    // Helper: get item label
    function getItemLabel(itemId) {
      const found = itemOptions.find(opt => opt.value === itemId);
      return found ? found.label : 'Unknown Item';
    }

    // Helper: format date
    function formatDate(dateObj) {
      if (!dateObj) return '';
      return new Date(dateObj).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    }

    // State for search and filters
    let searchQuery = '';
    let currentDeleteId = null;
    let currentFilterItem = '';
    let currentSort = 'newest';

    // Helper: filter damages based on search and item filter
    function getFilteredDamages() {
      let filtered = [...damages];
      
      // Apply search filter
      if (searchQuery.trim()) {
        const lowerQuery = searchQuery.toLowerCase();
        filtered = filtered.filter(d => 
          (d.item_name && d.item_name.toLowerCase().includes(lowerQuery)) ||
          (d.reason && d.reason.toLowerCase().includes(lowerQuery)) ||
          (d.reported_by && d.reported_by.toLowerCase().includes(lowerQuery))
        );
      }
      
      // Apply item filter
      if (currentFilterItem) {
        filtered = filtered.filter(d => d.item_id === currentFilterItem);
      }
      
      // Apply sorting
      switch(currentSort) {
        case 'oldest':
          filtered.sort((a, b) => new Date(a.createdAt) - new Date(b.createdAt));
          break;
        case 'quantity_high':
          filtered.sort((a, b) => b.quantity - a.quantity);
          break;
        case 'quantity_low':
          filtered.sort((a, b) => a.quantity - b.quantity);
          break;
        case 'newest':
        default:
          filtered.sort((a, b) => new Date(b.createdAt) - new Date(a.createdAt));
          break;
      }
      
      return filtered;
    }

    // Update stats
    function updateStats() {
      const total = damages.reduce((sum, d) => sum + (d.quantity || 0), 0);
      const totalRecords = damages.length;
      
      const now = new Date();
      const currentMonth = now.getMonth();
      const currentYear = now.getFullYear();
      
      const thisMonthDamages = damages.filter(d => {
        const date = new Date(d.createdAt);
        return date.getMonth() === currentMonth && date.getFullYear() === currentYear;
      });
      const thisMonthCount = thisMonthDamages.reduce((sum, d) => sum + d.quantity, 0);
      
      const thirtyDaysAgo = new Date();
      thirtyDaysAgo.setDate(thirtyDaysAgo.getDate() - 30);
      const last30DaysDamages = damages.filter(d => new Date(d.createdAt) >= thirtyDaysAgo);
      const last30DaysCount = last30DaysDamages.reduce((sum, d) => sum + d.quantity, 0);
      
      const avgQuantity = totalRecords > 0 ? (total / totalRecords).toFixed(1) : 0;
      
      document.getElementById('totalDamagedCount').innerText = total;
      document.getElementById('totalRecordsCount').innerText = totalRecords;
      document.getElementById('thisMonthCount').innerText = thisMonthCount;
      document.getElementById('last30DaysCount').innerText = last30DaysCount;
      document.getElementById('avgQuantity').innerText = avgQuantity;
    }

    // Update UI: both table, mobile cards, total count, empty message
    function renderUI() {
      const filtered = getFilteredDamages();
      updateStats();

      const tableBody = document.getElementById('damagesTableBody');
      const mobileContainer = document.getElementById('mobileDamagesContainer');
      const emptyMsgDiv = document.getElementById('emptyMessageContainer');

      if (filtered.length === 0) {
        tableBody.innerHTML = '';
        mobileContainer.innerHTML = '';
        emptyMsgDiv.classList.remove('hidden');
        const emptyRow = document.createElement('tr');
        emptyRow.innerHTML = `<td colspan="7" class="px-4 py-8 text-center text-slate-500">${window.translate ? window.translate('no_records_found') : 'No damaged records found.'}</td>`;
        tableBody.appendChild(emptyRow);
        mobileContainer.innerHTML = `<div class="p-8 text-center text-slate-500">${window.translate ? window.translate('no_records_found') : 'No damaged records found.'}</div>`;
        return;
      }
      emptyMsgDiv.classList.add('hidden');

      // ---- Desktop table ----
      tableBody.innerHTML = '';
      filtered.forEach(d => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors';
        row.innerHTML = `
          <td class="px-4 py-3">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600 dark:text-red-400"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <span class="font-medium text-slate-900 dark:text-white">${escapeHtml(d.item_name || 'Unknown')}</span>
            </div>
            </td>
          <td class="px-4 py-3 text-sm text-slate-500 font-mono">${escapeHtml(getItemCode(d.item_id))}</td>
          <td class="px-4 py-3 text-sm font-medium text-red-600 dark:text-red-400">${d.quantity}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300 max-w-xs truncate" title="${escapeHtml(d.reason)}">${escapeHtml(d.reason.substring(0, 60))}${d.reason.length > 60 ? '...' : ''}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(d.reported_by)}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${formatDate(d.createdAt)}</td>
          <td class="px-4 py-3 text-right">
            <div class="flex items-center justify-end gap-2">
              <button class="view-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" data-id="${d.damage_id}" title="${window.translate ? window.translate('view') : 'View'}">
                <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              </button>
              <button class="edit-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" data-id="${d.damage_id}" title="${window.translate ? window.translate('edit') : 'Edit'}">
                <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
              </button>
              <button class="delete-btn p-2 hover:bg-red-100 dark:hover:bg-red-900/30 rounded-lg transition-colors" data-id="${d.damage_id}" data-name="${escapeHtml(d.item_name)}" title="${window.translate ? window.translate('delete') : 'Delete'}">
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
              </button>
            </div>
           </td>
        `;
        tableBody.appendChild(row);
      });

      // Attach event listeners to buttons
      document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          const id = btn.getAttribute('data-id');
          viewDamage(id);
        });
      });
      document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          const id = btn.getAttribute('data-id');
          editDamage(id);
        });
      });
      document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          const id = btn.getAttribute('data-id');
          const name = btn.getAttribute('data-name');
          openDeleteModal(id, name);
        });
      });

      // ---- Mobile card view ----
      mobileContainer.innerHTML = '';
      filtered.forEach(d => {
        const card = document.createElement('div');
        card.className = 'p-4 space-y-3 border-b border-slate-200 dark:border-slate-700';
        card.innerHTML = `
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600 dark:text-red-400"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <span class="font-medium text-slate-900 dark:text-white">${escapeHtml(d.item_name)}</span>
            </div>
            <div class="flex gap-1">
              <button class="mobile-view-btn p-2 text-blue-600 dark:text-blue-400" data-id="${d.damage_id}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
              <button class="mobile-edit-btn p-2 text-amber-600 dark:text-amber-400" data-id="${d.damage_id}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3l4 4-7 7H10v-4l7-7z"/><path d="M4 20h16"/></svg>
              </button>
              <button class="mobile-delete-btn p-2 text-red-600 dark:text-red-400" data-id="${d.damage_id}" data-name="${escapeHtml(d.item_name)}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
              </button>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-2 text-sm">
            <div><span class="text-slate-500 text-xs block" data-i18n="quantity">Quantity</span><span class="font-medium text-red-600 dark:text-red-400">${d.quantity}</span></div>
            <div><span class="text-slate-500 text-xs block" data-i18n="item_code">Item Code</span><span class="text-slate-700 dark:text-slate-300 font-mono text-xs">${escapeHtml(getItemCode(d.item_id))}</span></div>
            <div><span class="text-slate-500 text-xs block" data-i18n="reported_date">Reported date</span><span class="text-slate-700 dark:text-slate-300">${formatDate(d.createdAt)}</span></div>
            <div class="col-span-2"><span class="text-slate-500 text-xs block" data-i18n="reason">Reason</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(d.reason)}</span></div>
            <div class="col-span-2"><span class="text-slate-500 text-xs block" data-i18n="reported_by">Reported by</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(d.reported_by)}</span></div>
          </div>
        `;
        mobileContainer.appendChild(card);
      });

      // Attach mobile button events
      document.querySelectorAll('.mobile-view-btn').forEach(btn => {
        btn.addEventListener('click', () => viewDamage(btn.getAttribute('data-id')));
      });
      document.querySelectorAll('.mobile-edit-btn').forEach(btn => {
        btn.addEventListener('click', () => editDamage(btn.getAttribute('data-id')));
      });
      document.querySelectorAll('.mobile-delete-btn').forEach(btn => {
        btn.addEventListener('click', () => openDeleteModal(btn.getAttribute('data-id'), btn.getAttribute('data-name')));
      });
    }

    // XSS protection
    function escapeHtml(str) {
      if (!str) return '';
      return str.replace(/[&<>]/g, function(m) {
        if (m === '&') return '&amp;';
        if (m === '<') return '&lt;';
        if (m === '>') return '&gt;';
        return m;
      });
    }

    // ---------- VIEW DAMAGE ----------
    function viewDamage(id) {
      const damage = damages.find(d => d.damage_id === id);
      if (!damage) return;
      
      document.getElementById('viewItemName').innerText = damage.item_name || 'Unknown';
      document.getElementById('viewItemCode').innerText = getItemCode(damage.item_id);
      document.getElementById('viewQuantity').innerText = damage.quantity;
      document.getElementById('viewReason').innerText = damage.reason;
      document.getElementById('viewReportedBy').innerText = damage.reported_by;
      document.getElementById('viewCreatedAt').innerText = formatDate(damage.createdAt);
      
      document.getElementById('viewModal').classList.remove('hidden');
      document.body.classList.add('modal-open');
    }

    // ---------- EDIT DAMAGE ----------
    function editDamage(id) {
      const damage = damages.find(d => d.damage_id === id);
      if (!damage) return;
      
      document.getElementById('modalTitle').innerText = window.translate ? window.translate('edit_damage_title') : 'Edit Damage Report';
      document.getElementById('modalSaveBtn').innerHTML = window.translate ? window.translate('update') : 'Update Damage';
      document.getElementById('editDamageId').value = damage.damage_id;
      
      // Populate form
      document.getElementById('modalItemSelect').value = damage.item_id;
      document.getElementById('modalQuantity').value = damage.quantity;
      document.getElementById('modalReason').value = damage.reason;
      document.getElementById('modalReportedBy').value = damage.reported_by;
      
      // Update item code preview
      const code = getItemCode(damage.item_id);
      const itemCodePreview = document.getElementById('itemCodePreview');
      itemCodePreview.innerText = `Item Code: ${code}`;
      itemCodePreview.classList.remove('hidden');
      
      // Open modal
      document.getElementById('damageModal').classList.remove('hidden');
      document.body.classList.add('modal-open');
    }

    // ---------- DELETE DAMAGE (with confirmation) ----------
    function openDeleteModal(id, itemName) {
      currentDeleteId = id;
      document.getElementById('deleteItemName').innerText = itemName;
      document.getElementById('deleteModal').classList.remove('hidden');
      document.body.classList.add('modal-open');
    }
    
    function confirmDelete() {
      if (currentDeleteId) {
        damages = damages.filter(d => d.damage_id !== currentDeleteId);
        renderUI();
        closeDeleteModal();
      }
    }
    
    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
      document.body.classList.remove('modal-open');
      currentDeleteId = null;
    }

    // ---------- MODAL HANDLERS (Add/Edit) ----------
    const modal = document.getElementById('damageModal');
    const openBtn = document.getElementById('openModalBtn');
    const modalItemSelect = document.getElementById('modalItemSelect');
    const modalQuantity = document.getElementById('modalQuantity');
    const modalReason = document.getElementById('modalReason');
    const modalReportedBy = document.getElementById('modalReportedBy');
    const itemCodePreview = document.getElementById('itemCodePreview');

    function resetModalForm() {
      document.getElementById('modalTitle').innerText = window.translate ? window.translate('report_damage_title') : 'Report Damage';
      document.getElementById('modalSaveBtn').innerHTML = window.translate ? window.translate('save') : 'Report Damage';
      document.getElementById('editDamageId').value = '';
      modalItemSelect.value = '';
      modalQuantity.value = '';
      modalReason.value = '';
      modalReportedBy.value = '';
      itemCodePreview.classList.add('hidden');
      itemCodePreview.innerText = '';
    }

    function openModal() {
      resetModalForm();
      modal.classList.remove('hidden');
      document.body.classList.add('modal-open');
    }

    function closeModal() {
      modal.classList.add('hidden');
      document.body.classList.remove('modal-open');
    }

    // Preview item code on select
    modalItemSelect.addEventListener('change', function() {
      const selectedVal = modalItemSelect.value;
      if (selectedVal) {
        const code = getItemCode(selectedVal);
        itemCodePreview.innerText = `Item Code: ${code}`;
        itemCodePreview.classList.remove('hidden');
      } else {
        itemCodePreview.classList.add('hidden');
      }
    });

    function saveDamage() {
      const itemId = modalItemSelect.value;
      const quantityRaw = modalQuantity.value;
      const reason = modalReason.value.trim();
      const reportedBy = modalReportedBy.value.trim();
      const editId = document.getElementById('editDamageId').value;

      if (!itemId) {
        alert(window.translate ? window.translate('item_required') : 'Please select an item');
        return;
      }
      if (!quantityRaw || parseInt(quantityRaw) <= 0) {
        alert(window.translate ? window.translate('quantity_required') : 'Please enter a valid quantity');
        return;
      }
      if (!reason) {
        alert(window.translate ? window.translate('reason_required') : 'Please enter a reason');
        return;
      }
      if (!reportedBy) {
        alert(window.translate ? window.translate('reporter_required') : 'Please enter reporter name');
        return;
      }

      const quantity = parseInt(quantityRaw);
      const selectedItem = itemOptions.find(opt => opt.value === itemId);
      
      if (editId) {
        // Update existing damage record
        const index = damages.findIndex(d => d.damage_id === editId);
        if (index !== -1) {
          damages[index] = {
            ...damages[index],
            item_id: itemId,
            item_name: selectedItem ? selectedItem.label : 'Unknown Item',
            quantity: quantity,
            reason: reason,
            reported_by: reportedBy,
            updatedAt: new Date(),
          };
        }
      } else {
        // Create new damage record
        const newDamage = {
          damage_id: Date.now().toString(),
          business_id: 'biz1',
          item_id: itemId,
          item_name: selectedItem ? selectedItem.label : 'Unknown Item',
          quantity: quantity,
          reason: reason,
          reported_by: reportedBy,
          created_by: '1',
          createdAt: new Date(),
          updatedAt: new Date(),
        };
        damages = [newDamage, ...damages];
      }
      
      renderUI();
      closeModal();
    }

    // Filter and sort event listeners
    const filterItemSelect = document.getElementById('filterItemSelect');
    const sortSelect = document.getElementById('sortSelect');
    
    filterItemSelect.addEventListener('change', (e) => {
      currentFilterItem = e.target.value;
      renderUI();
    });
    
    sortSelect.addEventListener('change', (e) => {
      currentSort = e.target.value;
      renderUI();
    });

    // Event listeners
    openBtn.addEventListener('click', openModal);
    document.getElementById('closeModalBtn')?.addEventListener('click', closeModal);
    document.getElementById('modalCancelBtn')?.addEventListener('click', closeModal);
    document.getElementById('modalBackdrop')?.addEventListener('click', closeModal);
    document.getElementById('modalTopDismiss')?.addEventListener('click', closeModal);
    document.getElementById('modalSaveBtn')?.addEventListener('click', saveDamage);
    
    // View modal listeners
    function closeViewModal() {
      document.getElementById('viewModal').classList.add('hidden');
      document.body.classList.remove('modal-open');
    }
    document.getElementById('closeViewModalBtn')?.addEventListener('click', closeViewModal);
    document.getElementById('closeViewFooterBtn')?.addEventListener('click', closeViewModal);
    document.getElementById('viewModalBackdrop')?.addEventListener('click', closeViewModal);
    
    // Delete modal listeners
    document.getElementById('cancelDeleteBtn')?.addEventListener('click', closeDeleteModal);
    document.getElementById('confirmDeleteBtn')?.addEventListener('click', confirmDelete);
    document.getElementById('deleteModalBackdrop')?.addEventListener('click', closeDeleteModal);

    // Search listener
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', (e) => {
      searchQuery = e.target.value;
      renderUI();
    });


    // Keyboard shortcuts
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        if (modal && !modal.classList.contains('hidden')) closeModal();
        if (document.getElementById('deleteModal') && !document.getElementById('deleteModal').classList.contains('hidden')) closeDeleteModal();
        if (document.getElementById('viewModal') && !document.getElementById('viewModal').classList.contains('hidden')) closeViewModal();
      }
    });

    // Initial render
    renderUI();
  </script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../../includes/footer.php';
?>