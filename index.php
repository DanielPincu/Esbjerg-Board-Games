<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>



    <!-- Snake Game Popup -->
<!-- <div id="snakeGamePopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Snake Game</h2>
            <button id="closeGameButton" class="text-gray-600 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <canvas id="gameCanvas" width="300" height="300" class="border border-gray-300 mx-auto"></canvas>
        <p class="mt-4 text-center">Use arrow keys to control the snake.</p>
        <p id="scoreDisplay" class="mt-2 text-center font-bold">Score: 0</p>
        <button id="startGameButton" class="w-full mt-4 bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition duration-300">Start Game</button>
    </div>
</div> -->


    <!-- Hero Section with Parallax Effect -->
    <section class="bg-[url('<?php echo get_template_directory_uri() . '/img/banner.png' ?>')] h-screen bg-fixed bg-cover bg-center relative ">
   

        <div class="bg-overlay"></div>
        <div class="hero-text">
            <h1 class="text-5xl font-bold">Esbjerg</h1>
            <h1 class="text-5xl font-bold">Boardgame Night</h1>
            <p class="text-xl">Join the Fun, Every Second Friday</p>
            <div class="mt-6 flex justify-center">
                <a href="#about" class="text-white hover:text-red-400 px-8 py-3 bg-green-600 rounded-lg hover:bg-green-700 transition duration-300">About</a>
                <a href="signup.html" class="ml-4 text-white hover:text-red-400 px-8 py-3 bg-green-600 rounded-lg hover:bg-green-700 transition duration-300">Sign Up</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section text-center py-12 bg-gradient-to-b from-green-50 to-white">
        <div class="container mx-auto px-4 relative">
            <h2 class="text-4xl font-semibold text-blue-800">Winter Edition of Boardgame Night</h2>
            <p class="mt-6 text-lg max-w-2xl mx-auto text-gray-700 bg-white bg-opacity-70 p-4 rounded-lg shadow-sm">
                Every second Friday, board game enthusiasts from all around Esbjerg gather for a night of laughter, competition, and community. Join us for classic games and new challenges in a welcoming environment! 🎲❄️
            </p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="signup.html" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">Join Us</a>
                <a href="#schedule" class="inline-block px-6 py-3 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition duration-300 shadow-md">View Schedule</a>
            </div>
        </div>
    </section>

       <!-- Games Showcase Carousel -->
<section class="bg-purple-100 my-8 py-8 overflow-hidden">
    <div class="container mx-auto text-center mb-6">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black">Our Games Collection</h2>
    </div>
    <div class="games-carousel-container">
        <div class="games-carousel">
            <?php
            // Custom Query for the 'game' CPT
            $args = array(
                'post_type' => 'game',  // Custom post type 'game'
                'posts_per_page' => -1, // Get all the posts
            );
            $game_query = new WP_Query($args);

            // Check if there are posts
            if ($game_query->have_posts()) :
                $games = [];
                // First loop to get all the games
                while ($game_query->have_posts()) : $game_query->the_post();
                    // Get the ACF custom field 'game-image' which should return an array with 'url', 'alt', 'id', etc.
                    $game_image = get_field('game-image'); // Get the image field as an array

                    $games[] = [
                        'title' => get_the_title(),
                        'image_url' => $game_image ? $game_image['url'] : '',
                        'image_alt' => $game_image && isset($game_image['alt']) ? $game_image['alt'] : get_the_title() // Use alt text or fallback to title
                    ];
                endwhile;
                wp_reset_postdata(); // Reset the global post object

                // Now output the games in three copies for seamless scrolling
                for ($i = 0; $i < 9; $i++) :
                    foreach ($games as $game) :
                        ?>
                        <div class="game-item">
                            <!-- Display the image from ACF if available -->
                            <?php if ($game['image_url']) : ?>
                                <img src="<?php echo esc_url($game['image_url']); ?>" alt="<?php echo esc_attr($game['image_alt']); ?>">
                            <?php endif; ?>
                            <p><?php echo esc_html($game['title']); ?></p> <!-- Display the game title -->
                        </div>
                        <?php
                    endforeach;
                endfor;
            else :
                echo '<p>No games found.</p>'; // Fallback message if no games are found
            endif;
            ?>
        </div>
    </div>
