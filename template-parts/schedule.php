<ul class="mt-6 space-y-4 bg-white p-6 rounded-lg shadow-lg">
    <?php
    $schedule_query = new WP_Query([
        'post_type' => 'schedule',
        'posts_per_page' => -1,
        'meta_key' => 'game_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_type' => 'DATETIME',
    ]);

    if ($schedule_query->have_posts()) :
        while ($schedule_query->have_posts()) : $schedule_query->the_post();
            $event_date_time = get_field('game_date');
            $event_title = get_the_title();
            ?>
            <li class="flex justify-between text-lg text-gray-700">
                <span>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/dice.png" alt="dice image" class="dice-icon inline-block w-6 h-6 mr-2" alt="image of a dice">
                    <?php echo esc_html($event_date_time); ?> - <?php echo esc_html($event_title); ?>
                </span>
            </li>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <li class="text-center text-gray-500">No events scheduled yet.</li>
    <?php endif; ?>
</ul>