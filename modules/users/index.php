<?php
// ============================================
// File: modules/users/index.php
// Description: User management (Admin only) - Fully responsive with mobile cards and desktop table
// ============================================
require_once '../../middleware/check_auth.php';
require_once '../../middleware/check_role.php';
checkRole('admin');
$pageTitle = 'Users | Qty Management';
ob_start();
?>

<script src="../../assets/js/users/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 md:py-10">
    <div id="app" class="space-y-6">

    <div>
        <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="users_title">Users Management</h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="users_subtitle">Control user access, manage roles, and monitor team activity across your business.</p>
    </div>

        <!-- Header: Search + Add User Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="relative w-full sm:w-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400">
                    <circle cx="10" cy="10" r="8"/><path d="m21 21-4.3-4.3"/>
                </svg>
                <input type="text" id="searchInput" data-i18n-placeholder="search_users_placeholder" placeholder="Search by name, email or ID..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <button id="openAddUserBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M12 5v14M5 12h14"/></svg>
                <span data-i18n="add_user_btn">Add User</span>
            </button>
        </div>

        <!-- Users List: Mobile Card + Desktop Table -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <!-- Mobile Card View -->
            <div id="mobileCardContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
            
            <!-- Desktop Table View -->
            <div id="desktopTableContainer" class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 dark:bg-slate-900/40">
                        <tr class="border-b border-slate-200 dark:border-slate-700">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_user_id">User ID</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_user">User</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_phone">Phone</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_role">Role</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_status">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
                </table>
            </div>
            <!-- Empty State -->
            <div id="emptyMessage" class="hidden py-12 text-center text-slate-500 dark:text-slate-400 text-sm" data-i18n="no_users_found">No users found</div>
        </div>
    </div>
</div>

<!-- Modal: Add / Edit User -->
<div id="userModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity modal-backdrop" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalTopDismiss"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden transform transition-all">
            <div class="sticky top-0 bg-white dark:bg-slate-800 z-10 flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="add_user_title">Add User</h2>
                <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto max-h-[calc(90vh-200px)] space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_full_name">Full Name</label>
                    <input type="text" id="fullNameInput" data-i18n-placeholder="full_name_placeholder" placeholder="John Doe" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_email">Email Address</label>
                    <input type="email" id="emailInput" data-i18n-placeholder="email_placeholder" placeholder="user@example.com" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_phone">Phone Number</label>
                    <input type="text" id="phoneInput" data-i18n-placeholder="phone_placeholder" placeholder="+1 234 567 8900" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Password (only for new users) -->
                <div id="passwordFieldContainer">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_password">Password</label>
                    <input type="password" id="passwordInput" data-i18n-placeholder="password_placeholder" placeholder="••••••••" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_role">Role</label>
                        <select id="roleSelect" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="admin" data-i18n="role_admin">Admin</option>
                            <option value="staff" selected data-i18n="role_staff">Staff</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_status">Status</label>
                        <select id="statusSelect" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="active" selected data-i18n="status_active">Active</option>
                            <option value="inactive" data-i18n="status_inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <!-- Profile Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_profile_image">Profile Image</label>
                    <input type="file" id="imageUploadInput" accept="image/*" class="hidden">
                    <div class="flex justify-center">
                        <div id="imagePreviewContainer" class="relative hidden">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-slate-200 dark:border-slate-700">
                                <img id="profilePreview" src="" alt="Preview" class="w-full h-full object-cover">
                            </div>
                            <button id="removeImageBtn" type="button" class="absolute -top-1 -right-1 p-1 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors" data-i18n="remove_image" title="Remove image">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            </button>
                        </div>
                        <div id="uploadPlaceholder" onclick="document.getElementById('imageUploadInput').click()" class="w-24 h-24 rounded-full border-2 border-dashed border-slate-300 dark:border-slate-600 flex flex-col items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400 mb-1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                            <span class="text-xs text-slate-500" data-i18n="upload_btn">Upload</span>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="sticky bottom-0 bg-white dark:bg-slate-800 flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="modalCancelBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel_btn">Cancel</button>
                <button id="modalSaveBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors" data-i18n="save_btn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- View User Modal -->
