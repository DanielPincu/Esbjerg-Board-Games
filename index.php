<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <!-- Post content goes here -->
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts were found. Please check back later!</p>
<?php endif; ?>

<?php get_footer(); ?>
