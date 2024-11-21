<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>





<!-- Hero Section with Parallax Effect -->
<header 
    class="bg-[url('<?php echo esc_url(get_field('hero_image')['url']); ?>')] parallax h-screen bg-cover bg-center relative"
    aria-label="<?php echo esc_attr(get_field('hero_image')['alt']); ?>">
        <div class="bg-overlay"></div>
        <div class="hero-text">
            <h1 class="text-5xl font-bold"><?php echo esc_html(get_field('city')); ?></h1>
            <h1 class="text-5xl font-bold"><?php echo esc_html(get_field('club_name')); ?></h1>
            <p class="text-xl bg-green-500 md:bg-transparent"><?php echo esc_html(get_field('core_narrative')); ?></p>
            <div class="mt-6 flex justify-center">
                <a href="#about" class="text-white hover:text-red-400 px-8 py-3 bg-green-600 rounded-lg hover:bg-green-700 transition duration-300">About</a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('signup'))); ?>" class="ml-4 text-white hover:text-red-400 px-8 py-3 bg-green-600 rounded-lg hover:bg-green-700 transition duration-300">Sign Up</a>

            </div>
        </div>
</header>





<!-- About Section -->
<section id="about" class="about-section text-center py-12 bg-gradient-to-b from-green-50 to-white">
        <div class="container mx-auto px-4 relative">
            <h2 class="text-4xl font-semibold text-blue-800"><?php echo esc_html(get_field('edition_name')); ?> of <?php echo esc_html(get_field('club_name')); ?></h2>
            <p class="mt-6 text-lg max-w-2xl mx-auto text-gray-700 bg-white bg-opacity-70 p-4 rounded-lg shadow-sm">
            <?php echo esc_html(get_field('edition_description')); ?>
            </p>
            <div class="mt-8 flex justify-center space-x-4">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('signup'))); ?>" class="ml-4 text-white hover:text-red-400 px-8 py-3 bg-green-600 rounded-lg hover:bg-green-700 transition duration-300">Sign Up</a>
                <a target="_blank" href="https://www.facebook.com/profile.php?id=61551731217525&mibextid=LQQJ4d&rdid=Ig7YmakYWnrl2gSX&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2FY3puA2FKfH23T9hn%2F%3Fmibextid%3DLQQJ4d" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition duration-300 shadow-md">Visit us on Facebook</a>
            </div>
        </div>
</section>





<!-- Games Showcase Carousel -->
<section class="bg-purple-100 my-8 py-8 overflow-hidden">
    <div class="container mx-auto text-center mb-6">
        <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black">Our Games Collection</h3>
    </div>
    <div class="games-carousel-container">
        <div class="games-carousel">
            <?php
            // Custom Query for the 'game' CPT
            $game_query = new WP_Query([
                'post_type' => 'game',
                'posts_per_page' => -1, // Get all the posts
            ]);

            // Check if there are posts
            if ($game_query->have_posts()) :
                // Get the games to avoid querying inside the loop
                $games = [];
                while ($game_query->have_posts()) : $game_query->the_post();
                    $game_image = get_field('game-image');
                    // Add game title and image URL to array
                    if ($game_image) {
                        $games[] = [
                            'title' => get_the_title(),
                            'image_url' => $game_image['sizes']['thumbnail'],
                            'image_alt' => $game_image['alt'] ?: get_the_title(),
                        ];
                    }
                endwhile;
                wp_reset_postdata();

                // Now duplicate the games 9 times for seamless scrolling
                for ($i = 0; $i < 9; $i++) : // 9 times for seamless scroll
                    foreach ($games as $game) :
                        ?>
                        <div class="game-item">
                            <img src="<?php echo esc_url($game['image_url']); ?>" 
                                 alt="<?php echo esc_attr($game['image_alt']); ?>">
                            <p><?php echo esc_html($game['title']); ?></p>
                        </div>
                        <?php
                    endforeach;
                endfor;
            else :
                echo '<p>No games found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>






