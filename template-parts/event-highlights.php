<div id="event-highlights-container" class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php
    $highlights_query = new WP_Query([
        'post_type' => 'event-highlight',
        'posts_per_page' => -1,
        'order' => 'ASC',
    ]);

    $count = 0;
    if ($highlights_query->have_posts()) :
        while ($highlights_query->have_posts()) : $highlights_query->the_post();
            $highlight_image = get_field('event_highlights_image');
            if (!empty($highlight_image)) :
                $image_url = esc_url($highlight_image['sizes']['large']);
                $image_alt = esc_attr($highlight_image['alt'] ?: 'Event Highlight Image');
                $display = $count < 3 ? '' : 'style="display: none;"';
                ?>
                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="gallery-image rounded-lg shadow-md hover-effect w-full h-48 object-cover cursor-pointer" <?php echo $display; ?>>
                <?php
                $count++;
            endif;
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <p class="text-gray-500">No event highlights available yet.</p>
    <?php endif; ?>
</div>

<?php if ($count > 3) : ?>
    <div class="text-center mt-8">
        <button id="load-more-highlights" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Load More
        </button>
    </div>
<?php endif; ?>