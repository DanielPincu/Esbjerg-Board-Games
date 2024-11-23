<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        
        <!-- START: Hero Section -->
        <?php get_template_part('template-parts/hero-section'); ?>
        <!-- END: Hero Section -->
         
        <!-- START: About Section -->
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
        <!-- END: About Section -->
        


        <!-- START: Game Details Section -->
        <section class="bg-purple-100 my-8 py-8 overflow-hidden">
            <div class="container mx-auto text-center mb-6">
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black">Our Games Collection</h3>
            </div>
            <div class="games-carousel-container">
                <?php get_template_part('template-parts/games-carousel'); ?>
            </div>
        </section>
        <!-- END: Game Details Section -->


        <!-- START: Schedule Section -->
        <section id="schedule" class="schedule-section bg-gradient-to-r from-indigo-300 to-indigo-500 flex items-center justify-center text-white py-12">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h4 class="text-3xl font-semibold text-black text-center">
                        <?php echo esc_html(get_field('edition_name')); ?>
                    </h4>
                    <?php get_template_part('template-parts/schedule'); ?>
                </div>
            </div>
        </section>
        <!-- END: Schedule Section -->
        

        <!-- START: Gallery Section -->
        <section id="gallery" class="gallery-section bg-white my-12">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-semibold">Event Highlights</h2>
                <p class="mt-4 text-gray-600">Explore memorable moments from previous Boardgame Nights!</p>
                <?php get_template_part('template-parts/event-highlights'); ?>
            </div>
        </section>

        <div id="imagePopup" class="fixed inset-0 bg-black bg-opacity-90 cursor-pointer hidden items-center justify-center z-50">
            <div class="max-w-3xl max-h-full p-4 relative">
                <button id="closePopup" class="absolute top-2 right-2 bg-white text-black rounded-full p-2 hover:bg-gray-300 focus:outline-none">
                    close
                </button>
                <img id="popupImage" src="" alt="Event enlarged image" class="w-full object-contain">
            </div>
        </div>
        <!-- END: Gallery Section -->

        <!-- START: Testimonials Section -->
        <section class="testimonial-container container mx-auto px-4 py-20">
            <main>
                <h5 class="text-4xl font-bold text-center text-gray-800 pb-12">Testimonials</h5>
                <?php get_template_part('template-parts/testimonials'); ?>
            </main>
        </section>
        <!-- END: Testimonials Section -->

        <!-- START: Contact Form Section -->
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
        <!-- END: Contact Form Section -->

        <!-- START: Map Section -->
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
        <!-- END: Map Section -->

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>