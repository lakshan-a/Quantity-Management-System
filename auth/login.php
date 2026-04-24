<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: ../dashboard/index.php");
    exit();
}

$translations = [
    'en' => [
        'title' => 'Login | Qty Management',
        'heading' => 'Welcome Back',
        'subheading' => 'Sign in to continue to your account',
        'email' => 'Email Address',
        'password' => 'Password',
        'login_btn' => 'Sign In',
        'remember' => 'Remember me',
        'forgot' => 'Forgot password?',
        'no_account' => "Don't have an account?",
        'contact_admin' => 'Contact your administrator',
        'login_error' => 'Invalid email or password'
    ],
    'si' => [
        'title' => 'පිවිසුම | ප්‍රමාණ කළමනාකරණය',
        'heading' => 'සාදරයෙන් පිළිගනිමු',
        'subheading' => 'ඔබගේ ගිණුමට පිවිසෙන්න',
        'email' => 'විද්‍යුත් තැපෑල',
        'password' => 'මුරපදය',
        'login_btn' => 'පුරනය වන්න',
        'remember' => 'මාව මතක තබා ගන්න',
        'forgot' => 'මුරපදය අමතක වුණාද?',
        'no_account' => 'ගිණුමක් නැද්ද?',
        'contact_admin' => 'පරිපාලක අමතන්න',
        'login_error' => 'වලංගු නොවන විද්‍යුත් තැපෑලක් හෝ මුරපදයක්'
    ],
    'ta' => [
        'title' => 'உள்நுழைவு | அளவு மேலாண்மை',
        'heading' => 'மீண்டும் வரவேற்கிறோம்',
        'subheading' => 'உங்கள் கணக்கில் உள்நுழைக',
        'email' => 'மின்னஞ்சல் முகவரி',
        'password' => 'கடவுச்சொல்',
        'login_btn' => 'உள்நுழைக',
        'remember' => 'என்னை நினைவில் கொள்',
        'forgot' => 'கடவுச்சொல் மறந்துவிட்டதா?',
        'no_account' => 'கணக்கு இல்லையா?',
        'contact_admin' => 'உங்கள் நிர்வாகியை தொடர்பு கொள்ளவும்',
        'login_error' => 'தவறான மின்னஞ்சல் அல்லது கடவுச்சொல்'
    ]
];

$lang = $_GET['lang'] ?? ($_COOKIE['user_lang'] ?? 'en');
setcookie('user_lang', $lang, time() + (86400 * 30), "/");
$t = $translations[$lang];

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($email === 'admin@example.com' && $password === 'password') {
        $_SESSION['user_id'] = 1;
        $_SESSION['user_name'] = 'Admin User';
        $_SESSION['user_role'] = 'admin';
        $_SESSION['business_id'] = 1;
        header("Location: ../dashboard/index.php");
        exit();
    } else {
        $error = $t['login_error'];
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
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .input-field {
        transition: all 0.3s ease;
    }

    .input-field:focus {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(99,102,241,0.25);
    }

    .login-btn {
        transition: all 0.3s ease;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(79,70,229,0.35);
    }
</style>
</head>

<body class="min-h-screen flex bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex items-center justify-center p-4">

<div class="glass-card w-full max-w-md rounded-3xl shadow-2xl md:p-8 p-4 text-white">
    
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

    <!-- Error -->
    <?php if($error): ?>
        <div class="bg-red-500/20 border border-red-300 text-white px-4 py-3 rounded-xl mb-5 text-sm">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" class="space-y-5">
        
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

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
                <input type="checkbox" class="rounded">
                <span><?php echo $t['remember']; ?></span>
            </label>
            <a href="#" class="text-blue-300 hover:text-white hover:underline"><?php echo $t['forgot']; ?></a>
        </div>

        <button type="submit"
            class="login-btn w-full py-3 rounded-xl bg-white text-indigo-700 font-semibold text-lg">
            <?php echo $t['login_btn']; ?>
        </button>

        <div class="text-center text-sm text-white/80 pt-2">
            <div class="flex gap-1 items-center justify-center">
                <p><?php echo $t['no_account']; ?></p>
            <a href="#" class="font-medium text-blue-300 hover:text-white hover:underline"><?php echo $t['contact_admin']; ?></p>
            </div>
            
            <p class="mt-2 text-xs">Demo: admin@example.com / password</p>
        </div>
    </form>
</div>

</body>
</html>