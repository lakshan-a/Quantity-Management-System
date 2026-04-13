<?php
// ============================================
// File: modules/returns/index.php
// Description: Returns management with Edit & Delete actions
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Returns | Qty Management';
ob_start();
?>

<script src="../../assets/js/returns/translations.js"></script>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
    <!-- Main returns container -->
    <div class="space-y-6">

    <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="returns_title">Return Management</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="returns_subtitle">Manage your returns, view orders, and track refunds</p>
        </div>

        <!-- Header with search & new return button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="relative w-full sm:w-72">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="searchInput" data-i18n-placeholder="search_placeholder" placeholder="Search by return ID, order or reason..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-smooth">
            </div>
            <button id="openNewReturnBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <span data-i18n="new_return">New Return</span>
            </button>
        </div>

        <!-- Returns Table/Cards Container -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
            <!-- Mobile cards view -->
            <div id="mobileReturnsContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>

            <!-- Desktop table view -->
            <div id="desktopTableContainer" class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="return_id">Return ID</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="order_number">Order #</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="reason">Reason</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="status">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="refund">Refund</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="created">Created</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="return_date_header">Return Date</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="desktopReturnsBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
                </table>
            </div>
            <div id="emptyStateMessage" class="hidden p-8 text-center text-slate-500 dark:text-slate-400 text-sm" data-i18n="no_returns_found">No returns found matching your search.</div>
        </div>
    </div>
</div>

<!-- MODAL: NEW RETURN REQUEST -->
<div id="newReturnModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="modalBackdropNew"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalDismissAreaNew"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md max-h-[90vh] overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="new_return_title">New Return Request</h2>
                <button class="closeModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto max-h-[calc(90vh-140px)] space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="order_label">Order *</label>
                    <select id="returnOrderId" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" data-i18n="select_order">Select order</option>
                        <option value="1">ORD-2024-001</option>
                        <option value="2">ORD-2024-002</option>
                        <option value="3">ORD-2024-003</option>
                        <option value="4">ORD-2024-004</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="reason_label">Reason for return *</label>
                    <textarea id="returnReason" rows="3" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 resize-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="return_status_label">Return Status</label>
                        <select id="returnStatusSelect" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="requested" data-i18n="requested">Requested</option>
                            <option value="approved" data-i18n="approved">Approved</option>
                            <option value="rejected" data-i18n="rejected">Rejected</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="refund_status_label">Refund Status</label>
                        <select id="refundStatusSelect" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="pending" data-i18n="pending">Pending</option>
                            <option value="completed" data-i18n="completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="return_date_label">Return Date (optional)</label>
                    <input type="date" id="returnDateInput" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="order_lost_notes_label">Order lost notes</label>
                    <input type="text" id="orderLostNotes" data-i18n-placeholder="order_lost_placeholder" placeholder="e.g., Customer refused to return" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
                <button class="closeModalBtn px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel">Cancel</button>
                <button id="submitReturnBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors" data-i18n="submit_request">Submit Request</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL: EDIT RETURN -->
<div id="editReturnModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="editModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="editModalDismissArea"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md max-h-[90vh] overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="edit_return_title">Edit Return</h2>
                <button class="closeEditModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto max-h-[calc(90vh-140px)] space-y-4">
                <input type="hidden" id="editReturnId">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="order_label">Order</label>
                    <select id="editOrderId" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1">ORD-2024-001</option>
                        <option value="2">ORD-2024-002</option>
                        <option value="3">ORD-2024-003</option>
                        <option value="4">ORD-2024-004</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="reason_label">Reason for return *</label>
                    <textarea id="editReason" rows="3" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 resize-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="return_status_label">Return Status</label>
                        <select id="editReturnStatus" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="requested" data-i18n="requested">Requested</option>
                            <option value="approved" data-i18n="approved">Approved</option>
                            <option value="rejected" data-i18n="rejected">Rejected</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="refund_status_label">Refund Status</label>
                        <select id="editRefundStatus" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="pending" data-i18n="pending">Pending</option>
                            <option value="completed" data-i18n="completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="return_date_label">Return Date</label>
                    <input type="date" id="editReturnDate" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="order_lost_notes_label">Order lost notes</label>
                    <input type="text" id="editOrderLostNotes" data-i18n-placeholder="order_lost_placeholder" placeholder="e.g., Customer refused to return" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
                <button class="closeEditModalBtn px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel">Cancel</button>
                <button id="updateReturnBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors" data-i18n="update_return">Update Return</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL: VIEW RETURN DETAILS -->
