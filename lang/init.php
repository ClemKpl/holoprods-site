<?php
session_start();

// 1. Check URL param '?lang=en'
if (isset($_GET['lang'])) {
    $lang_code = $_GET['lang'];
    // Validaiton simple
    if ($lang_code != 'fr' && $lang_code != 'en') {
        $lang_code = 'fr';
    }
    // Update Session & Cookie (30 days)
    $_SESSION['lang'] = $lang_code;
    setcookie('lang', $lang_code, time() + (86400 * 30), "/"); // 86400 = 1 day

    // Redirect to clean URL (optional, improves UX to remove ?lang=xx)
    // But user might want to see it changed. Let's keep parameter for now or redirect to same page without param.
    // Making it simple first: just use the session next time.
}
// 2. Check Session
else if (isset($_SESSION['lang'])) {
    $lang_code = $_SESSION['lang'];
}
// 3. Check Cookie
else if (isset($_COOKIE['lang'])) {
    $lang_code = $_COOKIE['lang'];
    $_SESSION['lang'] = $lang_code;
}
// 4. Check Browser Language (Optional, smart detection)
else {
    $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($browser_lang == 'en') {
        $lang_code = 'en';
    } else {
        $lang_code = 'fr'; // Default
    }
}

// Load the language file
$lang_file = __DIR__ . '/' . $lang_code . '.php';
if (file_exists($lang_file)) {
    require_once $lang_file;
} else {
    require_once __DIR__ . '/fr.php'; // Fallback
}
?>