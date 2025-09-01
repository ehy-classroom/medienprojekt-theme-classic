<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medienprojekt Theme Classic</title>
    <?php wp_head(); ?>
</head>
<body>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>

	<main>
		<?php the_content(); ?>
	</main>

	<footer>
		<p>©2025 Enno Hyttrek</p>
	</footer>
    <?php wp_footer(); ?>
</body>
</html>
