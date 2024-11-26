<div class="games-carousel">
    <?php
    $game_query = new WP_Query([
        'post_type' => 'game',
        'posts_per_page' => -1,
    ]);

    if ($game_query->have_posts()) :
        $games = [];
        while ($game_query->have_posts()) : $game_query->the_post();
            $game_image = get_field('game-image');
            if ($game_image) {
                $games[] = [
                    'title' => get_the_title(),
                    'image_url' => $game_image['sizes']['thumbnail'],
                    'image_alt' => $game_image['alt'] ?: get_the_title(),
                ];
            }
        endwhile;
        wp_reset_postdata();

        for ($i = 0; $i < 9; $i++) :
            foreach ($games as $game) :
                ?>
                <div class="game-item">
                    <img src="<?php echo esc_url($game['image_url']); ?>" alt="<?php echo esc_attr($game['image_alt']); ?>">
                    <p class="text-slate-100"><?php echo esc_html($game['title']); ?></p>
                </div>
                <?php
            endforeach;
        endfor;
    else :
        echo '<p>No games found.</p>';
    endif;
    ?>
</div>