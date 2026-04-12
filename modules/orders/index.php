<?php
// ============================================
// File: modules/orders/index.php
// Description: Orders management
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Orders | Qty Management';
ob_start();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
    <!-- Header / Filters + New Order Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
      <div class="flex flex-col sm:flex-row gap-3">
        <!-- search -->
        <div class="relative w-full sm:w-72">
          <i class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 fas fa-search w-4 h-4 text-sm"></i>
          <input type="text" id="searchInput" placeholder="Search order number or customer..." 
            class="w-full pl-10 pr-4 py-2 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>
        <!-- status filter -->
        <select id="statusFilter" class="w-full sm:w-48 px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
          <option value="">All statuses</option>
          <option value="pending">Pending</option>
          <option value="processing">Processing</option>
          <option value="shipped">Shipped</option>
          <option value="delivered">Delivered</option>
          <option value="returned">Returned</option>
        </select>
      </div>
      <button id="newOrderBtn" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-md transition-all duration-200">
        <i class="fas fa-plus text-sm"></i>
        <span>New Order</span>
      </button>
    </div>

    <!-- Orders Table & Mobile Cards Container -->
    <div id="ordersContainer" class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
      <!-- dynamic orders list will be rendered here via JS -->
      <div id="ordersList" class="divide-y divide-slate-200 dark:divide-slate-700"></div>
    </div>
  </div>

  <!-- MODAL: New Order -->
  <div id="newOrderModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" id="modalBackdropNew"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center p-0 sm:p-4">
      <div class="flex-1 sm:hidden" id="closeModalAreaNew"></div>
      <div class="relative w-full bg-white dark:bg-slate-800 rounded-t-2xl sm:rounded-2xl sm:max-w-2xl max-h-[90vh] overflow-hidden shadow-2xl">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
          <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
          <h2 class="text-lg font-bold text-slate-900 dark:text-white pt-2 sm:pt-0">Create New Order</h2>
          <button id="closeNewModalBtn" class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-full transition"><i class="fas fa-times w-5 h-5"></i></button>
        </div>
        <div class="p-5 overflow-y-auto max-h-[calc(90vh-140px)] space-y-5" id="newOrderForm">
          <!-- dynamic form will be populated via JS, but we keep HTML structure but fields will be dynamic through js -->
        </div>
        <div class="flex flex-col-reverse sm:flex-row items-stretch justify-end gap-2 p-4 border-t border-slate-200 dark:border-slate-700">
          <button id="cancelNewModalBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-xl hover:bg-slate-200 transition">Cancel</button>
          <button id="saveOrderBtn" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition">Create Order</button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL: View Order Details -->
  <div id="viewOrderModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center p-0 sm:p-4">
      <div class="flex-1 sm:hidden" id="closeViewArea"></div>
      <div class="relative w-full bg-white dark:bg-slate-800 rounded-t-2xl sm:rounded-2xl sm:max-w-2xl max-h-[90vh] overflow-hidden shadow-xl">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
          <h2 class="text-lg font-bold text-slate-900 dark:text-white" id="viewOrderTitle">Order Details</h2>
          <div class="flex gap-2">
            <button id="printFromViewBtn" class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-full"><i class="fas fa-print"></i></button>
            <button id="closeViewModalBtn" class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-full"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div id="viewOrderContent" class="p-5 overflow-y-auto max-h-[calc(90vh-140px)] space-y-5">
          <!-- dynamic order details -->
        </div>
      </div>
    </div>
  </div>

  <script>
    // ---------- DATA MODELS ----------
    const customerOptions = [
      { value: '1', label: 'John Smith' },
      { value: '2', label: 'Sarah Johnson' },
      { value: '3', label: 'Mike Brown' },
      { value: '4', label: 'Emily Davis' },
    ];
    const courierOptions = [
      { value: '1', label: 'FedEx', fee: 15.99 },
      { value: '2', label: 'UPS', fee: 12.99 },
      { value: '3', label: 'DHL', fee: 18.99 },
      { value: '4', label: 'Local Courier', fee: 8.99 },
    ];
    const itemOptions = [
      { value: '1', label: 'Wireless Headphones', price: 89.99 },
      { value: '2', label: 'Cotton T-Shirt', price: 29.99 },
      { value: '3', label: 'Smart Watch', price: 249.99 },
      { value: '5', label: 'Yoga Mat', price: 39.99 },
    ];

    // Mock orders
    let orders = [
      { order_id: '1', business_id: 'biz1', order_number: 'ORD-2024-001', customer_id: '1', customer_name: 'John Smith', order_items: [{ item_id: '1', item_name: 'Wireless Headphones', price: 89.99, quantity: 2 }], payment_status: 'paid', payment_method: 'bank_transfer', courier_id: '1', courier_name: 'FedEx', tracking_number: 'FX123456', delivery_fee: 15.99, delivery_type: 'pay', discount: 10, total_amount: 185.97, status: 'delivered', created_by: '1', createdAt: new Date('2024-01-15'), updatedAt: new Date('2024-01-15'), notes: '' },
      { order_id: '2', business_id: 'biz1', order_number: 'ORD-2024-002', customer_id: '2', customer_name: 'Sarah Johnson', order_items: [{ item_id: '2', item_name: 'Cotton T-Shirt', price: 29.99, quantity: 3 }], payment_status: 'pending', payment_method: 'cod', courier_id: '2', courier_name: 'UPS', tracking_number: null, delivery_fee: 12.99, delivery_type: 'pay', discount: 0, total_amount: 102.96, status: 'processing', created_by: '1', createdAt: new Date('2024-01-18'), updatedAt: new Date('2024-01-18'), notes: '' },
      { order_id: '3', business_id: 'biz1', order_number: 'ORD-2024-003', customer_id: '3', customer_name: 'Mike Brown', order_items: [{ item_id: '3', item_name: 'Smart Watch', price: 249.99, quantity: 1 }], payment_status: 'paid', payment_method: 'bank_transfer', courier_id: '1', courier_name: 'FedEx', tracking_number: 'TRK789012', delivery_fee: 15.99, delivery_type: 'pay', discount: 25, total_amount: 240.98, status: 'shipped', created_by: '1', createdAt: new Date('2024-01-20'), updatedAt: new Date('2024-01-20'), notes: '' },
      { order_id: '4', business_id: 'biz1', order_number: 'ORD-2024-004', customer_id: '4', customer_name: 'Emily Davis', order_items: [{ item_id: '5', item_name: 'Yoga Mat', price: 39.99, quantity: 2 }], payment_status: 'pending', payment_method: 'cod', courier_id: '4', courier_name: 'Local Courier', tracking_number: null, delivery_fee: 8.99, delivery_type: 'pay', discount: 5, total_amount: 83.97, status: 'pending', created_by: '1', createdAt: new Date('2024-01-22'), updatedAt: new Date('2024-01-22'), notes: '' }
    ];

    // Helper: status color classes
    const statusColors = {
      pending: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
      processing: 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
      shipped: 'bg-cyan-100 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-400',
      delivered: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
      returned: 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
    };
    const paymentStatusColors = {
      pending: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
      paid: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
    };

    function formatDate(date) { return new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' }); }

    // ---- Render orders (both desktop table & mobile cards) ----
    function renderOrders() {
      const searchQuery = document.getElementById('searchInput').value.toLowerCase();
      const statusFilter = document.getElementById('statusFilter').value;
      let filtered = orders.filter(o => {
        const matchSearch = o.order_number.toLowerCase().includes(searchQuery) || (o.customer_name?.toLowerCase().includes(searchQuery));
        const matchStatus = !statusFilter || o.status === statusFilter;
        return matchSearch && matchStatus;
      });
      const container = document.getElementById('ordersList');
      if (!container) return;
      if (filtered.length === 0) {
        container.innerHTML = `<div class="py-12 text-center text-slate-500 dark:text-slate-400"><i class="fas fa-box-open text-3xl mb-2 block"></i>No orders found</div>`;
        return;
      }
      // Desktop table (hidden on mobile) + mobile cards
      let html = `
        <!-- Desktop Table (hidden on mobile) -->
        <div class="hidden md:block overflow-x-auto">
          <table class="w-full">
            <thead class="bg-slate-50 dark:bg-slate-800/80">
              <tr class="border-b border-slate-200 dark:border-slate-700">
                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Order #</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Customer</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Total</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Payment</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Status</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Date</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
              ${filtered.map(order => `
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/40 transition">
                  <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-white">${order.order_number}</td>
                  <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${order.customer_name}</td>
                  <td class="px-4 py-3 text-sm font-mono">$${order.total_amount.toFixed(2)}</td>
                  <td class="px-4 py-3"><span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium ${paymentStatusColors[order.payment_status]}">${order.payment_status}</span></td>
                  <td class="px-4 py-3"><span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium ${statusColors[order.status]}">${order.status}</span></td>
                  <td class="px-4 py-3 text-sm">${formatDate(order.createdAt)}</td>
                  <td class="px-4 py-3"><div class="flex gap-2"><button data-id="${order.order_id}" class="view-order-btn p-2 text-slate-600 hover:bg-slate-100 rounded-lg"><i class="fas fa-eye"></i></button><button data-id="${order.order_id}" class="print-order-btn p-2 text-slate-600 hover:bg-slate-100 rounded-lg"><i class="fas fa-print"></i></button></div></td>
                </tr>
              `).join('')}
            </tbody>
          </table>
        </div>
        <!-- Mobile Card View -->
        <div class="md:hidden divide-y divide-slate-200 dark:divide-slate-700">
          ${filtered.map(order => `
            <div class="p-4 space-y-3">
              <div class="flex justify-between items-start"><span class="font-semibold">${order.order_number}</span><span class="text-xs px-2 py-0.5 rounded-full ${statusColors[order.status]}">${order.status}</span></div>
              <div class="grid grid-cols-2 gap-2 text-sm"><div><span class="text-slate-500 text-xs">Customer</span><div>${order.customer_name}</div></div><div><span class="text-slate-500 text-xs">Total</span><div>$${order.total_amount.toFixed(2)}</div></div><div><span class="text-slate-500 text-xs">Payment</span><div><span class="inline-block px-2 py-0.5 rounded-full text-xs ${paymentStatusColors[order.payment_status]}">${order.payment_status}</span></div></div><div><span class="text-slate-500 text-xs">Date</span><div>${formatDate(order.createdAt)}</div></div></div>
              <div class="flex gap-3 pt-2"><button data-id="${order.order_id}" class="view-order-btn p-2 text-slate-600 hover:bg-slate-100 rounded-lg"><i class="fas fa-eye"></i></button><button data-id="${order.order_id}" class="print-order-btn p-2 text-slate-600 hover:bg-slate-100 rounded-lg"><i class="fas fa-print"></i></button></div>
            </div>
          `).join('')}
        </div>
      `;
      container.innerHTML = html;
      // attach event listeners for view/print
      document.querySelectorAll('.view-order-btn').forEach(btn => {
        btn.addEventListener('click', (e) => { const id = btn.getAttribute('data-id'); const order = orders.find(o => o.order_id === id); if(order) openViewModal(order); });
      });
      document.querySelectorAll('.print-order-btn').forEach(btn => {
        btn.addEventListener('click', (e) => { const id = btn.getAttribute('data-id'); const order = orders.find(o => o.order_id === id); if(order) printInvoice(order); });
      });
    }

    // print invoice using window print
    function printInvoice(order) {
      const win = window.open('', '_blank');
      if (!win) { alert("Please allow popups for invoice printing"); return; }
      const itemsRows = order.order_items.map(item => `<tr><td>${item.item_name}</td><td>${item.quantity}</td><td>$${item.price.toFixed(2)}</td><td class="text-right">$${(item.price * item.quantity).toFixed(2)}</td></tr>`).join('');
      const subtotal = order.order_items.reduce((s,i)=> s + i.price * i.quantity,0);
      const html = `<!DOCTYPE html><html><head><title>Invoice ${order.order_number}</title><style>body{font-family:sans-serif;padding:30px} .invoice{max-width:800px;margin:auto} .header{display:flex;justify-content:space-between;border-bottom:2px solid #ccc;padding-bottom:20px}.totals{margin-top:20px;text-align:right}table{width:100%;border-collapse:collapse}th,td{padding:8px;text-align:left;border-bottom:1px solid #eee}</style></head><body><div class="invoice"><div class="header"><div><h2>BizManager</h2></div><div><h3>INVOICE</h3><p>${order.order_number}</p><p>Date: ${formatDate(order.createdAt)}</p></div></div><div><p><strong>Bill To:</strong> ${order.customer_name}</p><p>Courier: ${order.courier_name} ${order.tracking_number ? `(Tracking: ${order.tracking_number})` : ''}</p></div><table><thead><tr><th>Item</th><th>Qty</th><th>Unit Price</th><th>Amount</th></tr></thead><tbody>${itemsRows}</tbody></table><div class="totals"><p>Subtotal: $${subtotal.toFixed(2)}</p><p>Delivery: $${order.delivery_fee.toFixed(2)}</p>${order.discount>0? `<p>Discount: -$${order.discount.toFixed(2)}</p>`:''}<h3>Total: $${order.total_amount.toFixed(2)}</h3><p>Payment: ${order.payment_method} | Status: ${order.payment_status}</p></div></div><script>window.onload=()=>window.print()<\/script></body></html>`;
      win.document.write(html);
      win.document.close();
    }

    // update status
    function updateStatus(orderId, newStatus) {
      orders = orders.map(o => o.order_id === orderId ? { ...o, status: newStatus, updatedAt: new Date() } : o);
      renderOrders();
    }

    // View Modal
    let currentOrder = null;
    function openViewModal(order) {
      currentOrder = order;
      document.getElementById('viewOrderTitle').innerText = `Order ${order.order_number}`;
      const content = `
        <div class="flex justify-between items-center"><div><div class="flex items-center gap-3"><div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center"><i class="fas fa-box text-blue-600 text-xl"></i></div><div><p class="font-bold">${order.order_number}</p><p class="text-sm text-slate-500">${formatDate(order.createdAt)}</p></div></div></div><span class="px-3 py-1 rounded-full text-sm ${statusColors[order.status]}">${order.status}</span></div>
        <div class="grid grid-cols-2 gap-4 mt-3"><div><p class="text-xs text-slate-500">Customer</p><p class="font-medium">${order.customer_name}</p></div><div><p class="text-xs text-slate-500">Courier</p><p>${order.courier_name}</p></div><div><p class="text-xs">Payment Method</p><p class="capitalize">${order.payment_method.replace('_',' ')}</p></div><div><p class="text-xs">Payment Status</p><span class="inline-block px-2 py-0.5 rounded-full text-xs ${paymentStatusColors[order.payment_status]}">${order.payment_status}</span></div><div><p class="text-xs">Delivery</p><span class="px-2 py-0.5 rounded-full text-xs bg-slate-100">${order.delivery_type === 'free' ? 'Free' : 'Paid'}</span></div>${order.tracking_number ? `<div class="col-span-2"><p class="text-xs">Tracking</p><p class="font-mono">${order.tracking_number}</p></div>` : ''}</div>
        <div><p class="font-semibold mb-2">Items</p><div class="bg-slate-50 dark:bg-slate-700/50 rounded-xl p-4 space-y-2">${order.order_items.map(i => `<div class="flex justify-between"><span>${i.item_name} x ${i.quantity}</span><span>$${(i.price*i.quantity).toFixed(2)}</span></div>`).join('')}<div class="border-t pt-2 mt-2"><div class="flex justify-between text-sm"><span>Delivery fee</span><span>$${order.delivery_fee.toFixed(2)}</span></div>${order.discount>0?`<div class="flex justify-between text-sm text-red-500"><span>Discount</span><span>-$${order.discount.toFixed(2)}</span></div>`:''}<div class="flex justify-between font-bold text-lg mt-1"><span>Total</span><span>$${order.total_amount.toFixed(2)}</span></div></div></div></div>
        <div class="flex flex-wrap gap-2 pt-2">${order.status !== 'delivered' && order.status !== 'returned' ? (order.status === 'pending' ? `<button data-action="processing" class="status-update-btn px-4 py-2 bg-blue-600 text-white rounded-lg">Mark as Processing</button>` : order.status === 'processing' ? `<button data-action="shipped" class="status-update-btn px-4 py-2 bg-blue-600 text-white rounded-lg">Mark as Shipped</button>` : order.status === 'shipped' ? `<button data-action="delivered" class="status-update-btn px-4 py-2 bg-blue-600 text-white rounded-lg">Mark as Delivered</button>` : '') : ''}<button id="printModalInvoiceBtn" class="px-4 py-2 bg-slate-200 dark:bg-slate-700 rounded-lg"><i class="fas fa-print mr-1"></i>Print Invoice</button></div>
      `;
      document.getElementById('viewOrderContent').innerHTML = content;
      document.getElementById('viewOrderModal').classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
      // attach status update
      document.querySelectorAll('.status-update-btn').forEach(btn => {
        btn.addEventListener('click', () => { const action = btn.getAttribute('data-action'); if(action && currentOrder) { updateStatus(currentOrder.order_id, action); openViewModal(orders.find(o=>o.order_id === currentOrder.order_id)); } });
      });
      document.getElementById('printModalInvoiceBtn')?.addEventListener('click', () => { if(currentOrder) printInvoice(currentOrder); });
      document.getElementById('printFromViewBtn')?.addEventListener('click', () => { if(currentOrder) printInvoice(currentOrder); });
    }

    // New Order Form management
    let newFormState = { customer_id: '', courier_id: '', payment_method: 'cod', payment_status: 'pending', delivery_type: 'pay', discount: '0', notes: '', items: [{ item_id: '', quantity: '1' }] };
    function renderNewOrderForm() {
      const container = document.getElementById('newOrderForm');
      const trackingAuto = `TRK-${Math.random().toString(36).substring(2,8).toUpperCase()}`;
      container.innerHTML = `
        <div class="grid grid-cols-2 gap-4"><div><label class="block text-sm font-medium mb-1">Customer *</label><select id="newCustomerId" class="w-full p-2 border rounded-xl">${customerOptions.map(opt=>`<option value="${opt.value}">${opt.label}</option>`).join('')}</select></div><div><label class="block text-sm font-medium mb-1">Courier</label><select id="newCourierId" class="w-full p-2 border rounded-xl">${courierOptions.map(opt=>`<option value="${opt.value}" data-fee="${opt.fee}">${opt.label} - $${opt.fee}</option>`).join('')}</select></div></div>
        <div><label class="block font-medium mb-1">Order Items</label><div id="itemsListContainer"></div><button type="button" id="addItemBtn" class="mt-2 text-sm text-blue-600"><i class="fas fa-plus mr-1"></i>Add Item</button></div>
        <div class="grid grid-cols-2 gap-4"><div><label>Payment Method</label><select id="newPaymentMethod" class="w-full p-2 border rounded-xl"><option value="cod">Cash on Delivery</option><option value="bank_transfer">Bank Transfer</option></select></div><div><label>Payment Status</label><select id="newPaymentStatus" class="w-full p-2 border rounded-xl"><option value="pending">Pending</option><option value="paid">Paid</option></select></div><div><label>Delivery Type</label><select id="newDeliveryType" class="w-full p-2 border rounded-xl"><option value="pay">Paid Delivery</option><option value="free">Free Delivery</option></select></div><div><label>Tracking # (Auto)</label><input type="text" id="newTrackingNumber" value="${trackingAuto}" disabled class="w-full p-2 border rounded-xl bg-slate-100"></div><div><label>Discount ($)</label><input type="number" id="newDiscount" value="0" class="w-full p-2 border rounded-xl"></div></div>
        <div><label>Notes</label><textarea id="newNotes" rows="2" class="w-full p-2 border rounded-xl"></textarea></div>
      `;
      updateItemsUI();
      document.getElementById('addItemBtn').addEventListener('click', () => { newFormState.items.push({ item_id: '', quantity: '1' }); updateItemsUI(); });
    }
    function updateItemsUI() {
      const container = document.getElementById('itemsListContainer');
      if(!container) return;
      container.innerHTML = newFormState.items.map((item, idx) => `
        <div class="flex gap-2 mb-2 items-end"><select data-idx="${idx}" class="itemSelect w-full p-2 border rounded-xl">${itemOptions.map(opt=>`<option value="${opt.value}" ${item.item_id===opt.value ? 'selected' : ''}>${opt.label} - $${opt.price}</option>`).join('')}</select><input type="number" data-idx="${idx}" class="itemQty w-24 p-2 border rounded-xl" value="${item.quantity}" min="1"><button class="removeItemBtn" data-idx="${idx}" type="button" class="p-2 text-red-500"><i class="fas fa-trash-alt"></i></button></div>
      `).join('');
      document.querySelectorAll('.itemSelect').forEach(sel => sel.addEventListener('change', (e) => { const idx = parseInt(sel.dataset.idx); newFormState.items[idx].item_id = sel.value; }));
      document.querySelectorAll('.itemQty').forEach(inp => inp.addEventListener('change', (e) => { const idx = parseInt(inp.dataset.idx); newFormState.items[idx].quantity = inp.value; }));
      document.querySelectorAll('.removeItemBtn').forEach(btn => btn.addEventListener('click', (e) => { const idx = parseInt(btn.dataset.idx); if(newFormState.items.length>1) { newFormState.items.splice(idx,1); updateItemsUI(); } }));
    }
    function saveNewOrder() {
      const custId = document.getElementById('newCustomerId').value;
      const courierId = document.getElementById('newCourierId').value;
      if(!custId || !courierId) { alert("Please select customer and courier"); return; }
      const paymentMethod = document.getElementById('newPaymentMethod').value;
      const paymentStatus = document.getElementById('newPaymentStatus').value;
      const deliveryType = document.getElementById('newDeliveryType').value;
      const discount = parseFloat(document.getElementById('newDiscount').value) || 0;
      const notes = document.getElementById('newNotes').value;
      const tracking = document.getElementById('newTrackingNumber').value;
      const items = newFormState.items.filter(i => i.item_id).map(i => {
        const found = itemOptions.find(opt=>opt.value === i.item_id);
        return { item_id: i.item_id, item_name: found ? found.label : 'Unknown', price: found ? found.price : 0, quantity: parseInt(i.quantity) || 1 };
      });
      if(items.length===0) { alert("Add at least one item"); return; }
      const subtotal = items.reduce((s,i)=> s + i.price * i.quantity,0);
      const courier = courierOptions.find(c => c.value === courierId);
      const deliveryFee = deliveryType === 'free' ? 0 : (courier ? courier.fee : 0);
      const total = subtotal + deliveryFee - discount;
      const newOrder = {
        order_id: Date.now().toString(), business_id: 'biz1', order_number: `ORD-2024-${String(orders.length+1).padStart(3,'0')}`,
        customer_id: custId, customer_name: customerOptions.find(c=>c.value===custId)?.label,
        order_items: items, payment_status: paymentStatus, payment_method: paymentMethod,
        courier_id: courierId, courier_name: courier?.label, tracking_number: tracking, delivery_fee: deliveryFee,
        delivery_type: deliveryType, discount: discount, total_amount: total, notes: notes,
        status: 'pending', created_by: '1', createdAt: new Date(), updatedAt: new Date()
      };
      orders.push(newOrder);
      renderOrders();
      closeNewModal();
    }
    function closeNewModal() { document.getElementById('newOrderModal').classList.add('hidden'); document.body.classList.remove('overflow-hidden'); }
    function openNewModal() { renderNewOrderForm(); document.getElementById('newOrderModal').classList.remove('hidden'); document.body.classList.add('overflow-hidden'); }

    // Event listeners
    document.getElementById('newOrderBtn').addEventListener('click', openNewModal);
    document.getElementById('closeNewModalBtn').addEventListener('click', closeNewModal);
    document.getElementById('cancelNewModalBtn').addEventListener('click', closeNewModal);
    document.getElementById('saveOrderBtn').addEventListener('click', saveNewOrder);
    document.getElementById('modalBackdropNew')?.addEventListener('click', closeNewModal);
    document.getElementById('closeViewModalBtn').addEventListener('click', () => { document.getElementById('viewOrderModal').classList.add('hidden'); document.body.classList.remove('overflow-hidden'); });
    document.getElementById('viewModalBackdrop').addEventListener('click', () => { document.getElementById('viewOrderModal').classList.add('hidden'); document.body.classList.remove('overflow-hidden'); });
    document.getElementById('closeViewArea')?.addEventListener('click', () => { document.getElementById('viewOrderModal').classList.add('hidden'); document.body.classList.remove('overflow-hidden'); });
    document.getElementById('searchInput').addEventListener('input', renderOrders);
    document.getElementById('statusFilter').addEventListener('change', renderOrders);
    renderOrders();
  </script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../../includes/footer.php';
?>