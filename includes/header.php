<?php
// ============================================
// File: includes/header.php
// Description: Modern global header - search, language, dark mode, profile
// ============================================

$lang = isset($_COOKIE['user_lang']) ? $_COOKIE['user_lang'] : 'en';
$userName  = $_SESSION['user_name']  ?? 'Admin User';
$userEmail = $_SESSION['user_email'] ?? 'admin@example.com';
$userRole  = $_SESSION['user_role']  ?? 'admin';
$userInitials = strtoupper(implode('', array_map(fn($w) => $w[0], array_slice(explode(' ', $userName), 0, 2))));
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo htmlspecialchars($pageTitle ?? 'Qty Management'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="../assets/js/translations.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: {
                            50:  '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    },
                    boxShadow: {
                        'header': '0 1px 3px 0 rgba(0,0,0,0.08), 0 1px 2px -1px rgba(0,0,0,0.04)',
                        'dropdown': '0 10px 40px -5px rgba(0,0,0,0.12), 0 4px 16px -4px rgba(0,0,0,0.06)',
                    }
                }
            }
        }
    </script>
    <style>
        /* ── Base ── */
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; }

        /* ── Sidebar layout ── */
        :root { --sidebar-w: 260px; --header-h: 64px; }

        .sidebar {
            position: fixed; top: 0; left: 0; bottom: 0;
            width: var(--sidebar-w);
            background: linear-gradient(170deg, #1e1b4b 0%, #312e81 60%, #3730a3 100%);
            z-index: 40;
            transition: transform .3s cubic-bezier(.4,0,.2,1);
            overflow-y: auto; overflow-x: hidden;
        }
        .main-content { margin-left: var(--sidebar-w); padding-top: var(--header-h); }

        /* ── Sidebar scrollbar ── */
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 99px; }

        /* ── Sidebar item ── */
        .sidebar-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 16px; border-radius: 10px; margin: 2px 12px;
            color: rgba(255,255,255,.7);
            font-size: 14px; font-weight: 500;
            transition: background .18s ease, color .18s ease, transform .18s ease;
            cursor: pointer; text-decoration: none;
        }
        .sidebar-item:hover { background: rgba(255,255,255,.12); color: #fff; transform: translateX(3px); }
        .sidebar-item.active { background: rgba(255,255,255,.18); color: #fff; }
        .sidebar-item .mi { font-size: 20px; }

        .sidebar-section-label {
            font-size: 10px; font-weight: 600; letter-spacing: .08em;
            text-transform: uppercase; color: rgba(255,255,255,.35);
            padding: 16px 28px 6px;
        }

        /* ── Logo area ── */
        .sidebar-logo {
            display: flex; align-items: center; gap: 12px;
            padding: 20px 24px 16px;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        /* ── Header ── */
        .top-header {
            position: fixed; top: 0; right: 0; left: var(--sidebar-w);
            height: var(--header-h); z-index: 30;
            background: rgba(255,255,255,.95);
            backdrop-filter: blur(12px) saturate(1.5);
            border-bottom: 1px solid rgba(0,0,0,.06);
            box-shadow: 0 1px 3px rgba(0,0,0,.05);
            display: flex; align-items: center;
            padding: 0 20px;
            gap: 12px;
            transition: background .3s, border-color .3s, left .3s;
        }
        .dark .top-header {
            background: rgba(15,14,35,.92);
            border-bottom-color: rgba(255,255,255,.06);
        }

        /* ── Search ── */
        .search-wrap { position: relative; flex: 1; max-width: 480px; }
        .search-input {
            width: 100%; height: 38px;
            padding: 0 12px 0 40px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px; font-family: 'Inter', sans-serif;
            background: #f9fafb; color: #111827;
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .search-input:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,.12); background: #fff; }
        .search-input::placeholder { color: #9ca3af; }
        .dark .search-input { background: rgba(255,255,255,.06); border-color: rgba(255,255,255,.1); color: #f1f5f9; }
        .dark .search-input::placeholder { color: rgba(255,255,255,.3); }
        .dark .search-input:focus { border-color: #818cf8; background: rgba(255,255,255,.1); }
        .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 18px; }

        /* ── Search dropdown ── */
        .search-dropdown {
            position: absolute; top: calc(100% + 8px); left: 0; right: 0;
            background: #fff; border-radius: 14px;
            border: 1px solid rgba(0,0,0,.08);
            box-shadow: 0 20px 40px -8px rgba(0,0,0,.14);
            max-height: 380px; overflow-y: auto;
            display: none; z-index: 60;
        }
        .dark .search-dropdown { background: #1e1b4b; border-color: rgba(255,255,255,.1); }
        .search-dropdown.open { display: block; animation: fadeSlide .15s ease; }
        .search-result-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 16px; cursor: pointer;
            transition: background .15s;
        }
        .search-result-item:hover { background: #f5f3ff; }
        .dark .search-result-item:hover { background: rgba(255,255,255,.06); }
        .search-result-icon {
            width: 34px; height: 34px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            background: #ede9fe; flex-shrink: 0;
        }
        .search-result-icon .mi { font-size: 18px; color: #7c3aed; }

        /* ── Generic dropdown ── */
        .hdr-dropdown {
            position: absolute; top: calc(100% + 10px); right: 0;
            background: #fff; border-radius: 14px;
            border: 1px solid rgba(0,0,0,.07);
            box-shadow: 0 20px 40px -8px rgba(0,0,0,.14);
            display: none; z-index: 60; overflow: hidden;
            min-width: 180px;
        }
        .dark .hdr-dropdown { background: #1e1b4b; border-color: rgba(255,255,255,.1); }
        .hdr-dropdown.open { display: block; animation: fadeSlide .15s ease; }
        .hdr-dropdown-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 16px; cursor: pointer; width: 100%;
            font-size: 14px; color: #374151; text-decoration: none;
            transition: background .15s; white-space: nowrap; background: transparent; border: none;
        }
        .hdr-dropdown-item:hover { background: #f5f3ff; }
        .dark .hdr-dropdown-item { color: #e5e7eb; }
        .dark .hdr-dropdown-item:hover { background: rgba(255,255,255,.07); }
        .hdr-dropdown-item .mi { font-size: 18px; color: #6b7280; }
        .dark .hdr-dropdown-item .mi { color: #9ca3af; }

        /* ── Icon button ── */
        .hdr-icon-btn {
            width: 38px; height: 38px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 10px; cursor: pointer;
            border: none; background: transparent;
            color: #6b7280; position: relative;
            transition: background .15s, color .15s;
        }
        .hdr-icon-btn:hover { background: #f3f4f6; color: #111827; }
        .dark .hdr-icon-btn { color: #9ca3af; }
        .dark .hdr-icon-btn:hover { background: rgba(255,255,255,.08); color: #f1f5f9; }
        .hdr-icon-btn .mi { font-size: 20px; }

        /* ── Notification badge ── */
        .notif-badge {
            position: absolute; top: 4px; right: 4px;
            width: 8px; height: 8px; border-radius: 50%;
            background: #ef4444; border: 2px solid #fff;
        }
        .dark .notif-badge { border-color: #0f0e23; }

        /* ── Avatar ── */
        .avatar {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 13px; font-weight: 600;
            flex-shrink: 0; cursor: pointer;
            border: 2px solid transparent;
            transition: border-color .2s;
        }
        .avatar:hover, .avatar.active { border-color: #818cf8; }

        /* ── Profile dropdown (wider) ── */
        .profile-dropdown { width: 280px; }
        .profile-header {
            display: flex; align-items: center; gap: 12px;
            padding: 16px; border-bottom: 1px solid rgba(0,0,0,.06);
        }
        .dark .profile-header { border-bottom-color: rgba(255,255,255,.07); }
        .profile-avatar-lg {
            width: 44px; height: 44px; border-radius: 12px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 16px; font-weight: 600; flex-shrink: 0;
        }
        .role-badge {
            display: inline-block; padding: 2px 8px; border-radius: 6px; font-size: 11px; font-weight: 600;
        }
        .role-badge.admin { background: #ede9fe; color: #6d28d9; }
        .role-badge.staff { background: #dbeafe; color: #1e40af; }
        .dark .role-badge.admin { background: rgba(109,40,217,.25); color: #a78bfa; }
        .dark .role-badge.staff  { background: rgba(30,64,175,.25); color: #93c5fd; }

        /* ── Notification item ── */
        .notif-item {
            display: flex; align-items: flex-start; gap: 10px;
            padding: 12px 16px; cursor: pointer;
            transition: background .15s; border-bottom: 1px solid rgba(0,0,0,.04);
        }
        .notif-item:last-child { border-bottom: none; }
        .notif-item:hover { background: #f5f3ff; }
        .dark .notif-item { border-bottom-color: rgba(255,255,255,.04); }
        .dark .notif-item:hover { background: rgba(255,255,255,.05); }
        .notif-dot { width: 8px; height: 8px; border-radius: 50%; background: #6366f1; margin-top: 5px; flex-shrink: 0; }

        /* ── Lang / Theme ── */
        .lang-dropdown, .theme-dropdown { width: 180px; }

        /* ── Mobile responsive fixes ── */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(calc(-1 * var(--sidebar-w))); }
            .sidebar.open { transform: translateX(0); box-shadow: 8px 0 32px rgba(0,0,0,.3); }
            .top-header { left: 0; padding: 0 12px; gap: 8px; }
            .main-content { margin-left: 0; }
            .search-wrap { max-width: none; flex: 1; }
            .hdr-icon-btn { width: 34px; height: 34px; }
            .hdr-icon-btn .mi { font-size: 18px; }
            .avatar { width: 32px; height: 32px; font-size: 12px; }
            .profile-dropdown { position: fixed; right: 12px; width: calc(100% - 24px); max-width: 320px; }
            .hdr-dropdown { position: fixed; right: 12px; left: auto; min-width: 200px; }
            .lang-dropdown, .theme-dropdown { position: fixed; right: 12px; left: auto; }
        }

        /* Extra small devices */
        @media (max-width: 480px) {
            .top-header { padding: 0 8px; gap: 6px; }
            .search-input { font-size: 13px; height: 34px; padding-left: 36px; }
            .search-icon { font-size: 16px; left: 10px; }
            .hdr-icon-btn { width: 32px; height: 32px; }
            .hdr-icon-btn .mi { font-size: 18px; }
            .avatar { width: 30px; height: 30px; font-size: 11px; }
        }

        /* ── Overlay ── */
        #sidebarOverlay {
            position: fixed; inset: 0; background: rgba(0,0,0,.45);
            z-index: 39; display: none; backdrop-filter: blur(2px);
        }
        #sidebarOverlay.active { display: block; }

        /* ── Animation ── */
        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Dark body ── */
        .dark body, html.dark { background: #0d0c1f; color: #e5e7eb; }
        .dark .bg-white { background: #131228 !important; }
        .dark .text-gray-800 { color: #e5e7eb !important; }

        /* ── Divider ── */
        .dd-divider { height: 1px; background: rgba(0,0,0,.06); margin: 4px 0; }
        .dark .dd-divider { background: rgba(255,255,255,.07); }

        /* Additional theme transition styles */
        .sidebar,
        .sidebar-item,
        .sidebar-section-label,
        .sidebar-logo,
        .sidebar-logout,
        .sidebar-close-btn {
            transition: background .3s ease, color .3s ease, border-color .3s ease, transform .18s ease;
        }

        /* Optional: Add a subtle gradient overlay for better readability in dark mode */
        html.dark .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at top right, rgba(99,102,241,.1), transparent);
            pointer-events: none;
        }

        /* Improve active state in light mode */
        .sidebar-item.active .mi {
            color: #4f46e5;
        }

        html.dark .sidebar-item.active .mi {
            color: #a78bfa;
        }

        /* Hover effect for better UX */
        .sidebar-item:active {
            transform: translateX(5px);
        }

        /* Prevent body scroll when sidebar open on mobile */
        body.sidebar-open {
            overflow: hidden;
        }
    </style>
</head>
<body>

<!-- ══════════════════════════════════════════
     SIDEBAR OVERLAY (mobile)
══════════════════════════════════════════ -->
<div id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- ══════════════════════════════════════════
     TOP HEADER
══════════════════════════════════════════ -->
<header class="top-header">

    <!-- Mobile hamburger -->
    <button class="hdr-icon-btn md:hidden" onclick="toggleSidebar()" title="Menu">
        <span class="material-icons-round mi">menu</span>
    </button>

    <!-- Search bar -->
    <div class="search-wrap">
        <span class="material-icons-round search-icon">search</span>
        <input id="globalSearch" type="text" class="search-input"
               data-i18n="header.search_placeholder"
               placeholder="Search..."
               autocomplete="off"
               onfocus="openSearchDropdown()"
               oninput="handleSearch(this.value)">
        <div id="searchDropdown" class="search-dropdown">
            <div style="padding:10px 16px 6px; font-size:11px; font-weight:600; letter-spacing:.06em; text-transform:uppercase; color:#9ca3af;">
                Quick results
            </div>
            <div id="searchResults"></div>
        </div>
    </div>

    <!-- Spacer -->
    <div style="flex:1"></div>

    <!-- Language -->
    <div class="relative">
        <button class="hdr-icon-btn" onclick="toggleDropdown('langDropdown')" title="Language">
            <span class="material-icons-round mi">language</span>
        </button>
        <div id="langDropdown" class="hdr-dropdown lang-dropdown">
            <a href="#" onclick="changeLanguage('en'); return false;" class="hdr-dropdown-item <?php echo $lang=='en'?'font-semibold':''; ?>">
                <span style="font-size:18px;">🇬🇧</span> <span data-i18n="header.english">English</span>
                <?php if($lang=='en'): ?><span class="material-icons-round" style="font-size:16px;color:#6366f1;margin-left:auto;">check</span><?php endif; ?>
            </a>
            <a href="#" onclick="changeLanguage('si'); return false;" class="hdr-dropdown-item <?php echo $lang=='si'?'font-semibold':''; ?>">
                <span style="font-size:18px;">🇱🇰</span> <span data-i18n="header.sinhala">Sinhala</span>
                <?php if($lang=='si'): ?><span class="material-icons-round" style="font-size:16px;color:#6366f1;margin-left:auto;">check</span><?php endif; ?>
            </a>
            <a href="#" onclick="changeLanguage('ta'); return false;" class="hdr-dropdown-item <?php echo $lang=='ta'?'font-semibold':''; ?>">
                <span style="font-size:18px;">🇱🇰</span> <span data-i18n="header.tamil">Tamil</span>
                <?php if($lang=='ta'): ?><span class="material-icons-round" style="font-size:16px;color:#6366f1;margin-left:auto;">check</span><?php endif; ?>
            </a>
        </div>
    </div>

    <!-- Theme -->
    <div class="relative">
        <button class="hdr-icon-btn" onclick="toggleDropdown('themeDropdown')" title="Theme">
            <span class="material-icons-round mi" id="themeIcon">dark_mode</span>
        </button>
        <div id="themeDropdown" class="hdr-dropdown theme-dropdown">
            <button class="hdr-dropdown-item" onclick="setTheme('light')">
                <span class="material-icons-round mi">light_mode</span> <span data-i18n="header.light">Light</span>
            </button>
            <button class="hdr-dropdown-item" onclick="setTheme('dark')">
                <span class="material-icons-round mi">dark_mode</span> <span data-i18n="header.dark">Dark</span>
            </button>
            <!-- <button class="hdr-dropdown-item" onclick="setTheme('system')">
                <span class="material-icons-round mi">settings</span> <span data-i18n="header.system">System</span>
            </button> -->
        </div>
    </div>

    <!-- Divider -->
    <div style="width:1px;height:28px;background:rgba(0,0,0,.1);margin:0 4px;" class="dark:bg-white/10 hidden sm:block"></div>

    <!-- Profile -->
    <div class="relative">
        <button class="flex items-center gap-2 rounded-xl px-2 py-1.5 transition" onclick="toggleDropdown('profileDropdown')">
            <div class="avatar" id="avatarBtn"><?php echo htmlspecialchars($userInitials); ?></div>
            <div class="hidden sm:block text-left">
                <p style="font-size:13px;font-weight:600;line-height:1.2;"
                   class="text-gray-700 dark:text-gray-200"><?php echo htmlspecialchars($userName); ?></p>
                <p style="font-size:11px;color:#6b7280;line-height:1.2;"><?php echo ucfirst(htmlspecialchars($userRole)); ?></p>
            </div>
            <span class="material-icons-round hidden sm:block" style="font-size:18px;color:#9ca3af;">expand_more</span>
        </button>

        <div id="profileDropdown" class="hdr-dropdown profile-dropdown">
            <div class="profile-header">
                <div class="profile-avatar-lg"><?php echo htmlspecialchars($userInitials); ?></div>
                <div style="min-width:0;">
                    <p style="font-size:14px;font-weight:600;margin:0 0 2px;" class="text-gray-700 dark:text-gray-200 truncate">
                        <?php echo htmlspecialchars($userName); ?></p>
                    <p style="font-size:12px;color:#6b7280;margin:0 0 5px;" class="truncate">
                        <?php echo htmlspecialchars($userEmail); ?></p>
                    <span class="role-badge <?php echo $userRole === 'admin' ? 'admin' : 'staff'; ?>">
                        <?php echo ucfirst(htmlspecialchars($userRole)); ?>
                    </span>
                </div>
            </div>
            <div style="padding:6px 0;">
                <a href="/dashboard/modules/profile/index.php" class="hdr-dropdown-item">
                    <span class="material-icons-round mi">person</span>
                    <span data-i18n="header.my_profile">My Profile</span>
                </a>
                <a href="../modules/users/settings.php" class="hdr-dropdown-item">
                    <span class="material-icons-round mi">manage_accounts</span>
                    <span data-i18n="header.account_settings">Account Settings</span>
                </a>
            </div>
            <div class="dd-divider"></div>
            <div style="padding:6px 0 8px;">
                <a href="../auth/logout.php" class="hdr-dropdown-item" style="color:#ef4444;">
                    <span class="material-icons-round mi" style="color:#ef4444;">logout</span>
                    <span data-i18n="header.logout">Logout</span>
                </a>
            </div>
        </div>
    </div>

</header>

<!-- ══════════════════════════════════════════
     SCRIPTS
══════════════════════════════════════════ -->
<script>
// ── Theme ──────────────────────────────────
function setTheme(t) {
    const html = document.documentElement;
    const icon = document.getElementById('themeIcon');
    
    if (t === 'dark') {
        html.classList.add('dark');
        if (icon) icon.textContent = 'light_mode';
        localStorage.setItem('qty_theme', 'dark');
    } else if (t === 'light') {
        html.classList.remove('dark');
        if (icon) icon.textContent = 'dark_mode';
        localStorage.setItem('qty_theme', 'light');
    } else if (t === 'system') {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (prefersDark) {
            html.classList.add('dark');
            if (icon) icon.textContent = 'light_mode';
        } else {
            html.classList.remove('dark');
            if (icon) icon.textContent = 'dark_mode';
        }
        localStorage.setItem('qty_theme', 'system');
    }
    
    closeAllDropdowns();
}

function loadTheme() {
    const saved = localStorage.getItem('qty_theme');
    if (saved && saved !== 'system') {
        setTheme(saved);
    } else if (saved === 'system') {
        setTheme('system');
    } else {
        // Default to system preference
        setTheme('system');
    }
}

// Listen for system theme changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
    const saved = localStorage.getItem('qty_theme');
    if (saved === 'system') {
        const html = document.documentElement;
        const icon = document.getElementById('themeIcon');
        if (e.matches) {
            html.classList.add('dark');
            if (icon) icon.textContent = 'light_mode';
        } else {
            html.classList.remove('dark');
            if (icon) icon.textContent = 'dark_mode';
        }
    }
});

// ── Dropdowns ──────────────────────────────
function toggleDropdown(id) {
    const target = document.getElementById(id);
    if (!target) return;
    
    const wasOpen = target.classList.contains('open');
    closeAllDropdowns();
    if (!wasOpen) {
        target.classList.add('open');
        // Close when clicking outside (handled by global click)
    }
}

function closeAllDropdowns() {
    document.querySelectorAll('.hdr-dropdown, .search-dropdown').forEach(el => el.classList.remove('open'));
}

// Global click handler for dropdowns
document.addEventListener('click', function(e) {
    // Check if click is inside any dropdown trigger or dropdown itself
    const isInsideTrigger = e.target.closest('.relative') !== null;
    const isInsideSearch = e.target.closest('.search-wrap') !== null;
    const isInsideDropdown = e.target.closest('.hdr-dropdown') !== null;
    const isInsideSearchDropdown = e.target.closest('.search-dropdown') !== null;
    
    if (!isInsideTrigger && !isInsideSearch && !isInsideDropdown && !isInsideSearchDropdown) {
        closeAllDropdowns();
    }
});

// Prevent dropdown from closing when clicking inside it
document.querySelectorAll('.hdr-dropdown, .search-dropdown').forEach(dropdown => {
    dropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});

// ── Search ────────────────────────────────
const searchData = [
    { icon: 'inventory_2', label: 'Wireless Mouse',       sub: 'SKU: MOU-001 · Stock: 45', href: '../modules/items/index.php' },
    { icon: 'inventory_2', label: 'Mechanical Keyboard',  sub: 'SKU: KEY-002 · Stock: 8',  href: '../modules/items/index.php' },
    { icon: 'shopping_cart',label: 'Order #ORD-0421',     sub: 'Nimal Perera · LKR 8,500',  href: '../modules/orders/index.php' },
    { icon: 'people',       label: 'Nimal Perera',        sub: 'Customer · nimal@email.com',href: '../modules/customer/index.php' },
    { icon: 'payments',     label: 'Payment #PAY-0091',   sub: 'LKR 12,500 · Completed',   href: '../modules/payments/index.php' },
];

function openSearchDropdown() {
    const input = document.getElementById('globalSearch');
    if (input) {
        renderSearch(input.value);
    } else {
        renderSearch('');
    }
    const dropdown = document.getElementById('searchDropdown');
    if (dropdown) dropdown.classList.add('open');
}

let _searchTimer;
function handleSearch(val) {
    clearTimeout(_searchTimer);
    _searchTimer = setTimeout(() => { renderSearch(val); }, 200);
}

function renderSearch(val) {
    const q = val.toLowerCase().trim();
    let list = q ? searchData.filter(d => d.label.toLowerCase().includes(q) || d.sub.toLowerCase().includes(q)) : searchData;
    // Limit results for better UX
    if (list.length > 8) list = list.slice(0, 8);
    
    const el = document.getElementById('searchResults');
    if (!el) return;
    
    if (!list.length) {
        el.innerHTML = '<div style="padding:20px 16px;text-align:center;color:#9ca3af;font-size:14px;">No results found</div>';
        return;
    }
    el.innerHTML = list.map(d => `
        <a href="${d.href}" class="search-result-item" style="text-decoration:none;color:inherit;display:flex;">
            <div class="search-result-icon"><span class="material-icons-round mi">${d.icon}</span></div>
            <div style="flex:1;min-width:0;">
                <p style="font-size:14px;font-weight:500;margin:0 0 2px;">${escapeHtml(d.label)}</p>
                <p style="font-size:12px;color:#6b7280;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${escapeHtml(d.sub)}</p>
            </div>
        </a>`).join('');
    
    const dropdown = document.getElementById('searchDropdown');
    if (dropdown) dropdown.classList.add('open');
}

// Simple escape function to prevent XSS
function escapeHtml(str) {
    return str.replace(/[&<>]/g, function(m) {
        if (m === '&') return '&amp;';
        if (m === '<') return '&lt;';
        if (m === '>') return '&gt;';
        return m;
    });
}

// Close search dropdown on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAllDropdowns();
        document.getElementById('globalSearch')?.blur();
    }
});

// ── Sidebar ───────────────────────────────
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const body = document.body;
    
    if (sidebar && overlay) {
        sidebar.classList.toggle('open');
        if (sidebar.classList.contains('open')) {
            overlay.classList.add('active');
            body.classList.add('sidebar-open');
        } else {
            overlay.classList.remove('active');
            body.classList.remove('sidebar-open');
        }
    }
}

function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const body = document.body;
    
    if (sidebar) sidebar.classList.remove('open');
    if (overlay) overlay.classList.remove('active');
    body.classList.remove('sidebar-open');
}

// Close sidebar on window resize (if screen becomes larger)
window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        closeSidebar();
    }
});

// ── Highlight active sidebar item ─────────
function highlightActive() {
    const path = location.pathname;
    document.querySelectorAll('.sidebar-item').forEach(a => {
        const href = a.getAttribute('href');
        if (href && href !== '#' && href !== '') {
            // Clean up paths for comparison
            const cleanHref = href.replace(/^\.\./, '');
            if (path.includes(cleanHref) || (cleanHref !== '/' && path === cleanHref)) {
                a.classList.add('active');
            } else {
                a.classList.remove('active');
            }
        }
    });
}

// ── Notification helper ───────────────────
function markAllNotificationsRead() {
    console.log('Mark all notifications as read');
}

// ── Language helper (placeholder) ─────────
function changeLanguage(lang) {
    // Set cookie
    document.cookie = `user_lang=${lang}; path=/; max-age=${60*60*24*365}`;
    // Reload page to apply language
    location.reload();
}

// Initialize everything
document.addEventListener('DOMContentLoaded', () => { 
    loadTheme(); 
    highlightActive();
    
    // Close sidebar when clicking on a sidebar link (mobile)
    document.querySelectorAll('.sidebar-item').forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768 && this.getAttribute('href') && this.getAttribute('href') !== '#') {
                closeSidebar();
            }
        });
    });
    
    // Update translations after DOM is ready
    if (typeof updatePageTranslations === 'function') {
        updatePageTranslations();
    }
    
    // Set placeholder text for search input
    const searchInput = document.getElementById('globalSearch');
    if (searchInput) {
        // Placeholder will be set by translations if available
        if (typeof getTranslation === 'function') {
            searchInput.placeholder = getTranslation('header.search_placeholder') || 'Search...';
        }
    }
});
</script>