<!-- Schedule Section -->
<section id="schedule" class="schedule-section bg-gradient-to-r from-indigo-300 to-indigo-500 flex items-center justify-center text-white py-12">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-center">
        <div class="md:w-1/2 mb-8 md:mb-0">
            <h4 class="text-3xl font-semibold text-black text-center">
                <?php echo esc_html(get_field('edition_name')); ?>
            </h4>
            <ul class="mt-6 space-y-4 bg-white p-6 rounded-lg shadow-lg">
                <?php
                // Query the 'schedule' CPT
                $schedule_query = new WP_Query([
                    'post_type'      => 'schedule',
                    'posts_per_page' => -1, // Fetch all posts
                    'meta_key'       => 'game_date', // Replace with your ACF field name
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC', // Sort in ascending order by date/time
                    'meta_type'      => 'DATETIME', // Let WP know this is a datetime field
                ]);

                // Check if posts exist
                if ($schedule_query->have_posts()) :
                    while ($schedule_query->have_posts()) : $schedule_query->the_post();
                        // Get ACF fields
                        $event_date_time = get_field('game_date'); // ACF DateTime Picker
                        $event_title = get_the_title(); // Use post title as event title

                        // Format the date/time (adjust format as needed)
                        $formatted_date = date_i18n('l, F jS', strtotime($event_date_time)); // E.g., "Friday, January 12th"
                        $formatted_time = date_i18n('g:i A', strtotime($event_date_time)); // E.g., "7:00 PM"
                        ?>
                        <li class="flex justify-between text-lg text-gray-700">
                            <span>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/dice.png" alt="dice image" class="dice-icon inline-block w-6 h-6 mr-2" alt="dice"> 
                                <?php echo esc_html($formatted_date); ?> - <?php echo esc_html($event_title); ?>
                            </span>
                            <span><?php echo esc_html($formatted_time); ?></span>
                        </li>
                        <?php
                    endwhile;
                    wp_reset_postdata(); // Reset the query
                else :
                    ?>
                    <li class="text-center text-gray-500">No events scheduled yet.</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>






<!-- Events Highlights -->
<section id="gallery" class="gallery-section bg-white my-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-semibold">Event Highlights</h2>
        <p class="mt-4 text-gray-600">Explore memorable moments from previous Boardgame Nights!</p>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php
            // Query the 'event-highlights' CPT
            $highlights_query = new WP_Query([
                'post_type'      => 'event-highlight', // Custom Post Type name
                'posts_per_page' => -1, // Fetch all posts
                'order'          => 'ASC', // Adjust sorting if needed
            ]);

            // Check if posts exist
            if ($highlights_query->have_posts()) :
                while ($highlights_query->have_posts()) : $highlights_query->the_post();
                    // Get the ACF image field
                    $highlight_image = get_field('event_highlights_image'); // Image field key

                    if (!empty($highlight_image)) : // Check if the image exists
                        $image_url = esc_url($highlight_image['url']);
                        $image_alt = esc_attr($highlight_image['alt'] ?: 'Event Highlight Image'); // Use ACF alt or fallback
                        ?>
                        <img src="<?php echo $image_url; ?>" 
                             alt="<?php echo $image_alt; ?>" 
                             class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer">
                    <?php
                    endif;
                endwhile;
                wp_reset_postdata(); // Reset the query
            else :
                ?>
                <p class="text-gray-500">No event highlights available yet.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

    
    
<!-- Image Popup -->
<div id="imagePopup" class="fixed inset-0 bg-black bg-opacity-90 cursor-pointer hidden items-center justify-center z-50">
    <div class="max-w-3xl max-h-full p-4 relative">
        <!-- Close Button -->
        <button id="closePopup" class="absolute top-2 right-2 bg-white text-black rounded-full p-2 hover:bg-gray-300 focus:outline-none">
            close
        </button>

        <!-- Enlarged Image -->
        <img id="popupImage" src="" alt="Event enlarged image" class="w-full object-contain">
    </div>
</div>




<!-- Testimonials Section -->
<div class="testimonial-container container mx-auto px-4 py-20">
    <main>
        <h5 class="text-4xl font-bold text-center text-gray-800 pb-12">Testimonials</h5>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $args = array(
                'post_type' => 'testimonial',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $testimonials_query = new WP_Query($args);

            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
            ?>
                <div class="testimonial orange">
                    <figcaption class="flex flex-col h-full">
                        <blockquote class="flex-grow">
                            <?php the_content(); ?>
                        </blockquote>
                        <h3 class="text-2xl font-bold text-gray-800"><?php the_title(); ?></h3>
                        <h4 class="text-sm text-gray-600">Attendant</h4>
                    </figcaption>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No testimonials found.</p>';
            endif;
            ?>
        </div>
    </main>
</div>

<div class="mx-auto container p-10 px-4">
    <p class="md:text-3xl font-bold text-center text-gray-800 mb-8">Leave us a review</p>
    <div class="max-w-6xl justify-center mx-auto flex testimonial orange">
        <figcaption>
            <blockquote>
                <p class="text-gray-600 text-lg">We value your feedback! Please leave us a review below.</p>
            </blockquote>
            <div class="p-4">
                <?php echo do_shortcode('[contact-form-7 id="502c850" title="Testimonial"]'); ?>
            </div>
        </figcaption>
    </div>
</div>
<!-- Testimonials End -->





<!-- Map Section -->
<section id="map" class="map-section py-12">
        <div class="container mx-auto px-4 text-center">
            <h6 class="text-3xl font-semibold text-gray-800">How to Find Us</h6>
            <p>Torvegade 23, top floor, 6700 Esbjerg</p>
            <p>+45 91 66 55 69</p>
            <div class="mt-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.7827423812083!2d8.453031299999999!3d55.46951029999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c4c44c4678f0d%3A0x9efc215c254bfc43!2sEsbjerg%20Hovedbibliotek!5e0!3m2!1sen!2sdk!4v1633100121299!5m2!1sen!2sdk" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
</section>




    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>