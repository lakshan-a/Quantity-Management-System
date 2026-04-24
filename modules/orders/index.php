<?php
// ============================================
// File: modules/orders/index.php
// Description: Orders management
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Orders | Qty Management';
ob_start();
?>

<script src="../../assets/js/translations/orders/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8">
  <!-- Main Orders Page Content -->
  <div class="space-y-6">

    <div>
      <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="orders_title">Orders Management</h1>
      <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="orders_subtitle">Manage your Orders, organize deliveries, and track performance.</p>
    </div>

    <!-- Header + Filters -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="flex flex-col sm:flex-row gap-4">
        <!-- Search input -->
        <div class="relative w-full sm:w-72">
          <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
          <input type="text" id="searchInput" data-i18n-placeholder="search_placeholder" placeholder="Search by order or customer..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Status filter -->
        <select id="statusFilter" class="w-full sm:w-48 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="" data-i18n="all_status">All Status</option>
          <option value="pending" data-i18n="status_pending">Pending</option>
          <option value="processing" data-i18n="status_processing">Processing</option>
          <option value="shipped" data-i18n="status_shipped">Shipped</option>
          <option value="delivered" data-i18n="status_delivered">Delivered</option>
          <option value="returned" data-i18n="status_returned">Returned</option>
        </select>
      </div>
      <button id="newOrderBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        <span data-i18n="new_order_btn">New Order</span>
      </button>
    </div>

    <!-- Orders Table / Cards container -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
      <!-- Mobile card view -->
      <div id="mobileOrdersContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
      <!-- Desktop table view -->
      <div class="hidden md:block overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="border-b border-slate-200 dark:border-slate-700">
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="col_order_number">Order Number</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="col_customer">Customer</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="col_total">Total</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="col_payment">Payment</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="col_status">Status</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="col_date">Date</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase" data-i18n="col_actions">Actions</th>
             </tr>
          </thead>
          <tbody id="ordersTableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
         </table>
      </div>
    </div>
  </div>
</div>

<!-- ADD / EDIT MODAL (create) -->
<div id="orderModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
  <div class="fixed inset-0 bg-black/50" id="orderModalBackdrop"></div>
  <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
    <div class="flex-1 sm:hidden"></div>
    <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-3xl max-h-[90vh] overflow-hidden">
      <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="create_order_title">Create New Order</h2>
        <button class="closeModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto max-h-[calc(80vh-140px)]" id="orderFormContainer">
        <form id="orderForm" class="space-y-6">
          <!-- 2 columns: Customer + Courier -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Customer with clickable popup -->
            <div>
              <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-1.5" data-i18n="label_customer">Customer <span class="text-red-500">*</span></label>
              <div class="relative">
                <input type="text" id="customer_id" readonly placeholder="Click to select or add customer" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 cursor-pointer" data-i18n-placeholder="select_customer_placeholder">
                <input type="hidden" id="customer_name_hidden">
                <button type="button" id="openCustomerModalBtn" class="absolute right-2 top-1/2 -translate-y-1/2 p-1.5 text-blue-500 hover:text-blue-600">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </button>
              </div>
            </div>
            <!-- Courier select -->
            <div>
              <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-1.5" data-i18n="label_courier">Courier <span class="text-red-500">*</span></label>
              <select id="courier_id" required class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-blue-500">
                <option value="" data-i18n="select_courier">Select courier</option>
                <option value="1" data-fee="15.99">FedEx - $15.99</option>
                <option value="2" data-fee="12.99">UPS - $12.99</option>
                <option value="3" data-fee="18.99">DHL - $18.99</option>
                <option value="4" data-fee="8.99">Local Courier - $8.99</option>
              </select>
            </div>
          </div>

          <!-- Dynamic Order Items Section (with add/remove) -->
          <div class="border border-slate-200 dark:border-slate-700 rounded-xl p-4 bg-slate-50 dark:bg-slate-800/50">
            <div class="flex flex-wrap justify-between items-center mb-3">
              <label class="text-sm font-semibold text-slate-700 dark:text-slate-200" data-i18n="label_order_items">Order Items</label>
              <button type="button" id="addItemBtn" class="inline-flex items-center gap-1 text-sm bg-white dark:bg-slate-700 px-3 py-1.5 rounded-lg border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span data-i18n="add_item_btn">Add Item</span>
              </button>
            </div>
            <div id="itemsListContainer" class="space-y-3">
              <div class="item-row flex flex-wrap sm:flex-nowrap gap-3 items-center">
                <div class="flex-1 min-w-[180px]">
                  <select class="itemSelect w-full px-3 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
                    <option value="" data-i18n="select_product">Select product</option>
                    <option value="1" data-price="89.99">Wireless Headphones - $89.99</option>
                    <option value="2" data-price="29.99">Cotton T-Shirt - $29.99</option>
                    <option value="3" data-price="249.99">Smart Watch - $249.99</option>
                    <option value="5" data-price="39.99">Yoga Mat - $39.99</option>
                  </select>
                </div>
                <div class="w-28">
                  <input type="number" class="itemQty w-full px-3 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm" value="1" min="1" step="1">
                </div>
                <button type="button" class="removeItemBtn text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50 dark:hover:bg-red-900/20 transition" style="display: none;">✕</button>
              </div>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2" data-i18n="items_helper">Add items, quantity and price will be calculated automatically.</p>
          </div>

          <!-- Payment, Delivery, Discount fields grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1" data-i18n="label_payment_method">Payment Method</label>
              <select id="payment_method" class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                <option value="cod" data-i18n="payment_cod">Cash on Delivery (COD)</option>
                <option value="bank_transfer" data-i18n="payment_bank">Bank Transfer</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1" data-i18n="label_payment_status">Payment Status</label>
              <select id="payment_status" class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                <option value="pending" data-i18n="payment_status_pending">Pending</option>
                <option value="paid" data-i18n="payment_status_paid">Paid</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1" data-i18n="label_delivery_type">Delivery Type</label>
              <select id="delivery_type" class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                <option value="pay" data-i18n="delivery_paid">Paid Delivery</option>
                <option value="free" data-i18n="delivery_free">Free Delivery</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1" data-i18n="label_tracking_number">Tracking Number</label>
              <input type="text" id="tracking_number" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1" data-i18n="label_discount">Discount ($)</label>
              <input type="number" id="discount" value="0" step="0.01" min="0" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
            </div>
            <div class="sm:col-span-2">
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1" data-i18n="label_notes">Notes (Optional)</label>
              <textarea id="notes" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 resize-none" data-i18n-placeholder="notes_placeholder" placeholder="Additional order information..."></textarea>
            </div>
          </div>

          <!-- order summary preview -->
          <div class="bg-slate-100 dark:bg-slate-700/40 rounded-xl p-4">
            <div class="flex justify-between text-sm"><span class="text-slate-600 dark:text-slate-300" data-i18n="summary_subtotal">Subtotal:</span> <span id="previewSubtotal">$0.00</span></div>
            <div class="flex justify-between text-sm mt-1"><span class="text-slate-600 dark:text-slate-300" data-i18n="summary_delivery">Delivery fee:</span> <span id="previewDelivery">$0.00</span></div>
            <div class="flex justify-between text-sm mt-1"><span class="text-slate-600 dark:text-slate-300" data-i18n="summary_discount">Discount:</span> <span id="previewDiscount">$0.00</span></div>
            <div class="flex justify-between font-bold text-base mt-2 pt-2 border-t border-slate-300 dark:border-slate-600"><span data-i18n="summary_total">Total:</span> <span id="previewTotal">$0.00</span></div>
          </div>
        </form>
      </div>
      <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
        <button class="closeModalBtn px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel_btn">Cancel</button>
        <button id="saveOrderBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors" data-i18n="create_order_btn">Create Order</button>
      </div>
    </div>
  </div>
