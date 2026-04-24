<?php
// ============================================
// File: modules/profile/index.php
// Description: User Profile Page - View and edit own profile details
// Fully responsive with modern UI matching users module
// ============================================
require_once '../../middleware/check_auth.php';
$pageTitle = 'My Profile | Qty Management';
ob_start();
?>

<script src="../../assets/js/translations/profile/translations.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 md:py-10">
    <div id="app" class="space-y-6">

        <!-- Page Header -->
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent" data-i18n="profile_title">My Profile</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" data-i18n="profile_subtitle">Manage your personal information and account settings.</p>
        </div>

        <!-- Profile Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Left Column: Profile Image & Basic Info Card -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Profile Image Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
                    <div class="p-6 flex flex-col items-center text-center">
                        <!-- Avatar / Profile Image -->
                        <div class="relative mb-4">
                            <div id="profileImageContainer" class="relative group cursor-pointer" onclick="document.getElementById('imageUploadInput').click()">
                                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white dark:border-slate-700 shadow-lg bg-slate-100 dark:bg-slate-700">
                                    <img id="profileAvatar" src="" alt="Profile" class="w-full h-full object-cover">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center bg-black/50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                </div>
                            </div>
                            <input type="file" id="imageUploadInput" accept="image/*" class="hidden">
                            <div id="imageUploadStatus" class="hidden absolute -bottom-2 left-1/2 -translate-x-1/2 text-xs px-2 py-0.5 rounded-full bg-green-500 text-white" data-i18n="uploaded">Uploaded!</div>
                        </div>
                        <h2 id="profileName" class="text-xl font-bold text-slate-900 dark:text-white">Loading...</h2>
                        <p id="profileRole" class="text-sm text-slate-500 dark:text-slate-400 mt-1"></p>
                        <p id="profileUserId" class="text-xs font-mono text-slate-400 dark:text-slate-500 mt-2"></p>
                        <div class="flex flex-wrap justify-center gap-2 mt-4">
                            <span id="profileStatusBadge" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"></span>
                        </div>
                    </div>
                    <div class="border-t border-slate-100 dark:border-slate-700 px-6 py-4 bg-slate-50 dark:bg-slate-900/30">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500 dark:text-slate-400" data-i18n="member_since">Member since</span>
                            <span id="memberSince" class="text-slate-700 dark:text-slate-300 font-medium">--</span>
                        </div>
                    </div>
                </div>

                <!-- Account Stats Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h3 class="font-semibold text-slate-900 dark:text-white flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            <span data-i18n="account_stats">Account Statistics</span>
                        </h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="last_login">Last Login</span>
                            <span id="lastLogin" class="text-slate-700 dark:text-slate-300 text-sm font-medium">--</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400 text-sm" data-i18n="account_status">Account Status</span>
                            <span id="accountStatusBadge" class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Active</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Edit Profile Form -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information Form -->
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h3 class="font-semibold text-slate-900 dark:text-white" data-i18n="personal_info">Personal Information</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5" data-i18n="personal_info_desc">Update your personal details and contact information.</p>
                    </div>
                    <div class="p-6 space-y-5">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_full_name">Full Name</label>
                            <input type="text" id="fullNameInput" data-i18n-placeholder="full_name_placeholder" placeholder="John Doe" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_email">Email Address</label>
                            <input type="email" id="emailInput" data-i18n-placeholder="email_placeholder" placeholder="user@example.com" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>
                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_phone">Phone Number</label>
                            <input type="text" id="phoneInput" data-i18n-placeholder="phone_placeholder" placeholder="+1 234 567 8900" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>
                        <!-- Role (Readonly) -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="form_role">Role</label>
                            <input type="text" id="roleDisplay" readonly class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50 text-slate-500 dark:text-slate-400 cursor-not-allowed">
                        </div>
                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-slate-100 dark:border-slate-700">
                            <button id="saveProfileBtn" class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mr-2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 15 7 15 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                <span data-i18n="save_changes_btn">Save Changes</span>
                            </button>
                            <button id="cancelEditBtn" class="inline-flex items-center justify-center px-5 py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                                <span data-i18n="cancel_btn">Cancel</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h3 class="font-semibold text-slate-900 dark:text-white flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <span data-i18n="change_password">Change Password</span>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5" data-i18n="change_password_desc">Update your password to keep your account secure.</p>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="current_password">Current Password</label>
                            <input type="password" id="currentPasswordInput" data-i18n-placeholder="password_placeholder" placeholder="••••••••" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="new_password">New Password</label>
                            <input type="password" id="newPasswordInput" data-i18n-placeholder="password_placeholder" placeholder="••••••••" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5" data-i18n="confirm_password">Confirm New Password</label>
                            <input type="password" id="confirmPasswordInput" data-i18n-placeholder="password_placeholder" placeholder="••••••••" class="w-full px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>
                        <div>
                            <button id="changePasswordBtn" class="inline-flex items-center justify-center px-5 py-2.5 bg-slate-800 dark:bg-slate-700 text-white font-medium rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 transition-colors shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mr-2"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <span data-i18n="update_password_btn">Update Password</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-4 right-4 z-50 hidden transform transition-all duration-300 translate-y-0 opacity-100">
    <div class="flex items-center gap-3 px-4 py-3 bg-white dark:bg-slate-800 rounded-lg shadow-lg border border-slate-200 dark:border-slate-700">
        <div id="toastIcon" class="flex-shrink-0"></div>
        <p id="toastMessage" class="text-sm text-slate-700 dark:text-slate-300"></p>
        <button onclick="hideToast()" class="ml-4 text-slate-400 hover:text-slate-500">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
