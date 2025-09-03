
<?php
// Stylesheet einbinden
function medienprojekt_theme_classic_enqueue_styles() {
	wp_enqueue_style('medienprojekt-theme-classic-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'medienprojekt_theme_classic_enqueue_styles');

// Theme-Setup-Funktion
function mp_theme_setup() {
	// Übersetzungen laden
	load_theme_textdomain('medienprojekt', get_template_directory() . '/languages');

	// Unterstützung für den Dokumenttitel
	add_theme_support('title-tag');

	// Unterstützung für Beitragsbilder
	add_theme_support('post-thumbnails');

	// Unterstützung für HTML5-Markup
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

	// Unterstützung für benutzerdefinierte Logos
	add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'mp_theme_setup');


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

