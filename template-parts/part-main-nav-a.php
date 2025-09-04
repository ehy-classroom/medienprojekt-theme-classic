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
