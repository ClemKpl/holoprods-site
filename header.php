<?php require_once 'lang/init.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang_code ?? 'fr'; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holoprods</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@200;300;400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Preload Critical Hero Image -->
    <link rel="preload" as="image" href="assets/Section-Hero-Index.png">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="<?php echo isset($body_class) ? $body_class : ''; ?>">

    <!-- Header -->
    <header class="site-header" id="main-header">
        <div class="glass-bar">
            <!-- Logo Section -->
            <a class="brand" href="index.php"
                style="text-decoration: none; display: flex; align-items: center; gap: 12px;">
                <span class="logo" aria-hidden="true">
                    <img src="assets/logo-couleurs.png" alt="Holoprods Logo" width="48" height="48">
                </span>
                <div class="brand-text-container" style="display: flex; flex-direction: column;">
                    <span class="brand-text"
                        style="font-weight: 800; font-size: 1.5rem; color: #555; letter-spacing: -1px; font-family: 'Outfit', sans-serif; text-transform: uppercase; line-height: 0.8;">HOLOPRODS</span>
                    <?php if (isset($page_subtitle) && !empty($page_subtitle)): ?>
                        <span class="brand-subtitle"
                            style="font-size: 1.5rem; color: #999; font-weight: 400; line-height: 0.8; margin-top: 0px; letter-spacing: -0.5px; font-family: 'Outfit', sans-serif;">
                            <?php echo htmlspecialchars($page_subtitle); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </a>

            <!-- Desktop Navigation Actions -->
            <nav class="main-nav">
                <ul class="nav-list">
                    <li>
                        <a href="ambition.php" class="nav-link">
                            <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 12px;">
                                <path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2z"></path>
                            </svg>
                            Ambition
                        </a>
                    </li>
                    <li>
                        <a href="contact.php" class="nav-link">
                            <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 12px;">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="offre.php" class="nav-link">
                            <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 12px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <?php echo $lang['offer']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="realisations.php" class="nav-link">
                            <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 12px;">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                            </svg>
                            <?php echo $lang['realisations']; ?>
                        </a>
                    </li>
                    <li class="nav-item-dropdown">
                        <a href="solutions.php" class="nav-link dropdown-trigger">
                            <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 12px;">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                            <?php echo $lang['solutions']; ?>
                        </a>
                        <ul class="dropdown-menu glass-panel">
                            <li>
                                <a href="restauration.php">
                                    <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" style="margin-right: 8px; vertical-align: middle;">
                                        <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                        <line x1="6" y1="1" x2="6" y2="4"></line>
                                        <line x1="10" y1="1" x2="10" y2="4"></line>
                                        <line x1="14" y1="1" x2="14" y2="4"></line>
                                    </svg>
                                    <?php echo $lang['restauration']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="industrie.php">
                                    <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" style="margin-right: 8px; vertical-align: middle;">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg>
                                    <?php echo $lang['industrie']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="experience-client.php">
                                    <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" style="margin-right: 8px; vertical-align: middle;">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <?php echo $lang['experience_client']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="enregistrement.php">
                                    <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" style="margin-right: 8px; vertical-align: middle;">
                                        <path
                                            d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                        </path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                    </svg>
                                    <?php echo $lang['enregistrement']; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <nav class="header-actions" aria-label="Actions principales">
                <a class="phone-link" href="tel:+33651778406">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" width="18" height="18">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>
                    <span class="text">06 51 77 84 06</span>
                </a>

                <a class="btn-contact-dark" href="contact.php">
                    <svg class="icon-send" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" width="18" height="18"
                        style="margin-right: 6px;">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    <span><?php echo $lang['contact_btn']; ?></span>
                </a>

                <div class="lang-selector">
                    <button class="lang-btn" type="button" aria-label="Select Language">
                        <?php if ($lang_code == 'en'): ?>
                            <img src="assets/Angleterre.png" alt="EN" class="lang-flag">
                        <?php else: ?>
                            <img src="assets/France.png" alt="FR" class="lang-flag">
                        <?php endif; ?>

                        <span class="code"><?php echo strtoupper($lang_code); ?></span>

                        <svg class="chevron" width="10" height="6" viewBox="0 0 10 6" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 1L5 5L9 1" />
                        </svg>
                    </button>
                    <div class="lang-dropdown">
                        <a href="?lang=fr" class="lang-option <?php echo ($lang_code == 'fr') ? 'active' : ''; ?>">
                            <img src="assets/France.png" alt="FR" class="lang-flag-sm">
                            <span>Français</span>
                        </a>
                        <a href="?lang=en" class="lang-option <?php echo ($lang_code == 'en') ? 'active' : ''; ?>">
                            <img src="assets/Angleterre.png" alt="EN" class="lang-flag-sm">
                            <span>English</span>
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn" aria-label="Menu Principal">
                    <svg class="icon-menu" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <!-- Mobile Navigation (Outside Header for Fixed Positioning) -->
    <nav class="mobile-nav">
        <div class="mobile-nav-header" style="display: flex; justify-content: flex-end; padding: 1rem; width: 100%;">
            <button class="mobile-menu-close-btn"
                style="background: none; border: none; font-size: 2rem; cursor: pointer; color: #333;">&times;</button>
        </div>
        <ul class="nav-list">
            <li>
                <a href="ambition.php" class="nav-link">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 12px;">
                        <path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2z"></path>
                    </svg>
                    <?php echo $lang['ambition']; ?>
                </a>
            </li>
            <li>
                <a href="contact.php" class="nav-link">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 12px;">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <?php echo $lang['contact']; ?>
                </a>
            </li>
            <li>
                <a href="offre.php" class="nav-link">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 12px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <?php echo $lang['offer']; ?>
                </a>
            </li>
            <li>
                <a href="realisations.php" class="nav-link">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 12px;">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                    <?php echo $lang['realisations']; ?>
                </a>
            </li>
            <li class="nav-item-dropdown">
                <a href="solutions.php" class="nav-link dropdown-trigger">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 12px;">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <?php echo $lang['solutions']; ?>
                </a>
                <ul class="dropdown-menu glass-panel">
                    <li>
                        <a href="restauration.php">
                            <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 8px; vertical-align: middle;">
                                <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                <line x1="6" y1="1" x2="6" y2="4"></line>
                                <line x1="10" y1="1" x2="10" y2="4"></line>
                                <line x1="14" y1="1" x2="14" y2="4"></line>
                            </svg>
                            <?php echo $lang['restauration']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="industrie.php">
                            <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 8px; vertical-align: middle;">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                            <?php echo $lang['industrie']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="experience-client.php">
                            <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 8px; vertical-align: middle;">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <?php echo $lang['experience_client']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="enregistrement.php">
                            <svg class="nav-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="margin-right: 8px; vertical-align: middle;">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                </path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                            <?php echo $lang['enregistrement']; ?>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="menu-overlay"></div>