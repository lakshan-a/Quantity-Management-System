<?php
session_start();

$translations = [
    'en' => [
        'title' => 'Forgot Password | Qty Management',
        'heading' => 'Forgot Password?',
        'subheading' => 'Enter your email and we will send a reset link',
        'email' => 'Email Address',
        'reset_btn' => 'Send Reset Link',
        'back_login' => 'Back to Login',
        'success' => 'Password reset link sent successfully!'
    ],
    'si' => [
        'title' => 'මුරපදය අමතකද | ප්‍රමාණ කළමනාකරණය',
        'heading' => 'මුරපදය අමතකද?',
        'subheading' => 'ඔබගේ විද්‍යුත් තැපෑල ඇතුළත් කරන්න',
        'email' => 'විද්‍යුත් තැපෑල',
        'reset_btn' => 'Reset Link යවන්න',
        'back_login' => 'පිවිසුමට ආපසු',
        'success' => 'මුරපදය යළි සකස් කිරීමේ සබැඳිය යවන ලදී!'
    ],
    'ta' => [
        'title' => 'கடவுச்சொல் மறந்துவிட்டதா | அளவு மேலாண்மை',
        'heading' => 'கடவுச்சொல் மறந்துவிட்டதா?',
        'subheading' => 'உங்கள் மின்னஞ்சலை உள்ளிடவும்',
        'email' => 'மின்னஞ்சல் முகவரி',
        'reset_btn' => 'மீட்டமைப்பு இணைப்பை அனுப்பு',
        'back_login' => 'உள்நுழைவுக்கு திரும்பு',
        'success' => 'கடவுச்சொல் மீட்டமைப்பு இணைப்பு அனுப்பப்பட்டது!'
    ]
];

$lang = $_GET['lang'] ?? ($_COOKIE['user_lang'] ?? 'en');
setcookie('user_lang', $lang, time() + (86400 * 30), "/");
$t = $translations[$lang];

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    
    // Simulate sending reset link
    if (!empty($email)) {
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

.reset-btn {
    transition: all 0.3s ease;
}

.reset-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(79,70,229,0.35);
}
</style>
</head>

<body class="min-h-screen flex bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex items-center justify-center p-4">

<div class="glass-card w-full max-w-md rounded-3xl shadow-2xl p-8 text-white">

    <!-- Language Switch -->
    <div class="flex justify-end gap-2 mb-6">
        <a href="?lang=en" class="px-3 py-1 rounded-full text-xs font-medium <?php echo $lang=='en'?'bg-white text-indigo-700':'bg-white/20 text-white'; ?>">EN</a>
        <a href="?lang=si" class="px-3 py-1 rounded-full text-xs font-medium <?php echo $lang=='si'?'bg-white text-indigo-700':'bg-white/20 text-white'; ?>">SI</a>
        <a href="?lang=ta" class="px-3 py-1 rounded-full text-xs font-medium <?php echo $lang=='ta'?'bg-white text-indigo-700':'bg-white/20 text-white'; ?>">TA</a>
    </div>

    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold"><?php echo $t['heading']; ?></h2>
        <p class="text-white/80 mt-2 text-sm"><?php echo $t['subheading']; ?></p>
    </div>

    <!-- Success Message -->
    <?php if($message): ?>
        <div class="bg-green-500/20 border border-green-300 text-white px-4 py-3 rounded-xl mb-5 text-sm">
            <?php echo $message; ?>
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

        <button type="submit"
            class="reset-btn w-full py-3 rounded-xl bg-white text-indigo-700 font-semibold text-lg">
            <?php echo $t['reset_btn']; ?>
        </button>

        <div class="text-center text-sm text-white/80 pt-2">
            <a href="login.php" class="font-medium text-blue-300 hover:text-white hover:underline">
                <?php echo $t['back_login']; ?>
            </a>
        </div>

    </form>
</div>

</body>
</html>