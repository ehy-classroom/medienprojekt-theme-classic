<?php get_header(); ?>

<header>
	<div class="container">
		<?php if (is_front_page() && !is_home()): ?>
			<!-- Statische Frontpage: Zeigt Site-Info -->
			<p class="my-site-sub-title"><?php bloginfo('description'); ?></p>
			<h1 class="my-site-title"><?php bloginfo('name'); ?></h1>
		<?php else: ?>
			<!-- Seiten, Beiträge und Blog-Übersicht: Zeigt Post-Titel oder "Blog" -->
			<p class="my-site-title"><?php bloginfo('name'); ?></p>
			<h1 class="my-post-title">
				<?php 
				if (is_home()) {
					echo 'Blog';
				} else {
					the_title();
				}
				?>
			</h1>
	
		<?php endif; ?>
	</div>
</header>

<nav class="nav-bar main-nav">
	<?php
	wp_nav_menu(array(
		'theme_location' => 'main_menu',
		'container' => 'div',
		'container_class' => 'container',
	));
	?>
</nav>

<main>
	<!-- WordPress Loop: Prüft ob Posts vorhanden sind -->
	<?php if (have_posts()): ?>
		<section>
			<div class="container">
				<?php while (have_posts()):
					the_post(); // Lädt die Daten des aktuellen Posts
					?>
					<article>
						<!-- Titel als Link zum Beitrag: Nur auf Blog-Seite anzeigen -->
						<?php if (is_home()): ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php endif; ?>
						
						<!-- Beitragsbild: Prüfung ob vorhanden -->
						<?php if (has_post_thumbnail()): ?>
							<figure>
								<a href="<?php the_permalink(); ?>">
									<?php 
									// Bildgröße abhängig vom Kontext: Einzelansicht = groß, Liste = klein
									// Weitere Bildgrößen: 'medium', 'medium_large', 'large', 'full' oder benutzerdefinierte Größen
									if (is_single() || is_page()) {
										the_post_thumbnail('large');
									} else {
										the_post_thumbnail('thumbnail');
									}
									?>
								</a>
					
							</figure>

						<?php endif; ?>
						
						<!-- Inhalt abhängig vom Kontext: Einzelansicht = vollständig, Liste = Auszug -->
						<?php if (is_single() || is_page()): ?>
							<?php the_content(); // Vollständiger Inhalt ?>
						<?php else: ?>
							<?php the_excerpt(); // Kurzer Auszug ?>
							<!-- Call-to-Action Button für Listenansicht -->
							<a href="<?php the_permalink(); ?>" class="cta-button">Mehr …</a>
						<?php endif; ?>
					</article>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>
</main>

<footer>
	<div class="container">
		<p>©2025 Enno Hyttrek</p>
		<p><?php echo wp_get_theme()->get('Name'); ?> - Version <?php echo wp_get_theme()->get('Version'); ?></p>
	</div>
</footer>

<?php get_footer(); ?>