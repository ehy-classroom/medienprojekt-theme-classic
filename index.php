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

Der Code dieses Templates kann dadurch natürlich schnell sehr komplex werden. 
Die Erklärungen in den Kommentaren versuchen, die wichtigsten Aspekte zu 
beleuchten und Einsteigern zu helfen. Komplexe Logikblöcke (Header, Navigation, 
Footer) wurden bereits in Template-Parts ausgelagert.

=== TEMPLATE PARTS SYSTEM ===

Dieses Theme nutzt ein modulares Template-Parts-System für bessere
Code-Organisation und Wartbarkeit:

- Header: part-header-index-a.php (spezifisch für index.php)
- Navigation: part-main-nav-a.php (wiederverwendbar)
- Footer: part-footer-a.php (mit Website-Metadaten)

Vorteile: DRY-Prinzip, spezifische Templates für jeden Kontext,
Erweiterbarkeit durch a/b/c-Varianten, saubere Trennung der Logik.

AUSBAUSTUFE: Spezifische Templates wie single.php wurden bereits implementiert
und nutzen ebenfalls das Template-Parts-System. Die index.php fungiert weiterhin
als universelles Fallback für alle nicht-spezifisch abgedeckten Seitentypen.
-->

<?php 
// WordPress Template-System: Lädt header.php automatisch ein (enthält HTML <head> Element, nicht zu verwechseln mit dem <header> Tag unten)
get_header(); 
?>

<?php get_template_part('template-parts/part-header-index', 'a'); ?>

<?php get_template_part('template-parts/part-main-nav', 'a'); ?>

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

<?php get_template_part('template-parts/part-footer', 'a'); ?>

<?php 
// WordPress Template-System: Lädt footer.php automatisch ein (welche den wp_footer() Hook + schließende HTML-Tags enthält)
get_footer(); 
?>