<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — SaaSify</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="app-wrapper">

<?php
  $current_page = 'dashboard';
  include '../includes/sidebar.php';
?>

<div class="main-area">
<?php
  $page_title = 'Dashboard';
  include '../includes/header.php';
?>

<div class="page-content">

  <!-- Page Header -->
  <div class="page-header">
    <div>
      <h1 class="page-title" data-t="dashboard">Dashboard</h1>
      <p class="page-subtitle">Welcome back, Admin 👋 Here's what's happening today.</p>
    </div>
    <div class="page-actions">
      <button class="btn btn-secondary">📤 <span data-t="export">Export</span></button>
      <a href="./modules/customer.php" class="btn btn-primary">+ New Order</a>
    </div>
  </div>

  <!-- Stat Cards -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-icon-wrap amber">💰</div>
      <div class="stat-body">
        <div class="stat-value">Rs. 284,500</div>
        <div class="stat-label" data-t="total_revenue">Total Revenue</div>
        <div class="stat-change up">↑ 12.4% vs last month</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon-wrap blue">🛒</div>
      <div class="stat-body">
        <div class="stat-value">1,284</div>
        <div class="stat-label" data-t="total_orders">Total Orders</div>
        <div class="stat-change up">↑ 8.2% vs last month</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon-wrap green">👥</div>
      <div class="stat-body">
        <div class="stat-value">642</div>
        <div class="stat-label" data-t="total_customers">Total Customers</div>
        <div class="stat-change up">↑ 5.1% vs last month</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon-wrap red">📦</div>
      <div class="stat-body">
        <div class="stat-value">348</div>
        <div class="stat-label" data-t="total_items">Total Items</div>
        <div class="stat-change down">↓ 2 low stock items</div>
      </div>
    </div>
  </div>

  <!-- Quick Stats -->
  <div class="quick-stats mb-6">
    <div class="quick-stat">
      <div class="quick-stat-val text-accent">24</div>
      <div class="quick-stat-lbl" data-t="today_orders">Today's Orders</div>
    </div>
    <div class="quick-stat">
      <div class="quick-stat-val text-warning">7</div>
      <div class="quick-stat-lbl" data-t="pending_payments">Pending Payments</div>
    </div>
    <div class="quick-stat">
      <div class="quick-stat-val text-danger">3</div>
      <div class="quick-stat-lbl" data-t="low_stock">Low Stock</div>
    </div>
    <div class="quick-stat">
      <div class="quick-stat-val text-info">5</div>
      <div class="quick-stat-lbl">Pending Returns</div>
    </div>
    <div class="quick-stat">
      <div class="quick-stat-val text-success">18</div>
      <div class="quick-stat-lbl">Delivered Today</div>
    </div>
    <div class="quick-stat">
      <div class="quick-stat-val">Rs. 38K</div>
      <div class="quick-stat-lbl">Today's Revenue</div>
    </div>
  </div>

  <!-- Main Grid -->
  <div class="dashboard-grid">

    <!-- Chart + Table column -->
    <div style="display:flex;flex-direction:column;gap:20px;">

      <!-- Revenue Chart -->
      <div class="card">
        <div class="card-header">
          <div>
            <div class="card-title">Revenue Overview</div>
            <div class="card-subtitle">Last 7 days performance</div>
          </div>
          <div class="tabs" style="border:none;margin:0;">
            <button class="tab-btn active" data-tab-group="chart" data-tab-btn="week">Week</button>
            <button class="tab-btn" data-tab-group="chart" data-tab-btn="month">Month</button>
          </div>
        </div>
        <div class="chart-placeholder">
          📈
          <span>Chart renders here (integrate Chart.js or similar)</span>
          <span style="font-size:11px;">Revenue: Rs. 284,500 | Orders: 1,284</span>
        </div>
      </div>

      <!-- Recent Orders Table -->
      <div class="card">
        <div class="card-header">
          <div>
            <div class="card-title" data-t="recent_orders">Recent Orders</div>
            <div class="card-subtitle">Latest 5 orders</div>
          </div>
          <a href="/saas/modules/orders/" class="btn btn-secondary btn-sm">View All →</a>
        </div>
        <div class="table-wrapper" style="border:none;">
          <table>
            <thead>
              <tr>
                <th data-t="order_number">Order #</th>
                <th data-t="customers">Customer</th>
                <th data-t="total_revenue">Amount</th>
                <th data-t="order_status">Status</th>
                <th data-t="payment_status">Payment</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $orders = [
                ['ORD-0042','Kasun Perera','Rs. 4,500','delivered','paid'],
                ['ORD-0041','Nimal Silva','Rs. 12,800','shipped','partial'],
                ['ORD-0040','Amara Fernando','Rs. 2,200','confirmed','pending'],
                ['ORD-0039','Ruwan Jayasinghe','Rs. 8,700','pending','pending'],
                ['ORD-0038','Sunil Bandara','Rs. 5,600','delivered','paid'],
              ];
              foreach($orders as $o): ?>
              <tr>
                <td><span class="text-mono text-accent"><?= $o[0] ?></span></td>
                <td><?= $o[1] ?></td>
                <td><strong class="amount"><?= $o[2] ?></strong></td>
                <td><span class="badge <?= statusBadge_php($o[3]) ?>"><?= ucfirst($o[3]) ?></span></td>
                <td><span class="badge <?= statusBadge_php($o[4]) ?>"><?= ucfirst($o[4]) ?></span></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

    <!-- Right Column -->
    <div style="display:flex;flex-direction:column;gap:20px;">

      <!-- Recent Activity -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">Recent Activity</div>
        </div>
        <div class="activity-list">
          <?php
          $activities = [
            ['🛒','New order from Kasun Perera','ORD-0042 • 2 min ago','Rs. 4,500','#f59e0b'],
            ['✅','Payment verified','PAY-012 • 18 min ago','Rs. 12,800','#10b981'],
            ['↩️','Return requested','RET-005 • 1h ago',null,'#ef4444'],
            ['📦','Stock added','Blue T-Shirt +50 units • 2h ago',null,'#3b82f6'],
            ['🚚','Order shipped','ORD-0039 via FastEx • 3h ago',null,'#f59e0b'],
            ['⚠️','Low stock alert','Red Sneakers — 3 left • 4h ago',null,'#ef4444'],
          ];
          foreach($activities as $a): ?>
          <div class="activity-item">
            <div class="activity-dot" style="background:<?= $a[4] ?>"></div>
            <div class="activity-body">
              <div class="activity-title"><?= $a[0] ?> <?= $a[1] ?></div>
              <div class="activity-meta"><?= $a[2] ?></div>
            </div>
            <?php if($a[3]): ?>
            <div class="activity-amount"><?= $a[3] ?></div>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Low Stock Alert -->
      <div class="card">
        <div class="card-header">
          <div class="card-title" data-t="low_stock">Low Stock Alerts</div>
          <span class="badge badge-danger">3 items</span>
        </div>
        <?php
        $low = [
          ['Red Sneakers', 'ITM-001', 3],
          ['Blue Denim Shirt', 'ITM-024', 5],
          ['Black Handbag', 'ITM-088', 2],
        ];
        foreach($low as $l): ?>
        <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--border);">
          <div>
            <div style="font-size:13px;font-weight:600;"><?= $l[0] ?></div>
            <div class="text-mono text-muted" style="font-size:11px;"><?= $l[1] ?></div>
          </div>
          <span class="badge badge-danger"><?= $l[2] ?> left</span>
        </div>
        <?php endforeach; ?>
        <a href="/saas/modules/items/" class="btn btn-secondary btn-sm w-full mt-3" style="justify-content:center;">
          Manage Stock →
        </a>
      </div>

    </div>

  </div><!-- end dashboard-grid -->

</div><!-- end page-content -->
</div><!-- end main-area -->
</div><!-- end app-wrapper -->

<div id="toast-container" class="toast-container"></div>

<script src="../assets/js/main.js"></script>
<script>
<?php
function statusBadge_php($status) {
  $map = [
    'active'=>'badge-success','inactive'=>'badge-muted',
    'pending'=>'badge-warning','confirmed'=>'badge-info','shipped'=>'badge-info',
    'delivered'=>'badge-success','cancelled'=>'badge-danger',
    'paid'=>'badge-success','partial'=>'badge-warning',
  ];
  return $map[$status] ?? 'badge-muted';
}
?>
// Dashboard chart simulation
console.log('Dashboard loaded — plug in Chart.js here');
</script>
</body>
</html>