<?php
// ============================================
// File: modules/items/index.php
// Description: Items/Products management
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'Items | Qty Management';
ob_start();
?>

<script src="../../assets/js/translations/items/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 md:py-10">
    <div id="app" class="space-y-6">

    <div>
        <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="items_title">Items Management</h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="items_subtitle">Manage your Items, organize products, and track performance.</p>
    </div>

        <!-- Header with search, filter, and add button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="relative w-full sm:w-80">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" id="searchInput" data-i18n-placeholder="search_placeholder" placeholder="Search items by name or code..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                    <div id="filterMenu" class="absolute right-0 mt-2 w-72 bg-white dark:bg-slate-800 rounded-lg shadow-lg border border-slate-200 dark:border-slate-700 z-20 hidden">
                        <div class="p-4 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1" data-i18n="filter_status_label">Status</label>
                                <select id="filterStatus" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
                                    <option value="all" data-i18n="filter_all">All</option>
                                    <option value="active" data-i18n="filter_active">Active</option>
                                    <option value="inactive" data-i18n="filter_inactive">Inactive</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1" data-i18n="filter_category_label">Category</label>
                                <select id="filterCategory" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
                                    <option value="all" data-i18n="all_categories">All Categories</option>
                                    <option value="1">Electronics</option>
                                    <option value="2">Clothing</option>
                                    <option value="3">Home & Garden</option>
                                    <option value="4">Sports</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1" data-i18n="filter_stock_label">Stock Level</label>
                                <select id="filterStock" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm">
                                    <option value="all" data-i18n="all_stock">All</option>
                                    <option value="low" data-i18n="low_stock">Low Stock (&lt; 10)</option>
                                    <option value="out" data-i18n="out_of_stock">Out of Stock (0)</option>
                                    <option value="in" data-i18n="in_stock">In Stock (&gt; 0)</option>
                                </select>
                            </div>
                            <button id="resetFiltersBtn" class="w-full px-3 py-2 text-sm text-blue-600 dark:text-blue-400 border border-blue-300 dark:border-blue-600 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors"><span data-i18n="reset_filters_btn">Reset Filters</span></button>
                        </div>
                    </div>
                </div>
                <button id="openAddItemBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span data-i18n="add_item_btn">Add Item</span>
                </button>
            </div>
        </div>

        <!-- Items List: Mobile Card + Desktop Table -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
            <!-- Mobile Card View -->
            <div id="mobileItemList" class="md:hidden divide-y divide-slate-200 dark:divide-slate-700"></div>
            <!-- Desktop Table View -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider w-12"></th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_code">Code</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_name">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_price">Price</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_stock">Stock</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_status">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="table_header_actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="desktopItemsTableBody" class="divide-y divide-slate-200 dark:divide-slate-700"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ADD/EDIT MODAL -->
