<?php get_header(); ?>

<header>
	<div class="container">
		<h1><?php bloginfo('name'); ?></h1>	
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
	<?php if (have_posts()):
		while (have_posts()):
			the_post();
			?>
			<section>
				<div class="container">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</section>
		<?php
		endwhile;
	endif; ?>
</main>

<footer>
	<div class="container">
		<p>©2025 Enno Hyttrek</p>
	</div>
</footer>

<?php get_footer(); ?>