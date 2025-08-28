<?php
// Stylesheet einbinden
function medienprojekt_theme_classic_enqueue_styles() {
	wp_enqueue_style('medienprojekt-theme-classic-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'medienprojekt_theme_classic_enqueue_styles');
