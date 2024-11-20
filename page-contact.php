<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    
<div class="bg-gradient-to-r from-red-700 via-green-700 to-red-700 min-h-screen flex items-center justify-center relative overflow-hidden">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-6xl mx-4 relative z-10">
    <h2 class="text-2xl font-bold text-red-700 text-center mb-6">Contact Us</h2>
    <!-- Contact Form 7 Shortcode -->
    <?php echo do_shortcode('[contact-form-7 id="738fefb" title="Contact"]'); ?>
    <p class="mt-6 text-green-700 text-center text-sm">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-red-500 hover:underline">Back to Home Page</a>
    </p>
  </div>

</div>
    
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts were found. Please check back later!</p>
<?php endif; ?>

<?php get_footer(); ?>
