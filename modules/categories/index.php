<?php
// ============================================
// File: modules/categories/index.php
// Description: Categories management
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Categories | Qty Management';
ob_start();
?>

<script src="../../assets/js/categories/translations.js"></script>

<!-- main app wrapper -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 md:py-10">
    <!-- header & category controls -->
    <div class="space-y-6">

    <div>
    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="categories_title">Category Management</h1>
    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="categories_subtitle">Manage your categories, organize products, and track performance.</p>
</div>

        <!-- top bar: search + add button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="relative w-full sm:w-72">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"><circle cx="10" cy="10" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input type="text" id="searchInput" data-i18n-placeholder="search_placeholder" placeholder="Search categories..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <button id="openAddCategoryBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M12 5v14M5 12h14"/></svg>
                <span data-i18n="add_category_btn">Add Category</span>
            </button>
        </div>

        <!-- Category Cards & Table Section (combined responsive) -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <!-- Mobile view (cards) -->
            <div id="mobileCardContainer" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
            <!-- Desktop view (table) -->
            <div id="desktopTableContainer" class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 dark:bg-slate-900/40">
                        <tr class="border-b border-slate-200 dark:border-slate-700">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_id">Category ID</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_name">Category Name</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_created">Created</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
                </table>
            </div>
            <!-- empty state unified via JS -->
            <div id="emptyMessage" class="hidden py-12 text-center text-slate-500 dark:text-slate-400 text-sm" data-i18n="no_categories_found">No categories found</div>
        </div>
    </div>
</div>

