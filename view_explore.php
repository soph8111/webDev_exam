<?php
$_title = "Explore";
require_once __DIR__.'/_x.php';
require_once __DIR__.'/comp_dictionary.php';
require_once __DIR__.'/comp_header.php';
?>

<main id="explore">


<div id="parallax">
    <div class="static_form">
        <form>
            <div class="static_search_container">
                <input type="text" placeholder="From?">
                <input type="text" placeholder="Anywhere">
                <input type="text" placeholder="Any time, any duration">
                <button class="search_button"><?=$dictionary[$lang.'_search']?></button>
            </div>
        </form>
    </div>
    <div class="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=copenhagen&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;}</style></div></div>
    <div class="explore_destinations_container">
        <div class="explore_background">
        <h2>Explore destinations</h2>
        <p>from Copenhagen</p>
            <div class="explore_destinations mgt_2">
                    <div class="explore_destination">
                        <div class="explore_card_img">
                            <img src="images/static_pages/gdansk.jpg" alt="image">
                        </div>
                        <div class="explore_card_info">
                            <div class="explore_bold">
                                <p>Gdansk</p>
                                <p>from £21</p>
                            </div>
                            <div class="explore_thin">
                                <p>Poland</p>
                                <p>Sat, 22 Oct - Tue, 25 Oct</p>
                            </div>
                        </div>
                    </div>

                    <div class="explore_destination">
                        <div class="explore_card_img">
                            <img src="images/static_pages/london.jpg" alt="image">
                        </div>
                        <div class="explore_card_info">
                            <div class="explore_bold">
                                <p>London</p>
                                <p>from £24</p>
                            </div>
                            <div class="explore_thin">
                                <p>United Kingdom</p>
                                <p>Sat, 12 Nov - Sat, 19 Nov</p>
                            </div>
                        </div>
                    </div>

                    <div class="explore_destination">
                        <div class="explore_card_img">
                            <img src="images/static_pages/manchester.jpg" alt="image">
                        </div>
                        <div class="explore_card_info">
                            <div class="explore_bold">
                                <p>Manchester</p>
                                <p>from £28</p>
                            </div>
                            <div class="explore_thin">
                                <p>United Kingdom</p>
                                <p>Mon, 14 Nov - Mon, 21 Nov</p>
                            </div>
                        </div>
                    </div>

                    <div class="explore_destination">
                        <div class="explore_card_img">
                            <img src="images/static_pages/warsaw.jpg" alt="image">
                        </div>
                        <div class="explore_card_info">
                            <div class="explore_bold">
                                <p>Warsaw</p>
                                <p>from £29</p>
                            </div>
                            <div class="explore_thin">
                                <p>Poland</p>
                                <p>Sun, 23 Oct - Thu, 27 Oct</p>
                            </div>
                        </div>
                    </div>

                    <div class="explore_destination">
                        <div class="explore_card_img">
                            <img src="images/static_pages/bratislava.jpg" alt="image">
                        </div>
                        <div class="explore_card_info">
                            <div class="explore_bold">
                                <p>Bratislava</p>
                                <p>from £31</p>
                            </div>
                            <div class="explore_thin">
                                <p>Slovakia</p>
                                <p>Sat, 5 Nov - Mon, 7 Nov</p>
                            </div>
                        </div>
                    </div>

                    <div class="explore_destination">
                        <div class="explore_card_img">
                            <img src="images/static_pages/aalborg.jpg" alt="image">
                        </div>
                        <div class="explore_card_info">
                            <div class="explore_bold">
                                <p>Aalborg</p>
                                <p>from £36</p>
                            </div>
                            <div class="explore_thin">
                                <p>Denmark</p>
                                <p>Mon, 17 Oct - Mon, 24 Oct</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>