<div id="viewModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="viewModalTopDismiss"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md max-h-[90vh] overflow-hidden">
            <div class="sticky top-0 bg-white dark:bg-slate-800 z-10 flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center gap-2" data-i18n="user_details_title">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    User Details
                </h2>
                <button id="closeViewModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto max-h-[calc(90vh-140px)] space-y-4" id="viewDetailsContainer">
                <!-- Dynamic content injected via JS -->
            </div>
            <div class="sticky bottom-0 bg-white dark:bg-slate-800 p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="closeViewModalFooterBtn" class="w-full px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="close_btn">Close</button>
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
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2" data-i18n="delete_title">Delete User</h3>
                <p class="text-center text-slate-500 dark:text-slate-400 mb-6" data-i18n="delete_confirmation_msg">Are you sure you want to delete this user? This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors" data-i18n="cancel_btn">Cancel</button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm" data-i18n="delete_btn">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ---------- MOCK DATA (identical to React) ----------
    let users = [
        { user_id: 'USE-2024-001', business_id: 'biz1', full_name: 'John Admin', email: 'admin@demo.com', phone: '+1234567890', role: 'admin', status: 'active', user_image: '', createdAt: new Date(2024, 0, 10), updatedAt: new Date() },
        { user_id: 'USE-2024-002', business_id: 'biz1', full_name: 'Jane Staff', email: 'staff@demo.com', phone: '+1234567891', role: 'staff', status: 'active', user_image: '', createdAt: new Date(2024, 1, 5), updatedAt: new Date() },
        { user_id: 'USE-2024-003', business_id: 'biz1', full_name: 'Mike Staff', email: 'mike@demo.com', phone: '+1234567892', role: 'staff', status: 'active', user_image: '', createdAt: new Date(2024, 2, 15), updatedAt: new Date() },
        { user_id: 'USE-2024-004', business_id: 'biz1', full_name: 'Sarah Staff', email: 'sarah@demo.com', phone: '+1234567893', role: 'staff', status: 'inactive', user_image: '', createdAt: new Date(2024, 3, 20), updatedAt: new Date() }
    ];

    // Helper: generate new User ID
    function generateUserId() {
        const year = new Date().getFullYear();
        const existingCodes = users
            .map(u => {
                const match = u.user_id.match(/USE-(\d{4})-(\d{3})/);
                if (match && match[1] === year.toString()) return parseInt(match[2]);
                return 0;
            })
            .filter(n => n > 0);
        const nextNum = existingCodes.length > 0 ? Math.max(...existingCodes) + 1 : 1;
        return `USE-${year}-${String(nextNum).padStart(3, '0')}`;
    }

    // Role and status color mappings
    const roleColors = {
        admin: 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
        staff: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
    };
    const statusColors = {
        active: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
        inactive: 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-300'
    };

    // State
    let editingUser = null;
    let searchQuery = '';
    let currentImageData = '';
    let pendingDeleteId = null;

    // DOM Elements
    const searchInput = document.getElementById('searchInput');
    const mobileContainer = document.getElementById('mobileCardContainer');
    const tableBody = document.getElementById('tableBody');
    const emptyMessageDiv = document.getElementById('emptyMessage');
    const modal = document.getElementById('userModal');
    const modalTitle = document.getElementById('modalTitle');
    const fullNameInput = document.getElementById('fullNameInput');
    const emailInput = document.getElementById('emailInput');
    const phoneInput = document.getElementById('phoneInput');
    const roleSelect = document.getElementById('roleSelect');
    const statusSelect = document.getElementById('statusSelect');
    const passwordInput = document.getElementById('passwordInput');
    const passwordFieldContainer = document.getElementById('passwordFieldContainer');
    const imageUploadInput = document.getElementById('imageUploadInput');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const profilePreview = document.getElementById('profilePreview');
    const removeImageBtn = document.getElementById('removeImageBtn');
    
    const openAddBtn = document.getElementById('openAddUserBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalCancelBtn = document.getElementById('modalCancelBtn');
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalTopDismiss = document.getElementById('modalTopDismiss');

    // View Modal Elements
    const viewModal = document.getElementById('viewModal');
    const closeViewModalBtn = document.getElementById('closeViewModalBtn');
    const closeViewModalFooterBtn = document.getElementById('closeViewModalFooterBtn');
    const viewModalBackdrop = document.getElementById('viewModalBackdrop');
    const viewModalTopDismiss = document.getElementById('viewModalTopDismiss');
    const viewDetailsContainer = document.getElementById('viewDetailsContainer');

    // Delete Modal Elements
    const deleteModal = document.getElementById('deleteModal');
    const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

    // Helper: format date
    function formatDate(date) {
        if (!date) return 'N/A';
        return new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
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

    // Filter users
    function getFilteredUsers() {
        const query = searchQuery.trim().toLowerCase();
        if (!query) return users;
        return users.filter(u => 
            u.full_name.toLowerCase().includes(query) || 
            u.email.toLowerCase().includes(query) ||
            u.user_id.toLowerCase().includes(query)
        );
    }

    // View user details
    function handleView(user) {
        const roleHtml = `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${roleColors[user.role]}">${user.role === 'admin' ? 'Admin' : 'Staff'}</span>`;
        const statusHtml = `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusColors[user.status]}">${user.status === 'active' ? 'Active' : 'Inactive'}</span>`;
        const imageHtml = user.user_image && user.user_image !== '' 
            ? `<img src="${user.user_image}" alt="${escapeHtml(user.full_name)}" class="w-24 h-24 rounded-full object-cover border-2 border-slate-200 dark:border-slate-700 mx-auto">`
            : `<div class="w-24 h-24 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center mx-auto border-2 border-slate-200 dark:border-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>`;
        
        viewDetailsContainer.innerHTML = `
            <div class="flex justify-center mb-4">
                ${imageHtml}
            </div>
            <div class="space-y-3">
                <div>
                    <label class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase">User ID</label>
                    <p class="text-sm font-mono text-slate-900 dark:text-white mt-1">${escapeHtml(user.user_id)}</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase">Full Name</label>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">${escapeHtml(user.full_name)}</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase">Email</label>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">${escapeHtml(user.email)}</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase">Phone</label>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">${escapeHtml(user.phone)}</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase">Role</label>
                    <p class="text-sm mt-1">${roleHtml}</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase">Status</label>
                    <p class="text-sm mt-1">${statusHtml}</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase">Created At</label>
                    <p class="text-sm text-slate-900 dark:text-white mt-1">${formatDate(user.createdAt)}</p>
                </div>
            </div>
        `;
        
        viewModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Delete handler with confirmation modal
    function handleDelete(id) {
        pendingDeleteId = id;
        deleteModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function confirmDelete() {
        if (pendingDeleteId) {
            users = users.filter(u => u.user_id !== pendingDeleteId);
            if (editingUser && editingUser.user_id === pendingDeleteId) closeModal();
            render();
            pendingDeleteId = null;
        }
        closeDeleteModal();
    }

    function closeDeleteModal() {
        deleteModal.classList.add('hidden');
        pendingDeleteId = null;
        document.body.style.overflow = '';
    }

    // Image upload handlers
    function handleImageUpload(file) {
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                currentImageData = reader.result;
                profilePreview.src = currentImageData;
                imagePreviewContainer.classList.remove('hidden');
                uploadPlaceholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    function handleRemoveImage() {
        currentImageData = '';
        imagePreviewContainer.classList.add('hidden');
        uploadPlaceholder.classList.remove('hidden');
        if (imageUploadInput) imageUploadInput.value = '';
    }

    imageUploadInput.addEventListener('change', (e) => {
        if (e.target.files && e.target.files[0]) handleImageUpload(e.target.files[0]);
    });
    removeImageBtn.addEventListener('click', handleRemoveImage);

    // Open add modal
    function openAddModal() {
        editingUser = null;
        fullNameInput.value = '';
        emailInput.value = '';
        phoneInput.value = '';
        roleSelect.value = 'staff';
        statusSelect.value = 'active';
        passwordInput.value = '';
        handleRemoveImage();
        modalTitle.innerText = 'Add User';
        passwordFieldContainer.style.display = 'block';
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Open edit modal
    function openEditModal(user) {
        editingUser = user;
        fullNameInput.value = user.full_name;
        emailInput.value = user.email;
        phoneInput.value = user.phone;
        roleSelect.value = user.role;
        statusSelect.value = user.status;
        passwordInput.value = '';
        if (user.user_image && user.user_image !== '') {
            currentImageData = user.user_image;
            profilePreview.src = currentImageData;
            imagePreviewContainer.classList.remove('hidden');
            uploadPlaceholder.classList.add('hidden');
        } else {
            handleRemoveImage();
        }
        passwordFieldContainer.style.display = 'none';
        modalTitle.innerText = 'Edit User';
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.add('hidden');
        editingUser = null;
        currentImageData = '';
        document.body.style.overflow = '';
    }

    // Save user
    function saveUser() {
        const fullName = fullNameInput.value.trim();
        const email = emailInput.value.trim();
        const phone = phoneInput.value.trim();
        const role = roleSelect.value;
        const status = statusSelect.value;
        
        if (!fullName) { alert('Full name is required'); return; }
        if (!email) { alert('Email is required'); return; }
        if (!phone) { alert('Phone number is required'); return; }
        
        if (!editingUser) {
            const password = passwordInput.value;
            if (!password) { alert('Password is required for new users'); return; }
            const newId = generateUserId();
            const newUser = {
                user_id: newId,
                business_id: 'biz1',
                full_name: fullName,
                email: email,
                phone: phone,
                role: role,
                status: status,
                user_image: currentImageData || '',
                createdAt: new Date(),
                updatedAt: new Date(),
            };
            users.push(newUser);
        } else {
            users = users.map(u => 
                u.user_id === editingUser.user_id 
                ? { ...u, full_name: fullName, email: email, phone: phone, role: role, status: status, user_image: currentImageData || '', updatedAt: new Date() }
                : u
            );
        }
        render();
        closeModal();
    }

    // Render function: Mobile Cards + Desktop Table
    function render() {
        const filtered = getFilteredUsers();
        const hasItems = filtered.length > 0;
        
        if (!hasItems) {
            mobileContainer.innerHTML = '';
            tableBody.innerHTML = '';
            emptyMessageDiv.classList.remove('hidden');
            return;
        }
        emptyMessageDiv.classList.add('hidden');
        
        // Mobile Cards - Fixed rendering with proper structure
        mobileContainer.innerHTML = filtered.map(u => `
            <div class="p-4 space-y-3 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors" data-id="${u.user_id}">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center overflow-hidden flex-shrink-0 bg-slate-100 dark:bg-slate-700">
                        ${u.user_image ? `<img src="${u.user_image}" alt="${escapeHtml(u.full_name)}" class="w-full h-full object-cover">` : 
                            (u.role === 'admin' ? 
                                `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>` :
                                `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600 dark:text-emerald-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>`)
                        }
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-slate-900 dark:text-white truncate">${escapeHtml(u.full_name)}</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400 truncate">${escapeHtml(u.email)}</p>
                        <p class="text-xs text-slate-400 font-mono mt-1">${u.user_id}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    <div>
                        <span class="text-slate-500 dark:text-slate-400 text-xs block">Phone</span>
                        <span class="text-slate-700 dark:text-slate-300">${escapeHtml(u.phone)}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 dark:text-slate-400 text-xs block mb-1">Role</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${roleColors[u.role]}">${u.role === 'admin' ? 'Admin' : 'Staff'}</span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-slate-500 dark:text-slate-400 text-xs block mb-1">Status</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusColors[u.status]}">${u.status === 'active' ? 'Active' : 'Inactive'}</span>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100 dark:border-slate-700">
                    <button class="view-mobile-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" data-id="${u.user_id}" title="View Details">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <span class="sr-only">View</span>
                    </button>
                    <button class="edit-mobile-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" data-id="${u.user_id}" title="Edit User">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg>
                        <span class="sr-only">Edit</span>
                    </button>
                    <button class="delete-mobile-btn p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors" data-id="${u.user_id}" title="Delete User">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v5M14 11v5"/></svg>
                        <span class="sr-only">Delete</span>
                    </button>
                </div>
            </div>
        `).join('');
        
        // Attach mobile button events with proper event handlers
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
        
        // Mobile event handlers
        function handleMobileView(e) { 
            e.stopPropagation();
            const id = e.currentTarget.getAttribute('data-id'); 
            const user = users.find(u => u.user_id === id); 
            if(user) handleView(user); 
        }
        function handleMobileEdit(e) { 
            e.stopPropagation();
            const id = e.currentTarget.getAttribute('data-id'); 
            const user = users.find(u => u.user_id === id); 
            if(user) openEditModal(user); 
        }
        function handleMobileDelete(e) { 
            e.stopPropagation();
            const id = e.currentTarget.getAttribute('data-id'); 
            handleDelete(id); 
        }
        
        // Desktop Table - Fixed with proper structure
        if (tableBody) {
            tableBody.innerHTML = filtered.map(u => `
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                    <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400 font-mono">${u.user_id}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center overflow-hidden bg-slate-100 dark:bg-slate-700">
                                ${u.user_image ? `<img src="${u.user_image}" class="w-full h-full object-cover">` : 
                                    (u.role === 'admin' ? 
                                        `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-blue-600 dark:text-blue-400"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>` :
                                        `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald-600 dark:text-emerald-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>`)
                                }
                            </div>
                            <div>
                                <p class="font-medium text-slate-900 dark:text-white">${escapeHtml(u.full_name)}</p>
                                <p class="text-sm text-slate-500 dark:text-slate-400">${escapeHtml(u.email)}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm text-slate-700 dark:text-slate-300">${escapeHtml(u.phone)}</td>
                    <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${roleColors[u.role]}">${u.role === 'admin' ? 'Admin' : 'Staff'}</span></td>
                    <td class="px-4 py-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusColors[u.status]}">${u.status === 'active' ? 'Active' : 'Inactive'}</span></td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <button class="view-table-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" data-id="${u.user_id}" title="View Details">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                <span class="sr-only">View</span>
                            </button>
                            <button class="edit-table-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" data-id="${u.user_id}" title="Edit User">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg>
                                <span class="sr-only">Edit</span>
                            </button>
                            <button class="delete-table-btn p-2 hover:bg-red-100 dark:hover:bg-red-900/20 rounded-lg transition-colors" data-id="${u.user_id}" title="Delete User">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v5M14 11v5"/></svg>
                                <span class="sr-only">Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }
        
        // Attach table button events
        document.querySelectorAll('.view-table-btn').forEach(btn => {
            btn.removeEventListener('click', handleTableView);
            btn.addEventListener('click', handleTableView);
        });
        document.querySelectorAll('.edit-table-btn').forEach(btn => {
            btn.removeEventListener('click', handleTableEdit);
            btn.addEventListener('click', handleTableEdit);
        });
        document.querySelectorAll('.delete-table-btn').forEach(btn => {
            btn.removeEventListener('click', handleTableDelete);
            btn.addEventListener('click', handleTableDelete);
        });
        
        function handleTableView(e) { 
            const id = e.currentTarget.getAttribute('data-id'); 
            const user = users.find(u => u.user_id === id); 
            if(user) handleView(user); 
        }
        function handleTableEdit(e) { 
            const id = e.currentTarget.getAttribute('data-id'); 
            const user = users.find(u => u.user_id === id); 
            if(user) openEditModal(user); 
        }
        function handleTableDelete(e) { 
            const id = e.currentTarget.getAttribute('data-id'); 
            handleDelete(id); 
        }
    }
    
    // Event listeners
    if (searchInput) {
        searchInput.addEventListener('input', (e) => { searchQuery = e.target.value; render(); });
    }
    if (openAddBtn) openAddBtn.addEventListener('click', openAddModal);
    if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
    if (modalCancelBtn) modalCancelBtn.addEventListener('click', closeModal);
    if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);
    if (modalTopDismiss) modalTopDismiss.addEventListener('click', closeModal);
    if (modalSaveBtn) modalSaveBtn.addEventListener('click', saveUser);
    
    // View modal event listeners
    const closeViewModal = () => {
        viewModal.classList.add('hidden');
        document.body.style.overflow = '';
    };
    if (closeViewModalBtn) closeViewModalBtn.addEventListener('click', closeViewModal);
    if (closeViewModalFooterBtn) closeViewModalFooterBtn.addEventListener('click', closeViewModal);
    if (viewModalBackdrop) viewModalBackdrop.addEventListener('click', closeViewModal);
    if (viewModalTopDismiss) viewModalTopDismiss.addEventListener('click', closeViewModal);
    
    // Delete modal event listeners
    if (cancelDeleteBtn) cancelDeleteBtn.addEventListener('click', closeDeleteModal);
    if (deleteModalBackdrop) deleteModalBackdrop.addEventListener('click', closeDeleteModal);
    if (confirmDeleteBtn) confirmDeleteBtn.addEventListener('click', confirmDelete);
    
    // Escape key handler
    document.addEventListener('keydown', (e) => { 
        if(e.key === 'Escape') {
            if(modal && !modal.classList.contains('hidden')) closeModal();
            if(viewModal && !viewModal.classList.contains('hidden')) closeViewModal();
            if(deleteModal && !deleteModal.classList.contains('hidden')) closeDeleteModal();
        }
    });
    
    // Body scroll lock - using event listeners instead of MutationObserver for better performance
    function updateBodyScroll() {
        if ((modal && !modal.classList.contains('hidden')) || 
            (viewModal && !viewModal.classList.contains('hidden')) || 
            (deleteModal && !deleteModal.classList.contains('hidden'))) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }
    
    // Override classList add/remove for modals to update scroll lock
    const originalClassListAdd = DOMTokenList.prototype.add;
    const originalClassListRemove = DOMTokenList.prototype.remove;
    
    DOMTokenList.prototype.add = function() {
        originalClassListAdd.apply(this, arguments);
        if (this === modal?.classList || this === viewModal?.classList || this === deleteModal?.classList) {
            updateBodyScroll();
        }
    };
    
    DOMTokenList.prototype.remove = function() {
        originalClassListRemove.apply(this, arguments);
        if (this === modal?.classList || this === viewModal?.classList || this === deleteModal?.classList) {
            updateBodyScroll();
        }
    };
    
    // Dark mode detection
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
    }
    
    // Initial render
    render();
</script>

<?php $content = ob_get_clean(); include '../../includes/header.php'; include '../../includes/sidebar.php'; echo '<div class="main-content min-h-screen">'; echo $content; include '../../includes/footer.php'; ?>