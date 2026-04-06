<?php
// modules/partials/header.php
// Usage: include on every page
// Set $page_title and $page_breadcrumb before including
?>
<header class="header">
  <!-- Toggle -->
  <button class="header-toggle" id="sidebar-toggle" title="Toggle Sidebar">☰</button>

  <!-- Breadcrumb -->
  <div class="header-breadcrumb">
    <span>SaaSify</span>
    <span>›</span>
    <span class="current"><?= htmlspecialchars($page_title ?? 'Dashboard') ?></span>
  </div>

  <div class="header-spacer"></div>

  <!-- Search -->
  <div class="header-search">
    <span class="search-icon">🔍</span>
    <input type="text" data-t-ph="search" placeholder="Search..." id="global-search">
  </div>

  <!-- Actions -->
  <div class="header-actions">

    <!-- Language Switcher -->
    <div class="dropdown">
      <button class="lang-selector" data-dropdown="lang-menu" title="Language">
        🌐 <span id="lang-label">EN</span>
      </button>
      <div class="dropdown-menu" id="lang-menu">
        <div class="dropdown-item" data-lang="en" onclick="document.getElementById('lang-label').textContent='EN'">
          🇬🇧 English
        </div>
        <div class="dropdown-item" data-lang="si" onclick="document.getElementById('lang-label').textContent='SI'">
          🇱🇰 සිංහල
        </div>
        <div class="dropdown-item" data-lang="ta" onclick="document.getElementById('lang-label').textContent='TA'">
          🇱🇰 தமிழ்
        </div>
      </div>
    </div>

    <!-- Notifications -->
    <div class="dropdown">
      <button class="header-btn" data-dropdown="notif-menu" title="Notifications">
        🔔
        <span class="notif-dot"></span>
      </button>
      <div class="dropdown-menu" id="notif-menu" style="min-width:280px;">
        <div style="padding:12px 14px; border-bottom:1px solid var(--border);">
          <strong style="font-size:13px;">Notifications</strong>
        </div>
        <div class="dropdown-item">
          <span>🛒</span>
          <div>
            <div style="font-size:12px;font-weight:600;">New order #ORD-0042</div>
            <div style="font-size:11px;color:var(--text-muted);">2 minutes ago</div>
          </div>
        </div>
        <div class="dropdown-item">
          <span>⚠️</span>
          <div>
            <div style="font-size:12px;font-weight:600;">Low stock: Blue T-Shirt</div>
            <div style="font-size:11px;color:var(--text-muted);">1 hour ago</div>
          </div>
        </div>
        <div class="dropdown-item">
          <span>💳</span>
          <div>
            <div style="font-size:12px;font-weight:600;">Payment verified #PAY-012</div>
            <div style="font-size:11px;color:var(--text-muted);">3 hours ago</div>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="dropdown-item" style="justify-content:center;color:var(--accent);">
          View all notifications
        </div>
      </div>
    </div>

    <!-- Profile -->
    <div class="dropdown">
      <button class="header-btn" data-dropdown="profile-menu">👤</button>
      <div class="dropdown-menu" id="profile-menu">
        <div style="padding:12px 14px;border-bottom:1px solid var(--border);">
          <div style="font-size:13px;font-weight:600;">Admin User</div>
          <div style="font-size:11px;color:var(--text-muted);">admin@saasify.com</div>
        </div>
        <a class="dropdown-item" href="/saas/modules/users/">
          <span>👤</span> <span data-t="users">Users</span>
        </a>
        <a class="dropdown-item" href="/saas/modules/businesses/">
          <span>⚙️</span> <span data-t="settings">Settings</span>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item danger" href="/saas/login/">
          <span>🚪</span> <span data-t="logout">Logout</span>
        </a>
      </div>
    </div>

  </div>
</header>