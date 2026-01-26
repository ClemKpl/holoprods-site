<?php
require_once 'lang/init.php';
$page_title = "Solutions - Holoprods";
$page_subtitle = $lang['solutions_title']; // Translated subtitle
require_once 'header.php';
?>

<main class="page-content" style="padding-top: 120px; min-height: 80vh;">
    <!-- Contenu vierge -->
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1><?php echo $lang['solutions_title']; ?></h1>
        <p><?php echo $lang['solutions_text']; ?></p>
    </div>
</main>

<?php require_once 'footer.php'; ?>