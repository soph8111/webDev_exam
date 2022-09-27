<?php
$_title = "Page not found";
require_once __DIR__.'/_x.php';
require_once __DIR__.'/comp_dictionary.php';
require_once __DIR__.'/comp_header.php';
?>

<main id="page_not_found">

    <h1>404 Error</h1>
    <h2 style="text-align:center">Page not found</h2>

    <?php
    include_once __DIR__.'/comp_login-popup.php';
    ?>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>