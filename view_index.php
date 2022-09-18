<?php
require_once __DIR__.'/comp_header.php';
?>

<main id="index">

    <h1>Welcome! Find a flexible flight for your next trip.</h1>

    <div id="flight-search">
        <form>
            <div id="search_container">
                <div id="from-container">
                    <input id="from-input" name="from" type="text" placeholder="From?" 
                    oninput="showFromResults()"
                    onblur="hideFromResults()">
                    <div id="from-results"></div>
                </div>
                <div id="to-container">
                    <input id="to-input" name="to" type="text" placeholder="To?" 
                    oninput="showToResults()"
                    onblur="hideToResults()">
                    <div id="to-results"></div>
                </div>
            </div>
            <button id="search">Search</button>
        </form>
    </div>

    <div id="main">
        <div id="left"> 
            left
        </div>
        <div id="right">
            right
        </div>
    </div>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>