<?php
require_once __DIR__.'/comp_header.php';
?>

<main id="index">

    <h1>Welcome! Find a flexible flight for your next trip.</h1>

    <div id="flight_search">
        <form>
            <div id="search_container">
                <div id="from_container">
                    <input id="from_input" name="from_city_name" type="text" placeholder="From?" 
                    oninput="showFromResults()"
                    onblur="hideFromResults()">
                    <div id="from_results"></div>
                </div>
                <div id="to_container">
                    <input id="to_input" name="to_city_name" type="text" placeholder="To?" 
                    oninput="showToResults()"
                    onblur="hideToResults()">
                    <div id="to_results"></div>
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