<div id="viewReturnModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="viewModalDismissArea"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md max-h-[90vh] overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="return_details_title">Return Details</h2>
                <button class="closeViewModalBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div id="viewModalContent" class="p-4 space-y-4"></div>
            <div id="viewModalActions" class="p-4 border-t border-slate-200 dark:border-slate-700 flex flex-wrap gap-3"></div>
        </div>
    </div>
</div>

<!-- MODAL: DELETE CONFIRMATION -->
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
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2" data-i18n="delete_return_title">Delete Return</h3>
                <p class="text-center text-slate-500 dark:text-slate-400 mb-6" data-i18n="delete_confirmation_message">Are you sure you want to delete <span id="deleteReturnId" class="font-medium text-slate-700 dark:text-slate-300"></span>? This action cannot be undone.</p>
                <div class="flex flex-col-reverse sm:flex-row gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel">Cancel</button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm" data-i18n="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ---------- DATA (mock returns) ----------
    let returnsData = [
        {
            return_id: 'RET-2024-001',
            business_id: 'biz1',
            order_id: '1',
            order_number: 'ORD-2024-001',
            reason: 'Defective product',
            return_status: 'approved',
            returned_date: new Date(),
            refund_status: 'completed',
            created_by: '1',
            createdAt: new Date(Date.now() - 86400000 * 5),
            updatedAt: new Date(),
            order_lost: null,
        },
        {
            return_id: 'RET-2024-002',
            business_id: 'biz1',
            order_id: '2',
            order_number: 'ORD-2024-002',
            reason: 'Wrong size',
            return_status: 'requested',
            refund_status: 'pending',
            created_by: '1',
            createdAt: new Date(Date.now() - 86400000 * 3),
            updatedAt: new Date(),
            order_lost: null,
            returned_date: null,
        },
        {
            return_id: 'RET-2024-003',
            business_id: 'biz1',
            order_id: '3',
            order_number: 'ORD-2024-003',
            reason: 'Changed mind',
            return_status: 'rejected',
            refund_status: 'pending',
            order_lost: 'Customer refused to return',
            created_by: '1',
            createdAt: new Date(Date.now() - 86400000 * 1),
            updatedAt: new Date(),
            returned_date: null,
        }
    ];
    const orderOptions = [
        { value: '1', label: 'ORD-2024-001' },
        { value: '2', label: 'ORD-2024-002' },
        { value: '3', label: 'ORD-2024-003' },
        { value: '4', label: 'ORD-2024-004' }
    ];

    let currentSearchQuery = '';
    let currentSelectedReturn = null;
    let pendingDeleteId = null;

    // Helper: status color mapping
    function statusBadgeClass(status) {
        const map = {
            requested: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
            approved: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
            rejected: 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400'
        };
        return map[status] || map.requested;
    }
    function refundBadgeClass(refund) {
        return refund === 'pending' 
            ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400'
            : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400';
    }

    function formatDate(dateVal) {
        if (!dateVal) return '-';
        const d = new Date(dateVal);
        return d.toLocaleDateString();
    }

    function formatDateForInput(dateVal) {
        if (!dateVal) return '';
        const d = new Date(dateVal);
        return d.toISOString().split('T')[0];
    }

    function escapeHtml(str) { 
        if(!str) return ''; 
        return str.replace(/[&<>]/g, function(m){
            if(m==='&') return '&amp;'; 
            if(m==='<') return '&lt;'; 
            if(m==='>') return '&gt;'; 
            return m;
        }); 
    }

    // Delete return - FIXED: properly removes the item and re-renders
    function deleteReturn(returnId) {
        // Filter out the return with the matching ID
        returnsData = returnsData.filter(r => r.return_id !== returnId);
        // Re-render the tables
        renderReturns();
        // Close the delete modal
        closeDeleteModal();
    }

    // Edit return
    function editReturn(returnId, updatedData) {
        returnsData = returnsData.map(r => r.return_id === returnId ? {
            ...r,
            order_id: updatedData.order_id,
            order_number: orderOptions.find(o => o.value === updatedData.order_id)?.label || '',
            reason: updatedData.reason,
            return_status: updatedData.return_status,
            refund_status: updatedData.refund_status,
            returned_date: updatedData.return_date ? new Date(updatedData.return_date) : (updatedData.return_status === 'approved' ? new Date() : r.returned_date),
            order_lost: updatedData.order_lost || null,
            updatedAt: new Date()
        } : r);
        renderReturns();
    }

    // Add new return
    function addNewReturn(formDataObj) {
        const newId = `RET-${new Date().getFullYear()}-${String(returnsData.length + 1).padStart(3,'0')}`;
        const orderLabel = orderOptions.find(o => o.value === formDataObj.order_id)?.label || '';
        const newReturn = {
            return_id: newId,
            business_id: 'biz1',
            order_id: formDataObj.order_id,
            order_number: orderLabel,
            reason: formDataObj.reason,
            return_status: formDataObj.return_status,
            refund_status: formDataObj.refund_status,
            order_lost: formDataObj.order_lost || null,
            returned_date: formDataObj.return_date ? new Date(formDataObj.return_date) : (formDataObj.return_status === 'approved' ? new Date() : null),
            created_by: '1',
            createdAt: new Date(),
            updatedAt: new Date(),
        };
        returnsData = [newReturn, ...returnsData];
        renderReturns();
    }
    
    // Update status (for approve/reject actions)
    function updateReturnStatus(returnId, newStatus) {
        returnsData = returnsData.map(r => r.return_id === returnId ? {
            ...r,
            return_status: newStatus,
            returned_date: newStatus === 'approved' ? new Date() : r.returned_date,
            updatedAt: new Date()
        } : r);
        renderReturns();
    }
    
    function completeRefund(returnId) {
        returnsData = returnsData.map(r => r.return_id === returnId ? {...r, refund_status: 'completed', updatedAt: new Date()} : r);
        renderReturns();
    }

    // Render both views
    function renderReturns() {
        const filtered = returnsData.filter(r => 
            r.order_number.toLowerCase().includes(currentSearchQuery.toLowerCase()) ||
            r.reason.toLowerCase().includes(currentSearchQuery.toLowerCase()) ||
            r.return_id.toLowerCase().includes(currentSearchQuery.toLowerCase())
        );
        
        const mobileContainer = document.getElementById('mobileReturnsContainer');
        const desktopBody = document.getElementById('desktopReturnsBody');
        const emptyMsg = document.getElementById('emptyStateMessage');
        
        if (filtered.length === 0) {
            mobileContainer.innerHTML = '';
            desktopBody.innerHTML = '';
            emptyMsg.classList.remove('hidden');
            return;
        }
        emptyMsg.classList.add('hidden');
        
        // Mobile cards rendering with edit/delete buttons
        mobileContainer.innerHTML = filtered.map(r => `
            <div class="p-4 space-y-3">
                <div class="flex items-center justify-between">
                    <div class="font-medium text-slate-900 dark:text-white">${escapeHtml(r.order_number)}</div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-mono">${escapeHtml(r.return_id)}</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div class="col-span-2"><span class="text-slate-500 text-xs block">Reason</span><span class="text-slate-700 dark:text-slate-300">${escapeHtml(r.reason)}</span></div>
                    <div><span class="text-slate-500 text-xs block mb-1">Status</span><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusBadgeClass(r.return_status)}">${r.return_status}</span></div>
                    <div><span class="text-slate-500 text-xs block mb-1">Refund</span><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${refundBadgeClass(r.refund_status)}">${r.refund_status}</span></div>
                    <div><span class="text-slate-500 text-xs block">Created</span><span class="text-slate-700 dark:text-slate-300">${formatDate(r.createdAt)}</span></div>
                    ${r.returned_date ? `<div><span class="text-slate-500 text-xs block">Return date</span><span class="text-slate-700 dark:text-slate-300">${formatDate(r.returned_date)}</span></div>` : ''}
                </div>
                <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-700">
                    <button data-id="${r.return_id}" class="viewReturnBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                    <button data-id="${r.return_id}" class="editReturnBtn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3l4 4-7 7H10v-4l7-7z"/><path d="M4 20h16"/></svg>
                    </button>
                    <button data-id="${r.return_id}" class="deleteReturnBtn p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M8 6V4h8v2"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                    </button>
                </div>
            </div>
        `).join('');
        
        // Desktop table rows with edit/delete buttons
        desktopBody.innerHTML = filtered.map(r => `
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <td class="px-4 py-3 text-sm text-slate-900 dark:text-white font-mono">${escapeHtml(r.return_id)}</td>
                <td class="px-4 py-3 text-sm text-slate-900 dark:text-white">${escapeHtml(r.order_number)}</td>
                <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${escapeHtml(r.reason)}</td>
                <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusBadgeClass(r.return_status)}">${r.return_status}</span></td>
                <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${refundBadgeClass(r.refund_status)}">${r.refund_status}</span></td>
                <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${formatDate(r.createdAt)}</td>
                <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${r.returned_date ? formatDate(r.returned_date) : '-'}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-1">
                        <button data-id="${r.return_id}" class="viewReturnBtn p-1.5 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="View">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                        <button data-id="${r.return_id}" class="editReturnBtn p-1.5 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg>
                        </button>
                        <button data-id="${r.return_id}" class="deleteReturnBtn p-1.5 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M8 6V4h8v2"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
        
        // Attach event listeners to buttons
        document.querySelectorAll('.viewReturnBtn').forEach(btn => {
            // Remove any existing listener to avoid duplicates
            btn.removeEventListener('click', btn._listener);
            const handler = (e) => {
                e.stopPropagation();
                const id = btn.getAttribute('data-id');
                const ret = returnsData.find(r => r.return_id === id);
                if (ret) openViewModal(ret);
            };
            btn.addEventListener('click', handler);
            btn._listener = handler;
        });
        
        document.querySelectorAll('.editReturnBtn').forEach(btn => {
            btn.removeEventListener('click', btn._listener);
            const handler = (e) => {
                e.stopPropagation();
                const id = btn.getAttribute('data-id');
                const ret = returnsData.find(r => r.return_id === id);
                if (ret) openEditModal(ret);
            };
            btn.addEventListener('click', handler);
            btn._listener = handler;
        });
        
        document.querySelectorAll('.deleteReturnBtn').forEach(btn => {
            btn.removeEventListener('click', btn._listener);
            const handler = (e) => {
                e.stopPropagation();
                const id = btn.getAttribute('data-id');
                const ret = returnsData.find(r => r.return_id === id);
                if (ret) openDeleteModal(ret);
            };
            btn.addEventListener('click', handler);
            btn._listener = handler;
        });
    }
    
    // Modal handlers
    const newModal = document.getElementById('newReturnModal');
    const editModal = document.getElementById('editReturnModal');
    const viewModal = document.getElementById('viewReturnModal');
    const deleteModal = document.getElementById('deleteModal');
    
    function openNewModal() { newModal.classList.remove('hidden'); document.body.classList.add('modal-open'); }
    function closeNewModal() { newModal.classList.add('hidden'); document.body.classList.remove('modal-open'); }
    
    function openEditModal(returnObj) {
        document.getElementById('editReturnId').value = returnObj.return_id;
        document.getElementById('editOrderId').value = returnObj.order_id;
        document.getElementById('editReason').value = returnObj.reason;
        document.getElementById('editReturnStatus').value = returnObj.return_status;
        document.getElementById('editRefundStatus').value = returnObj.refund_status;
        document.getElementById('editReturnDate').value = formatDateForInput(returnObj.returned_date);
        document.getElementById('editOrderLostNotes').value = returnObj.order_lost || '';
        editModal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    function closeEditModal() { editModal.classList.add('hidden'); document.body.classList.remove('modal-open'); }
    
    function openViewModal(returnObj) {
        currentSelectedReturn = returnObj;
        const contentDiv = document.getElementById('viewModalContent');
        const actionsDiv = document.getElementById('viewModalActions');
        contentDiv.innerHTML = `
           <div class="grid grid-cols-2 gap-4">
                <div><p class="text-sm text-slate-500">${t('return_id_label')}</p><p class="font-medium text-slate-900 dark:text-white font-mono">${escapeHtml(returnObj.return_id)}</p></div>
                <div><p class="text-sm text-slate-500">${t('order_number_label')}</p><p class="font-medium text-slate-900 dark:text-white">${escapeHtml(returnObj.order_number)}</p></div>
                <div><p class="text-sm text-slate-500 mb-1">${t('status')}</p><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusBadgeClass(returnObj.return_status)}">${t(returnObj.return_status)}</span></div>
                <div><p class="text-sm text-slate-500 mb-1">${t('refund')}</p><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${refundBadgeClass(returnObj.refund_status)}">${t(returnObj.refund_status)}</span></div>
                <div class="col-span-2"><p class="text-sm text-slate-500">${t('reason')}</p><p class="font-medium text-slate-900 dark:text-white">${escapeHtml(returnObj.reason)}</p></div>
                ${returnObj.returned_date ? `<div><p class="text-sm text-slate-500">${t('returned_date')}</p><p class="font-medium">${formatDate(returnObj.returned_date)}</p></div>` : ''}
                ${returnObj.order_lost ? `<div class="col-span-2"><p class="text-sm text-slate-500">${t('order_lost_notes_label')}</p><p class="font-medium">${escapeHtml(returnObj.order_lost)}</p></div>` : ''}
            </div>
        `;
        actionsDiv.innerHTML = '';
        if (returnObj.return_status === 'requested') {
            actionsDiv.innerHTML = `
                <button id="approveReturnBtn" class="flex items-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600"><svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Approve</button>
                <button id="rejectReturnBtn" class="flex items-center px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600"><svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>Reject</button>
            `;
            const approveBtn = document.getElementById('approveReturnBtn');
            const rejectBtn = document.getElementById('rejectReturnBtn');
            if (approveBtn) {
                approveBtn.removeEventListener('click', approveBtn._listener);
                const approveHandler = () => { updateReturnStatus(returnObj.return_id, 'approved'); closeViewModal(); };
                approveBtn.addEventListener('click', approveHandler);
                approveBtn._listener = approveHandler;
            }
            if (rejectBtn) {
                rejectBtn.removeEventListener('click', rejectBtn._listener);
                const rejectHandler = () => { updateReturnStatus(returnObj.return_id, 'rejected'); closeViewModal(); };
                rejectBtn.addEventListener('click', rejectHandler);
                rejectBtn._listener = rejectHandler;
            }
        } else if (returnObj.return_status === 'approved' && returnObj.refund_status === 'pending') {
            actionsDiv.innerHTML = `<button id="completeRefundBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">Complete Refund</button>`;
            const refundBtn = document.getElementById('completeRefundBtn');
            if (refundBtn) {
                refundBtn.removeEventListener('click', refundBtn._listener);
                const refundHandler = () => { completeRefund(returnObj.return_id); closeViewModal(); };
                refundBtn.addEventListener('click', refundHandler);
                refundBtn._listener = refundHandler;
            }
        } else {
            actionsDiv.innerHTML = `<div class="text-sm text-slate-500">No further actions</div>`;
        }
        viewModal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    function closeViewModal() { viewModal.classList.add('hidden'); document.body.classList.remove('modal-open'); currentSelectedReturn = null; }
    
    function openDeleteModal(returnObj) {
        pendingDeleteId = returnObj.return_id;
        const deleteReturnIdSpan = document.getElementById('deleteReturnId');
        if (deleteReturnIdSpan) {
            deleteReturnIdSpan.textContent = returnObj.return_id;
        }
        deleteModal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    
    function closeDeleteModal() { 
        deleteModal.classList.add('hidden'); 
        document.body.classList.remove('modal-open');
        pendingDeleteId = null;
    }
    
    // Event listeners for modals
    const openNewBtn = document.getElementById('openNewReturnBtn');
    if (openNewBtn) {
        openNewBtn.removeEventListener('click', openNewBtn._listener);
        openNewBtn.addEventListener('click', openNewModal);
        openNewBtn._listener = openNewModal;
    }
    
    document.querySelectorAll('.closeModalBtn').forEach(btn => {
        btn.removeEventListener('click', btn._listener);
        const handler = () => closeNewModal();
        btn.addEventListener('click', handler);
        btn._listener = handler;
    });
    
    const modalBackdropNew = document.getElementById('modalBackdropNew');
    if (modalBackdropNew) {
        modalBackdropNew.removeEventListener('click', modalBackdropNew._listener);
        modalBackdropNew.addEventListener('click', closeNewModal);
        modalBackdropNew._listener = closeNewModal;
    }
    
    const modalDismissAreaNew = document.getElementById('modalDismissAreaNew');
    if (modalDismissAreaNew) {
        modalDismissAreaNew.removeEventListener('click', modalDismissAreaNew._listener);
        modalDismissAreaNew.addEventListener('click', closeNewModal);
        modalDismissAreaNew._listener = closeNewModal;
    }
    
    // Edit modal close handlers
    document.querySelectorAll('.closeEditModalBtn').forEach(btn => {
        btn.removeEventListener('click', btn._listener);
        const handler = () => closeEditModal();
        btn.addEventListener('click', handler);
        btn._listener = handler;
    });
    
    const editModalBackdrop = document.getElementById('editModalBackdrop');
    if (editModalBackdrop) {
        editModalBackdrop.removeEventListener('click', editModalBackdrop._listener);
        editModalBackdrop.addEventListener('click', closeEditModal);
        editModalBackdrop._listener = closeEditModal;
    }
    
    const editModalDismissArea = document.getElementById('editModalDismissArea');
    if (editModalDismissArea) {
        editModalDismissArea.removeEventListener('click', editModalDismissArea._listener);
        editModalDismissArea.addEventListener('click', closeEditModal);
        editModalDismissArea._listener = closeEditModal;
    }
    
    // View modal close handlers
    const viewModalBackdrop = document.getElementById('viewModalBackdrop');
    if (viewModalBackdrop) {
        viewModalBackdrop.removeEventListener('click', viewModalBackdrop._listener);
        viewModalBackdrop.addEventListener('click', closeViewModal);
        viewModalBackdrop._listener = closeViewModal;
    }
    
    const viewModalDismissArea = document.getElementById('viewModalDismissArea');
    if (viewModalDismissArea) {
        viewModalDismissArea.removeEventListener('click', viewModalDismissArea._listener);
        viewModalDismissArea.addEventListener('click', closeViewModal);
        viewModalDismissArea._listener = closeViewModal;
    }
    
    document.querySelectorAll('.closeViewModalBtn').forEach(btn => {
        btn.removeEventListener('click', btn._listener);
        const handler = () => closeViewModal();
        btn.addEventListener('click', handler);
        btn._listener = handler;
    });
    
    // Delete modal close handlers
    const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');
    if (deleteModalBackdrop) {
        deleteModalBackdrop.removeEventListener('click', deleteModalBackdrop._listener);
        deleteModalBackdrop.addEventListener('click', closeDeleteModal);
        deleteModalBackdrop._listener = closeDeleteModal;
    }
    
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    if (cancelDeleteBtn) {
        cancelDeleteBtn.removeEventListener('click', cancelDeleteBtn._listener);
        cancelDeleteBtn.addEventListener('click', closeDeleteModal);
        cancelDeleteBtn._listener = closeDeleteModal;
    }
    
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    if (confirmDeleteBtn) {
        confirmDeleteBtn.removeEventListener('click', confirmDeleteBtn._listener);
        const deleteHandler = () => {
            if (pendingDeleteId) {
                deleteReturn(pendingDeleteId);
            }
        };
        confirmDeleteBtn.addEventListener('click', deleteHandler);
        confirmDeleteBtn._listener = deleteHandler;
    }
    
    // Submit new return
    const submitReturnBtn = document.getElementById('submitReturnBtn');
    if (submitReturnBtn) {
        submitReturnBtn.removeEventListener('click', submitReturnBtn._listener);
        const submitHandler = () => {
            const order_id = document.getElementById('returnOrderId').value;
            const reason = document.getElementById('returnReason').value.trim();
            if (!order_id || !reason) { alert('Please select order and provide a reason.'); return; }
            const form = {
                order_id: order_id,
                reason: reason,
                return_status: document.getElementById('returnStatusSelect').value,
                refund_status: document.getElementById('refundStatusSelect').value,
                return_date: document.getElementById('returnDateInput').value,
                order_lost: document.getElementById('orderLostNotes').value,
            };
            addNewReturn(form);
            closeNewModal();
            // reset form
            document.getElementById('returnOrderId').value = '';
            document.getElementById('returnReason').value = '';
            document.getElementById('returnStatusSelect').value = 'requested';
            document.getElementById('refundStatusSelect').value = 'pending';
            document.getElementById('returnDateInput').value = '';
            document.getElementById('orderLostNotes').value = '';
        };
        submitReturnBtn.addEventListener('click', submitHandler);
        submitReturnBtn._listener = submitHandler;
    }
    
    // Update return
    const updateReturnBtn = document.getElementById('updateReturnBtn');
    if (updateReturnBtn) {
        updateReturnBtn.removeEventListener('click', updateReturnBtn._listener);
        const updateHandler = () => {
            const returnId = document.getElementById('editReturnId').value;
            const reason = document.getElementById('editReason').value.trim();
            if (!reason) { alert('Please provide a reason for return.'); return; }
            const form = {
                order_id: document.getElementById('editOrderId').value,
                reason: reason,
                return_status: document.getElementById('editReturnStatus').value,
                refund_status: document.getElementById('editRefundStatus').value,
                return_date: document.getElementById('editReturnDate').value,
                order_lost: document.getElementById('editOrderLostNotes').value,
            };
            editReturn(returnId, form);
            closeEditModal();
        };
        updateReturnBtn.addEventListener('click', updateHandler);
        updateReturnBtn._listener = updateHandler;
    }
    
    // Search input
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.removeEventListener('input', searchInput._listener);
        const searchHandler = (e) => { currentSearchQuery = e.target.value; renderReturns(); };
        searchInput.addEventListener('input', searchHandler);
        searchInput._listener = searchHandler;
    }
    
    // Initial render
    renderReturns();
</script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../../includes/footer.php';
?>