</div>

<!-- CUSTOMER MODAL (Add/Select Customer) -->
<div id="customerModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
  <div class="fixed inset-0 bg-black/50" id="customerModalBackdrop"></div>
  <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
    <div class="flex-1 sm:hidden"></div>
    <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden">
      <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
        <h2 id="customerModalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="select_customer_title">Select Customer</h2>
        <button class="closeCustomerModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto max-h-[calc(90vh-140px)]">
        <!-- Search and Add New Customer -->
        <div class="flex flex-col sm:flex-row gap-3 mb-4">
          <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" id="customerSearchInput" data-i18n-placeholder="search_customers" placeholder="Search customers..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <button id="showAddCustomerFormBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span data-i18n="add_new_customer">Add New Customer</span>
          </button>
        </div>
        
        <!-- Customer List Container -->
        <div id="customerListContainer" class="space-y-2 max-h-80 overflow-y-auto mb-4"></div>
        
        <!-- Add Customer Form (hidden by default) -->
        <div id="addCustomerFormContainer" class="hidden border-t border-slate-200 dark:border-slate-700 pt-4 mt-2">
          <h3 class="text-md font-semibold text-slate-800 dark:text-slate-200 mb-3" data-i18n="add_customer_title">Add New Customer</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_customer_id">Customer ID</label>
              <input type="text" id="new_customer_id_display" readonly class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-60 disabled:cursor-not-allowed font-mono">
              <p class="text-xs text-slate-500 mt-1" data-i18n="auto_generated_hint">Auto-generated</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_full_name">Full Name *</label>
              <input type="text" id="new_full_name" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_phone">Phone *</label>
              <input type="text" id="new_phone" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_email">Email</label>
              <input type="email" id="new_email" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_address">Address</label>
              <input type="text" id="new_address" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_city">City</label>
              <input type="text" id="new_city" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_district">District</label>
              <input type="text" id="new_district" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_postal_code">Postal Code</label>
              <input type="text" id="new_postal_code" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_notes">Notes</label>
              <textarea id="new_notes" rows="2" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
            </div>
          </div>
          <div class="flex justify-end gap-3 mt-4">
            <button id="cancelAddCustomerBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel_btn">Cancel</button>
            <button id="saveNewCustomerBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors" data-i18n="save_btn">Save Customer</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- VIEW ORDER MODAL (details + status update) -->
<div id="viewModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
  <div class="fixed inset-0 bg-black/50" id="viewModalBackdrop"></div>
  <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
    <div class="flex-1 sm:hidden"></div>
    <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden">
      <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="order_details_title">Order <span id="viewOrderNumber"></span></h2>
        <div class="flex items-center gap-2">
          <button id="printFromViewBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="Print Invoice">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
          </button>
          <button class="closeViewModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          </button>
        </div>
      </div>
      <div id="viewModalContent" class="p-4 overflow-y-auto max-h-[calc(90vh-140px)] space-y-6"></div>
    </div>
  </div>
</div>