<!-- Modal (Add / Edit) -->
<div id="categoryModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity modal-backdrop" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalTopDismiss"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md max-h-[90vh] overflow-hidden modal-content">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="add_category_title">Add Category</h2>
                <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_category_id">Category ID</label>
                    <input type="text" id="categoryIdInput" disabled class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-60 disabled:cursor-not-allowed font-mono">
                    <p class="text-xs text-slate-500 mt-1" data-i18n="form_category_id_hint">Auto-generated</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_category_name">Category Name</label>
                    <input type="text" id="categoryNameInput" data-i18n-placeholder="category_name_placeholder" placeholder="e.g., Electronics, Clothing ..." class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700">
                <button id="modalCancelBtn" class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors"><span data-i18n="cancel_btn">Cancel</span></button>
                <button id="modalSaveBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors"><span data-i18n="save_btn">Save</span></button>
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
                <h3 class="text-lg font-semibold text-center text-gray-900 dark:text-white mb-2" data-i18n="delete_title">Delete Category</h3>
                <p class="text-center text-gray-500 dark:text-gray-400 mb-6" data-i18n="delete_confirmation_msg">Are you sure you want to delete this category? This action cannot be undone.</p>
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
        // Mock categories identical to react mock
        let categories = [
            { category_id: 'CG-2024-001', business_id: 'biz1', category_name: 'Electronics', created_by: '1', createdAt: new Date(2024, 1, 10), updatedAt: new Date() },
            { category_id: 'CG-2024-002', business_id: 'biz1', category_name: 'Clothing', created_by: '1', createdAt: new Date(2024, 2, 5), updatedAt: new Date() },
            { category_id: 'CG-2024-003', business_id: 'biz1', category_name: 'Home & Garden', created_by: '1', createdAt: new Date(2024, 3, 20), updatedAt: new Date() },
            { category_id: 'CG-2024-004', business_id: 'biz1', category_name: 'Sports', created_by: '1', createdAt: new Date(2024, 4, 15), updatedAt: new Date() },
            { category_id: 'CG-2024-005', business_id: 'biz1', category_name: 'Books', created_by: '1', createdAt: new Date(2024, 5, 1), updatedAt: new Date() }
        ];

        // Helper: generate new category ID based on current year and max sequence
        function generateCategoryId() {
            const year = new Date().getFullYear();
            const existingCodes = categories
                .map(c => {
                    const match = c.category_id.match(/CG-(\d{4})-(\d{3})/);
                    if (match && match[1] === year.toString()) return parseInt(match[2]);
                    return 0;
                })
                .filter(n => n > 0);
            const nextNum = existingCodes.length > 0 ? Math.max(...existingCodes) + 1 : 1;
            return `CG-${year}-${String(nextNum).padStart(3, '0')}`;
        }

        // global state for edit mode
        let editingCategory = null;   // holds category object if editing
        let pendingDeleteId = null;   // holds category id to delete

        // DOM elements
        const searchInput = document.getElementById('searchInput');
        const mobileContainer = document.getElementById('mobileCardContainer');
        const tableBody = document.getElementById('tableBody');
        const emptyMessageDiv = document.getElementById('emptyMessage');
        const modal = document.getElementById('categoryModal');
        const modalTitle = document.getElementById('modalTitle');
        const categoryIdInput = document.getElementById('categoryIdInput');
        const categoryNameInput = document.getElementById('categoryNameInput');
        const openAddBtn = document.getElementById('openAddCategoryBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalCancelBtn = document.getElementById('modalCancelBtn');
        const modalSaveBtn = document.getElementById('modalSaveBtn');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalTopDismiss = document.getElementById('modalTopDismiss');
        
        // Delete modal elements
        const deleteModal = document.getElementById('deleteModal');
        const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

        // Helper: format date to locale string
        function formatDate(date) {
            if (!date) return 'N/A';
            return new Date(date).toLocaleDateString();
        }

        // Filter categories based on search query
        function getFilteredCategories() {
            const query = searchInput.value.trim().toLowerCase();
            if (!query) return categories;
            return categories.filter(c => 
                c.category_name.toLowerCase().includes(query) || 
                c.category_id.toLowerCase().includes(query)
            );
        }

        // render both mobile and desktop views
        function render() {
            const filtered = getFilteredCategories();
            const hasItems = filtered.length > 0;

            // handle empty state
            if (!hasItems) {
                mobileContainer.innerHTML = '';
                tableBody.innerHTML = '';
                emptyMessageDiv.classList.remove('hidden');
                return;
            }
            emptyMessageDiv.classList.add('hidden');

            // ---------- RENDER MOBILE (Cards) ----------
            mobileContainer.innerHTML = filtered.map(cat => `
                <div class="p-4 space-y-3" data-id="${cat.category_id}">
                    <div class="flex items-center justify-between">
                        <div class="font-medium text-slate-900 dark:text-white">${escapeHtml(cat.category_name)}</div>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-mono">${cat.category_id}</span>
                    </div>
                    <div class="text-sm text-slate-500">${formatDate(cat.createdAt)}</div>
                    <div class="flex items-center gap-2 pt-2 border-t border-slate-100 dark:border-slate-700">
                        <button class="edit-mobile-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition" data-id="${cat.category_id}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg>
                        </button>
                        <button class="delete-mobile-btn p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition" data-id="${cat.category_id}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v5M14 11v5"/></svg>
                        </button>
                    </div>
                </div>
            `).join('');

            // attach mobile event listeners
            document.querySelectorAll('.edit-mobile-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = btn.getAttribute('data-id');
                    const category = categories.find(c => c.category_id === id);
                    if (category) openEditModal(category);
                });
            });
            document.querySelectorAll('.delete-mobile-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = btn.getAttribute('data-id');
                    showDeleteModal(id);
                });
            });

            // ---------- RENDER DESKTOP TABLE ----------
            tableBody.innerHTML = filtered.map(cat => `
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                    <td class="px-4 py-3 text-sm text-slate-500 font-mono">${cat.category_id}</td>
                    <td class="px-4 py-3 text-sm text-slate-900 dark:text-white font-medium">${escapeHtml(cat.category_name)}</td>
                    <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">${formatDate(cat.createdAt)}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <button class="edit-table-btn p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg" data-id="${cat.category_id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l4 4L7 21H3v-4L17 3z"/><path d="m15 5 4 4"/></svg>
                            </button>
                            <button class="delete-table-btn p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg" data-id="${cat.category_id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v5M14 11v5"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');

            // attach desktop edit/delete events
            document.querySelectorAll('.edit-table-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.getAttribute('data-id');
                    const cat = categories.find(c => c.category_id === id);
                    if (cat) openEditModal(cat);
                });
            });
            document.querySelectorAll('.delete-table-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.getAttribute('data-id');
                    showDeleteModal(id);
                });
            });
        }

        // Helper: escape html to avoid XSS
        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            }).replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, function(c) {
                return c;
            });
        }

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
                categories = categories.filter(c => c.category_id !== pendingDeleteId);
                render();
                
                // if modal open and editing category deleted, just close modal
                if (editingCategory && editingCategory.category_id === pendingDeleteId) {
                    closeModal();
                }
                
                closeDeleteModal();
            }
        }

        // Open add modal
        function openAddModal() {
            editingCategory = null;
            const newId = generateCategoryId();
            categoryIdInput.value = newId;
            categoryNameInput.value = '';
            modalTitle.innerText = 'Add Category';
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Open edit modal
        function openEditModal(category) {
            editingCategory = category;
            categoryIdInput.value = category.category_id;
            categoryNameInput.value = category.category_name;
            modalTitle.innerText = 'Edit Category';
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('hidden');
            editingCategory = null;
            document.body.style.overflow = '';
        }

        // Save category logic
        function saveCategory() {
            const name = categoryNameInput.value.trim();
            if (!name) {
                alert('Category name is required');
                return;
            }

            if (editingCategory) {
                // update existing
                categories = categories.map(c => 
                    c.category_id === editingCategory.category_id 
                    ? { ...c, category_name: name, updatedAt: new Date() }
                    : c
                );
            } else {
                // create new category
                const newId = generateCategoryId(); // regenerate to be safe
                const newCategory = {
                    category_id: newId,
                    business_id: 'biz1',
                    category_name: name,
                    created_by: '1',
                    createdAt: new Date(),
                    updatedAt: new Date(),
                };
                categories.push(newCategory);
            }
            render();
            closeModal();
        }

        // search listener
        searchInput.addEventListener('input', () => render());

        // open add button
        openAddBtn.addEventListener('click', openAddModal);
        closeModalBtn.addEventListener('click', closeModal);
        modalCancelBtn.addEventListener('click', closeModal);
        modalBackdrop.addEventListener('click', closeModal);
        if (modalTopDismiss) modalTopDismiss.addEventListener('click', closeModal);
        modalSaveBtn.addEventListener('click', saveCategory);

        // Delete modal event listeners
        cancelDeleteBtn.addEventListener('click', closeDeleteModal);
        confirmDeleteBtn.addEventListener('click', performDelete);
        deleteModalBackdrop.addEventListener('click', closeDeleteModal);
        
        // Close delete modal on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                if (!deleteModal.classList.contains('hidden')) {
                    closeDeleteModal();
                } else if (!modal.classList.contains('hidden')) {
                    closeModal();
                }
            }
        });

        // initial render
        render();

        // handle body scroll lock on modal open/close via mutation
        const observer = new MutationObserver(() => {
            if (!modal.classList.contains('hidden') || !deleteModal.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        observer.observe(modal, { attributes: true, attributeFilter: ['class'] });
        observer.observe(deleteModal, { attributes: true, attributeFilter: ['class'] });

        // Dark mode setup
        (function() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

<?php $content = ob_get_clean(); 
include '../../includes/header.php'; 
include '../../includes/sidebar.php'; 
echo '<div class="main-content min-h-screen">'; 
echo $content; 
include '../../includes/footer.php'; ?>