</section>



    <!-- Schedule Section -->
    <section id="schedule" class="schedule-section bg-gradient-to-r from-indigo-300 to-indigo-500 flex items-center justify-center text-white py-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h3 class="text-3xl font-semibold text-black text-center">The Winter Edition</h3>
                <ul class="mt-6 space-y-4 bg-white p-6 rounded-lg shadow-lg">
                    <li class="flex justify-between text-lg text-gray-700">
                        <span><img src="https://img.icons8.com/ios/50/000000/dice.png" class="dice-icon inline-block w-6 h-6 mr-2" alt="dice"> Friday, January 12th - Mystery Night</span>
                        <span>7:00 PM</span>
                    </li>
                    <li class="flex justify-between text-lg text-gray-700">
                        <span><img src="https://img.icons8.com/ios/50/000000/dice.png" class="dice-icon inline-block w-6 h-6 mr-2" alt="dice"> Friday, January 26th - Strategy Showdown</span>
                        <span>7:00 PM</span>
                    </li>
                    <li class="flex justify-between text-lg text-gray-700">
                        <span><img src="https://img.icons8.com/ios/50/000000/dice.png" class="dice-icon inline-block w-6 h-6 mr-2" alt="dice"> Friday, February 9th - Family Fun Night</span>
                        <span>7:00 PM</span>
                    </li>
                    <li class="flex justify-between text-lg text-gray-700">
                        <span><img src="https://img.icons8.com/ios/50/000000/dice.png" class="dice-icon inline-block w-6 h-6 mr-2" alt="dice"> Friday, February 23rd - Party Games</span>
                        <span>7:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery-section bg-white my-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-semibold">Event Highlights</h2>
            <p class="mt-4 text-gray-600">Explore memorable moments from previous Boardgame Nights!</p>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <img src="https://p16-oec-va.ibyteimg.com/tos-maliva-i-o3syd03w52-us/21bc1df9369c4b1c870d96b783c0dc46~tplv-dx0w9n1ysr-resize-jpeg:800:800.jpeg?from=1826719393" alt="Gallery Image 1" class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer">
                <img src="https://adventurerstable.com/wp-content/uploads/2024/08/boardgame-nights-charlotte-nc-1024x585.webp" alt="Gallery Image 2" class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer">
                <img src="https://cdn-az.allevents.in/events7/banners/16a27d3434bab514ce0c696879d865d7ff8ddec9f78c4571aba39c316400ca13-rimg-w1200-h785-dca47c5d-gmir?v=1719342419" alt="Gallery Image 3" class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8jfx-DquRK_JfoYeaxfO_NHxXl0wzh8up_us7zz-aT_-r9LqdTeKkPM0ddh28cWr2cFU&usqp=CAU" alt="Gallery Image 4" class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer">
                <img src="https://venicebeachbar.com/wp-content/uploads/2023/12/boardgame-and-bars.jpg" alt="Gallery Image 5" class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer">
                <img src="https://m.media-amazon.com/images/I/91AQFGJWAxL._AC_UF894,1000_QL80_.jpg" alt="Gallery Image 6" class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer">
            </div>
        </div>
    </section>
    
    <!-- Image Popup -->
    <div id="imagePopup" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="max-w-3xl max-h-full p-4">
            <img id="popupImage" src="" alt="Enlarged image" class="max-w-full max-h-full object-contain">
        </div>
    </div>

    <!-- Map Section -->
    <section id="map" class="map-section py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Where to Find Us</h2>
            <div class="mt-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.7827423812083!2d8.453031299999999!3d55.46951029999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c4c44c4678f0d%3A0x9efc215c254bfc43!2sEsbjerg%20Hovedbibliotek!5e0!3m2!1sen!2sdk!4v1633100121299!5m2!1sen!2sdk" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Contact Us</h2>
            <p class="mt-4 text-lg text-gray-600">Have questions or want to learn more? Get in touch!</p>
            <div class="mt-6">
                <form action="#" method="post" class="max-w-lg mx-auto">
                    <input type="email" name="email" placeholder="Your Email" class="w-full p-3 rounded-md border border-gray-300 mt-4" required>
                    <textarea name="message" placeholder="Your Message" class="w-full p-3 rounded-md border border-gray-300 mt-4" rows="4" required></textarea>
                    <button type="submit" class="w-full py-3 mt-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">Send Message</button>
                </form>
            </div>
        </div>
    </section>




    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>