<?php
// Stylesheet einbinden
function medienprojekt_theme_classic_enqueue_styles() {
	wp_enqueue_style('medienprojekt-theme-classic-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'medienprojekt_theme_classic_enqueue_styles');


// Navigationsmenüs registrieren
function mp_register_menus() {
	register_nav_menus(
		array(
			'main_menu'   => __('Hauptnavigation', 'medienprojekt'),
			'secondary_menu' => __('Sekundäre Navigation', 'medienprojekt'),
			'footer_menu' => __('Footer Navigation', 'medienprojekt'),
			'mobile_menu' => __('Mobilmenü', 'medienprojekt'),
		)
	);
}
add_action('after_setup_theme', 'mp_register_menus');

