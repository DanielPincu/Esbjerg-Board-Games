<?php // Enqueue Tailwind CSS and custom scripts
function boardgames_resources() {
    // Enqueue Tailwind CSS
    wp_enqueue_script("tailwind-css", "https://cdn.tailwindcss.com");
    
    // Enqueue AOS CSS
    wp_enqueue_style("aos-css", "https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css");
    
    // Enqueue AOS JS
    wp_enqueue_script("aos-js", "https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js", array(), null, true);
    
    // Enqueue custom style 
    wp_enqueue_style("boardgames-style", get_template_directory_uri() . "/style.css");
    
    // Enqueue custom JavaScript file
    wp_enqueue_script("boardgames-js", get_template_directory_uri() . "/script.js", array('aos-js'), null, true);
}
add_action("wp_enqueue_scripts", "boardgames_resources");


// Function to remove Gutenberg editor
function remove_gutenberg() {
    // remove_post_type_support("post", "editor");
    remove_post_type_support("page", "editor");
}
add_action("init", "remove_gutenberg");



// Populate Contact Form 7 checkboxes with custom post type entries

add_filter('wpcf7_form_tag', 'populate_schedule_checkboxes', 10, 2);

function populate_schedule_checkboxes($tag, $unused) {
    if ($tag['name'] !== 'schedule-checkboxes') {
        return $tag;
    }

    $args = array(
        'post_type' => 'schedule',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );
    $schedule_posts = get_posts($args);

    $options = array();
    foreach ($schedule_posts as $post) {
        $game_date = get_field('game_date', $post->ID);
        if ($game_date) {
            $label = sprintf('%s (%s)', $post->post_title, $game_date);
            $options[] = $label;
        }
    }

    $tag['raw_values'] = $options;
    $tag['values'] = $options;
    $tag['type'] = 'checkbox';

    return $tag;
}

   