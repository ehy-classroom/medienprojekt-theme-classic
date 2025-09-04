
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

	// Editor Styles aktivieren: Macht Theme-Styles im Block Editor verfügbar
	add_theme_support('editor-styles');
	
	// Editor Stylesheet definieren: Haupt-Stylesheet auch für Editor verwenden
	add_editor_style('style.css');
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

/*
 * === WEBSITE METADATEN DASHBOARD WIDGET ===
 * Custom Dashboard Widget für Website-spezifische Metadaten
 */
function mp_add_website_meta_dashboard_widget() {
	wp_add_dashboard_widget(
		'mp_website_meta_widget',
		'Website Metadaten',
		'mp_website_meta_widget_content'
	);
}
add_action('wp_dashboard_setup', 'mp_add_website_meta_dashboard_widget');

// Dashboard Widget Inhalt
function mp_website_meta_widget_content() {
	// Aktuell gespeicherte Werte abrufen
	$year = get_option('mp_website_year', date('Y'));
	$owner = get_option('mp_website_owner', '');
	$version = get_option('mp_website_version', '1.0');
	
	// Formular verarbeiten
	if (isset($_POST['mp_update_meta'])) {
		update_option('mp_website_year', sanitize_text_field($_POST['mp_website_year']));
		update_option('mp_website_owner', sanitize_text_field($_POST['mp_website_owner']));
		update_option('mp_website_version', sanitize_text_field($_POST['mp_website_version']));
		echo '<div style="background: #d4edda; padding: 10px; margin-bottom: 15px; border-radius: 3px;">Metadaten erfolgreich aktualisiert!</div>';
		
		// Werte neu laden
		$year = get_option('mp_website_year');
		$owner = get_option('mp_website_owner');
		$version = get_option('mp_website_version');
	}
	?>
	
	<form method="post">
		<table style="width: 100%;">
			<tr>
				<td style="padding: 5px;"><label for="mp_website_year">Jahr der Erstveröffentlichung:</label></td>
				<td style="padding: 5px;"><input type="number" id="mp_website_year" name="mp_website_year" value="<?php echo esc_attr($year); ?>" min="1990" max="<?php echo date('Y'); ?>" style="width: 100%;" /></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="mp_website_owner">Name Website Owner:</label></td>
				<td style="padding: 5px;"><input type="text" id="mp_website_owner" name="mp_website_owner" value="<?php echo esc_attr($owner); ?>" style="width: 100%;" /></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="mp_website_version">Website Version:</label></td>
				<td style="padding: 5px;"><input type="text" id="mp_website_version" name="mp_website_version" value="<?php echo esc_attr($version); ?>" style="width: 100%;" /></td>
			</tr>
		</table>
		
		<p style="margin-top: 15px;">
			<?php submit_button('Metadaten aktualisieren', 'primary', 'mp_update_meta', false); ?>
		</p>
	</form>
	
	<hr style="margin: 15px 0;">
	<p><strong>Vorschau Footer:</strong></p>
	<p style="font-style: italic;">© <?php echo esc_html($year); ?> <?php echo esc_html($owner); ?></p>
	<p style="font-style: italic;">Website Version: <?php echo esc_html($version); ?></p>
	<?php
}

// Hilfsfunktion für Footer-Ausgabe
function mp_get_website_meta($field) {
	$defaults = array(
		'year' => date('Y'),
		'owner' => 'Website Owner',
		'version' => '1.0'
	);
	
	return get_option('mp_website_' . $field, $defaults[$field]);
}

