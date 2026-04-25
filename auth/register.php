<?php
session_start();

$translations = [
    'en' => [
        'title' => 'Create Account | Qty Management',
        'heading' => 'Create Account',
        'subheading' => 'Register your new account to continue',
        'name' => 'Full Name',
        'email' => 'Email Address',
        'password' => 'Password',
        'confirm_password' => 'Confirm Password',
        'register_btn' => 'Create Account',
        'have_account' => 'Already have an account?',
        'login' => 'Sign In',
        'success' => 'Account created successfully!',
        'password_error' => 'Passwords do not match'
    ],
    'si' => [
        'title' => 'ගිණුමක් සාදන්න | ප්‍රමාණ කළමනාකරණය',
        'heading' => 'ගිණුමක් සාදන්න',
        'subheading' => 'ඉදිරියට යාම සඳහා නව ගිණුමක් සාදන්න',
        'name' => 'සම්පූර්ණ නම',
        'email' => 'විද්‍යුත් තැපෑල',
        'password' => 'මුරපදය',
        'confirm_password' => 'මුරපදය තහවුරු කරන්න',
        'register_btn' => 'ගිණුම සාදන්න',
        'have_account' => 'දැනටමත් ගිණුමක් තිබේද?',
        'login' => 'පුරනය වන්න',
        'success' => 'ගිණුම සාර්ථකව සාදන ලදී!',
        'password_error' => 'මුරපද නොගැලපේ'
    ],
    'ta' => [
        'title' => 'கணக்கு உருவாக்கு | அளவு மேலாண்மை',
        'heading' => 'கணக்கு உருவாக்கு',
        'subheading' => 'தொடர புதிய கணக்கை உருவாக்கவும்',
        'name' => 'முழுப்பெயர்',
        'email' => 'மின்னஞ்சல் முகவரி',
        'password' => 'கடவுச்சொல்',
        'confirm_password' => 'கடவுச்சொல்லை உறுதிப்படுத்து',
        'register_btn' => 'கணக்கு உருவாக்கு',
        'have_account' => 'ஏற்கனவே கணக்கு உள்ளதா?',
        'login' => 'உள்நுழைக',
        'success' => 'கணக்கு வெற்றிகரமாக உருவாக்கப்பட்டது!',
        'password_error' => 'கடவுச்சொற்கள் பொருந்தவில்லை'
    ]
];

$lang = $_GET['lang'] ?? ($_COOKIE['user_lang'] ?? 'en');
setcookie('user_lang', $lang, time() + (86400 * 30), "/");
$t = $translations[$lang];

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm_password) {
        $error = $t['password_error'];
    } else {
        $message = $t['success'];
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $t['title']; ?></title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
/* body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
} */

.glass-card {
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.18);
}

.input-field {
    transition: all 0.3s ease;
}

.input-field:focus {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(99,102,241,0.25);
}

.register-btn {
    transition: all 0.3s ease;
}

.register-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(79,70,229,0.35);
}
</style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex items-center justify-center p-4">

<div class="glass-card w-full max-w-md rounded-3xl shadow-2xl p-8 text-white">

    <!-- Language Switch -->
    <div class="flex justify-end gap-2 mb-6">
        <a href="?lang=en" class="px-3 py-1 rounded-full text-xs font-medium <?php echo $lang=='en'?'bg-white text-indigo-700':'bg-white/20 text-white'; ?>">EN</a>
        <a href="?lang=si" class="px-3 py-1 rounded-full text-xs font-medium <?php echo $lang=='si'?'bg-white text-indigo-700':'bg-white/20 text-white'; ?>">SI</a>
        <a href="?lang=ta" class="px-3 py-1 rounded-full text-xs font-medium <?php echo $lang=='ta'?'bg-white text-indigo-700':'bg-white/20 text-white'; ?>">TA</a>
    </div>

    <!-- Logo -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold"><?php echo $t['heading']; ?></h2>
        <p class="text-white/80 mt-2 text-sm"><?php echo $t['subheading']; ?></p>
    </div>

    <!-- Messages -->
    <?php if($error): ?>
        <div class="bg-red-500/20 border border-red-300 text-white px-4 py-3 rounded-xl mb-4 text-sm">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <?php if($message): ?>
        <div class="bg-green-500/20 border border-green-300 text-white px-4 py-3 rounded-xl mb-4 text-sm">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" class="space-y-4">

        <div class="relative">
            <span class="material-icons absolute left-4 top-3 text-white/70">person</span>
            <input type="text" name="name" required
                class="input-field w-full pl-12 pr-4 py-3 rounded-xl bg-white/15 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/30"
                placeholder="<?php echo $t['name']; ?>">
        </div>

        <div class="relative">
            <span class="material-icons absolute left-4 top-3 text-white/70">mail</span>
            <input type="email" name="email" required
                class="input-field w-full pl-12 pr-4 py-3 rounded-xl bg-white/15 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/30"
                placeholder="<?php echo $t['email']; ?>">
        </div>

        <div class="relative">
            <span class="material-icons absolute left-4 top-3 text-white/70">lock</span>
            <input type="password" name="password" required
                class="input-field w-full pl-12 pr-4 py-3 rounded-xl bg-white/15 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/30"
                placeholder="<?php echo $t['password']; ?>">
        </div>

        <div class="relative">
            <span class="material-icons absolute left-4 top-3 text-white/70">lock_outline</span>
            <input type="password" name="confirm_password" required
                class="input-field w-full pl-12 pr-4 py-3 rounded-xl bg-white/15 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/30"
                placeholder="<?php echo $t['confirm_password']; ?>">
        </div>

        <button type="submit"
            class="register-btn w-full py-3 rounded-xl bg-white text-indigo-700 font-semibold text-lg">
            <?php echo $t['register_btn']; ?>
        </button>

        <div class="text-center text-sm text-white/80 pt-2">
            <p><?php echo $t['have_account']; ?>
                <a href="login.php" class="font-medium text-blue-300 hover:text-white hover:underline">
                    <?php echo $t['login']; ?>
                </a>
            </p>
        </div>

    </form>
</div>

</body>
</html>