<?php
$_title = "Admin";
require_once __DIR__.'/comp_header.php';
?>

<main>

    <h1> <?= $_title ?? 'Title missing'?> </h1>

    <h2>Welcome 
        <?php
        session_start();
        echo $_SESSION['user_first_name'];
        ?>
    </h2>

    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit autem aspernatur, rem iste et facilis amet reprehenderit deleniti, veritatis quod voluptate consequatur modi quam libero saepe dolores sapiente odio minus?</p>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>