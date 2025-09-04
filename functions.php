
<?php
/*
 * === STYLESHEETS EINBINDEN ===
 * WordPress verwendet ein "Enqueue"-System für CSS/JS-Dateien.
 * Niemals <link> direkt in HTML verwenden - immer über wp_enqueue_style()!
 */
function medienprojekt_theme_classic_enqueue_styles() {
	// Haupt-Stylesheet des Themes (style.css) laden
	// get_stylesheet_uri() gibt automatisch den Pfad zur style.css zurück
	wp_enqueue_style('medienprojekt-theme-classic-style', get_stylesheet_uri());
	
	// Zusätzliche Font-Datei laden
	// get_template_directory_uri() = Pfad zum Theme-Ordner
	wp_enqueue_style('inter-font', get_template_directory_uri() . '/fonts/inter/font-style.css');
}
// HOOK: Diese Funktion wird automatisch ausgeführt, wenn WordPress Stylesheets lädt
add_action('wp_enqueue_scripts', 'medienprojekt_theme_classic_enqueue_styles');

/*
 * === THEME-SETUP FUNKTION ===
 * Hier werden alle WordPress-Features aktiviert, die das Theme unterstützen soll.
 * Diese Funktion wird beim Theme-Start automatisch ausgeführt.
 */
function mp_theme_setup() {
	// Übersetzungen laden (für mehrsprachige Websites)
	load_theme_textdomain('medienprojekt', get_template_directory() . '/languages');

	// WordPress soll automatisch den HTML <title> Tag verwalten
	// Ohne dies müssten wir manuell <title> im <head> schreiben
	add_theme_support('title-tag');

	// Beitragsbilder (Featured Images) aktivieren
	// Ermöglicht es, jedem Post/Page ein Hauptbild zuzuweisen
	add_theme_support('post-thumbnails');

	// Moderne HTML5-Struktur für WordPress-generierte Elemente aktivieren
	// Betrifft: Suchformular, Kommentare, Galerien etc.
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

	// Custom Logo Feature aktivieren (im Customizer verfügbar)
	add_theme_support('custom-logo');
}
// HOOK: Wird ausgeführt, nachdem WordPress und alle Plugins geladen sind
add_action('after_setup_theme', 'mp_theme_setup');

/*
 * === NAVIGATIONSMENÜS REGISTRIEREN ===
 * Hier werden alle Menü-Positionen definiert, die das Theme unterstützen soll.
 * Diese erscheinen dann im WordPress Admin unter "Design > Menüs".
 */
function mp_register_menus() {
	register_nav_menus(
		array(
			// 'menu_id' => __('Anzeige-Name im Backend', 'textdomain')
			'main_menu'      => __('Hauptnavigation', 'medienprojekt'),      // Haupt-Menü für Header
			'secondary_menu' => __('Sekundäre Navigation', 'medienprojekt'), // Zusätzliches Menü
			'footer_menu'    => __('Footer Navigation', 'medienprojekt'),    // Menü für Footer-Bereich
			'mobile_menu'    => __('Mobilmenü', 'medienprojekt'),           // Spezielles Mobile-Menü
		)
	);
}
// HOOK: Menüs werden nach Theme-Setup registriert
add_action('after_setup_theme', 'mp_register_menus');

