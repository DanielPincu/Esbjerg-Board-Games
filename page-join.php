<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    
<div class="bg-gradient-to-r from-red-700 via-green-700 to-red-700 min-h-screen flex items-center justify-center relative overflow-hidden">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-4 relative z-10">
    <h2 class="text-2xl font-bold text-red-700 text-center mb-6">Sign Up for Boardgame Night</h2>
    <form action="#" method="POST">
      <div class="mb-4">
        <label class="block text-green-700 text-sm font-bold mb-2" for="name">Name</label>
        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-green-300 rounded-lg focus:outline-none focus:border-red-500" required>
      </div>
      <div class="mb-4">
        <label class="block text-green-700 text-sm font-bold mb-2" for="email">Email</label>
        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-green-300 rounded-lg focus:outline-none focus:border-red-500" required>
      </div>
      <div class="mb-4">
        <label class="block text-green-700 text-sm font-bold mb-2" for="phone">Phone Number (optional)</label>
        <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border border-green-300 rounded-lg focus:outline-none focus:border-red-500">
      </div>
      <button type="submit" class="w-full py-3 text-white bg-red-600 hover:bg-red-700 rounded-lg font-semibold">
        Join the Holiday Fun!
      </button>
    </form>
    <p class="mt-6 text-green-700 text-center text-sm">
      Already signed up? <a href="<?php echo esc_url(home_url('/')); ?>" class="text-red-500 hover:underline">Back to Event Page</a>
    </p>
  </div>

  <script src="signup.js"></script>
</div>
    
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts were found. Please check back later!</p>
<?php endif; ?>

<?php get_footer(); ?>
