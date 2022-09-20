<?php
require_once __DIR__.'/_x.php';
require_once __DIR__.'/comp_dictionary.php';
require_once __DIR__.'/comp_header.php';
?>

<main id="index">

    <h1><?=$dictionary[$lang.'_welcome']?></h1>

    <div id="flight_search">
        <form>
            <div id="search_container">
                <div id="from_container">
                    <input id="from_input" name="from_city_name" type="text" placeholder="<?=$dictionary[$lang.'_from']?>?" 
                    oninput="showFromResults()">
                    <div id="from_results"></div>
                </div>
                <div id="to_container">
                    <input id="to_input" name="to_city_name" type="text" placeholder="<?=$dictionary[$lang.'_to']?>?" 
                    oninput="showToResults()">
                    <div id="to_results"></div>
                </div>
            </div>
            <button id="search" onclick="showFlightResults(); return false"><?=$dictionary[$lang.'_search']?></button>
        </form>
    </div>

    <div id="main">
        <div id="left"> 
            left
        </div>
        <div id="right">
            <h2 id="title_of_flight_search"></h2>
            <div id="flight_search_results"></div>
        </div>
    </div>

    <?php
    include_once __DIR__.'/comp_login-popup.php';
    ?>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>