<!-- DELETE CONFIRM MODAL -->
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
        <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2" data-i18n="delete_order_title">Delete Order</h3>
        <p class="text-center text-slate-500 dark:text-slate-400 mb-6" data-i18n="delete_confirmation_msg">Are you sure you want to delete this order? This action cannot be undone.</p>
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
  let orders = [
    { order_id: '1', business_id: 'biz1', order_number: 'ORD-2024-001', customer_id: 'CUM-2024-001', customer_name: 'John Smith', order_items: [{ item_id: '1', item_name: 'Wireless Headphones', price: 89.99, quantity: 2 }], payment_status: 'paid', payment_method: 'bank_transfer', courier_id: '1', courier_name: 'FedEx', tracking_number: 'FX123456', delivery_fee: 15.99, delivery_type: 'pay', discount: 10, total_amount: 185.97, status: 'delivered', created_by: '1', createdAt: new Date('2024-01-15'), updatedAt: new Date('2024-01-15') },
    { order_id: '2', business_id: 'biz1', order_number: 'ORD-2024-002', customer_id: 'CUM-2024-002', customer_name: 'Sarah Johnson', order_items: [{ item_id: '2', item_name: 'Cotton T-Shirt', price: 29.99, quantity: 3 }], payment_status: 'pending', payment_method: 'cod', courier_id: '2', courier_name: 'UPS', delivery_fee: 12.99, delivery_type: 'pay', discount: 0, total_amount: 102.96, status: 'processing', created_by: '1', createdAt: new Date('2024-01-18'), updatedAt: new Date('2024-01-18') },
    { order_id: '3', business_id: 'biz1', order_number: 'ORD-2024-003', customer_id: 'CUM-2024-003', customer_name: 'Mike Brown', order_items: [{ item_id: '3', item_name: 'Smart Watch', price: 249.99, quantity: 1 }], payment_status: 'paid', payment_method: 'bank_transfer', courier_id: '1', courier_name: 'FedEx', tracking_number: 'FX789012', delivery_fee: 15.99, delivery_type: 'pay', discount: 25, total_amount: 240.98, status: 'shipped', created_by: '1', createdAt: new Date('2024-01-20'), updatedAt: new Date('2024-01-20') },
    { order_id: '4', business_id: 'biz1', order_number: 'ORD-2024-004', customer_id: 'CUM-2024-004', customer_name: 'Emily Davis', order_items: [{ item_id: '5', item_name: 'Yoga Mat', price: 39.99, quantity: 2 }], payment_status: 'pending', payment_method: 'cod', courier_id: '4', courier_name: 'Local Courier', delivery_fee: 8.99, delivery_type: 'pay', discount: 5, total_amount: 83.97, status: 'pending', created_by: '1', createdAt: new Date('2024-01-22'), updatedAt: new Date('2024-01-22') }
  ];

  // Customer data array
  let customers = [
    { customer_id: 'CUM-2024-001', full_name: 'John Smith', phone: '555-0101', email: 'john@example.com', city: 'New York', district: 'Manhattan', postal_code: '10001', address: '123 Main St', notes: '' },
    { customer_id: 'CUM-2024-002', full_name: 'Sarah Johnson', phone: '555-0102', email: 'sarah@example.com', city: 'Los Angeles', district: 'Downtown', postal_code: '90001', address: '456 Oak Ave', notes: '' },
    { customer_id: 'CUM-2024-003', full_name: 'Mike Brown', phone: '555-0103', email: 'mike@example.com', city: 'Chicago', district: 'Loop', postal_code: '60601', address: '789 Pine Rd', notes: '' },
    { customer_id: 'CUM-2024-004', full_name: 'Emily Davis', phone: '555-0104', email: 'emily@example.com', city: 'Houston', district: 'Uptown', postal_code: '77001', address: '321 Elm St', notes: '' }
  ];

  const courierOptions = [{ value: '1', label: 'FedEx', fee: 15.99 },{ value: '2', label: 'UPS', fee: 12.99 },{ value: '3', label: 'DHL', fee: 18.99 },{ value: '4', label: 'Local Courier', fee: 8.99 }];
  const itemOptions = [{ value: '1', label: 'Wireless Headphones', price: 89.99 },{ value: '2', label: 'Cotton T-Shirt', price: 29.99 },{ value: '3', label: 'Smart Watch', price: 249.99 },{ value: '5', label: 'Yoga Mat', price: 39.99 }];

  // Helper: generate next customer ID (CUM-YYYY-XXX)
  function generateCustomerId() {
    const year = new Date().getFullYear();
    const existingForYear = customers.filter(c => c.customer_id.startsWith(`CUM-${year}-`));
    const numbers = existingForYear.map(c => parseInt(c.customer_id.split('-')[2])).filter(n => !isNaN(n));
    const nextNum = numbers.length > 0 ? Math.max(...numbers) + 1 : 1;
    return `CUM-${year}-${String(nextNum).padStart(3, '0')}`;
  }

  // Helper functions
  const formatDate = (date) => new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
  const statusColors = { pending: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400', processing: 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400', shipped: 'bg-cyan-100 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-400', delivered: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400', returned: 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' };
  const paymentStatusColors = { pending: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400', paid: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' };

  let currentDeleteOrderId = null;
  let currentViewOrder = null;
  let selectedCustomerId = null;
  let pendingCustomerId = null; // Store generated ID for new customer

  // Function to update the auto-generated customer ID display
  function updateAutoGeneratedCustomerId() {
    const newCustomerIdInput = document.getElementById('new_customer_id_display');
    if (newCustomerIdInput) {
      pendingCustomerId = generateCustomerId();
      newCustomerIdInput.value = pendingCustomerId;
    }
  }

  // Translation helper that uses the global translations object
  function translate(key) {
    if (window.translations && window.translations[key]) {
      return window.translations[key];
    }
    // Fallback translations for dynamic content
    const fallbacks = {
      'customer_label': 'Customer',
      'courier_label': 'Courier',
      'payment_method_label': 'Payment Method',
      'payment_status_label': 'Payment Status',
      'delivery_type_label': 'Delivery Type',
      'tracking_label': 'Tracking Number',
      'notes_label': 'Notes',
      'items_label': 'Order Items',
      'delivery_fee_label': 'Delivery Fee',
      'discount_label': 'Discount',
      'total_label': 'Total',
      'mark_as_processing': 'Mark as Processing',
      'mark_as_shipped': 'Mark as Shipped',
      'mark_as_delivered': 'Mark as Delivered',
      'print_invoice': 'Print Invoice'
    };
    return fallbacks[key] || key;
  }

  // Ensure viewOrder function is globally accessible
  window.viewOrder = (orderId) => {
    console.log('viewOrder called with ID:', orderId);
    const order = orders.find(o => o.order_id === orderId);
    if (!order) {
      console.error('Order not found:', orderId);
      return;
    }
    currentViewOrder = order;
    
    // Update modal title
    const orderNumberSpan = document.getElementById('viewOrderNumber');
    if (orderNumberSpan) orderNumberSpan.innerText = order.order_number;
    
    const container = document.getElementById('viewModalContent');
    if (!container) {
      console.error('viewModalContent element not found');
      return;
    }
    
    // Calculate subtotal for display
    const subtotal = order.order_items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    
    container.innerHTML = `
       <div class="flex items-center justify-between flex-wrap gap-3">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
          </div>
          <div>
            <p class="font-semibold text-lg">${escapeHtml(order.order_number)}</p>
            <p class="text-sm text-slate-500">${formatDate(order.createdAt)}</p>
          </div>
        </div>
        <span class="inline-flex px-2.5 py-1 rounded-full text-sm font-medium ${statusColors[order.status]}">${order.status}</span>
      </div>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div><p class="text-sm text-slate-500">${t('customer_label')}</p><p class="font-medium">${escapeHtml(order.customer_name)}</p></div>
        <div><p class="text-sm text-slate-500">${t('courier_label')}</p><p class="font-medium">${escapeHtml(order.courier_name)}</p></div>
        <div><p class="text-sm text-slate-500">${t('payment_method_label')}</p><p class="capitalize">${order.payment_method.replace('_', ' ')}</p></div>
        <div><p class="text-sm text-slate-500 mb-1">${t('payment_status_label')}</p><span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium ${paymentStatusColors[order.payment_status]}">${order.payment_status}</span></div>
        <div><p class="text-sm text-slate-500 mb-1">${t('delivery_type_label')}</p><span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium ${order.delivery_type === 'free' ? 'bg-emerald-100 text-emerald-700' : 'bg-blue-100 text-blue-700'}">${order.delivery_type === 'free' ? 'Free' : 'Paid Delivery'}</span></div>
        ${order.tracking_number ? `<div class="col-span-2"><p class="text-sm text-slate-500">${t('tracking_label')}</p><p class="font-mono text-sm">${escapeHtml(order.tracking_number)}</p></div>` : ''}
        ${order.notes ? `<div class="col-span-2"><p class="text-sm text-slate-500">${t('notes_label')}</p><p class="text-sm">${escapeHtml(order.notes)}</p></div>` : ''}
      </div>
      
      <div>
        <p class="text-sm font-medium mb-2">${t('items_label')}</p>
        <div class="bg-slate-50 dark:bg-slate-700/50 rounded-lg p-4 space-y-2">
          ${order.order_items.map(item => `<div class="flex justify-between"><span>${escapeHtml(item.item_name)} × ${item.quantity}</span><span>$${(item.price * item.quantity).toFixed(2)}</span></div>`).join('')}
          <div class="border-t pt-2 mt-2 space-y-1">
            <div class="flex justify-between text-sm"><span>${t('delivery_fee_label')}</span><span>$${order.delivery_fee.toFixed(2)}</span></div>
            ${order.discount > 0 ? `<div class="flex justify-between text-sm"><span>${t('discount_label')}</span><span class="text-red-500">-$${order.discount.toFixed(2)}</span></div>` : ''}
            <div class="flex justify-between font-semibold text-lg pt-1"><span>${t('total_label')}</span><span>$${order.total_amount.toFixed(2)}</span></div>
          </div>
        </div>
      </div>
      
      <div class="flex flex-wrap gap-2">
        ${order.status !== 'delivered' && order.status !== 'returned' ? 
          (order.status === 'pending' ? `<button onclick="updateOrderStatus('${order.order_id}', 'processing')" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">${t('mark_as_processing')}</button>` : 
          order.status === 'processing' ? `<button onclick="updateOrderStatus('${order.order_id}', 'shipped')" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">${t('mark_as_shipped')}</button>` : 
          order.status === 'shipped' ? `<button onclick="updateOrderStatus('${order.order_id}', 'delivered')" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">${t('mark_as_delivered')}</button>` : '') : ''}
        <button onclick="printOrder('${order.order_id}')" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 rounded-lg inline-flex items-center gap-2 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
          ${t('print_invoice')}
        </button>
      </div>
    `;
    
    // Show the modal
    const viewModal = document.getElementById('viewModal');
    if (viewModal) {
      viewModal.classList.remove('hidden');
    } else {
      console.error('viewModal element not found');
    }
  };
  
  // Helper function to escape HTML to prevent XSS
  function escapeHtml(str) {
    if (!str) return '';
    return str
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#39;');
  }
  
  window.updateOrderStatus = (orderId, newStatus) => {
    orders = orders.map(o => o.order_id === orderId ? { ...o, status: newStatus, updatedAt: new Date() } : o);
    renderOrders();
    if (currentViewOrder && currentViewOrder.order_id === orderId) {
      viewOrder(orderId);
    }
  };
  
  function closeViewModal() { 
    const viewModal = document.getElementById('viewModal');
    if (viewModal) viewModal.classList.add('hidden');
    currentViewOrder = null;
  }
  
  // Set up modal close handlers
  document.querySelectorAll('.closeViewModalBtn, #viewModalBackdrop').forEach(el => {
    if (el) el.addEventListener('click', closeViewModal);
  });
  
  document.getElementById('printFromViewBtn')?.addEventListener('click', () => {
    if (currentViewOrder) printOrder(currentViewOrder.order_id);
  });

  // print logic
  window.printOrder = (orderId) => {
    const order = orders.find(o => o.order_id === orderId);
    if (!order) return;
    
    const printWindow = window.open('', '_blank');
    if (!printWindow) {
      alert('Please allow popups to print the invoice.');
      return;
    }
    
    const css = `
      *{margin:0;padding:0;box-sizing:border-box}
      body{font-family:'Segoe UI', Arial, sans-serif;padding:40px;background:#fff}
      .invoice{max-width:800px;margin:0 auto}
      .header{display:flex;justify-content:space-between;margin-bottom:40px;padding-bottom:20px;border-bottom:2px solid #e2e8f0}
      .logo{font-size:28px;font-weight:bold;color:#3b82f6}
      .invoice-info{text-align:right}
      .invoice-info h2{font-size:24px;margin-bottom:8px}
      .details{display:flex;justify-content:space-between;margin-bottom:30px}
      .details h3{font-size:14px;color:#64748b;margin-bottom:8px}
      .items-table{width:100%;border-collapse:collapse;margin-bottom:30px}
      .items-table th{background:#f8fafc;padding:12px;text-align:left;border-bottom:2px solid #e2e8f0}
      .items-table td{padding:12px;border-bottom:1px solid #e2e8f0}
      .totals{margin-left:auto;width:300px}
      .totals-row{display:flex;justify-content:space-between;padding:8px 0}
      .total-row{border-top:2px solid #e2e8f0;margin-top:8px;padding-top:12px;font-weight:bold;font-size:18px}
      @media print {
        body{padding:20px}
        .no-print{display:none}
      }
    `;
    
    const subtotal = order.order_items.reduce((sum, i) => sum + (i.price * i.quantity), 0);
    
    const html = `<!DOCTYPE html>
    <html>
      <head>
        <title>Invoice ${order.order_number}</title>
        <style>${css}</style>
      </head>
      <body>
        <div class="invoice">
          <div class="header">
            <div class="logo">BizManager</div>
            <div class="invoice-info">
              <h2>INVOICE</h2>
              <p><strong>${order.order_number}</strong></p>
              <p>Date: ${formatDate(order.createdAt)}</p>
            </div>
          </div>
          
          <div class="details">
            <div>
              <h3>Bill To</h3>
              <p><strong>${escapeHtml(order.customer_name)}</strong></p>
            </div>
            <div>
              <h3>Shipping Details</h3>
              <p>${escapeHtml(order.courier_name)}</p>
              ${order.tracking_number ? `<p>Tracking: ${escapeHtml(order.tracking_number)}</p>` : ''}
            </div>
          </div>
          
          <table class="items-table">
            <thead>
              <tr><th>Item</th><th>Qty</th><th>Price</th><th>Amount</th></tr>
            </thead>
            <tbody>
              ${order.order_items.map(i => `
                <tr>
                  <td>${escapeHtml(i.item_name)}</td>
                  <td>${i.quantity}</td>
                  <td>$${i.price.toFixed(2)}</td>
                  <td>$${(i.price * i.quantity).toFixed(2)}</td>
                </tr>
              `).join('')}
            </tbody>
          </table>
          
          <div class="totals">
            <div class="totals-row"><span>Subtotal:</span><span>$${subtotal.toFixed(2)}</span></div>
            <div class="totals-row"><span>Delivery Fee:</span><span>$${order.delivery_fee.toFixed(2)}</span></div>
            ${order.discount > 0 ? `<div class="totals-row"><span>Discount:</span><span> -$${order.discount.toFixed(2)}</span></div>` : ''}
            <div class="totals-row total-row"><span>Total:</span><span>$${order.total_amount.toFixed(2)}</span></div>
          </div>
        </div>
        <script>window.onload = function() { window.print(); setTimeout(() => window.close(), 500); }<\/script>
      </body>
    </html>`;
    
    printWindow.document.write(html);
    printWindow.document.close();
  };

  // Render orders
  function renderOrders() {
    const searchQuery = document.getElementById('searchInput').value.toLowerCase();
    const statusFilter = document.getElementById('statusFilter').value;
    const filtered = orders.filter(o => {
      const matchSearch = o.order_number.toLowerCase().includes(searchQuery) || (o.customer_name && o.customer_name.toLowerCase().includes(searchQuery));
      const matchStatus = !statusFilter || o.status === statusFilter;
      return matchSearch && matchStatus;
    });
    // desktop table
    const tbody = document.getElementById('ordersTableBody');
    if (filtered.length) {
      tbody.innerHTML = filtered.map(order => `
        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
          <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-white">${escapeHtml(order.order_number)}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(order.customer_name)}</td>
          <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">$${order.total_amount.toFixed(2)}</td>
          <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${paymentStatusColors[order.payment_status]}">${order.payment_status}</span></td>
          <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusColors[order.status]}">${order.status}</span></td>
          <td class="px-4 py-3 text-sm">${formatDate(order.createdAt)}</td>
          <td class="px-4 py-3"><div class="flex items-center gap-2">
            <button onclick="viewOrder('${order.order_id}')" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="View"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
            <button onclick="printOrder('${order.order_id}')" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="Print"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg></button>
            <button onclick="deleteOrderPrompt('${order.order_id}')" class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg" title="Delete"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
          </div></td>
         </tr>
      `).join('');
    } else {
      tbody.innerHTML = '<tr><td colspan="7" class="px-4 py-8 text-center text-slate-500">No orders found</td></tr>';
    }

    // mobile cards
    const mobileContainer = document.getElementById('mobileOrdersContainer');
    if (filtered.length) {
      mobileContainer.innerHTML = filtered.map(order => `
        <div class="p-4 space-y-3">
          <div class="flex justify-between items-start"><div class="font-medium">${escapeHtml(order.order_number)}</div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusColors[order.status]}">${order.status}</span></div>
          <div class="grid grid-cols-2 gap-2 text-sm"><div><span class="text-slate-500 text-xs block">${t('col_customer')}</span><span>${escapeHtml(order.customer_name)}</span></div><div><span class="text-slate-500 text-xs block">${t('col_total')}</span><span>$${order.total_amount.toFixed(2)}</span></div><div><span class="text-slate-500 text-xs block">${t('col_payment')}</span><span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium ${paymentStatusColors[order.payment_status]}">${order.payment_status}</span></div><div><span class="text-slate-500 text-xs block">${t('col_date')}</span><span>${formatDate(order.createdAt)}</span></div></div>
          <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-700"><button onclick="viewOrder('${order.order_id}')" class="p-2 text-slate-600 hover:bg-slate-100 rounded-lg" title="${t('view_details')}"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button><button onclick="printOrder('${order.order_id}')" class="p-2 text-slate-600 hover:bg-slate-100 rounded-lg" title="${t('print_invoice')}"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg></button><button onclick="deleteOrderPrompt('${order.order_id}')" class="p-2 text-red-600 hover:bg-red-50 rounded-lg" title="${t('delete')}"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button></div>
        </div>
      `).join('');
    } else {
      mobileContainer.innerHTML = `<div class="p-8 text-center text-slate-500">${t('no_orders_found')}</div>`;
    }
  }

  // delete logic
  window.deleteOrderPrompt = (orderId) => {
    currentDeleteOrderId = orderId;
    document.getElementById('deleteModal').classList.remove('hidden');
  };
  
  function closeDeleteModal() { 
    document.getElementById('deleteModal').classList.add('hidden');
    currentDeleteOrderId = null;
  }
  
  document.getElementById('confirmDeleteBtn').onclick = () => {
    if (currentDeleteOrderId) {
      orders = orders.filter(o => o.order_id !== currentDeleteOrderId);
      renderOrders();
      if (currentViewOrder && currentViewOrder.order_id === currentDeleteOrderId) {
        closeViewModal();
      }
      closeDeleteModal();
    }
  };
  
  document.getElementById('cancelDeleteBtn').onclick = closeDeleteModal;
  document.getElementById('deleteModalBackdrop').onclick = closeDeleteModal;

  // --- CUSTOMER MODAL FUNCTIONS ---
  function renderCustomerList(searchTerm = '') {
    const container = document.getElementById('customerListContainer');
    if (!container) return;
    
    let filteredCustomers = [...customers];
    if (searchTerm) {
      const term = searchTerm.toLowerCase();
      filteredCustomers = filteredCustomers.filter(c => 
        c.full_name.toLowerCase().includes(term) || 
        c.phone.includes(term) ||
        (c.email && c.email.toLowerCase().includes(term))
      );
    }
    
    if (filteredCustomers.length === 0) {
      container.innerHTML = '<div class="text-center py-8 text-slate-500">No customers found. Click "Add New Customer" to create one.</div>';
      return;
    }
    
    container.innerHTML = filteredCustomers.map(customer => `
      <div class="customer-item flex items-center justify-between p-3 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/50 cursor-pointer transition" data-customer-id="${customer.customer_id}" data-customer-name="${escapeHtml(customer.full_name)}">
        <div class="flex-1">
          <p class="font-medium text-slate-800 dark:text-slate-200">${escapeHtml(customer.full_name)}</p>
          <p class="text-sm text-slate-500">${escapeHtml(customer.phone)} ${customer.email ? '• ' + escapeHtml(customer.email) : ''}</p>
          ${customer.address ? `<p class="text-xs text-slate-400 mt-1">${escapeHtml(customer.address)}${customer.city ? ', ' + escapeHtml(customer.city) : ''}</p>` : ''}
        </div>
        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
      </div>
    `).join('');
    
    // Add click handlers for customer selection
    document.querySelectorAll('.customer-item').forEach(el => {
      el.addEventListener('click', () => {
        const customerId = el.dataset.customerId;
        const customerName = el.dataset.customerName;
        selectCustomer(customerId, customerName);
      });
    });
  }
  
  function selectCustomer(customerId, customerName) {
    selectedCustomerId = customerId;
    const customerInput = document.getElementById('customer_id');
    const customerNameHidden = document.getElementById('customer_name_hidden');
    if (customerInput) {
      customerInput.value = customerName;
      customerInput.dataset.customerId = customerId;
    }
    if (customerNameHidden) customerNameHidden.value = customerId;
    
    // Close customer modal
    closeCustomerModal();
  }
  
  function openCustomerModal() {
    const customerModal = document.getElementById('customerModal');
    if (customerModal) {
      // Reset search and hide add form
      const searchInput = document.getElementById('customerSearchInput');
      if (searchInput) searchInput.value = '';
      const addFormContainer = document.getElementById('addCustomerFormContainer');
      if (addFormContainer) addFormContainer.classList.add('hidden');
      
      // Generate and display auto-generated ID for new customer
      updateAutoGeneratedCustomerId();
      
      renderCustomerList();
      customerModal.classList.remove('hidden');
    }
  }
  
  function closeCustomerModal() {
    const customerModal = document.getElementById('customerModal');
    if (customerModal) customerModal.classList.add('hidden');
    // Reset add customer form
    resetAddCustomerForm();
  }
  
  function resetAddCustomerForm() {
    document.getElementById('new_full_name').value = '';
    document.getElementById('new_phone').value = '';
    document.getElementById('new_email').value = '';
    document.getElementById('new_city').value = '';
    document.getElementById('new_district').value = '';
    document.getElementById('new_postal_code').value = '';
    document.getElementById('new_address').value = '';
    document.getElementById('new_notes').value = '';
    // Regenerate ID when form is reset
    updateAutoGeneratedCustomerId();
  }
  
  function saveNewCustomer() {
    const fullName = document.getElementById('new_full_name').value.trim();
    const phone = document.getElementById('new_phone').value.trim();
    
    if (!fullName) {
      alert('Please enter customer full name');
      return;
    }
    if (!phone) {
      alert('Please enter customer phone number');
      return;
    }
    
    // Use the pre-generated customer ID
    const newId = pendingCustomerId || generateCustomerId();
    
    const newCustomer = {
      customer_id: newId,
      full_name: fullName,
      phone: phone,
      email: document.getElementById('new_email').value.trim(),
      city: document.getElementById('new_city').value.trim(),
      district: document.getElementById('new_district').value.trim(),
      postal_code: document.getElementById('new_postal_code').value.trim(),
      address: document.getElementById('new_address').value.trim(),
      notes: document.getElementById('new_notes').value.trim()
    };
    
    customers.push(newCustomer);
    
    // Auto-select the new customer
    selectCustomer(newId, fullName);
    
    // Hide add form
    document.getElementById('addCustomerFormContainer').classList.add('hidden');
    
    // Refresh customer list
    const searchInput = document.getElementById('customerSearchInput');
    renderCustomerList(searchInput ? searchInput.value : '');
    
    // Regenerate ID for next time
    updateAutoGeneratedCustomerId();
  }
  
  // --- Create Order Modal with Preview Logic ---
  function updatePreview() {
    // Calculate subtotal from current items
    let subtotal = 0;
    const rows = document.querySelectorAll('#itemsListContainer .item-row');
    rows.forEach(row => {
      const select = row.querySelector('.itemSelect');
      const qtyInput = row.querySelector('.itemQty');
      if (select && select.value && qtyInput && qtyInput.value) {
        const selectedOption = select.options[select.selectedIndex];
        const priceMatch = selectedOption.text.match(/\$([\d.]+)/);
        if (priceMatch) {
          const price = parseFloat(priceMatch[1]);
          const qty = parseInt(qtyInput.value) || 0;
          subtotal += price * qty;
        }
      }
    });

    // Get courier fee
    const courierSelect = document.getElementById('courier_id');
    let deliveryFee = 0;
    if (courierSelect && courierSelect.value) {
      const selectedOption = courierSelect.options[courierSelect.selectedIndex];
      const feeMatch = selectedOption.text.match(/\$([\d.]+)/);
      if (feeMatch) deliveryFee = parseFloat(feeMatch[1]);
    }
    const deliveryType = document.getElementById('delivery_type').value;
    const finalDeliveryFee = deliveryType === 'free' ? 0 : deliveryFee;
    
    const discount = parseFloat(document.getElementById('discount').value) || 0;
    const total = subtotal + finalDeliveryFee - discount;
    
    document.getElementById('previewSubtotal').innerText = `$${subtotal.toFixed(2)}`;
    document.getElementById('previewDelivery').innerText = `$${finalDeliveryFee.toFixed(2)}`;
    document.getElementById('previewDiscount').innerText = `$${discount.toFixed(2)}`;
    document.getElementById('previewTotal').innerText = `$${total.toFixed(2)}`;
  }

  function attachItemEvents() {
    document.querySelectorAll('#itemsListContainer .itemSelect, #itemsListContainer .itemQty').forEach(el => {
      el.removeEventListener('change', updatePreview);
      el.removeEventListener('input', updatePreview);
      el.addEventListener('change', updatePreview);
      el.addEventListener('input', updatePreview);
    });
    document.querySelectorAll('#itemsListContainer .removeItemBtn').forEach(btn => {
      btn.removeEventListener('click', handleRemoveItem);
      btn.addEventListener('click', handleRemoveItem);
    });
  }

  function handleRemoveItem(e) {
    const row = e.currentTarget.closest('.item-row');
    const rows = document.querySelectorAll('#itemsListContainer .item-row');
    if (row && rows.length > 1) {
      row.remove();
      updatePreview();
      attachItemEvents();
      // Update remove buttons visibility
      updateRemoveButtonsVisibility();
    }
  }

  function updateRemoveButtonsVisibility() {
    const rows = document.querySelectorAll('#itemsListContainer .item-row');
    rows.forEach((row, index) => {
      const removeBtn = row.querySelector('.removeItemBtn');
      if (removeBtn) {
        removeBtn.style.display = rows.length === 1 ? 'none' : 'flex';
      }
    });
  }

  function addNewItemRow() {
    const container = document.getElementById('itemsListContainer');
    const newRow = document.createElement('div');
    newRow.className = 'item-row flex flex-wrap sm:flex-nowrap gap-3 items-center';
    newRow.innerHTML = `
      <div class="flex-1 min-w-[180px]">
        <select class="itemSelect w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
          <option value="">Select product</option>
          <option value="1" data-price="89.99">Wireless Headphones - $89.99</option>
          <option value="2" data-price="29.99">Cotton T-Shirt - $29.99</option>
          <option value="3" data-price="249.99">Smart Watch - $249.99</option>
          <option value="5" data-price="39.99">Yoga Mat - $39.99</option>
        </select>
      </div>
      <div class="w-28">
        <input type="number" class="itemQty w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm" value="1" min="1" step="1">
      </div>
      <button type="button" class="removeItemBtn text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50 dark:hover:bg-red-900/20 transition">✕</button>
    `;
    container.appendChild(newRow);
    attachItemEvents();
    updateRemoveButtonsVisibility();
    updatePreview();
  }

  function resetAndOpenOrderModal() {
    // Reset form fields
    const customerInput = document.getElementById('customer_id');
    if (customerInput) {
      customerInput.value = '';
      delete customerInput.dataset.customerId;
    }
    document.getElementById('courier_id').value = '';
    document.getElementById('payment_method').value = 'cod';
    document.getElementById('payment_status').value = 'pending';
    document.getElementById('delivery_type').value = 'pay';
    document.getElementById('discount').value = '0';
    document.getElementById('notes').value = '';
    // Reset items to one empty row
    const container = document.getElementById('itemsListContainer');
    container.innerHTML = `
      <div class="item-row flex flex-wrap sm:flex-nowrap gap-3 items-center">
        <div class="flex-1 min-w-[180px]">
          <select class="itemSelect w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
            <option value="">Select product</option>
            <option value="1" data-price="89.99">Wireless Headphones - $89.99</option>
            <option value="2" data-price="29.99">Cotton T-Shirt - $29.99</option>
            <option value="3" data-price="249.99">Smart Watch - $249.99</option>
            <option value="5" data-price="39.99">Yoga Mat - $39.99</option>
          </select>
        </div>
        <div class="w-28">
          <input type="number" class="itemQty w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm" value="1" min="1" step="1">
        </div>
        <button type="button" class="removeItemBtn text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50 dark:hover:bg-red-900/20 transition" style="display: none;">✕</button>
      </div>
    `;
    
    attachItemEvents();
    updateRemoveButtonsVisibility();
    
    updatePreview();
    document.getElementById('orderModal').classList.remove('hidden');
  }

  // Save order handler
  function saveOrder() {
    const customerId = document.getElementById('customer_id').dataset.customerId;
    const customerName = document.getElementById('customer_id').value;
    
    if (!customerId) { 
      alert('Please select a customer by clicking the customer field'); 
      return; 
    }
    if (!document.getElementById('courier_id').value) { 
      alert('Please select a courier'); 
      return; 
    }
    
    const items = [];
    const rows = document.querySelectorAll('#itemsListContainer .item-row');
    rows.forEach(row => {
      const select = row.querySelector('.itemSelect');
      const qtyInput = row.querySelector('.itemQty');
      if (select && select.value && qtyInput && qtyInput.value && parseInt(qtyInput.value) > 0) {
        const selectedOption = select.options[select.selectedIndex];
        const itemName = selectedOption.text.split(' - ')[0];
        const priceMatch = selectedOption.text.match(/\$([\d.]+)/);
        if (priceMatch) {
          items.push({
            item_id: select.value,
            item_name: itemName,
            price: parseFloat(priceMatch[1]),
            quantity: parseInt(qtyInput.value)
          });
        }
      }
    });
    
    if (items.length === 0) { 
      alert('Please add at least one item with valid quantity'); 
      return; 
    }
    
    // Calculate totals
    const subtotal = items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const courierSelect = document.getElementById('courier_id');
    const selectedCourier = courierSelect.options[courierSelect.selectedIndex];
    const feeMatch = selectedCourier.text.match(/\$([\d.]+)/);
    let deliveryFee = feeMatch ? parseFloat(feeMatch[1]) : 0;
    const deliveryType = document.getElementById('delivery_type').value;
    const finalDeliveryFee = deliveryType === 'free' ? 0 : deliveryFee;
    const discount = parseFloat(document.getElementById('discount').value) || 0;
    const total = subtotal + finalDeliveryFee - discount;
    
    const nextOrderNumber = `ORD-${new Date().getFullYear()}-${String(orders.length + 1).padStart(3, '0')}`;
    
    const newOrder = {
      order_id: Date.now().toString(),
      business_id: 'biz1',
      order_number: nextOrderNumber,
      customer_id: customerId,
      customer_name: customerName,
      order_items: items,
      payment_status: document.getElementById('payment_status').value,
      payment_method: document.getElementById('payment_method').value,
      courier_id: courierSelect.value,
      courier_name: courierOptions.find(c => c.value === courierSelect.value)?.label || 'Unknown',
      tracking_number: document.getElementById('tracking_number').value,
      delivery_fee: finalDeliveryFee,
      delivery_type: deliveryType,
      discount: discount,
      total_amount: total,
      notes: document.getElementById('notes').value,
      status: 'pending',
      created_by: '1',
      createdAt: new Date(),
      updatedAt: new Date()
    };
    
    orders.unshift(newOrder);
    renderOrders();
    document.getElementById('orderModal').classList.add('hidden');
    
    // Optional: Show success message
    const toast = document.createElement('div');
    toast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    toast.innerText = 'Order created successfully!';
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
  }

  // Event listeners for create modal
  document.getElementById('newOrderBtn').onclick = resetAndOpenOrderModal;
  document.getElementById('addItemBtn').onclick = addNewItemRow;
  document.getElementById('saveOrderBtn').onclick = saveOrder;
  
  document.querySelectorAll('.closeModalBtn, #orderModalBackdrop').forEach(el => {
    if (el) el.addEventListener('click', () => document.getElementById('orderModal').classList.add('hidden'));
  });
  
  // Customer modal event listeners
  const openCustomerBtn = document.getElementById('openCustomerModalBtn');
  if (openCustomerBtn) {
    openCustomerBtn.addEventListener('click', openCustomerModal);
  }
  
  // Make customer input clickable
  const customerInputField = document.getElementById('customer_id');
  if (customerInputField) {
    customerInputField.addEventListener('click', openCustomerModal);
  }
  
  document.querySelectorAll('.closeCustomerModalBtn, #customerModalBackdrop').forEach(el => {
    if (el) el.addEventListener('click', closeCustomerModal);
  });
  
  document.getElementById('showAddCustomerFormBtn')?.addEventListener('click', () => {
    const addFormContainer = document.getElementById('addCustomerFormContainer');
    if (addFormContainer) {
      addFormContainer.classList.toggle('hidden');
      resetAddCustomerForm();
    }
  });
  
  document.getElementById('cancelAddCustomerBtn')?.addEventListener('click', () => {
    document.getElementById('addCustomerFormContainer').classList.add('hidden');
    resetAddCustomerForm();
  });
  
  document.getElementById('saveNewCustomerBtn')?.addEventListener('click', saveNewCustomer);
  
  document.getElementById('customerSearchInput')?.addEventListener('input', (e) => {
    renderCustomerList(e.target.value);
  });
  
  // Listen for changes that affect preview
  document.getElementById('courier_id')?.addEventListener('change', updatePreview);
  document.getElementById('delivery_type')?.addEventListener('change', updatePreview);
  document.getElementById('discount')?.addEventListener('input', updatePreview);
  
  // Search and filter events
  document.getElementById('searchInput').addEventListener('input', renderOrders);
  document.getElementById('statusFilter').addEventListener('change', renderOrders);
  
  // Initial render and setup
  renderOrders();
  attachItemEvents();
  updateRemoveButtonsVisibility();
  
  // Apply translations to all elements with data-i18n attribute
  function applyTranslations() {
    if (window.translations) {
      document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (window.translations[key]) {
          if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
            if (el.getAttribute('data-i18n-placeholder') !== null) {
              el.placeholder = window.translations[key];
            } else {
              el.value = window.translations[key];
            }
          } else if (el.tagName === 'SELECT') {
            // For select options, we need to handle differently
            // Skip for now as options are handled by data-i18n on option elements
          } else {
            el.textContent = window.translations[key];
          }
        }
      });
      
      // Handle select options with data-i18n
      document.querySelectorAll('option[data-i18n]').forEach(option => {
        const key = option.getAttribute('data-i18n');
        if (window.translations[key]) {
          option.textContent = window.translations[key];
        }
      });
    }
  }
  
  // Apply translations when page loads and when language changes
  applyTranslations();
  
  // Listen for language change events
  document.addEventListener('languageChanged', applyTranslations);
</script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../../includes/footer.php';
?>