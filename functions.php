<?php
function moviesfun_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'moviesfun_setup');

function moviesfun_enqueue() {
    wp_enqueue_style('google-fonts',
        'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Nunito:wght@400;500;600;700&display=swap',
        [], null);
}
add_action('wp_enqueue_scripts', 'moviesfun_enqueue');
?>