<div id="itemModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="modalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="modalDismissTop"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-2xl max-h-[90vh] overflow-hidden transform transition-all">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-10 h-1 bg-slate-300 dark:bg-slate-600 rounded-full sm:hidden"></div>
                <h2 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-white pt-2 sm:pt-0" data-i18n="add_item_title">Add Item</h2>
                <button id="closeModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto max-h-[calc(80vh-140px)]">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_item_code">Item Code <span class="text-red-500">*</span></label>
                        <input type="text" id="itemCode" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_item_name">Item Name <span class="text-red-500">*</span></label>
                        <input type="text" id="itemName" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_category">Category <span class="text-red-500">*</span></label>
                        <select id="categoryId" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="" data-i18n="select_option">Select...</option>
                            <option value="1">Electronics</option>
                            <option value="2">Clothing</option>
                            <option value="3">Home & Garden</option>
                            <option value="4">Sports</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_wholesale">Wholesaler <span class="text-red-500">*</span></label>
                        <select id="wholesaleId" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="" data-i18n="select_option">Select...</option>
                            <option value="1">ABC Wholesale</option>
                            <option value="2">XYZ Distributors</option>
                        </select>
                    </div>
                    <!-- Product Type (predefined + ability to add new) -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2" data-i18n="form_product_type">Product Type <span class="text-red-500">*</span></label>
                        <div class="flex flex-wrap gap-3 items-center">
                            <select id="productTypeSelect" class="px-4 py-2.5 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 w-full md:w-64">
                                <option value="" data-i18n="select_option">Select...</option>
                                <option value="T-shirt">T-shirt</option>
                                <option value="Pants">Pants</option>
                                <option value="Shorts">Shorts</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Home">Home & Living</option>
                            </select>
                            <div class="flex-1 flex gap-2">
                                <input type="text" id="newProductType" data-i18n-placeholder="new_product_type_placeholder" placeholder="New product type (e.g., 'Sportswear')" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                                <button id="addTypeBtn" type="button" class="bg-slate-800 dark:bg-slate-700 hover:bg-slate-900 dark:hover:bg-slate-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    <span data-i18n="add_type_btn">Add Type</span>
                                </button>
                            </div>
                        </div>
                        <p class="text-xs text-slate-400 dark:text-slate-500 mt-1" data-i18n="product_type_helper">Select an existing type or write a new one and click "Add Type".</p>
                    </div>

                    <!-- SIZES MANAGEMENT (dynamic: predefined + add new size with quantity) -->
                    <div class="border-t border-slate-200 dark:border-slate-700 pt-5 md:col-span-2">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <h3 class="text-md font-bold text-slate-800 dark:text-slate-200 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                                <span data-i18n="sizes_quantities_title">Sizes & Quantities</span>
                            </h3>
                            <div class="flex gap-2">
                                <input type="text" id="newSizeInput" data-i18n-placeholder="size_placeholder" placeholder="e.g., 2XL, 42, Large" class="px-3 py-1.5 border border-slate-300 dark:border-slate-600 rounded-lg text-sm bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 w-32">
                                <input type="number" id="newSizeQty" data-i18n-placeholder="qty_placeholder" placeholder="Qty" value="0" min="0" class="px-3 py-1.5 border border-slate-300 dark:border-slate-600 rounded-lg text-sm bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 w-24">
                                <button id="addNewSizeBtn" class="bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-700 dark:hover:bg-indigo-600 text-white px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    <span data-i18n="add_size_btn">Add Size</span>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Predefined size chips + custom sizes dynamic container -->
                        <div class="mb-3">
                            <span class="text-xs font-medium text-slate-500 dark:text-slate-400 block mb-2" data-i18n="quick_standard_sizes">Quick standard sizes:</span>
                            <div id="predefinedSizesContainer" class="flex flex-wrap gap-2">
                                <button type="button" data-size-name="XS" class="size-chip px-3 py-1.5 rounded-full text-sm font-medium border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">XS</button>
                                <button type="button" data-size-name="S" class="size-chip px-3 py-1.5 rounded-full text-sm font-medium border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">S</button>
                                <button type="button" data-size-name="M" class="size-chip px-3 py-1.5 rounded-full text-sm font-medium border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">M</button>
                                <button type="button" data-size-name="L" class="size-chip px-3 py-1.5 rounded-full text-sm font-medium border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">L</button>
                                <button type="button" data-size-name="XL" class="size-chip px-3 py-1.5 rounded-full text-sm font-medium border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">XL</button>
                                <button type="button" data-size-name="XXL" class="size-chip px-3 py-1.5 rounded-full text-sm font-medium border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">XXL</button>
                            </div>
                        </div>
                        
                        <!-- Active sizes list with quantity inputs (both predefined + custom) -->
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2" data-i18n="selected_sizes_label">Selected sizes & quantities:</label>
                            <div id="activeSizesList" class="bg-slate-50 dark:bg-slate-900/50 rounded-xl p-4 border border-slate-200 dark:border-slate-700 min-h-[100px] space-y-2">
                                <div class="text-slate-400 dark:text-slate-500 text-sm italic text-center" id="noSizePlaceholder" data-i18n="no_sizes_selected">No sizes selected. Click any size chip above or add custom.</div>
                            </div>
                        </div>
                        <p class="text-xs text-slate-400 dark:text-slate-500 mt-2">
                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span data-i18n="size_helper_text">Click on any size chip to include/exclude it. Adjust quantity for each included size.</span>
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_colors">Colors</label>
                        <input type="text" id="colors" data-i18n-placeholder="colors_placeholder" placeholder="Red, Blue, Green" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_cost_price">Cost Price</label>
                        <div class="relative">
                            <input type="number" id="costPrice" step="0.01" data-i18n-placeholder="price_placeholder" placeholder="0.00" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_selling_price">Selling Price</label>
                        <div class="relative">
                            <input type="number" id="sellingPrice" step="0.01" data-i18n-placeholder="price_placeholder" placeholder="0.00" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_stock_quantity">Stock Quantity</label>
                        <input type="number" id="stockQuantity" min="0" value="0" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800" readonly disabled>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_status">Status</label>
                        <select id="status" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800">
                            <option value="active" data-i18n="active_option">Active</option>
                            <option value="inactive" data-i18n="inactive_option">Inactive</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_item_image">Item Image</label>
                        <input type="file" id="imageUpload" accept="image/*" class="hidden">
                        <div id="imagePreviewArea" class="w-32 h-32 rounded-lg border-2 border-dashed border-slate-300 dark:border-slate-600 flex flex-col items-center justify-center cursor-pointer hover:border-blue-500 transition-colors bg-slate-50 dark:bg-slate-900">
                            <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <span class="text-xs text-slate-500" data-i18n="upload_text">Upload</span>
                        </div>
                        <div id="imageContainer" class="hidden relative w-32 h-32 mt-2">
                            <img id="previewImg" class="w-full h-full object-cover rounded-lg border shadow-sm">
                            <button id="removeImgBtn" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors shadow-md">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 p-4 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
                <button id="cancelModalBtn" class="px-4 py-2 bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-100 dark:hover:bg-slate-600 transition-colors"><span data-i18n="cancel_btn">Cancel</span></button>
                <button id="saveItemBtn" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm"><span data-i18n="save_btn">Save Item</span></button>
            </div>
        </div>
    </div>
</div>

