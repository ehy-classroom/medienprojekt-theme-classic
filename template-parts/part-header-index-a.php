<!-- 
==== KONDITIONALER HEADER (INDEX) ====
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
			<p class="my-site-title"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
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
