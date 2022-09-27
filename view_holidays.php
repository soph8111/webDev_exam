<?php
$_title = "Holidays";
require_once __DIR__.'/_x.php';
require_once __DIR__.'/comp_header.php';
?>

<main id="holidays">

    <h1>Search and compare package holidays</h1>

    <div class="static_form">
        <form>
            <div class="static_search_container">
                <input type="text" placeholder="From">
                <input type="text" placeholder="Enter destination or airport">
                <input type="text" placeholder="Sun 25/9 - Mon 26/9">
            </div>
            <button class="search_button"><?=$dictionary[$lang.'_search']?></button>
        </form>
    </div>

    <div class="main mgt_3">

        <div class="image_and_text">
            <div class="image_content">
                <img src="images/static_pages/holidays.jpg" alt="Best of cph">
            </div>
            <div class="text_content">
                <h3>Lock in your summer break at today’s prices</h3>
                <p>Book with a low deposit of £25pp or £0* when you spread the cost with direct debit</p>
                <button>Book now</button>
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