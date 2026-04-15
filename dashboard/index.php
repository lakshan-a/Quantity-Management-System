<?php
// ============================================
// File: dashboard/index.php
// Description: Main dashboard with stats and charts
// ============================================
require_once '../middleware/check_auth.php';
$pageTitle = 'Dashboard | Qty Management';
ob_start();
?>

<script src="../assets/js/translations/dashboards/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
    <!-- Page header -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
      <div>
        <h1 class="text-2xl md:text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
          <span data-i18n="welcome_back">Welcome back, </span><?php echo htmlspecialchars($_SESSION['user_name']); ?>!
        </h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1" data-i18n="dashboard_subtitle">Here's what's happening with your business today.</p>
      </div>
    </div>

    <!-- Stats Grid Row 1 (4 cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-5" id="statsGrid1"></div>

    <!-- Stats Grid Row 2 (4 cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-5" id="statsGrid2"></div>

    <!-- Revenue Card -->
    <div id="revenueCardContainer" class="mb-5"></div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <!-- Recent Orders (spans 2 cols on large) -->
      <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-200 dark:border-slate-700">
          <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="recent_orders_title">Recent Orders</h3>
          <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5" data-i18n="recent_orders_subtitle">Latest 5 orders from your store</p>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-slate-50 dark:bg-slate-800/60">
              <tr class="border-b border-slate-200 dark:border-slate-700">
                <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_order">Order</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_customer">Customer</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_amount">Amount</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider" data-i18n="col_status">Status</th>
              </tr>
            </thead>
            <tbody id="recentOrdersTableBody" class="divide-y divide-slate-200 dark:divide-slate-700">
              <!-- dynamic content from JS -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- Order Status Distribution Card -->
      <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm p-6">
         <div class="mb-4">
          <h3 class="text-lg font-bold text-slate-900 dark:text-white" data-i18n="order_status_title">Order Status Distribution</h3>
          <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5" data-i18n="order_status_subtitle">Breakdown of all orders by status</p>
        </div>
        <div class="relative" style="height: 260px;">
          <canvas id="orderStatusChart"></canvas>
        </div>
        <div class="mt-4 flex flex-wrap justify-center gap-3 text-xs" id="orderStatusLegend"></div>
      </div>
    </div>
  </div>

  <!-- Toast Notification -->
  <div id="toastMsg" class="fixed bottom-5 right-5 bg-slate-800 dark:bg-slate-700 text-white px-4 py-2 rounded-lg shadow-lg text-sm z-50 transition-all duration-300 opacity-0 pointer-events-none"></div>
  
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  <script>
    // ----- Mock Data -----
    const mockStats = {
      totalOrders: 1247,
      todayOrders: 23,
      pendingOrders: 45,
      deliveredOrders: 1156,
      returnedOrders: 46,
      totalCustomers: 892,
      lowStockItems: 12,
      damagedItems: 8,
      totalRevenue: 125680,
    };

    const recentOrders = [
      { order_id: '1', order_number: 'ORD-2024-001', customer_name: 'John Smith', total_amount: 299.99, status: 'pending' },
      { order_id: '2', order_number: 'ORD-2024-002', customer_name: 'Sarah Johnson', total_amount: 149.5, status: 'processing' },
      { order_id: '3', order_number: 'ORD-2024-003', customer_name: 'Mike Brown', total_amount: 599.0, status: 'shipped' },
      { order_id: '4', order_number: 'ORD-2024-004', customer_name: 'Emily Davis', total_amount: 89.99, status: 'delivered' },
      { order_id: '5', order_number: 'ORD-2024-005', customer_name: 'Chris Wilson', total_amount: 449.0, status: 'pending' },
    ];

    // Order status distribution data for pie chart
    const orderStatusData = {
      labels: ['pending', 'processing', 'shipped', 'delivered', 'returned'],
      values: [45, 38, 62, 1156, 46],
      colors: ['#f59e0b', '#3b82f6', '#06b6d4', '#10b981', '#ef4444']
    };

    // Helper: format numbers
    function formatNumber(num) { return num.toLocaleString(); }

    // Helper: show toast
    function showToast(message, type = 'info') {
      const toast = document.getElementById('toastMsg');
      toast.textContent = message;
      toast.classList.remove('opacity-0', 'pointer-events-none');
      toast.classList.add('opacity-100');
      setTimeout(() => {
        toast.classList.add('opacity-0', 'pointer-events-none');
      }, 2500);
    }

    // SVG Icon Helper
    function getSvgIcon(iconName, colorClass = 'blue') {
      const icons = {
        'shopping-cart': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path></svg>',
        'clock': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'box': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>',
        'check-circle': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'undo': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>',
        'users': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
        'cubes': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>',
        'alert-triangle': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
        'dollar-sign': '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
      };
      return icons[iconName] || icons['shopping-cart'];
    }

    // StatCard renderer with translation support
    function createStatCard(titleKey, value, iconName, colorClass, trend = null) {
      const colorBgMap = {
        blue: 'bg-blue-500',
        green: 'bg-emerald-500',
        yellow: 'bg-amber-500',
        red: 'bg-red-500',
        purple: 'bg-purple-500',
        cyan: 'bg-cyan-500',
      };
      const bgColor = colorBgMap[colorClass] || 'bg-blue-500';
      
      // Get translated title
      const translatedTitle = typeof window.t === 'function' ? window.t(titleKey) : titleKey;
      
      let trendHtml = '';
      if (trend) {
        const trendIcon = trend.isPositive ? 
          '<svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>' : 
          '<svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>';
        const trendColor = trend.isPositive ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400';
        const vsLastMonth = typeof window.t === 'function' ? window.t('vs_last_month') : 'vs last month';
        trendHtml = `<p class="mt-1 text-sm flex items-center gap-1 ${trendColor}">${trendIcon} ${Math.abs(trend.value)}% <span class="text-slate-500 dark:text-slate-400 ml-1">${vsLastMonth}</span></p>`;
      }
      
      return `
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 shadow-sm hover:shadow-md transition-all duration-200">
          <div class="flex items-start justify-between">
            <div class="flex-1">
              <p class="text-sm font-medium text-slate-500 dark:text-slate-400">${translatedTitle}</p>
              <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">${value}</p>
              ${trendHtml}
            </div>
            <div class="${bgColor} p-3 rounded-lg text-white shadow-sm">
              ${getSvgIcon(iconName)}
            </div>
          </div>
        </div>
      `;
    }

    // Render all stats with translation keys
    function renderStats(showRevenue = true) {
      const row1Cards = [
        createStatCard('total_orders', formatNumber(mockStats.totalOrders), 'shopping-cart', 'blue', { value: 12, isPositive: true }),
        createStatCard('todays_orders', mockStats.todayOrders, 'clock', 'cyan'),
        createStatCard('pending_orders', mockStats.pendingOrders, 'box', 'yellow'),
        createStatCard('delivered_orders', formatNumber(mockStats.deliveredOrders), 'check-circle', 'green')
      ];
      document.getElementById('statsGrid1').innerHTML = row1Cards.join('');

      const row2Cards = [
        createStatCard('returned_orders', mockStats.returnedOrders, 'undo', 'red'),
        createStatCard('total_customers', formatNumber(mockStats.totalCustomers), 'users', 'purple', { value: 8, isPositive: true }),
        createStatCard('low_stock_items', mockStats.lowStockItems, 'cubes', 'yellow'),
        createStatCard('damaged_items', mockStats.damagedItems, 'alert-triangle', 'red')
      ];
      document.getElementById('statsGrid2').innerHTML = row2Cards.join('');

      const revenueContainer = document.getElementById('revenueCardContainer');
      if (showRevenue) {
        revenueContainer.innerHTML = `
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            ${createStatCard('total_revenue', `$${formatNumber(mockStats.totalRevenue)}`, 'dollar-sign', 'green', { value: 15, isPositive: true })}
          </div>
        `;
      } else {
        revenueContainer.innerHTML = '';
      }
    }

    // Render recent orders table with translated statuses
    function renderRecentOrders() {
      const tbody = document.getElementById('recentOrdersTableBody');
      if (!tbody) return;
      
      const statusColors = {
        pending: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
        processing: 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
        shipped: 'bg-cyan-100 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-400',
        delivered: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
        returned: 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
      };
      
      let rowsHtml = '';
      recentOrders.forEach(order => {
        const statusClass = statusColors[order.status] || statusColors.pending;
        // Get translated status
        const translatedStatus = typeof window.t === 'function' ? window.t(order.status) : order.status;
        
        rowsHtml += `
          <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/40 transition">
            <td class="px-5 py-3 text-sm font-medium text-slate-900 dark:text-white">${order.order_number}</td>
            <td class="px-5 py-3 text-sm text-slate-600 dark:text-slate-300">${order.customer_name}</td>
            <td class="px-5 py-3 text-sm font-mono text-slate-700 dark:text-slate-200">$${order.total_amount.toFixed(2)}</td>
            <td class="px-5 py-3"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ${statusClass}">${translatedStatus}</span></td>
           </tr>
        `;
      });
      tbody.innerHTML = rowsHtml;
    }

    // Initialize pie chart
    let orderStatusChartInstance = null;

    function initCharts() {
      const orderCtx = document.getElementById('orderStatusChart')?.getContext('2d');
      
      if (orderCtx) {
        if (orderStatusChartInstance) orderStatusChartInstance.destroy();
        
        // Get translated labels
        const translatedLabels = orderStatusData.labels.map(label => 
          typeof window.t === 'function' ? window.t(label) : label
        );
        
        const total = orderStatusData.values.reduce((a, b) => a + b, 0);
        
        orderStatusChartInstance = new Chart(orderCtx, {
          type: 'pie',
          data: {
            labels: translatedLabels,
            datasets: [{
              data: orderStatusData.values,
              backgroundColor: orderStatusData.colors,
              borderWidth: 2,
              borderColor: '#ffffff',
              hoverBorderColor: '#ffffff',
              hoverOffset: 12,
              cutout: '0%',
              radius: '85%'
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
              tooltip: { 
                callbacks: { 
                  label: (ctx) => {
                    const value = ctx.raw;
                    const percentage = ((value / total) * 100).toFixed(1);
                    const ordersText = typeof window.t === 'function' ? window.t('orders') : 'orders';
                    return `${ctx.label}: ${value.toLocaleString()} ${ordersText} (${percentage}%)`;
                  }
                },
                backgroundColor: 'rgba(0,0,0,0.8)',
                titleColor: '#fff',
                bodyColor: '#e2e8f0',
                padding: 10,
                cornerRadius: 8,
                displayColors: true
              },
              legend: { 
                display: false 
              }
            },
            layout: {
              padding: 10
            },
            elements: {
              arc: {
                shadowOffsetX: 2,
                shadowOffsetY: 2,
                shadowBlur: 8,
                shadowColor: 'rgba(0, 0, 0, 0.1)'
              }
            },
            animation: {
              animateScale: true,
              animateRotate: true,
              duration: 800,
              easing: 'easeOutCubic'
            }
          }
        });
      }

      // Generate custom legend with translations
      generateLegend('orderStatusLegend', orderStatusData.labels, orderStatusData.colors, orderStatusData.values);
    }

    function generateLegend(containerId, labels, colors, values) {
      const container = document.getElementById(containerId);
      if (!container) return;
      
      const total = values.reduce((a,b) => a + b, 0);
      // Get translated labels
      const translatedLabels = labels.map(label => 
        typeof window.t === 'function' ? window.t(label) : label
      );
      
      container.innerHTML = translatedLabels.map((label, i) => {
        const percentage = ((values[i] / total) * 100).toFixed(1);
        return `
          <div class="flex items-center gap-2 bg-slate-50 dark:bg-slate-700/50 rounded-full px-3 py-1.5 shadow-sm">
            <span class="w-3 h-3 rounded-full shadow-sm" style="background-color: ${colors[i]}"></span>
            <span class="text-slate-600 dark:text-slate-300 text-xs font-medium">${label}</span>
            <span class="font-bold text-slate-800 dark:text-slate-200 text-xs bg-white dark:bg-slate-600 px-1.5 py-0.5 rounded-full">${percentage}%</span>
          </div>
        `;
      }).join('');
    }

    // Dark mode initialization
    function initDarkMode() {
      if (localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
      
      // Optional: Add a dark mode toggle button if needed
      // You can add this to your header
    }

    // Refresh all translatable content
    function refreshTranslations() {
      renderStats(true);
      renderRecentOrders();
      initCharts();
    }

    // Listen for language changes
    function initTranslationListener() {
      window.addEventListener('languageChanged', function() {
        refreshTranslations();
      });
      
      // Also listen for translations updated event
      window.addEventListener('translationsUpdated', function() {
        refreshTranslations();
      });
    }

    // Initialize everything
    function init() {
      renderStats(true);
      renderRecentOrders();
      initCharts();
      initDarkMode();
      initTranslationListener();
      
      // Initial translation update after a short delay to ensure translations are loaded
      setTimeout(() => {
        if (typeof window.updatePageTranslations === 'function') {
          window.updatePageTranslations();
        }
      }, 100);
    }

    // Start the app
    init();
  </script>

<?php
$content = ob_get_clean();
include '../includes/header.php';
include '../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../includes/footer.php';
?>