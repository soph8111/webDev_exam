<?php
$_title = "Momondo";
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
        <div class="image_and_text">
            <div class="image_content">
                <img src="images/static_pages/live_happy.jpg" alt="Best of cph">
            </div>
            <div class="text_content">
                <h3>Live Happy and soar off this summer</h3>
                <p>Calling all sun and deal seekers! Get first dibs on flights available until April 2024</p>
                <button>Book now</button>
            </div>
        </div>

        <div class="map mgt_3">
            <h3>Top attractions in Copenhagen</h3>
            <div class="experiences_container">
                <div class="experiences">
                    <div class="experience">
                        <img src="images/static_pages/experience_one.jpg" alt="experience">
                        <div>
                            <p>Thorvaldsens Museum</p>
                            <button>View experiences</button>
                        </div>
                    </div>
                    <div class="experience">
                        <img src="images/static_pages/experience_two.jpg" alt="experience">
                        <div>
                            <p>Copenhagen City Hall</p>
                            <button>View experiences</button>
                        </div>
                    </div>
                    <div class="experience">
                        <img src="images/static_pages/experience_three.jpg" alt="experience">
                        <div>
                            <p>Kongens Nytorv</p>
                            <button>View experiences</button>
                        </div>
                    </div>
                    <div class="experience">
                        <img src="images/static_pages/experience_four.jpg" alt="experience">
                        <div>
                            <p>Stroeget</p>
                            <button>View experiences</button>
                        </div>
                    </div>
                </div>
                <div class="mapouter mgt_1"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=667&amp;height=456&amp;hl=en&amp;q=copenhagen&amp;t=p&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpenation.com/">https://mcpenation.com</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:456px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:456px;}.gmap_iframe {height:456px!important;}</style></div>
            </div>
        </div>

        <div class="explore mgt_3" >
            <h2>Travel inspiration</h2>
            <p class="exlpore_date mgt_05">Our latest travel tips, expert hacks and industry insights to help make your journey one to remember</p>

            <div class="slideshow_container">
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
                <div class="mySlides_container mgt_1">
                    <div class="mySlides">
                        <img src="images/static_pages/travel_inspo_one.jpg">
                        <div class="text">
                            <p>Coronavirus update: What do the US travel restrictions mean for me?</p>
                            <p>May 6, 2020 - 3 min</p>
                        </div>
                    </div>
                    <div class="mySlides">
                        <img src="images/static_pages/travel_inspo_two.jpg">
                        <div class="text">
                            <p>What to know about coronavirus (COVID-19) and travel</p>
                            <p>Jan 7, 2021 - 2 min</p>
                        </div>
                    </div>
                    <div class="mySlides">
                        <img src="images/static_pages/travel_inspo_three.jpg">
                        <div class="text">
                            <p>10 sustainable destinations to put on your bucket list</p>
                            <p>May 6, 2020 - 10 min</p>
                        </div>
                    </div> 
                </div> 
            </div>

        <div class="text_and_content_small mgt_3">
            <h3>Trending cities for hotels</h3>
            <p class="intro mgt_1" >The most searched for hotel destinations on momondo</p>

            <div class="small_cards mgt_2">
                <div class="small_card">
                    <img src="images/static_pages/amsterdam.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Amsterdam</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/brighton.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Brighton</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/mallorca.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Palma de Mallorca</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/rome.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Rome</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/gatwick.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Gatwick</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/belfast.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Belfast</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/lisbon.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Lisbon</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/singapore.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Singapore</p>
                    </div>
                </div>
                <div class="small_card">
                    <img src="images/static_pages/bangkok.jpg" alt="">
                    <div class="text_content">
                        <p>Hotels in</p>
                        <p>Bangkok</p>
                    </div>
                </div>
            <div class="small_cards">
        </div>

    </div>

</main>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
</script>

<?php
require_once __DIR__.'/comp_footer.php';
?>