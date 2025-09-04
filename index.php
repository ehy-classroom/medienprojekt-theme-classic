<!--
=== INDEX.PHP - DAS UNIVERSELLE FALLBACK-TEMPLATE ===

Die index.php ist das wichtigste Template in jedem WordPress Theme:
Sie fungiert als ABSOLUTES FALLBACK für alle Seiten- und Inhaltstypen.

WordPress Template-Hierarchie: Wenn kein spezifisches Template existiert
(z.B. single.php, page.php, archive.php), wird IMMER index.php verwendet.

Dieser Code ist als "eierlegende Wollmilchsau" konzipiert:
- Homepage (statische Seite oder Blog)
- Einzelbeiträge (Posts)
- Statische Seiten (Pages) 
- Blog-Übersicht
- Archiv-Seiten

Durch intelligente Conditional Logic passt sich EIN Template an alle
Kontexte an - ideal für Lern-Themes und einfache Websites.

Der Code dieses Templates kann dadurch natürlich schnell sehr komplex werden. Die Erklärungen in den Kommentaren versuchen, die wichtigsten Aspekte zu beleuchten und Einsteigern zu helfen.

WICHTIG: Das Anlegen spezifischer Templates (single.php, page.php, archive.php etc.)
macht dennoch eine Menge Sinn und sollte in einer weiteren Ausbaustufe des
Themes erfolgen sodass die index.php nur noch als Fallback benötigt wird.
-->

<?php 
// WordPress Template-System: Lädt header.php automatisch ein (enthält HTML <head> Element, nicht zu verwechseln mit dem <header> Tag unten)
get_header(); 
?>

<!-- 
==== KONDITIONALER HEADER ====
Hier wird intelligent entschieden, was im Header angezeigt werden soll:
- Startseite: Site-Name und Beschreibung prominent
- Alle anderen Seiten: Site-Name klein, Post-Titel oder "Blog" groß
-->
<header>
	<div class="container">
		<?php if (is_front_page() && !is_home()): ?>
			<!-- FALL 1: Statische Startseite (nicht Blog-Homepage) -->
			<p class="my-site-sub-title"><?php bloginfo('description'); ?></p>
			<h1 class="my-site-title"><?php bloginfo('name'); ?></h1>
		<?php else: ?>
			<!-- FALL 2: Blog-Seite, Einzelbeiträge, statische Seiten -->
			<p class="my-site-title"><?php bloginfo('name'); ?></p>
			<h1 class="my-post-title">
				<?php 
				// Weitere Kondition: Blog-Übersicht vs. Einzelseite
				if (is_home()) {
					// Blog-Übersichtsseite zeigt "Blog" als Titel
					echo 'Blog';
				} else {
					// Alle anderen Seiten zeigen den tatsächlichen Seitentitel
					the_title();
				}
				?>
			</h1>
	
		<?php endif; ?>
	</div>
</header>

<!-- 
==== NAVIGATION ====
WordPress Navigation-System: Automatische HTML-Generierung aus Backend-Menüs
-->
<nav class="nav-bar main-nav">
	<?php
	wp_nav_menu(array(
		'theme_location' => 'main_menu',        // Welches registrierte Menü verwenden?
		'container' => 'div',                   // HTML-Container um das Menü
		'container_class' => 'container',       // CSS-Klasse für Container
		'menu_class' => 'nav-bar-nav nav-bar-nav-list', // CSS-Klasse für <ul>-Element
	));
	?>
</nav>

<main>
	<!-- 
	==== WORDPRESS LOOP ====
	Das Herz jedes WordPress-Templates! Der Loop durchläuft alle Posts/Seiten,
	die WordPress für diese Anfrage gefunden hat (abhängig von URL/Kontext).
	-->
	<?php if (have_posts()): // Prüft: Gibt es überhaupt Posts anzuzeigen? ?>
		<section>
			<div class="container">
				<?php 
				// WHILE-SCHLEIFE: Durchläuft jeden einzelnen Post
				while (have_posts()): 
					the_post(); // WICHTIG: Lädt die Daten des aktuellen Posts in globale Variablen
					?>
					<article>
						<!-- 
						TITEL-LOGIK: Nur auf Blog-Übersichtsseite anzeigen
						Einzelseiten haben den Titel bereits im Header
						-->
						<?php if (is_home()): ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php endif; ?>
						
						<!-- 
						BEITRAGSBILD (Featured Image): 
						Prüfung ob dem Post ein Bild zugewiesen wurde
						-->
						<?php if (has_post_thumbnail()): ?>
							<figure>
								<a href="<?php the_permalink(); ?>">
									<?php 
									// RESPONSIVE BILDER: Größe abhängig vom Kontext
									// Einzelansicht = 'large' (groß), Listen = 'thumbnail' (klein)
									// WordPress generiert automatisch verschiedene Bildgrößen
									if (is_single() || is_page()) {
										the_post_thumbnail('large');
									} else {
										the_post_thumbnail('thumbnail');
									}
									?>
								</a>
					
							</figure>

						<?php endif; ?>
						
						<!-- 
						INHALT-LOGIK: Intelligente Anzeige je nach Kontext
						- Einzelansicht: Vollständiger Inhalt
						- Listen (Blog): Nur Auszug + "Mehr"-Button
						-->
						<?php if (is_single() || is_page()): ?>
							<?php the_content(); // Vollständiger Post-Inhalt ?>
						<?php else: ?>
							<?php the_excerpt(); // Automatisch generierter Auszug (ca. 55 Wörter) ?>
							<!-- Call-to-Action Button nur in Listenansichten -->
							<a href="<?php the_permalink(); ?>" class="cta-button">Mehr …</a>
						<?php endif; ?>
					</article>
				<?php endwhile; // Ende der Post-Schleife ?>
			</div>
		</section>
	<?php endif; // Ende der Posts-Prüfung ?>
</main>

<footer>
	<div class="container">
		<!-- Copyright hard-coded: Normalerweise schlecht (nicht editierbar), aber hier akzeptabel da Theme-spezifisch, nicht Inhalt -->
		<p>©2025 Enno Hyttrek</p>
		<!-- Theme Name/Version automatisiert: WordPress liest Theme-Metadaten aus style.css Header -->
		<p><?php echo wp_get_theme()->get('Name'); ?> - Version <?php echo wp_get_theme()->get('Version'); ?></p>
	</div>
</footer>

<?php 
// WordPress Template-System: Lädt footer.php automatisch ein (welche den wp_footer() Hook + schließende HTML-Tags enthält)
get_footer(); 
?>