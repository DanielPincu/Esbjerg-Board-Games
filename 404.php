<?php get_header(); ?>

<section class="error-404 not-found text-center py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-bold text-red-600">Oops! Page Not Found</h1>
        <p class="mt-4 text-xl text-gray-700">Sorry, but the page you're looking for does not exist. It might have been moved or deleted.</p>

        <!-- Link back to home -->
        <div class="mt-8">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">Go Back to Homepage</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
