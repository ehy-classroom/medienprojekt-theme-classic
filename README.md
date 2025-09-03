


# Medienprojekt Theme Classic

Dieses WordPress PHP Theme wurde im Rahmen des Lehrmoduls Medienprojekt (W6) entwickelt, um das Code-basierte Arbeiten mit WordPress zu üben und zu vertiefen. Es dient als Ausgangspunkt für die Entwicklung individueller WordPress-Themes und fördert das Verständnis für die Struktur und Funktionsweise von WordPress.

---

## Aktueller Stand

- Zentrales Stylesheet mit grundlegenden Layout- und Farbanpassungen
- Vier vorbereitete Navigationsmenüs (Hauptnavigation, Sekundäre Navigation, Footer, Mobilmenü)
- Einfache, semantische HTML5-Struktur in der `index.php`
- Minimal gehalten, ideal als Basis für eigene Erweiterungen
- Keine eigenen Templates für Archive, Seiten oder Beiträge
- Keine erweiterten Funktionen wie Widgets, Customizer-Optionen oder Gutenberg-Blöcke


---

## Entwicklungsverlauf (Version 1.0.0 – 1.0.4)

Die Entwicklung erfolgte ausschließlich auf dem Branch `main`.

### Version 1.0.0 (28.08.2025)
- Initiales Theme-Setup: Die Grundstruktur des Themes wurde angelegt.
- Die Dateien `style.css`, `index.php` und `functions.php` wurden erstellt.
- In der `functions.php` wurde eine Funktion ergänzt, um das zentrale Stylesheet (`style.css`) korrekt einzubinden.

### Version 1.0.1 (28.08.2025)
- Erste PHP-Elemente wurden in die `index.php` eingefügt, um dynamische Inhalte von WordPress anzuzeigen.

### Version 1.0.2 (01.09.2025)
- Die `index.php` wurde weiter verbessert:
	- Die Funktion `the_content()` wurde integriert, um den eigentlichen Seiteninhalt auszugeben.
	- Die HTML-Struktur wurde auf semantisches HTML5 umgestellt (Header, Main, Footer etc.).
- Erste Farb- und Typografie-Styles wurden in der `style.css` ergänzt.

### Version 1.0.3 (01.09.2025)
- In der `functions.php` wurden vier Navigationsmenüs registriert: Hauptnavigation, Sekundäre Navigation, Footer Navigation und Mobilmenü.
- In der `index.php` wurde die Menüposition für das Hauptmenü eingebunden und das WordPress-Menüsystem (`wp_nav_menu`) genutzt.
- Die CSS-Styles wurden weiter verbessert.

### Version 1.0.4 (03.09.2025)
- Das Theme wurde in die Standard-Template-Struktur aufgeteilt: `header.php`, `index.php`, `footer.php`.
- `header.php` enthält nur bis einschließlich `<body>` (jetzt mit `body_class()`).
- `footer.php` enthält nur `wp_footer()` und die schließenden Tags.
- `index.php` enthält jetzt `<header>`, `<nav>`, `<main>`, `<footer>`.
- Custom Template `blank.php` mit minimalem WP-Loop hinzugefügt.
- Theme-Setup-Funktion in `functions.php` ergänzt.
- Title-Tag-Konflikt behoben: Manueller `<title>`-Tag entfernt, da WordPress diesen über `wp_head()` generiert.