<!-- VIEW MODAL (Details + Stock Movements) -->
<div id="viewModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="viewModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden" id="viewDismissTop"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-lg max-h-[90vh] overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span data-i18n="view_details_title">Item Details</span>
                </h2>
                <button id="closeViewModalBtn" class="p-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="viewDetailsContainer" class="p-4 overflow-y-auto max-h-[calc(90vh-80px)] space-y-6"></div>
        </div>
    </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-modal="true" role="dialog">
    <div class="fixed inset-0 bg-black/50 transition-opacity" id="deleteModalBackdrop"></div>
    <div class="fixed inset-0 flex flex-col sm:items-center sm:justify-center sm:p-4">
        <div class="flex-1 sm:hidden"></div>
        <div class="relative w-full bg-white dark:bg-slate-800 shadow-xl rounded-t-2xl sm:rounded-xl sm:max-w-md overflow-hidden transform transition-all">
            <div class="p-6">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-white mb-2" data-i18n="delete_title">Delete Item</h3>
                <p class="text-center text-slate-500 dark:text-slate-400 mb-6" data-i18n="delete_confirmation_msg">Are you sure you want to delete this item? This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button id="cancelDeleteBtn" class="flex-1 px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors"><span data-i18n="cancel_btn">Cancel</span></button>
                    <button id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm"><span data-i18n="delete_btn">Delete</span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ---------- MOCK DATA ----------
    let items = [
        { item_id: "1", business_id: "biz1", item_code: "ITM001", category_id: "1", wholesale_id: "1", item_name: "Wireless Headphones", size: [{name:"MD", quantity:150}], colors: ["Black","White"], cost_price: 45, selling_price: 89.99, status: "active", stock_quantity: 150, item_image: "", created_by: "1", createdAt: new Date(), updatedAt: new Date() },
        { item_id: "2", business_id: "biz1", item_code: "ITM002", category_id: "2", wholesale_id: "1", item_name: "Cotton T-Shirt", size: [{name:"MD", quantity:200},{name:"LG", quantity:200},{name:"XL", quantity:100}], colors: ["Blue","Red","Green"], cost_price: 12, selling_price: 29.99, status: "active", stock_quantity: 500, item_image: "", created_by: "1", createdAt: new Date(), updatedAt: new Date() },
        { item_id: "3", business_id: "biz1", item_code: "ITM003", category_id: "1", wholesale_id: "2", item_name: "Smart Watch", size: [{name:"One Size", quantity:8}], colors: ["Silver","Gold"], cost_price: 120, selling_price: 249.99, status: "active", stock_quantity: 8, item_image: "", created_by: "1", createdAt: new Date(), updatedAt: new Date() },
        { item_id: "4", business_id: "biz1", item_code: "ITM004", category_id: "3", wholesale_id: "1", item_name: "Garden Tools Set", size: [{name:"Standard", quantity:0}], colors: ["Green"], cost_price: 35, selling_price: 79.99, status: "inactive", stock_quantity: 0, item_image: "", created_by: "1", createdAt: new Date(), updatedAt: new Date() },
        { item_id: "5", business_id: "biz1", item_code: "ITM005", category_id: "4", wholesale_id: "2", item_name: "Yoga Mat", size: [{name:"6mm", quantity:200}], colors: ["Purple","Blue","Pink"], cost_price: 15, selling_price: 39.99, status: "active", stock_quantity: 200, item_image: "", created_by: "1", createdAt: new Date(), updatedAt: new Date() }
    ];
    
    // Mock stock movements
    const mockStockMovements = {
        "1": [{ id:"SM001", quantity:100, type:"in", note:"Initial stock", date: new Date("2024-01-01") },{ id:"SM002", quantity:50, type:"in", note:"Restock from supplier", date: new Date("2024-01-15") },{ id:"SM003", quantity:20, type:"out", note:"Sold - Order ORD-001", date: new Date("2024-01-20") }],
        "2": [{ id:"SM004", quantity:300, type:"in", note:"Initial stock", date: new Date("2024-01-01") },{ id:"SM005", quantity:200, type:"in", note:"Bulk order", date: new Date("2024-01-10") }],
        "3": [{ id:"SM006", quantity:20, type:"in", note:"Initial stock", date: new Date("2024-01-01") },{ id:"SM007", quantity:12, type:"out", note:"Sales", date: new Date("2024-01-25") }]
    };
    
    function getStockMovements(itemId) { return mockStockMovements[itemId] || []; }

    let currentEditId = null;
    let currentImageBase64 = "";
    let itemToDeleteId = null;
    // Store selected sizes as array of objects {name, quantity}
    let activeSizes = [];

    // DOM elements
    const searchInput = document.getElementById('searchInput');
    const mobileContainer = document.getElementById('mobileItemList');
    const desktopTbody = document.getElementById('desktopItemsTableBody');
    const modal = document.getElementById('itemModal');
    const viewModal = document.getElementById('viewModal');
    const deleteModal = document.getElementById('deleteModal');
    const openAddBtn = document.getElementById('openAddItemBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelModalBtn = document.getElementById('cancelModalBtn');
    const saveBtn = document.getElementById('saveItemBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalDismissTop = document.getElementById('modalDismissTop');
    const viewModalBackdrop = document.getElementById('viewModalBackdrop');
    const closeViewBtn = document.getElementById('closeViewModalBtn');
    const viewDismissTop = document.getElementById('viewDismissTop');
    const deleteModalBackdrop = document.getElementById('deleteModalBackdrop');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    
    // Filter elements
    const filterButton = document.getElementById('filterButton');
    const filterMenu = document.getElementById('filterMenu');
    const filterStatus = document.getElementById('filterStatus');
    const filterCategory = document.getElementById('filterCategory');
    const filterStock = document.getElementById('filterStock');
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');

    // Form fields
    const itemCodeField = document.getElementById('itemCode');
    const itemNameField = document.getElementById('itemName');
    const categoryIdField = document.getElementById('categoryId');
    const wholesaleIdField = document.getElementById('wholesaleId');
    const colorsField = document.getElementById('colors');
    const costPriceField = document.getElementById('costPrice');
    const sellingPriceField = document.getElementById('sellingPrice');
    const stockQuantityField = document.getElementById('stockQuantity');
    const statusField = document.getElementById('status');
    const imageUpload = document.getElementById('imageUpload');
    const imagePreviewArea = document.getElementById('imagePreviewArea');
    const imageContainer = document.getElementById('imageContainer');
    const previewImg = document.getElementById('previewImg');
    const removeImgBtn = document.getElementById('removeImgBtn');
    const modalTitle = document.getElementById('modalTitle');

     // New elements for dynamic sizes
    const predefinedSizesContainer = document.getElementById('predefinedSizesContainer');
    const activeSizesList = document.getElementById('activeSizesList');
    const newSizeInput = document.getElementById('newSizeInput');
    const newSizeQty = document.getElementById('newSizeQty');
    const addNewSizeBtn = document.getElementById('addNewSizeBtn');
    const productTypeSelect = document.getElementById('productTypeSelect');
    const newProductType = document.getElementById('newProductType');
    const addTypeBtn = document.getElementById('addTypeBtn');

    // Function to render active sizes list
    function renderActiveSizesList() {
        if (!activeSizesList) return;
        
        if (activeSizes.length === 0) {
            activeSizesList.innerHTML = '<div class="text-slate-400 dark:text-slate-500 text-sm italic text-center" id="noSizePlaceholder">No sizes selected. Click any size chip above or add custom.</div>';
            return;
        }
        
        activeSizesList.innerHTML = activeSizes.map((size, index) => `
            <div class="flex items-center justify-between gap-3 p-2 bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700" data-size-index="${index}">
                <div class="flex items-center gap-3 flex-1">
                    <span class="font-medium text-slate-800 dark:text-slate-200 w-20">${escapeHtml(size.name)}</span>
                    <div class="flex items-center gap-2">
                        <label class="text-xs text-slate-500 dark:text-slate-400">Qty:</label>
                        <input type="number" min="0" value="${size.quantity}" class="size-quantity-input w-20 px-2 py-1 border border-slate-300 dark:border-slate-600 rounded-lg text-sm bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100" data-size-name="${size.name}">
                    </div>
                </div>
                <button type="button" class="remove-size-row text-red-500 hover:text-red-700 p-1 rounded" data-size-name="${size.name}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `).join('');
        
        // Add event listeners to quantity inputs
        document.querySelectorAll('.size-quantity-input').forEach(input => {
            input.removeEventListener('change', handleQuantityChange);
            input.addEventListener('change', handleQuantityChange);
        });
        
        // Add event listeners to remove buttons
        document.querySelectorAll('.remove-size-row').forEach(btn => {
            btn.removeEventListener('click', handleRemoveSizeRow);
            btn.addEventListener('click', handleRemoveSizeRow);
        });
    }
    
    function handleQuantityChange(e) {
        const sizeName = e.target.getAttribute('data-size-name');
        const newQuantity = parseInt(e.target.value) || 0;
        const sizeIndex = activeSizes.findIndex(s => s.name === sizeName);
        if (sizeIndex !== -1) {
            activeSizes[sizeIndex].quantity = newQuantity;
            updateTotalStock();
        }
    }
    
    function handleRemoveSizeRow(e) {
        const sizeName = e.currentTarget.getAttribute('data-size-name');
        removeSizeFromActive(sizeName);
    }
    
    function updateTotalStock() {
        const total = activeSizes.reduce((sum, size) => sum + (size.quantity || 0), 0);
        if (stockQuantityField) stockQuantityField.value = total;
    }
    
    function addSizeToActive(sizeName, quantity = 0) {
        if (!sizeName || sizeName.trim() === '') return false;
        sizeName = sizeName.trim();
        
        if (activeSizes.some(s => s.name === sizeName)) {
            alert(`Size "${sizeName}" is already added.`);
            return false;
        }
        
        activeSizes.push({ name: sizeName, quantity: quantity });
        renderActiveSizesList();
        updateSizeChipsUI();
        updateTotalStock();
        return true;
    }
    
    function removeSizeFromActive(sizeName) {
        activeSizes = activeSizes.filter(s => s.name !== sizeName);
        renderActiveSizesList();
        updateSizeChipsUI();
        updateTotalStock();
    }
    
    function updateSizeChipsUI() {
        const allChips = document.querySelectorAll('.size-chip');
        allChips.forEach(chip => {
            const sizeName = chip.getAttribute('data-size-name');
            if (activeSizes.some(s => s.name === sizeName)) {
                chip.classList.add('bg-indigo-600', 'text-white', 'border-indigo-600');
                chip.classList.remove('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-200', 'border-slate-300', 'dark:border-slate-600', 'hover:bg-slate-100', 'dark:hover:bg-slate-700');
            } else {
                chip.classList.remove('bg-indigo-600', 'text-white', 'border-indigo-600');
                chip.classList.add('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-200', 'border-slate-300', 'dark:border-slate-600', 'hover:bg-slate-100', 'dark:hover:bg-slate-700');
            }
        });
    }
    
    function handleSizeChipClick(e) {
        const chip = e.currentTarget;
        const sizeName = chip.getAttribute('data-size-name');
        
        if (activeSizes.some(s => s.name === sizeName)) {
            removeSizeFromActive(sizeName);
        } else {
            addSizeToActive(sizeName, 0);
        }
    }

    // Helper function to generate item code
    function generateItemCode() {
        const maxNum = items.reduce((max, item) => {
            const match = item.item_code.match(/ITM(\d+)/);
            return match ? Math.max(max, parseInt(match[1])) : max;
        }, 0);
        return `ITM${String(maxNum + 1).padStart(3,'0')}`;
    }
    
    function addCustomSize() {
        const sizeName = newSizeInput.value.trim();
        const quantity = parseInt(newSizeQty.value) || 0;
        
        if (!sizeName) {
            alert('Please enter a size name (e.g., 2XL, 42, Large)');
            return;
        }
        
        if (addSizeToActive(sizeName, quantity)) {
            newSizeInput.value = '';
            newSizeQty.value = '0';
            
            let customChip = document.querySelector(`.size-chip[data-size-name="${sizeName}"]`);
            if (!customChip) {
                customChip = document.createElement('button');
                customChip.type = 'button';
                customChip.className = 'size-chip px-3 py-1.5 rounded-full text-sm font-medium border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition';
                customChip.setAttribute('data-size-name', sizeName);
                customChip.textContent = sizeName;
                customChip.addEventListener('click', handleSizeChipClick);
                predefinedSizesContainer.appendChild(customChip);
            }
        }
    }
    
    function addProductType() {
        const newType = newProductType.value.trim();
        if (!newType) {
            alert('Please enter a product type name');
            return;
        }
        
        let exists = false;
        for (let i = 0; i < productTypeSelect.options.length; i++) {
            if (productTypeSelect.options[i].value === newType) {
                exists = true;
                break;
            }
        }
        
        if (!exists) {
            const option = document.createElement('option');
            option.value = newType;
            option.textContent = newType;
            productTypeSelect.appendChild(option);
            productTypeSelect.value = newType;
            newProductType.value = '';
        } else {
            productTypeSelect.value = newType;
            newProductType.value = '';
        }
    }
    
    function loadSizesFromItem(item) {
        activeSizes = [];
        if (item.size && Array.isArray(item.size)) {
            item.size.forEach(sizeItem => {
                if (typeof sizeItem === 'object' && sizeItem.name) {
                    activeSizes.push({ name: sizeItem.name, quantity: sizeItem.quantity || 0 });
                } else if (typeof sizeItem === 'string') {
                    activeSizes.push({ name: sizeItem, quantity: 0 });
                }
            });
        }
        renderActiveSizesList();
        updateSizeChipsUI();
        updateTotalStock();
    }
    
    function getSizesForSave() {
        return activeSizes.map(s => ({ name: s.name, quantity: s.quantity }));
    }

    function formatDate(date) { 
        if (!date) return '';
        return new Date(date).toLocaleDateString('en-US', { year:'numeric', month:'short', day:'numeric' }); 
    }

    function escapeHtml(str) { 
        if(!str) return ''; 
        return String(str).replace(/[&<>]/g, function(m){
            if(m==='&') return '&amp;'; 
            if(m==='<') return '&lt;'; 
            if(m==='>') return '&gt;'; 
            return m;
        });
    }
    
    function formatSizesForDisplay(sizes) {
        if (!sizes || sizes.length === 0) return '—';
        if (Array.isArray(sizes)) {
            return sizes.map(s => typeof s === 'object' ? `${s.name} (${s.quantity})` : s).join(', ');
        }
        return '—';
    }

    function applyFilters() {
        const query = searchInput.value.toLowerCase();
        const statusFilter = filterStatus.value;
        const categoryFilter = filterCategory.value;
        const stockFilter = filterStock.value;
        
        return items.filter(item => {
            // Search filter
            const matchesSearch = item.item_name.toLowerCase().includes(query) || item.item_code.toLowerCase().includes(query);
            if (!matchesSearch) return false;
            
            // Status filter
            if (statusFilter !== 'all' && item.status !== statusFilter) return false;
            
            // Category filter
            if (categoryFilter !== 'all' && item.category_id !== categoryFilter) return false;
            
            // Stock filter
            if (stockFilter === 'low' && item.stock_quantity >= 10) return false;
            if (stockFilter === 'out' && item.stock_quantity !== 0) return false;
            if (stockFilter === 'in' && item.stock_quantity <= 0) return false;
            
            return true;
        });
    }

    function render() {
        const filtered = applyFilters();
        
        if (filtered.length === 0) {
            mobileContainer.innerHTML = `<div class="p-8 text-center text-slate-500">No items found</div>`;
            desktopTbody.innerHTML = `<tr><td colspan="7" class="px-4 py-8 text-center text-slate-500">No items found</td></tr>`;
            return;
        }
        
        // Mobile
        mobileContainer.innerHTML = filtered.map(item => `
             <div class="p-4 space-y-3 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden flex-shrink-0">
                        ${item.item_image ? `<img src="${item.item_image}" class="w-full h-full object-cover">` : `<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>`}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-slate-900 dark:text-white truncate">${escapeHtml(item.item_name)}</div>
                        <div class="text-xs text-slate-500">${item.item_code}</div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><span class="text-slate-500 text-xs block">${t('table_header_price')}</span><span class="font-medium">$${item.selling_price.toFixed(2)}</span></div>
                    <div><span class="text-slate-500 text-xs block">${t('table_header_stock')}</span><span class="font-medium ${item.stock_quantity < 10 ? 'text-red-500' : ''}">${item.stock_quantity}</span></div>
                    <div><span class="text-slate-500 text-xs block">${t('sizes_label')}</span><span class="text-xs">${formatSizesForDisplay(item.size)}</span></div>
                    <div class="col-span-2"><span class="text-slate-500 text-xs block">${t('table_header_status')}</span><span class="inline-flex mt-1 px-2 py-0.5 rounded-full text-xs ${item.status === 'active' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-300'}">${item.status === 'active' ? t('active_option') : t('inactive_option')}</span></div>
                </div>
                <div class="flex gap-2 pt-2 border-t border-slate-100 dark:border-slate-700 mt-2">
                    <button data-id="${item.item_id}" data-action="view" class="action-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="${t('view_details_title')}"><svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                    <button data-id="${item.item_id}" data-action="edit" class="action-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="${t('edit_item_title')}"><svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                    <button data-id="${item.item_id}" data-action="delete" class="action-btn p-2 hover:bg-red-100 dark:hover:bg-red-900/30 rounded-lg transition-colors" title="${t('delete_title')}"><svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                </div>
            </div>
        `).join('');
        
        // Desktop
        desktopTbody.innerHTML = filtered.map(item => `
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <td class="px-4 py-3">
                    <div class="w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden">
                        ${item.item_image ? `<img src="${item.item_image}" class="w-full h-full object-cover">` : `<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>`}
                    </div>
                </td>
                <td class="px-4 py-3 text-sm font-mono text-slate-600 dark:text-slate-400">${item.item_code}</td>
                <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-white">${escapeHtml(item.item_name)}</td>
                <td class="px-4 py-3 text-sm">$${item.selling_price.toFixed(2)}</td>
                <td class="px-4 py-3 text-sm ${item.stock_quantity < 10 ? 'text-red-500 font-semibold' : 'text-slate-700 dark:text-slate-300'}">${item.stock_quantity}</td>
                <td class="px-4 py-3">
                    <span class="inline-flex px-2 py-0.5 rounded-full text-xs ${item.status === 'active' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-300'}">
                        ${item.status === 'active' ? t('active_option') : t('inactive_option')}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex gap-2">
                        <button data-id="${item.item_id}" data-action="view" class="action-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="${t('view_details_title')}">
                            <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                        <button data-id="${item.item_id}" data-action="edit" class="action-btn p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="${t('edit_item_title')}">
                            <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <button data-id="${item.item_id}" data-action="delete" class="action-btn p-2 hover:bg-red-100 dark:hover:bg-red-900/30 rounded-lg transition-colors" title="${t('delete_title')}">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </td>
              </tr>
        `).join('');
        attachActionEvents();
    }

    function attachActionEvents() {
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.removeEventListener('click', handleAction);
            btn.addEventListener('click', handleAction);
        });
    }
    
    function handleAction(e) {
        const btn = e.currentTarget;
        const id = btn.getAttribute('data-id');
        const action = btn.getAttribute('data-action');
        if (action === 'view') { 
            const item = items.find(i => i.item_id === id); 
            if(item) showViewModal(item); 
        } else if (action === 'edit') { 
            const item = items.find(i => i.item_id === id); 
            if(item) openEditModal(item); 
        } else if (action === 'delete') { 
            itemToDeleteId = id;
            openDeleteModal();
        }
    }
    
    function openDeleteModal() {
        deleteModal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }
    
    function closeDeleteModal() {
        deleteModal.classList.add('hidden');
        document.body.classList.remove('modal-open');
        itemToDeleteId = null;
    }
    
    function confirmDelete() {
        if (itemToDeleteId) {
            items = items.filter(i => i.item_id !== itemToDeleteId);
            render();
            closeDeleteModal();
        }
    }

    function showViewModal(item) {
        const movements = getStockMovements(item.item_id);
        const colorsHtml = item.colors && item.colors.length ? item.colors.map(c => `<span class="inline-flex px-2 py-0.5 rounded-full text-xs bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">${escapeHtml(c)}</span>`).join('') : '<span class="text-slate-500 text-sm">—</span>';
        const sizesHtml = item.size && item.size.length ? item.size.map(s => {
            if(typeof s === 'object') {
                return `<span class="inline-flex px-2 py-0.5 rounded-full text-xs bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">${escapeHtml(s.name)} (${s.quantity})</span>`;
            }
            return `<span class="inline-flex px-2 py-0.5 rounded-full text-xs bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">${escapeHtml(s)}</span>`;
        }).join('') : '<span class="text-slate-500 text-sm">—</span>';
        const movementsHtml = movements.length === 0 ? `<p class="text-sm text-slate-500 text-center py-4">${t('no_stock_movements')}</p>` : movements.map(m => `
            <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-700/50 rounded-lg">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center ${m.type === 'in' ? 'bg-emerald-100 dark:bg-emerald-900/30' : 'bg-red-100 dark:bg-red-900/30'}">
                        ${m.type === 'in' ? 
                            '<svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>' : 
                            '<svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>'
                        }
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-900 dark:text-white">${escapeHtml(m.note)}</p>
                        <p class="text-xs text-slate-500">${formatDate(m.date)}</p>
                    </div>
                </div>
                <span class="font-semibold ${m.type === 'in' ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400'}">${m.type === 'in' ? '+' : '-'}${m.quantity}</span>
            </div>
        `).join('');
        
        const detailsHtml = `
            <div class="w-full h-48 rounded-lg bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden">
                ${item.item_image ? `<img src="${item.item_image}" class="w-full h-full object-cover">` : `<svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>`}
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1"><p class="text-sm text-slate-500">${t('item_code_label')}</p><p class="font-medium font-mono text-slate-900 dark:text-white">${item.item_code}</p></div>
                <div class="col-span-2 sm:col-span-1"><p class="text-sm text-slate-500">${t('item_name_label')}</p><p class="font-medium text-slate-900 dark:text-white">${escapeHtml(item.item_name)}</p></div>
                <div><p class="text-sm text-slate-500">${t('cost_price_label')}</p><p class="font-medium text-slate-900 dark:text-white">$${item.cost_price.toFixed(2)}</p></div>
                <div><p class="text-sm text-slate-500">${t('selling_price_label')}</p><p class="font-medium text-slate-900 dark:text-white">$${item.selling_price.toFixed(2)}</p></div>
                <div><p class="text-sm text-slate-500">${t('stock_quantity_label')}</p><p class="font-medium ${item.stock_quantity < 10 ? 'text-red-500' : 'text-slate-900 dark:text-white'}">${item.stock_quantity}</p></div>
                <div><p class="text-sm text-slate-500">${t('status_label')}</p><span class="inline-flex px-2 py-0.5 rounded-full text-xs ${item.status === 'active' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-300'}">${item.status === 'active' ? t('active_option') : t('inactive_option')}</span></div>
                <div class="col-span-2"><p class="text-sm text-slate-500 mb-1">${t('colors_label')}</p><div class="flex flex-wrap gap-2">${colorsHtml}</div></div>
                <div class="col-span-2"><p class="text-sm text-slate-500 mb-1">${t('sizes_label')}</p><div class="flex flex-wrap gap-2">${sizesHtml}</div></div>
                ${item.category_id ? `<div><p class="text-sm text-slate-500">${t('category_id_label')}</p><p class="text-slate-900 dark:text-white">${item.category_id}</p></div>` : ''}
                ${item.wholesale_id ? `<div><p class="text-sm text-slate-500">${t('wholesale_id_label')}</p><p class="text-slate-900 dark:text-white">${item.wholesale_id}</p></div>` : ''}
            </div>
            <div class="border-t border-slate-200 dark:border-slate-700 pt-4">
                <div class="flex items-center gap-2 mb-3">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="font-semibold text-slate-900 dark:text-white">${t('stock_movement_history')}</h3>
                </div>
                <div class="space-y-2">${movementsHtml}</div>
            </div>
        `;
        document.getElementById('viewDetailsContainer').innerHTML = detailsHtml;
        viewModal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }

    function openEditModal(item) {
        currentEditId = item.item_id;
        modalTitle.innerText = 'Edit Item';
        itemCodeField.value = item.item_code;
        itemNameField.value = item.item_name;
        categoryIdField.value = item.category_id || '';
        wholesaleIdField.value = item.wholesale_id || '';
        // Load sizes into activeSizes
        loadSizesFromItem(item);
        colorsField.value = item.colors ? item.colors.join(', ') : '';
        costPriceField.value = item.cost_price;
        sellingPriceField.value = item.selling_price;
        statusField.value = item.status;
        currentImageBase64 = item.item_image || '';
        updateImageUI();
        modal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }

    function openAddModal() {
        currentEditId = null;
        modalTitle.innerText = 'Add Item';
        itemCodeField.value = generateItemCode();
        itemNameField.value = '';
        categoryIdField.value = '';
        wholesaleIdField.value = '';
        // Clear sizes
        activeSizes = [];
        renderActiveSizesList();
        updateSizeChipsUI();
        colorsField.value = '';
        costPriceField.value = '';
        sellingPriceField.value = '';
        stockQuantityField.value = '0';
        statusField.value = 'active';
        currentImageBase64 = '';
        updateImageUI();
        modal.classList.remove('hidden');
        document.body.classList.add('modal-open');
    }

    function updateImageUI() {
        if (currentImageBase64) {
            imagePreviewArea.classList.add('hidden');
            imageContainer.classList.remove('hidden');
            previewImg.src = currentImageBase64;
        } else {
            imagePreviewArea.classList.remove('hidden');
            imageContainer.classList.add('hidden');
            previewImg.src = '';
        }
    }

    function handleImageUpload(file) {
        if (!file) return;
        if (!file.type.startsWith('image/')) {
            alert('Please upload a valid image file.');
            return;
        }
        const reader = new FileReader();
        reader.onloadend = () => { currentImageBase64 = reader.result; updateImageUI(); };
        reader.readAsDataURL(file);
    }

    function saveItem() {
        const name = itemNameField.value.trim();
        if (!name) { alert("Item name is required"); return; }
        
        // Get item code: if editing, keep existing; if adding, use generated value which should already be set
        let itemCode = itemCodeField.value.trim();
        if (!currentEditId && !itemCode) {
            itemCode = generateItemCode();
        }
        
        // Calculate total stock from sizes
        const totalStock = activeSizes.reduce((sum, size) => sum + (size.quantity || 0), 0);
        
        const common = {
            item_code: itemCode,
            item_name: name,
            category_id: categoryIdField.value || null,
            wholesale_id: wholesaleIdField.value || null,
            size: getSizesForSave(), // Store as array of objects
            colors: colorsField.value ? colorsField.value.split(',').map(c=>c.trim()).filter(Boolean) : [],
            cost_price: parseFloat(costPriceField.value) || 0,
            selling_price: parseFloat(sellingPriceField.value) || 0,
            stock_quantity: totalStock,
            status: statusField.value,
            item_image: currentImageBase64 || null,
            updatedAt: new Date()
        };
        
        if (currentEditId) {
            items = items.map(i => i.item_id === currentEditId ? { ...i, ...common, updatedAt: new Date() } : i);
        } else {
            const newId = Date.now().toString();
            const newItem = { 
                item_id: newId, 
                business_id: 'biz1', 
                ...common, 
                created_by: '1', 
                createdAt: new Date(), 
                updatedAt: new Date() 
            };
            items.push(newItem);
        }
        closeModal();
        render();
    }

    function closeModal() { modal.classList.add('hidden'); document.body.classList.remove('modal-open'); }
    function closeViewModalFunc() { viewModal.classList.add('hidden'); document.body.classList.remove('modal-open'); }

    // Filter dropdown toggle
    filterButton.addEventListener('click', (e) => {
        e.stopPropagation();
        filterMenu.classList.toggle('hidden');
    });
    
    // Close filter dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!filterButton.contains(e.target) && !filterMenu.contains(e.target)) {
            filterMenu.classList.add('hidden');
        }
    });
    
    // Apply filters on change
    filterStatus.addEventListener('change', () => render());
    filterCategory.addEventListener('change', () => render());
    filterStock.addEventListener('change', () => render());
    
    // Reset filters
    resetFiltersBtn.addEventListener('click', () => {
        filterStatus.value = 'all';
        filterCategory.value = 'all';
        filterStock.value = 'all';
        searchInput.value = '';
        render();
    });

    // Event listeners
    openAddBtn.addEventListener('click', openAddModal);
    closeModalBtn.addEventListener('click', closeModal);
    cancelModalBtn.addEventListener('click', closeModal);
    modalBackdrop.addEventListener('click', closeModal);
    modalDismissTop.addEventListener('click', closeModal);
    saveBtn.addEventListener('click', saveItem);
    closeViewBtn.addEventListener('click', closeViewModalFunc);
    viewModalBackdrop.addEventListener('click', closeViewModalFunc);
    viewDismissTop.addEventListener('click', closeViewModalFunc);
    searchInput.addEventListener('input', () => render());
    
    // Delete modal events
    deleteModalBackdrop.addEventListener('click', closeDeleteModal);
    cancelDeleteBtn.addEventListener('click', closeDeleteModal);
    confirmDeleteBtn.addEventListener('click', confirmDelete);
    
    // Image upload events
    imagePreviewArea.addEventListener('click', () => imageUpload.click());
    imageUpload.addEventListener('change', (e) => { if(e.target.files[0]) handleImageUpload(e.target.files[0]); });
    removeImgBtn.addEventListener('click', () => { currentImageBase64 = ''; updateImageUI(); if(imageUpload) imageUpload.value = ''; });
    
    // Size management events
    if (addNewSizeBtn) addNewSizeBtn.addEventListener('click', addCustomSize);
    if (addTypeBtn) addTypeBtn.addEventListener('click', addProductType);
    
    // Initialize size chips click handlers
    document.querySelectorAll('.size-chip').forEach(chip => {
        chip.removeEventListener('click', handleSizeChipClick);
        chip.addEventListener('click', handleSizeChipClick);
    });
    
    // Escape key handler
    window.addEventListener('keydown', (e) => { 
        if(e.key === 'Escape') { 
            if(!modal.classList.contains('hidden')) closeModal(); 
            if(!viewModal.classList.contains('hidden')) closeViewModalFunc();
            if(!deleteModal.classList.contains('hidden')) closeDeleteModal();
        } 
    });
    
    // Initial render
    render();
</script>

<?php
$content = ob_get_clean();
include '../../includes/header.php';
include '../../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../../includes/footer.php';
?>