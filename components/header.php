<?php
if (!headers_sent()) {
    header("Content-Security-Policy: default-src 'self'; base-uri 'self'; frame-ancestors 'none'; object-src 'none'; form-action 'self'; script-src 'self' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; style-src-attr 'unsafe-inline'; font-src 'self' https://fonts.gstatic.com data:; img-src 'self' data: blob:; worker-src 'self' blob: https://cdn.jsdelivr.net; connect-src 'self' https://cdn.jsdelivr.net; media-src 'self' blob:; upgrade-insecure-requests");
    header('X-Frame-Options: DENY');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
    header('Cross-Origin-Opener-Policy: same-origin');
    header('X-Content-Type-Options: nosniff');
}
$pageTitle = $pageTitle ?? APP_NAME;
$activeNav = $activeNav ?? 'Dashboard';
$navItems = [
    'Dashboard' => 'index.php', 'My Studies' => 'pages/studies.php',
    'AI Reviewer' => 'pages/reviewer.php', 'Flashcards' => 'pages/flashcards.php',
    'Quiz' => 'pages/quiz.php', 'Mistake Review' => 'pages/mistakes.php',
    'Study Planner' => 'pages/planner.php', 'Study Timer' => 'pages/timer.php',
    'Progress' => 'pages/progress.php', 'Achievements' => 'pages/achievements.php',
    'Discover' => 'pages/community.php', 'Friends' => 'pages/friends.php',
    'Messages' => 'pages/messages.php', 'Stories' => 'pages/stories.php', 'Calls' => 'pages/calls.php',
    'Study Groups' => 'pages/groups.php', 'MindClust AI' => 'pages/assistant.php',
];
$studyNav = ['Dashboard', 'My Studies', 'AI Reviewer', 'Flashcards', 'Quiz', 'Mistake Review', 'Study Planner', 'Study Timer', 'Progress', 'Achievements'];
?>
<!doctype html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102A27">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="MindClust">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= e(app_url('assets/images/apple-touch-icon.png')) ?>">
    <meta name="description" content="MindClust brings your study tools and study community together.">
    <title><?= e($pageTitle) ?> · MindClust</title>
    <link rel="manifest" href="<?= e(app_url('manifest.webmanifest')) ?>">
    <link rel="icon" href="<?= e(app_url('assets/images/icon.svg')) ?>" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= e(app_url('assets/css/app.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('assets/css/features.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('assets/css/assistant.css')) ?>">
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<header class="topbar">
    <button class="nav-drawer-toggle" type="button" aria-label="Open navigation" aria-controls="main-sidebar" aria-expanded="false"><span aria-hidden="true">☰</span></button>
    <a class="brand" href="<?= e(app_url('index.php')) ?>" aria-label="MindClust dashboard">
        <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span></span>
        <span>mind<span class="brand-light">clust</span></span>
    </a>
    <div class="search-box"><span class="header-search-icon"><?= mindclust_icon('search') ?></span><input type="search" id="site-search" list="site-search-options" placeholder="Search people, subjects, or groups..." aria-label="Search people, subjects, groups, and study tools"><datalist id="site-search-options"><?php foreach ($navItems as $label => $href): ?><option value="<?= e($label) ?>"></option><?php endforeach; ?></datalist><kbd>↵</kbd></div>
    <div class="top-actions">
        <a class="download-link" href="<?= e(app_url('downloads/MindClust-source.zip')) ?>" download="MindClust-source.zip" aria-label="Download MindClust project ZIP" title="Download MindClust project ZIP"><?= mindclust_icon('download') ?><span>Download</span></a>
        <a class="icon-button" href="<?= e(app_url('pages/friends.php')) ?>" aria-label="Friends" title="Friends"><?= mindclust_icon('users') ?></a>
        <a class="icon-button" href="<?= e(app_url('pages/messages.php')) ?>" aria-label="Messages" title="Messages"><?= mindclust_icon('mail') ?></a>
        <a class="icon-button notice-button" data-unread="0" href="<?= e(app_url('pages/notifications.php')) ?>" aria-label="Notifications" title="Notifications"><?= mindclust_icon('bell') ?></a>
        <button class="theme-toggle" type="button" aria-label="Switch color theme" title="Switch color theme"><span class="theme-icon-sun"><?= mindclust_icon('sun') ?></span><span class="theme-icon-moon" hidden><?= mindclust_icon('moon') ?></span></button>
        <details class="profile-menu">
            <summary aria-label="Profile menu"><span class="avatar">G</span><span class="online-dot" title="Online" hidden></span></summary>
            <div class="menu-panel"><strong>Guest profile</strong><span class="menu-caption">Your space, your pace.</span><a data-auth-link href="<?= e(app_url('pages/login.php')) ?>">Log in or create account</a><a data-logout-link href="#" hidden>Log out</a>
                <a href="<?= e(app_url('pages/profile.php')) ?>">My Profile</a><a href="<?= e(app_url('pages/profile.php')) ?>">Edit Profile</a><a href="<?= e(app_url('pages/profile.php')) ?>">Guest Profiles</a><a href="<?= e(app_url('pages/settings.php')) ?>">Online Status</a><a href="<?= e(app_url('pages/settings.php')) ?>">Settings</a><a href="<?= e(app_url('pages/settings.php')) ?>">Theme Preferences</a><a href="<?= e(app_url('pages/settings.php')) ?>">Export Backup</a><a href="<?= e(app_url('pages/profile.php')) ?>">Switch Profile</a>
            </div>
        </details>
    </div>
</header>
<div class="app-shell">
    <aside class="sidebar" id="main-sidebar" aria-label="Main navigation">
        <p class="nav-label">YOUR SPACE</p>
        <nav aria-label="Main sections">
            <div class="nav-group"><p class="nav-label">MY STUDY</p><?php foreach ($studyNav as $label): $href = $navItems[$label]; ?><a class="nav-link<?= $activeNav === $label ? ' active' : '' ?>"<?= $activeNav === $label ? ' aria-current="page"' : '' ?> href="<?= e(app_url($href)) ?>"><?= mindclust_icon(['Dashboard'=>'home','My Studies'=>'book','AI Reviewer'=>'sparkles','Flashcards'=>'cards','Quiz'=>'check','Mistake Review'=>'mistakes','Study Planner'=>'calendar','Study Timer'=>'timer','Progress'=>'chart','Achievements'=>'award'][$label]) ?><span class="nav-link-label"><?= e($label) ?></span></a><?php endforeach; ?></div>
            <div class="nav-group"><p class="nav-label">DISCOVER</p><?php foreach (['Discover','Study Groups'] as $label): $href = $navItems[$label]; ?><a class="nav-link<?= $activeNav === $label ? ' active' : '' ?>"<?= $activeNav === $label ? ' aria-current="page"' : '' ?> href="<?= e(app_url($href)) ?>"><?= mindclust_icon(['Discover'=>'search','Study Groups'=>'users'][$label]) ?><span class="nav-link-label"><?= e($label) ?></span></a><?php endforeach; ?></div>
            <div class="nav-group"><p class="nav-label">CONNECTIONS</p><?php foreach (['Friends','Messages','Calls'] as $label): $href = $navItems[$label]; ?><a class="nav-link<?= $activeNav === $label ? ' active' : '' ?>"<?= $activeNav === $label ? ' aria-current="page"' : '' ?> href="<?= e(app_url($href)) ?>"><?= mindclust_icon(['Friends'=>'users','Messages'=>'message','Calls'=>'phone'][$label]) ?><span class="nav-link-label"><?= e($label) ?></span><?php if ($label === 'Messages'): ?><span class="nav-link-badge" id="messages-unread" hidden></span><?php endif; ?></a><?php endforeach; ?></div>
            <div class="nav-group"><p class="nav-label">COMMUNITY UPDATES</p><?php $label = 'Stories'; $href = $navItems[$label]; ?><a class="nav-link<?= $activeNav === $label ? ' active' : '' ?>"<?= $activeNav === $label ? ' aria-current="page"' : '' ?> href="<?= e(app_url($href)) ?>"><?= mindclust_icon('stories') ?><span class="nav-link-label"><?= e($label) ?></span></a></div>
            <div class="nav-group"><p class="nav-label">AI ASSISTANT</p><?php $label = 'MindClust AI'; $href = $navItems[$label]; ?><a class="nav-link<?= $activeNav === $label ? ' active' : '' ?>"<?= $activeNav === $label ? ' aria-current="page"' : '' ?> href="<?= e(app_url($href)) ?>"><?= mindclust_icon('bot') ?><span class="nav-link-label"><?= e($label) ?></span></a></div>
        </nav>
        <div class="sidebar-note"><span class="note-spark">✳</span><strong>A little progress adds up.</strong><p>Make today count, one focused session at a time.</p><a href="<?= e(app_url('pages/planner.php')) ?>">Plan a study session <span>↗</span></a></div>
    </aside>
    <button class="sidebar-overlay" type="button" aria-label="Close navigation" tabindex="-1"></button>
    <main id="main" class="main-content">
