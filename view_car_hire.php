<?php
$_title = "Car hire";
require_once __DIR__.'/_x.php';
require_once __DIR__.'/comp_header.php';
?>

<main id="car_hire">

    <h1>Hire a car with free cancellation - search now.</h1>

    <div class="static_form">
        <form>
            <div class="static_search_container">
                <input type="text" placeholder="From?">
                <input type="text" placeholder="Sun 1/10 | Noon">
                <input type="text" placeholder="Sat 8/10 | Noon">
            </div>
            <button class="search_button"><?=$dictionary[$lang.'_search']?></button>
        </form>
    </div>

    <div class="main mgt_3">

        <div class="choose_momondo mgt_2">
            <h2>Here’s why travellers choose momondo</h2>
            <div class="reasons">
                <div class="reason">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img" height="30px" cleanup=""><path d="M135 80c-8.271 0-15-6.729-15-15s6.729-15 15-15s15 6.729 15 15s-6.729 15-15 15zm0-20c-2.757 0-5 2.243-5 5s2.243 5 5 5s5-2.243 5-5s-2.243-5-5-5zm0 120c-24.813 0-45-20.187-45-45s20.187-45 45-45s45 20.187 45 45s-20.187 45-45 45zm0-80c-19.299 0-35 15.701-35 35s15.701 35 35 35s35-15.701 35-35s-15.701-35-35-35zm-67.021 75.05L24.95 132.021c-6.643-6.643-6.645-17.396 0-24.041l70.657-70.657C100.328 32.601 106.605 30 113.284 30H155c8.271 0 15 6.729 15 15v38.027a5 5 0 1 1-10 0V45c0-2.757-2.243-5-5-5h-41.716a14.9 14.9 0 0 0-10.606 4.393L32.021 115.05a6.997 6.997 0 0 0 0 9.9l43.029 43.029c2.583 2.582 6.768 2.738 9.524.35a4.998 4.998 0 0 1 7.053.506a5 5 0 0 1-.506 7.053c-6.706 5.808-16.872 5.432-23.142-.838zm64.191-15.927l-14.943-9.963a5 5 0 0 1-1.387-6.934a4.999 4.999 0 0 1 6.934-1.387l7.227 4.817V115c0-2.762 2.238-5 5-5s5 2.238 5 5v30.657l7.227-4.817c2.299-1.534 5.401-.911 6.934 1.387s.911 5.402-1.387 6.934l-14.943 9.963a5.009 5.009 0 0 1-5.662-.001z"></path></svg>
                    <div class="reason_text">
                        <h4>Best car hire deals</h4>
                        <p>See deals from hire companies in 70,000+ locations.</p>
                    </div>
                </div>
                <div class="reason">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img" height="30px" cleanup=""><path d="M100 140c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40zm0-70c-16.5 0-30 13.5-30 30s13.5 30 30 30s30-13.5 30-30s-13.5-30-30-30zm0 90c-23.8 0-46.8-10-66.6-28.9C18.7 117 10.9 103 10.6 102.4a5.1 5.1 0 0 1 0-4.8c.3-.6 8-14.6 22.8-28.7C53.2 50 76.2 40 100 40s46.8 10 66.6 28.9C181.3 83 189.1 97 189.4 97.6c.8 1.5.8 3.3 0 4.8c-.3.6-8 14.6-22.8 28.7C146.8 150 123.8 160 100 160zm-79.2-60c6.4 10.3 34.3 50 79.2 50c44.9 0 72.7-39.7 79.2-50c-6.4-10.3-34.3-50-79.2-50c-44.9 0-72.7 39.7-79.2 50zm79.2 20c-2.8 0-5-2.2-5-5s2.2-5 5-5c5.5 0 10-4.5 10-10c0-2.8 2.2-5 5-5s5 2.2 5 5c0 11-9 20-20 20z"></path></svg>
                    <div class="reason_text">    
                        <h4>Price transparency</h4>
                        <p>See the total cost up front so there are no surprises.</p>
                    </div>
                </div>
                <div class="reason">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img" height="30px" cleanup=""><path d="M87.1 168.8c-35-6.5-59.5-38.2-57-73.7c.2-2.8 2.6-4.8 5.3-4.6c2.8.2 4.8 2.6 4.6 5.3c-2.2 30.4 18.8 57.5 48.8 63.1c2.7.5 4.5 3.1 4 5.8c-.4 2.8-3 4.6-5.7 4.1zm54.4-5.3l-15-15c-2-2-2-5.1 0-7.1s5.1-2 7.1 0l10.1 10.1l11.9-23.8c1.2-2.5 4.2-3.5 6.7-2.2c2.5 1.2 3.5 4.2 2.2 6.7l-15 30c-1.6 3.1-5.6 3.7-8 1.3zM159 89c-4.5-24.5-24-43.8-48.5-48.1c-21-3.7-41.8 3.7-55.5 19.1h30c2.8 0 5 2.2 5 5s-2.2 5-5 5H45c-2.8 0-5-2.2-5-5V25c0-2.8 2.2-5 5-5s5 2.2 5 5v25.7C65.9 34.6 89 27 112.2 31.1c28.6 5 51.4 27.6 56.6 56.1c.5 2.7-1.3 5.3-4 5.8s-5.3-1.3-5.8-4zm-14 101c-24.8 0-45-20.2-45-45s20.2-45 45-45s45 20.2 45 45s-20.2 45-45 45zm0-80c-19.3 0-35 15.7-35 35s15.7 35 35 35s35-15.7 35-35s-15.7-35-35-35z"></path></svg>
                    <div class="reason_text">
                        <h4>Book with flexibility</h4>
                        <p>Find cars with free cancellation and enhanced cleaning..</p>
                    </div>
                </div>
                <div class="reason">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img" height="30px" cleanup=""><path d="M33.389 179.733c-2.614-0.89-4.012-3.73-3.122-6.345c2.59-7.607 5.371-14.857 8.365-21.785 C32.903 135.298 30 120.406 30 107.312c0-31.385 13.929-54.718 41.399-69.351C93.774 26.043 125.266 20 165 20 c5.257 0 6.938 7.121 2.236 9.472c-17.541 8.77-18.18 28.942-18.919 52.3c-0.366 11.581-0.745 23.556-3.467 34.441 c-8.634 34.536-52.98 41.838-71.646 43.375c-2.757 0.208-5.167-1.822-5.393-4.573c-0.227-2.752 1.821-5.167 4.573-5.394 c16.518-1.359 55.699-7.573 62.765-35.834c2.461-9.846 2.823-21.276 3.173-32.332c0.596-18.798 1.207-38.09 12.002-51.167 C77.096 33.256 40 59.13 40 107.312c0 9.281 1.632 19.652 4.863 30.949c11.059-21.933 24.686-40.457 41.665-56.857 c1.985-1.918 5.151-1.864 7.07 0.123s1.864 5.151-0.123 7.07c-25.968 25.082-42.226 54.18-53.742 88.015 C38.843 179.227 36.002 180.622 33.389 179.733z"></path></svg>
                    <div class="reason_text">
                        <h4>Eco-friendly options</h4>
                        <p>Filter your search to easily see hybrids and electric cars.</p>
                    </div>
                </div>
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

    <?php
    include_once __DIR__.'/comp_login-popup.php';
    ?>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>