<?php
// ============================================
// File: dashboard/index.php
// Description: Main dashboard with stats
// ============================================
require_once '../middleware/check_auth.php';
$pageTitle = 'Dashboard | Qty Management';
ob_start();
?>

<div class="p-4 md:p-6">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <p class="text-gray-500 mt-1">Here's what's happening with your business today.</p>
    </div>
    
    <!-- Stats Cards - Responsive Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Orders</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800">156</p>
                    <p class="text-green-500 text-xs mt-1">↑ 12% from last month</p>
                </div>
                <div class="bg-indigo-100 p-3 rounded-full">
                    <span class="material-icons text-indigo-600">shopping_cart</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Revenue</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800">$12,450</p>
                    <p class="text-green-500 text-xs mt-1">↑ 8% from last month</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <span class="material-icons text-green-600">attach_money</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Customers</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800">89</p>
                    <p class="text-green-500 text-xs mt-1">↑ 5 new this week</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <span class="material-icons text-blue-600">people</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-4 md:p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Low Stock Items</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800">12</p>
                    <p class="text-red-500 text-xs mt-1">Need reorder soon</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <span class="material-icons text-red-600">warning</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Orders Table - Responsive -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-4 md:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <h2 class="text-lg font-semibold text-gray-800">Recent Orders</h2>
            <a href="../modules/orders/index.php" class="text-indigo-600 text-sm hover:underline">View All →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order #</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-001</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-500">John Doe</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-01-15</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Delivered</span></td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-900">$250.00</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-002</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jane Smith</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-01-14</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pending</span></td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-900">$125.00</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-003</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mike Johnson</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-01-13</td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Shipped</span></td>
                        <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-900">$89.99</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include '../includes/header.php';
include '../includes/sidebar.php';
echo '<div class="main-content min-h-screen">';
echo $content;
include '../includes/footer.php';
?>