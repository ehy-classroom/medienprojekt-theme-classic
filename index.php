<?php get_header(); ?>

<header>
	<h1><?php the_title(); ?></h1>
</header>

<nav>
	<?php
	wp_nav_menu(array(
		'theme_location' => 'main_menu',
		'container' => false,
	));
	?>
</nav>

<main>
	<?php if (have_posts()):
		while (have_posts()):
			the_post();
			the_content();
		endwhile;
	endif; ?>
</main>

<footer>
	<p>©2025 Enno Hyttrek</p>
</footer>

<?php get_footer(); ?>