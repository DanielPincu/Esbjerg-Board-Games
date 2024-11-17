<?php // Enqueue Tailwind CSS and custom scripts
function boardgames_resources() {
    // Enqueue Tailwind CSS
    wp_enqueue_script("tailwind-css", "https://cdn.tailwindcss.com");
    
    // Enqueue custom style 
    wp_enqueue_style("boardgames-style", get_template_directory_uri() . "/style.css");
    
    // Enqueue custom JavaScript file
    wp_enqueue_script("boardgames-js", get_template_directory_uri() . "/script.js", array(), false, true);
}
add_action("wp_enqueue_scripts", "boardgames_resources");

// Function to remove Gutenberg editor
function remove_gutenberg() {
    // remove_post_type_support("post", "editor");
    remove_post_type_support("page", "editor");
}
add_action("init", "remove_gutenberg");