<?php
$_title = "Things to do";
require_once __DIR__.'/_x.php';
require_once __DIR__.'/comp_header.php';
?>

<main id="things_to_do">

    <h1>Find the best things to do for your trip.</h1>

    <div class="static_form">
        <form>
            <div class="static_search_container">
                <input type="text" placeholder="Search for a city">
            </div>
            <button class="search_button"><?=$dictionary[$lang.'_search']?></button>
        </form>
    </div>

    <div class="main mgt_3">

        <div class="image_and_text">
            <div class="image_content">
                <img src="images/static_pages/best_of_cph.jpg" alt="Best of cph">
            </div>
            <div class="text_content">
                <h3>Discover the best of Copenhagen</h3>
                <p>From tours and day trips to events and attractions, there are things to do in Copenhagen for every traveller.</p>
                <button>Find experiences in Copenhagen</button>
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
            <h2>Explore by interest in Copenhagen</h2>

            <div class="slideshow_container">
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
                <div class="mySlides_container mgt_1">
                    <div class="mySlides">
                        <div>
                            <img src="images/static_pages/experience_one.jpg">
                            <div class="text">
                                <p>Tours</p>
                            </div>
                        </div>
                        <div>
                            <img src="images/static_pages/experience_two.jpg">
                            <div class="text">
                                <p>Events & attractions</p>
                            </div>
                        </div>
                    </div>
                    <div class="mySlides">
                        <div>
                            <img src="images/static_pages/experience_three.jpg">
                            <div class="text">
                                <p>Outdoor Activities</p>
                            </div>
                        </div>
                        <div>
                            <img src="images/static_pages/experience_four.jpg">
                            <div class="text">
                                <p>Food & drinks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
  slides[slideIndex - 1].style.display = "flex";
}
</script>


<?php
require_once __DIR__.'/comp_footer.php';
?>