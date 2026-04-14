<?php
// ============================================
// File: modules/payments/index.php
// Description: Payments management
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Payments | Qty Management';
ob_start();
?>

<script src="../../assets/js/payment/translations.js"></script>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8 space-y-6">

<div>
    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="payments_title">Payments Management</h1>
    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="damages_subtitle">Manage damages efficiently, keep products organized, and track performance at a glance.</p>
</div>
    
    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <!-- Total Revenue -->
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 shadow-sm">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400" data-i18n="total_revenue">Total Revenue</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white" id="totalRevenue">$0.00</p>
          </div>
          <div class="bg-emerald-500 p-3 rounded-lg text-white shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          </div>
        </div>
      </div>
      <!-- Pending Amount -->
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400" data-i18n="pending_amount">Pending Amount</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white" id="pendingAmount">$0.00</p>
          </div>
          <div class="bg-amber-500 p-3 rounded-lg text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          </div>
        </div>
      </div>
      <!-- COD Payments count -->
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400" data-i18n="cod_payments">COD Payments</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white" id="codCount">0</p>
          </div>
          <div class="bg-blue-500 p-3 rounded-lg text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/><circle cx="12" cy="12" r="3"/></svg>
          </div>
        </div>
      </div>
      <!-- Bank Transfers count -->
      <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400" data-i18n="bank_transfers">Bank Transfers</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white" id="bankCount">0</p>
          </div>
          <div class="bg-purple-500 p-3 rounded-lg text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><rect x="2" y="6" width="20" height="12" rx="2"></rect><path d="M22 10H2M7 14h.01M12 14h.01M17 14h.01"></path></svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Filters Section -->
    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
      <div class="relative w-full sm:w-72">
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="10" cy="10" r="7"/><line x1="21" y1="21" x2="15" y2="15"/></svg>
        <input type="text" id="searchInput" placeholder="Search by Order ID or Payment ID..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" data-i18n-placeholder="search_placeholder">
      </div>
      <select id="statusFilter" class="w-full sm:w-48 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="" data-i18n="all_status">All Status</option>
        <option value="pending" data-i18n="pending">Pending</option>
        <option value="verified" data-i18n="verified">Verified</option>
      </select>
    </div>

    <!-- Payments Table + Mobile Cards (combined container) -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
      <!-- Mobile Card View -->
      <div id="mobileCardsContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
      <!-- Desktop Table View -->
      <div class="hidden md:block overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60">
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="payment_id">Payment ID</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="order_number">Order Number</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="amount">Amount</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="method">Method</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="status">Status</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="date">Date</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="actions">Actions</th>
            </tr>
          </thead>
          <tbody id="paymentsTableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
        </table>
      </div>
      <!-- Empty state message appears inside both views -->
      <div id="emptyMessage" class="hidden text-center py-12 text-slate-500 dark:text-slate-400" data-i18n="no_payments_found">No payments found.</div>
    </div>
  </div>

  <!-- View Payment Modal (hidden by default) -->
  <div id="viewModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
      <div class="flex-1 sm:hidden" id="modalDismissArea"></div>
      <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-lg max-h-[90vh] overflow-hidden">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
          <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
          <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="payment_details">Payment Details</h2>
          <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </button>
        </div>
        <div id="modalContent" class="p-4 overflow-y-auto max-h-[calc(90vh-140px)] space-y-6 modal-scroll"></div>
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
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2" data-i18n="delete_payment">Delete Payment</h3>
                <p class="text-center text-slate-500 dark:text-slate-400 mb-6" data-i18n="delete_confirmation_message">Are you sure you want to delete this payment? This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel">Cancel</button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm" data-i18n="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
  </div>

  <script>
    // ----- MOCK DATA (identical to React mock)
    let mockPayments = [
      { payment_id: 'PAY-2024-001', business_id: 'biz1', order_id: '1', order_number: 'ORD-2024-001', amount: 185.97, payment_method: 'bank_transfer', payment_date: new Date('2024-01-15'), payment_status: 'verified', verified_by: '1', created_by: '1', createdAt: new Date('2024-01-15'), updatedAt: new Date('2024-01-15') },
      { payment_id: 'PAY-2024-002', business_id: 'biz1', order_id: '2', order_number: 'ORD-2024-002', amount: 102.96, payment_method: 'cod', payment_date: new Date('2024-01-18'), payment_status: 'pending', created_by: '1', createdAt: new Date('2024-01-18'), updatedAt: new Date('2024-01-18') },
      { payment_id: 'PAY-2024-003', business_id: 'biz1', order_id: '3', order_number: 'ORD-2024-003', amount: 240.98, payment_method: 'bank_transfer', payment_date: new Date('2024-01-20'), payment_status: 'verified', verified_by: '1', created_by: '1', createdAt: new Date('2024-01-20'), updatedAt: new Date('2024-01-20') },
      { payment_id: 'PAY-2024-004', business_id: 'biz1', order_id: '4', order_number: 'ORD-2024-004', amount: 83.97, payment_method: 'cod', payment_date: new Date('2024-01-22'), payment_status: 'pending', created_by: '1', createdAt: new Date('2024-01-22'), updatedAt: new Date('2024-01-22') }
    ];

    let paymentsData = [...mockPayments];
    let selectedPaymentForModal = null;
    let paymentToDelete = null;

    // Helper: format date
    function formatDate(date) {
      return new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    }

    // Status color mapping
    function getStatusBadgeClass(status) {
      if (status === 'pending') return 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400';
      if (status === 'verified') return 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400';
      return 'bg-slate-100 text-slate-600';
    }

    // Update stats (total revenue, pending amount, cod count, bank count)
    function updateStats(payments) {
      const totalRevenue = payments.filter(p => p.payment_status === 'verified').reduce((sum, p) => sum + p.amount, 0);
      const pendingAmount = payments.filter(p => p.payment_status === 'pending').reduce((sum, p) => sum + p.amount, 0);
      const codCount = payments.filter(p => p.payment_method === 'cod').length;
      const bankCount = payments.filter(p => p.payment_method === 'bank_transfer').length;
      document.getElementById('totalRevenue').innerText = `$${totalRevenue.toFixed(2)}`;
      document.getElementById('pendingAmount').innerText = `$${pendingAmount.toFixed(2)}`;
      document.getElementById('codCount').innerText = codCount;
      document.getElementById('bankCount').innerText = bankCount;
    }

    // Delete payment handler
    function handleDelete(paymentId) {
      paymentToDelete = paymentId;
      const deleteModal = document.getElementById('deleteModal');
      deleteModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function confirmDelete() {
      if (paymentToDelete) {
        paymentsData = paymentsData.filter(p => p.payment_id !== paymentToDelete);
        
        // Close modal if the deleted payment was open
        if (selectedPaymentForModal && selectedPaymentForModal.payment_id === paymentToDelete) {
          closeModal();
        }
        
        renderPayments();
        closeDeleteModal();
        paymentToDelete = null;
      }
    }

    function closeDeleteModal() {
      const deleteModal = document.getElementById('deleteModal');
      deleteModal.classList.add('hidden');
      document.body.style.overflow = '';
      paymentToDelete = null;
    }

    // Render logic: filter payments based on search & status filter, then render desktop table and mobile cards
    function renderPayments() {
      const searchQuery = document.getElementById('searchInput').value.toLowerCase();
      const statusFilter = document.getElementById('statusFilter').value;
      
      let filtered = paymentsData.filter(p => {
        const matchesSearch = (p.order_number?.toLowerCase().includes(searchQuery) || p.payment_id.toLowerCase().includes(searchQuery));
        const matchesStatus = !statusFilter || p.payment_status === statusFilter;
        return matchesSearch && matchesStatus;
      });
      
      // update stats with full data (not filtered, consistent with original: stats use all payments)
      updateStats(paymentsData);
      
      const tableBody = document.getElementById('paymentsTableBody');
      const mobileContainer = document.getElementById('mobileCardsContainer');
      const emptyMsgDiv = document.getElementById('emptyMessage');
      
      if (filtered.length === 0) {
        tableBody.innerHTML = '';
        mobileContainer.innerHTML = '';
        emptyMsgDiv.classList.remove('hidden');
        return;
      }
      emptyMsgDiv.classList.add('hidden');
      
      // Desktop rows
      tableBody.innerHTML = filtered.map(p => `
        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
          <td class="px-4 py-3 text-sm text-slate-500 font-mono">${p.payment_id}</td>
          <td class="px-4 py-3 text-sm text-slate-900 dark:text-white font-medium">${p.order_number}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">$${p.amount.toFixed(2)}</td>
          <td class="px-4 py-3">
            <div class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-300">
              ${p.payment_method === 'cod' ? 
                `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald-500"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/><circle cx="12" cy="12" r="3"/></svg>` :
                `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-blue-500"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M22 10H2M7 14h.01M12 14h.01M17 14h.01"/></svg>`
              }
              <span class="capitalize">${p.payment_method.replace('_', ' ')}</span>
            </div>
          </td>
          <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${getStatusBadgeClass(p.payment_status)}">${p.payment_status}</span></td>
          <td class="px-4 py-3 text-sm">${formatDate(p.payment_date)}</td>
          <td class="px-4 py-3">
            <div class="flex items-center gap-2">
              <button data-payment-id="${p.payment_id}" class="view-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="View Details">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
              ${p.payment_status === 'pending' ? `<button data-payment-id="${p.payment_id}" class="verify-btn p-2 text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 rounded-lg" title="Verify Payment">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
              </button>` : ''}
              <button data-payment-id="${p.payment_id}" class="delete-btn p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg" title="Delete Payment">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="3 6 5 6 21 6"></polyline>
                  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');
      
      // Mobile cards rendering
      mobileContainer.innerHTML = filtered.map(p => `
        <div class="p-4 space-y-3 border-b border-slate-200 dark:border-slate-700 last:border-b-0">
          <div class="flex items-center justify-between">
            <div class="font-medium text-slate-900 dark:text-white">${p.order_number}</div>
            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-mono">${p.payment_id}</span>
          </div>
          <div class="grid grid-cols-2 gap-2 text-sm">
            <div><span class="text-slate-500 text-xs block">Amount</span><span class="text-slate-700 dark:text-slate-300">$${p.amount.toFixed(2)}</span></div>
            <div><span class="text-slate-500 text-xs block">Method</span><div class="flex items-center gap-2">${p.payment_method === 'cod' ? '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald-500"><circle cx="12" cy="12" r="3"/></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-blue-500"><rect x="2" y="6" width="20" height="12" rx="2"/></svg>'}<span class="capitalize">${p.payment_method.replace('_', ' ')}</span></div></div>
            <div><span class="text-slate-500 text-xs block mb-1">Status</span><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${getStatusBadgeClass(p.payment_status)}">${p.payment_status}</span></div>
            <div><span class="text-slate-500 text-xs block">Date</span><span class="text-slate-700 dark:text-slate-300">${formatDate(p.payment_date)}</span></div>
          </div>
          <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-700">
            <button data-payment-id="${p.payment_id}" class="view-mobile-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
            ${p.payment_status === 'pending' ? `<button data-payment-id="${p.payment_id}" class="verify-mobile-btn p-2 text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 rounded-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
            </button>` : ''}
            <button data-payment-id="${p.payment_id}" class="delete-mobile-btn p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
              </svg>
            </button>
          </div>
        </div>
      `).join('');
      
      // Re-attach event listeners for view, verify, and delete (desktop + mobile)
      document.querySelectorAll('.view-btn, .view-mobile-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
          const id = btn.getAttribute('data-payment-id');
          const payment = paymentsData.find(p => p.payment_id === id);
          if (payment) openModal(payment);
        });
      });
      
      document.querySelectorAll('.verify-btn, .verify-mobile-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
          const id = btn.getAttribute('data-payment-id');
          handleVerify(id);
        });
      });
      
      document.querySelectorAll('.delete-btn, .delete-mobile-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
          const id = btn.getAttribute('data-payment-id');
          handleDelete(id);
        });
      });
    }
    
    // Verify handler updates state, re-renders, closes modal if open
    function handleVerify(paymentId) {
      paymentsData = paymentsData.map(p => 
        p.payment_id === paymentId ? { ...p, payment_status: 'verified', verified_by: '1', updatedAt: new Date() } : p
      );
      renderPayments();
      // If modal is open and the verified payment is currently selected, close modal after verify
      if (selectedPaymentForModal && selectedPaymentForModal.payment_id === paymentId) {
        closeModal();
      }
    }
    
    // Modal functions
    function openModal(payment) {
      selectedPaymentForModal = payment;
      const modal = document.getElementById('viewModal');
      const modalContent = document.getElementById('modalContent');
      const statusColor = getStatusBadgeClass(payment.payment_status);
      modalContent.innerHTML = `
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-lg flex items-center justify-center ${payment.payment_method === 'cod' ? 'bg-emerald-100 dark:bg-emerald-900/30' : 'bg-blue-100 dark:bg-blue-900/30'}">
              ${payment.payment_method === 'cod' ? 
                `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald-600 dark:text-emerald-400"><circle cx="12" cy="12" r="3"/></svg>` :
                `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-blue-600 dark:text-blue-400"><rect x="2" y="6" width="20" height="12" rx="2"/></svg>`
              }
            </div>
            <div><p class="font-semibold text-slate-900 dark:text-white">${payment.payment_id}</p><p class="text-sm text-slate-500">${formatDate(payment.payment_date)}</p></div>
          </div>
          <span class="inline-flex items-center px-2.5 py-1 rounded-full text-sm font-medium ${statusColor}">${payment.payment_status}</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div><p class="text-sm text-slate-500">Order Number</p><p class="font-medium">${payment.order_number}</p></div>
          <div><p class="text-sm text-slate-500">Amount</p><p class="font-medium text-xl">$${payment.amount.toFixed(2)}</p></div>
          <div><p class="text-sm text-slate-500">Payment Method</p><p class="font-medium capitalize">${payment.payment_method.replace('_', ' ')}</p></div>
          <div><p class="text-sm text-slate-500">Payment Date</p><p class="font-medium">${formatDate(payment.payment_date)}</p></div>
          ${payment.verified_by ? `<div class="col-span-2"><p class="text-sm text-slate-500">Verified By</p><p class="font-medium">Admin User</p></div>` : ''}
        </div>
        ${payment.payment_status === 'pending' ? `<div class="pt-4 border-t border-slate-200 dark:border-slate-700"><button id="modalVerifyBtn" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-emerald-500 text-white font-medium rounded-lg hover:bg-emerald-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Verify Payment</button></div>` : ''}
        <div class="pt-4 border-t border-slate-200 dark:border-slate-700"><button id="modalDeleteBtn" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Delete Payment</button></div>
      `;
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
      
      // attach modal verify if present
      const modalVerifyBtn = document.getElementById('modalVerifyBtn');
      if (modalVerifyBtn) {
        modalVerifyBtn.addEventListener('click', () => {
          handleVerify(payment.payment_id);
          closeModal();
        });
      }
      
      // attach modal delete button
      const modalDeleteBtn = document.getElementById('modalDeleteBtn');
      if (modalDeleteBtn) {
        modalDeleteBtn.addEventListener('click', () => {
          closeModal();
          handleDelete(payment.payment_id);
        });
      }
    }
    
    function closeModal() {
      const modal = document.getElementById('viewModal');
      modal.classList.add('hidden');
      document.body.style.overflow = '';
      selectedPaymentForModal = null;
    }
    
    // Event listeners for filters & search
    document.getElementById('searchInput').addEventListener('input', () => renderPayments());
    document.getElementById('statusFilter').addEventListener('change', () => renderPayments());
    
    // Modal close events
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('modalBackdrop').addEventListener('click', closeModal);
    document.getElementById('modalDismissArea')?.addEventListener('click', closeModal);
    
    // Delete modal events
    document.getElementById('cancelDeleteBtn').addEventListener('click', closeDeleteModal);
    document.getElementById('confirmDeleteBtn').addEventListener('click', confirmDelete);
    document.getElementById('deleteModalBackdrop').addEventListener('click', closeDeleteModal);
    
    // Initial render
    renderPayments();
  </script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../../includes/footer.php';
?>