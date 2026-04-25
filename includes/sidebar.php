<?php
// ============================================
// File: includes/sidebar.php
// Description: Modern navigation sidebar with dark/light mode support
// ============================================

// Get language from cookie (will be used by JS translations)
$lang = isset($_COOKIE['user_lang']) ? $_COOKIE['user_lang'] : 'en';

// Define nav groups with data-i18n attributes instead of hardcoded text
$navGroups = [
    'sidebar.main' => [
        ['href'=>'/dashboard/dashboard/index.php',        'icon'=>'dashboard',          'i18n'=>'sidebar.dashboard'],
        ['href'=>'/dashboard/modules/orders/index.php',   'icon'=>'shopping_cart',      'i18n'=>'sidebar.orders'],
        ['href'=>'/dashboard/modules/customer/index.php', 'icon'=>'people',             'i18n'=>'sidebar.customers'],
    ],
    'sidebar.operations' => [
        ['href'=>'/dashboard/modules/payments/index.php', 'icon'=>'payments',           'i18n'=>'sidebar.payments'],
        ['href'=>'/dashboard/modules/returns/index.php',  'icon'=>'assignment_return',  'i18n'=>'sidebar.returns'],
        ['href'=>'/dashboard/modules/damages/index.php',  'icon'=>'report_problem',     'i18n'=>'sidebar.damages'],
    ],
    'sidebar.management' => [
        ['href'=>'/dashboard/modules/items/index.php',        'icon'=>'inventory_2',        'i18n'=>'sidebar.items'],
        ['href'=>'/dashboard/modules/categories/index.php',   'icon'=>'category',           'i18n'=>'sidebar.categories'],
        ['href'=>'/dashboard/modules/wholesalers/index.php',  'icon'=>'store',              'i18n'=>'sidebar.wholesalers'],
        ['href'=>'/dashboard/modules/couriers/index.php',     'icon'=>'local_shipping',     'i18n'=>'sidebar.couriers'],
        ['href'=>'/dashboard/modules/businesses/index.php',   'icon'=>'business',           'i18n'=>'sidebar.businesses'],
        ['href'=>'/dashboard/modules/users/index.php',        'icon'=>'admin_panel_settings','i18n'=>'sidebar.users'],
        // ['href'=>'../modules/users/index.php',        'icon'=>'admin_panel_settings','i18n'=>'sidebar.users'],
    ],
];

$currentPath = $_SERVER['REQUEST_URI'] ?? '';
?>

