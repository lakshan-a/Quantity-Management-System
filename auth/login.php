<?php
// ============================================
// File: auth/login.php - Login Page
// Description: User authentication interface
// ============================================
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: ../dashboard/index.php");
    exit();
}

// Language translations
$translations = [
    'en' => [
        'title' => 'Login | Qty Management',
        'heading' => 'Sign in to your account',
        'email' => 'Email Address',
        'password' => 'Password',
        'login_btn' => 'Sign In',
        'remember' => 'Remember me',
        'forgot' => 'Forgot password?',
        'no_account' => "Don't have an account?",
        'contact_admin' => 'Contact your administrator',
        'language' => 'Language',
        'english' => 'English',
        'sinhala' => 'Sinhala',
        'tamil' => 'Tamil',
        'login_error' => 'Invalid email or password'
    ],
    'si' => [
        'title' => 'පිවිසුම | ප්‍රමාණ කළමනාකරණය',
        'heading' => 'ඔබේ ගිණුමට පුරනය වන්න',
        'email' => 'විද්‍යුත් තැපෑල',
        'password' => 'මුරපදය',
        'login_btn' => 'පුරනය වන්න',
        'remember' => 'මාව මතක තබා ගන්න',
        'forgot' => 'මුරපදය අමතක වුණාද?',
        'no_account' => 'ගිණුමක් නැද්ද?',
        'contact_admin' => 'පරිපාලක අමතන්න',
        'language' => 'භාෂාව',
        'english' => 'ඉංග්‍රීසි',
        'sinhala' => 'සිංහල',
        'tamil' => 'දෙමළ',
        'login_error' => 'වලංගු නොවන විද්‍යුත් තැපෑලක් හෝ මුරපදයක්'
    ],
    'ta' => [
        'title' => 'உள்நுழைவு | அளவு மேலாண்மை',
        'heading' => 'உங்கள் கணக்கில் உள்நுழையவும்',
        'email' => 'மின்னஞ்சல் முகவரி',
        'password' => 'கடவுச்சொல்',
        'login_btn' => 'உள்நுழைக',
        'remember' => 'என்னை நினைவில் கொள்',
        'forgot' => 'கடவுச்சொல் மறந்துவிட்டதா?',
        'no_account' => 'கணக்கு இல்லையா?',
        'contact_admin' => 'உங்கள் நிர்வாகியை தொடர்பு கொள்ளவும்',
        'language' => 'மொழி',
        'english' => 'ஆங்கிலம்',
        'sinhala' => 'சிங்களம்',
        'tamil' => 'தமிழ்',
        'login_error' => 'தவறான மின்னஞ்சல் அல்லது கடவுச்சொல்'
    ]
];

$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['user_lang']) ? $_COOKIE['user_lang'] : 'en');
setcookie('user_lang', $lang, time() + (86400 * 30), "/");
$t = $translations[$lang];

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate authentication - In real app, check database
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo $t['title']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        @media (max-width: 640px) {
            .login-card { margin: 1rem; padding: 1.5rem; }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white rounded-2xl shadow-2xl p-8 login-card">
            <!-- Language Switcher -->
            <div class="flex justify-end gap-2">
                <a href="?lang=en" class="px-2 py-1 text-xs rounded <?php echo $lang=='en'?'bg-indigo-600 text-white':'bg-gray-200'; ?>">EN</a>
                <a href="?lang=si" class="px-2 py-1 text-xs rounded <?php echo $lang=='si'?'bg-indigo-600 text-white':'bg-gray-200'; ?>">SI</a>
                <a href="?lang=ta" class="px-2 py-1 text-xs rounded <?php echo $lang=='ta'?'bg-indigo-600 text-white':'bg-gray-200'; ?>">TA</a>
            </div>
            
            <div class="text-center">
                <div class="mx-auto h-12 w-12 bg-indigo-100 rounded-full flex items-center justify-center">
                    <span class="text-indigo-600 text-2xl font-bold">Q</span>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900"><?php echo $t['heading']; ?></h2>
            </div>
            
            <?php if($error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo $error; ?></span>
                </div>
            <?php endif; ?>
            
            <form class="mt-8 space-y-6" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only"><?php echo $t['email']; ?></label>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="<?php echo $t['email']; ?>">
                    </div>
                    <div>
                        <label for="password" class="sr-only"><?php echo $t['password']; ?></label>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                            placeholder="<?php echo $t['password']; ?>">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900"><?php echo $t['remember']; ?></label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"><?php echo $t['forgot']; ?></a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <?php echo $t['login_btn']; ?>
                    </button>
                </div>
                
                <div class="text-center text-sm text-gray-500">
                    <p><?php echo $t['no_account']; ?> <span class="text-indigo-600"><?php echo $t['contact_admin']; ?></span></p>
                    <p class="mt-2 text-xs">Demo: admin@example.com / password</p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>