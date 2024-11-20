<!-- Footer Section -->
<footer class="bg-green-800 text-white py-8">
    <div class="container mx-auto px-4 text-center">
        <!-- Fetch the ACF field for the footer message from the page with ID 'page-home' -->
        <h3 class="text-2xl font-bold mb-2">
            <?php 
                // Get the front page ID
                $page_id = get_option('page_on_front'); 

                // Fetch 'footer_message' ACF field for the front page (page-home)
                echo esc_html(get_field('footer_message', $page_id)); // Display footer message
            ?>
        </h3>

        <!-- Directly fetch and display 'city' and 'club_name' -->
        <p class="mb-4">
            <?php 
                // Fetch and display 'city' and 'club_name' ACF fields
                echo esc_html(get_field('club_name', $page_id)) . ' - ' . esc_html(get_field('city', $page_id));
            ?>
        </p>

        <div class="flex justify-center space-x-6 mb-4">
            <a href="#about" class="text-red-300 hover:text-red-400 transition duration-300">About Us</a>
            <span>|</span>
            <a href="#schedule" class="text-red-300 hover:text-red-400 transition duration-300">Upcoming Events</a>
            <span>|</span>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="text-red-300 hover:text-red-400 transition duration-300">Contact Us</a>
        </div>

        <div class="flex justify-center space-x-6 mb-6">
            <img src="<?php echo get_template_directory_uri(); ?>/img/dice_white.png" alt="Dice image" class="w-8 h-8 animate-bounce">
        </div>

        <p>&copy; 2024 <?php echo esc_html(get_field('club_name', $page_id)) . ' - ' . esc_html(get_field('city', $page_id));?>. All Rights Reserved</p>
        <p>Crafted in the basement by <a class="text-blue-300" href="https://www.linkedin.com/in/catalinavrinceanu/">Catalina</a> & <a class="text-blue-300" href="https://www.linkedin.com/in/danielpincu/">Daniel</a></p>
        <!-- If you discovered this online, you're awesome! Greetings from Kate & Daniel! -->
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
