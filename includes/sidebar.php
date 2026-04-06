<?php
// modules/partials/sidebar.php
// Usage: include this file on every page
// Set $current_page variable before including (e.g. $current_page = 'dashboard')
?>
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<aside class="sidebar" id="sidebar">
  <!-- Brand -->
  <div class="sidebar-brand">
    <div class="brand-icon">S</div>
    <span class="brand-name">SaaSify</span>
  </div>

  <!-- Navigation -->
  <nav class="sidebar-nav">

    <!-- Main -->
    <div class="nav-section-label" data-t="dashboard">Main</div>

    <a href="/qty-management/dashboard/index.php" class="nav-item <?= ($current_page ?? '') === 'dashboard' ? 'active' : '' ?>"
       data-href="dashboard" data-label="Dashboard">
      <span class="nav-icon">📊</span>
      <span class="nav-label" data-t="dashboard">Dashboard</span>
    </a>

    <!-- Catalog -->
    <div class="nav-section-label">Catalog</div>

    <a href="/saas/modules/items/" class="nav-item <?= ($current_page ?? '') === 'items' ? 'active' : '' ?>"
       data-href="items" data-label="Items">
      <span class="nav-icon">📦</span>
      <span class="nav-label" data-t="items">Items</span>
    </a>

    <a href="/saas/modules/categories/" class="nav-item <?= ($current_page ?? '') === 'categories' ? 'active' : '' ?>"
       data-href="categories" data-label="Categories">
      <span class="nav-icon">🏷️</span>
      <span class="nav-label" data-t="categories">Categories</span>
    </a>

    <a href="/saas/modules/wholesalers/" class="nav-item <?= ($current_page ?? '') === 'wholesalers' ? 'active' : '' ?>"
       data-href="wholesalers" data-label="Wholesalers">
      <span class="nav-icon">🏭</span>
      <span class="nav-label" data-t="wholesalers">Wholesalers</span>
    </a>

    <!-- Sales -->
    <div class="nav-section-label">Sales</div>

    <a href="/qty-management/modules/customer.php" class="nav-item <?= ($current_page ?? '') === 'customers' ? 'active' : '' ?>"
       data-href="customers" data-label="Customers">
      <span class="nav-icon">👥</span>
      <span class="nav-label" data-t="customers">Customers</span>
    </a>

    <a href="/saas/modules/orders/" class="nav-item <?= ($current_page ?? '') === 'orders' ? 'active' : '' ?>"
       data-href="orders" data-label="Orders">
      <span class="nav-icon">🛒</span>
      <span class="nav-label" data-t="orders">Orders</span>
      <span class="nav-badge">12</span>
    </a>

    <a href="/saas/modules/order_items/" class="nav-item <?= ($current_page ?? '') === 'order_items' ? 'active' : '' ?>"
       data-href="order_items" data-label="Order Items">
      <span class="nav-icon">📋</span>
      <span class="nav-label" data-t="order_items">Order Items</span>
    </a>

    <a href="/saas/modules/payments/" class="nav-item <?= ($current_page ?? '') === 'payments' ? 'active' : '' ?>"
       data-href="payments" data-label="Payments">
      <span class="nav-icon">💳</span>
      <span class="nav-label" data-t="payments">Payments</span>
    </a>

    <a href="/saas/modules/couriers/" class="nav-item <?= ($current_page ?? '') === 'couriers' ? 'active' : '' ?>"
       data-href="couriers" data-label="Couriers">
      <span class="nav-icon">🚚</span>
      <span class="nav-label" data-t="couriers">Couriers</span>
    </a>

    <!-- Post-Sale -->
    <div class="nav-section-label">Post-Sale</div>

    <a href="/saas/modules/returns/" class="nav-item <?= ($current_page ?? '') === 'returns' ? 'active' : '' ?>"
       data-href="returns" data-label="Returns">
      <span class="nav-icon">↩️</span>
      <span class="nav-label" data-t="returns">Returns</span>
    </a>

    <a href="/saas/modules/damages/" class="nav-item <?= ($current_page ?? '') === 'damages' ? 'active' : '' ?>"
       data-href="damages" data-label="Damages">
      <span class="nav-icon">⚠️</span>
      <span class="nav-label" data-t="damages">Damages</span>
    </a>

    <!-- Admin -->
    <div class="nav-section-label">Admin</div>

    <a href="/saas/modules/users/" class="nav-item <?= ($current_page ?? '') === 'users' ? 'active' : '' ?>"
       data-href="users" data-label="Users">
      <span class="nav-icon">👤</span>
      <span class="nav-label" data-t="users">Users</span>
    </a>

    <a href="/saas/modules/businesses/" class="nav-item <?= ($current_page ?? '') === 'businesses' ? 'active' : '' ?>"
       data-href="businesses" data-label="Businesses">
      <span class="nav-icon">🏢</span>
      <span class="nav-label" data-t="businesses">Businesses</span>
    </a>

  </nav>

  <!-- Footer -->
  <div class="sidebar-footer">
    <div class="sidebar-user">
      <div class="user-avatar">A</div>
      <div class="user-info">
        <div class="user-name">Admin User</div>
        <div class="user-role" data-t="admin">Admin</div>
      </div>
    </div>
  </div>
</aside>