<aside id="sidebar" class="sidebar">
    <style>
        /* Sidebar Light/Dark Mode Variables */
        .sidebar {
            --sidebar-bg-light: linear-gradient(170deg, #f8fafc 0%, #e2e8f0 60%, #cbd5e1 100%);
            --sidebar-bg-dark: linear-gradient(170deg, #0f172a 0%, #1e293b 60%, #0f172a 100%);
            --sidebar-text-light: #1e293b;
            --sidebar-text-dark: rgba(255,255,255,.7);
            --sidebar-text-hover-light: #0f172a;
            --sidebar-text-hover-dark: #fff;
            --sidebar-bg-hover-light: rgba(0,0,0,.06);
            --sidebar-bg-hover-dark: rgba(255,255,255,.12);
            --sidebar-active-light: rgba(99,102,241,.12);
            --sidebar-active-dark: rgba(255,255,255,.18);
            --sidebar-border-light: rgba(0,0,0,.08);
            --sidebar-border-dark: rgba(255,255,255,.08);
            --sidebar-label-light: #64748b;
            --sidebar-label-dark: rgba(255,255,255,.35);
            --sidebar-logo-bg-light: rgba(99,102,241,.1);
            --sidebar-logo-bg-dark: rgba(255,255,255,.15);
            --sidebar-close-btn-light: rgba(0,0,0,.1);
            --sidebar-close-btn-dark: rgba(255,255,255,.1);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-w);
            background: var(--sidebar-bg-light);
            z-index: 40;
            transition: transform .3s cubic-bezier(.4,0,.2,1), background .3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        /* Dark mode sidebar */
        html.dark .sidebar {
            background: var(--sidebar-bg-dark);
        }

        /* Sidebar scrollbar - Light mode */
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(0,0,0,.15); border-radius: 99px; }
        
        /* Sidebar scrollbar - Dark mode */
        html.dark .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); }

        /* Sidebar item */
        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 10px;
            margin: 2px 12px;
            color: var(--sidebar-text-light);
            font-size: 14px;
            font-weight: 500;
            transition: background .18s ease, color .18s ease, transform .18s ease;
            cursor: pointer;
            text-decoration: none;
        }
        
        html.dark .sidebar-item {
            color: var(--sidebar-text-dark);
        }
        
        .sidebar-item:hover {
            background: var(--sidebar-bg-hover-light);
            color: var(--sidebar-text-hover-light);
            transform: translateX(3px);
        }
        
        html.dark .sidebar-item:hover {
            background: var(--sidebar-bg-hover-dark);
            color: var(--sidebar-text-hover-dark);
        }
        
        .sidebar-item.active {
            background: var(--sidebar-active-light);
            color: #4f46e5;
            font-weight: 600;
        }
        
        html.dark .sidebar-item.active {
            background: var(--sidebar-active-dark);
            color: #fff;
        }
        
        .sidebar-item .mi {
            font-size: 20px;
        }

        /* Section label */
        .sidebar-section-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--sidebar-label-light);
            padding: 16px 28px 6px;
        }
        
        html.dark .sidebar-section-label {
            color: var(--sidebar-label-dark);
        }

        /* Logo area */
        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 24px 16px;
            border-bottom: 1px solid var(--sidebar-border-light);
            position: sticky;
            top: 0;
            background: inherit;
            z-index: 10;
        }
        
        .sidebar-logo::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            z-index: -1;
        }

        html.dark .sidebar-logo {
            border-bottom-color: var(--sidebar-border-dark);
        }
        
        .sidebar-logo-text {
            font-size: 15px;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            color: #0f172a;
        }
        
        html.dark .sidebar-logo-text {
            color: #fff;
        }
        
        .sidebar-logo-sub {
            font-size: 11px;
            margin: 0;
            color: #64748b;
        }
        
        html.dark .sidebar-logo-sub {
            color: rgba(255,255,255,.45);
        }
        
        .sidebar-logo-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--sidebar-logo-bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        html.dark .sidebar-logo-icon {
            background: var(--sidebar-logo-bg-dark);
        }
        
        .sidebar-logo-icon span {
            font-size: 20px;
            color: #4f46e5;
        }
        
        html.dark .sidebar-logo-icon span {
            color: #fff;
        }
        
        /* Close button */
        .sidebar-close-btn {
            margin-left: auto;
            background: var(--sidebar-close-btn-light);
            border: none;
            border-radius: 8px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #64748b;
            transition: all .2s;
        }
        
        html.dark .sidebar-close-btn {
            background: var(--sidebar-close-btn-dark);
            color: rgba(255,255,255,.7);
        }
        
        .sidebar-close-btn:hover {
            background: rgba(239,68,68,.2);
            color: #ef4444;
        }
        
        /* Logout button */
        .sidebar-logout {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 10px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: background .18s, color .18s;
        }
        
        html.dark .sidebar-logout {
            color: rgba(255,255,255,.55);
        }
        
        .sidebar-logout:hover {
            background: rgba(239,68,68,.1);
            color: #ef4444;
        }
        
        html.dark .sidebar-logout:hover {
            background: rgba(239,68,68,.2);
            color: #fca5a5;
        }
        
        
        html.dark .sidebar-bottom {
            border-top-color: var(--sidebar-border-dark);
        }

        /* Bottom section - STICKY BOTTOM */
        .sidebar-bottom {
            padding: 0 12px 12px;
            margin-top: auto;
            border-top: 1px solid var(--sidebar-border-light);
            padding-top: 16px;
            
            /* Sticky positioning */
            position: sticky;
            bottom: 0;
            background: inherit;
            z-index: 10;
        }
        
        /* Ensure gradient background continues under sticky bottom */
        .sidebar-bottom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            z-index: -1;
        }
        
        html.dark .sidebar-bottom {
            border-top-color: var(--sidebar-border-dark);
        }
        
        /* Scrollable nav area fills remaining space */
        .sidebar-nav-wrapper {
            flex: 1;
        }
    </style>

    <!-- ── Logo ── -->
    <div class="sidebar-logo">
        <div class="sidebar-logo-icon">
            <span class="material-icons-round">inventory</span>
        </div>
        <div>
            <p class="sidebar-logo-text">QtyManager</p>
            <p class="sidebar-logo-sub">Inventory System</p>
        </div>
        <!-- Close button (mobile only) -->
        <button onclick="closeSidebar()" class="sidebar-close-btn md:hidden">
            <span class="material-icons-round" style="font-size:18px;">close</span>
        </button>
    </div>

    <!-- ── Navigation ── -->
    <nav style="padding: 8px 0 24px;">
        <?php foreach ($navGroups as $groupI18n => $items): ?>
            <div class="sidebar-section-label" data-i18n="<?php echo htmlspecialchars($groupI18n); ?>">
                <?php echo htmlspecialchars($groupI18n); ?>
            </div>

            <?php foreach ($items as $item): ?>
                <?php 
                $isActive = strpos($currentPath, basename(dirname($item['href']))) !== false;
                ?>
                <a href="<?php echo htmlspecialchars($item['href']); ?>"
                   class="sidebar-item <?php echo $isActive ? 'active' : ''; ?>">
                    <span class="material-icons-round mi"><?php echo htmlspecialchars($item['icon']); ?></span>
                    <span data-i18n="<?php echo htmlspecialchars($item['i18n']); ?>">
                        <?php echo htmlspecialchars($item['i18n']); ?>
                    </span>
                </a>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </nav>

    <!-- ── Bottom logout ── -->
    <div class="sidebar-bottom">
        <a href="/dashboard/auth/logout.php" class="sidebar-logout">
            <span class="material-icons-round" style="font-size:20px;">logout</span>
            <span data-i18n="sidebar.logout">sidebar.logout</span>
        </a>
    </div>

</aside>