</div>

<script>
    // ---------- MOCK USER DATA (In real app, fetch from API) ----------
    let currentUser = {
        user_id: 'USE-2024-001',
        business_id: 'biz1',
        full_name: 'John Admin',
        email: 'admin@demo.com',
        phone: '+1234567890',
        role: 'admin',
        status: 'active',
        user_image: '',
        createdAt: new Date(2024, 0, 10),
        updatedAt: new Date(),
        last_login: new Date(2025, 2, 15, 10, 30)
    };

    // Role and status color mappings (matching users module)
    const roleColors = {
        admin: 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
        staff: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
    };
    const statusColors = {
        active: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
        inactive: 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-300'
    };

    // DOM Elements
    const profileAvatar = document.getElementById('profileAvatar');
    const profileName = document.getElementById('profileName');
    const profileRole = document.getElementById('profileRole');
    const profileUserId = document.getElementById('profileUserId');
    const profileStatusBadge = document.getElementById('profileStatusBadge');
    const memberSince = document.getElementById('memberSince');
    const lastLogin = document.getElementById('lastLogin');
    const accountStatusBadge = document.getElementById('accountStatusBadge');
    const fullNameInput = document.getElementById('fullNameInput');
    const emailInput = document.getElementById('emailInput');
    const phoneInput = document.getElementById('phoneInput');
    const roleDisplay = document.getElementById('roleDisplay');
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');
    const imageUploadInput = document.getElementById('imageUploadInput');
    const changePasswordBtn = document.getElementById('changePasswordBtn');
    const currentPasswordInput = document.getElementById('currentPasswordInput');
    const newPasswordInput = document.getElementById('newPasswordInput');
    const confirmPasswordInput = document.getElementById('confirmPasswordInput');
    const imageUploadStatus = document.getElementById('imageUploadStatus');

    // Helper: format date
    function formatDate(date, format = 'long') {
        if (!date) return 'N/A';
        const d = new Date(date);
        if (format === 'long') {
            return d.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        }
        return d.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    }

    function formatDateTime(date) {
        if (!date) return 'N/A';
        const d = new Date(date);
        return d.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' });
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

    // Toast notification
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        const toastIcon = document.getElementById('toastIcon');
        const toastMessage = document.getElementById('toastMessage');
        
        const icons = {
            success: '<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            error: '<svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            info: '<svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        };
        
        toastIcon.innerHTML = icons[type] || icons.success;
        toastMessage.textContent = message;
        toast.classList.remove('hidden');
        
        setTimeout(() => {
            hideToast();
        }, 3000);
    }
    
    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('hidden');
    }

    // Load profile data into UI
    function loadProfile() {
        profileName.textContent = currentUser.full_name;
        profileRole.textContent = currentUser.role === 'admin' ? 'Administrator' : 'Staff Member';
        profileUserId.textContent = currentUser.user_id;
        profileStatusBadge.textContent = currentUser.status === 'active' ? 'Active' : 'Inactive';
        profileStatusBadge.className = `inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${statusColors[currentUser.status]}`;
        accountStatusBadge.textContent = currentUser.status === 'active' ? 'Active' : 'Inactive';
        accountStatusBadge.className = `inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ${statusColors[currentUser.status]}`;
        memberSince.textContent = formatDate(currentUser.createdAt);
        lastLogin.textContent = formatDateTime(currentUser.last_login);
        
        // Set profile image
        if (currentUser.user_image && currentUser.user_image !== '') {
            profileAvatar.src = currentUser.user_image;
        } else {
            profileAvatar.src = '';
            profileAvatar.style.display = 'none';
            // Show placeholder
            if (!profileAvatar.parentElement.querySelector('.placeholder-icon')) {
                const placeholder = document.createElement('div');
                placeholder.className = 'placeholder-icon w-full h-full flex items-center justify-center';
                placeholder.innerHTML = currentUser.role === 'admin' 
                    ? '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-blue-500"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>'
                    : '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald-500"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>';
                profileAvatar.parentElement.appendChild(placeholder);
                profileAvatar.style.display = 'none';
            }
        }
        
        // Form fields
        fullNameInput.value = currentUser.full_name;
        emailInput.value = currentUser.email;
        phoneInput.value = currentUser.phone;
        roleDisplay.value = currentUser.role === 'admin' ? 'Administrator' : 'Staff Member';
    }

    // Save profile changes
    function saveProfile() {
        const fullName = fullNameInput.value.trim();
        const email = emailInput.value.trim();
        const phone = phoneInput.value.trim();
        
        if (!fullName) { showToast('Full name is required', 'error'); return; }
        if (!email) { showToast('Email is required', 'error'); return; }
        if (!phone) { showToast('Phone number is required', 'error'); return; }
        
        // Update currentUser
        currentUser.full_name = fullName;
        currentUser.email = email;
        currentUser.phone = phone;
        currentUser.updatedAt = new Date();
        
        // In a real app, send to API here
        showToast('Profile updated successfully!', 'success');
        loadProfile(); // Refresh UI
    }

    // Handle image upload
    function handleImageUpload(file) {
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                currentUser.user_image = reader.result;
                // Update avatar
                const placeholder = profileAvatar.parentElement.querySelector('.placeholder-icon');
                if (placeholder) placeholder.remove();
                profileAvatar.style.display = 'block';
                profileAvatar.src = currentUser.user_image;
                showToast('Profile image updated!', 'success');
                imageUploadStatus.textContent = 'Uploaded!';
                imageUploadStatus.classList.remove('hidden');
                setTimeout(() => imageUploadStatus.classList.add('hidden'), 2000);
            };
            reader.readAsDataURL(file);
        }
    }

    // Change password
    function changePassword() {
        const currentPwd = currentPasswordInput.value;
        const newPwd = newPasswordInput.value;
        const confirmPwd = confirmPasswordInput.value;
        
        if (!currentPwd) { showToast('Current password is required', 'error'); return; }
        if (!newPwd) { showToast('New password is required', 'error'); return; }
        if (newPwd.length < 6) { showToast('New password must be at least 6 characters', 'error'); return; }
        if (newPwd !== confirmPwd) { showToast('New passwords do not match', 'error'); return; }
        
        // In a real app, verify current password and update
        // For demo, just show success
        showToast('Password updated successfully!', 'success');
        currentPasswordInput.value = '';
        newPasswordInput.value = '';
        confirmPasswordInput.value = '';
    }

    // Cancel edit - reset form to current user data
    function cancelEdit() {
        fullNameInput.value = currentUser.full_name;
        emailInput.value = currentUser.email;
        phoneInput.value = currentUser.phone;
        showToast('Changes discarded', 'info');
    }

    // Event Listeners
    saveProfileBtn.addEventListener('click', saveProfile);
    cancelEditBtn.addEventListener('click', cancelEdit);
    changePasswordBtn.addEventListener('click', changePassword);
    
    imageUploadInput.addEventListener('change', (e) => {
        if (e.target.files && e.target.files[0]) {
            handleImageUpload(e.target.files[0]);
        }
    });

    // Dark mode detection
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
    }

    // Initialize profile
    loadProfile();
</script>

<style>
    /* Smooth transitions */
    #toast {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    #toast.hidden {
        transform: translateY(1rem);
        opacity: 0;
        pointer-events: none;
    }
    .main-content {
        transition: background-color 0.2s ease;
    }
    input, button {
        transition: all 0.2s ease;
    }
</style>

<?php $content = ob_get_clean(); 
include '../../includes/header.php'; 
include '../../includes/sidebar.php'; 
echo '<div class="main-content min-h-screen">';
echo $content; 
include '../../includes/footer.php'; ?>